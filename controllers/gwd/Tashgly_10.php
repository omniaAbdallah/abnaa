<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tashgly extends MY_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
       
        $this->load->model('gwd_m/Tashgly_model');


        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    private  function upload_image($file_name){
    $config['upload_path'] = 'uploads/images';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    $config['max_size']    = '1024*8';
    $config['encrypt_name']=true;
    $this->load->library('upload',$config);
    if(! $this->upload->do_upload($file_name)){
      return  false;
    }else{
        $datafile = $this->upload->data();
        $this->thumb($datafile);
       return  $datafile['file_name'];
    }
}
    private function thumb($data,$folder='')
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        if (!empty($folder)) {
            $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
    }
    private function upload_file($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }

  	    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
    }
    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }

    public function downloads($file) 
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/gwd/strategy_pln_file/'.$file);
        force_download($name, $data); 
    }
    public function read_strategy_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/gwd/strategy_pln_file/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }


    /************************************************************/


    public function list_Tashgly()//gwd/Tashgly/list_Tashgly
    {
        //$data['customer_js'] = $this->load->view('admin/gwd_v/strategy_v/app_js', '', TRUE);
        $data['subview'] = 'admin/gwd_v/tashgly_v/tashgly';
        $this->load->view('admin_index', $data);
    }
    public function data()
    {
        $all_strategy =  $this->Tashgly_model->select_allStrategy();

        $arr = array();
        $arr['data'] = array();
        if(!empty($all_strategy)){
            $x = 0;
            foreach($all_strategy as $row){
                $x++;

                $arr['data'][] = array(
                    /*  if($row['file_update_date'] == 0 ){
                          echo '0';
                      }*/

                    $x ,
                
                    $row->pln_name,
                    ' '.$row->pln_from_date.' >> '.$row->pln_to_date.'',
                    $row->pln_reviser_name,
                    $row->pln_suspender_name,

                    '
                    
                     
 
                      
                          
                           <a target="_blank" class="btn btn-sm btn-add" href="'. base_url() .'gwd/Tashgly/add_program/'.$row->id.'" >
                           <i class="hvr-buzz-out fa fa-recycle" aria-hidden="true">
                                 </i>
                                 برامج الخطة</a>
                           
 
                    ','
                      
                  
 
                  <a href="#" onclick=\'swal({
                                title: "هل انت متأكد من التعديل ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "تعديل",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: true
                                },
                                function(){
                                get_tashgly('.$row->id.');
                            });\'>
                            <i class="fa fa-pencil-square-o"> </i></a>
                                    
                  <a href="#" onclick=\'swal({
                                title: "هل انت متأكد من الحذف ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "حذف",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: true
                                },
                                function(){
                                delete_tashgly('.$row->id.');
                            });\'>
                            <i class="fa fa-trash"> </i></a>
                              
                                                             
   '

                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }


    public function load_add_tashgly()//gwd/strategy/Strategy/load_add_strategy
    {
        $data['all_strategy'] = $this->Tashgly_model->get_by('gwd_strategy_plans',array());
        $data['all_Emps'] = $this->Tashgly_model->get_by('employees',array('employee_type'=>1,'status'=>96));
       // $data['all_Emps'] = $this->Tashgly_model->get_by('employees',array('employee_type'=>1));
       // $this->test( $data['all_Emps']);
        $id = $this->input->post('id');
        if ($this->input->post('add')){
            $this->Tashgly_model->insert();
            echo 1;
            return ;

        }else if ($this->input->post('update')){
            $this->Tashgly_model->update($id);
            echo 1;
            return ;

        }
        if ($id){
            $data['record'] = $this->Tashgly_model->get_by('gwd_tashgly_plans',array('id'=>$id),1);
            $this->load->view('admin/gwd_v/tashgly_v/load_add_tashgly', $data);

        }else{
            $data['last_pln_rkm'] = $this->Tashgly_model->last_pln_rkm();
            $this->load->view('admin/gwd_v/tashgly_v/load_add_tashgly', $data);
        }

    }

    public function delete_tashgly()
    {
        $id = $this->input->post('id');
        $this->Tashgly_model->delete_tashgly($id);
        echo 1;
        return ;
    }

    public function getConnection_emp()
    {
        $input_id= $this->input->post('input_id');
        $all_Emps = $this->Tashgly_model->get_by('employees',array('employee_type'=>1));

        $arr_emp = array();
        $arr_emp['data'] = array();

        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {

                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this); "
                        id="member' . $row_emp->id . '"
                        data-emp_code="' . $row_emp->emp_code . '"
                        data-name="' . $row_emp->employee . '"
                        data-input_id="' . $input_id . '"
                         />',
                    $row_emp->emp_code,
                    $row_emp->employee,
                    ''
                );
            }
        }
        echo json_encode($arr_emp);


    }
    

    public function getConnection_strategy()
    {
        $input_id= $this->input->post('input_id');
        $all_strategy = $this->Tashgly_model->get_by('gwd_strategy_plans',array());

        $arr_strtegy = array();
        $arr_strtegy['data'] = array();

        if (!empty($all_strategy)) {
            foreach ($all_strategy as $row_emp) {

                $arr_strtegy['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_strategy_Name(this); "
                        id="member' . $row_emp->id . '"
                        data-pln_rkm="' . $row_emp->id . '"
                        data-name="' . $row_emp->pln_name . '"
                        data-input_id="' . $input_id . '"
                         />',
                    $row_emp->pln_name,
                    $row_emp->pln_from_date,
                    $row_emp->pln_to_date,
                    ''
                );
            }
        }
        echo json_encode($arr_strtegy);


    }

    ///////
    public function add_program($pln_id)
    {
        if ($this->input->post('add')) {

          
            $this->Strategy_model->insert_program($pln_id);
            echo 1;
            return ;

        }
        $data['get_all'] = $this->Tashgly_model->get_by('gwd_tashgly_plans',array('id'=>$pln_id))[0];
      //  $this->test($data['get_all']);
      $data['plan_id']=$pln_id;
      $data['last_prog_rkm'] = $this->Tashgly_model->last_pln_rkm_prog($pln_id);
        $data['title'] = 'أضافه برامج الخطة التشغليية';
        $data['subview'] = 'admin/gwd_v/tashgly_v/tashgly_programs';
        $this->load->view('admin_index', $data);
    }
    public function data_program()
    {
        $pln_id=$this->input->post('plan_id');
        $all_strategy =  $this->Tashgly_model->select_allStrategy_program($pln_id);

        $arr = array();
        $arr['data'] = array();
        if(!empty($all_strategy)){
            $x = 0;
            foreach($all_strategy as $row){
                $x++;

                $arr['data'][] = array(
                    /*  if($row['file_update_date'] == 0 ){
                          echo '0';
                      }*/

                    $x ,
                    $row->program_name,
                    $row->program_wasf,
                    ' <a target="_blank" class="btn btn-sm btn-add" href="'. base_url() .'gwd/Tashgly/add_wants_values/'.$row->id.'" >
                    <i class="hvr-buzz-out fa fa-recycle" aria-hidden="true">
                          </i>
                           القيم المستهدفة</a>
                           <a target="_blank" class="btn btn-sm btn-add" href="'. base_url() .'gwd/Tashgly/add_achived_values/'.$row->id.'" >
                           <i class="hvr-buzz-out fa fa-recycle" aria-hidden="true">
                                 </i>
                                  القيم المتحققة</a> 
                           
                           
                           '
,
                    '
                    
                      
 
                  <a href="#" onclick=\'swal({
                                title: "هل انت متأكد من التعديل ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "تعديل",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: true
                                },
                                function(){
                                get_tashgly_program('.$row->id.','.$row->tashgly_id_fk.');
                            });\'>
                            <i class="fa fa-pencil-square-o"> </i></a>
                                    
                  <a href="#" onclick=\'swal({
                                title: "هل انت متأكد من الحذف ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "حذف",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: true
                                },
                                function(){
                                delete_tashgly_program('.$row->id.','.$row->tashgly_id_fk.');
                            });\'>
                            <i class="fa fa-trash"> </i></a>
                              
                                                             
   '

                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }


    public function load_add_tashgly_program()
    {
        $data['all_Emps'] = $this->Tashgly_model->get_by('employees',array('employee_type'=>1,'status'=>96));
        $pln_id=$this->input->post('pln_id');
        $id = $this->input->post('id');
        $data['plan_id']=$pln_id;
        if ($this->input->post('add')){
            $this->Tashgly_model->insert_program();
            echo 1;
            return ;

        }else if ($this->input->post('update')){
            $this->Tashgly_model->update_program($id);
            echo 1;
            return ;

        }
        if ($id){
            
            $data['record'] = $this->Tashgly_model->get_by('gwd_tashgly_programs',array('id'=>$id),1);
            $this->load->view('admin/gwd_v/tashgly_v/load_add_tashgly_program', $data);

        }else{
            
            $data['last_prog_rkm'] = $this->Tashgly_model->last_pln_rkm_prog($pln_id);
            $this->load->view('admin/gwd_v/tashgly_v/load_add_tashgly_program', $data);
        }

    }

    public function delete_tashgly_program()
    {
       
        $id = $this->input->post('id');
        $this->Tashgly_model->delete_tashgly_program($id);
        echo 1;
        return ;
    }
     //yara7-4-2020
  
     public  function Checkcode(){   //family_controllers/Family/CheckNationalNum
      
        $prog_code =$this->input->post('prog_code');
        $plan_rkm =$this->input->post('plan_rkm');
        
        echo $this->Tashgly_model->check_code($prog_code,$plan_rkm);

    }
  

    //////////////////yara8-4-2020
    
    public function add_wants_values($prog_id)
    {
       
        $data['record'] = $this->Tashgly_model->get_by('gwd_tashgly_programs',array('id'=>$prog_id))[0];
       if(!empty($data['record'])){
        $data['tshgly_strtegy_name'] = $this->Tashgly_model->get_by('gwd_tashgly_plans',array('id'=>$data['record']->tashgly_id_fk))[0]->pln_name;
        //$data['tshgly_strtegy_name']->pln_name;
       }
       // $this->test($data['tshgly_strtegy_name']);
        $data['title'] = 'أضافه   القيم المستهدفة';
        $data['subview'] = 'admin/gwd_v/tashgly_v/prog_wants_values';
        $this->load->view('admin_index', $data);
    }

  public function add_wants()
  {
      $prog_id=$this->input->post('id');
      $tashgly_id_fk=$this->input->post('tashgly_id_fk');
    if ($this->input->post('update')) {     
        $this->Tashgly_model->insert_wants_values_program($prog_id);
        echo $tashgly_id_fk;
      
      
        
    }
  }

  //////////////////yara15-4-2020
    
  public function add_achived_values($prog_id)
  {
     
      $data['record'] = $this->Tashgly_model->get_by('gwd_tashgly_programs',array('id'=>$prog_id))[0];
     if(!empty($data['record'])){
      $data['tshgly_strtegy_name'] = $this->Tashgly_model->get_by('gwd_tashgly_plans',array('id'=>$data['record']->tashgly_id_fk))[0]->pln_name;
      //$data['tshgly_strtegy_name']->pln_name;
     }
     // $this->test($data['tshgly_strtegy_name']);
      $data['title'] = 'أضافه   القيم المتحققه';
      $data['subview'] = 'admin/gwd_v/tashgly_v/prog_achived_values';
      $this->load->view('admin_index', $data);
  }

public function add_achived()
{
    $prog_id=$this->input->post('id');
    $tashgly_id_fk=$this->input->post('tashgly_id_fk');
  if ($this->input->post('update')) {     
      $this->Tashgly_model->insert_achived_values_program($prog_id);
      echo $tashgly_id_fk;
    
    
      
  }
}


}// end class
/* End of file Finance_employee.php */
/* Location: ./application/controllers/human_ resources/Finance_employee.php */