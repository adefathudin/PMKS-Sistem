<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mailnotif extends Library {
    private $phpmailer;
    private $mail_to_briguna = 'allbriguna@bsminsbroker.com';
    private $logger_error;
    
    function __construct() {
        parent::__construct();
        
        $this->logger_error = new Loggerlib('logger_error');
        
        $this->phpmailer = new PHPMailer(FALSE);
        $this->phpmailer->SMTPDebug = 0;
        $this->phpmailer->isSMTP();
        $this->phpmailer->Host = 'mail.bsminsbroker.com';
        $this->phpmailer->SMTPAuth = TRUE;
        $this->phpmailer->Username = 'it-support@bsminsbroker.com';
        $this->phpmailer->Password = 'its#brisma#';
        $this->phpmailer->SMTPSecure = 'tls';
        $this->phpmailer->Port = 587;
        $this->phpmailer->setFrom('it-support@bsminsbroker.com');
    }
    
    public function send_to_all_briguna($data_nego){
        $this->phpmailer->addAddress($this->mail_to_briguna);
        $this->phpmailer->isHTML(TRUE);
        $this->phpmailer->Subject = 'Notifikasi Pengiriman Nego Premi ke BRI A/N '. $data_nego->nama;
        $this->phpmailer->Body = $this->_generate_html_content_briguna($data_nego);

        if(!$this->phpmailer->send()){
            $this->logger_error->write('Gagal kirim email', 'error', ['error_desc' => $this->phpmailer->ErrorInfo]);
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    private function _generate_html_content_briguna($data){
        $html = '<p>Dear Briguna Team,</p>
            <p>Pengiriman rate negosiasi premi ke BRI telah sukses dengan detail sebagai berikut :</p>
            <table style="width: 50%; margin-left: auto; margin-right: auto;" border="1" cellspacing="1" cellpadding="1">
            <tbody>
            <tr>
            <td>Nama</td>
            <td>: '.$data->nama.'</td>
            </tr>
            <tr>
            <td>Nomor Rekening Pinjaman</td>
            <td>: '.$data->norekening.'</td>
            </tr>
            <tr>
            <td>Rate Extra Premi Kredit</td>
            <td>: '.$data->premi_extra_asuransi_kredit.'</td>
            </tr>
            <tr>
            <td>Rate Extra Premi Jiwa</td>
            <td>: '.$data->premi_extra_asuransi_jiwa.'</td>
            </tr>
            <tr>
            <td>Rate Extra Premi Bundling</td>
            <td>: '.$data->premi_extra_asuransi_bundling.'</td>
            </tr>
            </tbody>
            </table>
            <p>Pengiriman telah dilakukan pada tanggal '.$data->tanggal_balas_bri.' dengan status sukses. Mohon jangan membalas e-mail ini dikarenakan e-mail ini adalah email otomatis dari sistem briguna bundling.</p>
            <p>Regards,</p>
            <p>IT Team</p>
            <p>&nbsp;</p>
            <p style="text-align: right;"><em><sub>This email has been generated on '.date('Y-m-d H:i:s').'</sub></em></p>';
        
        return $html;
    }
}