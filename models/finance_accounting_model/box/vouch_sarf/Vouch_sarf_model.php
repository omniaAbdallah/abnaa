<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouch_sarf_model extends CI_Model {

/*	public function getAllAccounts($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}*/
    
 /*       public function getAllAccounts($where)
{
    $q = $this->db->where($where)->order_by('parent', 'ASC')->get('dalel')->result();
    if (!empty($q)) {
        foreach ($q as $key => $item) {
            if ($item->hesab_no3 == 2) {
                $q[$key]->acount_parent = $this->get_parent($item->code);
            }
        }

    }

    return $q;
}*/

public function getAllAccounts($where)
{

    $q = $this->db->select('`dalel`.*,
           ,(SELECT COALESCE(SUM(case when `dalel`.`hesab_tabe3a` = 1 then `finance_quods_details`.`maden`-`finance_quods_details`.`dayen` 
    when `dalel`.`hesab_tabe3a` = 2 then `finance_quods_details`.`dayen`-`finance_quods_details`.`markz_id`  else 0 end),0) 
    from `finance_quods_details` WHERE `finance_quods_details`.`rkm_hesab`=`dalel`.`code` and finance_quods_details.date >=' . strtotime('first day of january this year') .
        ' and finance_quods_details.date <=' . strtotime(date('Y-m-d')) . ' ) as rased ')->from('dalel')
        ->where($where)->order_by('dalel.parent', 'ASC')->get()->result();
    /*        $q = $this->db->where($where)->order_by('parent', 'ASC')->get('dalel')->result();*/
    if (!empty($q)) {
        foreach ($q as $key => $item) {
            if ($item->hesab_no3 == 2) {
                $q[$key]->acount_parent = $this->get_parent($item->code);
            }
        }
    }
    return $q;
}
public function get_parent($code)
{
    $new_code=substr($code,0,2);
    $q2 = $this->db->select('id,parent,code,parent_code,name,level')->where('code', $new_code)->get('dalel')->row();

    return $q2;
}
    

	public function getAccount($where)
	{
		return $this->db->where($where)->get('dalel')->row_array();
	}

	public function getLastId($where)
	{
		return $this->db->select('COALESCE(MAX(CAST(rqm_sanad AS UNSIGNED)),551) AS rqm_sanad')->where($where)->get('finance_sanad_sarf')->row_array()['rqm_sanad'];
	}

	public function getBox($where)
	{
		$sql = $this->db->where($where)->get('finance_box_setting');
		if ($sql->num_rows() > 0) {
			foreach ($sql->result() as $row) {
                $data[$row->tawred_method_name] = $row;
            }
            return $data;
		}
		return false;
	}

/*	public function getAllVouchSarf()
	{
	    $this->db->order_by("id", "desc");
      $sql = $this->db->get('finance_sanad_sarf');
	//	$sql = $this->db->get('finance_sanad_sarf');
		if ($sql->num_rows() > 0) {
			$i = 0;
			foreach ($sql->result() as $row){
				$data[$i] = $row;
				$data[$i]->delails = $this->getdetailsById($row->id);
                $i++;}
			return $data;
		}
			return false;
	}
*/
public function getAllVouchSarf()
{
   $this->db->order_by("id", "desc");
      $sql = $this->db->get('finance_sanad_sarf');
//	$sql = $this->db->get('finance_sanad_sarf');
if ($sql->num_rows() > 0) {
$i = 0;
foreach ($sql->result() as $row){
$data[$i] = $row;
$data[$i]->delails = $this->getdetailsById($row->id);
$data[$i]->sheek_data = $this->getfinance_sanad_sarf_sheek_data($row->rqm_sanad)[0];
$data[$i]->sheek_taslem_sarf = $this->get_sheek_status($row->rqm_sanad,$row->sheek_num_bank,'sheek_status');
                $i++;}
return $data;
}
return false;
}

  
        public function get_sheek_status($id,$sheek_num,$data_need)
    {
        $this->db->where('rqm_sanad_id_fk', $id);
        $this->db->where('sheek_num', $sheek_num);
        $query = $this->db->get('finance_sanad_sarf_sheek');
        if ($query->num_rows() > 0) {
            return $query->row()->$data_need;
        } else {
            return 0;
        }
    }


	public function getdetailsById($id)
	{
		return $this->db->where("rqm_sanad_fk",$id)->get('finance_sanad_sarf_details')->result();
	}

/*	public function findById($id)
	{
		$sql = $this->db->where("id",$id)->get('finance_sanad_sarf');
		if ($sql->num_rows() > 0) {
			$data = $sql->row();
			$data->delails = $this->getdetailsById($data->id);
			return $data;
		}
		return false;
	}*/
    
    /*public function findById($id)
	{
		$sql = $this->db->select('finance_sanad_sarf.*, banks_settings.title AS bank_name')
                        ->join('banks_settings','finance_sanad_sarf.sheek_bank_id=banks_settings.id','LEFT')
                        ->where("finance_sanad_sarf.id",$id)
                        ->get('finance_sanad_sarf');
		if ($sql->num_rows() > 0) {
			$data = $sql->row();
			$data->delails = $this->getdetailsById($data->id);
            $data->sheek_data = $this->getfinance_sanad_sarf_sheek_data($data->rqm_sanad);
			return $data;
		}
		return false;
	}*/
    
    
    
 public function findById($id)
    {
        $sql = $this->db->select('finance_sanad_sarf.*, banks_settings.title AS bank_name')
            ->join('banks_settings','finance_sanad_sarf.sheek_bank_id=banks_settings.id','LEFT')
            ->where("finance_sanad_sarf.id",$id)
            ->get('finance_sanad_sarf');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            $data->delails = $this->getdetailsById($data->id);
            $data->sheek_data = $this->getfinance_sanad_sarf_sheek_data($data->rqm_sanad);
            if($data->pay_method ==4){
                $data->wasf_hesab = $this->GetAccountName($data->bank_account_id_fk);

            }
            return $data;
        }
        return false;
    }
    public function getBankname($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('banks_settings');
        if($query->num_rows()>0)
        {
            return $query->row()->title;
        }
    }
    /*
    public function getfinance_sanad_sarf_sheek_data($rqm_sanad)
    {
        return $this->db->where("rqm_sanad_id_fk",$rqm_sanad)->order_by('id','desc')->get('finance_sanad_sarf_sheek')->result();
    }*/
    
       public function getfinance_sanad_sarf_sheek_data($rqm_sanad)
    {
       $sql=  $this->db->where("rqm_sanad_id_fk", $rqm_sanad)->order_by('id', 'asc')->get('finance_sanad_sarf_sheek')->result();
         if(!empty($sql)){
             foreach ($sql as $key=>$value){
                 if(empty($this->get_valueof_sheek($value->rkm_esal))){
                     $value =0;
                 }else{
                     $value=$this->get_valueof_sheek($value->rkm_esal);
                 }
                 $sql[$key]->value=$value;
             }
             return $sql;
         }
    }



	 public function insert_update($id = false, $rkm = false, $rkm_sanad = false)
    {

        if ($this->input->post('pay_method_sarf') == 2) {
            $sheek_num = $this->input->post('sheek_num');
            $sheek_id = $this->input->post('sheek_id');
            $rkm_esal = $this->input->post('rkm_esal');
            $sheek_date = $this->input->post('sheek_date');
            $bank_id_fk = $this->input->post('bank_id_fk');

            if (!empty($sheek_num)) {
                for ($s = 0; $s < sizeof($sheek_num); $s++) {
                     $query = $this->db->query("SELECT MAX(rqm_sanad) AS rqm_sanad_fk FROM finance_sanad_sarf");
         if($query->num_rows() >0 ){
             $row = $query->row();
             $car_no = ((int)$row->rqm_sanad_fk)+1;
         }else{
             $car_no = "0";
         }
                    
                    $data_sheek['rqm_sanad_id_fk'] = $car_no;
                    $data_sheek['sheek_num'] = $sheek_num[$s];
                    $data_sheek['sheek_date'] = strtotime($sheek_date[$s]);
                    $data_sheek['sheek_date_ar'] = $sheek_date[$s];
                    $data_sheek['bank_id_fk'] = $bank_id_fk[$s];
                    $data_sheek['bank_name'] = $this->getBankname($bank_id_fk[$s]);
//                    23-3-om
                    $data_sheek['rkm_esal'] = $rkm_esal[$s];
                    $data_sheek['from_id'] = $sheek_id[$s];
                    $this->update_sheek_statuse($rkm_esal[$s], $sheek_id[$s]);
                    $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);

                }
            }

        }elseif ($this->input->post('pay_method_sarf') == 3) {
            
        $query = $this->db->query("SELECT MAX(rqm_sanad) AS rqm_sanad_fk FROM finance_sanad_sarf");
         if($query->num_rows() >0 ){
             $row = $query->row();
             $car_no = ((int)$row->rqm_sanad_fk)+1;
         }else{
             $car_no = "0";
         }
            
            $data_sheek['rqm_sanad_id_fk'] = $car_no;
            $data_sheek['sheek_num'] = $this->input->post('sheek_num_bank');
            $data_sheek['sheek_date'] = strtotime( $this->input->post('date_sanad'));
            $data_sheek['sheek_date_ar'] = $this->input->post('date_sanad');
            $data_sheek['bank_id_fk'] = $this->input->post('sheek_bank_id');
            $data_sheek['bank_name'] = $this->getBankname($this->input->post('sheek_bank_id'));  
            
             $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);


        }

        $data['date_sanad_ar'] = $this->input->post('date_sanad');
        $data['date_sanad'] = strtotime($this->input->post('date_sanad'));
        $data['pay_method'] = $this->input->post('pay_method_sarf');
        $data['person_name'] = $this->input->post('person_name');
        $data['about'] = $this->input->post('about');
        $data['note'] = $this->input->post('note');
        $data['total_value'] = $this->input->post('total_value');

        $data['type'] = $this->input->post('type');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['person_id_fk'] = $this->input->post('person_id_fk');
        $data['person_mob'] = $this->input->post('person_mob');
        $data['box_rqm_hesab'] = $this->input->post('box_rqm_hesab');
        $data['box_name'] = $this->input->post('box_name');
        $data['sheek_bank_id'] = $this->input->post('sheek_bank_id');
      //  $data['sheek_bank_name'] = $this->input->post('sheek_bank_name');
        $data['sheek_rqm_hesab'] = $this->input->post('sheek_rqm_hesab');
        $data['sheek_num_bank'] = $this->input->post('sheek_num_bank');
           if ($this->input->post('pay_method_sarf') == 4){


            $data['bank_account_id_fk'] = $this->input->post('bank_account_id_fk');
            $data['bank_account_num'] = $this->input->post('bank_account_num');
            $data['sheek_bank_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));

               $data['type_paid'] = $this->input->post('type_paid');
        }else{
            $data['sheek_bank_name'] = $this->input->post('sheek_bank_name');
        }
        
        
        $var = time() + 5;
        if ($var == true) {
            $last_sanad_num = $this->getLastId(array('id!=' => 0)) + 1;
        }
        $var = time() + 5;
        if ($var == true) {
            $last_quod_num = $this->selectLastQuodId();
        }
        if ($id == false) {
              $last_quod_num = $this->select_last_quod_num();
          //  echo 'id is false';
           // echo $id;
           // echo '<br/>';
           // echo $last_quod_num;
            
        //   die;
            
            /*echo "<pre>";
            print_r($data);
            echo "</pre>";
            die;*/
            $data['rqm_sanad'] = $last_sanad_num;
            $data['rqm_quod'] = $last_quod_num;
            $data['date'] = strtotime(date('Y-m-d'));
            $data['date_s'] = time();
            $data['publisher'] = $_SESSION['user_id'];
            $this->db->insert('finance_sanad_sarf', $data);
            $last_id = $this->db->insert_id();
            $this->insert_Quods($last_sanad_num, $last_quod_num);


            return $last_id;

        } else {


            if ($this->input->post('pay_method_sarf') == 2 ) {
//                25-3-om
                $this->db->where('rqm_sanad_id_fk', $_POST['rqm_sanad']);
                $this->db->delete('finance_sanad_sarf_sheek');


                if (!empty($sheek_num)) {
//25-3-om delete from here
                    for ($s = 0; $s < sizeof($sheek_num); $s++) {
                          $query = $this->db->query("SELECT MAX(rqm_sanad) AS rqm_sanad_fk FROM finance_sanad_sarf");
         if($query->num_rows() >0 ){
             $row = $query->row();
             $car_no = ((int)$row->rqm_sanad_fk)+1;
         }else{
             $car_no = "0";
         }
                        $data_sheek['rqm_sanad_id_fk'] = $car_no;
                        $data_sheek['sheek_num'] = $sheek_num[$s];
                        $data_sheek['sheek_date'] = strtotime($sheek_date[$s]);
                        $data_sheek['sheek_date_ar'] = $sheek_date[$s];
                        $data_sheek['bank_id_fk'] = $bank_id_fk[$s];
                        $data_sheek['bank_name'] = $this->getBankname($bank_id_fk[$s]);
//                        23-3-om
                        $data_sheek['rkm_esal'] = $rkm_esal[$s];
                        $data_sheek['from_id'] = $sheek_id[$s];
                        $this->update_sheek_statuse($rkm_esal[$s], $sheek_id[$s]);

                        $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);


                    }


                }


            }elseif ($this->input->post('pay_method_sarf') == 3) {
               $query = $this->db->query("SELECT MAX(rqm_sanad) AS rqm_sanad_fk FROM finance_sanad_sarf");
         if($query->num_rows() >0 ){
             $row = $query->row();
             $car_no = ((int)$row->rqm_sanad_fk)+1;
         }else{
             $car_no = "0";
         }
        // echo $car_no;
            $data_sheek['rqm_sanad_id_fk'] =$car_no;
            $data_sheek['sheek_num'] = $this->input->post('sheek_num_bank');
            $data_sheek['sheek_date'] = strtotime( $this->input->post('date_sanad'));
            $data_sheek['sheek_date_ar'] = $this->input->post('date_sanad');
            $data_sheek['bank_id_fk'] = $this->input->post('sheek_bank_id');
            $data_sheek['bank_name'] = $this->getBankname($this->input->post('sheek_bank_id'));  
            
             $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);


        }

            $this->db->where('id', $id);
            $this->db->update('finance_sanad_sarf', $data);


            $this->insert_Quods($rkm_sanad, $rkm);
            return $id;
        }

    }




