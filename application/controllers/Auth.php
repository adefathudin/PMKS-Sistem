<?php

class Auth extends MY_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model(['users_detail_m', 'users_login_m', 'notifikasi_m']);
    }

    public function index() {

        if (!empty($this->session->userdata('has_loggedin'))) {
            redirect('laporan');
            exit();
        }
        $this->load->view('login');
    }

    public function cek_login() {

        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $login_service = $this->userlib->login($email, $password);

        if ($login_service) {

            if ($this->users_detail_m->get_count(['email' => $email, 'verifikasi' => 1])) {
                redirect(base_url('laporan'));
            } else {
                redirect(base_url('dashboard'));
            }
        } else {
            $this->session->set_flashdata('message', 'user atau password salah');
            redirect(base_url('auth'));
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function registrasi() {
        $this->load->view('registrasi');
    }

    public function create_user() {

        if (!isset($this->session)) {
            $this->load->library('session') or die('Can not load library Session');
        }

        $user_id = md5($this->input->post('nik'));
        $nik = $this->input->post('nik');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $level = $this->input->post('level');
        $password = $this->input->post('password1');
        $password2 = $this->input->post('password2');

        if ($nik == "" || $nama_lengkap == "" || $email == "" || $level == "") {
            $this->session->set_flashdata('message', 'Harap Lengkapi Form');
            redirect(base_url('auth/registrasi'));
            return false;
        }

        if ($password != $password2) {
            $this->session->set_flashdata('message', 'Password tidak sama!');
            redirect(base_url('auth/registrasi'));
            return false;
        }

        if ($this->users_detail_m->get_count(array('email' => $email)) > 0) {

            $this->session->set_flashdata('message', 'Email sudah terdaftar');
            redirect(base_url('auth/registrasi'));
            return false;
        } else {

            $data_login = ['user_id' => $user_id, 'password' => md5($password), 'email' => $email];

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

                $this->session->set_userdata($data_login);
                $this->session->set_userdata(['has_loggedin' => true]);

                redirect(base_url('laporan'));
            } else {

                $this->session->set_flashdata('message', 'Ada sesuatu yang salah');
                redirect(base_url('auth/registrasi'));
                return false;
            }
        }
    }

}
