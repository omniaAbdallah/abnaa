<?php
class Ohad_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
      private  function  check_box($ckeched){
        if($this->input->post($ckeched)){
            return 1;
        }
        return 0;
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








}// END CLASS