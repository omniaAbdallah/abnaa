<?php


class Sarf_order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('osr/Login_osr');
        }
        $this->load->model('osr/Family_data');
        $this->load->model('osr/service_orders/Sarf_order_m');

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    function index()/*osr/service_orders/Sarf_order*/
    {
        if ($this->input->post('add')) {
//            $this->test($_POST['data']);
            $this->Sarf_order_m->insert_order_sarf();
            echo 1;
            return;
        }
        
        $data["family_data"] = $this->Family_data->basic_data($_SESSION['mother_national_num']);
        $data['asnaf']= $this->Sarf_order_m->get_asnaf();
        $data['last_talb'] = $this->Sarf_order_m->get_last_talab($_SESSION['mother_national_num']);
        $data['current_talbat'] = $this->Sarf_order_m->check_talab($_SESSION['mother_national_num']);
        $data['title'] = 'طلب خدمة عينية';
        $data['file_script'] = 'Sarf_order';
        if ($this->input->get('load')) {
            $load = $this->input->get('load');
            $this->load->view('osr/service_orders/sarf_order/sarf_order_form', $data);
        } else {
            $data['subview'] = 'osr/service_orders/sarf_order/sarf_order_form';
            $this->load->view('osr/osr_index', $data);
        }
    }

    function get_data_table()
    {
        $data['title']='طلبات خدمة عينية';
        $data['talbat'] = $this->Sarf_order_m->get_by('family_serv_order_sarf', array('mother_national_num' => $_SESSION['mother_national_num'], 'file_num' => $_SESSION['file_num']));
        $data['current_talbat'] = $this->Sarf_order_m->check_talab($_SESSION['mother_national_num']);

        $this->load->view('osr/service_orders/sarf_order/serv_sarf_order_table', $data);
    }
    function update_talab()
    {

        if ($this->input->post('add')) {
 //            $this->test($_POST['data']);
            $this->Sarf_order_m->update_order_sarf();
            echo 2;
            return;
        }
        $data['asnaf']= $this->Sarf_order_m->get_asnaf();
        $data['title']='تعديل طلب خدمة عينية';
        $talab_id = $this->input->get('talab_id');
        $data['talab_data'] = $this->Sarf_order_m->get_datiles_order($talab_id);
        $this->load->view('osr/service_orders/sarf_order/sarf_order_form', $data);
    }
    function get_details_sarf()
    {


        $talab_id = $this->input->get('talab_id');
        $data['talab_data'] = $this->Sarf_order_m->get_datiles_order($talab_id);
        $this->load->view('osr/service_orders/sarf_order/sarf_order_detailes', $data);
    }

    public function get_asnaf_data(){
        $code = $this->input->post('sanf_code');
        $data = $this->Sarf_order_m->get_asnaf_data($code);
        echo json_encode($data);
    }

    function make_delete_talab()
    {
        $talab_id = $this->input->get('talab_id');
        $this->Sarf_order_m->make_delete_talab($talab_id, $_SESSION['mother_national_num']);
        return;
    }
}