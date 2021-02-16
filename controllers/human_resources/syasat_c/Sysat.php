
<?php
class Sysat extends MY_Controller
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
        $this->load->model('human_resources_model/syasat_m/Syasat_model');
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

public function index()//human_resources/syasat_c/Sysat
{
    $data['one_data'] = $this->Syasat_model->get_attach();
    $data['edarat']=$this->Syasat_model->get_edarat();
  $data['title']='السياسات واللوائح';
    $data['subview'] = 'admin/Human_resources/syasat_v/add_syasat_view';
    $this->load->view('admin_index', $data);
}
    public function add_morfaq()
    {

        $images=$this->upload_muli_file("files");
       $this->Syasat_model->insert_attach($images);
        redirect('human_resources/syasat_c/Sysat', 'refresh');
    }

    public function get_attaches()
    {
       
      $data['one_data'] = $this->Syasat_model->get_attach();
      $data['edarat']=$this->Syasat_model->get_edarat();
        $this->load->view('admin/Human_resources/syasat_v/load',$data);
    }
    public function Delete_attach()
    {
        $id=$this->input->post('id');
        $this->Syasat_model->delete_attach($id);

        redirect('human_resources/syasat_c/Sysat', 'refresh');
    }
       

    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/human_resources/syasat/' . $file_name;
        header('Content-Type: application/pdf');
        $row = $this->Syasat_model->get_by('hr_syasat', array("file" => $file_name));
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
            $name_folder = "syasat";
        } 
        $row = $this->Syasat_model->get_by('hr_syasat', array("id" => $id));
        $type = pathinfo($row->file)['extension'];
        $data = file_get_contents('uploads/human_resources/' . $name_folder . "/" . $row->file);
        $name = $row->title . '.' . $type;
        force_download($name, $data);
    }
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
      
        $config['upload_path'] = 'uploads/human_resources/syasat';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
}?>