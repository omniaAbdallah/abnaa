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
        $data['jobs'] = $this->Structure_model->get_by('hr_egraat_setting', false);
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

    function load_data_structre()
    {
        $data = $this->Structure_model->get_by('hr_administrative_structure', false, false, 'code ASC');
        echo  json_encode($data);
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
    
    
    /***********************/
    
        public function pdf($filename)
    {
        $filePath = 'uploads/human_resources/main_egraat/'.$filename;
        if (file_exists($filePath)) {
            echo "The file  exists";
        } else {
            echo "The file  does not exist <br>";
            die();
        }
        header('Content-type:application/pdf');
        header('Content-disposition: inline; filename="'.$filename.'"');
        header('content-Transfer-Encoding:binary');
        header('Accept-Ranges:bytes');
        readfile($filePath);
    }
   /*     function pdf($filename)
    {
        $filePath = 'uploads/human_resources/main_egraat/'.$filename;
        if (file_exists($filePath)) {
            echo "The file  exists";
        } else {
            echo "The file  does not exist <br>";
            die();
        }
        header('Content-type:application/pdf');
        header('Content-disposition: inline; filename="'.$filename.'"');
        header('content-Transfer-Encoding:binary');
        header('Accept-Ranges:bytes');
        readfile($filePath);
    }*/
 /*   function emp_edarat()
    {
        $data['pdfname'] = "9893e912978f2e631d49b285b1a86239.pdf";
        $data['records'] = $this->Structure_model->get_emp_administrative_structure();
        $data['tree'] = $this->buildTree($data['records']);

        $data['title'] = '  الموظفين والإدارات  ';
        $data['subview'] = 'admin/Human_resources/structure/emp_edarat';
        $this->load->view('admin_index', $data);
    }*/
    
        public function emp_edarat()/*human_resources/Structure/emp_edarat*/
    {
        $data['pdfname'] = "structure.pdf";
        //$data['manager']= $this->Structure_model->get_emp_Edara_tanfezia(array('job_title_name'=>'المدير العام'));
        //$data['assistant_manager']= $this->Structure_model->get_emp_Edara_tanfezia(array('job_title_name'=>'مساعد المدير العام'));
        //$job_title_names = array('مساعد المدير العام','المدير العام');
        //$data['all']= $this->Structure_model->get_emp_Edara_tanfezia(false,$job_title_names);
        //$data['records'] = $this->Structure_model->get_by('hr_administrative_structure', false, false, 'code ASC');
        $data['records'] = $this->Structure_model->get_emp_administrative_structure();
        $data['tree'] = $this->buildTree($data['records']);

        $data['title'] = '  الموظفين والإدارات  ';
        $data['subview'] = 'admin/Human_resources/structure/emp_edarat';
        $this->load->view('admin_index', $data);
    }

    public function print_result($type){
        $data['records'] = $this->Structure_model->get_emp_administrative_structure();
        $data['tree'] = $this->buildTree($data['records']);

        if($type == 1) {
            $this->load->view('admin/Human_resources/structure/print_result_1', $data);
        }else{
            $this->load->view('admin/Human_resources/structure/print_result_2', $data);
        }
    }

   /* public function load_tab_data(){
        $type = $this->input->post('type');
        $data['records'] = $this->Structure_model->get_emp_administrative_structure();
        $data['tree'] = $this->buildTree($data['records']);

        if($type == 'tab1') {
            $this->load->view('admin/Human_resources/structure/search_result_1', $data);
        }else{
            $this->load->view('admin/Human_resources/structure/search_result_2', $data);
        }
    }*/
    
    
    
    
    public function buildTree_emp($elements, $parent = 0)
    {
        $branch = array();
        $i = 0;
        foreach ($elements as $element) {
            if ($element->from_id == $parent) {
                $branch[$i] = array();
                $branch[$i] = (object) $branch[$i];
                $children = $this->buildTree_emp($elements, $element->id);
                if ($children) {
                    $element->children = $children;
                }
                if (!empty($element->emp_Edara)){
                    $branch[$i]->name= $element->emp_Edara[0]->employee;
                    $branch[$i]->title= $element->emp_Edara[0]->qsm_n;
                    $branch[$i]->img= $element->emp_Edara[0]->personal_photo;
                    $branch[$i]->collapsed= true;
                }else{
                    $branch[$i]->name= 'غير محدد';
                    $branch[$i]->title= $element->name;
                    $branch[$i]->img= '';
                    $branch[$i]->collapsed= true;
                }
                if ($element->from_id != 0) {
                    $branch[$i]->className = 'slide-up';
                }
                if($children){
                    $branch[$i]->children = array();
                    $branch[$i]->children =$element->children ;
//                    $branch[$element->id]->children->className = 'slide-up' ;
                }
                $i++;
//                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }

    public function buildTree_edara($elements, $parent = 0)
    {
        $branch = array();
        $i = 0;
        foreach ($elements as $element) {
            if ($element->from_id == $parent) {
                $branch[$i] = array();
                $branch[$i] = (object) $branch[$i];
                $children = $this->buildTree_edara($elements, $element->id);
                if ($children) {
                    $element->children = $children;
                }
                if (!empty($element->name)){
                    $branch[$i]->name= $element->name;
                    $branch[$i]->title= $element->name;
                    $branch[$i]->collapsed= true;
                }else{
                    $branch[$i]->name= 'غير محدد';
                    $branch[$i]->title= $element->name;
                    $branch[$i]->collapsed= true;
                }
                if ($element->from_id != 0) {
                    $branch[$i]->className = 'slide-up';
                }
                if($children){
                    $branch[$i]->children = array();
                    $branch[$i]->children =$element->children ;
//                    $branch[$element->id]->children->className = 'slide-up' ;
                }
                $i++;
//                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }


    public function load_tab_data(){
        $type = $this->input->post('type');
        $data['records'] = $this->Structure_model->get_emp_administrative_structure();


        if($type == 'tab1') {
            $data['tree'] = $this->buildTree_emp($data['records']);
            $this->load->view('admin/Human_resources/structure/search_result_11', $data);
        }else{
            $data['tree'] = $this->buildTree_edara($data['records']);
            $this->load->view('admin/Human_resources/structure/search_result_22', $data);
        }
    }

    
    public function print_result_2($type){
        $data['records'] = $this->Structure_model->get_emp_administrative_structure();


        if($type == 1) {
            $data['tree'] = $this->buildTree_emp($data['records']);
            $this->load->view('admin/Human_resources/structure/print_result_11', $data);
        }else{
            $data['tree'] = $this->buildTree_edara($data['records']);
            $this->load->view('admin/Human_resources/structure/print_result_22', $data);
        }
    }
    
    
}