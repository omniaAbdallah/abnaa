<?php

class Namazeg extends MY_Controller

{

    public function __construct()

    {

        parent::__construct();

        $this->load->library('pagination');

        if ($this->session->userdata('is_logged_in') == 0) {

            redirect('login');

        }

        $this->load->model('familys_models/for_dash/Counting');

        $this->count_basic_in = $this->Counting->get_basic_in_num();

        $this->files_basic_in = $this->Counting->get_files_basic_in();

        $this->load->helper(array('url', 'text', 'permission', 'form'));

        /**********************************************************/

        /*************************************************************/

        $this->load->model("human_resources_model/employee_forms/namazeg_models/Namazeg_model");

        $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');

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

    private function current_hjri_year()

    {

        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));

        $TDays = round($time / (60 * 60 * 24));

        $HYear = round($TDays / 354.37419);

        $Remain = $TDays - ($HYear * 354.37419);

        $HMonths = round($Remain / 29.531182);

        $HDays = $Remain - ($HMonths * 29.531182);

        $HYear = $HYear + 1389;

        $HMonths = $HMonths + 10;

        $HDays = $HDays + 23;

        if ($HDays > 29.531188 and round($HDays) != 30) {

            $HMonths = $HMonths + 1;

            $HDays = Round($HDays - 29.531182);

        } else {

            $HDays = Round($HDays);

        }

        if ($HMonths > 12) {

            $HMonths = $HMonths - 12;

            $HYear = $HYear + 1;

        }

        $NowDay = $HDays;

        $NowMonth = $HMonths;

        $NowYear = $HYear;

        $MDay_Num = date("w");

        if ($MDay_Num == "0") {

            $MDay_Name = "الأحد";

        } elseif ($MDay_Num == "1") {

            $MDay_Name = "الإثنين";

        } elseif ($MDay_Num == "2") {

            $MDay_Name = "الثلاثاء";

        } elseif ($MDay_Num == "3") {

            $MDay_Name = "الأربعاء";

        } elseif ($MDay_Num == "4") {

            $MDay_Name = "الخميس";

        } elseif ($MDay_Num == "5") {

            $MDay_Name = "الجمعة";

        } elseif ($MDay_Num == "6") {

            $MDay_Name = "السبت";

        }

        $NowDayName = $MDay_Name;

        $NowDate = $MDay_Name . "، " . $HDays . "/" . $HMonths . "/" . $HYear . " هـ";

        return $HYear;

    }

//--------------------------------------------------

//  private function upload_muli_file($input_name){

//         $filesCount = count($_FILES[$input_name]['name']);

//         for ($i = 0; $i < $filesCount; $i++) {

//             $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];

//             $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];

//             $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];

//             $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];

//             $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];

//             $all_img[] = $this->upload_all_file("userFile");

//         }

//         return $all_img;

//     }

    public function read_file($file_name)

    {

        $this->load->helper('file');

        $file_path = 'uploads/human_resources/nmazg/nmazg_letter_attaches/'.$file_name;

        header('Content-Type: application/pdf');

        header('Content-Discription:inline; filename="'.$file_name.'"');

        header('Content-Transfer-Encoding: binary');

        header('Accept-Ranges:bytes');

        header('Content-Length: ' . filesize($file_path));

        readfile($file_path);

    }

    private function upload_image($file_name, $folder = "human_resources/nmazg/nmazg_letter_attaches")

    {

        $config['upload_path'] = 'uploads/' . $folder;

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';

        // $config['max_size']    = '1024*8';

        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_name)) {

            return false;

        } else {

            $datafile = $this->upload->data();

            $this->thumb($datafile);

            return $datafile['file_name'];

        }

    }

    private function thumb($data)

    {

        $config['image_library'] = 'gd2';

        $config['source_image'] = $data['full_path'];

        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];

        $config['create_thumb'] = TRUE;

        $config['maintain_ratio'] = TRUE;

        $config['thumb_marker'] = '';

        $config['width'] = 275;

        $config['height'] = 250;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();

    }

