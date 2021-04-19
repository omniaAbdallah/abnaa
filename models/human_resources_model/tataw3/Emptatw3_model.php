<?php
class Emptatw3_model extends CI_Model
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
    public function get_last_rkm()
    {
        $this->db->order_by('rkm_talb', 'desc');
        $this->db->select('rkm_talb');
        $this->db->from('hr_emp_tataw3');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->rkm_talb + 1;
        } else {
            return 1;
        }
    }

    /* public function insert()
     {
     $data['rkm_talb']= $this->input->post('rkm_talab');
     $data['date_talab']= $this->input->post('date_talab');
     $data['edara_id']= $this->input->post('edara_id');
     $data['mokdm_talab']= $this->input->post('mokdm_talab');

     $data['moshrf_name']= $this->input->post('moshrf_name');
     $data['moshrf_jwal']= $this->input->post('moshrf_jwal');
     $data['volunteer_description']= $this->input->post('volunteer_description');
     $data['volunteer_description_id_fk']=$this->input->post('volunteer_description_id_fk');
     $data['magal_tatw3']= $this->input->post('magal_tatw3');
     $data['forsa_name']= $this->input->post('forsa_name');
     $data['wasf']= $this->input->post('wasf');
     $data['makan']= $this->input->post('makan');
     $data['from_date']= $this->input->post('from_date');
     $data['to_date']= $this->input->post('to_date');
     $data['moda']= $this->input->post('moda');
     $data['from_time']= $this->input->post('from_time');
     $data['to_time']= $this->input->post('to_time');

     $data['tataw3_hours']= $this->input->post('tataw3_hours');
     $data['gender']=$this->input->post('gender');
     $data['num_motakdm']= $this->input->post('num_motakdm');
     $data['activities']= $this->input->post('activities');
     $data['shroot']= $this->input->post('shroot');
     $data['outcome']= $this->input->post('outcome');
     $data['date']= date('Y-m-d');
     $data['date_ar']=date('Y-m-d');
     $data['publisher']=$_SESSION['emp_code'];
     ///
     $data['current_to_moder_tatw3_id']=$this->moder_tatow()->person_id;
     $data['current_to_moder_tatw3_name']=$this->moder_tatow()->person_name;
     //
     $this->db->insert('hr_emp_tataw3',$data);
     }*/
    /*  public function insert()
      {
      $data['rkm_talb']= $this->input->post('rkm_talab');
      $data['date_talab']= $this->input->post('date_talab');
      $data['edara_id']= $this->input->post('edara_id');
      $data['mokdm_talab']= $this->input->post('mokdm_talab');

      $data['moshrf_name']= $this->input->post('moshrf_name');
      $data['moshrf_jwal']= $this->input->post('moshrf_jwal');
      $data['volunteer_description']= $this->input->post('volunteer_description');
      $data['volunteer_description_id_fk']=$this->input->post('volunteer_description_id_fk');
      $data['magal_tatw3']= $this->input->post('magal_tatw3');
      $data['forsa_name']= $this->input->post('forsa_name');
      $data['wasf']= $this->input->post('wasf');
      $data['makan']= $this->input->post('makan');
      $data['from_date']= $this->input->post('from_date');
      $data['to_date']= $this->input->post('to_date');
      $data['moda']= $this->input->post('moda');
      $data['from_time']= $this->input->post('from_time');
      $data['to_time']= $this->input->post('to_time');

      $data['tataw3_hours']= $this->input->post('tataw3_hours');
      $data['gender']=$this->input->post('gender');
      $data['num_motakdm']= $this->input->post('num_motakdm');
      $data['activities']= $this->input->post('activities');
      $data['shroot']= $this->input->post('shroot');
      $data['outcome']= $this->input->post('outcome');
      $data['date']= date('Y-m-d');
      $data['date_ar']=date('Y-m-d');
      $data['publisher']=$_SESSION['emp_code'];
      $this->db->insert('hr_emp_tataw3',$data);
      }*/
    /*public function update($id){
      $data['date_talab']= $this->input->post('date_talab');
      $data['edara_id']= $this->input->post('edara_id');
      $data['mokdm_talab']= $this->input->post('mokdm_talab');
      $data['moshrf_name']= $this->input->post('moshrf_name');
      $data['moshrf_jwal']= $this->input->post('moshrf_jwal');
      $data['volunteer_description']= $this->input->post('volunteer_description');
      $data['volunteer_description_id_fk']=$this->input->post('volunteer_description_id_fk');
      $data['magal_tatw3']= $this->input->post('magal_tatw3');
      $data['forsa_name']= $this->input->post('forsa_name');
      $data['wasf']= $this->input->post('wasf');
      $data['makan']= $this->input->post('makan');
      $data['from_date']= $this->input->post('from_date');
      $data['to_date']= $this->input->post('to_date');
      $data['moda']= $this->input->post('moda');
      $data['from_time']= $this->input->post('from_time');
      $data['to_time']= $this->input->post('to_time');
      $data['tataw3_hours']= $this->input->post('tataw3_hours');
      $data['gender']=$this->input->post('gender');
      $data['num_motakdm']= $this->input->post('num_motakdm');
      $data['activities']= $this->input->post('activities');
      $data['shroot']= $this->input->post('shroot');
      $data['outcome']= $this->input->post('outcome');
        $this->db->where('id',$id);
        $this->db->update('hr_emp_tataw3',$data);
    }*/
    public function GetById($id)
    {
        $this->db->select('*');
        $this->db->from('hr_emp_tataw3');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        if (!empty($query)) {
            return $query;
        } else {
            return 0;
        }
    }

    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("hr_emp_tataw3");
    }
    public function get_department()
    {
        $this->db->where('from_id_fk !=', 0);
        $query = $this->db->get('hr_edarat_aqsam');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function select_by()
    {
        $this->db->select('*');
        $this->db->from('hr_edarat_aqsam');
        $this->db->where('from_id_fk', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function get_last()
    {
        $this->db->order_by('id_setting', 'desc');
        $this->db->select('id_setting');
        $this->db->where('type', 9);
        $this->db->from('hr_forms_settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->id_setting;
        } else {
            return 0;
        }
    }
    public function insert_record($valu)
    {
        $data['title_setting'] = $valu;
        $data['type'] = 9;
        $data['have_branch'] = 0;
        $this->db->insert('hr_forms_settings', $data);
    }
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from("hr_emp_tataw3");
        $query = $this->db->get()->result();
        if (!empty($query)) {
            return $query;
        } else {
            return 0;
        }
    }

    public function Get_from_department_jobs($arr)
    {
        $h = $this->db->get_where("hr_edarat_aqsam", $arr);
        if ($h->num_rows() > 0) {
            return $h->row_array()['title'];
        } else {
            return 0;
        }
    }

    public function get_all_emp()
    {
        $this->db->select('*');
        $this->db->where("employee_type", 1);
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 1;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;
        }
        return false;
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

    /* public function get_direct_manager_name_by_emp_id($id)
     {
         $this->db->select('employees.id,employees.manger,manager_table.id,manager_table.employee as manager_name');
         $this->db->from('employees');
         $this->db->where('employees.id', $id);
         $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             return $query->row()->manager_name;
         } else {
             return false;
         }
     }*/
    public function get_all_emp_edara($administration)
    {
        $this->db->select('*');
        $this->db->where("administration", $administration);
        $this->db->where("employee_type", 1);

        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 1;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;
        }
        return false;
    }
    public function get_all_magalat_edara($administration)
    {
        $this->db->select('*');
        $this->db->where("edara_id", $administration);
        $this->db->from('tat_emp_mgalat_setting');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 1;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;
        }
        return false;
    }
    public function get_direct_manager_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id as manger_id,manager_table.employee as manager_name');
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

    public function get_all_emps($id)
    {
        $this->db->select('*');
        $this->db->from("hr_emp_tataw3_details");
        $this->db->where("tataw3_id_fk", $id);
        $this->db->where("seen", 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert()
    {
        $data['rkm_talb'] = $this->input->post('rkm_talab');
        $data['date_talab'] = $this->input->post('date_talab');
        $data['edara_id'] = $this->input->post('edara_id');
        /*24-12-20-om*/

        $data['mokdm_talab'] = $this->input->post('mokdm_talab');
        $data['mokdm_emp_id'] = $this->input->post('mokdm_emp_id');
        $data['moshrf_name'] = $this->input->post('moshrf_name');
        $data['moshrf_jwal'] = $this->input->post('moshrf_jwal');
        $data['mokdm_emp_id'] = $this->input->post('mokdm_emp_id');
        $data['moshrf_emp_id'] = $this->input->post('moshrf_emp_id');
        $data['moshrf_email'] = $this->input->post('moshrf_email');
        $data['moshrf_tele'] = $this->input->post('moshrf_tele');
        $data['moshrf_job'] = $this->input->post('moshrf_job');

        $data['volunteer_description'] = $this->input->post('volunteer_description');
        $data['volunteer_description_id_fk'] = $this->input->post('volunteer_description_id_fk');
        $data['magal_tatw3'] = $this->input->post('magal_tatw3');
        $data['forsa_name'] = $this->input->post('forsa_name');
        $data['wasf'] = $this->input->post('wasf');
        $data['makan'] = $this->input->post('makan');
        $data['from_date'] = $this->input->post('from_date');
        $data['to_date'] = $this->input->post('to_date');
        $data['moda'] = $this->input->post('moda');
        $data['from_time'] = $this->input->post('from_time');
        $data['to_time'] = $this->input->post('to_time');
        $data['tataw3_hours'] = $this->input->post('tataw3_hours');
        $data['gender'] = $this->input->post('gender');
        $data['num_motakdm'] = $this->input->post('num_motakdm');
        $data['activities'] = $this->input->post('activities');
        $data['shroot'] = $this->input->post('shroot');
        $data['outcome'] = $this->input->post('outcome');
        $data['date'] = date('Y-m-d');
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['emp_code'];
        $data['current_to_moder_tatw3_id'] = $this->moder_tatow()->person_id;
        $data['current_to_moder_tatw3_name'] = $this->moder_tatow()->person_name;
        $this->db->insert('hr_emp_tataw3', $data);
    }

    public function update($id)
    {
        $data['date_talab'] = $this->input->post('date_talab');
        $data['edara_id'] = $this->input->post('edara_id');

        /*24-12-20-om*/
        $data['mokdm_talab'] = $this->input->post('mokdm_talab');
        $data['mokdm_emp_id'] = $this->input->post('mokdm_emp_id');
        $data['moshrf_name'] = $this->input->post('moshrf_name');
        $data['moshrf_jwal'] = $this->input->post('moshrf_jwal');
        $data['mokdm_emp_id'] = $this->input->post('mokdm_emp_id');
        $data['moshrf_emp_id'] = $this->input->post('moshrf_emp_id');
        $data['moshrf_email'] = $this->input->post('moshrf_email');
        $data['moshrf_tele'] = $this->input->post('moshrf_tele');
        $data['moshrf_job'] = $this->input->post('moshrf_job');

        /*        $data['mokdm_talab'] = $this->input->post('mokdm_talab');
                $data['moshrf_name'] = $this->input->post('moshrf_name');
                $data['moshrf_jwal'] = $this->input->post('moshrf_jwal');*/
        $data['volunteer_description'] = $this->input->post('volunteer_description');
        $data['volunteer_description_id_fk'] = $this->input->post('volunteer_description_id_fk');
        $data['magal_tatw3'] = $this->input->post('magal_tatw3');
        $data['forsa_name'] = $this->input->post('forsa_name');
        $data['wasf'] = $this->input->post('wasf');
        $data['makan'] = $this->input->post('makan');
        $data['from_date'] = $this->input->post('from_date');
        $data['to_date'] = $this->input->post('to_date');
        $data['moda'] = $this->input->post('moda');
        $data['from_time'] = $this->input->post('from_time');
        $data['to_time'] = $this->input->post('to_time');
        $data['tataw3_hours'] = $this->input->post('tataw3_hours');
        $data['gender'] = $this->input->post('gender');
        $data['num_motakdm'] = $this->input->post('num_motakdm');
        $data['activities'] = $this->input->post('activities');
        $data['shroot'] = $this->input->post('shroot');
        $data['outcome'] = $this->input->post('outcome');
        $this->db->where('id', $id);
        $this->db->update('hr_emp_tataw3', $data);
    }

    public function get_ms2ol_data($emp_id)
    {
        $this->db->select('*');
        $this->db->where("id", $emp_id);
        $this->db->from('employees');
        $query = $this->db->get()->row();
        if (!empty($query)) {
            return $query;
        }
        return false;
    }

    /*  public function get_ms2ol_data($emp_name)
      {
          $this->db->select('*');
          $this->db->where("employee",$emp_name);
          $this->db->from('employees');
          $query = $this->db->get()->row();
          if (!empty($query)) {
              return $query;
          }
          return false;
      }*/
    public function select_depart()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $_SESSION['emp_code']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }

    public function select_depart_edite($id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $id);
        $query = $this->db->get()->row();
        if (!empty($query)) {
            return $query;
        } else {
            return 0;
        }
    }

    //******************/////////////////////******************///////////////////******************
    public function add_setting($type)
    {
        $data['title'] = $this->input->post('value');
        $data['from_code'] = $type;
        $id = $this->input->post('row_id');
        if (!empty($id)) {
            $data_update['title'] = $this->input->post('value');
            $this->db->where('id', $id);
            $this->db->update('tat_settings', $data_update);
        } else {
            $this->db->insert('tat_settings', $data);
        }
    }

    public function get_setting($typee)
    {
        $this->db->where('from_code', $typee);
        $query = $this->db->get('tat_settings');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_setting_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tat_settings');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    public function get_all_setting()
    {
        $query = $this->db->get('tat_settings');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function delete_setting($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tat_settings');
    }

    /*public function moder_tatow()
    {
        $this->db->where('depart_id_fk',197);
        $query = $this->db->get('hr_depart_managers');
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }*/

    public function moder_tatow()
    {
        $this->db->where('job_title_code_fk', 404);
        $query = $this->db->get('hr_egraat_emp_setting');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    public function publish($id)
    {
        $emps = $this->get_all_emp();

        if (isset($emps) && !empty($emps)) {

            foreach ($emps as $row) {
                $dataa['tataw3_id_fk'] = $id;
                $dataa['emp_id'] = $row->id;
                $dataa['emp_code'] = $row->emp_code;
                $dataa['emp_name'] = $row->employee;
                $dataa['close_publish_tataw3'] = 0;
                $this->db->insert('hr_emp_tataw3_details', $dataa);

            }
        }

        $data['publish_tataw3'] = 1;
        $this->db->where('id', $id);
        $this->db->update('hr_emp_tataw3', $data);
    }
////yara
    /*public function publish($id)
    {
        $emps=$this->get_all_emp();

        if(isset($emps)&& !empty($emps))
        {

            foreach($emps as $row)
            {
                $dataa['tataw3_id_fk']=$id;
                $dataa['emp_id']=$row->id;
                $dataa['emp_code']=$row->emp_code;
                $dataa['emp_name']= $row->employee;

                $this->db->insert('hr_emp_tataw3_details',$dataa);

            }
        }

        $data['publish_tataw3']=1;
        $this->db->where('id',$id);
        $this->db->update('hr_emp_tataw3',$data);
    }
    */
    /*public function close($id)
    {

        $data['publish_tataw3']=0;
        $data['close_publish_tataw3']=1;
        $this->db->where('id',$id);
        $this->db->update('hr_emp_tataw3',$data);
    }*/

    public function close($id)
    {

        $data['publish_tataw3'] = 0;
        $data['close_publish_tataw3'] = 1;
        $this->db->where('id', $id)->update('hr_emp_tataw3', $data);
/////////////////////////////////////////////////////////
        $dataa['close_publish_tataw3'] = 1;
        $this->db->where('tataw3_id_fk', $id)->update('hr_emp_tataw3_details', $dataa);
    }

    function get_unseen_tataw3()
    {
        $t3mem = $this->db->select('hr_emp_tataw3.*,hr_emp_tataw3_details.*,COUNT(hr_emp_tataw3.id) as count ')
            ->from("hr_emp_tataw3_details")
            ->join('hr_emp_tataw3', 'hr_emp_tataw3_details.tataw3_id_fk=hr_emp_tataw3.id')
            ->where('hr_emp_tataw3.publish_tataw3', 1)
            ->where('hr_emp_tataw3.close_publish_tataw3', 0)
            ->where('emp_id', $_SESSION['emp_code'])
            ->where('seen', null)
            ->get()->row();

        if (!empty($t3mem)) {
            $query = $t3mem;


            return $query;
        }
    }

    /*public function reply_dawa()
        {
            $id = $this->input->post('id');
            if ($this->input->post('action') == 'refuse') {
                $data['seen'] = 2;
                $data['seen_time'] = date('h:i:s a');
                $data['seen_date'] = date('Y-m-d');
                $this->db->where('emp_id', $_SESSION['emp_code'])
                    ->where('id', $id)
                    ->update('hr_emp_tataw3_details', $data);
            } else if ($this->input->post('action') == 'accept') {
                $data['seen'] = 1;
                $data['seen_time'] = date('h:i:s a');
                $data['seen_date'] = date('Y-m-d');
                $this->db->where('emp_id', $_SESSION['emp_code'])
                    ->where('id', $id)
                    ->update('hr_emp_tataw3_details', $data);
            }
        }
    */
    public function select_all_publish()
    {
        $this->db->select('*');
        $this->db->from("hr_emp_tataw3");
        $this->db->where('publish_tataw3', 1);
        if ($_SESSION['user_id'] == 125) {

        } else {
            $this->db->where('close_publish_tataw3', 0);
        }


        $query = $this->db->get()->result();
        if (!empty($query)) {
            return $query;
        } else {
            return 0;
        }
    }

    /*  public function get_all_emps($id)
      {
          $this->db->select('*');
          $this->db->from("hr_emp_tataw3_details");
          $this->db->where("tataw3_id_fk", $id);
          $query = $this->db->get();
          return $query->result();
      }*/


    public function select_all_talab_moder_tatw3()
    {
        $this->db->select('*');
        $this->db->from("hr_emp_tataw3");
        $this->db->where('current_to_moder_tatw3_id', $_SESSION['emp_code']);
        $this->db->where('publish_tataw3', 0);
        $this->db->where('close_publish_tataw3', 0);
        $query = $this->db->get()->result();
        if (!empty($query)) {
            return $query;
        } else {
            return 0;
        }
    }

    public function update_seen_tatw3()
    {

        $data['moder_tataw3_seen'] = 1;
        $data['moder_tataw3_seen_time'] = date('h:i:s a');
        $data['moder_tataw3_seen_date'] = date('Y-m-d');
        $this->db->where('current_to_moder_tatw3_id', $_SESSION['emp_code'])->update('hr_emp_tataw3', $data);

    }


    function select_all_emp_tatw3()
    {
        $t3mem = $this->db->select('hr_emp_tataw3.*,hr_emp_tataw3_details.* ')
            ->from("hr_emp_tataw3_details")
            ->join('hr_emp_tataw3', 'hr_emp_tataw3_details.tataw3_id_fk=hr_emp_tataw3.id')
            ->where('hr_emp_tataw3.close_publish_tataw3', 0)
            ->where('hr_emp_tataw3_details.current_to_user_id', $_SESSION['user_id'])
            ->where('hr_emp_tataw3_details.current_to_action', 0)
            ->get()->result();
        if (!empty($t3mem)) {
            $query = $t3mem;
            return $query;
        }
    }

    function get_user_id_by_empid($emp_id)
    {
        return $this->db->select('user_id')->where('emp_code', $emp_id)->get('users')->row_array()['user_id'];
    }

    public function reply_dawa()
    {
        $id = $this->input->post('id');
        $direct_manger_data = $this->get_direct_manager_name_by_emp_id($_SESSION['emp_code']);
        if ($this->input->post('action') == 'refuse') {
            $data['seen'] = 2;
            $data['current_to_user_id'] = $this->get_user_id_by_empid($direct_manger_data->manger_id);
            $data['current_to_user_name'] = $direct_manger_data->manager_name;
            $data['seen_time'] = date('h:i:s a');
            $data['seen_date'] = date('Y-m-d');
            $this->db->where('emp_id', $_SESSION['emp_code'])
                ->where('id', $id)
                ->update('hr_emp_tataw3_details', $data);
        } else if ($this->input->post('action') == 'accept') {
            $data['seen'] = 1;
            $data['current_to_user_id'] = $this->get_user_id_by_empid($direct_manger_data->manger_id);
            $data['current_to_user_name'] = $direct_manger_data->manager_name;
            $data['seen_time'] = date('h:i:s a');
            $data['seen_date'] = date('Y-m-d');
            $this->db->where('emp_id', $_SESSION['emp_code'])
                ->where('id', $id)
                ->update('hr_emp_tataw3_details', $data);
        }
    }

    public function make_action()
    {
        $id = $this->input->post('id');
        $data['current_to_action'] = $this->input->post('action');
        $this->db->where('current_to_user_id', $_SESSION['user_id'])->where('id', $id)
            ->update('hr_emp_tataw3_details', $data);
    }

    /*application/models/maham_mowazf_model/basic_data/Basic_data_model.php*/
    /*22-12-20-om*/

    function get_emp_tataw3()
    {
        $t3mem = $this->db->select('hr_emp_tataw3.*,hr_emp_tataw3_details.*')
            ->from("hr_emp_tataw3_details")
            ->join('hr_emp_tataw3', 'hr_emp_tataw3_details.tataw3_id_fk=hr_emp_tataw3.id')
            ->where('hr_emp_tataw3.publish_tataw3', 1)
            ->where('hr_emp_tataw3.close_publish_tataw3', 0)
            ->where('emp_id', $_SESSION['emp_code'])
            ->where('seen', null)
            ->get()->result();
        if (!empty($t3mem)) {
            $query = $t3mem;
            return $query;
        }
    }
}