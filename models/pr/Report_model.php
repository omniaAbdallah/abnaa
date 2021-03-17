<?php
class Report_model extends CI_Model
{

    public function display($table)
    {
        $this->db->select('*');
        $this->db->from($table);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;


    }

    public function insert_report($file){
        $data['title'] = $this->input->post('title');
        $data['icon'] = $this->input->post('icon');
        $data['year'] = $this->input->post('year');
        $data['file'] = $file;
        $this->db->insert('pr_reports',$data);
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_reports');
    }

    public function update($id,$file){
        $data['title'] = $this->input->post('title');
        $data['icon'] = $this->input->post('icon');
        $data['year'] = $this->input->post('year');
    if (isset($file)){
        $data['file'] = $file;
    }

        $this->db->where('id',$id);
        $this->db->update('pr_reports',$data);

    }

    public function get_by_id($id){

        $this->db->select('*');
        $this->db->from('pr_reports');
        $this->db->where('id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;

    }
}