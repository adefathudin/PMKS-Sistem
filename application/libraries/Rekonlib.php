<?php

/*
  created by @garaulo on Jun 23, 2019
  fauziansyah26@gmail.com
 */

/**
 * Description of Rekonlib
 * 
 * Created On __DATE__, __TIME__
 * @author fauziansyah
 */
class Rekonlib extends Library{
    
    function __construct() {
        parent::__construct();
        
        $this->ci->load->model('rel_cms_m');
    }
    
    /**
     * Simpan ke table CMS
     * @param array $data_cms
     * @param string $account_num
     * @param int $user_id
     */
    public function insert_cms($data_cms, $account_num, $user_id){
        $id_cms = hash('md5', sprintf('%s%s%s%s%s%s',$data_cms['tanggal_cms'],$data_cms['jam_cms'],$data_cms['remark_cms'],$data_cms['debet_cms'],$data_cms['credit_cms'],$data_cms['teller_id_cms']));
        
        $dt_save = [
            'id' => $id_cms,
            'tgl_transaksi' => $data_cms['tanggal_cms'],
            'jam_transaksi' => $data_cms['jam_cms'],
            'nomor_rekening' => $account_num,
            'remark' => $data_cms['remark_cms'],
            'debet' => $data_cms['debet_cms'],
            'kredit' => $data_cms['credit_cms'],
            'teller_id' => $data_cms['teller_id_cms'],
            'tgl_rekonsiliasi' => date('Y-m-d H:i:s'),
            'created_by' => $user_id
        ];
        
        if(!$this->ci->rel_cms_m->get($id_cms)){
            $this->ci->rel_cms_m->save($dt_save);
        }
        
        return $id_cms;
    }
    
    /**
     * Get data CMS
     * @param string $id    id table cms
     * @param string $select    default "split_part(remark, ' ', 1) AS remark_split"
     * @param array $where  where condition
     * @return object contain remark_split field only
     */
    public function get_cms($id=NULL, $select="split_part(remark, ' ', 1) AS remark_split", $where=NULL){
        if($where){
            $this->ci->db->where($where);
        }
        $this->ci->db->select($select);
        return $this->ci->rel_cms_m->get($id);
    }
    
    /**
     * Update status recon to true
     * @param string $id
     * @param array $data
     * @return string
     */
    public function update_status_recon_cms($id,$data=array()){
        $data['has_recon'] = 1;
        
        return $this->ci->rel_cms_m->save($data, $id);
    }
}
