<?php

/*
created by @garaulo on Mar 21, 2019
fauziansyah26@gmail.com
*/

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Loggerlib {
    private $log;
    private $log_path = ROOTPATH .'logs/';
    
    function __construct($channel_name) {
        $this->log_path .= $channel_name . '_' . date('Ymd') . '.log';
        $this->log = new Logger($channel_name);
        $StreamHandler = new StreamHandler($this->log_path, Logger::DEBUG);
        $this->log->pushHandler($StreamHandler);
    }
    
    public function write($string, $type='info', Array $data = []){
        if(count($data) > 0){
            $this->log->$type($string, $data);
        }else{
            $this->log->$type($string);
        }
    }
}