<?php


class Structure_model extends CI_Model
{

    public function get_by($table, $where_arr = false, $select = false, $order_by = false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        if (!empty($order_by)) {
            $this->db->order_by($order_by);
        }

        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            if (!empty($select) && $select != 1) {
                return $query->row()->$select;
            } else {
                if ($select == 1) {
                    return $query->row();
                } else {
                    return $query->result();
                }
            }
        } else {
            return false;
        }
    }

    public function get_max_by($table, $select, $where_arr = false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $this->db->select('MAX(' . $select . ')as max');
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->row()->max;
        } else {
            return 0;
        }
    }

    function get_all_jobs($where_arr = false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }

        $query = $this->db->get('hr_structure_job')->result();
        if (!empty($query)) {
            foreach ($query as $key => $item) {
               // $query[$key]->job_title = $this->get_by('all_defined_setting', array('defined_id' => $item->job_id_fk), 'defined_title');
              $query[$key]->job_title = $this->get_by('hr_egraat_setting', array('id' => $item->job_id_fk), 'title');
          
          
            }
            return $query;
        }
        return false;
    }

    function add_structure()
    {
        $data['name'] = $this->input->post('name');
        $data['main_type'] = $this->input->post('main_type');
        $data['from_code'] = $this->input->post('from_code');
        $data['level'] = $this->input->post('level');
        if ($this->input->post('from_id')) {
            $data['from_id'] = $this->input->post('from_id');
        }
        $id = $this->input->post('id');
        $from_id_old = $this->input->post('from_id_old');
        if ($id == 0) {
            $max = $this->get_max_by('hr_administrative_structure', 'code', array('from_code' => $data['from_code']));
            if ($data['from_code'] == 0) {
                $data['code'] = $max + 1;
            } else {
                if ($max == 0) {
                    $data['code'] = $data['from_code'] . '1';
                } else {
                    $data['code'] = $max + 1;
                }
            }
            $data['date_int'] = strtotime(date('Y-m-d h:i'));
            $data['add_by'] = $_SESSION['user_id'];
            $this->db->insert('hr_administrative_structure', $data);
        } else {
            if ($from_id_old != $data['from_id']) {
           /*     $max = $this->get_max_by('hr_administrative_structure', 'code', array('from_code' => $data['from_code']));
                if ($data['from_code'] == 0) {
                    $data['code'] = $max + 1;
                } else {
                    if ($max == 0) {
                        $data['code'] = $data['from_code'] . '1';
                    } else {
                        $data['code'] = $max + 1;
                    }
                }*/
                $this->update_sub_job($id,$data['from_id']);


            }


            $data['edite_by'] = $_SESSION['user_id'];
            $this->db->where('id', $id)->update('hr_administrative_structure', $data);
        }
        return $this->db->insert_id();
    }

    function update_sub_job($id,$new_id){

        $data['admin_struct_manger_id_fk'] = $new_id;
        $this->db->where('administrative_structure_id_fk', $id)->update('hr_structure_job', $data);

    }

/*
    function update_sub($from_id)
    {

        $data=$this->get_by('hr_administrative_structure', array('id' => $from_id));
        $data_sub['level'] = $data['level'] + 1;
        $data_sub['from_code'] = $data['code'] ;
        $this->db->set('code', 'REPLACE(code, from_code, '.$data_sub['from_code'].')');
        $this->db->where('from_id', $id)->update('hr_administrative_structure', $data_sub);
    }*/

    function add_structure_job()
    {
        $data['administrative_structure_id_fk'] = $this->input->post('administrative_structure_id_fk');
        $data['admin_struct_manger_id_fk'] = $this->input->post('admin_struct_manger_id_fk');
        $data['job_id_fk'] = $this->input->post('job_id_fk');
        $data['emp_num'] = $this->input->post('emp_num');
        if ($this->input->post('is_manger')) {
            $data['is_manger'] = $this->input->post('is_manger');
        }

        $id = $this->input->post('id');
        if ($id == 0) {
            $data['date_int'] = strtotime(date('Y-m-d h:i'));
            $data['add_by'] = $_SESSION['user_id'];
            $this->db->insert('hr_structure_job', $data);
        } else {
            $data['edite_by'] = $_SESSION['user_id'];
            $this->db->where('id', $id)->update('hr_structure_job', $data);
        }
        return $this->db->insert_id();
    }

    function delete_job_data($id)
    {
        $this->db->where('id', $id)->delete('hr_structure_job');

    }
    
    
    /******************************************************/
    
  /*  public function get_emp_administrative_structure(){

        $this->db->order_by('code ASC');
        $query = $this->db->get('hr_administrative_structure');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->emp_Edara= $this->get_emp_Edara_tanfezia(array('job_title_name'=>$row->name))[0];
                $i++;
            }
            return $data;
        }
        return false;

    }*/
    
        public function get_emp_administrative_structure(){

        $this->db->order_by('code ASC');
        $query = $this->db->get('hr_administrative_structure');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                //from_id
                $data[$i]->collapsed= 'true';
                if($row->from_id !=0){
                    $data[$i]->className ='slide-up';
                }
                $data[$i]->emp_Edara= $this->get_employee(array('qsm_id'=>$row->id));
                $i++;
            }
            return $data;
        }
        return false;

    }
    
    
    public function get_emp_Edara_tanfezia($arr=false,$arrnot=false){
        $this->db->order_by('emp_order');
        if (!empty($arr)){
            $this->db->where($arr);
        }else{
            $this->db->where_not_in('job_title_name',$arrnot);
        }
        $query = $this->db->get('pr_edara_tanfezia');
        if ($query->num_rows()>0){
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->emp= $this->get_emp_details($row->emp_id_fk);
                $data[$i]->degree_name= $this->get_degree($data[$i]->emp->degree_id);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function get_emp_details($id){
        $this->db->where('id',$id);
        $query = $this->db->get('employees');
        if ($query->num_rows()> 0){
            return $query->row();
        }
        return false;
    }
   /* public function get_degree($id){
        $this->db->where('defined_id',$id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows()> 0){
            return $query->row()->defined_title;
        }
        return false;
    }*/
     public function get_degree($id){
        $this->db->where('id',$id);
        $query = $this->db->get('hr_egraat_setting');
        if ($query->num_rows()> 0){
            return $query->row()->title;
        }
        return false;
    }
    
        public function get_employee($arr=false){
        $this->db->order_by('qsm_id');
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $query = $this->db->get('employees');
        if ($query->num_rows()>0){
            $data = $query->result();
            return $data;
        }

        return false;
    }
    
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
                    $branch[$i]->name= 'ÛíÑ ãÍÏÏ';
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
                    $branch[$i]->name= 'ÛíÑ ãÍÏÏ';
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