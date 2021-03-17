<?php
class Syasat_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function insert($all_img)
    {
                        $data['fe2a_fk'] = $this->input->post('fe2a_fk');
                     
                        if(!empty($all_img))
                        {
                            $data['attach_file'] = $all_img;
                        }
                        $data['title'] = $this->input->post('title');
                        $edara=explode('-',$this->input->post('edara_id_fk'));
                        $data['edara_id'] 	       = $edara[0];
                        $data['edara_n'] 	       = $edara[1];
                        $data['nashr_fk'] = $this->input->post('nashr_fk');
                        $data['halet_3rd'] = $this->input->post('halet_3rd');
                        if(!empty($this->input->post('rkm')))
                        {
                            $data['rkm'] = $this->input->post('rkm');
                        }
                        if(!empty($this->input->post('d_date_ar')))
                        {
                            $data['d_date_ar'] = $this->input->post('d_date_ar');
                        }
                        if(!empty($this->input->post('ramz')))
                        {
                            $data['ramz'] = $this->input->post('ramz');
                        }
                        $data['date'] = strtotime(date("Y-m-d"));
                        $data['date_ar'] = date("Y-m-d");
                        if (isset($_SESSION['user_id'])) {
                            $data['publisher'] = $_SESSION['user_id'];
                            $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
                        }
                        $this->db->insert('hr_all_sysat', $data);
                    
                
    }
    public function update($all_img,$id)
    {
                        $data['fe2a_fk'] = $this->input->post('fe2a_fk');
                        if(!empty($all_img))
                        {
                            $data['attach_file'] = $all_img;
                        }
                        $data['title'] = $this->input->post('title');
                        $edara=explode('-',$this->input->post('edara_id_fk'));
                        $data['edara_id'] 	       = $edara[0];
                        $data['edara_n'] 	       = $edara[1];
                        $data['nashr_fk'] = $this->input->post('nashr_fk');
                        $data['halet_3rd'] = $this->input->post('halet_3rd');
                        if(!empty($this->input->post('rkm')))
                        {
                            $data['rkm'] = $this->input->post('rkm');
                        }
                        if(!empty($this->input->post('d_date_ar')))
                        {
                            $data['d_date_ar'] = $this->input->post('d_date_ar');
                        }
                        if(!empty($this->input->post('ramz')))
                        {
                            $data['ramz'] = $this->input->post('ramz');
                        }
                       
                        $this->db->where('id',$id)->update('hr_all_sysat', $data);      
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
    public function get_all_data()
    {
        $query = $this->db->order_by('fe2a_fk')->get('hr_all_sysat');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    public function delete_attach($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_all_sysat');
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