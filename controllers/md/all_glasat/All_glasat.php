<?php
class All_glasat extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('md/all_glasat/Glasat_model');
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
  /*  private function upload_image($file_name)
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
    /*private function upload_file($file_name)
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
        return $this->session->set_flashdata('message', '<script> swal({
                    title:"' . $text . '" ,
                    type:"' . $type . '" ,
                    confirmButtonText: "تم"
                })</script>');
    }
   /* public function index()
    {
       if($this->input->post('add'))
       {
           $this->Glasat_model->insert_galsa();
           $this->Glasat_model->insert_galsa_member();
           $this->message('success','تمت الاضافه بنجاح');
           redirect('md/all_glasat/all_glasat');
       }
        $data['last_magls']=$this->Glasat_model->get_last_magls();
        $data['records']=$this->Glasat_model->select_all();
         $data['open_galesa'] = $this->Glasat_model->get_open_galesa();
        $data['last_galsa']=$this->Glasat_model->get_last_galsa();
        $data['members']=$this->Glasat_model->get_magls_member($data['last_magls']->mg_code);
        $data['title']="فتح جلسة جديدة ";
        $data['title_t']="قائمة الجلسات";
        $data['subview'] = 'admin/md/all_glasat/all_glasat';
        $this->load->view('admin_index', $data);
    }*/
     public function index()
    {
       if($this->input->post('add'))
       {
           $this->Glasat_model->insert_galsa();
           $this->Glasat_model->insert_galsa_member();
           $this->message('success','تمت الاضافه بنجاح');
           redirect('md/all_glasat/all_glasat');
       }
        $data['last_magls']=$this->Glasat_model->get_last_magls();
        $data['records']=$this->Glasat_model->select_all();
        $data['open_galesa'] = $this->Glasat_model->get_open_galesa();
        $data['last_galsa']=$this->Glasat_model->get_last_galsa();
        $data['members']=$this->Glasat_model->get_magls_member($data['last_magls']->mg_code);
        $data['all_Emps'] = $this->Glasat_model->get_by_id('employees',array('employee_type'=>1,'status'=>96));
        $data['all_places'] = $this->Glasat_model->get_by_id('md_settings',array('type'=>5));
        $data['title']="فتح جلسة جديدة ";
        $data['title_t']="قائمة الجلسات";
        $data['subview'] = 'admin/md/all_glasat/all_glasat';
        $this->load->view('admin_index', $data);
    }
   /* public function update_galsa($rkm,$code)
    {
        $data['last_galsa']=$this->Glasat_model->get_by_rkm($rkm)->glsa_rkm;
        $data['galsa_member']=$this->Glasat_model->get_galsa_member($rkm,$code);
        $data['last_magls_update']=$this->Glasat_model->get_by_rkm($rkm);
        $data['members']=$this->Glasat_model->get_magls_member($data['last_magls_update']->mgls_code);
        if($this->input->post('add'))
        {
            $this->Glasat_model->update_galsa_member($rkm,$code);
            $this->Glasat_model->update_galsa($rkm,$code);
            $this->message('success','تمت التعديل بنجاح');
            redirect('md/all_glasat/all_glasat');
        }
        $data['title']="نعديل جلسة ";
        $data['title_t']="قائمة الجلسات";
        $data['subview'] = 'admin/md/all_glasat/all_glasat';
        $this->load->view('admin_index', $data);
    }*/
        public function update_galsa($rkm,$code)
    {
        $data['last_galsa']=$this->Glasat_model->get_by_rkm($rkm)->glsa_rkm;
        $data['galsa_member']=$this->Glasat_model->get_galsa_member($rkm,$code);
        $data['last_magls_update']=$this->Glasat_model->get_by_rkm($rkm);
        $data['members']=$this->Glasat_model->get_magls_member($data['last_magls_update']->mgls_code);
        $data['all_Emps'] = $this->Glasat_model->get_by_id('employees',array('employee_type'=>1,'status'=>96));
        $data['all_places'] = $this->Glasat_model->get_by_id('md_settings',array('type'=>5));
        if($this->input->post('add'))
        {
      //      $this->test($_POST);
            $this->Glasat_model->update_galsa_member($rkm,$code);
            $this->Glasat_model->update_galsa($rkm,$code);
            $this->message('success','تمت التعديل بنجاح');
            redirect('md/all_glasat/all_glasat');
        }
        $data['title']="تعديل جلسة ";
        $data['title_t']="قائمة الجلسات";
        $data['subview'] = 'admin/md/all_glasat/all_glasat';
        $this->load->view('admin_index', $data);
    }
       public function send_da3wat()
    {
        $this->Glasat_model->send_da3wat();
        echo 1;
        return;
    }
  /*************************************************/
     public function all_mahadrs()
    {
        $data['records']=$this->Glasat_model->select_all_galasat_finshed();
        $data['title']="قائمة بمحاضر الجلسات ";
        $data['title_t']="قائمة بمحاضر الجلسات";
        $data['subview'] = 'admin/md/all_mahadrs/all_mahadrs_view';
        $this->load->view('admin_index', $data);
    }
    public function print_mahdr($galsa_id_fk)
    {
      $data['galsa_details']=$this->Glasat_model->select_all_glasat_by_rkm($galsa_id_fk);
       // $data['subview'] = 'admin/md/print_mahdr/print_mahdr_view';
        $this->load->view('admin/md/print_mahdr/print_mahdr_view', $data);
    }    
   public function delete_galsa($id,$glsa_rkm){
    $Conditions_arr=array("id"=>$id); 
    $Conditions_arr_hdoor=array("glsa_rkm"=>$glsa_rkm); 
    $this->Glasat_model->delete("md_all_glasat",$Conditions_arr);
    $this->Glasat_model->delete("md_all_glasat_hdoor",$Conditions_arr_hdoor);
    $this->Glasat_model->delete("md_gadwal_a3mal",$Conditions_arr_hdoor);
      redirect("md/all_glasat/all_glasat", 'refresh');
   }
