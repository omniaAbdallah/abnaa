<?php

class Talb_mariage_help extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model("familys_models/talbat_m/Talb_mariage_help_model");
        $this->load->model("Difined_model");
    }

//--------------------------------------------------
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

//-----------------------------------------

    public function get_osra_last_date()
    {
        $data['osra_in'] = $this->Talb_mariage_help_model->get_osra_in_last_date($_POST['file_num']);
        if ($data['osra_in'] != '') {
            $this->load->view('admin/familys_views/talbat_v/marriage/get_osra_last_date', $data);
        }
    }

    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/family_attached/osr_talbat_marriage_help/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
} // END CLASS