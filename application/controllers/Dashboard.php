<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function index() {

        $this->load->model(['chart_by_month_m']);
        $this->load->model(['chart_by_date_m']);
        $this->load->model(['chart_by_jenis_m']);
        $this->load->model(['kategori_m']);

        $this->data['title'] = 'Laporan';
        $this->data['subview'] = 'dashboard/index';

        $get_month = $this->chart_by_jenis_m->get_count(['bulan' => date('m')]);

        if (!$get_month) {
            $kategori = $this->kategori_m->get();
            foreach ($kategori as $kat) {
                $kat1 = $kat->kategori_value;
                $this->chart_by_jenis_m->reset_count_by_jenis($kat1);
            }
        }

        //$this->chart_by_month_m->update_chart();

        $this->data['kategori'] = $this->laporan_m->get_by_group();

        $this->data['kategori1'] = $this->kategori_m->get();

        $this->data['odgj'] = $this->laporan_m->get_count(['kategori' => 'odgj']);
        $this->data['ot'] = $this->laporan_m->get_count(['kategori' => 'ot']);
        $this->data['pengemis'] = $this->laporan_m->get_count(['kategori' => 'pengemis']);
        $this->data['pengamen'] = $this->laporan_m->get_count(['kategori' => 'pengamen']);
        $this->data['gelandangan'] = $this->laporan_m->get_count(['kategori' => 'gelandangan']);
        $this->data['psikiotik'] = $this->laporan_m->get_count(['kategori' => 'psikiotik']);
        $this->data['psk'] = $this->laporan_m->get_count(['kategori' => 'psk']);
        $this->data['pedagang_asongan'] = $this->laporan_m->get_count(['kategori' => 'pedagang_asongan']);

        $this->data['total_by_jenis'] = $this->chart_by_jenis_m->get();

        $this->load->view('_layout_main', $this->data);
    }

}
