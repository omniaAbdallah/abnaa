<?php
class Osr_crm_m extends CI_Model
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
    function get_all_operations($mother_num){
    $data_where['mother_national_num'] = $mother_num;
    return  $this->db->where($data_where)->get('osr_bahth_hdoor')->result_array();
}
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('osr_crm');
        //
        $this->db->where("zyraa_id_fk", null);
        $this->db->where("related_to_zyraa", 'no');
        //
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $query_result = $query->result();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query_result as $row) {
                $query_result[$i]->method_etsal_name = $this->get_settting($row->wasela_etsal);
                $query_result[$i]->natega_etsal_name = $this->get_settting($row->contact_result);
                //  $query_result[$i]->purpose_etsal_name = $this->get_settting($row->purpose_etsal);
                if (!empty($row->purpose_etsal)) {
                    $query_result[$i]->purpose_etsal_name = $this->get_settting($row->purpose_etsal);
                }
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    // select_all_osr_crm
    public function select_all_osr_crm($mother_num)
    {
        $this->db->select('*');
        $this->db->from('osr_crm');
        //
        $this->db->where("mother_national_num", $mother_num);
        // $this->db->where("zyraa_id_fk",null);
        // $this->db->where("related_to_zyraa",'no');
        //
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $query_result = $query->result();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query_result as $row) {
                $query_result[$i]->method_etsal_name = $this->get_settting($row->wasela_etsal);
                $query_result[$i]->natega_etsal_name = $this->get_settting($row->contact_result);
                //  $query_result[$i]->purpose_etsal_name = $this->get_settting($row->purpose_etsal);
                if (!empty($row->purpose_etsal)) {
                    $query_result[$i]->purpose_etsal_name = $this->get_settting($row->purpose_etsal);
                }
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    // select_all_etsal
    public function select_all_etsal($id)
    {
        $this->db->select('*');
        $this->db->from('osr_crm');
        //
        $this->db->where("zyraa_id_fk", $id);
        $this->db->where("related_to_zyraa", 'yes');
        //
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $query_result = $query->result();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query_result as $row) {
                $query_result[$i]->method_etsal_name = $this->get_settting($row->wasela_etsal);
                $query_result[$i]->natega_etsal_name = $this->get_settting($row->contact_result);
                if (!empty($row->purpose_etsal)) {
                    $query_result[$i]->purpose_etsal_name = $this->get_settting($row->purpose_etsal);
                }
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    public function get_settting($id)
    {
        $this->db->select("*");
        $this->db->from("osr_crm_settings");
        $this->db->where("conf_id", $id);
        $query = $this->db->get()->row()->title;
        return $query;
    }
    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }
    public function get_table($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_table_by_id($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table)->row();
        return $query;
    }
    public function insert()
    {
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['contact_date'] = $this->input->post('contact_date');
        $data['contact_time'] = date('H:i a');
        $data['wasela_etsal'] = $this->input->post('wasela_etsal');
        $data['contact_result'] = $this->input->post('contact_result');
        $data['purpose_etsal'] = $this->input->post('purpose_etsal');
       // $data['file_num'] = $this->get_file_num($data['mother_national_num']);
               $data['osra_id'] =$this->get_osra_details($this->input->post('mother_national_num'),'id');
        $data['file_num'] =$this->get_osra_details($this->input->post('mother_national_num'),'file_num');
        $data['details'] = $this->input->post('visit_result');
        $data['emp_code'] = $_SESSION["user_id"];
        $data['emp_name'] = $this->getUserName($_SESSION["user_id"]);
        $this->db->insert('osr_crm', $data);
        $this->add_history_osr(600, $this->input->post('mother_national_num'));
        $this->db->where('mother_national_num', $data['mother_national_num'])->update('basic', array('osr_crm' => 1));
    }
    //    insert_etsal
    public function insert_etsal($id)
    {
        $data['zyraa_id_fk'] = $id;
        $data['related_to_zyraa'] = 'yes';
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['contact_date'] = $this->input->post('contact_date');
        $data['contact_time'] = date('H:i a');
        $data['wasela_etsal'] = $this->input->post('wasela_etsal');
        $data['contact_result'] = $this->input->post('contact_result');
        //$data['file_num'] = $this->get_file_num($data['mother_national_num']);
                 $data['osra_id'] =$this->get_osra_details($this->input->post('mother_national_num'),'id');
        $data['file_num'] =$this->get_osra_details($this->input->post('mother_national_num'),'file_num');
        $data['purpose_etsal'] = $this->input->post('purpose_etsal');
        $data['details'] = $this->input->post('visit_result');
        $data['emp_code'] = $_SESSION["user_id"];
        $data['emp_name'] = $this->getUserName($_SESSION["user_id"]);
        $this->db->insert('osr_crm', $data);
    }
    public function update($id)
    {
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['contact_date'] = $this->input->post('contact_date');
        $data['contact_time'] = date('H:i a');
        $data['wasela_etsal'] = $this->input->post('wasela_etsal');
        $data['contact_result'] = $this->input->post('contact_result');
        $data['details'] = $this->input->post('visit_result');
        $data['purpose_etsal'] = $this->input->post('purpose_etsal');
       // $data['file_num'] = $this->get_file_num($data['mother_national_num']);
               $data['osra_id'] =$this->get_osra_details($this->input->post('mother_national_num'),'id');
        $data['file_num'] =$this->get_osra_details($this->input->post('mother_national_num'),'file_num');
        $this->db->where('id', $id)->update('osr_crm', $data);
        $this->add_history_osr(601, $this->input->post('mother_national_num'));
    }
    public function get_file_num($mother_national_num)
    {
        $query = $this->db->where('mother_national_num', $mother_national_num)->get('basic')->row();
        if ($query->file_num != 0) {
            return $query->file_num;
        } else {
            return $query->id;
        }
    }
    //new_funnccc
    public function check_date($visit_date, $visit_time_from, $visit_time_to)
    {
        $this->db->select('visit_date');
        $this->db->from("osr_crm");
        $this->db->where("visit_date", $visit_date);
        $this->db->where("visit_time_from", $visit_time_from);
        $this->db->where("visit_time_to", $visit_time_to);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;
    }
    public function get_fasel_zamni()
    {
        $this->db->select('fasel_zeyara');
        $this->db->from('osr_main_setting');
        $this->db->where(array("id" => 1));
        $query = $this->db->get()->row()->fasel_zeyara;
        return $query;
    }
    public function delete($id)
    {
        $mother_national_num = $this->db->where('id', $id)->get('osr_crm')->row()->mother_national_num;
        $this->add_history_osr(602, $mother_national_num);
        $this->db->where('id', $id)->delete('osr_crm');
    }
    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
                return $data->user_username;
            } elseif ($data->role_id_fk == 2) {
                $id = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            } elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            } elseif ($data->role_id_fk == 4) {
                $id = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;
    }
    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }
    public function getByArray($id)
    {
        $this->db->select('*');
        $this->db->from('osr_crm');
        $this->db->where(array("id" => $id));
        $query = $this->db->get();
        return $query->row_array();
    }
