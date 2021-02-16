<?php


class Markz_tklfaa_order extends CI_Controller
{
/*Markz_tklfaa_ajex*/
    function __construct()
    {
        parent::__construct();
        $this->load->model('finance_accounting_model/markz_tklfa/Markz_tklfa_m');

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

    function add_main_markz_tklfaa()
    {
        $this->Markz_tklfa_m->add_main_markez();
        return;
    }

    function get_tree()
    {

        $data['accounts'] = $this->Markz_tklfa_m->buildTree(array('markz_no3' => 1));
        $records = $this->Markz_tklfa_m->buildTree(array('id!=' => 0));
        $data['tree'] = $this->buildTree($records);
        $this->load->view('admin/finance_accounting/markz_tklfa/markz_tklfa_tree_load_view', $data);

    }


    public function add_editMarkz_tklfaa()
    {
        $id = $this->input->post('id');
        $method = $this->input->post('method');
        $code = $this->input->post('code');
        $data['parent'] = $this->Markz_tklfa_m->get_parent($code);
        $data['id'] = $id;
        $data['method'] = $method;
        if ($method == 2) {
            $data['details'] = $this->Markz_tklfa_m->get_markz($id);
            $data['title'] = 'تعديل مركز تكلفة';
        } elseif ($method == 1) {
            $data['title'] = 'اضافة مركز تكلفة';
        }
        $this->load->view('admin/finance_accounting/markz_tklfa/load_edit_markz_tklfa', $data);
    }

    public function getLastSubCode()
    {
        $data['last_sub_code'] = $this->Markz_tklfa_m->lastSubCode(array('parent' => $this->input->post('id')));
        $data['markz_data'] = ($this->Markz_tklfa_m->get_markz($this->input->post('id')));
        echo json_encode($data);
    }

    public function getParentData()
    {
        echo json_encode($this->Markz_tklfa_m->get_markz($this->input->post('id')));
    }

    public function update($id)
    {
            $this->Markz_tklfa_m->update($id);
            return;
    }
    public function add_markz_tklfaa()
    {
        $this->Markz_tklfa_m->insert();
      return;
    }

    public function delete_markz($id)
    {
        $this->Markz_tklfa_m->deleteTreeNodes($id);
        messages('success','حذف الحساب');
        redirect('finance_accounting/markz_tklfa/Markz_tklfaa/markz_tklfaa_tree','refresh');
    }
}