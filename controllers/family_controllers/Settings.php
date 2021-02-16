<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends MY_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        
                       $this->load->model('familys_models/for_dash/Counting');
         
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      
       /* $this->myarray = array(1=>'نوع الهوية ', 2=>'الجنسية', 3=>'المهنة ',
                                4=>'الحالة الاجتماعية ',5=>'السكن',6=>'الحاله الصحية ',
                                8=>'المستوى التعليمى ',9=>'الحالة الدراسية  ',
                                10=>'نوع التعليم  ',11=>'نشاط العمل  ',12=>'المطقة  ',
                                13=>'نوع الملكية ',14=>'نوع السكن ',15=>'ترميز المدارس ',
                                16=>'أنواع الاجهزة الطبية  ',17=>'الادويىة الطبية ',18=>'الاجهزة المنزلية ',
                                19=>'الاثاث المنزلى  ',20=>'المستلزمات المدرسية ',21=>'أنواع اصلاحات المنزل ' ,
                                22=>'حالة السكن  ',23=>"اتجاه المنزل",24=>"انواع الترميم بالمنزل  ",
                                25=>'اسباب الوفاة  ',26=>"ترميزات المدارس "
        );*/
        
        
        
        $this->myarray = array (1=>'نوع الهوية ', 2=>'الجنسية', 3=>'المهنة ',
                        4=>'الحالة الاجتماعية ',5=>'السكن',6=>'الحاله الصحية ',
                        8=>'المستوى التعليمى ',9=>'الحالة الدراسية  ',
                        10=>'نوع التعليم  ',11=>'نشاط العمل  ',12=>'المنطقة  ',
                        13=>'نوع ملكية السكن ',14=>'نوع السكن ',15=>'ترميز المدارس ',
                        16=>'أنواع الاجهزة الطبية  ',17=>'الادويىة الطبية ',18=>'الاجهزة المنزلية ',
                        19=>'الاثاث المنزلى  ',20=>'المستلزمات المدرسية ',21=>'أنواع اصلاحات المنزل ' ,
                        22=>'حالة السكن  ',23=>"اتجاه المنزل",24=>"انواع الترميم بالمنزل  ",
                        25=>'اسباب الوفاة  ',26=>"ترميزات المدارس ",27=>"حالات تواجد الام ",
                        28=>"إنطباعات الام عن الزيارة  " ,29 =>"فئات الاسر"
                        
                        
                ,32=>"طبيعة الفرد",33=>"تصنيف كل فرد",34=>"صلة القرابة",35=>"نوع المرض",36=>"جهة متابعات المرضي والمعاقين",
                37=>"وضع حالات المرضي والمعاقين",38=>"مصدر الهوية",39=>"مستوى التحصيل الدراسي",40=>"الحالة الدراسية",
                41=>"المستوى التعليمي",42=>"إعدادات مصادر الدخل",43=>"إعدادات الإلتزامات الشهرية",44=>"الدار النسائية",
                 45=>'التخصص للأم '
                        
                        
);

        
        
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('system_management/Groups');
        $this->load->model('familys_models/Model_setting');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
    }
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> '.$text.'.</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-dwarning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> '.$text.'.</div>');
        }
    }
   
    /// ___________osama_________________________________________

    public function settings($type=0){    //

        $data['typee']= $type;
        $data['all']= $this->Model_setting->get_all_data($this->myarray);
        $data['subview'] = 'admin/familys_views/all_sitting/sitting';
        $this->load->view('admin_index', $data);
    }



    public function AddSitting($type){ //Settings/AddSitting/0

        if($this->input->post('add')){
            $this->Model_setting->add($type);
            $this->message('success','إضافة '.$this->myarray[$type]);
            redirect('family_controllers/Settings/settings/'.$type ,'refresh');
        }
        $data["type"]=$type;
        $data["type_name"]=$this->myarray[$type];
        $data['title'] = 'إضافة '.$this->myarray[$type];
        $data['subview'] = 'admin/familys_views/all_sitting/add_sitting';
        $this->load->view('admin_index', $data);
    }
    public function UpdateSitting($id,$type){
        $data['record'] = $this->Model_setting->getById($id);
        $data['typee'] = $type ;

        $data["id"]=$id;
        $data["type_name"]=$this->myarray[$type];
        if($this->input->post('add')){
            $this->Model_setting->update($id);
            $this->message('success',' تحديث البيانات');
            redirect('family_controllers/Settings/settings/'.$type,'refresh');
        }

        $data['title'] = 'تعديل ';
        $data['subview'] = 'admin/familys_views/all_sitting/sitting';
        $this->load->view('admin_index', $data);
    }


    public function DeleteSitting($id,$type){
        $this->Model_setting->delete($id);
        $this->message('success','حذف ');
        redirect('family_controllers/Settings/settings/'.$type,'refresh');
    }

    /// ___________osama_________________________________________

   
}