//-----------------------------------------------

    private function upload_file($file_name)

    {

        $config['upload_path'] = 'uploads/human_resources/nmazg/nmazg_letter_attaches';

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

        // $config['max_size']    = '1024*8';

        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name'] = true;

        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_name)) {

            return false;

        } else {

            $datafile = $this->upload->data();

            return $datafile['file_name'];

        }

    }

    private function upload_all_files($file_name, $folder = "human_resources/nmazg/nmazg_letter_attaches")

    {

        $config['upload_path'] = 'uploads/' . $folder;

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_name)) {

            return false;

        } else {

            $datafile = $this->upload->data();

            return $datafile['file_name'];

        }

    }

    public function read_attached_file($file_name)

    {

        $this->load->helper('file');

        $file_path = 'uploads/human_resources/nmazg/nmazg_letter_attaches/' . $file_name;

        header('Content-Type: application/pdf');

        header('Content-Discription:inline; filename="' . $file_name . '"');

        header('Content-Transfer-Encoding: binary');

        header('Accept-Ranges:bytes');

        header('Content-Length: ' . filesize($file_path));

        readfile($file_path);

    }

//-------------------------------------------------

    private function url()

    {

        unset($_SESSION['url']);

        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

    }

//-----------------------------------------

public function message($type, $text, $method = false)

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

    //-----------------------------------------

    public function index(){     // human_resources/employee_forms/namazegs/Namazeg

        $data['geha_table'] =$this->Namazeg_model->select_family_letter_setting();

        $data['letter_number'] =$this->Namazeg_model->select_last_id();

        $data['records'] =$this->Namazeg_model->select_all();

        $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);

        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);

        $data['letters_type_arr']=$this->Difined_model->select_all("hr_nmazg_letter_setting","","","","");

        $data['title']='نموذج تعريف موظف';

        //

        $data['emp_data'] = $this->Namazeg_model->select_depart();

        //



      

    

        $data['subview'] = 'admin/Human_resources/employee_forms/namazeg/namazeg';

        $this->load->view('admin_index', $data);

        

    }

    

    

    public function aa(){

        

      echo  $original_string = 'شهد الجمعية الخيرية لرعاية الأيتام ببريده (أبناء) بأن الموضحة بياناته أعلاه يعمل بالجمعية من تاريخ';

      echo '<br/>';

//$limited_string = word_limiter($original_string , 4, '');

 $rest_of_string = trim(str_replace('تاريخ', "", $original_string));



$sentence = $original_string; 

$string = '1-1-2020 '; 

$position = '180'; 

  

echo substr_replace( $sentence, $string, $position, 0 ); 







    }

    

        public function all_talabat(){     // human_resources/employee_forms/namazegs/Namazeg/all_talabat

        

        



        

       // $data['geha_table'] =$this->Namazeg_model->select_family_letter_setting();

     //   $data['letter_number'] =$this->Namazeg_model->select_last_id();

        $data['all_talabat_comming'] =$this->Namazeg_model->select_all_talabat('no');

        $data['all_talabat_done'] =$this->Namazeg_model->select_all_talabat('yes');

      /*  $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);

        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);

        $data['letters_type_arr']=$this->Difined_model->select_all("hr_nmazg_letter_setting","","","","");*/

        $data['title']='جميع طلبات التعريف';

        //

        $data['emp_data'] = $this->Namazeg_model->select_depart();

        //

        $data['subview'] = 'admin/Human_resources/employee_forms/namazeg/all_talabat';

        $this->load->view('admin_index', $data);

        

    }

    public function getConnection_emp()

    {

        $all_Emps = $this->Namazeg_model->get_all_emp();

        //        $this->test($all_Emps);

        $arr_emp = array();

        $arr_emp['data'] = array();

        if (!empty($all_Emps)) {

            foreach ($all_Emps as $row_emp) {

                if (empty($row_emp->edara)) {

                    $row_emp->edara = 'غير محدد ';

                }

                if (empty($row_emp->qsm)) {

                    $row_emp->qsm = 'غير محدد ';

                }

                $arr_emp['data'][] = array(

                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"

                       ondblclick="Get_emp_Name(this)"

                        id="member' . $row_emp->id . '"

                        data-emp_code="' . $row_emp->emp_code . '"

                        data-edara_n="' . $row_emp->edara . '"

                        data-edara_id="' . $row_emp->administration . '"

                        data-name="' . $row_emp->employee . '"

                        data-job_id="' . $row_emp->degree_id . '"

                        data-job_title="' . $row_emp->mosma_wazefy_n . '"

                        data-qsm_n="' . $row_emp->qsm . '"

                        data-qsm_id="' . $row_emp->department . '"

                        data-start_work_date="' . $row_emp->start_work_date_m . '"

                        data-card_num="' . $row_emp->card_num . '" />',

                        $row_emp->emp_code,

                    $row_emp->employee,

                    $row_emp->edara,

                    $row_emp->qsm,

                    ''

                );

            }

        }

        echo json_encode($arr_emp);

    }

    public function getNamozegDetails()

    {

        $data['result'] = $this->Namazeg_model->getAllDetails(array('hr_nmazg_letter_emp.letter_rkm' => $_POST['letter_rkm']));

        $data['details'] = $this->Difined_model->getById("hr_nmazg_letter_setting", $_POST['id']);

        $this->load->view('admin/Human_resources/employee_forms/namazeg/namozeg_details_load_page', $data);

    }

    public function insert(){

        if( $this->input->post('save') ==='save'){

            $this->Namazeg_model->insert();

        }elseif ($this->input->post('save') ==='save_setting'){

            $this->Namazeg_model->insert_setting();

        }

        $this->PrintMessage('printNamozeg',$this->input->post('letter_rkm'));

        redirect('human_resources/employee_forms/namazegs/Namazeg','refresh');

    }

    public function Delete_namozeg($rkm){

        $this->Namazeg_model->Delete($rkm);

        redirect('human_resources/employee_forms/namazegs/Namazeg','refresh');

        $this->message('success','تمت الحذف ');

    }

    public function insert_geha_ajax(){

        $this->Namazeg_model->insert_geha();

        $data['table'] =$this->Namazeg_model->select_family_letter_setting();

        $this->load->view('admin/Human_resources/employee_forms/namazeg/geha_load_page',$data);

    }

    function PrintMessage($type ,$valu)

    {

        $CI =& get_instance();

        $CI->load->library("session");

        if ($type=='printNamozeg') {

            return $CI->session->set_flashdata('message',

                '

<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script>

		   Swal.fire({

            title: " هل تريد طباعة النموذج ؟",

            text: "",

            type: "warning",

            showCancelButton: true,

            confirmButtonColor: "#3085d6",

            cancelButtonColor: "#d33",

            cancelButtonText: "لا, إلغاء الأمر!",

            confirmButtonText: "نعم, قم بالطباعة!"

        }).then((result) => {

            if (result.value) {

                window.location.href = "'.base_url().'human_resources/employee_forms/namazegs/Namazeg/printNamazeg/'.$valu.'"   ;

            }

        })

            </script>');

        }

    }

    public  function  printNamazeg($rkm){

        $this->load->model('Model_family_cashing');

         $data['result'] = $this->Namazeg_model->getAllDetails(array('hr_nmazg_letter_emp.letter_rkm'=>$rkm));

        $data['titles'] = $this->Namazeg_model->GetFromFr_settings(8);

        $data['greetings'] = $this->Namazeg_model->GetFromFr_settings(9);

        $data["modeer_3am"]=$this->Model_family_cashing->get_emp_assigns(101); 

         $data['title'] = 'طباعة نموذج خطاب';

         $this->load->view('admin/Human_resources/employee_forms/namazeg/printNamazeg', $data);

         }

    public function edit($rkm)

    {

        $data['geha_table'] = $this->Namazeg_model->select_family_letter_setting();

        $data['result'] = $this->Namazeg_model->getAllDetails(array('hr_nmazg_letter_emp.letter_rkm' => $rkm));

      $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);

        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);

        $data['letters_type_arr'] = $this->Difined_model->select_all("hr_nmazg_letter_setting", "", "", "", "");

        $data['titles_edit'] = $this->Namazeg_model->GetFromFr_settings(8);

        $data['greetings_edit'] = $this->Namazeg_model->GetFromFr_settings(9);

        $data['title'] = 'النماذج';

        $data['subview'] = 'admin/Human_resources/employee_forms/namazeg/namazeg';

        $this->load->view('admin_index', $data);

    }

    public function update(){

        if( $this->input->post('save') ==='save'){

            $this->Namazeg_model->update();

        redirect('human_resources/employee_forms/namazegs/Namazeg/all_talabat','refresh');

        }

    }

    public function getDetailsDiv(){

        $data['result'] = $this->Namazeg_model->getAllDetails(array('hr_nmazg_letter_emp.letter_rkm'=>$_POST['rkm']));

        $data['titles'] = $this->Namazeg_model->GetFromFr_settings(8);

        $data['greetings'] = $this->Namazeg_model->GetFromFr_settings(9);

        $this->load->view('admin/Human_resources/employee_forms/namazeg/getDetailsDiv',$data);

    }

      public function update_geha(){

        $id= $this->input->post('id');

          $this->Namazeg_model->update_geah($id);

          $data['table'] =$this->Namazeg_model->select_family_letter_setting();

          $this->load->view('admin/Human_resources/employee_forms/namazeg/geha_load_page',$data);

    }

    public function getById(){

        $id= $this->input->post('id');

        $geha =$this->Namazeg_model->get_geha_by_id($id);

        echo json_encode($geha);

    }

       public function delete_geha(){

         $id = $this->input->post('id');

          $this->Namazeg_model->delete_geha($id);

          $data['table'] =$this->Namazeg_model->select_family_letter_setting();

          $this->load->view('admin/Human_resources/employee_forms/namazeg/geha_load_page',$data);

    }

   

    //yara17-11-2020



    public  function  printNamazeg_2(){

        $rkm=$this->input->post('row_id');
//$rkm=3;
        $data['result'] = $this->Namazeg_model->getAllDetails(array('hr_nmazg_letter_emp.letter_rkm'=>$rkm));

       $data['titles'] = $this->Namazeg_model->GetFromFr_settings(8);

       $data['greetings'] = $this->Namazeg_model->GetFromFr_settings(9);

       $this->load->model('Model_family_cashing');

        $data["modeer_3am"]=$this->Model_family_cashing->get_emp_assigns(101); 

        $data['title'] = 'طباعة نموذج خطاب';

        $this->load->view('admin/Human_resources/employee_forms/namazeg/printNamazeg', $data);

        }

         ////////////////////////////////////////controllers////////////////////////////

   public function add_morfaq()

   {

       $id=$this->input->post('row');

     

       $images=$this->upload_muli_file("files");



      $this->Namazeg_model->insert_attach($id,$images);

        // $this->messages('success','تمت إضافة المرفقات');

     // messages('success', 'تم اضافة المرفقات ');

     //  redirect('human_resources/tataw3/nmazg/tamkeen/Tamken', 'refresh');

   }




    public function process()
    {
           $post = $this->input->post(null,true);
       /* echo'<pre>';  
       print_r($post); 
         */
           if(isset($_POST['add_days'])){
             $this->Namazeg_model->edit_days($post);
           }
         
         if($this->db->affected_rows() >0){
            $this->session->set_flashdata('success', 'تم الاضافة بنجاح ');
        }
        redirect('human_resources/employee_forms/namazegs/Namazeg/all_talabat','refresh');
    }
   public function add_days(){

       $rkm=$this->input->post('rkm_id');

       $data['rkm_id']=$this->input->post('rkm_id');

 $data['rkm_id']=$this->input->post('rkm_id');
  $data['from_date']= $this->Namazeg_model->get_days($rkm,'from_date');
  $data['to_date']= $this->Namazeg_model->get_days($rkm,'to_date');

      $this->load->view('admin/Human_resources/employee_forms/namazeg/add_days',$data);

   }
   public function get_attaches()

   {

       $rkm=$this->input->post('rkm');

       $data['rkm']=$this->input->post('rkm');

     $data['one_data'] = $this->Namazeg_model->get_attach($rkm);

//$this->test( $data['one_data']);

       $this->load->view('admin/Human_resources/employee_forms/namazeg/get_table_attaches',$data);

   }

   public function Delete_attach()

   {

       $id=$this->input->post('id');

       $this->Namazeg_model->delete_attach($id);



    //   redirect('human_resources/tataw3/nmazg/tamkeen/Tamken', 'refresh');

   }

private function upload_muli_file($input_name){

  //  $this->test($_FILES[$input_name]['name']);

       $filesCount = count($_FILES[$input_name]['name']);

       for ($i = 0; $i < $filesCount; $i++) {

           $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];

           $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];

           $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];

           $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];

           $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];

           $all_img[] = $this->upload_all_file("userFile");

       }

       return $all_img; 

   }

   private function upload_all_file($file_name)

   {

       $config['upload_path'] = 'uploads/human_resources/nmazg/nmazg_letter_attaches';

       $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

       $config['max_size'] = '100000000';

       $config['encrypt_name'] = true;

       $this->load->library('upload', $config);

       if (!$this->upload->do_upload($file_name)) {

           return false;

       } else {

           $datafile = $this->upload->data();

           //  $this->thumb($datafile); 

           return $datafile['file_name'];

       }

   }

   

   

   

   function make_suspend()

{

    $rkm = $this->input->post('rkm');

    $this->Namazeg_model->make_suspend($rkm);

}



function update_seen_order()

{

    $this->Namazeg_model->update_seen_order();

}



function update_seen_emp()

{

    $this->Namazeg_model->update_seen_emp();

    print_r($this->db->last_query());



}

} // END CLASS