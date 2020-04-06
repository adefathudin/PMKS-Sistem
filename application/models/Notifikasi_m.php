<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notifikasi_m extends MY_Model {

    protected $_table_name = 'notifikasi';
    protected $_primary_key = 'notifikasi_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    public function cek_notifikasi($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('baca', 0);
        $this->db->order_by('notifikasi_id','desc');
        $result = $this->db->get('notifikasi')->result();
        return $result;    }

    public function cek_notifikasi_by_id($id){
        $this->db->where('notifikasi_id', $id);
        $result = $this->db->get('notifikasi')->row();
        return $result;    }
}