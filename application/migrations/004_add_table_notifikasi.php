<?php

/**
 * Description of 004_add_table_notifikasi
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_notifikasi extends MY_Migration {

    protected $_table_name = 'notifikasi';
    protected $_primary_key = 'notifikasi_id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'notifikasi_id' => array(
            'type' => 'INT',
            'constraint' => 15,
            'auto_increment' => TRUE
        ),
        'user_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'level' => array(
            'type' => 'VARCHAR',
            'constraint' => 15
        ),
        'tanggal' => array(
            'type' => 'TIMESTAMP'
        ),
        'judul' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'isi' => array(
            'type' => 'VARCHAR',
            'constraint' => 250
        ),
        'baca' => array(
            'type' => 'BOOLEAN'
        )
    );

}
