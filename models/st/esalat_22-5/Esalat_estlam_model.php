<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esalat_estlam_model extends CI_Model
{
    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from("st_esalat_estlam");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id + 1;
            }
            return $data;
        } else {
            return 1;
        }
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

    public function GetFrom_fr_settings($type)
    {
        $this->db->select('*');
        $this->db->from('fr_settings');
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

    public function GetFromst_bnod_setting2($type)
    {
        $this->db->select('*');
        $this->db->from('st_bnod_setting');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getMembers($where = false)
    {
        $query = $this->db->select('f_members.*,basic.file_num,
			father.full_name AS father_name')
            ->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', "LEFT")
            ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
            ->where('basic.final_suspend', 4)
            ->where('basic.file_status', 1)
            ->where($where)
            ->order_by("basic.file_num", "ASC")
            ->get('f_members');
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result_array() as $row) {
                $data[$x] = $row;
                $data[$x]['main_kafalat_details'] = $this->getmain_kafalat_details_data($row['id']);
                $x++;
            }
            return $data;
        } else {
            return 0;
        }


    }

    public function getmain_kafalat_details_data($mother_id)
    {
        $this->db->select('person_id_fk,first_date_from,first_date_to');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $mother_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        } else {
            return 0;
        }


    }

    public function getMembersArmal($where = false)
    {
        $query = $this->db->select('mother.*,basic.id as basic_id,basic.file_num,father.full_name AS father_name ')
            ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
            ->where($where)
            ->where('basic.file_status', 1)
            ->get('mother');
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result_array() as $row) {
                $data[$x] = $row;
                $data[$x]['main_kafalat_details'] = $this->getmain_kafalat_details_data($row['id']);
                $x++;
            }
            return $data;
        } else {
            return 0;
        }


    }

    public function getBanks($acc = false)
    {
        $this->db->select('*');
        $this->db->from('society_main_banks_account');
        $this->db->where('account_id_fk', $acc);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $this->GetBanksDetails($row->bank_id_fk);
            }
            return $data;
        } else {
            return false;
        }

    }

    public function GetBanksDetails($bank_id)
    {
        $this->db->select('*');
        $this->db->from('banks_settings');
        $this->db->where('id', $bank_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0];
        } else {
            return false;
        }
    }

    /********************************************************************/

    public function select_banks_accounts()
    {
        $this->db->select('*');
        $this->db->from('society_main_banks_account');
        $this->db->where('type', 1);
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

    public function GetBankAccount($arr)
    {
        $this->db->select('id,account_num,bank_id_fk,account_id_fk');
        $this->db->from('society_main_banks_account');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }

    }

    public function get_kafel_name($kafel_id)
    {
        $this->db->where('id', $kafel_id);
        $query = $this->db->get('fr_sponsor');
        if ($query->num_rows() > 0) {
            return $query->row()->k_name;
        } else {
            return "غير محدد ";
        }
    }

    public function get_kafela_name($kafala_type_fk)
    {
        $h = $this->db->get_where("fr_kafalat_types_setting", array('id' => $kafala_type_fk));
        return $arr = $h->row_array();

    }


    /*************************************************************************/

    public function getMembersSponsors($where = false)
    {
        $query = $this->db->select('*')
            ->order_by('id', 'asc')
            ->get('fr_sponsor');
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result_array() as $row) {
                $data[$x] = $row;
                //	$data[$x]['main_kafalat_details'] =  $this->getmain_kafalat_details_data($row['id']);
                $x++;
            }
            return $data;
        } else {
            return 0;
        }


    }


    public function getMembersDonors($where = false)
    {
        $query = $this->db->select('*')
            ->get('fr_donor');
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result_array() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;
        } else {
            return 0;
        }
    }


    public function getMembersGeneral_assembly($where = false)
    {
        $query = $this->db->select('*')
            ->get('general_assembley_members');
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result_array() as $row) {
                $data[$x] = $row;
                //	$data[$x]['main_kafalat_details'] =  $this->getmain_kafalat_details_data($row['id']);
                $x++;
            }
            return $data;
        } else {
            return 0;
        }


    }

    public function select_all_by_condition($where = false, $group = false)
    {
        $this->db->select('society_main_banks_account.*,banks_settings.id as banks_settings_id,banks_settings.title');
        $this->db->from('society_main_banks_account');
        $this->db->where($where);
        $this->db->group_by($group);
        $this->db->join("banks_settings", "banks_settings.id=society_main_banks_account.bank_id_fk", "left");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                if ($row->account_id_fk != 0) {
                    $data[$x]->AccountName = $this->GetAccountName($row->account_id_fk);
                }
                $x++;
            }
            return $data;
        } else {
            return 0;
        }


    }

    /*********************************ahmed*******************************/


    public function GetAccountName($id)
    {

        $h = $this->db->get_where("society_main_banks_account", array('id' => $id));
        if ($h->num_rows() > 0) {
            return $h->row_array()['title'];
        } else {
            return 0;
        }


    }

    public function select_all_by_DeviceData($where = false, $group = false)
    {
        $this->db->select('fr_devices_points.*,banks_settings.id as banks_settings_id,banks_settings.title');
        $this->db->from('fr_devices_points');
        $this->db->where($where);
        $this->db->group_by($group);
        $this->db->join("banks_settings", "banks_settings.id=fr_devices_points.bank_id_fk", "left");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                if ($row->account_id_fk != 0) {
                    $data[$x]->AccountName = $this->GetAccountName($row->account_id_fk);
                }
                if ($row->account_id_fk != 0) {
                    $data[$x]->AccountNum = $this->GetAccountNum($row->account_num_id_fk);
                }
                $x++;
            }
            return $data;
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

    public function select_st_bnod_setting_by_condition($where = false, $arr_in = false)
    {
        $this->db->select('*');
        $this->db->from('st_bnod_setting');
        $this->db->where($where);
        $this->db->where_not_in('code', $arr_in);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;
        } else {
            return 0;
        }

