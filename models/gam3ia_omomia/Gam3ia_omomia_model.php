<?php

/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 29/07/2019
 * Time: 01:18 م
 */
class Gam3ia_omomia_model extends CI_Model
{
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function get_id($table, $where, $value, $select)
    {
        $query = $this->db->get_where($table, array($where => $value));
        if ($query->num_rows() > 0) {
            return $query->row()->$select;
        }
        return 0;
    }

    public function get_count($table, $where_arr)
    {
        $count = $this->db->where($where_arr)->count_all_results($table);
        return $count;
    }

    public function GetFromGeneral_assembly_settings($type)
    {
        $this->db->select('*');
        $this->db->from('md_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_areas()
    {
        $this->db->where('from_id_fk', 0);
        $this->db->order_by("in_order", "asc");
        $query = $this->db->get("cities");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[$key->id] = $key->name;
            }
            return $data;
        }
        return false;
    }

    public function select_residentials()
    {
        $this->db->where('from_id_fk !=', 0);
        $this->db->order_by("in_order", "asc");
        $query = $this->db->get("cities");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function GetFromEmployees_settings($type)
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }
    // public function getById($id)
    // {
    //     $this->db->where('id', $id);
    //     $query = $this->db->get('md_all_gam3ia_omomia_members');
    //     if ($query->num_rows() > 0) {
    //         $i = 0;
    //         foreach ($query->result() as $row) {
    //             $data[$i] = $row;
    //             $data[$i]->odwiat = $this->get_odwiat($row->id);
    //             $i++;
    //         }
    //         return $data;
    //         //  return $query->row();
    //     }
    //     return 0;
    // }
    public function get_odwiat($id)
    {
        $this->db->where('member_id_fk', $id);
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_odwiat');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    public function update($files, $id)
    {
        if (!empty($files)) {
            foreach ($files as $name => $file) {
                if (!empty($file)) {
                    $data[$name] = $this->chek_Null($file);
                }
            }
        }
        /* if (!empty($morfaq)) {
             $arr_name_db = array('morfaq1', 'morfaq2', 'morfaq3', 'morfaq4');
             foreach ($arr_name_db as $key => $item) {
                 if (isset($morfaq[$key])) {
                     $data[$item] = $this->chek_Null($morfaq[$key]);
                 } else {
                     $data[$item] = '';
                 }
             }
         }*/
        $data['esdar_date_h'] = $this->chek_Null($this->input->post('esdar_date_h'));
        $data['birth_date_h'] = $this->chek_Null($this->input->post('birth_date_h'));
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['gns'] = $this->chek_Null($this->input->post('gns'));
        $gns = $this->input->post('gns');
        $gns_title = $this->get_id('employees_settings', 'id_setting', $gns, 'title_setting');
        $data['gns_title'] = $gns_title;
        $data['laqb_fk'] = $this->chek_Null($this->input->post('laqb_fk'));
        $laqb_fk = $this->input->post('laqb_fk');
        $laqb_title = $this->get_id('md_settings', 'id_setting', $laqb_fk, 'title_setting');
        $data['laqb_title'] = $laqb_title;
        $data['gnsia_fk'] = $this->chek_Null($this->input->post('gnsia_fk'));
        $gnsia_fk = $this->input->post('gnsia_fk');
        $gnsia_title = $this->get_id('employees_settings', 'id_setting', $gnsia_fk, 'title_setting');
        $data['gnsia_title'] = $gnsia_title;
        $data['hala_egtma3ia_fk'] = $this->chek_Null($this->input->post('hala_egtma3ia_fk'));
        $hala_egtma3ia_fk = $this->input->post('hala_egtma3ia_fk');
        $hala_egtma3ia_title = $this->get_id('employees_settings', 'id_setting', $hala_egtma3ia_fk, 'title_setting');
        $data['hala_egtma3ia_title'] = $hala_egtma3ia_title;
        $data['card_num'] = $this->chek_Null($this->input->post('card_num'));
        $data['geha_esdar_fk'] = $this->chek_Null($this->input->post('geha_esdar_fk'));
        $geha_esdar_fk = $this->input->post('geha_esdar_fk');
        $geha_esdar_title = $this->get_id('employees_settings', 'id_setting', $geha_esdar_fk, 'title_setting');
        $data['geha_esdar_title'] = $geha_esdar_title;
        $data['esdar_date_m'] = $this->chek_Null($this->input->post('esdar_date_m'));
        $data['esdar_date_h'] = $this->chek_Null($this->input->post('esdar_date_h'));
        $data['birth_date_m'] = $this->chek_Null($this->input->post('birth_date_m'));
        $array_date_m = explode("/", $data['birth_date_m']);
        $data['birth_date_m_y'] = $this->chek_Null($array_date_m[2]);
        $data['birth_date_h'] = $this->chek_Null($this->input->post('birth_date_h'));
        $array_date_h = explode("/", $data['birth_date_h']);
        $data['birth_date_h_y'] = $this->chek_Null($array_date_h[2]);
        $data['birth_date'] = strtotime($this->chek_Null($this->input->post('birth_date_m')));
        $data['jwal'] = $this->chek_Null($this->input->post('jwal'));
        $data['jwal_another'] = $this->chek_Null($this->input->post('jwal_another'));
        $data['madina_fk'] = $this->chek_Null($this->input->post('madina_fk'));
        $madina_fk = $this->input->post('madina_fk');
        $madina_title = $this->get_id('cities', 'id', $madina_fk, 'name');
        $data['madina_title'] = $madina_title;
        $data['hai_fk'] = $this->chek_Null($this->input->post('hai_fk'));
        $hai_fk = $this->input->post('hai_fk');
        $hai_title = $this->get_id('cities', 'id', $hai_fk, 'name');
        $data['hai_title'] = $hai_title;
        $data['street_name'] = $this->chek_Null($this->input->post('street_name'));
        $data['enwan_watni'] = $this->chek_Null($this->input->post('enwan_watni'));
        $data['email'] = $this->chek_Null($this->input->post('email'));
        $data['daraga_3elmia_fk'] = $this->chek_Null($this->input->post('daraga_3elmia_fk'));
        $daraga_3elmia_fk = $this->input->post('daraga_3elmia_fk');
        $daraga_3elmia_title = $this->get_id('employees_settings', 'id_setting', $daraga_3elmia_fk, 'title_setting');
        $data['daraga_3elmia_title'] = $daraga_3elmia_title;
        $data['moahel_3elmi_fk'] = $this->chek_Null($this->input->post('moahel_3elmi_fk'));
        $moahel_3elmi_fk = $this->input->post('moahel_3elmi_fk');
        $moahel_3elmi_title = $this->get_id('employees_settings', 'id_setting', $moahel_3elmi_fk, 'title_setting');
        $data['moahel_3elmi_title'] = $moahel_3elmi_title;
        $data['hya_3elmia_fk'] = $this->chek_Null($this->input->post('hya_3elmia_fk'));
        $data['mehna_fk'] = $this->chek_Null($this->input->post('mehna_fk'));
        $mehna_fk = $this->input->post('mehna_fk');
        $mehna_title = $this->get_id('md_settings', 'id_setting', $mehna_fk, 'title_setting');
        $data['mehna_title'] = $mehna_title;
        if ($this->input->post('geha_amal')) {
            $data['geha_amal'] = $this->chek_Null($this->input->post('geha_amal'));
        }
        if ($this->input->post('enwan_amal')) {
            $data['enwan_amal'] = $this->chek_Null($this->input->post('enwan_amal'));
        }
        if ($this->input->post('hatf_amal')) {
            $data['hatf_amal'] = $this->chek_Null($this->input->post('hatf_amal'));
        }
        $data['map_google_lng'] = $this->chek_Null($this->input->post('map_google_lng'));
        $data['map_google_lat'] = $this->chek_Null($this->input->post('map_google_lat'));
        //  $data['memb_user_name'] = $this->chek_Null($this->input->post('user_name'));
        // $data['memb_password'] =  sha1(md5($this->input->post('user_password')));
        $this->db->where('id', $id);
        $this->db->update('md_all_gam3ia_omomia_members', $data);
        //  print_r($data);
    }

    public function update_account($id)
    {
        $data['memb_user_name'] = $this->chek_Null($this->input->post('user_name'));
        $data['memb_password'] = sha1(md5($this->input->post('user_password')));
        $data['suspend'] = $this->chek_Null($this->input->post('suspend'));
        $this->db->where('id', $id);
        $this->db->update('md_all_gam3ia_omomia_members', $data);
    }

    public function update_account_new($id)
    {
        // $data['memb_user_name'] = $this->chek_Null($this->input->post('user_name'));
        $data['memb_password'] = sha1(md5($this->input->post('user_password')));
        //  $data['suspend'] = $this->chek_Null($this->input->post('suspend'));
        $this->db->where('id', $id);
        $this->db->update('md_all_gam3ia_omomia_members', $data);
    }

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->odwiat = $this->get_odwiat($row->id);
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_all_emp()
    {
        $this->db->order_by('emp_code');
        $this->db->where('employee_type', 1);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->job_title = $this->get_id('all_defined_setting', 'defined_id', $row->degree_id, 'defined_title');
                $data[$i]->edara_name = $this->get_id('department_jobs', 'id', $row->administration, 'name');
                $data[$i]->qsm_name = $this->get_id('department_jobs', 'id', $row->department, 'name');
                $i++;
            }
            return $data;
        }
    }

    public function getMembers3($arr)
    {
        $query = $this->db->select('f_members.first_halet_kafala,f_members.second_kafala_type,f_members.second_halet_kafala,f_members.categoriey_member,f_members.mother_national_num_fk,f_members.id,
     f_members.first_k_id,f_members.first_kafala_type
    ,f_members.first_to, f_members.second_k_id,f_members.second_to,
    basic.file_num, basic.mother_national_num  as num 
        ')
            ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
            ->where('basic.final_suspend', 4)
            ->where('basic.file_status', 1)
            ->where($arr)
            ->order_by("basic.file_num", "ASC")
            ->get('f_members');
        if ($query->num_rows() > 0) {
            $not_guaranteed = 0;
            $guaranteed = 0;
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->num_rows = $query->num_rows();
                if ($row->categoriey_member == 2) {
                    if ($row->first_kafala_type == 0) {
                        $not_guaranteed = $not_guaranteed + 1;
                    }
                    if ($row->first_kafala_type == 1) {
                        if ($row->first_halet_kafala == 2) {
                            $not_guaranteed = $not_guaranteed + 1;
                        } elseif ($row->first_halet_kafala == 1) {
                            $guaranteed = $guaranteed + 1;
                        }
                    }
                    if ($row->first_kafala_type == 2) {
                        if ($row->first_halet_kafala == 2) {
                            $not_guaranteed = $not_guaranteed + 1;
                        } elseif ($row->first_halet_kafala == 1) {
                            $guaranteed = $guaranteed + 1;
                        }
                    }
                    if ($row->second_kafala_type == 2) {
                        if ($row->second_halet_kafala == 2) {
                            $not_guaranteed = $not_guaranteed + 1;
                        } elseif ($row->second_halet_kafala == 1) {
                            $guaranteed = $guaranteed + 1;
                        }
                    }
                    if ($row->second_kafala_type == 0) {
                        $not_guaranteed = $not_guaranteed + 1;
                    }
                }
                $x++;
            }
            $values['num'] = $query->num_rows();
            $values['guaranteed'] = round($guaranteed / 2);
            $values['not_guaranteed'] = round($not_guaranteed / 2);
            return $values;
        } else {
            return 0;
        }
    }

    public function getMembersArmal2($arr)
    {
        $query = $this->db->select('mother.*, basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
     files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
     ')
            ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
            ->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
            ->where($arr)
            ->where('basic.file_status', 1)
            ->get('mother');
        if ($query->num_rows() > 0) {
            $not_guaranteed = 0;
            $guaranteed = 0;
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->num_rows = $query->num_rows();
                $date_of_now = strtotime(date('Y-m-d'));
                if ($row->first_halet_kafala == 2) {
                    $not_guaranteed = $not_guaranteed + 1;
                } elseif ($row->first_halet_kafala == 1) {
                    $guaranteed = $guaranteed + 1;
                } else {
                    $not_guaranteed = $not_guaranteed + 1;
                }
                $data[$x]->guaranteed = round($guaranteed);
                $data[$x]->not_guaranteed = round($not_guaranteed);
                $x++;
            }
            $values['num'] = $query->num_rows();
            $values['guaranteed'] = round($guaranteed);
            $values['not_guaranteed'] = round($not_guaranteed);
            return $values;
        } else {
            return 0;
        }
    }

    public function getMembers2($arr)
    {
        $query = $this->db->select('f_members.first_halet_kafala,f_members.second_halet_kafala,f_members.categoriey_member,f_members.mother_national_num_fk,f_members.id,
     f_members.first_k_id,f_members.first_kafala_type
    ,f_members.first_to, f_members.second_k_id,f_members.second_to,
    basic.file_num, basic.mother_national_num  as num 
        ')
            ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
            ->where('basic.final_suspend', 4)
            ->where('basic.file_status', 1)
            ->where($arr)
            ->order_by("basic.file_num", "ASC")
            ->get('f_members');
        if ($query->num_rows() > 0) {
            $not_guaranteed = 0;
            $guaranteed = 0;
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->num_rows = $query->num_rows();
                if ($row->categoriey_member == 3) {
                    if ($row->first_halet_kafala == 2) {
                        $not_guaranteed = $not_guaranteed + 1;
                    } elseif ($row->first_halet_kafala == 1) {
                        $guaranteed = $guaranteed + 1;
                    } elseif ($row->first_halet_kafala == 0) {
                        $not_guaranteed = $not_guaranteed + 1;
                    }
                }
                $x++;
            }
            $values['num'] = $query->num_rows();
            $values['guaranteed'] = round($guaranteed);
            $values['not_guaranteed'] = round($not_guaranteed);
            return $values;
        } else {
            return 0;
        }
    }

    public function GetAll()
    {
        $data['aytam'] = $this->getMembers3(
            array('categoriey_member' => 2, 'persons_status' => 1));
        $data['armal'] = $this->getMembersArmal2(
            array('mother.categoriey_m' => 1, 'mother.halt_elmostafid_m' => 1, 'mother.person_type' => 62));
        $data['mostafed'] = $this->getMembers2(
            array('categoriey_member' => 3, 'persons_status' => 1));
        return $data;
    }

    public function check_login()
    {
        $memb_user_name = $this->input->post('memb_user_name');
        $pass = sha1(md5($this->input->post('memb_password')));
        $this->db->where('memb_user_name', $memb_user_name);
        $this->db->where('memb_password', $pass);
        $this->db->where('suspend', 1);
        $q = $this->db->get('md_all_gam3ia_omomia_members')->row_array();
        //$q = $this->db->where('memb_user_name', $memb_user_name)->get('md_all_gam3ia_omomia_members_accounts')->row_array();
        if (!empty($q)) {
            return $q;
        }
    }

    public function get_by_member_id($val, $field, $table)
    {
        $this->db->where($field, $val);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_arf_orders()
    {
        $data = array();
        for ($x = 1; $x <= 12; $x++) {
            $this->db->select_sum('value');
            $this->db->where('mon_melady', $x);
            // $this->db->where('sarf_date', $x);
            $query = $this->db->get('finance_sarf_order');
            if ($query->num_rows() > 0) {
                array_push($data, $query->row()->total_value);
            } else {
                array_push($data, 0);
            }
        }
        return $data;
    }

    /*****************************************************************************/
    public function get_all_files()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend", 4);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_all_files_active()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend", 4);
        $this->db->where("file_status", 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_all_files_non_active()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend", 4);
        $this->db->where("file_status", 4);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_all_talabat()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend !=", 4);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    /*******************************************/
    public function get_mostafed()
    {
        $this->db->select('basic.* , f_members.mother_national_num_fk ,f_members.id');
        $this->db->from("basic");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->where("basic.final_suspend", 4); // ""
        $this->db->where("basic.file_status", 1);
        $this->db->where("f_members.categoriey_member ", 3);
        // $this->db->where("halt_elmostafid_member",1);
        $this->db->where("f_members.persons_status", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    public function get_yatem()
    {
        $this->db->select('basic.* , f_members.mother_national_num_fk ,f_members.id');
        $this->db->from("basic");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->where("basic.final_suspend", 4); // ""
        $this->db->where("basic.file_status", 1);
        $this->db->where("f_members.categoriey_member ", 2);
        // $this->db->where("halt_elmostafid_member",1);
        $this->db->where("f_members.persons_status", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    public function get_mother_num()
    {
        $this->db->select('basic.* , mother.mother_national_num_fk ,mother.id');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->where("basic.final_suspend", 4); // ""
        $this->db->where("basic.file_status", 1);
        $this->db->where("mother.categoriey_m ", 1);
        $this->db->where("mother.halt_elmostafid_m", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    /************************/
    public function update_note($id)
    {
        $data['note'] = $this->chek_Null($this->input->post('note'));
        $this->db->where('id', $id);
        $this->db->update('md_all_gam3ia_omomia_members', $data);
    }
    // public function get_all_da3wat()
    // {
    //     $galsa_rkm = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
    //     return $this->db->where('mem_id_fk', $_SESSION['id'])
    //         ->where('galsa_rkm', $galsa_rkm)
    //         ->get('md_da3wat_gam3ia_omomia')->row();
    // }
    public function dawa_reply($file)
    {
        $data['action_dawa'] = $this->chek_Null($this->input->post('action_dawa'));
        if ($data['action_dawa'] == 3) {
            $data['mofawad_name'] = $this->chek_Null($this->input->post('mofawad_name'));
            $data['mofawad_card_num'] = $this->chek_Null($this->input->post('mofawad_card_num'));
            $data['mofawad_moefaq'] = $file;
        } else {
            $data['mofawad_name'] = null;
            $data['mofawad_card_num'] = null;
            $data['mofawad_moefaq'] = null;
        }
        $this->db->where('mem_id_fk', $_SESSION['id'])
            ->update('md_da3wat_gam3ia_omomia', $data);
    }

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

//yara
    public function add_setting_mo2hl($type)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('mo2hl'));
        $data['type'] = $type;
        $this->db->insert('employees_settings', $data);
    }

    public function add_setting_esdar($type)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('esdar'));
        $data['type'] = $type;
        $this->db->insert('employees_settings', $data);
    }

    public function update_setting_mo2hl($type, $id)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('mo2hl'));
        $data['type'] = $type;
        $this->db->where('id_setting', $id)->update('employees_settings', $data);
    }

    public function update_setting_esdar($type, $id)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('esdar'));
        $data['type'] = $type;
        $this->db->where('id_setting', $id)->update('employees_settings', $data);
    }

    public function delete_setting_mo2hl($id)
    {
        $this->db->where("id_setting", $id);
        $this->db->delete("employees_settings");
    }

    public function GetFromGeneral_settings_mo2hl($id, $type)
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where('type', $type);
        $this->db->where('id_setting', $id);
        $query = $this->db->get()->row();
        return $query;
    }
