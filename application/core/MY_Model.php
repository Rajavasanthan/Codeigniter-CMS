<?php

class MY_Model extends CI_Model {

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamps = FALSE;

    function __construct() {
        parent::__construct();
    }

    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function get($id = NULL, $single = FALSE) {

        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } elseif ($single == TRUE) {
            $method = 'row';
        } else {
            $method = 'result';
        }

        if (!count($this->db->ar_orderby)) {
            $this->db->order_by($this->_order_by);
        }
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = FALSE) {
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    /*
     * This function will return select List
     */

    public function get_list($key, $value) {
        $datas = $this->get();
        $new_data = array();
        foreach ($datas as $data) {
            $new_data[$data->$key] = $data->$value;
        }
        return $new_data;
    }

    public function get_by_join($select, $join_statement, $where = NULL, $side = NULL, $single = FALSE) {
        $this->db->select($select);
        //$this->db->from("tag");
        foreach ($join_statement as $key => $statement) {
            $this->db->join($key, $statement, $side);
        }
        if ($where == NULL) {
            return $this->get(NULL, $single);
        } else {
            return $this->get_by($where, $single);
        }
    }

    public function save($data, $id = NULL) {

        // Set timestamps
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }
        // Insert
        if ($id === NULL) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $id;
    }

    public function get_last_insert_id() {
        return $this->db->insert_id();
    }

    public function delete($id, $where = NULL, $single = FALSE) {
        $filter = $this->_primary_filter;
        $id = $filter($id);

        if (!$id) {
            return FALSE;
        }
        if ($where) {
            $this->db->where($where, $id);
        } else {
            $this->db->where($this->_primary_key, $id);
        }
        if ($single) {
            $this->db->limit(1);
        }
        $this->db->delete($this->_table_name);
    }

}
