<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical_center_model extends CI_Model
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
        $this->db->from("family_serv_medical_center");
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

    public function delete($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return 1;
    }

	public function add_medical($mother_national_id_fk)
	{

		$data['mother_national_id_fk'] = $mother_national_id_fk;
		$data['mother_national_id_fk'] = $_SESSION['mother_national_num'];
		$data['file_num'] = $_SESSION['file_num'];
        $data['talab_rkm'] = $this->chek_Null($this->input->post('talab_rkm'));
		$data['person_id_fk'] 	       = $this->input->post('person_id_fk');
		$data['disease_type'] 	       = $this->input->post('disease_type');
		$data['notes'] 	               = $this->input->post('notes');
//        $data['date_added']            = date('Y-m-d');
		$data['date']			       = strtotime(date("m/d/Y"));
        $data['date_s']				   = time();
        $data['publisher'] 			   = $_SESSION['user_id'];
        $this->db->insert('family_serv_medical_center',$data);

	}

	public function edit_medical($id)
	{
		$data['person_id_fk'] 	       = $this->input->post('person_id_fk');
		$data['disease_type'] 	       = $this->input->post('disease_type');
		$data['notes'] 	       = $this->input->post('notes');
        $this->db->where('id',$id);
		$this->db->update('family_serv_medical_center',$data);
	}

	public function selectMedical_center($national_id)
	{
		return $this->db->select('family_serv_medical_center.*, f_members.member_full_name, f_members.member_card_num, family_setting.title_setting as title_disease_type')
						->join('f_members','family_serv_medical_center.person_id_fk=f_members.id','LEFT')
						->join('family_setting','family_serv_medical_center.disease_type=family_setting.id_setting','LEFT')
						->where('family_serv_medical_center.mother_national_id_fk',$national_id)
						->get('family_serv_medical_center')
						->result();
	}

}

/* End of file Medical_center_model.php */
/* Location: ./application/models/services_models/Medical_center_model.php */