<?php
//E:\xampp\htdocs\ABNAAv1\application\controllers\human_resources\sysat_gam3ia\Sysat_gam3ia_c.php
class Sysat_gam3ia_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));  
        /*************************************************************/
        $this->load->model('human_resources_model/syasat_gam3ia_m/Syasat_model');
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
    }
    public function index()//human_resources/sysat_gam3ia/Sysat_gam3ia_c
    {
        $data['one_data'] = $this->Syasat_model->get_all_data();
        $data['edarat']=$this->Syasat_model->get_edarat();
    $data['title']='السياسات واللوائح';
        $data['subview'] = 'admin/Human_resources/syasat_gam3ia_v/add_syasat_view';
        $this->load->view('admin_index', $data);
    }
    public function insert()
    {
        $img ='file';
        $img_file = $this->upload_image_2($img, 'human_resources/sysat_gam3ia');
      //  $images=$this->upload_muli_file("file");
       $this->Syasat_model->insert($img_file);
        redirect('human_resources/sysat_gam3ia/Sysat_gam3ia_c', 'refresh');
    }
    public function get_f2a()
    {
        $data['fe2a']=$this->input->post('fe2a');
        $this->load->view('admin/Human_resources/syasat_gam3ia_v/load', $data);
    }
    public function edite($id)
    {
        $data['result'] = $this->Syasat_model->get_by('hr_all_sysat', array("id" => $id));
        $data['edarat']=$this->Syasat_model->get_edarat();
      $data['title']='السياسات واللوائح';
        $data['subview'] = 'admin/Human_resources/syasat_gam3ia_v/add_syasat_view';
        $this->load->view('admin_index', $data);
    }
    // load_details
    public function load_details()
    {
        $id=$this->input->post('row_id');
        $data['result'] = $this->Syasat_model->get_by('hr_all_sysat', array("id" => $id));
        $this->load->view('admin/Human_resources/syasat_gam3ia_v/load_details', $data);
    }
    public function update($id)
    {
        $img ='file';
        $img_file = $this->upload_image_2($img, 'human_resources/sysat_gam3ia');
      //  $images=$this->upload_muli_file("file");
       // $this->test($img_file);
       $this->Syasat_model->update($img_file,$id);
        redirect('human_resources/sysat_gam3ia/Sysat_gam3ia_c', 'refresh');
    }
    private function upload_image_2($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile, $folder);
            return $datafile['file_name'];
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
    public function Delete_attach($id)
    {
      
        $this->Syasat_model->delete_attach($id);
        redirect('human_resources/sysat_gam3ia/Sysat_gam3ia_c', 'refresh');
    }
    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/human_resources/sysat_gam3ia/' . $file_name;
        header('Content-Type: application/pdf');
        $row = $this->Syasat_model->get_by('hr_all_sysat', array("attach_file" => $file_name));
        header('Content-Discription:inline; filename="' . $row->title . '"');
        header('Content-Disposition: filename="' . $row->title  . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function download_file($id, $type = 3)
    {
        $this->load->helper('download');
        if ($type == 3) {
            $name_folder = "sysat_gam3ia";
        } 
        $row = $this->Syasat_model->get_by('hr_all_sysat', array("id" => $id));
        $type = pathinfo($row->file)['extension'];
        $data = file_get_contents('uploads/human_resources/' . $name_folder . "/" . $row->attach_file);
        $name = $row->title . '.' . $type;
        force_download($name, $data);
    }

}?>