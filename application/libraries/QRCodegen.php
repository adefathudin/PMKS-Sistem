<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class QRCodegen extends Library{
    private $string;
    private $qrcode;
    private $_tmp_path;
    private $logger;
    
    function __construct($string) {
        parent::__construct();
        
        $this->string = $string;
        $this->_tmp_path = sys_get_temp_dir();
        
        $_path_endroid_qrcode = APPPATH . 'third_party/vendor/endroid/qr-code';
        $_path_bsm_logo = FCPATH . 'assets/images/brisma-logo-with-background.png';
        
        $_str = $this->_savetokencode();
        $this->qrcode = new QrCode($_str);
        
        $this->qrcode->setWriterByName('png');
        $this->qrcode->setEncoding('UTF-8');
        $this->qrcode->setErrorCorrectionLevel(new ErrorCorrectionLevel(ErrorCorrectionLevel::HIGH));
        $this->qrcode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $this->qrcode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        //$this->qrcode->setLabel('Scan the code', 16, $_path_endroid_qrcode . 'assets/fonts/noto_sans.otf', LabelAlignment::CENTER);
        $this->qrcode->setLogoPath($_path_bsm_logo);
        $this->qrcode->setLogoWidth(85);
        $this->qrcode->setRoundBlockSize(true);
        $this->qrcode->setValidateResult(false);
    }
    
    public function write_to_file(&$message = NULL) {
        try {
            $dest_file = $this->_tmp_path . '/' . time() . '.png';
            $this->qrcode->writeFile($dest_file);
            
            return $dest_file;
        } catch (Exception $ex) {
//            $this->logger->write_log('Generating qrcode : ('.$ex->getCode().') '.$ex->getMessage(), 'error');
            $message = $ex->getMessage();
            
            return FALSE;
        }
    }
    
    private function _savetokencode() {
        $this->ci->load->model(['token_m']);
        
        // generate token from string
        $token = $this->_generatetoken();
        
        // save token and return to qrcode
        $save = $this->ci->token_m->save([
            'token'     => $token['token'],
            'data'      => $token['data'],
            'created_by' => 0
        ]);
        
        if($save) {
            // return as url to validate token
            return base_url('validation/qrcode/') . $token['token'];
        }
    }
    
    private function _generatetoken() {
        $str = [
            'type'  => 'EV-BSM',
            'datetime'  => time(),
            'string'    => $this->string
        ];
        
        $return['data'] = json_encode($str);
        $return['token'] = hash('md5', $return['data']);
        
        return $return;
    }
}
