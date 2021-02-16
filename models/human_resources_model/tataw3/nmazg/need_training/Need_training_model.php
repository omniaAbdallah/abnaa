<?php
class Need_training_model extends CI_Model{


    public function select_last_rkm_talb(){
        $this->db->select('*');
        $this->db->from("tat_traning");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->traning_rkm;
            }
            return $data;
        }
        return 0;
    }

    public function add_need_training($id=''){

        $data['traning_rkm']= $this->input->post('traning_rkm');
        //$data['forsa_id_fk']= $this->input->post('forsa_id_fk');
      
        $forsa=explode('-',$this->input->post('forsa_id_fk'));
		$data['forsa_id_fk'] 	       = $forsa[0];
        $data['forsa_name'] 	       = $forsa[1];
     //   $data['motatw3_id_fk']= $this->input->post('motatw3_id_fk');

        $person=explode('-',$this->input->post('motatw3_id_fk'));
		$data['motatw3_id_fk'] 	       = $person[0];
        $data['motatw3_name'] 	       = $person[1];
        

        
        $data['ftra_tatw3']= $this->input->post('ftra_tatw3');
      //  $data['moshrf_id_fk']= $this->input->post('moshrf_id_fk');
        $mosrf=explode('-',$this->input->post('moshrf_id_fk'));
		$data['moshrf_id_fk'] 	       = $mosrf[0];
        $data['moshrf_name'] 	       = $mosrf[1];
        
        $data['t2hel']= $this->input->post('t2hel');
        $data['thseen_adaa']= $this->input->post('thseen_adaa');
        $data['ms2ol_quas']= $this->input->post('ms2ol_quas');

        $data['date'] 			   = strtotime(date("Y-m-d"));
		
		if(isset($_SESSION['user_id'])) {
			$data['publisher'] 	   = $_SESSION['user_id'];
			$data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
		}
        if (!empty($id)){
            $need_training_id_fk = $id;
            $this->db->where('id',$id);
            $this->db->update('tat_traning',$data);
        }else{

            $data['date']= date('Y-m-d');
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

            $this->db->insert('tat_traning',$data);
            $need_training_id_fk = $this->db->insert_id();
        }
        if(empty($id)){  return $need_training_id_fk; }

    }
    public function getRecordById($where)
	{
		return $this->db->where($where)->get('tat_traning')->row_array();
    }
    public function getRecordById_maham($where)
	{
		return $this->db->where($where)->get('tat_traning_maham')->result();
    }
    
    public function insert_traning_maham()
{
    if(!empty($this->input->post('mahm_need')))
    {
        $count=count($this->input->post('mahm_need'));
        for($x=0;$x<$count;$x++)
        {
            $data['traning_id_fk']=$this->input->post('traning_rkm');
            $data['maharat_need']=$this->input->post('maharat_need')[$x];
            $data['mahm_need']=$this->input->post('mahm_need')[$x];
            $data['maharat_need_approved']=$this->input->post('maharat_need_approved')[$x];
            $this->db->insert('tat_traning_maham', $data);
        }
    }
}
public function update_traning_maham($rkm)
{
        $this->db->where('traning_id_fk',$rkm) ;
        $this->db->delete('tat_traning_maham');
        if(!empty($this->input->post('mahm_need')))
        {
            $count=count($this->input->post('mahm_need'));
            for($x=0;$x<$count;$x++)
            {
                $data['traning_id_fk']=$this->input->post('traning_rkm');
                $data['maharat_need']=$this->input->post('maharat_need')[$x];
                $data['mahm_need']=$this->input->post('mahm_need')[$x];
                $data['maharat_need_approved']=$this->input->post('maharat_need_approved')[$x];
                $this->db->insert('tat_traning_maham', $data);
            }
        }
    }


    public function delete_need_training($id){
        $this->db->where("id", $id);
      
        $this->db->delete("tat_traning");


        $this->db->where('traning_id_fk',$id) ;
        $this->db->delete('tat_traning_maham');
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

   
   
    public function get_table($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}
	public function get_table_by_id($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table)->row();
        return $query;
	}
}