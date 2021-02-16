<?php
class Start_galsa_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function get_all_mahawer($rkm,$val)
    {
        $this->db->where('galsa_rkm',$rkm);
        $this->db->where('elqrar_add',$val);
        $query=$this->db->get('egtm_galast_mahwer');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    public function update_qrar()
    {
        $id=$this->input->post('valu');
        $mehar=$this->input->post('mehar');

        $data['elqrar']=$mehar;
        $data['elqrar_date_add']=date("Y-m-d");
        $data['elqrar_date_add_ar']=date("Y-m-d");
        $data['elqrar_publisher']=$_SESSION['user_id'];
        $data['elqrar_add']=1;
        $data['elqrar_publisher_name']=$this->getUserName($_SESSION['user_id']);
        $query=$this->db->get('egtm_galast_mahwer');
        $this->db->where('id',$id);
        $this->db->update('egtm_galast_mahwer',$data);

    }
    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }

    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }

    public function update_table_hoddor()
    {
        $id=$this->input->post('mem_id_fk');
        $attend=$this->input->post('attend');
        if(!empty($attend)&&!empty($id))
        {
            for($x=0;$x<count($attend);$x++)
            {
                $data['hdoor_satus']=$this->input->post('attend')[$x];
                $this->db->where('emp_code',$this->input->post('mem_id_fk')[$x]);
                $this->db->update('egtm_galast_members',$data);
            }
        }
    }


    public function update_start_galsa($tim)
    {
        $galsa_rkm=$this->input->post('galsa_rkm');
        $data['start_at']=$tim;
        $this->db->where('galsa_rkm',$galsa_rkm);
        $this->db->update('egtm_galast',$data);
    }

    /*********************************************************/

    public function get_open_galsa()
    {

        $this->db->where('finshed!=',1);
        $query=$this->db->get('egtm_galast');
        $this->db->order_by('galsa_rkm','desc');
        if($query->num_rows()>0)
        {
            return $query->row()->galsa_rkm+1;
        }else{
            return 0;
        }
    }
    public function finished_galsa($tim)
    {
        $galsa_rkm=$this->input->post('galsa_rkm');
        $data['end_at']=$tim;
        $data['hader_num']=$this->get_last_galsa_member($galsa_rkm,1);
       // $data['num_absent']=$this->get_last_galsa_member($galsa_rkm,0);
        $data['finshed']=1;
       // $data['glsa_finshed_title']='�����';
        $this->db->where('galsa_rkm',$galsa_rkm);
        $this->db->update('egtm_galast',$data);
    }
    public function get_last_galsa_member($rkm,$num)
    {
        $this->db->where('galsa_rkm_fk',$rkm);
        $this->db->where('hdoor_satus',$num);
        $query=$this->db->get('egtm_galast_members');
        return $query->num_rows();

    }




}