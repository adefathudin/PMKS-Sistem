<?php

/**
 * Description of 004_add_table_mutasi_rekeningku
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_mutasi_rekening extends MY_Migration {

    protected $_table_name = 'mutasi_rekening';
    protected $_primary_key = 'order_id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'order_id' => array(
            'type' => 'INT',
            'contraint' => 11,
            'auto_increment' => TRUE
        ),
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
        'saldo_awal' => array(
            'type' => 'VARCHAR',
            'constraint' => 20
        ),
        'saldo_akhir' => array(
            'type' => 'VARCHAR',
            'constraint' => 20
        ),
        'keterangan_trx' => array(
            'type' => 'VARCHAR',
            'constraint' => 150
        ),
        'tanggal_trx' => array(
            'type' => 'TIMESTAMP'
        ),
        'merchant_trx' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'status' => array(
            'type' => 'VARCHAR',
            'constraint' => 11,
            'default'   => 0
        )
    );

}
