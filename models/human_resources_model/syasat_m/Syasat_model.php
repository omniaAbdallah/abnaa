<?php
class Syasat_model extends CI_Model
{
   
    public function __construct()
    {
        parent:: __construct();
    }
    public function insert_attach($all_img)
    {

                if (!empty($all_img)) {
                    $img_count = count($all_img);
                
        
                    for ($a = 0; $a < $img_count; $a++) {
                        $files['file'] = $all_img[$a];
                        $files['title'] = $this->input->post('title');
                        $files['edara_id_fk'] = $this->input->post('edara_id_fk');
                        $files['f2a'] = $this->input->post('f2a');
                        $files['date'] = strtotime(date("Y-m-d"));
                        $files['date_ar'] = date("Y-m-d");
                        if (isset($_SESSION['user_id'])) {
                            $files['publisher'] = $_SESSION['user_id'];
                            $files['publisher_name'] = $this->getUserName($_SESSION['user_id']);
                        }
                        $this->db->insert('hr_syasat', $files);
                    }
        
                }


    }
    public function get_edarat()
    {
        $query = $this->db->where('from_id_fk',0)->get('hr_edarat_aqsam');
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
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
    public function get_attach()
    {
        $query = $this->db->get('hr_syasat');
        if ($query->num_rows() > 0) {
            return $query->result();
        }

    }

    public function delete_attach($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('hr_syasat');
    }
    public function get_by($table, $where_arr, $select = false)
    {
        $q = $this->db->where($where_arr)
            ->get($table)->row();
        if (!empty($q)) {
            if (!empty($select)) {
                return $q->$select;
            } else {
                return $q;
            }
        } else {
            return false;
        }
    }
}
?>