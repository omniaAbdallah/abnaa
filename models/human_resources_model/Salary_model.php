<?php
class Salary_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function all_salaries()
    {
        $this->db->select('*');
        $this->db->from('hr_salary_doors');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function insert_salary()
    {
            $data['mo2hel'] = $this->input->post('mo2hel');
            $data['martba'] = $this->input->post('martba');
            $data['dawam_type'] = $this->input->post('dawam_type');
            $data['salary_start'] = $this->input->post('salary_start');
            $data['year_bonus_value'] = $this->input->post('year_bonus_value');
         
                $data['x_1']=$this->input->post('salary_start');
                $data['x_2']= $data['x_1']+$data['year_bonus_value'];
                $data['x_3']= $data['x_2']+$data['year_bonus_value'];
                $data['x_4']= $data['x_3']+$data['year_bonus_value'];
                $data['x_5']= $data['x_4']+$data['year_bonus_value'];
                $data['x_6']= $data['x_5']+$data['year_bonus_value'];
                $data['x_7']= $data['x_6']+$data['year_bonus_value'];
                $data['x_8']= $data['x_7']+$data['year_bonus_value'];
                $data['x_9']= $data['x_8']+$data['year_bonus_value'];
                $data['x_10']= $data['x_9']+$data['year_bonus_value'];
                $data['x_11']= $data['x_10']+$data['year_bonus_value'];
                $data['x_12']= $data['x_11']+$data['year_bonus_value'];
                $data['x_13']= $data['x_12']+$data['year_bonus_value'];
                $data['x_14']= $data['x_13']+$data['year_bonus_value'];
                $data['x_15']= $data['x_14']+$data['year_bonus_value'];
               
            $this->db->insert('hr_salary_doors', $data);
    }
    public function update_salary($id)
    {
        $data['mo2hel'] = $this->input->post('mo2hel');
        $data['martba'] = $this->input->post('martba');
        $data['dawam_type'] = $this->input->post('dawam_type');
        $data['salary_start'] = $this->input->post('salary_start');
        $data['year_bonus_value'] = $this->input->post('year_bonus_value');
     
            $data['x_1']=$this->input->post('salary_start');
            $data['x_2']= $data['x_1']+$data['year_bonus_value'];
            $data['x_3']= $data['x_2']+$data['year_bonus_value'];
            $data['x_4']= $data['x_3']+$data['year_bonus_value'];
            $data['x_5']= $data['x_4']+$data['year_bonus_value'];
            $data['x_6']= $data['x_5']+$data['year_bonus_value'];
            $data['x_7']= $data['x_6']+$data['year_bonus_value'];
            $data['x_8']= $data['x_7']+$data['year_bonus_value'];
            $data['x_9']= $data['x_8']+$data['year_bonus_value'];
            $data['x_10']= $data['x_9']+$data['year_bonus_value'];
            $data['x_11']= $data['x_10']+$data['year_bonus_value'];
            $data['x_12']= $data['x_11']+$data['year_bonus_value'];
            $data['x_13']= $data['x_12']+$data['year_bonus_value'];
            $data['x_14']= $data['x_13']+$data['year_bonus_value'];
            $data['x_15']= $data['x_14']+$data['year_bonus_value'];
        $this->db->where('id',$id);
        $this->db->update('hr_salary_doors',$data);
    }
    public function getById_salary($id)
    {
        $this->db->where('id',$id);
       $query =  $this->db->get('hr_salary_doors');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
    public function delete_salary($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('hr_salary_doors');
    }
}