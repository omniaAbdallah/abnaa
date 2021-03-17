<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 05/03/2019
 * Time: 01:34 م
 */

class All_mehwr_galsa_model extends CI_Model
{
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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

    public function select_last_galsa($edara){
        $this->db->select('*');
        $this->db->from("egtm_galast");
        $this->db->where("glsa_edara",$edara);
        $this->db->where("finshed",0);
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }else{
            return false;
        }
    }
    public function select_notify_galsa(){
        $this->db->select('*');
        $this->db->from("egtm_galast");
      //  $this->db->where("glsa_edara",$edara);
        $this->db->where("finshed",0);
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }else{
            return false;
        }
    }
    

    public function get_data(){
        $this->db->select('*');
        $this->db->from("egtm_galast");
        $this->db->group_by("galsa_rkm");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row){
                $data[$a] =$row;
              //  $data[$a]->mehwr_num =$this->get_mehwr($row->galsa_rkm);
                $data[$a]->glsa_members =$this->get_glasat_hdoor($row->galsa_rkm);
                //$data[$a]->galsa_finish =$this->get_galsa_finish($row->galsa_rkm)['glsa_finshed'];


                $a++;}
            return $data;
        }else{
            return false;
        }
    }
    

    public  function get_galsa_finish($galsa_rkm){
        $h = $this->db->get_where("md_all_glasat_gam3ia_omomia", array('galsa_rkm'=>$galsa_rkm));
        return $arr= $h->row_array();
        // return $arr['glsa_finshed'];
    }


    public function get_mehwr($galsa_rkm){
        $this->db->select('*');
        $this->db->from("egtm_galast_mahwer");
        $this->db->where("galsa_rkm",$galsa_rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->num_rows();
        }else{
            return false;
        }
    }


    public function get_mehwr_details($galsa_rkm){
    
        $query = $this->db->where("galsa_rkm",$galsa_rkm)->get("egtm_galast_mahwer")->result();

            return $query;
       
    }
    public function getById($galsa_rkm){
        $h = $this->db->get_where("egtm_galast_mahwer", array('galsa_rkm'=>$galsa_rkm));
        return $h->row();
    }


    public function insert_mehwr($files,$edara)
    {
        $last_galsa =$this->select_last_galsa($edara);
      //  $mehwar_rkm =$this->input->post('mehwar_rkm');
    //  $mehwar_rkm =$this->get_last_rkm($galsa_rkm);
        $mehwar_title =$this->input->post('mehwar_title');
        if(!empty($mehwar_title)){
            for($a=0;$a<sizeof($mehwar_title);$a++){

                $data['galsa_id_fk'] = $last_galsa->id;
                $data['galsa_rkm'] = $last_galsa->galsa_rkm;
                $mehwar_rkm =$this->get_last_rkm($data['galsa_rkm']) +1;
               
                $data['galsa_date'] = $last_galsa->galsa_date;
                //$data['glsa_date_h'] = $last_galsa->glsa_date_h;
             //   $data['mehwar_rkm'] =$this->get_last_rkm( $data['galsa_rkm'])[$a];
               $data['mehwar_rkm'] =$mehwar_rkm;
              //  $data['mehwar_rkm'] =  $mehwar_rkm[$a];
                $data['mehwar_title'] = $mehwar_title[$a];
                if (!empty($files)){
                    $data['mehwar_morfaq'] = $files[$a];
                }
                $data['mehwar_date_add'] = strtotime(date('Y-m-d'));
                $data['mehwar_date_add_ar'] = date('Y-m-d');
                $data['mehwar_publisher'] 	  	   = $_SESSION['user_id'];
                $data['mehwar_publisher_name'] 	  	   = $this->getUserName($_SESSION['user_id']);

                $this->db->insert('egtm_galast_mahwer', $data);
            }
        }
    }
    

    public function update_mehwr($galsa_rkm,$files,$edara)
    {

       $this->db->where('galsa_rkm', $galsa_rkm);
       $this->db->delete('egtm_galast_mahwer');

        $last_galsa =$this->select_last_galsa($edara);
        $mehwar_rkm =$this->input->post('mehwar_rkm');
        $mehwar_title =$this->input->post('mehwar_title');
        $imags =$this->input->post('images');
         if(!empty($mehwar_title)){
            for($a=0;$a<sizeof($mehwar_title);$a++){
              //  $mehwar_rkm =$this->get_last_rkm($galsa_rkm);
                if (!empty($files)){
                    $data['mehwar_morfaq']= $files[$a];
                }
                $data['galsa_rkm'] = $last_galsa->galsa_rkm;
                $data['galsa_id_fk'] = $last_galsa->id;
                $data['galsa_date'] = $last_galsa->galsa_date;
           
                $data['mehwar_rkm'] =  $mehwar_rkm[$a];
                $data['mehwar_title'] = $mehwar_title[$a];
                if (!empty($imags) ){
                    if ( isset($imags[$a]) && $imags[$a]!=0  ){
                        $data['mehwar_morfaq']=$imags[$a];
                    }

                }
                $data['mehwar_date_add'] = strtotime(date('Y-m-d'));
                $data['mehwar_date_add_ar'] = date('Y-m-d');
                $data['mehwar_publisher'] 	  	   = $_SESSION['user_id'];
                $data['mehwar_publisher_name'] 	  	   = $this->getUserName($_SESSION['user_id']);
                $this->db->insert('egtm_galast_mahwer',$data);


            }
        }



    }

    public function delete_row($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('egtm_galast_mahwer');

    }

    public function delete($galsa_rkm)
    {
        $this->db->where('galsa_rkm', $galsa_rkm);
        $this->db->delete('egtm_galast_mahwer');

    }


    public function get_glasat_hdoor($galsa_rkm){
        $this->db->select('*');
        $this->db->from("egtm_galast_members");
        $this->db->where("galsa_rkm_fk",$galsa_rkm);
      //  $this->db->order_by("mansp_fk",'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row){

                $data[$a] =  $row ;
                $a++;}
            return $data;
        }else{
            return false;
        }
    }

    /******************************************************/
    public function CheckUser()
    {
        $role =$_SESSION['role_id_fk'] ;
        $role_arr =array(1=>"users",2=>"magls_members_table",3=>"employees",4=>"general_assembley_members",5=>"users");
        $this->db->select('*');
        $this->db->from($role_arr[$role]);
        if($role ==1){
            $this->db->where("user_id",$_SESSION['user_id']);
        }else{
            $this->db->where("id",$_SESSION['emp_code']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            if($role ==1){
                $data =$_SESSION['user_name'];
            }elseif($role ==2){

                $data =$query->result()[0]->member_name;
            }elseif ($role ==3){
                $data =$query->result()[0]->employee;
            }elseif ($role ==4) {
                $data = $query->result()[0]->general_assembley_members_name;
            }
            return$data;

        }else{
            return 0;
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
                $table = 'magls_members_table';
                $field = 'member_name';
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
                $table = 'general_assembley_members';
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

    public function get_last_rkm($galsa_rkm){
        $this->db->where('galsa_rkm',$galsa_rkm);
        $this->db->order_by('mehwar_rkm','DESC');
        $this->db->limit(1);
        $query = $this->db->get('egtm_galast_mahwer');

        if ($query->num_rows()>0){
            return $query->row()->mehwar_rkm;
        } else{
            return 0;
        }

    }
//    public function get_all_mehwar($galsa_rkm){
//        $this->db->where('galsa_rkm',$galsa_rkm);
//        $query = $this->db->get('egtm_galast_mahwer');
//
//        if ($query->num_rows()>0){
//            return $query->result();
//        } else{
//            return 0;
//        }
//
//
//    }

    public function get_by($table, $where_arr, $select)
    {

        $q = $this->db->where($where_arr)
            ->get($table)->row();
        if (!empty($q)) {
            return $q->$select;
        } else {
            return false;
        }

    }
    //yara30-4-2020
    public function update_table_hoddor($galsa_rkm)
    {
      $data['hdoor_satus']=1;
      $this->db->where('galsa_rkm_fk', $galsa_rkm);
      $this->db->where('emp_n', $_SESSION['emp_name']);
    $this->db->update('egtm_galast_members',$data);
          
    }
    public function check_galsa($galsa_rkm)
    {
        $this->db->where('galsa_rkm', $galsa_rkm);
        $this->db->where('finshed', 0);
        $this->db->from('egtm_galast');
        return $this->db->count_all_results();
    }
    public function check_table_hoddor($galsa_rkm)
        {
           $check_galsa= $this->check_galsa($galsa_rkm);
            if(!empty($check_galsa))
            {
            $this->db->where('galsa_rkm_fk', $galsa_rkm);
            $this->db->where('emp_n', $_SESSION['emp_name']);
            $this->db->where('hdoor_satus', 0);
            $this->db->from('egtm_galast_members');
            return $this->db->get()->row();
            }
            else{
                return 0;
            }
        }

}