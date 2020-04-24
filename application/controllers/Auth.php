<?php

class Auth extends MY_Controller {

    public function index() {

        if (!empty($this->session->userdata('has_loggedin'))) {
            redirect('laporan');
            exit();
        }
        $this->load->view('login');
    }

    public function cek_login() {

        $email = $this->input->post('email');
        $user_id = md5($this->input->post('email'));
        $password = md5($this->input->post('password'));
        $qrcode = $this->input->get('qrcode');

        $login_service = $this->userlib->login($email, $password);
        if ($login_service) {
            redirect(base_url('laporan'));
        } else {
            $this->session->set_flashdata('message', 'user atau password salah');
            redirect(base_url('auth'));
        }
    }

    //LOGOUT
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

}
