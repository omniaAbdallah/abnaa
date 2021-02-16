<?phpclass Basic_data_model extends CI_Model{    public function __construct()    {        parent::__construct();    }    public function select_my_employee_edara($edara_id)    {        $this->db->order_by("emp_code", "asc");        $this->db->where("qsm_id", $edara_id);        $this->db->where("id !=", $_SESSION['emp_code']);        $query = $this->db->get('employees')->result();        $data = array();        $x = 0;        foreach ($query as $row) {            $data[$x] = $row;            $x++;        }        return $data;    }    public function select_all_employee()    {        $this->db->order_by("emp_code", "asc");        $this->db->where("id !=", $_SESSION['emp_code']);        $query = $this->db->get('employees')->result();        $data = array();        $x = 0;        foreach ($query as $row) {            $data[$x] = $row;            $x++;        }        return $data;    }    public function get_by_options($table, $where_arr = false, $select = false)    {        if (!empty($where_arr)) {            $this->db->where($where_arr);        }        $query = $this->db->get($table);        if ($query->num_rows() > 0) {            if (!empty($select) && $select != 1) {                return $query->row()->$select;            } else {                if ($select == 1) {                    return $query->row();                } else {                    return $query->result();                }            }        } else {            return false;        }    }    /*19-8-20-om*/    function count_all_accept()    {        $solaf = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 1)->where_in('suspend', array(4))->get('hr_solaf')->row_array()['count'];        $agzat = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 1)->where_in('suspend', array(4))->get('hr_all_agzat_orders')->row_array()['count'];        $mandate = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 1)->where_in('suspend', array(4))->get('hr_mandate_orders')->row_array()['count'];        $ozonat = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 1)->where_in('suspend', array(4))->get('hr_all_ozonat_orders')->row_array()['count'];        $count = $solaf + $agzat + $mandate + $ozonat;        return $count;    }    function count_all_talabat()    {        $solaf = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 0)->where_in('suspend', array(0, 1))->get('hr_solaf')->row_array()['count'];        $agzat = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 0)->where_in('suspend', array(0, 1))->get('hr_all_agzat_orders')->row_array()['count'];        $mandate = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 0)->where_in('suspend', array(0, 1))->get('hr_mandate_orders')->row_array()['count'];        $ozonat = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 0)->where_in('suspend', array(0, 1))->get('hr_all_ozonat_orders')->row_array()['count'];        $count = $solaf + $agzat + $mandate + $ozonat;        return $count;    }    function count_all_refuce()    {        $solaf = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 2)->where_in('suspend', array(2, 5))->get('hr_solaf')->row_array()['count'];        $agzat = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 2)->where_in('suspend', array(2, 5))->get('hr_all_agzat_orders')->row_array()['count'];        $mandate = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 2)->where_in('suspend', array(2, 5))->get('hr_mandate_orders')->row_array()['count'];        $ozonat = $this->db->select('COUNT(id) as count')->where('emp_id_fk', $_SESSION['emp_code'])->where('action_moder_final', 2)->where_in('suspend', array(2, 5))->get('hr_all_ozonat_orders')->row_array()['count'];        $count = $solaf + $agzat + $mandate + $ozonat;        return $count;    }    /*22-8-20-om*/    function get_emp_methali()    {        $data = $this->db->where(array('status' => 1))->order_by('id', ' DESC')->get('hr_emp_methali')->row_array();        $data['count'] = $this->db->select('*,COUNT(id) as count ')->where(array('status' => 1))->get('hr_emp_methali')->row_array()['count'];        $data['emp_img'] = $this->Basic_data_model->get_by_options('employees', array('id' => $data['emp_id']), 'personal_photo');        return $data;    }    /*24-8-20-om*/    public function all_holidays()    {        $emp_data=$this->get_by_options('employees',array('id'=>$_SESSION['emp_code']),1);        $this->db->select('*');        $this->db->from('holiday_setting');        $this->db->order_by("id", "desc");        $this->db->where('id <=',2);        $query = $this->db->get()->result();        if (!empty($query)) {            foreach ($query as $key => $item) {                if ($item->id == 1) {                    $query[$key]->agzat = $this->get_days_vacation_cousal_by_vid($emp_data->emp_code, $item->id);                } elseif ($item->id == 2) {                    $query[$key]->agzat = $this->get_days_vacation_year($emp_data->emp_code, $item->id);                } else {                    $query[$key]->agzat = $this->get_days_vacation_by_vid($emp_data->emp_code, $item->id);                }            }            return $query;        }        return false;    }public function get_days_vacation_year($emp_id, $vac_id, $end_vaction = false){    $q = $this->db->select('emp_code,vacation_start_ar,vacation_previous_balance,year_vacation_num,vacation_start_m')        ->where('emp_code', $emp_id)        ->get('contract_employe')->row();    $q->vDays = $this->get_days_pervious($q->emp_code, $vac_id, $q->vacation_start_m);    if (empty($end_vaction)) {        $end_vaction = date('Y-m-d');    }    if (strtotime($end_vaction) > strtotime($q->vacation_start_m)) {        $date1 = new DateTime($q->vacation_start_m);        $date2 = new DateTime($end_vaction);        $interval = $date1->diff($date2);        $year_vacation = ($q->year_vacation_num);        $q->month_vacation = $year_vacation / 12;        $q->year = $interval->y;        $q->month = $interval->m + ($interval->y * 12);        $q->ava_days = round((($q->month_vacation * $q->month) - $q->vDays) + $q->vacation_previous_balance);        $q->num_days = round((($q->month_vacation * $q->month)) + $q->vacation_previous_balance);/*15-9-20-om*///            $q->num_days = $year_vacation + $q->vacation_previous_balance;/*15-9-20-om*/    } else {        $q->ava_days = 0;    }    return $q;}    //get vacaytion for vacation year /*   public function get_days_vacation_year($emp_id, $vac_id, $end_vaction = false)    {        $q = $this->db->select('emp_code,vacation_start_ar,vacation_previous_balance,year_vacation_num,vacation_start_m')            ->where('emp_code', $emp_id)            ->get('contract_employe')->row();        $q->vDays = $this->get_days_pervious($q->emp_code, $vac_id, $q->vacation_start_m);        if (empty($end_vaction)) {            $end_vaction = date('Y-m-d');        }        if (strtotime($end_vaction) > strtotime($q->vacation_start_m)) {            $date1 = new DateTime($q->vacation_start_m);            $date2 = new DateTime($end_vaction);            $interval = $date1->diff($date2);            $year_vacation = ($q->year_vacation_num);            $q->month_vacation = $year_vacation / 12;            $q->year = $interval->y;            $q->month = $interval->m + ($interval->y * 12);            $q->ava_days = round((($q->month_vacation * $q->month) - $q->vDays) + $q->vacation_previous_balance);        } else {            $q->ava_days = 0;        }        return $q;    }*/    public function get_days_pervious($emp_code, $vac_id, $current_year = 0)    {        $this->db->select(' SUM(hr_all_agzat_orders.num_days) as vDays')            ->where('emp_code_fk', $emp_code)            ->where('no3_agaza', $vac_id)             ->where('year', date('Y'))            ->where('suspend', 4);        if ($current_year != 0) {            if (strlen($current_year) > 4) {                $this->db->where('agaza_from_date >=', strtotime($current_year));            } else {                $this->db->group_start();                $this->db->like('hr_all_agzat_orders.agaza_to_date_m', $current_year)                    ->like('hr_all_agzat_orders.agaza_from_date_m', $current_year);                $this->db->group_end();            }        }        $q = $this->db->get('hr_all_agzat_orders')->row()->vDays;        if (!empty($q)) {            return $q;        } else {            return 0;        }    }//get vacation for spacial vacation   /* public function get_days_vacation_by_vid($emp_code, $vac_id)    {        $q = $this->db->select('max_days')            ->where('id', $vac_id)            ->get('holiday_setting')->row();        $q->vDays = $this->get_days_pervious($emp_code, $vac_id);        $q->ava_days = ($q->max_days - $q->vDays);        return $q;    }*/public function get_days_vacation_by_vid($emp_code, $vac_id){    $q = $this->db->select('max_days')        ->where('id', $vac_id)        ->get('holiday_setting')->row();    $q->vDays = $this->get_days_pervious($emp_code, $vac_id);    $q->ava_days = ($q->max_days - $q->vDays);    $q->num_days = ($q->max_days );/*15-9-20-om*/    return $q;}   /* public function get_days_vacation_cousal_by_vid($emp_id, $vac_id)    {        $q = $this->db->select('casual_vacation_num, emp_code')//            ->from("employees")            ->where('emp_code', $emp_id)//            ->join('contract_employe', 'contract_employe.emp_code  = employees.emp_code')            ->get('contract_employe')->row();        $q->vDays = $this->get_days_pervious($q->emp_code, $vac_id);        $q->ava_days = ($q->casual_vacation_num - $q->vDays);        return $q;    }*/public function get_days_vacation_cousal_by_vid($emp_id, $vac_id){    $q = $this->db->select('casual_vacation_num, emp_code')        ->where('emp_code', $emp_id)        ->get('contract_employe')->row();    $q->vDays = $this->get_days_pervious($q->emp_code, $vac_id);    $q->ava_days = ($q->casual_vacation_num - $q->vDays);    $q->num_days = ($q->casual_vacation_num );/*15-9-20-om*/    return $q;}public function all_agaza(){    $date=date('Y-m-d');    $this->db->select('*');    $this->db->from('hr_all_agzat_orders');        $query = $this->db->where('agaza_from_date_m<=',$date)->where('agaza_to_date_m>=',$date)->get()->result();        $data = array();    $x = 0;    if (!empty($query)) {              foreach ($query as $row) {                    $data[$x] = $row;                    $data[$x]->emp_name=$this->get_by_options('employees',array('id'=>$row->emp_id_fk),1)->employee;                    $data[$x]->no3_agza=$this->get_by_options('holiday_setting',array('id'=>$row->no3_agaza),1)->name;                    $x++;                }        return $data;    }    return false;}public function all_ezn(){    $date=date('Y-m-d');    $this->db->select('*');    $this->db->from('hr_all_ozonat_orders');    $query = $this->db->where('ezn_date_ar',$date)->get()->result();    $data = array();    $x = 0;    if (!empty($query)) {              foreach ($query as $row) {            $data[$x] = $row;            $data[$x]->emp_name=$this->get_by_options('employees',array('id'=>$row->emp_id_fk),1)->employee;                     $x++;        }return $data;    }    return false;}public function all_mandate(){    $date=date('Y-m-d');    $this->db->select('*');    $this->db->from('hr_mandate_orders');    $query = $this->db->where('from_date<=',$date)->where('to_date>=',$date)->get()->result();    $data = array();    $x = 0;    if (!empty($query)) {           foreach ($query as $row) {            $data[$x] = $row;            $data[$x]->emp_name=$this->get_by_options('employees',array('id'=>$row->emp_id_fk),1)->employee;            $x++;        }return $data;    }    return false;}function get_user_data($user_id){    return $this->db->where('user_id', $user_id)->get('users')->row_array();}function edit_profile($emp_sign_file, $img_file){    $data = array();    $data_user['user_username'] = $this->input->post('user_username');    $data_user['user_name'] = $this->input->post('user_username');    if ($this->input->post('user_pass')) {        $data_user['user_pass'] = sha1(md5($this->input->post('user_pass')));        $data_user['pass_demo'] = sha1(md5($this->input->post('user_pass')));    }    if ($img_file != '') {        $data['personal_photo'] = $img_file;        $data_user['emp_photo'] = $data['personal_photo'];        $data_user['user_phone'] = $data['personal_photo'];    }    if ($emp_sign_file != '') {        $data_user['emp_sign'] = $emp_sign_file;        $data['emp_sign'] = $emp_sign_file;    }    $this->db->where('user_id', $_SESSION['user_id']);    $this->db->update('users', $data_user);    if (!empty($data)) {        $this->db->where('id', $_SESSION['emp_code']);        $this->db->update('employees', $data);    }}function get_emp_tataw3(){    $t3mem = $this->db->select('hr_emp_tataw3.*,hr_emp_tataw3_details.*')        ->from("hr_emp_tataw3_details")        ->join('hr_emp_tataw3', 'hr_emp_tataw3_details.tataw3_id_fk=hr_emp_tataw3.id')        ->where('hr_emp_tataw3.publish_tataw3', 1)        ->where('hr_emp_tataw3.close_publish_tataw3', 0)        ->where('emp_id', $_SESSION['emp_code'])        ->where('seen', null)        ->get()->result();    if (!empty($t3mem)) {        $query = $t3mem;        return $query;    }}}