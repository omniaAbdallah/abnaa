<?php


class Gawda_plans_request extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('gwd_m/Gawda_plans_model');

    }
    public function add_hadaf()
    {
        $this->Gawda_plans_model->add_hadaf();
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
    //yara7-4-2020
    public function GetDiv_tree()
    {
        $data['from_id'] = 0;
        $id=$this->input->post('plan_rkm');
        $records = $this->Gawda_plans_model->buildTree(array('id!=' => 0,'plan_rkm' => $id));
        $data['tree'] = $this->buildTree($records);
        $this->load->view('admin/gwd_v/strategy_v/load_dalel_tree', $data);
    }
    //yara7-4-2020

    public  function Checkcode(){   //family_controllers/Family/CheckNationalNum

        $hdf_code =$this->input->post('hdf_code');
        $level =$this->input->post('level');
        $plan_rkm =$this->input->post('plan_rkm');

        echo $this->Gawda_plans_model->check_code($hdf_code,$level,$plan_rkm);

    }
    public function getLastSubCode()
    {
        echo $this->Gawda_plans_model->lastSubCode(array('parent'=>$this->input->post('id')));
    }
    public function getParentData()
    {
        echo json_encode($this->Gawda_plans_model->getAccount($this->input->post('id')));
    }

    public function add_editAccounDalel()
    {
        $id = $this->input->post('id');
        $method = $this->input->post('method');
        $code = $this->input->post('code');
        $level = $this->input->post('level');

        $data['plan_rkm'] = $this->input->post('plan_rkm');
        $data['parent'] = $this->Gawda_plans_model->get_parent($code);

        $data['id'] = $id;
        $data['method'] = $method;
        if ($code == 1 && $method == 2) {
            $data['details'] = $this->Gawda_plans_model->getAccount($id);
            $data['title'] = 'تعديل هدف إستراتيجي';
            $this->load->view('admin/gwd_v/strategy_v/edit_account', $data);
        }
        if ($code == 2 && $method == 2) {
            $data['details'] = $this->Gawda_plans_model->getAccount($id);
            $data['title'] = 'تعديل سياسة ';
            $this->load->view('admin/gwd_v/strategy_v/load_edit_account', $data);
        } elseif ($level == 1 && $method == 1) {
            $data['title'] = 'إضافة   سياسة';
            $this->load->view('admin/gwd_v/strategy_v/load_edit_account', $data);
        }
        if ($level == 2 && $method == 1) {
            $data['title'] = 'إضافة   مؤشر';
            $this->load->view('admin/gwd_v/strategy_v/load_edit_mo24er_account', $data);
        } elseif ($code == 3 && $method == 2) {
            $data['details'] = $this->Gawda_plans_model->getAccount($id);
            $data['title'] = 'تعديل  مؤشر';
            $this->load->view('admin/gwd_v/strategy_v/load_edit_mo24er_account', $data);
        }

    }

    public function addAccount()
    {
        $this->Gawda_plans_model->insert();
    }

    public function addAccount_mo24er()
    {
        $this->Gawda_plans_model->insert_mo24er();
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

}