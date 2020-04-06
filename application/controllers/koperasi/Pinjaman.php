<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Pinjaman extends MY_Controller {

    function __construct(){
        parent::__construct();
                
        $this->load->model('pinjam_grup_m');
        $this->load->model('rekening_m');
        $this->load->model('mutasi_rekening_m');
        $this->load->model('grup_user_m');
        $this->load->model('cicilan_pinjaman_m');
    }

    public function index()
    {
        $this->data['title'] = 'Koperasi Saloome';
        $this->data['subview'] = 'koperasi/group';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function total_simpanan()
    {
        
    }
    
    //PROSES PENGAJUAN PINJAMAN
    public function proses_pengajuan_pinjaman(){

        $user_id = $this->session->userdata('user_id');
        $grup_id = $this->input->post('grup_id');
        $grup_name = $this->input->post('grup_name');
        $grup_user_id = $this->input->post('grup_user_id');
        $nominal_pinjaman = $this->input->post('nominal_pinjaman');
        $tenor = $this->input->post('tenor');
        $tujuan = $this->input->post('tujuan_pinjaman');   
        $maksimal_pinjaman = $this->input->post('maksimal_pinjaman');  
        $limit_pinjaman = $this->input->post('limit_pinjaman');   
        $saldo_koperasi = $this->input->post('saldo_koperasi');
        $nominal_cicilan = $this->input->post('nominal_cicilan');

        $set = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $id_pinjaman = substr(str_shuffle($set), 0, 12);
             
        $rek = $this->rekening_m->get($user_id);
        $grup_user = $this->grup_user_m->grup_user($user_id,$grup_id);
        
        $update_saldo = array (
            'saldo_awal' => $rek->saldo_akhir, 'saldo_akhir' => ($rek->saldo_akhir + $nominal_pinjaman),
            'saldo_koperasi' => ($rek->saldo_koperasi - $nominal_pinjaman)
        );

        $update_grup_user = array (
            'limit_pinjaman' => $limit_pinjaman - $nominal_pinjaman
        );

        $data_pinjaman = array(
            'id_pinjaman' => $id_pinjaman, 'user_id' => $user_id, 'grup_id' => $grup_id,
            'nominal' => $nominal_pinjaman, 'tenor' => $tenor, 'tujuan' => $tujuan
        );
        $insert_mutasi = array (
            'user_id' => $user_id, 'jenis_trx' => '3', 'nominal' => $nominal_pinjaman,
            'keterangan_trx' => 'Pinjaman dari '.$grup_name
        );
        if ($this->pinjam_grup_m->save($data_pinjaman)){     
            $this->rekening_m->save($update_saldo,$user_id);

            /*
                insert cicilan berdasarkan tenor pinjaman
            */
    
            $periode = 1;
            for ($i=0; $i < $tenor; $i++){
            $update_cicilan_pinjaman = array (
                'id_pinjaman' => $id_pinjaman, 'user_id' => $user_id, 'grup_id' => $grup_id,
                'periode' => $periode++, 'nominal' =>  $nominal_cicilan, 'status_bayar' => 0
            );
    
            $this->cicilan_pinjaman_m->save($update_cicilan_pinjaman);        
            }

            $this->mutasi_rekening_m->save($insert_mutasi);
            $this->grup_user_m->save($update_grup_user,$grup_user_id);
            }            
            $this->session->set_flashdata('simpan_berhasil','Anda berhasil mengajukan pinjaman sebesar Rp.'.$nominal_pinjaman);

        redirect ('grup/'.$grup_id.'/simpan_pinjam');
    }
    
    /*
    fungsi untuk menampilkan mutasi pinjaman satu grup
    */
    
    public function list_pinjaman_by_grup(){        
        $grup_id=$this->input->get('grup_id');
        $data = $this->pinjam_grup_m->get_pinjaman_by_grup($grup_id);
        echo json_encode($data);
    }

    public function list_pinjaman_by_id_pinjaman(){        
        $id_pinjaman=$this->input->get('id_pinjaman');
        $data = $this->pinjam_grup_m->get_pinjaman_by_id_pinjaman($id_pinjaman);
        echo json_encode($data);
    }

    /*
    fungsi bayar pinjaman
    */
    public function bayar_pinjaman(){
        $cicilan_pinjaman_id = $this->input->post('cicilan_pinjaman_id');
        $user_id = $this->session->userdata('user_id');
        $id_pinjaman = $this->input->post('id_pinjaman');    
        $grup_id=$this->input->post('grup_id');  
        $id_pinjam_grup=$this->input->post('id_pinjam_grup'); 
        $grup_user_id=$this->input->post('grup_user_id');
        $periode = $this->input->post('periode');
        $nominal_cicilan = $this->input->post('nominal_cicilan');
        $cicilan_berjalan = $this->input->post('cicilan_berjalan');
        $sisa_cicilan = $this->input->post('sisa_cicilan');
        $limit_pinjaman = $this->input->post('limit_pinjaman');
        $saldo_awal = $this->input->post('saldo_awal');
        $saldo_akhir = $this->input->post('saldo_akhir');
        
        //update table pinjam_grup
        $pinjam_grup =  array (
            'cicilan_berjalan' => $cicilan_berjalan + 1,
            'sisa_cicilan' => $sisa_cicilan - $nominal_cicilan
        );

        //update table grup_user
        $grup_user = array ('limit_pinjaman' => $limit_pinjaman);

        //update rekening
        $rekening = array (
            'saldo_awal' => $saldo_akhir, 'saldo_akhir' => $saldo_awal - $nominal_cicilan
        );

        //update mutasi_rekening 
        $insert_mutasi = array (
            'user_id' => $user_id, 'jenis_trx' => '4', 'nominal' => $nominal_cicilan,
            'keterangan_trx' => 'Pembayaran pinjaman senilai '.$nominal_cicilan
        );


    //print_r($pinjam_grup);
    //echo $id_pinjam_grup;
        //update status pinjaman
        $this->pinjam_grup_m->save($pinjam_grup, $id_pinjam_grup);
        $this->grup_user_m->save($grup_user, $grup_user_id);
        $this->rekening_m->save($rekening, $user_id);
        $this->mutasi_rekening_m->save($insert_mutasi);
        $this->cicilan_pinjaman_m->save(array('status_bayar' => '1'), $cicilan_pinjaman_id);
        redirect ('grup/'.$grup_id.'/simpan_pinjam');

    }
    
}
