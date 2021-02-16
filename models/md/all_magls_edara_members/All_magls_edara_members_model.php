<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 05/03/2019
 * Time: 01:35 م
 */

class All_magls_edara_members_model extends CI_Model
{
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    public function get_all_magls_edara_members($id)
    {
        return $this->db->where('id',$id)->get('md_all_magls_edara_members')->result();
    }

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

public function get_all_gam3ia_omomia_members()
{
    $members = $this->get_all_data_members_2();
//        $this->test($members);
    $q = $this->db->select('md_all_gam3ia_omomia_odwiat.no3_odwia_title,md_all_gam3ia_omomia_odwiat.no3_odwia_fk,md_all_gam3ia_omomia_odwiat.rkm_odwia_full,md_all_gam3ia_omomia_odwiat.rkm_odwia,
    md_all_gam3ia_omomia_members.*')
        ->join('md_all_gam3ia_omomia_odwiat', 'md_all_gam3ia_omomia_odwiat.member_id_fk = md_all_gam3ia_omomia_members.id')
        ->where_not_in('md_all_gam3ia_omomia_members.id', $members)
        ->get('md_all_gam3ia_omomia_members')->result();
    if (!empty($q)) {
        foreach ($q as $key => $row) {
            $from = new DateTime($row->birth_date_m);
            $to = new DateTime('today');
            $q[$key]->age = $from->diff($to)->y;
        }
        return $q;
    }
}
  public function check_mansep($mansep_id, $magles_code)
    {
        $q = $this->db->where('mgls_code', $magles_code)->where('mansp_fk', $mansep_id)->get('md_all_magls_edara_members')->row();
        if (!empty($q)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function get_all_active_magles()
    {
        $q = $this->db->where('suspend', 1)->get('md_all_mgales_edara')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->count_member = $this->db->select('COUNT(id) as members')->where('mgls_code', $row->mg_code)->where('status', 1)->get('md_all_magls_edara_members')->row()->members;
            }
            return $q;
        }
    }

    public function get_post_data($file)
    {

        $data['mgls_code'] = $this->input->post('mgls_code');
        $data['mgls_id_fk'] = $this->input->post('mgls_id_fk');
        $data['rkm_odwia'] = $this->input->post('rkm_odwia');
        $data['rkm_odwia_full'] = $this->input->post('rkm_odwia_full');
        $data['mem_id_fk'] = $this->input->post('mem_id_fk');
        $data['mem_name'] = $this->input->post('mem_name');
        $data['no3_odwia_fk'] = $this->input->post('no3_odwia_fk');
        $data['no3_odwia_title'] = $this->input->post('no3_odwia_title');
        $data['mansp_fk'] = $this->input->post('mansp_fk');
        $data['mansp_title'] = $this->input->post('mansp_title');

  $data['private_name'] = $this->input->post('private_name');


//7-3-om
        $data['ta3en_date_m'] = $this->input->post('ta3en_date_m');
        $data['ta3en_date_h'] = $this->input->post('ta3en_date_h');
        $data['ta3en_date'] = strtotime($data['ta3en_date_m']);

        $data['end_date_h'] = $this->input->post('end_date_h');
        $data['end_date_m'] = $this->input->post('end_date_m');
        $data['end_date'] = strtotime($data['end_date_m']);

        $data['status'] = $this->input->post('status');
        $data['status_title'] = $this->input->post('status_title');

        if ($data['status'] == 2) {
            $data['end_date_h'] = $this->input->post('end_date_mem_h');
            $data['end_date_m'] = $this->input->post('end_date_mem_m');
            $data['end_date'] = strtotime($data['end_date_m']);
            $data['reason'] = $this->input->post('reason');
            $data['morfaq_end'] = $file;
        }
        if ($this->input->post('esteqala')) {
            $data['estqala_status'] = $this->input->post('esteqala');
            $data['estqala_title'] = $this->input->post('estqala_title');

            if ($data['estqala_status'] == 1) {
                $data['estqala_date_h'] = $this->input->post('end_date_mem_h');
                $data['estqala_date_m'] = $this->input->post('end_date_mem_m');
                $data['estqala_date'] = strtotime($data['end_date_m']);
                $data['estqala_reason'] = $this->input->post('estqala_reason');
            }
        }

//7-3-om
        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
         $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);


        return $data;
    }

    public function insert_magls_membser($file)
    {
        $data = $this->get_post_data($file);
        $this->db->insert('md_all_magls_edara_members', $data);
    }

