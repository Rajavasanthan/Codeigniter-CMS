<?php
class MY_Model extends CI_Model {
    
    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $_rules = array();
    protected $_timestamps = FALSE;
    public $last_id;


    function __construct() {
        parent::__construct();
    }
    
    public function array_from_post($fields) {
        $data = array();
        foreach($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }


    public function get($id = NULL, $single = FALSE){
        
        if ($id !=NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            //$this->db->order_by($this->_order_by);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        }
        elseif($single == TRUE) {
            $method = 'row';
        }
        else {
            $method = 'result';
        }
        
        if(!count($this->db->ar_orderby)) {
           $this->db->order_by($this->_order_by);
        }
        return $this->db->get($this->_table_name)->$method();
    }
    
    //Fetch blogs with tag: using JOIN method
    public function get_blog($id = NULL, $single = FALSE){
        
        if ($id !=NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->order_by($this->_order_by);
            $this->db->where($this->_primary_key, $id);
            $this->db->join('tags', 'tags.blog_id = blogs.id');
            $method = 'row';
        }
        elseif($single == TRUE) {
            $method = 'row';
        }
        else {
            $method = 'result';
        }
        
        if(!count($this->db->ar_orderby)) {
           $this->db->order_by('blogs.created desc');
           //$this->db->join('tags', 'tags.blog_id = blogs.id','both');
        }
        return $this->db->get($this->_table_name)->$method();
    }
    

    public function get_tag_by_block_id($id = NULL, $single = FALSE){
        
        if ($id !=NULL) {
            //$filter = $this->bid;
            //$id = $filter($id);
            $this->db->where('blog_id', $id);
            $this->db->order_by('blog_id desc');
            //$this->db->join('blogs', 'blogs.id = tags.blog_id');   
            $method = 'result';
        }
        elseif($single == TRUE) {
            $method = 'row';
        }
        else {
            $method = 'result';
        }
        
        if(!count($this->db->ar_orderby)) {
           
           $this->db->join('blogs', 'blogs.id = tags.blog_id','left');
        }
        return $this->db->get($this->_table_name)->$method();
        
    }
    
    
    
    public function get_by($where, $single = FALSE){
        $this->db->where($where);
        //var_dump($where);
        return $this->get(NULL, $single);
    }
    
    /**
     *
     * @param type $data
     * @param type $id
     * @return type INT
     */
    public function save($data, $id = NULL){
        
        //Set timestamps
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }
        
        //Insert
        if($id === NULL) {
            !isset ($data[$this->_primary_key]) || $data[$this->_primary_key]  = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $this->last_id = $this->db->insert_id();
            //dump($this->last_id);
            return $this->last_id;
            
        }
        
        //Update
        else {dump($data);echo '<pre>' . $this->db->last_query() . '</pre>';
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }
        return $id;
    }
    
    public function get_last_insert_id () {
        return $this->db->insert_id();
    }

    /**
     *
     * @param type $data
     * @param type $id
     * @param type $blog_id (this is the last insert id in BLOGS table)
     * @return type INT
     */
    public function save_tag($data, $id = NULL, $blog_id){
        
        //Set timestamps
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }
        
        //Insert
        if($id === NULL) {
            !isset ($data[$this->_primary_key]) || $data[$this->_primary_key]  = NULL;
            $this->db->set($data);
            $this->db->set('blog_id', $blog_id);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        
        //Update
        else {
            //$filter = $id;
            //$id = $filter($id);
            $this->db->set($data);
            $this->db->set('blog_id', $blog_id);
            $this->db->where('blog_id', $blog_id );
            $this->db->update($this->_table_name);
        }
        return $id;
    }
    
    
    /**
     *
     * @param type $data
     * @param type $id
     * @param type $blog_id (this is the last insert id in BLOGS table)
     * @return type INT
     * 
     * This method will save the tags with corresponding BLOG_ID.
     * And each tag will be separated by comma delimiter and stored separate row 
     * with same BLOG_ID as
     * 
     */  
    public function save_tag_comma($data, $id = NULL, $blog_id){
        
        //Set timestamps
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }
        dump($data);
        //Insert
        if($id === NULL) {
            $tags    =  explode(',',$data['tag']); 
            dump($tags);
            foreach($tags as $tag)
            {
                !isset ($data[$this->_primary_key]) || $data[$this->_primary_key]  = NULL;
                //$this->db->set($data);
                $this->db->set($data);
                $this->db->set('tag', $tag);
                $this->db->set('blog_id', $blog_id);
                $this->db->insert($this->_table_name);
                $id = $this->db->insert_id();
            }
        }
                
        //Update
        else {
            //$filter = $id;
            //$id = $filter($id);
            //$this->db->set($data);
            //$this->db->set('blog_id', $blog_id);
            //$this->db->where('blog_id', $blog_id );
            //$this->db->update($this->_table_name);
            
            
            //if($id === NULL) {
            $tags    =  explode(',',$data['tag']); 
            dump($data);
            foreach($tags as $tag)
                {
                    !isset ($data[$this->_primary_key]) || $data[$this->_primary_key]  = NULL;
                    //$this->db->set($data);
                    //$this->db->set($data);
                    $this->db->set('tag', $tag);
                    $this->db->set('blog_id', $id);
                    $this->db->where('tags.id', $this->_primary_key);
                    //$this->db->update($this->_table_name);
                    
                    $sql = $this->db->insert_string() . ' ON DUPLICATE KEY UPDATE tags.id=tags.id';
                    //$this->db->result($sql);
                    
//$id = $this->db->insert_id();
                }
            }
        //}
        return $id;
    }
    
    
    
    public function delete($id){
        $filter = $this->_primary_filter;
        $id = $filter($id);
        
        if(!$id) {
            return FALSE;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
        
    }
    
    public function delete_tag($id){
        //$filter = $this->_primary_filter;
        //$last_id = $filter($id);
         
        if(!$id) {
            return FALSE;
        }
        //$this->db->select('tag');
        //$this->db->join('blogs', 'blogs.id = tags.blog_id');
        //$this->db->set('blog_id', $id);
        $this->db->where('blog_id', $id);
        //$this->db->limit(1);
        $this->db->delete($this->_table_name);
        return $id;
        
    }
    
    
    
}


