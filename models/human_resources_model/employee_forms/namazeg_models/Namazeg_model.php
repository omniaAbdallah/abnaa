<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Namazeg_model extends CI_Model

{

    public function chek_Null($post_value)

    {

        if ($post_value == '' || $post_value == null || (!isset($post_value))) {

            $val = '';

            return $val;

        } else {

            return $post_value;

        }

    }
    public function select_last_letter_rkm_new()

    {

        $this->db->select('*');

        $this->db->from("hr_nmazg_letter_emp");

        $this->db->order_by("letter_rkm", "DESC");

        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data = $row->letter_rkm + 1;

            }

            return $data;

        } else {

            return 1;

        }

    }
    public function select_last_letter_rkm()

    {

        $this->db->select('*');

        $this->db->from("hr_nmazg_letter_emp");

        $this->db->order_by("id", "DESC");

        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data = $row->letter_rkm + 1;

            }

            return $data;

        } else {

            return 1;

        }

    }

    public function select_last_id()

    {

        $this->db->select('*');

        $this->db->from("hr_nmazg_letter_emp");

        $this->db->order_by("id", "DESC");

        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data = $row->id + 1;

            }

            return $data;

        } else {

            return 1;

        }

    }

      public function select_all_talabat($option)

    {

       

       $this->db->select('hr_nmazg_letter_emp.*,hr_nmazg_letter_setting.id,hr_nmazg_letter_setting.letter_name,

        ');

        $this->db->from("hr_nmazg_letter_emp");

        

        $this->db->where('hr_nmazg_letter_emp.finished',$option);

        $this->db->join('hr_nmazg_letter_setting', 'hr_nmazg_letter_emp.namozag_type_fk =hr_nmazg_letter_setting.id', 'left');

     

         $this->db->order_by("hr_nmazg_letter_emp.id", "DESC");

       

       

    

        $query = $this->db->get();

               if ($query->num_rows() > 0) {

            $a = 0;

            foreach ($query->result() as $row) {

                $arr[$a] = $row;

                $arr[$a]->morfqat_num = $this->get_nmazeg_rows_num($row->letter_rkm);





                $a++;

            }

            return $arr;

        } else {

            return false;

        }

       /* if ($query->num_rows() > 0) {

            return $query->result();

        } else {

            return false;

        }*/

    }

    public function select_all()

    {

        $this->db->select('*');

        $this->db->from("hr_nmazg_letter_emp");

        $this->db->where("publisher",$_SESSION['user_id']);

        $this->db->order_by("id", "DESC");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        } else {

            return false;

        }

    }

    public function insert()

    {

        $var = time() + 5;

        if ($var == true) {

            $last_last_letter_rkm = $this->select_last_letter_rkm_new();

        }

        $data['letter_rkm'] = $last_last_letter_rkm;

        $data['header_name'] = $this->input->post('header_name');

        $data['emp_code'] = $this->input->post('emp_code_fk');

        $data['emp_id'] = $this->input->post('emp_id_fk');

        $data['emp_name'] = $this->input->post('emp_name');

        $data['card_national_num'] = $this->input->post('card_national_num');

        $data['mosma_wazefy_id'] = $this->input->post('mosma_wazefy_id');

        $data['mosma_wazefy_n'] = $this->input->post('mosma_wazefy_n');

        $data['edara_id_fk'] = $this->input->post('edara_id_fk');

        $data['edara_n'] = $this->input->post('edara_n');

        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');

        $data['qsm_n'] = $this->input->post('qsm_n');

        $data['start_work_date'] = $this->input->post('start_work_date');

        $data['letter_rkm_full'] = $this->input->post('emp_code_fk') . '/' . $last_last_letter_rkm;

        $data['letter_date'] = strtotime($this->input->post('letter_date'));

        $data['letter_date_ar'] = $this->input->post('letter_date');

        $data['namozag_type_fk'] = $this->input->post('namozag_type_fk');

        $data['start_laqb'] = $this->input->post('start_laqb');

        $data['end_laqb'] = $this->input->post('end_laqb');

        $data['geha_name'] = $this->input->post('geha_name');

        $data['namozg_head'] = $this->input->post('namozg_head');

        $data['namozg_footer'] = $this->input->post('namozg_footer');

        $data['mawdo3'] = $this->input->post('mawdo3');

        $data['date'] = strtotime(date('Y-m-d'));

        $data['date_ar'] = date('Y-m-d');

        $data['publisher'] = $_SESSION['user_id'];

        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);;

          $emp_to_data = $this->get_employees_by_level(array('job_title_code_fk' => 403, 'person_suspend' => 1));

    if (!empty($emp_to_data)) {

        $data['current_to_user_name'] = $emp_to_data->person_name;

        $data['current_to_user_id'] = $this->get_user_id($emp_to_data->person_id);

    }

        

        

        $this->db->insert("hr_nmazg_letter_emp", $data);

    }

    public function update()

    {

        $var = time() + 5;

        if ($var == true) {

            $last_last_letter_rkm = $this->select_last_letter_rkm_new();

        }

        $data['header_name'] = $this->input->post('header_name');

        $data['namozag_type_fk'] = $this->input->post('namozag_type_fk');

        $data['start_laqb'] = $this->input->post('start_laqb');

        $data['end_laqb'] = $this->input->post('end_laqb');

        $data['geha_name'] = $this->input->post('geha_name');

        $data['namozg_head'] = $this->input->post('namozg_head');

        $data['namozg_footer'] = $this->input->post('namozg_footer');

        $data['mawdo3'] = $this->input->post('mawdo3');

        $this->db->where("letter_rkm", $_POST['letter_rkm']);

        $this->db->update("hr_nmazg_letter_emp", $data);

    }

    public function insert_setting()

    {

        $data['letter_name'] = $this->input->post('letter_name');

        $data['namozg_head'] = $this->input->post('namozg_head');

        $data['namozg_footer'] = $this->input->post('namozg_footer');

        $this->db->insert("hr_nmazg_letter_setting", $data);

    }

