<?php
class Start_galsa_gam3ia_omomia extends MY_Controller
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
        $this->load->model('md/all_glasat_gam3ia_omomia/Start_galsa_gam3ia_omomia_model');
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

    private function upload_image($file_name)
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
    }

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

    private function upload_file($file_name)
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
    }

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

    public function index()
    { // md/all_glasat_gam3ia_omomia/Start_galsa_gam3ia_omomia
        $data['title']="مناقشة الجلسة ";
        $data['last_magls']=$this->Glasat_model_gam3ia_omomia->get_last_magls();
        //   $data['last_galsa']=$this->Glasat_model_gam3ia_omomia->get_last_galsa();
        $data['last_galsa']=$this->Start_galsa_gam3ia_omomia_model->get_open_galsa();

        $data['last_galsa_date'] = $this->Glasat_model_gam3ia_omomia->get_by_rkm($data['last_galsa'] - 1);
        $data['members'] = $this->Glasat_model_gam3ia_omomia->get_last_galsa_member($data['last_galsa'] - 1);
        $data['mahawer'] = $this->Start_galsa_gam3ia_omomia_model->get_all_mahawer($data['last_galsa'] - 1, 0);
       // $this->test($data['mahawer']);
       // die;
        $data['mahawer_end'] = $this->Start_galsa_gam3ia_omomia_model->get_all_mahawer($data['last_galsa'] - 1, 1);
        $data['all_members'] = $this->Glasat_model_gam3ia_omomia->get_magls_member_new();

        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/start_galsa_gam3ia_omomia';
        $this->load->view('admin_index', $data);
    }
    public function update_qrar()
    {
        $this->Start_galsa_gam3ia_omomia_model->update_qrar();
    }
    public function update_member_hdoor()
    {
        $this->Start_galsa_gam3ia_omomia_model->update_table_hoddor();
    }


    public function start_galsa_time()
    {
        //$tim= date("h:i:s");
        $tim= date("h:i A");
        
        $this->Start_galsa_gam3ia_omomia_model->update_start_galsa($tim);
        echo $tim;

    }

    public function end_galsa()
    {
      //  $tim= date("h:i:s");
        $tim= date("h:i A");
        $this->Start_galsa_gam3ia_omomia_model->finished_galsa($tim);

    }




public function change_status()
    {
         $this->load->model('gam3ia_omomia/Gam3ia_omomia_model');
         $id = $this->input->post('id');
         $this->Gam3ia_omomia_model->change_status($id);
    }
    public function add_galsat_mon24a($id) // md/all_glasat_gam3ia_omomia/add_galsat_mon24a
    {
       
        $data['title']="مناقشة الجلسة ";
        $data['last_galsa_date'] = $this->Glasat_model_gam3ia_omomia->get_by_rkm($id);
        $data['members'] = $this->Glasat_model_gam3ia_omomia->get_last_galsa_member($id);
        $data['mahawer'] = $this->Start_galsa_gam3ia_omomia_model->get_all_mahawer($id, 0);
        $data['mahawer_end'] = $this->Start_galsa_gam3ia_omomia_model->get_all_mahawer($id, 1);
        $data['subview'] = 'admin/md/all_glasat_gam3ia_omomia/mon24a_galsa_gam3ia_omomia';
        $this->load->view('admin_index', $data);
    }
    
    
    function save_member(){

    /*        $this->test($_POST);*/
    $this->Glasat_model_gam3ia_omomia->save_member_hdoor();

}


      public function det_datiles_accept(){
          $this->load->model('gam3ia_omomia/Gam3ia_omomia_model');
         $galsa_rkm = $this->input->post('glsa_rkm');
        $data['galsa_member'] = $this->Gam3ia_omomia_model->get_all_details_accept($galsa_rkm);
        $this->load->view('admin/md/all_glasat_gam3ia_omomia/load_datiles_member', $data);
    }
   public function det_datiles_hdoor() // md/all_glasat_gam3ia_omomia/Start_galsa_gam3ia_omomia/det_datiles_hdoor
   {
      $this->load->model('gam3ia_omomia/Gam3ia_omomia_model');
       $galsa_rkm = $this->input->post('glsa_rkm');
       $attend = $this->input->post('attend');
$data['galsa_member'] = $this->Gam3ia_omomia_model->get_all_details_attend_new($galsa_rkm,$attend);

       $this->load->view('admin/md/all_glasat_gam3ia_omomia/load_datiles_member_details', $data);

   }
   
   
   function print_hdoor(){

    $galsa_rkm=$this->input->post('galsa_rkm');
    $data['members'] = $this->Glasat_model_gam3ia_omomia->get_member_hdoor($galsa_rkm);
    $data['galsa_date'] = $this->Glasat_model_gam3ia_omomia->get_by_id('md_all_glasat_gam3ia_omomia',array('glsa_rkm'=>$galsa_rkm),1);
    $this->load->view('admin/md/all_glasat_gam3ia_omomia/print/print_hdoor', $data);
}

 function print_hdoor_mem(){

   $galsa_rkm=$this->input->post('galsa_rkm');
    $data['members'] = $this->Glasat_model_gam3ia_omomia->get_member_hdoor_new($galsa_rkm);
    $data['galsa_date'] = $this->Glasat_model_gam3ia_omomia->get_by_id('md_all_glasat_gam3ia_omomia',array('glsa_rkm'=>$galsa_rkm),1);
    $this->load->view('admin/md/all_glasat_gam3ia_omomia/print/print_hdoor', $data);
}

function get_hdoor_num()
{
    $galsa_rkm = $this->input->post('galsa_rkm');
    $data = $this->Glasat_model_gam3ia_omomia->get_hdoor_num($galsa_rkm);
    echo json_encode($data);
}

}