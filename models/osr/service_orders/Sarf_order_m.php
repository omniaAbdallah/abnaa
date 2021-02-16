<?php


class Sarf_order_m extends CI_Model
{


    public function get_asnaf()
    {
        $query = $this->db->where('fe2a', 1)->get('st_asnaf');
        if ($query->num_rows() > 0) {
            return $query->result();

        } else {
            return false;
        }
    }

    public function get_asnaf_data($code)
    {
        $this->db->where('code', $code);
        $query = $this->db->get('st_asnaf');
        if ($query->num_rows() > 0) {
            //  return $query->row();
            $data = $query->row();
            $data->whda_name = $this->get_by('st_setting', array('id_setting' => $data->whda), 'title_setting');
            return $data;

        } else {
            return false;
        }
    }


    function get_last_talab($mother_national_num)
    {
        return $this->db->select('MAX(talab_rkm) as talab_rkm')->where('mother_national_num', $mother_national_num)->get('family_serv_order_sarf')->row()->talab_rkm + 1;
    }

    function check_talab($mother_national_num)
    {
        return $this->db->select('COUNT(talab_rkm) as total')->where('suspend', 0)->where('mother_national_num', $mother_national_num)->get('family_serv_order_sarf')->row()->total;
    }

    function make_delete_talab($id_talab, $mother_national_num)
    {
        $this->db->where('id', $id_talab)->where('mother_national_num', $mother_national_num)->delete('family_serv_order_sarf');
        $this->db->where('talab_id_fk', $id_talab)->delete('family_serv_order_sarf_details');
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
            return;
        }
    }

    public function get_asnaf_setting($id)
    {
        $this->db->where('id_setting', $id);
        $query = $this->db->get('st_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        } else {
            return false;
        }
    }

    public function get_last_date($mother_num)
    {
        $this->db->select('*');
        $this->db->from('osr_sarf_orders');
        $this->db->where('mother_national_num_fk', $mother_num);
        $this->db->order_by('order_num', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->order_date;

        } else {
            return false;
        }
    }

    function get_datiles_order($id)
    {
        $talb = $this->Sarf_order_m->get_by('family_serv_order_sarf', array('mother_national_num' => $_SESSION['mother_national_num'], 'file_num' => $_SESSION['file_num'], 'id' => $id), 1);
        if (!empty($talb)) {
            $talb->details = $this->Sarf_order_m->get_by('family_serv_order_sarf_details', array('talab_id_fk' => $id));
        }
        return $talb;
    }

    function insert_order_sarf()
    {

        $data = $_POST['data'];
        unset($data['details']);
        $data['date'] = strtotime(date('Y-m-d'));
        $data['talab_date'] = strtotime($data['talab_date_ar']);
        $this->db->insert('family_serv_order_sarf', $data);
        $last_id = $this->db->insert_id();
        $this->insert_detalis($last_id);
    }

    function update_order_sarf()
    {
        $data = $_POST['data'];
        $talab_id = $data['talab_id'];
        unset($data['talab_id']);
        unset($data['details']);
        $this->db->where('id', $talab_id)->update('family_serv_order_sarf', $data);
        $last_id = $talab_id;
        $this->db->where('talab_id_fk', $last_id)->delete('family_serv_order_sarf_details');

        $this->insert_detalis($last_id);
    }

    function insert_detalis($last_id)
    {

        if (key_exists('details', $_POST['data'])) {
            if (count($_POST['data']['details']['sanf_name']) > 0) {
                for ($i = 0; $i < count($_POST['data']['details']['sanf_name']); $i++) {
                    $data['talab_id_fk'] = $last_id;
                    $data['talab_rkm_fk'] = $_POST['data']['talab_rkm'];
                    $data['sanf_name'] = $_POST['data']['details']['sanf_name'][$i];
                    $data['sanf_code'] = $_POST['data']['details']['sanf_code'][$i];
                    $data['sanf_one_price'] = $_POST['data']['details']['sanf_one_price'][$i];
                    $data['notes'] = $_POST['data']['details']['notes'][$i];
                    $data['sanf_whda'] = $_POST['data']['details']['sanf_whda'][$i];
                    $data['sanf_coade_br'] = $_POST['data']['details']['sanf_coade_br'][$i];
                    $this->db->insert('family_serv_order_sarf_details', $data);

                }
            }

        }
    }

}