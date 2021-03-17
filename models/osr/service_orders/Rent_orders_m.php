
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Rent_orders_m extends CI_Model {
       
    
        public function get_last_rkm()
        {
            $this->db->select('talb_rkm');
            $this->db->order_by('id','desc');
            $this->db->where('mother_national_num',$_SESSION['mother_national_num']);
            $query=$this->db->get('family_serv_egar_manzel');
            if($query->num_rows()>0)
            {
                return $query->row()->talb_rkm + 1;
            }else{
                return 1;
            }
        
        }
        public function get_last_record()
        {
            $this->db->select('suspend');
            $this->db->order_by('id','desc');
            $this->db->where('mother_national_num',$_SESSION['mother_national_num']);
            $query=$this->db->get('family_serv_egar_manzel');
            if($query->num_rows()>0)
            {
                return $query->row()->suspend ;
            }
            
        
        }
        public function add_rent()
        {
            
            $data['talb_rkm'] = $this->input->post('talab_rkm');
            $data['mother_national_num'] = $_SESSION['mother_national_num'];
            $data['file_num'] =	$_SESSION['file_num'];
           
            $data['sgl_rkm_asas'] 				   = $this->input->post('sgl_rkm_asas');
            $data['sgl_rkm'] 		   = $this->input->post('sgl_rkm');
            $data['no3_3akd'] 	   = $this->input->post('no3_3akd');
            $data['aakd_date'] 		   = $this->input->post('3akd_date');
            $data['aakd_place'] 	   = $this->input->post('3akd_place');
            $data['start_rent_date']			   = $this->input->post('start_rent_date');
            $data['end_rent_date']	   = $this->input->post('end_rent_date');
            $data['date']			       = strtotime(date("m/d/Y"));
            $data['date_s']				   = time();
            $data['publisher'] 			   = $_SESSION['user_id'];
            $data['suspend'] 			   = 0;
            $this->db->insert('family_serv_egar_manzel',$data);
        }
    
        public function edit_rent($id)
        {
            $data['sgl_rkm_asas'] 				   = $this->input->post('sgl_rkm_asas');
            $data['sgl_rkm'] 		   = $this->input->post('sgl_rkm');
            $data['no3_3akd'] 	   = $this->input->post('no3_3akd');
            $data['aakd_date'] 		   = $this->input->post('3akd_date');
            $data['aakd_place'] 	   = $this->input->post('3akd_place');
            $data['start_rent_date']			   = $this->input->post('start_rent_date');
            $data['end_rent_date']	   = $this->input->post('end_rent_date');
//بيانات المؤجر
            $data['mo2ger_name']	   = $this->input->post('mo2ger_name');
            $data['mo2ger_gensia']	   = $this->input->post('mo2ger_gensia');
            $data['mo2ger_national_num_type']	   = $this->input->post('mo2ger_national_num_type');
            $data['mo2ger_national_num']	   = $this->input->post('mo2ger_national_num');
            $data['mo2ger_national_ns5a']	   = $this->input->post('mo2ger_national_ns5a');
            $data['mo2ger_phone']	   = $this->input->post('mo2ger_phone');
            $data['mo2ger_email']	   = $this->input->post('mo2ger_email');
//بيانات المستأجر
            $data['most2ger_name']	   = $this->input->post('most2ger_name');
            $data['most2ger_gensia']	   = $this->input->post('most2ger_gensia');
            $data['most2ger_national_num_type']	   = $this->input->post('most2ger_national_num_type');
            $data['most2ger_national_num']	   = $this->input->post('most2ger_national_num');
            $data['most2ger_national_ns5a']	   = $this->input->post('most2ger_national_ns5a');
            $data['most2ger_phone']	   = $this->input->post('most2ger_phone');
            $data['most2ger_email']	   = $this->input->post('most2ger_email');
//بيانات المنشأة العقارية
            $data['mon42a_name']	   = $this->input->post('mon42a_name');
            $data['mon42a_address']	   = $this->input->post('mon42a_address');
            $data['mon42a_sgl_num']	   = $this->input->post('mon42a_sgl_num');
            $data['mon42a_phone']	   = $this->input->post('mon42a_phone');
            $data['mon42a_fax']	   = $this->input->post('mon42a_fax');
            $data['waseet_name']	   = $this->input->post('waseet_name');
            $data['waseet_gensia']	   = $this->input->post('waseet_gensia');
            $data['waseet_national_num_type']	   = $this->input->post('waseet_national_num_type');
            $data['waseet_national_num']	   = $this->input->post('waseet_national_num');
            $data['waseet_national_ns5a']	   = $this->input->post('waseet_national_ns5a');
            $data['waseet_phone']	   = $this->input->post('waseet_phone');
            $data['waseet_email']	   = $this->input->post('waseet_email');
//بيانات صكوك التملك
            $data['sak_rkm']	   = $this->input->post('sak_rkm');
            $data['esdar_sak']	   = $this->input->post('esdar_sak');
            $data['esdar_sak_date']	   = $this->input->post('esdar_sak_date');
            $data['esdar_sak_place']	   = $this->input->post('esdar_sak_place');
           
//بيانات العقار
            $data['aakar_address']	   = $this->input->post('3akar_address');
            $data['aakar_bnaa_type']	   = $this->input->post('3akar_bnaa_type');
            $data['aakar_use_type']	   = $this->input->post('3akar_use_type');
            $data['num_adoar']	   = $this->input->post('num_adoar');
            $data['num_whda']	   = $this->input->post('num_whda');
            $data['num_msad']	   = $this->input->post('num_msad');
            $data['num_mo2f']	   = $this->input->post('num_mo2f');
///بيانات الوحدات الإيجارية
$data['no3_whda']	   = $this->input->post('no3_whda');
            $data['rkm_whda']	   = $this->input->post('rkm_whda');
            $data['moses_name']	   = $this->input->post('moses_name');
            $data['rkm_door']	   = $this->input->post('rkm_door');
            $data['moses_status'] = $this->input->post('moses_status');
            $data['kitchen_parts']	   = $this->input->post('kitchen_parts');
            $data['room_type']	   = $this->input->post('room_type');
            $data['room_num']	   = $this->input->post('room_num');
            $data['takeef_type']	   = $this->input->post('takeef_type');
            $data['takeef_num']	   = $this->input->post('takeef_num');
            $data['electric_num']	   = $this->input->post('electric_num');
            $data['electric_read']	   = $this->input->post('electric_read');
            $data['water_num']	   = $this->input->post('water_num');
            $data['water_read']	   = $this->input->post('water_read');
            $data['gas_num']	   = $this->input->post('gas_num');
            $data['gas_read']	   = $this->input->post('gas_read');
//لتأجير من الباطن
            $data['rent_from_baten']	   = $this->input->post('rent_from_baten');
//البيانات الماليه
            $data['sa3y_ogra']	   = $this->input->post('sa3y_ogra');
            $data['daman_value']	   = $this->input->post('daman_value');
            $data['electric_month_value']	   = $this->input->post('electric_month_value');
            $data['gas_month_value']	   = $this->input->post('gas_month_value');
            $data['water_month_value']	   = $this->input->post('water_month_value');
            $data['mawkf_month_value']	   = $this->input->post('mawkf_month_value');
            $data['rent_month_value']	   = $this->input->post('rent_month_value');
            $data['num_mawkf_rent']	   = $this->input->post('num_mawkf_rent');
            $data['rent_dawrey']	   = $this->input->post('rent_dawrey');
            $data['dawret_rent_sadad']	   = $this->input->post('dawret_rent_sadad');
            $data['last_rent_value']	   = $this->input->post('last_rent_value');
            $data['num_rent_df2at']	   = $this->input->post('num_rent_df2at');
            $data['total_value_aked']	   = $this->input->post('total_value_aked');
///
            $this->db->where('id',$id);
            $this->db->update('family_serv_egar_manzel',$data);
        }
    
        public function select_egar_help($national_id)
        {
            return $this->db->select('family_serv_egar_manzel.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
                            ->join('mother','family_serv_egar_manzel.mother_national_num=mother.mother_national_num_fk','LEFT')
                        
                           // ->join('family_setting nationality','family_serv_zawaj.national_num_husband=nationality.id_setting','LEFT')
                           // ->join('f_members','family_serv_zawaj.person_id_fk=f_members.id','LEFT')
                            ->where('family_serv_egar_manzel.mother_national_num',$national_id)
                            ->get('family_serv_egar_manzel')
                            ->result();
        }
    
        public function getSetting($where)
        {
            return $this->db->where($where)->get('family_setting')->result();
        }
    
        public function getSetting_house($where)
        {
            return $this->db->where($where)->get('family_serv_egar_settings')->result();
        }
    
        public function selectegar_helpByID($id)
        {
            return $this->db->select('family_serv_egar_manzel.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
                            ->join('mother','family_serv_egar_manzel.mother_national_num=mother.mother_national_num_fk','LEFT')
                            ->where('family_serv_egar_manzel.id',$id)
                            ->get('family_serv_egar_manzel')
                            ->row_array();
        }
    
        public function deleteegar_help($id)
        {
            $this->db->where('id',$id)->delete('family_serv_egar_manzel');
        }
    
    }
    
    /* End of file Marriage_help_model.php */
    /* Location: ./application/models/services_models/Marriage_help_model.php */