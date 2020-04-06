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
        $delete_user = $this->users_detail_m->delete($id);

        if ($delete_user) {
            $output['status'] = true;
            $output['message'] = "Data user berhasil dihapus";
        } else {
            $output['status'] = false;
            $output['message'] = "Something wrong";
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
        
        if ($nik == "" || $nama_lengkap == "" || $email == "" || $level == ""){
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
            
//          Generate qrcode
            
            $this->load->library('qrcode/ciqrcode'); //pemanggilan library QR CODE

            $config['cacheable']    = true; //boolean, the default is true
            $config['imagedir']     = 'assets/img/user/qrcode/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);

            $qrcode = $user_id;
            $image_name=$qrcode.'.png'; //buat name dari qr code sesuai dengan user_id

            $params['data'] = $qrcode; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            $data_login = ['user_id' => $user_id, 'password' => md5('password123'), 'email' => $email, 'qrcode' => $qrcode];
            
            $data_user = [
                'user_id' => $user_id,
                'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'email' => $email,
                'rt' => $rt,
                'rw' => $rw,
                'level' => $level,
                'kode_unik'=> rand(),
                'verifikasi_email' => 0,
                'verifikasi_nomor_hp' => 1,
                'qrcode' => $qrcode
            ];
            
            $insert_notifikasi = ['user_id' => $user_id, 'judul' => 'Selamat Datang di WarungKoperasi', 'isi' => 'Kami berharap, Anda dan Kami bisa menjadi mitra yang Hebat ^_^'];  

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
    
       /*    
        $config = array(
          'protocol' => 'smtp',
            'smtp_host' => 'mail.warungkoperasi.my.id',
            'smtp_port' => 587,
            'smtp_user' => 'no-reply@warungkoperasi.my.id',
            'smtp_pass' => 'hancamacul',
            'smtp_username' => 'no-reply@warungkoperasi.my.id',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
          );
          $message =  "
          <html>
          <head>
          <title>Verifikasi E-Mail WarungKoperasi</title>
          </head>
          <body>
          <p>
          Selamat datang <b>".$nama_lengkap."</b>,
          <br><br>Terima kasih telah bergabung bersama kami, <a href='".base_url()."' target='_blank'><strong>WarungKoperasi</strong></a>. Akun anda saat ini belum sepenuhnya aktif, silahkan
          klik link dibawah ini untuk mengaktifkannya:<br><br>

          <a href='".base_url()."auth/aktivasi/".$this->session->userdata('user_id')."/".$code."'>".base_url()."auth/aktivasi/".$this->session->userdata('user_id')."/".$code."</a>
          <br><br>
          Jika anda tidak merasa melakukan registrasi, silahkan abaikan email ini.
          <br>Terima kasih
          <br><br><br>
          Best Regards,
          <br><b>WarungKoperasi Team</b></p>
          </body>
          </html>
          ";
            
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user'], 'WarungKoperasi');
            $this->email->to($email);
            $this->email->subject('Selamat Datang di WarungKoperasi');
            $this->email->message($message);

                //sending email
            if($this->email->send()){
            }
            else{
              //$this->session->set_flashdata('message', $this->email->print_debugger());    
            }  
          }
          redirect('dashboard');
        }       
    }
        
        */
    }
}
