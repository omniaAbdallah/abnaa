<?php



class Foras_model extends CI_Model{


    public function get_foras($id=''){

        if (!empty($id)){

            $this->db->where("id", $id);

        }

        if (empty($id)){

            $this->db->order_by("id", 'DESC');

        }

       // $query = $this->db->get('tat_foras');

        $q = $this->db->get('tat_foras')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->mobdra_n = $this->get_table('tat_settings',array('code'=>$row->mobadra_code),'title');
                $q[$key]->city_n =$this->get_table('cities',array('id'=>$row->madina),'name');
              
            }
            return $q;
        }

    }

    public function get_last_record()
    {
        $this->db->select('accepted,foras_id_fk');
		$this->db->order_by('id','desc');
        $this->db->where('person_id_fk',$_SESSION['id']);
       
        $query=$this->db->get('tat_eshtrakat_foras');
        if($query->num_rows()>0)
        {
            return $query->row() ;
		}
		
    
    }
    public function update_foras_tataw3($id)
    {
        $data['foras_id_fk']= $id;

        $data['person_type']=1;

        $data['person_id_fk']= $_SESSION['id'];

        $data['person_n']= $_SESSION['name'];

        $data['date']= date('Y-m-d');

       

        $data['publisher_n'] = $_SESSION['name'];
        $data['accepted']= 1;
        $data['date_accepted']= date('Y-m-d');
        $this->db->insert('tat_eshtrakat_foras',$data);

        // $data_motato3['current_forsa_fk']=$id;
        // $this->db->where('id',$_SESSION['id'])->update('tat_motat3en',$data_motato3);
       
    }

    public function  get_from_settings($from_code)

    {

        $this->db->where("from_code", $from_code);

        $query = $this->db->get('tat_settings');

        if ($query->num_rows() > 0) {

            return $query->result();

        }

        return false;

    }



    public function add_foras($file,$id=''){

        $data['forsa_name']= $this->input->post('forsa_name');

        $data['forsa_name_abbr']= $this->input->post('forsa_name_abbr');

        $data['wasf']= $this->input->post('wasf');

        $data['anshta']= $this->input->post('anshta');

        $data['makan']= $this->input->post('makan');

        $data['shroot']= $this->input->post('shroot');

        $data['a3ed_motatw3']= $this->input->post('a3ed_motatw3');

        $data['mobadra_code']= $this->input->post('mobadra_code');

        $data['madina']= $this->input->post('madina');

        $data['start_date']= $this->input->post('start_date');

        $data['end_date']= $this->input->post('end_date');

        $data['start_join_date']= $this->input->post('start_join_date');

        $data['end_join_date']= $this->input->post('end_join_date');

        $data['gender']= $this->input->post('gender');

        $data['tataw3_hours']= $this->input->post('tataw3_hours');

        $data['aytam_amal']= $this->input->post('aytam_amal');

        $data['moshrf_name']= $this->input->post('moshrf_name');

        $data['moshrf_jwal']= $this->input->post('moshrf_jwal');

        if (!empty($file)){

            $data['mnazm_logo']= $file;

        }

        $data['date']= date('Y-m-d');

        $data['publisher'] = $_SESSION['user_id'];

        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

        if (!empty($id)){

            $this->db->where('id',$id);

            $this->db->update('tat_foras',$data);

        }else{

            $this->db->insert('tat_foras',$data);

            return $this->db->insert_id();

        }



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



    public function get_cities(){

        $this->db->where("from_id_fk", 0);

        $query = $this->db->get('cities');

        if ($query->num_rows() > 0) {

            return $query->result();

        }

        return false;

    }



    public function delete_foras($id){

        $this->db->where("id", $id);

        $this->db->delete("tat_foras");

    }

    public function get_table($table,$arr,$field){

        $this->db->where($arr);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->row()->$field;

        }

        return false;

    }

}