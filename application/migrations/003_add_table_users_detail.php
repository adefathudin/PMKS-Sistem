<?php

/**
 * Description of 003_add_table_users_detail
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_users_detail extends MY_Migration {

    protected $_table_name = 'users_detail';
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
        'nama_lengkap' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'tempat_lahir' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'tanggal_lahir' => array(
            'type' => 'DATETIME'
        ),        
        'jenis_kelamin' => array(
            'type' => 'TEXT',
            'constraint' => 2
        ),
        'email' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'nomor_hp' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'alamat' => array(
            'type' => 'VARCHAR',
            'constraint' => 150
        ),
        'about' => array(
            'type' => 'VARCHAR',
            'constraint' => '100',
            'default' => 'Hai, saya telah bergabung dengan WarungKoperasi :)'
        ),
        'nomor_rekening' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'nama_bank' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'ktp' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'default' => 'default.png'
        ),
        'profil' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'default' => 'default.png'
        ),
        'qrcode' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'default' => 'default.png'
        ),
        'type' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'status_approve' => array(
            'type' => 'VARCHAR',
            'constraint' => 2,
            'default' => 0
        ),
        'verifikasi_email' => array(
            'type' => 'BOOLEAN',
            'default' => 0
        ),
        'verifikasi_nomor_hp' => array(
            'type' => 'BOOLEAN',
            'default' => 0
        ),
        'kode_unik' => array(
            'type' => 'VARCHAR',
            'constraint' => 15
        ),
        'joined' => array(
            'type' => 'TIMESTAMP'
        )
    );

    function up(){
        parent::up();
        
        $insert = array(
            array(
                'user_id' => 'a1bdc221d56fddfba202bd448fe4dbfb',
                'nama_lengkap'  => 'Admin',
                'tempat_lahir'  => 'Ciamis',
                'tanggal_lahir' => '2019-03-27 00:00:00',
                'jenis_kelamin' => 'L',
                'email'         => 'root@warungkoperasi.my.id',
                'nomor_hp'      => '(021)27030327',
                'alamat'        => 'Jl. Raya Kampung Sawah Gg. Kenanga Indah, Jatimurni, Kota Bekasi',
                'about'         => 'Hai, saya adalah admin WarungKoperasi :)',
                'ktp'           => 'a1bdc221d56fddfba202bd448fe4dbfb_KTP.jpeg',
                'nomor_rekening'=> '2703010203',
                'nama_bank'     => 'BRI Syariah',
                'profil'        => 'a1bdc221d56fddfba202bd448fe4dbfb_PP.png',
                'type'          => 'Full Service',
                'status_approve'=> '1',
                'verifikasi_email'      => '1',
                'verifikasi_nomor_hp'   => '1'
            )
        );
        
        $this->_seed($insert);
    }

}