///yara
//yara
    public function add_setting($type)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('mhna'));
        $data['type'] = $type;
        $this->db->insert('md_settings', $data);
    }

    public function update_setting($type, $id)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('mhna'));
        $data['type'] = $type;
        $this->db->where('id_setting', $id)->update('md_settings', $data);
    }

    public function delete_setting($id)
    {
        $this->db->where("id_setting", $id);
        $this->db->delete("md_settings");
    }

    public function GetFromGeneral_settings($id, $type)
    {
        $this->db->select('*');
        $this->db->from('md_settings');
        $this->db->where('type', $type);
        $this->db->where('id_setting', $id);
        $query = $this->db->get()->row();
        return $query;
    }

//rehab
    public function getById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('md_all_gam3ia_omomia_members');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->odwiat = $this->get_odwiat($row->id);
                $data[$i]->last_odwiat = $this->get_last_odwiat($row->id);
                $i++;
            }
            return $data;
            //  return $query->row();
        }
        return 0;
    }

    //new function
    public function get_last_odwiat($id)
    {
        $this->db->where('member_id_fk', $id);
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_last_odwiat');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $data->eshtrak_years = unserialize($data->eshtrak_years);
            return $data;
        }
        return false;
    }

    public function update_gam3ia_odwiat()
    {
        $id = $this->input->post('member_id_fk');
        $data['member_id_fk'] = $id;
        $data['no3_odwia_fk'] = $this->chek_Null($this->input->post('no3_odwia_fk'));
        $data['no3_odwia_title'] = $this->input->post('no3_odwia_title');
        $data['rkm_odwia_full'] = $this->chek_Null($this->input->post('rkm_odwia_full'));
        $array = explode("/", $data['rkm_odwia_full']);
        $data['rkm_odwia'] = $this->chek_Null($array[0]);
        $data['qrar_rkm'] = $this->chek_Null($this->input->post('qrar_rkm'));
        $qrar_date = date('m-d-Y', strtotime($this->input->post('qrar_date')));
        $data['qrar_date_m'] = str_replace('-', '/', $qrar_date);
        $update_date_m = date('m-d-Y', strtotime($this->input->post('update_date_m')));
        $data['update_date_m'] = str_replace('-', '/', $update_date_m);
        $from_date = date('m-d-Y', strtotime($this->input->post('subs_from_date_m')));
        $data['subs_from_date_m'] = str_replace('-', '/', $from_date);
        $to_date = date('m-d-Y', strtotime($this->input->post('subs_to_date_m')));
        $data['subs_to_date_m'] = str_replace('-', '/', $to_date);
        $data['subs_value'] = $this->chek_Null($this->input->post('subs_value'));
        $data['pay_method_fk'] = $this->chek_Null($this->input->post('pay_method_fk'));
        $pay_method_fk = $this->input->post('pay_method_fk');
        $pay_arr = array(1 => 'نقدي', 2 => 'شيك', 3 => 'شبكة', 4 => 'إيداع نقدي', 5 => 'إيداع شيك', 6 => 'تحويل', 7 => 'أمر مستديم');
        $data['pay_method_title'] = $pay_arr[$pay_method_fk];
        if ($this->input->post('bank_id_fk')) {
            $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
            $bank_id_fk = $this->input->post('bank_id_fk');
            $bank_title = $this->get_id('banks_settings', 'id', $bank_id_fk, 'title');
            $data['bank_title'] = $bank_title;
        }
        if ($this->input->post('rkm_hesab')) {
            $data['rkm_hesab'] = $this->chek_Null($this->input->post('rkm_hesab'));
        }
        $num = $this->get_num('member_id_fk', $id, 'md_all_gam3ia_omomia_odwiat');
        if ($num == 0) {
            $this->db->insert('md_all_gam3ia_omomia_odwiat', $data);
        } else {
            $this->db->where('member_id_fk', $id);
            $this->db->update('md_all_gam3ia_omomia_odwiat', $data);
        }
    }

    public function update_gam3ia_last_odwiat()
    {
        $id = $this->input->post('member_id_fk');
        $data['member_id_fk'] = $id;
        $data['value'] = $this->chek_Null($this->input->post('value'));
        $data['rkm_esal'] = $this->chek_Null($this->input->post('rkm_esal'));
        $data['pay_date'] = $this->input->post('pay_date');
        $data['pay_method_fk'] = $this->chek_Null($this->input->post('pay_method_fk'));
        $data['from_y'] = $this->chek_Null($this->input->post('from_y'));
        $data['to_y'] = $this->chek_Null($this->input->post('to_y'));
        /*  $eshtrak_years = $this->input->post('eshtrak_years');
          if (!empty($eshtrak_years)) {
              $years_arr['eshtrak_years'] = array();
              for ($i = 0; $i < sizeof($eshtrak_years); $i++) {
                  array_push($years_arr['eshtrak_years'], $eshtrak_years[$i]);
              }
          }
          $data['eshtrak_years'] = serialize($years_arr);
          */
        $num = $this->get_num('member_id_fk', $id, 'md_all_gam3ia_omomia_last_odwiat');
        if ($num == 0) {
            $this->db->insert('md_all_gam3ia_omomia_last_odwiat', $data);
        } else {
            $this->db->where('member_id_fk', $id);
            $this->db->update('md_all_gam3ia_omomia_last_odwiat', $data);
        }
    }

    public function get_num($field, $id, $table)
    {
        $this->db->where($field, $id);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function select_banks()
    {
        $this->db->order_by("id", "asc");
        $query = $this->db->get("banks_settings");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

//////yara7-5-2020
    public function insert_attach($id, $images)
    {
        if (isset($images) && !empty($images)) {
            $count = count($images);
            for ($x = 0; $x < $count; $x++) {
                $data['title'] = $this->input->post('title');
                $data['file'] = $images[$x];
                $data['mem_id_fk'] = $id;
                $data['date'] = strtotime(date("Y-m-d"));
                $data['date_ar'] = date("Y-m-d");
                $data['publisher'] = $_SESSION['id'];
                $data['publisher_name'] = $_SESSION['name'];
                $this->db->insert('md_all_gam3ia_omomia_morfq', $data);
            }
        }
    }

    public function delete_morfq($id)
    {
        $this->db->where('id', $id)->delete('md_all_gam3ia_omomia_morfq');
    }

    public function get_morfq_by_id($id)
    {
        $this->db->where('mem_id_fk', $id);
        $query = $this->db->get('md_all_gam3ia_omomia_morfq');
        return $query->result();
    }

    public function get_images($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('md_all_gam3ia_omomia_morfq');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_table($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_table_by_id($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table)->row();
        return $query;
    }
// yara12-5-2020
    /*
    public function get_all_active_magles()
    {
        $q = $this->db->get('md_all_mgales_edara')->result();
            return $q;
    }
    */
    /*
    public function select_all_magls_edara_members($id)
        {
            $this->db->select('*');
            $this->db->from('md_all_magls_edara_members');
            $this->db->where('mgls_code', $id);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $i = 0;
                foreach ($query->result() as $row) {
                    $data[$i] = $row;
                    $data[$i]->details_edow = $this->get_details_edow($row->mem_id_fk);
                    $i++;
                }
                return $data;
            } else {
                return false;
            }
        }*/
    public function select_all_magls_edara_members($id, $arr = false, $arrnot = false)
    {
        $this->db->select('*');
        $this->db->from('md_all_magls_edara_members');
        $this->db->where('mgls_code', $id);
        if (!empty($arr)) {
            $this->db->where($arr);
        } else if (!empty($arrnot)) {
            $this->db->where_not_in('mansp_fk', $arrnot);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->details_edow = $this->get_details_edow($row->mem_id_fk);
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_details_edow($mem_id_fk)
    {
        $this->db->where('id', $mem_id_fk);
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    //yara13-5-2020
    public function select_all_by_fr_all_pills_all()
    {
        $this->db->select('*');
        $this->db->from('fr_all_pills');
        $this->db->order_by("id", "DESC");
        $this->db->where('person_type', 3);
        $this->db->where('person_id_fk', $_SESSION['id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->pill_type_title = $this->GetTitleFromFr_bnod_pills_setting($row->pill_type);
                $data[$x]->Fe2a_title = $this->GetFe2aTitle($row->fe2a_id_fk);
                $data[$x]->erad_title = $this->GetTitleFromFr_bnod_pills_setting($row->erad_type);
                $data[$x]->fe2a_type_title = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type1);
                if (!empty($row->person_type)) {
                    $data[$x]->MemberDetails = $this->GetMemberNameByID($row->person_id_fk, $row->person_type);
                }
                $data[$x]->band_title = $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type1);
                if (!empty($row->bnd_type2)) {
                    $data[$x]->band_title2 = $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type2);
                }
                $data[$x]->bank_title = $this->GetBankTitle($row->bank_id_fk);
                $data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
                $data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);
                //$data[$x]->attaches = $this->getAttachesByRkm($row->pill_num);
                $x++;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function GetTitleFromFr_bnod_pills_setting($id)
    {
        $h = $this->db->get_where("fr_bnod_pills_setting", array('from_id' => $id));
        $arr = $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        } else {
            return 0;
        }
    }

    public function GetFe2aTitle($id)
    {
        $h = $this->db->get_where("fr_sponser_donors_setting", array('id' => $id));
        $arr = $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        } else {
            return 0;
        }
    }

    public function GetMemberNameByID($id, $type)
    {
        $arr_type = array(1 => 'fr_sponsor', 2 => 'fr_donor', 3 => 'general_assembley_members', '6' => 'fr_sponsor_orders');
        $h = $this->db->get_where($arr_type[$type], array('id' => $id));
        $arr = $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr;
        } else {
            return 0;
        }
    }

    public function GetTitleFromFr_bnod_pills_settingByCode($id)
    {
        $h = $this->db->get_where("fr_bnod_pills_setting", array('code' => $id));
        $arr = $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        } else {
            return 0;
        }
    }

    public function GetBankTitle($id)
    {
        $h = $this->db->get_where("banks_settings", array('id' => $id));
        $arr = $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        } else {
            return 0;
        }
    }

    public function GetAccountName($id)
    {
        $h = $this->db->get_where("society_main_banks_account", array('id' => $id));
        if ($h->num_rows() > 0) {
            return $h->row_array()['title'];
        } else {
            return 0;
        }
    }

    public function GetAccountNum($id)
    {
        $h = $this->db->get_where("society_main_banks_account", array('id' => $id));
        if ($h->num_rows() > 0) {
            return $h->row_array()['account_num'];
        } else {
            return 0;
        }
    }

    //yara
    public function get_esalat_orders()
    {
        $data = array();
        for ($x = 1; $x <= 12; $x++) {
            $this->db->select_sum('value');
            $this->db->where('person_type', 3);
            $this->db->where('person_id_fk', $_SESSION['id']);
//mon_melady
            // $this->db->where('pill_month', $x);
            $query = $this->db->get('fr_all_pills');
            if ($query->num_rows() > 0) {
                array_push($data, $query->row()->value);
            } else {
                array_push($data, 0);
            }
        }
        return $data;
    }

    public function display_publisher_data($limit = false, $arr = false)
    {
        $this->db->select('*');
        $this->db->from('md_news');
        if ($limit != false) {
            $this->db->limit($limit);
        }
        if ($arr != false) {
            $this->db->where($arr);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->img = $this->get_publisher_photos($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function get_publisher_photos($id)
    {
        $this->db->select('*');
        $this->db->from('md_news_attachment');
        $this->db->where('news_id_fk', $id);
        $this->db->where('suspend', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_publisher_single_photos($id)
    {
        $this->db->select('file');
        $this->db->from('md_news_attachment');
        $this->db->where('news_id_fk', $id);
        $this->db->where('suspend', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->file;
        }
        return false;
    }

    public function get_project_details($id)
    {
        $this->db->select('*');
        $this->db->from('md_news');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[0] = $row;
                $data[0]->photos = $this->get_details_by_id('md_news_attachment', $id, 1);
                $data[0]->videos = $this->get_details_by_id('md_news_attachment', $id, 2);
            }
            return $data;
            // return $query->result();
        }
        return false;
    }

    public function get_details_by_id($table, $id, $type)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('news_id_fk', $id);
        $this->db->where('suspend !=', 1);
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_by_options($table, $where_arr = false, $select = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
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

    public function add_contact($file)
    {
        $contact_type_fk = $this->input->post('contact_type_fk');
        if (!empty($contact_type_fk)) {
            $contact_typ_arr = explode('-', $contact_type_fk);
            $data['contact_type_fk'] = $contact_typ_arr[0];
            $data['contact_type_n'] = $contact_typ_arr[1];
            $data['contact_type_n'] = $contact_typ_arr[1];
        }
        $data['content'] = strip_tags($this->input->post('content'));
        if (!empty($file)) {
            $data['file_attach_name'] = $file;
        }
        $data['publisher'] = $this->input->post('card_num');
        $data['publisher_name'] = $this->input->post('name');
        $data['date_ar'] = date('Y-m-d');
        $data['date'] = strtotime(date('Y-m-d'));
        $data['time'] = date('h:i A');
        $data['jwal'] = $this->input->post('jwal');
        $this->db->insert('md_gam3ia_contact', $data);
    }

    public function get_all_messags($card_num)
    {
        $this->db->where("publisher", $card_num);
        $query = $this->db->get('md_gam3ia_contact');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->contact_type_color = $this->get_color($row->contact_type_fk);
                $data[$i]->egraa_color = $this->get_color($row->egraa_id_fk);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function get_color($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get('md_gam3ia_contact_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->color;
        }
        return false;
    }

    public function get_message_by_id($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get('md_gam3ia_contact');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

//--------------------------------------------------------------------------------
    public function get_emp_Edara_tanfezia($arr = false, $arrnot = false)
    {
        $this->db->order_by('emp_order');
        if (!empty($arr)) {
            $this->db->where($arr);
        } else {
            $this->db->where_not_in('job_title_name', $arrnot);
        }
        $query = $this->db->get('pr_edara_tanfezia');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->emp = $this->get_emp_details($row->emp_id_fk);
                $data[$i]->degree_name = $this->get_degree($data[$i]->emp->degree_id);
                $i++;
            }
            return $data;
        }
        return false;
    }

    /*  public function get_emp_Edara_tanfezia(){
          $this->db->order_by('emp_order');
          $query = $this->db->get('pr_edara_tanfezia');
          if ($query->num_rows()>0){
              $i = 0;
              foreach ($query->result() as $row){
                  $data[$i]= $row;
                  $data[$i]->emp= $this->get_emp_details($row->emp_id_fk);
                  $data[$i]->degree_name= $this->get_degree($data[$i]->emp->degree_id);
                  $i++;
              }
              return $data;
          }
          return false;
      }*/
    public function get_emp_details($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    public function get_degree($id)
    {
        $this->db->where('defined_id', $id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        }
        return false;
    }

    /*   public function get_main_plans()
       {
           $this->db->select('*');
           $this->db->from("pr_plans");
           $this->db->order_by('year','desc');
           $this->db->group_by('year');
           $query = $this->db->get();
           if ($query->num_rows() > 0) {
               $x=0;
               foreach ($query->result() as $row){
                   $data[$x] =$row;
                   $data[$x]->details =$this->get_details($row->year);
                   $x++;}
               return $data;
           }
           return false;
       }
   */
    public function get_main_plans_2($type)
    {
        $this->db->select('*');
        $this->db->from("pr_plans");
        $this->db->where("type", $type);
        //  $this->db->order_by('year','desc');
//    $this->db->group_by('year');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;
        }
        return false;
    }

    public function get_main_plans($type)
    {
        $this->db->select('*');
        $this->db->from("pr_plans");
        $this->db->where("type", $type);
        //  $this->db->order_by('year','desc');
//    $this->db->group_by('year');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->details = $this->get_details($row->year);
                $x++;
            }
            return $data;
        }
        return false;
    }

    public function get_main_plan_count($table)
    {
        return $this->db->count_all($table);
    }

    public function get_count_type($table, $type)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("type", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return count($data);
        }
        return false;
    }

    public function get_details($year)
    {
        $this->db->select('*');
        $this->db->from('pr_plans');
        $this->db->where('year', $year);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
////yara17-5-2020
//////////////////////////////////////////////////
    /*public function ge_current_vote(){
        $x=strtotime(date("Y-m-d"));
        $this->db->where('vote_status',1);
        $this->db->where('date',$x);
        $query = $this->db->get('md_vote')->row();
            return $query;
    }*/
    public function ge_current_vote()
    {
        //$x=strtotime(date("Y-m-d"));
        $this->db->where('vote_status', 1);
        $this->db->limit(1);
        $this->db->order_by("id", 'asc');
        //  $this->db->where('date',$x);
        $query = $this->db->get('md_vote')->row();
        return $query;
    }

    public function add_vote()
    {
        $data['vote_id_fk'] = $this->input->post('quest');
        $data['answer'] = $this->input->post('answer');
        $data['mem_id_fk'] = $_SESSION['id'];
        $data['mem_name'] = $_SESSION['name'];;
        $data['date'] = strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d H:i:s');
        $this->db->insert('md_vote_gam3ia_omomia_member', $data);
    }

    public function check_current_vote($vote_id)
    {
        $this->db->select('*');
        $this->db->from('md_vote_gam3ia_omomia_member');
        $this->db->where('vote_id_fk', $vote_id);
        $this->db->where('mem_id_fk ', $_SESSION['id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function get_voteing($vote_id)
    {
        $this->db->select('*');
        $this->db->from('md_vote_gam3ia_omomia_member');
        $this->db->where('vote_id_fk', $vote_id);
        $this->db->where('mem_id_fk ', $_SESSION['id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->answer;
        } else {
            return 0;
        }
    }

    public function get_percentage($vote_id)
    {
        $this->db->select('*');
        $this->db->from('md_vote_gam3ia_omomia_member');
        $this->db->where('vote_id_fk', $vote_id);
        return $this->db->count_all_results();
    }

    public function get_percentage_pos($vote_id)
    {
        $this->db->select('*');
        $this->db->from('md_vote_gam3ia_omomia_member');
        $this->db->where('vote_id_fk', $vote_id);
        $this->db->where('answer', 1);
        return $this->db->count_all_results();
    }

    public function get_percentage_neg($vote_id)
    {
        $this->db->select('*');
        $this->db->from('md_vote_gam3ia_omomia_member');
        $this->db->where('vote_id_fk', $vote_id);
        $this->db->where('answer', 2);
        return $this->db->count_all_results();
    }

// gam3ia
    public function get_last_galesat_status()
    {
        return $this->db->select('*')->where('glsa_finshed', 1)->where('status', 1)->get('md_all_glasat_gam3ia_omomia')->result();
    }

    public function get_last_galesat()
    {
        return $this->db->select('*')->where('glsa_finshed', 1)->get('md_all_glasat_gam3ia_omomia')->result();
    }

    /*public function get_open_galesa(){
        $this->db->select('*');
        $this->db->from("md_all_glasat_gam3ia_omomia");
        $this->db->where('glsa_finshed', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row){
                $data[$a] =$row;
                $data[$a]->mehwr_num =$this->get_mehwr($row->glsa_rkm);
                $data[$a]->mehwr_details =$this->get_mehwr_details($row->glsa_rkm);
                $data[$a]->qrar_num =$this->get_qrar($row->glsa_rkm);
                $data[$a]->qrar_details =$this->get_qrar_details($row->glsa_rkm);
                $data[$a]->glsa_members_num =$this->get_glasat_hdoor_num($row->glsa_rkm,NULL);
                $data[$a]->glsa_members_hdoor_num =$this->get_glasat_hdoor_num($row->glsa_rkm,1);
                $data[$a]->glsa_members_absent_num =$this->get_glasat_hdoor_num($row->glsa_rkm,0);
                $data[$a]->glsa_members =$this->get_glasat_hdoor($row->glsa_rkm);
                //$data[$a]->galsa_finish =$this->get_galsa_finish($row->glsa_rkm)['glsa_finshed'];
                $a++;}
            return $data;
        }else{
            return false;
        }
    }*/
    public function get_open_galesa()
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat_gam3ia_omomia");
        $this->db->where('glsa_finshed', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->mehwr_num = $this->get_mehwr($row->glsa_rkm);
                $data[$a]->mehwr_details = $this->get_mehwr_details($row->glsa_rkm);
                $data[$a]->qrar_num = $this->get_qrar($row->glsa_rkm);
                $data[$a]->qrar_details = $this->get_qrar_details($row->glsa_rkm);
                $data[$a]->glsa_members_num = $this->get_glasat_hdoor_num($row->glsa_rkm, NULL);
                $data[$a]->glsa_members_hdoor_num = $this->get_glasat_hdoor_num($row->glsa_rkm, 1);
                $data[$a]->glsa_members_absent_num = $this->get_glasat_hdoor_num($row->glsa_rkm, 0);
                $data[$a]->glsa_members = $this->get_glasat_hdoor($row->glsa_rkm);
                $data[$a]->d3wa_details = $this->get_d3wa_details($row->glsa_rkm);
                $data[$a]->glsa_members_all = $this->get_glasat_hdoor_da3wat_num($row->glsa_rkm, 10);
                $data[$a]->glsa_members_accept = $this->get_glasat_hdoor_da3wat_num($row->glsa_rkm, 1);
                $data[$a]->glsa_members_refuse = $this->get_glasat_hdoor_da3wat_num($row->glsa_rkm, 2);
                $data[$a]->glsa_members_wait = $this->get_glasat_hdoor_da3wat_num($row->glsa_rkm, 0);
                $data[$a]->glsa_members_no_action = $this->get_glasat_hdoor_da3wat_num($row->glsa_rkm, 5);
                $data[$a]->makn_en3qd_name = $this->get_makn_en3qd($row->makn_en3qd);
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_open_galesa_new()
    {
        $this->db->select('md_all_glasat_gam3ia_omomia.*,md_settings.title_setting as makn_en3qd_name ');
        $this->db->from("md_all_glasat_gam3ia_omomia");
        $this->db->join('md_settings', 'md_settings.id_setting = md_all_glasat_gam3ia_omomia.makn_en3qd', "left");
        $this->db->where('glsa_finshed', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                //  $data[$a]->mehwr_num =$this->get_mehwr($row->glsa_rkm);
                //   $data[$a]->mehwr_details =$this->get_mehwr_details($row->glsa_rkm);
                //   $data[$a]->qrar_num =$this->get_qrar($row->glsa_rkm);
                //  $data[$a]->qrar_details =$this->get_qrar_details($row->glsa_rkm);
                // $data[$a]->glsa_members_num =$this->get_glasat_hdoor_num($row->glsa_rkm,NULL);
                //  $data[$a]->glsa_members_hdoor_num =$this->get_glasat_hdoor_num($row->glsa_rkm,1);
                //  $data[$a]->glsa_members_absent_num =$this->get_glasat_hdoor_num($row->glsa_rkm,0);
                //  $data[$a]->glsa_members =$this->get_glasat_hdoor($row->glsa_rkm);
                //  $data[$a]->d3wa_details =$this->get_d3wa_details($row->glsa_rkm);
                $data[$a]->glsa_members_all = $this->get_glasat_hdoor_da3wat_num($row->glsa_rkm, 10);
                $data[$a]->glsa_members_accept = $this->get_glasat_hdoor_da3wat_num($row->glsa_rkm, 1);
                $data[$a]->glsa_members_refuse = $this->get_glasat_hdoor_da3wat_num($row->glsa_rkm, 2);
                $data[$a]->glsa_members_wait = $this->get_glasat_hdoor_da3wat_num($row->glsa_rkm, 0);
                $data[$a]->glsa_members_no_action = $this->get_glasat_hdoor_da3wat_num($row->glsa_rkm, 5);
                //   $data[$a]->makn_en3qd_name =$this->get_makn_en3qd($row->makn_en3qd);
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_makn_en3qd($makn_en3qd)
    {
        $h = $this->db->get_where("md_settings", array('id_setting' => $makn_en3qd, 'type' => 5));
        $arr = $h->row_array();
        return $arr['title_setting'];
    }

    public function get_glasat_hdoor($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat_hdoor_gam3ia_omomia");
        $this->db->where("glsa_rkm", $glsa_rkm);
        //  $this->db->order_by("mansp_fk",'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->start_laqb = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk), 'laqb_title');
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_glasat_hdoor_da3wat_num($glsa_rkm, $attend)
    {
        $this->db->select('*');
        $this->db->from("md_da3wat_gam3ia_omomia");
        $this->db->where("galsa_rkm", $glsa_rkm);
        if ($attend == 1) {
            $this->db->where('action_dawa', 'accept');
        } elseif ($attend == 2) {
            $this->db->where('action_dawa', 'refuse');
        } elseif ($attend == 0) {
            $this->db->where('action_dawa', 'wait');
        } elseif ($attend == 5) {
            $this->db->where('action_dawa', NULL);
        } elseif ($attend == 10) {
        }
        //  $query = $this->db->get('md_da3wat_gam3ia_omomia');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_glasat_hdoor_num($glsa_rkm, $type)
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat_hdoor_gam3ia_omomia");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->where("hdoor_satus", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_mehwr($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal_gam3ia_omomia");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_qrar($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal_gam3ia_omomia");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->where('elqrar_add', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_mehwr_details($glsa_rkm)
    {
        //   $glsa_rkm = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal_gam3ia_omomia");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->order_by('mehwar_rkm');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

//yara16-7-2020
    public function get_mehwr_details_dash()
    {
        $glsa_rkm = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal_gam3ia_omomia");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->order_by('mehwar_rkm');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    //yara16-7-2020
    public function get_all_details_accept($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        $this->db->where('action_dawa', 'accept');
        $query = $this->db->get('md_da3wat_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
                $query[$key]->odwiat_data = $this->get_by_mem('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
            }
            return $query;
        } else {
            return false;
        }
    }

    //yaraa16-7-2020
    public function get_all_details($rkm)
    {
        $this->db->where('galsa_rkm', $rkm);
        $query = $this->db->get('md_da3wat_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
                $query[$key]->odwiat_data = $this->get_by_mem('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
            }
            return $query;
        } else {
            return false;
        }
    }

    //yaraa16-7-2020
    public function get_by_mem($table, $where_arr, $select = false)
    {
        $q = $this->db->where($where_arr)
            ->get($table)->row();
        if (!empty($q)) {
            if (!empty($select)) {
                return $q->$select;
            } else {
                return $q;
            }
        } else {
            return false;
        }
    }
    //  public function get_all_da3wat()
    // {
    //     $galsa_rkm = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
    //     return $this->db->where('mem_id_fk', $_SESSION['id'])
    //         ->where('galsa_rkm', $galsa_rkm)
    //         ->get('md_da3wat_gam3ia_omomia')->row();
    // }
    public function get_all_da3wat()
    {
        $rkm = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        $this->db->where('galsa_rkm', $rkm);
        $query = $this->db->get('md_da3wat_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
                $query[$key]->odwiat_data = $this->get_by_mem('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
            }
            return $query;
        } else {
            return false;
        }
    }

    public function get_qrar_details()
    {
        $glsa_rkm = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal_gam3ia_omomia");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_da3wa()
    {
        $galsa_rkm = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        return $this->db->where('mem_id_fk', $_SESSION['id'])
            ->where('galsa_rkm', $galsa_rkm)
            ->get('md_da3wat_gam3ia_omomia')->row();
    }

    /*  public function reply_dawa()
      {
          $data['action_dawa'] = $this->chek_Null($this->input->post('action'));
          $this->db->where('mem_id_fk', $_SESSION['id'])
              ->update('md_da3wat_gam3ia_omomia', $data);
      }*/
    public function reply_dawa()
    {
        $data['action_dawa'] = $this->chek_Null($this->input->post('action'));
        if ($data['action_dawa'] == 'refuse') {
            $data['reason_refuse'] = $this->chek_Null($this->input->post('reason'));
        }
        $data['action_time'] = date('H:m:s');
        $data['action_date'] = date('Y-m-d');
        $this->db->where('mem_id_fk', $_SESSION['id'])
            ->update('md_da3wat_gam3ia_omomia', $data);
    }

    //new_funcccc
    public function get_action_da3wa()
    {
        $galsa_rkm = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        return $this->db->where('mem_id_fk', $_SESSION['id'])
            ->where('galsa_rkm', $galsa_rkm)
            ->where('action_dawa', NULL)
            ->get('md_da3wat_gam3ia_omomia')->row();
    }

    public function getAhai($id)
    {
        $this->db->where('from_id_fk', $id);
        $query = $this->db->get("cities");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_action_da3wa_new()
    {
        $galsa_rkm = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        return $this->db->where('mem_id_fk', $_SESSION['id'])
            ->where('galsa_rkm', $galsa_rkm)
            // ->where('action_dawa', NULL)
            ->get('md_da3wat_gam3ia_omomia')->row();
    }
    /**********************************************/
    // yara18-5-2020
    public function get_all_active_magles()
    {
        $q = $this->db->where('suspend', 0)->get('md_all_mgales_edara')->result();
        return $q;
    }

    public function get_last_galesat_magles()
    {
        return $this->db->select('*')->where('glsa_finshed', 1)->get('md_all_glasat')->result();
    }
    /*  public function get_open_galesa_magles(){
          $this->db->select('*');
          $this->db->from("md_all_glasat");
          $this->db->where('glsa_finshed', 0);
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
              $a=0;
              foreach ($query->result() as $row){
                  $data[$a] =$row;
                  $data[$a]->mehwr_num =$this->get_mehwr_magles($row->glsa_rkm);
               //   $data[$a]->mehwr_details =$this->get_mehwr_details($row->glsa_rkm);
                  $data[$a]->glsa_members_num =$this->get_glasat_hdoor_magles_num($row->glsa_rkm,NULL);
                  $data[$a]->glsa_members_hdoor_num =$this->get_glasat_hdoor_magles_num($row->glsa_rkm,1);
                  $data[$a]->glsa_members_absent_num =$this->get_glasat_hdoor_magles_num($row->glsa_rkm,0);
                //  $data[$a]->glsa_members =$this->get_glasat_hdoor($row->glsa_rkm);
                  //$data[$a]->galsa_finish =$this->get_galsa_finish($row->glsa_rkm)['glsa_finshed'];
                  $a++;}
              return $data;
          }else{
              return false;
          }
      }*/
    /* public function get_open_galesa_magles(){
         $this->db->select('*');
         $this->db->from("md_all_glasat");
         $this->db->where('glsa_finshed', 0);
         $this->db->order_by('glsa_rkm', 'DESC');
         $this->db->limit(1);
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $a=0;
             foreach ($query->result() as $row){
                 $data[$a] =$row;
                 $data[$a]->mehwr_num =$this->get_mehwr_magles($row->glsa_rkm);
                 //   $data[$a]->mehwr_details =$this->get_mehwr_details($row->glsa_rkm);
                 $data[$a]->glsa_members_num =$this->get_glasat_hdoor_magles_num($row->glsa_rkm,NULL);
                 $data[$a]->glsa_members_hdoor_num =$this->get_glasat_hdoor_magles_num($row->glsa_rkm,1);
                 $data[$a]->glsa_members_absent_num =$this->get_glasat_hdoor_magles_num($row->glsa_rkm,0);
                 //  $data[$a]->glsa_members =$this->get_glasat_hdoor($row->glsa_rkm);
                 //$data[$a]->galsa_finish =$this->get_galsa_finish($row->glsa_rkm)['glsa_finshed'];
                 $a++;}
             return $data;
         }else{
             return false;
         }
     }*/
    public function get_open_galesa_magles()
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat");
        $this->db->where('glsa_finshed', 0);
        $this->db->order_by('glsa_rkm', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->mehwr_num = $this->get_mehwr_magles($row->glsa_rkm);
                $data[$a]->qrar_num = $this->get_qrar_magles($row->glsa_rkm);
                $data[$a]->mehwr_details = $this->get_mehwr_details_magles($row->glsa_rkm);
                $data[$a]->glsa_members_num = $this->get_glasat_hdoor_magles_nums($row->glsa_rkm);
                $data[$a]->glsa_members_hdoor_num = $this->get_glasat_hdoor_magles_num($row->glsa_rkm, 1);
                $data[$a]->glsa_members_absent_num = $this->get_glasat_hdoor_magles_num($row->glsa_rkm, 2);
                $data[$a]->makn_en3qd_name = $this->get_makn_en3qd($row->makn_en3qd);

                //  $data[$a]->glsa_members =$this->get_glasat_hdoor($row->glsa_rkm);
                //$data[$a]->galsa_finish =$this->get_galsa_finish($row->glsa_rkm)['glsa_finshed'];
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_qrar_magles($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->where('elqrar_add', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_mehwr_details_magles($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->order_by('mehwar_rkm');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_glasat_hdoor_magles_nums($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat_hdoor");
        $this->db->where("glsa_rkm", $glsa_rkm);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_glasat_hdoor_magles_num($glsa_rkm, $type)
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat_hdoor");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->where("hdoor_satus", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_mehwr_magles($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_mehwr_magles_details($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->order_by('mehwar_rkm');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_glasat_hdoor_magles($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat_hdoor");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->order_by("mansp_fk", 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_glasat_hdoor_magles_attend($glsa_rkm, $attend)
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat_hdoor");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->where("hdoor_satus", $attend);
        $this->db->order_by("mansp_fk", 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    ///
    public function get_galesa_magles($galsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat");
        $this->db->where('glsa_rkm', $galsa_rkm);
        $query = $this->db->get()->row();
        return $query;
    }

    public function get_galsa_morfaq($glsa_id_fk, $type)
    {
        $this->db->where('glsa_id_fk', $glsa_id_fk);
        $this->db->where('type', $type);
        $query = $this->db->get('md_all_glasat_morfaq');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_qrar_magles_details($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    //omomia
    public function get_galesa_gam3ia($galsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat_gam3ia_omomia");
        $this->db->where('glsa_rkm', $galsa_rkm);
        $query = $this->db->get()->row();
        return $query;
    }

    public function get_galsa_omomia_morfaq($glsa_id_fk, $type)
    {
        $this->db->where('glsa_id_fk', $glsa_id_fk);
        $this->db->where('type', $type);
        $query = $this->db->get('md_all_glasat_gam3ia_omomia_morfaq');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /*
    public function get_main_reports()
    {
        $this->db->select('*');
        $this->db->from("pr_reports");
        $this->db->order_by('year','desc');
        $this->db->group_by('year');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] =$row;
                $data[$x]->details =$this->get_details_reports($row->year);
                $x++;}
            return $data;
        }
        return false;
    }*/
    public function get_main_reports()
    {
        $this->db->select('*');
        $this->db->from("pr_reports");
        $this->db->order_by('year', 'desc');
        $this->db->group_by('year');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->details = $this->get_details_reports($row->year, $row->type);
                $x++;
            }
            return $data;
        }
        return false;
    }

    public function get_reports($year, $type)
    {
        $this->db->select('*');
        $this->db->from("pr_reports");
        $this->db->where('year', $year);
        $this->db->where('type', $type);
        $this->db->order_by('year', 'desc');
        $this->db->group_by('year');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->details = $this->get_details_reports($row->year, $row->type);
                $x++;
            }
            return $data;
        }
        return false;
    }
    /*public function get_reports($year)
    {
        $this->db->select('*');
        $this->db->from("pr_reports");
        $this->db->where('year',$year);
        $this->db->order_by('year','desc');
        $this->db->group_by('year');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] =$row;
                $data[$x]->details =$this->get_details_reports($row->year);
                $x++;}
            return $data;
        }
        return false;
    }*/
    /*
    public function get_details_reports($year)
    {
        $this->db->select('*');
        $this->db->from('pr_reports');
        $this->db->where('year',$year);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }*/
    public function get_details_reports($year, $type)
    {
        $this->db->select('*');
        $this->db->from('pr_reports');
        $this->db->where('year', $year);
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_decrypt_name($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('pr_reports');
        if ($query->num_rows() > 0) {
            return $query->row()->file_decrypt;
        } else {
            return false;
        }
    }

    public function get_job_role_array($arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->defined_id] = $row->defined_title;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_all_employees($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $degree_ids = array(25, 23);
        $this->db->where_not_in('degree_id', $degree_ids);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /*public function get_last_year_report()
       {
           $this->db->select('*');
           $this->db->from("pr_reports");
           $this->db->order_by('year','desc');
           $this->db->limit(1);
           $query = $this->db->get();
           if ($query->num_rows() > 0) {
               return $query->row()->year;
           }
           return false;
       }*/
    public function get_last_year_report($type)
    {
        $this->db->select('*');
        $this->db->where('type', $type);
        $this->db->from("pr_reports");
        $this->db->order_by('year', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->year;
        }
        return false;
    }

    public function get_all_details_attend($rkm, $attend)
    {
        $this->db->where('glsa_rkm', $rkm);
        $this->db->where('hdoor_satus', $attend);
        $query = $this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
                $query[$key]->odwiat_data = $this->get_by_mem('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
            }
            return $query;
        } else {
            return false;
        }
    }

    public function get_all_details_attend_new($rkm, $attend)
    {
        $this->db->where('galsa_rkm', $rkm);
        if ($attend == 1) {
            $this->db->where('action_dawa', 'accept');
        } elseif ($attend == 2) {
            $this->db->where('action_dawa', 'refuse');
        } elseif ($attend == 0) {
            $this->db->where('action_dawa', 'wait');
        } elseif ($attend == 5) {
            $this->db->where('action_dawa', NULL);
        }
        $query = $this->db->get('md_da3wat_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
                $query[$key]->odwiat_data = $this->get_by_mem('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
            }
            return $query;
        } else {
            return false;
        }
    }

    public function get_d3wa_details($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_da3wat_gam3ia_omomia");
        $this->db->where("galsa_rkm", $glsa_rkm);
        $query = $this->db->get()->row();
        return $query;
    }

    public function get_opened_qrar($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal_gam3ia_omomia");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->where("opend", 1);
        $this->db->where("elqrar_add", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_opened_qrar_magles($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->where("opend", 1);
        $this->db->where("elqrar_add", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function update_opened_qrar_magles($glsa_rkm)
    {
        $data['opend'] = 0;
        $this->db->where("glsa_rkm", $glsa_rkm)->update('md_gadwal_a3mal', $data);
    }

    public function change_status_magles($id)
    {
        $data['opend'] = 1;
        $this->db->where('id', $id)->update('md_gadwal_a3mal', $data);
    }

    public function update_opened_qrar($glsa_rkm)
    {
        $data['opend'] = 0;
        $this->db->where("glsa_rkm", $glsa_rkm)->update('md_gadwal_a3mal_gam3ia_omomia', $data);
    }

    public function change_status($id)
    {
        $data['opend'] = 1;
        $this->db->where('id', $id)->update('md_gadwal_a3mal_gam3ia_omomia', $data);
    }
    /***************************************************/
    /*   public function get_memb_type()
     {
         return $this->get_by('md_all_gam3ia_omomia_members', array('id' => $_SESSION['id'])
             , 'memb_type');
     }*/
    public function get_memb_type()
    {
        return $this->get_by('md_all_gam3ia_omomia_members', array('id' => $_SESSION['id'])
            , 'memb_type');
    }

    public function get_da3wa_member($glsa_rkm)
    {
        return $this->db->where('mem_id_fk', $_SESSION['id'])
            ->where('glsa_rkm', $glsa_rkm)
            ->where('send_da3wa', 1)
            ->where('action_da3wa', NULL)
            ->get('md_all_glasat_hdoor')->row();
    }

    public function get_da3wa_magls_edara()
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat");
        $this->db->where('glsa_finshed', 0);
        $this->db->where('send_da3wat', 1);
        $this->db->order_by('glsa_rkm', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $data->da3wa_member = $this->get_da3wa_member($data->glsa_rkm);
            return $data;
        } else {
            return false;
        }
    }

    public function reply_da3wa_magls_edara()
    {
        $data['action_da3wa'] = $this->chek_Null($this->input->post('action'));
        if ($data['action_da3wa'] == 'refuse') {
            $data['reason_refuse'] = $this->chek_Null($this->input->post('reason'));
        }
        $data['action_da3wa_date'] = date('Y-m-d');
        $id = $this->input->post('id');
        $this->db->where('id', $id)->update('md_all_glasat_hdoor', $data);
    }

    public function get_open_galesa_alert()
    {
        $this->db->select('*');
        $this->db->from("md_all_glasat_gam3ia_omomia");
        $this->db->where('glsa_finshed', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->time_ago = $this->humanTiming($row->glsa_date);
                // $data[$a]->makn_en3qd_name =$this->get_makn_en3qd($row->makn_en3qd);
                $a++;
            }
            return $data;
        } else {
            return false;
        }
    }

    function humanTiming($time)
    {
        $time = time() - $time; // to get the time since that moment
        $time = ($time < 1) ? 1 : $time;
        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
        }
    }
}