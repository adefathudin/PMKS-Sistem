<?php

class Users_detail_m extends MY_Model {

    protected $_table_name = 'users_detail';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    public function get_detail_user($email){
        $this->db->where('email', $email);
        $result = $this->db->get('users_detail')->row();
        return $result;
    }

    public function get_user($user_id){
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('users_detail')->row();
        return $result;
    }

    public function get_member_request_full_service(){
        $this->db->select('user_id,nama_lengkap');
        $this->db->where('status_approve', '2');
        $result = $this->db->get('users_detail')->result();
        return $result;
    }

    public function get_detail_member_request_full_service($user_id){
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('users_detail')->row();
        return $result;
    }
    
    public function get_user_by_qr($qrcode){
        $this->db->where('qrcode', $qrcode);
        $result = $this->db->get('users_detail')->row();
        return $result;
    }
    
    public function get_data_all_user(){
        $result = $this->db->get('users_detail')->result();
        return $result;
    }
}
