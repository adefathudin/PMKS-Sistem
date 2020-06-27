<?php

class Laporan_m extends MY_Model {

    protected $_table_name = 'laporan';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'id';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    public function get_detail_laporan($id) {

        $this->db->select('a.*,b.user_id,b.nama_lengkap');
        $this->db->from('laporan a');
        $this->db->join('users_detail b', 'a.report_by = b.user_id');
        $this->db->where('a.id', $id);

        $result = $this->db->get()->row();
        return $result;
    }

    public function get_count_by_date() {

        $this->db->select('count(*) as count');
        $this->db->from('laporan');
        $this->db->where('month(tanggal_lapor)', 5);
        $this->db->where('status_laporan', VERIFIKASI);

        $result = $this->db->get()->row();
        return $result;
    }

    public function get_by_group() {

        $this->db->select('kategori');
        $this->db->from('laporan');
        $this->db->group_by('kategori');

        $result = $this->db->get()->result();
        return $result;
    }

}
