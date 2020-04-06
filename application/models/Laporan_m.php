<?php

class Laporan_m extends MY_Model {

    protected $_table_name = 'laporan';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'tanggal_lapor';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];
    
    public function get_detail_laporan($id){
    
    $this->db->select('a.*,b.user_id,b.nama_lengkap,b.about');
    $this->db->from('laporan a');
    $this->db->join('users_detail b', 'a.report_by = b.user_id');
    $this->db->where('a.id', $id);
    
    $result = $this->db->get()->row();
    return $result;
    }
}
