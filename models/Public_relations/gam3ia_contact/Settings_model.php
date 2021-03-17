<?php
class Settings_model  extends CI_Model{

    public function insert_setting($type)
    {
        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');

        $this->db->insert('pr_contact_setting',$data);
    }
    public function get_all_data($arr_all){
        foreach ($arr_all as $key=>$value) {
            $data[$key] = $this->get_type($key);
        }
        return $data;
    }
    public function  get_type($type)
    {
        $this->db->where("type", $type);
        $query = $this->db->get('pr_contact_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function update_setting($id)
    {
        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');
        $this->db->where('id',$id);
        $this->db->update('pr_contact_setting',$data);
    }
    public function getById($id)
    {
        return $this->db->get_where('pr_contact_setting', array('id'=>$id))->row();
    }
    public function delete_setting($id)
    {
        $this->db->where('id', $id)->delete('pr_contact_setting');
    }


}
