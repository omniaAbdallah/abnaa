<?php


class Card_setting_model extends CI_Model
{

function insert_card($img){

    $data['type_card'] 	 = $this->input->post('type_card');
    $data['namozg_name'] 	 = $this->input->post('namozg_name');
    if (!empty($img)){
        $data['namozg_image']=$img;
    }
    if ($this->input->post('ehdaa_to')){
        $data['ehdaa_to'] 	 = $this->input->post('ehdaa_to');
        $data['ehdaa_to_top'] 	 = $this->input->post('ehdaa_to_top');
        $data['ehdaa_to_right'] 	 = $this->input->post('ehdaa_to_right');
    }
    if ($this->input->post('ehdaa_from')){
        $data['ehdaa_from'] 	 = $this->input->post('ehdaa_from');
        $data['ehdaa_from_top'] 	 = $this->input->post('ehdaa_from_top');
        $data['ehdaa_from_right'] 	 = $this->input->post('ehdaa_from_right');
    }
    if ($this->input->post('luqb')){
        $data['luqb'] 	 = $this->input->post('luqb');
        $data['luqb_top'] 	 = $this->input->post('luqb_top');
        $data['luqb_right'] 	 = $this->input->post('luqb_right');
    }
    if ($this->input->post('emp_name')){
        $data['emp_name'] 	 = $this->input->post('emp_name');
        $data['emp_name_top'] 	 = $this->input->post('emp_name_top');
        $data['emp_name_right'] 	 = $this->input->post('emp_name_right');
    }
    if ($this->input->post('tabr3_type')){
        $data['tabr3_type'] 	 = $this->input->post('tabr3_type');
        $data['tabr3_type_top'] 	 = $this->input->post('tabr3_type_top');
        $data['tabr3_type_rght'] 	 = $this->input->post('tabr3_type_rght');
    }

    $this->db->insert('pr_card_setting',$data);
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


    public function delete_card($id)
    {
        $this->delete_upload($id);
        $this->db->where('id', $id)->delete('pr_card_setting');
    }


    public function delete_upload($id)
    {
        $img = $this->get_by('pr_card_setting', array('id' => $id), 1);
        if (file_exists(FCPATH ."uploads/public_relations/card_setting/" . $img->namozg_image)) {
            unlink(FCPATH . "uploads/public_relations/card_setting/" . $img->namozg_image);
        }
        if (file_exists(FCPATH ."uploads/public_relations/card_setting/thumbs/" . $img->namozg_image)) {
            unlink(FCPATH . "uploads/public_relations/card_setting/thumbs/" . $img->namozg_image);
        }

    }

}