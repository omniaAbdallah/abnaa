<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Strategy extends MY_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('gwd_m/strategy_m/Strategy_model');


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

    public function downloads($file) //  // human_resources/Human_resources/downloads
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


    public function list_strategy()//gwd/strategy/Strategy/list_strategy
    {
        //$data['customer_js'] = $this->load->view('admin/gwd_v/strategy_v/app_js', '', TRUE);
        $data['subview'] = 'admin/gwd_v/strategy_v/strategy';
        $this->load->view('admin_index', $data);
    }
    public function data()
    {
        $all_strategy =  $this->Strategy_model->select_allStrategy();

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
                    $row->pln_rkm,
                    $row->pln_name,
                    $row->pln_from_date,
                    $row->pln_to_date,
                    $row->pln_reviser_name,
                    $row->pln_suspender_name,

                    '
                    
                      <div class="btn-group">
                      <button type="button" class="btn btn-danger">اضافه</button>
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu">
 
                       <li><a target="_blank"
                         href="'. base_url() .'gwd/Gawda_plans/treeDalel/'.$row->id.'"> 
                         اعداد الخطه</a></li>
                          
                          <li><a target="_blank"
                         href="'. base_url() .'gwd/strategy/Strategy/strategy_files/'.$row->id.'"> 
                          اضافه مرفقات  </a></li>
                           
 
                         
                      </ul>
                  </div>
 
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
                                get_strategy('.$row->id.');
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
                                delete_strategy('.$row->id.');
                            });\'>
                            <i class="fa fa-trash"> </i></a>
                              
                                                             
   '

                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }


    public function load_add_strategy()//gwd/strategy/Strategy/load_add_strategy
    {
        $id = $this->input->post('id');
        if ($this->input->post('add')){
            $this->Strategy_model->insert();
            echo 1;
            return ;

        }else if ($this->input->post('update')){
            $this->Strategy_model->update($id);
            echo 1;
            return ;

        }
        if ($id){
            $data['record'] = $this->Strategy_model->get_by('gwd_strategy_plans',array('id'=>$id),1);
            $this->load->view('admin/gwd_v/strategy_v/load_add_strategy', $data);

        }else{
            $data['last_pln_rkm'] = $this->Strategy_model->last_pln_rkm();
            $this->load->view('admin/gwd_v/strategy_v/load_add_strategy', $data);
        }

    }

    public function delete_strategy()
    {
        $id = $this->input->post('id');
        $this->Strategy_model->delete_strategy($id);
        echo 1;
        return ;
    }

    public function getConnection_emp()
    {
        $input_id= $this->input->post('input_id');
        $all_Emps = $this->Strategy_model->get_by('employees',array('employee_type'=>1));

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



    //==========================================================================================

    public function strategy_files($pln_id)//gwd/strategy/Strategy/strategy_files/1
    {
        if ($this->input->post('add')) {

            $files = $this->upload_file('strategy_file', 'gwd/strategy_pln_file');
            $this->Strategy_model->insert_strategy_files($pln_id, $files);
            echo 1;
            return ;
            //$this->messages('success', 'تسجيل بيانات المستندات والبطاقات والمهارات');
            //redirect("human_resources/Human_resources/employee_files/" . $empCode . "");
        }
        $data['get_all'] = $this->Strategy_model->get_by('gwd_strategy_plans',array('id'=>$pln_id),1);
        $data['allData'] = $this->Strategy_model->get_by('gwd_strategy_plans_attaches',array('pln_id_fk'=>$pln_id));
        $data['pln_rkm'] = $this->Strategy_model->get_by('gwd_strategy_plans',array('id'=>$pln_id),'pln_rkm');
        $data['title'] = 'أضافه مرفقات';
        $data['subview'] = 'admin/gwd_v/strategy_v/strategy_files';
        $this->load->view('admin_index', $data);
    }


    public function load_strategy_files($pln_id)//gwd/strategy/Strategy/load_strategy_files
    {
        $data['allData'] = $this->Strategy_model->get_by('gwd_strategy_plans_attaches',array('pln_id_fk'=>$pln_id));
        $this->load->view('admin/gwd_v/strategy_v/load_strategy_files', $data);
    }

    public function delete_strategy_file()
    {
        $id = $this->input->post('id');
        $this->Strategy_model->delete_strategy($id,'gwd_strategy_plans_attaches');
        echo 1;
        return ;
    }


}// end class
/* End of file Finance_employee.php */
/* Location: ./application/controllers/human_ resources/Finance_employee.php */