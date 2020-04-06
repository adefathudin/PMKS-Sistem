<?php

/**
 * Description of 004_add_table_mutasi_rekeningku
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_topup extends MY_Migration {

    protected $_table_name = 'topup';
    protected $_primary_key = 'topup_id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'user_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'topup_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'jenis_trx' => array(
            'type' => 'INT',
            'constraint' => 2 
        ),
        'nominal' => array(
            'type' => 'VARCHAR',
            'constraint' => 20
        ),
        'keterangan_trx' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'tanggal_trx' => array(
            'type' => 'TIMESTAMP'
        ),
        'status' => array(
            'type' => 'VARCHAR',
            'constraint' => 11,
            'default'   => 0
        )
    );

}
