<?php

class Tag_m extends MY_Model {

    protected $_table_name = 'tag';
    protected $_order_by = 'id desc';
    protected $_timestamps = TRUE;
    public $rules = array();

    public function get_new() {
        $tag = new stdClass();
        $tag->tag = '';
        return $tag;
    }

    public function fetch_all_tags() {
        //header('Content-Type: application/json');
        $this->db->select('tag');
        return parent::get();
    }
    
    public function select_like() {
        
        //$this->db->select('tag');    
        $this->db->set('blog_id', 'CONCAT(blog_id,\',\',\''.'169'.'\')', FALSE);
        $this->db->like('tag', 'hosting in linode');
        $this->db->update('tags');
        //return parent::get();
    
    }

}