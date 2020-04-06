<?php

/**
 * Description of 004_add_table_mutasi_rekeningku
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_cicilan_pinjaman extends MY_Migration {

    protected $_table_name = 'cicilan_pinjaman';
    protected $_primary_key = 'cicilan_pinjaman_id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'cicilan_pinjaman_id' => array(
            'type' => 'int',
            'auto_increment' => TRUE,
            'constraint' => 12
        ),
        'id_pinjaman' => array(
            'type' => 'VARCHAR',
            'constraint' => 12
        ),
        'user_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'grup_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32 
        ),
        'periode' => array(
            'type' => 'VARCHAR',
            'constraint' => 20
        ),
        'nominal' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'status_bayar' => array(
            'type' => 'VARCHAR',
            'constraint' => 11,
            'default'   => 0
        ),
        'tanggal_bayar' => array(
            'type' => 'TIMESTAMP'
        )
    );

}