////////////////////21-2-2021
    public function get_basic_mother_num($mother_num)
    {
        //  $h = $this->db->get_where("basic",array("mother_national_num"=>$mother_num));
        $where = array("basic.mother_national_num" => $mother_num);
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->join('family_setting', 'family_setting.id_setting=basic.contact_mob_relationship', "left");
        $this->db->where($where);
        $h = $this->db->get();
        $data = $h->row_array();
        $data["files_status_color"] = $this->get_files_status_setting($data["file_status"]);
        return $data;
    }
    public function get_files_status_setting($file_status_id)
    {
        $this->db->where('id', $file_status_id);
        $query = $this->db->get('files_status_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->color;
        } else {
            return "لم يضاف الاسم";
        }
    }
    function add_history_osr($action_code, $mother_id)
    {
        $action_name = $this->db->where('code', $action_code)->get('osr_action_process')->row()->process_name;
        $data['action_code'] = $action_code;
        $data['action_name'] = $action_name;
        $data['mother_national_num'] = $mother_id;
        $data['date_action'] = date('Y-m-d');
        $data['time_action'] = date('h:i a');
        $data['publisher'] = $_SESSION["user_id"];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('osr_all_history', $data);
    }
    
    
        public function select_all_youm(){
        $this->db->select('*');
        $this->db->from('osr_crm');
    //
    $this->db->where("zyraa_id_fk",null);
    $this->db->where("related_to_zyraa",'no');
        $this->db->where("date_added",strtotime(date('Y-m-d')));
    //
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
         
            $i=0;
            foreach ($query_result as $row) {
      
             $query_result[$i]->method_etsal_name = $this->get_settting($row->wasela_etsal); 
             $query_result[$i]->natega_etsal_name = $this->get_settting($row->contact_result);
             $i++; 
            }
            return $query_result;
        }
       return false;
    } 
    
         public function get_count_etsal()
    {
        $this->db->select('osr_crm.*');
        $this->db->from('osr_crm');

        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query;
    }
    
        public function get_osra_details($mother_national_num,$val){
        $this->db->where('mother_national_num', $mother_national_num);
        $query = $this->db->get('basic');
        if ($query->num_rows() > 0) {
            return $query->row()->$val;
        } else {
            return false;

        }
    }
