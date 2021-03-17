<?php

class Mail extends CI_Controller
{
 
              public function tests(){ //Email_send/new_send
    $this->load->library('email');
 //  $this->load->library('session');
 //   $this->load->helper(array('form'));
	$user_email="it.alatheertech@gmail.com";
   // $user_email = "mosad.elsayed@gmail.com ";
   $subject = 'السلام عليكم ';
            $config = Array(        
                'protocol' => 'sendmail',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'it.abna463@gmail.com',
                'smtp_pass' => '0553851919',
                'smtp_timeout' => '7',
                'mailtype'  => 'html', 
                'charset'   => 'utf-8',
                'wordwrap' => TRUE,
                'validation' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_header('Content-type', 'text/html');

            $this->email->from('it.abna463@gmail.com', 'Company name ');
          /*  $data = array(
                 'message'=> $this->input->post('message'),
                 'to'=>$user_email
                     );*/
            $this->email->to($user_email);  
            $this->email->subject($subject); 

          //  $body = $this->load->view('forget_v/test',$data,TRUE);
            $this->email->message("أهلا بك في جمعية أبناء");   
            $this->email->send();   
    
    echo $this->email->print_debugger();
    
   }   
//mosad.elsayed@gmail.com       
       public function testmail(){   
    $this->load->library('email');

$config['protocol']    = 'mail';
$config['smtp_host']    = 'ssl://smtp.gmail.com';
$config['smtp_port']    = '465';
$config['smtp_timeout'] = '7';
$config['smtp_user']    = 'it.abna463@gmail.com';
$config['smtp_pass']    = '0553851919';
$config['charset']    = 'utf-8';
$config['newline']    = "\r\n";
$config['mailtype'] = 'text'; // or html
$config['validation'] = TRUE; // bool whether to validate email or not      

$this->email->initialize($config);

$this->email->from('it.abna463@gmail.com', 'sender_name');
$this->email->to('it.alatheertech@gmail.com'); 
$this->email->subject('Hi');
$this->email->message('Testing the email class.');  

$this->email->send();

echo $this->email->print_debugger();
}

           public function active_account2(){ //Email_send/new_send
    $this->load->library('email');
    $this->load->library('session');
    $this->load->helper(array('form'));
	$user_email = "it.alatheertech@gmail.com";
    $randomDigits = "567";
   $subject = 'New message.';
            $config = Array(        
                'protocol' => 'mail',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'msg@kabboot.com',
                'smtp_pass' => '!@#msg',
                'smtp_timeout' => '7',
                'mailtype'  => 'text', 
                'charset'   => 'utf-8',
                'wordwrap' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_header('Content-type', 'text/html');

            $this->email->from('msg@kabboot.com', 'Company name ');
            $data = array(
                 'message'=> $this->input->post('message'),
                 'to'=>$user_email,
                 'confirm_code'=>$randomDigits
                     );
            $this->email->to($user_email);  
            $this->email->subject($subject); 

           // $body = $this->load->view('forget_v/test',$data,TRUE);
            $this->email->message("sssssssssssssssss");   
            $this->email->send();   
    
    
    
   }
          public function active_account(){ //Email_send/new_send
    $this->load->library('email');
    $this->load->library('session');
    $this->load->helper(array('form'));
	$user_email = "it.alatheertech@gmail.com";
    $randomDigits = "567";
   $subject = 'New message.';
            $config = Array(        
                'protocol' => 'ssmtp',
                'smtp_host' => 'ssl://ssmtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'tgrealstate2020@gmail.com',
                'smtp_pass' => '20202020tg',
                'smtp_timeout' => '7',
                'mailtype'  => 'html', 
                'charset'   => 'utf-8',
                'wordwrap' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_header('Content-type', 'text/html');

            $this->email->from('tgrealstate2020@gmail.com', 'Company name ');
            $data = array(
                 'message'=> $this->input->post('message'),
                 'to'=>$user_email,
                 'confirm_code'=>$randomDigits
                     );
            $this->email->to($user_email);  
            $this->email->subject($subject); 

           // $body = $this->load->view('forget_v/test',$data,TRUE);
            $this->email->message("sssssssssssssssss");   
            $this->email->send();   
    
    
    
   }
   
   
          function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
       //$mail->isSMTP();
        $mail->isSendmail();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tgrealstate2020@gmail.com';
        $mail->Password = '20202020tg';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('tgrealstate2020@gmail.com', 'CodexWorld');
        $mail->addReplyTo('it.alatheertech@gmail.com', 'CodexWorld');
        
        // Add a recipient
        $mail->addAddress('it.alatheertech@gmail.com');
        
        // Add cc or bcc 
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }
    
}