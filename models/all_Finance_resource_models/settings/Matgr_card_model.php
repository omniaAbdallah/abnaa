<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matgr_card_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_by($table, $where_arr = false, $select = false)
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


    public function insert()
    {
        $data['ttype'] = $this->input->post('ttype');
        if($data['ttype'] == 1 ){
            $data['title']   = $this->input->post('title');

        }else if($data['ttype'] == 2 ){
            $data['card_id_fk']        = $this->input->post('card_id_fk');
            $data['bank_id_fk']        = $this->input->post('bank_id_fk');
            $data['account_id_fk']     = $this->input->post('account_id_fk');
            $data['account_num_id_fk'] = $this->input->post('account_num_id_fk');
            $data['card_status']       = $this->input->post('card_status');

        }

        $data['date']           = strtotime(date("Y-m-d"));
        $data['date_ar']        = date('Y-m-d');
        $data['publisher'] 		= $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

        $this->db->insert('fr_matgr_card_type', $data);
    }

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 ) {
                return $data->user_username;
            }  elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;

    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }


    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('fr_matgr_card_type');
    }

    public function fetch_banks()
    {
        $this->db->select('*');
        $this->db->where('type', 2);
        $this->db->group_by('bank_id_fk');
        $this->db->from('society_main_banks_account');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->bank_name = $this->getBank($row->bank_id_fk)['title'];
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function fetch_results_card($card_id_fk = 0)
    {
        $this->db->select('*');
        $this->db->where('ttype', 2);
        if($card_id_fk > 0){
            $this->db->where('card_id_fk', $card_id_fk);
        }
        $this->db->from('fr_matgr_card_type');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->bank_name = $this->getBank($row->bank_id_fk)['title'];
                $data[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
                $data[$i]->account_number = $this->getAccountName($row->account_num_id_fk)['account_num'];
                $i++;
            }
            return $data;
        }
        return false;
    }



    public function getBank($id)
    {
        return $this->db->get_where('banks_settings', array('id'=>$id))->row_array();
    }


    public function fetch_bank_accounts($bank_id)
    {
        $this->db->select('*');
        $this->db->where('bank_id_fk',$bank_id);
        $this->db->group_by('account_id_fk');
        $this->db->from('society_main_banks_account');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            $data = array();
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
                $i++;
            }
            return $data;
        }
        return false;
    }


    public function get_accounts_nums($bank_id,$account_id)
    {
        $this->db->select('*');
        $this->db->where('bank_id_fk',$bank_id);
        $this->db->where('account_id_fk',$account_id);
        $this->db->from('society_main_banks_account');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            $data = array();
            foreach ($query->result() as $row) {
//                if($this->getValidAccount($account_id,$device_id)){
//                    continue;
//                }else{
                $data[$i] = $row;
                $data[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
                $i++;
//                }

            }
            return $data;
        }
        return false;
    }


    public function getAccountName($id)
    {
        return $this->db->get_where('society_main_banks_account', array('id'=>$id))->row_array();
    }

 /*

    public function select_question_results(){
        $this->db->select('*');
        $this->db->from("clients_follows_question");
        $this->db->where('from_id', 0);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $query_result=$query->result();

        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i] = $row;
                $query_result[$i]->results =$this->select_follow_question(0,$row->id);

                $i++;
            }
            return $query_result;
        }
    }


*/

/*
    public function update($id)
    {
        $data['title']   = $this->input->post('title');
        $data['from_id'] = $this->input->post('from_id');

        $data['date']    =  strtotime(date("Y/m/d"));
        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']= $this->getUserName($_SESSION['user_id']);

        $this->db->where('id', $id);
        $this->db->update('clients_follows_question', $data);
    }
*/


}