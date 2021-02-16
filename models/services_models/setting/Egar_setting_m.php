<?php
/**
 * application/models/services_models/setting/Egar_setting_m.php
 */

class Egar_setting_m extends CI_Model
{


    public function all_settings()
    {
        $this->db->select('*');
        $this->db->from('family_serv_egar_settings');
        $this->db->where("from_code", 0);
        $this->db->order_by('code', 'ASC');
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

    public function get_by($table, $where_arr = false, $select = false,$order= false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        if (!empty($order)){
            $this->db->order_by($order, "asc");
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


    public function get_all_data_settings($arr_all){

        foreach ($arr_all as $key=>$value) {

            $data[$key] = $this->get_type_settings($key);

        }

        return $data;
    }

    public function  get_type_settings($from_code)
    {
        $this->db->select('*');
        $this->db->from('family_serv_egar_settings');
        $this->db->where("from_code", $from_code);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function add($from_code)
    {
        //$data['code']= $last_code;
        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');
        $data['from_code']= $from_code;
        if ($from_code == 501 ) {
            $data['num_days'] = $this->input->post('num_days');
        }
        $data['date']           = strtotime(date("Y-m-d"));
        $data['date_ar']        = date('Y-m-d');
        $data['publisher'] 		= $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

        $this->db->insert('family_serv_egar_settings',$data);
        $last_insert_id = $this->db->insert_id();

        return $last_insert_id;

    }


    public function getUserName($user_id)
    {
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


    public function update($id,$from_code)
    {
        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');
        if ($this->input->post('from_code') == 501 ) {
            $data['num_days'] = $this->input->post('num_days');
        }

        $this->db->where('id',$id);
        $this->db->update('family_serv_egar_settings',$data);
    }


    function get_max($from)
    {
        return $this->db->select_max('code')->where('from_code', $from)->get('family_serv_egar_settings')->row()->code;
    }


    public function get_count($from_code)
    {
        return $this->db->select('COUNT(id) as count_rows')->where('from_code', $from_code)->get('family_serv_egar_settings')->row()->count_rows;

    }

    function delete($id)
    {
        $this->db->where('id', $id)->delete('family_serv_egar_settings');
    }

    public function getById($id)
    {
        return $this->db->get_where('family_serv_egar_settings', array('id'=>$id))->row_array();
    }






}