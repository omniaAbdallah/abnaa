<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solaf_setting_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }


    public function get_by($table, $where_arr = false, $select = false,$order_by=false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        if (!empty($order_by)) {
            $this->db->order_by($order_by,'ASC');
        }
        $query = $this->db->get($table);
        // return $query;
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

    // hr_solaf_main_setting

    public function get_post()
    {

        $data['da3m_value'] = $this->input->post('da3m_value');
        $data['aqsa_moda_sadad'] = $this->input->post('aqsa_moda_sadad');
        $data['had_adna'] = $this->input->post('had_adna');

        $bnod = array(9 => 'rateb_asasy', 11 => 'bdl_sakn', 12 => 'bdl_mowaslat', 15 => 'bdl_jwal'
        , 10 => 'rateb_mokto3', 16 => 'bdl_ma3esha', 13 => 'bdl_amal', 14 => 'bdl_taklef');

        $input_bnod = $this->input->post('bnod');
        foreach ($bnod as $key => $value) {
            if (in_array($key, $input_bnod)) {
                $key_input = array_search($key, $input_bnod);
                $data[$value] = 1;
            } else {
                $data[$value] = 0;
            }

        }

        return $data;
    }

    public function insert_setting()
    {
        $data = $this->get_post();
        $this->db->insert('hr_solaf_main_setting', $data);
    }

    public function update_setting()
    {
        $data = $this->get_post();

        $this->db->where('id', $this->input->post('form_type'))->update('hr_solaf_main_setting', $data);
    }

    public function get_post_dwabt()
    {
        $type_n = array('', 'ضبط الاستحقاق', 'ألية استرداد القرض/السلفة ', ' المستندات المطلوبة');

        $data['title'] = $this->input->post('title');
        $data['type'] = $this->input->post('type');
        $data['type_n'] = $type_n[$data['type']];

        return $data;
    }

    public function insert_dwabt_setting()
    {
        $data = $this->get_post_dwabt();
        $this->db->insert('hr_solaf_dawabt', $data);
    }

    public function update_dwabt__setting()
    {
        $data = $this->get_post_dwabt();
        $this->db->where('id', $this->input->post('id'))->update('hr_solaf_dawabt', $data);
    }

    public function delete_solaf_dawabt($id)
    {
        $this->db->where('id', $id)->delete('hr_solaf_dawabt');
    }




   public function add_solaf_emp(){
       $data['emp_id'] = $this->input->post('emp_id');
       $data['emp_code'] = $this->input->post('emp_code');
       $data['emp_name'] = $this->input->post('emp_name');
       $data['rkm_hesab'] = $this->input->post('rkm_hesab');
       $data['hesab_name'] = $this->input->post('hesab_name');
       $data['publisher'] = $_SESSION['user_id'];
       $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
       $data['date_added'] = date('Y-m-d');
       $data['time_add'] = date('h:i a');
       $this->db->insert('hr_solaf_emp_hesbat', $data);
   }
    public function getUserName($user_id){
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;
    }

    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }

    public function update_solaf_emp(){
        $data['emp_id'] = $this->input->post('emp_id');
        $data['emp_code'] = $this->input->post('emp_code');
        $data['emp_name'] = $this->input->post('emp_name');
        $data['rkm_hesab'] = $this->input->post('rkm_hesab');
        $data['hesab_name'] = $this->input->post('hesab_name');
        $this->db->where('id', $this->input->post('id_emp_solf'));
        $this->db->update('hr_solaf_emp_hesbat', $data);
    }
    public function delete_solaf_emp($id){
        $this->db->where('id', $id);
        $this->db->delete('hr_solaf_emp_hesbat');
    }

}
