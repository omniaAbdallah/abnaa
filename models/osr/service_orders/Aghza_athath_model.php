<?php
//application/models/osr/service_orders/ِAghza_athath_model.php
class Aghza_athath_model extends CI_Model
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
        $this->db->from("family_serv_aghza_athath");
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

    public function get_fe2a_talab_sub($from_id)
    {
        $this->db->where('from_id',$from_id);
        $query= $this->db->get('products');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }
    public function array_all_sub_fe2a_talab()
    {
        $this->db->select('*');
        $this->db->from('products');

        $this->db->where('from_id in (2,31,6)');
        //$this->db->where('from_code!=',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->name;
            }
            return $data;
        }else{
            return 0;
        }

    }

    public function insert($file, $mother_national_num_fk)
    {
        $data['mother_national_num'] = $mother_national_num_fk;
        $data['talab_rkm'] = $this->chek_Null($this->input->post('talab_rkm'));
        $data['fe2a_talab'] = $this->chek_Null($this->input->post('fe2a_talab'));
        $data['no3'] = $this->chek_Null($this->input->post('no3'));
        $data['num'] = $this->chek_Null($this->input->post('num'));
        $data['img'] = $file['img'];
        $data['notes'] = $this->chek_Null($this->input->post('notes'));
        $data['date_added'] = date('Y-m-d');

        $this->db->insert('family_serv_aghza_athath', $data);

    }


    public function update($id, $file)
    {
        $data['talab_rkm'] = $this->chek_Null($this->input->post('talab_rkm'));
        $data['fe2a_talab'] = $this->chek_Null($this->input->post('fe2a_talab'));
        $data['no3'] = $this->chek_Null($this->input->post('no3'));
        $data['num'] = $this->chek_Null($this->input->post('num'));

        $data['notes'] = $this->chek_Null($this->input->post('notes'));
        if ($this->chek_Null($file['img']) != '') {
            $data['img'] = $file['img'];
        }


        $this->db->where('id',$id);
        $this->db->update('family_serv_aghza_athath',$data);

    }


    public function delete($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return 1;
    }




}