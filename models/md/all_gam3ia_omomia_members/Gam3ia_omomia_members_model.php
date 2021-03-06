<?php

class Gam3ia_omomia_members_model extends CI_Model
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

    public function insert($files)
    {

        if (!empty($files)) {
            foreach ($files as $name => $file) {
                if (!empty($file)) {
                    $data[$name] = $this->chek_Null($file);
                }
            }

        }


        /*  if (!empty($morfaq)) {
              $arr_name_db = array('morfaq1', 'morfaq2', 'morfaq3', 'morfaq4');
              foreach ($morfaq as $key => $item) {
                  $data[$arr_name_db[$key]] = $this->chek_Null($item);
              }
          }*/
          
          //yara
        $data['madina_fk'] = $this->chek_Null($this->input->post('city_id_fk'));
        $madina_fk = $this->input->post('city_id_fk');
        $madina_title = $this->get_id('cities', 'id', $madina_fk, 'name');
        $data['madina_title'] = $madina_title;
//yara
          
          
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['gns'] = $this->chek_Null($this->input->post('gns'));

        $gns = $this->input->post('gns');
        $gns_title = $this->get_id('employees_settings', 'id_setting', $gns, 'title_setting');

        $data['gns_title'] = $gns_title;


        $data['laqb_fk'] = $this->chek_Null($this->input->post('laqb_fk'));
        $laqb_fk = $this->input->post('laqb_fk');
        $laqb_title = $this->get_id('md_settings', 'id_setting', $laqb_fk, 'title_setting');
        $data['laqb_title'] = $laqb_title;

        $data['gnsia_fk'] = $this->chek_Null($this->input->post('gnsia_fk'));

        $gnsia_fk = $this->input->post('gnsia_fk');
        $gnsia_title = $this->get_id('employees_settings', 'id_setting', $gnsia_fk, 'title_setting');

        $data['gnsia_title'] = $gnsia_title;


        $data['hala_egtma3ia_fk'] = $this->chek_Null($this->input->post('hala_egtma3ia_fk'));
        $hala_egtma3ia_fk = $this->input->post('hala_egtma3ia_fk');
        $hala_egtma3ia_title = $this->get_id('employees_settings', 'id_setting', $hala_egtma3ia_fk, 'title_setting');

        $data['hala_egtma3ia_title'] = $hala_egtma3ia_title;
        $data['card_num'] = $this->chek_Null($this->input->post('card_num'));

        $data['geha_esdar_fk'] = $this->chek_Null($this->input->post('geha_esdar_fk'));
        $geha_esdar_fk = $this->input->post('geha_esdar_fk');
        $geha_esdar_title = $this->get_id('employees_settings', 'id_setting', $geha_esdar_fk, 'title_setting');
        $data['geha_esdar_title'] = $geha_esdar_title;

        $data['esdar_date_m'] = $this->chek_Null($this->input->post('esdar_date_m'));
        $data['esdar_date_h'] = $this->chek_Null($this->input->post('esdar_date_h'));
        $data['esdar_date_h'] = $this->chek_Null($this->input->post('esdar_date_h'));

        $data['birth_date_h'] = $this->chek_Null($this->input->post('birth_date_h'));

        $data['birth_date_m'] = $this->chek_Null($this->input->post('birth_date_m'));
        $array_date_m = explode("/", $data['birth_date_m']);
        $data['birth_date_m_y'] = $this->chek_Null($array_date_m[2]);

        $data['birth_date_h'] = $this->chek_Null($this->input->post('birth_date_h'));
        $array_date_h = explode("/", $data['birth_date_h']);
        $data['birth_date_h_y'] = $this->chek_Null($array_date_h[2]);

        $data['birth_date'] = strtotime($this->chek_Null($this->input->post('birth_date_m')));

        $data['jwal'] = $this->chek_Null($this->input->post('jwal'));
        $data['jwal_another'] = $this->chek_Null($this->input->post('jwal_another'));

        $data['madina_fk'] = $this->chek_Null($this->input->post('madina_fk'));
        $madina_fk = $this->input->post('madina_fk');
        $madina_title = $this->get_id('cities', 'id', $madina_fk, 'name');
        $data['madina_title'] = $madina_title;

        $data['hai_fk'] = $this->chek_Null($this->input->post('hai_fk'));
        $hai_fk = $this->input->post('hai_fk');
        $hai_title = $this->get_id('cities', 'id', $hai_fk, 'name');
        $data['hai_title'] = $hai_title;

        $data['street_name'] = $this->chek_Null($this->input->post('street_name'));
        $data['enwan_watni'] = $this->chek_Null($this->input->post('enwan_watni'));
        $data['email'] = $this->chek_Null($this->input->post('email'));

        $data['daraga_3elmia_fk'] = $this->chek_Null($this->input->post('daraga_3elmia_fk'));
        $daraga_3elmia_fk = $this->input->post('daraga_3elmia_fk');
        $daraga_3elmia_title = $this->get_id('employees_settings', 'id_setting', $daraga_3elmia_fk, 'title_setting');
        $data['daraga_3elmia_title'] = $daraga_3elmia_title;

        $data['moahel_3elmi_fk'] = $this->chek_Null($this->input->post('moahel_3elmi_fk'));

        $moahel_3elmi_fk = $this->input->post('moahel_3elmi_fk');
        $moahel_3elmi_title = $this->get_id('employees_settings', 'id_setting', $moahel_3elmi_fk, 'title_setting');
        $data['moahel_3elmi_title'] = $moahel_3elmi_title;


        $data['hya_3elmia_fk'] = $this->chek_Null($this->input->post('hya_3elmia_fk'));
        $data['mehna_fk'] = $this->chek_Null($this->input->post('mehna_fk'));
        $mehna_fk = $this->input->post('mehna_fk');
        $mehna_title = $this->get_id('md_settings', 'id_setting', $mehna_fk, 'title_setting');
        $data['mehna_title'] = $mehna_title;

        if ($this->input->post('geha_amal')) {
            $data['geha_amal'] = $this->chek_Null($this->input->post('geha_amal'));
        }
        if ($this->input->post('enwan_amal')) {
            $data['enwan_amal'] = $this->chek_Null($this->input->post('enwan_amal'));
        }

        if ($this->input->post('hatf_amal')) {
            $data['hatf_amal'] = $this->chek_Null($this->input->post('hatf_amal'));
        }

        $data['map_google_lng'] = $this->chek_Null($this->input->post('map_google_lng'));
        $data['map_google_lat'] = $this->chek_Null($this->input->post('map_google_lat'));

        $this->db->insert('md_all_gam3ia_omomia_members', $data);

    }

    public function get_id($table, $where, $value, $select)
    {
        $query = $this->db->get_where($table, array($where => $value));
        if ($query->num_rows() > 0) {
            return $query->row()->$select;
        }
        return 0;
    }

    public function getById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('md_all_gam3ia_omomia_members');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->odwiat = $this->get_odwiat($row->id);


                $i++;
            }
            return $data;
            //  return $query->row();
        }
        return 0;
    }

    public function get_member_data($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('md_all_gam3ia_omomia_members');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return 0;
    }

    public function GetFromEmployees_settings($type)
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }


    public function GetFromGeneral_assembly_settings($type)
    {
        $this->db->select('*');
        $this->db->from('md_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }



    public function select_all_new()
    {
        //$this->db->select('*');
        $this->db->select('md_all_gam3ia_omomia_members.*, md_all_gam3ia_omomia_odwiat.rkm_odwia as rkm_odwia_full , md_all_gam3ia_omomia_odwiat.no3_odwia_title ,md_all_gam3ia_omomia_odwiat.rkm_odwia,
        md_all_gam3ia_omomia_odwiat.odwia_status_title
          ');
       
        $this->db->from('md_all_gam3ia_omomia_members');
        $this->db->join('md_all_gam3ia_omomia_odwiat', 'md_all_gam3ia_omomia_odwiat.member_id_fk = md_all_gam3ia_omomia_members.id', "LEFT");
        $this->db->order_by("md_all_gam3ia_omomia_odwiat.rkm_odwia", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
               // $data[$i]->odwiat = $this->get_odwiat($row->id);
                $i++;
            }
            return $data;
        } else {
            return false;
        }

    }


    public function select_all_web()
    {
        $this->db->select('md_all_gam3ia_omomia_members.*,md_all_gam3ia_omomia_odwiat.odwia_status_fk');
        $this->db->from('md_all_gam3ia_omomia_members');
          $this->db->where('md_all_gam3ia_omomia_odwiat.odwia_status_fk', 1);
         $this->db->join('md_all_gam3ia_omomia_odwiat', 'md_all_gam3ia_omomia_odwiat.member_id_fk = md_all_gam3ia_omomia_members.id', "LEFT");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->odwiat = $this->get_odwiat_web($row->id);
                $i++;
            }
            return $data;
        } else {
            return false;
        }

    }
   public function get_odwiat_web($id)
    {
        $this->db->where('member_id_fk', $id);
         $this->db->where('odwia_status_fk', 1);
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_odwiat');
         $this->db->order_by("rkm_odwia", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        }
        return false;


    }


    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_members');
       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->odwiat = $this->get_odwiat($row->id);
                $i++;
            }
            return $data;
        } else {
            return false;
        }

    }


    public function get_odwiat($id)
    {
        $this->db->where('member_id_fk', $id);
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_odwiat');
         $this->db->order_by("rkm_odwia", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        }
        return false;


    }

    public function select_areas()
    {
        $this->db->where('from_id_fk', 0);
        $this->db->order_by("in_order", "asc");
        $query = $this->db->get("cities");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[$key->id] = $key->name;

            }
            return $data;
        }
        return false;
    }

    public function select_residentials()
    {
        $this->db->where('from_id_fk !=', 0);

        $this->db->order_by("in_order", "asc");

        $query = $this->db->get("cities");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update($files, $id)
    {

        if (!empty($files)) {
            foreach ($files as $name => $file) {
                if (!empty($file)) {
                    $data[$name] = $this->chek_Null($file);
                }
            }

        }

        /* if (!empty($morfaq)) {
             $arr_name_db = array('morfaq1', 'morfaq2', 'morfaq3', 'morfaq4');
             foreach ($arr_name_db as $key => $item) {
                 if (isset($morfaq[$key])) {
                     $data[$item] = $this->chek_Null($morfaq[$key]);
                 } else {
                     $data[$item] = '';

                 }
             }
         }*/

//yara
        $data['madina_fk'] = $this->chek_Null($this->input->post('city_id_fk'));
        $madina_fk = $this->input->post('city_id_fk');
        $madina_title = $this->get_id('cities', 'id', $madina_fk, 'name');
        $data['madina_title'] = $madina_title;
//yara

        $data['esdar_date_h'] = $this->chek_Null($this->input->post('esdar_date_h'));
        $data['birth_date_h'] = $this->chek_Null($this->input->post('birth_date_h'));


        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['gns'] = $this->chek_Null($this->input->post('gns'));

        $gns = $this->input->post('gns');
        $gns_title = $this->get_id('employees_settings', 'id_setting', $gns, 'title_setting');

        $data['gns_title'] = $gns_title;


        $data['laqb_fk'] = $this->chek_Null($this->input->post('laqb_fk'));
        $laqb_fk = $this->input->post('laqb_fk');
        $laqb_title = $this->get_id('md_settings', 'id_setting', $laqb_fk, 'title_setting');
        $data['laqb_title'] = $laqb_title;

        $data['gnsia_fk'] = $this->chek_Null($this->input->post('gnsia_fk'));

        $gnsia_fk = $this->input->post('gnsia_fk');
        $gnsia_title = $this->get_id('employees_settings', 'id_setting', $gnsia_fk, 'title_setting');

        $data['gnsia_title'] = $gnsia_title;


        $data['hala_egtma3ia_fk'] = $this->chek_Null($this->input->post('hala_egtma3ia_fk'));
        $hala_egtma3ia_fk = $this->input->post('hala_egtma3ia_fk');
        $hala_egtma3ia_title = $this->get_id('employees_settings', 'id_setting', $hala_egtma3ia_fk, 'title_setting');

        $data['hala_egtma3ia_title'] = $hala_egtma3ia_title;
        $data['card_num'] = $this->chek_Null($this->input->post('card_num'));

        $data['geha_esdar_fk'] = $this->chek_Null($this->input->post('geha_esdar_fk'));
        $geha_esdar_fk = $this->input->post('geha_esdar_fk');
        $geha_esdar_title = $this->get_id('employees_settings', 'id_setting', $geha_esdar_fk, 'title_setting');
        $data['geha_esdar_title'] = $geha_esdar_title;

        $data['esdar_date_m'] = $this->chek_Null($this->input->post('esdar_date_m'));
        $data['esdar_date_h'] = $this->chek_Null($this->input->post('esdar_date_h'));

        $data['birth_date_m'] = $this->chek_Null($this->input->post('birth_date_m'));
        $array_date_m = explode("/", $data['birth_date_m']);
        $data['birth_date_m_y'] = $this->chek_Null($array_date_m[2]);

        $data['birth_date_h'] = $this->chek_Null($this->input->post('birth_date_h'));
        $array_date_h = explode("/", $data['birth_date_h']);
        $data['birth_date_h_y'] = $this->chek_Null($array_date_h[2]);

        $data['birth_date'] = strtotime($this->chek_Null($this->input->post('birth_date_m')));

        $data['jwal'] = $this->chek_Null($this->input->post('jwal'));
        $data['jwal_another'] = $this->chek_Null($this->input->post('jwal_another'));

        $data['madina_fk'] = $this->chek_Null($this->input->post('madina_fk'));
        $madina_fk = $this->input->post('madina_fk');
        $madina_title = $this->get_id('cities', 'id', $madina_fk, 'name');
        $data['madina_title'] = $madina_title;

        $data['hai_fk'] = $this->chek_Null($this->input->post('hai_fk'));
        $hai_fk = $this->input->post('hai_fk');
        $hai_title = $this->get_id('cities', 'id', $hai_fk, 'name');
        $data['hai_title'] = $hai_title;

        $data['street_name'] = $this->chek_Null($this->input->post('street_name'));
        $data['enwan_watni'] = $this->chek_Null($this->input->post('enwan_watni'));
        $data['email'] = $this->chek_Null($this->input->post('email'));

        $data['daraga_3elmia_fk'] = $this->chek_Null($this->input->post('daraga_3elmia_fk'));
        $daraga_3elmia_fk = $this->input->post('daraga_3elmia_fk');
        $daraga_3elmia_title = $this->get_id('employees_settings', 'id_setting', $daraga_3elmia_fk, 'title_setting');
        $data['daraga_3elmia_title'] = $daraga_3elmia_title;

        $data['moahel_3elmi_fk'] = $this->chek_Null($this->input->post('moahel_3elmi_fk'));

        $moahel_3elmi_fk = $this->input->post('moahel_3elmi_fk');
        $moahel_3elmi_title = $this->get_id('employees_settings', 'id_setting', $moahel_3elmi_fk, 'title_setting');
        $data['moahel_3elmi_title'] = $moahel_3elmi_title;


        $data['hya_3elmia_fk'] = $this->chek_Null($this->input->post('hya_3elmia_fk'));
        $data['mehna_fk'] = $this->chek_Null($this->input->post('mehna_fk'));
        $mehna_fk = $this->input->post('mehna_fk');
        $mehna_title = $this->get_id('md_settings', 'id_setting', $mehna_fk, 'title_setting');
        $data['mehna_title'] = $mehna_title;

        if ($this->input->post('geha_amal')) {
            $data['geha_amal'] = $this->chek_Null($this->input->post('geha_amal'));
        }
        if ($this->input->post('enwan_amal')) {
            $data['enwan_amal'] = $this->chek_Null($this->input->post('enwan_amal'));
        }

        if ($this->input->post('hatf_amal')) {
            $data['hatf_amal'] = $this->chek_Null($this->input->post('hatf_amal'));
        }

        $data['map_google_lng'] = $this->chek_Null($this->input->post('map_google_lng'));
        $data['map_google_lat'] = $this->chek_Null($this->input->post('map_google_lat'));

        $this->db->where('id', $id);
        $this->db->update('md_all_gam3ia_omomia_members', $data);

        //  print_r($data);


    }

    public function update_morfaqs($id, $morfaq)
    {
        if (!empty($morfaq)) {
            $arr_name_db = array('morfaq1', 'morfaq2', 'morfaq3', 'morfaq4');
            foreach ($arr_name_db as $key => $item) {
                if (isset($morfaq[$key])) {
                    $data[$item] = $this->chek_Null($morfaq[$key]);
                } else {
                    $data[$item] = '';

                }
            }
            $this->db->where('id', $id);
            $this->db->update('md_all_gam3ia_omomia_members', $data);

        }

    }

    public function delete($id)
    {

        $this->db->where("id", $id);
        $this->db->delete("md_all_gam3ia_omomia_members");
    }


    public function GetHaiName()
    {
        $this->db->select('*');
        $this->db->from('cities');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->name;
            }
            return $data;
        }
        return false;
    }
