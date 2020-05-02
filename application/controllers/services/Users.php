<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model(['users_detail_m', 'users_login_m', 'notifikasi_m']);
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

    public function list_pelapor_get() {

        $level = $this->get('level');

        $list_pelapor = $this->users_detail_m->get_by(['level' => $level]);

        if ($list_pelapor) {
            $output['status'] = true;
            $output['item'] = $list_pelapor;
            $output['jumlah'] = $this->users_detail_m->get_count(['level' => $level]);
        } else {
            $output['status'] = false;
            $output['message'] = $this->users_detail_m->get_last_message();
        }

        $this->response($output);
    }

    public function list_petugas_get() {

        $level = $this->input->get('level');
        $list_pelapor = $this->users_detail_m->get_by(['level' => $level]);

        if ($list_pelapor) {
            $output['status'] = true;
            $output['item'] = $this->users_detail_m->get_by(['level' => $level]);
            $output['jumlah'] = $this->users_detail_m->get_count(['level' => $level]);
        } else {
            $output['status'] = false;
        }

        $this->response($output);
    }

    public function delete_user_get() {

        $id = $this->input->get('id');
        $delete_user = $this->users_detail_m->delete_where(['user_id' => $id]);

        if ($delete_user) {

            $this->users_login_m->delete_where(['user_id' => $id]);
            $output['status'] = true;
            $output['message'] = "Data user berhasil dihapus";
        } else {
            $output['status'] = false;
            $output['message'] = "Something wrong";
        }

        $this->response($output);
    }
    
    public function change_password_put() {

        $user_id = $this->put('user_id');
        $password_baru = md5($this->put('password_baru'));
        $ulangi_password_baru = md5($this->put('ulangi_password_baru'));
        $password_lama = md5($this->put('password_lama'));
        
        if ($password_baru != $ulangi_password_baru) {
            $output['status'] = FALSE;
            $output['message'] = 'Password tidak sama';
            $this->response($output);
        }

        $check = $this->users_login_m->get_count(['user_id' => $user_id, 'password' => $password_lama]);

        if ($check > 0) {
            $output['status'] = TRUE;
            $data['password'] = $password_baru;
        } else {
            $output['status'] = FALSE;
            $output['message'] = 'Password lama tidak sama. Mohon cek kembali';
        }

        if ($output['status']) {
            $update = $this->users_login_m->save_where($data, ['user_id' => $user_id]);
            if ($update) {
                $output['status'] = TRUE;                
                $output['message'] = 'Berhasil mengganti password';
            } else {                
                $output['status'] = false; 
                $output['message'] = 'Gagal mengganti password';
            }
        }
        $this->response($output);
    }

    public function create_user_post() {

        $user_id = md5($this->post('nik'));
        $nik = $this->post('nik');
        $nama_lengkap = $this->post('nama_lengkap');
        $email = $this->post('email');
        $rt = $this->post('rt');
        $rw = $this->post('rw');
        $level = $this->post('level');

        if ($nik == "" || $nama_lengkap == "" || $email == "" || $level == "") {
            $output['status'] = false;
            $output['message'] = "Harap Lengkapi Form!";

            $this->response($output);
            return false;
        }

        if ($this->users_detail_m->get_count(array('email' => $email)) > 0) {
            $output['status'] = false;
            $output['message'] = "Email sudah terdaftar";

            $this->response($output);
            return false;
        } else {

            $data_login = ['user_id' => $user_id, 'password' => md5('123'), 'email' => $email];

            $data_user = [
                'user_id' => $user_id,
                'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'email' => $email,
                'rt' => $rt,
                'rw' => $rw,
                'level' => $level,
                'joined' => date("Y-m-d h:i:sa")
            ];

            $insert_notifikasi = ['user_id' => $user_id, 'judul' => 'Selamat Datang di PMKS Sistem'];

            $insert_users = $this->users_detail_m->save($data_user);

            if ($insert_users) {
                $this->users_login_m->save($data_login);
                $this->notifikasi_m->save($insert_notifikasi);
                $output['status'] = true;
                $output['message'] = "User berhasil ditambahkan";
            } else {
                $output['status'] = false;
                $output['message'] = "Something wrong";
            }

            $this->response($output);
        }
    }
    
    public function update_identitas_post() {

        $user_id = $this->post('user_id');
        $nomor_hp = $this->post('nomor_hp');
        $tempat_lahir = $this->post('tempat_lahir');
        $tanggal_lahir = $this->post('tanggal_lahir');
        $jenis_kelamin = $this->post('jenis_kelamin');
        $alamat = $this->post('alamat');
        $about = $this->post('about');
        
        $data = ([
            'nomor_hp' => $nomor_hp,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat'        => $alamat,
            'about'         => $about
        ]);
        
        $update = $this->users_detail_m->save_where($data, ['user_id' => $user_id]);
        if ($update) {
            $output['status'] = TRUE;
            $output['message'] = 'Berhasil update identitas';
        } else {
            $output['status'] = false;
            $output['message'] = 'Gagal update identitas';
        }

        $this->response($output);
    }

}
