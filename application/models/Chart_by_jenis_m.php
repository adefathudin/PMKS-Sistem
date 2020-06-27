<?php

class Chart_by_jenis_m extends MY_Model {

    protected $_table_name = 'chart_by_jenis';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'id';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    public function reset_count_by_jenis($kat1) {
        $this->db->update('chart_by_jenis', ['bulan' => date('m'), $kat1 => 0]);
    }

    public function update_chart_by_jenis($kategori) {
        $this->db->query('UPDATE chart_by_jenis set ' . $kategori . '=' . $kategori . '+1 where tanggal=' . date('d'));
    }

    public function update_chart_by_date($tipe, $tipe1) {
        $this->db->query('UPDATE chart_by_jenis set ' . $tipe . '=' . $tipe . '+1,  ' . $tipe1 . '=' . $tipe1 . '-1 where tanggal=' . date('d'));
    }

}