/***********************************************************************/
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
    public function add_attach($glsa_id_fk){//md/all_glasat/all_glasat/add_attach
        if ($this->input->post('save')){
            if (isset($_FILES['file'])){
                $file = $this->upload_file("file",'uploads/md/md_all_glasat_attaches');
            }
            $this->Glasat_model->insert_attach($glsa_id_fk, $file);
//            $this->message('success','  تم الإضافة بنجاح');
//            redirect('md/all_glasat/all_glasat/add_attach/'.$glsa_id_fk,'refresh');
        }
        $data['galsa']=$this->Glasat_model->get_by("md_all_glasat", array("id"=>$glsa_id_fk));
        $data['records']=$this->Glasat_model->get_galsa_attach($glsa_id_fk);
        $data['title']="إضافة مرفقات ";
        $data['title_t']=" المرفقات ";
        $data['subview'] = 'admin/md/all_glasat/add_attach';
        $this->load->view('admin_index', $data);
    }
    public function download_file($id,$type=3)
    {
        $this->load->helper('download');
        if($type == 3 ) {
            $name_folder = "md_all_glasat_attaches";
        }else if($type == 1){
            $name_folder = "md_all_glasat_morfaq";
        }
        $row = $this->Glasat_model->get_by($name_folder, array("id" => $id));
        $type = pathinfo($row->file)['extension'];
        $data = file_get_contents('uploads/md/'.$name_folder."/" . $row->file);
        $name=$row->title.'.'.$type;
        force_download($name, $data);
    }
    public function read_file($id)
    {
        $this->load->helper('file');
        $row= $this->Glasat_model->get_by("md_all_glasat_attaches", array("id"=>$id));
        $type = pathinfo($row->file)['extension'];
        $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
        $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
        if (in_array($type, $arry_images)) {
            $type_doc=1;
        } elseif (in_array(strtoupper($type), $arr_doc)) {
            $type_doc=2;
        }
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/md/md_all_glasat_attaches/' . $row->file;
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
            $table ="md_all_glasat_attaches";
        }else {
            $table ="md_all_glasat_morfaq";
        }
        $this->Glasat_model->delete_attach($id,$table);
    }
    public function add_image($glsa_id_fk){//md/all_glasat/all_glasat/add_image
        if ($this->input->post('save')){
            if (isset($_FILES['file'])){
                $file = $this->upload_file("file",'uploads/md/md_all_glasat_morfaq');
            }
            $this->Glasat_model->insert_morfaq($glsa_id_fk, $file);
//            $this->message('success','  تم الإضافة بنجاح');
//            redirect('md/all_glasat/all_glasat/add_image/'.$glsa_id_fk,'refresh');
        }
        $data['galsa']=$this->Glasat_model->get_by("md_all_glasat", array("id"=>$glsa_id_fk));
        $data['records']=$this->Glasat_model->get_galsa_morfaq($glsa_id_fk,$type=1);
        $data['title']="إضافة صور ";
        $data['title_t']=" الصور ";
        $data['subview'] = 'admin/md/all_glasat/add_image';
        $this->load->view('admin_index', $data);
    }
   /* public function add_video($glsa_id_fk){//md/all_glasat/all_glasat/add_video
        if ($this->input->post('save')){
            if (!empty($this->input->post('file'))){
                $video_link = $this->input->post('file');
                $video_id = explode("?v=", $video_link); // For videos like http://www.youtube.com/watch?v=...
                if (empty($video_id[1])) { $video_id = explode("/v/", $video_link);} // For videos like http://www.youtube.com/watch/v/..
                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];
                $file = $video_id;
            }
            $this->Glasat_model->insert_morfaq($glsa_id_fk, $file);
//            $this->message('success','  تم الإضافة بنجاح');
//            redirect('md/all_glasat/all_glasat/add_video/'.$glsa_id_fk,'refresh');
        }
        $data['galsa']=$this->Glasat_model->get_by("md_all_glasat", array("id"=>$glsa_id_fk));
        $data['records']=$this->Glasat_model->get_galsa_morfaq($glsa_id_fk,$type=2);
        $data['title']="إضافة فديوهات ";
        $data['title_t']=" الفديوهات ";
        $data['subview'] = 'admin/md/all_glasat/add_video';
        $this->load->view('admin_index', $data);
    }
*/
    public function add_video($glsa_id_fk){//md/all_glasat/all_glasat/add_video
        if ($this->input->post('save')){
            if (!empty($this->input->post('file'))){
                $video_link = $this->input->post('file');
                $video_id = explode("?v=", $video_link); // For videos like http://www.youtube.com/watch?v=...
                if (empty($video_id[1])) { $video_id = explode("/v/", $video_link);} // For videos like http://www.youtube.com/watch/v/..
                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];
                $file = $video_id;
            }
            $this->Glasat_model->insert_morfaq($glsa_id_fk, $file);
//            $this->message('success','  تم الإضافة بنجاح');
//            redirect('md/all_glasat/all_glasat/add_video/'.$glsa_id_fk,'refresh');
        }
        $data['galsa']=$this->Glasat_model->get_by("md_all_glasat", array("id"=>$glsa_id_fk));
        $data['records']=$this->Glasat_model->get_galsa_morfaq($glsa_id_fk,$type=2);
        $data['title']="إضافة فيديوهات ";
        $data['title_t']=" الفيديوهات ";
        $data['subview'] = 'admin/md/all_glasat/add_video';
        $this->load->view('admin_index', $data);
    }