//31-1-om

    public function Delete($rkm)

    {

        $this->db->where("letter_rkm", $rkm);

        $this->db->delete("hr_nmazg_letter_emp");

    }

    public function getUserName($user_id)

    {

        $sql = $this->db->where("user_id", $user_id)->get('users');

        if ($sql->num_rows() > 0) {

            $data = $sql->row();

            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {

                return $data->user_username;

            } elseif ($data->role_id_fk == 2) {

                $id = $data->user_name;

                $table = 'magls_members_table';

                $field = 'member_name';

            } elseif ($data->role_id_fk == 3) {

                $id = $data->emp_code;

                $table = 'employees';

                $field = 'employee';

            } elseif ($data->role_id_fk == 4) {

                $id = $data->user_name;

                $table = 'general_assembley_members';

                $field = 'name';

            }

            return $this->getUserNameByRoll($id, $table, $field);

        }

        return false;

    }

    public function getUserNameByRoll($id, $table, $field)

    {

        return $this->db->where('id', $id)->get($table)->row_array()[$field];

    }

//yara

    public function insert_geha()

    {

        $data['title'] = $this->input->post('title');

        $data['mob'] = $this->input->post('mob');

        $data['address'] = $this->input->post('address');

        $this->db->insert('hr_gehat_setting', $data);

    }

    public function select_family_letter_setting()

    {

        $query = $this->db->get('hr_gehat_setting');

        if ($query->num_rows() > 0) {

            return $query->result();

        }

        return false;

    }

