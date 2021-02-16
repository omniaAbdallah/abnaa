<?php
class Serv_setting_model extends CI_Model{
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = 0;
            return $val;
        } else {
            return $post_value;
        }
    }
    public function add_setting($id=''){
        $data['khdma_name'] = $this->input->post('khdma_name');

        $fe2at =$this->input->post('fe2at');
        if (!empty($fe2at)){
            foreach ($fe2at as $key=>$value){
                $data[$value]=1;
            }
        }
        $data['date']= date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        if (!empty($id)){
            $this->db->where('id',$id);
    
            $this->db->update('osr_serv_khdmat_settings',$data);
        }else{
            $this->db->insert('osr_serv_khdmat_settings',$data);
        }
    }
    public function update_cond($id)
    {

 
$data['wasf_khdma']=$this->input->post('wasf_khdma');
$data['dawabet_shroot']=$this->input->post('dawabet_shroot');
$data['knawat_khdma']=$this->input->post('knawat_khdma');
$data['mostwa_khdma']=$this->input->post('mostwa_khdma');
        $this->db->where('id',$id);
         $this->db->update('osr_serv_khdmat_settings',$data);

    }
    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'md_all_magls_edara_members';
                $field = 'mem_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'md_all_gam3ia_omomia_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;
    }
    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }
    public function get_setting($id=''){
        if (!empty($id)){
            $this->db->where('id',$id);
        }
        $query = $this->db->get('osr_serv_khdmat_settings');
        if ($query->num_rows() > 0) {
            if (!empty($id)){
              //  return $query->row();
                $data = $query->row();
                $data->conds = $this->get_details($data->id,1);
                $data->files = $this->get_details($data->id,2);
                return $data ;
            } else{
                return $query->result();
            }
        } else{
            return false;
        }
    }
    public function get_details($id,$type){
        $this->db->where('khdma_id_fk',$id);
        $this->db->where('type',$type);
        $query = $this->db->get('osr_serv_khdmat_sett_details');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else{
            return false;
        }
    }
    public function delete_table($table,$arr){
        $this->db->where($arr);
        $this->db->delete($table);
    }
    public function add_serv_details(){
        $data['khdma_id_fk'] = $this->input->post('khdma_id_fk');
        $data['title'] = $this->input->post('title');
        $data['type'] = $this->input->post('type');
        if ($this->input->post('type')==1){
            $data['type_n']='خطوات تنفيذ الخدمة';
        } elseif ($this->input->post('type')==2){
            $data['type_n']='المستندات المطلوبة';
        }
        $data['date']= date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('osr_serv_khdmat_sett_details',$data);
    }
    public function update_serv_details($id){
        $data['title'] = $this->input->post('title');
        $this->db->where('id',$id);
        $this->db->update('osr_serv_khdmat_sett_details',$data);
    }
    public function get_services()
    {
        $q = $this->db->get('osr_serv_khdmat_settings')->result();
        if (!empty($q)) {
            return $q;
        } else {
            return false;
        }
    }
    public function get_allf2at_services()
    {
        $q = $this->db->select('osr_serv_khdmat_settings.*,osr_serv_khdmat_fe2a_setting.*')
            ->join('osr_serv_khdmat_settings', 'osr_serv_khdmat_fe2a_setting.no3_khdma_id_fk=osr_serv_khdmat_settings.id')
            ->where('fe2a_khdma_id_fk',0) ->get('osr_serv_khdmat_fe2a_setting')->result();
        if (!empty($q)) {
            return $q;
        }
    }
    public function insert_f2a()
    {
        $data['no3_khdma_id_fk'] =$this->input->post('service');
        $data['fe2a_khdma_id_fk']=0;
        $data['fe2a_title'] =  $this->input->post('f2a_serv');
        $data['date']= date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('osr_serv_khdmat_fe2a_setting', $data);
    }
    public function f2a_service_setting_uptate($id)
    {
        $data['no3_khdma_id_fk'] =$this->input->post('service');
        $data['fe2a_khdma_id_fk']=0;
        $data['fe2a_title'] =  $this->input->post('f2a_serv');
        $this->db->where('id', $id)->update('osr_serv_khdmat_fe2a_setting', $data);
    }
    public function f2a_service_setting_delete($id)
    {
        $this->db->where('id',$id)->delete('osr_serv_khdmat_fe2a_setting');
    }
    public function getf2at_ser($id)
    {
        $q = $this->db->where('id', $id)->get('osr_serv_khdmat_fe2a_setting')->row();
        if (!empty($q)) {
            return $q;
        } else {
            return false;
        }
    }
    
}