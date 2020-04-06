<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
    
    function __construct(){
        parent::__construct();

  }
  
    
    public function index() {
        $this->data['title'] = 'Posisi Mutasi Saldo';
        $this->data['subview'] = 'users/index';
        $this->load->view('_layout_main', $this->data);      
    }
    
}
