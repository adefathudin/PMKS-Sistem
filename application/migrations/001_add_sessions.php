<?php

/**
 * Description of 001_add_sessions
 * 
 * Created On Aug 5, 2019, 11:03:01 AM
 * @author fauziansyah
 */
class Migration_add_sessions extends MY_Migration {

    protected $_table_name = 'ci_sessions';
    protected $_primary_key = 'id';
    protected $_index_keys = array();
    protected $_fields = array(
        'id'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 40,
            'NULL' => FALSE
        ),
        'ip_address'    => array(
            'type' => 'VARCHAR',
            'constraint' => 45,
            'NULL' => FALSE
        ),
        'timestamp' => array(
            'type'  => 'INT',
            'constraint' => 10,
            'unsigned' => TRUE,
            'default' => 0,
            'NULL' => FALSE
        ),
        'data' => array(
            'type' => 'TEXT',
            'NULL' => FALSE
        )
    );

}
