<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('users_detail_m');
        $this->load->model('notifikasi_m');
        
    }
    
    public function index($user_id = null )
    {
        $user_id = $this->session->userdata('user_id');
        $this->data = array (
            'title' => '',
            'subview' => 'profile/profile'
        );
        $this->load->view('_layout_main', $this->data,$user_id);
    }
    
    public function id($user_id = null ){ 
        $user_id =  $this->uri->segment(2);
        $this->data['data_user_tmp'] = $this->users_detail_m->get_user($user_id); 
        $this->data['title'] = $this->users_detail_m->get_user($user_id)->nama_lengkap;
        $this->data['subview'] = 'profile/profile';
        $this->load->view('_layout_main', $this->data);
    }
}

