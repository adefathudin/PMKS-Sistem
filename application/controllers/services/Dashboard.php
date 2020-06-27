<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model(['notifikasi_m']);
    }

    public function get_notifikasi_get() {

        $user_id = $this->get('user_id');
        $level = $this->get('level');

        if (isset($user_id)) {
            $notifikasi = $this->notifikasi_m->get_by(['user_id' => $user_id, 'baca' => false]);
        } else {
            $notifikasi = $this->notifikasi_m->get_by(['level' => $level, 'baca' => false]);
        }

        if ($notifikasi) {
            $output['status'] = true;
            $output['result'] = $notifikasi;
        } else {
            $output['status'] = false;
            $output['message'] = "Data not available";
        }

        $this->response($output);
    }

    public function get_detail_notifikasi_get() {

        $notifikasi_id = $this->get('notifikasi_id');
        $result = $this->notifikasi_m->get_by(['notifikasi_id' => $notifikasi_id]);

        if ($result) {
            $output['status'] = true;
            $output['result'] = $result;
            $this->notifikasi_m->save(['baca' => 1], $notifikasi_id);
        } else {
            $output['status'] = false;
            $output['message'] = "Something wrong";
        }

        $this->response($output);
    }

}
