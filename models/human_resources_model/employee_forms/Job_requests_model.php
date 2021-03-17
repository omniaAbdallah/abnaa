<?php
class Job_requests_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
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


    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("hr_job_request");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id ;
            }
            return $data;
        }
        return  1;
    }


    public function insert()
    {


        if(!empty($_POST['dep_id_fk'])) {
            $departs = explode('-', $_POST['dep_id_fk']);
            $data['dep_id_fk'] = $departs[0];
            $data['sub_dep_id_fk'] = $departs[1];
        }
        $data['job_title_id_fk']=$this->input->post('job_title_id_fk');
        $data['num_for_job']=$this->input->post('num_for_job');
        $data['job_type']=$this->input->post('job_type');
        $data['job_natural']=$this->input->post('job_natural');
        $data['date']=strtotime(date('Y-m-d'));
        $data['date_ar']=date('Y-m-d');
        $data['publisher']=$_SESSION['user_id'];
        $this->db->insert('hr_job_request',$data);



        if(!empty($_POST['details_reason'])){
            $reason =$_POST['details_reason'];
            for($x=0;$x<sizeof($reason);$x++){
                $data2['request_id_fk']= $this->select_last_id();
                $data2['details']=$reason[$x];
                $data2['type']=1;
                $this->db->insert('hr_job_request_details',$data2);

            }
        }



        if(!empty($_POST['details_job_request'])){
            $job_request =$_POST['details_job_request'];
            for($a=0;$a<sizeof($job_request);$a++){
                $data3['request_id_fk']= $this->select_last_id();
                $data3['details']=$job_request[$a];
                $data3['type']=2;
                $this->db->insert('hr_job_request_details',$data3);
            }
        }

    }
    public function update($id)
    {


        $this->db->where('request_id_fk',$id);
        $this->db->delete("hr_job_request_details");

        if(!empty($_POST['dep_id_fk'])) {
            $departs = explode('-', $_POST['dep_id_fk']);
            $data['dep_id_fk'] = $departs[0];
            $data['sub_dep_id_fk'] = $departs[1];
        }
        $data['job_title_id_fk']=$this->input->post('job_title_id_fk');
        $data['num_for_job']=$this->input->post('num_for_job');
        $data['job_type']=$this->input->post('job_type');
        $data['job_natural']=$this->input->post('job_natural');

        $this->db->where('id', $id);
        $this->db->update('hr_job_request', $data);



        if(!empty($_POST['details_reason'])){
            $reason =$_POST['details_reason'];
            for($x=0;$x<sizeof($reason);$x++){
                $data2['request_id_fk']= $id;
                $data2['details']=$reason[$x];
                $data2['type']=1;
                $this->db->insert('hr_job_request_details',$data2);

            }
        }



        if(!empty($_POST['details_job_request'])){
            $job_request =$_POST['details_job_request'];
            for($a=0;$a<sizeof($job_request);$a++){
                $data3['request_id_fk']= $id;
                $data3['details']=$job_request[$a];
                $data3['type']=2;
                $this->db->insert('hr_job_request_details',$data3);
            }
        }
    }
