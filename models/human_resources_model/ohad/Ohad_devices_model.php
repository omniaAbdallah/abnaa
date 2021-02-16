<?php
/**
 * Created by PhpStorm.
 * User: alatheer
 * Date: 3/9/2020
 * Time: 10:32 AM
 */

class Ohad_devices_model extends CI_Model
{

    public function get_by($table, $where_arr = false, $select = false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
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

    public function get_table_data($table, $where_arr = false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                if ($row->from_code != 0) {
                    $query[$key]->from_data = $this->get_by('emp_ohad_device', array('code' => $row->from_code), 'title');
                } else {
                    $data = $this->get_by('emp_ohad_device', array('from_code' => $row->code));
                    if (!empty($data)) {
                        $query[$key]->from_data = count($data);
                    } else {
                        $query[$key]->from_data = 0;
                    }
                }
            }
            return $query;
        } else {
            return false;
        }
    }

    function get_max($from)
    {
        return $this->db->select_max('code')->where('from_code', $from)->get('emp_ohad_device')->row()->code;
    }

    function insert_form()
    {
        $type_form = $this->input->post('form_save');
        if ($type_form == 1) {
            $this->insert_magal();
        } elseif ($type_form == 2) {
            $this->insert_active();
        }

    }

    function update_form()
    {
        $type_form = $this->input->post('form_save');
        if ($type_form == 1) {
            $this->update_magal();
        } elseif ($type_form == 2) {
            $this->update_active();
        }

    }

    function insert_magal()
    {
        $last_code = $this->get_max(0);
        if ($last_code == 0) {
            $last_code = 1001;
        } else {
            $last_code += 1000;
        }
        $data['code'] = $last_code;
        $data['title'] = $this->input->post('title');
 
        $data['t_type'] = 'مجال';
        $data['from_code'] = 0;
        $this->db->insert('emp_ohad_device', $data);
       
    }

    function insert_active($from = false)
    {
        if (empty($from)) {
            $from = $this->input->post('from_code');
        }
        $last_code = $this->get_max($from);
        if ($last_code == 0) {
            $last_code = $from . '001';
        } else {
            $last_code += 1;
        }
        $data['code'] = $last_code;
        $data['title'] = $this->input->post('title');
        $data['from_code'] = $from;
        $data['t_type'] = 'وصف';
        $this->db->insert('emp_ohad_device', $data);
    }

    function update_magal()
    {

        $id = $this->input->post('id');
        $data['title'] = $this->input->post('title');

        $data['t_type'] = 'فئه';
        $data['from_code'] = 0;
        $this->db->where('id', $id)->update('emp_ohad_device', $data);

    }

    function update_active($from = false)
    {
        $id = $this->input->post('id');
        // $from_code=$this->get_by('emp_ohad_device', array('id' => $id), 'from_code');
        // if (empty($from)) {
        //     $from = $this->input->post('from_code');
        // }
        // if ($from_code == $from){
        //     $from=$from_code;
        // }else{
        //     $last_code = $this->get_max($from);
        //     if ($last_code == 0) {
        //         $last_code = $from . '001';
        //     } else {
        //         $last_code += 1;
        //     }
        //     $data['from_code'] = $from;
        //     $data['code'] = $last_code;
        // }
        $data['title'] = $this->input->post('title');
        $this->db->where('id', $id)->update('emp_ohad_device', $data);
    }

    function delete_data($id)
    {
        $this->db->where('id', $id)->delete('emp_ohad_device');
    }

}