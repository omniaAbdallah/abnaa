<?php
function sms($message,$numpersid){
    $sms_sender_name="HESHAM";
    $sms_user_name="heshamtatawy";
    $sms_password="tatawy_hesham_@321";
    if (is_array($numpersid)){
    	$filterdarray=array_filter($numpersid);
        $numpers=join(',',$filterdarray);
    }else{
        $numpers =$numpersid;
    }
    $url = "https://sms.gateway.sa/api/sendsms.php?username=$sms_user_name&password=$sms_password&message=$message&numbers=$numpers&sender=$sms_sender_name&unicode=e&return=xml&hangedBalance=true";
    /*    $string = file_get_contents($url);
    $json = json_decode($string, true);
return $json;*/
    $dom = new DOMDocument();
   return $dom->load($url);
    /**
     * Array
    (
    [Code] => 100
    [MessageIs] => تم استلام الارقام بنجاح
    [valid] => 966539044145
    [nvalid] =>
    [Blocked] =>
    [Repeated] =>
    [lastuserpoints] => 46
    [SMSNUmber] => 1
    [totalcout] => 1
    [currentuserpoints] => 45
    [totalsentnumbers] => 1
    )
     */
}
function checkphonenomper($phone){
    if (preg_match('#^05#', $phone) === 1 ) {
        $array = explode('0', $phone, 2);
        //  print_r($array);
        return '966'.$array[1];
    }elseif (preg_match('#^5#', $phone) === 1) {
        return '966'.$phone;
    }elseif (preg_match('#^009665#', $phone) === 1) {
	    $array = explode('009665', $phone, 2);
	    //  print_r($array);
	    return '966'.$array[1];
    }
    else {
        return $phone;
    }

}
