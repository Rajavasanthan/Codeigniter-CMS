<?php

class User_M extends MY_Model {

    protected $_table_name = 'users';
    protected $_order_by = 'user_name';
    public $rules = array(
        'user_email' => array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        ),
    );
    public $rules_admin = array(
        'user_name' => array(
            'field' => 'user_name',
            'label' => 'Name',
            'rules' => 'trim|required|xss_clean'
        ),
        'user_email' => array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|matches[password_confirm]'
        ),
        'password_confim' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|matches[password]'
        ),
    );

    function __construct() {
        parent::__construct();
    }

    public function login() {
        $user = $this->get_by(array(
            'user_email' => $this->input->post('user_email'),
            'password' => $this->hash($this->input->post('password')),
                ), TRUE);
        if (count($user)) {
            //login in user
            $data = array(
                'name' => $user->user_name,
                'email' => $user->user_email,
                'id' => $user->user_id,
                'loggedin' => TRUE,
            );
            $this->session->set_userdata($data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
    }

    public function loggedin() {
        return (bool) $this->session->userdata('loggedin');
    }

    public function get_new() {
        $user = new stdClass();
        $user->name = '';
        $user->email = '';
        $user->password = '';
        return $user;
    }

    public function hash($string) {
        //return hash('sha512', $string, config_item('encryption_key'));
        return md5($string);
    }

}
