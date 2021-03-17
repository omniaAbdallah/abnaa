
<?php
class Sysat_setting_m extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
       
    }

    public function add ($post){
        $params = [
            'date_used'       =>$post['date_used'],
         'alert_tahdeth'       =>$post['alert_tahdeth'],
            'fasel_zeyara'       =>$post['fasel_zeyara'],


        ];
        $this->db->where('id',1);
        $this->db->update('osr_main_setting',$params);
    }
    
       public function get($id = null)
    {
        $this->db->select('osr_main_setting.*');
        $this->db->from('osr_main_setting');
     
        if ($id != null) {
            $this->db->where('id', $id);
        }
        //$this->db->order_by('osr_main_setting','desc');
        $query = $this->db->get();
        return $query;
    }

}