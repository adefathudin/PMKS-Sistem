<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Topup extends MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('rekening_m');
        $this->load->model('notifikasi_m');
        $this->load->model('mutasi_rekening_m');
        $this->load->model('topup_m');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $this->data['curdate'] = date('d-m-Y h:i:sa');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['title'] = 'Top-Up Saldo';
        $this->data['subview'] = 'rekening/topup';
        $this->load->view('_layout_main', $this->data);
    }

    public function insert(){

        $user_id = $this->input->get('user_id');
        $order_id = $this->input->get('order_id');
        $nominal = $this->input->get('nominal');
        $insert_topup = array (
            'user_id' => $user_id, 'topup_id' => $order_id, 'jenis_trx' => 2, 'nominal' => $nominal, 'status' => 0, 'keterangan_trx' => 'Top Up Saldo'
        );
        $this->topup_m->save($insert_topup);

        echo json_encode($insert_topup);
    }

    public function update(){
        $user_id = $this->session->userdata('user_id');
        $order_id = $this->input->get('order_id');
        
        $last_topup =  $this->topup_m->get_last($order_id);
        $saldo = $this->rekening_m->get($user_id);

        $update_saldo_rekening = array (
            'saldo_awal' => $saldo->saldo_akhir, 'saldo_akhir' => $saldo->saldo_akhir + $last_topup->nominal,
            'total_nominal_cash_in' => $saldo->total_nominal_cash_in + $last_topup->nominal, 'total_cash_in' => $saldo->total_cash_in + 1
        );

        $insert_notifikasi = array (
            'user_id' => $user_id, 'judul' => 'Topup Saldo Berhasil', 'isi' => 'Topup saldo senilai Rp. '.$last_topup->nominal.' berhasil dilakukan. Silahkan hubungi kami jika mengalami kendala'
        );

        $insert_mutasi_rekening = array (
            'user_id' => $user_id, 'jenis_trx' => 1, 'nominal' => $last_topup->nominal, 'keterangan_trx' => 'Top Up'
        );

        if ($this->topup_m->save(array ('status' => 1),$order_id)){
            $this->rekening_m->save($update_saldo_rekening, $user_id);
            $this->mutasi_rekening_m->save($insert_mutasi_rekening);
            $this->notifikasi_m->save($insert_notifikasi);  

        };
    }


}
