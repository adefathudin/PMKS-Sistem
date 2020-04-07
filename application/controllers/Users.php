<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
    
    function __construct(){
        parent::__construct();

  }
  
    
    public function index() {
        $this->data['title'] = 'Users';
        $this->data['subview'] = 'users/index';
        $this->load->view('_layout_main', $this->data);      
    }
    
}
