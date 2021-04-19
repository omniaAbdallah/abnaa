<?php

class Volunteer_hours_model extends CI_Model

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











    /* public function insert()

     {





         $volunteer_date =$_POST['volunteer_date'];

         $from_time =$_POST['from_time'];

         $to_time =$_POST['to_time'];

         $place =$_POST['place'];

         $activities =$_POST['activities'];

         $num_hours =$_POST['num_hours'];





                 $data['direct_manager_id_fk']= $this->chek_Null($this->input->post('direct_manager_id_fk'));

                 $data['emp_id_fk']= $this->chek_Null($this->input->post('emp_id_fk'));

                 $data['edara_id_fk']= $this->chek_Null($this->input->post('edara_id_fk'));

                 $data['qsm_id_fk']= $this->chek_Null($this->input->post('qsm_id_fk'));

               //  $data['job_title_id_fk']= $this->chek_Null($this->input->post('job_title'));

                 $data['mostafed_type_fk']= $this->chek_Null($this->input->post('mostafed_type_fk'));

                 $data['mostafed_edara_id']= $this->chek_Null($this->input->post('mostafed_edara_id'));

                 $data['mostafed_direction_id']= $this->chek_Null($this->input->post('mostafed_direction_id'));

                 $data['responsible']= $this->chek_Null($this->input->post('responsible'));

                 $data['volunteer_description']= $this->chek_Null($this->input->post('volunteer_description'));

                 $data['volunteer_description_id_fk']=$this->chek_Null($this->input->post('volunteer_description_id_fk'));

                 $data['job']= $this->chek_Null($this->input->post('job'));

                 $data['tele']= $this->chek_Null($this->input->post('tele'));

                 $data['mob']= $this->chek_Null($this->input->post('mob'));

                 $data['email']= $this->chek_Null($this->input->post('email'));

                 $data['volunteer_date']= $this->chek_Null(strtotime($volunteer_date));

                 $data['volunteer_date_ar']= $this->chek_Null($volunteer_date);

                 $data['from_time']= $this->chek_Null($from_time);

                 $data['to_time']= $this->chek_Null($to_time);

                 $data['place_id_fk']=$_POST['place_id_fk'];

                 $data['place']= $this->chek_Null($place);

                 $data['activities']= $this->chek_Null($activities);

                 $data['num_hours']= $this->chek_Null($num_hours);

                 $data['date']= date('Y-m-d');

                 $data['date_s']=strtotime(date('Y-m-d'));

                 $data['date_ar']=date('Y-m-d');

                 $data['publisher']=$_SESSION['user_id'];

             $data['magal_tatw3']= $this->chek_Null($this->input->post('magal_tatw3'));



     $data['current_from_user_name'] = $this->get_id('employees', 'id', $data['emp_id_fk'], 'employee');

     $data['current_from_user_id'] = $this->get_user_id($data['emp_id_fk']);

     $data['current_to_user_name'] = $this->get_id('employees', 'id', $data['direct_manager_id_fk'], 'employee');

     $data['current_to_user_id'] = $this->get_user_id($data['direct_manager_id_fk']);

     $data['level'] = 1;

     $data['level_title'] = '������ �������';





                   $data['job_title_id_fk']= $this->get_id('employees','id',$data['emp_id_fk'],'degree_id');

                 $this->db->insert('hr_volunteer_hours_orders',$data);











     }
 */
    /*public function update($id){



        $volunteer_date =$_POST['volunteer_date'];

        $from_time =$_POST['from_time'];

        $to_time =$_POST['to_time'];

        $place =$_POST['place'];

        $activities =$_POST['activities'];

        $num_hours =$_POST['num_hours'];





        $data['direct_manager_id_fk']= $this->chek_Null($this->input->post('direct_manager_id_fk'));

        $data['emp_id_fk']= $this->chek_Null($this->input->post('emp_id_fk'));

        $data['edara_id_fk']= $this->chek_Null($this->input->post('edara_id_fk'));

        $data['qsm_id_fk']= $this->chek_Null($this->input->post('qsm_id_fk'));

        //$data['job_title_id_fk']= $this->chek_Null($this->input->post('job_title'));

        $data['mostafed_type_fk']= $this->chek_Null($this->input->post('mostafed_type_fk'));

        $data['mostafed_edara_id']= $this->chek_Null($this->input->post('mostafed_edara_id'));

        $data['mostafed_direction_id']= $this->chek_Null($this->input->post('mostafed_direction_id'));

        $data['responsible']= $this->chek_Null($this->input->post('responsible'));

        $data['volunteer_description']= $this->chek_Null($this->input->post('volunteer_description'));

        $data['volunteer_description_id_fk']=$this->chek_Null($this->input->post('volunteer_description_id_fk'));

        $data['job']= $this->chek_Null($this->input->post('job'));

        $data['tele']= $this->chek_Null($this->input->post('tele'));

        $data['mob']= $this->chek_Null($this->input->post('mob'));

        $data['email']= $this->chek_Null($this->input->post('email'));

        $data['magal_tatw3']= $this->chek_Null($this->input->post('magal_tatw3'));



        $data['volunteer_date']= $this->chek_Null(strtotime($volunteer_date));

        $data['volunteer_date_ar']= $this->chek_Null($volunteer_date);

        $data['from_time']= $this->chek_Null($from_time);

        $data['to_time']= $this->chek_Null($to_time);

        $data['place_id_fk']=$_POST['place_id_fk'];

        $data['place']= $this->chek_Null($place);

        $data['activities']= $this->chek_Null($activities);

        $data['num_hours']= $this->chek_Null($num_hours);

    $data['job_title_id_fk']= $this->get_id('employees','id',$data['emp_id_fk'],'degree_id');

        $this->db->where('id',$id);

        $this->db->update('hr_volunteer_hours_orders',$data);

    }

  */


    /*  public function GetById($id){

          $this->db->select('hr_volunteer_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code');

          $this->db->from('hr_volunteer_hours_orders');

          $this->db->where('hr_volunteer_hours_orders.id',$id);

          $this->db->join('employees','hr_volunteer_hours_orders.emp_id_fk = employees.id','left');

          $query = $this->db->get();

          if ($query->num_rows() > 0) {

              foreach ($query->result() as $row) {

                  $data = $row;

                  $data->emp_name = $this->get_id('employees','id',$row->emp_id_fk,'employee');

                  $data->personal_emp_img = $this->get_id('employees', 'id', $row->emp_id_fk, 'personal_photo');

                  $data->card_num = $this->get_id('employees','id',$row->emp_id_fk,'card_num');

                  $data->qsm_name = $this->get_id('hr_edarat_aqsam','id',$row->qsm_id_fk,'title');

                  $data->edara_name = $this->get_id('hr_edarat_aqsam','id',$row->edara_id_fk,'title');

                  $data->job_title = $this->get_id('all_defined_setting','defined_id',$row->job_title_id_fk,'defined_title');

                  $data->emp_code = $this->get_id('employees','id',$row->emp_id_fk,'emp_code');

                  if ($row->mostafed_type_fk==0){

                      $data->mostafed_edara_name = $this->get_id('hr_edarat_aqsam','id',$row->mostafed_edara_id,'title');

                  } elseif ($row->mostafed_type_fk==1){

                      $data->mostafed_edara_name = $this->get_id('hr_forms_settings','id_setting',$row->mostafed_direction_id,'title_setting');



                  }



              }

              return $data;

          }else{

             return 0;

          }

      }*/


    /*   public function get_id($table, $where, $id, $select)

    {

        $h = $this->db->get_where($table, array($where => $id));

        $arr = $h->row_array();

        return $arr[$select];

    }
*/


    /* public function delete($id)

     {

         $this->db->where('id',$id);

         $this->db->delete("hr_volunteer_hours_orders");

     }*/


    /* public function get_department()

     {

       $this->db->where('from_id_fk !=', 0);

         $query= $this->db->get('hr_edarat_aqsam');

         if($query->num_rows()>0)

         {

             foreach ($query->result() as $row){

              $data[] =    $row;

             }

             return $data;

         }else{

             return 0;

         }

     }
 */
    /* public function select_by(){

         $this->db->select('*');

         $this->db->from('hr_edarat_aqsam');

         $this->db->where('from_id_fk',0);

         $query = $this->db->get();

         if ($query->num_rows() > 0) {

             foreach ($query->result() as $row) {

                 $data[] = $row;

             }

             return $data;

         }

         return false;

     }*/


    /*

        public function get_last()

        {

            $this->db->order_by('id_setting','desc');

            $this->db->select('id_setting');

            $this->db->where('type',9);

            $this->db->from('hr_forms_settings');

            $query = $this->db->get();

            return $query->row()->id_setting;

        }*/


    /*  public function get_last()

      {

          $this->db->order_by('id_setting','desc');

          $this->db->select('id_setting');

          $this->db->where('type',9);

          $this->db->from('hr_forms_settings');

          $query = $this->db->get();

       if ($query->num_rows() > 0) {

            return $query->row()->id_setting;

          }else{

              return 0;

          }



      }*/


    /* public function insert_record($valu)

     {

         $data['title_setting']=$valu;

         $data['type']=9;

         $data['have_branch']=0;

         $this->db->insert('hr_forms_settings',$data);

     }

 */


    /* public function select_all()

     {

         $role=$_SESSION['role_id_fk'];  $emp_id=$_SESSION['emp_code'];

         $this->db->select('hr_volunteer_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code ,

         hr_forms_settings.id_setting ,hr_forms_settings.title_setting , all_defined_setting.defined_id , all_defined_setting.defined_title as job_title');

         $this->db->from("hr_volunteer_hours_orders");

         if($role ==3){

             $this->db->where('emp_id_fk', $emp_id);

         }

         $this->db->where('employees.employee_type', 1);



         $this->db->join('employees','hr_volunteer_hours_orders.emp_id_fk = employees.id','left');

         $this->db->join('hr_forms_settings','hr_volunteer_hours_orders.mostafed_direction_id = hr_forms_settings.id_setting','left');

         $this->db->join('all_defined_setting','hr_volunteer_hours_orders.job_title_id_fk = all_defined_setting.defined_id','left');

          $this->db->order_by('employees.mosma_wazefy_tarteb','desc');

         $query = $this->db->get();

         if ($query->num_rows() > 0) {

             $a=0;

             foreach ($query->result() as $row) {

                 $data[$a] = $row;

                 $data[$a]->admin_title =  $this->Get_from_department_jobs(array('id'=>$row->edara_id_fk));

                 $data[$a]->department_title = $this->Get_from_department_jobs(array('id'=>$row->qsm_id_fk));

                 $data[$a]->department_name = $this->Get_from_department_jobs(array('id'=>$row->mostafed_edara_id));

              $a++; }

             return $data;



         }else{



             return 0;

         }

     }


 */


    /*public function Get_from_department_jobs($arr){

         $h = $this->db->get_where("hr_edarat_aqsam",$arr);

         if ($h->num_rows() > 0) {

             return $h->row_array()['title'];

         }else{

             return 0;

         }

     }*/


    // public function get_all_emp()

    // {


    //     $q = $this->db->get('employees')->where('status',96)->result();

    //     if (!empty($q)) {

    //         foreach ($q as $key => $row) {

    //         //    $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);

    //           //  $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);

    //         //    $q[$key]->job_title = $this->get_job_title($row->degree_id);

    //             $q[$key]->direct_manager_id_fk= $this->get_direct_manager_name_by_emp_id($row->id);

    //             $q[$key]->direct_manager_job_title_fk= $this->get_job_title($row->id);

    //         }

    //         return $q;

    //     }

    // }

    /*  public function get_all_emp()

      {

          $this->db->select('*');

          $this->db->where("employee_type", 1);

           $this->db->where("emp_type", 1);

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

      }*/

    /*  public function get_edara_name_or_qsm($id)

      {

          $this->db->where('id', $id);

          $query = $this->db->get('department_jobs');

          if ($query->num_rows() > 0) {

              return $query->row()->name;

          } else {

              return false;

          }

      }
  */


    /*  public function get_job_title($id)

      {



          $this->db->where('defined_id', $id);

          $query = $this->db->get('all_defined_setting');

          if ($query->num_rows() > 0) {

              return $query->row()->defined_title;

          } else {

              return false;

          }

      }*/

    /*  public function get_direct_manager_name_by_emp_id($id)

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

    //yara22-11-2020

    /*   public function get_all_emp_edara($administration)

       {

           $this->db->select('*');

           $this->db->where("edara_id",$administration);

           $this->db->where("employee_type",1);

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
   */


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

    /* public function select_depart(){

         $this->db->select('*');

         $this->db->from('employees');

         $this->db->where("id", $_SESSION['emp_code']);

         $query = $this->db->get();

         if ($query->num_rows() > 0) {

             $a=0;

             foreach ($query->result() as $row) {

                 $arr[$a] = $row;

              //   $arr[$a]->administration_name = $this->getName($row->administration);

             //    $arr[$a]->departments_name = $this->getName($row->department);

             $a++;}

             return $arr[0];

         }else{

             return 0;

         }

     }
 */


    /* public function select_depart_edite($id){

         $this->db->select('*');

         $this->db->from('employees');

         $this->db->where("id", $id);

         $query = $this->db->get()->row();

         if (!empty($query)) {





             return $query;

         }else{

             return 0;

         }

     }
 */


    //******************/////////////////////******************///////////////////******************

    /* public function add_setting($type){

       $data['title'] = $this->input->post('value');

       $data['from_code'] = $type;





       $id = $this->input->post('row_id') ;

        if (!empty($id)){

            $data_update['title'] = $this->input->post('value');

            $this->db->where('id',$id);

            $this->db->update('tat_settings', $data_update);

        } else{

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



   public function get_setting_by_id($id){

       $this->db->where('id',$id);

       $query = $this->db->get('tat_settings');

       if ($query->num_rows() > 0) {

           return $query->row() ;

       }

       return false;

   }



   public function get_all_setting(){

       $query = $this->db->get('tat_settings');

       if ($query->num_rows() > 0) {

           return $query->result() ;

       }

       return false;

   }

   public function delete_setting($id){

       $this->db->where('id',$id);

       $this->db->delete('tat_settings');

   }
   */


    public function get_user_id($emp_code)

    {

        $q = $this->db->where('emp_code', $emp_code)->get('users')->row();

        if (!empty($q)) {

            return $q->user_id;

        }

    }

    public function my_orders($arr)

    {


        $this->db->select('hr_volunteer_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code ,

        hr_forms_settings.id_setting ,hr_forms_settings.title_setting , employees.mosma_wazefy_n as job_title');

        $this->db->from("hr_volunteer_hours_orders");

        $this->db->where($arr);

        $this->db->join('employees', 'hr_volunteer_hours_orders.emp_id_fk = employees.id', 'left');

        $this->db->join('hr_forms_settings', 'hr_volunteer_hours_orders.mostafed_direction_id = hr_forms_settings.id_setting', 'left');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $a = 0;

            foreach ($query->result() as $row) {

                $data[$a] = $row;

                $data[$a]->department_name = $this->Get_from_department_jobs(array('id' => $row->mostafed_edara_id));


                if ($row->mostafed_type_fk == 1) {

                    $data[$a]->edara_geha = $row->title_setting;

                } elseif ($row->mostafed_type_fk == 0) {

                    $data[$a]->edara_geha = $row->department_name;

                }


                $a++;

            }

            return $data;


        } else {


            return 0;

        }

    }


    public function get_array_by_id($table, $id)

    {

        $this->db->select('*');

        $this->db->from($table);

        $this->db->where('order_rkm_id', $id);

        $query = $this->db->get();

        $data = array();

        $x = 0;

        if ($query->result() > 0) {

            //return $query->result();

            foreach ($query->result() as $row) {

                $data[$x] = $row;

                $data[$x]->personal_img = $this->get_personal_img($row->to_user_id);

                $data[$x]->personal_emp_img = $this->get_personal_img_emp($row->from_user_id);

                $x++;

            }

            return $data;

        } else {

            return false;

        }

    }


    public function get_personal_img($id)

    {

        $this->db->where('user_id', $id);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {

            return $query->row()->user_photo;

        } else {

            return false;

        }

    }

    public function get_personal_img_emp($id)

    {

        $this->db->where('user_id', $id);

        $query1 = $this->db->get('users')->row();

        if (!empty($query1)) {

            $this->db->where('id', $query1->emp_code);

            $query = $this->db->get('employees');

            if ($query->num_rows() > 0) {

                return $query->row()->personal_photo;

            } else {

                return false;

            }

        }

    }

    public function get_from_setting($level)

    {

        $this->db->where('level', $level);

        $this->db->where('tbl', 'volunteer');

        $query = $this->db->get('hr_all_transformation_setting');

        if ($query->num_rows() > 0) {

            return $query->row();

        } else {

            return false;

        }

    }


    public function get_employees_by_level($arr)

    {

        $query = $this->db->where($arr)->get('hr_egraat_emp_setting');

        if ($query->num_rows() > 0) {

            $query = $query->result();

            foreach ($query as $key => $value) {

                $query[$key]->photo = $this->Get_photo_by_emp_id($value->person_id);

            }

            return $query;

// Get_photo

        } else {

            return false;

        }

    }


    public function Get_photo_by_emp_id($emp_id)

    {

        $this->db->select('employees.id,employees.personal_photo');

        $this->db->from("employees");

        $this->db->where('id', $emp_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->row()->personal_photo;

        } else {

            return false;

        }

    }


    public function get_emp_data_by_user_id($emp_id)

    {

        $this->db->where('user_id', $emp_id);

        $query1 = $this->db->get('users')->row();

        if (!empty($query1)) {

            $data = array();

            $this->db->select('*');

            $this->db->from('employees');

            $this->db->where('id', $query1->emp_code);

            $query = $this->db->get();

            if ($query->num_rows() > 0) {

                $x = 0;

                $data[$x] = $query->row();

                $data[$x]->person_img = $data[$x]->personal_photo;

                $data[$x]->job_name = $data[$x]->mosma_wazefy_n;

                return $data[$x];

            } else {

                return false;

            }

        }

    }

    public function get_emp_data_by_id($emp_id)

    {

        $data = array();

        $this->db->select('*');

        $this->db->from('employees');

        $this->db->where('id', $emp_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $x = 0;

            $data[$x] = $query->row();

            $data[$x]->person_img = $data[$x]->personal_photo;

            $data[$x]->job_name = $data[$x]->mosma_wazefy_n;


            return $data[$x];

        } else {

            return false;

        }

    }


    public function change_suspend()

    {

        $sett = $this->get_from_setting($this->input->post('level'));

        $sett_msg = $this->get_from_setting($this->input->post('level') - 1);

        $id = $this->input->post('order_rkm_id');

        $q = $this->GetById('hr_volunteer_hours_orders', $id);

        $data['current_from_user_id'] = $this->input->post('current_from_id');

        $data['current_to_user_id'] = $this->get_id('users', 'emp_code', $this->input->post('current_to_id'), 'user_id');

        $data['current_from_user_name'] = $this->get_id('users', 'user_id', $this->input->post('current_from_id'), 'emp_name');

        $data['current_to_user_name'] = $this->get_id('employees', 'id', $this->input->post('current_to_id'), 'employee');

        $data['suspend'] = $this->input->post('valu');

        $data['level'] = $this->input->post('level');

        if ($this->input->post('valu') == 1) {

            $data['talab_msg'] = $sett_msg->msg_accept;

        } else {

            $data['talab_msg'] = $sett_msg->msg_refuse;

            $data['reason_action'] = $this->input->post('reason_action');

        }

        switch ($data['level']) {

            case 2:

                $data['approved_direct_manager'] = $this->input->post('valu');

                break;

            case 3:

                $data['approved_specific_emp'] = $this->input->post('valu');

                break;

            default:

                break;

        }

        if ($data['suspend'] == 2) {

            if ($this->input->post('level') > 2) {

                $data['suspend'] = 5;

//                $data['current_to_id'] = $q->emp_user_id;

                $data['current_to_user_id'] = $q->current_from_user_id;

                $data['current_to_user_name'] = $this->get_id('users', 'user_id', $data['current_to_user_id'], 'emp_name');

            } else {

                $data['level'] = 0;

                $data['current_to_user_id'] = $q->current_from_user_id;

                $data['current_to_user_name'] = $this->get_id('users', 'user_id', $data['current_to_user_id'], 'emp_name');

            }

        }

        if ($this->input->post('level') == 3 && $data['suspend'] == 1) {

            $data['suspend'] = 4;

            $data['level'] = 0;

            $data['current_to_user_id'] = $q->emp_user_id;

            $data['current_to_user_name'] = $this->get_id('users', 'user_id', $data['current_to_user_id'], 'emp_name');

        }

        $data['seen'] = 0;

        $this->db->where('id', $id);

        $this->db->update('hr_volunteer_hours_orders', $data);

    }


    public function insert_transformation()

    {

        $id = $this->input->post('order_rkm_id');

        $q = $this->GetById($id);

        $data['order_rkm_id'] = $q->id;

        $data['from_user_id'] = $q->current_from_user_id;

        $data['to_user_id'] = $q->current_to_user_id;

        $data['from_user_name'] = $q->current_from_user_name;

        $data['to_user_name'] = $q->current_to_user_name;

        $data['level'] = $this->input->post('level') - 1;

        $sett = $this->get_from_setting($data['level']);

        $data['talab_in_fk'] = $sett->id;

        $data['talab_in_title'] = $sett->title;

        $data['talab_msg'] = $sett->msg_accept;

        $data['reason_action'] = $this->input->post('reason_action');


        //====================================================

        $data['suspend'] = $this->input->post('valu');

        $data['date'] = strtotime(date("Y-m-d"));

        $data['date_ar'] = date("Y-m-d");

        $data['publisher'] = $_SESSION['user_id'];

        //print_r($data);

        $data['seen'] = 0;

        $this->db->insert('hr_volunteer_hours_history', $data);

    }

    public function my_orders_history($table, $arr)

    {

        $this->db->where($arr);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            $query = $query->result();

            foreach ($query as $key => $value) {

                $query[$key]->personal_emp_img = $this->get_personal_img_emp($value->from_user_id);

            }

            return $query;

        } else {

            return false;

        }

    }


    public function get_all_orders()

    {


        $this->db->select('hr_volunteer_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code ,

        hr_forms_settings.id_setting ,hr_forms_settings.title_setting , employees.mosma_wazefy_n as job_title');

        $this->db->from("hr_volunteer_hours_orders");

        //$this->db->where($arr);

        $this->db->join('employees', 'hr_volunteer_hours_orders.emp_id_fk = employees.id', 'left');

        $this->db->join('hr_forms_settings', 'hr_volunteer_hours_orders.mostafed_direction_id = hr_forms_settings.id_setting', 'left');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $a = 0;

            foreach ($query->result() as $row) {

                $data[$a] = $row;

                $data[$a]->department_name = $this->Get_from_department_jobs(array('id' => $row->mostafed_edara_id));


                if ($row->mostafed_type_fk == 1) {

                    $data[$a]->edara_geha = $row->title_setting;

                } elseif ($row->mostafed_type_fk == 0) {

                    $data[$a]->edara_geha = $row->department_name;

                }


                $a++;

            }

            return $data;


        } else {


            return 0;

        }

    }


    public function insert()
    {
        $volunteer_date = $_POST['volunteer_date'];
        $from_time = $_POST['from_time'];
        $to_time = $_POST['to_time'];
        $place = $_POST['place'];
        $activities = $_POST['activities'];
        $num_hours = $_POST['num_hours'];
        $data['direct_manager_id_fk'] = $this->chek_Null($this->input->post('direct_manager_id_fk'));
        $data['emp_id_fk'] = $this->chek_Null($this->input->post('emp_id_fk'));
        $data['edara_id_fk'] = $this->chek_Null($this->input->post('edara_id_fk'));
        $data['qsm_id_fk'] = $this->chek_Null($this->input->post('qsm_id_fk'));
        //  $data['job_title_id_fk']= $this->chek_Null($this->input->post('job_title'));
        $data['mostafed_type_fk'] = $this->chek_Null($this->input->post('mostafed_type_fk'));
        $data['mostafed_edara_id'] = $this->chek_Null($this->input->post('mostafed_edara_id'));
        $data['mostafed_direction_id'] = $this->chek_Null($this->input->post('mostafed_direction_id'));
        $data['responsible'] = $this->chek_Null($this->input->post('responsible'));
        $data['volunteer_description'] = $this->chek_Null($this->input->post('volunteer_description'));
        $data['volunteer_description_id_fk'] = $this->chek_Null($this->input->post('volunteer_description_id_fk'));
        $data['job'] = $this->chek_Null($this->input->post('job'));
        $data['tele'] = $this->chek_Null($this->input->post('tele'));
        $data['mob'] = $this->chek_Null($this->input->post('mob'));
        $data['email'] = $this->chek_Null($this->input->post('email'));
        $data['volunteer_date'] = $this->chek_Null(strtotime($volunteer_date));
        $data['volunteer_date_ar'] = $this->chek_Null($volunteer_date);
        $data['from_time'] = $this->chek_Null($from_time);
        $data['to_time'] = $this->chek_Null($to_time);
        $data['place_id_fk'] = $_POST['place_id_fk'];
        $data['place'] = $this->chek_Null($place);
        $data['activities'] = $this->chek_Null($activities);
        $data['num_hours'] = $this->chek_Null($num_hours);
        $data['date'] = date('Y-m-d');
        $data['date_s'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['job_title_id_fk'] = $this->get_id('employees', 'id', $data['emp_id_fk'], 'degree_id');
        $this->db->insert('hr_volunteer_hours_orders', $data);
    }
    public function update($id)
    {
        $volunteer_date = $_POST['volunteer_date'];
        $from_time = $_POST['from_time'];
        $to_time = $_POST['to_time'];
        $place = $_POST['place'];
        $activities = $_POST['activities'];
        $num_hours = $_POST['num_hours'];
        $data['direct_manager_id_fk'] = $this->chek_Null($this->input->post('direct_manager_id_fk'));
        $data['emp_id_fk'] = $this->chek_Null($this->input->post('emp_id_fk'));
        $data['edara_id_fk'] = $this->chek_Null($this->input->post('edara_id_fk'));
        $data['qsm_id_fk'] = $this->chek_Null($this->input->post('qsm_id_fk'));
        //$data['job_title_id_fk']= $this->chek_Null($this->input->post('job_title'));
        $data['mostafed_type_fk'] = $this->chek_Null($this->input->post('mostafed_type_fk'));
        $data['mostafed_edara_id'] = $this->chek_Null($this->input->post('mostafed_edara_id'));
        $data['mostafed_direction_id'] = $this->chek_Null($this->input->post('mostafed_direction_id'));
        $data['responsible'] = $this->chek_Null($this->input->post('responsible'));
        $data['volunteer_description'] = $this->chek_Null($this->input->post('volunteer_description'));
        $data['volunteer_description_id_fk'] = $this->chek_Null($this->input->post('volunteer_description_id_fk'));
        $data['job'] = $this->chek_Null($this->input->post('job'));
        $data['tele'] = $this->chek_Null($this->input->post('tele'));
        $data['mob'] = $this->chek_Null($this->input->post('mob'));
        $data['email'] = $this->chek_Null($this->input->post('email'));
        $data['volunteer_date'] = $this->chek_Null(strtotime($volunteer_date));
        $data['volunteer_date_ar'] = $this->chek_Null($volunteer_date);
        $data['from_time'] = $this->chek_Null($from_time);
        $data['to_time'] = $this->chek_Null($to_time);
        $data['place_id_fk'] = $_POST['place_id_fk'];
        $data['place'] = $this->chek_Null($place);
        $data['activities'] = $this->chek_Null($activities);
        $data['num_hours'] = $this->chek_Null($num_hours);
        $data['job_title_id_fk'] = $this->get_id('employees', 'id', $data['emp_id_fk'], 'degree_id');
        $this->db->where('id', $id);
        $this->db->update('hr_volunteer_hours_orders', $data);
    }
    public function GetById($id)
    {
        $this->db->select('hr_volunteer_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code');
        $this->db->from('hr_volunteer_hours_orders');
        $this->db->where('hr_volunteer_hours_orders.id', $id);
        $this->db->join('employees', 'hr_volunteer_hours_orders.emp_id_fk = employees.id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
                $data->emp_name = $this->get_id('employees', 'id', $row->emp_id_fk, 'employee');
                $data->card_num = $this->get_id('employees', 'id', $row->emp_id_fk, 'card_num');
                $data->qsm_name = $this->get_id('hr_edarat_aqsam', 'id', $row->qsm_id_fk, 'title');
                $data->edara_name = $this->get_id('hr_edarat_aqsam', 'id', $row->edara_id_fk, 'title');
                $data->job_title = $this->get_id('all_defined_setting', 'defined_id', $row->job_title_id_fk, 'defined_title');
                $data->emp_code = $this->get_id('employees', 'id', $row->emp_id_fk, 'emp_code');
                if ($row->mostafed_type_fk == 0) {
                    $data->mostafed_edara_name = $this->get_id('hr_edarat_aqsam', 'id', $row->mostafed_edara_id, 'title');
                } elseif ($row->mostafed_type_fk == 1) {
                    $data->mostafed_edara_name = $this->get_id('hr_forms_settings', 'id_setting', $row->mostafed_direction_id, 'title_setting');
                }
            }
            return $data;
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
        $this->db->delete("hr_volunteer_hours_orders");
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
    /*
        public function get_last()
        {
            $this->db->order_by('id_setting','desc');
            $this->db->select('id_setting');
            $this->db->where('type',9);
            $this->db->from('hr_forms_settings');
            $query = $this->db->get();
            return $query->row()->id_setting;
        }*/
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
        $role = $_SESSION['role_id_fk'];
        $emp_id = $_SESSION['emp_code'];
        $this->db->select('hr_volunteer_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code ,
        hr_forms_settings.id_setting ,hr_forms_settings.title_setting , all_defined_setting.defined_id , all_defined_setting.defined_title as job_title');
        $this->db->from("hr_volunteer_hours_orders");
        if ($role == 3) {
            $this->db->where('emp_id_fk', $emp_id);
        }
        $this->db->join('employees', 'hr_volunteer_hours_orders.emp_id_fk = employees.id', 'left');
        $this->db->join('hr_forms_settings', 'hr_volunteer_hours_orders.mostafed_direction_id = hr_forms_settings.id_setting', 'left');
        $this->db->join('all_defined_setting', 'hr_volunteer_hours_orders.job_title_id_fk = all_defined_setting.defined_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->admin_title = $this->Get_from_department_jobs(array('id' => $row->edara_id_fk));
                $data[$a]->department_title = $this->Get_from_department_jobs(array('id' => $row->qsm_id_fk));
                $data[$a]->department_name = $this->Get_from_department_jobs(array('id' => $row->mostafed_edara_id));
                $a++;
            }
            return $data;
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
    public function get_direct_manager_name_by_emp_id($id)
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
    }
    //yara22-11-2020
    public function get_all_emp_edara($administration)
    {
        $this->db->select('*');
        $this->db->where("administration", $administration);
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
    public function get_ms2ol_data($emp_name)
    {
        $this->db->select('*');
        $this->db->where("employee", $emp_name);
        $this->db->from('employees');
        $query = $this->db->get()->row();
        if (!empty($query)) {
            return $query;
        }
        return false;
    }

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
                //   $arr[$a]->administration_name = $this->getName($row->administration);
                //    $arr[$a]->departments_name = $this->getName($row->department);
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
    public function get_one_employee($id)
    {
        $this->db->select('employees.* , 
                       admin_t.name as admin_name ,
                       depart_t.name as depart_name ,
                       all_defined_setting.defined_title as degree_name');
        $this->db->from("employees");
        $this->db->join('department_jobs as admin_t', 'admin_t.id = employees.administration', "left");
        $this->db->join('department_jobs as depart_t', 'depart_t.id = employees.department', "left");
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', "left");
        $this->db->where("employees.id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x]->manger_name = $this->get_emp_name($row->manger);
                $x++;
            }
            return $data;
        }
        return false;
    }
//-----------------------------------------------
    public function get_emp_name($id)
    {
        $h = $this->db->get_where("employees", array("id" => $id));
        $data = $h->row_array();
        return $data["employee"];
    }
    public function select_search_key2($table, $search_key, $search_key_value, $group_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key, $search_key_value);
        $this->db->group_by($group_by);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from('hr_volunteer_hours_orders');
        return $this->db->count_all_results();
    }
    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function make_datatables()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function make_query()
    {
        $this->db->select('*');
        $this->db->from('hr_volunteer_hours_orders');
        if (isset($_POST["search"]["value"])) {
            //  $this->db->like("first_name", $_POST["search"]["value"]);
            //  $this->db->or_like("last_name", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'DESC');
        }
    }


    function get_forsa_data($id)
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


}