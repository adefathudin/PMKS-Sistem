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
    
    
    public function get_last_db_error($return_err_number=FALSE){
        $error = $this->db->error();
        if ($return_err_number){
            return $error['code'];
        }
        return $error['message'];
    }
    
    public function get_last_message(){
        if (!$this->_last_message){
            $error = $this->db->error();
            return $error['message'];
        }else{
            return $this->_last_message;
        }   
    }
    
    public function array_from_post(array $fields){
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
            
        }
        return $data;        
    }
    
    public function get_tablename($prefix=FALSE){
        if ($prefix){
            return $this->db->dbprefix($this->_table_name);
        }else{
            return $this->_table_name;
        }
    }
    
    public function get_like($field,$value, $single=FALSE){
        $this->db->like($field,$value);
        $this->get(NULL, $single);
    }
    
    public function get_value($field_name,$where=NULL){
        $this->db->select($field_name)->from($this->_table_name);
        if ($where){
            $this->db->where($where);
        }
        $row = $this->db->get()->row();
        if ($row){
            return $row->$field_name;
        }else{
            return NULL;
        }
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
    
    public function get_new(){
        //get all fields properties
        $properties = $this->db->field_data($this->_table_name);
        
        $new_record = new stdClass();
        foreach ($properties as $prop){
            $new_record->{$prop->name} = $prop->default ? $prop->default : $this->_field_def_value($prop->type);
        }
        
        return $new_record;
    }
    
    private function _field_def_value($field_type='varchar'){
        $value = '';
        switch (strtolower($field_type)){
            case 'int' : 
            case 'tinyint' : 
            case 'longint': $value = 0; break;
            case 'date' : $value = date('Y-m-d'); break;
            case 'datetime' : $value = date('Y-m-d H:i:s'); break;
            case 'float':
            case 'double':
            case 'decimal' : $value = 0.000; break;
            case 'blob': $value = NULL; break;
            case 'varchar' : 
            default:
                $value = '';
        }
        
        return $value;
    }
    
    public function get_select_where($fields = '*', $where=NULL, $single= FALSE){
        $this->db->select($fields);
        if ($where) { $this->db->where($where); }
        
        return $this->get(NULL, $single);
    }

    public function get_count($where=NULL){
        $this->db->select('count(*) as found');
        
        if ($where){ $this->db->where($where); }
        
        $row = $this->db->get($this->_table_name)->row();
        
        return $row->found;
    }
    
    public function get_offset($fields='*', $where=NULL, $offset=0, $limit=0, $method='result'){
        $this->db->select($fields);
        
        if ($where)
            $this->db->where($where);
        
        if (!count($this->db->get_orderby())) {
            $this->db->order_by($this->_order_by);            
        }
        if ($limit > 0){
            $this->db->limit($limit);
            $this->db->offset($offset);
        }
        
        return $this->db->get($this->_table_name)->$method();
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
    
    public function save_batch($data){
        if ($this->_timestamps == TRUE) {
            $now = time();
            for($i=0; $i<count($data); $i++){
                if (isset($this->_timestamps_field[0])){
                    $data[$i][$this->_timestamps_field[0]] = $now;
                }
                if (isset($this->_timestamps_field[1])){
                    $data[$i][$this->_timestamps_field[1]] = $now;
                }
            }
        }
        return $this->db->insert_batch($this->_table_name, $data); 
    }
    
    public function get_inserted_id(){
        return $this->db->insert_id($this->_table_name.'_'.$this->_primary_key.'_seq');
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
    
    public function delete_where($where){
        $this->db->where($where);
        $this->db->delete($this->_table_name);
        $affected = $this->db->affected_rows();
        if (!$affected){
            $error = $this->db->error();
            $this->_last_message = $error['message'];
        }
        return $affected;
    }
    
    public function get_fields(){
        return $this->db->list_fields($this->_table_name);
    }
    
    public function get_fields_data(){
        return $this->db->field_data($this->_table_name);
    }
}


/*
 * file location: engine/application/core/MY_Model.php
 */