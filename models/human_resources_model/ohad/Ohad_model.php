<?php
class Ohad_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val="";
            return $val;
        }else{
            return $post_value;
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

    public function delete_ohad($id){
        $this->db->where('id',$id);
        $this->db->delete("emp_ohad");
    }

/*
  public function select_all_devices(){
        $this->db->select("*");
        $this->db->from('emp_ohad_device');
        $this->db->where('from_code',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
                $query2 = $this->db->query("SELECT * FROM `emp_ohad_device` WHERE `from_code`=".$row->code);
                if ($query->num_rows() > 0) {
                    foreach ($query2->result() as $row2) {
                        $data[$row2->code] = $row2;
                        $query3 = $this->db->query("SELECT * FROM `emp_ohad_device` WHERE `from_code`=".$row2->code);
                        if ($query3->num_rows() > 0) {

                            foreach ($query3->result() as $row3) {
                                $data[$row3->code] = $row3;
                                $query4 = $this->db->query("SELECT * FROM `emp_ohad_device` WHERE `from_code`=".$row3->code);
                                if ($query4->num_rows() > 0) {
                                    foreach ($query4->result() as $row4) {
                                        $data[$row4->code] = $row4;
                                        $query5 = $this->db->query("SELECT * FROM `custody_devices` WHERE `from_code`=".$row4->code);
                                        if ($query5->num_rows() > 0) {
                                            foreach ($query5->result() as $row5) {

                                                $data[$row5->code] = $row5;
                                            }}


                                    }}

                            }
                        }

                    }

                }

            }
            return $data;
        }
  }

*/


    public function select_all_main_devices(){
        $this->db->select("*");
        $this->db->from('emp_ohad_device');
        $this->db->where('from_code',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->code] = $row->title;
            }
            return $data;
        }
    }
    public function array_all_sub_devices()
    {
        $this->db->select('*');
        $this->db->from('emp_ohad_device');
        $this->db->where('from_code!=',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->code] = $row->title;
            }
            return $data;
        }else{
            return 0;
        }

    }
    public function select_all_sub_devices($code)
    {
        $this->db->select('*');
        $this->db->from('emp_ohad_device');
        $this->db->where('from_code',$code);
        $query = $this->db->get();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                // $data[$i]->sub_devices = $this->get_sub_devices(array('from_id'=>$row->id));
                $i++;
            }
            return $data;
        }else{
            return 0;
        }

    }

    public function getEmpData($emp_id)
    {
        return $this->db->where('id',$emp_id)->get('employees')->row_array();
    }

    public function insert($emp_code, $estlam_date=''){
            $data['emp_code']=$emp_code;
            $data['main_device_code']=$this->chek_Null( $this->input->post('main_device_code'));
            $data['sub_device_code']=$this->chek_Null( $this->input->post('sub_device_code'));
            if(!empty($estlam_date)){
                $data['estlam_date']= $estlam_date;
            }else{
                $data['estlam_date']= $this->input->post('estlam_date');
            }
            $data['device_status']=$this->chek_Null( $this->input->post('device_status'));
            $data['device_num']=$this->chek_Null($this->input->post('device_num'));
            $data['date']= date('Y-m-d');
            $data['it_own']= 1;
            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']= $this->getUserName($_SESSION['user_id']);
            $this->db->insert('emp_ohad',$data);

            $this->insert_tahwlat($emp_code);
    }

    public function update_emp_ohad($id)
    {
        $data['it_own'] = 0;
        $this->db->where('id',$id);
        $this->db->update('emp_ohad',$data);

    }
    public function insert_tahwlat($to_emp_code){

        $data['from_emp_code']= $this->input->post('from_emp_code');
        $data['to_emp_code']  = $to_emp_code;
        $data['main_device_code']= $this->chek_Null($this->input->post('main_device_code'));
        $data['sub_device_code']= $this->chek_Null( $this->input->post('sub_device_code'));
        $data['tahwel_date']= $this->input->post('tahwel_date');
        $data['device_status']=$this->chek_Null( $this->input->post('device_status'));
        $data['device_num']=$this->chek_Null($this->input->post('device_num'));
        $data['date']= date('Y-m-d');
        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']= $this->getUserName($_SESSION['user_id']);
        $this->db->insert('emp_ohad_tahwlat',$data);

    }


    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 ) {
                return $data->user_username;
            }  elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;

    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }

    public function getEmpData_exp($emp_id)
    {
        $this->db->select('employees.emp_code,employees.id,employees.employee');
        $this->db->from("employees");
        $this->db->where('employees.id !=',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data=$query->result();$i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $i++;
            }
            return $data;
        }
        return false;
    }


    public function all_tahwlat_ohad($emp_code)
    {

        $this->db->select('emp_ohad_tahwlat.*')
            ->from('emp_ohad_tahwlat')
            ->where('emp_ohad_tahwlat.from_emp_code',$emp_code);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;

                $data[$i]->from_emp_name = $this->Ohad_model->get_by('employees',array('emp_code'=>$row->from_emp_code),'employee');
                $data[$i]->to_emp_name = $this->Ohad_model->get_by('employees',array('emp_code'=>$row->to_emp_code),'employee');
                $i++;
            }
            return $data;
        }
        return false;
    }



