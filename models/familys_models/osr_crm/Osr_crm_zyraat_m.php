<?php

class Osr_crm_zyraat_m extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();

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

    public function select_all()
    {
        $this->db->select('osr_crm_zyraat.*,osr_crm_settings.title as visit_reason_title');
        $this->db->from('osr_crm_zyraat');
        $this->db->join('osr_crm_settings', 'osr_crm_zyraat.visit_reason=osr_crm_settings.conf_id');
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }

    public function get_table($table, $arr=false)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_table_by_id($table, $arr)
    {

        if (!empty($arr)) {

            $this->db->where($arr);

        }

        $query = $this->db->get($table)->row();

        return $query;

    }

    public function select_last_talab_rkm()
    {
        $this->db->select('MAX(rkm_visit) as rkm_visit');
        $this->db->from("osr_crm_zyraat");
        $query = $this->db->get()->row_array();
        return $query['rkm_visit'] + 1;
    }

    /*15-2-21-om*/
    public function get_file_num($mother_national_num)
    {
        $query = $this->db->where('mother_national_num', $mother_national_num)->get('basic')->row();
        if ($query->file_num != 0) {
            return $query->file_num;
        } else {
            return $query->id;
        }
    }

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

    public function add_emp_transform($post)
    {

        $update['suspend'] = 1;
        $update['level'] = 1;
        $update['seen'] = 0;
        $update['current_to_user_id'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $update['current_to_user_name'] = $this->get_emp($post['to_person_id'], 'employee');
        $update['current_from_user_id'] = $post['current_from_user_id'];
        $update['current_from_user_name'] = $post['current_from_user_name'];
        $this->db->where('id', $post['id_visit']);
        $this->db->update('osr_crm_zyraat', $update);
    }

    public function add_action_moder_edara($post)
    {
        $parmas['id_visit_fk'] = $post['id_visit'];
        $parmas['from_user'] = $post['current_from_user_id'];
        $parmas['from_user_n'] = $post['current_from_user_name'];
        $parmas['option_choosed'] = $post['option_choosed'];
        $parmas['reason_action'] = $post['notes'];
        /*$parmas['to_user'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $parmas['to_user_n'] = $this->get_emp($post['to_person_id'], 'employee');*/
        $parmas['talab_in_title'] = ' مدير الادارة الراعاية ';
        $parmas['date'] = strtotime(date('Y-m-d'));
        $parmas['date_ar'] = date('Y-m-d');
        $parmas['ttime'] = date('h:i A');
        if ($post['option_choosed'] == 'accept') {
            $parmas['action_title'] = 'موافق';
        } elseif ($post['option_choosed'] == 'refuse') {
            $parmas['action_title'] = 'غير موافق';
        }
        $parmas['level'] = 2;
        $parmas['action_to'] = $post['action_to'];

        $parmas['process_title'] = 'الإطلاع وإبداء الرأي';
        if ($post['option_choosed'] == 'accept') {
            $update['suspend'] = 1;
        } elseif ($post['option_choosed'] == 'refuse') {
            $update['suspend'] = 2;
        }
        $update['action_moder_edara'] = $post['option_choosed'];
        $update['action_moder_edara_date'] = date('Y-m-d');

        $update['level'] = 2;

        $update['seen'] = 0;
        $update['current_from_user_id'] = $post['current_from_user_id'];
        $update['current_from_user_name'] = $post['current_from_user_name'];
        $update['action_to'] = $post['action_to'];

        switch ($post['action_to']) {
            case 'to_lagna':
                $update['current_to_user_id'] = null;
                $update['current_to_user_name'] = null;
                $transformation_lagna_id_fk = $this->insert_transformation_lagna2(5, $post['mother_national_num']);
                $this->insert_history(0, $transformation_lagna_id_fk);
                $parmas['to_user'] = null;
                $parmas['to_user_n'] = null;
                break;
            default:
                $update['current_to_user_id'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
                $update['current_to_user_name'] = $this->get_emp($post['to_person_id'], 'employee');
                $parmas['to_user'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
                $parmas['to_user_n'] = $this->get_emp($post['to_person_id'], 'employee');
                break;
        }
        /*$update['current_to_user_id'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $update['current_to_user_name'] = $this->get_emp($post['to_person_id'], 'employee');
        */
        $this->db->insert('osr_crm_zyraat_trasformmation_history', $parmas);

        $this->db->where('id', $post['id_visit']);
        $this->db->update('osr_crm_zyraat', $update);

        $this->db->where('zyraa_id_fk', $post['id_visit']);
        $this->db->update('osr_crm_zyraat_bahth', array('rai_moder'=>$post['notes']));
    }

    public function insert_transformation_lagna2($process, $file_id)
    {  //
        $basic_data=$this->getbasic_data($file_id);
        $father_data=$this->get_father_data($file_id);
        $data['file_num'] = $basic_data['file_num'];
        $data['session_num_fk'] = $this->get_last_session();
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['mother_national_num'] = $file_id;
        $data['month_transfer'] = date("m", time());
        $data['process'] = $process;
        $procedure = explode('-', $this->input->post('procedure_id_fk'));
        $data['procedure_id_fk'] = $procedure[0];
        $data['title'] = $procedure[1];
        $data['person_transfer'] = $_SESSION['user_id'];
        $data['reason_lagna'] = $this->chek_Null($this->input->post('reason'));
        $data['add_to_lagna_id_fk'] = $this->input->post('add_to_lagna_id_fk');
        if (!empty($_POST['ids'])) {
            $data['person_details'] = json_encode($_POST['ids']);
        }
        $data['transfer_type_id_fk'] = $this->chek_Null($this->input->post('transfer_type_id_fk'));
        $this->db->insert('transformation_lagna', $data);
        $transformation_lagna_id_fk = $this->db->insert_id();
        if ($process == 5) {
            //   die;
            if (!empty($_POST['ids'])) {
                foreach ($_POST['ids'] as $row) {
                    $data2['file_num'] = $basic_data['file_num'];
                    $data2['mother_national_num'] = $file_id;
                    $data2['session_num_fk'] = $this->get_last_session();
                    $data2['procedure_id_fk'] = $this->chek_Null($procedure[0]);
                    $data2['procedure_title'] = $this->chek_Null($procedure[1]);
                    $data2['halet_file_id_fk'] = $this->chek_Null($this->input->post('halet_file_id_fk'));
                    $data2['halet_file_title'] = $this->chek_Null($this->input->post('halet_file_title'));
                    if ($row == $file_id) {
                        $data2['person_type'] = 1;
                    } else {
                        $data2['person_type'] = 2;
                    }
                    $data2['person_id_fk'] = $row;
                    $data2['person_name'] = $this->getName($row, $file_id);;
                    $this->db->insert('transformation_lagna_members', $data2);
                    /*  echo "<pre>";
                      print_r($data2);
                      echo "</pre>";*/
                }
                // die;
            } else {
                $data2['file_num'] = $basic_data['file_num'];
                $data2['mother_national_num'] = $file_id;
                $data2['session_num_fk'] = $this->get_last_session();
                $data2['procedure_id_fk'] = $this->chek_Null($procedure[0]);
                $data2['procedure_title'] = $this->chek_Null($procedure[1]);
                $data2['halet_file_id_fk'] = $this->chek_Null($this->input->post('halet_file_id_fk'));
                $data2['halet_file_title'] = $this->chek_Null($this->input->post('halet_file_title'));
                $data2['person_type'] = 1;
                $data2['person_id_fk'] = $father_data['f_national_id'];
                $data2['person_name'] = $father_data['full_name'];
                $this->db->insert('transformation_lagna_members', $data2);
            }
        }
        /*     echo "<pre>";
             print_r($data2);
             echo "</pre>";
             die;*/
        return $transformation_lagna_id_fk;
    }

    public function get_last_session()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('selected_lagna_members');
        if ($query->num_rows() > 0) {
            return $query->row()->session_number;
        } else {
            return 0;
        }
    }
    public function getName($id, $mother_num)
    {
        if ($id == $mother_num) {
            $h = $this->db->get_where("mother", array('mother_national_num_fk' => $mother_num));
            if ($h->num_rows() > 0) {
                return $h->row_array()['full_name'];
            } else {
                return false;
            }
        } else {
            $h = $this->db->get_where("f_members", array('id' => $id));
            if ($h->num_rows() > 0) {
                return $h->row_array()['member_full_name'];
            } else {
                return false;
            }
        }
    }
    public function getbasic_data($mother_num)
    {
            $h = $this->db->get_where("basic", array('mother_national_num' => $mother_num));
            if ($h->num_rows() > 0) {
                return $h->row_array();
            } else {
                return false;
            }

    }
    public function get_father_data($mother_num)
    {
            $h = $this->db->get_where("father", array('mother_national_num_fk' => $mother_num));
            if ($h->num_rows() > 0) {
                return $h->row_array();
            } else {
                return false;
            }

    }

    function insert_history($approved, $ids)
    {
        $data['emp_add_id'] = $_SESSION['user_id'];
        $data['emp_add_code'] = $_SESSION['emp_code'];
        $data['emp_add_n'] = $this->getUserName($_SESSION['user_id']);
        $data['approved'] = $approved;
        $data['date_ar'] = date("Y-m-d");
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        if (!empty($ids) && (is_array($ids))) {
            foreach ($ids as $id) {
                $data['transformation_lagna_id_fk'] = $id;
                $this->db->insert("transformation_lagna_history", $data);
            }
        } else {
            $data['transformation_lagna_id_fk'] = $ids;
            $this->db->insert("transformation_lagna_history", $data);
        }
    }


    public function get_all_history($talab_id_fk = null)
    {
        $this->db->select('osr_crm_zyraat_trasformmation_history.*');
        $this->db->from('osr_crm_zyraat_trasformmation_history');
        $this->db->order_by('id', 'ASC');
        if ($talab_id_fk != null) {
            $this->db->where('id_visit_fk', $talab_id_fk);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
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
    public function get_transformed()
    {
        $this->db->select('osr_crm_zyraat.*,osr_crm_settings.title as visit_reason_title');
        $this->db->from('osr_crm_zyraat');
        $this->db->join('osr_crm_settings', 'osr_crm_zyraat.visit_reason=osr_crm_settings.conf_id');
        $this->db->where('osr_crm_zyraat.current_to_user_id', $_SESSION['user_id']);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->result();
            return $query;
        } else {
            return false;
        }
    }
    function update_seen_crm_zyraat()
    {
        $this->db->where('current_to_user_id', $_SESSION['user_id']);
        $this->db->update('osr_crm_zyraat', array('seen' => 1));
    }
    function close_crm_zyraat($id)
    {
        $data['visit_close'] ='yes';
        $data['visit_close_emp'] = $_SESSION['emp_name'];
        //yara
        $data['visit_close_date'] = date('Y-m-d');
        $data['visit_close_time'] = date('H:i a');
        $this->db->where('id', $id);
        $this->db->update('osr_crm_zyraat',$data);
    }

    public function insert()
    {
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['rkm_visit'] = $this->select_last_talab_rkm();
        $data['visit_date'] = $this->input->post('visit_date');
        $data['visit_time_from'] = $this->input->post('visit_time_from');
        $data['visit_time_to'] = $this->input->post('visit_time_to');
        $data['search_type'] = $this->input->post('search_type');
        $data['visit_reason'] = $this->input->post('visit_reason');
        $data['visit_result'] = $this->input->post('visit_result');
        $data['lng'] = $this->input->post('lng');
        $data['lat'] = $this->input->post('lat');
        $data['emp_code'] = $_SESSION["emp_code"];
        $data['emp_name'] = $_SESSION['emp_name'];

        //yara
        $data['file_num'] = $this->get_file_num($data['mother_national_num']);
        $data['date_added'] = date('Y-m-d');
        $data['time_added'] = date('H:i a');
        //yara
        $this->db->insert('osr_crm_zyraat', $data);
        $id = $this->db->insert_id();
        $this->add_history('add', $id);

    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('osr_crm_zyraat');
        $this->add_history('delete', $id);

    }

    public function update($id)
    {
        $data['mother_national_num'] = $this->input->post('mother_national_num');

        $data['visit_date'] = $this->input->post('visit_date');
        $data['visit_time_from'] = $this->input->post('visit_time_from');
        $data['visit_time_to'] = $this->input->post('visit_time_to');
        $data['search_type'] = $this->input->post('search_type');
        $data['visit_reason'] = $this->input->post('visit_reason');
        $data['visit_result'] = $this->input->post('visit_result');
        $data['lng'] = $this->input->post('lng');
        $data['lat'] = $this->input->post('lat');
        $data['emp_code'] = $_SESSION["emp_code"];
        $data['emp_name'] = $_SESSION['emp_name'];

        //yara
        $data['file_num'] = $this->get_file_num($data['mother_national_num']);
        //yara
        $this->db->where('id', $id)->update('osr_crm_zyraat', $data);
        $this->add_history('edite', $id);

    }

    public function do_change_time_zyraa($id)
    {
        $crm_data = $this->getByArray($id);

        $data['visit_date'] = $this->input->post('visit_date');
        $data['visit_time_from'] = $this->input->post('visit_time_from');
        $data['visit_time_to'] = $this->input->post('visit_time_to');
        $data['changed_maw3d_reason'] = $this->input->post('reason');
        /* $data['visit_time_from'] =  date('h:i A', strtotime($this->input->post('visit_time_from')));
         $data['visit_time_to'] = date('h:i A', strtotime($this->input->post('visit_time_to')));*/
        $data['changed_maw3d'] = 'yes';
        $data['changed_maw3d_date'] = date('Y-m-d');
        $data['changed_maw3d_time'] = date('h:i a');
        $data['changed_maw3d_emp_n'] = $_SESSION['emp_name'];
        $this->db->set('changed_maw3d_num', 'changed_maw3d_num+1', FALSE);
        $this->db->set($data);
        $this->db->where('id', $id)->update('osr_crm_zyraat', $data);
        $old_data['visit_date'] = $crm_data['visit_date'];
        $old_data['visit_time_from'] = $crm_data['visit_time_from'];
        $old_data['visit_time_to'] = $crm_data['visit_time_to'];
        $this->add_history('change_time', $id, $old_data);
    }


    function add_history($action, $visit_id_fk, $data = array())
    {

        $actions = array('add' => 'اضافة', 'edite' => 'تعديل', 'delete' => "حذف", 'start' => "بداية الزيارة", 'end' => "نهاية الزيارة", 'change_time' => "تغير موعد الزيارة");
        $data['action'] = $action;
        $data['visit_id_fk'] = $visit_id_fk;
        if (key_exists($action, $actions)) {
            $data['action_n'] = $actions[$action];
        }
        $data['action_date'] = date('Y-m-d');
        $data['action_time'] = date('h:i a');
        $data['action_emp_user_id'] = $_SESSION["user_id"];
        $data['action_emp_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('osr_crm_zyraat_history', $data);

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


    public function getByArray($id)
    {
        $this->db->select('osr_crm_zyraat.*,osr_crm_settings.title as visit_reason_title');
        $this->db->from('osr_crm_zyraat');
        $this->db->join('osr_crm_settings', 'osr_crm_zyraat.visit_reason=osr_crm_settings.conf_id');
        $this->db->where(array("id" => $id));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_date($visit_date, $visit_time_from, $visit_time_to)
    {
        $this->db->select('visit_date');
        $this->db->from("osr_crm_zyraat");
        $this->db->where("visit_date", $visit_date);
        $this->db->where("visit_time_from", $visit_time_from);
        $this->db->where("visit_time_to", $visit_time_to);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;
    }

    public function get_fasel_zamni()
    {
        $this->db->select('fasel_zeyara');
        $this->db->from('osr_main_setting');
        $this->db->where(array("id" => 1));
        $query = $this->db->get()->row()->fasel_zeyara;
        return $query;
    }

    public function select_family_table()
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
        $this->db->where('basic.deleted', 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getFileNUmData($mother_national_num_fk)
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
        $this->db->where('basic.mother_national_num', $mother_national_num_fk);
        $this->db->group_by('f_members.mother_national_num_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();

            return $query;
        } else {
            return false;
        }
    }


} ?>