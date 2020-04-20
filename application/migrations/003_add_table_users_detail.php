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
        'nik' => array(
            'type' => 'VARCHAR',
            'constraint' => 15
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
            'constraint' => '100'
        ),
        'rt' => array(
            'type' => 'VARCHAR',
            'constraint' => '3'
        ),
        'rw' => array(
            'type' => 'VARCHAR',
            'constraint' => '3'
        ),
        'profil' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'default' => 'default.png'
        ),
        'level' => array(
            'type' => 'VARCHAR',
            'constraint' => 15
        ),
        'type' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'joined' => array(
            'type' => 'TIMESTAMP'
        )
    );

    function up(){
        parent::up();
        
        $insert = array(
            array(
                'user_id' => md5('kasatpel'),
                'nama_lengkap'  => 'Admin',
                'tempat_lahir'  => 'Ciamis',
                'tanggal_lahir' => '2019-03-27 00:00:00',
                'jenis_kelamin' => 'L',
                'email'         => 'kasatpel',
                'nomor_hp'      => '(021)27030327',
                'alamat'        => 'Jl. Raya Kampung Sawah Gg. Kenanga Indah, Jatimurni, Kota Bekasi',
                'level'         => KASATPEL
            ),
            array(
                'user_id' => md5('petugas'),
                'nama_lengkap'  => 'Petugas',
                'tempat_lahir'  => 'Ciamis',
                'tanggal_lahir' => '2019-03-27 00:00:00',
                'jenis_kelamin' => 'L',
                'email'         => 'petugas',
                'nomor_hp'      => '(021)27030327',
                'alamat'        => 'Jl. Raya Kampung Sawah Gg. Kenanga Indah, Jatimurni, Kota Bekasi',
                'level'         => PETUGAS
            ),
            array(
                'user_id' => md5('pelapor'),
                'nama_lengkap'  => 'Pelapor',
                'tempat_lahir'  => 'Ciamis',
                'tanggal_lahir' => '2019-03-27 00:00:00',
                'jenis_kelamin' => 'L',
                'email'         => 'perlapor',
                'nomor_hp'      => '(021)27030327',
                'alamat'        => 'Jl. Raya Kampung Sawah Gg. Kenanga Indah, Jatimurni, Kota Bekasi',
                'level'         => PELAPOR
            )
        );
        
        $this->_seed($insert);
    }

}
