<?php

/**
 * Description of 004_add_table_notifikasi
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_grup_user extends MY_Migration {

    protected $_table_name = 'grup_user';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'id' => array(
            'type' => 'INT',
            'constraint' => 15,
            'auto_increment' => TRUE
        ),
        'grup_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'user_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'status_user' => array(
            'type' => 'VARCHAR',
            'constraint' => 15
        ),
        'limit_pinjaman' => array(
            'type' => 'INT',
            'constraint' => 15,
            'default' => 0
        ),
        'saldo_koperasi' => array(
            'type' => 'INT',
            'constraint' => 15,
            'default' => 0
        ),
        'rate' => array(
            'type' => 'INT',
            'constraint' => 15
        ),
        'komentar' => array(
            'type' => 'VARCHAR',
            'constraint' => 75
        ),
        'joined' => array(
            'type' => 'TIMESTAMP'
        )
    );

}