//////////////////////////////////////// new  nagwa //////////////////////





    public function get_emp_data($emp_code)
    {

        $employee_type_arr = array(1 => 'نشط', 2 => 'موقوف',0=>'لم تحدد');
        $contract_type_arr = array('عقد غير محدد المدة', 'عقد محدد المدة');
        $work_types = array("1" => "فترة", "2" => "فترتين");
        $due_period = array('360' => 'سنة', '720' => 'سنتين');
        $paid_type = array("2" => "شيك", "3" => "تحويل بنكي");

        $q = $this->db->select('*')
            ->where('emp_code', $emp_code)
            ->get('employees')
            ->row();
        $q->name = $q->employee;
        $q->img = $q->personal_photo;
        $q->edara = $this->get_edara_name_or_qsm($q->administration);
        $q->department_n = $this->get_edara_name_or_qsm($q->department);
        $q->job = $this->get_job_title($q->degree_id);

        $q->job = $this->get_job_title($q->degree_id);
        $q->manager_name = $this->get_direct_manager_name_by_emp_id($q->id)->manager_name;

        if(key_exists($q->employee_type,$employee_type_arr)){
            $q->employee_type_title = $employee_type_arr[$q->employee_type];
        }else{
            $q->employee_type_title = 'لم تحدد';

        }
        if(key_exists($q->contract,$contract_type_arr)){
            $q->contract_type_title = $contract_type_arr[$q->contract];
        }else{
            $q->contract_type_title = 'لم تحدد';

        }
        $q->employee_degree_title = $this->get_data_table('employees_settings', array('type' => 14, 'id_setting' => $q->employee_degree), 'title_setting');
        $q->gender_n = $this->get_data_table('employees_settings', array('type' => 1, 'id_setting' => $q->gender), 'title_setting');
        $q->nationality_n = $this->get_data_table('employees_settings', array('type' => 2, 'id_setting' => $q->nationality), 'title_setting');
        $q->deyana_n = $this->get_data_table('employees_settings', array('type' => 3, 'id_setting' => $q->deyana), 'title_setting');
        $q->status_n = $this->get_data_table('employees_settings', array('type' => 4, 'id_setting' => $q->status), 'title_setting');
        $q->type_card_n = $this->get_data_table('employees_settings', array('type' => 5, 'id_setting' => $q->type_card), 'title_setting');
        $q->dest_card_n = $this->get_data_table('employees_settings', array('type' => 6, 'id_setting' => $q->dest_card), 'title_setting');
//        $q->work_maktb_n = $this->get_data_table('employees_settings', array('type' => 12, 'id_setting' => $q->work_maktb), 'title_setting');

        $q->city_n = $this->get_data_table('cities', array('id' => $q->city_id_fk), 'name');
        $q->hai_n = $this->get_data_table('cities', array('id' => $q->hai_id_fk), 'name');


        $q->employee_qualification_title = $this->get_data_table('employees_settings', array('type' => 15, 'id_setting' => $q->employee_qualification), 'title_setting');
        $q->work_maktb_title = $this->get_data_table('employees_settings', array('type' => 12, 'id_setting' => $q->work_maktb), 'title_setting');
        $q->tamin_company_title = $this->get_data_table('employees_settings', array('type' => 7, 'id_setting' => $q->tamin_company), 'title_setting');
        $q->tamin_type_title = $this->get_data_table('employees_settings', array('type' => 8, 'id_setting' => $q->tamin_type), 'title_setting');

        $q->cat_manager_title = $this->get_data_table('hr_main_cat', array('id' => $q->cat_manager_id_fk), 'name');
        $q->finance_Data = $this->get_finance_Data($q->id);
        $q->my_always = $this->get_my_always_times($q->id);
        $q->files = $this->get_emp_files($q->id);
        $q->banks = $this->getEmpBank($q->id);

        $q->contract_employe = $this->get_data_table('contract_employe', array('emp_code' => $q->emp_code));
        if (!empty($q->contract_employe)) {
            $q->contract_nature_title = $this->get_data_table('employees_settings', array('type' => 10, 'id_setting' => $q->contract_employe->contract_nature), 'title_setting');
            $q->job_type_title = $this->get_data_table('hr_forms_settings', array('type' => 2, 'id_setting' => $q->contract_employe->job_type), 'title_setting');

            if(key_exists($q->contract_employe->work_period_id_fk,$work_types)){
                $q->work_period_title = $work_types[$q->contract_employe->work_period_id_fk];
            }else{
                $q->work_period_title = 'لم تحدد';

            }
            if(key_exists($q->contract_employe->year_vacation_period,$due_period)){
                $q->year_vacation_period_title = $due_period[$q->contract_employe->year_vacation_period];
            }else{
                $q->year_vacation_period_title = 'لم تحدد';

            }
            if(key_exists($q->contract_employe->pay_method_id_fk,$paid_type)){
                $q->pay_method_title = $paid_type[$q->contract_employe->pay_method_id_fk];
            }else{
                $q->pay_method_title = 'لم تحدد';

            }

        }



        return $q;

    }

    public function get_edara_name_or_qsm($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return false;
        }
    }

    public function get_job_title($id)
    {

        $this->db->where('defined_id', $id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        } else {
            return false;
        }
    }

    public function get_direct_manager_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id,
        manager_table.employee as manager_name,manager_table.emp_code as manager_code');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_data_table($table, $where_arr, $return_filed = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $q = $this->db->get($table);
        if ($q->num_rows() > 0) {
            if (!empty($return_filed)) {
                return $q->row()->$return_filed;
            } elseif (!empty($where_arr)) {
                return $q->row();

            } else {
                return $q->result();
            }
        } else {
            return false;
        }

    }

    public function get_finance_Data($emp_id)
    {
        $data = array();
        $data['badlat'] = $this->getEmp_Badalat($emp_id, 1);
        $data['get_having_value'] = $this->get_sum_value($emp_id, $this->getBadalat_id(1));
        $data['get_discut_value'] = $this->get_sum_value($emp_id, $this->getBadalat_id(2));
        $data['tamin_value'] = $this->get_tamin_value($emp_id, $this->getBadalat_id(1));
        return $data;

    }

    public function get_sum_value($emp_code, $ids)
    {
        $this->db->where_in('badl_discount_id_fk', $ids);
        $this->db->where('emp_code', $emp_code);
        $this->db->select_sum('value');
        $result = $this->db->get('emp_badlat_discount_details');
        if ($result->num_rows() > 0) {
            return $result->row()->value;
        } else {
            return 0;
        }


    }

    public function get_tamin_value($emp_code, $ids)
    {
        $this->db->where_in('badl_discount_id_fk', $ids);
        $this->db->where('emp_code', $emp_code);
        $this->db->where('insurance_affect', 1);
        $this->db->select_sum('value');
        $result = $this->db->get('emp_badlat_discount_details');
        if ($result->num_rows() > 0) {
            return $result->row()->value;
        } else {
            return 0;
        }


    }

    public function getEmp_Badalat($emp_code, $type)
    {

        $query2 = $this->db->where('emp_code', $emp_code)->get('emp_badlat_discount_details');
        if ($query2->num_rows() > 0) {
            $data_ids = array();
            foreach ($query2->result() as $row) {
                $data_ids[] = $row->badl_discount_id_fk;
            }
        } else {
            return 0;
        }
        $this->db->where_in('id', $data_ids);
        $this->db->order_by('in_order', 'asc');

        $query = $this->db->get('emp_badlat_discount_settings')->result();
        $x = 0;
        $data = array();
        foreach ($query as $row) {
            $data[$x] = $row;
            $data[$x]->badalat = $this->get_badalat_order_by($emp_code, $row->id);
            $x++;

        }
        return $data;

    }

    public function get_badalat_order_by($emp_code, $id)
    {
        $arr = array('emp_code' => $emp_code, 'badl_discount_id_fk' => $id);
        $this->db->where($arr);
        return $this->db->get('emp_badlat_discount_details')->row();
    }

    public function getBadalat_id($type)
    {
        $query = $this->db->where('type', $type)->get('emp_badlat_discount_settings')->result();
        $data = array();
        $x = 0;
        foreach ($query as $row) {
            $data[] = $row->id;
            $x++;
        }
        return $data;
    }

    public function get_my_always_times($emp_id){
        $this->db->select('emp_always_times.*,
                           always_setting.id as always_setting_id ,always_setting.name');
        $this->db->from("emp_always_times");
        $this->db->join('always_setting', 'always_setting.id = emp_always_times.always_id_fk','left');
        $this->db->where("emp_id",$emp_id);
        $this->db->group_by('always_id_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;$data =$query->result();
            foreach ($query->result() as $row) {
                $data[$x]->period_num = $this->get_period_num($row->always_id_fk,$emp_id);
                $x++;
            }
            return $data;
        }
        return false ;
    }
    public function get_period_num($always_id_fk,$emp_id){
        $this->db->select('*');
        $this->db->from("emp_always_times");
        $this->db->where("always_id_fk",$always_id_fk);
        $this->db->where("emp_id",$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false ;
    }

    public function get_emp_files($emp_code)
    {
        $query = $this->db->where('emp_code', $emp_code)->get('emp_files');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;

                $i++;

            }
            return $data;
        }
        return false;
    }

    public function getEmpBank($emp_code)
    {
        return $this->db->select('bank_employes_details.*, banks_settings.bank_code,banks_settings.title')
            ->join('banks_settings', 'banks_settings.id=bank_employes_details.bank_id_fk')
            ->where('emp_code', $emp_code)
            ->get('bank_employes_details')
            ->result();
    }












}// END CLASS