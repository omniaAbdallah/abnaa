<?php
class File_research_attaches extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_mother_data()
    {
        $mother_num = $this->uri->segment(5);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('mother');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->m_card_source);
                $x++;
            }
            return $data;

        } else {
            return false;
        }
    }
    public function get_dest_card($id)
    {
        $this->db->where('id_setting', $id);

        $query = $this->db->get('family_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        } else {
            return false;
        }

    }
    public function get_father_data()
    {
        $mother_num = $this->uri->segment(5);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('father');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->f_card_source);
            $x++;
            }
            return $data;

        } else {
            return false;
        }


    }
    public function get_f_member()
    {
        $mother_num = $this->uri->segment(5);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('f_members');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->member_card_source);
            $x++;
            }
            return $data;

        } else {
            return false;
        }


    }
    public function get_basic_data($mother_national_num){
        $this->db->select('*');
       $this->db->from("basic");
       $this->db->where("mother_national_num",$mother_national_num);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           return $query->row();
       }
       return false;
   }
    public function get_wakel_data()
    {
        $mother_num = $this->uri->segment(5);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('wakels');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->w_card_source);
            $x++;
            }
            return $data;

        } else {
            return false;
        }


    }
    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("family_basic_research");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id;
            }
            return $data +1;
        }else{
            return 1;
        }

    }
   
  

    public function insert_files()
    {
      $mother_national=$this->input->post('mother_national_num');
        $data['file_num'] = $this->input->post('file_num');
        $data['rkm']= $this->input->post('num');
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num');
        $option = explode("-",$this->input->post('option_select'));
        $data['person_national_num'] = $option[1];
        $data['person_type'] = $option[0];
        $data['person_name'] = $option[2];
        $data['date'] = date('Y-m-d');
        $this->db->insert('family_basic_research', $data);

        // foreach ($this->input->post('option_select') as $record) {

           
        //     $this->db->insert('family_basic_research_files', $data);
        // }

        $ids = $this->input->post('doc_id_fk');
        // $this->db->where('mother_national_num', $mother_national);
        // $this->db->delete('family_basic_research_files');
      

        for ($i = 0; $i < count($ids); $i++) {
            $data2['family_basic_research_id_fk'] = $this->input->post('num');
            $data2['doc_id_fk'] = $this->input->post('doc_id_fk')[$i];
            $data2['doc_status_fk'] = $this->input->post('doc_status_fk')[$i];
            $data2['doc_notes'] = $this->input->post('doc_notes')[$i];
            $this->db->insert('family_basic_research_files', $data2);
        }


    }
    public function get_RequiredFiles($id)
    {
        $this->db->select('*');
        $this->db->where("id",$id);
        $query=$this->db->get('family_basic_research');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            
 
            $data->required_files = $this->get_required_files($data->id);
            
            
            return  $data;
        }
        return false;
    }
    public function get_required_files($id)
    {
        $this->db->where('family_basic_research_id_fk',$id);
        $query=$this->db->get('family_basic_research_files');
        if($query->num_rows()>0)
        {
            foreach ($query->result()as $row) {
                $data[$row->doc_id_fk] = $row;
            }
            return $data;

        }
        return false;

    }


    public function update_files($id)
    {
      $mother_national=$this->input->post('mother_national_num');
        $data['file_num'] = $this->input->post('file_num');
        $data['rkm']= $this->input->post('num');
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num');
        $option = explode("-",$this->input->post('option_select'));
        $data['person_national_num'] = $option[1];
        $data['person_type'] = $option[0];
        $data['person_name'] = $option[2];
        $data['date'] = date('Y-m-d');
        $this->db->where('id',$id)->update('family_basic_research', $data);

        // foreach ($this->input->post('option_select') as $record) {

           
        //     $this->db->insert('family_basic_research_files', $data);
        // }

        $ids = $this->input->post('doc_id_fk');
        $this->db->where('family_basic_research_id_fk', $id);
        $this->db->delete('family_basic_research_files');
      

        for ($i = 0; $i < count($ids); $i++) {
            $data2['family_basic_research_id_fk'] = $this->input->post('num');
            $data2['doc_id_fk'] = $this->input->post('doc_id_fk')[$i];
            $data2['doc_status_fk'] = $this->input->post('doc_status_fk')[$i];
            $data2['doc_notes'] = $this->input->post('doc_notes')[$i];
            $this->db->insert('family_basic_research_files', $data2);
        }


    }






    public function delete_letter($id){
 
        $this->db->where(array('id'=>$id));
        $this->db->delete("family_basic_research");
        $this->db->where(array('family_basic_research_id_fk'=>$id));
        $this->db->delete("family_basic_research_files");
    }

    public function get_letters_by_type()
    {
        $mother_num = $this->uri->segment(5);

        $arr = array( 'mother_national_num_fk' => $mother_num);
        $this->db->where($arr);
       

        $query = $this->db->get('family_basic_research');
        if ($query->num_rows() > 0) {
            $data=array();
            $x=0;
            foreach($query->result() as $row){
                $data[$x]=$row;
                $data[$x]->num =$this->get_type($row->mother_national_num_fk);

                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }
	
	   public function get_type($id)
    {
        $this->db->where('mother_national_num',$id);
        $query=$this->db->get('basic');
        if($query->num_rows()>0)
        {
        if($query->row()->final_suspend==0)
        {
          return  'ط /'. $query->row()->id  ;
        }elseif($query->row()->final_suspend==4){
            return   'م /'. $query->row()->file_num;
        }
        }else{
            return false;

        }
    }

}?>