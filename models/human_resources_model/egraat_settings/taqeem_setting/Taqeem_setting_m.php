<?php
class Taqeem_setting_m extends CI_Model
{

    public function insert_edara()
    {
       
        $data['item_name']= $this->input->post('item_name');
        $data['shwahd']= $this->input->post('shwahd');
        $data['masool_id']= $this->input->post('masool_id');
        $data['masool_code']= $this->input->post('masool_code');
        $data['masool_name']= $this->input->post('masool_name');
        $data['max_degree']= $this->input->post('max_degree');
        $data['add_time'] = date('h:i:s a');
        $data['add_date'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);;

       
       
        $this->db->insert('hr_evaluation_emp_setting',$data);
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
    public function update_edara($id){
        $data['item_name']= $this->input->post('item_name');
        $data['shwahd']= $this->input->post('shwahd');
        $data['masool_id']= $this->input->post('masool_id');
        $data['masool_code']= $this->input->post('masool_code');
        $data['masool_name']= $this->input->post('masool_name');
        $data['max_degree']= $this->input->post('max_degree');
        $this->db->where('id',$id);
        $this->db->update('hr_evaluation_emp_setting',$data);
    }

    public function getById($id){
        $h = $this->db->get_where('hr_evaluation_emp_setting', array('id'=>$id));
        return $h->row_array();
    }
    public function select_all(){
        $this->db->select('*');
        $this->db->from('hr_evaluation_emp_setting');
      
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
               // $query_result[$i]->count =$this->get_sub($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    public function get_all_emp()
    {
         $this->db->select('*');
         $this->db->from('hr_egraat_setting');
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $x=1;
             foreach ( $query->result() as $row){
                 $data[$x] =  $row;
             $x++;
             }
             return $data ;
         }
        return false;
    }
	
   
  
}
