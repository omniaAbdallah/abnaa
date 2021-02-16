<?php


class Serv_hij_omra_m extends CI_Model
{

    function get_last_talab($fe2a_talab, $mother_national_num)
    {
        return $this->db->select('MAX(talab_rkm) as talab_rkm')->where('mother_national_num', $mother_national_num)->get('family_serv_hij_omra')->row()->talab_rkm + 1;
    }

    function check_talab($fe2a_talab, $mother_national_num)
    {
        return $this->db->select('COUNT(talab_rkm) as total')->where('fe2a_talab', $fe2a_talab)->where('suspend', 0)->where('mother_national_num', $mother_national_num)->get('family_serv_hij_omra')->row()->total;
    }

    function make_delete_talab($id_talab, $mother_national_num)
    {
        $this->db->where('id', $id_talab)->where('mother_national_num', $mother_national_num)->delete('family_serv_hij_omra');
        $this->db->where('talab_id_fk', $id_talab)->where('mother_national_num', $mother_national_num)->delete('family_serv_hij_omra_datelis');

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
            return 0;
        }
    }

    function get_array_member_by($table, $where_arr = false, $select = false)
    {
        $return_array = array();

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            if (!empty($select) && $select != 1) {
                $query = $query->result();
                foreach ($query as $item) {
                    array_push($return_array, $item->$select);
                }
            }

        }
        return $return_array;
    }

    function get_talab_data($talab_id, $mother_national_num)
    {
        $talab = $this->get_by('family_serv_hij_omra', array('mother_national_num' => $_SESSION['mother_national_num'], 'id' => $talab_id), 1);
        $talab->mother_id = $this->get_by('family_serv_hij_omra_datelis', array('mother_national_num' => $_SESSION['mother_national_num'], 'talab_id_fk' => $talab_id, 'type_member' => 1), 'member_id_fk');
        $talab->member_id = $this->get_array_member_by('family_serv_hij_omra_datelis', array('mother_national_num' => $_SESSION['mother_national_num'], 'talab_id_fk' => $talab_id, 'type_member' => 2), 'member_id_fk');
        return $talab;
    }

    function insert_hij_omra()
    {

        $data = $_POST['data'];
        unset($data['mother_id']);
        unset($data['member_id']);
        $data['date_added'] = strtotime(date('Y-m-d'));
        $this->db->insert('family_serv_hij_omra', $data);
        $last_id = $this->db->insert_id();
        $this->insert_detalis($last_id);
    }

    function update_hij_omra()
    {

        $data = $_POST['data'];
        $talab_id = $data['talab_id'];
        unset($data['talab_id']);
        unset($data['mother_id']);
        unset($data['member_id']);
        $this->db->where('id', $talab_id)->update('family_serv_hij_omra', $data);
        $last_id = $talab_id;
        $this->db->where('talab_id_fk', $last_id)->where('mother_national_num', $_SESSION['mother_national_num'])->delete('family_serv_hij_omra_datelis');

        $this->insert_detalis($last_id);
    }

    function insert_detalis($last_id)
    {
//        family_serv_hij_omra_datelis
//        if ($_POST['data']['mother_id']) {
        if (key_exists('mother_id', $_POST['data'])) {
            $data['talab_id_fk'] = $last_id;
            $data['talab_rkm_fk'] = $_POST['data']['talab_rkm'];
            $data['file_num'] = $_POST['data']['file_num'];
            $data['member_id_fk'] = $_POST['data']['mother_id'];
            $data['mother_national_num'] = $_POST['data']['mother_national_num'];
            $data['type_member'] = 1;
            $this->db->insert('family_serv_hij_omra_datelis', $data);

        }
//        if ($_POST['data']['member_id']) {
        if (key_exists('member_id', $_POST['data'])) {
            if (count($_POST['data']['member_id']) > 0) {
                foreach ($_POST['data']['member_id'] as $datum) {
                    $data['talab_id_fk'] = $last_id;
                    $data['talab_rkm_fk'] = $_POST['data']['talab_rkm'];
                    $data['file_num'] = $_POST['data']['file_num'];
                    $data['member_id_fk'] = $datum;
                    $data['mother_national_num'] = $_POST['data']['mother_national_num'];
                    $data['type_member'] = 2;
                    $this->db->insert('family_serv_hij_omra_datelis', $data);

                }
            }

        }
    }

    function get_member($talab_id)
    {
        $members = $this->get_by('family_serv_hij_omra_datelis', array('mother_national_num' => $_SESSION['mother_national_num'], 'talab_id_fk' => $talab_id));
        if (!empty($members) && ($members != 0)) {
            foreach ($members as $member) {
                switch ($member->type_member){
                    case 1:
                        $member->member_full_name = $this->get_by('mother', array('id' => $member->member_id_fk),'full_name');
                        $member->member_card_num = $_SESSION['mother_national_num'];
                        $member->relation_name = "أم";
                        break;
                    case 2:
                        $member->member_full_name = $this->get_by('f_members', array('id' => $member->member_id_fk),'member_full_name');
                        $member->member_card_num = $this->get_by('f_members', array('id' => $member->member_id_fk),'member_card_num');
                        $member->relation = $this->get_by('f_members', array('id' => $member->member_id_fk),'member_relationship');
                        $member->relation_name = $this->get_by('family_setting', array('id_setting' => $member->relation), 'title_setting');
                        break;
                    default:
                        break;
                }
            }
        }
        return $members;

    }
}