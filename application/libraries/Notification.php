<?php

/*
created by @garaulo on May 3, 2019
fauziansyah26@gmail.com
*/

use WebSocket\Client;

class Notification extends Library {
    private $_websocket_url;
    private $_ws_client;
    
    function __construct() {
        parent::__construct();
        
        $this->_websocket_url = $this->ci->config->item('websocket_url');
        $this->_ws_client = new Client($this->_websocket_url);
    }
    
    /**
     * Kirim notifikasi
     * @param string $font_awesome_icon kode font awesome
     * @param string $type info|danger|warning
     * @param string $text isi notifikasi
     */
    public function send($font_awesome_icon, $type, $text, $user_id=NULL){
        $data['fa_icon'] = $font_awesome_icon;
        $data['timestamp'] = date('d/m/Y H:i:s');
        $data['text'] = $text;
        
        if($user_id) $data['user_id'] = $user_id;
        
        // get bgcolor
        switch($type){
            case 'success':
                $data['bg_color'] = 'bg-success';
                $data['type'] = 'success';
            case 'info':
                $data['bg_color'] = 'bg-info';
                $data['type'] = 'info';
                break;
            case 'danger':
                $data['bg_color'] = 'bg-danger';
                $data['type'] = 'warn';
                break;
            default:
                $data['bg_color'] = 'bg-warning';
                $data['type'] = 'warn';
        }
        
        $this->_ws_client->send(json_encode($data));
    }
}