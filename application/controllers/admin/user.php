<?php
class User extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        //Fetch all Users
        $this->data['users'] = $this->user_m->get();
        
        //Load view
        $this->data['subview'] = 'admin/user/index';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function edit($id = NULL) {
        //Fetch a user or set a new one
        if ($id) {
            $this->data['user'] = $this->user_m->get($id);
            count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
        }
        else {
            $this->data['user'] = $this->user_m->get_new();
        }
        
        //set up the form
        $rules = $this->user_m->rules_admin;
        $id || $rules['password']['rules'] .= '|required';
        $this->form_validation->set_rules($rules);
        //Process the form
        if ($this->form_validation->run() == TRUE) {
            $data = $this->user_m->array_from_post(array('user_name', 'user_email', 'password'));
            $data['password'] = $this->user_m->hash($data['password']);
            $this->user_m->save($data, $id);
            $this->user_m->loggedin() == FALSE || redirect('admin/user');
            $this->session->set_flashdata('message','Successfully Registered! Please Login');
            redirect('admin/user/login');
        }
        $layout = "_modal";
        $this->user_m->loggedin() == FALSE || $layout = "_main";
        //Loading the view 
        $this->data['subview'] = 'admin/user/edit';
        $this->load->view('admin/_layout'.$layout, $this->data);
    }
    
    public function delete($id) {
        $this->user_m->delete($id);
        redirect('admin/user');
    }

    
    
    public function login() {
      
        //Redirect the user if he's already loggedin
        $dashboard = 'admin/dashboard';
        $this->user_m->loggedin() == FALSE || redirect($dashboard);
     
        //Set the form
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        
        
        //Process form
        if ($this->form_validation->run() == TRUE) {
            //We can login and redirt
            if($this->user_m->login() == TRUE) { 
                redirect($dashboard);
            }
            else {
                $this->session->set_flashdata('error', 'That email/password combination does not exist');
                redirect('admin/user/login', 'refesh');
            }
        }
        
        //Load the view
        $this->data['subview'] = 'admin/user/login';
        $this->load->view('admin/_layout_modal', $this->data);
    }
    
    public function logout() {
        $this->user_m->logout();
        redirect('/');
    }
    
    
    public function _unique_email($str){
        
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        
        $id = $this->uri->segment(4);
        $this->db->where('user_email', $this->input->post('user_email'));
        !$id || $this->db->where('id !=', $id);
        $user = $this->user_m->get();
        
        if(count($user)) {
            $this->form_validation->set_message('_unique_email', '%s should be unique or either this email address already exist.');
            return FALSE; 
        }
        return TRUE;
    }
}   