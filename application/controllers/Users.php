<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(['users_detail_m']);
    }

    public function index() {
        $this->data['title'] = 'Users';
        $this->data['subview'] = 'users/index';

        $this->data['approve'] = $this->users_detail_m->get_by(['verifikasi' => 2, 'aktif' => 1]);
        $this->data['users'] = $this->users_detail_m->get();

        $this->load->view('_layout_main', $this->data);
    }

    public function approve() {

        $user_id = $this->input->get('user_id');

        $approve = $this->users_detail_m->save_where(['verifikasi' => 1], ['user_id' => $user_id]);
        if ($approve) {
            echo ("<script>window.alert('User berhasil diapprove!');window.history.back();</script>");
        } else {
            echo ("<script>window.alert('Something is wrong');window.history.back();</script>");
        }
    }

    public function reject() {


        $user_id = $this->input->get('user_id');

        $reject = $this->users_detail_m->save_where(['verifikasi' => 0], ['user_id' => $user_id]);
        if ($reject) {
            echo ("<script>window.alert('User berhasil direject!');window.history.back();</script>");
        } else {
            echo ("<script>window.alert('Something is wrong');window.history.back();</script>");
        }
    }

}
