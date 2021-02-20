<?php


class Family_transformation extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model("familys_models/Family_transformation_m");

    }

//--------------------------------------------------
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    function GetTransferPage()
    {
        $mother_national_num = $this->input->post('value');
        if ($this->input->post('id')) {
            $data['departs'] = $this->Family_transformation_m->get_all_egraat(array(802));
            $data['mowazf'] = $this->Family_transformation_m->get_all_emps_egraat(array(802));
        } else {
            $data['departs'] = $this->Family_transformation_m->get_all_egraat(array(801, 802, 803, 804));
            $data['mowazf'] = $this->Family_transformation_m->get_all_emps_egraat(array(801, 802, 803, 804));
        }
        $data['folder_path'] = 'uploads/family_attached/osr_talbat_files';
        $data['main_data'] = $this->Family_transformation_m->basic_data($mother_national_num);
        $data["select_process_procedures"] = $this->Family_transformation_m->select_process_procedures();
        $data['all_operation'] = $this->Family_transformation_m->select_operation($mother_national_num);

        $this->load->view('admin/familys_views/family_transformation/GetProcedureActionPage', $data);

    }


    function GetDepart_emps()
    {
        $id_depart = $this->input->post('id_depart');
        $data['mowazf'] = $this->Family_transformation_m->get_all_emps_egraat(array($id_depart));
        echo json_encode($data);
    }

    public function TransformationOfRegesterNew($file_id)
    {
        $process = $this->input->post('process');
        //-------------------- tranfor
        $this->Family_transformation_m->insert_tran_family($process, $file_id);
        //-------------------- operation
        $this->Family_transformation_m->insert_operation($process, $file_id);
        $this->Family_transformation_m->update_file_state($file_id, $process);

        if ($process == 3) {
            add_history(503, $file_id);
        } elseif ($process == 7) {
            add_history(507, $file_id);

        }
    }


}