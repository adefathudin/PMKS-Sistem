<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of MY_Migration
 *
 * @author marwansaleh 4:47:53 PM
 */
class MY_Migration extends CI_Migration {
    protected $_table_name = NULL;
    protected $_primary_key = 'id';
    protected $_index_keys = array();
    protected $_attributes = []; //array('ENGINE' => 'InnoDB');
    protected $_fields = array();
    protected $_extend_time = FALSE;
    protected $_extended_time_sec = 3000;
    
    function __construct($config = array()) {
        parent::__construct($config);
    }
    
    public function up(){
        if ($this->_extend_time){
            ini_set('max_execution_time', $this->_extended_time_sec);
        }
        if (!$this->_table_name){
            exit;
        }
        
        if ($this->_fields && count($this->_fields)){
            $this->dbforge->add_field($this->_fields);
        }
        
        //create primary key
        if ($this->_primary_key){
            $this->dbforge->add_key($this->_primary_key, TRUE);
        }
        //create optional index from array
        if (count($this->_index_keys)){
            $this->dbforge->add_key($this->_index_keys);
        }
        //build the table if not exists (set second param TRUE)
        $this->dbforge->create_table($this->_table_name, TRUE, $this->_attributes);
    }
    
    public function down(){
        if (!$this->_table_name){
            exit;
        }
        
        //remove the table if exists
        if (!isset($this->_keep_table) || $this->_keep_table==FALSE) {
            $this->dbforge->drop_table($this->_table_name, TRUE);
        }
    }
    
    protected function _seed($array, $unique_field=NULL){
        if (!$this->_table_name){
            exit;
        }
        
        $count = 0;
        if (!isset($this->db)){
            $this->load->database();
        }
        
        if (is_array($array) && count ($array)){
            for ($i=0; $i<count($array); $i++){
                if ($unique_field){
                    $unique_value = $array[$i][$unique_field];
                    if ($this->db->from($this->_table_name)->where($unique_field, $unique_value)->count_all_results()){
                        continue;
                    }
                }
                $this->db->insert($this->_table_name, $array[$i]);
                $count++;
            }
        }
        return $count;
    }
    
    private function _insert($array, $filter_fn=NULL){
        $tbl_pk_seq = sprintf('%s_%s_seq', $this->_table_name, $this->_primary_key);
        
        if (isset($array['children'])){
            unset($array['children']);
        }
        if ($filter_fn){
            $this->db->insert($this->_table_name, $filter_fn($array));
        }else{
            $this->db->insert($this->_table_name, $array);
        }
        return $this->db->insert_id($tbl_pk_seq);
    }
    
    /**
     * Seeding by hierarchical array data. Data must has field act as parent, and has attribute children which consists of its child
     * @param mixed $array
     * @param int $parent default 0 as the root of parent
     * @param string $parent_field default parent
     */
    protected function _seed_extend($array, $parent=0, $parent_field='parent', $filter_fn=NULL){
        if (!$this->_table_name){
            exit;
        }
        
        if (!isset($this->db)){
            $this->load->database();
        }
        
        for ($i=0; $i<count($array); $i++){
            $array[$i][$parent_field] = $parent;
            $parent_id = $this->_insert($array[$i], $filter_fn);
            if (isset($array[$i]['children'])&&count($array[$i]['children'])){
                $this->_seed_extend($array[$i]['children'], $parent_id, $parent_field);
            }
        }
    }
}

/**
 * Filename : MY_Migration.php
 * Location : application/core/MY_Migration.php
 */
