<?php

class Solaf_requests_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


   /* public function get_emp_data($id)
    {

        $q = $this->db->select('id,emp_code,start_work_date_m')->where('id', $id)->get('employees')->row();

        $q->finance_Data = $this->get_finance_Data($q->id);

        $q->reward_end_work = $this->get_by('contract_employe', array('emp_code' => $q->emp_code),'reward_end_work');
        return $q;

    }*/
    
  /*  public function get_solf_report()
{
    $this->db->select('hr_solaf.qemt_solaf as elagmali,hr_solaf.emp_name,hr_solaf_quest.month,hr_solaf_quest.paid,hr_solaf_quest.id,hr_solaf_quest.value_of_qst');
    $this->db->from('hr_solaf');
   // $this->db->where('hr_solaf.suspend',4 );
    $this->db->join('hr_solaf_quest', 'hr_solaf_quest.t_rkm_fk=hr_solaf.t_rkm', 'left');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return false;
    }
}
*/
public function get_solf_report()
{
    $query=$this->db->get('hr_solaf');
   // $this->db->where('hr_solaf.suspend',0 );
    if($query->num_rows()>0)
    {
        $data=array();
        $x=0;
         foreach($query->result() as $row)
         {

                  $data[$x]=$row;
                  $data[$x]->quest_month= array( );
                  for ($i=1; $i < 13; $i++) {
                    $data[$x]->quest_month[$i]=
                    $this->db->select('t_rkm_fk,month,value_of_qst,paid')->where(array('t_rkm_fk'=> $row->t_rkm,'month'=>$i ))->get('hr_solaf_quest')->row_array();

                  }

              $x++;
          }
          return $data;
      }else{
          return false;
      }


}
    function get_month($date = false)
{
    if (empty($date)) {
        $date = date('Y-m-d');
    }
    $date = '2020-' . date('m', strtotime($date)) . '-' . date('d', strtotime($date));
    return $this->db->where('from_date <=', strtotime($date))->where('to_date >=', strtotime($date))->get('hr_mosayer_months')->row_array()['month'];
}
    public function get_emp_data($id)
{
    $q = $this->db->select('id,emp_code,start_work_date_m')->where('id', $id)->get('employees')->row();
    $q->finance_Data = $this->get_finance_Data($q->emp_code);
    $q->reward_end_work = $this->get_by('contract_employe', array('emp_code' => $q->emp_code),'reward_end_work');
    return $q;
}

public function get_finance_Data($emp_code)
{
    $data = array();
    $data['rateb_asasy'] = $this->get_by('hr_finance_employes',array('emp_code'=>$emp_code,'badl_discount_id_fk'=>9),1);
    $data['get_having_value'] = $this->get_sum_value($emp_code, $this->getBadalat_id(1));
    $data['get_discut_value'] = $this->get_sum_value($emp_code, $this->getBadalat_id(2));
    // $data['tamin_value'] = $this->get_tamin_value($emp_id, $this->getBadalat_id(1));
    return $data;

}

    /*public function get_finance_Data($emp_id)
    {
        $data = array();
                $data['rateb_asasy'] = $this->get_by('emp_badlat_discount_details',array('emp_code'=>$emp_id,'badl_discount_id_fk'=>9),1);
                $data['get_having_value'] = $this->get_sum_value($emp_id, $this->getBadalat_id(1));
                $data['get_discut_value'] = $this->get_sum_value($emp_id, $this->getBadalat_id(2));
                // $data['tamin_value'] = $this->get_tamin_value($emp_id, $this->getBadalat_id(1));
            return $data;

    }*/
    // public function get_tamin_value($emp_code, $ids)
    // {
    //     $this->db->where_in('badl_discount_id_fk', $ids);
    //     $this->db->where('emp_code', $emp_code);
    //     $this->db->where('insurance_affect', 1);
    //     $this->db->select_sum('value');
    //     $result = $this->db->get('emp_badlat_discount_details');
    //     if ($result->num_rows() > 0) {
    //         return $result->row()->value;
    //     } else {
    //         return 0;
    //     }


    // }

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
    public function getBadalat_id($type)
    {
        $query = $this->db->where('type', $type)->get('emp_badlat_discount_settings')->result();
        $data = array();
        $x = 0;
        foreach ($query as $row) {
            $data[] = $row->id;
            $x++;
        }
        return $data;
    }
  /*  public function get_sum_value($emp_code, $ids)
    {
        $this->db->where_in('badl_discount_id_fk', $ids);
        $this->db->where('emp_code', $emp_code);
        $this->db->select_sum('value');
        $result = $this->db->get('emp_badlat_discount_details');
        if ($result->num_rows() > 0) {
            return $result->row()->value;
        } else {
            return 0;
        }


    }*/


