<?php

class Kategori_m extends MY_Model {

    protected $_table_name = 'kategori';
    protected $_primary_key = 'id_kategori';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'id_kategori';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

}
