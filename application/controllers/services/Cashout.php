<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Cashout extends MY_Controller {

    function __construct(){
        parent::__construct();        
        $this->load->model('rekening_m');
        $this->load->model('rekening_m');
        $this->load->model('mutasi_rekening_m');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $this->data['curdate'] = date('d-m-Y h:i:sa');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['title'] = 'Tarik Saldo Rekening';
        $this->data['subview'] = 'rekening/cashout';
        $this->load->view('_layout_main', $this->data);
    }

    public function proses($user_id = null){

        $user_id = $this->session->userdata('user_id');
        $email = $this->session->userdata('email');
        $nominal_cashout = $this->input->post('nominalCashout');
        $rek = $this->rekening_m->get($user_id);
        $update_saldo = array (
            'saldo_awal' => $rek->saldo_akhir, 'saldo_akhir' => ($rek->saldo_akhir - $nominal_cashout),
            'saldo_beku' => ($rek->saldo_beku + $nominal_cashout), 
            'total_nominal_cash_out' => ($rek->total_nominal_cash_out + $nominal_cashout),
            'total_cash_out' => ($rek->total_cash_out + 1)
        );
        $insert_mutasi = array (
            'user_id' => $user_id, 'jenis_trx' => '2', 'nominal' => $nominal_cashout,
            'saldo_awal' => $rek->saldo_akhir, 'saldo_akhir' => ($rek->saldo_akhir - $nominal_cashout)
        );
        if (md5($this->input->post('password')) == $this->session->userdata('password')){
            $this->rekening_m->save($update_saldo, $user_id);
            $this->mutasi_rekening_m->save($insert_mutasi);
            $this->session->set_flashdata('pesan_cashout','Penarikan saldo rekening sebesar Rp'.number_format($nominal_cashout).' telah berhasil. Dana akan masuk ke rekening anda paling lambat 1x24 jam');
            //panggil function mail_cashout untuk kirim email
            $this->mail_cashout($email,$nominal_cashout);
                } 
        redirect ('rekening/cashout');
    }

        public function mail_cashout($email = null, $nominal_cashout = null){                  
            //set up email
            $config = array(
                'protocol' => 'smtp', 'smtp_host' => 'mail.warungkoperasi.my.id', 'smtp_port' => 587,
                'smtp_user' => 'no-reply@warungkoperasi.my.id', 'smtp_pass' => 'hancamacul', 
                'smtp_username' => 'no-reply@warungkoperasi.my.id', 'mailtype' => 'html', 'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $message =  "<html><head><title>Penarikan Saldo Rekening WarungKoperasi</title></head><body>
                    <p>Yang terhormat,<br><br>
                    Anda baru saja melakukan penarikan saldo rekening <a href='".base_url()."' target='_blank'><strong>WarungKoperasi</strong></a> sebesar Rp<b>".number_format($nominal_cashout)."</b>.<br>Jika anda tidak merasa melakukannya, silahkan hubungi kami melalui email <a href='mailto:support@warungkoperasi.my.id'>support@warungkoperasi.my.id</a>.<br>Terima kasih<br><br><br>Best Regards,<br><b>WarungKoperasi Team<b></p></body></html>";
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($config['smtp_user'], 'WarungKoperasi');
                    $this->email->to($email);
                    $this->email->subject('Penarikan Saldo Rekening WarungKoperasi');
                    $this->email->message($message);
                    //sending email
                    if($this->email->send()){
                    }else{
                        $this->session->set_flashdata('message', $this->email->print_debugger());
                    }
            }

}
