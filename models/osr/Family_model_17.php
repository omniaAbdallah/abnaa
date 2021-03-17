<?php

class Family_model extends CI_Model
{
    public function get_field($table)
    {
        $query = $this->db->query("select * from " . $table);
        $field_array = $query->list_fields();
        return $field_array;
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

    public function change_status_account($valu, $id)
    {
        $status = 1 - $valu;
        $data['account_status'] = $status;
        $this->db->where('id', $id)->update('basic', $data);
        return $status;
    }

    public function check_login()
    {
        $email = $this->input->post('user_name');
        $pass = sha1(md5($this->input->post('user_pass')));
        $q = $this->db->select('id,file_num ,mother_national_num,final_suspend ,hidden_action ')->where('user_name', $email)->where('user_password', $pass)->where('account_status', 1)->get('basic')->row_array();
        if (!empty($q)) {
            return $q;
        } else {
            return 0;
        }
    }

    public function delete_upload($id)
    {
        $img = $this->get_by('main_data_aktam', array('id' => $id), 1);
        if (file_exists("uploads/" . $img->ktm_path . "/" . $img->ktm)) {
            unlink(FCPATH . "uploads/" . $img->ktm_path . "/" . $img->ktm);
        }
        if (file_exists("uploads/" . $img->ktm_path . '/thumbs/' . $img->ktm)) {
            unlink(FCPATH . "uploads/" . $img->ktm_path . '/thumbs/' . $img->ktm);
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
            return false;
        }
    }

    public function insert_father($national_mother)
    {
        /**********************************ahmed_start********************************/
        $data['f_employment_check'] = $this->chek_Null($this->input->post('f_employment_check'));
        $data['f_employees_sons_check'] = $this->chek_Null($this->input->post('f_employees_sons_check'));
        $data['f_special_needs_sons_check'] = $this->chek_Null($this->input->post('f_special_needs_sons_check'));
        $data['f_other_associations_check'] = $this->chek_Null($this->input->post('f_other_associations_check'));
        /**********************************ahmed_start********************************/
        /*****************************father_employment*****************************/
        $this->db->where('mother_national_num_fk', $national_mother);
        $this->db->delete('father_employment');
        if (!empty($this->input->post('employee_job'))) {
            $job = $this->input->post('employee_job');
            $salary = $this->input->post('employee_salary');
            for ($z = 0; $z < sizeof($job); $z++) {
                $father_employment['mother_national_num_fk'] = $national_mother;
                $father_employment['job_id_fk'] = $this->chek_Null($job[$z]);
                $father_employment['salary'] = $this->chek_Null($salary[$z]);
                $this->db->insert('father_employment', $father_employment);
            }
        }
        /******************************father_employment****************************/
        /******************************employees_sons****************************/
        $this->db->where('mother_national_num_fk', $national_mother);
        $this->db->delete('father_employees_sons');
        if (!empty($this->input->post('employees_son_name'))) {
            $son_name = $this->input->post('employees_son_name');
            $son_gender = $this->input->post('employees_son_gender');
            $son_id_number = $this->input->post('employees_son_id_number');
            $son_job = $this->input->post('employees_son_job');
            $son_geha = $this->input->post('employees_son_geha');
            $son_salary = $this->input->post('employees_son_salary');
            for ($z = 0; $z < sizeof($son_name); $z++) {
                $father_employees_sons['mother_national_num_fk'] = $national_mother;
                $father_employees_sons['employees_son_name'] = $this->chek_Null($son_name[$z]);
                $father_employees_sons['employees_son_gender'] = $this->chek_Null($son_gender[$z]);
                $father_employees_sons['employees_son_id_number'] = $this->chek_Null($son_id_number[$z]);
                $father_employees_sons['employees_son_job'] = $this->chek_Null($son_job[$z]);
                $father_employees_sons['employees_son_geha'] = $this->chek_Null($son_geha[$z]);
                $father_employees_sons['employees_son_geha'] = $this->chek_Null($son_geha[$z]);
                $father_employees_sons['employees_son_salary'] = $this->chek_Null($son_salary[$z]);
                $this->db->insert('father_employees_sons', $father_employees_sons);
            }
        }
        /******************************employees_sons****************************/
        /******************************special_needs_sons****************************/
        $this->db->where('mother_national_num_fk', $national_mother);
        $this->db->delete('father_special_needs_sons');
        if (!empty($this->input->post('disability_id_fk'))) {
            $name = $this->input->post('name');
            $gender = $this->input->post('gender');
            $id_number = $this->input->post('id_number');
            $disability_id_fk = $this->input->post('disability_id_fk');
            $comprehensive_rehabilitation = $this->input->post('comprehensive_rehabilitation');
            $comprehensive_rehabilitation_value = $this->input->post('comprehensive_rehabilitation_value');
            for ($z = 0; $z < sizeof($disability_id_fk); $z++) {
                $father_special_needs_sons['mother_national_num_fk'] = $national_mother;
                $father_special_needs_sons['name'] = $this->chek_Null($name[$z]);
                $father_special_needs_sons['gender'] = $this->chek_Null($gender[$z]);
                $father_special_needs_sons['id_number'] = $this->chek_Null($id_number[$z]);
                $father_special_needs_sons['disability_id_fk'] = $this->chek_Null($disability_id_fk[$z]);
                $father_special_needs_sons['comprehensive_rehabilitation'] = $this->chek_Null($comprehensive_rehabilitation[$z]);
                $father_special_needs_sons['comprehensive_rehabilitation_value'] = $this->chek_Null($comprehensive_rehabilitation_value[$z]);
                $this->db->insert('father_special_needs_sons', $father_special_needs_sons);
            }
        }
        /******************************special_needs_sons****************************/
        /******************************other_associations****************************/
        $this->db->where('mother_national_num_fk', $national_mother);
        $this->db->delete('father_other_associations');
        if (!empty($this->input->post('association_id_fk'))) {
            $association_id_fk = $this->input->post('association_id_fk');
            $in_kind_assistance = $this->input->post('in_kind_assistance');
            $material_assistance = $this->input->post('material_assistance');
            for ($z = 0; $z < sizeof($association_id_fk); $z++) {
                $father_other_associations['mother_national_num_fk'] = $national_mother;
                $father_other_associations['association_id_fk'] = $this->chek_Null($association_id_fk[$z]);
                $father_other_associations['in_kind_assistance'] = $this->chek_Null($in_kind_assistance[$z]);
                $father_other_associations['material_assistance'] = $this->chek_Null($material_assistance[$z]);
                $this->db->insert('father_other_associations', $father_other_associations);
            }
        }
        /******************************other_associations****************************/
        $data['mother_national_num_fk'] = $national_mother;
        $data['full_name'] = $this->chek_Null($this->input->post('full_name'));
        $data['f_nationality_id_fk'] = $this->chek_Null($this->input->post('f_nationality_id_fk'));
        $data['nationality_other'] = $this->chek_Null($this->input->post('nationality_other'));
        $data['f_national_id_type'] = $this->chek_Null($this->input->post('f_national_id_type'));
        $data['f_national_id'] = $this->chek_Null($this->input->post('f_national_id'));
        // $data['f_birth_date']=strtotime($this->input->post('f_birth_date'));
        $data['f_death_date'] = $this->chek_Null($this->input->post('f_death_date'));
        $data['f_job'] = $this->chek_Null($this->input->post('f_job'));
        $data['f_job_place'] = $this->chek_Null($this->input->post('f_job_place'));
        $data['f_death_id_fk'] = $this->chek_Null($this->input->post('f_death_id_fk'));
        $data['f_death_reason'] = $this->chek_Null($this->input->post('f_death_reason'));
        $data['f_child_num'] = $this->chek_Null($this->input->post('male_number'));
        $data['f_female_num'] = $this->chek_Null($this->input->post('female_number'));
        $data['f_wive_count'] = $this->chek_Null($this->input->post('f_wive_count'));
        $data['f_death_reason_fk'] = $this->chek_Null($this->input->post('f_death_reason_fk'));
        /**********ahmed*/
        $gregorian_date_arr = array($this->input->post('CDay'), $this->input->post('CMonth'), $this->input->post('CYear'));
        $gregorian_date = implode('/', $gregorian_date_arr);
        $data['f_birth_date'] = $gregorian_date;
        $hijri_date_arr = array($this->input->post('HDay'), $this->input->post('HMonth'), $this->input->post('HYear'));
        $hijri_date = implode('/', $hijri_date_arr);
        $data['f_birth_date_hijri'] = $hijri_date;
        $data['f_birth_date_year'] = $this->chek_Null($this->input->post('CYear'));
        $data['f_birth_date_hijri_year'] = $this->chek_Null($this->input->post('HYear'));
        $data['family_members_number'] = $this->chek_Null($this->input->post('family_members_number'));
        $data['f_card_source'] = $this->chek_Null($this->input->post('f_card_source'));
        /**********ahmed*/
        $count = $this->get_by('father', array('mother_national_num_fk' => $national_mother));
        if (!empty($count)) {
            $count = count($count);
        } else {
            $count = 0;
        }
        if ($count > 0) {
            $this->db->where('mother_national_num_fk', $national_mother);
            $this->db->update('father', $data);
        } else {
            $this->db->insert('father', $data);
        }
        $data_basic['contact_mob'] = $this->input->post('contact_mob');
        $data_basic['contact_mob_relationship'] = $this->input->post('contact_mob_relationship');
        $this->db->where('mother_national_num', $national_mother);
        $this->db->update('basic', $data_basic);
    }

    public function get_basic_mother_num($mother_num)
    {
        //  $h = $this->db->get_where("basic",array("mother_national_num"=>$mother_num));
        $where = array("basic.mother_national_num" => $mother_num);
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->join('family_setting', 'family_setting.id_setting=basic.contact_mob_relationship', "left");
        $this->db->where($where);
        $h = $this->db->get();
        $data = $h->row_array();
//        $data["files_status_color"] = $this->get_files_status_setting($data["file_status"]);
        return $data;
    }

    public function get_family_details($national_num)
    {
        $q = $this->db->select('basic.file_num,basic.id as order_num,basic.family_cat_name as osara_fe2a,
        mother.full_name as mother_name ,mother.categoriey_m,mother.mother_national_num_fk,mother.m_mob,mother.m_marital_status_id_fk,
        father.full_name as father_name,father.f_national_id,
        f_members.member_full_name,f_members.member_card_num')
            ->from('mother')->where('mother.mother_national_num_fk', $national_num)
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')->where('basic.final_suspend', 4)
            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk')
            ->join('f_members', 'f_members.mother_national_num_fk = mother.mother_national_num_fk')->get()->result();
        if (!empty($q)) {
            $q['nasebElfard'] = $this->getNaseb($q[0]->mother_national_num_fk, $q[0]->categoriey_m);
            return $q;
        }
    }

    public function getNaseb($mother_national_num_fk, $categoriey_m)
    {
        $this->db->select('*');
        $this->db->from('family_income_duties');
        $this->db->where('mother_national_num_fk', $mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total_income = 0;
            $total_duties = 0;
            $count = 0;
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
                if ($row->affect == 1 && $row->type == 1) {
                    $total_income += $row->value;
                }
                if ($row->affect == 1 && $row->type == 2) {
                    $total_duties += $row->value;
                }
            }
            if ($categoriey_m == 1 || $categoriey_m == 2) {
                $count = $this->sum_mosfed_in_mother($mother_national_num_fk);
            }
            $member_num = $this->sum_mosfed_in_f_members($mother_national_num_fk) + $count;
            if ($member_num == 0) {
                $member_num = 1;
            }
            $total = $total_income - $total_duties;
            $data['naseb'] = $total / $member_num;
            $data['f2a'] = $this->GetF2a_data($data['naseb']);
            return $data;
        }
        return 0;
    }

    public function sum_mosfed_in_mother($mother_national_num_fk)
    {
        $this->db->select('*');
        $this->db->from('mother');
        $this->db->where('mother_national_num_fk', $mother_national_num_fk);
        $this->db->where('person_type', 62);
        $this->db->where('halt_elmostafid_m', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function sum_mosfed_in_f_members($mother_national_num_fk)
    {
        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('mother_national_num_fk', $mother_national_num_fk);
        $this->db->where('member_person_type', 62);
        $this->db->where('halt_elmostafid_member', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function GetF2a_data($value)
    {
        $this->db->select("id,title,from,to,color");
        $this->db->where('from <=', $value);
        $this->db->where('to >=', $value);
        $query = $this->db->get("family_category");
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }

    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data[0]->id;
        }
        return false;
    }

    public function insert_mother($national_mother)
    {
        $data['m_death_date'] = $this->chek_Null($this->input->post('m_death_date'));
        $data['m_death_reason'] = $this->chek_Null($this->input->post('m_death_reason'));
        $data['last_haj_year'] = $this->chek_Null($this->input->post('last_haj_year'));
//gender
        $this->db->where("mother_national_num_fk", $national_mother);
        $this->db->delete("mother_courses_and_skills");
        if (!empty($_POST['courses'])) {
            foreach ($_POST['courses'] as $key => $value) {
                $courses['type'] = 1;
                $courses['mother_national_num_fk'] = $national_mother;
                $courses['course_skill_id_fk'] = $value;
                $this->db->insert('mother_courses_and_skills', $courses);
            }
        }
        if (!empty($_POST['skills'])) {
            foreach ($_POST['skills'] as $key => $value) {
                $courses['type'] = 2;
                $courses['mother_national_num_fk'] = $national_mother;
                $courses['course_skill_id_fk'] = $value;
                $this->db->insert('mother_courses_and_skills', $courses);
            }
        }
        /*****************************ahmed_start********************/
        $data['m_comprehensive_rehabilitation'] = $this->chek_Null($this->input->post('m_comprehensive_rehabilitation'));
        $data['m_rehabilitation_value'] = $this->chek_Null($this->input->post('m_rehabilitation_value'));
        $data['m_relative_mob'] = $this->chek_Null($this->input->post('m_relative_mob'));
        $data['m_relative_relation'] = $this->chek_Null($this->input->post('m_relative_relation'));
        $data['m_work_in_commercial_project'] = $this->chek_Null($this->input->post('m_work_in_commercial_project'));
        $data['m_project_name'] = $this->chek_Null($this->input->post('m_project_name'));
        $data['m_project_status'] = $this->chek_Null($this->input->post('m_project_status'));
        $data['m_haj_geha'] = $this->chek_Null($this->input->post('m_haj_geha'));
        // $data['m_last_hij_date']=$this->chek_Null($this->input->post('m_last_hij_date'));
        $data['m_omra_geha'] = $this->chek_Null($this->input->post('m_omra_geha'));
        $data['m_last_omra_date'] = $this->chek_Null($this->input->post('m_last_omra_date'));
        $data['m_other_skill'] = $this->chek_Null($this->input->post('m_other_skill'));
        /*****************************ahmed_start********************/
        $data['mother_national_num_fk'] = $national_mother;
        $data['full_name'] = $this->chek_Null($this->input->post('fullname'));
        $gregorian_date_arr = array($this->input->post('CDay'), $this->input->post('CMonth'), $this->input->post('CYear'));
        $gregorian_date = implode('/', $gregorian_date_arr);
        $hijri_date_arr = array($this->input->post('HDay'), $this->input->post('HMonth'), $this->input->post('HYear'));
        $hijri_date = implode('/', $hijri_date_arr);
        $data['m_birth_date'] = $this->chek_Null($gregorian_date);
        $data['m_birth_date_hijri'] = $this->chek_Null($hijri_date);
        $data['m_birth_date_year'] = $this->chek_Null($this->input->post('CYear'));
        $data['m_birth_date_hijri_year'] = $this->chek_Null($this->input->post('HYear'));
        $data['categoriey_m'] = $this->chek_Null($this->input->post('categoriey_m'));
        $data['guaranteed_m'] = $this->chek_Null($this->input->post('guaranteed_m'));
        $data['m_gender'] = $this->chek_Null($this->input->post('gender'));
        $data['m_nationality'] = $this->chek_Null($this->input->post('m_nationality'));
        $data['nationality_other'] = $this->chek_Null($this->input->post('nationality_other'));
        $data['representative_name'] = $this->chek_Null($this->input->post('representative_name'));
        $data['representative_age'] = $this->chek_Null($this->input->post('representative_age'));
        $data['representative_relative'] = $this->chek_Null($this->input->post('representative_relative'));
        $data['representative_phone'] = $this->chek_Null($this->input->post('representative_phone'));
        $data['m_marital_status_id_fk'] = $this->chek_Null($this->input->post('m_marital_status_id_fk'));
        $data['m_living_place_id_fk'] = $this->chek_Null($this->input->post('m_living_place_id_fk'));
        $data['m_living_place'] = $this->chek_Null($this->input->post('m_living_place'));
        $data['m_national_id'] = $this->chek_Null($this->input->post('m_national_id'));
        $data['m_national_id_type'] = $this->chek_Null($this->input->post('m_national_id_type'));
        $data['m_education_status_id_fk'] = $this->chek_Null($this->input->post('m_education_status_id_fk'));
        $data['m_specialization'] = $this->chek_Null($this->input->post('m_specialization'));
        $data['m_health_status_id_fk'] = $this->chek_Null($this->input->post('m_health_status_id_fk'));
        $data['m_skill_name'] = $this->chek_Null($this->input->post('m_skill_name'));
        $data['m_job_id_fk'] = $this->chek_Null($this->input->post('m_job_id_fk'));
        $data['m_job_other'] = $this->chek_Null($this->input->post('m_job_other'));
        $data['m_monthly_income'] = $this->chek_Null($this->input->post('m_monthly_income'));
        $data['m_education_level_id_fk'] = $this->chek_Null($this->input->post('m_education_level_id_fk'));
        $data['m_education_level_id_fk'] = $this->chek_Null($this->input->post('m_education_level_id_fk'));
        $data['m_female_house_check'] = $this->chek_Null($this->input->post('m_female_house_check'));
        $data['m_female_house_id_fk'] = $this->chek_Null($this->input->post('m_female_house_id_fk'));
        $data['m_hijri'] = $this->chek_Null($this->input->post('m_hijri'));
        $data['m_ommra'] = $this->chek_Null($this->input->post('m_ommra'));
        $data['m_mob'] = $this->chek_Null($this->input->post('m_mob'));
        $data['m_another_mob'] = $this->chek_Null($this->input->post('m_another_mob'));
        $data['m_email'] = $this->chek_Null($this->input->post('m_email'));
        $data['m_want_work'] = $this->chek_Null($this->input->post('m_want_work'));
        /**************ahmed*/
        $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
        $data['m_relationship'] = $this->chek_Null($this->input->post('m_relationship'));
        $data['m_card_source'] = $this->chek_Null($this->input->post('m_card_source'));
        $data['disease_id_fk'] = $this->chek_Null($this->input->post('disease_id_fk'));
        $data['disability_id_fk'] = $this->chek_Null($this->input->post('disability_id_fk'));
        $data['dis_date_ar'] = $this->chek_Null($this->input->post('dis_date_ar'));
        $data['dis_reason'] = $this->chek_Null($this->input->post('dis_reason'));
        $data['dis_response_status'] = $this->chek_Null($this->input->post('dis_response_status'));
        $data['dis_status'] = $this->chek_Null($this->input->post('dis_status'));
        $data['m_place_work'] = $this->chek_Null($this->input->post('m_place_work'));
        $data['m_place_mob'] = $this->chek_Null($this->input->post('m_place_mob'));
        $data['m_account'] = $this->chek_Null($this->input->post('m_account'));
        $data['m_account_id'] = $this->chek_Null($this->input->post('m_account_id'));
        $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account'));
        $data['date_death_disease'] = $this->chek_Null($this->input->post('date_death_disease'));
        $data['halt_elmostafid_m'] = $this->chek_Null($this->input->post('halt_elmostafid_m'));
        /**************ahmed*/
        $data['personal_character_id_fk'] = $this->chek_Null($this->input->post('personal_character_id_fk'));
        $data['relation_with_family'] = $this->chek_Null($this->input->post('relation_with_family'));
        $data['ability_work'] = $this->chek_Null($this->input->post('ability_work'));
        $data['work_type_id_fk'] = $this->chek_Null($this->input->post('work_type_id_fk'));
        $data['mother_national_card_new'] = $this->chek_Null($this->input->post('mother_national_card_new'));
        $count = $this->get_by('mother', array('mother_national_num_fk' => $national_mother));
        if (!empty($count)) {
            $count = count($count);
        } else {
            $count = 0;
        }
        if ($count > 0) {
//        if ($this->get_mother_national($national_mother) > 0) {
            $this->db->where('mother_national_num_fk', $national_mother);
            $this->db->update('mother', $data);
        } else {
            $this->db->insert('mother', $data);
        }
//        print_r($this->db->last_query());
    }

    public function get_all_family_bank_responsible($id)
    {
        $this->db->where('family_national_num_fk', $id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('family_bank_responsible')->result();
        $x = 0;
        $data = array();
        foreach ($query as $row) {
            $data[$x] = $row;
            $data[$x]->bank_name = $this->get_by('banks_settings', array('id' => $row->bank_id_fk), 'ar_name');
            $data[$x]->person = $this->get_person($row->type, $row->person_id_fk, $row->person_name);
//            $data[$x]->responsible_operations = $this->get_responsible_operations($id);
            $x++;
        }
        return $data;
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

    public function delete($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return 1;
    }

    public function select_data_table($mother_national_num)
    {
        $this->db->select('family_attach_files.mother_national_num_fk ,
                         family_attach_files.file_attach_id_fk  ,
                           family_setting.title_setting');
        $this->db->from('family_attach_files');
        $this->db->join('family_setting', 'family_setting.id_setting = family_attach_files.file_attach_id_fk', "left");
        $this->db->where("mother_national_num_fk", $mother_national_num);
        $this->db->group_by("file_attach_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i]->sub = $this->get_by_file_attach_id_fk($row->file_attach_id_fk, $mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    //=======================================================================
    public function get_by_file_attach_id_fk($file_attach_id_fk, $mother_national_num_fk)
    {
        $this->db->select('mother_national_num_fk , file_attach_name  , id');
        $this->db->from('family_attach_files');
        $this->db->where("file_attach_id_fk", $file_attach_id_fk);
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function insert_all_files($mother_national_num, $all_img)
    {
        $file_attach_id_fk = $this->input->post('file_attach_id_fk');
        foreach ($all_img as $key => $value) {
            $data['mother_national_num_fk'] = $mother_national_num;
            $data['file_attach_id_fk'] = $file_attach_id_fk[$key];
            $data['file_attach_name'] = $value;
            $data['ttype'] = 2;
            $this->db->insert('family_attach_files', $data);
        }
    }

    public function insert_all_files_other($mother_national_num, $all_img)
    {
        $file_attach_id_fk = $this->input->post('file_name_other');
        foreach ($all_img as $key => $value) {
            $data['mother_national_num_fk'] = $mother_national_num;
            $data['file_attach_id_fk'] = $file_attach_id_fk[$key];
            $data['file_attach_name'] = $value;
            $data['ttype'] = 2;
            $this->db->insert('family_attach_files_other', $data);
        }
    }

    // wakel
    public function insert_wakel($national_mother, $file)
    {
        $data['mother_national_num_fk'] = $national_mother;
        $data['relationship_id_fk'] = $this->chek_Null($this->input->post('relationship_id_fk'));
        $data['w_name'] = $this->chek_Null($this->input->post('w_name'));
        $data['w_mob'] = $this->chek_Null($this->input->post('w_mob'));
        $data['w_national_id_type'] = $this->chek_Null($this->input->post('w_national_id_type'));
        $data['w_card_source'] = $this->chek_Null($this->input->post('w_card_source'));
        $data['w_national_id'] = $this->chek_Null($this->input->post('w_national_id'));
        $data['w_birth_date'] = $this->chek_Null($this->input->post('w_birth_date'));
        $data['w_birth_date_hijri'] = $this->chek_Null($this->input->post('w_birth_date_hijri'));
        $data['w_birth_date_hijri_year'] = $this->chek_Null($this->input->post('w_birth_date_hijri_year'));
        $data['w_birth_date_year'] = $this->chek_Null($this->input->post('w_birth_date_year'));
        $data['w_job_id_fk'] = $this->chek_Null($this->input->post('w_job_id_fk'));
        $data['w_want_work'] = $this->input->post('w_want_work');
        $data['w_marital_status_id_fk'] = $this->chek_Null($this->input->post('w_marital_status_id_fk'));
        $data['employer'] = $this->chek_Null($this->input->post('employer'));
        $data['job_place'] = $this->chek_Null($this->input->post('job_place'));
        $data['job_mob'] = $this->chek_Null($this->input->post('job_mob'));
        $data['salary'] = $this->chek_Null($this->input->post('salary'));
        $data['guaranted'] = $this->chek_Null($this->input->post('guaranted'));
        $data['persons_num'] = $this->chek_Null($this->input->post('persons_num'));
        $gregorian_date_arr = array($this->input->post('CDay'), $this->input->post('CMonth'), $this->input->post('CYear'));
        $gregorian_date = implode('/', $gregorian_date_arr);
        $hijri_date_arr = array($this->input->post('HDay'), $this->input->post('HMonth'), $this->input->post('HYear'));
        $hijri_date = implode('/', $hijri_date_arr);
        $data['w_birth_date'] = $this->chek_Null($gregorian_date);
        $data['w_birth_date_hijri'] = $this->chek_Null($hijri_date);
        $data['w_birth_date_year'] = $this->chek_Null($this->input->post('CYear'));
        $data['w_birth_date_hijri_year'] = $this->chek_Null($this->input->post('HYear'));
        if (!empty($file)) {
            $data['w_national_img'] = $file;
        }
        $found_row = $this->get_by('wakels', array('mother_national_num_fk' => $national_mother));
        if (!empty($found_row)) {
            $count = count($found_row);
        } else {
            $count = 0;
        }
        if ($count > 0) {
            $this->db->where('mother_national_num_fk', $national_mother);
            $this->db->update('wakels', $data);
        } else {
            $this->db->insert('wakels', $data);
        }
    }

    //familt member
    public function select_mother_search_key($table, $search_key, $search_key_value)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key, $search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->relation_name = $this->get_by('family_setting', array('id_setting' => $row->m_relationship), 'title_setting');
                $data[$a]->father_national_card = $this->get_by('father', array('mother_national_num_fk' => $row->mother_national_num_fk), 'f_national_id');
                $data[$a]->person_type_name = $this->get_by('family_setting', array('id_setting' => $row->person_type), 'title_setting');
                $data[$a]->reason = $this->get_by('family_reasons_settings', array('id' => $row->persons_process_reason), 'title');
                $a++;
            }
            return $data;
        }
        return false;
    }

//f_members_courses_and_skills
    public function GetCourses_skills($arr, $table = "mother_courses_and_skills")
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->course_skill_id_fk;
            }
            return $data;
        }
        return false;
    }

    public function GetCourses_skills_data($arr, $table = "mother_courses_and_skills")
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->course_skill_id_fk] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_all($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get();
        $a = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                if ($row->stage_id_fk != 0 && $row->stage_id_fk != '') {
                    $data[$a]->stage_name = $this->get_by('classrooms', array('id' => $row->stage_id_fk), 'name');
                }
                if ($row->class_id_fk != 0 && $row->class_id_fk != '') {
                    $data[$a]->class_name = $this->get_by('classrooms', array('id' => $row->class_id_fk), 'name');
                }
                $data[$a]->member_person_type_name = $this->get_by('family_setting', array('id_setting' => $row->member_person_type), 'title_setting');
                $data[$a]->relation_name = $this->get_by('family_setting', array('id_setting' => $row->member_relationship), 'title_setting');
                $data[$a]->halet_member_name = $this->get_by('files_status_setting', array('id' => $row->persons_status), 'title');
                $data[$a]->color = $this->get_by('persons_status_setting', array('id' => $row->persons_status), 'color');
                $data[$a]->reason = $this->get_by('family_reasons_settings', array('id' => $row->persons_process_reason), 'title');
                $a++;
            }
            return $data;
        } else {
            return 0;
        }
    }

