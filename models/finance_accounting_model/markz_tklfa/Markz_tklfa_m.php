<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Markz_tklfa_m extends CI_Model
{
    
        public function select_markez()
    {
        $query = $this->db->get('finance_markz_taklfa')->result();
        return $query;


    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function add_markez()
    {

    $data['name']=$this->input->post('name');
    $data['color']=$this->input->post('color');
    $data['date_ar'] = date('Y-m-d H:i:s');
    if($_SESSION['role_id_fk']==1){

        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']=$_SESSION['user_name'];
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
    $this->db->insert('finance_markz_taklfa',$data);


    }

    public function select_markez_by_id($id)
    {
    $query = $this->db->where('id',$id)->get('finance_markz_taklfa')->row();
    return $query;

    }

    public function  update_markez($id)
    {
        
        $data['name']=$this->input->post('name');
        $data['color']=$this->input->post('color');
        
    
        $this->db->where('id',$id);
        $this->db->update('finance_markz_taklfa',$data);


    }
    public function delete_markez($id)
    {
        $this->db->where('id',$id)->delete('finance_markz_taklfa');
    
    }
    /////hesab////////////////////////
    public function getAllAccounts($where)
    {
        return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
    }
   /* public function select_hesab()
    {
      $query = $this->db->where('markz_id_fk !=',0)->order_by('markz_id_fk','ASC')->get('finance_markz_taklfa_hesabat')->result();
        if ($query > 0) {
            $i=0;
            foreach ($query as $row) {
                $query[$i]->markez = $this->select_markez_by_id($row->markz_id_fk);
                $i++;
            }
            return $query;
        }
    }*/
    
    /*27-4-om start*/
/*new */
public function getAll_markez($where)
{
    $q = $this->db->where($where)->order_by('parent', 'ASC')->get('finance_markz_taklfa_tree')->result();
    if (!empty($q)) {
        foreach ($q as $key => $item) {
            if ($item->markz_no3 == 2) {
                $q[$key]->acount_parent = $this->get_parent($item->code);
            }
        }
    }
    return $q;
}
public function check_hesab()
{
    return $this->db->order_by('markz_id_fk','ASC')->limit(1)->get('finance_markz_taklfa_hesabat')->row();
}
/*27-4-om end*/

/*27-4-om*/
/*old*/
public function select_hesab()
{
    $query = $this->db->order_by('markz_id_fk','ASC')->get('finance_markz_taklfa_hesabat')->result();
    if ($query > 0) {
        $i=0;
        foreach ($query as $row) {
            /*                $query[$i]->markez = $this->select_markez_by_id($row->markz_id_fk);*/
            $query[$i]->markez = $this->get_markz($row->markz_id_fk);
            $i++;
        }
        return $query;
    }
}
    
    
    public function add_hesab()
{
    $hesab_no3 = $this->input->post('hesab_no3');
    if ($hesab_no3 == 2) {
        $data['markz_id_fk'] = $this->input->post('markez');
        $data['rkm_hesab'] = $this->input->post('account_num');
        $data['hesab_name'] = $this->input->post('account');
        $data['date_ar'] = date('Y-m-d H:i:s');
        if ($_SESSION['role_id_fk'] == 1) {
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }
        $check = $this->check_account_markz($data['rkm_hesab'], $data['markz_id_fk']);
        if ($check == 0){
            $this->db->insert('finance_markz_taklfa_hesabat', $data);
            $this->update_account_dalel($data['rkm_hesab']);
        }

    } elseif ($hesab_no3 == 1) {
        $parent_code = $this->input->post('account_num');
        $accounts = $this->getAllAccounts__parent($parent_code);

//            echo '<pre>';
//            print_r($accounts);
//            die;
        if (!empty($accounts)) {

            foreach ($accounts as $account) {
                $data['markz_id_fk'] = $this->input->post('markez');

                $data['rkm_hesab'] = $account->code;

                $data['hesab_name'] = $account->name;

                $data['date_ar'] = date('Y-m-d H:i:s');

                if ($_SESSION['role_id_fk'] == 1) {

                    $data['publisher'] = $_SESSION['user_id'];

                    $data['publisher_name'] = $_SESSION['user_name'];

                } else if ($_SESSION['role_id_fk'] == 2) {

                    $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");

                } else if ($_SESSION['role_id_fk'] == 3) {

                    $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");

                } else if ($_SESSION['role_id_fk'] == 4) {

                    $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");

                }
                $check = $this->check_account_markz($data['rkm_hesab'], $data['markz_id_fk']);
                if ($check == 0){
                    $this->db->insert('finance_markz_taklfa_hesabat', $data);
                    $this->update_account_dalel($data['rkm_hesab']);

                }
            }
        }

    }

}
  /*  public function add_hesab()
{
    $hesab_no3 = $this->input->post('hesab_no3');
    if ($hesab_no3 == 2) {
        $data['markz_id_fk'] = $this->input->post('markez');
        $data['rkm_hesab'] = $this->input->post('account_num');
        $data['hesab_name'] = $this->input->post('account');
        $data['date_ar'] = date('Y-m-d H:i:s');
        if ($_SESSION['role_id_fk'] == 1) {
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }
        $this->db->insert('finance_markz_taklfa_hesabat', $data);
    } elseif ($hesab_no3 == 1) {
        $parent_code = $this->input->post('account_num');
        $accounts = $this->getAllAccounts__parent($parent_code);

//            echo '<pre>';
//            print_r($accounts);
//            die;
        if (!empty($accounts)) {

            foreach ($accounts as $account) {
                $data['markz_id_fk'] = $this->input->post('markez');

                $data['rkm_hesab'] = $account->code;

                $data['hesab_name'] = $account->name;

                $data['date_ar'] = date('Y-m-d H:i:s');

                if ($_SESSION['role_id_fk'] == 1) {

                    $data['publisher'] = $_SESSION['user_id'];

                    $data['publisher_name'] = $_SESSION['user_name'];

                } else if ($_SESSION['role_id_fk'] == 2) {

                    $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");

                } else if ($_SESSION['role_id_fk'] == 3) {

                    $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");

                } else if ($_SESSION['role_id_fk'] == 4) {

                    $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");

                }

                $this->db->insert('finance_markz_taklfa_hesabat', $data);
            }
        }

    }

}
*/
    
    public function update_account_dalel($code)
{
    $data['markz_tklfa'] = 1;
    $this->db->where('code', $code)->update('dalel', $data);
}

public function check_account_markz($code, $markz_id_fk)
{
    return $this->db->where('rkm_hesab', $code)->where('markz_id_fk', $markz_id_fk)
        ->get('finance_markz_taklfa_hesabat')->num_rows();
}
    
    
    
    
     /* public function add_hesab(){
        $hesab_no3=$this->input->post('hesab_no3');
        if ($hesab_no3 == 2) {
            $data['markz_id_fk'] = $this->input->post('markez');
            $data['rkm_hesab'] = $this->input->post('account_num');
            $data['hesab_name'] = $this->input->post('account');
            $data['date_ar'] = date('Y-m-d H:i:s');
            if ($_SESSION['role_id_fk'] == 1) {
                $data['publisher'] = $_SESSION['user_id'];
                $data['publisher_name'] = $_SESSION['user_name'];
            } else if ($_SESSION['role_id_fk'] == 2) {
                $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
                $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
            } else if ($_SESSION['role_id_fk'] == 3) {
                $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
                $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
            } else if ($_SESSION['role_id_fk'] == 4) {
                $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
                $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
            }
            $this->db->insert('finance_markz_taklfa_hesabat', $data);
        }elseif ($hesab_no3 == 1){
            $parent_code=$this->input->post('account_num');
            $accounts=$this->getAllAccounts(array('parent_code'=>$parent_code,'hesab_no3'=>2));
            if (!empty($accounts)){

                foreach ($accounts as $account){
                    $data['markz_id_fk'] = $this->input->post('markez');
                    $data['rkm_hesab'] = $account->code;
                    $data['hesab_name'] = $account->name;
                    $data['date_ar'] = date('Y-m-d H:i:s');
                    if ($_SESSION['role_id_fk'] == 1) {
                        $data['publisher'] = $_SESSION['user_id'];
                        $data['publisher_name'] = $_SESSION['user_name'];
                    } else if ($_SESSION['role_id_fk'] == 2) {
                        $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
                        $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
                    } else if ($_SESSION['role_id_fk'] == 3) {
                        $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
                        $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
                    } else if ($_SESSION['role_id_fk'] == 4) {
                        $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
                        $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
                    }
                    $this->db->insert('finance_markz_taklfa_hesabat', $data);
                }
            }

        }




    }*/
    /*public function add_hesab()
    {
    
        $data['markz_id_fk']=$this->input->post('markez');
        $data['rkm_hesab']=$this->input->post('account_num');
        $data['hesab_name']=$this->input->post('account');
        $data['date_ar'] = date('Y-m-d H:i:s');
        if($_SESSION['role_id_fk']==1){
    
            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];
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
        $this->db->insert('finance_markz_taklfa_hesabat',$data);
    
    
    }*/
     /*public function add_hesab(){

        $hesab_no3=$this->input->post('hesab_no3');
        if ($hesab_no3 == 2) {
            $data['markz_id_fk'] = $this->input->post('markez');

            $data['rkm_hesab'] = $this->input->post('account_num');

            $data['hesab_name'] = $this->input->post('account');

            $data['date_ar'] = date('Y-m-d H:i:s');

            if ($_SESSION['role_id_fk'] == 1) {

                $data['publisher'] = $_SESSION['user_id'];
                $data['publisher_name'] = $_SESSION['user_name'];

            } else if ($_SESSION['role_id_fk'] == 2) {
                $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
                $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
            } else if ($_SESSION['role_id_fk'] == 3) {
                $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
                $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");

            } else if ($_SESSION['role_id_fk'] == 4) {

                $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");

                $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");

            }

            $this->db->insert('finance_markz_taklfa_hesabat', $data);
        }elseif ($hesab_no3 == 1){
            $parent_code=$this->input->post('account_num');
            $accounts=$this->getAllAccounts(array('parent_code'=>$parent_code,'hesab_no3'=>2));
            if (!empty($accounts)){

                foreach ($accounts as $account){
                    $data['markz_id_fk'] = $this->input->post('markez');

                    $data['rkm_hesab'] = $account->code;

                    $data['hesab_name'] = $account->name;

                    $data['date_ar'] = date('Y-m-d H:i:s');

                    if ($_SESSION['role_id_fk'] == 1) {


                        $data['publisher'] = $_SESSION['user_id'];

                        $data['publisher_name'] = $_SESSION['user_name'];

                    } else if ($_SESSION['role_id_fk'] == 2) {

                        $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");

                        $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");


                    } else if ($_SESSION['role_id_fk'] == 3) {

                        $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");

                        $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");

                    } else if ($_SESSION['role_id_fk'] == 4) {

                        $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");

                        $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");

                    }

                    $this->db->insert('finance_markz_taklfa_hesabat', $data);
                }
            }

        }




    } 
    */
    
    public function select_hesab_by_id($id)
    {
        $query = $this->db->where('id',$id)->get('finance_markz_taklfa_hesabat')->row();
        return $query;
    
    }
    
    public function  update_hesab($id)
    {
            
            $data['markz_id_fk']=$this->input->post('markez');
            $data['rkm_hesab']=$this->input->post('account_num');
            $data['hesab_name']=$this->input->post('account');
            
        
            $this->db->where('id',$id);
            $this->db->update('finance_markz_taklfa_hesabat',$data);
    
    
    }
    public function delete_hesab($id)
    {
            $this->db->where('id',$id)->delete('finance_markz_taklfa_hesabat');
        
    }
    
public function getAllAccounts__parent($parent_code)
{
//        $this->db->like('parent_code', $parent_code, 'after');     // Produces: WHERE `title` LIKE 'match%' ESCAPE '!'

    return $this->db->where('hesab_no3',2)->like('parent_code', $parent_code, 'after')->order_by('parent', 'ASC')->get('dalel')->result();

}


/*26-4-om start*/
public function buildTree($where)
{
    return $this->db->where($where)->order_by('code','ASC')->get('finance_markz_taklfa_tree')->result();
}
public function get_parent($code)
{
    $new_code=substr($code, 0, 2);
    $query2 = $this->db->where('code', $new_code)->get('finance_markz_taklfa_tree')->row_array();
    return $query2;
}
public function get_markz($id)
{
    $query = $this->db->select('finance_markz_taklfa_tree.*, branch.id AS branch ,parent.name as parent_name ')
        ->join('finance_markz_taklfa_tree branch', 'branch.parent=finance_markz_taklfa_tree.id', 'LEFT')
        ->join('finance_markz_taklfa_tree parent', 'parent.id=finance_markz_taklfa_tree.parent', 'LEFT')
        ->where('finance_markz_taklfa_tree.id', $id)
        ->get('finance_markz_taklfa_tree')
        ->row_array();
    return $query;
}
public function lastSubCode($where)
{
    return $this->db->select('COALESCE(MAX(CAST(code AS UNSIGNED)),0) AS maxSubCode')->where($where)->get('finance_markz_taklfa_tree')->row_array()['maxSubCode'];
}
function get_last_main_code(){
    return $this->db->select('MAX(code) as code')->where('parent',0)->get('finance_markz_taklfa_tree')->row()->code + 1;

}
function add_main_markez(){
    $data['name']=$this->input->post('main_markz');
    $data['ttype']=$this->input->post('main_markz');
    $data['parent'] = $data['parent_code'] =0;
    $data['code'] =$this->get_last_main_code();
    $data['level'] =1;
    $data['date_ar'] = date('Y-m-d H:i:s');
    $data['date'] = strtotime(date('Y-m-d H:i:s'));
    $data['publisher'] = $_SESSION['user_id'];
    $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

    $this->db->insert('finance_markz_taklfa_tree',$data);


}
public function insert()
{
    $data['name'] = $this->input->post('name');
    $data['ttype'] = $this->input->post('ttype');
    $data['parent_code'] = $this->input->post('parent_code');
    $data['code'] = $this->input->post('code');
    $data['parent'] = $this->input->post('parent');
    $data['level'] = $this->input->post('level');
    $data['markz_no3'] = $this->input->post('markz_no3');
    $data['date_ar'] = date('Y-m-d H:i:s');
    $data['date'] = strtotime(date('Y-m-d H:i:s'));
    $data['publisher'] = $_SESSION['user_id'];
    $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

    $this->db->insert('finance_markz_taklfa_tree', $data);
}
public function update($id)
{
    $data['name']	 	  = $this->input->post('name');
    $data['ttype']	 	  = $this->input->post('ttype');
    $data['parent_code']  = $this->input->post('parent_code');
    ($this->input->post('code'))?$data['code']=$this->input->post('code'):'';
    ($this->input->post('parent'))?$data['parent']=$this->input->post('parent'):'';
    ($this->input->post('level'))?$data['level']=$this->input->post('level'):'';
    ($this->input->post('markz_no3'))?$data['markz_no3']=$this->input->post('markz_no3'):'';

    $this->db->where('id',$id)->update('finance_markz_taklfa_tree',$data);
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

public function deleteTreeNodes($id)
{
    $accounts = $this->buildTree(array('parent'=>$id));
    if ($accounts != null) {
        foreach ($accounts as $row) {
            $this->deleteTreeNodes($row->id);
            $this->delete_markz($row->id);
        }
    }
    $this->delete_markz($id);
}

public function delete_markz($id)
{
    $this->db->where('id',$id)->delete('finance_markz_taklfa_tree');
}
/*26-4-om end*/
    
}


?>