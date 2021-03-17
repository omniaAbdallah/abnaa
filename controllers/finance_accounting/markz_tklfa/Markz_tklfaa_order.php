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
    
    
        /*27-4-om start*/
    public function get_data()
    {
        $hesabs = $this->Markz_tklfa_m->select_hesab();
        $arr = array();
        $arr['data'] = array();
        if (!empty($hesabs)) {
            $x = 0;
            foreach ($hesabs as $row) {
                $colorArray = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');
                $x++;
                if (isset($row->markez) && !empty($row->markez)) {
                    $color=$colorArray[$row->markez['level']];
                } else {
                    $color = '';
                }
                $arr['data'][] = array(
                    $x,
                    '<span  style="border-radius: 4px;padding: 0 25px;font-size: 14px; background-color:' . $color . '" >
                      ' . $row->markez['name'] . '</span>',
                    '<span  style="border-radius: 4px;padding: 0 25px; font-size: 14px; background-color:' . $color . '" >
                      ' . $row->rkm_hesab . '</span>',
                    $row->hesab_name,
                    '<a href="#" onclick="delete_hesab(' . $row->id . ');"> <i class="fa fa-trash"> </i></a>'
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

    function load_mrakz(){
        $data["marakez"]= $this->Markz_tklfa_m->getAll_markez(array('id!='=>0));
        $this->load->view('admin/finance_accounting/markz_tklfa/load_mrakz_tree', $data);
    }
    function load_account_tree(){
        $records = $this->Markz_tklfa_m->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
        $this->load->view('admin/finance_accounting/markz_tklfa/load_account_tree', $data);
    }
    public function add_hesab()
    {
        $this->Markz_tklfa_m->add_hesab();
    }
    public function delete_hesab()
    {
        $id=$this->input->post('id');
        $this->Markz_tklfa_m->delete_hesab($id);

    }
    /*27-4-om end*/
}