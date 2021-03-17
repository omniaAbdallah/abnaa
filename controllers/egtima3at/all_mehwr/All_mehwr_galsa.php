<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 05/03/2019
 * Time: 12:00 م
 */

class All_mehwr_galsa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('egtima3at_m/all_mehwr/All_mehwr_galsa_model');
        $this->load->model('egtima3at_m/add_glasat/Glasat_model');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/egtma3at/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function upload_all_file($file_name)
    {
        
        $config['upload_path'] = 'uploads/egtma3at/all_mehwr/';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
           // $this->thumb($datafile);
         
            return $datafile['file_name'];
           
        }
    }
  

    private function upload_muli_file($input_name){
        $filesCount = count($_FILES['files']['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES['files']['name'][$i];
            $_FILES['userFile']['type'] = $_FILES['files']['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES['files']['error'][$i];
            $_FILES['userFile']['size'] = $_FILES['files']['size'][$i];
            $all_img[] = $this->upload_all_file("userFile");
           
        }
        return $all_img;
       
    }
    public function read_file($file_name)
    {
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/egtma3at/all_mehwr/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function download_file($file){
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('uploads/egtma3at/all_mehwr/'.$file);
        force_download($name, $data);
    }
  
    public function index(){ // egtima3at/all_mehwr/All_mehwr_galsa
      //$this->test($_SESSION);
        $data['all_data'] = $this->All_mehwr_galsa_model->get_data();

        
        $data['edara']=$this->Glasat_model->get_edara($_SESSION['emp_code']);
        $data['last_galsa']=$this->All_mehwr_galsa_model->select_last_galsa($data['edara']);
        $data['notify_galsa']=$this->All_mehwr_galsa_model->select_notify_galsa();
        if(!empty(  $data['last_galsa'])){
            $data['glsa_members'] = $this->All_mehwr_galsa_model->get_glasat_hdoor($data['last_galsa']->galsa_rkm);
            $data['result'] = $this->All_mehwr_galsa_model->get_mehwr_details($data['last_galsa']->galsa_rkm);
        }
       
        $data['title'] = 'إضافة محاور الجلسات';
        $data['subview'] = 'admin/egtima3at_v/all_mehwr/all_mehwr_galsa_view';
        $this->load->view('admin_index', $data);
    }
    public function upload_image_files_ajax($countfiles)
    {
        if (!is_dir('uploads/egtma3at/all_mehwr/')) {
            mkdir('uploads/egtma3at/all_mehwr/', 0777, TRUE);
        }
        for ($i = 0; $i < $countfiles; $i++) {
            if (!empty($_FILES['mehwar_morfaq']['name'][$i])) {
                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['mehwar_morfaq']['name'][$i];
                $_FILES['file']['type'] = $_FILES['mehwar_morfaq']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['mehwar_morfaq']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['mehwar_morfaq']['error'][$i];
                $_FILES['file']['size'] = $_FILES['mehwar_morfaq']['size'][$i];
                // Set preference
                $config['upload_path'] = 'uploads/egtma3at/all_mehwr/';
                $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
                //$config['max_size'] = '5000'; // max_size in kb
                $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
                    $config['overwrite'] = true;
                    $config['encrypt_name'] = true;
                $config['file_name'] = $_FILES['mehwar_morfaq']['name'][$i];
                //Load upload library
                $this->load->library('upload', $config);
                 $this->upload->initialize($config);
                // File upload
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    // Initialize array
                    $data['filenames'][] = $filename;
                    return $filename;
                  
                }
            }
        }
    }
    public function add_mehwer()//egtima3at/all_mehwr/All_mehwr_galsa/add_mahwer
    {
        
        $data['edara']=$this->Glasat_model->get_edara($_SESSION['emp_code']);
        $files=$this->upload_muli_file("files");
       // $this->test($files);
           $this->All_mehwr_galsa_model->insert_mehwr($files, $data['edara']);
         
           // redirect('md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia', 'refresh');
        
    }
    public function update_mehwer()
    {
        $glsa_rkm=$this->input->post('id');
      
       $files=$this->upload_muli_file("files");
            $data['edara']=$this->Glasat_model->get_edara($_SESSION['emp_code']);
            $this->All_mehwr_galsa_model->delete($glsa_rkm);
      
            $this->All_mehwr_galsa_model->insert_mehwr($files, $data['edara']);
        //    $this->All_mehwr_galsa_model->update_mehwr($glsa_rkm,$files,$data['edara']);
            // messages('success', 'تم تعديل بنجاح ');
            // redirect('md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia', 'refresh');
        
      
    }

    public function get_table(){
        $data['edara']=$this->Glasat_model->get_edara($_SESSION['emp_code']);
        $data['last_galsa']=$this->All_mehwr_galsa_model->select_last_galsa($data['edara']);

        $this->load->view('admin/egtima3at_v/all_mehwr/get_table', $data);
    }

    public function update()
    {
$glsa_rkm=$this->input->post('id');
    
        $data['result'] = $this->All_mehwr_galsa_model->getById($glsa_rkm);
        if(!empty(  $data['result'])){
            $data['glsa_members'] = $this->All_mehwr_galsa_model->get_glasat_hdoor($data['result']->galsa_rkm);

        }
        $data['edara']=$this->Glasat_model->get_edara($_SESSION['emp_code']);
        $data['last_galsa']=$this->All_mehwr_galsa_model->select_last_galsa($data['edara']);
        if(!empty(  $data['last_galsa'])){
            $data['glsa_members'] = $this->All_mehwr_galsa_model->get_glasat_hdoor($data['last_galsa']->galsa_rkm);

        }
        $data['result_details'] = $this->All_mehwr_galsa_model->get_mehwr_details($glsa_rkm);
        $data['get_last_rkm'] = $this->All_mehwr_galsa_model->get_last_rkm($glsa_rkm);

        $data['title'] = 'تعديل  مجلس   ';
      
        $this->load->view('admin/egtima3at_v/all_mehwr/all_mehwr_view_update', $data);
    }
    
    public function get_add()//osr/Manzl_fix/editManzl_fixOrders
     {
        
        $data['edara']=$this->Glasat_model->get_edara($_SESSION['emp_code']);
        $data['last_galsa']=$this->All_mehwr_galsa_model->select_last_galsa($data['edara']);
        if(!empty(  $data['last_galsa'])){
            $data['glsa_members'] = $this->All_mehwr_galsa_model->get_glasat_hdoor($data['last_galsa']->galsa_rkm);

        }

        $data['title'] = 'إضافة محاور الجلسات';
        $this->load->view('admin/egtima3at_v/all_mehwr/all_mehwr_galsa_view', $data);
     }
     public function load_details()
     {
        $data['all_data'] = $this->All_mehwr_galsa_model->get_data();
      
     
         $this->load->view('admin/egtima3at_v/all_mehwr/load_data', $data);

        
     }
    

  

    public function delete()
    {
        $glsa_rkm=$this->input->post('id');
        $this->All_mehwr_galsa_model->delete($glsa_rkm);
      

    }
 public function   delete_row()
 {
    $id=$this->input->post('id');
    $this->All_mehwr_galsa_model->delete_row($id);
 }

    public function get_table_mehwer()
    {
        $galsa_rkm = $this->input->post('galsa_rkm');
        $data['result'] = $this->All_mehwr_galsa_model->get_mehwr_details($galsa_rkm);
     //   $this->test($data['result']);
        $this->load->view('admin/egtima3at_v/all_mehwr/get_table_mehwer_view', $data);
    }
    //yara30-4-2020
    public function update_member_hdoor()
    {
        $galsa_rkm=$this->input->post('galsa_rkm');
        $this->All_mehwr_galsa_model->update_table_hoddor($galsa_rkm);
    }
    public function check_data()
    {
        $galsa_rkm=$this->input->post('galsa_rkm');
        $result=  $this->All_mehwr_galsa_model->check_table_hoddor($galsa_rkm);
      echo json_encode($result);
    }
}
