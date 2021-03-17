<?php
class Zeyara_report_m extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//=============================================================================================================//
    public function get_one_vesitor($id)
    {
        $this->db->select('*');
        $this->db->from('hr_zeyara_report');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row();
            return $data;
        }
    }
public function insertGam3iaVisitors($id)
    {
        $data['emp_id']=$this->chek_Null($this->input->post('emp_id')); 
        $data['emp_code']=$this->chek_Null($this->input->post('emp_code'));
        $data['emp_name']=$this->chek_Null($this->input->post('emp_name'));
        $data['mosma_wazefy_n']=$this->chek_Null($this->input->post('mosma_wazefy_n'));
        $data['mosma_wazefy_id_fk']=$this->chek_Null($this->input->post('mosma_wazefy_id_fk'));
        $data['edara_n']=$this->chek_Null($this->input->post('edara_n'));
        $data['edara_id_fk']=$this->chek_Null($this->input->post('edara_id_fk'));
        $data['qsm_n']=$this->chek_Null($this->input->post('qsm_n'));
        $data['qsm_id_fk']=$this->chek_Null($this->input->post('qsm_id_fk'));
        $data['mob']=$this->chek_Null($this->input->post('mob'));
        $data['purpose']=$this->chek_Null($this->input->post('purpose'));
        $data['subject']=$this->chek_Null($this->input->post('subject_zeyara'));
        $data['natega_zeyara']=$this->chek_Null($this->input->post('natega_zeyara'));
        $data['nategaa_id_fk']=$this->chek_Null($this->input->post('nategaa_id_fk'));
        $data['purpose_id_fk']=$this->chek_Null($this->input->post('purpose_id_fk'));
        $data['subject_id_fk']=$this->chek_Null($this->input->post('subject_id_fk'));
        $data['zeyara_place']=$this->chek_Null($this->input->post('zeyara_place'));
        $data['zeyara_place_id_fk']=$this->chek_Null($this->input->post('zeyara_place_id_fk'));
        
        $data['zeyara_type']=$this->chek_Null($this->input->post('zeyara_type'));
        $data['zeyara_geha']=$this->chek_Null($this->input->post('geha'));
        $data['zeyara_geha_id_fk']=$this->chek_Null($this->input->post('zeyara_geha_id_fk'));
         $data['from_hour']=$this->input->post('from_hour');
         $data['to_hour']=$this->input->post('to_hour');
      $data['zeyara_notes']=$this->input->post('zeyara_notes');
         $data['zeyara_results']=$this->input->post('zeyara_results');
         
         $data['zeyara_details']=$this->input->post('zeyara_details');
         $data['ms2ol_geha']=$this->input->post('ms2ol_geha');
         $data['ms2ol_id_fk']=$this->input->post('ms2ol_id_fk');

         $timeIn = strtotime($this->input->post('from_hour'));
         $timeOUT = strtotime($this->input->post('to_hour'));
         $defrent =  $timeOUT - $timeIn;
         $hours = floor($defrent / 3600);
         $minutes = floor(($defrent / 60) % 60);
         $time_def ='اقل من دقيقة';
         if($minutes > 0){
             $time_def =$minutes.' دقيقة  ';
             if($hours > 0){
                 $time_def .= $hours.' و ساعة ' ;
             }
         }
         $data['total_hours']=$time_def;
        if($id == 0){
         $data['publisher'] = $_SESSION['user_id'];     
         $data['zeyara_date'] = $this->input->post('zeyara_date');
         $data['zeyara_date_ar'] =  strtotime($this->input->post('zeyara_date'));
            $this->db->insert('hr_zeyara_report',$data);
        }else{
            $this->db->where("id",$id);
            $this->db->update('hr_zeyara_report',$data);
        }
    }
	  public function get_all_record($arr ='')
    {
          $this->db->select('*');
        $this->db->from("hr_zeyara_report");
if($_SESSION['role_id_fk'] ==1  ){
}elseif($_SESSION['role_id_fk'] == 3){
            $this->db->where('publisher',$_SESSION['user_id']);           
}
 if (!empty($arr)){
     $this->db->where($arr);
 }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
                $i++;
            }
            return $data;
        }
        return false;
    }
    public function deleteGam3iaVisitors($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('hr_zeyara_report');
    }
    public function get_date_emp($id)
    {
        $q = $this->db->where('id', $id)->get('employees')->row();
        $data=array();
        $data['name'] = $q->employee;
        $data['edara'] = $this->get_data_emp2($q->administration);
        $data['dept'] = $this->get_data_emp2($q->department);
        return $data;
    }
    public function get_data_emp2($id)
    {
        return $this->db->where('id', $id)->get('department_jobs')->row_array()['name'];
    }
