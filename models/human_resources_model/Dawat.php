<?php
class Dawat extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
      
      
    // <yaraaaaa26-7-2020>  
    public function get_action_da3wa()
    {
       
        return $this->db->where('emp_id', $_SESSION['emp_code'])
            ->where('seen',NULL)
            ->get('hr_emp_alerts')->row();
    }
    public function reply_dawa()
    {
     
        if($this->input->post('action')=='refuse')
        {
            $data['seen']= 2;
            $data['seen_time'] = date('h:i:s a');
            $data['seen_date'] = date('Y-m-d');
            $this->db->where('emp_id', $_SESSION['emp_code'])
                ->update('hr_emp_alerts', $data);
        }
        else if($this->input->post('action')=='accept')
        {
            $data['seen']= 1;
            $data['seen_time'] = date('h:i:s a');
            $data['seen_date'] = date('Y-m-d');
            $this->db->where('emp_id', $_SESSION['emp_code'])
                ->update('hr_emp_alerts', $data);
        } 
    }
   // <yaraaaaa26-7-2020>  
    
    }