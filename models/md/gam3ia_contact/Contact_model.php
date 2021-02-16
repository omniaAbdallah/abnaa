<?php

class Contact_model extends CI_Model{

    public function get_from_setting($type)
    {
        $this->db->where("type", $type);
        $query = $this->db->get('md_gam3ia_contact_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function add_contact(){

        $contact_type_fk = $this->input->post('contact_type_fk');
        if (!empty($contact_type_fk)){
            $contact_typ_arr = explode('-',$contact_type_fk);
            $data['contact_type_fk']= $contact_typ_arr[0];
            $data['contact_type_n']= $contact_typ_arr[1];

        }
        $data['content']= strip_tags($this->input->post('content')) ;
        $data['publisher']= $this->input->post('mother_num') ;
        $data['publisher_name']= $this->input->post('mother_name') ;
        $data['date_ar']= date('Y-m-d');
        $data['date']= strtotime(date('Y-m-d')) ;
        $data['time']= date('h:i A') ;
        $data['jwal']= $this->input->post('jwal') ;

        $this->db->insert('md_gam3ia_contact',$data);


    }

   /* public function get_all_messags($value){
        $this->db->where("suspend", $value);
        $query = $this->db->get('md_gam3ia_contact');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }*/

    public function get_all_messags($value){
        $this->db->where("suspend", $value);
        $query = $this->db->get('md_gam3ia_contact');
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->contact_type_color= $this->get_color($row->contact_type_fk);
                $data[$i]->egraa_color= $this->get_color($row->egraa_id_fk);
                $i++;

            }
            return $data;

            // return $query->result();
        }
        return false;
    }

    public function get_by_id($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get('md_gam3ia_contact');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

   /* public function update_egraa($id){
        $data['suspend']= 4 ;
        $egraa_id_fk = $this->input->post('egraa_id_fk');
        if (!empty($egraa_id_fk)){
            $egraa_id_arr = explode('-',$egraa_id_fk);
            $data['egraa_id_fk']= $egraa_id_arr[0];
            $data['egraa_n']= $egraa_id_arr[1];

        }
        $data['suspend_publisher'] = $_SESSION['user_id'];
        $data['suspend_publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['suspend_date'] =date('Y-m-d');
        $data['suspend_time']= date('h:i A') ;
        $this->db->where('id',$id);
        $this->db->update('md_gam3ia_contact',$data);
    }*/
    public function update_egraa($id){
        $data['suspend']= 4 ;
        $egraa_id_fk = $this->input->post('egraa_id_fk');
        if (!empty($egraa_id_fk)){
            $egraa_id_arr = explode('-',$egraa_id_fk);
            $data['egraa_id_fk']= $egraa_id_arr[0];
            $data['egraa_n']= $egraa_id_arr[1];
        }
        $data['egraa_note'] = $this->input->post('egraa_note');
        $data['suspend_publisher'] = $_SESSION['user_id'];
        $data['suspend_publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['suspend_date'] =date('Y-m-d');
        $data['suspend_time']= date('h:i A') ;
        $this->db->where('id',$id);
        $this->db->update('md_gam3ia_contact',$data);
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
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'md_all_magls_edara_members';
                $field = 'mem_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'md_all_gam3ia_omomia_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }


    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }



    //////////////////////////// new ///////////////////////////


    public function delete_message($id){
        $this->db->where('id',$id);
        $this->db->delete('md_gam3ia_contact');
    }

    public function get_color($id){
        $this->db->where("id", $id);
        $query = $this->db->get('md_gam3ia_contact_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->color;
        }
        return false;
    }
    
    
    public  function get_osra_data($mother_national_num_fk){
    
        $h = $this->db->get_where("basic", array('mother_national_num'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr;

    }
    
    
}