/***************************/

  
  //yara
    
    
    public function add_setting_mo2hl($type)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('mo2hl'));
     
        $data['type'] = $type;
        $this->db->insert('employees_settings', $data);
    }
    public function add_setting_esdar($type)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('esdar'));
     
        $data['type'] = $type;
        $this->db->insert('employees_settings', $data);
    }
    public function update_setting_mo2hl($type,$id)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('mo2hl'));
     
        $data['type'] = $type;
        $this->db->where('id_setting',$id)->update('employees_settings', $data);
    }
    public function update_setting_esdar($type,$id)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('esdar'));
     
        $data['type'] = $type;
        $this->db->where('id_setting',$id)->update('employees_settings', $data);
    }
    public function delete_setting_mo2hl($id)
    {

        $this->db->where("id_setting", $id);
        $this->db->delete("employees_settings");
    }
  
    
    public function GetFromGeneral_settings_mo2hl($id,$type)
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where('type', $type);
        $this->db->where('id_setting', $id);
        $query = $this->db->get()->row();
       
        return $query;
    }
  
///yara

   
    //yara
    public function add_setting($type)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('mhna'));
     
        $data['type'] = $type;
        $this->db->insert('md_settings', $data);
    }
    public function update_setting($type,$id)
    {
        $data['title_setting'] = $this->chek_Null($this->input->post('mhna'));
     
        $data['type'] = $type;
        $this->db->where('id_setting',$id)->update('md_settings', $data);
    }
    public function delete_setting($id)
    {

        $this->db->where("id_setting", $id);
        $this->db->delete("md_settings");
    }
    public function GetFromGeneral_settings($id,$type)
    {
        $this->db->select('*');
        $this->db->from('md_settings');
        $this->db->where('type', $type);
        $this->db->where('id_setting', $id);
        $query = $this->db->get()->row();
       
        return $query;
    }



    public function change_status_account($valu, $id)
    {
        $status = 1- $valu;
        $data['suspend'] = $status;
        $this->db->where('id', $id)->update('md_all_gam3ia_omomia_members', $data);

        return $status;
    }

    public function update_account_data($id)
    {
        $data['memb_user_name'] = $this->chek_Null($this->input->post('memb_user_name'));
        $data['memb_password'] =  sha1(md5($this->input->post('memb_password')));

        //$data['suspend'] = $this->chek_Null($this->input->post('suspend'));
        $this->db->where('id', $id);
        $this->db->update('md_all_gam3ia_omomia_members', $data);
    }
