<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sheek_tracks_model extends CI_Model
{

    public function GetBankCode($id){
        $h = $this->db->get_where("banks_settings", array('id'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row()->code;
        }else{

            return false;

        }
    }
    public function select_sheeks_sarf($arr)
    {
       /*$this->db->select('*');
        $this->db->from("finance_sanad_sarf_sheek");
       */
       $this->db->select('finance_sanad_sarf_sheek.* , finance_sanad_sarf.rqm_sanad ,finance_sanad_sarf.pay_method  ');
        $this->db->from("finance_sanad_sarf_sheek");
        $this->db->join('finance_sanad_sarf', 'finance_sanad_sarf.rqm_sanad = finance_sanad_sarf_sheek.rqm_sanad_id_fk',"left");
        
       
         $this->db->where("finance_sanad_sarf.pay_method = ",3); 
       
       
       
       
       
        $this->db->where($arr);
        $this->db->order_by("rqm_sanad_id_fk", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->details = $this->getdetailsByRqm_sanad("finance_sanad_sarf", $row->rqm_sanad_id_fk);
                if ($row->taslem_sheek != null && $row->taslem_sheek != '') {
                    $data[$x]->taslem_sheek_color = $this->getColor($row->taslem_sheek);
                }
                if ($row->sheek_status != null && $row->sheek_status != '') {
                    $data[$x]->sheek_status_color = $this->getColor($row->sheek_status);
                }
                $data[$x]->bank_code =$this->GetBankCode($row->bank_id_fk);
                $x++;
            }
            return $data;

        } else {

            return false;
        }

    }

    public function select_sheeks_qabd($arr)
    {
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd_sheek");
        $this->db->where($arr);
        $this->db->order_by("rqm_sanad_id_fk", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->details = $this->getdetailsByRqm_sanad("finance_sanad_qabd",$row->rqm_sanad_fk);
                $data[$x]->pill_details = $this->getdetailsByIdQabd2($row->rqm_sanad_fk);
                $data[$x]->sheek_vlaue = $this->get_sheek_value($row->rkm_esal);



                $data[$x]->twaged_sheek_color=$this->get_color($row->twaged_sheek);
                $data[$x]->sheek_type_color=$this->get_color($row->sheek_type);
                $data[$x]->sheek_status_color=$this->get_color($row->sheek_status);
                $x++;
            }
            return $data;

        } else {

            return false;
        }

    }



   public function get_sheek_value($rkm_esal)
    {
        $this->db->where('marg3_rkm_esal',$rkm_esal);
        $query = $this->db->get("finance_sanad_qabd_details");
        if($query->num_rows() >0){
            return $query->row()->value;

        }else{
            return 0;
        }

    }


        public function get_society_main_banks_account(){
        $this->db->select('*');
        $this->db->from('society_main_banks_account');
        $this->db->order_by('id','DESC');
            $this->db->where('type',2);
            $this->db->group_by('bank_id_fk');
        //$this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->bank_id_fk] = $row;
            }
            return $data;
        }
        return false;
    }




    public function getdetailsByRqm_sanad($table, $rqm_sanad)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("rqm_sanad", $rqm_sanad);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }


    }

    public function getColor($id)
    {
        $this->db->select('*');
        $this->db->from("finance_sheeks_tracks_actions");
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->color;
        } else {
            return false;
        }


    }


    public function select_from_finance_sheeks_tracks_actions($arr)
    {
        $this->db->select('*');
        $this->db->from("finance_sheeks_tracks_actions");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }


    }


  /*  public function change_taslem_sheek()
    {



                  if($this->input->post('approved') ==1){


                      $msg ='تم التسليم';
                  }else{
                      $msg ='لم يتم التسليم';
                  }

        $update['taslem_sheek'] = $this->input->post('approved');
        $update['taslem_sheek_name'] = $msg;

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('finance_sanad_sarf_sheek', $update);


    }*/

  /* public function change_taslem_sheek()
    {

                  if($this->input->post('approved') ==1){


                      $msg ='تم التسليم';
                  }else{
                      $msg ='لم يتم التسليم';
                  }

        $update['taslem_sheek'] = $this->input->post('approved');
        $update['taslem_sheek_name'] = $msg;
        $update['taslem_date'] = strtotime(date('Y-m-d'));

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('finance_sanad_sarf_sheek', $update);


    }
	*/
	    public function change_taslem_sheek()
    {
        if ($this->input->post('approved') == 1) {
            $update['taslem_sheek'] = $this->input->post('approved');
            $msg = 'تم التسليم';
        }
        $update['taslem_sheek_name'] = $this->input->post('taslem_sheek_name');
        $update['taslem_sheek_mob'] = $this->input->post('taslem_sheek_mob');
        $update['taslem_date'] = strtotime($this->input->post('date'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('finance_sanad_sarf_sheek', $update);
    }
 /*public function change_taslem_sheek()
    {



        if($this->input->post('approved') ==1){

            $update['taslem_sheek'] = $this->input->post('approved');
            $msg ='تم التسليم';
        }

        $update['taslem_sheek_name'] = $msg;
       // $update['taslem_date'] = strtotime(date('Y-m-d'));
        $update['taslem_date'] = strtotime($this->input->post('date'));

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('finance_sanad_sarf_sheek', $update);


    }*/
	
	


   /* public function change_halet_sheek()
    {



        if($this->input->post('approved') ==1){


            $msg ='تم الصرف';
        }else{
            $msg ='لم يتم الصرف';
        }

        $update['sheek_status'] = $this->input->post('approved');
        $update['sheek_status_name'] = $msg;

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('finance_sanad_sarf_sheek', $update);

    }
*/

    /*public function change_halet_sheek()
    {



        if($this->input->post('approved') ==1){


            $msg ='تم الصرف';
        }else{
            $msg ='لم يتم الصرف';
        }

        $update['sheek_status'] = $this->input->post('approved');
        $update['sheek_status_name'] = $msg;
        $update['sarf_date'] = strtotime(date('Y-m-d'));

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('finance_sanad_sarf_sheek', $update);

    }*/

 public function change_halet_sheek()
    {



        if($this->input->post('approved') ==1){
            $update['sheek_status'] = $this->input->post('approved');
            $msg ='تم الصرف';
        }

        $update['sheek_status_name'] = $msg;

        $update['sarf_date'] = strtotime($this->input->post('date'));

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('finance_sanad_sarf_sheek', $update);

    }





    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
                return $data->user_username;
            } elseif ($data->role_id_fk == 2) {
                $id = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            } elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            } elseif ($data->role_id_fk == 4) {
                $id = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;

    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }


    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from("finance_sanad_sarf_sheek");
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }


    }



    public function get_sheeks_tracks($arr){
        $this->db->select('*');
        $this->db->from("finance_sarf_sheeks_tracks");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;

        } else {

            return false;
        }




    }



    /***************************************************/
    public function getSand_Sarf($rkm,$sheek_num)
    {
        $this->db->where("rqm_sanad",$rkm);
        $sql = $this->db->get('finance_sanad_sarf');
        if ($sql->num_rows() > 0) {
            $i = 0;
            foreach ($sql->result() as $row){
                $data[$i] = $row;
                $data[$i]->delails = $this->getdetailsById($row->id);
                $data[$i]->sheek_details = $this->getsheek_details('finance_sanad_sarf_sheek',$sheek_num);

                $i++;}
            return $data;
        }
        return false;
    }
  /*  public function getSand_Qabd($rkm,$sheek_num)
    {
        $this->db->where("rqm_sanad",$rkm);
        $sql = $this->db->get('finance_sanad_qabd');
        if ($sql->num_rows() > 0) {
            $i = 0;
            foreach ($sql->result() as $row){
                $data[$i] = $row;
                $data[$i]->delails = $this->getdetailsByIdQabd($row->rqm_sanad);
                $data[$i]->sheek_details = $this->getsheek_details('finance_sanad_qabd_sheek',$sheek_num);
                $i++;}
            return $data;
        }
        return false;
    }*/
    
    
        public function getSand_Qabd($rkm, $sheek_num)
    {
        $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');
        $this->db->where("rqm_sanad", $rkm);
        $sql = $this->db->get('finance_sanad_qabd');
        if ($sql->num_rows() > 0) {
            $i = 0;
            foreach ($sql->result() as $row) {
                $data[$i] = $row;
               // $data[$i]->details = $this->getdetailsByIdQabd($row->rqm_sanad);
                $data[$i]->sheek_details = $this->get_details_cheque($row->rqm_sanad);
                $data[$i]->qued_data = $this->GetQuedData($row->qued_rkm_id_fk);
                $data[$i]->all_pills_data = $this->AllPills_model->select_all_by_fr_all_pills(array('pill_num'=>$row->sheek_details[0]->rkm_esal))[0];
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
    
    //27-3-2019
    public function get_details_cheque($rqm_sanad)
    {
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd_sheek");
        $this->db->where("rqm_sanad_fk",$rqm_sanad);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    public function GetQuedData($rkm)
    {
        $this->db->select('*');
        $this->db->from("finance_quods");
        $this->db->where('rkm',$rkm);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->qued_details = $this->GetQuedDetails($row->rkm);
            }
            return $data;
        }
        return false;

    }
    public function GetQuedDetails($qued_rkm_fk)
    {
        $this->db->select('*');
        $this->db->from("finance_quods_details");
        $this->db->where("qued_rkm_fk", $qued_rkm_fk);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }


    public function getdetailsById($id)
    {
        return $this->db->where("rqm_sanad_fk",$id)->get('finance_sanad_sarf_details')->result();
    }






    /*************************ahmed_start**************************/

    public function getdetailsByIdQabd($id)
    {


        $this->db->where("rqm_sanad_fk",$id);
        $sql = $this->db->get('finance_sanad_qabd_details');
        if ($sql->num_rows() > 0) {
            $i = 0;
            foreach ($sql->result() as $row){
                $data[$i] = $row;
                $data[$i]->pill_details = $this->GetPillDetails('person_name,bank_account_num',$row->marg3_rkm_esal);
                $i++;}
            return $data;
        }else{

            return false;

        }
    }

    public function getdetailsByIdQabd2($id)
    {

        $this->db->where("rqm_sanad_fk",$id);
        $sql = $this->db->get('finance_sanad_qabd_details');
        if ($sql->num_rows() > 0) {
                $pill_details = $this->GetPillDetails('person_name,bank_account_num,value',$sql->row()->marg3_rkm_esal);
            return $pill_details;
        }else{

            return false;

        }
    }

    public function GetPillDetails($select,$pill_num){
        $this->db->select($select);
        $this->db->from("fr_all_pills");
        $this->db->where("pill_num", $pill_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }
    /******************************ahmed_start*********************/




    /*public function getdetailsByIdQabd($id)
    {
        return $this->db->where("rqm_sanad_fk",$id)->get('finance_sanad_qabd_details')->result();
    }
    */
     public function getsheek_details($table,$sheek_num){
        return $this->db->where("sheek_num",$sheek_num)->get($table)->row();
    }
















/*****************************************ahmedzidans**********************************/



    public function get_color($id)
    {
        $this->db->select('color');
        $this->db->from('finance_sheeks_tracks_actions');
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->color;
        }else{
            return false;
        }
    }



    public function get_by_type($type)
    {
        $this->db->select('*');
        $this->db->from('finance_sheeks_tracks_actions');
        $this->db->where("type",$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }


    public function update_insert_sheek_track()
    {
        //print_r($_POST);
        $type=$this->input->post('type');
        $row_id=$this->input->post('row_id');
        $option=$this->input->post('option');
        $rkm_sand=$this->input->post('rqm_sand');


        $data['rkm_sanad']=$this->input->post('rqm_sand');
        $data['sheek_num']=$this->input->post('sheek_num');
        $data['bank_name']=$this->input->post('bank_name');
        $data['action_id_fk']=$this->input->post('option');
        $data['action_name']=$this->get_from_tracks($this->input->post('option'));
        $data['date']=strtotime(date('Y-m-d'));
        $data['date_s']=strtotime(date('Y-m-d'));

        $data['date_ar']=date('Y-m-d');
        $data['publisher']=$_SESSION['id'];
        $data['publisher_name']=$_SESSION['user_username'];
        $this->db->insert('finance_qabd_sheeks_tracks',$data);
        //=======================================
        if($type==1)
        {
            $data_2['twaged_sheek']=$this->input->post('option');
            $data_2['twaged_sheek_name']=$this->get_from_tracks($this->input->post('option'));

        }
        if($type==2)
        {
            $data_2['sheek_status']=$this->input->post('option');
            $data_2['sheek_status_name']=$this->get_from_tracks($this->input->post('option'));
        }

        if($type==3)
        {
            $data_2['sheek_type']=$this->input->post('option');
            $data_2['sheek_type_name']=$this->get_from_tracks($this->input->post('option'));

        }

        $this->db->where('rqm_sanad_id_fk',$rkm_sand);
        $this->db->update('finance_sanad_qabd_sheek',$data_2);

        //===========================================




    }

    public function get_from_tracks($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('finance_sheeks_tracks_actions');
        if($query->num_rows()>0)
        {
            return $query->row()->title;
        }else{
            return "غير محدد";
        }
    }








}