public function update_transform_accounts($process_rkm,$rqm_sanad_id)
{
    $data['deport']=1;
    $data['rqm_sanad_id']=$rqm_sanad_id;
    $data['deport_time'] = date('h:i A');
    $data['deport_date'] = date('Y-m-d');
    $data['deport_publisher_name'] = $this->getUserName($_SESSION['user_id']);
    $this->db->where('process_rkm',$process_rkm);
    $this->db->update('finance_account_transformations',$data);
}


    public function update_sheek_statuse($rkm_esal, $id)
    {
        $data['sheek_status'] = 1;
       // $data['sheek_status_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¹ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ¦ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¹ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ­ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ';
    $data['sheek_status_name'] = 'تم التحصيل';
        $data['twaged_sheek'] = 1;
      //  $data['twaged_sheek_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¨ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢';
         $data['twaged_sheek_name'] = 'في البنك';
        $this->db->where('rkm_esal', $rkm_esal)->where('id', $id)->update('finance_sanad_qabd_sheek', $data);

    }


    public function get_sheeks($sheks)
    {
        $this->db->where('from_esalat', 1);
        $this->db->where('sheek_status', 0);
        $this->db->where_not_in('sheek_num', $sheks);
        $query = $this->db->get('finance_sanad_qabd_sheek')->result();
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                $query[$key]->value = $this->get_valueof_sheek($value->rkm_esal);
            }
            return $query;
        }

    }

    public function get_valueof_sheek($rqm_esal)
    {
        $this->db->where('pill_num', $rqm_esal);
        $query = $this->db->get('fr_all_pills')->row();
        if (!empty($query)) {
            return $query->value;
        }

    }

/*	public function insert_update($id=false,$rkm=false,$rkm_sanad=false)
	{

        if($this->input->post('pay_method_sarf') ==2){

            $sheek_num =$this->input->post('sheek_num');
            $sheek_date =$this->input->post('sheek_date');
            $bank_id_fk =$this->input->post('bank_id_fk');
            if(!empty($sheek_num)){
                for ($s=0;$s<sizeof($sheek_num);$s++){
                    $data_sheek['rqm_sanad_id_fk'] 		 = $_POST['rqm_sanad'];
                    $data_sheek['sheek_num'] 	 = $sheek_num[$s];
                    $data_sheek['sheek_date'] 	 = strtotime($sheek_date[$s]);
                    $data_sheek['sheek_date_ar'] 	 = $sheek_date[$s];
                    $data_sheek['bank_id_fk'] 	 = $bank_id_fk[$s];
                    $data_sheek['bank_name'] 	 = $this->getBankname($bank_id_fk[$s]);

                   $this->db->insert('finance_sanad_sarf_sheek',$data_sheek);
                }

            }


        }

		$data['date_sanad_ar']    	 = $this->input->post('date_sanad');
		$data['date_sanad'] 		 = strtotime($this->input->post('date_sanad'));
		$data['pay_method']    		 = $this->input->post('pay_method_sarf');
		$data['person_name']  		 = $this->input->post('person_name');
		$data['about'] 		   		 = $this->input->post('about');
		$data['note'] 		   		 = $this->input->post('note');
		$data['total_value']   		 = $this->input->post('total_value');
		$data['type'] 				 = $this->input->post('type');
		$data['mother_national_num'] = $this->input->post('mother_national_num');
		$data['person_id_fk'] 		 = $this->input->post('person_id_fk');
		$data['person_mob'] 		 = $this->input->post('person_mob');
		$data['box_rqm_hesab'] 		 = $this->input->post('box_rqm_hesab');
		$data['box_name'] 			 = $this->input->post('box_name');
		$data['sheek_bank_id'] 		 = $this->input->post('sheek_bank_id');
		$data['sheek_bank_name'] 	 = $this->input->post('sheek_bank_name');
		$data['sheek_rqm_hesab'] 	 = $this->input->post('sheek_rqm_hesab');
		$data['sheek_num_bank'] 	 = $this->input->post('sheek_num_bank');
        $var =time() + 5;
        if($var == true){
            $last_sanad_num   = $this->getLastId(array('id!='=>0))+1;
        }
        $var =time() + 5;
        if($var == true){
            $last_quod_num   = $this->selectLastQuodId();
        }
		if($id == false) {
            $data['rqm_sanad'] 	   	 = $last_sanad_num;
            $data['rqm_quod'] 	   	 = $last_quod_num;
			$data['date'] 		  	 = strtotime(date('Y-m-d'));
			$data['date_s'] 	  	 = time();
			$data['publisher'] 	  	 = $_SESSION['user_id'];
			$this->db->insert('finance_sanad_sarf',$data);
            $last_id = $this->db->insert_id();
            $this->insert_Quods($last_sanad_num,$last_quod_num);
            return $last_id;

        }
		else {


            if ($this->input->post('pay_method_sarf') == 2) {


                    if(!empty($sheek_num)){
                        $this->db->where('rqm_sanad_id_fk', $_POST['rqm_sanad']);
                        $this->db->delete('finance_sanad_sarf_sheek');


                        for ($s=0;$s<sizeof($sheek_num);$s++){



                            $data_sheek['rqm_sanad_id_fk'] 		 = $_POST['rqm_sanad'];
                            $data_sheek['sheek_num'] 	 = $sheek_num[$s];
                            $data_sheek['sheek_date'] 	 = strtotime($sheek_date[$s]);
                            $data_sheek['sheek_date_ar'] 	 = $sheek_date[$s];
                            $data_sheek['bank_id_fk'] 	 = $bank_id_fk[$s];
                            $data_sheek['bank_name'] 	 = $this->getBankname($bank_id_fk[$s]);

                            $this->db->insert('finance_sanad_sarf_sheek',$data_sheek);



                        }





                    }


                }

                $this->db->where('id', $id);
                $this->db->update('finance_sanad_sarf', $data);


                $this->insert_Quods($rkm_sanad, $rkm);
                return $id;
            }

	} */
/*
	public function insert_update($id=false,$rkm=false,$rkm_sanad=false)
	{
        
		$data['date_sanad_ar']    	 = $this->input->post('date_sanad');
		$data['date_sanad'] 		 = strtotime($this->input->post('date_sanad'));
		$data['pay_method']    		 = $this->input->post('pay_method_sarf');
		$data['person_name']  		 = $this->input->post('person_name');
		$data['about'] 		   		 = $this->input->post('about');
		$data['note'] 		   		 = $this->input->post('note');
		$data['total_value']   		 = $this->input->post('total_value');
		$data['type'] 				 = $this->input->post('type');
		$data['mother_national_num'] = $this->input->post('mother_national_num');
		$data['person_id_fk'] 		 = $this->input->post('person_id_fk');
		$data['person_mob'] 		 = $this->input->post('person_mob');
		$data['box_rqm_hesab'] 		 = $this->input->post('box_rqm_hesab');
		$data['box_name'] 			 = $this->input->post('box_name');
		$data['sheek_bank_id'] 		 = $this->input->post('sheek_bank_id');
		$data['sheek_bank_name'] 	 = $this->input->post('sheek_bank_name');
		$data['sheek_rqm_hesab'] 	 = $this->input->post('sheek_rqm_hesab');
		$data['sheek_num_bank'] 	 = $this->input->post('sheek_num_bank');
        $var =time() + 5;
        if($var == true){
            $last_sanad_num   = $this->getLastId(array('id!='=>0))+1;
        }
        $var =time() + 5;
        if($var == true){
            $last_quod_num   = $this->selectLastQuodId();
        }
		if($id == false) {
            $data['rqm_sanad'] 	   	 = $last_sanad_num;
            $data['rqm_quod'] 	   	 = $last_quod_num;
			$data['date'] 		  	 = strtotime(date('Y-m-d'));
			$data['date_s'] 	  	 = time();
			$data['publisher'] 	  	 = $_SESSION['user_id'];
			$this->db->insert('finance_sanad_sarf',$data);
            $last_id = $this->db->insert_id();
            $this->insert_Quods($last_sanad_num,$last_quod_num);
            
            
            
            
            if($this->input->post('pay_method_sarf') ==3){



                $sheek_num =$this->input->post('sheek_num_bank');
                $sheek_date =$this->input->post('date_sanad');
                $bank_id_fk =$this->input->post('sheek_bank_id');


                $data_sheek['rqm_sanad_id_fk'] 		 = $_POST['rqm_sanad'];
                $data_sheek['sheek_num'] 	 = $sheek_num;
                $data_sheek['sheek_date'] 	 = strtotime($sheek_date);
                $data_sheek['sheek_date_ar'] 	 = $sheek_date;
                $data_sheek['bank_id_fk'] 	 = $bank_id_fk;
                $data_sheek['bank_name'] 	 = $this->getBankname($bank_id_fk);
                $this->db->insert('finance_sanad_sarf_sheek',$data_sheek);


            }
            
            
            if ($this->input->post('pay_method_sarf') ==2){

                      $banks_arr =$this->selectAllBanks();

                if(!empty($this->input->post('sheek_num'))){

                    $rqm_hesab =$this->input->post('rqm_hesab');


                for ($a=0;$a<sizeof($this->input->post('sheek_num'));$a++){


                    $finance_sanad_qabd_sheek_update['twaged_sheek']=1;
                    $finance_sanad_qabd_sheek_update['twaged_sheek_name']='ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¨ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢';


                    if( in_array($rqm_hesab[$a],$banks_arr)){

                        $finance_sanad_qabd_sheek_update['sheek_status']=1;
                        $finance_sanad_qabd_sheek_update['sheek_status_name']='ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¹ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ¦ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¹ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ­ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ';

                        $finance_sanad_qabd_sheek_update['sheek_type']=1;
                        $finance_sanad_qabd_sheek_update['sheek_type_name']='ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ°';

                    }else{
                        $finance_sanad_qabd_sheek_update['sheek_status']=0;
                        $finance_sanad_qabd_sheek_update['sheek_status_name']=' ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ¦ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¹ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ¦ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¹ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ­ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ';

                        $finance_sanad_qabd_sheek_update['sheek_type']=2;
                        $finance_sanad_qabd_sheek_update['sheek_type_name']='ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ¦ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ©';

                    }


                    $this->db->where('sheek_num', $this->input->post('sheek_num')[$a]);
                    $this->db->update('finance_sanad_qabd_sheek',$finance_sanad_qabd_sheek_update);


                }



                }

            }
            
            
            
            
            
            
            
            
            
            

            return $last_id;

        }
		else {
		  
          
          if($this->input->post('pay_method_sarf') ==3){



                $sheek_num =$this->input->post('sheek_num_bank');
                $sheek_date =$this->input->post('date_sanad');
                $bank_id_fk =$this->input->post('sheek_bank_id');


                $data_sheek['rqm_sanad_id_fk'] 		 = $_POST['rqm_sanad'];
                $data_sheek['sheek_num'] 	 = $sheek_num;
                $data_sheek['sheek_date'] 	 = strtotime($sheek_date);
                $data_sheek['sheek_date_ar'] 	 = $sheek_date;
                $data_sheek['bank_id_fk'] 	 = $bank_id_fk;
                $data_sheek['bank_name'] 	 = $this->getBankname($bank_id_fk);
               // $this->db->insert('finance_sanad_sarf_sheek',$data_sheek);
                $this->db->where('rqm_sanad_id_fk', $id);
                $this->db->update('finance_sanad_sarf_sheek',$data_sheek);


            }
            
			$this->db->where('id', $id);
			$this->db->update('finance_sanad_sarf',$data);
            

            $this->insert_Quods($rkm_sanad,$rkm);
			return $id;
		}
	}
*/
	public function insert_update_datails($id)
	{
		if($this->input->post('rqm_hesab')){
			$count = count($this->input->post('rqm_hesab'));
			for ($i=0 ;$i < $count; $i++){
				$data['rqm_sanad_fk'] = $id;
				$data['value'] = $this->input->post('value')[$i];
				$data['rqm_hesab'] = $this->input->post('rqm_hesab')[$i];
				$data['name_hesab'] = $this->input->post('name_hesab')[$i];
				$data['byan'] = $this->input->post('byan')[$i];
				$this->db->insert('finance_sanad_sarf_details',$data);
			}
		}
	}

	public function delete($id)
	{
		$this->db->where("id",$id)->delete('finance_sanad_sarf');
		$this->delete_datails($id);
	}

	public function delete_datails($id)
	{
		$this->db->where("rqm_sanad_fk",$id)->delete('finance_sanad_sarf_details');
	}
    
    
	public function insert_update_files($files,$id)
	{
		if(!empty($files)){
			$count = count($files);
			for ($i=0 ;$i < $count; $i++){
			    if(!empty($files[$i])) {
                    $data['rqm_sanad_fk'] = $id;
                    $data['file_attached'] = $files[$i];
                    $data['title'] = $this->input->post('title')[$i];
                    $this->db->insert('finance_sanad_sarf_attaches', $data);
                }
			}
		}
	}
    
