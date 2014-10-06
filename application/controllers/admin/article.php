<?php

class Article extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article_m');
        $this->load->model('category_m');
    }

    public function index() {
        // Fetch all articles
        $this->data['articles'] = $this->article_m->get_by_join('articles.id,articles.category_id,articles.article_title,articles.slug,articles.created,articles.modified,articles.published,articles.breaking,articles.views,users.user_name,category.category_name',
                array(
                    'users' => 'articles.author_id = users.user_id',
                    'category' => 'articles.category_id = category.category_id'
        ));
        //$this->data['articles'] = $this->article_m->get();

        // Load view
        $this->data['subview'] = 'admin/article/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL) {
        // Fetch a article or set a new one
        if ($id) {
            $this->data['article'] = $this->article_m->get($id);
            count($this->data['article']) || $this->data['errors'][] = 'article could not be found';
            $this->data['tag'] = $this->article_m->get_by_join(
                    "tag.tag", array(
                'tag_article' => 'articles.id = tag_article.article_id',
                'tag' => 'tag_article.tag_id = tag.id'
                    ), array('articles.id' => $id
                    ), 'LEFT');
            $this->data['tag'] = implode_tag($this->data['tag']);
        } else {
            $this->data['article'] = $this->article_m->get_new();
            //$this->data['tag'] = $this->tag_m->get_new();
        }

        $this->data['category'] = $this->category_m->get_list('category_id', 'category_name');
        // Set up the form
        $rules = $this->article_m->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE) {
            $data = $this->article_m->array_from_post(array(
                'article_title',
                'category_id',
                'article_body',
                'article_summary',
                'breaking',
                'published',
            ));
            $data['slug'] = url_title($data['article_title'], '-', TRUE);
            $data['author_id'] = $this->session->userdata('id');
            /*
             * If the Summary is Empty, Store first 50 Characters from Body into Summary
             */
            if ($data['article_summary'] == NULL) {
                $data['article_summary'] = limit_to_numwords($data['article_body'], 50);
            }
            $this->article_m->save($data, $id);
            if ($id) {
                $this->tag_article_m->delete($id, "article_id");
            }
            $this->save_tag($id);
            redirect('admin/dashboard');
        }
        // Load the view
        $this->data['subview'] = 'admin/article/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete($id) {
        $this->article_m->delete($id);
        redirect('admin/article');
    }

    public function save_tag($id) {
        $last_insert_article = $this->article_m->get_last_insert_id();
        $tag_data = $this->article_m->array_from_post(array('tag'));
        $tag_data = tag_explode($tag_data['tag']);
        foreach ($tag_data as $tag) {
            $this->db->where('tag', $tag);
            $tag_status = $this->tag_m->get();
            if (count($tag_status)) {
                $last_insert_tag = $tag_status[0]->id;
            } else {
                $this->tag_m->save(array(
                    'tag' => $tag
                ));
                $last_insert_tag = $this->tag_m->get_last_insert_id();
            }
            $this->tag_article_m->save(array(
                'tag_id' => $last_insert_tag,
                'article_id' => $id ? $id : $last_insert_article
            ));
        }
    }

}
