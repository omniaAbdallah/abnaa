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

    public function getFileNUmData($file_num)
    {
        $this->db->select('basic.file_num,basic.male_number,basic.family_members_number,basic.contact_mob,
      basic.mother_national_num  as  faher_name ,
      houses.h_house_type_id_fk ,houses.h_house_owner_id_fk ,houses.h_village_id_fk ,houses.h_center_id_fk ,houses.h_city_id_fk ,houses.h_area_id_fk ,houses.h_street ,
      father.f_national_id as  father_national,  father.full_name as father_full_name,
      mother.full_name  as  mother_name, mother.mother_national_card_new     as  mother_new_card,mother.categoriey_m as categorey,
      mother.m_marital_status_id_fk ,mother.m_relationship ,mother.m_birth_date ,mother.m_nationality ,mother.m_gender ,mother.m_mob ,
      mother.m_another_mob ,mother.m_education_level_id_fk ,mother.m_want_work ,mother.m_job_id_fk ,
      files_status_setting.title as process_title , files_status_setting.color as files_status_color ,
      SUM(case when f_members.member_gender = 1 then 1 else 0 end) as male_num,COUNT( f_members.id) as member_num');
        $this->db->from('basic');
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('houses', 'houses.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
        $this->db->where('basic.file_num', $file_num);
        $this->db->group_by('f_members.mother_national_num_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            $query['h_house_type_name'] = $this->get_by('family_setting', array('id_setting' => $query['h_house_type_id_fk']), 'title_setting');
            $query['h_house_owner_name'] = $this->get_by('family_setting', array('id_setting' => $query['h_house_owner_id_fk']), 'title_setting');
            $query['m_nationality_name'] = $this->get_by('family_setting', array('id_setting' => $query['m_nationality']), 'title_setting');
            $query['m_education_level_name'] = $this->get_by('family_setting', array('id_setting' => $query['m_education_level_id_fk']), 'title_setting');
            $query['m_relationship_name'] = $this->get_by('family_setting', array('id_setting' => $query['m_relationship']), 'title_setting');
            $query['m_marital_status_name'] = $this->get_by('family_setting', array('id_setting' => $query['m_marital_status_id_fk']), 'title_setting');
            $query['m_job_name'] = $this->get_by('family_setting', array('id_setting' => $query['m_marital_status_id_fk']), 'title_setting');
            $query['area'] = $this->get_by('area_settings', array('id' => $query["h_area_id_fk"]), 'title');
            $query['city'] = $this->get_by('area_settings', array('id' => $query["h_city_id_fk"]), 'title');
            $query['centers'] = $this->get_by('area_settings', array('id' => $query["h_center_id_fk"]), 'title');
            $query['village'] = $this->get_by('area_settings', array('id' => $query["h_village_id_fk"]), 'title');
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
        $tranning_ids = serialize($_POST['tranning_ids']);
        unset($_POST['tranning_ids']);

        $data = $_POST;
        $data['tranning_ids'] = $tranning_ids;
        $data['puplisher'] = $_SESSION['user_id'];
        $data['puplisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['date_ar'] = date('Y-m-d');
        $data['date_in'] = strtotime(date('Y-m-d'));
        $data['time_add'] = (date('H:i a'));
        $this->db->insert('osr_ektfaa_talabat', $data);
    }

    function update($id)
    {
        unset($_POST['save']);
        $tranning_ids = serialize($_POST['tranning_ids']);
        unset($_POST['tranning_ids']);
        $data = $_POST;
        $data['tranning_ids'] = $tranning_ids;
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
            return false;
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
}