<?php



class Foras extends CI_Controller{

  
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_tataw3_logged_in') == 0) {
            redirect('tataw3/Login_tataw3');
        }
     //   $this->load->model('gam3ia_omomia/Tataw3_model');
     //   $this->load->model('tataw3/Tataw3_model');
        $this->load->model('tataw3/foras/Foras_model');
        $this->load->model('tataw3/Tataw3_model');
    }

    public function messages($type,$text,$method=false)

    {

        $CI =& get_instance();

        $CI->load->library("session");

        if($type =='success') {

            return $CI->session->set_flashdata('message','<script> swal({

                    title:"'.$text.'" ,

                    confirmButtonText: "تم"

                })</script>');



        }elseif($type=='warning'){

            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');

        }elseif($type=='error'){

            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');

        }



    }

    private function test($data = array())

    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }
    
    public function foras_list(){//tataw3/foras/Foras/foras_list

        $data['title']= 'قائمة بالفرص التطوعية' ;

        //$data['foras_js'] = $this->load->view('admin/Human_resources/tataw3_v/foras/app_js', '', TRUE);
            $data['result']= $this->Foras_model->get_foras(); 
            $data['last_record'] = $this->Foras_model->get_last_record();
         //  $this->test($data['last_record']);
        //$this->load->view('admin/Human_resources/tataw3_v/foras/foras_list', $data);
     //   F:\laragon\www\ABNAAv1\application\views\tataw3\tataw3_views\foras\all_foras.php
        $data['subview'] = 'tataw3/tataw3_views/foras/all_foras';
        $this->load->view('tataw3/tataw3_index', $data);
    }

   

    public function add_foras($id=''){ // human_resources/tataw3/foras/Foras/add_foras

        if ($this->input->post('add')){

                $file= $this->upload_all_file('mnazm_logo','uploads/human_resources/tato3/foras');

                $insert_id =  $this->Foras_model->add_foras($file);

                $this->messages('success', 'تم الاضافة بنجاح ' );

                redirect('human_resources/tataw3/foras/Foras/update_foras/'.$insert_id, 'refresh');

         }

        $data['mobdrat']= $this->Foras_model->get_from_settings(401);

        $data['cities']= $this->Foras_model->get_cities();

        $data['title'] = "  اضافة فرصة تطوعية ";

        $data['subview'] = 'admin/Human_resources/tataw3_v/foras/add_foras';

        $this->load->view('admin_index', $data);

    }

    public function update_foras($id){

        $data['get_foras'] = $this->Foras_model->get_foras($id);

        if ($this->input->post('add')){

            $file= $this->upload_all_file('mnazm_logo','uploads/human_resources/tato3/foras');

            $this->Foras_model->add_foras($file,$id);

            $this->messages('success', 'تم التعديل بنجاح ' );

            redirect('human_resources/tataw3/foras/Foras/update_foras/'.$id, 'refresh');



        }

        $data['mobdrat']= $this->Foras_model->get_from_settings(401);

        $data['cities']= $this->Foras_model->get_cities();

        $data['title'] = "  اضافة فرصة تطوعية ";

        $data['subview'] = 'admin/Human_resources/tataw3_v/foras/add_foras';

        $this->load->view('admin_index', $data);

    }

    public function delete_foras($id){

        $this->Foras_model->delete_foras($id);

        $this->messages('success', 'تم الحذف بنجاح ' );

        redirect('human_resources/tataw3/foras/Foras/foras_list', 'refresh');



    }

 
   
    public function foras_data(){

        $foras = $this->Foras_model->get_foras();

        $arr = array();

        $arr['data'] = array();

        if(!empty($foras)) {

            $x = 0;

            foreach ($foras as $row) {

                $x++;

                $genders = array('1'=>'نساء فقط','2'=>'رجال فقط','3'=>'نساء ورجال');

                if (!empty($row->gender)){

                    $gender_n =  $genders[$row->gender];

                }else{

                    $gender_n = 'غير محدد';

                }







                $arr['data'][] = array(

                    $x,

                    $row->forsa_name,

                    $row->moshrf_name,

                    $row->moshrf_jwal,

                    $row->start_date,

                    $row->end_date,

                    $gender_n,

                    $row->tataw3_hours,

                    '

                     <div class="btn-group">

                  <button type="button" class="btn btn-warning">إجراءات</button>

                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <span class="caret"></span>

                    <span class="sr-only">Toggle Dropdown</span>

                  </button>

                  <ul class="dropdown-menu">

               

                    

                     <li> <a href="#" onclick=\'swal({

                                    title: "هل انت متأكد من التعديل ؟",

                                    text: "",

                                    type: "warning",

                                    showCancelButton: true,

                                    confirmButtonClass: "btn-warning",

                                    confirmButtonText: "تعديل",

                                    cancelButtonText: "إلغاء",

                                    closeOnConfirm: false

                                    },

                                    function(){

                                    window.location="'.base_url().'human_resources/tataw3/foras/Foras/update_foras/'.$row->id.'";

                                    });\'>

                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل    </a></li>

                               <li> <a href="#" onclick=\'swal({

                                    title: "هل انت متأكد من الحذف ؟",

                                    text: "",

                                    type: "warning",

                                    showCancelButton: true,

                                    confirmButtonClass: "btn-danger",

                                    confirmButtonText: "حذف",

                                    cancelButtonText: "إلغاء",

                                    closeOnConfirm: false

                                    },

                                    function(){

                                    swal("تم الحذف!", "", "success");

                                    window.location="'.base_url().'human_resources/tataw3/foras/Foras/delete_foras/'.$row->id.'";

                                    });\'>

                                    <i class="fa fa-trash"> </i> حذف  </a></i>

                                   	  

								  <li> <a href="#detailsModal"  data-toggle="modal"  onclick="load_details('.$row->id.')"> <i class=" fa fa-list"></i> تفاصيل </a></li>                                              

											   

                                             

                  </ul>

                </div> 

                    '

                );

            }

        }

        $json = json_encode($arr);

        echo $json;



    }

    public function load_details(){

        $row_id = $this->input->post('row_id');
        $this->Foras_model->update_foras_tataw3($row_id);

     //   $data['result']= $this->Foras_model->get_foras($row_id);
        $data['result']= $this->Foras_model->get_foras(); 
        $data['last_record'] = $this->Foras_model->get_last_record();
        $this->load->view('tataw3/tataw3_views/foras/foras_details', $data);



    }



}