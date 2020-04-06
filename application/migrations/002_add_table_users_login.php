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
        'qrcode' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
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
                'user_id' => 'a1bdc221d56fddfba202bd448fe4dbfb',
                'email'     => 'root@warungkoperasi.my.id',
                'password' => '63a9f0ea7bb98050796b649e85481845'
            )
        );
        
        $this->_seed($insert);
    }

}