//=============================================================================================================//

    public function select_depart(){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $_SESSION['emp_code']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->getName($row->administration);
                $arr[$a]->departments_name = $this->getName($row->department);
            $a++;}
            return $arr[0];
        }else{
            return 0;
        }
    }


    public function  getName($id)
    {
        $this->db->select('id,name');
        $this->db->from('department_jobs');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->name;
        }else{
            return 0;
        }

    }


    public function select_all_defined($type){
        $this->db->select('*');
        $this->db->from('all_defined_setting');
        $this->db->where("defined_type",$type);
        $this->db->order_by('in_order','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }


    public function select_forms_settings($type){
        $this->db->order_by("in_order", "asc");
        $this->db->where("type", $type);
        $query =  $this->db->get("hr_forms_settings");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[] = $key;
            }
            return $data;
        }else{
            return 0;
        }

    }


    public function get_all($id)
    {
      if(!empty($id)){
          $this->db->where('id',$id);

      }
        $this->db->order_by('id','desc');
        $query= $this->db->get('hr_job_request');
        if($query->num_rows()>0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->management = $this->get_from_job_department($row->dep_id_fk);
                $data[$x]->department = $this->get_from_job_department($row->sub_dep_id_fk);
                $data[$x]->job_name = $this->get_from_all_defined_setting($row->job_title_id_fk);
                $data[$x]->reason = $this->get_from_hr_job_request_details($row->id, 1);
                $data[$x]->requires = $this->get_from_hr_job_request_details($row->id, 2);


                $x++;

            }
            return $data;
        }else{
            return false;
        }

    }
    public function get_from_hr_job_request_details($id,$type)
    {
        $arr=array('request_id_fk'=>$id,'type'=>$type);
        $this->db->where($arr);
        $query=$this->db->get('hr_job_request_details');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }
    public function get_from_job_department($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('department_jobs');
        if($query->num_rows()>0)
        {
            return $query->row()->name;
        }else{
            return false;
        }
    }
    public function get_from_all_defined_setting($id){
        $this->db->select('defined_title');
        $this->db->from('all_defined_setting');
        $this->db->where("defined_id",$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title ;
        }
        return false;
    }

    public function Deletejob_request($id){
        $this->db->where('id',$id);
        $this->db->delete("hr_job_request");
        $this->db->where('request_id_fk',$id);
        $this->db->delete("hr_job_request_details");
    }



    /*************************************************************25-9-2018*************************************************/
    public function select_employees_settings($type){
        $this->db->order_by("in_order", "asc");
        $this->db->where("type", $type);
        $query =  $this->db->get("employees_settings");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[] = $key;
            }
            return $data;
        }else{
            return 0;
        }

    }


    public function select_all($table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('id','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[] = $key;
            }
            return $data;
        }else{
            return 0;
        }
    }


    public function insert_main_data($file,$personal_photo){
        if(!empty($file)) {
            $data['national_num_img']=$file;
        }
            if(!empty($personal_photo)) {
         $data['personal_photo'] =$personal_photo;
        }
       
        $data['national_num']=$this->chek_Null($this->input->post('national_num'));
        $data['gender_id_fk']=$this->chek_Null($this->input->post('gender_id_fk'));
        $data['nationality_id_fk']=$this->chek_Null($this->input->post('nationality_id_fk'));
        $data['name']=$this->chek_Null($this->input->post('name'));
        $data['date_birth']=$this->chek_Null($this->input->post('date_birth'));
        $data['place_birth']=$this->chek_Null($this->input->post('place_birth'));
        $data['social_status']=$this->chek_Null($this->input->post('social_status'));
        $data['city']=$this->chek_Null($this->input->post('city'));
        $data['hai']=$this->chek_Null($this->input->post('hai'));
        $data['job_request_id_fk']=$this->chek_Null($this->input->post('job_request_id_fk'));
        $data['job_request_id_fk']=$this->chek_Null($this->input->post('job_request_id_fk'));
        $data['mob']=$this->chek_Null($this->input->post('mob'));
        $data['email']=$this->chek_Null($this->input->post('email'));
        $data['method_reached']=$this->chek_Null($this->input->post('method_reached'));
        $data['method_reached']=$this->chek_Null($this->input->post('method_reached'));
        $data['previous_request']=$this->chek_Null($this->input->post('previous_request'));
        $data['previous_request_date']=$this->chek_Null($this->input->post('previous_request_date'));
        $data['know_person_in_charity']=$this->chek_Null($this->input->post('know_person_in_charity'));
        $data['work_now']=$this->chek_Null($this->input->post('work_now'));
        $data['date_start_work'] =$this->chek_Null($this->input->post('date_start_work'));
        $this->db->insert('job_request_orders',$data);
    }


    public function update_main_data($file,$id,$personal_photo){
 
        if(!empty($file)) {
            $data['national_num_img']=$file;
        }
        
        if(!empty($personal_photo)) {
         $data['personal_photo'] =$personal_photo;
        }
          
        $data['national_num']=$this->chek_Null($this->input->post('national_num'));
        $data['gender_id_fk']=$this->chek_Null($this->input->post('gender_id_fk'));
        $data['nationality_id_fk']=$this->chek_Null($this->input->post('nationality_id_fk'));
        $data['name']=$this->chek_Null($this->input->post('name'));
        $data['date_birth']=$this->chek_Null($this->input->post('date_birth'));
        $data['place_birth']=$this->chek_Null($this->input->post('place_birth'));
        $data['social_status']=$this->chek_Null($this->input->post('social_status'));
        $data['city']=$this->chek_Null($this->input->post('city'));
        $data['hai']=$this->chek_Null($this->input->post('hai'));
        $data['job_request_id_fk']=$this->chek_Null($this->input->post('job_request_id_fk'));
        $data['job_name_other']=$this->chek_Null($this->input->post('job_name_other'));
        $data['mob']=$this->chek_Null($this->input->post('mob'));
        $data['email']=$this->chek_Null($this->input->post('email'));
        $data['method_reached']=$this->chek_Null($this->input->post('method_reached'));
        $data['method_reached_other']=$this->chek_Null($this->input->post('method_reached_other'));
        $data['previous_request']=$this->chek_Null($this->input->post('previous_request'));
        $data['previous_request_date']=$this->chek_Null($this->input->post('previous_request_date'));
        $data['know_person_in_charity']=$this->chek_Null($this->input->post('know_person_in_charity'));
        $data['work_now']=$this->chek_Null($this->input->post('work_now'));
        $data['date_start_work'] = $this->chek_Null($this->input->post('date_start_work'));
        $this->db->where('id', $id);
        $this->db->update('job_request_orders', $data);
    }

    public function getMaindataById($id){
        $h = $this->db->get_where("job_request_orders", array('id'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row_array();
        }else{
            return 0;
        }
    }



     public function Delete_application($id){
         $delete_arr =array('job_request_orders','hr_previous_work_job_orders','hr_skills_job_orders','hr_persons_job_orders','hr_qualification_job_orders','hr_dwrat_job_orders');
        foreach ($delete_arr as $table){
            if($table ==='job_request_orders'){
                $this->db->where('id',$id);
            }else{
                $this->db->where('job_request_ordered_fk',$id);
            }
            $this->db->delete($table);
        }
     }

    /**************************************************************************************************/
    public function insert_previous_work()
    {
        if(!empty($this->input->post('company_name'))) {
            $count = count($this->input->post('company_name'));
            for($i=0;$i<$count;$i++)
            {
                $data['job_request_ordered_fk']=$this->uri->segment(5);
                $data['company_name']=$this->input->post('company_name')[$i];

                $data['job_id_title_fk']=$this->input->post('job_id_title_fk')[$i];

                $data['date_from']=$this->input->post('date_from')[$i];
                $data['date_to']=$this->input->post('date_to')[$i];
                $data['job_mission']=$this->input->post('job_mission')[$i];
                $data['salary']=$this->input->post('salary')[$i];
                $data['leave_work_reason']=$this->input->post('leave_work_reason')[$i];
                $this->db->insert('hr_previous_work_job_orders',$data);
            }
        }
    }
    public function insert_hopies_skills()
    {
        if(!empty($this->input->post('name'))) {
            $count = count($this->input->post('name'));
            for($i=0;$i<$count;$i++)
            {
                $data['job_request_ordered_fk']=$this->uri->segment(5);

                $data['name']=$this->input->post('name')[$i];
                $data['details']=$this->input->post('details')[$i];
                $data['efficiency_id_fk']=$this->input->post('efficiency_id_fk')[$i];
                $this->db->insert('hr_skills_job_orders',$data);

            }
        }
    }
    public function insert_persons_job()
    {
        if(!empty($this->input->post('job'))) {
            $count = count($this->input->post('job'));
            for($i=0;$i<$count;$i++)
            {
                $data['job_request_ordered_fk']=$this->uri->segment(5);

                $data['job']=$this->input->post('job')[$i];
                $data['job_name']=$this->input->post('job_name')[$i];
                $data['job_place']=$this->input->post('job_place')[$i];
                $data['mob']=$this->input->post('mob')[$i];
                $this->db->insert('hr_persons_job_orders',$data);
            }
        }
    }
    public function insert_science_data($files){
        if(!empty($files)){
        $cpt =count($files);
            for($i=0; $i<$cpt; $i++) {
                $data['job_request_ordered_fk']=$this->uri->segment(5);
                $data['degree_id_fk']=$this->input->post('degree_id_fk')[$i];
                $data['qualification_id_fk']=$this->input->post('qualification_id_fk')[$i];
                $data['school']=$this->input->post('school')[$i];
                $data['specialied']=$this->input->post('specialied')[$i];
                $data['year']=$this->input->post('year')[$i];
                $data['taqder']=$this->input->post('taqder')[$i];
                if(!empty($files[$i])) {
                    $data['img'] = $files[$i];
                }
                $this->db->insert('hr_qualification_job_orders',$data);

        }
        }
    }
    public function insert_dawrat_data($files)
    {
        if(!empty($files)){
            $cpt =count($files);
            for($i=0; $i<$cpt; $i++) {
                $data['job_request_ordered_fk'] = $this->uri->segment(5);
                $data['dawra'] = $this->input->post('dawra')[$i];
                $data['place'] = $this->input->post('place')[$i];
                $data['date_from'] = $this->input->post('date_from')[$i];
                $data['date_to'] = $this->input->post('date_to')[$i];
                $data['specialized'] = $this->input->post('specialized')[$i];
                if (!empty($files[$i])) {
                    $data['img'] = $files[$i];
                }
                $this->db->insert('hr_dwrat_job_orders', $data);
            }
        }
    }

    /**************************************************************************************/
    public  function get_by_id($table)
    {
        $id=$this->uri->segment(5);
        $this->db->where('job_request_ordered_fk',$id);
        $query=$this->db->get($table);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    public function delete_from_table($id,$table)
    {
        $this->db->where('id',$id);
        $this->db->delete($table);
    }
/*************************************************************************/

 public function update_date($id,$interview_date)
    {

        $data['determine_interview']=1;
        $data['interview_date']=$interview_date;
        $this->db->where('id',$id);
        $this->db->update('job_request_orders',$data);

    }
    //===========================
    public function get_ById($id){
     $this->db->where("id", $id);
        $query=$this->db->get('job_request_orders');

           if ($query->num_rows() > 0) {
               $x=0;
               $data=array();
            foreach($query->result()as $row)
            {
                $data[$x]=$row;
                $data[$x]->job=$this->select_from_hr_forms_settings($row->job_request_id_fk);
                $data[$x]->nationality=$this->select_from_hr_forms_settings($row->nationality_id_fk);
                $data[$x]->social=$this->select_from_hr_forms_settings($row->social_status);
                $data[$x]->work_only=$this->select_from($row->id);


                $x++;
                return $data;

            }
        }else{
            return 0;
        }
    }
    public function select_from_hr_forms_settings($id)
    {
        $this->db->where("id_setting", $id);
        $query = $this->db->get("hr_forms_settings");
        if ($query->num_rows() > 0) {

           return $query->row()->title_setting;
        } else {
            return 0;
        }
    }
public function select_from($id)
{
    $this->db->where("job_request_ordered_fk", $id);
    $this->db->where('date_to>=',date('Y-m-d'));
    $query = $this->db->get("hr_previous_work_job_orders");
    if ($query->num_rows() > 0) {

        return $query->row()->company_name;
    } else {
        return 0;
    }
}
  
  
  	 public function insert_file($id)
    {

        if(!empty($this->input->post('item_degree'))) {
            $this->db->where('job_request_ordered_fk',$id);
            $this->db->delete('hr_interview_degree');
            $count = count($this->input->post('item_degree'));
            for($i=0;$i<$count;$i++)
            {

                $data['job_request_ordered_fk']=$this->chek_Null($id);
                $data['item_id_fk']=$this->chek_Null($this->input->post('item_id_fk')[$i]);
                $data['item_degree']= $this->chek_Null($this->input->post('item_degree')[$i]);
                $data['publisher']=$_SESSION['user_name'];
                $data['date']=date('Y-m-d');
                $data['date_ar']=0;
                $this->db->insert('hr_interview_degree',$data);
            }
            if(!empty($this->input->post('positive'))) {
                $arr1=array('job_request_ordered_fk'=>$id,'type'=>1);
                $this->db->where($arr1);
                $this->db->delete('hr_interview_degree_adv_disadv');
                $count1 = count($this->input->post('positive'));
                for($i=0;$i<$count1;$i++) {
                    $data1['job_request_ordered_fk']=$this->chek_Null($id);
                    $data1['title']=$this->chek_Null($this->input->post('positive')[$i]);
                    $data1['type']=1;
                    $this->db->insert('hr_interview_degree_adv_disadv',$data1);

                }
                }
            if(!empty($this->input->post('negative'))) {
                $arr2=array('job_request_ordered_fk'=>$id,'type'=>2);
                $this->db->where($arr2);
                $this->db->delete('hr_interview_degree_adv_disadv');
                $count2 = count($this->input->post('negative'));
                for($i=0;$i<$count2;$i++) {
                    $data2['job_request_ordered_fk']=$this->chek_Null($id);
                    $data2['title']=$this->chek_Null($this->input->post('negative')[$i]);
                    $data2['type']=2;
                    $this->db->insert('hr_interview_degree_adv_disadv',$data2);

                }
            }
            $data3['do_interview']=1;
            $data3['total_degree']=$this->chek_Null($this->input->post('total'));
            $this->db->where('id',$id);
            $this->db->update('job_request_orders',$data3);

        }
    }
  
   /* public function insert_file($id)
    {
        if(!empty($this->input->post('item_degree'))) {
            $count = count($this->input->post('item_degree'));
            for($i=0;$i<$count;$i++)
            {

                $data['job_request_ordered_fk']=$this->chek_Null($id);
                $data['item_id_fk']=$this->chek_Null($this->input->post('item_id_fk')[$i]);
                $data['item_degree']= $this->chek_Null($this->input->post('item_degree')[$i]);
                $data['publisher']=$_SESSION['user_name'];
                $data['date']=date('Y-m-d');
                $data['date_ar']=0;
                $this->db->insert('hr_interview_degree',$data);
            }
            if(!empty($this->input->post('positive'))) {
                $count1 = count($this->input->post('positive'));
                for($i=0;$i<$count1;$i++) {
                    $data1['job_request_ordered_fk']=$this->chek_Null($id);
                    $data1['title']=$this->chek_Null($this->input->post('positive')[$i]);
                    $data1['type']=1;
                    $this->db->insert('hr_interview_degree_adv_disadv',$data1);

                }
                }
            if(!empty($this->input->post('negative'))) {
                $count2 = count($this->input->post('negative'));
                for($i=0;$i<$count2;$i++) {
                    $data2['job_request_ordered_fk']=$this->chek_Null($id);
                    $data2['title']=$this->chek_Null($this->input->post('negative')[$i]);
                    $data2['type']=2;
                    $this->db->insert('hr_interview_degree_adv_disadv',$data2);

                }
            }
            $data3['do_interview']=1;
            $data3['total_degree']=$this->chek_Null($this->input->post('total'));
            $this->db->where('id',$id);
            $this->db->update('job_request_orders',$data3);

        }
    }
    */
    
public function insert_offer_work($id)
    {
        $data['job_request_ordered_fk'] = $this->chek_Null($this->uri->segment(5));
        $data['salaray'] = $this->chek_Null($this->input->post('salaray'));
        $data['bdl_sakn'] = $this->chek_Null($this->input->post('bdl_sakn'));
        $data['bdl_moslat'] = $this->chek_Null($this->input->post('bdl_moslat'));
        $data['medical_insurance'] =$this->chek_Null($this->input->post('medical_insurance'));
        $data['contract_peroid'] = $this->chek_Null($this->input->post('contract_peroid'));
        $data['contract_type_fk'] = $this->chek_Null($this->input->post('contract_type_fk'));
        $data['demo_days'] = $this->chek_Null($this->input->post('demo_days'));
        $data['yearly_vacation'] = $this->chek_Null($this->input->post('yearly_vacation'));
        $data['other'] = $this->chek_Null($this->input->post('others'));
        $data['notes'] = $this->chek_Null($this->input->post('notes'));
        $data['date'] = date('Y-md');
        $data['date_ar'] = date('Y-md');
        $data['publisher'] = $_SESSION['user_name'];
        $data['suspend'] = 0;
        $data['date_suspend'] = date('Y-md');
        $data['date_suspend_ar'] = date('Y-md');

        if($this->get_num_rows($id)==0) {
            $this->db->insert(' hr_job_orders_offers', $data);
        }else{
            $this->db->where("job_request_ordered_fk", $id);
            $this->db->update('hr_job_orders_offers',$data);
        }


    }

    public function get_from_table($id)
    {
        $this->db->where("job_request_ordered_fk", $id);
        $query = $this->db->get("hr_job_orders_offers");
        if ($query->num_rows() > 0) {

            return $query->row();
        } else {
            return 0;
        }
    }
public function get_num_rows($id)
{
    $this->db->where("job_request_ordered_fk", $id);
    $query = $this->db->get("hr_job_orders_offers");
    return $query->num_rows();
}

/*************************************************************/

 public function get_degrees_from_tables($id)
    {
        $this->db->select('item_degree');
        $this->db->where("job_request_ordered_fk", $id);
        $query = $this->db->get("hr_interview_degree");
        if ($query->num_rows() > 0) {

            $dtata=array();
            $x=0;
            foreach ($query->result() as $row){
                $data[]=$row->item_degree;
                $x++;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function get_points($id,$type)
    {
        $arr=array('job_request_ordered_fk'=>$id,'type'=>$type);
        $this->db->where($arr);
        $query = $this->db->get("hr_interview_degree_adv_disadv");
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
            return false;
        }
    }


    public function delete_rec($id)
    {
        $this->db->where('id',$id);
        $this->db->delete("hr_interview_degree_adv_disadv");
    }

/*****************************************************************/


      public function all_before_interview($table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('id','asc');
        $this->db->where('do_interview',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[] = $key;
            }
            return $data;
        }else{
            return 0;
        }
    }

    public function select_forms_settings_titles($type){
        $this->db->order_by("in_order", "asc");
        $this->db->where("type", $type);
        $query =  $this->db->get("hr_forms_settings");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[$key->id_setting] = $key->title_setting;
            }
            return $data;
        }else{
            return 0;
        }

    }

/***************************/

	
	//==============================job_request_model=============
	  public function get_emp($id)
    {

        $this->db->where_not_in('id',$id);
        return $this->db->get('employees')->result();
    }
/************************************************************/
/*
  public function get_data()
    {
        $data['emp_id_fk']=$this->input->post('emp_id_fk');
        $data['edara_id_fk']=$this->input->post('edara_id_fk');
        $data['qsm_id_fk']=$this->input->post('qsm_id_fk');
        $data['direct_manager_id_fk']=$this->input->post('direct_manager_id_fk');
        $data['vacation_type_id_fk']=$this->input->post('vacation_type_id_fk');
        $data['vacation_from_date']=$this->input->post('vacation_from_date');
        $data['vacation_to_date']=$this->input->post('vacation_to_date');
        $data['num_days']=$this->input->post('num_days');
        $data['date_back']=$this->input->post('date_back');
        $data['adress_since_vacation']=$this->input->post('adress_since_vacation');
        $data['mob_since_vacation']=$this->input->post('mob_since_vacation');
        $data['promise']=$this->input->post('promise');
        $data['emp_badel_id_fk']=$this->input->post('emp_badel_id_fk');
        $data['emp_badel_promise']=$this->input->post('emp_badel_promise');
        $data['emp_badel_promise_date']=date('Y-m-d');
        $data['emp_badel_promise_date_s']=date('Y-m-d');
        $data['direct_manager_opinon']=0;
        $data['direct_manager_opinion_reason']=0;
        $data['emp_badel_promise_date_s']=0;
        return $data;
    }*/
    public function insert_vacation()
    {
        $data=$this->get_data();
        $this->db->insert('hr_vacation_orders',$data);
    }
    public function update_by_id($id)
    {
        $this->db->where('id',$id);
        $data=$this->get_data();
        $this->db->update('hr_vacation_orders',$data);
    }

  
  /*  public function get_all_from_vacation()
    {
        if($_SESSION['emp_code']!=1) {
            $this->db->where('emp_id_fk', $_SESSION['emp_code']);
        }
        //return $this->db->get('hr_vacation_orders')->result();
        $query=$this->db->get('hr_vacation_orders');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
            foreach($query->result() as  $row) {
                $data[$x] = $row;
                $data[$x]->name = $this->holiday($row->vacation_type_id_fk);
                $data[$x]->badl_emp = $this->get_from_all_defined_setting($row->emp_badel_id_fk);

                $x++;
            }
            return $data;
        }else{
            return false;
        }
    }
*/
public function get_data()
    {
        $data['emp_id_fk']=$this->input->post('emp_id_fk');
        $data['edara_id_fk']=$this->input->post('edara_id_fk');
        $data['qsm_id_fk']=$this->input->post('qsm_id_fk');
        $data['direct_manager_id_fk']=$this->input->post('direct_manager_id_fk');
        $data['vacation_type_id_fk']=$this->input->post('vacation_type_id_fk');
        $data['vacation_from_date']=$this->input->post('vacation_from_date');
        $data['vacation_to_date']=$this->input->post('vacation_to_date');
        $data['num_days']=$this->input->post('num_days');
        $data['date_back']=$this->input->post('date_back');
        $data['adress_since_vacation']=$this->input->post('adress_since_vacation');
        $data['mob_since_vacation']=$this->input->post('mob_since_vacation');
        $data['promise']=$this->input->post('promise');
        $data['emp_badel_id_fk']=$this->input->post('emp_badel_id_fk');
        $data['emp_badel_promise']=$this->input->post('emp_badel_promise');
        $data['emp_badel_promise_date']=date('Y-m-d');
        $data['emp_badel_promise_date_s']=date('Y-m-d');
        $data['direct_manager_opinon']=0;
        $data['direct_manager_opinion_reason']=0;
        $data['emp_badel_promise_date_s']=0;

        $data['allDayes']=$this->input->post('allDayes');
        $data['vacation_from_date_hijri']=$this->input->post('vacation_from_date_hijri');
        $data['vacation_to_date_hijri']=$this->input->post('vacation_to_date_hijri');
        $data['max_days']=$this->input->post('max_days');
        $data['min_days']=$this->input->post('min_days');
        $data['date_back_hijri']=$this->input->post('date_back_hijri');
        return $data;
    }

public function get_all_from_vacation()
    {
        $this->db->select('hr_vacation_orders.*, employees.employee');
        if($_SESSION['emp_code']!=1 && $_SESSION['emp_code']!=0) {
            $this->db->where('hr_vacation_orders.emp_id_fk', $_SESSION['emp_code']);
        }
        $this->db->join('employees','employees.id=hr_vacation_orders.emp_id_fk');
        $query=$this->db->get('hr_vacation_orders');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
            foreach($query->result() as  $row) {
                $data[$x] = $row;
                $data[$x]->name = $this->holiday($row->vacation_type_id_fk);
                $data[$x]->badl_emp = $this->get_from_all_defined_setting($row->emp_badel_id_fk);

                $x++;
            }
            return $data;
        }else{
            return false;
        }
    }


    public function get_vacation_by_id($id)
    {

        $this->db->where('id', $id);
        $query= $this->db->get('hr_vacation_orders');
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return 0;
        }
    }
    public function get_holiday()
    {
        return $this->db->get('holiday_setting')->result();
    }
    public function holiday($id)
    {

        $this->db->where('id', $id);
        $query= $this->db->get('holiday_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->name;
        }else{
            return 'اضطراريه';
        }
    }    
    
 /***************************************************************************/
 
 

