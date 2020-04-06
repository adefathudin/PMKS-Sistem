<?php

/**
 * Description of 004_add_table_notifikasi
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_grup extends MY_Migration {

    protected $_table_name = 'grup';
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
        'nama_grup' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'deskripsi' => array(
            'type' => 'VARCHAR',
            'constraint' => 150
        ),
        'about' => array(
            'type' => 'VARCHAR',
            'constraint' => 1000
        ),
        'kategori' => array(
            'type' => 'VARCHAR',
            'constraint' => 15
        ),
        'wilayah' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'banner' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'default' => 'nobanner.jpg'
        ),
        'minimal_pokok' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'default' => '0'
        ),
        'minimal_wajib' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'default' => '0'
        ),
        'maksimal_pinjaman' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'default' => '0'
        ),
        'rate_total' => array(
            'type' => 'INT',
            'constraint' => 50,
            'default' => '0'
        ),
        'rate_person' => array(
            'type' => 'INT',
            'constraint' => 50,
            'default' => '0'
        ),
        'rate_akumulatif' => array(
            'type' => 'FLOAT',
            'constraint' => 50,
            'default' => '0'
        ),
        'created' => array(
            'type' => 'TIMESTAMP'
        )
    );

}
