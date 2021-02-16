<?php


class Family_data extends CI_Model
{

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

    public function get_count($table, $where_arr = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    function get_chart_data($national_mother)
    {

        $data['mothers'] = $this->get_count('mother', array('mother_national_num_fk' => $national_mother));
        $data['aytam'] = $this->get_count('f_members', array('mother_national_num_fk' => $national_mother, 'categoriey_member' => 2));
        $data['mosdafed'] = $this->get_count('f_members', array('mother_national_num_fk' => $national_mother, 'categoriey_member' => 3));
        return $data;
    }

    function basic_data($national_num)
    {
        $q = $this->db->select('basic.file_num,basic.id as order_num,basic.family_cat_name as osara_fe2a,basic.final_suspend,
        mother.full_name as mother_name ,mother.categoriey_m,mother.mother_national_num_fk,mother.m_mob,mother.m_marital_status_id_fk,
        father.full_name as father_name,father.f_national_id')
            ->from('mother')->where('mother.mother_national_num_fk', $national_num)
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')->where('basic.final_suspend', 4)
            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk')->get()->row();
        return $q;

    }

    function family_all_data($mother_national_num)
    {
        $data = array();

        $data['father'] = $this->get_by('father', array('mother_national_num_fk' => $mother_national_num));
        $data['mother'] = $this->get_by('mother', array('mother_national_num_fk' => $mother_national_num));
        $data['member'] = $this->member_data($mother_national_num);
        $data['houses'] = $this->house_data($mother_national_num);
        $data['family_attach_files'] = $this->get_by('family_attach_files', array('mother_national_num_fk' => $mother_national_num));
        $data['researcher_visits'] = $this->get_by('researcher_visits', array('mother_national_num_fk' => $mother_national_num));
        $data['files'] = $this->get_all_files($mother_national_num);
        $data['income_sources'] = $this->get_by('family_setting', array('type' => 42));
        $data['monthly_duties'] = $this->get_by('family_setting', array('type' => 43));
        $data['family_income_duties'] = $this->get_family_income_duties($mother_national_num);
        $data['responsible_account'] = $this->get_responsible_account($mother_national_num);


        return $data;
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
//                $data[$a]->color = $this->get_by('persons_status_setting', array('id' => $row->persons_status), 'color');
                $data[$a]->reason = $this->get_by('family_reasons_settings', array('id' => $row->persons_process_reason), 'title');

                $a++;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function house_data($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('houses');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get()->row();

        if (!empty($query)) {

            $query->no3_esthkak_tilte = $this->get_by('family_setting', array('id_setting' => $query->no3_esthkak), 'title_setting');
            $query->h_house_type_tilte = $this->get_by('family_setting', array('id_setting' => $query->h_house_type_id_fk), 'title_setting');
            $query->h_house_direction_tilte = $this->get_by('family_setting', array('id_setting' => $query->h_house_direction), 'title_setting');
            $query->h_house_status_tilte = $this->get_by('family_setting', array('id_setting' => $query->h_house_status_id_fk), 'title_setting');
            $query->h_house_owner_tilte = $this->get_by('family_setting', array('id_setting' => $query->h_house_owner_id_fk), 'title_setting');

            $query->h_area_name = $this->get_by('area_settings', array('id' => $query->h_area_id_fk), 'title');
            $query->h_city_name = $this->get_by('area_settings', array('id' => $query->h_city_id_fk), 'title');
            $query->h_center_name = $this->get_by('area_settings', array('id' => $query->h_center_id_fk), 'title');
            $query->h_village_name = $this->get_by('area_settings', array('id' => $query->h_village_id_fk), 'title');


            return $query;
        } else {
            return 0;
        }
    }

    public function get_family_income_duties($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('family_income_duties');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$row->finance_income_type_id] = $row;
                $a++;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function get_responsible_account($mother_national_num)
    {
        $this->db->where('family_national_num_fk', $mother_national_num);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('family_bank_responsible')->result();
        $x = 0;
        $data = array();
        foreach ($query as $row) {
            $data[$x] = $row;
            $data[$x]->bank_name = $this->get_by('banks_settings', array('id' => $row->bank_id_fk), 'ar_name');
            $data[$x]->person = $this->get_person($row->type, $row->person_id_fk, $row->person_name);
            $data[$x]->responsible_operations = $this->get_responsible_operations($this->uri->segment(4));
            $x++;
        }
        return $data;
    }


    public function get_all_files($mother_national_num)
    {
        $this->db->where('type', 47);
        $query = $this->db->get('family_setting');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->file = $this->get_files($row->id_setting, $mother_national_num);
                $x++;

            }
            return $data;


        } else {
            return false;
        }
    }

    public function get_files($id, $mother_national_num)
    {
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $this->db->where('file_attach_id_fk', $id);
        $query = $this->db->get('family_attach_files');
        if ($query->num_rows() > 0) {
            return $query->row()->file_attach_name;

        } else {
            return 0;
        }
    }

    public function get_person($type, $person_id_fk, $person_name)
    {
        if ($type == 0) {
            return $person_name;
        } elseif ($type == 1) {
            $this->db->where('id', $person_id_fk);
            $query = $this->db->get('mother');
            if ($query->num_rows() > 0) {
                return $query->row()->full_name;
            } else {
                return "لم يضاف الاسم";
            }
        } elseif ($type == 2) {
            $this->db->where('id', $person_id_fk);
            $query = $this->db->get('f_members');
            if ($query->num_rows() > 0) {
                return $query->row()->member_full_name;
            } else {
                return "لم يضاف الاسم";
            }
        }
    }

    public function get_responsible_operations($num)
    {
        $this->db->select('family_bank_responsible_operations.*,
                           family_bank_responsible_operations.id as bank_responsible_operations_id,
                           family_bank_responsible_operations.id as operation_id,
                           banks_settings.*, banks_settings.id as bank_id , 
                           banks_settings.ar_name as  bank_name ,
                           banks_settings.bank_code as  bank_code ,
                           family_setting.title_setting as relashtion_title
                           ');
        $this->db->from("family_bank_responsible_operations");
        $this->db->where('family_national_num_fk', $num);
        $this->db->join('banks_settings', 'banks_settings.id =family_bank_responsible_operations.past_bank_id', 'left');
        $this->db->join('family_setting', 'family_setting.id_setting=family_bank_responsible_operations.current_bank_relationship', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                //   if ($row->past_bank_id_fk != 0) {
                $data[$a]->person = $this->get_person($row->past_type, $row->past_bank_id_fk, $row->past_bank_name);
                // }
                $a++;
            }
            return $data;
        } else {
            return 0;
        }
    }


}