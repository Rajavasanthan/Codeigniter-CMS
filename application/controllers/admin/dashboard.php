<?php
class Dashboard extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('article_m');
    }
    
    public function index(){
        $this->article_m->get();
        $this->data['subview'] = 'admin/dashboard/index';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
}