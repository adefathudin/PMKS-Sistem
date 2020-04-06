<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends MY_Controller {
    public function index()
    {
        $this->load->model('rekening_m');
        $this->load->model('grup_m');
        $user_id = $this->session->userdata('user_id');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['list_grup_limit_3'] = $this->grup_m->get_list_grup_limit_3();
        $this->data['title'] = 'Warung Koperasi Solusi Masyarakat Sejahtera';
        $this->data['subview'] = 'admin/dashboard';
        $this->load->view('_layout_main', $this->data);
    }

    public function report(){
        $this->load->view('admin/layout/report');
    }
    public function member(){
        $this->load->view('admin/layout/member');
    }
}