    public function update_magles_membser($id,$file)
    {
        $data = $this->get_post_data($file);
        $this->db->where('id', $id)->update('md_all_magls_edara_members', $data);

    }

    public function get_one_data($id)
    {
        $q = $this->db->select('md_all_magls_edara_members.*,md_all_gam3ia_omomia_members.card_num,
        md_all_gam3ia_omomia_members.birth_date_h,md_all_gam3ia_omomia_members.birth_date_m,md_all_gam3ia_omomia_members.jwal,
        md_all_mgales_edara.ta3en_date_m as mgls_ta3en_m ,md_all_mgales_edara.ta3en_date_h as mgls_ta3en_h,
        md_all_mgales_edara.end_date_m as mgls_end_m,md_all_mgales_edara.end_date_h as mgls_end_h')
            ->where('md_all_magls_edara_members.id', $id)
            ->join('md_all_gam3ia_omomia_members', 'md_all_gam3ia_omomia_members.id =md_all_magls_edara_members.mem_id_fk')
            ->join('md_all_mgales_edara', 'md_all_mgales_edara.id=md_all_magls_edara_members.mgls_id_fk')
            ->get('md_all_magls_edara_members')->row();
        if (!empty($q)) {
            $from = new DateTime($q->birth_date_m);
            $to = new DateTime('today');
            $q->age = $from->diff($to)->y;

            return $q;
        }
    }


   /* public function get_all_data_new_manseb($mgls_code,$mansp_fk)
    {
        $q = $this->db->order_by('mansp_fk ASC ')->where('mgls_code',$mgls_code)->where('mansp_fk',$mansp_fk)->get('md_all_magls_edara_members')->result();
        if (!empty($q)) {
            return $q;
        }
    }*/
       public function get_all_data_new_manseb($mgls_code,$mansp_fk){
        $h = $this->db->get_where("md_all_magls_edara_members", array('mgls_code'=>$mgls_code,'mansp_fk'=>$mansp_fk));
        return $h->row_array()['mem_name'];
    }  
    
    
    public function get_all_data_new()
    {
        $q = $this->db->order_by('mansp_fk ASC ')->where('mgls_code',4)->get('md_all_magls_edara_members')->result();
        if (!empty($q)) {
            return $q;
        }
    }

    public function get_all_data()
    {
        $q = $this->db->order_by('mansp_fk ASC ')->get('md_all_magls_edara_members')->result();
        if (!empty($q)) {
            return $q;
        }
    }

    public function get_all_data_members()
    {
        $q = $this->db->select('mem_id_fk')->get('md_all_magls_edara_members')->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->mem_id_fk);
            }
            return $data;
        }
    }
    
    
        public function get_all_data_members_2()
    {
        $q = $this->db->select('mem_id_fk')->where('mgls_id_fk != ',5)->get('md_all_magls_edara_members')->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->mem_id_fk);
            }
            return $data;
        }
    }


    public function delete_data($id)
    {
        $this->db->where('id', $id)->delete('md_all_magls_edara_members');
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
            $table = 'magls_members_table';
            $field = 'member_name';
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
            $table = 'general_assembley_members';
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
    
    
/**************************/

public function select_all_magls_edara_members($arr=false , $arrnot =false)
    {
        $this->db->select('*');
        $this->db->from('md_all_magls_edara_members');
        $this->db->where('status',1);
        if (!empty($arr)){
            $this->db->where($arr);
        }else if(!empty($arrnot)){
            $this->db->where_not_in('mansp_fk',$arrnot);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->details_edow = $this->get_details_edow($row->mem_id_fk);
                $i++;
            }
            return $data;
        } else {
            return false;
        }

    } 
/*
public function select_all_magls_edara_members()
    {
        $this->db->select('*');
        $this->db->from('md_all_magls_edara_members');
        $this->db->where('status',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->details_edow = $this->get_details_edow($row->mem_id_fk);
                $i++;
            }
            return $data;
        } else {
            return false;
        }

    } */   
    
    
      public function get_details_edow($mem_id_fk)
    {
        $this->db->where('id', $mem_id_fk);
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        }
        return false;


    }
   
   
   
       public function get_all_magls_data()
    {
        $q = $this->db->order_by('id DESC ')->limit(1)->get('md_all_mgales_edara')->result();
        if (!empty($q)) {
            return $q;
        }
    }
    
}