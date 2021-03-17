<?php
class All_glasat_gam3ia_omomia extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->load->model('md/all_glasat_gam3ia_omomia/Glasat_model_gam3ia_omomia');


        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('system_management/Groups');

        $this->load->model('Public_relations/Report_model');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        $this->load->model('main_data/Model_main_data');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

   /* private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }*/

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

   /* private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1000000000';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }*/

    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    //-----------------------------------------
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> ' . $text . '.
                                                </div>');
        }
    }
   public function index()//md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia
    {
       
       if($this->input->post('add'))
       {
           $this->Glasat_model_gam3ia_omomia->insert_galsa();
        //   $this->Glasat_model_gam3ia_omomia->insert_galsa_member();
        //   $this->message('success','تمت الاضافه بنجاح');
          // redirect('md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia');

       }
        $data['last_magls']=$this->Glasat_model_gam3ia_omomia->get_last_magls();
        $data['records']=$this->Glasat_model_gam3ia_omomia->select_all();
         $data['open_galesa'] = $this->Glasat_model_gam3ia_omomia->get_open_galesa();
        $data['last_galsa']=$this->Glasat_model_gam3ia_omomia->get_last_galsa();
       // $data['members']=$this->Glasat_model_gam3ia_omomia->get_magls_member();
       $data['members']=$this->Glasat_model_gam3ia_omomia->get_magls_member_new();

        //yaraaaaaaaaaaaaaaaa
        $data['all_Emps'] = $this->Glasat_model_gam3ia_omomia->get_by_id('employees',array('employee_type'=>1,'status'=>96));
        $data['all_places'] = $this->Glasat_model_gam3ia_omomia->get_by_id('md_settings',array('type'=>5));
        //yararrraaaaaaaaa
        $data['title']="إضافة جلسة جديدة  ";
        $data['title_t']="قائمة الجلسات";

        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia';
        $this->load->view('admin_index', $data);
    }
   /* public function index()//md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia
    {
       if($this->input->post('add'))
       {
           $this->Glasat_model_gam3ia_omomia->insert_galsa();
           $this->Glasat_model_gam3ia_omomia->insert_galsa_member();
       }
        $data['last_magls']=$this->Glasat_model_gam3ia_omomia->get_last_magls();
        $data['records']=$this->Glasat_model_gam3ia_omomia->select_all();
         $data['open_galesa'] = $this->Glasat_model_gam3ia_omomia->get_open_galesa();
        $data['last_galsa']=$this->Glasat_model_gam3ia_omomia->get_last_galsa();
        $data['members']=$this->Glasat_model_gam3ia_omomia->get_magls_member();
        $data['title']="إعداد جلسة  ";
        $data['title_t']="قائمة الجلسات";
        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia';
        $this->load->view('admin_index', $data);
    }
    */
   /* public function update_galsa($rkm)
    {
        $data['last_galsa']=$this->Glasat_model_gam3ia_omomia->get_by_rkm($rkm)->glsa_rkm;
        $data['galsa_member']=$this->Glasat_model_gam3ia_omomia->get_galsa_member($rkm);

        $data['last_magls_update']=$this->Glasat_model_gam3ia_omomia->get_by_rkm($rkm);
        $data['members']=$this->Glasat_model_gam3ia_omomia->get_magls_member();

        if($this->input->post('add'))
        {
            $this->Glasat_model_gam3ia_omomia->update_galsa_member($rkm);
            $this->Glasat_model_gam3ia_omomia->update_galsa($rkm);

            $this->message('success','تمت التعديل بنجاح');
            redirect('md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia');


        }
        $data['title']="نعديل جلسة ";
        $data['title_t']="قائمة الجلسات";

        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia';
        $this->load->view('admin_index', $data);


    }*/
    
  /*   public function update_galsa($rkm)
    {
        $data['last_galsa']=$this->Glasat_model_gam3ia_omomia->get_by_rkm($rkm)->glsa_rkm;
        $data['galsa_member']=$this->Glasat_model_gam3ia_omomia->get_galsa_member($rkm);

        $data['last_magls_update']=$this->Glasat_model_gam3ia_omomia->get_by_rkm($rkm);
        $data['members']=$this->Glasat_model_gam3ia_omomia->get_magls_member();

        if($this->input->post('add'))
        {
            $this->Glasat_model_gam3ia_omomia->update_galsa_member($rkm);
            $this->Glasat_model_gam3ia_omomia->update_galsa($rkm);
            $this->message('success','تمت التعديل بنجاح');
            redirect('md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia');

        }
        $data['title']="تعديل جلسة ";
        $data['title_t']="قائمة الجلسات";

        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia';
        $this->load->view('admin_index', $data);
    }*/
    
  /*************************************************/
       public function update_galsa($rkm)
    {
        $data['last_galsa']=$this->Glasat_model_gam3ia_omomia->get_by_rkm($rkm)->glsa_rkm;
        $data['galsa_member']=$this->Glasat_model_gam3ia_omomia->get_galsa_member($rkm);
        $data['last_magls_update']=$this->Glasat_model_gam3ia_omomia->get_by_rkm($rkm);
        $data['members']=$this->Glasat_model_gam3ia_omomia->get_magls_member();
        //yaraaa
        $data['all_Emps'] = $this->Glasat_model_gam3ia_omomia->get_by_id('employees',array('employee_type'=>1,'status'=>96));
        $data['all_places'] = $this->Glasat_model_gam3ia_omomia->get_by_id('md_settings',array('type'=>5));
        //yaraaa
        if($this->input->post('add'))
        {
         //   $this->test($_POST);
          //  $this->Glasat_model_gam3ia_omomia->update_galsa_member($rkm);
            $this->Glasat_model_gam3ia_omomia->update_galsa($rkm);
            $this->message('success','تمت التعديل بنجاح');
            redirect('md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia');
        }
        $data['title']="تعديل جلسة ";
        $data['title_t']="قائمة الجلسات";
        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia';
        $this->load->view('admin_index', $data);
    }
  
  
  
      
    
    
    
   public function delete_galsa($id,$glsa_rkm){
    
    $Conditions_arr=array("id"=>$id); 
    $Conditions_arr_hdoor=array("glsa_rkm"=>$glsa_rkm); 
    $this->Glasat_model_gam3ia_omomia->delete("md_all_glasat_gam3ia_omomia",$Conditions_arr);
    $this->Glasat_model_gam3ia_omomia->delete("md_all_glasat_hdoor_gam3ia_omomia",$Conditions_arr_hdoor);
   // $this->Glasat_model_gam3ia_omomia->delete("md_gadwal_a3mal",$Conditions_arr_hdoor);

      redirect("md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia", 'refresh');
   }
   
   
   
       public function det_datiles()
    {

        $galsa_rkm = $this->input->post('glsa_rkm');
        $data['galsa_member'] = $this->Glasat_model_gam3ia_omomia->get_all_details($galsa_rkm);
//        $this->test($data);
        $this->load->view('admin/md/all_glasat_gam3ia_omomia/load_datiles_member', $data);
    }


    public function print_mahdr($galsa_id_fk)
    {
            $this->load->model('md/all_glasat_gam3ia_omomia/Start_galsa_gam3ia_omomia_model');
       $data['last_galsa']=$this->Start_galsa_gam3ia_omomia_model->get_open_galsa();
       $data['mahawer'] = $this->Start_galsa_gam3ia_omomia_model->get_all_mahawer_new($data['last_galsa'] - 1);

      $data['galsa_details']=$this->Glasat_model_gam3ia_omomia->select_all_glasat_by_rkm($galsa_id_fk);

       // $data['subview'] = 'admin/md/print_mahdr/print_mahdr_view';
        $this->load->view('admin/md/print_mahdr/print_mahdr_view', $data);
    }
    
    
      private function upload_image($file_name, $filepath = false)
    {
        if($filepath == false) {
            $config['upload_path'] = 'uploads/images';
        }
        else {
            $config['upload_path'] = $filepath;
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
         $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    
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

    private function upload_file($file_name, $filepath = false)
    {
        if($filepath == false) {
            $config['upload_path'] = 'uploads/files';
        }
        else {
            $config['upload_path'] = $filepath;
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
         $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    public function add_attach($glsa_id_fk){//md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/add_attach

        if ($this->input->post('save')){

            if (isset($_FILES['file'])){
                $file = $this->upload_file("file",'uploads/md/all_glasat_gam3ia_omomia_attaches');
            }
            $this->Glasat_model_gam3ia_omomia->insert_attach($glsa_id_fk, $file);

//            $this->message('success','  تم الإضافة بنجاح');
//            redirect('md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/add_attach/'.$glsa_id_fk,'refresh');
        }
        $data['galsa']=$this->Glasat_model_gam3ia_omomia->get_by("md_all_glasat_gam3ia_omomia", array("id"=>$glsa_id_fk));
        $data['records']=$this->Glasat_model_gam3ia_omomia->get_galsa_attach($glsa_id_fk);

        $data['title']="إضافة مرفقات ";
        $data['title_t']=" المرفقات ";
        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/add_attach';
        $this->load->view('admin_index', $data);
    }

    public function download_file($id,$type=3)
    {
        $this->load->helper('download');
        if($type == 3 ) {
            $name_folder = "all_glasat_gam3ia_omomia_attaches";
        }else if($type == 1){
            $name_folder = "all_glasat_gam3ia_omomia_morfaq";
        }

        $row = $this->Glasat_model_gam3ia_omomia->get_by("md_".$name_folder, array("id" => $id));
        $type = pathinfo($row->file)['extension'];
        $data = file_get_contents('uploads/md/'.$name_folder."/" . $row->file);

        $name=$row->title.'.'.$type;
        force_download($name, $data);
    }

    public function read_file($id)
    {
        $this->load->helper('file');
        $row= $this->Glasat_model_gam3ia_omomia->get_by("md_all_glasat_gam3ia_omomia_attaches", array("id"=>$id));
        $type = pathinfo($row->file)['extension'];
        $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
        $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
        if (in_array($type, $arry_images)) {
            $type_doc=1;
        } elseif (in_array(strtoupper($type), $arr_doc)) {
            $type_doc=2;
        }
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/md/all_glasat_gam3ia_omomia_attaches/' . $row->file;
        switch ($type_doc) {
            case 1:
            {
                header('Content-Type: image/' . $type);
                break;
            }
            case 2:
            {
                header('Content-Type: application/pdf');
                break;
            }
        }
        header('Content-Discription:inline; filename="' . $row->title   . '"');
        header('Content-Disposition: filename="'.$row->title   .'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

    public function delete_attach()
    {
        $id = $this->input->post('attach');
        $type = $this->input->post('type');
        if($type == 3){
            $table ="md_all_glasat_gam3ia_omomia_attaches";
        }else {
            $table ="md_all_glasat_gam3ia_omomia_morfaq";
        }
        $this->Glasat_model_gam3ia_omomia->delete_attach($id,$table);
    }

    public function add_image($glsa_id_fk){//md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/add_image

        if ($this->input->post('save')){

            if (isset($_FILES['file'])){
                $file = $this->upload_file("file",'uploads/md/all_glasat_gam3ia_omomia_morfaq');
            }
            $this->Glasat_model_gam3ia_omomia->insert_morfaq($glsa_id_fk, $file);
//            $this->message('success','  تم الإضافة بنجاح');
//            redirect('md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/add_image/'.$glsa_id_fk,'refresh');
        }
        $data['galsa']=$this->Glasat_model_gam3ia_omomia->get_by("md_all_glasat_gam3ia_omomia", array("id"=>$glsa_id_fk));
        $data['records']=$this->Glasat_model_gam3ia_omomia->get_galsa_morfaq($glsa_id_fk,$type=1);

        $data['title']="إضافة صور ";
        $data['title_t']=" الصور ";
        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/add_image';
        $this->load->view('admin_index', $data);
    }


 /*   public function add_video($glsa_id_fk){//md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/add_video

        if ($this->input->post('save')){

            if (!empty($this->input->post('file'))){
                $video_link = $this->input->post('file');
                $video_id = explode("?v=", $video_link); // For videos like http://www.youtube.com/watch?v=...
                if (empty($video_id[1])) { $video_id = explode("/v/", $video_link);} // For videos like http://www.youtube.com/watch/v/..
                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];

                $file = $video_id;
            }
            $this->Glasat_model_gam3ia_omomia->insert_morfaq($glsa_id_fk, $file);
//            $this->message('success','  تم الإضافة بنجاح');
//            redirect('md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/add_video/'.$glsa_id_fk,'refresh');
        }
        $data['galsa']=$this->Glasat_model_gam3ia_omomia->get_by("md_all_glasat_gam3ia_omomia", array("id"=>$glsa_id_fk));
        $data['records']=$this->Glasat_model_gam3ia_omomia->get_galsa_morfaq($glsa_id_fk,$type=2);

        $data['title']="إضافة فديوهات ";
        $data['title_t']=" الفديوهات ";
        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/add_video';
        $this->load->view('admin_index', $data);
    }
  
  */
  
    public function add_video($glsa_id_fk){//md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/add_video

        if ($this->input->post('save')){

            if (!empty($this->input->post('file'))){
                $video_link = $this->input->post('file');
                $video_id = explode("?v=", $video_link); // For videos like http://www.youtube.com/watch?v=...
                if (empty($video_id[1])) { $video_id = explode("/v/", $video_link);} // For videos like http://www.youtube.com/watch/v/..
                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];

                $file = $video_id;
            }
            $this->Glasat_model_gam3ia_omomia->insert_morfaq($glsa_id_fk, $file);
//            $this->message('success','  تم الإضافة بنجاح');
//            redirect('md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/add_video/'.$glsa_id_fk,'refresh');
        }
        $data['galsa']=$this->Glasat_model_gam3ia_omomia->get_by("md_all_glasat_gam3ia_omomia", array("id"=>$glsa_id_fk));
        $data['records']=$this->Glasat_model_gam3ia_omomia->get_galsa_morfaq($glsa_id_fk,$type=2);

        $data['title']="إضافة فيديوهات ";
        $data['title_t']=" الفيديوهات ";
        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/add_video';
        $this->load->view('admin_index', $data);
    }
  
  
  
public function change_status()
    {
        $valu = $this->input->post('valu');
        $id = $this->input->post('id');
        $data['status'] = $this->Glasat_model_gam3ia_omomia->change_status($valu, $id);

        echo json_encode($data);

    }
    
/****************************************************/

    private function upload_muli_file($input_name){
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
        $config['upload_path'] = 'uploads/md/all_mehwr_gam3ia_omomia';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '10000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
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

    public function mehwr_glsa($glsa_rkm){ // md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/mehwr_glsa

        $this->load->model('md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia_model');

        //$data['all_data'] = $this->All_mehwr_gam3ia_omomia_model->get_mehwr($glsa_rkm);

        if ($this->input->post('btn')) {
            $files=$this->upload_muli_file("mehwar_morfaq");
            // $this->test($_POST);
            // die;
            $this->All_mehwr_gam3ia_omomia_model->insert_mehwr($files,$glsa_rkm);
            messages('success', 'تم الإضافة بنجاح ');
            redirect('md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/mehwr_glsa/'.$glsa_rkm, 'refresh');
        }

        $data['last_galsa']=$glsa_rkm;

        $data['title'] = 'إضافة محاور ';
        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/mehwr_glsa';
        $this->load->view('admin_index', $data);
    }

    public function get_table_mehwer()// md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/get_table_mehwer
    {
        $this->load->model('md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia_model');
        $glsa_rkm = $this->input->post('glsa_rkm');
        $data['glsa_rkm'] = $glsa_rkm;
        $data['result'] = $this->All_mehwr_gam3ia_omomia_model->get_mehwr_details($glsa_rkm);
        $this->load->view('admin/md/all_glasat_gam3ia_omomia/get_table_mehwer_view', $data);
    }
    public function delete_mehwr_galsa(){
        $this->load->model('md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia_model');
        $id=$this->input->post('id');
        $this->All_mehwr_gam3ia_omomia_model->delete_row($id);
        echo 1;
        return;
    }

    public function a3da_glsa($glsa_rkm){ // md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/a3da_glsa


        $data['last_galsa']=$glsa_rkm;
        $data['galsa_member']=$this->Glasat_model_gam3ia_omomia->get_galsa_member($glsa_rkm);

        //$data['last_magls_update']=$this->Glasat_model_gam3ia_omomia->get_by_rkm($glsa_rkm);
        $data['members']=$this->Glasat_model_gam3ia_omomia->get_magls_member();

        if($this->input->post('add'))
        {
            $this->Glasat_model_gam3ia_omomia->update_galsa_member($glsa_rkm);

            $this->message('success','تمت التعديل بنجاح');
            redirect('md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/a3da_glsa/'.$glsa_rkm, 'refresh');
        }

        $data['title'] = 'أعضاء الجلسه ';
        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/a3da_glsa';
        $this->load->view('admin_index', $data);
    }    
    
    
    
    
}