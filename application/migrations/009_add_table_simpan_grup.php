<?php

/**
 * Description of 004_add_table_notifikasi
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_simpan_grup extends MY_Migration {

    protected $_table_name = 'simpan_grup';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'id' => array(
            'type' => 'INT',
            'constraint' => 15,
            'auto_increment' => TRUE
        ),
        'user_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'grup_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'jenis_simpanan' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'periode' => array(
            'type' => 'VARCHAR',
            'constraint' => 7
        ),
        'nominal' => array(
            'type' => 'VARCHAR',
            'constraint' => 12
        ),
        'tanggal_simpan' => array(
            'type' => 'TIMESTAMP'
        )
    );

}
