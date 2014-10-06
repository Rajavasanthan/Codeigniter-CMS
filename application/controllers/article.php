<?php

class Article extends Frontend_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article_m');
    }

    public function index() {
        $total_segments = $this->uri->total_segments();
        if ($total_segments == 1) {
            $this->blog($this->uri->segment(1), NULL, FALSE);
        }
        if ($total_segments == 2) {
            $this->blog($this->uri->segment(1), $this->uri->segment(2), TRUE);
        }
        //redirect('page-not-found');
    }

   

    public function blog($section, $slug = NULL, $single = FALSE) {
        if ($single) {
            $this->data['articles'] = $this->article_m->get_by_join('articles.article_body', array(
                'category' => 'articles.category_id = category.category_id'
                    ), array(
                'articles.slug' => $slug,
                'category.category_name' => $section
                    ), 'LEFT', $single);
        } else {
            $this->data['articles'] = $this->article_m->get_by_join('articles.article_title', array(
                'category' => 'articles.category_id = category.category_id'
                    ), array(
                'category.category_name' => $section
                    ), 'LEFT', $single);
        }

        if ($single) {
            $this->data['subview'] = 'article';
        } else {
            $this->data['subview'] = 'page';
        }
        $this->load->view('_layout_blog', $this->data);
    }

//    public function content($slug) {
//        $this->data['articles'] = $this->article_m->get_by_join('articles.article_body', array(
//            'category' => 'articles.category_id = category.category_id'
//                ), array(
//            'articles.slug' => $slug,
//            'category_name' => $this->uri->segment(1)
//                ), 'LEFT', TRUE);
//        $this->data['subview'] = 'article';
//        $this->load->view('_layout_blog', $this->data);
//    }
}