/*****************************************************************************************/
    //******************/////////////////////******************///////////////////******************
    public function select_employee()
    {
        $this->db->select('*');
        $this->db->from("employees");
        //   $this->db->where("administration",3);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i]->per = $this->get_employee_role($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }
//******************/////////////////////******************///////////////////******************
  public function add_gam3ia_visitor_setting($type,$type_name,$edara_n,$edara_id_fk){
        $data['title'] = $this->input->post('value');
        $data['type'] = $type;
        $data['type_name'] = $type_name;
    //     $f2at = array(1 => 'الاسر',2 => 'الكفلاء والمتبرعين', 3 => 'مؤسسات مانحة', 4 => 'المتطوعين', 5 => 'التوظيف', 6 => 'اخري');
     if ($type!=3&&$type!=4){
            $data['edara_id_fk'] = $edara_id_fk ;
            $data['edara_n'] = $edara_n;
       }
       if ($type==5){
        $data['edara_id_fk'] = $edara_id_fk ;
        $data['edara_n'] = $edara_n;
   }
        $id = $this->input->post('row_id') ;
         if (!empty($id)){
             $data_update['title'] = $this->input->post('value');
             $this->db->where('id',$id);
             $this->db->update('hr_zeyara_report_setting', $data_update);
         } else{
             $this->db->insert('hr_zeyara_report_setting', $data);
         }
    }
public function get_setting($typee, $type, $edara_n, $edara_id_fk)
{
    $this->db->where('type_name', $type);
    /*26-10-20-om*/
    if (in_array($typee, array(1, 2))) {
        $this->db->where('edara_id_fk', $edara_id_fk);
    }
    if (in_array($typee, array(5))) {
        $this->db->where('edara_id_fk', $edara_id_fk);
    }
    $query = $this->db->get('hr_zeyara_report_setting');
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false;
}
    public function get_all_emp(){
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
 public function delete_setting($id){
        $this->db->where('id',$id);
        $this->db->delete('hr_zeyara_report_setting');
    }
      public function get_emp_visitors(){
        $this->db->group_by('degree_id');
        $query = $this->db->get('hr_zeyara_report');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    public function get_setting_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('hr_zeyara_report_setting');
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }
    //yara26-10-2020
    public function get_all_setting(){
        $query = $this->db->get('hr_zeyara_report_setting');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    public function get_one_setting($id)
    {
        $this->db->select('*');
        $this->db->from('hr_zeyara_report_setting');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row();
            return $data;
        }
    }
    public function insert_stetting($id){
        $data['title'] = $this->input->post('title');
        $data['type'] = $this->input->post('type');
       if($data['type']==1)
       {
        $data['type_name'] = 'الغرض من الزيارة';
       }
       else if($data['type']==2)
       {
        $data['type_name'] = 'نتيجة الزيارة ';
       }
      else if($data['type']==3)
       {
        $data['type_name'] = 'جهه الزيارة ';
       }
       else if($data['type']==4)
       {
        $data['type_name'] = ' الموقع ';
       }
       else if($data['type']==5)
       {
        $data['type_name'] = ' مسئول الجهه ';
       }
     if ($data['type']!=3){
         $edara_id_fk=explode('-',$this->input->post('edara_id_fk'));
            $data['edara_id_fk'] = $edara_id_fk[0];
            $data['edara_n'] = $edara_id_fk[1];
       }
         if ($id!=0){
             $data_update['title'] = $this->input->post('title');
             $this->db->where('id',$id);
             $this->db->update('hr_zeyara_report_setting', $data_update);
         } else{
             $this->db->insert('hr_zeyara_report_setting', $data);
         }
    }
    public function get_all_edara(){
        $query = $this->db->where('from_id_fk',0)->get('hr_edarat_aqsam');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
        ///////////////////////
        public function get_attach($id)
        {
            $query = $this->db->where('zeyara_id_fk',$id)->get('hr_zeyara_attaches');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
    
        }
        public function insert_attach($all_img)
        {
    
                    if (!empty($all_img)) {
                        $img_count = count($all_img);
                    
            
                        for ($a = 0; $a < $img_count; $a++) {
                            $files['file'] = $all_img[$a];
                            $files['title'] = $this->input->post('title');
                           
                            $files['zeyara_id_fk'] = $this->input->post('row');
                            $files['date'] = strtotime(date("Y-m-d"));
                            $files['date_ar'] = date("Y-m-d");
                            if (isset($_SESSION['user_id'])) {
                                $files['publisher'] = $_SESSION['user_id'];
                                $files['publisher_name'] = $this->getUserName($_SESSION['user_id']);
                            }
                            $this->db->insert('hr_zeyara_attaches', $files);
                        }
            
                    }
    
    
        }
    
    
     
        public function delete_attach($id)
        {
    
            $this->db->where('id', $id);
            $this->db->delete('hr_zeyara_attaches');
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
  
    public function get_all_ms2olen()
    {
        $this->db->select('*');
        $this->db->from('hr_zeyara_report_setting');
        $this->db->where("type",'geha');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->result();
            return $data;
        }
    }
}
?>