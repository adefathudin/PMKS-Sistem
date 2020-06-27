<?php

class Chart_by_date_m extends MY_Model {

    protected $_table_name = 'chart_by_date';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'id';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    public function reset_count_by_date() {
        $this->db->update('chart_by_date', ['bulan' => date('m'), 'verifikasi' => 0, 'proses' => 0, 'follow_up' => 0, 'selesai' => 0]);
    }

    public function update_chart_by_date_verifikasi($tipe) {
        $this->db->query('UPDATE chart_by_date set ' . $tipe . '=' . $tipe . '+1 where tanggal=' . date('d'));
    }

    public function update_chart_by_date($tipe, $tipe1) {
        $this->db->query('UPDATE chart_by_date set ' . $tipe . '=' . $tipe . '+1,  ' . $tipe1 . '=' . $tipe1 . '-1 where tanggal=' . date('d'));
    }

}
