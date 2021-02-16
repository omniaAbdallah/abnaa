<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gawda_plans extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

        $this->load->model('gwd_m/Gawda_plans_model');
        $this->dalel_accounts = array();
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function gawda_plans_tree($id)//gwd/Gawda_plans/treeDalel/(رقم الخطه)
    {
        $this->load->model('gwd_m/strategy_m/Strategy_model');
        $data['last_hdf'] = $this->Gawda_plans_model->last_hdf_rkm($id);
        //$this->test($data['last_hdf']);
        $data['get_all'] = $this->Strategy_model->get_by('gwd_strategy_plans', array('id' => $id), 1);
        $data['accounts'] = $this->Gawda_plans_model->buildTree(array());
        $records = $this->Gawda_plans_model->buildTree(array('id!=' => 0, 'plan_rkm' => $id));
        $data['tree'] = $this->buildTree($records);
        $data['title'] = '  اعداد الخطه';
        $data['subview'] = 'admin/gwd_v/strategy_v/treedalel';
        $this->load->view('admin_index', $data);
    }

    public function add_hadaf()
    {
        $this->Gawda_plans_model->add_hadaf();
    }

    public function add_editAccounDalel()
    {
        $id = $this->input->post('id');
        $method = $this->input->post('method');
        $code = $this->input->post('code');
        $level = $this->input->post('level');

        $data['plan_rkm'] = $this->input->post('plan_rkm');
        $data['parent'] = $this->Gawda_plans_model->get_parent($code);

        //  $data["marakez"] = $this->Gawda_plans_model->select_markez();
        $data['id'] = $id;
        $data['method'] = $method;
        if ($code == 1 && $method == 2) {
            $data['details'] = $this->Gawda_plans_model->getAccount($id);
            $data['title'] = 'تعديل هدف استراتيجي';
            $this->load->view('admin/gwd_v/strategy_v/edit_account', $data);
        }
        //
        if ($code == 2 && $method == 2) {
            $data['details'] = $this->Gawda_plans_model->getAccount($id);
            $data['title'] = 'تعديل سياسه ';
            $this->load->view('admin/gwd_v/strategy_v/load_edit_account', $data);
        } elseif ($level == 1 && $method == 1) {
            $data['title'] = 'اضافة  سياسه';
            $this->load->view('admin/gwd_v/strategy_v/load_edit_account', $data);
        }
        //
        if ($level == 2 && $method == 1) {
            $data['title'] = 'اضافة  مؤشر';
            $this->load->view('admin/gwd_v/strategy_v/load_edit_mo24er_account', $data);
        } elseif ($code == 3 && $method == 2) {
            $data['details'] = $this->Gawda_plans_model->getAccount($id);
            $data['title'] = 'تعديل  مؤشر';
            $this->load->view('admin/gwd_v/strategy_v/load_edit_mo24er_account', $data);
        }

    }

    public function getLastSubCode()
    {
        echo $this->Gawda_plans_model->lastSubCode(array('parent' => $this->input->post('id')));
    }

    public function getParentData()
    {
        echo json_encode($this->Gawda_plans_model->getAccount($this->input->post('id')));
    }


    public function buildTree_dalel_accounts($records, $count)
    {

        $types = array(1 => 'رئيسي', 2 => 'فرعي');
        $nature = array('', 'مدين', 'دائن');
        $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
        //$color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#145b5d', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');
        $color = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');

        foreach ($records as $record) {
            $record->types = $types[$record->hesab_no3];
            $record->nature = $nature[$record->hesab_tabe3a];
            $record->follow = $follow[$record->hesab_report];
            array_push($this->dalel_accounts, $record);
            if (isset($record->subs)) {
                $count = $this->buildTree_dalel_accounts($record->subs, $count++);
            }
        }
        return $count;


    }


    public function addAccount()
    {
        $this->Gawda_plans_model->insert();
        // messages('success','تم إضافة الحساب');
        //   redirect('finance_accounting/dalel/Dalel/accountDalel','refresh');
    }

    public function addAccount_mo24er()
    {
        $this->Gawda_plans_model->insert_mo24er();
        // messages('success','تم إضافة الحساب');
        //   redirect('finance_accounting/dalel/Dalel/accountDalel','refresh');
    }

    public function deleteAccount($id, $plan_rkm)
    {
        $this->Gawda_plans_model->deleteTreeNodes($id);
        messages('success', 'حذف الحساب');
        redirect('gwd/Gawda_plans/gawda_plans_tree/' . $plan_rkm, 'refresh');
    }

    public function update($id)
    {
        if ($this->input->post('from_ajex')) {
            $method = $this->input->post('method');
            switch ($method) {
                case 1:
                    $this->Gawda_plans_model->update($id);
                    break;
                case 2:
                    $this->Gawda_plans_model->update_mo24er($id);


                    break;
                case 0:
                    $this->Gawda_plans_model->update_ajex($id);
                    break;
            }
        } else {
            $this->Gawda_plans_model->update($id);
            messages('success', 'تم تعديل الحساب');
            redirect('gwd/Gawda_plans/gawda_plans_tree', 'refresh');

        }
    }


    public function buildTree($elements, $parent = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element->parent == $parent) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->subs = $children;
                }
                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }

//	14-1-om
    public function buildTreeTable($tree, $count = 1)

    {
        foreach ($tree as $record) {
            $branch[] = $record;
            if (isset($record->subs)) {
                $count = $this->buildTreeTable($record->subs, $count++);
            }
        }
        return $branch;
    }


    public function getConnection_account()
    {
        $id = $this->uri->segment(4);
        $accounts = $this->Gawda_plans_model->buildTree(array('id!=' => 0, 'plan_rkm' => $id));
        $data['tree'] = $this->buildTree($accounts);
        $this->load->view('admin/gwd_v/strategy_v/load_accounts_pop', $data);
    }

    public function load_dalel_details()
    {
        $code = $this->input->post('code');
        $data['result'] = $this->Gawda_plans_model->GetById($code);
        $this->load->view('admin/gwd_v/strategy_v/load_dalel_details', $data);
    }

    //yara7-4-2020
    public function GetDiv_tree()
    {
        $data['from_id'] = 0;
        $id = $this->input->post('plan_rkm');
        $records = $this->Gawda_plans_model->buildTree(array('id!=' => 0, 'plan_rkm' => $id));
        $data['tree'] = $this->buildTree($records);
        $this->load->view('admin/gwd_v/strategy_v/load_dalel_tree', $data);
    }

    //yara7-4-2020

    public function Checkcode()
    {   //family_controllers/Family/CheckNationalNum

        $hdf_code = $this->input->post('hdf_code');
        $level = $this->input->post('level');
        $plan_rkm = $this->input->post('plan_rkm');

        echo $this->Gawda_plans_model->check_code($hdf_code, $level, $plan_rkm);

    }

}