//yaera
    public function getAllDetails($arr)
    {
           $this->db->select('hr_nmazg_letter_emp.*,hr_nmazg_letter_setting.id,hr_nmazg_letter_setting.letter_name,

        employees.start_work_date_m as bedya_akd,employees.type_card as no3_hawia

        ');

        $this->db->from("hr_nmazg_letter_emp");

        $this->db->where($arr);

        $this->db->join('hr_nmazg_letter_setting', 'hr_nmazg_letter_emp.namozag_type_fk =hr_nmazg_letter_setting.id', 'left');

        $this->db->join('employees', 'employees.emp_code =hr_nmazg_letter_emp.emp_code', 'left');

        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->rateb_asasy = $this->get_finance($row->emp_code,'100');
                $arr[$a]->sum_badlat = $this->get_bdlat($row->emp_code);
            //    $arr[$a]->job_title = $this->get_job_title($row->degree_id);
              //  $arr[$a]->manger_name = $this->get_direct_manager_name_by_emp_id($row->id)->manager_name;
                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }
    
        public function get_finance($emp_code,$badl_code)
    {
        $this->db->where('emp_code', $emp_code);
        $this->db->where('badl_code', $badl_code);
        $query = $this->db->get('hr_finance_employes');
        if ($query->num_rows() > 0) {
            return $query->row()->value;
        } else {
            return false;
        }
    }
            public function get_bdlat($emp_code){
     $this->db->select('hr_finance_employes.*');
    $this->db->from("hr_finance_employes");
     $this->db->where('emp_code', $emp_code);
      $this->db->where('badl_code !=', 100);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach( $query->result() as $row){
                $total+=$row->value;
            }
        }
        return $total;
    }
   /* public function getAllDetails($arr)

    {

        $this->db->select('hr_nmazg_letter_emp.*,hr_nmazg_letter_setting.id,hr_nmazg_letter_setting.letter_name,

        employees.start_work_date_m as bedya_akd,employees.type_card as no3_hawia

        ');

        $this->db->from("hr_nmazg_letter_emp");

        $this->db->where($arr);

        $this->db->join('hr_nmazg_letter_setting', 'hr_nmazg_letter_emp.namozag_type_fk =hr_nmazg_letter_setting.id', 'left');

        $this->db->join('employees', 'employees.emp_code =hr_nmazg_letter_emp.emp_code', 'left');

        

        $query = $this->db->get();

   

        if ($query->num_rows() > 0) {

            $query=$query->row_array();

            if (!empty($query)){

            }

            return $query;

        } else {

            return false;

        }

        

    }*/

    

    

    

    

        public function get_nmazeg_rows_num($letter_rkm)

    {

        $this->db->where('letter_rkm_fk', $letter_rkm);

        $query = $this->db->get('hr_nmazg_letter_emp_attaches');

        if ($query->num_rows() > 0) {

            return $query->num_rows();

        } else {

            return 0;

        }

    }

    public function get_member_letter($wher_arr){

        $q=$this->db->where($wher_arr)->get('hr_nmazg_letter_emp_member')->result();

        $arr=array();

        if (!empty($q)){

            foreach ($q as $item){

                array_push($arr,$item->member_id);

            }

            return $arr;

        }

    }

    public function GetFromFr_settings($type)

    {

        $this->db->select('*');

        $this->db->from('fr_settings');

        $this->db->where('type', $type);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {

                $data[$row['id_setting']] = $row;

            }

            return $data;

        }

        return false;

    }

//yara

    public function get_geha_by_id($id)

    {

        $this->db->where('id', $id);

        $query = $this->db->get('hr_gehat_setting');

        if ($query->num_rows() > 0) {

            return $query->row();

        }

        return false;

    }

    public function delete_geha($id)

    {

        $this->db->where('id', $id);

        $this->db->delete('hr_gehat_setting');

    }

    public function update_geah($id)

    {

        $data['title'] = $this->input->post('geha_title');

        $data['mob'] = $this->input->post('mob');

        $data['address'] = $this->input->post('address');

        $this->db->where('id', $id);

        $this->db->update('hr_gehat_setting', $data);

    }

