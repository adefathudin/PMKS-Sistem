<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model(['users_detail_m', 'laporan_m', 'notifikasi_m']);
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $this->data['curdate'] = date('d-m-Y h:i:sa');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['laporan_mutasi'] = $this->mutasi_rekening_m->get_mutasi_rekening($user_id);
        $this->data['title'] = 'Posisi Mutasi Saldo';
        $this->data['subview'] = 'users/index';
        $this->load->view('_layout_main', $this->data);
    }

    public function create_laporan_post() {

        $nama_laporan = $this->post('nama_laporan');
        $kategori = $this->post('kategori');
        $deskripsi = $this->post('deskripsi');
        $lokasi = $this->post('lokasi');
        $report_by = $this->post('report_by');
        $upload_path = 'assets/img/laporan/';

        if ($nama_laporan == "" || $kategori == "" || $deskripsi == "" || $lokasi == "") {
            $output['status'] = false;
            $output['message'] = "Harap Lengkapi Semua Form";

            $this->response($output);
            return false;
        }
        
        $this->load->library('upload', [
            'upload_path' => $upload_path,
            'allowed_types' => 'jpg|jpeg|png',
            'file_name' => $report_by . uniqid()
        ]);

        if (!$this->upload->do_upload('upload')) {
            $output['message'] = $this->upload->display_errors();
        } else {
            $data = $this->upload->data();
        }

        $data_laporan = [
            'report_by' => $report_by,
            'nama_laporan' => $nama_laporan,
            'kategori' => $kategori,
            'deskripsi' => $deskripsi,
            'lokasi' => $lokasi,
            'status_laporan' => VERIFIKASI,
            'foto' => base_url().$upload_path . $data['file_name'],
        ];

        $insert_laporan = $this->laporan_m->save($data_laporan);

        if ($insert_laporan) {
            $this->notifikasi_m->save([
                'level' => KASATPEL,
                'judul' => 'Laporan "'.$nama_laporan.'"',
                'isi'   => 'Laporan baru "'.$nama_laporan.'" membutuhkan verifikasi '.KASATPEL.''                
            ]);
            $this->notifikasi_m->save([
                'user_id' => $report_by,
                'judul' => 'Laporan "'.$nama_laporan.'"',
                'isi'   => 'Laporan baru "'.$nama_laporan.'" telah dibuat dan sedang  dilakukan verifikasi oleh '.KASATPEL.''                
            ]);
            $output['status'] = true;
            $output['message'] = "Laporan berhasil disimpan.";
        } else {
            $output['status'] = false;
            $output['message'] = "Something wrong";
        }

        $this->response($output);
    }

    public function list_semua_laporan_get() {

        $list_laporan_dashboard = $this->laporan_m->get();

        if ($list_laporan_dashboard) {
            $output['status'] = true;
            $output['item'] = $list_laporan_dashboard;
            $output['total_semua_laporan'] = $this->laporan_m->get_count();
        } else {
            $output['status'] = false;
            $output['message'] = $this->laporan_m->get_last_message();
            $output['total_semua_laporan'] = 0;
        }

        $this->response($output);
    }
    
    public function list_laporan_verifikasi_get() {

        $list_laporan_dashboard = $this->laporan_m->get_by(['status_laporan' => VERIFIKASI]);

        if ($list_laporan_dashboard) {
            $output['status'] = true;
            $output['item'] = $list_laporan_dashboard;
            $output['total_laporan_verifikasi'] = $this->laporan_m->get_count(['status_laporan' => VERIFIKASI]);
        } else {
            $output['status'] = false;
            $output['message'] = $this->laporan_m->get_last_message();
            $output['total_laporan_verifikasi'] = 0;
        }

        $this->response($output);
    }
    
    public function list_laporan_proses_get() {

        $list_laporan_dashboard = $this->laporan_m->get_by(['status_laporan' => PROSES]);

        if ($list_laporan_dashboard) {
            $output['status'] = true;
            $output['item'] = $list_laporan_dashboard;
            $output['total_laporan_proses'] = $this->laporan_m->get_count(['status_laporan' => PROSES]);
        } else {
            $output['status'] = false;
            $output['message'] = $this->laporan_m->get_last_message();
            $output['total_laporan_proses'] = 0;
        }

        $this->response($output);
    }
    
    public function list_laporan_follow_up_get() {

        $list_laporan_dashboard = $this->laporan_m->get_by(['status_laporan' => FOLLOW_UP]);

        if ($list_laporan_dashboard) {
            $output['status'] = true;
            $output['item'] = $list_laporan_dashboard;
            $output['total_laporan_follow_up'] = $this->laporan_m->get_count(['status_laporan' => FOLLOW_UP]);
        } else {
            $output['status'] = false;
            $output['message'] = $this->laporan_m->get_last_message();
            $output['total_laporan_follow_up'] = 0;
        }

        $this->response($output);
    }
    
    public function list_laporan_selesai_get() {

        $list_laporan_dashboard = $this->laporan_m->get_by(['status_laporan' => SELESAI]);

        if ($list_laporan_dashboard) {
            $output['status'] = true;
            $output['item'] = $list_laporan_dashboard;
            $output['total_laporan_selesai'] = $this->laporan_m->get_count(['status_laporan' => SELESAI]);
        } else {
            $output['status'] = false;
            $output['message'] = $this->laporan_m->get_last_message();
            $output['total_laporan_selesai'] = 0;
        }

        $this->response($output);
    }
    
    public function detail_laporan_get() {
        
        $id = $this->get('id');
        
        $detail_laporan = $this->laporan_m->get_detail_laporan($id);

        if ($detail_laporan) {
            $output['status'] = true;
            $output['item'] = $detail_laporan;
        } else {
            $output['status'] = false;
            $output['message'] = $this->laporan_m->get_last_message();
        }

        $this->response($output);
    }
    
    public function update_status_laporan_post() {

        $id_laporan = $this->post('id_laporan');
        $nama_laporan = $this->post('nama_laporan');
        $jenis_status = $this->post('jenis_status');
        $jenis_status1 = $this->post('jenis_status');
        $tindakan = $this->post('tindakan');           
        $foto_tindakan = $this->post('foto_tindakan');     
        $upload_path = 'assets/img/laporan/tindakan/';
        $user_id = $this->session->userdata('user_id');
        
        $tanggal_status = 'tanggal_'.str_replace("-", "_", $jenis_status);
        $_by = str_replace("-", "_", $jenis_status);
        
        if ($jenis_status == VERIFIKASI) {
            $jenis_status = PROSES;
            $level = PETUGAS;
        } else if ($jenis_status == PROSES) {
            $jenis_status = FOLLOW_UP;
            $level = PETUGAS;
        } else if ($jenis_status == FOLLOW_UP) {
            $jenis_status = SELESAI;
            $_by = 'proses';
            $tanggal_status = 'tanggal_selesai';
        } else {
            
        }
        
        $this->load->library('upload', [
            'upload_path' => $upload_path,
            'allowed_types' => 'jpg|jpeg|png',
            'file_name' => $user_id . uniqid()
        ]);

        if (!$this->upload->do_upload('foto_tindakan')) {
            
            $data['file_name'] = null;            
            
        } else {
            
            $data = $this->upload->data();
        }
        
        $insert_laporan = $this->laporan_m->save([
            'status_laporan' => $jenis_status, 
            $tanggal_status => date("Y-m-d h:i:sa"),
            $_by.'_by' => $user_id,
            'tindakan' => $tindakan, 'foto_tindakan' => base_url().$upload_path . $data['file_name']
                ], $id_laporan);

        if ($insert_laporan) {
            
            $this->notifikasi_m->save([
                'level' => $level,
                'judul' => 'Laporan "' . $nama_laporan . '"',
                'isi' => 'Laporan baru "' . $nama_laporan . '" telah di'.$jenis_status1.''
            ]);

            $output['status'] = true;
            $output['message'] = "Laporan berhasi di $jenis_status1";
        } else {
            $output['status'] = false;
            $output['message'] = "Something wrong";
        }

        $this->response($output);
    }

}
