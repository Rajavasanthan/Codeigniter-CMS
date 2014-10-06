<?php

class Article_m extends MY_Model {

    protected $_table_name = 'articles';
    protected $_order_by = 'published desc';
    protected $_timestamps = TRUE;
    public $rules = array(
        'article_title' => array(
            'field' => 'article_title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[72]|xss_clean'
        ),
        'article_body' => array(
            'field' => 'article_body',
            'label' => 'Body',
            'rules' => 'trim|required'
        )
    );

    public function get_new() {
        $article = new stdClass();
        $article->article_title = '';
        $article->slug = '';
        $article->article_summary = '';
        $article->article_body = '';
        $article->article_author = '';
        $article->created = date('Y-m-d');
        $article->modified = '';
        $article->published = '';
        $article->breaking = '';
        return $article;
    }

    public function set_published() {
        $this->db->where('pubdate <=', date('Y-m-d'));
    }

    public function get_recent($limit = 3) {

        // Fetch a limited number of recent articles
        $limit = (int) $limit;
        $this->set_published();
        $this->db->limit($limit);
        return parent::get();
    }

}
