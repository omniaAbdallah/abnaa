<?php
/*
 * application\controllers\human_resources\tataw3\nmazg\need_training\Need_training.php
 */
class Need_training extends MY_Controller{
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
        $this->load->model('human_resources_model/tataw3/nmazg/need_training/Need_training_model');
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
   

    public function add_need_training($id=''){ // human_resources/tataw3/nmazg/need_training/Need_training/add_need_training
        if ($this->input->post('add')){
            $insert_id =  $this->Need_training_model->add_need_training();
          $this->Need_training_model->insert_traning_maham();
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('human_resources/tataw3/nmazg/need_training/Need_training/need_training_list', 'refresh');
//            redirect('human_resources/tataw3/nmazg/need_training/Need_training/update_need_training/'.$insert_id, 'refresh');
        }

        $data["last_rkm_talb"] = $this->Need_training_model->select_last_rkm_talb();
        $data['foras'] = $this->Need_training_model->get_table('tat_foras', array());
        $data['employees']= $this->Need_training_model->get_table('employees', array('emp_type'=>1,'status'=>'96'));
        $data['title'] = "  إضافة إحتياج تدريب للمتطوع ";
        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/need_training/add_need_training';
        $this->load->view('admin_index', $data);
    }
    //yaraaaaaaaaaaaaaaa

    public function get_mot3en()
    {
       $forsa_id_fk =$this->input->post('forsa_id_fk');
       if(!empty($forsa_id_fk))
        {
       $data['mot3en']=$this->Need_training_model->get_table('tat_motat3en', array('current_forsa_fk'=>$forsa_id_fk,'taqem_moqabla'=>'yes','rkm_akd_id'=>0));
 // $this->test($data['mot3en']);
        }
        else{
            $data='';
        }
       $this->load->view('admin/Human_resources/tataw3_v/nmazg/need_training/load_mot3en', $data);
        
   }
   public  function get_moto3(){   
    
    $motatw3_id_fk =$this->input->post('motatw3_id_fk');
    if(!empty($motatw3_id_fk))
    {
    $motat3en=$this->Need_training_model->get_table_by_id('tat_motat3en', array('id'=>$motatw3_id_fk));
    echo json_encode($motat3en);
    }
}
    public function update_need_training($id){

        if ($this->input->post('add')){
            $this->Need_training_model->add_need_training($id);
            $this->Need_training_model->update_traning_maham($id);
            $this->messages('success', 'تم التعديل بنجاح ' );
            redirect('human_resources/tataw3/nmazg/need_training/Need_training/need_training_list', 'refresh');
//            redirect('human_resources/tataw3/nmazg/need_training/Need_training/update_need_training/'.$id, 'refresh');
        }
        $data['volunteer'] = $this->Need_training_model->getRecordById(array('id'=>$id));
        $data['volunteer_maham'] = $this->Need_training_model->getRecordById_maham(array('traning_id_fk'=>$id));
        $data['foras'] = $this->Need_training_model->get_table('tat_foras', array());
        $data['employees']= $this->Need_training_model->get_table('employees', array('emp_type'=>1,'status'=>'96'));
        $data['title'] = "  تعديل إحتياج تدريب للمتطوع ";
        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/need_training/add_need_training';
        $this->load->view('admin_index', $data);
    }
    public function delete_need_training($id){
        $this->Need_training_model->delete_need_training($id);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('human_resources/tataw3/nmazg/need_training/Need_training/need_training_list', 'refresh');
    }

    public function need_training_list(){/*human_resources/tataw3/nmazg/need_training/Need_training/need_training_list*/
        $data['title']= 'قائمه  طلبات الإحتياج الي التدريب للمتطوعيين' ;
        $data['need_training_js'] = $this->load->view('admin/Human_resources/tataw3_v/nmazg/need_training/app_js', '', TRUE);
        $this->load->view('admin/Human_resources/tataw3_v/nmazg/need_training/need_training_list', $data);
    }
    public function need_training_data(){
        $need_training = $this->Need_training_model->get_table('tat_traning', array());
        $arr = array();
        $arr['data'] = array();
        if(!empty($need_training)) {
            $x = 0;
            foreach ($need_training as $row) {
                $x++;

                $arr['data'][] = array(
                    $x,
                    $row->forsa_name,
                    $row->motatw3_name,
                    $row->moshrf_name,
                    $row->t2hel,
                    $row->publisher_name,
                    '
                     <a href="#" onclick=\'swal({
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
                                    window.location="'.base_url().'human_resources/tataw3/nmazg/need_training/Need_training/update_need_training/'.$row->id.'";
                                    });\'>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>     </a>
                                <a href="#" onclick=\'swal({
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
                                    window.location="'.base_url().'human_resources/tataw3/nmazg/need_training/Need_training/delete_need_training/'.$row->id.'";
                                    });\'>
                                    <i class="fa fa-trash"> </i>   </a>
								
								 <a onclick="print_card('.$row->id.')" title="طباعه">
								        <i class="fa fa-print"></i></a>
                                   
                 
                    '
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
    

    public function print_card()
    {
        $row_id = $this->input->post('row_id');
        $data['volunteer_maham'] = $this->Need_training_model->getRecordById_maham(array('traning_id_fk'=>$row_id));
        $data['volunteer'] = $this->Need_training_model->getRecordById(array('id'=>$row_id));
        $this->load->view('admin/Human_resources/tataw3_v/nmazg/need_training/need_training_print_new', $data);
    }

   


}