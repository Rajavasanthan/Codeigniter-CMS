<?php

class Category_m extends MY_Model {

    protected $_table_name = 'category';
    protected $_order_by = 'category_id desc';
    protected $_timestamps = TRUE;
    public $rules = array(
        'category_name' => array(
            'field' => 'category_name',
            'label' => 'Category_Name',
            'rules' => 'trim|required|max_length[72]|xss_clean'
        ),
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
}