/*
	public function insert_update_files($files,$id)
	{
		if(!empty($files)){
			$count = count($files);
			for ($i=0 ;$i < $count; $i++){
				$data['rqm_sanad_fk'] = $id;
				$data['file_attached'] = $files[$i];
				$data['title'] = $this->input->post('title')[$i];
				$this->db->insert('finance_sanad_sarf_attaches',$data);
			}
		}
	}
*/
	public function deleteFiles($id,$filed,$table)
	{
		$this->db->where($filed,$id)->delete($table);
	}


    public function getBankData($bank_id,$code)
    {
        return $this->db->where(array('bank_id_fk'=>$bank_id,'rqm_hesab'=>$code))
            ->get('society_main_banks_account')->row_array()['name_hesab'];

    }
    public function getBanCheekNum($bank_id)
    {
        $num = $this->db->where(array('sheek_bank_id'=>$bank_id))
            ->order_by('sheek_num_bank',"desc")->limit(1)->get('finance_sanad_sarf')->row_array();
        if(!empty($num)){
            return $num['sheek_num_bank']+1;
        }
        return 0;
    }



    //osama
    public function select_last_quod_num()
    {
        $this->db->select('*');
        $this->db->from('finance_quods');
        $this->db->order_by('rkm', "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result()[0]->rkm + 1;
            return $data;
        } else {

            return false;
        }

    }
    public function selectLastQuodId(){
        $this->db->select('*');
        $this->db->from("finance_quods");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->rkm + 1;
        }else{
            return 1;
        }
    }
    public function deleteQuods($id)
    {
        $this->db->where("sanad_qbd_rkm_id",$id);
        $this->db->delete('finance_quods');
        $this->db->where("sanad_qbd_rkm_id",$id);
        $this->db->delete('finance_quods_details');
    }

 public function insert_Quods($sanad_id,$last_quod_num){
       $this->db->where("rkm",$last_quod_num);
        $this->db->delete('finance_quods');
        $data['no3_qued'] = 6;
          $data['no3_qued_name'] = 'قيد سند صرف';
        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = 'قيد المراجعة';
        // $data['sanad_qbd_rkm_id'] = $sanad_id;
        $data['qued_date'] = strtotime($this->input->post('date_sanad'));
        $data['qued_date_ar'] = $this->input->post('date_sanad');
        $data['total_value'] = $this->input->post('total_value');
        $data['rkm'] = $last_quod_num;
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['date'] = date('Y-m-d');
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $this->db->insert('finance_quods', $data);
        if($this->input->post('pay_method_sarf') ==4){
            //details
            $maden_byan= $_POST['about'];
            if($this->input->post('pay_method_sarf') ==4){
                $dayen_byan=$_POST['sheek_num_bank'] .' '. $_POST['person_name'];
            }else{
                $dayen_byan= 'شيك رقم' . $_POST['sheek_num_bank'] .' '. $_POST['person_name'] .' / ';
            }
            /****************************/
            if ($this->input->post('rqm_hesab')) {
                $this->db->where("qued_rkm_fk",$last_quod_num);
                $this->db->delete('finance_quods_details');
                $count = count($this->input->post('rqm_hesab'));
                $maden_value = $this->input->post('value');
                $byan = $this->input->post('byan');
                    if($this->input->post('pay_method_sarf') ==4 and $this->input->post('type_paid') !=4 ){
                if($this->input->post('pay_method_sarf') ==4){
                    for ($a = 0; $a < $count; $a++) {
                       //$details['dayen'] = 0;
                      // $details['maden'] = $maden_value[$a];
                      $details['dayen'] =  $maden_value[$a];
                       $details['maden'] =0;
                        $details['qued_rkm_fk'] = $last_quod_num;
                        if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 || 
                           $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            // $details['byan'] = $byan[$a];
                            //$hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                            //$wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                            $details['byan'] =' تحويل من حساب '.$this->input->post('name_hesab')[$a];
                        }else{
                            $details['byan'] = $dayen_byan;
                        }
                        $details['marg3'] = $sanad_id;
                        if($_POST['pay_method_sarf'] != 3){
                            $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                            $details['hesab_name'] = $this->input->post('box_name');
                        }
                        if($_POST['pay_method_sarf'] == 3){
                            $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                            $details['hesab_name'] = $this->input->post('sheek_bank_name');
                        }
                        if($_POST['pay_method_sarf'] == 4){
                            $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                          //  $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                             $details['hesab_name'] = $this->input->post('bank_account_num'); 
                        }
                        $details['date'] = strtotime($this->input->post('date_sanad'));
                        $details['date_ar'] = ($this->input->post('date_sanad'));
                        $details['harka_id'] = 6;
                        $details['harka_name'] = 'تحويل';
                        $this->db->insert('finance_quods_details', $details);
                    }
                }
                for ($i = 0; $i < $count; $i++) {
                    $details['qued_rkm_fk'] =  $last_quod_num;
                    if(!empty($id)){
                        $details['qued_rkm_fk'] = $id;
                    }
                    if($_POST['type_paid'] ==4 or $_POST['type_paid'] ==1  ) {
                        $details['dayen'] = 0;
                        if (!empty($maden_value[$i])) {
                            $details['maden'] = $maden_value[$i];
                        }else{
                            $details['maden']=0;
                        }
                        $hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                        $wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                        $details['byan'] =' تحويل إلي حساب '.$hesab_name.'/'.$wasf;
                    }else{
                        if (!empty($maden_value[$i])) {
                            $details['maden'] = $maden_value[$i];
                            //	$details['byan'] =$maden_byan;
                            $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                            if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                                $this->input->post('type_paid') ==4
                            ){
                                $details['byan'] = $byan[$i];
                            }else{
                                $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                            }
                        } else {
                            $details['maden'] = 0;
                        }
                        if (!empty($dayen_value[$i])) {
                            $details['dayen'] = $dayen_value[$i];
                            if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                                $this->input->post('type_paid') ==4
                            ){
                                $details['byan'] = $byan[$i];
                            }else{
                                $details['byan'] = $dayen_byan;
                            }
                        } else {
                            $details['dayen'] = 0;
                        }
                    }
                    $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                    $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                    //$details['byan'] = $byan[$i];
                    $details['marg3'] = $sanad_id;
                    $details['date'] = strtotime($this->input->post('date_sanad'));
                    $details['date_ar'] = ($this->input->post('date_sanad'));
                    if($this->input->post('pay_method_sarf') ==1){
                        $details['harka_id'] = 1;
                        $details['harka_name'] = 'نقدي';
                    }elseif($this->input->post('pay_method_sarf') ==2){
                        $details['harka_id'] = 5;
                        $details['harka_name'] = 'إيداع شيك';
                    }elseif($this->input->post('pay_method_sarf') ==3){
                        $details['harka_id'] = 8;
                        $details['harka_name'] = 'صرف شيك';
                    }elseif($this->input->post('pay_method_sarf') ==4){
                        if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            $details['harka_id'] = 6;
                            $details['harka_name'] = 'تحويل';
                        }
                    }
                    $this->db->insert('finance_quods_details', $details);
                }
               } 
       if($this->input->post('pay_method_sarf') ==4 and $this->input->post('type_paid') ==4 ){
                    if($this->input->post('pay_method_sarf') ==4){
                    for ($a = 0; $a < $count; $a++) {
                       $details['dayen'] = 0;
                       $details['maden'] = $maden_value[$a];
                    //  $details['dayen'] =  $maden_value[$a];
                      // $details['maden'] =0;
                        $details['qued_rkm_fk'] = $last_quod_num;
                        if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 || 
                           $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            // $details['byan'] = $byan[$a];
                            //$hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                            //$wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                            $details['byan'] =' تحويل من حساب '.$this->input->post('name_hesab')[$a];
                        }else{
                            $details['byan'] = $dayen_byan;
                        }
                        $details['marg3'] = $sanad_id;
                        if($_POST['pay_method_sarf'] != 3){
                            $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                            $details['hesab_name'] = $this->input->post('box_name');
                        }
                        if($_POST['pay_method_sarf'] == 3){
                            $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                            $details['hesab_name'] = $this->input->post('sheek_bank_name');
                        }
                        if($_POST['pay_method_sarf'] == 4){
                            $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                          //  $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                             $details['hesab_name'] = $this->input->post('bank_account_num'); 
                        }
                        $details['date'] = strtotime($this->input->post('date_sanad'));
                        $details['date_ar'] = ($this->input->post('date_sanad'));
                        $details['harka_id'] = 6;
                        $details['harka_name'] = 'تحويل';
                        $this->db->insert('finance_quods_details', $details);
                    }
                }
                for ($i = 0; $i < $count; $i++) {
                    $details['qued_rkm_fk'] =  $last_quod_num;
                    if(!empty($id)){
                        $details['qued_rkm_fk'] = $id;
                    }
                    if($_POST['type_paid'] ==4 or $_POST['type_paid'] ==1  ) {
                        $details['maden'] = 0;
                        if (!empty($maden_value[$i])) {
                            $details['dayen'] = $maden_value[$i];
                        }else{
                            $details['dayen']=0;
                        }
                        $hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                        $wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                        $details['byan'] =' تحويل إلي حساب '.$hesab_name.'/'.$wasf;
                    }else{
                        if (!empty($maden_value[$i])) {
                            $details['maden'] = $maden_value[$i];
                            //	$details['byan'] =$maden_byan;
                            $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                            if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                                $this->input->post('type_paid') ==4
                            ){
                                $details['byan'] = $byan[$i];
                            }else{
                                $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                            }
                        } else {
                            $details['maden'] = 0;
                        }
                        if (!empty($dayen_value[$i])) {
                            $details['dayen'] = $dayen_value[$i];
                            if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                                $this->input->post('type_paid') ==4
                            ){
                                $details['byan'] = $byan[$i];
                            }else{
                                $details['byan'] = $dayen_byan;
                            }
                        } else {
                            $details['dayen'] = 0;
                        }
                    }
                    $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                    $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                    //$details['byan'] = $byan[$i];
                    $details['marg3'] = $sanad_id;
                    $details['date'] = strtotime($this->input->post('date_sanad'));
                    $details['date_ar'] = ($this->input->post('date_sanad'));
                    if($this->input->post('pay_method_sarf') ==1){
                        $details['harka_id'] = 1;
                        $details['harka_name'] = 'نقدي';
                    }elseif($this->input->post('pay_method_sarf') ==2){
                        $details['harka_id'] = 5;
                        $details['harka_name'] = 'إيداع شيك';
                    }elseif($this->input->post('pay_method_sarf') ==3){
                        $details['harka_id'] = 8;
                        $details['harka_name'] = 'صرف شيك';
                    }elseif($this->input->post('pay_method_sarf') ==4){
                        if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            $details['harka_id'] = 6;
                            $details['harka_name'] = 'تحويل';
                        }
                    }
                    $this->db->insert('finance_quods_details', $details);
                }
        }                
                /************************************************************/
                if($this->input->post('pay_method_sarf')!=4){
                    $details['qued_rkm_fk'] = $last_quod_num;
                    $details['maden'] = 0;
                    $details['dayen'] = $this->input->post('total_value');
                    $details['marg3'] = $sanad_id;
                    if($_POST['pay_method_sarf'] != 3){
                        $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                        $details['hesab_name'] = $this->input->post('box_name');
                    }
                    if($_POST['pay_method_sarf'] == 3){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                        $details['hesab_name'] = $this->input->post('sheek_bank_name');
                    }
                    if($_POST['pay_method_sarf'] == 4){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                    //    $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                         $details['hesab_name'] = $this->input->post('bank_account_num'); 
                    }
                    //  $details['byan'] = '';
                    $details['byan'] =$dayen_byan;
                    $details['date'] = strtotime($this->input->post('date_sanad'));
                    $details['date_ar'] = ($this->input->post('date_sanad'));
                    $this->db->insert('finance_quods_details', $details);
                }
            }
            /****************************/
        }else{
        //details
        $maden_byan= $_POST['about'];
        if($this->input->post('pay_method_sarf') ==4){
            $dayen_byan=$_POST['sheek_num_bank'] .' '. $_POST['person_name'];
        }else{
            $dayen_byan= ' شيك رقم' . $_POST['sheek_num_bank'] .' '. $_POST['person_name'] .' / ';
        }
        if ($this->input->post('rqm_hesab')) {
            $this->db->where("qued_rkm_fk",$last_quod_num);
            $this->db->delete('finance_quods_details');
            $count = count($this->input->post('rqm_hesab'));
            $maden_value = $this->input->post('value');
            //  $dayen_value = $this->input->post('dayen_value');
            $byan = $this->input->post('byan');
//            $marg3 = $this->input->post('marg3');
            for ($i = 0; $i < $count; $i++) {
//                $details['sanad_qbd_rkm_id'] =  $sanad_id;
                $details['qued_rkm_fk'] =  $last_quod_num;
                if(!empty($id)){
                    $details['qued_rkm_fk'] = $id;
                }
                if($_POST['type_paid'] ==4 or $_POST['type_paid'] ==1 ) {
                    $details['maden'] = 0;
                    if (!empty($maden_value[$i])) {
                        $details['dayen'] = $maden_value[$i];
                    }else{
                        $details['dayen']=0;
                    }
                    $hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                    $wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                    $details['byan'] =' تحويل إلي حساب '.$hesab_name.' / '.$wasf;
                }else{
                    if (!empty($maden_value[$i])) {
                        $details['maden'] = $maden_value[$i];
                        //	$details['byan'] =$maden_byan;
                        $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                        if($this->input->post('type_paid') ==1 || 
                            $this->input->post('type_paid') ==2 || 
                             $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            $details['byan'] = $byan[$i];
                        }else{
                            $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                        }
                    } else {
                        $details['maden'] = 0;
                    }
                    if (!empty($dayen_value[$i])) {
                        $details['dayen'] = $dayen_value[$i];
                        if($this->input->post('type_paid') ==1 ||
                            $this->input->post('type_paid') ==2 ||  
                            $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            $details['byan'] = $byan[$i];
                        }else{
                            $details['byan'] = $dayen_byan;
                        }
                    } else {
                        $details['dayen'] = 0;
                    }
                }
                $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                //$details['byan'] = $byan[$i];
                $details['marg3'] = $sanad_id;
                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));
                if($this->input->post('pay_method_sarf') ==1){
                    $details['harka_id'] = 1;
                    $details['harka_name'] = 'نقدي';
                }elseif($this->input->post('pay_method_sarf') ==2){
                    $details['harka_id'] = 5;
                    $details['harka_name'] = 'إيداع شيك';
                }elseif($this->input->post('pay_method_sarf') ==3){
                    $details['harka_id'] = 8;
                    $details['harka_name'] = 'صرف شيك';
                }elseif($this->input->post('pay_method_sarf') ==4){
                    if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                        $this->input->post('type_paid') ==4
                    ){
                        $details['harka_id'] = 6;
                        $details['harka_name'] = 'تحويل';
                    }
                }
                $this->db->insert('finance_quods_details', $details);
            }
            /************************************************************/
            if($this->input->post('pay_method_sarf') ==4){
                for ($a = 0; $a < $count; $a++) {
                    if($_POST['type_paid'] ==4) {
                       // $details['dayen'] = 0;
                       // $details['maden'] = $maden_value[$a];
                          $details['dayen'] = $maden_value[$a];
                         $details['maden'] = 0;
                    }else{
                        $details['maden'] = 0;
                        //   $details['dayen'] = $this->input->post('total_value');
                        $details['dayen'] = $maden_value[$a];
                    }
                    $details['qued_rkm_fk'] = $last_quod_num;
                    //$details['byan'] = $byan;
                    if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                        $this->input->post('type_paid') ==4
                    ){
                       // $details['byan'] = $byan[$a];
                        $hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                        $wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                        $details['byan'] ='تحويل من حساب  '.$hesab_name.' / '.$wasf;
                    }else{
                        $details['byan'] = $dayen_byan;
                    }
                    $details['marg3'] = $sanad_id;
                    if($_POST['pay_method_sarf'] != 3){
                        $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                        $details['hesab_name'] = $this->input->post('box_name');
                    }
                    if($_POST['pay_method_sarf'] == 3){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                        $details['hesab_name'] = $this->input->post('sheek_bank_name');
                    }
                    if($_POST['pay_method_sarf'] == 4){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                      //  $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                         $details['hesab_name'] = $this->input->post('bank_account_num'); 
                    }
                    $details['date'] = strtotime($this->input->post('date_sanad'));
                    $details['date_ar'] = ($this->input->post('date_sanad'));
                    $details['harka_id'] = 6;
                    $details['harka_name'] = 'تحويل';
                    $this->db->insert('finance_quods_details', $details);
                }
            }else{
                $details['qued_rkm_fk'] = $last_quod_num;
                $details['maden'] = 0;
                $details['dayen'] = $this->input->post('total_value');
                $details['marg3'] = $sanad_id;
                if($_POST['pay_method_sarf'] != 3){
                    $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                    $details['hesab_name'] = $this->input->post('box_name');
                }
                if($_POST['pay_method_sarf'] == 3){
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                    $details['hesab_name'] = $this->input->post('sheek_bank_name');
                }
                if($_POST['pay_method_sarf'] == 4){
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                  //  $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                     $details['hesab_name'] = $this->input->post('bank_account_num'); 
                }
                //  $details['byan'] = '';
                $details['byan'] =$dayen_byan;
                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));
                $this->db->insert('finance_quods_details', $details);
            }
        }
        }
    }
