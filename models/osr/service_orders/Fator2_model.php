<?php
//application/models/osr/service_orders/ِAghza_athath_model.php
class Fator2_model extends CI_Model
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
    public function select_last_talab_rkm(){
        $this->db->select('*');
        $this->db->from("family_serv_fatora");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->talab_rkm;
            }
            return $data;
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


    public function insert($file, $mother_national_num_fk)
    {
        $data['mother_national_num'] = $mother_national_num_fk;
        $data['talab_rkm'] = $this->chek_Null($this->input->post('talab_rkm'));
        $data['fe2a_fatora'] = $this->chek_Null($this->input->post('fe2a_fatora'));
        $data['fatora_value'] = $this->chek_Null($this->input->post('fatora_value'));
        $data['fatora_img'] = $file['fatora_img'];
        $data['fatora_date'] = $this->chek_Null($this->input->post('fatora_date'));
        $data['sanad_daf3_date'] = $this->chek_Null($this->input->post('sanad_daf3_date'));
        $data['date_added'] = date('Y-m-d');

        $this->db->insert('family_serv_fatora', $data);

    }


    public function update($id, $file)
    {
        $data['talab_rkm'] = $this->chek_Null($this->input->post('talab_rkm'));
        $data['fe2a_fatora'] = $this->chek_Null($this->input->post('fe2a_fatora'));
        $data['fatora_value'] = $this->chek_Null($this->input->post('fatora_value'));
        $data['fatora_date'] = $this->chek_Null($this->input->post('fatora_date'));
        $data['sanad_daf3_date'] = $this->chek_Null($this->input->post('sanad_daf3_date'));

        if ($this->chek_Null($file['fatora_img']) != '') {
            $data['fatora_img'] = $file['fatora_img'];
        }


        $this->db->where('id',$id);
        $this->db->update('family_serv_fatora',$data);

    }


    public function delete($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return 1;
    }




}