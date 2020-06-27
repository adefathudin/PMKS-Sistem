<?php

class Chart_by_month_m extends MY_Model {

    protected $_table_name = 'chart_by_month';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'id';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    public function get_detail_laporan($id) {

        $this->db->select('a.*,b.user_id,b.nama_lengkap,b.about');
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

    public function update_chart() {
        $this->db->query('update chart_by_month set verifikasi=(select sum(verifikasi) from chart_by_jenis where bulan=' . date('m') . '), proses=(select sum(proses) from chart_by_jenis where bulan=' . date('m') . '), follow_up=(select sum(follow_up) from chart_by_jenis where bulan=' . date('m') . '), selesai=(select sum(selesai) from chart_by_jenis where bulan=' . date('m') . ') where bulan=' . date('m'));
    }

}