public function get_sum_value($emp_code, $ids)
{
    $this->db->where_in('badl_discount_id_fk', $ids);
    $this->db->where('emp_code', $emp_code);
    $this->db->select_sum('value');
    $result = $this->db->get('hr_finance_employes');
    if ($result->num_rows() > 0) {
        return $result->row()->value;
    } else {
        return 0;
    }
}
    public function get_badl($emp_code, $id)
    {
      $this->db->where('emp_code', $emp_code);
      $this->db->where('badl_discount_id_fk', $id);
      return $this->db->get('emp_badlat_discount_details')->row();

    }
    public function get_num_solf($emp_id_fk)
    {
      $this->db->where('emp_id_fk', $emp_id_fk)->where('suspend', 4)->order_by('t_rkm','DESC');
      return $this->db->get('hr_solaf')->result();

    }
    public function get_by($table, $where_arr = false, $select = false,$order_by=false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        if (!empty($order_by)) {
            $this->db->order_by($order_by,'ASC');
        }
        $query = $this->db->get($table);
        // return $query;
        if ($query->num_rows() > 0) {
            if (!empty($select) && $select != 1) {
                return $query->row()->$select;
            } else {
                if ($select == 1) {
                    return $query->row();
                } else {
                    return $query->result();
                }
            }
        } else {
            return false;
        }
    }
 public function get_had_solfa($emp_id_fk)
 {
         $all_batlat=0;
         $solaf_main_setting = $this->get_by('hr_solaf_main_setting', '', 1);
         if(!empty($solaf_main_setting)){
         $bnod = array('rateb_asasy'=>9,  'bdl_sakn'=>11 ,  'bdl_mowaslat'=>12 ,  'bdl_jwal'=>15
         ,  'rateb_mokto3'=>10 ,  'bdl_ma3esha' => 16,  'bdl_amal' =>13 ,  'bdl_taklef' =>14 );


         foreach ($solaf_main_setting as $key => $value) {
             if (array_key_exists ($key, $bnod)) {
                 $key_input = $bnod[$key];

                 if ($value == 1) {
                   $batel_value=$this->get_by('emp_badlat_discount_details',array('emp_code'=>$emp_id_fk,'badl_discount_id_fk'=>$key_input),1);
                   if(!empty($batel_value)){
                   $all_batlat+=$batel_value->value;
                 }
                 }
             }

         }

              $hat_solfa=($all_batlat * ($solaf_main_setting->had_adna /100))/($solaf_main_setting->aqsa_moda_sadad);
              return (float)number_format($hat_solfa, 3, '.', '');
              }else {
                return 0;
              }
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

    public function get_all_emp()
    {

        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
                $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
                $q[$key]->job_title = $this->get_job_title($row->degree_id);
            }
            return $q;
        }
    }

    public function get_edara_name_or_qsm($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return false;
        }
    }

    public function get_job_title($id)
    {

        $this->db->where('defined_id', $id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        } else {
            return false;
        }
    }
/*	public function insert_solfa()
    {
        $data = $this->get_data();
        
        $khsm_form_date_m=  $data['khsm_form_date_m'];
        $month=date("F",strtotime($khsm_form_date_m));
        $year=date("Y",strtotime($khsm_form_date_m));
        $khsm_form_date_m2=strtotime($khsm_form_date_m);
        
        
        $this->db->insert('hr_solaf', $data);
        $insert_id = $this->db->insert_id();
        $this->insert_history($data,$insert_id);
        if(   $this->input->post('qst_num')>0)
        {
            $x= $this->input->post('qst_num');
            $qust_value=( $this->input->post('qemt_solaf')/ $this->input->post('qst_num'));
            $qust_remain=(($qust_value-round($qust_value))*$x);
            for($i=0;$i<$x;$i++)
            {

                $dataw['t_rkm_fk'] = $this->input->post('t_rkm');
                $dataw['emp_code_fk'] = $this->input->post('emp_code_fk');
  $dataw['qst_date']=  date("Y-m-d", strtotime("+".$i." month", $khsm_form_date_m2));
$dataw['qst_date_ar']=strtotime(date("Y-m-d", strtotime("+".$i." month", $khsm_form_date_m2)));
$dataw['paid']='no';
$dataw['month'] =date("m",$dataw['qst_date_ar']);
$dataw['year'] = date("Y",$dataw['qst_date_ar']);
                
                
                
                if ($i == ($x-1)) {
                    $dataw['value_of_qst'] = (round($qust_value)+$qust_remain);
                }else {
                    $dataw['value_of_qst'] = round($qust_value);

                }
                $this->db->insert('hr_solaf_quest', $dataw);
            }

        }
    }
*/


