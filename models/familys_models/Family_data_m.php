<?php


class Family_data_m extends CI_Model
{


    /**********************************************************************/
    public function get_family_data($mother_national_num_fk)
    {
        $arr_tables = array('father', 'mother', 'f_members', 'houses', 'devices',
            'home_needs', 'family_attach_files', 'basic', 'wakels', 'family_income_duties', 'researcher_opinion', 'family_bank_responsible', 'family_attach_files_other');
        $arr_data = array();
        foreach ($arr_tables as $record) {
            $arr_data[$record] = $this->get_all_data($record, $mother_national_num_fk);
        }
        return $arr_data;
    }

    public function get_all_data($table, $mother_national_num_fk)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($table === 'basic') {
            $this->db->where("mother_national_num", $mother_national_num_fk);
        } elseif ($table === 'family_bank_responsible') {
            $this->db->where("family_national_num_fk", $mother_national_num_fk);
        } else {
            $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            /***************************   الأب بيانات  ***************************************/
            if ($table === 'father') {
                $data = $query->row();
                if ($data->full_name != '') {
                    $data->full_name = $data->full_name;
                } else {
                    $data->full_name = ' غير محدد ';
                }
                if ($data->f_national_id != '') {
                    $data->f_national_id = $data->f_national_id;
                } else {
                    $data->f_national_id = ' غير محدد ';
                }
                if (isset($data->f_national_id_type) && $data->f_national_id_type != 0 && $data->f_national_id_type != '') {
                    $data->f_national_type_n = $this->get_from_family_settings($data->f_national_id_type);
                } else {
                    $data->f_national_type_n = 'غير محدد';
                }
                if (isset($data->f_card_source) && $data->f_card_source != 0 && $data->f_card_source != '') {
                    $data->f_card_source_n = $this->get_from_family_settings($data->f_card_source);
                } else {
                    $data->f_card_source_n = 'غير محدد';
                }
                if (isset($data->f_nationality_id_fk) && $data->f_nationality_id_fk != 0 && $data->f_nationality_id_fk != '') {
                    $data->f_nationality_n = $this->get_from_family_settings($data->f_nationality_id_fk);
                } else {
                    $data->f_nationality_n = 'غير محدد';
                }
                if ($data->nationality_other != '') {
                    $data->nationality_other = $data->nationality_other;
                } else {
                    $data->nationality_other = ' لا يوجد';
                }
                if (isset($data->f_job) && $data->f_job != 0 && $data->f_job != '') {
                    $data->f_job_n = $this->get_from_family_settings($data->f_job);
                } else {
                    $data->f_job_n = 'غير محدد';
                }
                if (isset($data->f_death_id_fk) && $data->f_death_id_fk != 0 && $data->f_death_id_fk != '') {
                    $data->f_death_n = $this->get_from_family_settings($data->f_death_id_fk);
                } else {
                    $data->f_death_n = 'غير محدد';
                }
                if ($data->f_death_reason_fk != '') {
                    $data->f_death_reason_fk = $data->f_death_reason_fk;
                } else {
                    $data->f_death_reason_fk = ' غير محدد ';
                }
                if ($data->f_birth_date != '') {
                    $data->f_birth_date = explode('/', $data->f_birth_date)[2] . '/' . explode('/', $data->f_birth_date)[1] . '/' . explode('/', $data->f_birth_date)[0];
                } else {
                    $data->f_birth_date = ' غير محدد ';
                }
                if ($data->f_birth_date_hijri != '') {
                    //  $data->f_birth_date_hijri= $data->f_birth_date_hijri;
                    $data->f_birth_date_hijri = explode('/', $data->f_birth_date_hijri)[2] . '/' . explode('/', $data->f_birth_date_hijri)[1] . '/' . explode('/', $data->f_birth_date_hijri)[0];
                } else {
                    $data->f_birth_date_hijri = ' غير محدد ';
                }
                if ($data->f_wive_count != '') {
                    $data->f_wive_count = $data->f_wive_count;
                } else {
                    $data->f_wive_count = ' غير محدد ';
                }
                if ($data->family_members_number != '') {
                    $data->family_members_number = $data->family_members_number;
                } else {
                    $data->family_members_number = ' غير محدد ';
                }
                if ($data->f_death_reason_fk != '' && $data->f_death_reason_fk != 0) {
                    $data->f_death_reason_fk = $data->f_death_reason_fk;
                } else {
                    $data->f_death_reason_fk = ' غير محدد ';
                }
                if ($data->f_death_date != '') {
                    //  $data->f_death_date= $data->f_death_date;
                    $data->f_death_date = explode('/', $data->f_death_date)[2] . '/' . explode('/', $data->f_death_date)[1] . '/' . explode('/', $data->f_death_date)[0];
                } else {
                    $data->f_death_date = ' غير محدد ';
                }
                if ($data->f_employment_check == 1) {
                    $data->f_employment_check = 'نعم';
                    // $data->f_employment = $this->get_father_data('father_employment', $mother_national_num_fk);
                } elseif ($data->f_employment_check == 2) {
                    $data->f_employment_check = 'لا';
                } else {
                    $data->f_employment_check = 'غير محدد';
                }
                if ($data->f_employees_sons_check == 1) {
                    $data->f_employees_sons_check = 'نعم';
                    // $data->f_employees_sons = $this->get_father_data('father_employees_sons', $mother_national_num_fk);
                } elseif ($data->f_employees_sons_check == 2) {
                    $data->f_employees_sons_check = 'لا';
                } else {
                    $data->f_employees_sons_check = 'غير محدد';
                }
                if ($data->f_special_needs_sons_check == 1) {
                    $data->f_special_needs_sons_check = 'نعم';
                    //  $data->needs = $this->get_father_data('father_special_needs_sons', $mother_national_num_fk);
                } elseif ($data->f_special_needs_sons_check == 2) {
                    $data->f_special_needs_sons_check = 'لا';
                } else {
                    $data->f_special_needs_sons_check = 'غير محدد';
                }
                if ($data->f_other_associations_check == 1) {
                    $data->f_other_associations_check = 'نعم';
                    // $data->associations = $this->get_father_data('father_other_associations', $mother_national_num_fk);
                } elseif ($data->f_other_associations_check == 2) {
                    $data->f_other_associations_check = 'لا';
                } else {
                    $data->f_other_associations_check = 'غير محدد';
                }
            } /***************************   الأم بيانات  ***************************************/

            elseif ($table === 'mother') {
                $data = $query->row();
                /*********************   الأساسية البيانات  ******************/
                if ($data->full_name != '') {
                    $data->full_name = $data->full_name;
                } else {
                    $data->full_name = ' غير محدد ';
                }
                if ($data->mother_national_num_fk != '') {
                    $data->mother_national_num_fk = $data->mother_national_num_fk;
                } else {
                    $data->mother_national_num_fk = ' غير محدد ';
                }
                if ($data->m_birth_date != '') {
                    $data->m_birth_date = explode('/', $data->m_birth_date)[2] . '/' . explode('/', $data->m_birth_date)[0] . '/' . explode('/', $data->m_birth_date)[1];
                } else {
                    $data->m_birth_date = ' غير محدد ';
                }
                if (isset($data->m_national_id_type) && $data->m_national_id_type != 0 && $data->m_national_id_type != '') {
                    $data->m_national_type_n = $this->get_from_family_settings($data->m_national_id_type);
                } else {
                    $data->m_national_type_n = 'غير محدد';
                }
                if (isset($data->m_card_source) && $data->m_card_source != 0 && $data->m_card_source != '') {
                    $data->m_card_source_n = $this->get_from_family_settings($data->m_card_source);
                } else {
                    $data->m_card_source_n = 'غير محدد';
                }
                if (isset($data->m_relationship) && $data->m_relationship != 0 && $data->m_relationship != '') {
                    $data->m_relationship_n = $this->get_from_family_settings($data->m_relationship);
                } else {
                    $data->m_relationship_n = 'غير محدد';
                }
                if (isset($data->m_marital_status_id_fk) && $data->m_marital_status_id_fk != 0 && $data->m_marital_status_id_fk != '') {
                    $data->m_marital_status_n = $this->get_from_family_settings($data->m_marital_status_id_fk);
                } else {
                    $data->m_marital_status_n = 'غير محدد';
                }
                if ($data->m_gender == 1) {
                    $data->m_gender = 'ذكر';
                } elseif ($data->m_gender == 2) {
                    $data->m_gender = 'أنثى';
                } else {
                    $data->m_gender = 'غير محدد';
                }
                if (isset($data->m_nationality) && $data->m_nationality != 0 && $data->m_nationality != '') {
                    $data->m_nationality_n = $this->get_from_family_settings($data->m_nationality);
                } else {
                    $data->m_nationality_n = 'غير محدد';
                }
                if ($data->nationality_other != '') {
                    $data->nationality_other = $data->nationality_other;
                } else {
                    $data->nationality_other = ' غير محدد ';
                }
                if (isset($data->m_living_place_id_fk) && $data->m_living_place_id_fk != 0 && $data->m_living_place_id_fk != '') {
                    $data->m_living_place_n = $this->get_from_family_settings($data->m_living_place_id_fk);
                } else {
                    $data->m_living_place_n = 'غير محدد';
                }
                if ($data->m_living_place != '') {
                    $data->m_living_place = $data->m_living_place;
                } else {
                    $data->m_living_place = ' غير محدد ';
                }
                if (isset($data->person_type) && $data->person_type != 0 && $data->person_type != '') {
                    $data->person_type_n = $this->get_from_family_settings($data->person_type);
                } else {
                    $data->person_type_n = 'غير محدد';
                }
                if (isset($data->halt_elmostafid_m) && $data->halt_elmostafid_m != 0 && $data->halt_elmostafid_m != '') {
                    $data->halt_elmostafid_m_n = $this->get_id('files_status_setting', 'id', $data->halt_elmostafid_m, 'title');
                } else {
                    $data->halt_elmostafid_m_n = 'غير محدد';
                }
                if ($data->categoriey_m == 1) {
                    $data->categoriey_m = 'أرملة';
                } elseif ($data->categoriey_m == 4) {
                    $data->categoriey_m = 'اخرى';
                } else {
                    $data->categoriey_m = 'غير محدد';
                }
                /*********************   التواصل بيانات  ******************/
                if ($data->m_mob != '') {
                    $data->m_mob = $data->m_mob;
                } else {
                    $data->m_mob = ' غير محدد ';
                }
                if ($data->m_another_mob != '') {
                    $data->m_another_mob = $data->m_another_mob;
                } else {
                    $data->m_another_mob = ' غير محدد ';
                }
                if ($data->m_email != '') {
                    $data->m_email = $data->m_email;
                } else {
                    $data->m_email = ' غير محدد ';
                }
                if ($data->m_relative_mob != '') {
                    $data->m_relative_mob = $data->m_relative_mob;
                } else {
                    $data->m_relative_mob = ' غير محدد ';
                }
                if (isset($data->m_relative_relation) && $data->m_relative_relation != 0 && $data->m_relative_relation != '') {
                    $data->m_relative_relation_n = $this->get_from_family_settings($data->m_relative_relation);
                } else {
                    $data->m_relative_relation_n = 'غير محدد';
                }
                /*********************   الصحية البيانات  ******************/
                $data->m_health_status_id_fk = $data->m_health_status_n;
                /*
                if ($data->m_health_status_id_fk=='good'){
                    $data->m_health_status_id_fk = 'سليم';
                }
                elseif ($data->m_health_status_id_fk=='disability'){
                    $data->m_health_status_id_fk = 'معاق';
                }
                elseif ($data->m_health_status_id_fk=='disease'){
                    $data->m_health_status_id_fk = 'مريض';
                }
                else{
                    $data->m_health_status_id_fk = 'غير محدد';
                }
                */
                if (isset($data->disease_id_fk) && $data->disease_id_fk != 0 && $data->disease_id_fk != '') {
                    $data->disease_n = $this->get_from_family_settings($data->disease_id_fk);
                } else {
                    $data->disease_n = 'غير محدد';
                }
                if (isset($data->disability_id_fk) && $data->disability_id_fk != 0 && $data->disability_id_fk != '') {
                    $data->disability_n = $this->get_from_family_settings($data->disability_id_fk);
                } else {
                    $data->disability_n = 'غير محدد';
                }
                if ($data->dis_reason != '') {
                    $data->dis_reason = $data->dis_reason;
                } else {
                    $data->dis_reason = '  لا يوجد ';
                }
                if (isset($data->dis_response_status) && $data->dis_response_status != 0 && $data->dis_response_status != '') {
                    $data->dis_response_status_n = $this->get_from_family_settings($data->dis_response_status);
                } else {
                    $data->dis_response_status_n = 'غير محدد';
                }
                if (isset($data->dis_status) && $data->dis_status != 0 && $data->dis_status != '') {
                    $data->dis_status_n = $this->get_from_family_settings($data->dis_status);
                } else {
                    $data->dis_status_n = 'غير محدد';
                }
                if ($data->m_comprehensive_rehabilitation == 1) {
                    $data->m_comprehensive_rehabilitation = 'نعم';
                } elseif ($data->m_comprehensive_rehabilitation == 2) {
                    $data->m_comprehensive_rehabilitation = 'لا';
                } else {
                    $data->m_comprehensive_rehabilitation = 'غير محدد';
                }
                if ($data->m_rehabilitation_value != '') {
                    $data->m_rehabilitation_value = $data->m_rehabilitation_value;
                } else {
                    $data->m_rehabilitation_value = '  لا يوجد ';
                }
                /*********************   العلمية  البيانات  ******************/
                $data->m_education_status_id_fk = $data->m_education_status_n;
                /*if ($data->m_education_status_id_fk==0){
                    $data->m_education_status_id_fk = 'دون سن الدراسة';
                }
                elseif ($data->m_education_status_id_fk=='unlettered'){
                    $data->m_health_status_id_fk = 'امى';
                }
                elseif ($data->m_education_status_id_fk=='graduate'){
                    $data->m_education_status_id_fk = 'متخرج';
                }
                elseif ($data->m_education_status_id_fk=='read_write'){
                    $data->m_education_status_id_fk = 'يقرأو يكتب';
                }
                else{
                    $data->m_education_status_id_fk = $this->get_from_family_settings($data->m_education_status_id_fk);
                }*/
                if (isset($data->m_specialization) && $data->m_specialization != 0 && $data->m_specialization != '') {
                    $data->m_specialization_n = $this->get_from_family_settings($data->m_specialization);
                } else {
                    $data->m_specialization_n = 'غير محدد';
                }
                if ($data->m_female_house_check == 1) {
                    $data->m_female_house_check = 'نعم';
                } elseif ($data->m_female_house_check == 2) {
                    $data->m_female_house_check = 'لا';
                } else {
                    $data->m_female_house_check = 'غير محدد';
                }
                if (isset($data->m_female_house_id_fk) && $data->m_female_house_id_fk != 0 && $data->m_female_house_id_fk != '') {
                    $data->m_female_house_n = $this->get_from_family_settings($data->m_female_house_id_fk);
                } else {
                    $data->m_female_house_n = 'غير محدد';
                }
                if ($data->m_want_work == 1) {
                    $data->m_want_work = 'لا يعمل';
                } elseif ($data->m_want_work == 2) {
                    $data->m_want_work = 'يعمل';
                } else {
                    $data->m_want_work = 'غير محدد';
                }
                if (isset($data->m_job_id_fk) && $data->m_job_id_fk != 0 && $data->m_job_id_fk != '') {
                    $data->m_job_n = $this->get_from_family_settings($data->m_job_id_fk);
                } else {
                    $data->m_job_n = 'غير محدد';
                }
                if (isset($data->person_type) && $data->person_type != 0 && $data->person_type != '') {
                    $data->person_type_n = $this->get_from_family_settings($data->person_type);
                } else {
                    $data->person_type_n = 'غير محدد';
                }
                if ($data->m_monthly_income != '') {
                    $data->m_monthly_income = $data->m_monthly_income;
                } else {
                    $data->m_monthly_income = '  لا يوجد ';
                }
                if (isset($data->m_education_level_id_fk) && $data->m_education_level_id_fk != 0 && $data->m_education_level_id_fk != '') {
                    $data->m_education_level_n = $this->get_from_family_settings($data->m_education_level_id_fk);
                } else {
                    $data->m_education_level_n = 'غير محدد';
                }
                if ($data->m_hijri == 1) {
                    $data->m_hijri = 'نعم';
                } elseif ($data->m_hijri == 2) {
                    $data->m_hijri = 'لا';
                } else {
                    $data->m_hijri = 'غير محدد';
                }
                if ($data->m_ommra == 1) {
                    $data->m_ommra = 'نعم';
                } elseif ($data->m_ommra == 2) {
                    $data->m_ommra = 'لا';
                } else {
                    $data->m_ommra = 'غير محدد';
                }
                if ($data->ability_work == 1) {
                    $data->ability_work = 'نعم';
                } elseif ($data->ability_work == 0) {
                    $data->ability_work = 'لا';
                } else {
                    $data->ability_work = 'غير محدد';
                }
                if (isset($data->work_type_id_fk) && $data->work_type_id_fk != 0 && $data->work_type_id_fk != '') {
                    $data->work_type_n = $this->get_from_family_settings($data->work_type_id_fk);
                } else {
                    $data->work_type_n = 'غير محدد';
                }
                if (isset($data->personal_character_id_fk) && $data->personal_character_id_fk != 0 && $data->personal_character_id_fk != '') {
                    $data->personal_character_n = $this->get_from_family_settings($data->personal_character_id_fk);
                } else {
                    $data->personal_character_n = 'غير محدد';
                }
                if (isset($data->relation_with_family) && $data->relation_with_family != 0 && $data->relation_with_family != '') {
                    $data->relation_with_family_n = $this->get_from_family_settings($data->relation_with_family);
                } else {
                    $data->relation_with_family_n = 'غير محدد';
                }
                if ($data->m_place_mob != '') {
                    $data->m_place_mob = $data->m_place_mob;
                } else {
                    $data->m_place_mob = '  لا يوجد ';
                }
            } /***************************   الوكيل بيانات  ***************************************/
            elseif ($table === 'wakels') {
                $data = $query->row();
                if (isset($data->w_national_id_type) && $data->w_national_id_type != 0 && $data->w_national_id_type != '') {
                    $data->w_national_type_n = $this->get_from_family_settings($data->w_national_id_type);
                } else {
                    $data->w_national_type_n = 'غير محدد';
                }
                if (isset($data->w_card_source) && $data->w_card_source != 0 && $data->w_card_source != '') {
                    $data->w_card_source_n = $this->get_from_family_settings($data->w_card_source);
                } else {
                    $data->w_card_source_n = 'غير محدد';
                }
                //
                if ($data->w_birth_date != '') {
                    $data->w_birth_date = explode('/', $data->w_birth_date)[2] . '/' . explode('/', $data->w_birth_date)[1] . '/' . explode('/', $data->w_birth_date)[0];
                } else {
                    $data->w_birth_date = ' غير محدد ';
                }
                if ($data->w_birth_date_hijri != '') {
                    $data->w_birth_date_hijri = explode('/', $data->w_birth_date_hijri)[2] . '/' . explode('/', $data->w_birth_date_hijri)[1] . '/' . explode('/', $data->w_birth_date_hijri)[0];
                } else {
                    $data->w_birth_date_hijri = ' غير محدد ';
                }
                if ($data->w_want_work == 0) {
                    $data->w_want_work = 'لا يعمل';
                } elseif ($data->w_want_work == 1) {
                    $data->w_want_work = 'يعمل';
                } else {
                    $data->w_want_work = 'غير محدد';
                }
                if (isset($data->w_job_id_fk) && $data->w_job_id_fk != 0 && $data->w_job_id_fk != '') {
                    $data->w_job_n = $this->get_from_family_settings($data->w_job_id_fk);
                } else {
                    $data->w_job_n = 'غير محدد';
                }
                if ($data->employer != '') {
                    $data->employer = $data->employer;
                } else {
                    $data->employer = '  لا يوجد ';
                }
                if ($data->job_place != '') {
                    $data->job_place = $data->job_place;
                } else {
                    $data->job_place = '  لا يوجد ';
                }
                if ($data->job_mob != '') {
                    $data->job_mob = $data->job_mob;
                } else {
                    $data->job_mob = '  لا يوجد ';
                }
                if ($data->salary != '') {
                    $data->salary = $data->salary;
                } else {
                    $data->salary = '  لا يوجد ';
                }
                if ($data->guaranted == 0) {
                    $data->guaranted = 'لا ';
                } elseif ($data->guaranted == 1) {
                    $data->guaranted = 'نعم';
                } else {
                    $data->guaranted = 'غير محدد';
                }
                if ($data->persons_num != '') {
                    $data->persons_num = $data->persons_num;
                } else {
                    $data->persons_num = '  لا يوجد ';
                }
            } /***************************  الاسرة أفراد  بيانات  ***************************************/
            elseif ($table === 'f_members') {
                $a = 0;
                foreach ($query->result() as $row) {
                    $data[$a] = $row;
                    if ($row->stage_id_fk != 0 && $row->stage_id_fk != '') {
                        $data[$a]->stage_name = $this->get_classroom_name($row->stage_id_fk);
                    }
                    if ($row->class_id_fk != 0 && $row->class_id_fk != '') {
                        $data[$a]->class_name = $this->get_classroom_name($row->class_id_fk);
                    }
                    if ($row->member_birth_date_hijri != '') {
                        $row->member_birth_date_hijri = explode('/', $row->member_birth_date_hijri)[2] . '/' . explode('/', $row->member_birth_date_hijri)[1] . '/' . explode('/', $row->member_birth_date_hijri)[0];
                    } else {
                        $row->member_birth_date_hijri = ' غير محدد ';
                    }
                    $data[$a]->member_person_type_name = $this->get_from_family_settings($row->member_person_type);
                    $data[$a]->relation_name = $this->get_from_family_settings($row->member_relationship);
                    $data[$a]->halet_member_name = $this->get_id('files_status_setting', 'id', $row->halt_elmostafid_member, 'title');
                    $data[$a]->color = $this->get_id('persons_status_setting', 'id', $row->persons_status, 'color');
                    $data[$a]->reason = $this->get_id('family_reasons_settings', 'id', $row->persons_process_reason, 'title');
                    $a++;
                }
                $data = $query->result();
            } /***************************  السكن   بيانات  ***************************************/
            elseif ($table === 'houses') {
                $data = $query->row();
                if (isset($data->h_area_id_fk) && $data->h_area_id_fk != 0 && $data->h_area_id_fk != '') {
                    $data->h_area_n = $this->get_id('area_settings', 'id', $data->h_area_id_fk, 'title');
                } else {
                    $data->h_area_n = 'غير محدد';
                }
                if (isset($data->h_city_id_fk) && $data->h_city_id_fk != 0 && $data->h_city_id_fk != '') {
                    $data->h_city_n = $this->get_id('area_settings', 'id', $data->h_city_id_fk, 'title');
                } else {
                    $data->h_city_n = 'غير محدد';
                }
                if (isset($data->h_village_id_fk) && $data->h_village_id_fk != 0 && $data->h_village_id_fk != '') {
                    $data->h_villag_n = $this->get_id('area_settings', 'id', $data->h_village_id_fk, 'title');
                } else {
                    $data->h_villag_n = 'غير محدد';
                }
                if ($data->h_street != '' && $data->h_street != 0) {
                    $data->h_street = $data->h_street;
                } else {
                    $data->h_street = '  غير محدد ';
                }
                if ($data->h_electricity_account != '' && $data->h_electricity_account != 0) {
                    $data->h_electricity_account = $data->h_electricity_account;
                } else {
                    $data->h_electricity_account = '  لا يوجد ';
                }
                if ($data->h_water_account != '' && $data->h_water_account != 0) {
                    $data->h_water_account = $data->h_water_account;
                } else {
                    $data->h_water_account = '  لا يوجد ';
                }
                if ($data->h_nearest_school != '' && $data->h_nearest_school != '0') {
                    $data->h_nearest_school = $data->h_nearest_school;
                } else {
                    $data->h_nearest_school = '  لا يوجد ';
                }
                if ($data->h_nearest_teacher != '' && $data->h_nearest_teacher != '0') {
                    $data->h_nearest_teacher = $data->h_nearest_teacher;
                } else {
                    $data->h_nearest_teacher = '  لا يوجد ';
                }
                if ($data->h_mosque != '' && $data->h_mosque != 0) {
                    $data->h_mosque = $data->h_mosque;
                } else {
                    $data->h_mosque = '  لا يوجد ';
                }
                if (isset($data->h_house_type_id_fk) && $data->h_house_type_id_fk != 0 && $data->h_house_type_id_fk != '') {
                    $data->h_house_typ_n = $this->get_from_family_settings($data->h_house_type_id_fk);
                } else {
                    $data->h_house_typ_n = 'غير محدد';
                }
                if (isset($data->h_house_direction) && $data->h_house_direction != 0 && $data->h_house_direction != '') {
                    $data->h_house_direction_n = $this->get_from_family_settings($data->h_house_direction);
                } else {
                    $data->h_house_direction_n = 'غير محدد';
                }
                if (isset($data->h_house_status_id_fk) && $data->h_house_status_id_fk != 0 && $data->h_house_status_id_fk != '') {
                    $data->h_house_status_n = $this->get_from_family_settings($data->h_house_status_id_fk);
                } else {
                    $data->h_house_status_n = 'غير محدد';
                }
                if ($data->h_rooms_account != '' && $data->h_rooms_account != 0) {
                    $data->h_rooms_account = $data->h_rooms_account;
                } else {
                    $data->h_rooms_account = '  غير محدد ';
                }
                if ($data->h_borrow_from_bank == 2) {
                    $data->h_borrow_from_bank = 'لا ';
                } elseif ($data->h_borrow_from_bank == 1) {
                    $data->h_borrow_from_bank = 'نعم';
                } else {
                    $data->h_borrow_from_bank = 'غير محدد';
                }
                if ($data->h_borrow_remain != '' && $data->h_borrow_remain != 0) {
                    $data->h_borrow_remain = $data->h_borrow_remain;
                } else {
                    $data->h_borrow_remain = '  غير محدد ';
                }
                if (isset($data->h_house_owner_id_fk) && $data->h_house_owner_id_fk != 0 && $data->h_house_owner_id_fk != '') {
                    $data->h_house_owner_n = $this->get_from_family_settings($data->h_house_owner_id_fk);
                } else {
                    $data->h_house_owner_n = 'غير محدد';
                }
                if ($data->h_rent_amount != '' && $data->h_rent_amount != 0) {
                    $data->h_rent_amount = $data->h_rent_amount;
                } else {
                    $data->h_rent_amount = '  غير محدد ';
                }
                if ($data->h_bath_rooms_account != '' && $data->h_bath_rooms_account != 0) {
                    $data->h_bath_rooms_account = $data->h_bath_rooms_account;
                } else {
                    $data->h_bath_rooms_account = '  غير محدد ';
                }
                if ($data->h_house_size != '' && $data->h_house_size != 0) {
                    $data->h_house_size = $data->h_house_size;
                } else {
                    $data->h_house_size = '  غير محدد ';
                }
                if ($data->h_loan_restoration == 2) {
                    $data->h_loan_restoration = 'لا ';
                } elseif ($data->h_loan_restoration == 1) {
                    $data->h_loan_restoration = 'نعم';
                } else {
                    $data->h_loan_restoration = 'غير محدد';
                }
                if ($data->h_loan_restoration_remain != '' && $data->h_loan_restoration_remain != 0) {
                    $data->h_loan_restoration_remain = $data->h_loan_restoration_remain;
                } else {
                    $data->h_loan_restoration_remain = '  غير محدد ';
                }
                if ($data->h_health_number != '' && $data->h_health_number != 0) {
                    $data->h_health_number = $data->h_health_number;
                } else {
                    $data->h_health_number = '  لا يوجد ';
                }
                if ($data->h_renter_name != '') {
                    $data->h_renter_name = $data->h_renter_name;
                } else {
                    $data->h_renter_name = '  لا يوجد ';
                }
                if ($data->h_renter_mob != '') {
                    $data->h_renter_mob = $data->h_renter_mob;
                } else {
                    $data->h_renter_mob = '  لا يوجد ';
                }
                if ($data->contract_start_date != '') {
                    $data->contract_start_date = explode('/', $data->contract_start_date)[2] . '/' . explode('/', $data->contract_start_date)[1] . '/' . explode('/', $data->contract_start_date)[0];
                } else {
                    $data->contract_start_date = ' غير محدد ';
                }
                if ($data->contract_end_date != '') {
                    $data->contract_end_date = explode('/', $data->contract_end_date)[2] . '/' . explode('/', $data->contract_end_date)[1] . '/' . explode('/', $data->contract_end_date)[0];
                } else {
                    $data->contract_end_date = ' غير محدد ';
                }
            } /************************   السكن محتويات******************/
            elseif ($table === 'devices') {
                $a = 0;
                foreach ($query->result() as $row) {
                    $data[$a] = $row;
                    $data[$a]->get_devices = $this->get_devices($mother_national_num_fk);
                    $a++;
                }
                $data = $query->result()[0];
            } /************************      الأسرة إحتياجات******************/
            elseif ($table === 'home_needs') {
                $a = 0;
                foreach ($query->result() as $row) {
                    $data[$a] = $row;
                    $data[$a]->get_home_needs = $this->get_home_needs($mother_national_num_fk);
                    $a++;
                }
                $data = $query->result()[0];
            } /************************       الوثائق   رفع******************/
            elseif ($table === 'family_attach_files') {
                $a = 0;
                foreach ($query->result() as $row) {
                    $data[$a] = $row;
                    $data[$a]->morfaq_name = $this->get_from_family_settings($row->file_attach_id_fk);
                    $a++;
                }
                $data = $query->result();
            }
            elseif ($table === 'family_attach_files_other') {
                $a = 0;
                foreach ($query->result() as $row) {
                    $data[$a] = $row;
                    $a++;
                }
                $data = $query->result();
            } /************************      والإلتزامات الدخل مصادر  ******************/
            elseif ($table === 'basic') {
                $data = $query->row();
                $data->all_mostafed_mother = $this->get_pure_all_sum_mostafed_mother($data->mother_national_num);
                $data->all_mostafed_member = $this->get_pure_all_sum_mostafed_members($data->mother_national_num);
                $data->all_mother_income = $this->get_mother_incomes($data->mother_national_num);
                $data->all_mother_masrof = $this->get_mother_masrof($data->mother_national_num);
                $data->member_num = $this->get_member_num($data->mother_national_num);
                $data->category = $this->categoryByValue(($data->all_mother_income - $data->all_mother_masrof) / ($data->member_num + 1));
            } elseif ($table === 'family_income_duties') {
                $a = 0;
                foreach ($query->result() as $row) {
                    $data[$a] = $row;
                    $data[$a]->income_name = $this->get_from_family_settings($row->finance_income_type_id);
                    if ($row->affect == 1) {
                        $row->affect = 'تؤثر';
                    } elseif ($row->affect == 0) {
                        $row->affect = 'لا تؤثر';
                    } else {
                        $row->affect = 'غير محدد';
                    }
                    if (!empty($row->value) || $row->value != 0) {
                        $row->value = $row->value;
                    } else {
                        $row->value = 0;
                    }
                    $a++;
                }
                $data = $query->result();
            } /************************    الباحث  رأي     ******************/
            elseif ($table === 'researcher_opinion') {
                $data = $query->row();
                $data->father_name = $this->get_id('father', 'mother_national_num_fk', $data->mother_national_num_fk, 'full_name');
                $data->father_card_num = $this->get_id('father', 'mother_national_num_fk', $data->mother_national_num_fk, 'f_national_id');
                $data->present = $this->get_from_family_settings($data->is_mother_present);
                $data->impression = $this->get_from_family_settings($data->mother_impression_visit);
                if ($data->home_cleaning == 1) {
                    $data->home_cleaning = 'نعم';
                } elseif ($data->home_cleaning == 2) {
                    $data->home_cleaning = 'لا ';
                } elseif ($data->home_cleaning == 3) {
                    $data->home_cleaning = 'الى حد ما ';
                } else {
                    $data->home_cleaning = 'غير محدد';
                }
                if ($data->child_cleanliness == 1) {
                    $data->child_cleanliness = 'نعم';
                } elseif ($data->child_cleanliness == 2) {
                    $data->child_cleanliness = 'لا ';
                } elseif ($data->child_cleanliness == 3) {
                    $data->child_cleanliness = 'الى حد ما ';
                } else {
                    $data->child_cleanliness = 'غير محدد';
                }
                if ($data->videos_researcher != '') {
                    $data->videos_researcher = $data->videos_researcher;
                } else {
                    $data->videos_researcher = 'لا يوجد';
                }
                if ($data->video_family_leader != '') {
                    $data->video_family_leader = $data->video_family_leader;
                } else {
                    $data->video_family_leader = 'لا يوجد';
                }
            } /************************       البنكي  الحساب بيانات******************/
            elseif ($table === 'family_bank_responsible') {
                $a = 0;
                foreach ($query->result() as $row) {
                    $data[$a] = $row;
                    $data[$a]->bank_name = $this->get_bank_name($row->bank_id_fk);
                    $data[$a]->person = $this->get_person($row->type, $row->person_id_fk, $row->person_name);
                    $data[$a]->responsible_operations = $this->get_responsible_operations($mother_national_num_fk);
                    $a++;
                }
                $data = $query->result();
            } else {
                $data = $query->result()[0];
            }
            return $data;
        } else {
            return false;
        }
    }


    public function get_bank_name($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('banks_settings');
        if ($query->num_rows() > 0) {
            return $query->row()->ar_name;
        } else {
            return "لم يضاف الاسم";
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

    public function get_mother_incomes($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("family_income_duties");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("affect", 1);
        $this->db->where("type", 1);
        $query = $this->db->get();
        $all_income = 0;
        if ($query->num_rows() > 0) {
            $all_income = 0;
            foreach ($query->result() as $row) {
                $all_income += $row->value;
            }
            return $all_income;
        }
        return 0;
    }

    public function categoryByValue($value)
    {
        $this->db->where('from <=', $value);
        $this->db->where('to >=', $value);
        $query = $this->db->get("family_category");
        return $query->row();
    }

    public function get_member_num($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_mother_masrof($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("family_income_duties");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("affect", 1);
        $this->db->where("type", 2);
        $query = $this->db->get();
        $all_income = 0;
        if ($query->num_rows() > 0) {
            $all_income = 0;
            foreach ($query->result() as $row) {
                $all_income += $row->value;
            }
            return $all_income;
        }
        return 0;
    }

    public function get_pure_all_sum_mostafed_mother($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("person_type", 62);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_pure_all_sum_mostafed_members($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("member_person_type", 62);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_home_needs($mother_national_num_fk)
    {
        $this->db->select('home_needs.* , home_needs.id as home_needs_id ,
                              products_sub.* ,
                              products_main.name as main_name ');
        $this->db->from('home_needs');
        $this->db->join('products  products_sub', "products_sub.id=home_needs.h_home_device_id_fk", "left");
        $this->db->join('products  products_main', "products_main.id=products_sub.from_id", "left");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_devices($mother_national_num_fk)
    {
        $this->db->select('devices.* , devices.id as devices_id ,
                              products_sub.* ,
                              products_main.name as main_name ');
        $this->db->from('devices');
        $this->db->join('products  products_sub', "products_sub.id=devices.d_house_device_id_fk", "left");
        $this->db->join('products  products_main', "products_main.id=products_sub.from_id", "left");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
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

    public function get_from_family_settings($id)
    {
        $this->db->where("type !=", 26);
        $this->db->where("id_setting", $id);
        $query = $this->db->get('family_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        } else {
            return 0;
        }
    }


    /*-----------------------------------------------------------------------*/

    public function family_data($mother_national_num)
    {
        $data = array();

        $data['mother'] = $this->mother_data($mother_national_num);
        $data['father'] = $this->father_data($mother_national_num);
        $data['wakel'] = $this->wakels_data($mother_national_num);
        $data['member'] = $this->member_data($mother_national_num);
        $data['houses'] = $this->house_data($mother_national_num);
        $data['devices'] = $this->get_devices($mother_national_num);
        $data['home_needs'] = $this->get_home_needs($mother_national_num);
        $data['family_attach_files'] = $this->family_attach_files_data($mother_national_num);


        $data['family_attach_files_other'] = $this->get_by('family_attach_files_other', array('mother_national_num_fk' => $mother_national_num));
        $data['income_sources'] = $this->get_by('family_setting', array('type' => 42));
        $data['monthly_duties'] = $this->get_by('family_setting', array('type' => 43));
        $data['family_income_duties'] = $this->get_family_income_duties($mother_national_num);
        $data['responsible_account'] = $this->get_responsible_account($mother_national_num);

        $data['researcher_opinion'] = $this->researcher_opinion_data($mother_national_num);


        return $data;
    }

/*    public function _data($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('mother');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get();
        $a = 0;
        if ($query->num_rows() > 0) {
            return $data;
        } else {
            return false;
        }
    }*/
    public function researcher_opinion_data($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('researcher_opinion');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get();
        $a = 0;
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $data->father_name = $this->get_id('father', 'mother_national_num_fk', $data->mother_national_num_fk, 'full_name');
            $data->father_card_num = $this->get_id('father', 'mother_national_num_fk', $data->mother_national_num_fk, 'f_national_id');
            $data->present = $this->get_from_family_settings($data->is_mother_present);
            $data->impression = $this->get_from_family_settings($data->mother_impression_visit);
            if ($data->home_cleaning == 1) {
                $data->home_cleaning = 'نعم';
            } elseif ($data->home_cleaning == 2) {
                $data->home_cleaning = 'لا ';
            } elseif ($data->home_cleaning == 3) {
                $data->home_cleaning = 'الى حد ما ';
            } else {
                $data->home_cleaning = 'غير محدد';
            }
            if ($data->child_cleanliness == 1) {
                $data->child_cleanliness = 'نعم';
            } elseif ($data->child_cleanliness == 2) {
                $data->child_cleanliness = 'لا ';
            } elseif ($data->child_cleanliness == 3) {
                $data->child_cleanliness = 'الى حد ما ';
            } else {
                $data->child_cleanliness = 'غير محدد';
            }
            if ($data->videos_researcher != '') {
                $data->videos_researcher = $data->videos_researcher;
            } else {
                $data->videos_researcher = 'لا يوجد';
            }
            if ($data->video_family_leader != '') {
                $data->video_family_leader = $data->video_family_leader;
            } else {
                $data->video_family_leader = 'لا يوجد';
            }
            return $data;
        } else {
            return false;
        }
    }
    public function basic_data($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get();
        $a = 0;
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $data->all_mostafed_mother = $this->get_pure_all_sum_mostafed_mother($data->mother_national_num);
            $data->all_mostafed_member = $this->get_pure_all_sum_mostafed_members($data->mother_national_num);
            $data->all_mother_income = $this->get_mother_incomes($data->mother_national_num);
            $data->all_mother_masrof = $this->get_mother_masrof($data->mother_national_num);
            $data->member_num = $this->get_member_num($data->mother_national_num);
            $data->category = $this->categoryByValue(($data->all_mother_income - $data->all_mother_masrof) / ($data->member_num + 1));
            return $data;
        } else {
            return false;
        }
    }
    public function family_attach_files_data($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('family_attach_files');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get();
        $a = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->morfaq_name = $this->get_from_family_settings($row->file_attach_id_fk);
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }
    public function wakels_data($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('wakels');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get();
        $a = 0;
        if ($query->num_rows() > 0) {
            $data = $query->row();
            if (isset($data->w_national_id_type) && $data->w_national_id_type != 0 && $data->w_national_id_type != '') {
                $data->w_national_type_n = $this->get_from_family_settings($data->w_national_id_type);
            } else {
                $data->w_national_type_n = 'غير محدد';
            }
            if (isset($data->w_card_source) && $data->w_card_source != 0 && $data->w_card_source != '') {
                $data->w_card_source_n = $this->get_from_family_settings($data->w_card_source);
            } else {
                $data->w_card_source_n = 'غير محدد';
            }
            //
            if ($data->w_birth_date != '') {
                $data->w_birth_date = explode('/', $data->w_birth_date)[2] . '/' . explode('/', $data->w_birth_date)[1] . '/' . explode('/', $data->w_birth_date)[0];
            } else {
                $data->w_birth_date = ' غير محدد ';
            }
            if ($data->w_birth_date_hijri != '') {
                $data->w_birth_date_hijri = explode('/', $data->w_birth_date_hijri)[2] . '/' . explode('/', $data->w_birth_date_hijri)[1] . '/' . explode('/', $data->w_birth_date_hijri)[0];
            } else {
                $data->w_birth_date_hijri = ' غير محدد ';
            }
            if ($data->w_want_work == 0) {
                $data->w_want_work = 'لا يعمل';
            } elseif ($data->w_want_work == 1) {
                $data->w_want_work = 'يعمل';
            } else {
                $data->w_want_work = 'غير محدد';
            }
            if (isset($data->w_job_id_fk) && $data->w_job_id_fk != 0 && $data->w_job_id_fk != '') {
                $data->w_job_n = $this->get_from_family_settings($data->w_job_id_fk);
            } else {
                $data->w_job_n = 'غير محدد';
            }
            if ($data->employer != '') {
                $data->employer = $data->employer;
            } else {
                $data->employer = '  لا يوجد ';
            }
            if ($data->job_place != '') {
                $data->job_place = $data->job_place;
            } else {
                $data->job_place = '  لا يوجد ';
            }
            if ($data->job_mob != '') {
                $data->job_mob = $data->job_mob;
            } else {
                $data->job_mob = '  لا يوجد ';
            }
            if ($data->salary != '') {
                $data->salary = $data->salary;
            } else {
                $data->salary = '  لا يوجد ';
            }
            if ($data->guaranted == 0) {
                $data->guaranted = 'لا ';
            } elseif ($data->guaranted == 1) {
                $data->guaranted = 'نعم';
            } else {
                $data->guaranted = 'غير محدد';
            }
            if ($data->persons_num != '') {
                $data->persons_num = $data->persons_num;
            } else {
                $data->persons_num = '  لا يوجد ';
            }
            return $data;
        } else {
            return false;
        }
    }

    public function father_data($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('father');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get();
        $a = 0;
        if ($query->num_rows() > 0) {

            $data = $query->row();
            if ($data->full_name != '') {
                $data->full_name = $data->full_name;
            } else {
                $data->full_name = ' غير محدد ';
            }
            if ($data->f_national_id != '') {
                $data->f_national_id = $data->f_national_id;
            } else {
                $data->f_national_id = ' غير محدد ';
            }
            if (isset($data->f_national_id_type) && $data->f_national_id_type != 0 && $data->f_national_id_type != '') {
                $data->f_national_type_n = $this->get_from_family_settings($data->f_national_id_type);
            } else {
                $data->f_national_type_n = 'غير محدد';
            }
            if (isset($data->f_card_source) && $data->f_card_source != 0 && $data->f_card_source != '') {
                $data->f_card_source_n = $this->get_from_family_settings($data->f_card_source);
            } else {
                $data->f_card_source_n = 'غير محدد';
            }
            if (isset($data->f_nationality_id_fk) && $data->f_nationality_id_fk != 0 && $data->f_nationality_id_fk != '') {
                $data->f_nationality_n = $this->get_from_family_settings($data->f_nationality_id_fk);
            } else {
                $data->f_nationality_n = 'غير محدد';
            }
            if ($data->nationality_other != '') {
                $data->nationality_other = $data->nationality_other;
            } else {
                $data->nationality_other = ' لا يوجد';
            }
            if (isset($data->f_job) && $data->f_job != 0 && $data->f_job != '') {
                $data->f_job_n = $this->get_from_family_settings($data->f_job);
            } else {
                $data->f_job_n = 'غير محدد';
            }
            if (isset($data->f_death_id_fk) && $data->f_death_id_fk != 0 && $data->f_death_id_fk != '') {
                $data->f_death_n = $this->get_from_family_settings($data->f_death_id_fk);
            } else {
                $data->f_death_n = 'غير محدد';
            }
            if ($data->f_death_reason_fk != '') {
                $data->f_death_reason_fk = $data->f_death_reason_fk;
            } else {
                $data->f_death_reason_fk = ' غير محدد ';
            }
            if ($data->f_birth_date != '') {
                $data->f_birth_date = explode('/', $data->f_birth_date)[2] . '/' . explode('/', $data->f_birth_date)[1] . '/' . explode('/', $data->f_birth_date)[0];
            } else {
                $data->f_birth_date = ' غير محدد ';
            }
            if ($data->f_birth_date_hijri != '') {
                //  $data->f_birth_date_hijri= $data->f_birth_date_hijri;
                $data->f_birth_date_hijri = explode('/', $data->f_birth_date_hijri)[2] . '/' . explode('/', $data->f_birth_date_hijri)[1] . '/' . explode('/', $data->f_birth_date_hijri)[0];
            } else {
                $data->f_birth_date_hijri = ' غير محدد ';
            }
            if ($data->f_wive_count != '') {
                $data->f_wive_count = $data->f_wive_count;
            } else {
                $data->f_wive_count = ' غير محدد ';
            }
            if ($data->family_members_number != '') {
                $data->family_members_number = $data->family_members_number;
            } else {
                $data->family_members_number = ' غير محدد ';
            }
            if ($data->f_death_reason_fk != '' && $data->f_death_reason_fk != 0) {
                $data->f_death_reason_fk = $data->f_death_reason_fk;
            } else {
                $data->f_death_reason_fk = ' غير محدد ';
            }
            if ($data->f_death_date != '') {
                //  $data->f_death_date= $data->f_death_date;
                $data->f_death_date = explode('/', $data->f_death_date)[2] . '/' . explode('/', $data->f_death_date)[1] . '/' . explode('/', $data->f_death_date)[0];
            } else {
                $data->f_death_date = ' غير محدد ';
            }
            if ($data->f_employment_check == 1) {
                $data->f_employment_check = 'نعم';
                // $data->f_employment = $this->get_father_data('father_employment', $mother_national_num_fk);
            } elseif ($data->f_employment_check == 2) {
                $data->f_employment_check = 'لا';
            } else {
                $data->f_employment_check = 'غير محدد';
            }
            if ($data->f_employees_sons_check == 1) {
                $data->f_employees_sons_check = 'نعم';
                // $data->f_employees_sons = $this->get_father_data('father_employees_sons', $mother_national_num_fk);
            } elseif ($data->f_employees_sons_check == 2) {
                $data->f_employees_sons_check = 'لا';
            } else {
                $data->f_employees_sons_check = 'غير محدد';
            }
            if ($data->f_special_needs_sons_check == 1) {
                $data->f_special_needs_sons_check = 'نعم';
                //  $data->needs = $this->get_father_data('father_special_needs_sons', $mother_national_num_fk);
            } elseif ($data->f_special_needs_sons_check == 2) {
                $data->f_special_needs_sons_check = 'لا';
            } else {
                $data->f_special_needs_sons_check = 'غير محدد';
            }
            if ($data->f_other_associations_check == 1) {
                $data->f_other_associations_check = 'نعم';
                // $data->associations = $this->get_father_data('father_other_associations', $mother_national_num_fk);
            } elseif ($data->f_other_associations_check == 2) {
                $data->f_other_associations_check = 'لا';
            } else {
                $data->f_other_associations_check = 'غير محدد';
            }
            return $data;
        } else {
            return false;
        }
    }

    public function mother_data($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('mother');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get();
        $a = 0;
        if ($query->num_rows() > 0) {
            $data = $query->row();
            /*********************   الأساسية البيانات  ******************/
            if ($data->full_name != '') {
                $data->full_name = $data->full_name;
            } else {
                $data->full_name = ' غير محدد ';
            }
            if ($data->mother_national_num_fk != '') {
                $data->mother_national_num_fk = $data->mother_national_num_fk;
            } else {
                $data->mother_national_num_fk = ' غير محدد ';
            }
            if ($data->m_birth_date != '') {
                $data->m_birth_date = explode('/', $data->m_birth_date)[2] . '/' . explode('/', $data->m_birth_date)[0] . '/' . explode('/', $data->m_birth_date)[1];
            } else {
                $data->m_birth_date = ' غير محدد ';
            }
            if (isset($data->m_national_id_type) && $data->m_national_id_type != 0 && $data->m_national_id_type != '') {
                $data->m_national_type_n = $this->get_from_family_settings($data->m_national_id_type);
            } else {
                $data->m_national_type_n = 'غير محدد';
            }
            if (isset($data->m_card_source) && $data->m_card_source != 0 && $data->m_card_source != '') {
                $data->m_card_source_n = $this->get_from_family_settings($data->m_card_source);
            } else {
                $data->m_card_source_n = 'غير محدد';
            }
            if (isset($data->m_relationship) && $data->m_relationship != 0 && $data->m_relationship != '') {
                $data->m_relationship_n = $this->get_from_family_settings($data->m_relationship);
            } else {
                $data->m_relationship_n = 'غير محدد';
            }
            if (isset($data->m_marital_status_id_fk) && $data->m_marital_status_id_fk != 0 && $data->m_marital_status_id_fk != '') {
                $data->m_marital_status_n = $this->get_from_family_settings($data->m_marital_status_id_fk);
            } else {
                $data->m_marital_status_n = 'غير محدد';
            }
            if ($data->m_gender == 1) {
                $data->m_gender = 'ذكر';
            } elseif ($data->m_gender == 2) {
                $data->m_gender = 'أنثى';
            } else {
                $data->m_gender = 'غير محدد';
            }
            if (isset($data->m_nationality) && $data->m_nationality != 0 && $data->m_nationality != '') {
                $data->m_nationality_n = $this->get_from_family_settings($data->m_nationality);
            } else {
                $data->m_nationality_n = 'غير محدد';
            }
            if ($data->nationality_other != '') {
                $data->nationality_other = $data->nationality_other;
            } else {
                $data->nationality_other = ' غير محدد ';
            }
            if (isset($data->m_living_place_id_fk) && $data->m_living_place_id_fk != 0 && $data->m_living_place_id_fk != '') {
                $data->m_living_place_n = $this->get_from_family_settings($data->m_living_place_id_fk);
            } else {
                $data->m_living_place_n = 'غير محدد';
            }
            if ($data->m_living_place != '') {
                $data->m_living_place = $data->m_living_place;
            } else {
                $data->m_living_place = ' غير محدد ';
            }
            if (isset($data->person_type) && $data->person_type != 0 && $data->person_type != '') {
                $data->person_type_n = $this->get_from_family_settings($data->person_type);
            } else {
                $data->person_type_n = 'غير محدد';
            }
            if (isset($data->halt_elmostafid_m) && $data->halt_elmostafid_m != 0 && $data->halt_elmostafid_m != '') {
                $data->halt_elmostafid_m_n = $this->get_id('files_status_setting', 'id', $data->halt_elmostafid_m, 'title');
            } else {
                $data->halt_elmostafid_m_n = 'غير محدد';
            }
            if ($data->categoriey_m == 1) {
                $data->categoriey_m = 'أرملة';
            } elseif ($data->categoriey_m == 4) {
                $data->categoriey_m = 'اخرى';
            } else {
                $data->categoriey_m = 'غير محدد';
            }
            /*********************   التواصل بيانات  ******************/
            if ($data->m_mob != '') {
                $data->m_mob = $data->m_mob;
            } else {
                $data->m_mob = ' غير محدد ';
            }
            if ($data->m_another_mob != '') {
                $data->m_another_mob = $data->m_another_mob;
            } else {
                $data->m_another_mob = ' غير محدد ';
            }
            if ($data->m_email != '') {
                $data->m_email = $data->m_email;
            } else {
                $data->m_email = ' غير محدد ';
            }
            if ($data->m_relative_mob != '') {
                $data->m_relative_mob = $data->m_relative_mob;
            } else {
                $data->m_relative_mob = ' غير محدد ';
            }
            if (isset($data->m_relative_relation) && $data->m_relative_relation != 0 && $data->m_relative_relation != '') {
                $data->m_relative_relation_n = $this->get_from_family_settings($data->m_relative_relation);
            } else {
                $data->m_relative_relation_n = 'غير محدد';
            }
            /*********************   الصحية البيانات  ******************/
/*            $data->m_health_status_id_fk = $data->m_health_status_n;*/

            if ($data->m_health_status_id_fk=='good'){
                $data->m_health_status_id_fk = 'سليم';
            }
            elseif ($data->m_health_status_id_fk=='disability'){
                $data->m_health_status_id_fk = 'معاق';
            }
            elseif ($data->m_health_status_id_fk=='disease'){
                $data->m_health_status_id_fk = 'مريض';
            }
            else{
                $data->m_health_status_id_fk = 'غير محدد';
            }

            if (isset($data->disease_id_fk) && $data->disease_id_fk != 0 && $data->disease_id_fk != '') {
                $data->disease_n = $this->get_from_family_settings($data->disease_id_fk);
            } else {
                $data->disease_n = 'غير محدد';
            }
            if (isset($data->disability_id_fk) && $data->disability_id_fk != 0 && $data->disability_id_fk != '') {
                $data->disability_n = $this->get_from_family_settings($data->disability_id_fk);
            } else {
                $data->disability_n = 'غير محدد';
            }
            if ($data->dis_reason != '') {
                $data->dis_reason = $data->dis_reason;
            } else {
                $data->dis_reason = '  لا يوجد ';
            }
            if (isset($data->dis_response_status) && $data->dis_response_status != 0 && $data->dis_response_status != '') {
                $data->dis_response_status_n = $this->get_from_family_settings($data->dis_response_status);
            } else {
                $data->dis_response_status_n = 'غير محدد';
            }
            if (isset($data->dis_status) && $data->dis_status != 0 && $data->dis_status != '') {
                $data->dis_status_n = $this->get_from_family_settings($data->dis_status);
            } else {
                $data->dis_status_n = 'غير محدد';
            }
            if ($data->m_comprehensive_rehabilitation == 1) {
                $data->m_comprehensive_rehabilitation = 'نعم';
            } elseif ($data->m_comprehensive_rehabilitation == 2) {
                $data->m_comprehensive_rehabilitation = 'لا';
            } else {
                $data->m_comprehensive_rehabilitation = 'غير محدد';
            }
            if ($data->m_rehabilitation_value != '') {
                $data->m_rehabilitation_value = $data->m_rehabilitation_value;
            } else {
                $data->m_rehabilitation_value = '  لا يوجد ';
            }
            /*********************   العلمية  البيانات  ******************/
/*            $data->m_education_status_id_fk = $data->m_education_status_n;*/
            if ($data->m_education_status_id_fk==0){
                $data->m_education_status_id_fk = 'دون سن الدراسة';
            }
            elseif ($data->m_education_status_id_fk=='unlettered'){
                $data->m_health_status_id_fk = 'امى';
            }
            elseif ($data->m_education_status_id_fk=='graduate'){
                $data->m_education_status_id_fk = 'متخرج';
            }
            elseif ($data->m_education_status_id_fk=='read_write'){
                $data->m_education_status_id_fk = 'يقرأو يكتب';
            }
            else{
                $data->m_education_status_id_fk = $this->get_from_family_settings($data->m_education_status_id_fk);
            }

            if (isset($data->m_specialization) && $data->m_specialization != 0 && $data->m_specialization != '') {
                $data->m_specialization_n = $this->get_from_family_settings($data->m_specialization);
            } else {
                $data->m_specialization_n = 'غير محدد';
            }
            if ($data->m_female_house_check == 1) {
                $data->m_female_house_check = 'نعم';
            } elseif ($data->m_female_house_check == 2) {
                $data->m_female_house_check = 'لا';
            } else {
                $data->m_female_house_check = 'غير محدد';
            }
            if (isset($data->m_female_house_id_fk) && $data->m_female_house_id_fk != 0 && $data->m_female_house_id_fk != '') {
                $data->m_female_house_n = $this->get_from_family_settings($data->m_female_house_id_fk);
            } else {
                $data->m_female_house_n = 'غير محدد';
            }
            if ($data->m_want_work == 1) {
                $data->m_want_work = 'لا يعمل';
            } elseif ($data->m_want_work == 2) {
                $data->m_want_work = 'يعمل';
            } else {
                $data->m_want_work = 'غير محدد';
            }
            if (isset($data->m_job_id_fk) && $data->m_job_id_fk != 0 && $data->m_job_id_fk != '') {
                $data->m_job_n = $this->get_from_family_settings($data->m_job_id_fk);
            } else {
                $data->m_job_n = 'غير محدد';
            }
            if (isset($data->person_type) && $data->person_type != 0 && $data->person_type != '') {
                $data->person_type_n = $this->get_from_family_settings($data->person_type);
            } else {
                $data->person_type_n = 'غير محدد';
            }
            if ($data->m_monthly_income != '') {
                $data->m_monthly_income = $data->m_monthly_income;
            } else {
                $data->m_monthly_income = '  لا يوجد ';
            }
            if (isset($data->m_education_level_id_fk) && $data->m_education_level_id_fk != 0 && $data->m_education_level_id_fk != '') {
                $data->m_education_level_n = $this->get_from_family_settings($data->m_education_level_id_fk);
            } else {
                $data->m_education_level_n = 'غير محدد';
            }
            if ($data->m_hijri == 1) {
                $data->m_hijri = 'نعم';
            } elseif ($data->m_hijri == 2) {
                $data->m_hijri = 'لا';
            } else {
                $data->m_hijri = 'غير محدد';
            }
            if ($data->m_ommra == 1) {
                $data->m_ommra = 'نعم';
            } elseif ($data->m_ommra == 2) {
                $data->m_ommra = 'لا';
            } else {
                $data->m_ommra = 'غير محدد';
            }
            if ($data->ability_work == 1) {
                $data->ability_work = 'نعم';
            } elseif ($data->ability_work == 0) {
                $data->ability_work = 'لا';
            } else {
                $data->ability_work = 'غير محدد';
            }
            if (isset($data->work_type_id_fk) && $data->work_type_id_fk != 0 && $data->work_type_id_fk != '') {
                $data->work_type_n = $this->get_from_family_settings($data->work_type_id_fk);
            } else {
                $data->work_type_n = 'غير محدد';
            }
            if (isset($data->personal_character_id_fk) && $data->personal_character_id_fk != 0 && $data->personal_character_id_fk != '') {
                $data->personal_character_n = $this->get_from_family_settings($data->personal_character_id_fk);
            } else {
                $data->personal_character_n = 'غير محدد';
            }
            if (isset($data->relation_with_family) && $data->relation_with_family != 0 && $data->relation_with_family != '') {
                $data->relation_with_family_n = $this->get_from_family_settings($data->relation_with_family);
            } else {
                $data->relation_with_family_n = 'غير محدد';
            }
            if ($data->m_place_mob != '') {
                $data->m_place_mob = $data->m_place_mob;
            } else {
                $data->m_place_mob = '  لا يوجد ';
            }
            return $data;
        } else {
            return false;
        }
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

                $data[$a]->color = $this->get_by('persons_status_setting', array('id' => $row->persons_status), 'color');
                $data[$a]->reason = $this->get_by('family_reasons_settings', array('id' => $row->persons_process_reason), 'title');

                if ($row->stage_id_fk != 0 && $row->stage_id_fk != '') {
                    $data[$a]->stage_name = $this->get_by('classrooms', array('id' => $row->stage_id_fk), 'name');

                }
                if ($row->class_id_fk != 0 && $row->class_id_fk != '') {
                    $data[$a]->class_name = $this->get_by('classrooms', array('id' => $row->class_id_fk), 'name');

                }
                if ($row->member_birth_date_hijri != '') {
                    $row->member_birth_date_hijri = explode('/', $row->member_birth_date_hijri)[2] . '/' . explode('/', $row->member_birth_date_hijri)[1] . '/' . explode('/', $row->member_birth_date_hijri)[0];
                } else {
                    $row->member_birth_date_hijri = ' غير محدد ';
                }

                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function house_data($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('houses');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get()->row();

        if (!empty($query)) {

            $query->h_house_type_tilte = $this->get_by('family_setting', array('id_setting' => $query->h_house_type_id_fk), 'title_setting');
            $query->h_house_direction_tilte = $this->get_by('family_setting', array('id_setting' => $query->h_house_direction), 'title_setting');
            $query->h_house_status_tilte = $this->get_by('family_setting', array('id_setting' => $query->h_house_status_id_fk), 'title_setting');
            $query->h_house_owner_tilte = $this->get_by('family_setting', array('id_setting' => $query->h_house_owner_id_fk), 'title_setting');

            $query->h_area_name = $this->get_by('area_settings', array('id' => $query->h_area_id_fk), 'title');
            $query->h_city_name = $this->get_by('area_settings', array('id' => $query->h_city_id_fk), 'title');
            $query->h_center_name = $this->get_by('area_settings', array('id' => $query->h_center_id_fk), 'title');
            $query->h_village_name = $this->get_by('area_settings', array('id' => $query->h_village_id_fk), 'title');


            if ( $query->h_borrow_from_bank == 2) {
                 $query->h_borrow_from_bank = 'لا ';
            } elseif ( $query->h_borrow_from_bank == 1) {
                 $query->h_borrow_from_bank = 'نعم';
            } else {
                 $query->h_borrow_from_bank = 'غير محدد';
            }
            if ( $query->h_borrow_remain != '' &&  $query->h_borrow_remain != 0) {
                 $query->h_borrow_remain =  $query->h_borrow_remain;
            } else {
                 $query->h_borrow_remain = '  غير محدد ';
            }


            if ( $query->h_loan_restoration == 2) {
                 $query->h_loan_restoration = 'لا ';
            } elseif ( $query->h_loan_restoration == 1) {
                 $query->h_loan_restoration = 'نعم';
            } else {
                 $query->h_loan_restoration = 'غير محدد';
            }
                if ( $query->contract_start_date != '') {
                 $query->contract_start_date = explode('/',  $query->contract_start_date)[2] . '/' . explode('/',  $query->contract_start_date)[1] . '/' . explode('/',  $query->contract_start_date)[0];
            } else {
                 $query->contract_start_date = ' غير محدد ';
            }
            if ( $query->contract_end_date != '') {
                 $query->contract_end_date = explode('/',  $query->contract_end_date)[2] . '/' . explode('/',  $query->contract_end_date)[1] . '/' . explode('/',  $query->contract_end_date)[0];
            } else {
                 $query->contract_end_date = ' غير محدد ';
            }

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
                $data[$a] = $row;
                $data[$a]->income_name = $this->get_from_family_settings($row->finance_income_type_id);
                if ($row->affect == 1) {
                    $data[$a]->affect = 'تؤثر';
                } elseif ($row->affect == 0) {
                    $data[$a]->affect = 'لا تؤثر';
                } else {
                    $data[$a]->affect = 'غير محدد';
                }
                if (!empty($row->value) || $row->value != 0) {
                    $data[$a]->value = $row->value;
                } else {
                    $data[$a]->value = 0;
                }
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


}