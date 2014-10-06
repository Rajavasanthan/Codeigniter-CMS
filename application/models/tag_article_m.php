<?php

class Tag_Article_m extends MY_Model {

    protected $_table_name = 'tag_article';
    protected $_order_by = 'id desc';
    protected $_timestamps = TRUE;
    public $rules = array();

    public function get_new() {
        $tag = new stdClass();
        $tag->tag_id = '';
        $tag->article_id = '';
        return $tag;
    }


}