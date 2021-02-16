<?phpclass Mokfat_setting_m extends CI_Model{    function get_last_mokafa_code()    {        $mokafa_code = $this->db->select('MAX(mokafa_code) as mokafa_code')->get('hr_mokafat_types')->row()->mokafa_code;        if (!empty($mokafa_code)) {            return $mokafa_code + 1;        } else {            return '1001';        }    }    public function insert_edara()    {        $data['mokafa_code']= $this->get_last_mokafa_code();        $data['title']= $this->input->post('title');        $this->db->insert('hr_mokafat_types',$data);    }    public function update_edara($id){        $data['mokafa_code']= $this->input->post('title_code');        $data['title']= $this->input->post('title');        $this->db->where('id',$id);        $this->db->update('hr_mokafat_types',$data);    }    public function getById($id){        $h = $this->db->get_where('hr_mokafat_types', array('id'=>$id));        return $h->row_array();    }    public function select_all(){        $this->db->select('*');        $this->db->from('hr_mokafat_types');              $query = $this->db->get();        $query_result=$query->result();        if ($query->num_rows() > 0) {            $i=0;            foreach ($query_result as $row) {               // $query_result[$i]->count =$this->get_sub($row->id);                $i++;            }            return $query_result;        }        return false;    }    public function select_all_mokafat_type_hesabat(){        $this->db->select('*');        $this->db->from('hr_mokafat_type_hesabat');        $query = $this->db->get();        $query_result=$query->result();        if ($query->num_rows() > 0) {            $i=0;            foreach ($query_result as $row) {                $query_result[$i]->name =$this->get_by('hr_mokafat_types',array('mokafa_code'=>$row->mokafa_code),'title');                $i++;            }            return $query_result;        }        return false;    }    public function get_by($table, $where_arr = false, $select = false)    {        if (!empty($where_arr)) {            $this->db->where($where_arr);        }        $query = $this->db->get($table);        if ($query->num_rows() > 0) {            if (!empty($select) && $select != 1) {                return $query->row_array()[$select];            } else {                if ($select == 1) {                    return $query->row_array();                } else {                    return $query->result_array();                }            }        } else {            return false;        }    }    public function insert_hesabat()    {        $data['mokafa_code']= $this->input->post('mokafa_code');        $data['hesab_name']= $this->input->post('hesab_name');        $data['rkm_hesab']= $this->input->post('rkm_hesab');        $data['date_ar']=(date('Y-m-d h:i a'));        $data['date_time']=time();        $data['time']=(date(' h:i a'));        $data['publisher'] = $_SESSION['user_id'];        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);        $this->db->insert('hr_mokafat_type_hesabat',$data);    }    public function update_hesabat($id){        $data['mokafa_code']= $this->input->post('mokafa_code');        $data['hesab_name']= $this->input->post('hesab_name');        $data['rkm_hesab']= $this->input->post('rkm_hesab');        $this->db->where('id',$id);        $this->db->update('hr_mokafat_type_hesabat',$data);    }    public function getUserName($user_id)    {        $sql = $this->db->where("user_id", $user_id)->get('users');        if ($sql->num_rows() > 0) {            $data = $sql->row();            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {                return $data->user_username;            } elseif ($data->role_id_fk == 2) {                $id = $data->user_name;                $table = 'magls_members_table';                $field = 'member_name';            } elseif ($data->role_id_fk == 3) {                $id = $data->emp_code;                $table = 'employees';                $field = 'employee';            } elseif ($data->role_id_fk == 4) {                $id = $data->user_name;                $table = 'general_assembley_members';                $field = 'name';            }            return $this->getUserNameByRoll($id, $table, $field);        }        return false;    }    public function getUserNameByRoll($id, $table, $field)    {        return $this->db->where('id', $id)->get($table)->row_array()[$field];    }}