<?php

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('Users_constriction');
        $this->load->model('administrative_affairs_models/employee');
        $this->load->model('Difined_model');
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

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
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

    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
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

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');
        }
    }

    public function add_user($id)
    {
        if ($this->input->post('add') && $id == 0) {
            $file_name = 'user_photo';
            $file = $this->upload_image($file_name);
            $this->Users_constriction->insert($file);
            $this->message('success', 'إضافة مستخدم');
            redirect('User/add_user/0', 'refresh');
        }
        if ($this->input->post('add') && $id != 0) {
            $file_name = 'user_photo';
            $file = $this->upload_image($file_name);
            $this->Users_constriction->update($id, $file);
            $this->message('success', 'تعديل مستخدم');
            redirect('User/add_user/0', 'refresh');
        }
        if ($id != 0) {
            $data['result'] = $this->Users_constriction->display($id);
            $data['deps'] = $this->Users_constriction->select_allEmp($data['result']['role_id_fk']);
            $data['emps'] = $this->Users_constriction->select_emp_without_code();
            $data['all_emps'] = $this->Users_constriction->select_allEmp();
            $data['magls'] = $this->Users_constriction->select_magls_members();
            $data['all_magls'] = $this->Users_constriction->select_all_magls_members_t();
        }

        $data['emps'] = $this->Users_constriction->select_emp_without_code();
        $data['magls'] = $this->Users_constriction->select_magls_members();
        $data['table'] = $this->Users_constriction->select();
        $data['subview'] = 'admin/users/users';
        $this->load->view('admin_index', $data);

    }

    public function check()
    {
        $username = $this->input->post('username');
        $exists = $this->Users_constriction->userename_exists($username);
        $count = count($exists);
        if (empty($count)) {
            var_dump("لا يوجد مستخدم بهذا الإسم .. مستخدم جديد :)");
            die;
        } else {
            var_dump("يوجد مستخدم بهذا الإسم .. برجاء تغييره");
            die;
        }
    }

    public function delete_user($id)
    {
        $this->Users_constriction->delete($id);
        redirect('User/add_user/0', 'refresh');
    }

/*27-4-21-om*/
    public function update_user($id = false)
    {//User/update_user/$_SESSION['user_id']
        if (empty($id)) {
            $id = $_SESSION['user_id'];
        }
        $data['result'] = $this->Users_constriction->display($id);
        $data['result_emp'] = $this->Users_constriction->display_emp($_SESSION['emp_code']);

        $data['subview'] = 'admin/users/update_users';
        $this->load->view('admin_index', $data);
    }

    private function upload_image_2($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumbs($datafile, $folder);
            return $datafile['file_name'];
        }
    }

    private function thumbs($data, $folder = '')
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

    public function update_emp($id)
    {
        if ($this->input->post('add') && $id != 0) {
            $file_name = 'user_photo';
            $file_signatures = 'users_signatures';
            $file = $this->upload_image_2($file_name, 'human_resources/emp_photo');
            $file_sign = $this->upload_image_2($file_signatures, 'human_resources/emp_photo');
            $this->Users_constriction->update_emp($id, $file, $file_sign);
            $this->messages('success', 'تعديل مستخدم');
            redirect('User/update_user/' . $_SESSION['user_id'], 'refresh');
        }
    }

    public function update_users($id)
    {
        if ($this->input->post('add') && $id != 0) {


            $this->load->library(array('form_validation', 'session'));
            $this->load->helper(array('url', 'html', 'form'));
            $this->form_validation->set_rules('user_username', 'Username', 'required');
            $this->form_validation->set_rules('user_pass', 'Password', 'required');
            $this->form_validation->set_rules('user_pass_validate', 'Password Confirmation', ' required|matches[password]');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('required', 'Enter %s');

            $this->Users_constriction->update_user($id);
            $this->messages('success', 'تعديل مستخدم');
            redirect('User/update_user/' . $_SESSION['user_id'], 'refresh');
        }
    }

}