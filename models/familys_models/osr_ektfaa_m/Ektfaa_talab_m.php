<?php

class Ektfaa_talab_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_family_table()
    {
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
        $this->db->where('basic.final_suspend', 4);
        $this->db->where('basic.deleted', 0);
        $this->db->where('basic.file_status', 1);
        $this->db->order_by('file_num', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getFileNUmData($file_num,$id)
    {
        $this->db->select('basic.file_num,basic.male_number,basic.family_members_number,basic.contact_mob,
      basic.mother_national_num  as  faher_name ,
      houses.h_house_type_id_fk ,houses.h_house_owner_id_fk ,houses.h_village_id_fk ,houses.h_center_id_fk ,houses.h_city_id_fk ,houses.h_area_id_fk ,houses.h_street ,
      father.f_national_id as  father_national,  father.full_name as father_full_name,
      mother.full_name  as  full_name, mother.mother_national_card_new     as  national_card,mother.categoriey_m as categorey,
      mother.m_marital_status_id_fk as marital_status_id_fk ,mother.m_relationship as relationship,mother.m_birth_date as birth_date ,mother.m_nationality as nationality 
      ,mother.m_gender  as gender,mother.m_mob as mob,
      mother.m_another_mob as another_mob ,mother.m_education_level_id_fk  as education_level_id_fk,mother.m_want_work  as want_work,mother.m_job_id_fk as job_id_fk ,
      files_status_setting.title as process_title , files_status_setting.color as files_status_color ,
      SUM(case when f_members.member_gender = 1 then 1 else 0 end) as male_num,COUNT( f_members.id) as member_num');
        $this->db->from('basic');
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('houses', 'houses.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
        $this->db->where('basic.file_num', $file_num);
        $this->db->where('mother.id', $id);

        $this->db->group_by('f_members.mother_national_num_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            $query['h_house_type_name'] = $this->get_by('family_setting', array('id_setting' => $query['h_house_type_id_fk']), 'title_setting');
            $query['h_house_owner_name'] = $this->get_by('family_setting', array('id_setting' => $query['h_house_owner_id_fk']), 'title_setting');
            $query['m_nationality_name'] = $this->get_by('family_setting', array('id_setting' => $query['nationality']), 'title_setting');
            $query['m_education_level_name'] = $this->get_by('family_setting', array('id_setting' => $query['education_level_id_fk']), 'title_setting');
            $query['m_relationship_name'] = $this->get_by('family_setting', array('id_setting' => $query['relationship']), 'title_setting');
            $query['m_marital_status_name'] = $this->get_by('family_setting', array('id_setting' => $query['marital_status_id_fk']), 'title_setting');
            $query['m_job_name'] = $this->get_by('family_setting', array('id_setting' => $query['marital_status_id_fk']), 'title_setting');
            $query['area'] = $this->get_by('area_settings', array('id' => $query["h_area_id_fk"]), 'title');
            $query['city'] = $this->get_by('area_settings', array('id' => $query["h_city_id_fk"]), 'title');
            $query['centers'] = $this->get_by('area_settings', array('id' => $query["h_center_id_fk"]), 'title');
            $query['village'] = $this->get_by('area_settings', array('id' => $query["h_village_id_fk"]), 'title');


            return $query;
        } else {
            return false;
        }
    }
    public function getFilememberData($file_num,$id)
    {
        $this->db->select('basic.file_num,basic.male_number,basic.family_members_number,basic.contact_mob,
      basic.mother_national_num  as  faher_name ,
      houses.h_house_type_id_fk ,houses.h_house_owner_id_fk ,houses.h_village_id_fk ,houses.h_center_id_fk ,houses.h_city_id_fk ,houses.h_area_id_fk ,houses.h_street ,
      father.f_national_id as  father_national,  father.full_name as father_full_name,
      f_members.member_full_name  as  full_name, f_members.member_card_num     as  national_card, f_members.categoriey_member as categorey,
      f_members.member_status as marital_status_id_fk ,f_members.member_relationship as relationship,f_members.member_birth_date as birth_date ,f_members.member_nationality as nationality 
      ,f_members.member_gender  as gender,f_members.member_mob as mob,
      mother.m_another_mob as another_mob ,f_members.member_education_level  as education_level_id_fk,f_members.member_job  as job_id_fk,
      files_status_setting.title as process_title , files_status_setting.color as files_status_color ,
      SUM(case when f_members.member_gender = 1 then 1 else 0 end) as male_num,COUNT( f_members.id) as member_num');
        $this->db->from('basic');
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('houses', 'houses.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
        $this->db->where('basic.file_num', $file_num);
        $this->db->where('f_members.id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            $query['h_house_type_name'] = $this->get_by('family_setting', array('id_setting' => $query['h_house_type_id_fk']), 'title_setting');
            $query['h_house_owner_name'] = $this->get_by('family_setting', array('id_setting' => $query['h_house_owner_id_fk']), 'title_setting');
            $query['m_nationality_name'] = $this->get_by('family_setting', array('id_setting' => $query['nationality']), 'title_setting');
            $query['m_education_level_name'] = $this->get_by('family_setting', array('id_setting' => $query['education_level_id_fk']), 'title_setting');
            $query['m_relationship_name'] = $this->get_by('family_setting', array('id_setting' => $query['relationship']), 'title_setting');
            $query['m_marital_status_name'] = $this->get_by('family_setting', array('id_setting' => $query['marital_status_id_fk']), 'title_setting');
            $query['m_job_name'] = $this->get_by('family_setting', array('id_setting' => $query['marital_status_id_fk']), 'title_setting');
            $query['area'] = $this->get_by('area_settings', array('id' => $query["h_area_id_fk"]), 'title');
            $query['city'] = $this->get_by('area_settings', array('id' => $query["h_city_id_fk"]), 'title');
            $query['centers'] = $this->get_by('area_settings', array('id' => $query["h_center_id_fk"]), 'title');
            $query['village'] = $this->get_by('area_settings', array('id' => $query["h_village_id_fk"]), 'title');


            return $query;
        } else {
            return false;
        }
    }

    public function getFilememberData_2($file_num)
    {
        $this->db->select('basic.file_num,basic.male_number,basic.family_members_number,basic.contact_mob,
      basic.mother_national_num  as  faher_name ,
      houses.h_house_type_id_fk ,houses.h_house_owner_id_fk ,houses.h_village_id_fk ,houses.h_center_id_fk ,houses.h_city_id_fk ,houses.h_area_id_fk ,houses.h_street ,
      father.f_national_id as  father_national,  father.full_name as father_full_name,
      f_members.member_full_name  as  full_name, f_members.member_card_num     as  national_card, f_members.categoriey_member as categorey,
      f_members.member_status as marital_status_id_fk ,f_members.member_relationship as relationship,f_members.member_birth_date as birth_date ,f_members.member_nationality as nationality 
      ,f_members.member_gender  as gender,f_members.member_mob as mob,
      mother.m_another_mob as another_mob ,f_members.member_education_level  as education_level_id_fk,f_members.member_job  as job_id_fk,
      files_status_setting.title as process_title , files_status_setting.color as files_status_color ,
      SUM(case when f_members.member_gender = 1 then 1 else 0 end) as male_num,COUNT( f_members.id) as member_num');
        $this->db->from('basic');
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('houses', 'houses.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
        $this->db->where('basic.file_num', $file_num);
        // $this->db->where('f_members.id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            $query['h_house_type_name'] = $this->get_by('family_setting', array('id_setting' => $query['h_house_type_id_fk']), 'title_setting');
            $query['h_house_owner_name'] = $this->get_by('family_setting', array('id_setting' => $query['h_house_owner_id_fk']), 'title_setting');
            $query['m_nationality_name'] = $this->get_by('family_setting', array('id_setting' => $query['nationality']), 'title_setting');
            $query['m_education_level_name'] = $this->get_by('family_setting', array('id_setting' => $query['education_level_id_fk']), 'title_setting');
            $query['m_relationship_name'] = $this->get_by('family_setting', array('id_setting' => $query['relationship']), 'title_setting');
            $query['m_marital_status_name'] = $this->get_by('family_setting', array('id_setting' => $query['marital_status_id_fk']), 'title_setting');
            $query['m_job_name'] = $this->get_by('family_setting', array('id_setting' => $query['marital_status_id_fk']), 'title_setting');
            $query['area'] = $this->get_by('area_settings', array('id' => $query["h_area_id_fk"]), 'title');
            $query['city'] = $this->get_by('area_settings', array('id' => $query["h_city_id_fk"]), 'title');
            $query['centers'] = $this->get_by('area_settings', array('id' => $query["h_center_id_fk"]), 'title');
            $query['village'] = $this->get_by('area_settings', array('id' => $query["h_village_id_fk"]), 'title');


            return $query;
        } else {
            return false;
        }
    }

    public function get_member($file_num)
    {
        $this->db->select('mother.full_name  as  mother_name,mother.id  as  mother_id,f_members.member_full_name  as  member_name,f_members.id  as  member_id');
        $this->db->from('basic');
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->where('basic.file_num', $file_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->result_array();
            return $query;
        } else {
            return false;
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
                return $query->row_array()[$select];
            } else {
                if ($select == 1) {
                    return $query->row_array();
                } else {
                    return $query->result_array();
                }
            }
        } else {
            return false;
        }
    }

    function insert()
    {
        unset($_POST['save']);
        unset($_POST['page']);
        $tranning_ids=null;
        if ($this->input->post('tranning_ids')) {
            $tranning_ids = serialize($_POST['tranning_ids']);
            unset($_POST['tranning_ids']);
        }
        $data = $_POST;
        $data['tranning_ids'] = $tranning_ids;
        $data['puplisher'] = $_SESSION['user_id'];
        $data['puplisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['date_ar'] = date('Y-m-d');
        $data['date_in'] = strtotime(date('Y-m-d'));
        $data['time_add'] = (date('H:i a'));
        $this->db->insert('osr_ektfaa_talabat', $data);
        return $this->db->insert_id();
    }

    function update($id)
    {
        unset($_POST['save']);
        unset($_POST['page']);
        $tranning_ids = null;
        if ($this->input->post('tranning_ids')) {
            $tranning_ids = serialize($_POST['tranning_ids']);
            unset($_POST['tranning_ids']);
        }
        $data = $_POST;
        $data['tranning_ids'] = $tranning_ids;
        if (!empty($this->input->post('facebook'))) {
            $data['facebook'] = $this->input->post('facebook');

        }
        if (!empty($this->input->post('webpage'))) {
            $data['webpage'] = $this->input->post('webpage');
        }
        if (!empty($this->input->post('twitter'))) {
            $data['twitter'] = $this->input->post('twitter');
        }
        if (!empty($this->input->post('snapchat'))) {
            $data['snapchat'] = $this->input->post('snapchat');
        }
        if (!empty($this->input->post('instgram'))) {
            $data['instgram'] = $this->input->post('instgram');
        }
        $this->db->where('id', $id)->update('osr_ektfaa_talabat', $data);
    }

    function Delete($id)
    {
        $this->db->where('id', $id)->delete('osr_ektfaa_talabat');
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
                $table = 'md_all_magls_edara_members';
                $field = 'mem_name';
            } elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            } elseif ($data->role_id_fk == 4) {
                $id = $data->user_name;
                $table = 'md_all_gam3ia_omomia_members';
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

    function make_query($postData)
    {
        // Set orderable column fields
        $column_order = array(null, 'osr_ektfaa_talabat.date_ar', 'osr_ektfaa_talabat.file_num', 'mother.full_name', null);
        // Set searchable column fields
        $column_search = array('osr_ektfaa_talabat.date_ar', 'osr_ektfaa_talabat.file_num', 'mother.full_name');
        // Set default order
        $order = array('id' => 'decs');
        $this->db->select('osr_ektfaa_talabat.date_ar,osr_ektfaa_talabat.id,basic.file_num,basic.contact_mob,
      basic.mother_national_num   ,mother.full_name  as  mother_name, mother.mother_national_card_new     as  mother_new_card,mother.categoriey_m as categorey, ');
        $this->db->from('osr_ektfaa_talabat');
        $this->db->join('basic', 'basic.file_num = osr_ektfaa_talabat.file_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");

        $i = 0;
        // loop searchable columns
        foreach ($column_search as $item) {
            // if datatable send POST for search
            if ($postData['search']['value']) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }
                // last loop
                if (count($column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if (isset($postData['order'])) {
            $this->db->order_by($column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }

    // make_query_new
    function make_query_new($postData)
    {
        // Set orderable column fields
        $column_order = array(null, 'osr_ektfaa_talabat.date_ar', 'osr_ektfaa_talabat.file_num', 'mother.full_name', null);
        // Set searchable column fields
        $column_search = array('osr_ektfaa_talabat.date_ar', 'osr_ektfaa_talabat.file_num', 'mother.full_name');
        // Set default order
        $order = array('id' => 'decs');
        $this->db->select('osr_ektfaa_talabat.date_ar,osr_ektfaa_talabat.id,basic.file_num,basic.contact_mob,
      basic.mother_national_num   ,mother.full_name  as  mother_name, mother.mother_national_card_new     as  mother_new_card,mother.categoriey_m as categorey, ');
        $this->db->from('osr_ektfaa_talabat');
        $this->db->join('basic', 'basic.file_num = osr_ektfaa_talabat.file_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->where('osr_ektfaa_talabat.action', null);
        $i = 0;
        // loop searchable columns
        foreach ($column_search as $item) {
            // if datatable send POST for search
            if ($postData['search']['value']) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }
                // last loop
                if (count($column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if (isset($postData['order'])) {
            $this->db->order_by($column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }

    public function getRows($postData)
    {

        $this->make_query($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getRows_new($postData)
    {

        $this->make_query_new($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->result_array();
        } else {
            return array();
        }
    }

    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from('osr_ektfaa_talabat');

        return $this->db->count_all_results();
    }

    function make_datatables()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data($postData)
    {
        $this->make_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function fetch_single_data($main_id)
    {
     /*   $project_type = array(1 => 'تجاري', 2 => "خدمي", 3 => "اسر منتجة");
        $tranning_type = array(1 => 'المحاسبة', 2 => "إدارة المشاريع", 3 => " مهارات البيع والتسويق", 4 => 'دورة التجميل', 5 => "صناعة العطور", 6 => "خياطة ", 7 => "إعداد مأكولات ");
        $project_states = array(1 => 'جديد', 2 => "قائم اقل من سنتين", 3 => "قائم اكثر من سنتين ");*/

        $this->db->where("id", $main_id);
        $query = $this->db->get('osr_ektfaa_talabat')->row_array();

        $query['type_project_name'] = $this->get_by('osr_ektfaa_setting', array('code' => $query['type_project']), 'title');
        $query['project_states_name'] = $this->get_by('osr_ektfaa_setting', array('code' => $query['project_states']), 'title');


        /*     if (key_exists($query['type_project'], $project_type)) {
                 $query['type_project_name'] = $project_type[$query['type_project']];
             } else {
                 $query['type_project_name'] = '';
             }
             if (key_exists($query['project_states'], $project_states)) {
                 $query['project_states_name'] = $project_states[$query['project_states']];
             } else {
                 $query['project_states_name'] = '';
             }*/
        $tranning_ids = unserialize($query['tranning_ids']);
        $query['tranning_type_name'] = '';
        if (!empty($tranning_ids) && is_array($tranning_ids)) {
            foreach ($tranning_ids as $tranning_id) {
                $query['tranning_type_name'] = $query['tranning_type_name'] . '- ' . $this->get_by('osr_ektfaa_setting', array('code' => $tranning_id), 'title');
                /*      if (key_exists($tranning_id, $tranning_type)) {
                          $query['tranning_type_name']  =$query['tranning_type_name']. '- ' .$tranning_type[$tranning_id];
                  }*/
            }
        }


        return $query;
    }


    // get_all_data_accept
   public function getFileNUmData_2($file_num)
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


           return $query;
       } else {
           return false;
       }
   }
   public function add_interview_date($id)
   {
       $data['determine_mo2bla'] = 1;
       $data['mo2bla_type'] = $this->input->post('mo2bla_type');
       $data['determine_mo2bla_date'] = $this->input->post('determine_mo2bla_date');
       $data['determine_mo2bla_time'] = $this->input->post('determine_mo2bla_time');
       $data['action'] = 'accept';
       $data['action_time'] = date('H:i:s a');
       $data['action_date'] = date('Y-m-d');
       $data['action_publisher'] = $_SESSION['user_id'];
       $data['action_publisher_name'] = $this->getUserName($_SESSION['user_id']);
       $this->db->where('id', $id)->update('osr_ektfaa_talabat', $data);
   }

//    add_reason_refuse
    public function add_reason_refuse($id)
    {
        $data['action'] = 'refuse';
        $data['reason_refuse'] = $this->input->post('reason_refuse');
        $data['action_time'] = date('H:i:s a');
        $data['action_date'] = date('Y-m-d');
        $data['action_publisher'] = $_SESSION['user_id'];
        $data['action_publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->where('id', $id)->update('osr_ektfaa_talabat', $data);
    }
    //yara31-1-2021
    // get_all_data_accept
    public function insert_data()
    {
        $data['talb_id_fk'] = $this->input->post('talb_id_fk');
        $data['file_num'] = $this->input->post('file_num');
        $data['date'] = date("Y-m-d");
        $data['time'] = date("H:i:s");
        $data['date_s'] = strtotime(date("Y-m-d"));
        $data['puplisher'] = $_SESSION['user_id'];
         $data['puplisher_name'] = $this->getUserName($_SESSION['user_id']);
         $this->db->insert('osr_ektfaa_evaluation',$data);
        $evaluation_order_id= $this->db->insert_id();
        if(!empty($this->input->post('branch_id_fk')))
        {
    $count=count($this->input->post('branch_id_fk'));
            for($x=0; $x<$count;$x++)
            {
                $data2['evaluate_id_fk']=$evaluation_order_id;
                $data2['file_num']=$this->input->post('file_num');
              $data2['band_id_fk']=$this->input->post('branch_id_fk')[$x];
              $data2['band_name']=$this->input->post('branch_name')[$x];
                $data2['degree']=$this->input->post('degree')[$x];
                $this->db->insert('osr_ektfaa_evaluation_details',$data2);
            }
        }
    }
    // update_data
    public function update_data($id)
    {

        $this->db->where('evaluate_id_fk',$id)->delete('osr_ektfaa_evaluation_details');

        if(!empty($this->input->post('branch_id_fk')))
        {
    $count=count($this->input->post('branch_id_fk'));
            for($x=0; $x<$count;$x++)
            {
                $data2['evaluate_id_fk']=$id;
                $data2['file_num']=$this->input->post('file_num');
                $data2['degree']=$this->input->post('degree')[$x];
                $data2['band_id_fk']=$this->input->post('branch_id_fk')[$x];
              $data2['band_name']=$this->input->post('branch_name')[$x];
                $this->db->insert('osr_ektfaa_evaluation_details',$data2);
            }
        }
    }

    function get_all_data_accept()
    {
        $this->db->select("*");
        $this->db->from('osr_ektfaa_talabat');
        $this->db->where('determine_mo2bla', 1);
        $this->db->where('action', 'accept');
        return $this->db->get()->result();
    }

    function get_all_data_refuse()
    {
        $this->db->select("*");
        $this->db->from('osr_ektfaa_talabat');
        $this->db->where('determine_mo2bla', 1);
        $this->db->where('action', 'refuse');
        return $this->db->get()->result();
    }

    public function get_from($id)
    {
        $this->db->where('band_type', $id);
        $this->db->where('from_code', 501);
        $this->db->order_by('id', 'ASc');
        $query = $this->db->get('osr_ektfaa_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    public function get_all_emp()
    {
       return $this->db->get('employees')->result();
    }
    public function get_all_evaluations($id)
    {
        $query=$this->db->where('talb_id_fk',$id)->get('osr_ektfaa_evaluation');

        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->details = $this->get_one_details($row->id,$row->file_num);
                $x++;
            }
            return $data;
        }
            return false;
    }

    public function get_one_details($id, $file_num)
    {
        $this->db->where('evaluate_id_fk', $id);
        //  $this->db->where('file_num',$file_num);
        $query = $this->db->get('osr_ektfaa_evaluation_details');
        if ($query->num_rows() > 0) {

            return $query->result();
        }
        return false;
    }

    /////////////////////attaches///////////////
    public function get_by_attach($table)
    {

        $query = $this->db->select('*')->get($table);
        if ($query->num_rows() > 0) {

            return $query->result();

        } else {
            return false;
        }
    }

    ////////////////////////insert_attach/////////
    public function insert_attach($id, $file_array)
    {
        if (!empty($file_array)) {

            foreach ($file_array as $key => $value) {

                if ($value != '') {

                    $data[$key] = $value;
                }
            }
        }

        $this->db->where('id', $id)->update('osr_ektfaa_talabat', $data);
    }

    public function getAllDetails($id)
    {
        $this->db->select('*');
        $this->db->from("osr_ektfaa_talabat");
        $this->db->where('id', $id);
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

    public function insert_attach_talb($id, $all_img)
    {


        if (!empty($all_img)) {
            $img_count = count($all_img);
            $title = $this->input->post('title');

            for ($a = 0; $a < $img_count; $a++) {
                $files['talb_id_fk'] = $id;
                $files['file'] = $all_img[$a];
                $files['date'] = date("Y-m-d");
                $this->db->insert('osr_ektfaa_talabat_attaches', $files);
            }

        }


    }

    public function get_attach($id)
    {
        $this->db->where('talb_id_fk', $id);
        $query = $this->db->get('osr_ektfaa_talabat_attaches');
        if ($query->num_rows() > 0) {
            return $query->result();
        }

    }

    public function delete_attach($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('osr_ektfaa_talabat_attaches');
    }

}