<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of MY_Model
 *
 * @author adefathudin
 
 */


class MY_Model extends CI_Model {
    
    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = array('created','modified');
    protected $_peoplestamp = FALSE;
    protected $_peoplestamp_field = array('created_by');
    protected $_last_message = NULL;
            
    public $rules = array();
    
    function __construct() {
        parent::__construct();
        
    }
    
    
    
    public function get($id = NULL, $single = FALSE, $method = 'result'){
        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        }
        elseif($single == TRUE) {
            $method = 'row';
        }
        
        $this->db->order_by($this->_order_by);
        
        $result = $this->db->get($this->_table_name);
        
        if (!$result){
            return FALSE;
        }
        
        return $result->$method();
    }
    

    public function get_count($where=NULL){
        $this->db->select('count(*) as found');
        
        if ($where){ $this->db->where($where); }
        
        $row = $this->db->get($this->_table_name)->row();
        
        return $row->found;
    }
    
    
    public function get_by($where=NULL, $single = FALSE){
        if ($where){
            $this->db->where($where);
        }
        
        $this->db->order_by($this->_order_by);
        
        return $this->get(NULL, $single);
    }
    
    
    public function save($data, $user_id = NULL){
		       
        // Insert
        if (!$user_id) {
            if ($this->_primary_filter != 'strval'){
                !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            }
            $this->db->set($data);
            if ($this->db->insert($this->_table_name)){
                if ($this->_primary_filter != 'strval'){
                    $user_id = $this->db->insert_id($this->_table_name.'_'.$this->_primary_key.'_seq');
                }else{
                    $user_id = isset($data[$this->_primary_key]) ? $data[$this->_primary_key] : 'string';
                }
            }else{
                $error = $this->db->error();
                $this->_last_message = $error['message'];
                return FALSE;
            }
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $user_id = $filter($user_id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $user_id);
            if (!$this->db->update($this->_table_name)){
                $error = $this->db->error();
                $this->_last_message = $error['message'];
                return FALSE;
            }
        }
        
        
        return $user_id;
    }
    
    public function save_where($data, $where){
        if ($this->_timestamps == TRUE && isset($this->_timestamps_field[1])) {
            $data[$this->_timestamps_field[1]] = time();
        }
        
        $this->db->set($data);
        $this->db->where($where);
        if ($this->db->update($this->_table_name)){
            return TRUE;
        }else{
            $error = $this->db->error();
            $this->_last_message = $error['message'];
            return FALSE;
        }
    }
    
    public function delete($id){
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        if (!$this->db->delete($this->_table_name)){
            $error = $this->db->error();
            $this->_last_message = $error['message'];
            return FALSE;
        }else{
            return TRUE;
        }
    }
   
    
}


/*
 * file location: engine/application/core/MY_Model.php
 */