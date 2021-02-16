<?php
/*
 * application\controllers\human_resources\tataw3\nmazg\taqeem\Taqeem.php
 */
class Taqeem extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('system_management/Groups');
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->library('google_maps');
        $this->load->model('human_resources_model/tataw3/nmazg/taqeem/Taqeem_model');
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
    private function upload_all_file($file_name,$folder="uploads/images")
    {
        $config['upload_path'] = $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '800000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
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

    public function add_taqeem($id=''){ // human_resources/tataw3/nmazg/taqeem/Taqeem/add_taqeem
        if ($this->input->post('add')){
            $insert_id =  $this->Taqeem_model->add_taqeem();
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('human_resources/tataw3/nmazg/taqeem/Taqeem/taqeem_list', 'refresh');
//            redirect('human_resources/tataw3/nmazg/taqeem/Taqeem/update_taqeem/'.$insert_id, 'refresh');
        }
        $data['bnods']= $this->Taqeem_model->get_from_settings();
        $data['motatw3'] = $this->Taqeem_model->get_table('tat_motat3en', array('had_contract'=>'yes'),1);
        $data['title'] = "  اضافة تقييم ";
        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/taqeem/add_taqeem';
        $this->load->view('admin_index', $data);
    }
    public function update_taqeem($id){

        if ($this->input->post('add')){
            $this->Taqeem_model->add_taqeem($id);
            $this->messages('success', 'تم التعديل بنجاح ' );
            redirect('human_resources/tataw3/nmazg/taqeem/Taqeem/taqeem_list', 'refresh');
//            redirect('human_resources/tataw3/nmazg/taqeem/Taqeem/update_taqeem/'.$id, 'refresh');
        }
        $data['get_taqeem']= $this->Taqeem_model->get_taqeem($id);
        $data['bnods']= $this->Taqeem_model->get_from_settings();
        $data['motatw3'] = $this->Taqeem_model->get_table('tat_motat3en', array('had_contract'=>'yes'),1);
        $data['title'] = "  اضافة تقييم ";
        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/taqeem/add_taqeem';
        $this->load->view('admin_index', $data);
    }
    public function delete_taqeem($id){
        $this->Taqeem_model->delete_taqeem($id);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('human_resources/tataw3/nmazg/taqeem/Taqeem/taqeem_list', 'refresh');
    }

    public function taqeem_list(){//human_resources/tataw3/nmazg/taqeem/Taqeem/taqeem_list
        $data['title']= 'قائمة من التقييمات' ;
        $data['taqeem_js'] = $this->load->view('admin/Human_resources/tataw3_v/nmazg/taqeem/app_js', '', TRUE);
        $this->load->view('admin/Human_resources/tataw3_v/nmazg/taqeem/taqeem_list', $data);
    }
    public function taqeem_data(){
        $taqeem = $this->Taqeem_model->get_taqeem();
        $arr = array();
        $arr['data'] = array();
        if(!empty($taqeem)) {
            $x = 0;
            foreach ($taqeem as $row) {
                $x++;
                $arr['data'][] = array(
                    $x,
                    $row->motatw3_name,
                    $row->forsa_data->forsa_name,
                    $row->date,
                    $row->total_max_degree,
                    $row->total_had_degree,
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
                                    window.location="'.base_url().'human_resources/tataw3/nmazg/taqeem/Taqeem/update_taqeem/'.$row->id.'";
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
//                                    swal("تم الحذف!", "", "success");
                                    window.location="'.base_url().'human_resources/tataw3/nmazg/taqeem/Taqeem/delete_taqeem/'.$row->id.'";
                                    });\'>
                                    <i class="fa fa-trash"> </i> حذف  </a></i>
								  <li> <a href="#detailsModal"  data-toggle="modal"  onclick="load_details('.$row->id.')"> <i class=" fa fa-list"></i> تفاصيل </a></li>  
								  <li> <a onclick="print_card('.$row->id.')" title="طباعه">
								        <i class="fa fa-print"></i>طباعة</a>
                                  </li>   
                                                                                               
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
        $data['result']= $this->Taqeem_model->get_taqeem($row_id);
        $this->load->view('admin/Human_resources/tataw3_v/nmazg/taqeem/load_details', $data);
    }

    public function print_card()
    {
        $row_id = $this->input->post('row_id');
        $data['result']= $this->Taqeem_model->get_taqeem($row_id);
        $this->load->view('admin/Human_resources/tataw3_v/nmazg/taqeem/taqeem_print', $data);
    }

    public function forsa_data(){

        $motatw3_id_fk = $this->input->post('motatw3_id_fk');
        $rkm_akd_id = $this->input->post('rkm_akd_id');
        $forsa_data= $this->Taqeem_model->get_forsa_data($motatw3_id_fk,$rkm_akd_id);
        $json = json_encode($forsa_data);
        echo $json;

    }


}