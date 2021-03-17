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
                $query[$key]->job_title = $this->get_by('all_defined_setting', array('defined_id' => $item->job_id_fk), 'defined_title');
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

        $id = $this->input->post('id');
        if ($id == 0) {
            $data['level'] = $this->input->post('level');
            if ($this->input->post('from_id')) {
                $data['from_id'] = $this->input->post('from_id');
            }
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
            $data['edite_by'] = $_SESSION['user_id'];
            $this->db->where('id', $id)->update('hr_administrative_structure', $data);
        }
        return $this->db->insert_id();
    }

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

}