public function change_status()
    {
        $valu = $this->input->post('valu');
        $id = $this->input->post('id');
        $data['status'] = $this->Glasat_model->change_status($valu, $id);
        echo json_encode($data);
    }
/***********************************/
public function mehwr_glsa($glsa_rkm)
{ // md/all_glasat/All_glasat/mehwr_glsa
    $this->load->model('md/all_mehwr/All_mehwr_model');
    if ($this->input->post('btn')) {
        $files = $this->upload_muli_file("mehwar_morfaq");
        $this->All_mehwr_model->insert_mehwr($files,$glsa_rkm);
        $this->message('success', 'تم الإضافة بنجاح ');
        redirect('md/all_glasat/All_glasat/mehwr_glsa/' . $glsa_rkm, 'refresh');
    }
    $data['last_mehwer'] = $this->All_mehwr_model->get_last_mehwer();
    $data['last_galsa'] = $glsa_rkm;
    $data['title'] = 'إضافة محاور ';
    $data['subview'] = 'admin/md/all_glasat/mehwr_glsa';
    $this->load->view('admin_index', $data);
}    
public function get_table_mehwer()// md/all_glasat/All_glasat/get_table_mehwer
{
    $this->load->model('md/all_mehwr/All_mehwr_model');
    $glsa_rkm = $this->input->post('glsa_rkm');
    $data['glsa_rkm'] = $glsa_rkm;
    
    $data['result'] = $this->All_mehwr_model->get_mehwr_details($glsa_rkm);
    $this->load->view('admin/md/all_glasat/get_table_mehwer_view', $data);
} 
  public function delete_mehwr_galsa()
{
    $this->load->model('md/all_mehwr/All_mehwr_model');
    $id = $this->input->post('id');
    $this->All_mehwr_model->delete_row($id);
    echo 1;
    return;
}
public function a3da_glsa($rkm)
{ // md/all_glasat/All_glasat/a3da_glsa
    $data['last_galsa'] = $this->Glasat_model->get_by_rkm($rkm)->glsa_rkm;
    $code=$this->Glasat_model->get_by_rkm($rkm)->mgls_code;
    $data['galsa_member'] = $this->Glasat_model->get_galsa_member($rkm, $code);
   
    $data['last_magls_update'] = $this->Glasat_model->get_by_rkm($rkm);
    $data['members'] = $this->Glasat_model->get_magls_member($data['last_magls_update']->mgls_code);
   // $this->test(  $data['members']);
    if ($this->input->post('add')) {
        $this->Glasat_model->update_galsa_member($rkm,$code);
        $this->message('success', 'تمت التعديل بنجاح');
        redirect('md/all_glasat/All_glasat/a3da_glsa/' . $rkm, 'refresh');
    }
    $data['title'] = 'أعضاء الجلسه ';
    $data['subview'] = 'admin/md/all_glasat/a3da_glsa';
    $this->load->view('admin_index', $data);
}
/*16-7-om*/
    public function det_datiles()
    {
        $galsa_rkm = $this->input->post('glsa_rkm');
        $data['galsa_member'] = $this->Glasat_model->get_all_details($galsa_rkm);
    //$this->test($data['galsa_member']);
        $this->load->view('admin/md/all_glasat/load_datiles_member', $data);
    }
    // <yara15-10-2020>
    public function getConnection_emp()
    {
        $all_Emps = $this->Glasat_model->get_all_emp();
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_Emps)) {
            $x = 1;
            foreach ($all_Emps as $row_emp) {
                $arr_emp['data'][] = array(
                    $x,
                    '<a 
                         ondblclick="Get_emp_Name(this)"
                          data-code="' . $row_emp->id . '"
                          data-name="' . $row_emp->employee . '"
                           >' . $row_emp->emp_code . '</a>',
                    '<a  
                           ondblclick="Get_emp_Name(this)"
                            data-code="' . $row_emp->id . '"
                            data-name="' . $row_emp->employee . '"
                             >' . $row_emp->employee . '</a>',
                    '<a 
                           ondblclick="Get_emp_Name(this)"
                            data-code="' . $row_emp->id . '"
                            data-name="' . $row_emp->employee . '"
                             >' . $row_emp->mosma_wazefy_n . '</a>',
                    '<a 
                             ondblclick="Get_emp_Name(this)"
                              data-code="' . $row_emp->id . '"
                              data-name="' . $row_emp->employee . '"
                               >' . $row_emp->edara_n . '</a>',
                    '<a 
                               ondblclick="Get_emp_Name(this)"
                                data-code="' . $row_emp->id . '"
                                data-name="' . $row_emp->employee . '"
                                 >' . $row_emp->qsm_n . '</a>',
                );
                $x++;
            }
        }
        echo json_encode($arr_emp);
    }
    public function get_option()// human_resources/egtma3at/Egtma3at_c/get_table_mehwer
    {
        $this->load->view('admin/md/all_glasat/load_optios');
    }
    private function upload_muli_file($input_name)
    {
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
        $config['upload_path'] = 'uploads/md/all_mehwr_magles_edara';
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
    //</yara15-10-2020>
}