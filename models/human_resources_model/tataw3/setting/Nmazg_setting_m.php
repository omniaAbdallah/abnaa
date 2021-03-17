<?php
/**
 * application/models/human_resources_model/tataw3/setting/Nmazg_setting_m.php
 */

class Nmazg_setting_m extends CI_Model
{


    public function all_settings()
    {
        $this->db->select('*');
        $this->db->from('tat_nmazg_setting');
        $this->db->where("from_code", 0);
        $this->db->order_by('code', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->code]= $row->title;//["title"]
                //$data[$row->code]["code"]= $row->code;
                //$data[$row->id]['color'] =  $row->color;
            }
            return $data;
        }
        return false;
    }

    public function get_by($table, $where_arr = false, $select = false,$order= false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        if (!empty($order)){
            $this->db->order_by($order, "asc");
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


    public function get_all_data_settings($arr_all){

        foreach ($arr_all as $key=>$value) {

            $data[$key] = $this->get_type_settings($key);

        }

        return $data;
    }

    public function  get_type_settings($from_code)
    {
        $this->db->select('*');
        $this->db->from('tat_nmazg_setting');
        $this->db->where("from_code", $from_code);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function add($from_code)
    {

        /*$last_code = $this->get_max($from_code);

        if ($last_code == 0) {
            $last_code = $from_code . '01';
        } else { // if ($last_code >= ($from_code.'99'))

            $next_code = explode($from_code,$last_code );
            $pad_length = 2;
            if ($next_code > 99){
                $pad_length = 3;
            }
            $last_code = $from_code . str_pad(($next_code[1]+1), $pad_length, '0', STR_PAD_LEFT);

        }*/

        //$data['code']= $last_code;
        $data['title']= $this->input->post('title');
        $data['from_code']= $from_code;
        if ($this->input->post('color')) {
            $data['color'] = $this->input->post('color');
        }

        $this->db->insert('tat_nmazg_setting',$data);
        $last_insert_id = $this->db->insert_id();

        return $last_insert_id;

    }

    public function update($id,$from_code)
    {
        $data['title']= $this->input->post('title');
        $data['color'] = $this->input->post('color');

        $this->db->where('id',$id);
        $this->db->update('tat_nmazg_setting',$data);
    }


    function get_max($from)
    {
        return $this->db->select_max('code')->where('from_code', $from)->get('family_serv_setting')->row()->code;
    }


    public function get_count($from_code)
    {
        return $this->db->select('COUNT(id) as count_rows')->where('from_code', $from_code)->get('family_serv_setting')->row()->count_rows;

    }

    function delete($id)
    {
        $this->db->where('id', $id)->delete('tat_nmazg_setting');
    }

    public function getById($id)
    {
        return $this->db->get_where('tat_nmazg_setting', array('id'=>$id))->row_array();
    }






}