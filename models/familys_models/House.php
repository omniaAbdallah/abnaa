<?php
class House extends CI_Model
{
   public function __construct() {
        parent::__construct();
    }
//---------------------------------------------------
 public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val="";
            return $val;
        }else{
            return $post_value;
        }
    }
//---------------------------------------------------
    public  function  insert($mother_national_num){
        $data['mother_national_num_fk']=$this->chek_Null($mother_national_num);
        $data['h_electricity_account']=$this->chek_Null( $this->input->post('h_electricity_account'));
        $data['h_health_number']=$this->chek_Null( $this->input->post('h_health_number'));
        $data['h_area_id_fk']=$this->chek_Null( $this->input->post('h_area_id_fk'));
        $data['h_city_id_fk']=$this->chek_Null( $this->input->post('h_city_id_fk'));
        $data['h_center_id_fk']=$this->chek_Null( $this->input->post('h_center_id_fk'));
        $data['h_village_id_fk']=$this->chek_Null( $this->input->post('h_village_id_fk'));
        $data['hai_name']=$this->chek_Null( $this->input->post('hai_name'));
        $data['h_street']=$this->chek_Null( $this->input->post('h_street'));
       // $data['map']=$this->chek_Null( $this->input->post('map'));
        $data['house_google_lat']=$this->chek_Null( $this->input->post('house_google_lat'));
        $data['house_google_lng']=$this->chek_Null( $this->input->post('house_google_lng'));
        $data['h_mosque']=$this->chek_Null( $this->input->post('h_mosque'));
        $data['h_nearest_school']=$this->chek_Null( $this->input->post('h_nearest_school'));
        $data['h_nearest_teacher']=$this->chek_Null( $this->input->post('h_nearest_teacher'));
        $data['h_house_type_id_fk']=$this->chek_Null( $this->input->post('h_house_type_id_fk'));
        $data['h_house_owner_id_fk']=$this->chek_Null( $this->input->post('h_house_owner_id_fk'));
        $data['h_house_color']=$this->chek_Null( $this->input->post('h_house_color'));
        $data['h_rent_amount']=$this->chek_Null($this->input->post('h_rent_amount'));
        $data['h_rooms_account']=$this->chek_Null( $this->input->post('h_rooms_account'));
        $data['h_bath_rooms_account']=$this->chek_Null( $this->input->post('h_bath_rooms_account'));
        $data['h_borrow_from_bank']=$this->chek_Null( $this->input->post('h_borrow_from_bank'));
        $data['h_borrow_remain']=$this->chek_Null( $this->input->post('h_borrow_remain'));
        $data['h_house_area']=$this->chek_Null( $this->input->post('h_house_area'));
        $data['h_house_direction']=$this->chek_Null( $this->input->post('h_house_direction'));
        $data['h_loan_restoration']=$this->chek_Null( $this->input->post('h_loan_restoration'));
        $data['h_loan_restoration_remain']=$this->chek_Null($this->input->post('h_loan_restoration_remain'));
        $data['h_house_status_id_fk']=$this->chek_Null( $this->input->post('h_house_status_id_fk'));
        $data['h_house_size']=$this->chek_Null( $this->input->post('h_house_size'));
        //======================================================
                /***********************ahmed*/
        $data['h_water_account']=$this->chek_Null( $this->input->post('h_water_account'));
        $data['h_renter_name']=$this->chek_Null( $this->input->post('h_renter_name'));
        $data['h_renter_mob']=$this->chek_Null( $this->input->post('h_renter_mob'));
        $data['contract_start_date']=$this->chek_Null( $this->input->post('contract_start_date'));
        $data['contract_end_date']=$this->chek_Null( $this->input->post('contract_end_date'));
 $data['national_address']=$this->chek_Null( $this->input->post('national_address'));
        /***********************ahmed*/
        $this->db->insert('houses', $data);
        $this->add_history(202, $mother_national_num);
    }
    //=======================================================================
  public function getById($id){
        $h = $this->db->get_where('houses', array('mother_national_num_fk'=>$id));
        return $h->row_array();
    }
    public function update($id){
        $data['h_electricity_account']=$this->chek_Null( $this->input->post('h_electricity_account'));
        $data['h_health_number']=$this->chek_Null( $this->input->post('h_health_number'));
        $data['h_area_id_fk']=$this->chek_Null( $this->input->post('h_area_id_fk'));
        $data['h_city_id_fk']=$this->chek_Null( $this->input->post('h_city_id_fk'));
        $data['h_center_id_fk']=$this->chek_Null( $this->input->post('h_center_id_fk'));
        $data['h_village_id_fk']=$this->chek_Null( $this->input->post('h_village_id_fk'));
        $data['house_google_lat']=$this->chek_Null( $this->input->post('house_google_lat'));
        $data['house_google_lng']=$this->chek_Null( $this->input->post('house_google_lng'));
        $data['h_street']=$this->chek_Null( $this->input->post('h_street'));
        $data['h_mosque']=$this->chek_Null( $this->input->post('h_mosque'));
        $data['hai_name']=$this->chek_Null( $this->input->post('hai_name'));
       // $data['map']=$this->chek_Null( $this->input->post('map'));
        $data['h_nearest_school']=$this->chek_Null( $this->input->post('h_nearest_school'));
        $data['h_nearest_teacher']=$this->chek_Null( $this->input->post('h_nearest_teacher'));
        $data['h_house_type_id_fk']=$this->chek_Null( $this->input->post('h_house_type_id_fk'));
        $data['h_house_owner_id_fk']=$this->chek_Null( $this->input->post('h_house_owner_id_fk'));
        $data['h_house_color']=$this->chek_Null( $this->input->post('h_house_color'));
        $data['h_rent_amount']=$this->chek_Null($this->input->post('h_rent_amount'));
        $data['h_rooms_account']=$this->chek_Null( $this->input->post('h_rooms_account'));
        $data['h_bath_rooms_account']=$this->chek_Null( $this->input->post('h_bath_rooms_account'));
        $data['h_borrow_from_bank']=$this->chek_Null( $this->input->post('h_borrow_from_bank'));
        $data['h_borrow_remain']=$this->chek_Null( $this->input->post('h_borrow_remain'));
        $data['h_house_area']=$this->chek_Null( $this->input->post('h_house_area'));
        $data['h_house_direction']=$this->chek_Null( $this->input->post('h_house_direction'));
        $data['h_loan_restoration_remain']=$this->chek_Null($this->input->post('h_loan_restoration_remain'));
        $data['h_house_size']=$this->chek_Null( $this->input->post('h_house_size'));
        $data['h_house_status_id_fk']=$this->chek_Null( $this->input->post('h_house_status_id_fk'));
                 /***********************ahmed*/
        $data['h_water_account']=$this->chek_Null( $this->input->post('h_water_account'));
        $data['h_renter_name']=$this->chek_Null( $this->input->post('h_renter_name'));
        $data['h_renter_mob']=$this->chek_Null( $this->input->post('h_renter_mob'));
        $data['contract_start_date']=$this->chek_Null( $this->input->post('contract_start_date'));
        $data['contract_end_date']=$this->chek_Null( $this->input->post('contract_end_date'));
         $data['national_address']=$this->chek_Null( $this->input->post('national_address'));
        if($this->input->post('h_loan_restoration')==0){
            $data['h_loan_restoration_remain']=0;
        }else{$data['h_loan_restoration_remain']=$this->chek_Null($this->input->post('h_loan_restoration_remain'));
        }
        if($this->input->post('h_borrow_from_bank')==0){
            $data['h_borrow_remain']=0;
        }else{$data['h_borrow_remain']=$this->chek_Null($this->input->post('h_borrow_remain'));
        }
        $this->db->where('mother_national_num_fk', $id);
        if($this->db->update('houses',$data)) {
            $this->add_history(203, $id);
            return true;

        }else{
            return false;
        }

    }
    //===============================================================
    public  function select_places($from_id){
        $this->db->select('*');
        $this->db->from("area_settings");
        $this->db->where("from_id",$from_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    /***************************/
    public function select_from_setting($table, $where_arr)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

//add_history
    function add_history($action_code, $mother_id)
    {

        $action_name = $this->db->where('code', $action_code)->get('osr_action_process')->row()->process_name;
        $data['action_code'] = $action_code;
        $data['action_name'] = $action_name;
        $data['mother_national_num'] = $mother_id;

        // if (key_exists($action, $actions)) {
        //     $data['action_n'] = $actions[$action];
        // }
        $data['date_action'] = date('Y-m-d');
        $data['time_action'] = date('h:i a');
        $data['publisher'] = $_SESSION["user_id"];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('osr_all_history', $data);
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

// $data['mother_national_num_fk'] = $mother_national_num;

// $data['file_attach_id_fk'] = $file_attach_id_fk[$key];

// $data['file_attach_name'] =$value;

//  $this->db->insert('family_attach_files_other',$data);
    public function insert_attach($rkm, $all_img)
    {


        if (!empty($all_img)) {
            $img_count = count($all_img);
            $title = $this->input->post('title');

            for ($a = 0; $a < $img_count; $a++) {

                $files['mother_national_num_fk'] = $rkm;
                $files['file_attach_name'] = $all_img[$a];
                $files['file_attach_id_fk'] = $title;
                $files['date'] = date("Y-m-d");
                $this->db->insert('family_attach_files_other', $files);
                $this->add_history(204, $rkm);
            }

        }


    }

    public function get_attach($id)
    {
        $this->db->where('mother_national_num_fk', $id);
        $this->db->where('file_attach_id_fk', 'مرفقات السكن');
        $query = $this->db->get('family_attach_files_other');
        if ($query->num_rows() > 0) {
            return $query->result();
        }

    }

    public function delete_attach($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('family_attach_files_other');
    }
}// END CLASS