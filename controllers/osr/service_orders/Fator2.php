<?php
//application/controllers/osr/service_orders/Fator2.php
class  Fator2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('osr/service_orders/Fator2_model');
    }

    public function upload_image($file_name, $folder = "images")
    {
        $config['upload_path'] = 'uploads/' . $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //$this->thumb($datafile,$folder);
            return $datafile['file_name'];
        }
    }

    public function thumb($data,$folder)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$folder.'/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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


    public function load_fator2() {
        /*osr/service_orders/Fator2/load_fator2*/

        $data['file_script'] = 'fator2';
        $mother_national_num = $_SESSION['mother_national_num'];
        $data["talabt_data"] = $this->Fator2_model->get_by('family_serv_fatora',array('mother_national_num'=>$mother_national_num));

        $data["fe2a_fatora_array"] =  array("1"=>'تسديد فاتورة المياه',"2"=> 'تسديد فاتورة الكهرباء');

        $this->load->view('osr/service_orders/fator2/load_fator2',$data);
    }

    public function form_fator2() {
        /*osr/service_orders/Fator2/form_fator2*/

        $mother_national_num = $_SESSION['mother_national_num'];
        $data['mother_national_num'] = $mother_national_num;
        $data["fe2a_fatora_array"] =  array("1"=>'تسديد فاتورة المياه',"2"=> 'تسديد فاتورة الكهرباء');
        $data["last_talab_rkm"] = $this->Fator2_model->select_last_talab_rkm();


        $id = $this->input->post('id');
        if (!empty($id)){
            $data["result"] = $this->Fator2_model->get_by('family_serv_fatora',array('id'=>$id));
        }

        $data['file_script'] = 'fator2';
        $this->load->view('osr/service_orders/fator2/form_fator2',$data);
    }
    public function index()
    {/* osr/service_orders/Fator2  */

        if ((isset($_SESSION['mother_national_num'])) && (!empty($_SESSION['mother_national_num']))) {
            $mother_national_num = $_SESSION['mother_national_num'];

            if ($this->input->post('add')) {
                $fatora_img = 'fatora_img';
                $file['fatora_img'] = $this->upload_image($fatora_img,'osr/service_orders/fator2');
                $this->Fator2_model->insert($file, $mother_national_num);
                $this->messages('success', 'تم إضافة البيانات بنجاح');
                echo 1;
                return;
            }
            $data['title'] = 'طلبات تسديد الفواتير';
            $data['file_script'] = 'fator2';
            $data['subview'] = 'osr/service_orders/fator2/fator2';
            $this->load->view('osr/osr_index', $data);

        } else {
            redirect('osr/Login_osr');
        }
    }

    public function update_fator2($id)
    {/* osr/service_orders/Fator2/update_fator2*/
        if ((isset($_SESSION['mother_national_num'])) && (!empty($_SESSION['mother_national_num']))) {
            $mother_national_num = $_SESSION['mother_national_num'];
            $data['mother_national_num'] = $mother_national_num;

            $data["fe2a_fatora_array"] =  array("1"=>'تسديد فاتورة المياه',"2"=> 'تسديد فاتورة الكهرباء');

            $data["last_talab_rkm"] = $this->Fator2_model->select_last_talab_rkm();

            if ($this->input->post('update')) {
                $fatora_img = 'fatora_img';
                $file['fatora_img'] = $this->upload_image($fatora_img,'osr/service_orders/fator2');
                $this->Fator2_model->update($id, $file);
                $this->messages('success', 'تم تعديل البيانات بنجاح');
                echo 1;
                return;

            } else {
                $data['title'] = 'طلبات تسديد الفواتير';
                $data['file_script'] = 'fator2';
                $data['subview'] = 'osr/service_orders/fator2/fator2';
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
        $this->Fator2_model->delete("family_serv_fatora", $Conditions_arr);
        $this->messages("success", "تم  الحذف بنجاح ");
        echo 1;
        return;
//        redirect('osr/Family/family_members');
    }


    public function check_fe2a(){

        $mother_national_num = $_SESSION['mother_national_num'];
        $fe2a= $this->input->post('fe2a');
        if($fe2a)
        {
            $records = $this->Fator2_model->get_by('family_serv_fatora',array('mother_national_num'=>$mother_national_num,'fe2a_fatora'=>$fe2a,'suspend'=>0));
            if(!empty($records)){

                echo 1;
            }else{

                echo 0;
            }
            return;
        }else{
            echo 0;
            return ;
        }
    }



}