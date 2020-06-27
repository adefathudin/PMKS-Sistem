<?php   

class MY_Controller extends CI_Controller {
    public $data = array();
    protected $userlib = NULL;
    
    function __construct() {
        parent::__construct();
        
        if (!isset($this->session)){
            $this->load->library('session') or die('Can not load library Session');
        }
        
        $this->load->model('users_detail_m');
        $this->load->model('laporan_m');
        $this->userlib = new Userlib();       
        
        $this->data['user_id'] = $this->session->userdata('user_id');
        
        $data_users = $this->users_detail_m->get_by(['user_id' => $this->session->userdata('user_id')]);
        
        foreach ($data_users as $data_user){
            $this->data['data_user'] = $data_user;
        }
        
        if (!$this->session->userdata('has_loggedin')) {
           //$this->session->sess_destroy();            
        }
        
}}
 