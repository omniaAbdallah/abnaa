<?php


class Serv_hij_omra extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('osr/Login_osr');
        }
        $this->load->model('osr/Family_data');
        $this->load->model('osr/service_orders/Serv_hij_omra_m');

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function index()
    { /*osr/service_orders/Serv_hij_omra*/

        if ($this->input->post('add')) {
//            $this->test($_POST['data']);
            $this->Serv_hij_omra_m->insert_hij_omra();
            echo 1;
            return;
        }

        $data["family_data"] = $this->Family_data->basic_data($_SESSION['mother_national_num']);
        $data["member_data"] = $this->Family_data->member_data($_SESSION['mother_national_num']);
//        $this->test($data);

        $data['title'] = 'طلب خدمة جح/ عمرة';
        $data['file_script'] = 'Serv_hij_omra';
        if ($this->input->get('load')) {
            $load = $this->input->get('load');
            $this->load->view('osr/service_orders/serv_hij_omra_views/serv_hij_omra_form', $data);
        } else {
            $data['subview'] = 'osr/service_orders/serv_hij_omra_views/serv_hij_omra_form';
            $this->load->view('osr/osr_index', $data);
        }


    }

    public function update_talab()
    {

        if ($this->input->post('add')) {
//            $this->test($_POST['data']);
            $this->Serv_hij_omra_m->update_hij_omra();
            echo 2;
            return;
        }

        $data["family_data"] = $this->Family_data->basic_data($_SESSION['mother_national_num']);
        $data["member_data"] = $this->Family_data->member_data($_SESSION['mother_national_num']);
        $talab_id = $this->input->get('talab_id');
        $data["talab_data"] = $this->Serv_hij_omra_m->get_talab_data($talab_id, $_SESSION['mother_national_num']);
//        $this->test($data);
        $data['talab_id'] = $talab_id;
        $data['title'] = 'طلب خدمة جح/ عمرة';
        $data['file_script'] = 'Serv_hij_omra';
        $data['subview'] = 'osr/service_orders/serv_hij_omra_views/serv_hij_omra_form';
        $this->load->view('osr/service_orders/serv_hij_omra_views/serv_hij_omra_form', $data);
    }

    function get_last_talab()
    {
        $fe2a_talab = $this->input->get('fe2a_talab');
        $data['last_talb'] = $this->Serv_hij_omra_m->get_last_talab($fe2a_talab, $_SESSION['mother_national_num']);
        $data['current_talbat'] = $this->Serv_hij_omra_m->check_talab($fe2a_talab, $_SESSION['mother_national_num']);
        echo json_encode($data);
    }

    function make_delete_talab()
    {
        $talab_id = $this->input->get('talab_id');
        $this->Serv_hij_omra_m->make_delete_talab($talab_id, $_SESSION['mother_national_num']);

        return;
    }

    function get_data_table()
    {
        $data['talbat'] = $this->Serv_hij_omra_m->get_by('family_serv_hij_omra', array('mother_national_num' => $_SESSION['mother_national_num'], 'file_num' => $_SESSION['file_num']));
        $this->load->view('osr/service_orders/serv_hij_omra_views/serv_hij_omra_table', $data);
    }
    function get_member()
    {
        $talab_id = $this->input->get('talab_id');

        $data['member_data'] = $this->Serv_hij_omra_m->get_member($talab_id);
        $this->load->view('osr/service_orders/serv_hij_omra_views/serv_hij_omra_table', $data);
    }
}