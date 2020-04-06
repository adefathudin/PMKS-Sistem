<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Simpanan extends MY_Controller {

    function __construct(){
        parent::__construct();
                
        $this->load->model('simpan_grup_m');
        $this->load->model('rekening_m');
        $this->load->model('mutasi_rekening_m');
        $this->load->model('grup_m');
        $this->load->model('users_detail_m');
        $this->load->model('notifikasi_m');
        $this->load->model('rekening_m');
        $this->load->model('grup_user_m');
        $this->load->model('simpan_grup_m');
        $this->load->model('mutasi_rekening_m');
    }

    public function index()
    {
        $this->data['title'] = 'Koperasi Saloome';
        $this->data['subview'] = 'koperasi/group';
        $this->load->view('_layout_main', $this->data);
    }
    
    //PROSES PENGAJUAN PINJAMAN
    public function data_simpanan_grup(){

        $user_id = $this->session->userdata('user_id');
        $grup_id = $this->input->get('grup_id');

        $data = $this->simpan_grup_m->get_simpanan_grup($user_id,$grup_id);
        echo json_encode($data);

        
    }
    public function proses_pembayaran_simpan(){
        
        $user_id = $this->session->userdata('user_id');
        $grup_id = $this->input->post('grup_id');
        $grup_user_id = $this->input->post('grup_user_id');
        $grup_name = $this->input->post('grup_name');
        $maksimal_pinjaman = $this->input->post('maksimal_pinjaman');
        $jenis_simpanan = $this->input->post('jenis_simpanan');
        $nominal_simpanan = $this->input->post('nominal_simpanan');
        $periode = $this->input->post('periode_simpanan');        
        $saldo_koperasi = $this->input->post('saldo_koperasi');        
        $minimal_pokok = $this->input->post('minimal_pokok');        
        $minimal_wajib = $this->input->post('minimal_wajib');        
        $rek = $this->rekening_m->get($user_id);

        //jika simpanan pokok, maka mengecek apakah simpanan pokok sudah pernah dibayar atau tidak
        if ($jenis_simpanan == "Pokok"){
            if ($minimal_pokok != $nominal_simpanan){
                $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b><br> Nominal simpanan pokok yang diinput Rp<b>'.number_format($nominal_simpanan).'</b> tidak sama dengan nominal pokok yang telah ditentukan Rp<b>'.number_format($minimal_pokok).'</b>');
                redirect ('grup/'.$grup_id.'/simpan');
            } else if ($rek->saldo_akhir < $nominal_simpanan) {
                $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b><br> Saldo anda tidak mencukupi untuk membayar Simpanan Pokok');
                redirect ('grup/'.$grup_id.'/simpan_pinjam');
            } 
            else {
            $cek_simpanan = $this->simpan_grup_m->get_cek_belum_simpanan_pokok($user_id,$grup_id);
            $periode = "-";}

        //jika simpanan wajib

        } elseif ($jenis_simpanan == "Wajib"){
            if ($minimal_wajib != $nominal_simpanan){
                $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b><br> Nominal simpanan wajib yang diinput Rp<b>'.number_format($nominal_simpanan).'</b> tidak sama dengan nominal wajib yang telah ditentukan Rp<b>'.number_format($minimal_wajib).'</b>');
                redirect ('grup/'.$grup_id.'/simpan_pinjam');

            } else if ($rek->saldo_akhir < $nominal_simpanan) {
                $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b><br> Saldo anda tidak mencukupi untuk membayar Simpanan Wajib');
                redirect ('grup/'.$grup_id.'/simpan_pinjam');
            }
            else {                
            $cek_simpanan = $this->simpan_grup_m->get_cek_belum_simpanan($user_id,$grup_id);}
        } elseif ($jenis_simpanan == "Sukarela"){           
            $periode = "-";
        } elseif ($jenis_simpanan == "null"){            
            $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b> Silahkan pilih jenis simpanan');
            redirect ('grup/'.$grup_id.'/simpan_pinjam');
        }
        if ($cek_simpanan == 0){

        $update_saldo = array (
            'saldo_awal' => $rek->saldo_akhir, 'saldo_akhir' => ($rek->saldo_akhir - $nominal_simpanan),
            'saldo_koperasi' => ($rek->saldo_koperasi + $nominal_simpanan)
        );

        $data_simpanan = array(
            'user_id' => $user_id, 'grup_id' => $grup_id,
            'jenis_simpanan' => $jenis_simpanan, 'periode' => $periode, 'nominal' => $nominal_simpanan
        );

        $insert_mutasi = array (
            'user_id' => $user_id, 'jenis_trx' => '4', 'nominal' => $nominal_simpanan,
            'keterangan_trx' => 'Simpanan '.$jenis_simpanan.' '.$grup_name
        );

        $update_grup_user =  array (
            'saldo_koperasi' => $saldo_koperasi + $nominal_simpanan, 'limit_pinjaman' => ((($saldo_koperasi + $nominal_simpanan) * $maksimal_pinjaman)/100) 
        );
        if ($this->simpan_grup_m->save($data_simpanan)){     
            $this->rekening_m->save($update_saldo,$user_id);
            $this->mutasi_rekening_m->save($insert_mutasi);
            $this->grup_user_m->save($update_grup_user,$grup_user_id);
            $this->session->set_flashdata('simpan_berhasil','Anda berhasil melakukan pembayaran simpanan grup '.$grup_name);
                redirect ('grup/'.$grup_id.'/simpan_pinjam');
            }
        } else {
            $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b><br> Simpanan '.$jenis_simpanan.' periode '.substr($periode,0,7).' sudah pernah dilakukan sebelumnya');
        }
        redirect ('grup/'.$grup_id.'/simpan_pinjam');
    }

    /*
    fungsi untuk menampilkan mutasi simpanan satu grup
    */
    
    public function list_simpanan_by_grup(){        
        $grup_id=$this->input->get('grup_id');
        $data = $this->simpan_grup_m->get_simpanan_by_grup($grup_id);
        echo json_encode($data);
    }
    
}
