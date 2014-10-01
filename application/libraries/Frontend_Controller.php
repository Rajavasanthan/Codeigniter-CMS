<?php

class Frontend_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();

        // Load stuffs
        $this->data['meta_title'] = config_item('site_name');
    }

}
