<?php

class Ezn_order_model extends CI_Model
{


    public function check_ezn($emp_id)
    {
        $q = $this->db->where('emp_id_fk', $emp_id)->order_by('ezn_rkm', 'DESC')
            ->get('hr_all_ozonat_orders')->first_row();
        if (!empty($q)) {
            if (in_array($q->suspend, array(2, 5))) {
                return 1;
            } elseif (in_array($q->suspend, array(1, 0))) {
                return 0;
            } elseif ($q->suspend == 4) {
                return $q;
            }
        } else {
            return 1;

        }
    }

    public function get_all_ozenat($emp_id)
    {
        $q = $this->db->select('*,COUNT(no3_ezn) as type_ezn, SUM(total_hours) as total')
            ->where('ezn_date <', strtotime(date('Y-m-d')))->where('suspend', 4)->where('emp_id_fk', $emp_id)->group_by('no3_ezn')
            ->get('hr_all_ozonat_orders')->result();
        return $q;
    }


    public function get_all_emp($id)
    {
        $this->db->where_not_in('id', $id);
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

    //yara
    public function get_emp_profile($id)
    {
        $this->db->where('id', $id);
        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
                $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
                $q[$key]->job_title = $this->get_job_title($row->degree_id);
            }
            return $q[0];
        }
    }

    public function get_emp_name($id)
    {

        $h = $this->db->get_where("employees", array('id' => $id));
        $arr = $h->row_array();
        if (!empty($arr))
            return $arr['employee'];
        else
            return '';

    }

    public function get_ezn_rkm()
    {
        $this->db->select_max('ezn_rkm');
        $query = $this->db->get('hr_all_ozonat_orders');
        if ($query->num_rows() > 0) {
            return $query->row()->ezn_rkm;
        } else {
            return 0;
        }
    }

    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        if (!empty($arr))
            return $arr[$select];
        else
            return '';

    }


    public function add_ezn()
    {
        $this->load->model('human_resources_model/Public_employee_main_data');

        $data['ezn_rkm'] = $this->get_ezn_rkm() + 1;
        $data['ezn_date'] = strtotime($this->input->post('ezn_date'));
        $data['ezn_date_ar'] = $this->input->post('ezn_date');
        $data['no3_ezn'] = $this->input->post('no3_ezn');
        $data['fatra_fk'] = $this->input->post('fatra_fk');
        if ($this->input->post('fatra_fk') == 1) {
            $data['fatra_n'] = 'فترة';
        } elseif ($this->input->post('fatra_fk') == 2) {
            $data['fatra_n'] = 'فترتين';
        }
        $data['from_hour'] = $this->input->post('from_hour');
        $data['to_hour'] = $this->input->post('to_hour');
        //  $data['total_hours'] = $this->input->post('total_hours');


        $to_time = strtotime($data['from_hour']);
        $from_time = strtotime($data['to_hour']);
        $data['total_hours'] = round(abs($to_time - $from_time) / 60, 2);

        $data['reason'] = $this->input->post('reason');
        if (isset($_SESSION) && $_SESSION['role_id_fk'] == 1) {
            $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        } elseif (isset($_SESSION) && $_SESSION['role_id_fk'] == 3) {
            $data['emp_id_fk'] = $_SESSION['emp_code'];

        }

        $data['emp_code_fk'] = $this->get_id('employees', 'id', $data['emp_id_fk'], 'emp_code');
        // $data['edara_id_fk']= $this->Public_employee_main_data->get_edara_id_by_emp_id($data['emp_id_fk']);
        // $data['edara_n']= $this->Public_employee_main_data->get_edara_name_by_emp_id($data['emp_id_fk']);
        $data['emp_name'] = $this->input->post('emp_name');
        $data['edara_n'] = $this->input->post('edara_n');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['qsm_n'] = $this->input->post('qsm_n');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['job_title'] = $this->input->post('job_title');
        // $data['qsm_id_fk']= $this->Public_employee_main_data->get_qsm_id_by_emp_id($data['emp_id_fk']);
        // $data['qsm_n']= $this->Public_employee_main_data->get_qsm_name_by_emp_id($data['emp_id_fk']);
        $data['direct_manager_id_fk'] = $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($data['emp_id_fk']);
        $data['direct_manager_code_fk'] = $this->Public_employee_main_data->get_direct_manager_code_by_emp_id($data['emp_id_fk']);
        $data['direct_manager_n'] = $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

        $emp_user_id = $this->get_id('users', 'emp_code', $data['emp_id_fk'], 'user_id');
        $data['emp_user_id'] = $emp_user_id;
        $data['current_from_id'] = $emp_user_id;

        $data['current_to_id'] = $this->get_user_emp_id($data['direct_manager_id_fk'], 3);

        $data['level'] = 1;
        $data['suspend'] = 0;
//        $data['update'] = 1;
        $data['ezn_month'] = $this->get_month($data['ezn_date_ar']);
        $data['ezn_year'] = date('Y', $data['ezn_date']);
        $data['remain_hours'] = $this->input->post('remain_hours');
        $data['remain_num'] = $this->input->post('remain_num');


        /*26-10-20-om*/
        /*  $data['geha_name'] = $this->input->post('geha_name');
          $data['visit_goal'] = $this->input->post('visit_goal');
          $data['visit_sub'] = $this->input->post('visit_sub');
          $data['visit_type'] = $this->input->post('visit_type');
          $data['visit_detailes'] = $this->input->post('visit_detailes');*/
        /*26-10-20-om*/


        $data['current_from_user_name'] = $this->get_user_name_submit($emp_user_id);
        $data['current_to_user_name'] = $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
        $this->db->insert('hr_all_ozonat_orders', $data);
    }


    public function select_all_time_ezn($emp, $ezn_date)
    {
        // $current_month = $this->get_month($ezn_date);


        $current_month = $this->current_date_mosayer('', 'month');
        $current_year = $this->current_date_mosayer('', 'year');

        $this->db->select('*,SUM(total_hours) as total_hours,COUNT(id) as count_ozonat');
        $this->db->from("hr_all_ozonat_orders");
        $this->db->where("emp_id_fk", $emp);
        // $this->db->where("suspend", 4);
        $this->db->where("suspend !=", 5);
        $this->db->where("suspend !=", 2);
        $this->db->where("ezn_month", $current_month);
        $this->db->where("ezn_year", $current_year);
        $this->db->where("no3_ezn", 1);
        return $this->db->get()->row();


    }

    public function display_data()
    {
        $query = $this->db->order_by('id', 'DESC')->get('hr_all_ozonat_orders');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->emp_name = $this->get_id("employees", 'id', $row->emp_id_fk, "employee");
                $data[$i]->last_ezn = $this->check_last_ezn($row->emp_id_fk, $row->ezn_rkm);

                $i++;
            }
            return $data;
        }
    }

    public function check_last_ezn($emp_id, $ezn_rkm)
    {
        $q = $this->db->select('* , MAX(ezn_rkm) as ezn_rkm_max ')
            ->where('emp_id_fk', $emp_id)->get('hr_all_ozonat_orders')->row();
        if (!empty($q)) {
            if ($ezn_rkm == $q->ezn_rkm_max) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('hr_all_ozonat_orders', $id)->row();
    }

    public function update_ezn($id)
    {

        $this->load->model('human_resources_model/Public_employee_main_data');

        $data['ezn_rkm'] = $this->get_ezn_rkm() + 1;
        $data['ezn_date'] = strtotime($this->input->post('ezn_date'));
        $data['ezn_date_ar'] = $this->input->post('ezn_date');
        $data['no3_ezn'] = $this->input->post('no3_ezn');
        $data['fatra_fk'] = $this->input->post('fatra_fk');
        if ($this->input->post('fatra_fk') == 1) {
            $data['fatra_n'] = 'فترة';
        } elseif ($this->input->post('fatra_fk') == 2) {
            $data['fatra_n'] = 'فترتين';
        }
        $data['from_hour'] = $this->input->post('from_hour');
        $data['to_hour'] = $this->input->post('to_hour');
        $data['total_hours'] = $this->input->post('total_hours');
        $data['reason'] = $this->input->post('reason');
        if (isset($_SESSION) && $_SESSION['role_id_fk'] == 1) {
            $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        } elseif (isset($_SESSION) && $_SESSION['role_id_fk'] == 3) {
            $data['emp_id_fk'] = $_SESSION['emp_code'];

        }

        $data['emp_code_fk'] = $this->get_id('employees', 'id', $data['emp_id_fk'], 'emp_code');
        // $data['edara_id_fk']= $this->Public_employee_main_data->get_edara_id_by_emp_id($data['emp_id_fk']);
        // $data['edara_n']= $this->Public_employee_main_data->get_edara_name_by_emp_id($data['emp_id_fk']);
        // $data['qsm_id_fk']= $this->Public_employee_main_data->get_qsm_id_by_emp_id($data['emp_id_fk']);
        // $data['qsm_n']= $this->Public_employee_main_data->get_qsm_name_by_emp_id($data['emp_id_fk']);
        $data['emp_name'] = $this->input->post('emp_name');
        $data['edara_n'] = $this->input->post('edara_n');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['qsm_n'] = $this->input->post('qsm_n');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['job_title'] = $this->input->post('job_title');
        $data['direct_manager_id_fk'] = $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($data['emp_id_fk']);
        $data['direct_manager_code_fk'] = $this->Public_employee_main_data->get_direct_manager_code_by_emp_id($data['emp_id_fk']);
        $data['direct_manager_n'] = $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        /*26-10-20-om*/
        /*  $data['geha_name'] = $this->input->post('geha_name');
          $data['visit_goal'] = $this->input->post('visit_goal');
          $data['visit_sub'] = $this->input->post('visit_sub');
          $data['visit_type'] = $this->input->post('visit_type');
          $data['visit_detailes'] = $this->input->post('visit_detailes');*/
        /*26-10-20-om*/


        $this->db->where('id', $id);
        $this->db->update('hr_all_ozonat_orders', $data);

    }


    public function select_depart($id = false)
    {
        $this->load->model('human_resources_model/Public_employee_main_data');

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
                /* $arr[$a]->administration_name = $this->get_edara_name_or_qsm($row->administration);
                 $arr[$a]->departments_name = $this->get_edara_name_or_qsm($row->department);
                 $arr[$a]->job_title = $this->get_job_title($row->degree_id);*/
                $arr[$a]->manger_name = $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($row->id);

                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }

    public function delete_ezn($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_all_ozonat_orders');

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

    // ___________Nagwa 1-6 ___________

    public function get_ozonat($id)
    {
        $this->db->where('emp_id_fk', $id);
        //  $this->db->where('suspend',4);
        $query = $this->db->get('hr_all_ozonat_orders');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->emp_name = $this->get_id("employees", 'id', $row->emp_id_fk, "employee");
                $i++;
            }
            return $data;
        }
    }

    public function get_emp($emp_id)
    {
        $this->db->where('emp_id_fk', $emp_id);
        $query = $this->db->get('hr_all_ozonat_orders');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function get_user_name_submit($user_id)
    {
        $this->db->select('*');
        $this->db->where("user_id", $user_id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
                return $data->user_username;
            } elseif ($data->role_id_fk == 2) {
                $name = $this->get_user_name_member($data->user_name);
                return $name;
            } elseif ($data->role_id_fk == 3) {
                $name = $this->get_emp_n_session($data->emp_code);
                return $name;
            } elseif ($data->role_id_fk == 4) {
                $name = $this->name_general_assembley($data->user_name);
                return $name;
            }


        }
        return false;
    }

    public function get_user_name_member($user_id)
    {
        $this->db->select('*');
        $this->db->where("id", $user_id);
        $query = $this->db->get('magls_members_table');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data->member_name;
        }
        return false;

    }

    public function get_emp_n_session($user_id)
    {
        $this->db->select('*');
        $this->db->where("id", $user_id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data->employee;
        }
        return false;

    }

    public function name_general_assembley($user_id)
    {
        $this->db->select('*');
        $this->db->where("id", $user_id);
        $query = $this->db->get('general_assembley_members');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data->name;
        }
        return false;

    }

    public function get_user_emp_id($user_id, $role_id_fk)
    {
        $this->db->where('emp_code', $user_id);
        $this->db->where('role_id_fk', $role_id_fk);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->row()->user_id;
        } else {
            return false;
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


    /* public function update_ezn_notification($ezn_rkm)
     {
         $data['seen'] = 1;
         $this->db->where('current_to_id', $_SESSION['user_id'])->where('ezn_rkm', $ezn_rkm)->update('hr_all_ozonat_orders', $data);
         $this->db->where('to_user_id', $_SESSION['user_id'])->where('ezn_rkm_fk', $ezn_rkm)->update('hr_all_ozonat_history', $data);

     }*/
    public function update_ezn_notification()
    {
        $data['seen'] = 1;
        $this->db->where('current_to_id', $_SESSION['user_id'])->update('hr_all_ozonat_orders', $data);
        $this->db->where('to_user_id', $_SESSION['user_id'])->update('hr_all_ozonat_history', $data);

    }

    public function check_ezn_notifications($where_conn)
    {
        $this->db->select('ezn_rkm,current_from_user_name');
        if (!empty($where_conn)) {
            $this->db->where($where_conn);
        }
        return $this->db->where('seen', 0)->get('hr_all_ozonat_orders')->result();
    }


    public function select_emp_ezn_new($emp, $no3_ezn, $ezn_month, $ezn_year)
    {
        $this->db->select('*');
        $this->db->from("hr_all_ozonat_orders");
        $this->db->where("emp_id_fk", $emp);
        $this->db->where("suspend", 4);
        $this->db->where("no3_ezn", $no3_ezn);
        $this->db->where("ezn_month", $ezn_month);
        $this->db->where("ezn_year", $ezn_year);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
            /*  $a = 0;
              $arr[] = 0;
              foreach ($query->result() as $row) {
                  if (!empty($row->ezn_date)) {
                      $month = date('m', $row->ezn_date);
                      $current_month = $this->get_month();
                      if ($month == $current_month) {
                          $arr[$a] = $row;
                          $a++;
                      }

                  }
              }
              return $a;*/
        } else {
            return 0;
        }
    }

    public function select_emp_ezn($emp, $no3_ezn, $ezn_date)
    {
        $current_month = $this->get_month($ezn_date);

        $this->db->select('*');
        $this->db->from("hr_all_ozonat_orders");
        $this->db->where("emp_id_fk", $emp);
        $this->db->where("suspend", 4);
        $this->db->where("ezn_month", $current_month);
        $this->db->where("no3_ezn", $no3_ezn);
        $query = $this->db->get();
        return $query->num_rows();
    }

    /*  public function select_emp_ezn($emp,$no3_ezn)
  {
      $this->db->select('*');
      $this->db->from("hr_all_ozonat_orders");
      $this->db->where("emp_id_fk", $emp);
      $this->db->where("suspend", 4);
      $this->db->where("no3_ezn", $no3_ezn);
    //  $this->db->where("ezn_month", $ezn_month);
     // $this->db->where("ezn_year", $ezn_year);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          $a = 0;
          $arr[] = 0;
          foreach ($query->result() as $row) {
              if (!empty($row->ezn_date)) {
                  $month = date('m', $row->ezn_date);
                  $current_month = $this->get_month();
                  if ($month == $current_month) {
                      $arr[$a] = $row;
                      $a++;
                  }

              }
          }
          return $a;
      } else {
          return false;
      }
  }*/
    /*function get_month($date = false)
    {
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        $date = '2020-' . date('m', strtotime($date)) . '-' . date('d', strtotime($date));
        return $this->db->where('from_date <=', strtotime($date))->where('to_date >=', strtotime($date))->get('hr_mosayer_months')->row_array()['month'];
    }
    */
    function get_month($date = false)
    {
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        // $date = date('Y').'-' . date('m', strtotime($date)) . '-' . date('d', strtotime($date));
        return $this->db->where('from_date <=', strtotime($date))->where('to_date >=', strtotime($date))->get('hr_mosayer_months')->row_array()['month'];
    }

    function current_date_mosayer($date = false, $var)
    {
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        // $date = date('Y').'-' . date('m', strtotime($date)) . '-' . date('d', strtotime($date));
        return $this->db->where('from_date <=', strtotime($date))->where('to_date >=', strtotime($date))->get('hr_mosayer_months')->row_array()["$var"];
    }


    /*public function select_emp_ezn($emp)
    {
        $this->db->select('*');
        $this->db->from("hr_all_ozonat_orders");
        $this->db->where("emp_id_fk", $emp);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            $arr[]=0;
            foreach ($query->result() as $row) {
                if(!empty($row->ezn_date_ar))
                {
                $ezn_date = explode('-', $row->ezn_date_ar);
                    $month = $ezn_date[1];
                    $current_month=date('m');             
                if($month==$current_month)
                {
                $arr[$a] = $row;
                $a++;
                }
               
            }
        }
            return $a;
        } else {
            return false;
        }
    }*/
    public function ezn_setting()
    {

        $query = $this->db->where('title', 'ozonat')->get('hr_egraat_sysat')->row();
        return $query;
    }

    /**********************************************************************/


    public function Employee_date_new($current_month, $current_year)
    {
        $this->db->select('employees.id,employees.emp_code,employees.employee as emp_name,employees.edara_n, employees.qsm_n, 
                    employees.mosma_wazefy_n, employees.markz_id, employees.markz_name, employees.emp_type, employees.card_num,
                     employees.mosma_wazefy_n , employees.employee_type,
                     hr_egraat_setting.title as new_mosma_wazefy,contract_employe.job_type , hr_forms_settings.title_setting as job_type_name
                           ');
        $this->db->from("employees");

        $this->db->join('contract_employe', 'contract_employe.emp_code = employees.emp_code', "left");
        $this->db->join('hr_egraat_setting', 'hr_egraat_setting.code = employees.mosma_wazefy_code', "left");
        $this->db->join('hr_forms_settings', 'hr_forms_settings.id_setting = contract_employe.job_type', "left");


        $this->db->where('emp_type', 1);
        $this->db->where('employee_type', 1);
        $this->db->order_by("employees.emp_code", "ASC");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->num_personal_ezn = $this->select_nums_ozonat($row->emp_code, 1, $current_month, $current_year);
                $data[$i]->num_3mal_ezn = $this->select_nums_ozonat($row->emp_code, 2, $current_month, $current_year);


                $data[$i]->sum_personal_ezn = $this->select_sums_ozonat($row->emp_code, 1, $current_month, $current_year);
                $data[$i]->sum_3mal_ezn = $this->select_sums_ozonat($row->emp_code, 2, $current_month, $current_year);

                $i++;

            }
            return $data;

        }
        return false;
    }


    public function select_nums_ozonat($emp_code = null, $no3_ezn, $current_month, $current_year)
    {
        $this->db->select('*');
        $this->db->from("hr_all_ozonat_orders");
        if ($emp_code != null) {
            $this->db->where("emp_code_fk", $emp_code);
        }

        //$this->db->where("suspend =", 4);
        $this->db->where("suspend !=", 2);
        $this->db->where("suspend !=", 5);
        $this->db->where("no3_ezn", $no3_ezn);
        $this->db->where("ezn_month", $current_month);
        $this->db->where("ezn_year", $current_year);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();

        } else {
            return 0;
        }
    }

    public function select_sums_ozonat($emp_code = null, $no3_ezn, $current_month, $current_year)
    {
        $this->db->select('*');
        $this->db->from("hr_all_ozonat_orders");
        if ($emp_code != null) {
            $this->db->where("emp_code_fk", $emp_code);
        }

        $this->db->where("suspend !=", 2);
        $this->db->where("suspend !=", 5);
        $this->db->where("no3_ezn", $no3_ezn);
        $this->db->where("ezn_month", $current_month);
        $this->db->where("ezn_year", $current_year);
        $query = $this->db->get();
        $total = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total += $row->total_hours;
            }
        }
        return $total;
    }

    /*
               public function get_current_solaf($emp_code,$current_month,$current_year){

         $this->db->select('*');
        $this->db->from("hr_solaf_quest");

            $this->db->where("hr_solaf_quest.emp_code_fk",$emp_code);
            $this->db->where("hr_solaf_quest.month",$current_month);
             $this->db->where("hr_solaf_quest.year",$current_year);
           $this->db->where("hr_solaf_quest.paid",'no');



            $query = $this->db->get();
            $total=0;
            if ($query->num_rows() > 0) {
                foreach( $query->result() as $row){
                    $total+=$row->value_of_qst;
                }
            }
            return $total;
        }
    */

}//end class
