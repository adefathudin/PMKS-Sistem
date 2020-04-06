<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_login_m extends MY_Model {

    protected $_table_name = 'users_login';
    protected $_primary_key = 'user_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    public function cek_user($email){
        $this->db->where('email', $email);
        $result = $this->db->cek_user('user_login')->row();
        return $result;    }
}