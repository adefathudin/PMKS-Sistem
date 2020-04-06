<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

    public function index() {
        
        $this->data['title'] = 'Laporan';
        $this->data['subview'] = 'laporan/index';
        $this->load->view('_layout_main', $this->data);
    }


}
