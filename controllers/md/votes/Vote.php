<?php
class Vote extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('md/vote/Vote_model');
        $this->load->model('system_management/Groups');
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
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
  
  

    public function add_vote()//md/votes/Vote/add_vote
    {

      $data['result']=$this->Vote_model->select_all_news();
   
    
        $data['subview'] = 'admin/md/vote_v/add_vote';
        $this->load->view('admin_index', $data);
    }
    public function add()
    {   
       $this->Vote_model->insert();
       $this->messages('success', ' تمت الاضافه  بنجاح');
       redirect('md/votes/Vote/add_vote','refresh');
    }
    public function  update($id){   
        if($this->input->post('add')){
       
           $this->Vote_model->update($id); 
           $this->messages('success', ' تمت التعديل  بنجاح');
           
           redirect('md/votes/Vote/update/'.$id,'refresh');
           
        }
        
        $data['item']=$this->Vote_model->get_by_id($id);
        $data['subview'] = 'admin/md/vote_v/add_vote';
        $this->load->view('admin_index', $data);
         
     }
    
     public function delete($id)
     {
        $this->Vote_model->delete($id); 

        $this->messages('success', ' تمت الحذف  بنجاح');
        redirect('md/votes/Vote/add_vote','refresh');
     }
     
    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['options'] = $this->Vote_model->get_options_by_id($row_id);
     //   $this->test($data['options']);
        $data['get_all'] = $this->Vote_model->get_vote_by_id($row_id);
        $this->load->view('admin/md/vote_v/load_details', $data);
}


     



} // END CLASS 