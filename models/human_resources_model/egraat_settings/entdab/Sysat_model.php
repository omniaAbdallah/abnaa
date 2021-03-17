<?php
class Sysat_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    
    public function insert_sysat(){
        $check=$this->get_records();
      
        if($check !='')
        {
            $data['hours_out_work_days']=$this->input->post('hours_out_work_days');
            $data['hours_out_vacation_days']=$this->input->post('hours_out_vacation_days'); 
              $this->db->where('title','badl_hours_edafi');
              $this->db->update('hr_entdab_sysat_setting',$data);
        }else{
            $data['title']='badl_hours_edafi';
            $data['hours_out_work_days']=$this->input->post('hours_out_work_days');
            $data['hours_out_vacation_days']=$this->input->post('hours_out_vacation_days'); 
            $this->db->insert('hr_entdab_sysat_setting',$data);
        }
       
        
        

        }
        // insert_tklef
        public function insert_tklef(){
           
            $check_taklef=$this->get_records_taklef();
           
            if($check_taklef !='')
            {
                $data['taklef_moda_minmum']=$this->input->post('taklef_moda_minmum');
                $data['taklef_moda_maxmum']=$this->input->post('taklef_moda_maxmum'); 
                $data['taklef_badel_minmum']=$this->input->post('taklef_badel_minmum');
                $data['taklef_badel_maxmum']=$this->input->post('taklef_badel_maxmum'); 
                  $this->db->where('title','badl_taklef_wekala');
                  $this->db->update('hr_entdab_sysat_setting',$data);
            }else{
                $data['title']='badl_taklef_wekala';
                $data['taklef_moda_minmum']=$this->input->post('taklef_moda_minmum');
                $data['taklef_moda_maxmum']=$this->input->post('taklef_moda_maxmum'); 
                $data['taklef_badel_minmum']=$this->input->post('taklef_badel_minmum');
                $data['taklef_badel_maxmum']=$this->input->post('taklef_badel_maxmum'); 
                $this->db->insert('hr_entdab_sysat_setting',$data);
            }
            
            
    
            }
        public function get_records(){
            $query = $this->db->where('title','badl_hours_edafi')->get('hr_entdab_sysat_setting')->row();     
            return $query;    
        }
        // /get_records_taklef
        public function get_records_taklef(){
            $query = $this->db->where('title','badl_taklef_wekala')->get('hr_entdab_sysat_setting')->row();     
            return $query;    
        }

       
        public function get_manager_cat()
        {
            return $this->db->get('hr_main_cat')->result();
        }
        public function get_all_badalat($id)
        {
           
            $this->db->where_not_in('id', $id);
            $this->db->order_by('in_order',"ASC");
            return $this->db->get('hr_main_cat')->result();
        }
        public function getBadalat_id_by_emp($type)
	{
		$query = $this->db->where('title', $type)->get('hr_entdab_sysat_setting')->result();
		$data = array();
		$x = 0;
		foreach ($query as $row) {
			$data[] = $row->mostwa_wazefy;
			$x++;
		}
		if(!empty($data))
		{
		return $data;
		}else{
			return 0;
		}
    }
///////////////////////////////////////////////
        public function insert_badel_out($id){
            if($id !='')
            {
                $data['mostwa_wazefy']=$this->input->post('mostwa_wazefy');
                $data['badal_value_part_day']=$this->input->post('badal_value_part_day'); 
                $data['badal_value_full_day']=$this->input->post('badal_value_full_day');
                  $this->db->where('id',$id);
                  $this->db->update('hr_entdab_sysat_setting',$data);
            }else{
                $data['title']='badel_entab_out';
                $data['mostwa_wazefy']=$this->input->post('mostwa_wazefy');
                $data['badal_value_part_day']=$this->input->post('badal_value_part_day'); 
                $data['badal_value_full_day']=$this->input->post('badal_value_full_day');
                $this->db->insert('hr_entdab_sysat_setting',$data);
            }
            }

            // get_badel_out_by_id
            public function get_badel_out_by_id($id){
                $query = $this->db->where('id',$id)->get('hr_entdab_sysat_setting')->row();     
                return $query;    
            }
            public function get_records_badel_out(){
                $query = $this->db->where('title','badel_entab_out')->get('hr_entdab_sysat_setting')->result();     
                return $query;    
            }
            // delete_badel_out
            public function delete_badel_out($id){
                
                      $this->db->where('id',$id);
                      $this->db->delete('hr_entdab_sysat_setting');
               
                }
                ////////////////////////////
                public function insert_badel_in($id){
                    if($id !='')
                    {
                        $data['mostwa_wazefy']=$this->input->post('mostwa_wazefy');
                        $data['badal_value_part_day']=$this->input->post('badal_value_part_day'); 
                        $data['badal_value_full_day']=$this->input->post('badal_value_full_day');
                          $this->db->where('id',$id);
                          $this->db->update('hr_entdab_sysat_setting',$data);
                    }else{
                        $data['title']='badel_entab_in';
                        $data['mostwa_wazefy']=$this->input->post('mostwa_wazefy');
                        $data['badal_value_part_day']=$this->input->post('badal_value_part_day'); 
                        $data['badal_value_full_day']=$this->input->post('badal_value_full_day');
                        $this->db->insert('hr_entdab_sysat_setting',$data);
                    }
                    }
        
                    // get_badel_out_by_id
                    public function get_badel_in_by_id($id){
                        $query = $this->db->where('id',$id)->get('hr_entdab_sysat_setting')->row();     
                        return $query;    
                    }
                    public function get_records_badel_in(){
                        $query = $this->db->where('title','badel_entab_in')->get('hr_entdab_sysat_setting')->result();     
                        return $query;    
                    }
}