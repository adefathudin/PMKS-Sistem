<?php

/**
 * Description of 004_add_table_notifikasi
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_pinjam_grup extends MY_Migration {

    protected $_table_name = 'pinjam_grup';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'id' => array(
            'type' => 'INT',
            'constraint' => 15,
            'auto_increment' => TRUE
        ),
        'id_pinjaman' => array(
            'type' => 'VARCHAR',
            'constraint' => 15
        ),
        'user_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'grup_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32,
            'default' => 0
        ),
        'nominal' => array(
            'type' => 'VARCHAR',
            'constraint' => 15,
            'default' => 0
        ),
        'tenor' => array(
            'type' => 'VARCHAR',
            'constraint' => 15,
            'default' => 0
        ),
        'sisa_cicilan' => array(
            'type' => 'VARCHAR',
            'constraint' => 7,
            'default' => 0
        ),
        'sisa_tenor' => array(
            'type' => 'VARCHAR',
            'constraint' => 7,
            'default' => 0
        ),
        'tujuan' => array(
            'type' => 'VARCHAR',
            'constraint' => 140
        ),
        'tanggal_pinjam' => array(
            'type' => 'TIMESTAMP'
        )
    );

}