    //member_relationship
    public function insert_family_member($file, $mother_national_num_fk)
    {
        $data['mother_national_num_fk'] = $mother_national_num_fk;
        $data['member_full_name'] = $this->chek_Null($this->input->post('member_full_name'));
        $data['member_card_type'] = $this->chek_Null($this->input->post('member_card_type'));
        $data['member_card_num'] = $this->chek_Null($this->input->post('member_card_num'));
        $data['member_nationality'] = $this->chek_Null($this->input->post('member_nationality'));
        $data['nationality_other'] = $this->chek_Null($this->input->post('nationality_other'));
        $data['school_id_fk'] = $this->chek_Null($this->input->post('school_id_fk'));
        $data['education_type'] = $this->chek_Null($this->input->post('education_type'));
        $data['school_cost'] = $this->chek_Null($this->input->post('school_cost'));
        $data['member_photo'] = $file['member_photo'];
        $data['member_gender'] = $this->chek_Null($this->input->post('member_gender'));
        $data['member_job'] = $this->chek_Null($this->input->post('member_job'));
        $data['member_job_place'] = $this->chek_Null($this->input->post('member_job_place'));
        $data['member_skill'] = $this->chek_Null($this->input->post('member_skill'));
        $data['member_email'] = $this->chek_Null($this->input->post('member_email'));
        $data['member_status'] = $this->chek_Null($this->input->post('member_status'));
        $data['member_distracted_mother'] = $this->chek_Null($this->input->post('member_distracted_mother'));
        $data['member_activity_type'] = $this->chek_Null($this->input->post('member_activity_type'));
        $data['member_activity_type_other'] = $this->chek_Null($this->input->post('member_activity_type_other'));
        $data['member_mob'] = $this->chek_Null($this->input->post('member_mob'));
        $data['member_smoken'] = $this->chek_Null($this->input->post('member_smoken'));
        $data['member_health_type'] = $this->chek_Null($this->input->post('member_health_type'));
        //  $data['member_health_type_other']=$this->chek_Null($this->input->post('member_health_type_other'));
        $data['member_month_money'] = $this->chek_Null($this->input->post('member_month_money'));
        $data['member_child_num'] = $this->chek_Null($this->input->post('member_child_num'));
        $data['member_home_type'] = $this->chek_Null($this->input->post('member_home_type'));
        $data['member_home_other'] = $this->chek_Null($this->input->post('member_home_other'));
        $data['member_hij'] = $this->chek_Null($this->input->post('member_hij'));
        $data['stage_id_fk'] = $this->chek_Null($this->input->post('stage_id_fk'));
        $data['class_id_fk'] = $this->chek_Null($this->input->post('class_id_fk'));
        $data['member_omra'] = $this->chek_Null($this->input->post('member_omra'));
        $data['member_note'] = $this->chek_Null($this->input->post('member_note'));
        $data['member_birth_card_img'] = $file['member_birth_card_img'];
        $data['member_sechool_img'] = $file['member_sechool_img'];
        $data['member_disease_id_fk'] = $this->chek_Null($this->input->post('member_disease_id_fk'));
        $data['member_disability_id_fk'] = $this->chek_Null($this->input->post('member_disability_id_fk'));
        $data['member_dis_date_ar'] = $this->chek_Null($this->input->post('member_dis_date_ar'));
        $data['member_dis_reason'] = $this->chek_Null($this->input->post('member_dis_reason'));
        $data['member_dis_response_status'] = $this->chek_Null($this->input->post('member_dis_response_status'));
        $data['member_dis_status'] = $this->chek_Null($this->input->post('member_dis_status'));
        $data['personal_character_id_fk'] = $this->chek_Null($this->input->post('personal_character_id_fk'));
        $data['relation_with_family'] = $this->chek_Null($this->input->post('relation_with_family'));
        $data['education_problems'] = $this->chek_Null($this->input->post('education_problems'));
        $data['courses_details'] = $this->chek_Null($this->input->post('courses_details'));
        $data['member_specialization'] = $this->chek_Null($this->input->post('member_specialization'));
        $data['categoriey_member'] = $this->chek_Null($this->input->post('categoriey_member'));
        $data['guaranteed_member'] = $this->chek_Null($this->input->post('guaranteed_member'));
        $data['member_dar_markz_id_fk'] = $this->chek_Null($this->input->post('member_dar_markz_id_fk'));
        $data['member_dar_markz_check'] = $this->chek_Null($this->input->post('member_dar_markz_check'));
//     $data['halt_elmostafid_member']=$this->chek_Null( $this->input->post('halt_elmostafid_member'));
        $data['persons_status'] = $this->chek_Null($this->input->post('persons_status'));
        $data['halt_elmostafid_member'] = $this->chek_Null($this->input->post('persons_status'));
        /******************************ahmed**********************/
        $data['guaranteed'] = $this->chek_Null($this->input->post('guaranteed'));
        $gregorian_date_arr = array($this->input->post('CDay'), $this->input->post('CMonth'), $this->input->post('CYear'));
        $gregorian_date = implode('/', $gregorian_date_arr);
        $hijri_date_arr = array($this->input->post('HDay'), $this->input->post('HMonth'), $this->input->post('HYear'));
        $hijri_date = implode('/', $hijri_date_arr);
        $data['member_birth_date'] = $this->chek_Null($gregorian_date);
        $data['member_birth_date_hijri'] = $this->chek_Null($hijri_date);
        $data['member_birth_date_year'] = $this->chek_Null($this->input->post('CYear'));
        $data['member_birth_date_hijri_year'] = $this->chek_Null($this->input->post('HYear'));
        $data['member_relationship'] = $this->chek_Null($this->input->post('member_relationship'));
        $data['member_card_source'] = $this->chek_Null($this->input->post('member_card_source'));
        $data['member_study_case'] = $this->chek_Null($this->input->post('member_study_case'));
        $data['member_academic_achievement_level'] = $this->chek_Null($this->input->post('member_academic_achievement_level'));
        $data['member_person_type'] = $this->chek_Null($this->input->post('member_person_type'));
        $data['member_education_level'] = $this->chek_Null($this->input->post('member_education_level'));
        //$data['member_account']=$this->chek_Null( $this->input->post('member_account'));
        //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
        $data['member_house_check'] = $this->chek_Null($this->input->post('member_house_check'));
        $data['member_house_id_fk'] = $this->chek_Null($this->input->post('member_house_id_fk'));
        /******************************ahmed**********************/
        //  $explode=explode("-",$this->input->post('member_account_id'));
        //  $data['member_account_id'] =$explode[0];
        //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
        //$data['bank_account_num']=$this->chek_Null($this->input->post('bank_num'));
        /**********************************ahmed_start******************************/
        $data['member_hij'] = $this->chek_Null($this->input->post('member_hij'));
        $data['member_haj_geha'] = $this->chek_Null($this->input->post('member_haj_geha'));
        $data['member_last_hij_date'] = $this->chek_Null($this->input->post('member_last_hij_date'));
        $data['member_omra'] = $this->chek_Null($this->input->post('member_omra'));
        $data['member_omra_geha'] = $this->chek_Null($this->input->post('member_omra_geha'));
        $data['member_last_omra_date'] = $this->chek_Null($this->input->post('member_last_omra_date'));
        $data['member_comprehensive_rehabilitation'] = $this->chek_Null($this->input->post('member_comprehensive_rehabilitation'));
        $data['member_rehabilitation_value'] = $this->chek_Null($this->input->post('member_rehabilitation_value'));
        $data['member_other_skill'] = $this->chek_Null($this->input->post('member_other_skill'));
        /***********************************ahmed_start*****************************/
        $this->db->insert('f_members', $data);
        if (!empty($_POST['courses'])) {
            foreach ($_POST['courses'] as $key => $value) {
                $courses['type'] = 1;
                $courses['family_member_id_fk'] = $this->select_last_id();
                $courses['course_skill_id_fk'] = $value;
                $this->db->insert('f_members_courses_and_skills', $courses);
            }
        }
        if (!empty($_POST['skills'])) {
            foreach ($_POST['skills'] as $key => $value) {
                $courses['type'] = 2;
                $courses['family_member_id_fk'] = $this->select_last_id();
                $courses['course_skill_id_fk'] = $value;
                $this->db->insert('f_members_courses_and_skills', $courses);
            }
        }
        /************************************ahmed_start**********************************/
        if (!empty($this->input->post('problem_id_fk'))) {
            $problem_id_fk = $this->input->post('problem_id_fk');
            for ($z = 0; $z < sizeof($problem_id_fk); $z++) {
                $courses['family_member_id_fk'] = $this->select_last_id();
                $courses['problem_id_fk'] = $problem_id_fk[$z];
                $courses['approved'] = 0;
                $this->db->insert('f_members_education_problems', $courses);
            }
        }
        // select_last_id
        /************************************ahmed_start**********************************/
    }