public function get_all_vacation()
{
 //   $arr=array('suspend'=>4,'back_in_time'=>0);
 $arr=array('suspend'=>4);
    $this->db->where($arr);
    $query=$this->db->get('hr_vacation_orders');
    if($query->num_rows()>0)
    {
        $data=array();
        $x=0;
        foreach ($query->result() as $row){
            $data[$x]=$row;
            $data[$x]->emp=$this->select_depart_with_out_session($row->emp_id_fk)->employee;
          $data[$x]->emp_code=$this->select_depart_with_out_session($row->emp_id_fk)->emp_code;
       //   $data[$x]->badl_emp=$this->select_depart_with_out_session($row->emp_badel_id_fk)->employee;
           $data[$x]->vacation_name=$this->holiday($row->vacation_type_id_fk);
          $data[$x]->management=$this->select_depart_with_out_session($row->emp_id_fk)->administration_name;
          $data[$x]->department=$this->select_depart_with_out_session($row->emp_id_fk)->departments_name;
           $data[$x]->job_name=$this->get_from_all_defined_setting($this->select_depart_with_out_session($row->emp_id_fk)->degree_id);
            $x++;
        }
        return $data;
    }else
    {
        return 0;
    }
}
    public function select_depart_with_out_session($id){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->getName($row->administration);
                $arr[$a]->departments_name = $this->getName($row->department);
                $a++;}
            return $arr[0];
        }else{
            return 0;
        }
    }

    public function  update_start($id,$reason,$num_day)
   {
      $this->db->where('id',$id);
       if($num_day>0){

           $data['reason']=$reason;
           $data['back_in_time']=2;
           $data['delay_num_days']=$num_day;

       }elseif($num_day==0){
           $data['back_in_time']=1;
           $data['reason']=0;
           $data['delay_num_days']=0;
       }
     $this->db->update('hr_vacation_orders',$data);
    }
	 
     
     
     public function get_for_print($id)
{
    $this->db->where('id', $id);
    $query= $this->db->get('hr_vacation_orders');
    $data=array();
    $x=0;
    if($query->num_rows()>0)
    {
        foreach ($query->result() as $row){
           $data[$x]=$row;
            $data[$x]->emp=$this->select_depart_with_out_session($row->emp_id_fk)->employee;
            $data[$x]->emp_code=$this->select_depart_with_out_session($row->emp_id_fk)->emp_code;
            $data[$x]->badl_emp=$this->select_depart_with_out_session($row->emp_badel_id_fk)->employee;
            $data[$x]->vacation_name=$this->holiday($row->vacation_type_id_fk);
            $data[$x]->management=$this->select_depart_with_out_session($row->emp_id_fk)->administration_name;
            $data[$x]->department=$this->select_depart_with_out_session($row->emp_id_fk)->departments_name;
          $data[$x]->job_name=$this->get_from_all_defined_setting($this->select_depart_with_out_session($row->emp_id_fk)->degree_id);
        }
        return $data;

    }else{
        return 0;
    }
}  
/*******************************************************/

public function get_emp2()
{
    return $this->db->query('
                            SELECT c.*, COALESCE(f.allDayes,0) AS allDayes, f.casual_vacation_num, COALESCE(a.vDayes,0) AS vDayes, COALESCE(b.casual,0) AS casual
                            FROM (
                                SELECT *
                                From employees ) c

                             LEFT JOIN
                            (
                                SELECT COALESCE((year_vacation_num + vacation_previous_balance),0) AS allDayes, emp_code, casual_vacation_num
                                From contract_employe
                            ) f
                            on (f.emp_code=c.emp_code)

                             LEFT JOIN
                            (
                                SELECT COUNT(*) AS vDayes, emp_id_fk
                                From hr_vacation_orders
                                WHERE vacation_type_id_fk!=0 AND suspend != 0
                            ) a
                            on (a.emp_id_fk=c.id)

                             LEFT JOIN
                            (
                                SELECT COUNT(*) AS casual, emp_id_fk
                                From hr_vacation_orders
                                WHERE vacation_type_id_fk=0 AND suspend != 0
                            ) b
                            on (b.emp_id_fk=c.id)
                            ')->result();
}
    
    
}// END CLASS