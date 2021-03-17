<?php


class Taklef_order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_by($table, $where_arr = false, $select = false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            if (!empty($select) && $select != 1) {
                return $query->row_array()[$select];
            } else {
                if ($select == 1) {
                    return $query->row_array();
                } else {
                    return $query->result_array();
                }
            }
        } else {
            return false;
        }
    }


    function get_all_emp($from_id)
    {
        return $this->db->select('id,employee,emp_code,degree_id,edara_n,qsm_n,mosma_wazefy_n,edara_id,qsm_id')
            ->where('employee_type', 1)->where('id!=', $from_id)->where('emp_type',1)->get('employees')->result();
    }

    function get_last_rkm()
    {
        $rkm = $this->db->select('MAX(rkm) as rkm')->get('hr_taklef_order')->row()->rkm;
        if (!empty($rkm)) {
            return $rkm + 1;
        } else {
            return 1;
        }
    }

    function get_post_data()
    {


        $data['date_ar'] = $this->input->post('date_ar');
        $data['time'] = date('h:i a');
        $data['date_s'] = date('h:i a');
        $data['from_emp_id'] = $this->input->post('from_emp_id');
        $data['type_to'] = $this->input->post('type_to');
        switch ($data['type_to']) {
            case "emp":
                $data['to_id'] = $this->input->post('to_emp_id');
                break;
            case "job":
                $data['to_id'] = $this->input->post('to_job');
                break;
            default:
                break;
        }
        $data['from_date'] = strtotime($this->input->post('from_date'));
        $data['to_date'] = strtotime($this->input->post('to_date'));
        $data['start_date'] = strtotime($this->input->post('start_date'));
        $data['other'] = $this->input->post('other');
        $data['need_mony'] = $this->input->post('need_mony');
        $data['value'] = $this->input->post('value');

        return $data;

    }

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
                return $data->user_username;
            } elseif ($data->role_id_fk == 2) {
                $id = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            } elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            } elseif ($data->role_id_fk == 4) {
                $id = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;

    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }


    function insert_order($file)
    {
        $data = $this->get_post_data();
        $data['rkm'] = $this->get_last_rkm();
        $data['job_descib'] = $file;
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

        /* die;*/
        $this->db->insert('hr_taklef_order', $data);

    }

    function update_order($id, $file)
    {
        $data = $this->get_post_data();
        if (!empty($file)) {
            $data['job_descib'] = $file;
        }
        $this->db->where('id', $id)->update('hr_taklef_order', $data);
    }

    function delete_order($id)
    {
        $this->delete_upload($id);
        $this->db->where('id', $id)->delete('hr_taklef_order');
    }

    public function delete_upload($id)
    {

        $file = $this->get_by('hr_taklef_order', array('id' => $id), 1);
        if (file_exists("uploads/human_resources/taklef_orders/" . $file['job_descib'])) {
            unlink(FCPATH . "uploads/human_resources/taklef_orders/" . $file['job_descib']);
        }


    }

    function get_one_data($id)
    {
        $qurey = $this->db->where('id', $id)->get('hr_taklef_order')->row_array();
        if (!empty($qurey)) {
            $qurey['from_data'] = $this->get_by('employees', array('id' => $qurey['from_emp_id']), 1);

            if (!empty($qurey['type_to'])) {
                switch ($qurey['type_to']) {
                    case "emp":
                        $qurey['to_data'] = $this->get_by('employees', array('id' => $qurey['to_id']), 1);
                        break;
                    case "job":
                        $qurey['to_data'] = $this->get_by('hr_egraat_setting', array('id' => $qurey['to_id']), 1);
                        break;
                }
            }
        }
        return $qurey;
    }

    function get_all_data()
    {
        $qurey = $this->db->get('hr_taklef_order')->result_array();
        if (!empty($qurey)) {
            foreach ($qurey as $key => $item) {
                $qurey[$key]['from_data'] = $this->get_by('employees', array('id' => $qurey[$key]['from_emp_id']), 1);

                if (!empty($qurey[$key]['type_to'])) {
                    switch ($qurey[$key]['type_to']) {
                        case "emp":
                            $qurey[$key]['to_data'] = $this->get_by('employees', array('id' => $qurey[$key]['to_id']), 1);
                            break;
                        case "job":
                            $qurey[$key]['to_data'] = $this->get_by('hr_egraat_setting', array('id' => $qurey[$key]['to_id']), 1);
                            break;
                    }
                }
            }

        }
        return $qurey;
    }
    /*************************************/
    //yara_start
//yara 8-9-2020
public function get_news_by_id($id){
    $this->db->where('id',$id);
    $query = $this->db->get('hr_taklef_order');
    if ($query->num_rows()>0){
        return $query->row();
    } else{
        return false;
    }
}
public function get_by_id($id)
{
    $this->db->where('id',$id);
   return $this->db->get('hr_taklef_order')->row();
}
public function insert_attach($id,$images)
{
    if(isset($images)&& !empty($images))
    {
        $count=count($images);
        for($x=0; $x<$count;$x++)
        {
            $data['title']=$this->input->post('title');
            $data['file']=$images[$x];
            $data['taklef_id_fk']=$id;
            $data['date']= strtotime(date("Y-m-d"));
            $data['date_ar']= date("Y-m-d");
            $data['time'] = date('h:i:s a');
            if($_SESSION['role_id_fk']==1){
                $data['publisher']=$_SESSION['user_id'];
                $data['publisher_name']=$_SESSION['user_name'];;
            }
            else if ($_SESSION['role_id_fk']==2){
                $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
            }
            else if ($_SESSION['role_id_fk']==3){
                $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
            }
            else if ($_SESSION['role_id_fk']==4){
                $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
            }
            $this->db->insert('hr_taklef_files',$data);
        }
    }
}
public function delete_morfq($id)
{
$this->db->where('id',$id)->delete('hr_taklef_files');
}
public function get_morfq_by_id($id){
    $this->db->where('taklef_id_fk',$id);
    $query = $this->db->get('hr_taklef_files');
        return $query->result();
}
public function get_images($id)
{
    $this->db->where('id',$id);
    $query=$this->db->get('hr_taklef_files');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}
public function get_id($table,$where,$id,$select){
    $h = $this->db->get_where($table, array($where=>$id));
    $arr= $h->row_array();
    return $arr[$select];
}
    public function get_table($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    public function get_table_by_id($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $query = $this->db->get($table)->row();
            return $query;
    }
}