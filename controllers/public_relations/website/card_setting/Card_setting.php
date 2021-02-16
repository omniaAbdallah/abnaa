<?php


class Card_setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Public_relations/website/card_setting/Card_setting_model');

    }
    private function upload_img($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP';
        $config['max_size'] = '1024*88888888888888888888';
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile,$folder);
            return $datafile['file_name'];
        }
    }

    function thumb($data, $folder = false)
    {
        $this->load->library('image_lib');

        if (!empty($folder)) {
            $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];

        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;

        $this->image_lib->initialize($config);

        $this->image_lib->resize();
    }

    public function message($type, $text, $method = false)
    {
        $this->load->library("session");
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }
    function index()
    {/*public_relations/website/card_setting/Card_setting*/
        if ($this->input->post('save')) {
         /*   echo '<pre>';
            print_r($_POST);
            die;*/
            $img = $this->upload_img('namozg_image', 'public_relations/card_setting');

            $this->Card_setting_model->insert_card($img);
            $this->message("success", "تم إضافة بنجاح");
            redirect('public_relations/website/card_setting/Card_setting', 'refresh');
        } else {
            $data['title'] = "إعداد  البطاقات";
           $data['all_cards']= $this->Card_setting_model->get_by('pr_card_setting');
            $data['subview'] = 'admin/public_relations/website/card_setting/card_setting_view';
            $this->load->view('admin_index', $data);
        }
    }
    public function delete_card($id)
    {
        $id = base64_decode($id);
        $this->Card_setting_model->delete_card($id);
        $this->message("success", "تم حذف الصورة  بنجاح");
        redirect('public_relations/website/card_setting/Card_setting', 'refresh');
    }

}