<?php
class Mosayar_month_m extends CI_Model
{

    public function insert_edara()
    {
       
        $data['year']= $this->input->post('year');
        $data['month']= $this->input->post('month');
        $data['from_date_ar']= $this->input->post('from_date_ar');
        $data['from_date']= strtotime($this->input->post('from_date_ar'));
        $data['to_date_ar']= $this->input->post('to_date_ar');
        $data['to_date']= strtotime($this->input->post('to_date_ar'));
        $this->db->insert('hr_mosayer_months',$data);
    }
    public function update_edara($id){
        $data['year']= $this->input->post('year');
        $data['month']= $this->input->post('month');
        $data['from_date_ar']= $this->input->post('from_date_ar');
        $data['from_date']= strtotime($this->input->post('from_date_ar'));
        $data['to_date_ar']= $this->input->post('to_date_ar');
        $data['to_date']= strtotime($this->input->post('to_date_ar'));
        $this->db->where('id',$id);
        $this->db->update('hr_mosayer_months',$data);
    }

    public function getById($id){
        $h = $this->db->get_where('hr_mosayer_months', array('id'=>$id));
        return $h->row_array();
    }
    public function select_all(){
        $this->db->select('*');
        $this->db->from('hr_mosayer_months');
      
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
               
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    public function check_code($year,$month)
    {
        $this->db->select('year','month');
        $this->db->from("hr_mosayer_months");
       $this->db->where("year", $year);
       $this->db->where("month", $month);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;
    }
    
////function for check day and retur  month
public function Check_month($date)
{
    $this->db->select('*');
    $this->db->from("hr_mosayer_months");
   $this->db->where("from_date_ar<=", $date);
   $this->db->where("to_date_ar>=", $date);
    $query = $this->db->get()->row();
    if (!empty($query)) {
        return $query;
    }
    else{
    return 0;
    }
}
   
  
}
