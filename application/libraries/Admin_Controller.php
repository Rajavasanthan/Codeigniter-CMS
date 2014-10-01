<?php

class Admin_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->data['meta_title'] = 'Admin ' . config_item('site_name');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //login check 
        $exception_uris = array(
            'admin/user/login',
            'admin/user/logout'
        );
        if (in_array(uri_string(), $exception_uris) == FALSE) {
            if ($this->user_m->loggedin() == FALSE) {
                redirect('admin/user/login');
            }
        }
    }

}
