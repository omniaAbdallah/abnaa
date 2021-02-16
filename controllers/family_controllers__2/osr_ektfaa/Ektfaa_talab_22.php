<?php
class Ektfaa_talab extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/osr_ektfaa_m/Ektfaa_talab_m');
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
        $this->session->set_flashdata('message', '<script> swal({
                    type:"' . $type . '",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
    }
    function index()/*family_controllers/osr_ektfaa/Ektfaa_talab*/
    {
        $data['project_type']=$this->Ektfaa_talab_m->get_by('osr_ektfaa_setting',array('from_code'=>201));
        $data['project_states']=$this->Ektfaa_talab_m->get_by('osr_ektfaa_setting',array('from_code'=>301));
        $data['tranning_type']=$this->Ektfaa_talab_m->get_by('osr_ektfaa_setting',array('from_code'=>401));

        $data['title'] = 'طلب اكتفاء ';
        if ($this->input->post('save')) {
//            $this->test($_POST);
            $this->Ektfaa_talab_m->insert();
            $this->message('success', 'تم الاضافة بنجاح ');
            redirect('family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat');
        }
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/ektfaa_talab_add_view';
//        $this->test($data);
        $this->load->view('admin_index', $data);
    }
    function all_talabat()/*family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat*/
    {
        $data['title'] = 'طلب اكتفاء ';
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/all_ektfaa_talabt';
        $this->load->view('admin_index', $data);
    }
    function edite($id)/*family_controllers/osr_ektfaa/Ektfaa_talab/edite/*/
    {
          $data['project_type']=$this->Ektfaa_talab_m->get_by('osr_ektfaa_setting',array('from_code'=>201));
          $data['project_states']=$this->Ektfaa_talab_m->get_by('osr_ektfaa_setting',array('from_code'=>301));
          $data['tranning_type']=$this->Ektfaa_talab_m->get_by('osr_ektfaa_setting',array('from_code'=>401));

        $data['title'] = 'تعديل طلب اكتفاء ';
        if ($this->input->post('save')) {
//            $this->test($_POST);
            $this->Ektfaa_talab_m->update($id);
            $this->message('success', 'تم التعديل بنجاح ');
            redirect('family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat');
        }
        $data['one_data'] = $this->Ektfaa_talab_m->get_by('osr_ektfaa_talabat', array('id' => $id), 1);
        if (!empty($data['one_data'])) {
            $data['file_num_data'] = $this->Ektfaa_talab_m->getFileNUmData($data['one_data']['file_num']);
        }
//        $this->test($data);
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/ektfaa_talab_edite_view';
        $this->load->view('admin_index', $data);
    }
    public function getFamilyTable()
    {
        $customer = $this->Ektfaa_talab_m->select_family_table(' ');
        $arr = array();
        $arr['data'] = array();
        if (!empty($customer)) {
            $x = 0;
            foreach ($customer as $row) {
                $x++;
                if ($row['mother_name'] != '' and $row['mother_name'] != null) {
                    $mother_name = $row['mother_name'];
                } elseif ($row['mother_name'] == '') {
                    $mother_name = $row['full_name_order'];
                } else {
                    $mother_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                if ($row['mother_new_card'] != '' and $row['mother_new_card'] != null) {
                    $mother_new_card = $row['mother_new_card'];
                } elseif ($row['mother_new_card'] == '' and $row['id'] >= 852) {
                    $mother_new_card = $row['mother_national_num'];
                } else {
                    $mother_new_card = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                $button = '<input type="radio" name="radio" data-father="' . $row['mother_name'] . '"
                    data-father-card="' . $row['father_national_num'] . '"  data-mother="' . $row['mother_national_num'] . '" id="radio' . $row['file_num'] . '"
                      ondblclick="getFile_num(' . $row['file_num'] . ')">';
                if ($row['father_full_name'] != '' and $row['father_full_name'] != null) {
                    $father_full_name = $row['father_full_name'];
                } else {
                    $father_full_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                if ($row['father_national_num'] != '' and $row['father_national_num'] != null) {
                    $father_national_num = $row['father_national_num'];
                } else {
                    $father_national_num = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                $on_click_data = array('father' => $row['mother_name'],
                    'father_card' => $row['father_national_num'],
                    'mother' => $row['mother_national_num'], 'file_num' => $row['file_num']);
                $arr['data'][] = array(
                    $this->add_link($x, $on_click_data),
                    $this->add_link($row['file_num'], $on_click_data),
                    $this->add_link($father_full_name, $on_click_data),
                    $this->add_link($father_national_num, $on_click_data),
                    $this->add_link($mother_name, $on_click_data),
                    $this->add_link($mother_new_card, $on_click_data),
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
    public function getDetails()
    {
        $data['file_num_data'] = $this->Ektfaa_talab_m->getFileNUmData($_POST['file_num']);
//        $this->test($data);
        $this->load->view('admin/familys_views/osr_ektfaa_v/details_load_page', $data);
    }
    public function add_link($title, $arr)
    {
        return '<a  id="radio' . $arr['file_num'] . '" data-father="' . $arr['father'] . '"  
            data-father-card="' . $arr['father_card'] . '"
             data-mother="' . $arr['mother'] . '"  
             ondblclick="getFile_num(' . $arr['file_num'] . ')">' . $title . '</a>';
    }
    function Delete($id)
    {
        $this->Ektfaa_talab_m->Delete($id);
        $this->message('success', 'تم الحذف بنجاح ');
        redirect('family_controllers/osr_ektfaa/Ektfaa_talab');
    }
    function fetch_all_data()
    {
        
        // Fetch member's records
        $i = $_POST['start'];
        $fetch_data = $this->Ektfaa_talab_m->getRows($_POST);
        $data = array();
        $x = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $x++;
            $sub_array[] = $row['date_ar'];
            $sub_array[] = $row['file_num'];
            $sub_array[] = $row['mother_name'];
            $sub_array[] = '<a type="button"
                               class="btn btn-sm btn-info" data-toggle="modal"
                               data-target="#detailsModal" onclick="get_single_data(' . $row['id'] . ')"
                               style="padding: 3px 5px;line-height: 1;">
                                <i class="glyphicon glyphicon-list"></i>
                            </a> <a onclick="edite(' . $row['id'] . ')"><i class="fa fa-pencil"> </i></a>
                            <a onclick="delete_row(' . $row['id'] . ') " ><i class="fa fa-trash"> </i></a>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Ektfaa_talab_m->get_all_data(),
            "recordsFiltered" => $this->Ektfaa_talab_m->get_filtered_data($_POST),
            "data" => $data
        );
       
        echo json_encode($output);
    }
    function get_single_data()
    {
        $data['one_data'] = $this->Ektfaa_talab_m->fetch_single_data( $_POST["id"]);
        if (!empty($data['one_data'])) {
            $data['file_num_data'] = $this->Ektfaa_talab_m->getFileNUmData($data['one_data']['file_num']);
        }
//        $this->test($data);
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/ektfaa_talab_detailes';
        $this->load->view($data['subview'], $data);
    }
}