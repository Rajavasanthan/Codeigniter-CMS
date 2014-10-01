<?php

class MY_Session extends CI_Session {
    
    function sess_update() {
        // Listen to HTTP_X_REQUEST_WITH
        if(isset ($_SERVER['HTTP_X_REQUEST_WITH']) && $_SERVER['HTTP_X_REQUEST_WITH'] !== 'XMLHttpRequest') {
            parent::sess_update();
        }
    }
}