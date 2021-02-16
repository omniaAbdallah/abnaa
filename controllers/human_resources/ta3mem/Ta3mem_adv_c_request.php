<?php
class Ta3mem_adv_c_request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            echo 'login';
        }
        $this->load->model("human_resources_model/ta3mem_models/Ta3mem_adv_model");
    }

    public function load_tahwel()
    {
        $type = $this->input->post('type');
        if ($type == 1) {
            $data['all'] = $this->Ta3mem_adv_model->get_all_edarat();
            $this->load->view('admin/Human_resources/ta3mem_v/adv/load_tahwel', $data);
        } else if ($type == 2) {
            $data['all'] = $this->Ta3mem_adv_model->get_all_emps(0);
            $this->load->view('admin/Human_resources/ta3mem_v/adv/load_tahwel_employee', $data);
        }
    }
//-----------------------------------------
    public function getConnection_emp()
    {
        $all_Emps = $this->Ta3mem_adv_model->get_all_edarat();
        //    $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {
                $arr_emp['data'][] = array(
                    '<input type="checkbox" name="choosed" value="' . $row_emp->id . '"
                       onclick="Get_emp_Name(this)"
                       class="checkbox  radio"
                        id="myCheck' . $row_emp->id . '"
                        data-edara_n="' . $row_emp->title . '"
                        data-edara_id="' . $row_emp->id . '"/>'
                ,
                    $row_emp->title,
                    ''
                );
            }
        }
        echo json_encode($arr_emp);
    }

    public function get_all_data()
    {
        $this->load->model("human_resources_model/ta3mem_models/Ta3mem_model");
        $id = $this->input->post('id');
        $data['records'] = $this->Ta3mem_adv_model->get_all_emp($id);
        $data['path']="uploads/human_resources/ta3mem";
        $data['one_data'] = $this->Ta3mem_model->get_attach($id);
        $data['get_all'] = $this->Ta3mem_adv_model->select_by_id($id);
        $this->load->view('admin/Human_resources/ta3mem_v/adv/getDetailsDiv', $data);
    }
    public function reply_dawa()
    {
        $this->Ta3mem_adv_model->reply_dawa();
    }
    public function check_d3wa()
    {
        $data['da3wat'] = $this->Ta3mem_adv_model->get_action_da3wa();
        //  $this->test($data['da3wat']);
        $this->load->view('admin/Human_resources/ta3mem_v/adv/da3wa_load', $data);
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    //yara23-9-2020

    private function thumb($data, $folder = '')
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        if (!empty($folder)) {
            $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }
} // END CLASS