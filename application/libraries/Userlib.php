<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class of Userlib
 * Handle management of user, group and privileges
 *
 * @author marwansaleh 11:13:40 PM
 */
class Userlib extends Library {
    private static $objInstance;
    
    private $_prefix_session = '';
    private $_prefix_page = '_pagesession_';
    private $last_message = '';
    
    function __construct() {
        parent::__construct();
        
        if (!isset($this->CI->session)){
            $this->CI->load->library('session');
        }
    }
    
    public static function getInstance(  ) { 
            
        if(!self::$objInstance){ 
            self::$objInstance = new Userlib();
        } 
        
        return self::$objInstance; 
    }
    /**
     * Try to guess wheather user is online
     * @param string $session_id
     * @return boolean
     */
        
    public function isLoggedin() {
        return $this->CI->session->userdata($this->_prefix_session . 'has_loggedin')!==NULL ? TRUE : FALSE;
    }
    
    public function me() {
        $this->CI->session->userdata();
    }
    
    public function login($email, $password){
        $this->CI->load->model(['users_login_m']);
        
        //query ke database apakah ada account dengan username dan password yg sesuai
        $user = $this->CI->users_login_m->get_by(['email' => $email, 'password' => $password, 'blokir' => 0], TRUE);
        
        if (!$user) {
            $this->last_message = 'Username/Password tidak ditemukan.';

            return FALSE;
        } else {
            
            // set usersession
            $user_session[$this->_prefix_session.'has_loggedin'] = TRUE;
            foreach ($user as $prop => $prop_value){
                $user_session[$this->_prefix_session . $prop] = $prop_value;
            }
            
            $this->CI->session->set_userdata($user_session);
            

            return $user;
        }
    
    }
}