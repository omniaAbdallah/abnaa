<?php
//application/controllers/osr/service_orders/Aghza_athath.php
class  Aghza_athath extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('osr/service_orders/Aghza_athath_model');
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


    public function check_fe2a(){

        $mother_national_num = $_SESSION['mother_national_num'];
        $fe2a= $this->input->post('fe2a');
        if($fe2a)
        {
            $records = $this->Aghza_athath_model->get_by('family_serv_aghza_athath',array('mother_national_num'=>$mother_national_num,'fe2a_talab'=>$fe2a,'suspend'=>0));
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


    public function fe2a_talab_sub(){

        $from_id= $this->input->post('from_id');
        if($from_id)
        {
            $records = $this->Aghza_athath_model->get_fe2a_talab_sub($from_id);
            if(!empty($records)){

                $html[]= '<option value=""> إختر</option>';

                foreach ($records as $record){
                    $html[] ='<option value="'.$record->id.'"> '.$record->name.'</option>';

                }
                echo implode(" ",$html);

            }
            return;
        }else{
            $html[]= '<option value=""> إختر</option>';
            echo implode(" ",$html);
            return ;
        }
    }

    public function load_aghza_athath() {
        /*osr/service_orders/Aghza_athath/load_aghza_athath*/


        $data['file_script'] = 'aghza_athath';
        $mother_national_num = $_SESSION['mother_national_num'];
        $data["talabt_data"] = $this->Aghza_athath_model->get_by('family_serv_aghza_athath',array('mother_national_num'=>$mother_national_num));


        $data["fe2a_talab_array"] =  array("2"=>'طلب جهاز جديد',"31"=> 'طلب صيانة جهاز', "6"=>'طلب أثاث جديد');
        $data['sub_fe2a_talab_array'] =$this->Aghza_athath_model->array_all_sub_fe2a_talab();

        $this->load->view('osr/service_orders/aghza_athath/load_aghza_athath',$data);
    }

    public function form_aghza_athath() {
        /*osr/service_orders/Aghza_athath/form_aghza_athath*/

        $mother_national_num = $_SESSION['mother_national_num'];
        $data['mother_national_num'] = $mother_national_num;
        $data["fe2a_talab_array"] =  array("2"=>'طلب جهاز جديد',"31"=> 'طلب صيانة جهاز', "6"=>'طلب أثاث جديد');
        $data["last_talab_rkm"] = $this->Aghza_athath_model->select_last_talab_rkm();

        $id = $this->input->post('id');
        if (!empty($id)){
            $data["result"] = $this->Aghza_athath_model->get_by('family_serv_aghza_athath',array('id'=>$id));
            $data["sub_fe2a_talab_no3"] = $this->Aghza_athath_model->get_fe2a_talab_sub($data["result"][0]->fe2a_talab);
        }

        $data['file_script'] = 'aghza_athath';
        $this->load->view('osr/service_orders/aghza_athath/form_aghza_athath',$data);
    }
    public function index()
    {/* osr/service_orders/Aghza_athath  */

         if ((isset($_SESSION['mother_national_num'])) && (!empty($_SESSION['mother_national_num']))) {
            $mother_national_num = $_SESSION['mother_national_num'];

            if ($this->input->post('add')) {
                $img = 'img';
                //osr/service_order/aghza_athath
                $file['img'] = $this->upload_image($img,'osr/service_orders/aghza_athath');
                $this->Aghza_athath_model->insert($file, $mother_national_num);
                $this->messages('success', 'تم إضافة البيانات بنجاح');
                echo 1;
                return;
            }
            $data['title'] = 'طلبات الاجهزة الكهربية - الأثاث';
            $data['file_script'] = 'aghza_athath';
            $data['subview'] = 'osr/service_orders/aghza_athath/aghza_athath';
            $this->load->view('osr/osr_index', $data);

        } else {
            redirect('osr/Login_osr');
        }
    }

    public function update_aghza_athath($id)
    {/* osr/service_orders/Aghza_athath/update_aghza_athath*/
        if ((isset($_SESSION['mother_national_num'])) && (!empty($_SESSION['mother_national_num']))) {
            $mother_national_num = $_SESSION['mother_national_num'];
            $data['mother_national_num'] = $mother_national_num;
            $data["fe2a_talab_array"] =  array("2"=>'طلب جهاز جديد',"31"=> 'طلب صيانة جهاز', "6"=>'طلب أثاث جديد');

            $data["last_talab_rkm"] = $this->Aghza_athath_model->select_last_talab_rkm();

            if ($this->input->post('update')) {
                $img = 'img';
                $file['img'] = $this->upload_image($img,'osr/service_orders/aghza_athath');
                $this->Aghza_athath_model->update($id, $file);
                $this->messages('success', 'تم تعديل البيانات بنجاح');
                echo 1;
                return;

            } else {

                $data['title'] = 'طلبات الاجهزة الكهربية - الأثاث';
                $data['file_script'] = 'aghza_athath';
                $data['subview'] = 'osr/service_orders/aghza_athath/aghza_athath';
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
        $this->Aghza_athath_model->delete("family_serv_aghza_athath", $Conditions_arr);
        $this->messages("success", "تم  الحذف بنجاح ");
        echo 1;
        return;
//        redirect('osr/Family/family_members');
    }


}