public function insert_solfa()
{
    $data = $this->get_data();

    $khsm_form_date_m = $data['khsm_form_date_m'];
    $month = $this->get_month($khsm_form_date_m);/*18-8-20-om*/
    $year = date("Y", strtotime($khsm_form_date_m));
    $khsm_form_date_m2 = strtotime($khsm_form_date_m);


    $this->db->insert('hr_solaf', $data);
    $insert_id = $this->db->insert_id();
    $this->insert_history($data, $insert_id);
    if ($this->input->post('qst_num') > 0) {
        $x = $this->input->post('qst_num');
        $qust_value = ($this->input->post('qemt_solaf') / $this->input->post('qst_num'));
        $qust_remain = (($qust_value - round($qust_value)) * $x);
        for ($i = 0; $i < $x; $i++) {

            $dataw['t_rkm_fk'] = $this->input->post('t_rkm');
            $dataw['emp_code_fk'] = $this->input->post('emp_code_fk');
            $dataw['qst_date_ar'] = date("Y-m-d", strtotime("+" . $i . " month", $khsm_form_date_m2));/*18-8-20-om*/
            $dataw['qst_date'] = strtotime(date("Y-m-d", strtotime("+" . $i . " month", $khsm_form_date_m2)));/*18-8-20-om*/
            $dataw['paid'] = 'no';
            $dataw['month'] = $this->get_month( $dataw['qst_date_ar']);/*18-8-20-om*/
            $dataw['year'] = date("Y", $dataw['qst_date']);

            if ($i == ($x - 1)) {
                $dataw['value_of_qst'] = (round($qust_value) + $qust_remain);
            } else {
                $dataw['value_of_qst'] = round($qust_value);

            }
            $this->db->insert('hr_solaf_quest', $dataw);
        }

    }
}
public function insert_history($data,$insert_id)
{
    $insert['solaf_rkm_fk'] = $data['t_rkm'];
    $insert['solaf_id_fk'] = $insert_id;
    $insert['from_user'] = $data['current_from_user_id'];
    $insert['from_user_n'] = $data['current_from_user_name'];
    if (isset($data['current_to_user_id'])&&(!empty($data['current_to_user_id']))) {
        $insert['to_user'] = $data['current_to_user_id'];
        $insert['to_user_n'] =  $data['current_to_user_name'];
        }


    $insert['talab_in_fk'] = $data['talab_in_fk'];
    $insert['talab_in_title'] = $data['talab_in_title'];
    $insert['level'] = $data['level'];
    // $insert['talab_msg'] = $data['talab_msg'];

    // $insert['reason_action'] = $data['reason_action'];
    $insert['date'] = strtotime(date('Y-m-d'));
    $insert['date_ar'] = date('Y-m-d');

    $this->db->insert("hr_all_solf_history", $insert);
  }

    /*public function update_by_id($id)
    {
        $data = $this->get_data();
        $this->db->where('id', $id)->update('hr_solaf', $data);
        if(   $this->input->post('qst_num')>0)
        {
            $x= $this->input->post('qst_num');
            $this->db->where('t_rkm_fk', $this->input->post('t_rkm'))->delete('hr_solaf_quest');
            $qust_value=( $this->input->post('qemt_solaf')/ $this->input->post('qst_num'));
            $qust_remain=(($qust_value-round($qust_value))*$x);
            for($i=0;$i<$x;$i++)
            {

                $dataw['t_rkm_fk'] = $this->input->post('t_rkm');
                $dataw['emp_code_fk'] = $this->input->post('emp_code_fk');
                if ($i == ($x-1)) {
                    $dataw['value_of_qst'] = (round($qust_value)+$qust_remain);
                }else {
                    $dataw['value_of_qst'] = round($qust_value);

                }
                $this->db->insert('hr_solaf_quest', $dataw);
            }

        }
    }*/
    
    
    public function update_by_id($id)
{
    $data = $this->get_data();
    $this->db->where('id', $id)->update('hr_solaf', $data);
    $khsm_form_date_m = $data['khsm_form_date_m'];
    $khsm_form_date_m2 = strtotime($khsm_form_date_m);
    if ($this->input->post('qst_num') > 0) {
        $x = $this->input->post('qst_num');
        $this->db->where('t_rkm_fk', $this->input->post('t_rkm'))->delete('hr_solaf_quest');
        $qust_value = ($this->input->post('qemt_solaf') / $this->input->post('qst_num'));
        $qust_remain = (($qust_value - round($qust_value)) * $x);
        for ($i = 0; $i < $x; $i++) {

            $dataw['t_rkm_fk'] = $this->input->post('t_rkm');
            $dataw['emp_code_fk'] = $this->input->post('emp_code_fk');
            $dataw['qst_date_ar'] = date("Y-m-d", strtotime("+" . $i . " month", $khsm_form_date_m2));
            $dataw['qst_date'] = strtotime(date("Y-m-d", strtotime("+" . $i . " month", $khsm_form_date_m2)));
            $dataw['paid'] = 'no';
            $dataw['month'] = $this->get_month($dataw['qst_date_ar']);
            $dataw['year'] = date("Y", $dataw['qst_date']);


            if ($i == ($x - 1)) {
                $dataw['value_of_qst'] = (round($qust_value) + $qust_remain);
            } else {
                $dataw['value_of_qst'] = round($qust_value);

            }
            $this->db->insert('hr_solaf_quest', $dataw);
        }

    }

}
	  public function select_depart($id = false)
    {
        $this->db->select('*');
        $this->db->from('employees');
        if (!empty($id)) {
            $this->db->where("id", $id);
        } else {
            $this->db->where("id", $_SESSION['emp_code']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->get_edara_name_or_qsm($row->administration);
                $arr[$a]->departments_name = $this->get_edara_name_or_qsm($row->department);
                $arr[$a]->job_title = $this->get_job_title($row->degree_id);
                $arr[$a]->manger_name = $this->get_direct_manager_name_by_emp_id($row->id)->manager_name;

                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }
	public function get_last_rkm()
{
    $this->db->select('t_rkm');
    $this->db->order_by('id','desc');
    $query=$this->db->get('hr_solaf');
    if($query->num_rows()>0)
    {
        return $query->row()->t_rkm + 1;
    }else{
        return 1;
    }

}

    public function select_all_defined($type)
    {
        $this->db->select('*');
        $this->db->from('all_defined_setting');
        $this->db->where("defined_type", $type);
        $this->db->order_by('in_order', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
	  public function get_emp($id)
    {

        $this->db->where_not_in('id', $id);
        return $this->db->get('employees')->result();
    }
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
                                From hr_all_agzat_orders
                                WHERE no3_agaza!=0 AND suspend != 0
                            ) a
                            on (a.emp_id_fk=c.id)

                             LEFT JOIN
                            (
                                SELECT COUNT(*) AS casual, emp_id_fk
                                From hr_all_agzat_orders
                                WHERE no3_agaza=0 AND suspend != 0
                            ) b
                            on (b.emp_id_fk=c.id)
                            ')->result();
    }
 public function get_all_solfa()
    {

        $query= $this->db->get(' hr_solaf');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }
	public function GetReplacementEmployee($id)
    {
        $this->db->where_not_in('id', $id);
        $this->db->order_by('emp_code', 'ASC');
        return $this->db->get('employees')->result();
    }
	 public function delete_from_table($id, $table)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }
    public function delete_from_table_solaf($id, $table)
    {
        $this->db->where('t_rkm_fk', $id);
        $this->db->delete($table);
    }

    // omnia
	public function get_data()
    {

        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['emp_code_fk'] = $this->input->post('emp_code_fk');
        $data['emp_name'] = $this->input->post('emp_name');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['edara_n'] = $this->input->post('edara_n');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['qsm_n'] = $this->input->post('qsm_n');
        $data['job_title'] = $this->input->post('job_title');
        $data['t_rkm'] = $this->input->post('t_rkm');
        //$data['t_rkm_date_h'] = $this->input->post('t_rkm_date_h');
     $data['t_rkm_date_m'] = $this->input->post('t_rkm_date_m');


        $data['qemt_solaf'] = $this->input->post('qemt_solaf');
        $data['qemt_qst'] = round($this->input->post('qemt_qst'));
        $data['sadad_solfa'] = $this->input->post('sadad_solfa');
        $data['qst_num'] = $this->input->post('qst_num');

        $data['khsm_form_date_m'] = $this->input->post('khsm_form_date_m');
        $data['khsm_to_date_m'] = $this->input->post('khsm_to_date_m');
        $data['hd_solfa'] = $this->input->post('hd_solfa');
       $data['previous_request_date_m'] = $this->input->post('previous_request_date_m');
       // $data['previous_request_date_h'] = $this->input->post('previous_request_date_h');
        $data['solaf_reason'] = $this->input->post('solaf_reason');
        $data['num_previous_requests'] = $this->input->post('num_previous_requests');
        $data['direct_manager_id_fk'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manger;
        $data['direct_manager_code_fk'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manager_code;
        $data['direct_manager_n'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manager_name;



            $data['current_from_user_name'] = $this->input->post('emp_name');
            $data['current_from_user_id'] = $this->get_user_id($data['emp_id_fk']);

            // $data['current_to_user_name'] = $data['direct_manager_n'];
            // $data['current_to_user_id'] = $this->get_user_id($data['direct_manager_id_fk']);


            $data['level'] = 0;
            $data['talab_in_fk'] = $this->get_transformation_setting($data['level'])->id;
            $data['talab_in_title'] = $this->get_transformation_setting($data['level'])->title;



        return $data;
    }


    public function make_transformation_direct($solf_id)
    {
        $solf_data=$this->get_solfa_by_id($solf_id);
        if(!empty($solf_data)){
            $data['current_to_user_name'] = $solf_data->direct_manager_n;
            $data['current_to_user_id'] = $this->get_user_id($solf_data->direct_manager_id_fk);
            $data['level'] = 1;
            $data['talab_in_fk'] = $this->get_transformation_setting($data['level'])->id;
            $data['talab_in_title'] = $this->get_transformation_setting($data['level'])->title;
            $this->db->where('id', $solf_id)->update('hr_solaf', $data);

            $solfa_data_array=$this->db->where('id', $solf_id)->get('hr_solaf')->row_array();
            $this->insert_history($solfa_data_array,$solf_id);
         return 1;
        }
        return 0;

    }
    // omnia
    public function get_transformation_setting($level)
    {

        $q = $this->db->where('level', $level)->where('tbl', 'solfa')->get('hr_all_transformation_setting')->row();

        if (!empty($q)) {
            return $q;
        }
    }

    public function get_user_id($emp_code)
    {

        $q = $this->db->where('emp_code', $emp_code)->get('users')->row();

        if (!empty($q)) {
            return $q->user_id;
        }
    }
    public function get_direct_manager_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id,
        manager_table.employee as manager_name,manager_table.emp_code as manager_code');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

	 public function get_solfa_by_id($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get('hr_solaf');
        if ($query->num_rows() > 0) {
            $query = $query->row();
            $query->emp_name = $this->select_depart_with_out_session($query->emp_id_fk)->employee;

            return $query;
        } else {
            return 0;
        }
    }
	public function select_depart_with_out_session($id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->getName($row->administration);
                $arr[$a]->departments_name = $this->getName($row->department);
                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }
	  public function getName($id)
    {
        $this->db->select('id,name');
        $this->db->from('department_jobs');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->name;
        } else {
            return 0;
        }

    }

    //new
    public function get_by_t_rkm($t_rkm)
    {
        $this->db->where('t_rkm',$t_rkm);
        $query=$this->db->get('hr_solaf');
        if($query->num_rows()>0)
        {


            return $query->result();
        }else{
            return false;
        }
    }
    ///yara
    public function get_had_aqsa_qst()
    {
      $solaf_main_setting = $this->get_by('hr_solaf_main_setting', '', 1);
      if (!empty($solaf_main_setting)) {
        return $solaf_main_setting->aqsa_moda_sadad;
      }else {
        return 0;
      }

    }
    public function get_solf_suspend($emp_id)
    {
        $query= $this->db->where_not_in('suspend',array(5,2))->where('khsm_to_date_m>=',date("Y-m-d"))->where('emp_id_fk',$emp_id)->get('hr_solaf');
        if($query->num_rows()>0)
        {
            return 1;
        }else{
            return 0;
        }
    }



    public function update_solaf_notification()
    {
        $data['seen'] = 1;
        $this->db->where('current_to_user_id', $_SESSION['user_id'])->update('hr_solaf', $data);
        $this->db->where('to_user', $_SESSION['user_id'])->update('hr_all_solf_history', $data);

    }

    public function check_solaf_notifications($where_conn)
    {
        $this->db->select('t_rkm,current_from_user_name');
        if (!empty($where_conn)) {
            $this->db->where($where_conn);
        }
        return $this->db->where('seen', 0)->get('hr_solaf')->result();
    }

public function get_had_solfa_new($emp_id="")
{

    if ($_SESSION['role_id_fk']!=1) {
        $aqsa_moda_sadad=$this->db->where(array('id'=>1))->get('hr_solaf_main_setting')->row()->aqsa_moda_sadad;
        $had_adna=$this->db->where(array('id'=>1))->get('hr_solaf_main_setting')->row()->had_adna;
        $ratab_asasy=$this->db->select_sum('value')->where(array('emp_code'=>$_SESSION['emp_code'],'badl_code'=>100))->get('hr_finance_employes')->row()->value;
        $badl_sakn=$this->db->select_sum('value')->where(array('emp_code'=>$_SESSION['emp_code'],'badl_code'=>101))->get('hr_finance_employes')->row()->value;
        $badl_moaslat=$this->db->select_sum('value')->where(array('emp_code'=>$_SESSION['emp_code'],'badl_code'=>102))->get('hr_finance_employes')->row()->value;
        $tabyat_amal=$this->db->select_sum('value')->where(array('emp_code'=>$_SESSION['emp_code'],'badl_code'=>103))->get('hr_finance_employes')->row()->value;
        $taklef=$this->db->select_sum('value')->where(array('emp_code'=>$_SESSION['emp_code'],'badl_code'=>104))->get('hr_finance_employes')->row()->value;
        $eaana=$this->db->select_sum('value')->where(array('emp_code'=>$_SESSION['emp_code'],'badl_code'=>105))->get('hr_finance_employes')->row()->value;
        $etsal=$this->db->select_sum('value')->where(array('emp_code'=>$_SESSION['emp_code'],'badl_code'=>106))->get('hr_finance_employes')->row()->value;
        $sum_ofbadlat=(($ratab_asasy + $badl_sakn + $badl_moaslat + $tabyat_amal + $taklef + $eaana+ $etsal)*($aqsa_moda_sadad/100))*($had_adna);
        return $sum_ofbadlat;
    }else{
        $aqsa_moda_sadad=$this->db->where(array('id'=>1))->get('hr_solaf_main_setting')->row()->aqsa_moda_sadad;
        $had_adna=$this->db->where(array('id'=>1))->get('hr_solaf_main_setting')->row()->had_adna;

        $ratab_asasy=$this->db->select_sum('value')->where(array('emp_id'=>$emp_id,'badl_code'=>100))->get('hr_finance_employes')->row()->value;
        $badl_sakn=$this->db->select_sum('value')->where(array('emp_id'=>$emp_id,'badl_code'=>101))->get('hr_finance_employes')->row()->value;
        $badl_moaslat=$this->db->select_sum('value')->where(array('emp_id'=>$emp_id,'badl_code'=>102))->get('hr_finance_employes')->row()->value;
        $tabyat_amal=$this->db->select_sum('value')->where(array('emp_id'=>$emp_id,'badl_code'=>103))->get('hr_finance_employes')->row()->value;
        $taklef=$this->db->select_sum('value')->where(array('emp_id'=>$emp_id,'badl_code'=>104))->get('hr_finance_employes')->row()->value;
        $eaana=$this->db->select_sum('value')->where(array('emp_id'=>$emp_id,'badl_code'=>105))->get('hr_finance_employes')->row()->value;
        $etsal=$this->db->select_sum('value')->where(array('emp_id'=>$emp_id,'badl_code'=>106))->get('hr_finance_employes')->row()->value;
        $sum_ofbadlat=(($ratab_asasy + $badl_sakn + $badl_moaslat + $tabyat_amal + $taklef + $eaana+ $etsal)*($aqsa_moda_sadad/100))*($had_adna);
        return $sum_ofbadlat;


    }

}
/******************************************/
public function convert_number($number)
{

    if (($number < 0) || ($number > 999999999999))
    {
        throw new Exception("العدد خارج النطاق");
    }
    $return="";
    //convert number into array of (string) number each case
    // -------number: 121210002876-----------//
    //  0   1   2   3  //
    //'121'   '210'   '002'   '876'
    $english_format_number = number_format($number);
    $array_number=explode(',', $english_format_number);
    //convert each number(hundred) to arabic
    for($i=0; $i<count($array_number); $i++){
        $place=count($array_number) - $i;
        $return .= $this->convert($array_number[$i], $place);
        if(isset($array_number[($i + 1)]) && $array_number[($i + 1)]>0)  $return .= ' و';
    }
    return $return;
}
  private function convert($number, $place){
    // take in charge the sex of NUMBERED
    $sex='female';
    //the number word in arabic for masculine and feminine
    $words = array(
        'male'=>array(
            '0'=> '' ,'1'=> 'واحد' ,'2'=> 'اثنان' ,'3' => 'ثلاثة','4' => 'أربعة','5' => 'خمسة',
            '6' => 'ستة','7' => 'سبعة','8' => 'ثمانية','9' => 'تسعة','10' => 'عشرة',
            '11' => 'أحد عشر','12' => 'إثني عشر','13' => 'ثلاثة عشر','14' => 'أربعة عشر','15' => 'خمسة عشر',
            '16' => 'ستة عشر','17' => 'سبعة عشر','18' => 'ثمانية عشر','19' => 'تسعة عشر','20' => 'عشرون',
            '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
            '80' => 'ثمانون','90' => 'تسعون', '100'=>'مائة', '200'=>'مائتان', '300'=>'ثلاثمائة', '400'=>'أربعمائة',
             '500'=>'خمسمائة',
            '600'=>'ستمائة', '700'=>'سبعمائة', '800'=>'ثمانمائة', '900'=>'تسعمائة'
        ),
        'female'=>array(
            '0'=> '' ,'1'=> 'واحد' ,'2'=> 'اثنتان' ,'3' => 'ثلاثة','4' => 'أربعة','5' => 'خمسة',
            '6' => 'ستة','7' => 'سبعة','8' => 'ثمانية','9' => 'تسعة','10' => 'عشرة',
            '11' => 'إحدى عشرة','12' => 'إثني عشر','13' => 'ثلاث عشرة','14' => 'أربع عشرة','15' => 'خمسة عشر',
            '16' => 'ستة عشرة','17' => 'سبعة عشرة','18' => 'ثمانية عشرة','19' => 'تسعة عشرة','20' => 'عشرون',
            '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
            '80' => 'ثمانون','90' => 'تسعون', '100'=>'مائة', '200'=>'مائتان', '300'=>'ثلاثمائة', '400'=>'أربعمائة',
             '500'=>'خمسمائة',
            '600'=>'ستمائة', '700'=>'سبعمائة', '800'=>'ثمانمائة', '900'=>'تسعمائة'
        )
    );
    //take in charge the different way of writing the thousands and millions ...
    $mil = array(
        '2'=>array('1'=>'ألف', '2'=>'ألفان', '3'=>'آلاف'),
        '3'=>array('1'=>'مليون', '2'=>'مليونان', '3'=>'ملايين'),
        '4'=>array('1'=>'مليار', '2'=>'ملياران', '3'=>'مليارات')
    );

    $mf = array('1'=>$sex, '2'=>'male', '3'=>'male', '4'=>'male');
    $number_length = strlen((string)$number);
    if($number == 0) return '';
    /*
    else if($number[0]==0){
        if($number[1]==0) $number=(int)substr($number, -1);
        else $number=(int)substr($number, -2);
    }*/
       else if ($number[0] == 0) {
        if ($number[1] == 0) {
            $number = (int)substr($number, -1);
            $number = (string)$number;
            $number_length = strlen((string)$number);

        } else {
            $number = (int)substr($number, -2);
            $number = (string)$number;
            $number_length = strlen((string)$number);
        }
    }

    switch($number_length){
        case '1': {
            switch($place){
                case '1':{
                    $return = $words[$mf[$place]][$number];
                }
                    break;
                case '2':{

                    if($number==1) $return = 'ألف';
                    else if($number==2) $return = 'ألفان';
                    else{
                        $return = $words[$mf[$place]][$number]. ' آلاف';
                    }
                }
                    break;
                case '3':{
                    if($number==1) $return = 'مليون';
                    else if($number==2) $return = 'مليونان';
                    else $return = $words[$mf[$place]][$number]. ' ملايين';
                }
                    break;
                case '4':{
                    if($number==1) $return = 'مليار';
                    else if($number==2) $return = 'ملياران';
                    else $return = $words[$mf[$place]][$number]. ' مليارات';
                }
                    break;
            }
        }
            break;
        case '2': {
            if(isset($words[$mf[$place]][$number])) $return = $words[$mf[$place]][$number];
            else{
                $twoy=$number[0] * 10;
                $ony=$number[1];
                $return = $words[$mf[$place]][$ony].' و'.$words[$mf[$place]][$twoy];
            }
            switch($place){
                case '2':{
                    $return .= ' ألف';
                }
                    break;
                case '3':{
                    $return .= ' مليون';
                }
                    break;
                case '4':{
                    $return .= ' مليار';
                }
                    break;
            }
        }
            break;
        case '3':{
            if(isset($words[$mf[$place]][$number])){
                $return = $words[$mf[$place]][$number];
                if($number == 200) $return = 'مائتان';
                switch($place){
                    case '2':{
                        $return .= ' ألف';
                    }
                        break;
                    case '3':{
                        $return .= ' مليون';
                    }
                        break;
                    case '4':{
                        $return .= ' مليار';
                    }
                        break;
                }
                return $return;
            }
            else{
                $threey=$number[0] * 100;
                if(isset($words[$mf[$place]][$threey])){
                    $return = $words[$mf[$place]][$threey];
                }
                $twoyony=$number[1] * 10 + $number[2];
                if($twoyony==2){
                    switch($place){
                        case '1': $twoyony=$words[$mf[$place]]['2']; break;
                        case '2': $twoyony='ألفان'; break;
                        case '3': $twoyony='مليونان'; break;
                        case '4': $twoyony='ملياران'; break;
                    }
                    if($threey!=0){
                        $twoyony='و'.$twoyony;
                    }
                    $return = $return.' '.$twoyony;
                }
                else if($twoyony==1){
                    switch($place){
                        case '1': $twoyony=$words[$mf[$place]]['1']; break;
                        case '2': $twoyony='ألف'; break;
                        case '3': $twoyony='مليون'; break;
                        case '4': $twoyony='مليار'; break;
                    }
                    if($threey!=0){
                        $twoyony='و'.$twoyony;
                    }
                    $return = $return.' '.$twoyony;
                }

                else{
                    if(isset($words[$mf[$place]][$twoyony])) $twoyony = $words[$mf[$place]][$twoyony];
                    else{
                        $twoy=$number[1] * 10;
                        $ony=$number[2];
                        $twoyony = $words[$mf[$place]][$ony].' و'.$words[$mf[$place]][$twoy];
                    }
                    if($twoyony!='' && $threey!=0) $return= $return.' و'.$twoyony;
                    switch($place){
                        case '2':{
                            $return .= ' ألف';
                        }
                            break;
                        case '3':{
                            $return .= ' مليون';
                        }
                            break;
                        case '4':{
                            $return .= ' مليار';
                        }
                            break;
                    }
                }
            }
        }
            break;
    }
    return $return;
}





//===========================================================================
public function get_solfa_report($t_rkm){
    $this->db->select('hr_solaf.*,employees.nationality,employees.card_num,employees.dest_card ,
                          employees_settings.title_setting as gensia
                           ');
    $this->db->from("hr_solaf");

   $this->db->join('employees', 'employees.emp_code = hr_solaf.emp_code_fk',"left");
    $this->db->join('employees_settings', 'employees_settings.id_setting = employees.nationality',"left");
      $this->db->where('t_rkm',$t_rkm);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data= $row;
             $data->arabic_qemt_solaf=$this->convert_number($row->qemt_solaf);
            $i++;

        }
        return $data;

    }
    return false;
}



/*
public function get_solfa_report($t_rkm)
{
    $this->db->where('t_rkm',$t_rkm);
    $query=$this->db->get('hr_solaf');
    if($query->num_rows()>0)
    {
        $data=array();
        $x=0;
         foreach($query->result() as $row)
         {
                  $data[$x]=$row;
                  $data[$x]->arabic_qemt_solaf=$this->convert_number(($query->row()->qemt_solaf) );

              $x++;
          }
          return $data;
      }else{
          return false;
      }

}
*/



}// END CLASS