//yara

    // public function insert_attach($rkm,$all_img)

    // {

    //     if (!empty($all_img)) {

    //         $img_count = count($all_img);

    //      //  print_r($img_count);

    //         for ($a = 0; $a < $img_count; $a++) {

    //             $data['file'] = $all_img[$a];

    //             $this->db->where('id',$rkm)->update('hr_nmazg_letter_emp', $data);

    //         }

    //     }

    // }

    // public function get_attach($id)

    // {

    //     $this->db->where('id', $id);

    //     $query = $this->db->get('hr_nmazg_letter_emp');

    //     if ($query->num_rows() > 0) {

    //         return $query->row();

    //     }

    // }

    // public function delete_attach($id)

    // {

    //    $data['file']=Null; 

    //     $this->db->where('id', $id);

    //     $this->db->update('hr_nmazg_letter_emp',$data);

    // }

    public function get_by($table, $where_arr = false, $select = false)

    {

        if (!empty($where_arr)) {

            $this->db->where($where_arr);

        }

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            if (!empty($select) && $select != 1) {

                return $query->row()->$select;

            } else {

                if ($select == 1) {

                    return $query->row();

                } else {

                    return $query->result();

                }

            }

        } else {

            return false;

        }

    }

    ////////////////////////////////////yaraaaa/////

    public function select_depart($id = false)

    {

        $this->db->select('*');

        $this->db->from('employees');

        if (!empty($id)) {

            $this->db->where("id", $id);

        } else {

            $this->db->where("id", $_SESSION['emp_code']);

        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $a = 0;

            foreach ($query->result() as $row) {

                $arr[$a] = $row;

                $arr[$a]->administration_name = $this->get_edara_name_or_qsm($row->administration);

                $arr[$a]->departments_name = $this->get_edara_name_or_qsm($row->department);

                $arr[$a]->job_title = $this->get_job_title($row->degree_id);

              //  $arr[$a]->manger_name = $this->get_direct_manager_name_by_emp_id($row->id)->manager_name;

                $a++;

            }

            return $arr[0];

        } else {

            return 0;

        }

    }

    public function get_edara_name_or_qsm($id)

    {

        $this->db->where('id', $id);

        $query = $this->db->get('department_jobs');

        if ($query->num_rows() > 0) {

            return $query->row()->name;

        } else {

            return false;

        }

    }

    public function get_job_title($id)

    {

        $this->db->where('defined_id', $id);

        $query = $this->db->get('all_defined_setting');

        if ($query->num_rows() > 0) {

            return $query->row()->defined_title;

        } else {

            return false;

        }

    }

    public function get_all_emp()

    {

        $q = $this->db->get('employees')->result();

        if (!empty($q)) {

            foreach ($q as $key => $row) {

                $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);

                $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);

                $q[$key]->job_title = $this->get_job_title($row->degree_id);

            }

            return $q;

        }

    }





     //////////////////////////////////////////////model//////////////////////////////////////////

   public function insert_attach($id, $all_img)

   {





       if (!empty($all_img)) {

           $img_count = count($all_img);

           $title = $this->input->post('title');



           for ($a = 0; $a < $img_count; $a++) {

               $files['letter_rkm_fk'] = $id;

            

               $files['file'] = $all_img[$a];

            

            

               $this->db->insert('hr_nmazg_letter_emp_attaches', $files);

           }



       }





   }



   public function get_attach($id)

   {

       $this->db->where('letter_rkm_fk', $id);

       $query = $this->db->get('hr_nmazg_letter_emp_attaches');

       if ($query->num_rows() > 0) {

           return $query->result();

       }



   }



   public function delete_attach($id)

   {



       $this->db->where('id', $id);

       $this->db->delete('hr_nmazg_letter_emp_attaches');

   }

   

   

   

   public function get_employees_by_level($arr)

{

    $query = $this->db->where($arr)->get('hr_egraat_emp_setting');

    if ($query->num_rows() > 0) {

        $query = $query->row();

        return $query;

    } else {

        return false;

    }

}

public function get_user_id($emp_code)

{

    $q = $this->db->where('emp_code', $emp_code)->get('users')->row();

    if (!empty($q)) {

        return $q->user_id;

    }

}





public function make_suspend($id)

{

    $this->db->where('letter_rkm', $id);

    $this->db->update('hr_nmazg_letter_emp',array('finished'=>'yes','seen'=>0));

}

public function update_seen_order()

{

    $this->db->where(array('finished'=>'no','current_to_user_id'=> $_SESSION['user_id'],'seen'=>0));

    $this->db->update('hr_nmazg_letter_emp',array('seen'=>1));

}

public function update_seen_emp()

{

    $this->db->where(array('finished'=>'yes','emp_id'=> $_SESSION['emp_code'],'seen'=>0));

    $this->db->update('hr_nmazg_letter_emp',array('seen'=>1));

}





     public function edit_days ($post){
        $params = [
            'from_date'       =>$post['from_date'],
            'to_date'       =>$post['to_date']
        ];
        $this->db->where('letter_rkm',$post['rkm_id']);
        $this->db->update('hr_nmazg_letter_emp',$params);
    }
    
    
    
        public function get_days($rkm_id,$data_need)

    {

        $this->db->where('letter_rkm', $rkm_id);

        $query = $this->db->get('hr_nmazg_letter_emp');

        if ($query->num_rows() > 0) {

            return $query->row()->$data_need;

        } else {

            return false;

        }

    }
}