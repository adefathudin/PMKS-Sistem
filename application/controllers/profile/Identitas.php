<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Identitas extends MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('users_detail_m');

    }
    public function lampiran(){

        $user_id = $this->session->userdata('user_id');
        $nama_ktp = $user_id.'_KTP.jpeg';
        $nama_profile = $user_id.'_PP.jpeg';

        $ktp = $this->input->post('value_ktp'); 
        $pp = $this->input->post('value_profile'); 
        if ($ktp != "" and $pp != ""){
        list($type, $ktp) = explode(';', $ktp);
        list(, $ktp)      = explode(',', $ktp);
        list($type, $pp) = explode(';', $pp);
        list(, $pp)      = explode(',', $pp);
        $ktp = base64_decode($ktp);
        $pp = base64_decode($pp);
        $insert_ktp_pp =  array(
            'ktp'=>$nama_ktp, 'profil' => $nama_profile, 'status_approve' => 2
            );  
        if ($this->users_detail_m->save($insert_ktp_pp, $user_id)){
            file_put_contents('assets/img/user/ktp/'.$nama_ktp, $ktp);
            file_put_contents('assets/img/user/profile/'.$nama_profile, $pp);
            $this->session->set_flashdata('pesan_perubahan','Perubahan berhasil disimpan');
            $this->session->set_flashdata('pesan_lampiran','<i class="fas fa-fw fa-info-circle"></i> Foto Profil dan Kartu Identitas Berhasil diupload');
            }
        }
        redirect ('user/'.$user_id);
    }

    public function data($user_id = null){
        
        $user_id = $this->input->post('user_id');
        $nomor_hp = $this->input->post('nomor_hp');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
        $about = $this->input->post('about');
        $data = array(
            'nama_lengkap' => $nama_lengkap, 'tempat_lahir' => $tempat_lahir, 'nomor_hp' => $nomor_hp,
            'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat, 'about' => $about
        );
        $this->users_detail_m->save($data, $user_id);  
        $this->session->set_flashdata('update_identitas','Profil berhasil diperbarui');       
        redirect ('user/'.$user_id);   
    }
}