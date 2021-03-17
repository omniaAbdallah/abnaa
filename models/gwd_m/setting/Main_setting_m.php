<?php
/**
 * Created by PhpStorm.
 * User: alatheer
 * Date: 3/9/2020
 * Time: 10:32 AM
 */
class Main_setting_m extends CI_Model
{
    public function all_settings()
    {
        $this->db->select('*');
        $this->db->from('gwd_settings');
        $this->db->where("from_code", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->code]= $row->title;//["title"]
                //$data[$row->code]["code"]= $row->code;
                //$data[$row->id]['color'] =  $row->color;
            }
            return $data;
        }
        return false;
    }
    public function get_all_data_settings($arr_all){
        foreach ($arr_all as $key=>$value) {
            $data[$key] = $this->get_type_settings($key);
        }
        return $data;
    }
    public function  get_type_settings($from_code)
    {
        $this->db->select('*');
        $this->db->from('gwd_settings');
        $this->db->where("from_code", $from_code);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function  get_administration_employee($emp_code)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $emp_code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->administration;
        }
        return false;
    }
    public function select_department_jobs(){
        if ($_SESSION['role_id_fk']==3) {
            $administration_id = $this->get_administration_employee($_SESSION['emp_code']);
        }else{
            $administration_id='' ;
        }
        $this->db->select('*');
        $this->db->from('hr_edarat_aqsam');
        if (!empty($administration_id)){
            $this->db->where('id',$administration_id);
        }else{
            $this->db->where('from_id_fk',0);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function add($from_code)
    {
        /*$last_code = $this->get_max($from_code);
        if ($last_code == 0) {
            $last_code = $from_code . '01';
        } else { // if ($last_code >= ($from_code.'99'))
            $next_code = explode($from_code,$last_code );
            $pad_length = 2;
            if ($next_code > 99){
                $pad_length = 3;
            }
            $last_code = $from_code . str_pad(($next_code[1]+1), $pad_length, '0', STR_PAD_LEFT);
        }*/
        //$data['code']= $last_code;
        $data['title']= $this->input->post('title');
        $data['department_id_fk']= $this->input->post('department_id_fk');
        $data['goal']= $this->input->post('goal');
        $data['from_code']= $from_code;
        $this->db->insert('gwd_settings',$data);
    }
    public function update($id)
    {
        $data['title']= $this->input->post('title');
        $data['department_id_fk']= $this->input->post('department_id_fk');
        $data['goal']= $this->input->post('goal');
        $this->db->where('id',$id);
        $this->db->update('gwd_settings',$data);
    }
    function get_max($from)
    {
        return $this->db->select_max('code')->where('from_code', $from)->get('gwd_settings')->row()->code;
    }
    function delete($id)
    {
        $this->db->where('id', $id)->delete('gwd_settings');
    }
    public function getById($id)
    {
        return $this->db->get_where('gwd_settings', array('id'=>$id))->row_array();
    }
}