/********************************************************/

function start_hdoor($mother_num,$file_num){
    $data['mother_national_num'] = $mother_num;
    $data['file_num'] = $file_num;
    $data['start_bahth'] = 'yes';
    $data['start_bahth_date'] = date('Y-m-d');
    $data['start_bahth_time'] = date('h:i a');
    $data['start_bahth_user_id'] = $_SESSION["user_id"];
    $data['start_bahth_emp_n'] = $this->getUserName($_SESSION['user_id']);
    $this->db->insert('osr_bahth_hdoor', $data);
}
function check_hdoor_bahth($mother_num){
    $data_where['mother_national_num'] = $mother_num;
    $data_where['end_bahth'] = 'no';
    return  $this->db->where($data_where)->get('osr_bahth_hdoor')->last_row('array');
}
function check_befor_hdoor($mother_num,$file_num){
    $data_where['mother_national_num'] = $mother_num;
    $data_where['file_num'] = $file_num;
    $data_where['hdoor_osr_bahth'] = 'no';
    $data_where['end_bahth'] = 'no';
    $data_where['taslem_mosdand'] = 'no';


    return  $this->db->where($data_where)->get('osr_bahth_hdoor')->row_array();
}
function check_befor_taslem_mosdand($mother_num){
    $data_where['mother_national_num'] = $mother_num;
    $data_where['hdoor_osr_bahth'] = 'no';
    $data_where['end_bahth'] = 'no';
    $data_where['taslem_mosdand'] = 'no';
    return  $this->db->where($data_where)->get('osr_bahth_hdoor')->row_array();
}
function make_hdoor($mother_num,$file_num){
    $data_where['mother_national_num'] = $mother_num;
    $data_where['file_num'] = $file_num;
    $data_where['hdoor_osr_bahth'] = 'no';
    $data_where['end_bahth'] = 'no';
    $data_where['taslem_mosdand'] = 'no';

    $data['hdoor_osr_bahth'] = 'yes';
    $data['hdoor_osr_bahth_date'] = date('Y-m-d');
    $data['hdoor_osr_bahth_time'] = date('h:i a');
    $data['hdoor_osr_bahth_user_id'] = $_SESSION["user_id"];
    $data['hdoor_osr_bahth_emp_n'] = $this->getUserName($_SESSION['user_id']);
    $this->db->where($data_where)->update('osr_bahth_hdoor', $data);
}
function end_taslem($mother_num,$file_num){
    $data_where['mother_national_num'] = $mother_num;
    $data_where['file_num'] = $file_num;
    $data_where['hdoor_osr_bahth'] = 'yes';
    $data_where['end_bahth'] = 'no';
    $data_where['taslem_mosdand'] = 'no';

    $data['taslem_mosdand'] = 'yes';
    $data['taslem_mosdand_date'] = date('Y-m-d');
    $data['taslem_mosdand_time'] = date('h:i a');
    $data['taslem_mosdand_user_id'] = $_SESSION["user_id"];
    $data['taslem_mosdand_emp_n'] = $this->getUserName($_SESSION['user_id']);
    $this->db->where($data_where)->update('osr_bahth_hdoor', $data);
}
function end_review($mother_num,$file_num){
    $data_where['mother_national_num'] = $mother_num;
    $data_where['file_num'] = $file_num;
    $data_where['hdoor_osr_bahth'] = 'yes';
    $data_where['taslem_mosdand'] = 'yes';
    $data_where['end_bahth'] = 'no';

    $data['end_review'] = 'yes';
    $data['end_review_date'] = date('Y-m-d');
    $data['end_review_time'] = date('h:i a');
    $data['end_review_user_id'] = $_SESSION["user_id"];
    $data['end_review_emp_n'] = $this->getUserName($_SESSION['user_id']);
    $this->db->where($data_where)->update('osr_bahth_hdoor', $data);
}
function send_review_to($mother_num,$review_to_user_id){
    $data_where['mother_national_num'] = $mother_num;
    $data_where['hdoor_osr_bahth'] = 'yes';
    $data_where['taslem_mosdand'] = 'yes';
    $data_where['end_review'] = 'no';
    $data_where['end_bahth'] = 'no';

    $data['review_to'] = 'yes';
    $data['review_to_date'] = date('Y-m-d');
    $data['review_to_time'] = date('h:i a');
    $data['review_to_user_id'] = $review_to_user_id;
    $data['review_to_emp_n'] = $this->getUserName($review_to_user_id);
    $this->db->where($data_where)->update('osr_bahth_hdoor', $data);
}
function send_bahth_to($mother_num,$bahth_to_user_id){
    $data_where['mother_national_num'] = $mother_num;
    $data_where['hdoor_osr_bahth'] = 'yes';
    $data_where['taslem_mosdand'] = 'yes';
    $data_where['end_review'] = 'yes';
    $data_where['end_bahth'] = 'no';

    $data['bahth_to'] = 'yes';
    $data['bahth_to_date'] = date('Y-m-d');
    $data['bahth_to_time'] = date('h:i a');
    $data['bahth_to_user_id'] = $bahth_to_user_id;
    $data['bahth_to_emp_n'] = $this->getUserName($bahth_to_user_id);
    $this->db->where($data_where)->update('osr_bahth_hdoor', $data);
}    
    
 
function check_befor_start_hdoor($mother_num,$file_num){
$data_where['mother_national_num'] = $mother_num;
$data_where['file_num'] = $file_num;
$data_where['hdoor_osr_bahth'] = 'no';
$data_where['end_bahth'] = 'no';
$data_where['taslem_mosdand'] = 'no';
$data_where['start_bahth'] = 'yes';


return  $this->db->where($data_where)->get('osr_bahth_hdoor')->row_array();
}
function check_befor_end_taslem($mother_num,$file_num){
$data_where['mother_national_num'] = $mother_num;
$data_where['file_num'] = $file_num;
$data_where['hdoor_osr_bahth'] = 'yes';
$data_where['end_bahth'] = 'no';
$data_where['taslem_mosdand'] = 'yes';
$data_where['start_bahth'] = 'yes';


return  $this->db->where($data_where)->get('osr_bahth_hdoor')->row_array();
}
function check_befor_end_review($mother_num){
$data_where['mother_national_num'] = $mother_num;
$data_where['hdoor_osr_bahth'] = 'yes';
$data_where['end_bahth'] = 'no';
$data_where['taslem_mosdand'] = 'yes';
$data_where['start_bahth'] = 'yes';
$data_where['end_review'] = 'yes';

return  $this->db->where($data_where)->get('osr_bahth_hdoor')->row_array();
}   
    
} ?>