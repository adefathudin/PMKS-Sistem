<?php

/*
  created by @garaulo on Aug 5, 2019
  fauziansyah26@gmail.com
 */

class Library {
    protected $CI;
    
    function __construct() {
        $this->CI =& get_instance();
    }
    
    protected function generate($string, $hash_type='md5'){
        $encrypted_key = $this->CI->config->item('encryption_key');
        
        return hash($hash_type, $encrypted_key.$string);
    }
}