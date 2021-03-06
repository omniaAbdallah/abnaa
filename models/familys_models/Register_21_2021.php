<?php

class Register extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function select_last_file_num()
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->order_by('file_num', "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result()[0]->file_num + 1;
            return $data;
        } else {

            return false;
        }

    }

//---------------------------------------------
    public function inserted_reg()
    {
        $data['user_name'] = $this->input->post('user_name');
        $password = $this->input->post('user_password', true);
        $password = sha1(md5($password));
        $data['user_password'] = $password;
        $data['mother_mob'] = $this->chek_Null($this->input->post('mother_mob'));
        $data['n_name'] = $this->input->post('user_password', true);
        $data['mother_national_num'] = $this->chek_Null($this->input->post('mother_national_num'));
        $data['register_place'] = $this->chek_Null($this->input->post('register_place'));
        $data['date_registration'] = strtotime(date("Y-m-d", time()));
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['bank_ramz'] = $this->chek_Null($this->input->post('bank_ramz'));
        $explode = explode("-", $this->input->post('bank_account_id'));
        $data['bank_account_id'] = $explode[0];
        $data['bank_account_num'] = $this->chek_Null($this->input->post('wakeel_bank_num'));
        $data['person_account'] = $this->input->post('person_account');
        $data['person_response'] = 0; // ���� 
        $data['publisher'] = $_SESSION['user_name'];
        $this->db->insert('basic', $data);
    }

    public function inserted_reg_wakel()
    {
        $data['user_name'] = $this->input->post('mother_national_num');
        $password = $this->input->post('user_password', true);
        $password = sha1(md5($password));
        $data['user_password'] = $password;
        $data['mother_mob'] = $this->input->post('mother_mob');
        $data['n_name'] = $this->input->post('user_password', true);
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['register_place'] = $this->input->post('register_place');
        $data['date_registration'] = strtotime(date("Y-m-d", time()));
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['bank_ramz'] = $this->input->post('bank_ramz');
        $explode = explode("-", $this->input->post('bank_account_id'));
        $data['bank_account_id'] = $explode[0];
        $data['bank_account_num'] = $this->chek_Null($this->input->post('wakeel_bank_num'));
        $data['person_account'] = $this->input->post('agent_bank_account');
        $data['person_response'] = 1; // ���� 
        $data['publisher'] = $_SESSION['user_name'];
        $data['agent_name'] = $this->input->post('agent_name');
        $data['agent_mob'] = $this->input->post('agent_mob');
        $data['agent_card'] = $this->input->post('agent_card');
        $data['agent_card_source'] = $this->input->post('agent_card_source');
        $data['agent_relationship'] = $this->chek_Null($this->input->post('agent_relationship'));
        $data['agent_bank_account'] = $this->chek_Null($this->input->post('agent_bank_account'));
        $this->db->insert('basic', $data);
    }

    public function inserted()
    {
        $data['user_name'] = $this->input->post('user_name');
        $password = $this->input->post('user_password', true);
        $password = sha1(md5($password));
        $data['user_password'] = $password;
        $data['mother_mob'] = $this->input->post('mother_mob');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['register_place'] = $this->input->post('register_place');
        $data['date_registration'] = strtotime(date("Y-m-d", time()));
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['date_suspend'] = $this->input->post('date_suspend');
        $data['file_num'] = $this->input->post('file_num');
        $data['file_update_date'] = $this->input->post('update_date');
        $data['bank_ramz'] = $this->input->post('bank_ramz');
        $explode = explode("-", $this->input->post('bank_account_id'));
        $data['bank_account_id'] = $explode[0];
        $data['bank_account_num'] = $this->chek_Null($this->input->post('wakeel_bank_num'));
        /****************ahmed*/
        $data['peroid_update'] = $this->input->post('peroid_update');
        $data['person_response'] = $this->input->post('person_response');
        $data['person_account'] = $this->input->post('person_account');
        $data['agent_name'] = $this->input->post('agent_name');
        $data['agent_card'] = $this->input->post('agent_card');
        $data['agent_card_source'] = $this->input->post('agent_card_source');
        $data['agent_relationship'] = $this->chek_Null($this->input->post('agent_relationship'));
        $data['agent_bank_account'] = $this->chek_Null($this->input->post('agent_bank_account'));
//$data['bank_account_id'] =$this->chek_Null($this->input->post('bank_account_id'));
        /****************ahmed*/
        $this->db->insert('basic', $data);
    }

    /*	 public function update_status()
        {
            $mother_num=$this->input->post('mother_national');
            $data['peroid_update']=$this->input->post('peroid_update');
            $data['date_suspend']=$this->input->post('date_suspend');
            $data['file_num']=$this->input->post('file_num');
            $data['file_update_date']=$this->input->post('update_date');
            $this->db->where('id', $mother_num);
            $this->db->update('basic',$data);
        }*/
    public function update_status() //old
    {
        $mother_num = $this->input->post('mother_national');
        $data['mother_national_num_fk'] = $mother_num;
        $data['from_date'] = strtotime($this->input->post('last_update_date'));
        $data['from_date_ar'] = ($this->input->post('last_update_date'));
        $data['peroid'] = $this->input->post('peroid_update');
        $data['to_date'] = strtotime($this->input->post('update_date'));
        $data['to_date_ar'] = ($this->input->post('update_date'));
        
        $this->db->insert('update_family_files_details', $data);
        
        $file_update_date = $this->get_file_update_date($mother_num);
        if($file_update_date == 0){
          $data2['file_open_update_date'] = $this->input->post('date_suspend');  
        }elseif($file_update_date !=0){
            
        }
        
        
        $data2['file_update_date'] = $this->input->post('update_date');
        $this->db->where('mother_national_num', $mother_num);
        $this->db->update('basic', $data2);
    }
    
      public function get_file_update_date($mother_national_num)
    {
        $h = $this->db->get_where("basic", array('mother_national_num' => $mother_national_num));
        $arr = $h->row_array();
        return $arr['file_update_date'];
    }

    public function select_last_mother()
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data[0]->mother_national_num;
        }
        return false;
    }

    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data[0]->id;
        }
        return false;
    }

    public function get_from_files_option_updates()
    {
        return $this->db->get('files_option_updates')->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('basic')->row();
    }

    public function get_by_mother_national_num($id)
    {
        $this->db->where('mother_national_num', $id);
        return $this->db->get('basic')->row_array();
    }

    public function get_file_num()
    {
        /*  $this->db->select_max('file_num');
          $this->db->where('suspend',4);
         $query=$this->db->get('basic');
          return $query->row()->file_num;
      */
        $this->db->select_max('file_num');
        $this->db->where('suspend', 4);
        $result = $this->db->get('basic')->row();
        return $result->file_num;
    }
    /*	public function get_file_num()
    {
        $this->db->select('file_num');
        $this->db->where('suspend',4);
        $this->db->order_by('id','DESC');
        return $this->db->get('basic')->row()->file_num;
    }*/
    /*
        public function get_file_num()
    {
        $this->db->select('file_num');
        $this->db->where('suspend', 4);
        $this->db->order_by('id','DESC');
        $query= $this->db->get('basic');
        if($query->num_rows()>0){
            return $query->row()->file_num;
        }else{
            return -1;
      }
    }
    */
