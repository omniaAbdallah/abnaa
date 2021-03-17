<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Talb_hij_omra_model extends CI_Model
{
    /*31-1-21-om*/
    public function getAllDetails_data($id)
    {
        $this->db->select('osr_talbat_hij_omra.*,osr_talbat_main.*')
            ->from("osr_talbat_hij_omra")
            ->join('osr_talbat_main', 'osr_talbat_main.id=osr_talbat_hij_omra.main_id_fk')
            ->where('osr_talbat_main.id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            if (!empty($query)) {
                $query['type_sevice_name'] = $this->get_by('osr_serv_khdmat_settings', array('id' => $query['type_sevice']), 'khdma_name');
                $query['f2a_service_name'] = $this->get_by('osr_serv_khdmat_fe2a_setting', array('id' => $query['f2a_service']), 'fe2a_title');
              
                return $query;
            }
        } else {
            return false;
        }
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
    public function select_last_talab_rkm()
    {
        $this->db->select('MAX(rkm_talab) as rkm_talab');
        $this->db->from("osr_talbat_hij_omra");
        $query = $this->db->get()->row_array();
        return $query['rkm_talab'] + 1;
    }
    public function insert($main_id)
    {
        $last_last_letter_rkm = $this->select_last_talab_rkm();
        $data['rkm_talab'] = $last_last_letter_rkm;
        $data['main_id_fk'] = $main_id;
        $data['talab_date'] = strtotime($this->input->post('talab_date'));
        $data['talab_date_ar'] = $this->input->post('talab_date');
        $data['talab_time'] = date('H:i:s a');
        $data['emp_add_id'] = $_SESSION['user_id'];
        $data['emp_add_code'] = $_SESSION['emp_code'];
        $data['emp_add_n'] = $this->getUserName($_SESSION['user_id']);
        $data['file_num'] = $this->input->post('file_num');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['osra_name'] = $this->input->post('osra_name');
        $data['mokadem_name'] = $this->input->post('mokadem_name');

        $data['fe2a_talab'] = $this->input->post('fe2a_talab');
        $data['mhrem_name'] = $this->input->post('mhrem_name');
        $data['mhrem_national_num'] = $this->input->post('mhrem_national_num');
     
        //
        $data['mhrem_birth_date'] 				   = $this->input->post('mhrem_birth_date');
        $data['first_hij_omra'] 				   = $this->input->post('first_hij_omra');
		$data['notes'] 		   = $this->input->post('notes');

        if (!empty($this->input->post('last_date_talb'))) {
            $data['last_date_talb'] = $this->input->post('last_date_talb');
        }
        if (!empty($this->input->post('last_date_sarf'))) {
            $data['last_date_sarf'] = $this->input->post('last_date_sarf');
        }
        $this->db->insert("osr_talbat_hij_omra", $data);
       // return $this->db->insert_id();
        $last_id = $this->db->insert_id();
        $this->insert_detalis($main_id);

    }
    // insert_detalis
    function insert_detalis($last_id)
    {
//        family_serv_hij_omra_datelis
//        if ($_POST['data']['mother_id']) {
        if (!empty($this->input->post('mother_id'))) {
            $data['talab_id_fk'] = $last_id;
            $data['talab_rkm_fk'] = $last_id;
            $data['file_num'] = $this->input->post('file_num');
            $data['member_id_fk'] = $this->input->post('mother_id');
            $data['mother_national_num'] =  $this->input->post('mother_national_num');
            $data['type_member'] = 1;
            $this->db->insert('osr_talbat_hij_omra_datelis', $data);
        }
//        if ($_POST['data']['member_id']) {
        if (!empty($this->input->post('member_id'))) {
            if (count($this->input->post('member_id')) > 0) {
                foreach ($this->input->post('member_id') as $datum) {
                    $data['talab_id_fk'] = $last_id;
                    $data['talab_rkm_fk'] =  $last_id;
                    $data['file_num'] = $this->input->post('file_num');
                    $data['member_id_fk'] = $datum;
                    $data['mother_national_num'] =$this->input->post('mother_national_num');
                    $data['type_member'] = 2;
                    $this->db->insert('osr_talbat_hij_omra_datelis', $data);
                }
            }
        }
    }
    public function update($id)
    {
        $data['file_num'] = $this->input->post('file_num');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['osra_name'] = $this->input->post('osra_name');
        $data['mokadem_name'] = $this->input->post('mokadem_name');
        //
      $data['mhrem_name'] = $this->input->post('mhrem_name');
        $data['mhrem_national_num'] = $this->input->post('mhrem_national_num');
        $data['fe2a_talab'] = $this->input->post('fe2a_talab');
        //
        $data['mhrem_birth_date'] = $this->input->post('mhrem_birth_date');
        $data['first_hij_omra']= $this->input->post('first_hij_omra');
		$data['notes'] 		   = $this->input->post('notes');
      
        $data['last_date_talb'] = $this->input->post('last_date_talb');
        $data['last_date_sarf'] = $this->input->post('last_date_sarf');
        $this->db->where("main_id_fk", $id);
        $this->db->update("osr_talbat_hij_omra", $data);
        $last_id = $id;
        $this->db->where('talab_id_fk', $last_id)->delete('osr_talbat_hij_omra_datelis');
        $this->insert_detalis($last_id);
    }
    public function select_last()
    {
        $this->db->select('*');
        $this->db->from("osr_talbat_hij_omra");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id;
            }
            return $data;
        } else {
            return 1;
        }
    }
    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from("osr_talbat_hij_omra");
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
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from("osr_talbat_hij_omra");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getFileNUmData($file_num)
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
    }
    public function getFamilyNum($mother_num)
    {
        $this->db->select('*');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_num);
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
    public function Delete($rkm)
    {
        $this->db->where("main_id_fk", $rkm);
        $this->db->delete("osr_talbat_hij_omra");
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
    public function getAllDetails($id)
    {
        $this->db->select('*');
        $this->db->from("osr_talbat_hij_omra");
        $this->db->where('main_id_fk', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            if (!empty($query)) {
                return $query;
            }
        } else {
            return false;
        }
    }
    public function family_member($file_num)
    {
        $q = $this->db->select('mother.mother_national_num_fk,mother.full_name')->where('basic.file_num', $file_num)
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')->get('mother')->row();
        if (!empty($q)) {
            $q->sons = $this->db->select('id,member_full_name,member_relationship,member_card_num,member_gender')->where('mother_national_num_fk', $q->mother_national_num_fk)
                ->get('f_members')->result();
            if (!empty($q->sons)) {
                foreach ($q->sons as $key => $item) {
                    $q->sons[$key]->member_relationship_title = $this->get_by('family_setting', array('id_setting' => $item->member_relationship), 'title_setting');
                }
            }
            return $q;
        }
        return false;
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
            return false;
        }
    }
    
    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }
    public function get_table($table, $arr)
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
    public function select_family_table($osra_in)
    {
        $this->db->select('basic.*,
      basic.mother_national_num  as  faher_name ,
      houses.h_house_owner_id_fk as h_house_owner_id_fk,
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
        $this->db->join('houses', 'houses.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->where('basic.final_suspend', 4);
        $this->db->where('basic.deleted', 0);
        $this->db->where('basic.file_status', 1);
        //yara
        $this->db->where('houses.h_house_owner_id_fk', 'rent');
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
//new_funcc
//new_funccc
    public function get_osra_in()
    {
        $query = $this->db->where('suspend', null)->get('osr_talbat_hij_omra')->result();
        $data = array();
        $x = 0;
        foreach ($query as $row) {
            $data[] = $row->mother_national_num;
            $x++;
        }
        if (!empty($data)) {
            return $data;
        } else {
            return 0;
        }
    }
// get_osra_in_last_date
    public function get_osra_in_last_date($file_num)
    {
        $query = $this->db->where('file_num', $file_num)->get('osr_talbat_hij_omra')->row();
        if (!empty($query)) {
            return $query;
        } else {
            return 0;
        }
    }
    public function getTable($table, $mother_national_num_fk)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result()[0];
            return $data;
        } else {
            return 0;
        }
    }
    public function get_from_family_setting($type)
    {
        $this->db->where('type', $type);
        // $this->db->limit(1);
        return $this->db->get('family_setting')->result();
    }
    public function select_places($from_id)
    {
        $this->db->select('*');
        $this->db->from("area_settings");
        $this->db->where("from_id", $from_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function getById($id)
    {
        $h = $this->db->get_where('houses', array('mother_national_num_fk' => $id));
        return $h->row_array();
    }
    public function select_search_mother($search_key_value)
    {
        $this->db->select('mother_national_num_fk, id ,full_name');
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public function select_search_member($search_key_value)
    {
        $this->db->select('mother_national_num_fk, id ,member_full_name');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
     ///yara3-2-2020
    
	public function getSetting($where)
	{
		return $this->db->where($where)->get('family_setting')->result();
    }
    
    function basic_data($national_num)
    {
        $q = $this->db->select('basic.file_num,basic.id as order_num,basic.family_cat_name as osara_fe2a,basic.final_suspend,
        mother.full_name as mother_name ,mother.categoriey_m,mother.mother_national_num_fk,mother.id,mother.m_mob,mother.m_marital_status_id_fk,
        father.full_name as father_name,father.f_national_id')
            ->from('mother')->where('mother.mother_national_num_fk', $national_num)
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')->where('basic.final_suspend', 4)
            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk')->get()->row();
        return $q;
    }
   
    public function member_data($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get();
        $a = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->member_person_type_name = $this->get_by('family_setting', array('id_setting' => $row->member_person_type), 'title_setting');
                $data[$a]->relation_name = $this->get_by('family_setting', array('id_setting' => $row->member_relationship), 'title_setting');
                $data[$a]->halet_member_name = $this->get_by('files_status_setting', array('id' => $row->halt_elmostafid_member), 'title');
                $data[$a]->stage_name = $this->get_by('classrooms', array('id' => $row->stage_id_fk), 'name');
                $data[$a]->class_name = $this->get_by('classrooms', array('id' => $row->class_id_fk), 'name');
                $data[$a]->reason = $this->get_by('family_reasons_settings', array('id' => $row->persons_process_reason), 'title');
                $a++;
            }
            return $data;
        } else {
            return 0;
        }
    }

    function get_array_member_by($table, $where_arr = false, $select = false)
    {
        $return_array = array();
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            if (!empty($select) && $select != 1) {
                $query = $query->result();
                foreach ($query as $item) {
                    array_push($return_array, $item->$select);
                }
            }
        }
        return $return_array;
    }

    
}