/* public function insert_Quods($sanad_id,$last_quod_num){
       $this->db->where("rkm",$last_quod_num);
        $this->db->delete('finance_quods');
        $data['no3_qued'] = 6;
          $data['no3_qued_name'] = 'قيد سند صرف';
        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = 'قيد المراجعة';
        $data['qued_date'] = strtotime($this->input->post('date_sanad'));
        $data['qued_date_ar'] = $this->input->post('date_sanad');
        $data['total_value'] = $this->input->post('total_value');
        $data['rkm'] = $last_quod_num;
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['date'] = date('Y-m-d');
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $this->db->insert('finance_quods', $data);
        if($this->input->post('pay_method_sarf') ==4){
            //details
            $maden_byan= $_POST['about'];
            if($this->input->post('pay_method_sarf') ==4){
                $dayen_byan=$_POST['sheek_num_bank'] .' '. $_POST['person_name'];
            }else{
                $dayen_byan= 'شيك رقم' . $_POST['sheek_num_bank'] .' '. $_POST['person_name'] .' / ';
            }
    
            if ($this->input->post('rqm_hesab')) {
                $this->db->where("qued_rkm_fk",$last_quod_num);
                $this->db->delete('finance_quods_details');
                $count = count($this->input->post('rqm_hesab'));
                $maden_value = $this->input->post('value');
                $byan = $this->input->post('byan');
                if($this->input->post('pay_method_sarf') ==4){
                    for ($a = 0; $a < $count; $a++) {
                      $details['dayen'] =  $maden_value[$a];
                       $details['maden'] =0;
                        $details['qued_rkm_fk'] = $last_quod_num;
                        if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 || 
                           $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){

                            $details['byan'] =' تحويل من حساب '.$this->input->post('name_hesab')[$a];
                        }else{
                            $details['byan'] = $dayen_byan;
                        }
                        $details['marg3'] = $sanad_id;
                        if($_POST['pay_method_sarf'] != 3){
                            $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                            $details['hesab_name'] = $this->input->post('box_name');
                        }
                        if($_POST['pay_method_sarf'] == 3){
                            $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                            $details['hesab_name'] = $this->input->post('sheek_bank_name');
                        }
                        if($_POST['pay_method_sarf'] == 4){
                            $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                          //  $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                             $details['hesab_name'] = $this->input->post('bank_account_num'); 
                        }
                        $details['date'] = strtotime($this->input->post('date_sanad'));
                        $details['date_ar'] = ($this->input->post('date_sanad'));
                        $details['harka_id'] = 6;
                        $details['harka_name'] = 'تحويل';
                        $this->db->insert('finance_quods_details', $details);
                    }
                }
                for ($i = 0; $i < $count; $i++) {
                    $details['qued_rkm_fk'] =  $last_quod_num;
                    if(!empty($id)){
                        $details['qued_rkm_fk'] = $id;
                    }
                    if($_POST['type_paid'] ==4 or $_POST['type_paid'] ==1  ) {                   
                        $details['dayen'] = 0;
                        if (!empty($maden_value[$i])) {
                            $details['maden'] = $maden_value[$i];
                        }else{
                            $details['maden']=0;
                        }
                        $hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                        $wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                        $details['byan'] =' تحويل إلي حساب '.$hesab_name.'/'.$wasf;
                    }else{
                        if (!empty($maden_value[$i])) {
                            $details['maden'] = $maden_value[$i];
                            //	$details['byan'] =$maden_byan;
                            $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                            if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                                $this->input->post('type_paid') ==4
                            ){
                                $details['byan'] = $byan[$i];
                            }else{
                                $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                            }
                        } else {
                            $details['maden'] = 0;
                        }
                        if (!empty($dayen_value[$i])) {
                            $details['dayen'] = $dayen_value[$i];
                            if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                                $this->input->post('type_paid') ==4
                            ){
                                $details['byan'] = $byan[$i];
                            }else{
                                $details['byan'] = $dayen_byan;
                            }
                        } else {
                            $details['dayen'] = 0;
                        }
                    }
                    $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                    $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                    //$details['byan'] = $byan[$i];
                    $details['marg3'] = $sanad_id;
                    $details['date'] = strtotime($this->input->post('date_sanad'));
                    $details['date_ar'] = ($this->input->post('date_sanad'));
                    if($this->input->post('pay_method_sarf') ==1){
                        $details['harka_id'] = 1;
                        $details['harka_name'] = 'نقدي';
                    }elseif($this->input->post('pay_method_sarf') ==2){
                        $details['harka_id'] = 5;
                        $details['harka_name'] = 'إيداع شيك';
                    }elseif($this->input->post('pay_method_sarf') ==3){
                        $details['harka_id'] = 8;
                        $details['harka_name'] = 'صرف شيك';
                    }elseif($this->input->post('pay_method_sarf') ==4){
                        if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            $details['harka_id'] = 6;
                            $details['harka_name'] = 'تحويل';
                        }
                    }
                    $this->db->insert('finance_quods_details', $details);
                }
                if($this->input->post('pay_method_sarf')!=4){
                    $details['qued_rkm_fk'] = $last_quod_num;
                    $details['maden'] = 0;
                    $details['dayen'] = $this->input->post('total_value');
                    $details['marg3'] = $sanad_id;
                    if($_POST['pay_method_sarf'] != 3){
                        $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                        $details['hesab_name'] = $this->input->post('box_name');
                    }
                    if($_POST['pay_method_sarf'] == 3){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                        $details['hesab_name'] = $this->input->post('sheek_bank_name');
                    }
                    if($_POST['pay_method_sarf'] == 4){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                    //    $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                         $details['hesab_name'] = $this->input->post('bank_account_num'); 
                    }
                    //  $details['byan'] = '';
                    $details['byan'] =$dayen_byan;
                    $details['date'] = strtotime($this->input->post('date_sanad'));
                    $details['date_ar'] = ($this->input->post('date_sanad'));
                    $this->db->insert('finance_quods_details', $details);
                }
            }
        }else{
        //details
        $maden_byan= $_POST['about'];
        if($this->input->post('pay_method_sarf') ==4){
            $dayen_byan=$_POST['sheek_num_bank'] .' '. $_POST['person_name'];
        }else{
            $dayen_byan= ' شيك رقم' . $_POST['sheek_num_bank'] .' '. $_POST['person_name'] .' / ';
        }
        if ($this->input->post('rqm_hesab')) {
            $this->db->where("qued_rkm_fk",$last_quod_num);
            $this->db->delete('finance_quods_details');
            $count = count($this->input->post('rqm_hesab'));
            $maden_value = $this->input->post('value');
            //  $dayen_value = $this->input->post('dayen_value');
            $byan = $this->input->post('byan');
//            $marg3 = $this->input->post('marg3');
            for ($i = 0; $i < $count; $i++) {
//                $details['sanad_qbd_rkm_id'] =  $sanad_id;
                $details['qued_rkm_fk'] =  $last_quod_num;
                if(!empty($id)){
                    $details['qued_rkm_fk'] = $id;
                }
                if($_POST['type_paid'] ==4 or $_POST['type_paid'] ==1 ) {

                    $details['maden'] = 0;
                    if (!empty($maden_value[$i])) {
                        $details['dayen'] = $maden_value[$i];
                    }else{
                        $details['dayen']=0;
                    }
                    $hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                    $wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                    $details['byan'] =' تحويل إلي حساب '.$hesab_name.' / '.$wasf;
                }else{
                    if (!empty($maden_value[$i])) {
                        $details['maden'] = $maden_value[$i];
                        //	$details['byan'] =$maden_byan;
                        $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                        if($this->input->post('type_paid') ==1 || 
                            $this->input->post('type_paid') ==2 || 
                             $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            $details['byan'] = $byan[$i];
                        }else{
                            $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                        }
                    } else {
                        $details['maden'] = 0;
                    }

                    if (!empty($dayen_value[$i])) {
                        $details['dayen'] = $dayen_value[$i];
                        if($this->input->post('type_paid') ==1 ||
                            $this->input->post('type_paid') ==2 ||  
                            $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            $details['byan'] = $byan[$i];

                        }else{
                            $details['byan'] = $dayen_byan;
                        }

                    } else {
                        $details['dayen'] = 0;
                    }


                }






                $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                //$details['byan'] = $byan[$i];
                $details['marg3'] = $sanad_id;

                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));
                if($this->input->post('pay_method_sarf') ==1){
                    $details['harka_id'] = 1;
                    $details['harka_name'] = 'نقدي';
                }elseif($this->input->post('pay_method_sarf') ==2){
                    $details['harka_id'] = 5;
                    $details['harka_name'] = 'إيداع شيك';
                }elseif($this->input->post('pay_method_sarf') ==3){
                    $details['harka_id'] = 8;
                    $details['harka_name'] = 'صرف شيك';
                }elseif($this->input->post('pay_method_sarf') ==4){
                    if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                        $this->input->post('type_paid') ==4
                    ){
                        $details['harka_id'] = 6;
                        $details['harka_name'] = 'تحويل';

                    }

                }


                $this->db->insert('finance_quods_details', $details);
            }

            if($this->input->post('pay_method_sarf') ==4){

                for ($a = 0; $a < $count; $a++) {
                    if($_POST['type_paid'] ==4) {
                          $details['dayen'] = $maden_value[$a];
                         $details['maden'] = 0;
                    }else{
                        $details['maden'] = 0;
                        $details['dayen'] = $maden_value[$a];
                    }

                    $details['qued_rkm_fk'] = $last_quod_num;

                    if($this->input->post('type_paid') ==1 || $this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                        $this->input->post('type_paid') ==4
                    ){

                        $hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                        $wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                        $details['byan'] ='تحويل من حساب  '.$hesab_name.' / '.$wasf;
                    }else{
                        $details['byan'] = $dayen_byan;
                    }



                    $details['marg3'] = $sanad_id;
                    if($_POST['pay_method_sarf'] != 3){
                        $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                        $details['hesab_name'] = $this->input->post('box_name');
                    }
                    if($_POST['pay_method_sarf'] == 3){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                        $details['hesab_name'] = $this->input->post('sheek_bank_name');
                    }
                    if($_POST['pay_method_sarf'] == 4){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                      //  $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                         $details['hesab_name'] = $this->input->post('bank_account_num'); 
                    }
                    $details['date'] = strtotime($this->input->post('date_sanad'));
                    $details['date_ar'] = ($this->input->post('date_sanad'));
                    $details['harka_id'] = 6;
                    $details['harka_name'] = 'تحويل';
                    $this->db->insert('finance_quods_details', $details);

                }

            }else{



                $details['qued_rkm_fk'] = $last_quod_num;
                $details['maden'] = 0;

                $details['dayen'] = $this->input->post('total_value');
                $details['marg3'] = $sanad_id;
                if($_POST['pay_method_sarf'] != 3){
                    $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                    $details['hesab_name'] = $this->input->post('box_name');
                }
                if($_POST['pay_method_sarf'] == 3){
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                    $details['hesab_name'] = $this->input->post('sheek_bank_name');
                }
                if($_POST['pay_method_sarf'] == 4){
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                  //  $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                     $details['hesab_name'] = $this->input->post('bank_account_num'); 
                }


                //  $details['byan'] = '';
                $details['byan'] =$dayen_byan;
                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));

                $this->db->insert('finance_quods_details', $details);
            }







        }
        }
    }
 */
 /*2-7
    public function insert_Quods($sanad_id,$last_quod_num)
    {
        $this->db->where("rkm",$last_quod_num);
        $this->db->delete('finance_quods');
        $data['no3_qued'] = 6;
        $data['no3_qued_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ³ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¾';
        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ¦ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¬ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ©';
       // $data['sanad_qbd_rkm_id'] = $sanad_id;
        $data['qued_date'] = strtotime($this->input->post('date_sanad'));
        $data['qued_date_ar'] = $this->input->post('date_sanad');
        $data['total_value'] = $this->input->post('total_value');

        $data['rkm'] = $last_quod_num;

        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);




            $data['date'] = date('Y-m-d');
            $data['date_s'] = time();
            $data['publisher'] = $_SESSION['user_id'];
            $this->db->insert('finance_quods', $data);



        //details

        if ($this->input->post('rqm_hesab')) {

            $this->db->where("qued_rkm_fk",$last_quod_num);
            $this->db->delete('finance_quods_details');


            $count = count($this->input->post('rqm_hesab'));
            $maden_value = $this->input->post('value');
//            $dayen_value = $this->input->post('dayen_value');

            $byan = $this->input->post('byan');
//            $marg3 = $this->input->post('marg3');

            for ($i = 0; $i < $count; $i++) {
//                $details['sanad_qbd_rkm_id'] =  $sanad_id;
                $details['qued_rkm_fk'] =  $last_quod_num;
                if(!empty($id)){
                    $details['qued_rkm_fk'] = $id;
                }
                if (!empty($maden_value[$i])) {
                    $details['maden'] = $maden_value[$i];
                } else {
                    $details['maden'] = 0;
                }
                if (!empty($dayen_value[$i])) {
                    $details['dayen'] = $dayen_value[$i];
                } else {
                    $details['dayen'] = 0;
                }
                $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                $details['byan'] = $byan[$i];
                $details['marg3'] = $sanad_id;

                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));
                   if($this->input->post('pay_method_sarf') ==1){
                    $details['harka_id'] = 1;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹';
                }elseif($this->input->post('pay_method_sarf') ==2){
                    $details['harka_id'] = 5;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¥ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢';
                }elseif($this->input->post('pay_method_sarf') ==3){
                    $details['harka_id'] = 8;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢';
                }
                
                
                

                $this->db->insert('finance_quods_details', $details);
            }
            $details['qued_rkm_fk'] = $last_quod_num;
            $details['maden'] = 0;

            $details['dayen'] = $this->input->post('total_value');
            $details['marg3'] = $sanad_id;
            if($_POST['pay_method_sarf'] != 3){
                $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                $details['hesab_name'] = $this->input->post('box_name');
            }
            if($_POST['pay_method_sarf'] == 3){
                $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                $details['hesab_name'] = $this->input->post('sheek_bank_name');
            }

            $details['byan'] = '';

            $details['date'] = strtotime($this->input->post('date_sanad'));
            $details['date_ar'] = ($this->input->post('date_sanad'));

            $this->db->insert('finance_quods_details', $details);

        }
    }*/
    
    
  /* eslam 2-99  
        public function insert_Quods($sanad_id,$last_quod_num)
    {
        $this->db->where("rkm",$last_quod_num);
        $this->db->delete('finance_quods');
        $data['no3_qued'] = 6;
        $data['no3_qued_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ³ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¾';
        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ¦ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¬ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ©';
       // $data['sanad_qbd_rkm_id'] = $sanad_id;
        $data['qued_date'] = strtotime($this->input->post('date_sanad'));
        $data['qued_date_ar'] = $this->input->post('date_sanad');
        $data['total_value'] = $this->input->post('total_value');

        $data['rkm'] = $last_quod_num;

        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);




            $data['date'] = date('Y-m-d');
            $data['date_s'] = time();
            $data['publisher'] = $_SESSION['user_id'];
            $this->db->insert('finance_quods', $data);



        //details
$maden_byan= $_POST['about'];
    if($this->input->post('pay_method_sarf') ==4){
        $dayen_byan = '';
    }else{
       $dayen_byan= ' ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ¦' . $_POST['sheek_num_bank'] .' '. $_POST['person_name'] .' / '; 
    }
    



        if ($this->input->post('rqm_hesab')) {

            $this->db->where("qued_rkm_fk",$last_quod_num);
            $this->db->delete('finance_quods_details');


            $count = count($this->input->post('rqm_hesab'));
            $maden_value = $this->input->post('value');
//            $dayen_value = $this->input->post('dayen_value');

            $byan = $this->input->post('byan');
//            $marg3 = $this->input->post('marg3');

            for ($i = 0; $i < $count; $i++) {
//                $details['sanad_qbd_rkm_id'] =  $sanad_id;
                $details['qued_rkm_fk'] =  $last_quod_num;
                if(!empty($id)){
                    $details['qued_rkm_fk'] = $id;
                }

                if (!empty($maden_value[$i])) {
                    $details['maden'] = $maden_value[$i];
				//	$details['byan'] =$maden_byan;
                	$details['byan'] =$dayen_byan . '  ' .$maden_byan;
                } else {
                    $details['maden'] = 0;
                }
                if (!empty($dayen_value[$i])) {
                    $details['dayen'] = $dayen_value[$i];
					$details['byan'] = $dayen_byan;
                } else {
                    $details['dayen'] = 0;
                }
                $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                //$details['byan'] = $byan[$i];
                $details['marg3'] = $sanad_id;

                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));
                   if($this->input->post('pay_method_sarf') ==1){
                    $details['harka_id'] = 1;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹';
                }elseif($this->input->post('pay_method_sarf') ==2){
                    $details['harka_id'] = 5;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¥ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢';
                }elseif($this->input->post('pay_method_sarf') ==3){
                    $details['harka_id'] = 8;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢';
                }elseif($this->input->post('pay_method_sarf') ==4){
                       $details['harka_id'] = 8;
                       $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢';
                   }




                $this->db->insert('finance_quods_details', $details);
            }
            $details['qued_rkm_fk'] = $last_quod_num;
            $details['maden'] = 0;

            $details['dayen'] = $this->input->post('total_value');
            $details['marg3'] = $sanad_id;
            if($_POST['pay_method_sarf'] != 3){
                $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                $details['hesab_name'] = $this->input->post('box_name');
            }
            if($_POST['pay_method_sarf'] == 3){
                $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                $details['hesab_name'] = $this->input->post('sheek_bank_name');
            }
            if($_POST['pay_method_sarf'] == 4){
                $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
            }

          //  $details['byan'] = '';
	          $details['byan'] =$dayen_byan;
            $details['date'] = strtotime($this->input->post('date_sanad'));
            $details['date_ar'] = ($this->input->post('date_sanad'));

            $this->db->insert('finance_quods_details', $details);

        }
    }
    */
   
   
   
  /* public function insert_Quods($sanad_id,$last_quod_num)
    {

        $this->db->where("rkm",$last_quod_num);
        $this->db->delete('finance_quods');
        $data['no3_qued'] = 6;
        $data['no3_qued_name'] = 'ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ·ط¢آ¸ط·آ¸ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ³ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ±ط·آ·ط¢آ¸ط·آ¸ط¢آ¾';
        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = 'ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ·ط¢آ¸ط·آ¸ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ§ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬أ¢â‚¬ع†ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬ط¢آ¦ط·آ·ط¢آ·ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ¬ط·آ·ط¢آ·ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ©';
        // $data['sanad_qbd_rkm_id'] = $sanad_id;
        $data['qued_date'] = strtotime($this->input->post('date_sanad'));
        $data['qued_date_ar'] = $this->input->post('date_sanad');
        $data['total_value'] = $this->input->post('total_value');

        $data['rkm'] = $last_quod_num;

        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);




        $data['date'] = date('Y-m-d');
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $this->db->insert('finance_quods', $data);




        //details
        $maden_byan= $_POST['about'];
        if($this->input->post('pay_method_sarf') ==4){
            $dayen_byan=$_POST['sheek_num_bank'] .' '. $_POST['person_name'];
        }else{
            $dayen_byan= ' ط·آ·ط¢آ·ط·آ¢ط¢آ´ط·آ·ط¢آ¸ط·آ¸ط¢آ¹ط·آ·ط¢آ¸ط·آ¦أ¢â‚¬â„¢ ط·آ·ط¢آ·ط·آ¢ط¢آ±ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬ط¢آ¦' . $_POST['sheek_num_bank'] .' '. $_POST['person_name'] .' / ';
        }

        if ($this->input->post('rqm_hesab')) {

            $this->db->where("qued_rkm_fk",$last_quod_num);
            $this->db->delete('finance_quods_details');


            $count = count($this->input->post('rqm_hesab'));
            $maden_value = $this->input->post('value');
            //  $dayen_value = $this->input->post('dayen_value');

            $byan = $this->input->post('byan');
//            $marg3 = $this->input->post('marg3');





            for ($i = 0; $i < $count; $i++) {
//                $details['sanad_qbd_rkm_id'] =  $sanad_id;
                $details['qued_rkm_fk'] =  $last_quod_num;
                if(!empty($id)){
                    $details['qued_rkm_fk'] = $id;
                }
                if($_POST['type_paid'] ==4) {

                    $details['maden'] = 0;
                    if (!empty($maden_value[$i])) {
                        $details['dayen'] = $maden_value[$i];
                    }else{
                        $details['dayen']=0;
                    }
                    $hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                    $wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                    $details['byan'] ='ط·آ·ط¢آ·ط·آ¹ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ­ط·آ·ط¢آ¸ط·آ«أ¢â‚¬آ ط·آ·ط¢آ¸ط·آ¸ط¢آ¹ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬أ¢â‚¬ع† ط·آ·ط¢آ·ط·آ¢ط¢آ¥ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬أ¢â‚¬ع†ط·آ·ط¢آ¸ط·آ¸ط¢آ¹ ط·آ·ط¢آ·ط·آ¢ط¢آ­ط·آ·ط¢آ·ط·آ¢ط¢آ³ط·آ·ط¢آ·ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ¨ '.$hesab_name.' / '.$wasf;
                }else{
                    if (!empty($maden_value[$i])) {


                        $details['maden'] = $maden_value[$i];


                        //	$details['byan'] =$maden_byan;
                        $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                        if($this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            $details['byan'] = $byan[$i];

                        }else{
                            $details['byan'] = $dayen_byan . '  ' . $maden_byan;

                        }
                    } else {
                        $details['maden'] = 0;
                    }

                    if (!empty($dayen_value[$i])) {
                        $details['dayen'] = $dayen_value[$i];
                        if($this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                            $this->input->post('type_paid') ==4
                        ){
                            $details['byan'] = $byan[$i];

                        }else{
                            $details['byan'] = $dayen_byan;
                        }

                    } else {
                        $details['dayen'] = 0;
                    }


                }






                $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                //$details['byan'] = $byan[$i];
                $details['marg3'] = $sanad_id;

                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));
                if($this->input->post('pay_method_sarf') ==1){
                    $details['harka_id'] = 1;
                    $details['harka_name'] = 'ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬ط¢آ ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ·ط¢آ·ط·آ¢ط¢آ¯ط·آ·ط¢آ¸ط·آ¸ط¢آ¹';
                }elseif($this->input->post('pay_method_sarf') ==2){
                    $details['harka_id'] = 5;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ¥ط·آ·ط¢آ¸ط·آ¸ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ¹ ط·آ·ط¢آ·ط·آ¢ط¢آ´ط·آ·ط¢آ¸ط·آ¸ط¢آ¹ط·آ·ط¢آ¸ط·آ¦أ¢â‚¬â„¢';
                }elseif($this->input->post('pay_method_sarf') ==3){
                    $details['harka_id'] = 8;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ±ط·آ·ط¢آ¸ط·آ¸ط¢آ¾ ط·آ·ط¢آ·ط·آ¢ط¢آ´ط·آ·ط¢آ¸ط·آ¸ط¢آ¹ط·آ·ط¢آ¸ط·آ¦أ¢â‚¬â„¢';
                }elseif($this->input->post('pay_method_sarf') ==4){
                    if($this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                        $this->input->post('type_paid') ==4
                    ){
                        $details['harka_id'] = 6;
                        $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¹ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ­ط·آ·ط¢آ¸ط·آ«أ¢â‚¬آ ط·آ·ط¢آ¸ط·آ¸ط¢آ¹ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬أ¢â‚¬ع†';

                    }

                }


                $this->db->insert('finance_quods_details', $details);
            }



          
            if($this->input->post('pay_method_sarf') ==4){

                for ($a = 0; $a < $count; $a++) {

                    if($_POST['type_paid'] ==4) {

                        $details['dayen'] = 0;

                        $details['maden'] = $maden_value[$a];
                    }else{

                        $details['maden'] = 0;
                        //   $details['dayen'] = $this->input->post('total_value');


                        $details['dayen'] = $maden_value[$a];
                    }




                    $details['qued_rkm_fk'] = $last_quod_num;

                    //$details['byan'] = $byan;
                    if($this->input->post('type_paid') ==2 ||  $this->input->post('type_paid') ==3 ||
                        $this->input->post('type_paid') ==4
                    ){
                       // $details['byan'] = $byan[$a];

                        $hesab_name = $this->GetBankName($this->input->post('sheek_bank_id'));
                        $details['hesab_name'] = $this->input->post('bank_account_num'); 
                        $wasf = $this->GetAccountName($this->input->post('bank_account_id_fk'));
                        $details['byan'] ='ط·آ·ط¢آ·ط·آ¹ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ­ط·آ·ط¢آ¸ط·آ«أ¢â‚¬آ ط·آ·ط¢آ¸ط·آ¸ط¢آ¹ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬أ¢â‚¬ع† ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬ط¢آ¦ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬ط¢آ  ط·آ·ط¢آ·ط·آ¢ط¢آ­ط·آ·ط¢آ·ط·آ¢ط¢آ³ط·آ·ط¢آ·ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ¨ '.$hesab_name.' / '.$wasf;
                    }else{
                        $details['byan'] = $dayen_byan;
                    }



                    $details['marg3'] = $sanad_id;
                    if($_POST['pay_method_sarf'] != 3){
                        $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                        $details['hesab_name'] = $this->input->post('box_name');
                    }
                    if($_POST['pay_method_sarf'] == 3){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                        $details['hesab_name'] = $this->input->post('sheek_bank_name');
                    }
                    if($_POST['pay_method_sarf'] == 4){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                       // $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                        $details['hesab_name'] = $this->input->post('bank_account_num'); 
                    }
                    $details['date'] = strtotime($this->input->post('date_sanad'));
                    $details['date_ar'] = ($this->input->post('date_sanad'));
                    $details['harka_id'] = 6;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¹ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ­ط·آ·ط¢آ¸ط·آ«أ¢â‚¬آ ط·آ·ط¢آ¸ط·آ¸ط¢آ¹ط·آ·ط¢آ¸ط£آ¢أ¢â€ڑآ¬أ¢â‚¬ع†';
                    $this->db->insert('finance_quods_details', $details);

                }

            }else{



                $details['qued_rkm_fk'] = $last_quod_num;
                $details['maden'] = 0;

                $details['dayen'] = $this->input->post('total_value');
                $details['marg3'] = $sanad_id;
                if($_POST['pay_method_sarf'] != 3){
                    $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                    $details['hesab_name'] = $this->input->post('box_name');
                }
                if($_POST['pay_method_sarf'] == 3){
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                    $details['hesab_name'] = $this->input->post('sheek_bank_name');
                }
                if($_POST['pay_method_sarf'] == 4){
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                   // $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                    $details['hesab_name'] = $this->input->post('bank_account_num'); 
                }


                //  $details['byan'] = '';
                $details['byan'] =$dayen_byan;
                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));

                $this->db->insert('finance_quods_details', $details);
            }







        }

    }
    */
    
 
 /*
 23-9
  public function insert_Quods($sanad_id,$last_quod_num)
    {
        $this->db->where("rkm",$last_quod_num);
        $this->db->delete('finance_quods');
        $data['no3_qued'] = 6;
        $data['no3_qued_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬ع©ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ³ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¾';
        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬ع©ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â€ڑآ¬ط¹â€ ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¢ط¢آ¦ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¬ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ©';
        // $data['sanad_qbd_rkm_id'] = $sanad_id;
        $data['qued_date'] = strtotime($this->input->post('date_sanad'));
        $data['qued_date_ar'] = $this->input->post('date_sanad');
        $data['total_value'] = $this->input->post('total_value');
        $data['rkm'] = $last_quod_num;
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['date'] = date('Y-m-d');
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $this->db->insert('finance_quods', $data);
        //details
        $maden_byan= $_POST['about'];
		 if($this->input->post('pay_method_sarf') ==4){
        $dayen_byan=$_POST['sheek_num_bank'] .' '. $_POST['person_name'];
		 }else{
		   $dayen_byan= ' ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¦ط£آ¢أ¢â€ڑآ¬أ¢â€‍آ¢ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬ع©ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¢ط¢آ¦' . $_POST['sheek_num_bank'] .' '. $_POST['person_name'] .' / '; 
		 }
        if ($this->input->post('rqm_hesab')) {
            $this->db->where("qued_rkm_fk",$last_quod_num);
            $this->db->delete('finance_quods_details');
            $count = count($this->input->post('rqm_hesab'));
            $maden_value = $this->input->post('value');
            //  $dayen_value = $this->input->post('dayen_value');
            $byan = $this->input->post('byan');
//            $marg3 = $this->input->post('marg3');
            for ($i = 0; $i < $count; $i++) {
//                $details['sanad_qbd_rkm_id'] =  $sanad_id;
                $details['qued_rkm_fk'] =  $last_quod_num;
                if(!empty($id)){
                    $details['qued_rkm_fk'] = $id;
                }
                if($_POST['type_paid'] ==4) {

                    $details['maden'] = 0;
                    if (!empty($maden_value[$i])) {
                        $details['dayen'] = $maden_value[$i];
                    }else{
                        $details['dayen']=0;
                    }
                }else {
                    if (!empty($maden_value[$i])) {
                        $details['maden'] = $maden_value[$i];
           
                        $details['byan'] = $dayen_byan . '  ' . $maden_byan;
                    } else {
                        $details['maden'] = 0;
                    }
                    if (!empty($dayen_value[$i])) {
                        $details['dayen'] = $dayen_value[$i];
                        $details['byan'] = $dayen_byan;
                    } else {
                        $details['dayen'] = 0;
                    }
                }
                $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                //$details['byan'] = $byan[$i];
                $details['marg3'] = $sanad_id;
                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));
                if($this->input->post('pay_method_sarf') ==1){
                    $details['harka_id'] = 1;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬ع©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹';
                }elseif($this->input->post('pay_method_sarf') ==2){
                    $details['harka_id'] = 5;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¥ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¦ط£آ¢أ¢â€ڑآ¬أ¢â€‍آ¢';
                }elseif($this->input->post('pay_method_sarf') ==3){
                    $details['harka_id'] = 8;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¾ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¦ط£آ¢أ¢â€ڑآ¬أ¢â€‍آ¢';
                }elseif($this->input->post('pay_method_sarf') ==4){
                    $details['harka_id'] = 8;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¾ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¦ط£آ¢أ¢â€ڑآ¬أ¢â€‍آ¢';
                }
                $this->db->insert('finance_quods_details', $details);
            }
          
                   if($this->input->post('pay_method_sarf') ==4){
                       for ($a = 0; $a < $count; $a++) {
                           if($_POST['type_paid'] ==4) {
                               $details['dayen'] = 0;
                               $details['maden'] = $maden_value[$a];
                           }else{
                               $details['maden'] = 0;
                               //   $details['dayen'] = $this->input->post('total_value');
                               $details['dayen'] = $maden_value[$a];
                           }
                           $details['qued_rkm_fk'] = $last_quod_num;
                           $details['byan'] = $dayen_byan;
                           $details['marg3'] = $sanad_id;
                           if($_POST['pay_method_sarf'] != 3){
                               $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                               $details['hesab_name'] = $this->input->post('box_name');
                           }
                           if($_POST['pay_method_sarf'] == 3){
                               $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                               $details['hesab_name'] = $this->input->post('sheek_bank_name');
                           }
                           if($_POST['pay_method_sarf'] == 4){
                               $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                               //$details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                              $details['hesab_name'] = $this->input->post('bank_account_num'); 
                               
                           }
                           $details['date'] = strtotime($this->input->post('date_sanad'));
                           $details['date_ar'] = ($this->input->post('date_sanad'));
                           $this->db->insert('finance_quods_details', $details);
                       }
                   }else{
                       $details['qued_rkm_fk'] = $last_quod_num;
                       $details['maden'] = 0;
                       $details['dayen'] = $this->input->post('total_value');
                       $details['marg3'] = $sanad_id;
                       if($_POST['pay_method_sarf'] != 3){
                           $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                           $details['hesab_name'] = $this->input->post('box_name');
                       }
                       if($_POST['pay_method_sarf'] == 3){
                           $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                           $details['hesab_name'] = $this->input->post('sheek_bank_name');
                       }
                       if($_POST['pay_method_sarf'] == 4){
                           $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                          // $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                           $details['hesab_name'] = $this->input->post('bank_account_num'); 
                       }
                     //  $details['byan'] = '';
                       $details['byan'] =$dayen_byan;
                       $details['date'] = strtotime($this->input->post('date_sanad'));
                       $details['date_ar'] = ($this->input->post('date_sanad'));
                       $this->db->insert('finance_quods_details', $details);
                   }
        }
    }
   
   */
