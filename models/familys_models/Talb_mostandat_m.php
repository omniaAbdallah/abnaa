<?php

class Talb_mostandat_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
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

    function get_all_data($mother_num)
    {
        $query = $this->db->select('osr_talb_mostandat.*,osr_talb_mostandat_details.*,
        SUM(case when osr_talb_mostandat_details.taslem =\'yes\' then 1 else 0 end) as taslem_yes ,
        SUM(case when osr_talb_mostandat_details.taslem =\'no\' then 1 else 0 end) as taslem_no')
            ->from('osr_talb_mostandat')
            ->join('osr_talb_mostandat_details', 'osr_talb_mostandat.talb_mostand_id=osr_talb_mostandat_details.talb_mostand_id_fk', 'left')
            ->where('mother_national_num_fk', $mother_num)->group_by('osr_talb_mostandat_details.talb_mostand_id_fk')->get()->result_array();
        return $query;
    }

    public function select_search_mother($mother_num)
    {
        $this->db->select('mother.mother_national_num_fk, mother.id ,mother.full_name');
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('mother');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    //==========================================
    public function select_search_member($mother_num)
    {
        $this->db->select('f_members.mother_national_num_fk, f_members.id ,f_members.member_full_name');
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('f_members');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_basic_data($mother_national_num)
    {
        $this->db->select('id,file_num,contact_mob,mother_national_num');
        $this->db->from("basic");
        $this->db->where("mother_national_num", $mother_national_num);
        $query = $this->db->get();
        return $query->row_array();

    }

    public function get_dest_card($id)
    {
        $this->db->where('id_setting', $id);
        $query = $this->db->get('family_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        } else {
            return false;
        }
    }

    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from("osr_talb_mostandat");
        $this->db->order_by("talb_mostand_id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->talb_mostand_id;
            }
            return $data + 1;
        } else {
            return 1;
        }
    }

    public function insert_talb()
    {
        $data['talb_mostand_id'] = $this->select_last_id();
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num');
        $data['file_num'] = $this->input->post('file_num');
        $data['osra_id_fk'] = $this->input->post('osra_id_fk');
        $data['talb_date'] = $this->input->post('talb_date');
        $data['last_date_taslem'] = $this->input->post('last_date_taslem');
        $data['osra_contact_mob'] = $this->input->post('osra_contact_mob');
        $data['osra_mandob'] = $this->input->post('osra_mandob');
        $data['talb_title'] = $this->input->post('talb_title');
        $data['emp_id'] = $_SESSION['user_id'];
        $data['emp_code'] = $_SESSION['emp_code'];
        $data['emp_name'] = $this->getUserName($_SESSION['user_id']);
        $data['add_date'] = date('Y-m-d');
        $data['add_time'] = date('h : i a');
        $this->db->insert('osr_talb_mostandat', $data);
        return $data['talb_mostand_id'];
    }

    public function insert_files($talb_mostand_id_fk)
    {
        $mostands = $this->input->post('mostand_id');
        if (!empty($mostands) && (is_array($mostands))) {
            for ($i = 0; $i < sizeof($mostands); $i++) {
                $data['talb_mostand_id_fk'] = $talb_mostand_id_fk;
                $data['mostand_id'] = $this->input->post('mostand_id')[$i];
                $data['mostand_name'] = $this->get_by('family_setting', array('id_setting' => $data['mostand_id']), 'title_setting');
                $data['taslem'] = $this->input->post('taslem')[$i];
                $data['doc_notes'] = $this->input->post('doc_notes')[$i];

                if ($data['taslem'] == 'yes') {
                    $data['emp_taslem_id'] = $_SESSION['user_id'];
                    $data['emp_taslem_code'] = $_SESSION['emp_code'];
                    $data['emp_taslem_name'] = $this->getUserName($_SESSION['user_id']);
                    $data['taslem_date'] = date('Y-m-d');
                    $data['taslem_time'] = date('h : i a');
                }

                $this->db->insert('osr_talb_mostandat_details', $data);
                $data=array();
            }
        }


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

    public function get_RequiredFiles($id)
    {
        $this->db->select('*');
        $this->db->where("talb_mostand_id", $id);
        $query = $this->db->get('osr_talb_mostandat');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $data->required_files = $this->get_required_files($data->talb_mostand_id);
            return $data;
        }
        return false;
    }

    public function get_required_files($id)
    {
        $query = $this->db->select('family_setting.id_setting,family_setting.title_setting,osr_talb_mostandat_details.*')
            ->from('osr_talb_mostandat_details')
            ->join('family_setting', 'family_setting.id_setting=osr_talb_mostandat_details.mostand_id')
            ->where('talb_mostand_id_fk', $id)
            ->get()->result_array();
        return $query;
    }

    public function update_files()
    {
        $mostands = $this->input->post('mostand_id');
        if (!empty($mostands) && (is_array($mostands))) {
            for ($i = 0; $i < sizeof($mostands); $i++) {
                $data_where['talb_mostand_id_fk'] = $this->input->post('talb_mostand_id_fk')[$i];
                $data_where['mostand_id'] = $this->input->post('mostand_id')[$i];
                $data['taslem'] = $this->input->post('taslem')[$i];
                $data['doc_notes'] = $this->input->post('doc_notes')[$i];
                if ($data['taslem'] == 'yes') {
                    $data['emp_taslem_id'] = $_SESSION['user_id'];
                    $data['emp_taslem_code'] = $_SESSION['emp_code'];
                    $data['emp_taslem_name'] = $this->getUserName($_SESSION['user_id']);
                    $data['taslem_date'] = date('Y-m-d');
                    $data['taslem_time'] = date('h : i a');
                }
                $this->db->where($data_where)->update('osr_talb_mostandat_details', $data);
                $data=array();
            }
        }
    }

    public function delete_talb_mostand($id)
    {
        $this->db->where(array('talb_mostand_id' => $id));
        $this->db->delete("osr_talb_mostandat");
        $this->db->where(array('talb_mostand_id_fk' => $id));
        $this->db->delete("osr_talb_mostandat_details");
    }


    public function get_print_data($id)
    {

        $query = $this->db->select('osr_talb_mostandat.*,
        mother.mother_national_num_fk, mother.id ,mother.full_name as mather_full_name,
        father.f_national_id,father.full_name as father_full_name,
       basic.father_name,basic.father_national_num,basic.date,basic.person_national_card,
       basic.publisher,basic.center_id_fk,basic.district_id_fk,basic.final_suspend,
      basic.full_name_order,basic.contact_mob,basic.society_mob,
       (CASE WHEN basic.final_suspend = 4 THEN basic.file_num else basic.id end) as file_rkm,
       (CASE WHEN basic.final_suspend = 4 THEN father.full_name else basic.father_name end) as father_name_2,
      ( CASE WHEN basic.final_suspend = 4 THEN father.f_national_id else basic.father_national_num end) as f_national_num
      ')
            ->from('osr_talb_mostandat')
            ->join('mother', 'mother.mother_national_num_fk=osr_talb_mostandat.mother_national_num_fk')
            ->join('father', 'father.mother_national_num_fk=osr_talb_mostandat.mother_national_num_fk')
            ->join('basic', 'basic.mother_national_num=osr_talb_mostandat.mother_national_num_fk')
            ->where('osr_talb_mostandat.talb_mostand_id', $id)
            ->get()->row_array();
        $query['madina'] = $this->get_by('area_settings', array('id' => $query['center_id_fk']), 'title');
        $query['hai'] = $this->get_by('area_settings', array('id' => $query['district_id_fk']), 'title');
        return $query;
    }

} ?>