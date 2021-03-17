<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical_center extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('osr/Login_osr');
        }

        $this->load->model('osr/service_orders/Medical_center_model');


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


    public function Check_talab()
    {

        $mother_national_num = $_SESSION['mother_national_num'];
        $records = $this->Medical_center_model->get_by('family_serv_medical_center', array('mother_national_id_fk' => $mother_national_num, 'approved' => 0));
        if (!empty($records)) {

            echo 1;
        } else {

            echo 0;
        }
        return;

    }


    public function load_medical_center()
    {
        /*osr/service_orders/medical/load_medical_center*/

        $data['file_script'] = 'medical_center';
        $mother_national_num = $_SESSION['mother_national_num'];

        $data['records'] = $this->Medical_center_model->selectMedical_center($mother_national_num);
/*$data['test']= $this->Medical_center_model->get_by('family_serv_medical_center');
$this->test($data);*/

        $this->load->view('osr/service_orders/medical/load_medical_center', $data);
    }

    public function form_medical_center()
    {
        /*osr/service_orders/medical/form_medical_center*/

        $mother_national_num = $_SESSION['mother_national_num'];
        $data['mother_national_num'] = $mother_national_num;

        $data["last_talab_rkm"] = $this->Medical_center_model->select_last_talab_rkm();
        $data['all_disease_type'] = $this->Medical_center_model->get_by('family_setting', array("type" => 35));

        $data["children"] = $this->Medical_center_model->get_by('f_members', array('mother_national_num_fk' => $mother_national_num));

        $id = $this->input->post('id');
        if (!empty($id)) {
            $data["result"] = $this->Medical_center_model->get_by('family_serv_medical_center', array('id' => $id));
            $data["member_card_num"] = $this->Medical_center_model->get_by('f_members', array('id' => $data["result"][0]->person_id_fk), 'member_card_num');
        }

        $data['file_script'] = 'medical_center';
        $this->load->view('osr/service_orders/medical/form_medical_center', $data);
    }

    public function index()
    {/* osr/service_orders/Medical_center  */

        if ((isset($_SESSION['mother_national_num'])) && (!empty($_SESSION['mother_national_num']))) {
            $mother_national_id_fk = $_SESSION['mother_national_num'];
            $data['mother_national_num'] = $mother_national_id_fk;

            if ($this->input->post('add')) {
/*                $this->test($_POST);*/
                $this->Medical_center_model->add_medical($mother_national_id_fk);
                echo 1;
                return;
                //redirect('osr/service_orders/Medical_center','refresh');
            }
            $data['file_script'] = 'medical_center';
            $data['title'] = 'التحويل لمركز طبي';
            $data['subview'] = 'osr/service_orders/medical/medical_center';
            $this->load->view('osr/osr_index', $data);


        } else {
            redirect('osr/Login_osr');
        }
    }

    public function update_medical_center($id)
    {/* osr/service_orders/medical/update_medical_center*/

        if ((isset($_SESSION['mother_national_num'])) && (!empty($_SESSION['mother_national_num']))) {

            if ($this->input->post('update')) {
                $this->Medical_center_model->edit_medical($id);
                $this->messages('success', 'تم تعديل البيانات بنجاح');
                echo 1;
                return;

            } else {

                $data['file_script'] = 'medical_center';
                $data['title'] = 'التحويل لمركز طبي';
                $data['subview'] = 'osr/service_orders/medical/medical_center';
                $this->load->view('osr/osr_index', $data);
            }
        } else {
            echo 0;
            return;
        }
    }

    public function delete($id)
    {
        $Conditions_arr = array("id" => $id);
        $this->Medical_center_model->delete("family_serv_medical_center", $Conditions_arr);
        $this->messages("success", "تم  الحذف بنجاح ");
        echo 1;
        return;

    }
    /*public function deleteElectronic_card($id)
	{


    $this->Medical_center_model->deleteMedical_center($id);
            messages('success','حذف خدمة للأسرة');

            redirect('osr/service_orders/Medical_center','refresh');

    }*/


}