/*    
 22-9-2019   
    	  public function insert_Quods($sanad_id,$last_quod_num)
    {
        $this->db->where("rkm",$last_quod_num);
        $this->db->delete('finance_quods');
        $data['no3_qued'] = 6;
        $data['no3_qued_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ³ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¾';
        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ¦ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¬ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ©';
        // $data['sanad_qbd_rkm_id'] = $sanad_id;
        $data['qued_date'] = strtotime($this->input->post('date_sanad'));
        $data['qued_date_ar'] = $this->input->post('date_sanad');
        $data['total_value'] = $this->input->post('total_value');
        $data['rkm'] = $last_quod_num;
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['date'] = date('Y-m-d');
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $this->db->insert('finance_quods', $data);
        //details
        $maden_byan= $_POST['about'];
		 if($this->input->post('pay_method_sarf') ==4){
        $dayen_byan=$_POST['sheek_num_bank'] .' '. $_POST['person_name'];
		 }else{
		   $dayen_byan= ' ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ¦' . $_POST['sheek_num_bank'] .' '. $_POST['person_name'] .' / '; 
		 }
        if ($this->input->post('rqm_hesab')) {
            $this->db->where("qued_rkm_fk",$last_quod_num);
            $this->db->delete('finance_quods_details');
            $count = count($this->input->post('rqm_hesab'));
            $maden_value = $this->input->post('value');
            //  $dayen_value = $this->input->post('dayen_value');
            $byan = $this->input->post('byan');
//            $marg3 = $this->input->post('marg3');
            for ($i = 0; $i < $count; $i++) {
//                $details['sanad_qbd_rkm_id'] =  $sanad_id;
                $details['qued_rkm_fk'] =  $last_quod_num;
                if(!empty($id)){
                    $details['qued_rkm_fk'] = $id;
                }
                if (!empty($maden_value[$i])) {
                    $details['maden'] = $maden_value[$i];
                    //	$details['byan'] =$maden_byan;
                    $details['byan'] =$dayen_byan . '  ' .$maden_byan;
                } else {
                    $details['maden'] = 0;
                }
                if (!empty($dayen_value[$i])) {
                    $details['dayen'] = $dayen_value[$i];
                    $details['byan'] = $dayen_byan;
                } else {
                    $details['dayen'] = 0;
                }
                $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                //$details['byan'] = $byan[$i];
                $details['marg3'] = $sanad_id;
                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));
                if($this->input->post('pay_method_sarf') ==1){
                    $details['harka_id'] = 1;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¢ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ£ط·آ¢ط¢آ¢ط·آ£ط¢آ¢ط£آ¢أ¢â€ڑآ¬ط¹â€کط·آ¢ط¢آ¬ط·آ·ط¢آ¹ط£آ¢أ¢â€ڑآ¬ط¹آ©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹';
                }elseif($this->input->post('pay_method_sarf') ==2){
                    $details['harka_id'] = 5;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¥ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢';
                }elseif($this->input->post('pay_method_sarf') ==3){
                    $details['harka_id'] = 8;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢';
                }elseif($this->input->post('pay_method_sarf') ==4){
                    $details['harka_id'] = 8;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¾ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ¢ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¸ط·آ·ط¢آ·ط·آ¢ط¢آ¦ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â‚¬â€چط¢آ¢';
                }
                $this->db->insert('finance_quods_details', $details);
            }

                   if($this->input->post('pay_method_sarf') ==4){
                       for ($a = 0; $a < $count; $a++) {
                           $details['qued_rkm_fk'] = $last_quod_num;
                           $details['maden'] = 0;
                           //   $details['dayen'] = $this->input->post('total_value');
                           $details['dayen'] = $maden_value[$a];
                           $details['byan'] = $dayen_byan;
                           $details['marg3'] = $sanad_id;
                           if($_POST['pay_method_sarf'] != 3){
                               $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                               $details['hesab_name'] = $this->input->post('box_name');
                           }
                           if($_POST['pay_method_sarf'] == 3){
                               $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                               $details['hesab_name'] = $this->input->post('sheek_bank_name');
                           }
                           if($_POST['pay_method_sarf'] == 4){
                               $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                               $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                           }
                           $details['date'] = strtotime($this->input->post('date_sanad'));
                           $details['date_ar'] = ($this->input->post('date_sanad'));
                           $this->db->insert('finance_quods_details', $details);
                       }
                   }else{
                       $details['qued_rkm_fk'] = $last_quod_num;
                       $details['maden'] = 0;

                       $details['dayen'] = $this->input->post('total_value');
                       $details['marg3'] = $sanad_id;
                       if($_POST['pay_method_sarf'] != 3){
                           $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                           $details['hesab_name'] = $this->input->post('box_name');
                       }
                       if($_POST['pay_method_sarf'] == 3){
                           $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                           $details['hesab_name'] = $this->input->post('sheek_bank_name');
                       }
                       if($_POST['pay_method_sarf'] == 4){
                           $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                           $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                       }
                       $details['byan'] =$dayen_byan;
                       $details['date'] = strtotime($this->input->post('date_sanad'));
                       $details['date_ar'] = ($this->input->post('date_sanad'));

                       $this->db->insert('finance_quods_details', $details);
                   }

        }
    }
*/
    
    
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

