<?php defined('BASEPATH') or exit('No direct script access allowed');
 
/**
 * Class wrapper for REST_Controller
 *
 * @author marwansaleh <amazzura.biz@gmail.com>
 */

class REST_Api extends REST_Controller {
    protected $_recs_per_page = 100;
    protected $me;
    protected $meDetail;
    protected $return = array();
    protected $logger;
    protected $logger_error;
            
    function __construct($config = 'rest', $write_access_log = TRUE, $initiate_log = TRUE) {
        parent::__construct($config);
        
        if($write_access_log){
            $ip_logger = new Loggerlib('access');
            
            // check allowed access api
            if(!$this->_is_allowed()) {
                $ip_logger->write($this->_get_client_ip_server(), 'error');
                $this->response(['message'=>'IP not registered'], 500);
            }

            header('Access-Control-Allow-Origin: '. $this->_get_client_ip_server());
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

            $ip_logger->write($this->_get_client_ip_server(), 'info');
        }
        
        $userLib = new Userlib();
        $this->me = $userLib->get_userid();
        $this->meDetail = $userLib->me();
        
        // initiate mylogger
        if($initiate_log){
            $this->logger = new Loggerlib('bundle');
            $this->logger_error = new Loggerlib('error');
        }
        
        $this->return['status'] = FALSE;
    }
    
    public function service_not_found(){
        $this->response(array('status'=>FALSE, 'message'=>'Service not found'));
    }
    
    protected function remap_fields($arr_map, $data){
        $result = NULL;
        
        if (is_array($data)){
            $result = array();
            if (count($data)){
                foreach ($data as $item){
                    $result [] = $this->_remap_object_properties($arr_map, $item);
                }
            }
        }else{
            $result = $this->_remap_object_properties($arr_map, $data);
        }
        
        return $result;
    }
    
    private function _remap_object_properties($maps,$object){
        $new_class = new stdClass();
        foreach ($maps as $src => $dest){
            $new_class->{$dest} = isset($object->{$src})? $object->{$src} : NULL;
        }
        return $new_class;
    }
    
    
    protected function array_from_post($elements, $sources=NULL, $removeNULL = TRUE){
        $result = array();
        
        if (!is_array($elements)){
            return NULL;
        }
        
        if ($sources === NULL){
            $sources = $this->post();
        }
        foreach ($elements as $key){
            if (isset($sources[$key])){
                if ($removeNULL && !is_null($sources[$key])){
                    $result[$key] = $sources[$key];
                }else{
                    $result[$key] = $sources[$key];
                }
            }
        }
        
        return $result;
    }
    
    /**
     * check if remote ip is allowed
     * 
     * @return boolean
     */
    private function _is_allowed() {
        // check if request send from local server
        return strpos(base_url(), $this->_get_client_ip_server()) !== FALSE ? TRUE:FALSE;
    }
    
    private function _get_client_ip_server() {
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN']:$_SERVER['HTTP_HOST'];
        $ipaddress = str_replace('http://', '', $origin);
        
        return str_replace('https://', '', $ipaddress);
    }
}
