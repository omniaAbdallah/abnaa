<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Talb_main_model extends CI_Model
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

    public function select_categories()
    {
        $sql = $this->db->select('*')
            ->where('from_id', 0)
            ->get('service_categories');
        if ($sql->num_rows() > 0) {
            $i = 0;
            foreach ($sql->result() as $row) {
                $data[$i] = $row;
                $data[$i]->subCategories = $this->getSubCategories($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function getSubCategories($from_id)
    {
        return $this->db->where('from_id', $from_id)->get('service_categories')->result();
    }

    public function select_last_talab_rkm()
    {
        $this->db->select('MAX(rkm_talab) as rkm_talab');
        $this->db->from("osr_talbat_main");
        $query = $this->db->get()->row_array();
        return $query['rkm_talab'] + 1;

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

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from("osr_talbat_main");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $item) {
                $query[$key]->type_sevice_title = $this->get_by('osr_serv_khdmat_settings', array('id' => $item->type_sevice), 'khdma_name');
                $query[$key]->f2a_service_title = $this->get_by('osr_serv_khdmat_fe2a_setting', array('id' => $item->f2a_service), 'fe2a_title');
       
            }
            return $query;
        } else {
            return false;
        }
    }

    public function select_search_mother($file_num)
    {
        $this->db->select('mother.mother_national_num_fk, mother.id ,mother.full_name');
        $this->db->from("mother");
        $this->db->join('basic', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->where('basic.file_num', $file_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    //==========================================
    public function select_search_member($file_num)
    {
        $this->db->select('f_members.mother_national_num_fk, f_members.id ,f_members.member_full_name');
        $this->db->from("f_members");
        $this->db->join('basic', 'f_members.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->where('basic.file_num', $file_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    /*    public function getFileNUmData($file_num)
        {
            $this->db->select('basic.*,
          basic.mother_national_num  as  faher_name ,
          houses.hai_name as  hai_name,
          houses.h_village_id_fk as  hai_id,
             father.f_national_id     as  father_national,
              father.full_name as father_full_name,
               mother.full_name     as  mother_name,
               mother.mother_national_card_new     as  mother_new_card,
                files_status_setting.title as process_title ,
                  files_status_setting.color as files_status_color ,
                mother.categoriey_m as categorey');
            $this->db->from('basic');
            $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
            $this->db->join('houses', 'houses.mother_national_num_fk = basic.mother_national_num', "left");
            $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
            $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
            $this->db->where('basic.file_num', $file_num);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->row_array();
            } else {
                return false;
            }
        }*/
    public function getFileNUmData($file_num)
    {
        $this->db->select('basic.file_num,basic.male_number,basic.family_members_number,basic.contact_mob,basic.family_cat_name,basic.file_update_date,
      basic.mother_national_num  as  faher_name ,
      houses.h_house_type_id_fk ,houses.h_house_owner_id_fk ,houses.h_village_id_fk ,houses.h_center_id_fk ,houses.h_city_id_fk ,houses.h_area_id_fk ,houses.h_street ,
      father.f_national_id as  father_national,  father.full_name as father_full_name,
      mother.full_name  as  full_name, mother.mother_national_card_new     as  national_card,mother.categoriey_m as categorey,
      mother.m_marital_status_id_fk as marital_status_id_fk ,mother.m_relationship as relationship,mother.m_birth_date as birth_date ,mother.m_nationality as nationality 
      ,mother.m_gender  as gender,mother.m_mob as mob,
      mother.m_another_mob as another_mob ,mother.m_education_level_id_fk  as education_level_id_fk,mother.m_want_work  as want_work,mother.m_job_id_fk as job_id_fk ,
      files_status_setting.title as process_title , files_status_setting.color as files_status_color ,
      SUM(case when f_members.persons_status = 1 then 1 else 0 end) as member_num,SUM(case when mother.halt_elmostafid_m = 1 then 1 else 0 end) as mother_num ');
        $this->db->from('basic');
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('houses', 'houses.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
        $this->db->where('basic.file_num', $file_num);
        /*        $this->db->where('mother.id', $id);*/

        $this->db->group_by('f_members.mother_national_num_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            /* $query['h_house_type_name'] = $this->get_by('family_setting', array('id_setting' => $query['h_house_type_id_fk']), 'title_setting');
             $query['h_house_owner_name'] = $this->get_by('family_setting', array('id_setting' => $query['h_house_owner_id_fk']), 'title_setting');
             $query['m_nationality_name'] = $this->get_by('family_setting', array('id_setting' => $query['nationality']), 'title_setting');
             $query['m_education_level_name'] = $this->get_by('family_setting', array('id_setting' => $query['education_level_id_fk']), 'title_setting');
             $query['m_relationship_name'] = $this->get_by('family_setting', array('id_setting' => $query['relationship']), 'title_setting');
             $query['m_marital_status_name'] = $this->get_by('family_setting', array('id_setting' => $query['marital_status_id_fk']), 'title_setting');
             $query['m_job_name'] = $this->get_by('family_setting', array('id_setting' => $query['marital_status_id_fk']), 'title_setting');
             $query['area'] = $this->get_by('area_settings', array('id' => $query["h_area_id_fk"]), 'title');
             $query['city'] = $this->get_by('area_settings', array('id' => $query["h_city_id_fk"]), 'title');
             $query['centers'] = $this->get_by('area_settings', array('id' => $query["h_center_id_fk"]), 'title');
             $query['village'] = $this->get_by('area_settings', array('id' => $query["h_village_id_fk"]), 'title');*/


            return $query;
        } else {
            return false;
        }
    }

    public function getFamilyNum($mother_num)
    {
        $this->db->select('*');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_num);
        //  $this->db->where_in("persons_status",array(1,2));
        $this->db->where("persons_status", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function get_mother_status($mother_num)
    {
        $this->db->select('*');
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_num);
        $this->db->where("halt_elmostafid_m", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

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
            return array();
        }
    }

    public function insert()
    {

        $last_last_letter_rkm = $this->select_last_talab_rkm();

        $data['rkm_talab'] = $last_last_letter_rkm;
        //   $data['letter_rkm'] =$this->input->post('letter_rkm');
        $data['talab_date'] = strtotime($this->input->post('talab_date'));
        $data['talab_date_ar'] = $this->input->post('talab_date');
        $data['talab_time'] = date('H:i:s a');
        $data['emp_add_id'] = $_SESSION['user_id'];
        $data['emp_add_code'] = $_SESSION['emp_code'];
        $data['emp_add_n'] = $this->getUserName($_SESSION['user_id']);
        $data['file_num'] = $this->input->post('file_num');
        $data['type_sevice'] = $this->input->post('type_sevice');
        $data['f2a_service'] = $this->input->post('f2a_service');
       $data['type_sevice_n'] = $this->input->post('type_sevice_n');
       $data['f2a_service_n'] = $this->input->post('f2a_service_n');
        $data['date_int'] = strtotime(date("Y-m-d"));
        $data['date_ar'] = date("Y-m-d");
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert("osr_talbat_main", $data);
        return $this->db->insert_id();

    }

    public function insert_attach($main_id, $images)
    {
        if (isset($images) && !empty($images)) {
            $count = count($images);
            for ($x = 0; $x < $count; $x++) {

                $data['file'] = $images[$x];
                /*                $data['talab_rkm_fk'] = $device_id;*/
                $data['main_id_fk'] = $main_id;
                $data['date'] = strtotime(date("Y-m-d"));
                $data['date_ar'] = date("Y-m-d");
                $data['time'] = date('h:i:s a');
                $data['publisher'] = $_SESSION['user_id'];
                $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
                $this->db->insert('osr_talbat_main_files', $data);
            }
        }
    }

    public function select_family_table($osra_in)
    {
        /*houses.h_house_owner_id_fk as h_house_owner_id_fk,*/
        $this->db->select('basic.*,
              basic.mother_national_num  as  faher_name ,
              father.f_national_id     as  father_national,
              father.full_name as father_full_name,
              mother.full_name     as  mother_name,
              mother.mother_national_card_new     as  mother_new_card,
              files_status_setting.title as process_title ,
              files_status_setting.color as files_status_color ,
              mother.categoriey_m as categorey');
        $this->db->from('basic');
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
        /*        $this->db->join('houses', 'houses.mother_national_num_fk = basic.mother_national_num', "left");*/
        $this->db->where('basic.final_suspend', 4);
        $this->db->where('basic.deleted', 0);
        $this->db->where('basic.file_status', 1);
        //yara
        /*        $this->db->where('houses.h_house_owner_id_fk', 'rent');*/
        if (!empty($osra_in)) {
            $this->db->where_not_in('basic.mother_national_num', $osra_in);
        }
        //yara
        $this->db->order_by('file_num', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAllDetails($id)
    {
        $this->db->select('*');
        $this->db->from("osr_talbat_main");
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            return $query;
        } else {
            return false;
        }
    }

    public function delete_morfq($id)
    {
        $this->db->where('id', $id)->delete('osr_talbat_main_files');
    }

    public function delete_upload($id)
    {
        $img = $this->get_by('osr_talbat_main_files', array('id' => $id), 1);
        $path = 'uploads/family_attached/osr_talbat_files';
        if (file_exists($path . "/" . $img->file)) {
            unlink(FCPATH . "" . $path . "/" . $img->file);
        }
    }

    public function get_morfq_by_id($id)
    {

        $this->db->where('main_id_fk', $id);
        $query = $this->db->get('osr_talbat_main_files');
        return $query->result();
    }

    public function get_images($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('osr_talbat_main_files');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update($id)
    {


        $data['talab_date'] = strtotime($this->input->post('talab_date'));
        $data['talab_date_ar'] = $this->input->post('talab_date');
        $data['file_num'] = $this->input->post('file_num');
        $this->db->where("id", $id);
        $this->db->update("osr_talbat_main", $data);
        return $id;
    }


    public function Delete($rkm)
    {

        $imgs = $this->get_by('osr_talbat_main_files', array('main_id_fk' => $rkm));
        $path = 'uploads/family_attached/osr_talbat_files';
        foreach ($imgs as $img) {
            if (file_exists($path . "/" . $img->file)) {
                unlink(FCPATH . "" . $path . "/" . $img->file);
            }
        }

        $this->db->where("id", $rkm)->delete("osr_talbat_main");
        $this->db->where('main_id_fk', $rkm)->delete("osr_talbat_main_files");
    }

    /*28-1-21-om-end*/

    /*31-1-21-om-start*/

    public function get_all_emps_egraat($job_title_code_fk)
    {
        $this->db->select('hr_egraat_emp_setting.*');
        $this->db->from('hr_egraat_emp_setting');
        $this->db->where('job_title_code_fk', $job_title_code_fk);
        $this->db->where('person_suspend', 1);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_emp($emp_id, $data_need)
    {
        $this->db->where('id', $emp_id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row()->$data_need;
        } else {
            return false;
        }
    }

    public function get_emp_user_id($emp_id, $data_need)
    {
        $this->db->where('emp_code', $emp_id);
        $this->db->where('role_id_fk', 3);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->row()->$data_need;
        } else {
            return false;
        }
    }

    public function add_emp_transform($post)
    {
        /*        $parmas['talab_id_fk'] = $post['talab_id'];

                $parmas['talab_rkm_fk'] = $post['rkm_talab'];
                $parmas['from_user'] = $post['current_from_user_id'];
                $parmas['from_user_n'] = $post['current_from_user_name'];

                $parmas['option_choosed'] = $post['option_choosed'];
                $parmas['reason_action'] = $post['notes'];
                $parmas['to_user'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
                $parmas['to_user_n'] = $this->get_emp($post['to_person_id'], 'employee');
                $parmas['talab_in_title'] = 'المدير المباشر';
                $parmas['date'] = strtotime(date('Y-m-d'));
                $parmas['date_ar'] = date('Y-m-d');

                $parmas['ttime'] = date('h:i A');


                $parmas['process_title'] = 'الإطلاع وإبداء الرأي';
                $this->db->insert('osr_talbat_main_history', $parmas);*/


        /*      if($post['option_choosed'] == 'accept'){
                  $update['suspend'] = 1;
              }elseif($post['option_choosed'] == 'refuse'){
                  $update['suspend'] = 2;
              }


              $update['action_bahth'] = $post['option_choosed'];
              $update['action_bahth_date'] = date('Y-m-d');

         */
        $update['suspend'] = 1;
        $update['level'] = 1;
        $update['seen'] =0;
        $update['current_to_user_id'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $update['current_to_user_name'] = $this->get_emp($post['to_person_id'], 'employee');
        $update['current_from_user_id'] = $post['current_from_user_id'];
        $update['current_from_user_name'] = $post['current_from_user_name'];
        $this->db->where('id', $post['talab_id']);
        $this->db->update('osr_talbat_main', $update);
    }
    public function add_emp_action($post)
    {
        $parmas['talab_id_fk'] = $post['talab_id'];

        $parmas['talab_rkm_fk'] = $post['rkm_talab'];
        $parmas['from_user'] = $post['current_from_user_id'];
        $parmas['from_user_n'] = $post['current_from_user_name'];

        $parmas['option_choosed'] = $post['option_choosed'];
        $parmas['reason_action'] = $post['notes'];
        $parmas['to_user'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $parmas['to_user_n'] = $this->get_emp($post['to_person_id'], 'employee');
        $parmas['talab_in_title'] = 'الموظف المختص ';
        $parmas['date'] = strtotime(date('Y-m-d'));
        $parmas['date_ar'] = date('Y-m-d');

        $parmas['ttime'] = date('h:i A');

        if ($post['option_choosed'] == 'accept') {
            $parmas['action_title'] = 'موافق';
        } elseif ($post['option_choosed'] == 'refuse') {
            $parmas['action_title'] = 'غير موافق';
        }
        $parmas['process_title'] = 'الإطلاع وإبداء الرأي';
        $this->db->insert('osr_talbat_main_history', $parmas);


        if($post['option_choosed'] == 'accept'){
            $update['suspend'] = 1;
        }elseif($post['option_choosed'] == 'refuse'){
            $update['suspend'] = 2;
        }


        $update['action_bahth'] = $post['option_choosed'];
        $update['action_bahth_date'] = date('Y-m-d');


        $update['level'] = 2;
        $update['seen'] = 0;

        $update['current_to_user_id'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $update['current_to_user_name'] = $this->get_emp($post['to_person_id'], 'employee');

        $update['current_from_user_id'] = $post['current_from_user_id'];
        $update['current_from_user_name'] = $post['current_from_user_name'];

        $this->db->where('id', $post['talab_id']);
        $this->db->update('osr_talbat_main', $update);
    }

    public function add_action($post)
    {
        $parmas['talab_id_fk'] = $post['talab_id'];

        $parmas['talab_rkm_fk'] = $post['rkm_talab'];
        $parmas['from_user'] = $post['current_from_user_id'];
        $parmas['from_user_n'] = $post['current_from_user_name'];

        $parmas['option_choosed'] = $post['option_choosed'];
        $parmas['reason_action'] = $post['notes'];
        $parmas['to_user'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $parmas['to_user_n'] = $this->get_emp($post['to_person_id'], 'employee');
        $parmas['talab_in_title'] = 'المدير ادارة الرعاية';
        $parmas['date'] = strtotime(date('Y-m-d'));
        $parmas['date_ar'] = date('Y-m-d');

        $parmas['ttime'] = date('h:i A');

        if ($post['option_choosed'] == 'accept') {
            $parmas['action_title'] = 'موافق';
        } elseif ($post['option_choosed'] == 'refuse') {
            $parmas['action_title'] = 'غير موافق';
        }
        $parmas['process_title'] = 'الإفادة ومراجعة الطلب';
        $this->db->insert('osr_talbat_main_history', $parmas);


        if ($post['option_choosed'] == 'accept') {
            $update['level'] = 3;
            $update['suspend'] = 4;

        } elseif ($post['option_choosed'] == 'refuse') {
            $update['level'] = 0;
            $update['suspend'] = 2;
        }

        $update['action_moder_edara'] = $post['option_choosed'];
        $update['action_moder_edara_date'] = date('Y-m-d');
        $update['seen'] = 0;
        $update['current_to_user_id'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');
        $update['current_to_user_name'] = $this->get_emp($post['to_person_id'], 'employee');

        $update['current_from_user_id'] = $post['current_from_user_id'];
        $update['current_from_user_name'] = $post['current_from_user_name'];
        $this->db->where('id', $post['talab_id']);
        $this->db->update('osr_talbat_main', $update);
        /*echo '<pre>';
        print_r($_POST);
        print_r($this->db->last_query());
        die;*/
    }

    public function get_all_history($talab_id_fk = null)
    {
        $this->db->select('osr_talbat_main_history.*');
        $this->db->from('osr_talbat_main_history');
        $this->db->order_by('id', 'ASC');
        if ($talab_id_fk != null) {
            $this->db->where('talab_id_fk', $talab_id_fk);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }
    public function get_transformed()
    {
        $this->db->select('osr_talbat_main.*');
        $this->db->from('osr_talbat_main');

        $this->db->where('current_to_user_id', $_SESSION['user_id']);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $item) {
                $query[$key]->type_sevice_title = $this->get_by('osr_serv_khdmat_fe2a_setting', array('id' => $item->type_sevice), 'fe2a_title');
                $query[$key]->f2a_service_title = $this->get_by('osr_serv_khdmat_settings', array('id' => $item->f2a_service), 'khdma_name');

            }
            return $query;
        } else {
            return false;
        }
    }
    function update_seen_main_taleb()
    {
        $this->db->where('current_to_user_id', $_SESSION['user_id']);
        $this->db->update('osr_talbat_main', array('seen' => 1));
    }


}