/*******************************************************/

public function getSettingById($id)
    {
        return $this->db->where('bank_id',$id)->get('finance_sheek_setting')->row_array();
    }

    public function getDataSheek($id)
    {
        return $this->db->select('finance_sanad_sarf.date_sanad_ar , finance_sanad_sarf.total_value,
              finance_sanad_sarf.person_name, finance_sanad_sarf.about, banks_settings.title AS bank_name,
              finance_sanad_sarf.cancel ,finance_sanad_sarf.cancel_reason
              ')
                        ->join('banks_settings','finance_sanad_sarf.sheek_bank_id=banks_settings.id')
                        ->where('finance_sanad_sarf.id',$id)
                        ->get('finance_sanad_sarf')
                        ->row_array();
    }
    
    
    

    public function selectAllBanks(){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd_sheek");
        $this->db->group_by("bank_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
               $data[] =$this->GetBankCode($row->bank_id_fk);
            }
            return $data;
        }else{
            return false;
        }
    }

    public function GetBankCode($id){
        $h = $this->db->get_where("banks_settings", array('id'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row()->code;
        }else{

            return false;

        }
    }
   public function get_all_pill_search($field,$valu){
        $this->db->select('*');
        $this->db->from('finance_sanad_sarf');
        if(!empty($valu)) {
            if ($field == 'person_name' ||  $field == 'about') {
        $a = str_replace('الا', 'الإ', $valu);
        $b = str_replace('ره', 'رة', $valu);
        $c=  str_replace('الإ', 'الا', $valu);
        $d=  str_replace('الا', 'الآ', $valu);
        $e=  str_replace('ا', 'أ', $valu);
        $f=  str_replace('ة', 'ه',$valu);
        $g=  str_replace('ه', 'ة', $valu);
        $h=  str_replace('ى', 'ي', $valu);
        $j=  str_replace('إ', 'أ', $valu);
                $this->db->or_like($field,$a, 'both');
                $this->db->or_like($field,$b, 'both');
                $this->db->or_like($field,$c, 'both');
                $this->db->or_like($field,$d, 'both');
                $this->db->or_like($field,$e, 'both');
                $this->db->or_like($field,$f, 'both');
                $this->db->or_like($field,$g, 'both');
                $this->db->or_like($field,$h, 'both');
                $this->db->or_like($field,$j, 'both');
                // $this->db->like($field, $valu , 'both');
            } else {
                $this->db->where($field, $valu);

            }
        }
        $query= $this->db->get();
        if ($query->num_rows()>0){
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i] = $row;

                $i++;
            }
            return $data ;
        }
        else{
            return false;
        }
    }


    public function getdetailsByarr($field,$valu){
        $this->db->select('*');
        $this->db->from("finance_sanad_sarf_details");

         $a = str_replace('الا', 'الإ', $valu);
        $b = str_replace('ره', 'رة', $valu);
        $c=  str_replace('الإ', 'الا', $valu);
        $d=  str_replace('الا', 'الآ', $valu);
        $e=  str_replace('ا', 'أ', $valu);
        $f=  str_replace('ة', 'ه',$valu);
        $g=  str_replace('ه', 'ة', $valu);
        $h=  str_replace('ى', 'ي', $valu);
        $j=  str_replace('إ', 'أ', $valu);
        $this->db->or_like($field,$a, 'both');
        $this->db->or_like($field,$b, 'both');
        $this->db->or_like($field,$c, 'both');
        $this->db->or_like($field,$d, 'both');
        $this->db->or_like($field,$e, 'both');
        $this->db->or_like($field,$f, 'both');
        $this->db->or_like($field,$g, 'both');
        $this->db->or_like($field,$h, 'both');
        $this->db->or_like($field,$j, 'both');
        //$this->db->like($field, $valu , 'both');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;

            foreach ($query->result() as $row){
                $data[$i] = $row;
                $details =$this->get_all_pill_search('rqm_sanad',$row->rqm_sanad_fk);

                $data[$i]->rqm_sanad = $details[0]->rqm_sanad;
                $data[$i]->person_name = $details[0]->person_name;
                $data[$i]->total_value = $row->value;
                $data[$i]->date_sanad_ar = $details[0]->date_sanad_ar;
                $data[$i]->pay_method = $details[0]->pay_method;

                $i++;
            }
            return $data ;




        }
        return false;

    }

    public function getsheekDetails($field,$valu){
        $this->db->select('*');
        $this->db->from("finance_sanad_sarf_sheek");
        $this->db->where($field, $valu);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row){
                $data[$i] = $row;
                $details =$this->get_all_pill_search('rqm_sanad',$row->rqm_sanad_id_fk);
                $data[$i]->rqm_sanad = $details[0]->rqm_sanad;
                $data[$i]->person_name = $details[0]->person_name;
                $data[$i]->total_value = $details[0]->total_value;
                $data[$i]->date_sanad_ar = $details[0]->date_sanad_ar;
                $data[$i]->pay_method = $details[0]->pay_method;
                $i++;
            }
            return $data ;
        }
        return false;

    }



   public function select_all($table, $grouby, $limit, $order_by, $order_by_desc_asc, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->group_by($grouby);
        $this->db->order_by($order_by, $order_by_desc_asc);
        $this->db->limit($limit);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

     public function findByRqm_sanad($rkm)
    {
        $sql = $this->db->select('finance_sanad_sarf.*, banks_settings.title AS bank_name')
            ->join('banks_settings','finance_sanad_sarf.sheek_bank_id=banks_settings.id','LEFT')
            ->where("finance_sanad_sarf.rqm_sanad",$rkm)
            ->get('finance_sanad_sarf');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            $data->delails = $this->getdetailsById($data->id);
            $data->sheek_data = $this->getfinance_sanad_sarf_sheek_data($data->rqm_sanad);
            return $data;
        }
        return false;
    }