    /*public function get_member_data($id){
        $this->db->select('f_members.* , family_setting.title_setting as school_title');
        $this->db->from("f_members");
        $this->db->join('family_setting', 'family_setting.id_setting = f_members.school_id_fk',"left");
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }*/
    public function get_by_join($table, $where_arr = false, $select = false, $jointable = false, $joinwhere = false, $jointype = '')
    {
        $this->db->select($table . '.*');
        if (!empty($select)) {
            $this->db->select($select);
        }
        $this->db->from($table);
        if (!empty($jointable) && !empty($joinwhere)) {
            $this->db->join($jointable, $joinwhere, $jointype);
        }
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update_family_member($id, $file)
    {
        $data['member_full_name'] = $this->chek_Null($this->input->post('member_full_name'));
        $data['member_card_type'] = $this->chek_Null($this->input->post('member_card_type'));
        $data['member_card_num'] = $this->chek_Null($this->input->post('member_card_num'));
        $data['member_nationality'] = $this->chek_Null($this->input->post('member_nationality'));
        $data['nationality_other'] = $this->chek_Null($this->input->post('nationality_other'));
        $data['school_id_fk'] = $this->chek_Null($this->input->post('school_id_fk'));
        $data['education_type'] = $this->chek_Null($this->input->post('education_type'));
        $data['school_cost'] = $this->chek_Null($this->input->post('school_cost'));
        $data['member_gender'] = $this->chek_Null($this->input->post('member_gender'));
        $data['member_job'] = $this->chek_Null($this->input->post('member_job'));
        $data['member_job_place'] = $this->chek_Null($this->input->post('member_job_place'));
        $data['member_skill'] = $this->chek_Null($this->input->post('member_skill'));
        $data['member_email'] = $this->chek_Null($this->input->post('member_email'));
        $data['member_status'] = $this->chek_Null($this->input->post('member_status'));
        $data['member_distracted_mother'] = $this->chek_Null($this->input->post('member_distracted_mother'));
        $data['member_activity_type'] = $this->chek_Null($this->input->post('member_activity_type'));
        $data['member_activity_type_other'] = $this->chek_Null($this->input->post('member_activity_type_other'));
        $data['member_mob'] = $this->chek_Null($this->input->post('member_mob'));
        $data['member_smoken'] = $this->chek_Null($this->input->post('member_smoken'));
        $data['member_health_type'] = $this->chek_Null($this->input->post('member_health_type'));
        $data['member_health_type_other'] = $this->chek_Null($this->input->post('member_health_type_other'));
        $data['member_month_money'] = $this->chek_Null($this->input->post('member_month_money'));
        $data['member_child_num'] = $this->chek_Null($this->input->post('member_child_num'));
        $data['member_home_type'] = $this->chek_Null($this->input->post('member_home_type'));
        $data['member_home_other'] = $this->chek_Null($this->input->post('member_home_other'));
        $data['member_hij'] = $this->chek_Null($this->input->post('member_hij'));
        $data['stage_id_fk'] = $this->chek_Null($this->input->post('stage_id_fk'));
        $data['class_id_fk'] = $this->chek_Null($this->input->post('class_id_fk'));
        $data['member_omra'] = $this->chek_Null($this->input->post('member_omra'));
        $data['member_note'] = $this->chek_Null($this->input->post('member_note'));
        // $data['member_birth_card_img']=$file['member_birth_card_img'];
        // $data['member_sechool_img']=$file['member_sechool_img'];
        $data['member_disease_id_fk'] = $this->chek_Null($this->input->post('member_disease_id_fk'));
        $data['member_disability_id_fk'] = $this->chek_Null($this->input->post('member_disability_id_fk'));
        $data['member_dis_date_ar'] = $this->chek_Null($this->input->post('member_dis_date_ar'));
        $data['member_dis_reason'] = $this->chek_Null($this->input->post('member_dis_reason'));
        $data['member_dis_response_status'] = $this->chek_Null($this->input->post('member_dis_response_status'));
        $data['member_dis_status'] = $this->chek_Null($this->input->post('member_dis_status'));
        $data['categoriey_member'] = $this->chek_Null($this->input->post('categoriey_member'));
        $data['guaranteed_member'] = $this->chek_Null($this->input->post('guaranteed_member'));
        $data['member_dar_markz_id_fk'] = $this->chek_Null($this->input->post('member_dar_markz_id_fk'));
        $data['member_dar_markz_check'] = $this->chek_Null($this->input->post('member_dar_markz_check'));
        $data['member_specialization'] = $this->chek_Null($this->input->post('member_specialization'));
        //$data['halt_elmostafid_member']=$this->chek_Null( $this->input->post('halt_elmostafid_member'));
        $data['persons_status'] = $this->chek_Null($this->input->post('persons_status'));
        $data['halt_elmostafid_member'] = $this->chek_Null($this->input->post('persons_status'));
        if ($this->chek_Null($file['member_sechool_img']) != "") {
            $data['member_sechool_img'] = $file['member_sechool_img'];
        }
        if ($this->chek_Null($file['member_birth_card_img']) != '') {
            $data['member_birth_card_img'] = $file['member_birth_card_img'];
        }
        if ($this->chek_Null($file['member_photo']) != '') {
            $data['member_photo'] = $file['member_photo'];
        }
        $data['guaranteed'] = $this->chek_Null($this->input->post('guaranteed'));
        $gregorian_date_arr = array($this->input->post('CDay'), $this->input->post('CMonth'), $this->input->post('CYear'));
        $gregorian_date = implode('/', $gregorian_date_arr);
        $hijri_date_arr = array($this->input->post('HDay'), $this->input->post('HMonth'), $this->input->post('HYear'));
        $hijri_date = implode('/', $hijri_date_arr);
        $data['member_birth_date'] = $this->chek_Null($gregorian_date);
        $data['member_birth_date_hijri'] = $this->chek_Null($hijri_date);
        $data['member_birth_date_year'] = $this->chek_Null($this->input->post('CYear'));
        $data['member_birth_date_hijri_year'] = $this->chek_Null($this->input->post('HYear'));
        $data['member_relationship'] = $this->chek_Null($this->input->post('member_relationship'));
        $data['member_card_source'] = $this->chek_Null($this->input->post('member_card_source'));
        $data['member_study_case'] = $this->chek_Null($this->input->post('member_study_case'));
        $data['member_academic_achievement_level'] = $this->chek_Null($this->input->post('member_academic_achievement_level'));
        $data['member_person_type'] = $this->chek_Null($this->input->post('member_person_type'));
        $data['member_education_level'] = $this->chek_Null($this->input->post('member_education_level'));
        //$data['member_account']=$this->chek_Null( $this->input->post('member_account'));
        //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
        $data['member_house_check'] = $this->chek_Null($this->input->post('member_house_check'));
        $data['member_house_id_fk'] = $this->chek_Null($this->input->post('member_house_id_fk'));
        /******************************ahmed**********************/
        // $explode=explode("-",$this->input->post('member_account_id'));
        //$data['member_account_id'] =$explode[0];
        //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
        // $data['bank_account_num']=$this->chek_Null($this->input->post('bank_num'));
        $data['personal_character_id_fk'] = $this->chek_Null($this->input->post('personal_character_id_fk'));
        $data['relation_with_family'] = $this->chek_Null($this->input->post('relation_with_family'));
        $data['education_problems'] = $this->chek_Null($this->input->post('education_problems'));
        $data['courses_details'] = $this->chek_Null($this->input->post('courses_details'));
        $data['member_hij'] = $this->chek_Null($this->input->post('member_hij'));
        $data['member_haj_geha'] = $this->chek_Null($this->input->post('member_haj_geha'));
        $data['member_last_hij_date'] = $this->chek_Null($this->input->post('member_last_hij_date'));
        $data['member_omra'] = $this->chek_Null($this->input->post('member_omra'));
        $data['member_omra_geha'] = $this->chek_Null($this->input->post('member_omra_geha'));
        $data['member_last_omra_date'] = $this->chek_Null($this->input->post('member_last_omra_date'));
        $data['member_comprehensive_rehabilitation'] = $this->chek_Null($this->input->post('member_comprehensive_rehabilitation'));
        $data['member_rehabilitation_value'] = $this->chek_Null($this->input->post('member_rehabilitation_value'));
        $data['member_other_skill'] = $this->chek_Null($this->input->post('member_other_skill'));
        $this->db->where('id', $id);
        $this->db->update('f_members', $data);
        $this->db->where("family_member_id_fk", $id);
        $this->db->delete("f_members_education_problems");
        if (!empty($this->input->post('problem_id_fk'))) {
            $problem_id_fk = $this->input->post('problem_id_fk');
            for ($z = 0; $z < sizeof($problem_id_fk); $z++) {
                $f_members_education_problems['family_member_id_fk'] = $id;
                $f_members_education_problems['problem_id_fk'] = $problem_id_fk[$z];
                $f_members_education_problems['approved'] = 0;
                $this->db->insert('f_members_education_problems', $f_members_education_problems);
            }
        }
        $this->db->where("family_member_id_fk", $id);
        $this->db->delete("f_members_courses_and_skills");
        if (!empty($_POST['courses'])) {
            foreach ($_POST['courses'] as $key => $value) {
                $courses['type'] = 1;
                $courses['family_member_id_fk'] = $id;
                $courses['course_skill_id_fk'] = $value;
                $this->db->insert('f_members_courses_and_skills', $courses);
            }
        }
        if (!empty($_POST['skills'])) {
            foreach ($_POST['skills'] as $key => $value) {
                $courses['type'] = 2;
                $courses['family_member_id_fk'] = $id;
                $courses['course_skill_id_fk'] = $value;
                $this->db->insert('f_members_courses_and_skills', $courses);
            }
        }
    }

    //yara
    public function select_search_key($table, $search_key, $search_key_value)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key, $search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function selectByType($table, $search_key, $search_key_value, $scape)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key, $search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if ($row->id_setting == $scape) {
                    continue;
                }
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_type($type)
    {
        $this->db->select('*');
        $this->db->from('area_settings');
        $this->db->where("type", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function display_files($type)
    {
        $this->db->select('*');
        $this->db->where('title!=', '0');
        $this->db->where('type', $type);
        $this->db->from('pr_conditions');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function insert_new_register($motherNum)
    {
        $data['user_name'] = $motherNum;
        $data['web_admin'] = 1;
        $password = $motherNum;
        $password = sha1(md5($password));
        $data['user_password'] = $password;
        $data['father_name'] = $this->input->post('full_name');
        $data['full_name_order'] = $this->input->post('full_name_order');
        $data['contact_mob'] = $this->input->post('contact_mob');
        $data['center_id_fk'] = $this->input->post('center_id_fk');
        if ($this->input->post('district_id_fk') == 90) {
            $data['district_id_fk'] = $this->input->post('hai_name');
        } else {
            $data['district_id_fk'] = $this->input->post('district_id_fk');
        }
        $data['father_national_num'] = $this->input->post('father_national_num');
        $data['mother_national_num'] = $motherNum;
        $data['date_registration'] = strtotime(date("Y-m-d", time()));
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['order_method'] = 1;
        $data['person_response'] = 0;
        $data['male_number'] = $this->input->post('male_number');
        $data['female_number'] = $this->input->post('female_number');
        $data['family_members_number'] = $this->input->post('family_members_number');
//=====================================================
        /*
         *
         * insert for father data
         *
         */
        $data_f['full_name'] = $this->input->post('full_name');
        $data_f['mother_national_num_fk'] = $motherNum;
        $data_f['f_national_id'] = $this->input->post('father_national_num');
        $data['national_id_type_mother'] = $this->chek_Null($this->input->post('national_id_type'));
        $data['marital_status_id_fk_mother'] = $this->chek_Null($this->input->post('marital_status_id_fk'));
        $this->db->insert('basic', $data);
        $this->db->insert('father', $data_f);
//=====================================================
        /*
         *
         * insert for files data
         *
         */
        $data_in_action_files['mother_national_num_fk'] = $motherNum;
        $data_in_action_files['process'] = 0;
        $data_in_action_files['process_title'] = 'تقديم طلب تسجيل';
        $data_in_action_files['reason'] = 'لا يوجد ملاحظات';
        $data_in_action_files['date'] = strtotime(date("Y-m-d", time()));
        $data_in_action_files['date_s'] = time();
        $data_in_action_files['date_ar'] = date("Y-m-d");
        $this->db->insert('all_actions_in_family_files', $data_in_action_files);
//=====================================================
        /*
         *
         * insert for members and mother data
         *
         */
        if (!empty($_POST['full_name_order'])) {
            $data_m['m_relationship'] = 41;
            $data_m['mother_national_num_fk'] = $motherNum;
            $data_m['full_name'] = $this->input->post('full_name_order');
            $data_m['m_national_id_type'] = $this->input->post('national_id_type');
            $data_m['m_gender'] = 2;
            $data_m['categoriey_m'] = 1;
            $this->db->insert('mother', $data_m);
        }
    }

    public function check_national_num($mother_national_num)
    {
        $this->db->select('mother_national_num');
        $this->db->from("basic");
        $this->db->where("mother_national_num", $mother_national_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;
    }

    public function select_places($form)
    {
        $this->db->select('*');
        $this->db->from('area_settings');
        $this->db->where("from_id", $form);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function select_all_order_web()
    {
        $q = $this->db->select('*')->order_by('id')->where('web_admin', 1)->get('basic')->result();
        if (!empty($q)) {
            return $q;
        }
        return false;
    }


    /* public function add_contact(){
     $contact_type_fk = $this->input->post('contact_type_fk');
     if (!empty($contact_type_fk)){
         $contact_typ_arr = explode('-',$contact_type_fk);
         $data['contact_type_fk']= $contact_typ_arr[0];
         $data['contact_type_n']= $contact_typ_arr[1];
     }
     $data['content']= strip_tags($this->input->post('content')) ;
     $data['publisher']= $this->input->post('mother_num') ;
     $data['publisher_name']= $this->input->post('mother_name') ;
     $data['date_ar']= date('Y-m-d');
     $data['date']= strtotime(date('Y-m-d')) ;
     $data['time']= date('h:i A') ;
     $data['mother_mob']= $this->input->post('mother_mob') ;
     $this->db->insert('pr_contact',$data);
 }*/
    public function add_contact($file)
    {
        $contact_type_fk = $this->input->post('contact_type_fk');
        if (!empty($contact_type_fk)) {
            $contact_typ_arr = explode('-', $contact_type_fk);
            $data['contact_type_fk'] = $contact_typ_arr[0];
            $data['contact_type_n'] = $contact_typ_arr[1];
            $data['contact_type_n'] = $contact_typ_arr[1];
        }
        $data['content'] = strip_tags($this->input->post('content'));
        if (!empty($file)) {
            $data['file_attach_name'] = $file;
        }
        $data['publisher'] = $this->input->post('mother_num');
        $data['publisher_name'] = $this->input->post('mother_name');
        $data['date_ar'] = date('Y-m-d');
        $data['date'] = strtotime(date('Y-m-d'));
        $data['time'] = date('h:i A');
        $data['mother_mob'] = $this->input->post('mother_mob');
        $this->db->insert('pr_contact', $data);
    }


    public function update_account_setting($mother_num, $file)
    {

        $data['user_name'] = $this->input->post('user_name');
        if ($this->input->post('user_password')) {

            $data['user_password'] = sha1(md5($this->input->post('user_password')));
        }
        if (!empty($file)) {
            $data['account_img'] = $file;
        }
        $this->db->where('mother_national_num', $mother_num);
        $this->db->update('basic', $data);

    }

    public function delete_image($table, $where, $field)
    {
        $date[$field] = '';
        $this->db->where($where);
        $this->db->update($table, $date);
        return 1;
    }

    public function get_sarf_details($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $this->db->order_by('sarf_num_fk', 'DESC');
        $query = $this->db->get('finance_sarf_order_details');
        if ($query->num_rows() > 0) {
            $i = 0;
            $months = array('1' => 'يناير', '2' => 'فبراير', '3' => 'مارس', '4' => 'إبريل', '5' => 'مايو', '6' => 'يونيه', '7' => 'يوليه', '8' => 'اغسطس', '9' => 'سبتمبر', '10' => 'أكتوبر', '11' => 'نوفمبر', '12' => 'ديسمبر');
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->sarf = $this->get_name('finance_sarf_order', array('sarf_num' => $row->sarf_num_fk));
                $data[$i]->band_name = $this->get_name('bnod_help', array('id' => $row->sarf->bnod_help_fk));
                $unix = strtotime($data[$i]->sarf->sarf_date_ar);
                $mon = date('n', $unix);
                $data[$i]->sarf_month = $months[$mon];

                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_name($table, $arr)
    {
        $this->db->where($arr);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    public function make_online()
    {
        $data['online'] = 1;
        $email = $this->input->post('user_name');
        $pass = sha1(md5($this->input->post('user_pass')));
        $q = $this->db->where('user_name', $email)->where('user_password', $pass)->where('account_status', 1)->update('basic', $data);
    }

    public function delete_image_wakel($table, $where)
    {
        $date['w_national_img'] = '';
        $this->db->where($where);
        $this->db->update($table, $date);
        return 1;
    }


    /*//    5-4-*/
    public function get_all_messags($mother_num)
    {
        $this->db->where("publisher", $mother_num);
        $query = $this->db->get('pr_contact');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->contact_type_color = $this->get_color($row->contact_type_fk);
                $data[$i]->egraa_color = $this->get_color($row->egraa_id_fk);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function get_color($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get('pr_contact_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->color;
        }
        return false;
    }

    public function get_message_by_id($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get('pr_contact');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
}