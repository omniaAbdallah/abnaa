<?php

/**
 * Created by PhpStorm.
 * User: DASH
 * Date: 27/11/16
 * Time: 03:17 م
 */
class Test extends MY_Controller
{
function __construct()
{
    parent::__construct();
    //$this->load->library('encrypt');
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
}
public function index(){
    //BCrypt
 /*   $encrypt= $this->encrypt->encode('123');
    echo $encrypt;
    echo "</br>";
    $dcrypt= $this->encrypt->decode('Mex59hK3sUjyC5B8nWCpDwoEeNE9dmDZRxSmaINKgLsKujtpsZAHc2qLjHx6qtNwGrNY92oUaAZL9lh1zWF5Rw==');
    echo $dcrypt;*/
    $plain_text = '123';
    $ciphertext = $this->encryption->encrypt($plain_text);
echo $ciphertext;
    echo "</br>";

// Outputs: This is a plain-text message!
    echo $this->encryption->decrypt($ciphertext);


//$this->load->view('index');
}
    public function trycode(){

        /*  $data['result']=array('A1'=>'hesham','B1'=>'Ibrahem','C1'=>'tatawy');

          foreach( $data['result'] as $key =>$value){

              echo  $key.'=>'.$value;

          }*/

        $coulmnstyle=range('A','Z');

        foreach($coulmnstyle as $value){

            echo $value;

        }

        //print_r($coulmnstyle);

    }
    public function testtext(){
        $string = "Here is a nice text string consisting of eleven words.";
        //$string = word_limiter($string, 6);
        //$string = word_limiter($string, 6);
        //$string = character_limiter($string, 20);
        //$string = highlight_code($string);
        echo highlight_phrase($string, "nice text", '<span style="color:#00CC00;">', '</span>');

        // echo $string;

    }
    
    /*****************************************/
    
     public function all_q(){ //Test/all_q
   $this->load->model('Testm');
    $data['records'] = $this->Testm->select_all_q();

        $data['subview'] = 'admin/test/all_q';
        $this->load->view('admin_index', $data); 
    }    
    
    
         public function all_qq(){ //Test/all_q
   $this->load->model('Testm');
    $data['records'] = $this->Testm->select_all_qq();

        $data['subview'] = 'admin/test/all_qq';
        $this->load->view('admin_index', $data); 
    }   
    
           public function all_qqq(){ //Test/all_q
   $this->load->model('Testm');
    $data['records'] = $this->Testm->select_all_qqq();

        $data['subview'] = 'admin/test/all_qqq';
        $this->load->view('admin_index', $data); 
    }    

}