//        return $query;

    }

    public function insert($id = false, $file = false)
    {


        $data['moshro3_fk'] = $this->chek_Null($this->input->post('moshro3_fk'));//2-4-om

        $data['about'] = $this->chek_Null($this->input->post('about'));
        //	$data['esal_num'] 	   		   =  $this->chek_Null($this->input->post('esal_num'));
        $var = time() + 5;
        if ($var == true) {
            $last_esal_num = $this->select_last_esal_num();
        }


        $data['esal_date'] = $this->chek_Null($this->input->post('esal_date'));
        $data['esal_type'] = $this->chek_Null($this->input->post('esal_type'));
        $data['place_supply'] = $this->chek_Null($this->input->post('place_supply'));
        $data['fe2a_id_fk'] = $this->chek_Null($this->input->post('fe2a_id_fk'));
        $data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
        $data['value'] = $this->chek_Null($this->input->post('value_total'));
        $data['laqab'] = $this->chek_Null($this->input->post('laqab'));
        $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));

        $data['person_mob'] = $this->chek_Null($this->input->post('person_mob'));
        $data['person_name'] = $this->chek_Null($this->input->post('person_name'));
        $data['tahia'] = $this->chek_Null($this->input->post('tahia'));
        $data['erad_type'] = $this->chek_Null($this->input->post('erad_type'));
