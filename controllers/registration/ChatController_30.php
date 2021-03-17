<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ChatController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('main_data/Model_main_data');
        $this->load->model('main_data/Model_data_web');
        $this->load->model('Public_relations/website/about_us/About_us_model', 'about_us');
        $this->load->model('Public_relations/website/shoraka_models/Shoraka_model', 'Shoraka');
        $this->pages_data = $this->about_us->pages_web();
        $this->web_shoraka = $this->Shoraka->selet_webshoraka();
        $this->soeials = $this->Model_main_data->select_all_soeial();
        $this->main_data = $this->Model_main_data->select_main_data();
        $this->web_display = $this->Model_data_web->select();
		$this->load->model(['registration_models/ChatModel','registration_models/OuthModel','registration_models/UserModel']);
      //  $this->load->model('registration_models/Money');
    }
	
			public function read_file($file_name)

			{

				$this->load->helper('file');

				$file_path ='uploads/attachment/'.$file_name;

			//	header('Content-Type: application/pdf');

				header('Content-Discription:inline; filename="'.$file_name.'"');

				header('Content-Transfer-Encoding: binary');

				header('Accept-Ranges:bytes');

				header('Content-Length: ' . filesize($file_path));

				readfile($file_path);

		

			}

	

		   function donwload($file_name){

			$this->load->helper('download');

			$data = file_get_contents('uploads/attachment/'.$file_name);

			force_download($file_name,$data);

			}

			public function download_file($file_name)

			{

				$this->load->helper('download');

				$type = pathinfo($file_name)['extension'];

				$data = file_get_contents('uploads/attachment/' . $file_name);

				$name=$file_name.'.'.$type;// for arabic name

				force_download($name, $data);

			}

	

		public function index(){

			//print_r($_SESSION);
			if (isset($_SESSION['mother_national_num'])){
				$data['strTitle']='';

			$data['strsubTitle']='';

			$list=[];

			

				$list = $this->UserModel->ClientsListCs();

				$data['strTitle']='الموظفين المتصلين';

				$data['strsubTitle']='موظف';

				$data['chatTitle']=' اختر موظف للتواصل';

	

			

			$vendorslist=[];

			foreach($list as $u){

			

				$vendorslist[]=

				[

					'user_id' => $this->OuthModel->Encryptor('encrypt', $u['user_id']),

					'user_id_notifiy'=>$u['user_id'],

					'online'=>$u['online'],

					'user_name'=>$this->UserModel->NameById($u['user_id']),

					'picture_url' => $this->UserModel->PictureUrlById($u['user_id']),

				];

			}

			$data['vendorslist']=$vendorslist;

			

			

			// $this->load->view('admin/all_secretary_view/chating/construction_services/chat_template',$data);



			$data['subview'] = 'web/registration_views/chating/construction_services/chat_template';



			$this->load->view('web_index', $data);
				
				}
				else{
					redirect('registration/Family/family_login','refresh');
				}
			

		}

	

	
	
	public function send_text_message()//registration/ChatController

	{

		$post = $this->input->post();

		$messageTxt='NULL';

		$attachment_name='';

		$file_ext='';

		$mime_type='';

		

		if(isset($post['type'])=='Attachment'){ 

		 	$AttachmentData = $this->ChatAttachmentUpload();

			//print_r($AttachmentData);

			$attachment_name = $AttachmentData['file_name'];

			$file_ext = $AttachmentData['file_ext'];

			$mime_type = $AttachmentData['file_type'];

			 

		}else{

			$messageTxt = $post['messageTxt'];

		}	

		 

				$data=[

 					'sender_id' =>$_SESSION['mother_national_num'],

					'receiver_id' => $this->OuthModel->Encryptor('decrypt', $post['receiver_id']),

					'message' =>   $messageTxt,

					'attachment_name' => $attachment_name,

					'file_ext' => $file_ext,

					'mime_type' => $mime_type,

					'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm

					'ip_address' => $this->input->ip_address(),

				];

		  

 				$query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data)); 

 				$response='';

				if($query == true){

					$response = ['status' => 1 ,'message' => '' ];

				}else{

					$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];

				}

             

 		   echo json_encode($response);

	}

	public function ChatAttachmentUpload(){

		 

		

		$file_data='';

		if(isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])){	

				$config['upload_path']          = './uploads/attachment';

			//	$config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';

   	          $config['allowed_types']        = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

				//$config['max_size']             = 500;

				//$config['max_width']            = 1024;

				//$config['max_height']           = 768;

				 $config['overwrite'] = true;

               $config['encrypt_name']=true;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('attachmentfile'))

				{

					echo json_encode(['status' => 0,

					'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;

				}

				else

				{

					$file_data = $this->upload->data();

					//$filePath = $file_data['file_name'];

					return $file_data;

				}

		    }

 		 

	}

	

