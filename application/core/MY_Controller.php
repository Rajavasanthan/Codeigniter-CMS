<?php

class MY_Controller extends CI_Controller {

    public $data = array();
    public $permissions = array();

    function __construct() {
        parent::__construct();
        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
        $this->data['logo_path'] = '';
        $this->data['fav_icon'] = '';
        $this->load->library('session');
}
}