//        $data['fe2a_type1'] = $this->chek_Null($this->input->post('fe2a_type1'));
//        $data['bnd_type1'] = $this->chek_Null($this->input->post('bnd_type1'));
        $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
        $data['bank_account_id_fk'] = $this->chek_Null($this->input->post('bank_account_id_fk'));
        $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
        $data['bank_account_code'] = $this->chek_Null($this->input->post('bank_account_code'));
        $data['cheq_num'] = $this->chek_Null($this->input->post('cheq_num'));
        $data['cheq_date'] = $this->chek_Null($this->input->post('cheq_date'));
        $data['branch_id_fk'] = $this->chek_Null($this->input->post('branch_id_fk'));
        $data['marg3_num'] = $this->chek_Null($this->input->post('marg3_num'));
        $data['marg3_date'] = $this->chek_Null($this->input->post('marg3_date'));
        $data['device_num'] = $this->chek_Null($this->input->post('device_num'));
        $data['tafwed_num'] = $this->chek_Null($this->input->post('tafwed_num'));
        $data['process_date'] = $this->chek_Null($this->input->post('process_date'));
        $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
        if (!empty($file)) {
            $data['morfaq'] = $file;
        }
        $fe2a_types = $this->input->post('fe2a_type');
        $bnd_types = $this->input->post('bnd_type');
        $values = $this->input->post('value');


        if (!empty($fe2a_types)) {
            $arr_name_db_fe2a = array('fe2a_type1', 'fe2a_type2', 'fe2a_type3', 'fe2a_type4');
            $arr_name_db_bnd = array('bnd_type1', 'bnd_type2', 'bnd_type3', 'bnd_type4');
            $arr_name_db_value = array('value1', 'value2', 'value3', 'value4');
            $arr_name_db_bnd_name = array('bnd_type1_name', 'bnd_type2_name', 'bnd_type3_name', 'bnd_type4_name');
            foreach ($arr_name_db_fe2a as $key => $item) {
                if (isset($fe2a_types[$key])) {
                    $data[$arr_name_db_fe2a[$key]] = $this->chek_Null($fe2a_types[$key]);
                    $data[$arr_name_db_bnd[$key]] = $this->chek_Null($bnd_types[$key]);
                    $data[$arr_name_db_value[$key]] = $this->chek_Null($values[$key]);
                    $data[$arr_name_db_bnd_name[$key]] = $this->GetTitleFromst_bnod_settingByCode($bnd_types[$key]);
                } else {
                    $data[$arr_name_db_fe2a[$key]] = '';
                    $data[$arr_name_db_bnd[$key]] = '';
                    $data[$arr_name_db_value[$key]] = '';
                    $data[$arr_name_db_bnd_name[$key]] = '';
                }
            }


        }

        if (empty($id)) {
            $data['esal_num'] = $last_esal_num;
            $data['date'] = date('Y-m-d');
            $data['date_s'] = time();
            $data['date_ar'] = date('Y-m-d');
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
            $this->db->insert('st_esalat_estlam', $data);
        } else {

            /********************تعديل قيد*******************/

            $this->db->where('id', $id);
            $this->db->update('st_esalat_estlam', $data);


            $data['esal_num'] = $this->input->post('esal_num');
        }

    }

    /******************************************************************************************************/
    public function project_data($where)
    {
        $sql = $this->db->where($where)->get('pr_projects')->row();
        if (!empty($sql)) {
            return $sql;
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

    /******************************************************************************************************/

    public function select_last_esal_num()
    {
        $this->db->select('*');
        $this->db->from("st_esalat_estlam");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->esal_num + 1;
            }
            return $data;
        } else {
            return 1;
        }
    }

    public function GetTitleFromst_bnod_settingByCode($id)
    {
        $h = $this->db->get_where("st_bnod_setting", array('code' => $id));
        $arr = $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        } else {
            return 0;
        }


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

    public function select_all_by_st_esalat_estlam_all_deported()
    {
        $this->db->select('*');
        $this->db->from('st_esalat_estlam');
        $this->db->order_by("id", "DESC");
        $this->db->where('deport_sand_qabd', 1);


        if ($_SESSION['role_id_fk'] == 1) {

            if ($_SESSION['user_id'] == 101) {
                $this->db->where('publisher', $_SESSION['user_id']);
            } else {

            }

        } elseif ($_SESSION['role_id_fk'] == 3) {

            $this->db->where('publisher', $_SESSION['user_id']);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->esal_type_title = $this->GetTitleFromst_bnod_setting($row->esal_type);
                $data[$x]->Fe2a_title = $this->GetFe2aTitle($row->fe2a_id_fk);
                $data[$x]->erad_title = $this->GetTitleFromst_bnod_setting($row->erad_type);
                $data[$x]->fe2a_type_title = $this->GetTitleFromst_bnod_setting($row->fe2a_type1);
//                if (!empty($row->person_type)) {
//                    $data[$x]->MemberDetails = $this->GetMemberNameByID($row->person_id_fk, $row->person_type);
//                }
                $data[$x]->band_title = $this->GetTitleFromst_bnod_settingByCode($row->bnd_type1);
                if (!empty($row->bnd_type2)) {
                    $data[$x]->band_title2 = $this->GetTitleFromst_bnod_settingByCode($row->bnd_type2);

                }
//                $data[$x]->bank_title = $this->GetBankTitle($row->bank_id_fk);
//                $data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
//                $data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);


                // $qued_rkm_fk =;
//                if (!empty($this->select_quod_details_byesal_num($row->esal_num)[0]->qued_rkm_fk)) {
//                    $data[$x]->qued_num = $this->select_quod_details_byesal_num($row->esal_num)[0]->qued_rkm_fk;
//
//                    $data[$x]->qued_type = $this->select_finance_quods_byqued_rkm_fk(
//                        $this->select_quod_details_byesal_num($row->esal_num)[0]->qued_rkm_fk)->no3_qued_name;
//
//                }


                $x++;
            }
            return $data;
        } else {
            return 0;
        }

    }

    public function GetTitleFromst_bnod_setting($id)
    {
        $h = $this->db->get_where("st_bnod_setting", array('from_id' => $id));
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
        $arr_type = array(1 => 'fr_sponsor', 2 => 'fr_donor', 3 => 'general_assembley_members');
        $h = $this->db->get_where($arr_type[$type], array('id' => $id));
        $arr = $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr;
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


    public function select_quod_details_byesal_num($esal_num)
    {
        $this->db->select('*');
        $this->db->from("finance_quods_details");
        $this->db->where("marg3", $esal_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_finance_quods_byqued_rkm_fk($qued_rkm_fk)
    {
        $this->db->select('*');
        $this->db->from("finance_quods");
        $this->db->where("rkm", $qued_rkm_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }


    public function select_all_by_st_esalat_estlam_all()
    {
        $this->db->select('*');
        $this->db->from('st_esalat_estlam');
        $this->db->order_by("id", "DESC");
        $this->db->where('deport_sand_qabd', 0);
        if ($_SESSION['role_id_fk'] == 1) {
            if ($_SESSION['user_id'] == 101) {
                $this->db->where('publisher', $_SESSION['user_id']);
            } else {

            }


        } elseif ($_SESSION['role_id_fk'] == 3) {

            $this->db->where('publisher', $_SESSION['user_id']);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->esal_type_title = $this->GetTitleFromst_bnod_setting($row->esal_type);
                $data[$x]->Fe2a_title = $this->GetFe2aTitle($row->fe2a_id_fk);
                $data[$x]->erad_title = $this->GetTitleFromst_bnod_setting($row->erad_type);
                $data[$x]->fe2a_type_title = $this->GetTitleFromst_bnod_setting($row->fe2a_type1);
                if (!empty($row->person_type)) {
                    $data[$x]->MemberDetails = $this->GetMemberNameByID($row->person_id_fk, $row->person_type);
                }
                $data[$x]->band_title = $this->GetTitleFromst_bnod_settingByCode($row->bnd_type1);
                if (!empty($row->bnd_type2)) {
                    $data[$x]->band_title2 = $this->GetTitleFromst_bnod_settingByCode($row->bnd_type2);

                }
                $data[$x]->bank_title = $this->GetBankTitle($row->bank_id_fk);
                $data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
                $data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);


                $x++;
            }
            return $data;
        } else {
            return 0;
        }

    }

    public function select_all_by_st_esalat_estlam($where = false)
    {
        $this->db->select('*');
        $this->db->from('st_esalat_estlam');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->esal_type_title = $this->GetTitleFromst_bnod_setting($row->esal_type);
                $data[$x]->Fe2a_title = $this->GetFe2aTitle($row->fe2a_id_fk);
                $data[$x]->erad_title = $this->GetTitleFromst_bnod_setting($row->erad_type);
                $data[$x]->fe2a_type_title = $this->GetTitleFromst_bnod_setting($row->fe2a_type1);
//                if (!empty($row->person_type)) {
//                    $data[$x]->MemberDetails = $this->GetMemberNameByID($row->person_id_fk, $row->person_type);
//                }
                $data[$x]->band_title = $this->GetTitleFromst_bnod_settingByCode($row->bnd_type1);
                if (!empty($row->bnd_type2)) {
                    $data[$x]->band_title2 = $this->GetTitleFromst_bnod_settingByCode($row->bnd_type2);
                    $data[$x]->fe2a_type_title2 = $this->GetTitleFromst_bnod_setting($row->fe2a_type2);
                }
                if (!empty($row->bnd_type3)) {
                    $data[$x]->band_title3 = $this->GetTitleFromst_bnod_settingByCode($row->bnd_type3);
                    $data[$x]->fe2a_type_title3 = $this->GetTitleFromst_bnod_setting($row->fe2a_type3);
                }
                if (!empty($row->bnd_type4)) {
                    $data[$x]->band_title4 = $this->GetTitleFromst_bnod_settingByCode($row->bnd_type4);
                    $data[$x]->fe2a_type_title4 = $this->GetTitleFromst_bnod_setting($row->fe2a_type4);
                }
//                $data[$x]->bank_title = $this->GetBankTitle($row->bank_id_fk);
//                $data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
//                $data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);


                $x++;
            }
            return $data;
        } else {
            return 0;
        }

    }

    public function Deleteesal($id)
    {
        $this->db->where('esal_num', $id);
        $this->db->delete('st_esalat_estlam');

    }


    public function slect_where($table, $Conditions)
    {
        $this->db->select('*');
        $this->db->from($table);
        foreach ($Conditions as $key => $value) {
            $this->db->where($key, $Conditions[$key]);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    /****************************************************************/


    public function getSearchResults($row_name, $value)
    {
        $this->db->select('*');
        $this->db->from('st_esalat_estlam');
        $this->db->where("$row_name", "$value");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->esal_type_title = $this->GetTitleFromst_bnod_setting($row->esal_type);
                $data[$x]->Fe2a_title = $this->GetFe2aTitle($row->fe2a_id_fk);
                $data[$x]->erad_title = $this->GetTitleFromst_bnod_setting($row->erad_type);
                $data[$x]->fe2a_type_title = $this->GetTitleFromst_bnod_setting($row->fe2a_type1);
                if (!empty($row->person_type)) {
                    $data[$x]->MemberDetails = $this->GetMemberNameByID($row->person_id_fk, $row->person_type);
                }
                $data[$x]->band_title = $this->GetTitleFromst_bnod_settingByCode($row->bnd_type1);
                if (!empty($row->bnd_type2)) {
                    $data[$x]->band_title2 = $this->GetTitleFromst_bnod_settingByCode($row->bnd_type2);

                }
                $data[$x]->bank_title = $this->GetBankTitle($row->bank_id_fk);
                $data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
                $data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);

                $x++;
            }
            return $data;
        }
        return false;
    }
    /***************************************************************************************************/
    /****************************************************************************************************/
    public function select_total_by_pay_method()
    {
        $pay_method_arr =
            array(1 => 'total_tabr3');
        foreach ($pay_method_arr as $key => $value) {

            $data[$value] = $this->getTotal('pay_method,value,sum(value) as total', array('pay_method' => $key));

        }
        return $data;


    }


    public function getTotal($select, $where)
    {
        $this->db->select($select);
        $this->db->from('st_esalat_estlam');
        $this->db->where($where);
        if ($_SESSION['role_id_fk'] == 3) {

            $this->db->where($where);

            // $this->db->where('esal_date',date("Y-m-d"));
            $this->db->where('publisher', $_SESSION['user_id']);
        } else {

        }

        $this->db->where('deport_sand_qabd', 0);


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            if (!empty($query->row()->total)) {
                return $query->row()->total;
            } else {
                return 0;
            }
        } else {
            return 0;
        }

    }


    /*******************************************************************************************************/
    public function get_all_sponsers()
    {
        $this->db->select("fr_sponsor.k_name,st_esalat_estlam.person_id_fk,fr_sponsor.id");
        $this->db->from('fr_sponsor');
        $this->db->join('st_esalat_estlam', 'st_esalat_estlam.person_id_fk=fr_sponsor.id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->count = $this->get_count($row->id);
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_count($id)
    {
        $this->db->select('person_id_fk');
        $this->db->from('st_esalat_estlam');
        $this->db->where('person_id_fk', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_all_esal($id)
    {
        $this->db->select('*');
        $this->db->from('st_esalat_estlam');
        $this->db->where('person_id_fk', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->esal_type_title = $this->GetTitleFromst_bnod_setting($row->esal_type);
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }

    /***********************************************/


    public function select_all_devices_points()
    {
        $this->db->select('*');
        $this->db->from('fr_devices_points');
        $this->db->where('device_status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function get_all_esal_search($field, $valu)
    {
        $this->db->select('*');
        $this->db->from('st_esalat_estlam');
        if (!empty($valu)) {
            if ($field == 'person_name') {
                $this->db->like($field, $valu);
            } else {
                $this->db->where($field, $valu);

            }
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->esal_type_title = $this->GetTitleFromst_bnod_setting($row->esal_type);
                $data[$i]->markz = $this->get_markz($row->place_supply);
                $data[$i]->erad = $this->GetTitleFromst_bnod_setting($row->erad_type);
                $data[$i]->band = $this->GetTitleFromst_bnod_setting($row->bnd_type1);

                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_markz($id)
    {
        $this->db->select('*');
        $this->db->from('st_bnod_setting');
        $this->db->where('id_setting', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        }
        return "غير محدد";
    }


    public function get_type_print($emp_code)
    {
        $h = $this->db->get_where("fr_print_esal_setting", array('emp_id' => $emp_code))->row();
        if (!empty($h)) {
            return $h->esal_type;
        }
    }


    public function get_projects()
    {
        //  return $this->db->get('pr_projects')->where(array('approved' => 1))->result();
        $this->db->select("*");
        $this->db->from('pr_projects');
        $this->db->where('approved', 1);
        $this->db->order_by("id", "desc");

        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }


}

