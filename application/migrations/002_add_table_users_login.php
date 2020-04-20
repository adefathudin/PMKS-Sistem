<?php

class Migration_add_table_users_login extends MY_Migration {

    protected $_table_name = 'users_login';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'id' => array (
            'type' => 'INT',
            'constraint' => 11,  
            'auto_increment' => TRUE
        ),
        'user_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'email' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'password' => array(
            'type' => 'VARCHAR',
            'constraint' => 360
        )
    );
    
    function up(){
        parent::up();
        
        $insert = array(
            array(
                'user_id' => md5('kasatpel'),
                'email'     => 'kasatpel',
                'password' => md5('123')
            ),
            array(
                'user_id' => md5('petugas'),
                'email'     => 'petugas',
                'password' => md5('123')
            ),
            array(
                'user_id' => md5('pelapor'),
                'email'     => 'pelapor',
                'password' => md5('123')
            )
        );
        
        $this->_seed($insert);
    }

}
