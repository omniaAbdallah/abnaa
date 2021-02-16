<?php

class Talb_syana_house extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model("familys_models/talbat_m/Talb_syana_house_model");
    }

//--------------------------------------------------
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    public function get_osra_last_date()
    {
        $data['osra_in'] = $this->Talb_syana_house_model->get_osra_in_last_date($_POST['file_num']);
        if ($data['osra_in'] != '') {
            $this->load->view('admin/familys_views/talbat_v/syana_house/get_osra_last_date', $data);
        }
    }

    function getRent()
    {
        $mother_national_num = $this->input->post('mother_national_num');
        $house_owner_id_fk = $this->input->post('house_owner_id_fk');
        $contract_end_date = $this->Talb_syana_house_model->get_by('houses', array('mother_national_num_fk' => $mother_national_num), 'contract_end_date');
        echo json_encode($contract_end_date);
    }
    function get_house_data()
    {
        $mother_national_num = $this->input->post('mother_national_num');
        $house_data = $this->Talb_syana_house_model->get_by('houses', array('mother_national_num_fk' => $mother_national_num), '1');
        echo json_encode($house_data);
    }

} // END CLASS