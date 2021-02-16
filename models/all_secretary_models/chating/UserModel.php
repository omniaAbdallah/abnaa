<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class UserModel extends CI_Model {



  	public function __construct()

        {

                parent::__construct();

                // Your own constructor code

        }

	

	private $User = 'users';

 

	

  	public function GetUserData()

	{  

 		$this->db->select('*');

		$this->db->from($this->User);

	//	$this->db->where("user_id",$this->session->userdata['Admin']['user_id']);

		$this->db->limit(1);

  		$query = $this->db->get();

 		if ($query) {

			 return $query->row_array();

		 } else {

			 return false;

		 }

   	}

	public function IfExistEmail($email){

		 

		 $this->db->select('user_id, email'); 

		 $this->db->from($this->User);

		 $this->db->where('email', $email);

		 $query = $this->db->get();

		 if ($query->num_rows() != 0) {

			  return $query->row_array();

		 } else {

			 return false;

		 }

	}

	

	public function PictureUrl()

	{  

 		$this->db->select('user_id,user_photo');

		$this->db->from($this->User);

	//	$this->db->where("user_id",$this->session->userdata['Admin']['user_id']);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

		if(!empty($res['user_photo'])){

			return base_url('uploads/profiles/'.$res['user_photo']);

		}else{

			return base_url('public/images/user-icon.jpg');

		}

   	}

	public function PictureUrlByuser_id($user_id)

	{  

 		$this->db->select('user_id,user_photo');

		$this->db->from($this->User);

		$this->db->where("user_id",$user_id);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

		if(!empty($res['user_photo'])){

			return base_url('uploads/profiles/'.$res['user_photo']);

		}else{

			return base_url('public/images/user-icon.jpg');

		}

   	}

	

	

/*	public function GetName($user_id)

	{  

 		$this->db->select('user_id,user_name');

		$this->db->from($this->User);

		$this->db->where("user_id",$user_id);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

 		return $res['user_name'];

		 

   	}
	*/
       public function GetName($user_id)
    {
        $this->db->select('user_id,user_name,emp_name');
        $this->db->from($this->User);
        $this->db->where("user_id", $user_id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['emp_name'];
    }
	public function Getuser_idByName($name)

	{  

 		$this->db->select('user_id,name');

		$this->db->from($this->User);

		$this->db->where("name",$name);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

 		return $res['user_id'];

		 

   	}

	

	public function GetUserAddress($user_id)

	{  

 		$this->db->select('user_id,email,mobile_no,address,address_2,city,state,pincode,language');

		$this->db->from($this->User);

		$this->db->where("user_id",$user_id);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

 		return $res;

		 

   	}

	

	

	

	

	public function UpdateProfileImageByID($data)

	{  

 		$res = $this->db->update($this->User, $data ,['id' => $this->session->userdata['Admin']['id'] ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

	

	public function UpdateCustomerProfileImageByID($data)

	{  

 		$res = $this->db->update($this->User, $data ,['id' => $this->session->userdata['User']['id'] ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

	

	 public function GetUserDataById($id) 

	{  

 		$this->db->select('id,name,first_name,last_name,email,about,mobile_no,address,address_2,state,city,country,user_photo,pincode');

		$this->db->from($this->User);

		$this->db->where("id",$id);

		$this->db->limit(1);

  		$query = $this->db->get();

 		if ($query) {

			 return $query->row_array();

		 } else {

			 return false;

		 }

   	}

	

	public function GetMemberNameById($id) 

	{  

 		$this->db->select('user_id,name');

		$this->db->from($this->User);

		$this->db->where("user_id",$id);

		$this->db->limit(1);

  		$query = $this->db->get();

 		$u=$query->row_array();

		return $u['name'];

		  

   	}

	

	public function AddMember($data)

	{  

		$res = $this->db->insert($this->User,$data);

		if($res == 1)

			return $this->db->insert_id();

		else

			return false;	

  	}

	

	

	

	public function StatusUpdateByID($user_id,$status)

	{  

 

 		$res = $this->db->update($this->User,['status' => $status],['id' => $user_id ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

	

	

	public function TrashByID($user_id)

	{  

 

 		$res = $this->db->delete($this->User,['id' => $user_id ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

 

 

 	public function AllRoleTypes() 

	{  

 		$this->db->select('user_id,user_name');

		$this->db->from($this->User);

	//	$this->db->where("role",$role);

   		$query = $this->db->get();

 		$u=$query->num_rows();

		return $u;

		  

   	}

	

	public function VendorsList() 

	{  

 		$this->db->select('id,name,user_photo');

		$this->db->from($this->User);

		$this->db->where("role","Vendor");

		$this->db->where("status","1");

   		$query = $this->db->get();

 		$r=$query->result_array();

		return $r;

   	}
    // public function ClientsListCs()
    // {
    //     $this->db->select('user_id,user_name,user_photo,online');
    //     $this->db->from($this->User);
    //     $this->db->order_by('emp_code', 'asc');
    //     //$this->db->where("role","Client_cs");
    //     $this->db->where("approved", "1");
    //     $this->db->where("user_id !=", "73");
    //     $this->db->where("user_id !=", "19");
    //     $this->db->where("role_id_fk", "3");
    //     $this->db->where("user_id!=", $_SESSION['user_id']);
    //     $query = $this->db->get();
    //     $r = $query->result_array();
    //     return $r;
    // }
/*	public function ClientsListCs() 
	{  
 		$this->db->select('user_id,user_name,user_photo');

		$this->db->from($this->User);
        $this->db->order_by('emp_code','asc');

		//$this->db->where("role","Client_cs");

		$this->db->where("approved","1");
 	    $this->db->where("user_id !=","73");
         $this->db->where("user_id !=","19");
         
   		$query = $this->db->get();

 		$r=$query->result_array();

		return $r;

	   }*/
	   
	  /* public function PictureUrlById($id){  
			$this->db->select('user_id,user_photo');
		   $this->db->from($this->User);
		   $this->db->where("user_id",$id);
		   $this->db->limit(1);
			 $query = $this->db->get();
		   $res = $query->row_array();
		   if(!empty($res['user_photo'])){
			   return base_url('uploads/attachment/'.$res['user_photo']);
		   }else{
			   return base_url('public/images/user-icon.jpg');
		   }
		  }*/


    public function PictureUrlById($id)
    {
        $this->db->select('user_id,user_photo,role_id_fk,emp_code,emp_photo,online');
        $this->db->from($this->User);
        $this->db->where("user_id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        if (!empty($res['role_id_fk']) && ($res['role_id_fk'] == 3)) {
//            $user_photoo = $this->get_employee_photo($res['emp_code']);
//            return base_url('uploads/human_resources/emp_photo/thumbs/' . $user_photoo->personal_photo);
            return base_url('uploads/human_resources/emp_photo/thumbs/' . $res['emp_photo']);
        } else if (!empty($res['role_id_fk']) && ($res['role_id_fk'] == 1)) {
            return base_url('asisst/admin_asset/img/avatar5.png');
        } else {
            return base_url('uploads/attachment/user.png');
        }
    }
	  /* public function PictureUrlById($id)
	   {  
			$this->db->select('user_id,user_photo,role_id_fk,emp_code');
		   $this->db->from($this->User);
		   $this->db->where("user_id",$id);
		  $this->db->limit(1);
			 $query = $this->db->get();
		   $res = $query->row_array();
		    if(!empty($res['role_id_fk'])&&($res['role_id_fk']==3)){
			$user_photoo= $this->get_employee_photo($res['emp_code']);
			//print_r($user_photoo);
			return base_url('uploads/human_resources/emp_photo/thumbs/'.$user_photoo->personal_photo);
		   }
		   else if(!empty($res['role_id_fk'])&&($res['role_id_fk']==1)){
			return base_url('asisst/admin_asset/img/avatar5.png');
		   }
		   else{
			   return base_url('uploads/attachment/user.png');
		   }

		}*/	
	/*	public function NameById($id)
		{  
			 $this->db->select('user_id,user_name,role_id_fk,emp_code');
			$this->db->from($this->User);
			$this->db->where("user_id",$id);
		   $this->db->limit(1);
			  $query = $this->db->get();
			$res = $query->row_array();
			 if(!empty($res['role_id_fk'])&&($res['role_id_fk']==3)){
			 $user_name= $this->get_employee_photo($res['emp_code']);
			 //print_r($user_photoo);
			 return $user_name->employee;
			}
			else {
			 return $res['user_name'];
			}
			
		 }*/
    public function NameById($id)
    {
        $this->db->select('user_id,user_name,role_id_fk,emp_code,emp_photo,emp_name');
        $this->db->from($this->User);
        $this->db->where("user_id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        if (!empty($res['role_id_fk']) && ($res['role_id_fk'] == 3)) {
//            $user_name = $this->get_employee_photo($res['emp_code']);
//            return $user_name->employee;
            return $res['emp_name'];
        } else {
            return $res['user_name'];
        }
    }
		  public function get_employee_photo($f_id)
        {
            $this->db->select('personal_photo,employee');
            $this->db->from('employees');
            $this->db->where("id", $f_id);
            $query = $this->db->get()->row();
            return $query;
        }

public function ClientsListCs()
{
    $this->db->select('user_id,user_name,user_photo,online,chat.sender_id,chat.receiver_id,chat.id,chat.seen ');
    $this->db->from($this->User);
    $this->db->join('chat', '(chat.receiver_id = users.user_id OR chat.sender_id = users.user_id) and user_id != '.$_SESSION['user_id'], 'left');
    $this->db->join('employees', '(employees.id = users.emp_code and employees.employee_type = 1)', 'left');
    $this->db->where("approved", "1");
    $this->db->where("user_id !=", "73");
    $this->db->where("user_id !=", "19");
    $this->db->where("role_id_fk", "3");
    $this->db->where('receiver_id', $_SESSION['user_id']);
    $this->db->or_where('sender_id', $_SESSION['user_id']);
    $this->db->order_by('seen', 'ASC');
    $this->db->group_by("user_id");
    $query = $this->db->get();
    /*  print_r($this->db->last_query());
      echo '<br>';*/
    $data = array();
    if ($query->num_rows() > 0) {
        return $query->result();
    }
}
	
	/*	public function ClientsListCs()
		{
			$this->db->select('user_id,user_name,user_photo,online');
			$this->db->from($this->User);
		
			//$this->db->order_by('emp_code', 'asc');
			
			//$this->db->where("role","Client_cs");
			$this->db->where("approved", "1");
			$this->db->where("user_id !=", "73");
			$this->db->where("user_id !=", "19");
			$this->db->where("role_id_fk", "3");
			$this->db->where("user_id!=", $_SESSION['user_id']);
			
			$query = $this->db->get();
			$data=array();
			$x=0;
			if ($query->num_rows() > 0) {
			   foreach ($query->result() as $row) {
				   $data[$x] = $row;
				   $data[$x]->chat = $this->get_chat($row->user_id);
				   $data[$x]->chat_s = $this->get_new_chat($row->user_id);
	//                $data[$x]->type_salary = $this->get_from_employee_setting($row->salary_type);
				   $x++;
			   }
			   return $data;
		   }
		
		}*/
        
   public function ClientsListCs_notifi()
{
    $this->db->select('*');
    $this->db->from($this->User);
    $this->db->where("approved", "1");
    $this->db->where("user_id !=", "73");
    $this->db->where("user_id !=", "19");
    $this->db->where("role_id_fk", "3");
    $this->db->where("user_id!=", $_SESSION['user_id']);
    $query = $this->db->get();
    $data = array();
    $x = 0;
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $chat_data = $this->get_new_chat($row->user_id);
            if (!empty($chat_data)) {
                $data[$x] = $row;
                $data[$x]->chat = $chat_data;
            }
            //                $data[$x]->type_salary = $this->get_from_employee_setting($row->salary_type);
            $x++;
        }
        return $data;
    }
}     
	/*	public function ClientsListCs_notifi()
		{
			   $this->db->select('*');
				$this->db->from($this->User);
				$this->db->where("approved", "1");
				$this->db->where("user_id !=", "73");
				$this->db->where("user_id !=", "19");
				$this->db->where("role_id_fk", "3");
				$this->db->where("user_id!=", $_SESSION['user_id']);
				$query = $this->db->get();
				$data=array();
				$x=0;
				if ($query->num_rows() > 0) {
				   foreach ($query->result() as $row) {
					   $data[$x] = $row;
					   $data[$x]->chat = $this->get_new_chat($row->user_id);
	   //                $data[$x]->type_salary = $this->get_from_employee_setting($row->salary_type);
					   $x++;
				   }
				   return $data;
			   }
			
	
		}*/
		public function total_rows($q = NULL)
	{
		$this->db->like('id', $q);
		
			$this->db->where('receiver_id', $_SESSION['user_id']);
		
		$this->db->where('seen', 0);
		$this->db->from('chat');
		return $this->db->count_all_results();
	}
		public function get_new_chat($id)
	{
		$this->db->select('*');
		$this->db->where('sender_id',$id);
		$this->db->where('receiver_id',$_SESSION['user_id']);
		$this->db->where('seen', 0);
		$this->db->from('chat');
		$query= $this->db->get()->row();
		return $query;

	}
	public function get_chat($id)
{
    $this->db->select('*');
    $this->db->group_start();
    $this->db->where('receiver_id', $id);
    $this->db->where('sender_id', $_SESSION['user_id']);
    $this->db->group_end();
    $this->db->or_group_start();
    $this->db->where('sender_id', $id);
    $this->db->where('receiver_id', $_SESSION['user_id']);
    $this->db->group_end();

    $this->db->from('chat');
    $query = $this->db->get()->row();
    /* print_r($this->db->last_query());
     echo '<br>';*/
    return $query;
}
/*	public function get_chat($id)
	{
		$this->db->select('*');
		if($id!=$_SESSION['user_id'])
		{
			$this->db->where('receiver_id',$id);
		
		$this->db->where('sender_id',$_SESSION['user_id']);
		}else
		{
			$this->db->where('sender_id',$id);
		$this->db->where('receiver_id',$_SESSION['user_id']);
		}
		$this->db->from('chat');
		$query= $this->db->get()->row();
		return $query;

	}*/
	//ClientsListCs_all ClientsListCs
	public function ClientsListCs_all()
	{
		   $this->db->select('*');
			$this->db->from($this->User);
			$this->db->where("approved", "1");
			$this->db->where("user_id !=", "73");
			$this->db->where("user_id !=", "19");
			$this->db->where("role_id_fk", "3");
			$this->db->where("user_id!=", $_SESSION['user_id']);
		   $query = $this->db->get();
			$r = $query->result_array();
			return $r;	

	}
	public function ClientsListCs_online()
	{
		   $this->db->select('*');
			$this->db->from($this->User);
			$this->db->where("approved", "1");
			$this->db->where("online", "1");
			$this->db->where("user_id !=", "73");
			$this->db->where("user_id !=", "19");
			$this->db->where("role_id_fk", "3");
			$this->db->where("user_id!=", $_SESSION['user_id']);
		   $query = $this->db->get();
			$r = $query->result_array();
			return $r;	

	}
 }

