<?php


class Structure extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('human_resources_model/structure_model/Structure_model');

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');

    }


    public function buildTree($elements, $parent = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element->from_id == $parent) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->subs = $children;
                }
                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }

    function index()/*human_resources/Structure*/
    {

        $data['records'] = $this->Structure_model->get_by('hr_administrative_structure', false, false, 'code ASC');
        $data['jobs'] = $this->Structure_model->get_by('all_defined_setting', array('defined_type' => 4));
        $data['tree'] = $this->buildTree($data['records']);
        $data['title'] = ' الهيكل الإداري  ';
        $data['subview'] = 'admin/Human_resources/structure/administrative_structure_view';
        $this->load->view('admin_index', $data);
    }

    function load_tree()
    {
        $data['records'] = $this->Structure_model->get_by('hr_administrative_structure', false, false, 'code ASC');
        $data['tree'] = $this->buildTree($data['records']);
        $this->load->view('admin/Human_resources/structure/load_tree', $data);
    }

    function load_jobs($administrative_structure_id_fk)
    {
        $data['records'] = $this->Structure_model->get_all_jobs(array('administrative_structure_id_fk' => $administrative_structure_id_fk));
        $this->load->view('admin/Human_resources/structure/load_jobs', $data);
    }

    function add_structure()
    {

        /*        $this->test($_POST);*/
        $last_id = $this->Structure_model->add_structure();
        echo $last_id;
        return;
    }

    function add_structure_job()
    {

        /*        $this->test($_POST);*/
        $last_id = $this->Structure_model->add_structure_job();
        echo $last_id;
        return;
    }

    function delete_job_data($id)
    {
        $this->Structure_model->delete_job_data($id);

    }
}