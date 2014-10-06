<?php

class Error extends Frontend_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('article_m');
    }

    public function index() {
        $this->load->view('_layout_error');
    }
}