/*********************************************************************/

// yara7-5-2020
public function insert_attach($id,$images)
{
    if(isset($images)&& !empty($images))
    {
        $count=count($images);
        for($x=0; $x<$count;$x++)
        {
            $data['title']=$this->input->post('title');
            $data['file']=$images[$x];
            $data['mem_id_fk']=$id;
            $data['date']= strtotime(date("Y-m-d"));
            $data['date_ar']= date("Y-m-d");
            if($_SESSION['role_id_fk']==1){

                $data['publisher']=$_SESSION['user_id'];
                $data['publisher_name']=$_SESSION['user_name'];;
            }
            else if ($_SESSION['role_id_fk']==2){
                $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
        
            }
            else if ($_SESSION['role_id_fk']==3){
                $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
            }
            else if ($_SESSION['role_id_fk']==4){
                $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
            }
            $this->db->insert('md_all_gam3ia_omomia_morfq',$data);
        }
    }
}
public function delete_morfq($id)
{
$this->db->where('id',$id)->delete('md_all_gam3ia_omomia_morfq');
}
public function get_morfq_by_id($id){
    $this->db->where('mem_id_fk',$id);
    $query = $this->db->get('md_all_gam3ia_omomia_morfq');
        return $query->result();
}
public function get_images($id)
{
    $this->db->where('id',$id);
    $query=$this->db->get('md_all_gam3ia_omomia_morfq');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}
public function get_table($table,$arr){
    if (!empty($arr)){
        $this->db->where($arr);
    }
    $query = $this->db->get($table);
    if ($query->num_rows()>0){
        return $query->result();
    } else{
        return false;
    }
}
public function get_table_by_id($table,$arr){
    if (!empty($arr)){
        $this->db->where($arr);
    }
    $query = $this->db->get($table)->row();
        return $query;
}


  





}