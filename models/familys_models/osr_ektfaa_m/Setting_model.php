<?php
class Setting_model extends CI_Model{
    function add_leading_zero($value, $threshold = 3)
    {
        return sprintf('%0' . $threshold . 's', $value);
    }
    public function get_code($from_code)
    {
        $this->db->where('from_code', $from_code);
        $this->db->select_max('code');
        $query = $this->db->get('osr_ektfaa_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->code;
        } else {
            return false;
        }
    }
    public function insert_setting($type)
    {
        $data['title'] = $this->input->post('title');

        $data['from_code'] = $type;

        if($data['from_code']==501)
        {
            $data['band_type'] = $this->input->post('band_type');
        }
        $code = $this->get_code($type);
        $n = $this->add_leading_zero(1);
        if (!empty($code)) {
            $data['code'] = $code + 1;
        } else {
            $data['code'] = $type . $n;
        }
        $data['date_ar'] = date("Y-m-d");
        $data['date'] =  strtotime(date("Y-m-d"));
        if ($_SESSION['role_id_fk'] == 1) {
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];;
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }
        $this->db->insert('osr_ektfaa_setting', $data);
    }
    public function get_all_data($arr_all)
    {
        foreach ($arr_all as $key => $value) {
            $data[$key] = $this->get_type($key);
        }
        return $data;
    }
    public function get_type($type)
    {
        $this->db->where("from_code", $type);
        if($type==501)
        {
            $this->db->order_by("band_type","ASC");
        }
        $query = $this->db->get('osr_ektfaa_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function update_setting($id)
    {
        $data['title'] = $this->input->post('title');
        if(!empty($this->input->post('band_type')))
        {
            $data['band_type'] = $this->input->post('band_type');
        }
        $this->db->where('id', $id);
        $this->db->update('osr_ektfaa_setting', $data);
    }
    public function getById($id)
    {
        return $this->db->get_where('osr_ektfaa_setting', array('id' => $id))->row();
    }
    public function delete_setting($id)
    {
        $this->db->where('id', $id)->delete('osr_ektfaa_setting');
    }
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('osr_ektfaa_setting')->row();
    }
    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }
}