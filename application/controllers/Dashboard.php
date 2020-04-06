<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('notifikasi_m');
    }

    public function index()
    {
        
        $this->data['title'] = 'Warung Koperasi Solusi Masyarakat Sejahtera';
        $this->data['subview'] = 'dashboard/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function saldo(){
        $user_id = $this->input->get('user_id');
        $data = $this->rekening_m->get_saldo($user_id);
        echo json_encode($data);
    }
    
    public function saldo_all(){
        $data = $this->rekening_m->get_saldo_all();
        echo json_encode($data);
    }
    
    public function grup_all(){
        $data = $this->grup_m->count();
        echo json_encode($data);
    }
    
    public function total_grup(){
        $user_id = $this->input->get('user_id');
        $data = $this->grup_user_m->get_total_grup($user_id);
        echo json_encode($data);
    }

    public function notifikasi(){

        $user_id = $this->input->get('user_id');
        $data = $this->notifikasi_m->cek_notifikasi($user_id);
        echo json_encode($data);
    }

    public function notifikasi_by_id(){
        
        $id = $this->input->get('id');
        $data = $this->notifikasi_m->cek_notifikasi_by_id($id);
        echo json_encode($data);
    }

    public function update_baca_notifikasi(){
        
        $id = $this->input->get('id');
        $this->notifikasi_m->save(array('baca'=> 1), $id);
    }

}
