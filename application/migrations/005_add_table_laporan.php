<?php

/**
 * Description of 004_add_table_notifikasi
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_laporan extends MY_Migration {

    protected $_table_name = 'laporan';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'auto_increment' => TRUE
        ),
        'nama_laporan' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'kategori' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'deskripsi' => array(
            'type' => 'VARCHAR',
            'constraint' => 500
        ),
        'lokasi' => array(
            'type' => 'VARCHAR',
            'constraint' => 250
        ),
        'foto' => array(
            'type' => 'VARCHAR',
            'constraint' => 150
        ),
        'status_laporan' => array(
            'type' => 'VARCHAR',
            'constraint' => 15
        ),
        'report_by' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'tanggal_lapor' => array(
            'type' => 'TIMESTAMP'
        ),
        'verifikasi_by' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'tanggal_verifikasi' => array(
            'type' => 'datetime'
        ),
        'proses_by' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'tanggal_proses' => array(
            'type' => 'datetime'
        ),
        'tanggal_selesai' => array(
            'type' => 'datetime'
        ),
        'tindakan' => array(
            'type' => 'VARCHAR',
            'constraint' => 150
        ),
        'foto_tindakan' => array(
            'type' => 'VARCHAR',
            'constraint' => 150
        )
    );

}
