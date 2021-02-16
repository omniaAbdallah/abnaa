<?php


class Bnod_setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');


        $this->load->model('st/settings/Bnod_model');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
//      
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
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
        private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function index() ///st/settings/Bnod_setting
    {

        $data['title']="اضافه البنود";
        $data['records']=$this->Bnod_model->get_all_account_group();

        $data['bnods']=$this->Bnod_model->get_from_table();


        $data['rows']=$this->Bnod_model->select_bnod();

        $data['subview'] = 'admin/st/settings/bnod_setting';
        $this->load->view('admin_index', $data);
    }
    public function add_data()
    {
       /* echo "<pre>";
       print_r($_POST);
       echo "</pre>";*/


        $this->Bnod_model->insert_bnod();

    }

    public function delete_record($id)
    {
        $this->Bnod_model->delete_record($id);
        redirect('st/settings/Bnod_setting','refresh');
    }

    public function get_sub_branch()
    {
        $valu=$this->input->post('valu');
        $data['records'] =$this->Bnod_model->get_records_by_id($valu);

        $this->load->view('admin/st/settings/load_page',$data);
    }



    public function update_bnod($id)
    {
        $this->Bnod_model->update_bnod($id);
        redirect('st/settings/Bnod_setting','refresh');
    }
    
      public function change_status()
    {
        $valu = $this->input->post('valu');
        $id = $this->input->post('id');
        $data['status'] = $this->Bnod_model->change_status($valu, $id);

        echo json_encode($data);

    }
    
    
    
    
        public function rabt_bnod() ///st/settings/Bnod_setting
    {

            if ($this->input->post('save')){
                
                
           $result = $_POST['band_fk'];
            $result_explode = explode('|', $result);
           $band_id = $result_explode[0];
           $band_code = $result_explode[1];
            /*echo "id: ". $result_explode[0]."<br />";
            echo "code: ". $result_explode[1]."<br />";*/                
                
             //   $this->test($_POST);
                  $this->Bnod_model->insert_rbt_bnod($band_id,$band_code);
                  redirect('st/settings/Bnod_setting/rabt_bnod');
                  
                /*
          
            $this->messages('success','تمت الاضافة بنجاح');
           */
        }
       
        $records = $this->Bnod_model->getAllAccounts();
        $data['tree'] = $this->buildTree($records);
       


$data['rabted_bnods']=$this->Bnod_model->select_all_rbt_bnod();
        $data['all_bnods']=$this->Bnod_model->select_all_bnod();
       $data['title']="ربط البنود بالمصروف";
        $data['subview'] = 'admin/st/settings/rabt_bnod_view';
        $this->load->view('admin_index', $data);
    }
    
    
    
        public function DeleteRabtedBand($id){
        $this->Bnod_model->delete_rabt_bnod_masrof_setting($id);
       // $this->messages('success','تم الحذف بنجاح ');
        redirect('st/settings/Bnod_setting/rabt_bnod' ,'refresh');
    }
    
    
    
        public function buildTree($elements, $parent = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element->parent == $parent) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->subs = $children;
                }
                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }
    
}