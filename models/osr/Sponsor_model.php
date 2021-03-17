<?php

class Sponsor_model extends CI_Model{


    public function get_family_details($national_num)
    {
        $q = $this->db->select('basic.file_num,basic.id as order_num,basic.family_cat_name as osara_fe2a,
        mother.full_name as mother_name ,mother.categoriey_m,mother.mother_national_num_fk,mother.m_mob,mother.m_marital_status_id_fk,
        mother.m_birth_date_hijri_year,mother.m_birth_date_hijri,mother.id as mother_id,
        father.full_name as father_name,father.f_national_id,
    ')
            ->from('mother')->where('mother.mother_national_num_fk', $national_num)
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')->where('basic.final_suspend', 4)
            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk')->get()->row();
        if (!empty($q)) {

            $data= $q;
            $data->members= $this->get_members($national_num);
            $data->m_kafala= $this->Getkafalat($data->mother_id);
            return $data;
        } else{
            return false;
        }
    }

    public function get_members($mother_num){

        $this->db->where('mother_national_num_fk',$mother_num);
        $query = $this->db->get("f_members");
        if($query->num_rows() >0){
          //  return $query->result();
            $i=0;
            foreach ( $query->result()  as $row){
                $data[$i]= $row;
                $data[$i]->relation_name = $this->get_by('family_setting', array('id_setting' => $row->member_relationship), 'title_setting');
                $data[$i]->kafala= $this->Getkafalat($row->id);
              $i++;
            }
            return $data;


        }else{
            return false;
        }
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

    public function Getkafalat($id)
    {
        $this->db->select('*');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $id);
        $this->db->order_by('id', 'desc');
        //$this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
            ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

            $data = array();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;

                $data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
                $data[$i]->tawred_type = $pay_method_arr[$row->pay_method];
             //   $data[$i]->halet_kafel_title = $this->get_halet_kafela( $data[$i]->halat_kafel->halat_kafel_id)['title'];
              //  $data[$i]->halet_kafel_color = $this->get_halet_kafela( $data[$i]->halat_kafel->halat_kafel_id)['color'];



            }

            return $data;
        } else {
            return false;
        }

    }
    public function get_halet_kafela($halet_kafala)
    {
        $h = $this->db->get_where("fr_kafalat_kafel_status", array('id' => $halet_kafala));
        return $arr = $h->row_array();

    }

    public function get_kafela_name($kafala_type_fk)
    {
        $h = $this->db->get_where("fr_kafalat_types_setting", array('id' => $kafala_type_fk));
        return $arr = $h->row_array();

    }
    public function Getkafalat_second($id)
    {
        $this->db->select('*');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $id);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
            ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

            $data = array();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->halet_kafel_title = $this->get_halet_kafela($row->first_status)['title'];
                $data[$i]->halet_kafel_color = $this->get_halet_kafela($row->first_status)['color'];

                $data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
                $data[$i]->tawred_type = $pay_method_arr[$row->pay_method];
            }

            return $data;
        } else {
            return false;
        }

    }
}