/******************************************/

    public function select_gehat(){

        $query = $this->db->get('finance_gehat');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

    public function insert_geha(){
        $data['name'] = $this->input->post('title');
           $data['title']= $this->input->post('geha_title');
        $data['mob'] = $this->input->post('mob');
        $data['address'] = $this->input->post('address');
        $data['date'] =date("Y-m-d");
        $this->db->insert('finance_gehat', $data);
    }

    public function get_geha_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('finance_gehat');
        if ($query->num_rows() >0){
            return $query->row();
        }
        return false;
    }

    public function update_geah($id){


        $data['name']= $this->input->post('geha_title');
           $data['title']= $this->input->post('geha_title');
        $data['mob']= $this->input->post('mob');
        $data['address']= $this->input->post('address');
        $data['date']= date("Y-m-d");
        $this->db->where('id',$id);
        $this->db->update('finance_gehat',$data);
    }
    public function delete_geha($id){

        $this->db->where('id',$id);
        $this->db->delete('finance_gehat');
    }
    
    
    
    
    
public function change_condition_text(){


		 $data =$this->getSettingById($this->input->post('bank_id'));
  if(!empty($data)){
		 if(!empty($data['condition_text'])){
			 $title ='';
		 }else {
            $title ='لا يصرف إلا للمستفيد الأول';
		 }
	 }
		$update['condition_text'] = $title;

  $this->db->where('bank_id',$this->input->post('bank_id'));
		$this->db->update('finance_sheek_setting', $update);

}
/************************************************************/
    public function select_all_by_condition($where = false,$group = false)
    {
        $this->db->select('society_main_banks_account.*,banks_settings.id as banks_settings_id,banks_settings.title');
        $this->db->from('society_main_banks_account');
        $this->db->where($where);
        $this->db->group_by($group);
        $this->db->join("banks_settings","banks_settings.id=society_main_banks_account.bank_id_fk","left");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] =  $row;
                if($row->account_id_fk !=0){
                    $data[$x]->AccountName =  $this->GetAccountName($row->account_id_fk);
                }
                $x++;}
            return$data;
        }else{
            return 0;
        }


    }

    public function GetAccountName($id){

        $h = $this->db->get_where("society_main_banks_account", array('id'=>$id));
        if($h ->num_rows() > 0){
            return $h->row_array()['title'];
        }else{
            return 0;
        }


    }

/***********************************/
   public function get_emp_assigns($code){
        $h = $this->db->get_where("hr_egraat_emp_setting", array('job_title_code_fk'=>$code,'person_suspend'=>1));
        return $h->row_array()['person_private_name'];
    }  
    
    
         function get_current_signs($date = false,$job_title_code_fk)
    {
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        $date = date('Y').'-' . date('m', strtotime($date)) . '-' . date('d', strtotime($date));
        return $this->db->where('job_title_code_fk',$job_title_code_fk)->where('from_date_str <=', strtotime($date))->where('to_date_str >=', strtotime($date))->get('hr_egraat_emp_setting')->row_array()['person_private_name'];
    }
    
