<?phpclass Family_transformation_m extends CI_Model{    public function chek_Null($post_value)    {        if ($post_value == '' || $post_value == null || (!isset($post_value))) {            $val = '';            return $val;        } else {            return strip_tags($post_value);        }    }    public function get_by($table, $where_arr = false, $select = false)    {        if (!empty($where_arr)) {            $this->db->where($where_arr);        }        $query = $this->db->get($table);        if ($query->num_rows() > 0) {            if (!empty($select) && $select != 1) {                return $query->row_array()[$select];            } else {                if ($select == 1) {                    return $query->row_array();                } else {                    return $query->result_array();                }            }        } else {            return false;        }    }   /* function basic_data($national_num)    {        $q = $this->db->select('basic.file_num,basic.id as order_num,basic.family_cat_name as osara_fe2a,basic.final_suspend,basic.osr_crm,        basic.osr_talb_mostandat,        mother.full_name as mother_name ,mother.categoriey_m,mother.mother_national_num_fk,mother.id,mother.m_mob,mother.m_marital_status_id_fk,        father.full_name as father_name,father.f_national_id')            ->from('mother')->where('mother.mother_national_num_fk', $national_num)            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk')            ->get()->row_array();        return $q;    }*/    function basic_data($national_num){    $q = $this->db->select('basic.file_num,basic.id as order_num,basic.family_cat_name as osara_fe2a,basic.final_suspend,        mother.full_name as mother_name ,mother.categoriey_m,mother.mother_national_num_fk,mother.id,mother.m_mob,mother.m_marital_status_id_fk,        father.full_name as father_name,father.f_national_id')        ->from('mother')->where('mother.mother_national_num_fk', $national_num)        ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')        ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk')        ->get()->row_array();    return $q;}    public function select_process_procedures()    {        $this->db->select('*');        $this->db->from("process_procedures");        //   $this->db->where($Conditions_arr);        $query = $this->db->get();        if ($query->num_rows() > 0) {            return $query->result();        }        return false;    }    public function get_all_egraat($code_arr = false)    {        $this->db->select('hr_egraat_setting.*');        $this->db->from('hr_egraat_setting');        if (!empty($code_arr)) {            $this->db->where_in('code', $code_arr);        }        $this->db->order_by('id', 'desc');        return $this->db->get()->result();    }    public function get_all_emps_egraat($job_title_code_fk)    {        $this->db->select('hr_egraat_emp_setting.*');        $this->db->from('hr_egraat_emp_setting');        $this->db->where_in('job_title_code_fk', $job_title_code_fk);        $this->db->where('person_suspend', 1);        $this->db->order_by('id', 'desc');        $query = $this->db->get();        if ($query->num_rows() > 0) {            $i = 0;            foreach ($query->result() as $row) {                $data[$i] = $row;                $i++;            }            return $data;        } else {            return 0;        }    }    public function get_emp($emp_id, $data_need)    {        $this->db->where('id', $emp_id);        $query = $this->db->get('employees');        if ($query->num_rows() > 0) {            return $query->row()->$data_need;        } else {            return false;        }    }    public function get_emp_user_id($emp_id, $data_need)    {        $this->db->where('emp_code', $emp_id);        $this->db->where('role_id_fk', 3);        $query = $this->db->get('users');        if ($query->num_rows() > 0) {            return $query->row()->$data_need;        } else {            return false;        }    }    public function insert_operation($process, $file_id)    {  //all_actions_in_family_files        $user_id = $this->get_emp_user_id($_POST['user_to'], 'user_id');        $emp_name = $this->get_emp($_POST['user_to'], 'employee');        $role_id_fk = $this->get_emp_user_id($_POST['user_to'], 'role_id_fk');        $data['mother_national_num_fk'] = $file_id;        if ($process == 4 || $process == 6) {            $data['family_file_from'] = $_SESSION['user_id'];            $data['family_file_to'] = $_SESSION['user_id'];        } else {            $data['family_file_from'] = $_SESSION['role_id_fk'];            $data['family_file_to'] = $role_id_fk;        }        $data['from_user'] = $_SESSION['user_id'];        $data['to_user'] = $user_id;        $data['process'] = $process;        $data['reason'] = $this->input->post('reason');        $data['date'] = strtotime(date("Y-m-d", time()));        $data['date_s'] = time();        $data['publisher'] = $_SESSION['user_name'];        $this->db->insert('operation_table', $data);    }    public function insert_tran_family($process, $file_id)    { //  user_to        $user_id = $this->get_emp_user_id($_POST['user_to'], 'user_id');        $system_structure_id_fk = $this->get_emp_user_id($_POST['user_to'], 'system_structure_id_fk');        $role_id_fk = $this->get_emp_user_id($_POST['user_to'], 'role_id_fk');        $data['family_file'] = $file_id;        $data['process'] = 1;        $data['transformation_type'] = $process;        $data['transformation_note'] = $this->input->post('reason');        $data['from_id'] = $this->chek_Null($_SESSION["user_id"]);        $data['to_id'] = $this->chek_Null($user_id);        $data['role_id_fk_from'] = $this->chek_Null($_SESSION["role_id_fk"]);        $data['role_id_fk_to'] = $this->chek_Null($role_id_fk);        $data['system_structure_id_fk_from'] = $this->chek_Null($_SESSION["system_structure_id_fk"]);        $data['system_structure_id_fk_to'] = $this->chek_Null($system_structure_id_fk);        $data['process_procedure_id_fk'] = $this->chek_Null($this->input->post('process_procedure_id_fk'));        $data['date'] = time();        $data['date_s'] = time();        $this->db->insert('transformation_process', $data);    }    public function update_file_state($file_id, $value)    {        $data["suspend"] = $value;        $data['final_suspend'] = $this->get_final_suspend($file_id);        if ($data['final_suspend'] == 4) {            $data["final_suspend"] = 4;        } else {            $data["final_suspend"] = 0;        }        $this->db->where("mother_national_num", $file_id);        $this->db->update("basic", $data);    }    public function get_final_suspend($mother_national_num_fk)    {        $h = $this->db->get_where("basic", array('mother_national_num' => $mother_national_num_fk));        $arr = $h->row_array();        return $arr['final_suspend'];    }    public function select_operation($id){        $this->db->select('transformation_process.* ,                          e_to.employee  as to_employee  ,                           e_from.employee  as from_employee,                          user_to_t.user_name  as to_user_name,                           user_from_t.user_name as from_user_name');        $this->db->from('transformation_process');        $this->db->join('users as user_to_t', 'user_to_t.user_id = transformation_process.to_id',"left");        $this->db->join('users as user_from_t', 'user_from_t.user_id = transformation_process.from_id',"left");        $this->db->join('employees as e_to', 'e_to.id = user_to_t.emp_code',"left");        $this->db->join('employees as e_from', 'e_from.id = user_from_t.emp_code',"left");        $this->db->where('family_file',$id);        $this->db->order_by("id","DESC");        $query = $this->db->get();        /* if ($query->num_rows() > 0) {             return $query->result();         }*/        if ($query->num_rows() > 0) {            //  return $query->result();            $i=0;            foreach ($query->result() as $row){                $data[$i]= $row;                if ($row->role_id_fk_to == 3){                    $data[$i]->user_name_to = $this->get_user_name('employees',array('id'=>$row->to_id),'employee');                } elseif ($row->role_id_fk_to == 1){                    $data[$i]->user_name_to = $this->get_user_name('users',array('user_id'=>$row->to_id),'user_name');                }                if ($row->role_id_fk_from == 3){                    $data[$i]->user_name_from = $this->get_user_name('employees', array('id' => $row->from_id), 'employee');                } elseif ($row->role_id_fk_from == 1) {                    $data[$i]->user_name_from = $this->get_user_name('users', array('user_id' => $row->from_id), 'user_name');                }                $i++;            }            return $data;        }        return false;    }    public function select_my_messions_file_research($id)    {        $this->db->select('transformation_process.* ,process_procedures.title as mession_title          ,mother.full_name as mother_name , basic.current_to_emp_user_id, basic.current_form_emp_user_id, basic.current_form_emp_user_name         , basic.current_to_emp_user_name, basic.mother_national_num');        $this->db->from("transformation_process");        $this->db->join('mother', 'mother.mother_national_num_fk = transformation_process.family_file', "left");        $this->db->join('process_procedures', 'process_procedures.id = transformation_process.process_procedure_id_fk', "left");        $this->db->join('basic', 'basic.mother_national_num = transformation_process.family_file', "left");        $this->db->where("basic.current_to_emp_user_id", $id);        $this->db->where("transformation_process.to_id", $id);        $this->db->where("transformation_process.transformation_type", 8);        /*        $this->db->group_by("transformation_process.family_file");*/        $this->db->where_not_in("action", array(4, 2));        $this->db->order_by("id", "DESC");        $query = $this->db->get();        if ($query->num_rows() > 0) {            return $query->result();        }        return false;    }    public function get_user_name($table, $arr, $return)    {        $this->db->where($arr);        $query = $this->db->get($table);        if ($query->num_rows() > 0) {            return $query->row()->$return;        } else {            return false;        }    }    function update_seen_basic_transform()    {        $this->db->where('current_to_user_id', $_SESSION['user_id']);        $this->db->update('basic', array('current_to_seen' => 1));        $this->db->where('to_id', $_SESSION['user_id'])->where("transformation_type!=", 8);        $this->db->update('transformation_process', array('seen' => 1));    }    function update_seen_esnad_emp()    {        $this->db->where('current_to_emp_user_id', $_SESSION['user_id']);        $this->db->update('basic', array('current_to_emp_seen' => 1));        $this->db->where('to_id', $_SESSION['user_id'])->where("transformation_type", 8);        $this->db->update('transformation_process', array('seen' => 1));    }    function esnad_emp_basic()    {        $user_id = $this->get_emp_user_id($_POST['user_to'], 'user_id');        $osr_ids = $_POST['osr_ids'];        $data['current_form_emp_user_id'] = $this->chek_Null($_SESSION["user_id"]);        $data['current_form_emp_user_name'] = $this->getUserName($_SESSION['user_id']);        $to_user = $this->get_user_data(array('users.user_id' => $user_id));        if (!empty($to_user)) {            $data['current_to_emp_user_id'] = $to_user['user_id'];            $data['current_to_emp_user_name'] = $to_user['employee'];        }        foreach ($osr_ids as $osr_id) {            $this->db->where("mother_national_num", $osr_id);            $this->db->update("basic", $data);            $this->insert_tran_family(8, $osr_id);            add_history(512, $osr_id);        }    }    function transform_basic($file_id, $process)    {        /*        $user_data = explode("-", $this->input->post('user_to'));*/        /* if ($this->input->post('user_to')) {             $user_data = explode("-", $this->input->post('user_to'));         } else {             $user_data = array(0 => $_SESSION["user_id"], 1 => $_SESSION["role_id_fk"], 2 => $_SESSION["system_structure_id_fk"]);         }*/        $user_id = $this->get_emp_user_id($_POST['user_to'], 'user_id');        $data['current_form_user_id'] = $this->chek_Null($_SESSION["user_id"]);        $data['current_form_user_name'] = $this->getUserName($_SESSION['user_id']);        $data['current_to_user_id'] = $this->chek_Null($user_id);        $to_user = $this->get_user_data(array('users.user_id' => $data['current_to_user_id']));        if (!empty($to_user)) {            $data['current_to_user_id'] = $to_user['user_id'];            $data['current_to_user_name'] = $to_user['employee'];        }        $this->db->where("mother_national_num", $file_id);        $this->db->update("basic", $data);    }    public function getUserName($user_id)    {        $sql = $this->db->where("user_id", $user_id)->get('users');        if ($sql->num_rows() > 0) {            $data = $sql->row();            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {                return $data->user_username;            } elseif ($data->role_id_fk == 2) {                $id = $data->user_name;                $table = 'magls_members_table';                $field = 'member_name';            } elseif ($data->role_id_fk == 3) {                $id = $data->emp_code;                $table = 'employees';                $field = 'employee';            } elseif ($data->role_id_fk == 4) {                $id = $data->user_name;                $table = 'general_assembley_members';                $field = 'name';            }            return $this->getUserNameByRoll($id, $table, $field);        }        return false;    }    public function getUserNameByRoll($id, $table, $field)    {        return $this->db->where('id', $id)->get($table)->row_array()[$field];    }    public function get_user_data($arr)    {        $this->db->select('users.*,employees.id as emp_id,employees.employee,employees.personal_photo,employees.degree_id');        $this->db->from('users');        $this->db->where($arr);        $this->db->join('employees', 'employees.id=users.emp_code', 'left');        $query = $this->db->get();        if ($query->num_rows() > 0) {            return $query->row_array();        } else {            return false;        }    }    function check_befor_tahwel($field){    }    public function get_RequiredFiles($id)    {        $this->db->select('*');        $this->db->where("mother_national_num_fk", $id);        $query = $this->db->get('osr_talb_mostandat');        if ($query->num_rows() > 0) {            $data = $query->row();            $data->required_files = $this->get_required_files($data->talb_mostand_id);            return $data;        }        return false;    }    public function get_required_files($id)    {        $query = $this->db->select('family_setting.id_setting,family_setting.title_setting,osr_talb_mostandat_details.*')            ->from('osr_talb_mostandat_details')            ->join('family_setting', 'family_setting.id_setting=osr_talb_mostandat_details.mostand_id')            ->where('talb_mostand_id_fk', $id)            ->get()->result_array();        return $query;    }        function esnad_emp_basic_from_dropdwon($file_id)   {       $user_id = $this->get_emp_user_id($_POST['user_to'], 'user_id');       $data['current_form_emp_user_id'] = $this->chek_Null($_SESSION["user_id"]);       $data['current_form_emp_user_name'] = $this->getUserName($_SESSION['user_id']);       $to_user = $this->get_user_data(array('users.user_id' => $user_id));       if (!empty($to_user)) {           $data['current_to_emp_user_id'] = $to_user['user_id'];           $data['current_to_emp_user_name'] = $to_user['employee'];       }       $this->db->where("mother_national_num", $file_id);       $this->db->update("basic", $data);   }}