/*	public function get_chat_history_by_vendor(){

		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );

		

		$Logged_sender_id =$_SESSION['user_id'];

		 

		$history = $this->ChatModel->GetReciverChatHistory($receiver_id);

		//print_r($history);

		foreach($history as $chat):

			

			$message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);

			$sender_id = $chat['sender_id'];

			$userName = $this->UserModel->GetName($chat['sender_id']);

			$userPic = $this->UserModel->PictureUrlById($chat['sender_id']);

			

			$message = $chat['message'];

			$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));

			

 		?>

        	<?php

				$messageBody='';

            	if($message=='NULL'){ //fetach media objects like images,pdf,documents etc

					$classBtn = 'right';

					if($Logged_sender_id==$sender_id){$classBtn = 'left';}

					

					$attachment_name = $chat['attachment_name'];

					$file_ext = $chat['file_ext'];

					$mime_type = explode('/',$chat['mime_type']);

					

					$document_url = base_url('uploads/attachment/'.$attachment_name);

					

				  if($mime_type[0]=='image'){

 					$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';	

				  }else{

					$messageBody='';

					 $messageBody.='<div class="attachment">';

                          $messageBody.='<h4>Attachments:</h4>';

                           $messageBody.='<p class="filename">';

                            $messageBody.= $attachment_name;

                          $messageBody.='</p>';

        

                          $messageBody.='<div class="pull-'.$classBtn.'">';

                           // $messageBody.='<a download href="'.$document_url.'"><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';

                          		$messageBody.='<a download href="'. base_url() .'all_secretary/chat/s/ChatController/download_file/'. $attachment_name.' "

							><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">تنزيل</button></a>';

                          

                          $messageBody.='</div>';

                        $messageBody.='</div>';

					}

						

											

				}else{

					$messageBody = $message;

				}

			?>

            

            

        

             <?php if($Logged_sender_id!=$sender_id){?>     

                  <!-- Message. Default to the left -->

                    <div class="direct-chat-msg">

                      <div class="direct-chat-info clearfix">

                        <span class="direct-chat-name pull-left"><?=$userName;?></span>

                        <span class="direct-chat-timestamp pull-right"><?=$messagedatetime;?></span>

                      </div>

                      <!-- /.direct-chat-info -->

                      <img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">

                      <!-- /.direct-chat-img -->

                      <div class="direct-chat-text">

                         <?=$messageBody;?>

                      </div>

                      <!-- /.direct-chat-text -->

                      

                    </div>

                    <!-- /.direct-chat-msg -->

			<?php }else{?>

                    <!-- Message to the right -->

                    <div class="direct-chat-msg right">

                      <div class="direct-chat-info clearfix">

                        <span class="direct-chat-name pull-right"><?=$userName;?></span>

                        <span class="direct-chat-timestamp pull-left"><?=$messagedatetime;?></span>

                      </div>

                      <!-- /.direct-chat-info -->

                      <img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">

                      <!-- /.direct-chat-img -->

                      <div class="direct-chat-text">

                      	<?=$messageBody;?>

                          	<!--<div class="spiner">

                             	<i class="fa fa-circle-o-notch fa-spin"></i>

                            </div>-->

                       </div>

                       <!-- /.direct-chat-text -->

                    </div>

                    <!-- /.direct-chat-msg -->

             <?php }?>

        

        <?php

		endforeach;

 		

	}

    */

    

    

    	public function get_chat_history_by_vendor(){

		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );



		$Logged_sender_id =$_SESSION['mother_national_num'];



		$history = $this->ChatModel->GetReciverChatHistory($receiver_id);

		//print_r($history);

		foreach($history as $chat):



			$message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);

			$sender_id = $chat['sender_id'];

			$userName = $this->UserModel->GetName($chat['sender_id']);

			$userPic = $this->UserModel->PictureUrlById($chat['sender_id']);



			$message = $chat['message'];

			$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));



 		?>

        	<?php

				$messageBody='';

            	if($message=='NULL'){ //fetach media objects like images,pdf,documents etc

					$classBtn = 'right';

					if($Logged_sender_id==$sender_id){$classBtn = 'left';}



					$attachment_name = $chat['attachment_name'];

					$file_ext = $chat['file_ext'];

					$mime_type = explode('/',$chat['mime_type']);



					$document_url = base_url('uploads/attachment/'.$attachment_name);



				  if($mime_type[0]=='image'){

 					$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';

				  }else{

                      switch (pathinfo($attachment_name)['extension']) {

                          case 'doc':

                          case 'docx':

                              $extin = 'word';

                              break;

                          case 'xls':

                          case 'xlsx':

                              $extin = 'excel';

                              break;

                          case 'PDF':

                          case 'pdf':

                              $extin = 'pdf';

                              break;

                          case 'txt':

                              $extin = 'text';

                              break;

                          case 'rar':

                          case 'zip':

                          case 'tar.gz':

                          case 'gz':

                              $extin = 'archive';

                              break;

                          default:

                              $extin = '';

                              break;



                      }

					$messageBody='';

					 $messageBody.='<div id="mail" class="text-center"><div class="attachment">';

                          $messageBody.='<div class="attach" title="attachment">';

                           $messageBody.='<p><i class="fa fa-file-'.$extin.'-o"></i> ';

                            $messageBody.= ' '.$attachment_name;

                          $messageBody.='';



						  $messageBody.='';

						  $messageBody.='<a target="_blank" Download  href="'.base_url()."all_secretary/chat/s/ChatController/donwload/".$attachment_name.'"> <i class="fa fa-eye" id="'.$message_id.'" ></i> </a>';

                        //  $messageBody.='<a   href="'.$document_url.'"> <i class="fa fa-upload" id="'.$message_id.'" ></i> </a>';

                          $messageBody.='</p></div>';

                        $messageBody.='</div></div>';

					}





				}else{

					$messageBody = $message;

				}

			?>







             <?php if($Logged_sender_id!=$sender_id){?>

                  <!-- Message. Default to the left -->

                    <div class="direct-chat-msg">

                      <div class="direct-chat-info clearfix">

                        <span class="direct-chat-name pull-left"><?=$userName;?></span>

                        <span class="direct-chat-timestamp pull-right"><?=$messagedatetime;?></span>

                      </div>

                      <!-- /.direct-chat-info -->

                      <img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">

                      <!-- /.direct-chat-img -->

                      <div class="direct-chat-text">

                         <?=$messageBody;?>

                      </div>

                      <!-- /.direct-chat-text -->



                    </div>

                    <!-- /.direct-chat-msg -->

			<?php }else{?>

                    <!-- Message to the right -->

                    <div class="direct-chat-msg right">

                      <div class="direct-chat-info clearfix">

                        <span class="direct-chat-name pull-right"><?=$userName;?></span>

                        <span class="direct-chat-timestamp pull-left"><?=$messagedatetime;?></span>

                      </div>

                      <!-- /.direct-chat-info -->

                     <img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>"> 

                      <!-- /.direct-chat-img -->

                      <div class="direct-chat-text">

                      	<?=$messageBody;?>

                          	<!--<div class="spiner">

                             	<i class="fa fa-circle-o-notch fa-spin"></i>

                            </div>-->

                       </div>

                       <!-- /.direct-chat-text -->

                    </div>

                    <!-- /.direct-chat-msg -->

             <?php }?>



        <?php

		endforeach;



	}



	public function chat_clear_client_cs(){

		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );

		

		$messagelist = $this->ChatModel->GetReciverMessageList($receiver_id);

		

		foreach($messagelist as $row){

			

			if($row['message']=='NULL'){

				$attachment_name = unlink('uploads/attachment/'.$row['attachment_name']);

			}

 		}

		

		$this->ChatModel->TrashById($receiver_id); 

 

 		

	}

	/////////////////////////////////notification////////////////////

	public function get_tot_chat()

    {

        $tot = $this->ChatModel->total_rows();

        $result['tot_chat'] = $tot;

		$msg = $this->ChatModel->get_new_chat();

        $result['msg_chat'] = $msg;

        echo json_encode($result);

	}

	

 

    public function update_seen_chat()

    {

		$id= $this->input->get('id');

        $this->ChatModel->update_seen_chat($id);

    }



		

}