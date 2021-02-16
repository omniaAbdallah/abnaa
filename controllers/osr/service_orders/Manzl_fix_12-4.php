<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manzl_fix extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('osr/Login_osr');
        }
        $this->load->model('osr/service_orders/Manzl_fix_model');

    }

    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                  title:"' . $text . '" ,
                  confirmButtonText: "تم"
              })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function upload_image_2($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/images';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //  $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
    }

    public function index() //osr/service_orders/Manzl_fix
    {
        $mother_national_id_fk = $_SESSION['mother_national_num'];
        //  $data['children'] = $this->Manzl_fix_model->getMotherChildren($mother_national_id_fk);
        $data['last_rkm'] = $this->Manzl_fix_model->get_last_rkm();
        $data['no3_eslah'] = $this->Manzl_fix_model->select_search_key('family_serv_setting', 'from_code', 101);
        $data['no3_trmem'] = $this->Manzl_fix_model->select_search_key('family_serv_setting', 'from_code', 201);
        $data['records'] = $this->Manzl_fix_model->selectManzl_fix($mother_national_id_fk);
        //  $this->test($data['records']);
        if ($this->input->post('add')) {

            if ($this->input->post('fe2a_type') == 1) {
                $img = 'img';
                $img_file = $this->upload_image_2($img, 'osr/service_order/fix_manzl');
            } else if ($this->input->post('fe2a_type') == 2) {
                $img = 'img_trmem';
                $img_file = $this->upload_image_2($img, 'osr/service_order/fix_manzl');
            }

            $this->Manzl_fix_model->add_Manzl_fix($img_file);
            echo 1;
            return;
            /*        messages('success','إضافة خدمة للأسرة');
                    redirect('osr/service_orders/Manzl_fix','refresh');*/
        }

        $data['file_script'] = 'manzel_fix';

        $data['title'] = '  إصلاح و ترميم المنزل';
        $data['subview'] = 'osr/service_orders/manzl_fix/manzl_fix_view';

        $this->load->view('osr/osr_index', $data);
    }

    public function editManzl_fixOrders()//osr/Manzl_fix/editManzl_fixOrders
    {
        $id = $this->input->post('id');
        $data['last_rkm'] = $this->Manzl_fix_model->get_last_rkm();
        $data['no3_eslah'] = $this->Manzl_fix_model->select_search_key('family_serv_setting', 'from_code', 101);
        $data['no3_trmem'] = $this->Manzl_fix_model->select_search_key('family_serv_setting', 'from_code', 201);
        $data['record'] = $this->Manzl_fix_model->selectManzl_fixByID($id);
        $this->load->view('osr/service_orders/manzl_fix/edite_manzl_view', $data);
    }

    public function edite()
    {
        $id = $this->input->post('id');
        if ($this->input->post('fe2a_type') == 1) {
            $img = 'img';
            $img_file = $this->upload_image_2($img, 'osr/service_order/fix_manzl');
        } else if ($this->input->post('fe2a_type') == 2) {
            $img = 'img_trmem';
            $img_file = $this->upload_image_2($img, 'osr/service_order/fix_manzl');
        }
        $this->Manzl_fix_model->edit_Manzl_fix($id, $img_file);


    }

    public function deleteManzl_fix()
    {
        $id = $this->input->post('id');

        $this->Manzl_fix_model->deleteManzl_fix($id);
        // messages('success','حذف خدمة للأسرة');

        //  redirect('osr/service_orders/Manzl_fix','refresh');

    }

    public function load_details()
    {

        $mother_national_id_fk = $_SESSION['mother_national_num'];
        $data['no3_eslah'] = $this->Manzl_fix_model->select_search_key('family_serv_setting', 'from_code', 101);
        $data['no3_trmem'] = $this->Manzl_fix_model->select_search_key('family_serv_setting', 'from_code', 201);
        $data['records'] = $this->Manzl_fix_model->selectManzl_fix($mother_national_id_fk);
        $this->load->view('osr/service_orders/manzl_fix/load_details', $data);


    }

    public function get_add()//osr/Manzl_fix/editManzl_fixOrders
    {

        $data['last_rkm'] = $this->Manzl_fix_model->get_last_rkm();
        $data['no3_eslah'] = $this->Manzl_fix_model->select_search_key('family_serv_setting', 'from_code', 101);
        $data['no3_trmem'] = $this->Manzl_fix_model->select_search_key('family_serv_setting', 'from_code', 201);
        $this->load->view('osr/service_orders/manzl_fix/edite_manzl_view', $data);
    }


}