/******************************************************************************/

 /*  public function insert_update_sarf_family($id = false, $rkm = false, $rkm_sanad = false)
    {



        $mahder['approved'] =4;
        $this->db->where("id",$_POST['mahder_id']);
        $this->db->update('finance_sarf_order',$mahder);

        if ($this->input->post('pay_method_sarf') == 2) {
            $sheek_num = $this->input->post('sheek_num');
            $sheek_id = $this->input->post('sheek_id');
            $rkm_esal = $this->input->post('rkm_esal');
            $sheek_date = $this->input->post('sheek_date');
            $bank_id_fk = $this->input->post('bank_id_fk');

            if (!empty($sheek_num)) {
                for ($s = 0; $s < sizeof($sheek_num); $s++) {
                    $data_sheek['rqm_sanad_id_fk'] = $_POST['rqm_sanad'];
                    $data_sheek['sheek_num'] = $sheek_num[$s];
                    $data_sheek['sheek_date'] = strtotime($sheek_date[$s]);
                    $data_sheek['sheek_date_ar'] = $sheek_date[$s];
                    $data_sheek['bank_id_fk'] = $bank_id_fk[$s];
                    $data_sheek['bank_name'] = $this->getBankname($bank_id_fk[$s]);
//                    23-3-om
                    $data_sheek['rkm_esal'] = $rkm_esal[$s];
                    $data_sheek['from_id'] = $sheek_id[$s];
                    $this->update_sheek_statuse($rkm_esal[$s], $sheek_id[$s]);
                    $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);

                }
            }

        }elseif ($this->input->post('pay_method_sarf') == 3) {

            $data_sheek['rqm_sanad_id_fk'] = $_POST['rqm_sanad'];
            $data_sheek['sheek_num'] = $this->input->post('sheek_num_bank');
            $data_sheek['sheek_date'] = strtotime( $this->input->post('date_sanad'));
            $data_sheek['sheek_date_ar'] = $this->input->post('date_sanad');
            $data_sheek['bank_id_fk'] = $this->input->post('sheek_bank_id');
            $data_sheek['bank_name'] = $this->getBankname($this->input->post('sheek_bank_id'));

            $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);


        }

        $data['date_sanad_ar'] = $this->input->post('date_sanad');
        $data['date_sanad'] = strtotime($this->input->post('date_sanad'));
        $data['pay_method'] = $this->input->post('pay_method_sarf');
        $data['person_name'] = $this->input->post('person_name');
        $data['about'] = $this->input->post('about');
        $data['note'] = $this->input->post('note');
        $data['total_value'] = $this->input->post('total_value');

        $data['type'] = $this->input->post('type');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['person_id_fk'] = $this->input->post('person_id_fk');
        $data['person_mob'] = $this->input->post('person_mob');
        $data['box_rqm_hesab'] = $this->input->post('box_rqm_hesab');
        $data['box_name'] = $this->input->post('box_name');
        $data['sheek_bank_id'] = $this->input->post('sheek_bank_id');
        //  $data['sheek_bank_name'] = $this->input->post('sheek_bank_name');
        $data['sheek_rqm_hesab'] = $this->input->post('sheek_rqm_hesab');
        $data['sheek_num_bank'] = $this->input->post('sheek_num_bank');
        if ($this->input->post('pay_method_sarf') == 4){


            $data['bank_account_id_fk'] = $this->input->post('bank_account_id_fk');
            $data['bank_account_num'] = $this->input->post('bank_account_num');
            $data['sheek_bank_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));

            $data['type_paid'] = $this->input->post('type_paid');
        }else{
            $data['sheek_bank_name'] = $this->input->post('sheek_bank_name');
        }


        $var = time() + 5;
        if ($var == true) {
            $last_sanad_num = $this->getLastId(array('id!=' => 0)) + 1;
        }
        $var = time() + 5;
        if ($var == true) {
            $last_quod_num = $this->selectLastQuodId();
        }
        if ($id == false) {
        
            $data['rqm_sanad'] = $last_sanad_num;
            $data['rqm_quod'] = $last_quod_num;
            $data['date'] = strtotime(date('Y-m-d'));
            $data['date_s'] = time();
            $data['publisher'] = $_SESSION['user_id'];
            $this->db->insert('finance_sanad_sarf', $data);
            $last_id = $this->db->insert_id();
            $this->insert_Quods_Sarf_family($last_sanad_num, $last_quod_num);


            return $last_id;

        } else {


            if ($this->input->post('pay_method_sarf') == 2 ) {
//                25-3-om
                $this->db->where('rqm_sanad_id_fk', $_POST['rqm_sanad']);
                $this->db->delete('finance_sanad_sarf_sheek');


                if (!empty($sheek_num)) {
//25-3-om delete from here
                    for ($s = 0; $s < sizeof($sheek_num); $s++) {
                        $data_sheek['rqm_sanad_id_fk'] = $_POST['rqm_sanad'];
                        $data_sheek['sheek_num'] = $sheek_num[$s];
                        $data_sheek['sheek_date'] = strtotime($sheek_date[$s]);
                        $data_sheek['sheek_date_ar'] = $sheek_date[$s];
                        $data_sheek['bank_id_fk'] = $bank_id_fk[$s];
                        $data_sheek['bank_name'] = $this->getBankname($bank_id_fk[$s]);
//                        23-3-om
                        $data_sheek['rkm_esal'] = $rkm_esal[$s];
                        $data_sheek['from_id'] = $sheek_id[$s];
                        $this->update_sheek_statuse($rkm_esal[$s], $sheek_id[$s]);

                        $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);


                    }


                }


            }elseif ($this->input->post('pay_method_sarf') == 3) {

                $data_sheek['rqm_sanad_id_fk'] = $_POST['rqm_sanad'];
                $data_sheek['sheek_num'] = $this->input->post('sheek_num_bank');
                $data_sheek['sheek_date'] = strtotime( $this->input->post('date_sanad'));
                $data_sheek['sheek_date_ar'] = $this->input->post('date_sanad');
                $data_sheek['bank_id_fk'] = $this->input->post('sheek_bank_id');
                $data_sheek['bank_name'] = $this->getBankname($this->input->post('sheek_bank_id'));

                $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);


            }

            $this->db->where('id', $id);
            $this->db->update('finance_sanad_sarf', $data);


            $this->insert_Quods_Sarf_family($rkm_sanad, $rkm);
            return $id;
        }

    }
*/

  /*  public function insert_Quods_Sarf_family($sanad_id,$last_quod_num)
    {
        $this->db->where("rkm",$last_quod_num);
        $this->db->delete('finance_quods');
        $data['no3_qued'] = 6;
        $data['no3_qued_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬ع©ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ³ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¾';
        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬ع©ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â€ڑآ¬ط¹â€ ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¢ط¢آ¦ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¬ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ©';
        // $data['sanad_qbd_rkm_id'] = $sanad_id;
        $data['qued_date'] = strtotime($this->input->post('date_sanad'));
        $data['qued_date_ar'] = $this->input->post('date_sanad');
        $data['total_value'] = $this->input->post('total_value');

        $data['rkm'] = $last_quod_num;

        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);




        $data['date'] = date('Y-m-d');
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $this->db->insert('finance_quods', $data);



        //details
        $maden_byan= $_POST['about'];
        $dayen_byan=$_POST['sheek_num_bank'] .' '. $_POST['person_name'];


        if ($this->input->post('rqm_hesab')) {

            $this->db->where("qued_rkm_fk",$last_quod_num);
            $this->db->delete('finance_quods_details');


            $count = count($this->input->post('rqm_hesab'));
            $maden_value = $this->input->post('value');
            //  $dayen_value = $this->input->post('dayen_value');

            $byan = $this->input->post('byan');
//            $marg3 = $this->input->post('marg3');

            for ($i = 0; $i < $count; $i++) {
                $text =$_POST['byan'][$i];
                $post =explode('-',$text);
                $post =explode('ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¹ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ·ط£آ¢أ¢â€ڑآ¬ط·â€؛ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ°ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ© ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¨ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ·ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬ع©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¹ط·آ¢ط¢آ¾ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â€ڑآ¬ط¹â€ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ£ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ³ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ± ',$post[0]);
                $num= $post[1];
                if($count >1){
                    $num= $post[1];
                }else{
                    $num='';
                }

//                $details['sanad_qbd_rkm_id'] =  $sanad_id;
                $details['qued_rkm_fk'] =  $last_quod_num;
                if(!empty($id)){
                    $details['qued_rkm_fk'] = $id;
                }

                if (!empty($maden_value[$i])) {
                    $details['maden'] = $maden_value[$i];
                    //	$details['byan'] =$maden_byan;
                    $details['byan'] =$dayen_byan . ' '.$num .' ' .$maden_byan;
                } else {
                    $details['maden'] = 0;
                }
                if (!empty($dayen_value[$i])) {
                    $details['dayen'] = $dayen_value[$i];
                    $details['byan'] = $dayen_byan;
                } else {
                    $details['dayen'] = 0;
                }

                $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                //$details['byan'] = $byan[$i];
                $details['marg3'] = $sanad_id;

                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));
                if($this->input->post('pay_method_sarf') ==1){
                    $details['harka_id'] = 1;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¢ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط·آ¹أ¢â‚¬ع©ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹';
                }elseif($this->input->post('pay_method_sarf') ==2){
                    $details['harka_id'] = 5;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¥ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¯ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ§ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ¹ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¦ط£آ¢أ¢â€ڑآ¬أ¢â€‍آ¢';
                }elseif($this->input->post('pay_method_sarf') ==3){
                    $details['harka_id'] = 8;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آµط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ±ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¾ ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ´ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¦ط£آ¢أ¢â€ڑآ¬أ¢â€‍آ¢';
                }elseif($this->input->post('pay_method_sarf') ==4){
                    $details['harka_id'] = 6;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¹ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ­ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ«ط£آ¢أ¢â€ڑآ¬ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â€ڑآ¬ط¹â€ ';
                }



                $this->db->insert('finance_quods_details', $details);
            }



           

            if($this->input->post('pay_method_sarf') ==4){

               // for ($a = 0; $a < $count; $a++) {
                    $about ='ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¹ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ­ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ«ط£آ¢أ¢â€ڑآ¬ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â€ڑآ¬ط¹â€  '.$_POST['about'];
                    $details['qued_rkm_fk'] = $last_quod_num;
                    $details['maden'] = 0;
                    $details['dayen'] = $this->input->post('total_value');
                    $details['harka_id'] = 6;
                    $details['harka_name'] = 'ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¹ط·آ¢ط¢آ¾ط·آ·ط¢آ·ط·آ¢ط¢آ·ط·آ·ط¢آ¢ط·آ¢ط¢آ­ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ«ط£آ¢أ¢â€ڑآ¬ط¢آ ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ·ط¢آ¸ط·آ¢ط¢آ¹ط·آ·ط¢آ·ط·آ¢ط¢آ¸ط·آ£ط¢آ¢ط£آ¢أ¢â‚¬ع‘ط¢آ¬ط£آ¢أ¢â€ڑآ¬ط¹â€ ';
                    $details['byan'] = $about;
                    $details['marg3'] = $sanad_id;

                    if($_POST['pay_method_sarf'] == 4){
                        $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                        $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                    }
                    $details['date'] = strtotime($this->input->post('date_sanad'));
                    $details['date_ar'] = ($this->input->post('date_sanad'));

                    $this->db->insert('finance_quods_details', $details);

                //}

            }else{


                $details['qued_rkm_fk'] = $last_quod_num;
                $details['maden'] = 0;

                $details['dayen'] = $this->input->post('total_value');
                $details['marg3'] = $sanad_id;
                if($_POST['pay_method_sarf'] != 3){
                    $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                    $details['hesab_name'] = $this->input->post('box_name');
                }
                if($_POST['pay_method_sarf'] == 3){
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                    $details['hesab_name'] = $this->input->post('sheek_bank_name');
                }
                if($_POST['pay_method_sarf'] == 4){
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                    $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                }


                //  $details['byan'] = '';
                $details['byan'] =$dayen_byan;
                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));

                $this->db->insert('finance_quods_details', $details);
            }







        }
    }
*/


  public function insert_update_sarf_family($id = false, $rkm = false, $rkm_sanad = false)
    {


        /*echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        die;*/
        //update mahder
        $mahder['approved'] = 4;
        $this->db->where("id", $_POST['mahder_id']);
        $this->db->update('finance_sarf_order', $mahder);

        if ($this->input->post('pay_method_sarf') == 2) {
            $sheek_num = $this->input->post('sheek_num');
            $sheek_id = $this->input->post('sheek_id');
            $rkm_esal = $this->input->post('rkm_esal');
            $sheek_date = $this->input->post('sheek_date');
            $bank_id_fk = $this->input->post('bank_id_fk');

            if (!empty($sheek_num)) {
                for ($s = 0; $s < sizeof($sheek_num); $s++) {
                    $data_sheek['rqm_sanad_id_fk'] = $_POST['rqm_sanad'];
                    $data_sheek['sheek_num'] = $sheek_num[$s];
                    $data_sheek['sheek_date'] = strtotime($sheek_date[$s]);
                    $data_sheek['sheek_date_ar'] = $sheek_date[$s];
                    $data_sheek['bank_id_fk'] = $bank_id_fk[$s];
                    $data_sheek['bank_name'] = $this->getBankname($bank_id_fk[$s]);
//                    23-3-om
                    $data_sheek['rkm_esal'] = $rkm_esal[$s];
                    $data_sheek['from_id'] = $sheek_id[$s];
                    $this->update_sheek_statuse($rkm_esal[$s], $sheek_id[$s]);
                    $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);

                }
            }

        } elseif ($this->input->post('pay_method_sarf') == 3) {

            $data_sheek['rqm_sanad_id_fk'] = $_POST['rqm_sanad'];
            $data_sheek['sheek_num'] = $this->input->post('sheek_num_bank');
            $data_sheek['sheek_date'] = strtotime($this->input->post('date_sanad'));
            $data_sheek['sheek_date_ar'] = $this->input->post('date_sanad');
            $data_sheek['bank_id_fk'] = $this->input->post('sheek_bank_id');
            $data_sheek['bank_name'] = $this->getBankname($this->input->post('sheek_bank_id'));

            $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);


        }

        $data['date_sanad_ar'] = $this->input->post('date_sanad');
        $data['date_sanad'] = strtotime($this->input->post('date_sanad'));
        $data['pay_method'] = $this->input->post('pay_method_sarf');
        $data['person_name'] = $this->input->post('person_name');
        $data['about'] = $this->input->post('about');
        $data['note'] = $this->input->post('note');
        $data['total_value'] = $this->input->post('total_value');

        $data['type'] = $this->input->post('type');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['person_id_fk'] = $this->input->post('person_id_fk');
        $data['person_mob'] = $this->input->post('person_mob');
        $data['box_rqm_hesab'] = $this->input->post('box_rqm_hesab');
        $data['box_name'] = $this->input->post('box_name');
        $data['sheek_bank_id'] = $this->input->post('sheek_bank_id');
        //  $data['sheek_bank_name'] = $this->input->post('sheek_bank_name');
        $data['sheek_rqm_hesab'] = $this->input->post('sheek_rqm_hesab');
        $data['sheek_num_bank'] = $this->input->post('sheek_num_bank');
        if ($this->input->post('pay_method_sarf') == 4) {


            $data['bank_account_id_fk'] = $this->input->post('bank_account_id_fk');
            $data['bank_account_num'] = $this->input->post('bank_account_num');
            $data['sheek_bank_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));

            $data['type_paid'] = $this->input->post('type_paid');
        } else {
            $data['sheek_bank_name'] = $this->input->post('sheek_bank_name');
        }


        $var = time() + 5;
        if ($var == true) {
            $last_sanad_num = $this->getLastId(array('id!=' => 0)) + 1;
        }
        $var = time() + 5;
        if ($var == true) {
            $last_quod_num = $this->selectLastQuodId();
        }
        if ($id == false) {
            /* echo "<pre>";
             print_r($data);
             echo "</pre>";
             die;*/
            $data['rqm_sanad'] = $last_sanad_num;
            $data['rqm_quod'] = $last_quod_num;
            $data['date'] = strtotime(date('Y-m-d'));
            $data['date_s'] = time();
            $data['publisher'] = $_SESSION['user_id'];
            $this->db->insert('finance_sanad_sarf', $data);
            $last_id = $this->db->insert_id();
            $this->insert_Quods_Sarf_family($last_sanad_num, $last_quod_num);


            return $last_id;

        } else {


            if ($this->input->post('pay_method_sarf') == 2) {
//                25-3-om
                $this->db->where('rqm_sanad_id_fk', $_POST['rqm_sanad']);
                $this->db->delete('finance_sanad_sarf_sheek');


                if (!empty($sheek_num)) {
//25-3-om delete from here
                    for ($s = 0; $s < sizeof($sheek_num); $s++) {
                        $data_sheek['rqm_sanad_id_fk'] = $_POST['rqm_sanad'];
                        $data_sheek['sheek_num'] = $sheek_num[$s];
                        $data_sheek['sheek_date'] = strtotime($sheek_date[$s]);
                        $data_sheek['sheek_date_ar'] = $sheek_date[$s];
                        $data_sheek['bank_id_fk'] = $bank_id_fk[$s];
                        $data_sheek['bank_name'] = $this->getBankname($bank_id_fk[$s]);
//                        23-3-om
                        $data_sheek['rkm_esal'] = $rkm_esal[$s];
                        $data_sheek['from_id'] = $sheek_id[$s];
                        $this->update_sheek_statuse($rkm_esal[$s], $sheek_id[$s]);

                        $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);


                    }


                }


            } elseif ($this->input->post('pay_method_sarf') == 3) {

                $data_sheek['rqm_sanad_id_fk'] = $_POST['rqm_sanad'];
                $data_sheek['sheek_num'] = $this->input->post('sheek_num_bank');
                $data_sheek['sheek_date'] = strtotime($this->input->post('date_sanad'));
                $data_sheek['sheek_date_ar'] = $this->input->post('date_sanad');
                $data_sheek['bank_id_fk'] = $this->input->post('sheek_bank_id');
                $data_sheek['bank_name'] = $this->getBankname($this->input->post('sheek_bank_id'));

                $this->db->insert('finance_sanad_sarf_sheek', $data_sheek);


            }

            $this->db->where('id', $id);
            $this->db->update('finance_sanad_sarf', $data);


            $this->insert_Quods_Sarf_family($rkm_sanad, $rkm);
            return $id;
        }

    }
    public function insert_Quods_Sarf_family($sanad_id, $last_quod_num)
    {
        $this->db->where("rkm", $last_quod_num);
        $this->db->delete('finance_quods');
        $data['no3_qued'] = 6;
         $data['no3_qued_name'] = 'قيد سند صرف';
        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = 'قيد المراجعة';
        // $data['sanad_qbd_rkm_id'] = $sanad_id;
        $data['qued_date'] = strtotime($this->input->post('date_sanad'));
        $data['qued_date_ar'] = $this->input->post('date_sanad');
        $data['total_value'] = $this->input->post('total_value');

        $data['rkm'] = $last_quod_num;

        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);


        $data['date'] = date('Y-m-d');
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $this->db->insert('finance_quods', $data);


        //details
        $maden_byan = $_POST['about'];
        $dayen_byan = $_POST['sheek_num_bank'] . ' ' . $_POST['person_name'];


        if ($this->input->post('rqm_hesab')) {

            $this->db->where("qued_rkm_fk", $last_quod_num);
            $this->db->delete('finance_quods_details');


            $count = count($this->input->post('rqm_hesab'));
            $maden_value = $this->input->post('value');
            //  $dayen_value = $this->input->post('dayen_value');

            $byan = $this->input->post('byan');
//            $marg3 = $this->input->post('marg3');

            for ($i = 0; $i < $count; $i++) {
                $text = $_POST['byan'][$i];
                if ($count > 1) {
                    $post = explode('-', $text);
                   $post = explode('تغذية بطاقات الأسر ', $post[0]);
                    $num = $post[1];
                } else {
                    $num = '';
                }

//                $details['sanad_qbd_rkm_id'] =  $sanad_id;
                $details['qued_rkm_fk'] = $last_quod_num;
                if (!empty($id)) {
                    $details['qued_rkm_fk'] = $id;
                }

                if (!empty($maden_value[$i])) {
                    $details['maden'] = $maden_value[$i];
                    //	$details['byan'] =$maden_byan;
                    $details['byan'] = $dayen_byan . ' ' . $num . ' ' . $maden_byan;
                } else {
                    $details['maden'] = 0;
                }
                if (!empty($dayen_value[$i])) {
                    $details['dayen'] = $dayen_value[$i];
                    $details['byan'] = $dayen_byan;
                } else {
                    $details['dayen'] = 0;
                }

                $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                //$details['byan'] = $byan[$i];
                $details['marg3'] = $sanad_id;

                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));
                if ($this->input->post('pay_method_sarf') == 1) {
                    $details['harka_id'] = 1;
                   $details['harka_name'] = 'نقدي';
                } elseif ($this->input->post('pay_method_sarf') == 2) {
                    $details['harka_id'] = 5;
                  $details['harka_name'] = 'إيداع شيك';
                } elseif ($this->input->post('pay_method_sarf') == 3) {
                    $details['harka_id'] = 8;
                     $details['harka_name'] = 'صرف شيك';
                } elseif ($this->input->post('pay_method_sarf') == 4) {
                    $details['harka_id'] = 6;
                     $details['harka_name'] = 'تحويل';
                }


                $this->db->insert('finance_quods_details', $details);
            }


            /************************************************************/

            if ($this->input->post('pay_method_sarf') == 4) {

                // for ($a = 0; $a < $count; $a++) {
                 $about = 'تحويل ' . $_POST['about'];
                $details['qued_rkm_fk'] = $last_quod_num;
                $details['maden'] = 0;
                $details['dayen'] = $this->input->post('total_value');
                $details['harka_id'] = 6;
               $details['harka_name'] = 'تحويل';
                $details['byan'] = $about;
                $details['marg3'] = $sanad_id;

                if ($_POST['pay_method_sarf'] == 4) {
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                    $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                }
                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));

                $this->db->insert('finance_quods_details', $details);

                //}

            } else {


                $details['qued_rkm_fk'] = $last_quod_num;
                $details['maden'] = 0;

                $details['dayen'] = $this->input->post('total_value');
                $details['marg3'] = $sanad_id;
                if ($_POST['pay_method_sarf'] != 3) {
                    $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                    $details['hesab_name'] = $this->input->post('box_name');
                }
                if ($_POST['pay_method_sarf'] == 3) {
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                    $details['hesab_name'] = $this->input->post('sheek_bank_name');
                }
                if ($_POST['pay_method_sarf'] == 4) {
                    $details['rkm_hesab'] = $this->input->post('sheek_rqm_hesab');
                    $details['hesab_name'] = $this->GetBankName($this->input->post('sheek_bank_id'));
                }


                //  $details['byan'] = '';
                $details['byan'] = $dayen_byan;
                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));

                $this->db->insert('finance_quods_details', $details);
            }


        }
    }
    
    
 function cancel_sheek()
{
    $rqm_quod = $this->input->post('rqm_quod');
    $sanad_id = $this->input->post('sanad_id');
    $rqm_sanad = $this->input->post('rqm_sanad');
    
  //  $cancel = $this->input->post('cancel');
    $cancel = 'yes';
    $cancel_reason = $this->input->post('cancel_reason');

    /*finance_sanad_sarf_sheek -- finance_sanad_sarf_details -- finance_sanad_sarf -- finance_quods --finance_quods_details*/

    $this->db->where('id', $sanad_id)->update('finance_sanad_sarf', array('total_value' => 0, 'cancel_reason' => $cancel_reason, "cancel" => $cancel));
    $this->db->where('rkm', $rqm_quod)->update('finance_quods', array('total_value' => 0, 'cancel_reason' => $cancel_reason, "cancel" => $cancel));
    $this->db->where('rqm_sanad_fk', $sanad_id)->update('finance_sanad_sarf_details', array('value' => 0));
    $this->db->where('qued_rkm_fk', $rqm_quod)->update('finance_quods_details', array('maden' => 0 ,'dayen'=> 0));
    $this->db->where('rqm_sanad_id_fk', $rqm_sanad)->update('finance_sanad_sarf_sheek', array('canceled' => 1 ,
                                                                                               'time_cancel'    => date('h:i A'),
                                                                                               'date_cancel'   =>date('Y-m-d'),
                                                                                               'person_cancel'   => $_SESSION['user_id']
                                                                                               ));
   /* if ($cancel == 'yes') {
        $this->db->where('rqm_sanad_id_fk', $sanad_id)->update('finance_sanad_sarf_sheek', array('canceled' => 1)); $this->getUserName($_SESSION['user_id']);
    }*/
    
}     
    
    
}

/* End of file Vouch_sarf_model.php */
/* Location: ./application/models/finance_accounting_model/box/vouch_sarf/Vouch_sarf_model.php */