<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Grup extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('grup_m');
        $this->load->model('users_detail_m');
        $this->load->model('notifikasi_m');
        $this->load->model('rekening_m');
        $this->load->model('grup_user_m');
        $this->load->model('simpan_grup_m');
        $this->load->model('pinjam_grup_m');
        $this->load->model('mutasi_rekening_m');
        $this->load->model('cicilan_pinjaman_m');
    }
    
    public function index1()
    {
        $this->data['title'] = 'Koperasi Saloome';
        $this->data['subview'] = 'koperasi/group';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function index()
    {
        
        $nama_grup = $this->input->get('nama_grup');  
        $wilayah = $this->input->get('wilayah');      
        $minimal_pokok = $this->input->get('minimal_pokok');      
        $minimal_wajib = $this->input->get('minimal_wajib');      
        $maksimal_pinjaman = $this->input->get('maksimal_pinjaman');   
        $rate = $this->input->get('rate'); 
        $this->data['list_grup_search'] = $this->grup_m->get_grup_search($nama_grup,$wilayah,$minimal_pokok,$minimal_wajib,$maksimal_pinjaman,$rate);
        $this->data['title'] = 'Explore Grup Koperasi';
        $this->data['subview'] = 'koperasi/grup_search';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete(){
        $grup_id=$this->input->post('grup_id');
        $data=$this->grup_m->hapus($grup_id);
        echo json_encode($data);
    }

    public function id($grup_id = null )
    {         
        $user_id = $this->session->userdata('user_id');
        $grup_id = $this->uri->segment(2);

        //JIKA HALAMAN SIMPAN PINJAM DI GRUP DIBUKA
        if ($this->uri->segment(3) == 'simpan_pinjam'){
            $this->load->model('simpan_grup_m');
            $this->data['simpanan_grup'] = $this->simpan_grup_m->get_simpanan_grup($user_id,$grup_id);
            //cek periode pinjaman
            $this->data['cek_periode_pinjaman_pokok'] = $this->simpan_grup_m->get_cek_belum_simpanan_pokok($user_id,$grup_id);
            $this->data['cek_periode_pinjaman_wajib'] = $this->simpan_grup_m->get_cek_belum_simpanan($user_id,$grup_id);

            $this->load->model('pinjam_grup_m');
            $this->data['pinjaman_grup'] = $this->pinjam_grup_m->get_pinjaman_grup($user_id,$grup_id);
            $this->data['pinjaman_berjalan'] = $this->cicilan_pinjaman_m->get_hitung_belum_bayar($user_id,$grup_id);
            $this->data['semua_pinjaman'] = $this->cicilan_pinjaman_m->get_hitung_sudah_bayar($user_id,$grup_id);
            $this->data['total_pinjaman'] = $this->cicilan_pinjaman_m->get_hitung_total_pinjaman($user_id,$grup_id);
        }
        
        $this->data['grup_user'] = $this->grup_user_m->grup_user($user_id,$grup_id);
        $this->data['grup_id'] = $grup_id;
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        //$this->data['list_data_all_user'] = $this->users_detail_m->get_data_all_user();
        $this->data['data_grup_tmp'] = $this->grup_m->get($grup_id); 
        
        $this->data['title'] = ucwords($this->grup_m->get($grup_id)->nama_grup);
        $this->data['subview'] = 'koperasi/grup';
        $this->load->view('_layout_main', $this->data);
        
    }

    //BUAT GRUP BARU
    public function new(){
        $user_id = $this->session->userdata('user_id');
        $grup_id = md5(uniqid());
        $nama_grup = ucwords($this->input->post('nama_grup'));  
        $wilayah = $this->input->post('wilayah');      
        $kategori = $this->input->post('kategori');       
        $about = $this->input->post('tentang');    
        $deskripsi = 'Deskripsi grup '.$nama_grup;
        if ($nama_grup != "" and $about != ""){
        
        /*
        insert data ke table grup_user
        */
        $insert_data_grup =  array(
            'grup_id'=>$grup_id, 'nama_grup' => $nama_grup, 'wilayah' => $wilayah, 'about' => $about,
             'kategori' => $kategori
        );  
        
        $insert_grup_user =array (
            'grup_id' => $grup_id, 'user_id' => $user_id, 'status_user' => 'admin'
        );
        if ($this->grup_user_m->save($insert_grup_user)){
            $this->grup_m->save($insert_data_grup);
            $this->session->set_flashdata('new_grup','Grup baru berhasil dibuat');
            }
        }
        redirect ('grup/'.$grup_id.'/index');
    }
    
    //UPDATE  DATA PROFIL
    public function update_identitas(){
        
        $grup_id = $this->input->post('grup_id');  
        $nama_grup = ucwords($this->input->post('nama_grup'));  
        $wilayah = $this->input->post('wilayah');      
        $kategori = $this->input->post('kategori');       
        $about = $this->input->post('about');          
        $deskripsi = nl2br($this->input->post('deskripsi')); 
        $config_banner = array(
            'upload_path' => './assets/img/grup_koperasi/', 'allowed_types' => 'jpg|jpeg', 
            'file_name' => $grup_id.'.jpg', 'overwrite' => TRUE
        );
        $update_data_grup =  array(
            'nama_grup' => $nama_grup, 'wilayah' => $wilayah, 'about' => $about,  'kategori' => $kategori, 'deskripsi' => $deskripsi,
            'banner' => $grup_id.'.jpg'
            );  
        $this->load->library('upload', $config_banner);
        if ($this->grup_m->save($update_data_grup, $grup_id)){
            $this->upload->do_upload('banner');
            $this->session->set_flashdata('pesan_perubahan','Perubahan berhasil disimpan');
           redirect ('grup/'.$grup_id.'/index');
        }
    }

    //Setting nominal minimal pinjaman dan simpanan
    public function update_finance(){
          
        $grup_id = $this->input->post('grup_id');  
        $minimal_pokok = ucwords($this->input->post('minimal_pokok'));  
        $minimal_wajib = $this->input->post('minimal_wajib');      
        $maksimal_pinjaman = $this->input->post('maksimal_pinjaman');    
        $update_finance_grup =  array(
            'minimal_pokok' => $minimal_pokok, 'minimal_wajib' => $minimal_wajib, 'maksimal_pinjaman' => $maksimal_pinjaman
            );  
        if ($this->grup_m->save($update_finance_grup, $grup_id)){
            $this->session->set_flashdata('pesan_perubahan','Perubahan berhasil disimpan');
            redirect ('grup/'.$grup_id.'/index');
        }
    }



    // join grup
    public function join(){
        
        $user_id = $this->input->post('user_id');
        $grup_id = $this->input->post('grup_id');
        $request = $this->input->post('request_grup');
        $insert_grup_user = array (
            'grup_id' => $grup_id, 'user_id' => $user_id, 'status_user' => 'request'
        );
        $this->grup_user_m->save($insert_grup_user);    
    }

    //simpan rate grup
    public function rate_grup(){
        
        $grup_id = $this->input->post('grup_id');
        $id = $this->input->post('id_grup_user');
        $rating = $this->input->post('rating');
        $comment_rate = $this->input->post('comment_rate');

        $get_rating = $this->grup_m->get_info_grup($grup_id);
        if ($get_rating->rate_total == 0){
            $rate_akumulatif = $rating; 
        } else {
            $rate_akumulatif = ($get_rating->rate_total) / $get_rating->rate_person;
        }

        $update_rating = array (
            'rate_total' => $get_rating->rate_total + $rating, 'rate_person' => $get_rating->rate_person + 1,
            'rate_akumulatif' => $rate_akumulatif
        );
        if ($this->grup_user_m->save(array('rate' => $rating, 'komentar' => $comment_rate), $id)){
            $this->grup_m->save($update_rating, $grup_id);
        };
        redirect ('grup/'.$grup_id.'/index');
    }

    //join grup
    public function accept(){
        
        $id = $this->input->post('id');
        $user_id = $this->input->post('user_id');
        $nama_grup = $this->input->post('nama_grup');
        $update_grup_user = array (
            'status_user' => 'member'
        );
        $insert_notifikasi = array (
            'user_id' => $user_id, 'judul' => 'Status Join Grup', 'isi'=> 'Anda telah disetujui bergabung dengan grup koperasi '.$nama_grup
        );
        if ($this->grup_user_m->save($update_grup_user, $id)){
            $this->notifikasi_m->save($insert_notifikasi);
        }

    }

    //reject grup
    public function reject(){

        $id = $this->input->post('id');
        $this->grup_user_m->delete($id);

    }

    public function list_request(){        
        $grup_id=$this->input->get('grup_id');
        $data = $this->grup_user_m->get_list_request($grup_id);
        echo json_encode($data);
    }

    //Kick Member Grup

    public function kick(){
        
        $id = $this->input->post('id');
        $this->grup_user_m->delete($id);
    }

    public function list_member(){        
        $grup_id=$this->input->get('grup_id');
        $data = $this->grup_user_m->get_list_member($grup_id);
        echo json_encode($data);
    }

    public function list_admin(){        
        $grup_id=$this->input->get('grup_id');
        $data = $this->grup_user_m->get_list_admin($grup_id);
        echo json_encode($data);
    }
}
