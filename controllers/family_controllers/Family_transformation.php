<?phpclass Family_transformation extends CI_Controller{    public function __construct()    {        parent::__construct();        if ($this->session->userdata('is_logged_in') == 0) {            redirect('login');        }        $this->load->model("familys_models/Family_transformation_m");    }//--------------------------------------------------    private function test($data = array())    {        echo "<pre>";        print_r($data);        echo "</pre>";        die;    }    function update_seen_transform()    {        $this->Family_transformation_m->update_seen_transform();    }    function GetTransferPage()    {        $mother_national_num = $this->input->post('value');        if ($this->input->post('id')) {            $data['departs'] = $this->Family_transformation_m->get_all_egraat(array(802));            $data['mowazf'] = $this->Family_transformation_m->get_all_emps_egraat(array(802));        } else {            $data['departs'] = $this->Family_transformation_m->get_all_egraat(array(801, 802, 803, 804));            $data['mowazf'] = $this->Family_transformation_m->get_all_emps_egraat(array(801, 802, 803, 804));        }        $data['folder_path'] = 'uploads/family_attached/osr_talbat_files';        $data['main_data'] = $this->Family_transformation_m->basic_data($mother_national_num);        $data["select_process_procedures"] = $this->Family_transformation_m->select_process_procedures();        $data['all_operation'] = $this->Family_transformation_m->select_operation($mother_national_num);        $this->load->view('admin/familys_views/family_transformation/GetProcedureActionPage', $data);    }    /*  function GetTransferPage_drob_dwon()      {          $mother_national_num = $this->input->post('value');          $data['departs'] = $this->Family_transformation_m->get_all_egraat(array(801, 802, 803, 804));          $data['mowazf'] = $this->Family_transformation_m->get_all_emps_egraat(array(801, 802, 803, 804));          $data["select_process_procedures"] = $this->Family_transformation_m->select_process_procedures();          $data['all_operation'] = $this->Family_transformation_m->select_operation($mother_national_num);          $this->load->view('admin/familys_views/family_transformation/GetProcedureActionPage_drob_dwon', $data);      }*/    function GetTransferPage_drob_dwon()    {        $this->load->model('familys_models/osr_crm/Osr_crm_m');        $mother_national_num = $this->input->post('value');        $data['check_data'] = $this->Osr_crm_m->check_hdoor_bahth($mother_national_num);        $data['main_data'] = $this->Family_transformation_m->basic_data($mother_national_num);        $data['departs'] = $this->Family_transformation_m->get_all_egraat(array(801, 802, 803, 804));        $data['mowazf'] = $this->Family_transformation_m->get_all_emps_egraat(array(801, 802, 803, 804));        $data["select_process_procedures"] = $this->Family_transformation_m->select_process_procedures();        $data['all_operation'] = $this->Family_transformation_m->select_operation($mother_national_num);        $this->load->view('admin/familys_views/family_transformation/GetProcedureActionPage_drob_dwon', $data);    }    function GetTransferPage_file()    {        $data['departs'] = $this->Family_transformation_m->get_all_egraat(array(801, 802, 803, 804));        $data['mowazf'] = $this->Family_transformation_m->get_all_emps_egraat(array(801, 802, 803, 804));        $data['folder_path'] = 'uploads/family_attached/osr_talbat_files';        $data["select_process_procedures"] = $this->Family_transformation_m->select_process_procedures();        $this->load->view('admin/familys_views/family_transformation/GetProcedureActionPage_file', $data);    }    function GetDepart_emps()    {        $id_depart = $this->input->post('id_depart');        $data['mowazf'] = $this->Family_transformation_m->get_all_emps_egraat(array($id_depart));        echo json_encode($data);    }    public function TransformationOfRegesterNew($file_id)    {        /*        echo'<pre>';        print_r($_POST);        die;*/        $process = $this->input->post('process');        //-------------------- tranfor        $this->Family_transformation_m->insert_tran_family($process, $file_id);        //-------------------- operation        $this->Family_transformation_m->insert_operation($process, $file_id);        $this->Family_transformation_m->update_file_state($file_id, $process);        $this->Family_transformation_m->transform_basic($file_id, $process);        if ($process == 3) {            add_history(503, $file_id);        } elseif ($process == 7) {            add_history(507, $file_id);        }    }    function update_seen_basic_transform()    {        $this->Family_transformation_m->update_seen_basic_transform();    }    function update_seen_esnad_emp()    {        $this->Family_transformation_m->update_seen_esnad_emp();    }    function esnad_emp()    {//        $this->test($_POST);        $this->Family_transformation_m->esnad_emp_basic();    }    public function get_RequiredFiles($id)    {        $this->db->select('*');        $this->db->where("talb_mostand_id", $id);        $query = $this->db->get('osr_talb_mostandat');        if ($query->num_rows() > 0) {            $data = $query->row();            $data->required_files = $this->get_required_files($data->talb_mostand_id);            return $data;        }        return false;    }    public function get_required_files($id)    {        $query = $this->db->select('family_setting.id_setting,family_setting.title_setting,osr_talb_mostandat_details.*')            ->from('osr_talb_mostandat_details')            ->join('family_setting', 'family_setting.id_setting=osr_talb_mostandat_details.mostand_id')            ->where('talb_mostand_id_fk', $id)            ->get()->result_array();        return $query;    }    public function TransformationOfdropdwon($file_id)    {        $this->load->model('familys_models/osr_crm/Osr_crm_m');        $page = $this->input->post('page');        $user_id = $this->Family_transformation_m->get_emp_user_id($_POST['user_to'], 'user_id');        $this->Family_transformation_m->esnad_emp_basic_from_dropdwon($file_id);        if ($page == 1) {            add_history(616, $file_id);            $this->Osr_crm_m->send_review_to($file_id,$user_id);        } elseif ($page == 2) {            add_history(616, $file_id);            $this->Osr_crm_m->send_bahth_to($file_id,$user_id);        }    }}