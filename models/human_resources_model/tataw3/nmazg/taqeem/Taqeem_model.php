<?php
class Taqeem_model extends CI_Model{
    public function  get_from_settings()
    {
        $this->db->where("status", 1);
        $this->db->order_by("in_order", "asc");
        $query = $this->db->get('tat_band_taqeem');

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function add_taqeem($id=''){

        $data['motatw3_id_fk']= $this->input->post('motatw3_id_fk');
        $data['forsa_id_fk']= $this->input->post('forsa_id_fk');
        $data['rkm_akd_id']= $this->input->post('rkm_akd_id');
        $data['total_max_degree']= $this->input->post('total_max_degree');
        $data['total_had_degree']= $this->input->post('total_had_degree');

        $data['date']= date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

        if (!empty($id)){
            $taqeem_id_fk = $id;
            $this->db->where('id',$id);
            $this->db->update('tat_taqeem',$data);
        }else{
            $this->db->insert('tat_taqeem',$data);
            $taqeem_id_fk = $this->db->insert_id();
        }
        $this->add_taqeem_bnods($taqeem_id_fk);

        if(empty($id)){  return $taqeem_id_fk; }

    }
    public function delete_taqeem_bnods($taqeem_id_fk){

        $this->db->where("taqeem_id_fk", $taqeem_id_fk);
        $delete = $this->db->delete("tat_taqeem_bnods");
        return $delete?true:false;
    }

    public function add_taqeem_bnods($taqeem_id_fk){

        $delete = $this->delete_taqeem_bnods($taqeem_id_fk);

        $data['taqeem_id_fk']= $taqeem_id_fk;

        $x= $this->input->post('band_id_fk');
        if($x!=null)
        {
            for($i=0;$i<sizeof($x);$i++) {
                $data['band_id_fk'] = $x[$i];
                $data['max_degree'] = $this->input->post('max_degree'.$x[$i]);
                $data['had_degree'] = $this->input->post('had_degree'.$x[$i]);
                $data['notes'] = $this->input->post('notes'.$x[$i]);
                $this->db->insert('tat_taqeem_bnods',$data);
            }
        }

    }

    public function get_forsa_data($motatw3_id_fk,$rkm_akd_id){

        $this->db->where("motatw3_id_fk", $motatw3_id_fk);
        $this->db->where("id", $rkm_akd_id);
        $query = $this->db->get('tat_contracts');
        if ($query->num_rows() > 0) {
                $data =  $query->row();
                $data->forsa_data = $this->get_table('tat_foras',array('id'=>$data->forsa_id_fk),1);
                return $data->forsa_data;

        }
        return false;
    }

    public function get_taqeem($id=''){
        if (!empty($id)){
            $this->db->where("id", $id);
        }
        if (empty($id)){
            $this->db->order_by("id", 'DESC');
        }
        $query = $this->db->get('tat_taqeem');
        if ($query->num_rows() > 0) {
            if (!empty($id)){
                $data =  $query->row();
                $data->motatw3_name = $this->get_table('tat_motat3en',array('id'=>$data->motatw3_id_fk),'name');
                $data->forsa_data = $this->get_table('tat_foras',array('id'=>$data->forsa_id_fk));
                $data->taqeem_bnods = $this->get_taqeem_bnods('tat_taqeem_bnods',array('taqeem_id_fk'=>$data->id));
                return $data;
            } else{
                $i = 0;
                foreach ($query->result() as $row) {
                    $data[$i] = $row;
                    $data[$i]->motatw3_name = $this->get_table('tat_motat3en',array('id'=>$data[$i]->motatw3_id_fk),'name');
                    $data[$i]->forsa_data = $this->get_table('tat_foras',array('id'=>$data[$i]->forsa_id_fk));
                    $data[$i]->taqeem_bnods = $this->get_table('tat_taqeem_bnods',array('taqeem_id_fk'=>$data[$i]->id),1);

                    $i++;
                }
                return $data;
            }
        }
        return false;
    }


    public function get_taqeem_bnods($table,$arr){
        $this->db->where($arr);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->band_title = $this->get_table('tat_band_taqeem',array('id'=>$data[$i]->band_id_fk),'title');

                $i++;
            }
            return $data;
        }
        return false;
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

    public function delete_taqeem($id){
        $this->db->where("id", $id);
        $this->db->delete("tat_taqeem");

        $this->delete_taqeem_bnods($id);
    }
    public function get_table($table,$arr,$field=""){
        $this->db->where($arr);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            if (!empty($field)) {
                if($field==1){
                    return $query->result();
                }else {
                    return $query->row()->$field;
                }
            }else{

                return $query->row();
            }
        }
        return false;
    }
}