//---------------------------------------------
    public function updated($id)
    {
        if ($this->input->post('user_password')) {
            $password = $this->input->post('user_password', true);
            $password = sha1(md5($password));
            $data['user_password'] = $password;
        } else {
        }
        $data['peroid_update'] = $this->input->post('peroid_update');
        /****************ahmed*/
        $data['person_response'] = $this->input->post('person_response');
        $data['person_account'] = $this->input->post('person_account');
        $data['agent_name'] = $this->input->post('agent_name');
        $data['agent_card'] = $this->input->post('agent_card');
        $data['agent_card_source'] = $this->input->post('agent_card_source');
        $data['agent_relationship'] = $this->input->post('agent_relationship');
        $data['agent_bank_account'] = $this->input->post('agent_bank_account');
//$data['bank_account_id']=$this->input->post('bank_account_id');
        $data['date_suspend'] = $this->input->post('date_suspend');
        $data['file_num'] = $this->input->post('file_num');
        $data['file_update_date'] = $this->input->post('update_date');
        /****************ahmed*/
        $data['bank_ramz'] = $this->input->post('bank_ramz');
        $explode = explode("-", $this->input->post('bank_account_id'));
        $data['bank_account_id'] = $explode[0];
        $data['bank_account_num'] = $this->chek_Null($this->input->post('wakeel_bank_num'));
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['user_name'] = $this->input->post('user_name');
        $data['mother_mob'] = $this->input->post('mother_mob');
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_name'];
        $this->db->where('id', $id);
        $this->db->update('basic', $data);
    }

    //--------------------------------------------
    public function update_pass($id)
    {
        $password = $this->input->post('user_password', true);
        $password = sha1(md5($password));
        $data['user_password'] = $password;
        $this->db->where('mother_national_num', $id);
        $this->db->update('basic', $data);
    }

    //=========================================================
    public function delete($id)
    {
        /*
          //===== basic table ======
          $this->db->where('mother_national_num',$id);
          $this->db->delete('basic');
          //===== mother table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('mother');
          //===== father table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('father');        
          //===== houses table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('houses'); 
          //=====  f_members table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('f_members');
          //=====  financial table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('financial');
          //=====  devices table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('devices');  
          //=====  family_attach_files table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('family_attach_files');
          //======== researcher_opinion =========
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('researcher_opinion');
          //====== ����� ������ =====
          //=====  electrical_device_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('electrical_device_order');  
          //=====  electrical_device_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('electrical_fatora_order');  
          //=====  maintenance_electrical_device_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('maintenance_electrical_device_order');  
          //=====  furniture_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('furniture_order');  
          //=====  furniture_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('water_fatora_order');  
          //=====  cars_repairs_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('cars_repairs_order'); 
          //=====  home_repairs_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('home_repairs_order');  
          //=====  restore_repairs_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('restore_repairs_order');  
          //=====  haj_omra_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('haj_omra_order'); 
          //=====  health_care_orders table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('health_care_orders'); 
          //=====  insurance_medical_device_orders table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('insurance_medical_device_orders'); 
          //=====  school_supplies_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('school_supplies_order');
          //=====  marriage_help table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('marriage_help');
          //=====  medical_center table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('medical_center');
          //=====  electronic_card table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('electronic_card');    
           */
        $update['deleted'] = 1;
        $this->db->where('mother_national_num', $id);
        $this->db->update('basic', $update);
        $dataa['mother_national_id_fk'] = $id;
        $dataa['deleted_date'] = strtotime(date("Y-m-d"));
        $dataa['deleted_date_s'] = time();;
        $dataa['deleted_date_ar'] = date("Y-m-d");
        $dataa['publisher'] = $_SESSION['user_id'];;
        $this->db->insert('family_deleted', $dataa);
        /********************************************/
    }

    public function uppdate_delet_basic($id)
    {
        $update['deleted'] = 0;
        $this->db->where('mother_national_num', $id);
        $this->db->update('basic', $update);
    }

    /**
     * ===============================================================================================================
     *
     *
     *  */
    public function select_data()
    {
        $this->db->select('*');
        $this->db->from('mother');
        $this->db->order_by('id', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->mother_national_num_fk] = $row;
            }
            return $data;
        }
        return false;
    }
    //----------------------------------------
    /* public function select_data_basic(){
           $this->db->select('*');
           $this->db->from('basic');
           $this->db->order_by('id',"ASC");
           $query = $this->db->get();
           if ($query->num_rows() > 0) {
               foreach ($query->result() as $row) {
                   $data[] = $row;
               }
               return $data;
           }
           return false;
       } */
    public function select_data_basic_order()
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
        $this->db->where('suspend', 0);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->sela_name = $this->get_sela_name($row->person_relationship);
                
                $i++;
            }
            return $data;
        }
        return false;
    }


   public function get_sela_name ($person_relationship){
        $h = $this->db->get_where("family_setting",array("id_setting"=>$person_relationship));
        $data = $h->row_array();
        return $data["title_setting"];
    }



    public function select_data_new_family()
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
        $this->db->where('suspend !=', 0);
        $this->db->where('suspend !=', 4);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_data_basic()
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function get_mother_name($mother_national_num_fk)
    {
        $h = $this->db->get_where("mother", array('mother_national_num_fk' => $mother_national_num_fk));
        $arr = $h->row_array();
        return $arr['full_name'];
    }

    public function get_mother_n_card($mother_national_num_fk)
    {
        $h = $this->db->get_where("mother", array('mother_national_num_fk' => $mother_national_num_fk));
        $arr = $h->row_array();
        return $arr['mother_national_card_new'];
    }

    //-----------------------------------------
    public function select_data_father()
    {
        $this->db->select('*');
        $this->db->from('father');
        $this->db->order_by('id', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->mother_national_num_fk] = $row;
            }
            return $data;
        }
        return false;
    }

    //---------------------------------------
    public function check_regester_data()
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('mother_national_num', $this->input->post('user_name'));
        $this->db->where('user_password', sha1(md5($this->input->post('user_pass'))));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    //----------------------------------------
    public function family($case)
    {
        $this->db->select('basic.* ,
                  devices.mother_national_num_fk as dev_id,
                  father.mother_national_num_fk as fat_id,father.f_first_name,
                  financial.mother_national_num_fk as mon_id ,
                  houses.mother_national_num_fk as hos_id,
                  mother.mother_national_num_fk as mother_id,mother.m_first_name,
                  mother.m_father_name,mother.m_grandfather_name,mother.m_family_name');
        $this->db->from('basic');
        $this->db->join('devices', ' devices.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('father', ' father.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('houses', ' houses.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('financial', ' financial.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('mother', ' mother.mother_national_num_fk = basic.mother_national_num', 'left');
        $this->db->where("basic.suspend", $case);
        $this->db->group_by('basic.mother_national_num');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    //------------------------------------------------------------------------------
    public function all_archive()
    {
        $this->db->select('basic.* ,
                  devices.mother_national_num_fk as dev_id,
                  father.mother_national_num_fk as fat_id,father.f_first_name,
                  financial.mother_national_num_fk as mon_id ,
                  houses.mother_national_num_fk as hos_id,
                  mother.mother_national_num_fk as mother_id,mother.m_first_name,
                  mother.m_father_name,mother.m_grandfather_name,mother.m_family_name');
        $this->db->from('basic');
        $this->db->join('devices', ' devices.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('father', ' father.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('houses', ' houses.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('financial', ' financial.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('mother', ' mother.mother_national_num_fk = basic.mother_national_num', 'left');
        $this->db->group_by('basic.mother_national_num');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    //------------------------  8-11  ---------------
    public function check_donor_regester()
    {
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->where('user_name', $this->input->post('user_name'));
        $this->db->where('password', sha1(md5($this->input->post('user_pass'))));
        $this->db->where('approve', 1);
        //   $this->db->where('type',$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    //-------------------------------------------------
    public function update_publisher($mother_national_num, $publisher)
    {
        $data['publisher'] = $publisher;
        $this->db->where('mother_national_num', $mother_national_num);
        $this->db->update('basic', $data);
    }

    /***************************************/
    public function select_data_basic_deleted()
    {
        $this->db->select('*');
        $this->db->from('basic');
        //   $this->db->where('suspend',4);
        $this->db->where('deleted', 1);
        $this->db->order_by('id', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_data_basic_accepted()
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('suspend', 4);
        $this->db->where('final_suspend', 4);
        $this->db->where('deleted', 0);
        $this->db->order_by('id', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
                $data[$i]->reason = $this->get_reason($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    //==========================================
        //==========================================
   /*13-7 public function select_where_cashing($Conditions_arr, $condition_year)
    {    
        $this->db->select('basic.file_num ,basic.mother_national_num  ,
                          mother.mother_national_num_fk ,mother.full_name ,
                          father.full_name as father_full_name  ');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
        $this->db->where($Conditions_arr);
        $this->db->order_by('basic.file_num', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i]->mother_num_in = $this->get_armal_sum_armal_full_active_mother_new($row->mother_national_num);
                   $data[$i]->down_child = $this->get_yatem_full_active($row->mother_national_num);
                $data[$i]->up_child = $this->get_bale3_full_active($row->mother_national_num);
             $data[$i]->bank_details = $this->get_Bank_details($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }*/
    
    public function select_where_cashing($Conditions_arr, $condition_year)
{    //basic.file_num ,basic.mother_national_num  , mother.mother_national_num_fk ,mother.full_name
    $this->db->select('basic.file_num ,basic.mother_national_num  , basic.family_cat_name,
                          mother.mother_national_num_fk ,mother.full_name ,
                          father.full_name as father_full_name  ');
    $this->db->from("basic");
    $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
    $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
    $this->db->where($Conditions_arr);
    if ($this->input->post('family_cat') &&(!empty($this->input->post('family_cat'))) && $this->input->post('family_cat') !='null') {

        $family_cat_arr=explode(',', $this->input->post('family_cat'));

        $this->db->where_in('basic.family_cat',$family_cat_arr);
    }
    $this->db->order_by('basic.file_num', "ASC");
    $query = $this->db->get();

    /*        print_r($this->db->last_query());*/
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {

            /********* الارامل ***********/
            $data[$i]->mother_num_in = $this->get_armal_sum_armal_full_active_mother_new($row->mother_national_num);
            //  $data[$i]->armal_sub_active = $this->get_armal_sum_armal_sub_active_mother($row->mother_national_num);      
            /********* الايتام ***********/
            $data[$i]->down_child = $this->get_yatem_full_active($row->mother_national_num);
            //   $data[$i]->yatem_sub_active = $this->get_yatem_sub_active($row->mother_national_num); 
            /********* البالغين ***********/
            $data[$i]->up_child = $this->get_bale3_full_active($row->mother_national_num);
            ///  $data[$i]->bale3_sub_active = $this->get_bale3_sub_active($row->mother_national_num);
            /****************************************************************************************************/
            //   $data[$i]->bank_details = $this->get_Bank_details($row->mother_national_num_fk);
            $data[$i]->bank_details = $this->get_Bank_details($row->mother_national_num);
            $i++;
        }
        return $data;
    }
    return false;
}
    //======================   31-10-2018 =================
    public function get_Bank_details($id){
        $this->db->select('*');
        $this->db->from('family_bank_responsible');
        $this->db->where('family_national_num_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row();
            $data->bank_name = $this->getBank_name($data->bank_id_fk);
            if($data->person_id_fk == 0 and $data->type == null){
                $data->person_name =  $data->person_name;
                $data->person_card =  $data->person_national_card;
            }elseif($data->person_id_fk == 0 and $data->type == 0){
                $data->person_name =  $data->person_name;
                $data->person_card =  $data->person_national_card;
            }elseif($data->person_id_fk  !=0 and $data->type == 1){
                $data->person_name = $this->getMother_data($data->person_id_fk)['full_name'];
                $data->person_card = $this->getMother_data($data->person_id_fk)['mother_national_card_new'];

            }elseif($data->person_id_fk  !=0 and $data->type == 2){
                $data->person_name = $this->getfamily_member_data($data->person_id_fk)['member_full_name'];
                $data->person_card = $this->getfamily_member_data($data->person_id_fk)['member_card_num'];
            }
            return $data;
        }
        return false;
    }
    public function getBank_name($id){
        $h = $this->db->get_where("banks_settings", array('id'=>$id));
        return $h->row_array()['ar_name'];

    }
    public function getMother_data($id){
        $h = $this->db->get_where("mother", array('id'=>$id));
        return $h->row_array();
    }
    public function getfamily_member_data($id){
        $h = $this->db->get_where("f_members", array('id'=>$id));
        return $h->row_array();
    }
    //======================   31-10-2018 =================


    public function select_data_basic_accepted_where_details_member_details($whrer)
    {
        $this->db->select('*');
        $this->db->from('basic');
        //  $this->db->where('suspend',4);
        $this->db->where('deleted', 0);
        $this->db->where($whrer);
        $this->db->order_by('id', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                $data[$i]->files_status_title = $this->get_files_status_setting_title($row->file_status);
                /*  
                  $data[$i]->armal_num_in_mother = $this->get_armal_num_mother($row->mother_national_num);
                  $data[$i]->armal_num_in_f_member = $this->get_armal_num_member($row->mother_national_num);
                  $data[$i]->yteem_num = $this->get_yatem_num($row->mother_national_num);
                  $data[$i]->mostafeed_num = $this->get_mostafeed_num($row->mother_national_num);
                  $data[$i]->not_mostafeed_num_mother = $this->get_not_mostafeed_num_mother($row->mother_national_num);  
                  $data[$i]->not_mostafeed_num_f_member = $this->get_not_mostafeed_num_f_member($row->mother_national_num);  
                 */
                /****************************************************************************************************/
                /*** جميع المستفيدين ***************/
                $data[$i]->all_mostafed_mother = $this->get_pure_all_sum_mostafed_mother($row->mother_national_num);
                $data[$i]->all_mostafed_member = $this->get_pure_all_sum_mostafed_members($row->mother_national_num);
                /*** جميع المستفيدين ماليا النشط كليا  ***************/
                $data[$i]->all_mostafed_mother_finance = $this->get_pure_all_sum_mostafed_finance_mother($row->mother_national_num);
                $data[$i]->all_mostafed_member_finance = $this->get_pure_all_sum_mostafed_finance_members($row->mother_national_num);
                /*** جميع الغير مستفييدين ***************/
                $data[$i]->all_not_mostafed_mother = $this->get_pure_all_sum_not_mostafed_mother($row->mother_national_num);
                $data[$i]->all_not_mostafed_member = $this->get_pure_all_sum_not_mostafed_members($row->mother_national_num);
                /***************************/
                /********* الارامل ***********/
                $data[$i]->armal_full_active = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num);
                $data[$i]->armal_sub_active = $this->get_armal_sum_armal_sub_active_mother($row->mother_national_num);
                /********* الايتام ***********/
                $data[$i]->yatem_full_active = $this->get_yatem_full_active($row->mother_national_num);
                $data[$i]->yatem_sub_active = $this->get_yatem_sub_active($row->mother_national_num);
                /********* البالغين ***********/
                $data[$i]->bale3_full_active = $this->get_bale3_full_active($row->mother_national_num);
                $data[$i]->bale3_sub_active = $this->get_bale3_sub_active($row->mother_national_num);
                /****************************************************************************************************/
                $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_data_basic_accepted_where_details($whrer)
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('suspend', 4);
        $this->db->where('deleted', 0);
        $this->db->where($whrer);
        $this->db->order_by('id', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                $data[$i]->files_status_title = $this->get_files_status_setting_title($row->file_status);
                $data[$i]->armal_num_in_mother = $this->get_armal_num_mother($row->mother_national_num);
                $data[$i]->armal_num_in_f_member = $this->get_armal_num_member($row->mother_national_num);
                $data[$i]->yteem_num = $this->get_yatem_num($row->mother_national_num);
                $data[$i]->mostafeed_num = $this->get_mostafeed_num($row->mother_national_num);
                $data[$i]->not_mostafeed_num_mother = $this->get_not_mostafeed_num_mother($row->mother_national_num);
                $data[$i]->not_mostafeed_num_f_member = $this->get_not_mostafeed_num_f_member($row->mother_national_num);
                $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function get_armal_num_member($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("categoriey_member", 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_yatem_num($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("categoriey_member", 2);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_mostafeed_num($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("categoriey_member", 3);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_armal_num_mother($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("categoriey_m", 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_not_mostafeed_num_mother($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("person_type", 63);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_not_mostafeed_num_f_member($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("member_person_type", 63);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function select_data_basic_accepted_where($whrer)
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('suspend', 4);
        $this->db->where('final_suspend', 4);
        $this->db->where('deleted', 0);
        $this->db->where($whrer);
        $this->db->order_by('id', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_data_basic_notaccepted()
    {
        $this->db->select('*');
        $this->db->from('basic');
        // $this->db->where(array('suspend !=' => 4));

        $this->db->where('suspend', 2);
        $this->db->where('final_suspend', 0);
        $this->db->where('deleted', 0);
        $this->db->order_by('id', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }
    /****************************************************/
    /******** ZIDAN *********************/
    public function get_all_files_status()
    {
        return $this->db->get('files_status_setting')->result();
    }

    public function change_file_setting()
    {
        $mother_id = $this->input->post('mom');
        $title = $this->input->post('title');
        $process = $this->input->post('process_id');
        $reason = $this->input->post('reason');
        /************************************/
        $data['file_status'] = $process;
        $data['process_title'] = $title;
        /********************************/
        $data_2['mother_national_num_fk'] = $mother_id;
        $data_2['process_id'] = $process;
        $data_2['title'] = $title;
        $data_2['reason'] = $reason;
        $data_2['date'] = strtotime(date("Y-m-d"));
        $data_2['date_es'] = strtotime(date("Y-m-d"));
        $data_2['publisher'] = $_SESSION['user_name'];
        /*********************************/
        $this->db->where('mother_national_num', $mother_id);
        $this->db->update('basic', $data);
        $this->db->insert('files_status_operation', $data_2);
    }
    /*public function save_files_options($mother_id,$title,$process,$reason)
    {
    $data['mother_national_num_fk']=$mother_id;
    $data['process_id']=$process;
    $data['title']=$title;
    $data['reason']=$reason;
    $data['date']=strtotime(date("Y-m-d"));
    $data['date_es']=strtotime(date("Y-m-d"));
    $data['publisher']=$_SESSION['user_name'];
        if($this->get_num_rows($mother_id)==0){
            $this->db->insert('files_status_operation', $data);
        }else{
           // $this->db->where('mother_national_num_fk',$mother_id);
           // $this->db->update('files_status_operation', $data);
        }
        }
        public function get_num_rows($mother_id)
    {
        $this->db->where('mother_national_num_fk',$mother_id);
        $query=$this->db->get('files_status_operation');
        return $query->num_rows();
    }  */
    /************************************/
    public function insertedAddRelations($national_id)
    {
        $data = $this->input->post('data');
        $this->db->insert('researcher_relations_family', $data);
        $this->db->where('mother_national_num', $national_id);
        return $this->db->update('basic', array('researcher_id' => $data['emp_id_fk']));
    }

    // ============================================
    public function select_data_basic_by_id_order($id)
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
        $this->db->where('suspend', 0);
        $this->db->where('researcher_id', $id);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_data_basic_by_id_new_family($id)
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
        $this->db->where('suspend !=', 0);
        $this->db->where('suspend !=', 4);
        $this->db->where('researcher_id', $id);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_data_basic_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
        $this->db->where('researcher_id', $id);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    /*******************************/
    public function get_all_persons_status()
    {
        return $this->db->get('persons_status_setting')->result();
    }

    public function change_family_members_setting()
    {
        $member_id = $this->input->post('member_id');
        $title = $this->input->post('title');
        $process = $this->input->post('process_id');
        $reason = $this->input->post('reason');
        /************************************/
        $data['persons_status'] = $process;
        $data['persons_process_title'] = $title;
        $data['persons_process_reason'] = $reason;
        $data['halt_elmostafid_member'] = $process;
        /********************************/
        $data_2['family_member_id_fk'] = $member_id;
        $data_2['process_id'] = $process;
        $data_2['title'] = $title;
        $data_2['reason'] = $reason;
        $data_2['date'] = strtotime(date("Y-m-d"));
        $data_2['date_es'] = strtotime(date("Y-m-d"));
        $data_2['publisher'] = $_SESSION['user_name'];
        /*********************************/
        $this->db->where('id', $member_id);
        $this->db->update('f_members', $data);
        $this->db->insert('family_members_status_operation', $data_2);
    }

    //--------------------------------------------------------------------------------------
    public function change_mother_state()
    {
        $mother_num = $this->input->post('mother_num');
        $title = $this->input->post('title');
        $process = $this->input->post('process_id');
        $reason = $this->input->post('reason');
        /************************************/
        $Udata['halt_elmostafid_m'] = $process;
        $Udata['persons_process_reason'] = $reason;
        $this->db->where('mother_national_num_fk', $mother_num);
        $this->db->update('mother', $Udata);
        /********************************/
        $Idata['mother_national_num_fk'] = $mother_num;
        $Idata['process_id'] = $process;
        $Idata['title'] = $title;
        $Idata['reason'] = $reason;
        $Idata['date'] = strtotime(date("Y-m-d"));
        $Idata['date_s'] = strtotime(date("Y-m-d"));
        $Idata['publisher'] = $_SESSION['user_name'];
        /*********************************/
        $this->db->insert('mother_status_operation', $Idata);
    }

    //--------------------------------------------------------------------------------------
    public function get_by_mother_num($mother_num)
    {
        $this->db->where('mother_national_num', $mother_num);
        $query = $this->db->get('basic');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_mom_name($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('mother');
        if ($query->num_rows() > 0) {
            return $query->row()->full_name;
        } else {
            return "لم يضاف الاسم";
        }
    }

    public function get_father_name($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('father');
        if ($query->num_rows() > 0) {
            return $query->row()->full_name;
        } else {
            return "لم يضاف الاسم";
        }
    }

    public function get_files_status_setting($file_status_id)
    {
        $this->db->where('id', $file_status_id);
        $query = $this->db->get('files_status_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->color;
        } else {
            return "لم يضاف الاسم";
        }
    }

    public function get_files_status_setting_title($file_status_id)
    {
        $this->db->where('id', $file_status_id);
        $query = $this->db->get('files_status_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->title;
        } else {
            return "لم يضاف الاسم";
        }
    }

    public function get_father_national($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('father');
        if ($query->num_rows() > 0) {
            return $query->row()->f_national_id;
        } else {
            return '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل البيانات </button>
            ';
        }
    }

    /*********************************************************************/
    public function select_operation($id)
    {
        $this->db->select('transformation_process.* ,
                          e_to.employee  as to_employee  , 
                          e_from.employee  as from_employee,
                          user_to_t.user_name  as to_user_name, 
                          user_from_t.user_name as from_user_name');
        $this->db->from('transformation_process');
        $this->db->join('users as user_to_t', 'user_to_t.user_id = transformation_process.to_id', "left");
        $this->db->join('users as user_from_t', 'user_from_t.user_id = transformation_process.from_id', "left");
        $this->db->join('employees as e_to', 'e_to.id = user_to_t.emp_code', "left");
        $this->db->join('employees as e_from', 'e_from.id = user_from_t.emp_code', "left");
        $this->db->where('family_file', $id);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    //==========================================
    public function select_transformation_lagna($id)
    {
        $this->db->select('transformation_lagna.* ,
                           lagna_main.lagna_name     as  main_lagna_name    ,
                           lagna_approved.lagna_name as  approved_lagna_name    ,
                           users.user_name  ,
                           procedures_option_lagna.title  as procedures_option_lagna_title');
        $this->db->from('transformation_lagna');
        $this->db->join('lagna as lagna_main', 'lagna_main.id_lagna = transformation_lagna.add_to_lagna_id_fk', "left");
        $this->db->join('lagna as lagna_approved', 'lagna_approved.id_lagna = transformation_lagna.approved_lagna', "left");
        $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna.procedure_id_fk', "left");
        $this->db->join('users', 'users.user_id = transformation_lagna.person_transfer', "left");
        $this->db->where('transformation_lagna.mother_national_num', $id);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    //==========================================
    public function check_national_num($mother_national_num)
    {
        $this->db->select('mother_national_num');
        $this->db->from("basic");
        $this->db->where("mother_national_num", $mother_national_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;
    }
    //==========================================
    /*  public  function insert_new_register(){
          $data['user_name']=$this->input->post('user_name');
             $password=$this->input->post('user_password',true);
             $password=sha1(md5($password));
          $data['user_password'] = $password;
          $data['full_name']=$this->input->post('full_name');
          $data['full_name_order']=$this->input->post('full_name_order');
          $data['person_national_card']=$this->input->post('person_national_card');
          $data['person_relationship']=$this->input->post('person_relationship');
          $data['contact_mob']=$this->input->post('contact_mob');
          $data['contact_email']=$this->input->post('contact_email');
          $data['father_national_num']=$this->input->post('father_national_num');
          $data['mother_national_num']=$this->input->post('mother_national_num');
          $data['register_place']=$this->input->post('register_place');
          $data['date_registration'] =strtotime(date("Y-m-d",time()));
          $data['date'] =strtotime(date("Y-m-d",time()));
          $data['date_s']= time();
          $data['person_response']=0; 
          $data['publisher']=$_SESSION['user_name'];
          $this->db->insert('basic',$data);
      }
         public  function update_new_register($id){
          $data['user_name']=$this->input->post('user_name');
             $password=$this->input->post('user_password',true);
             if(!empty($password)){
             $password=sha1(md5($password));
              $data['user_password'] = $password;
             }
          $data['full_name']=$this->input->post('full_name');
          $data['full_name_order']=$this->input->post('full_name_order');
          $data['person_national_card']=$this->input->post('person_national_card');
          $data['person_relationship']=$this->input->post('person_relationship');
          $data['contact_mob']=$this->input->post('contact_mob');
          $data['contact_email']=$this->input->post('contact_email');
          $data['father_national_num']=$this->input->post('father_national_num');
          $data['mother_national_num']=$this->input->post('mother_national_num');
          $data['register_place']=$this->input->post('register_place');
          $data['date_registration'] =strtotime(date("Y-m-d",time()));
          $data['date'] =strtotime(date("Y-m-d",time()));
          $data['date_s']= time();
          $data['person_response']=0;
          $data['publisher']=$_SESSION['user_name'];
             $this->db->where('id',$id);
             $this->db->update('basic',$data);
      }
      */
    public function insert_new_register()
    {
        $data['user_name'] = $this->input->post('user_name');
        $password = $this->input->post('user_password', true);
        $password = sha1(md5($password));
        $data['user_password'] = $password;

        $data['right_time_from'] = $this->chek_Null($this->input->post('right_time_from'));
        $data['right_time_to'] = $this->chek_Null($this->input->post('right_time_to'));

        $data['father_name'] = $this->input->post('full_name');
        $data['full_name_order'] = $this->input->post('full_name_order');
        $data['person_national_card'] = $this->input->post('person_national_card');
        $data['person_relationship'] = $this->input->post('person_relationship');
        $data['contact_mob'] = $this->input->post('contact_mob');
        //  $data['contact_mob_relationship']=$this->input->post('contact_mob_relationship');
        $data['retirement'] = $this->chek_Null($this->input->post('retirement'));
        $data['insurance'] = $this->chek_Null($this->input->post('insurance'));
        $data['guarantee'] = $this->chek_Null($this->input->post('guarantee'));
        $data['center_id_fk'] = $this->input->post('center_id_fk');
        $data['district_id_fk'] = $this->input->post('district_id_fk');
        // $data['contact_email']=$this->input->post('contact_email');
        $data['father_national_num'] = $this->input->post('father_national_num');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['register_place'] = $this->input->post('register_place');
        $data['date_registration'] = strtotime(date("Y-m-d", time()));
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['order_method'] = 1;
        $data['person_response'] = 0;
        $data['publisher'] = $_SESSION['user_name'];
        $data['male_number'] = $this->input->post('male_number');
        $data['female_number'] = $this->input->post('female_number');
        $data['family_members_number'] = $this->input->post('family_members_number');
        //  $data['sources_income']=$this->input->post('sources_income');
        $data['h_house_owner_id_fk'] = $this->input->post('h_house_owner_id_fk');
        $data['h_rent_amount'] = $this->chek_Null($this->input->post('h_rent_amount'));
        if ($_SESSION['role_id_fk'] == 3) {
            $data['researcher_id'] = $_SESSION['emp_code'];
        } else {
        }
        $data_f['full_name'] = $this->input->post('full_name');
        $data_f['mother_national_num_fk'] = $this->input->post('mother_national_num');
        $data_f['f_national_id'] = $this->input->post('father_national_num');
        
        
        $data['national_id_type_mother'] = $this->chek_Null($this->input->post('national_id_type'));
        $data['marital_status_id_fk_mother'] = $this->chek_Null($this->input->post('marital_status_id_fk'));
        
        
        
        
        $this->db->insert('basic', $data);
        $this->db->insert('father', $data_f);
    }

    //==========================================
    public function update_new_register($id, $mother_national_num)
    {
        $data['user_name'] = $this->input->post('user_name');
        $password = $this->input->post('user_password', true);
        if (!empty($password)) {
            $password = sha1(md5($password));
            $data['user_password'] = $password;
        }
        $data['father_name'] = $this->input->post('full_name');
        $data['right_time_from'] = $this->chek_Null($this->input->post('right_time_from'));
        $data['right_time_to'] = $this->chek_Null($this->input->post('right_time_to'));


        $data['full_name_order'] = $this->input->post('full_name_order');
        $data['person_national_card'] = $this->input->post('person_national_card');
        $data['person_relationship'] = $this->input->post('person_relationship');
        $data['contact_mob'] = $this->input->post('contact_mob');
        $data['contact_mob_relationship'] = $this->input->post('contact_mob_relationship');
        $data['contact_email'] = $this->input->post('contact_email');
        $data['register_place'] = $this->input->post('register_place');
        $data['retirement'] = $this->chek_Null($this->input->post('retirement'));
        $data['insurance'] = $this->chek_Null($this->input->post('insurance'));
        $data['guarantee'] = $this->chek_Null($this->input->post('guarantee'));
        $data['center_id_fk'] = $this->input->post('center_id_fk');
        $data['district_id_fk'] = $this->input->post('district_id_fk');
        $data['father_national_num'] = $this->input->post('father_national_num');
        $data['order_method'] = 1;
        $data['date_registration'] = strtotime(date("Y-m-d", time()));
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['person_response'] = 0;
        $data['publisher'] = $_SESSION['user_name'];
        $data['male_number'] = $this->input->post('male_number');
        $data['female_number'] = $this->input->post('female_number');
        $data['family_members_number'] = $this->input->post('family_members_number');
        $data['sources_income'] = $this->input->post('sources_income');
        $data['h_house_owner_id_fk'] = $this->input->post('h_house_owner_id_fk');
        $data['h_rent_amount'] = $this->chek_Null($this->input->post('h_rent_amount'));
        
        $data['national_id_type_mother'] = $this->chek_Null($this->input->post('national_id_type'));
        $data['marital_status_id_fk_mother'] = $this->chek_Null($this->input->post('marital_status_id_fk'));
        
        
        $this->db->where('id', $id);
        $this->db->update('basic', $data);
        $data_f['full_name'] = $this->input->post('full_name');
        $data_f['f_national_id'] = $this->input->post('father_national_num');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $this->db->update('father', $data_f);
    }

    //==========================================
    public function insert_new_register_files($all_img, $mother_national_num)
    {
        $ids = $this->input->post('attach_files_ids');
        /*foreach ($all_img as $key => $value) {
            if (!empty($value)) {
                $data["mother_national_num"] = $mother_national_num;
                $data["attach_file"] = $value;
                $data["attach_file_id_setting"] = $ids[$key];
                $this->db->insert("family_order_attach_file", $data);
            } else {
                continue;
            }
        }*/
           foreach ($all_img as $key => $value) {
            if (!empty($value)) {
                $data["mother_national_num_fk"] = $mother_national_num;
                $data["file_attach_name"] = $value;
                $data["file_attach_id_fk"] = $ids[$key];
                $this->db->insert("family_attach_files", $data);
            } else {
                continue;
            }
        }
        
        
    }

    //=========================================
    public function get_by_id_regester($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('basic')->row_array();
    }

    //=========================================
    public function get_files_mother($mother_nation_id)
    {
        $this->db->select('id_setting , title_setting');
        $this->db->from("family_setting");
        $this->db->where("type", 47);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i]->files_name = $this->get_attach_file($row->id_setting, $mother_nation_id);
                $i++;
            }
            return $data;
        }
        return false;
    }

    //========================================
    public function get_attach_file($id_setting, $mother_nation_id)
    {
        $this->db->from("family_order_attach_file");
        $this->db->where("mother_national_num", $mother_nation_id);
        $this->db->where("attach_file_id_setting", $id_setting);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return 0;
    }

    //=====================================
    public function delete_file($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("family_order_attach_file");
    }

    //==============================================
    public function get_basic_mother_num($mother_num)
    {
        //  $h = $this->db->get_where("basic",array("mother_national_num"=>$mother_num));
        $where = array("basic.mother_national_num" => $mother_num);
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->join('family_setting', 'family_setting.id_setting=basic.contact_mob_relationship', "left");
        $this->db->where($where);
        $h = $this->db->get();
        $data = $h->row_array();
        $data["files_status_color"] = $this->get_files_status_setting($data["file_status"]);
        return $data;
    }

    public function get_reason($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('files_status_operation');
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->reason;
        } else {
            return 0;
        }
    }

    /************************************************************************************************************************/
    public function get_pure_all_sum_mostafed_mother($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("person_type", 62);
        //   $this->db->where('halt_elmostafid_m',1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    /**** كل المستقيدين النشيطين*******************************/
    public function get_pure_all_sum_mostafed_members($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("member_person_type", 62);
        // $this->db->where('halt_elmostafid_member',1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_pure_all_sum_mostafed_finance_mother($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("person_type", 62);
        $this->db->where('halt_elmostafid_m', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_pure_all_sum_mostafed_finance_members($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("member_person_type", 62);
        $this->db->where('halt_elmostafid_member', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_pure_all_sum_not_mostafed_mother($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("person_type", 63);
        //   $this->db->where('halt_elmostafid_m',2);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }
    /*****************************************************/
    /**** كل الغير مستفيدين النشط جزئي*******************************/
    public function get_pure_all_sum_not_mostafed_members($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("member_person_type", 63);
        //  $this->db->where('halt_elmostafid_member',2);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

// أرملة ونشط كلي 

    public function get_armal_sum_armal_full_active_mother_new($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
         $this->db->where("person_type",62);
        $this->db->where("categoriey_m", 1);
        $this->db->where('halt_elmostafid_m', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_armal_sum_armal_full_active_mother($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        // $this->db->where("person_type",62);
        $this->db->where("categoriey_m", 1);
        $this->db->where('halt_elmostafid_m', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

// أرملة ونشط جزئي 
    public function get_armal_sum_armal_sub_active_mother($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        // $this->db->where("person_type",62);
        $this->db->where("categoriey_m", 1);
        $this->db->where('halt_elmostafid_m', 2);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_yatem_full_active($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        // $this->db->where("member_person_type",62);
        $this->db->where("categoriey_member", 2);
      //  $this->db->where('halt_elmostafid_member', 1);
         $this->db->where('persons_status', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_yatem_sub_active($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("member_person_type", 62);
        $this->db->where("categoriey_member", 2);
       // $this->db->where('halt_elmostafid_member', 2);
         $this->db->where('persons_status', 2);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_bale3_full_active($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("categoriey_member", 3);
       // $this->db->where('halt_elmostafid_member', 1);
          $this->db->where('persons_status', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_bale3_sub_active($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("categoriey_member", 3);
        $this->db->where('persons_status', 2);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    /************************************************************************************************************************/
    public function select_relashion($Conditions_arr)
    {
        $this->db->select('*');
        $this->db->from("family_setting");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    //======================================================================
    public function getFamilyOperationsPermissions()
    {
        $emp_id = $_SESSION['emp_code'];
        $this->db->select('*');
        $this->db->from('family_operations_permission');
        $this->db->where('emp_id_fk', $emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    /*****************************************************************************/
    /*****************************************************************************/
  /*  public function select_data_new_reg_orders()
    {
      //  $this->db->select('*');
        $this->db->select('basic.*,employees.id as employees_id ,employees.employee as researcher_name');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
      //  $this->db->where('suspend !=', 4);
       // $this->db->where('final_suspend !=', 4);
         $this->db->where('suspend =', 3);
        $this->db->where('final_suspend =', 0);
         $this->db->join('employees', 'employees.id = basic.researcher_id', "left");
        $this->db->order_by('id', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->sela_name = $this->get_sela_name($row->person_relationship);
                $i++;
            }
            return $data;
        }
        return false;
    }
*/
   public function select_data_new_reg_orders()
    {
      //  $this->db->select('*');
        $this->db->select('basic.*,hr_egraat_emp_setting.person_id as employees_id ,hr_egraat_emp_setting.person_name as researcher_name');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
      //  $this->db->where('suspend !=', 4);
       // $this->db->where('final_suspend !=', 4);
          $this->db->where('suspend !=', 4);
          $this->db->where('suspend !=', 0);
          $this->db->where('suspend !=', 2);
          $this->db->where('final_suspend =', 0);
         $this->db->join('hr_egraat_emp_setting', 'hr_egraat_emp_setting.id = basic.researcher_id', "left");
        $this->db->order_by('id', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->sela_name = $this->get_sela_name($row->person_relationship);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_all_new_reg_by_id_order($id)
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
        $this->db->where('suspend !=', 4);
        $this->db->where('final_suspend !=', 4);
        $this->db->where('researcher_id', $id);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    /**************************************************************/
    public function select_data_re_files()
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
        $this->db->where('suspend =', 3);
        /*
        $this->db->where('suspend !=',4);
        $this->db->where('suspend !=',5);
        $this->db->where('suspend !=',2);
        $this->db->where('suspend !=',1);*/
        $this->db->where('final_suspend ', 4);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_all_re_files_by_id_order($id)
    {
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted', 0);
        $this->db->where('suspend !=', 4);
        $this->db->where('final_suspend ', 4);
        $this->db->where('researcher_id', $id);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    //------------------------------------------------------------
   /* public function select_all_employee()
    {
        $this->db->select('id , employee');
        $this->db->from("employees");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }*/
    
      public function select_all_employee()
    {
        $this->db->select('*');
        $this->db->from("hr_egraat_emp_setting");
        $query = $this->db->where('job_title_code_fk',802)->where('person_suspend',1)->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //------------------------------------------------------------
    public function select_family_lagna($mother_national_num){
        $this->db->select('transformation_lagna.* ,
                           family_reasons_settings.title as reason_title ,
                           procedures_option_lagna.title as procedures_option_lagna_title ');
        $this->db->from("transformation_lagna");
        $this->db->join('family_reasons_settings', 'family_reasons_settings.id = transformation_lagna.reason_id_fk',"left");
        $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna.procedure_id_fk',"left");
        $this->db->where("mother_national_num",$mother_national_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach ( $query->result() as $row){
                  $data[$i]->year = $this->getByArray_lagna_members($row->session_num_fk);
                 $i++; 
            }
            return $data;
        }
        return false;
    }
    //-----------------------------------------------------------
    public function getByArray_lagna_members($session_number){
        $h = $this->db->get_where("selected_lagna_members",array("session_number"=>$session_number));
        $data = $h->row_array();
        return $data["year"];
    }
    /********************************/
    
      public function get_all_files($mother_national_num)
    {
        $this->db->where('type',47);
        $query=$this->db->get('family_setting');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
            foreach ($query->result()as $row)
            {
                $data[$x]=$row;
                $data[$x]->file=$this->get_files($row->id_setting,$mother_national_num);
                $x++;

            }
            return $data;


            }else{
            return false;
        }
        }

    public function get_files($id,$mother_national_num)
    {
        $this->db->where('mother_national_num_fk',$mother_national_num);
        $this->db->where('file_attach_id_fk',$id);
        $query=$this->db->get('family_attach_files');
        if($query->num_rows()>0)
        {
            return $query->row()->file_attach_name;

        }else{
            return 0;
        }
    }

/*******************************************************/
    public function select_file_updates_tracks($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('update_family_files_details');
        $this->db->where('mother_national_num_fk',$mother_national_num);
      //  $this->db->order_by('id', "ASC");
       $this->db->order_by('to_date', "DESC");	
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }    
   
   
   /********************************************************/
   
   
    public function update_last_record($id)
    {
        $data['from_date_ar']=$this->input->post('from_date');
        $data['from_date']=strtotime($this->input->post('from_date'));
        $data['to_date']=strtotime($this->input->post('to_date'));
        $data['to_date_ar']=$this->input->post('to_date');
        $data['peroid']=$this->input->post('peroid');
        $this->db->where('id',$id);
        $this->db->update('update_family_files_details',$data);
    }
    public function update_family_update_file($file_num,$mother_num)
    {
        $data['file_open_update_date'] = $this->input->post('from_date');
        $data['peroid_update']=$this->input->post('peroid');
        $data['file_update_date'] = $this->input->post('to_date');
        $this->db->where('mother_national_num',$mother_num);
        $this->db->where('file_num',$file_num);
        $this->db->update('basic',$data);
    }
 
 /****************************/
 
    public function get_main_data($mother_num){
        $this->db->where('mother_national_num',$mother_num);
        return $this->db->get('basic')->row();

  }
 public function update_main_data($mother_num){
        $data['contact_mob'] = $this->input->post('contact_mob');
        $data['right_time_to'] = $this->input->post('right_time_to');
        $data['right_time_from'] = $this->input->post('right_time_from');
       $this->db->where('mother_national_num',$mother_num);
       $this->db->update('basic',$data);

  }

  public function update_user($mother_num){

      $data['user_name'] = $this->input->post('user_name');
      if ($this->input->post('user_password')){

          $data['user_password']=  sha1(md5($this->input->post('user_password')));;
      }
      $this->db->where('mother_national_num',$mother_num);
      $this->db->update('basic',$data);

  }
 
 
 public function change_status_account($valu, $id)
{
    $status = 1- $valu;
    $data['account_status'] = $status;
    $this->db->where('id', $id)->update('basic', $data);

    return $status;
}
public function check_login()
{
    $email = $this->input->post('user_name');
    $pass = sha1(md5($this->input->post('user_pass')));
    $q = $this->db->where('user_name', $email)->where('user_password', $pass)->get('basic')->row_array();
    if (!empty($q)) {
        return $q;
    }else{
        return 0;
    }
}      
 
 
 
     public function get_family_account($mother_national_num)
    {
//        $this->db->where('mother_national_num_fk', $mother_national_num);
//        return $this->db->get('family_users_accounts')->row();
        $this->db->where('mother_national_num', $mother_national_num);
        return $this->db->get('basic')->row();
    }

    public function update_account($mother_national_num)
    {

        $data['mother_national_num_fk'] = $mother_national_num;
        $data['user_name'] = $this->input->post('user_name');
        $password = $this->input->post('user_password', true);
        if (!empty($password)) {
            $password = sha1(md5($password));
            $data['password'] = $password;
            $data_basic['user_password'] = $password;
        }
        $data['suspend_account'] = $this->input->post('suspend_account');
        $data_basic['user_name'] = $this->input->post('user_name');
//        $this->db->where('mother_national_num_fk',$mother_national_num);
//        $this->db->update('family_users_accounts',$data);

        $this->db->where('mother_national_num', $mother_national_num);
        $this->db->update('basic', $data_basic);


    }

    public function insert_account($mother_national_num)
    {

        $data['mother_national_num_fk'] = $mother_national_num;
        $data['user_name'] = $this->input->post('user_name');
        $password = $this->input->post('user_password', true);
        if (!empty($password)) {
            $password = sha1(md5($password));
            $data['password'] = $password;
            $data_basic['user_password'] = $password;
        }
        $data['suspend_account'] = $this->input->post('suspend_account');
        $data_basic['user_name'] = $this->input->post('user_name');

//        $this->db->insert('family_users_accounts',$data);


        $this->db->where('mother_national_num', $mother_national_num);
        $this->db->update('basic', $data_basic);


    }
 
    
}// END CLASS 