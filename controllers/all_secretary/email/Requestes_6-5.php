<?php

class Requestes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('all_secretary_models/email/Email');
        $this->load->model('all_secretary_models/email/ReplayModel');
        $this->load->library("pagination");
    }

    public function my_emails()
    {
        $this->update_seen_email();
        $data['my_email'] = $this->Email->select_all_my_email(array('id>' => 0));
        $data['title'] = 'البريد الوارد';
        $data['page']=1;
        $this->load->view('admin/all_secretary_view/email/message', $data);
    }

    public function update_seen_email()
    {
        $this->Email->update_seen_messages();
    }

    public function my_sent_emails()
    {
        $data['title'] = 'البريد المرسل';
        $data['my_email'] = $this->Email->select_all_my_sent_email();
        $this->load->view('admin/all_secretary_view/email/my_message', $data);
    }

    public function my_deleted_emails()
    {
        $data['title'] = 'الرسائل المحذوفة';
        $data['page'] = 3;
        $data['my_email'] = $this->Email->select_all__email_by(array('id>' => 0, 'deleted' => 1));
        $this->load->view('admin/all_secretary_view/email/my_message_deleted', $data);
    }

    public function my_emails_start()
    {
        $data['title'] = 'الرسائل الهامة';
        $data['page'] = 4;
        $data['my_email'] = $this->Email->select_all__email_by(array('id>' => 0, 'starred' => 1));
        $this->load->view('admin/all_secretary_view/email/my_message_deleted', $data);
    }

    public function make_star()
    {
        $email_id = $this->input->post('id');
        $star_value = $this->input->post('star_value');
        $this->Email->make_star($email_id,$star_value);
    }
    public function make_action()
    {
        $emailes_ids = $this->input->post('emailes_ids');
        $action = $this->input->post('action');
       /* echo "<pre>";
        print_r($_POST);
        die;*/
        $this->Email->make_action($emailes_ids,$action);
    }

    function get_data_pagination()
    {
        $last_id = $this->input->post('last_id');
        $page = $this->input->post('page');
        /*       $opration = $this->input->post('opration');
               $diff = $this->input->post('diff');
               $page_id = $this->input->post('page_id');
               $last_id=($diff*3)+$last_id;*/
        /* $count= $this->Email->count_all_my_email();
         $pages = round($count / 3);*/

        /*        if ($opration == 1) {*/
        $data['my_email'] = $this->Email->select_all_my_email(array('id<' => $last_id));
        /* } else {
             $data['my_email'] = $this->Email->select_all_my_email(array('id>' => $last_id));
         }*/

        switch ($page) {
            case 3:
                $data['my_email'] = $this->Email->select_all__email_by(array('id<' => $last_id, 'deleted' => 1));
                break;
            case 4:
                $data['my_email'] = $this->Email->select_all__email_by(array('id<' => $last_id, 'starred' => 1));
                break;
                case 1:
                    $data['my_email'] = $this->Email->select_all_my_email(array('id<' => $last_id));
                break;
        }

        if (!empty($data['my_email'])) {
            $this->load->view('admin/all_secretary_view/email/load_data_pagination', $data);
        }
    }

    public function message_details($id)
    {
        $this->update_read_email($id);
        $data['message'] = $this->Email->get_email_by_id($id);
        $data['files'] = $this->Email->get_files_by_id($data['message']->email_rkm);
        $data['strTitle'] = '';
        $data['strsubTitle'] = '';
        $list = [];
        $unlist = [];
        $list = $this->Email->ClientsListCs($data['message']->email_rkm);
        $unlist = $this->Email->Clients($data['message']->email_rkm);
        $data['strTitle'] = 'المشاركين ';
        $data['strsubTitle'] = 'مستخدم';
        $data['chatTitle'] = ' اختر مشارك للتواصل';
        $vendorslist = [];
        foreach ($list as $u) {
            $vendorslist[] =
                [
                    'user_id' => $u['email_to_id'],
                    'user_id_notifiy' => $u['email_to_id'],
                    'user_name' => $u['email_to_n'], 'picture_url' => $this->Email->PictureUrlById($u['email_to_id']),
                ];
        }
        $vendorslist1 = [];
        foreach ($unlist as $u) {
            $vendorslist1[] =
                [
                    'user_id' => $u['email_from_id'],
                    'user_id_notifiy' => $u['email_from_id'],
                    'user_name' => $u['email_from_n'], 'picture_url' => $this->Email->PictureUrlById($u['email_from_id']),
                ];
        }
        $data['vendorslist'] = $vendorslist;
        $data['vendorslist1'] = $vendorslist1;
        $data['replays'] = $this->Email->get_email_replay($data['message']->email_rkm);
        $this->load->view('admin/all_secretary_view/email/message_details', $data);
    }

    public function update_read_email($id)
    {
        $this->Email->update_read_messages($id);
    }

    public function load_email_rocket()
    {
        $this->load->view('admin/all_secretary_view/email/load_email_rocket');
    }

    public function get_chat_history_by_vendor()
    {
        $receiver_id = $this->input->get('receiver_id');
        $email_rkm = $this->input->get('email_rkm');
        $Logged_sender_id = $_SESSION['user_id'];
        $history = $this->ReplayModel->GetReciverChatHistory($receiver_id, $email_rkm);
        foreach ($history as $chat):
            $message_id = $chat['id'];
            $sender_id = $chat['sender_id'];
            $userName = $this->Email->GetName($chat['sender_id']);
            $userPic = $this->Email->PictureUrlById($chat['sender_id']);
            $message = $chat['message'];
            $messagedatetime = date('d M H:i A', strtotime($chat['message_date_time']));
            ?>
            <?php
            $messageBody = '';
            if ($message == 'NULL') {
                $classBtn = 'right';
                if ($Logged_sender_id == $sender_id) {
                    $classBtn = 'left';
                }
                $attachment_name = $chat['attachment_name'];
                $file_ext = $chat['file_ext'];
                $mime_type = explode('/', $chat['mime_type']);
                $document_url = base_url('uploads/attachment/' . $attachment_name);
                if ($mime_type[0] == 'image') {
                    $messageBody .= '<img src="' . $document_url . '" onClick="ViewAttachmentImage(' . "'" . $document_url . "'" . ',' . "'" . $attachment_name . "'" . ');" class="attachmentImgCls">';
                } else {
                    $messageBody = '';
                    $messageBody .= '<div class="attachment">';
                    $messageBody .= '<h4>Attachments:</h4>';
                    $messageBody .= '<p class="filename">';
                    $messageBody .= $attachment_name;
                    $messageBody .= '</p>';
                    $messageBody .= '<div class="pull-' . $classBtn . '">';
                    $messageBody .= '<a download href="' . $document_url . '"><button type="button" id="' . $message_id . '" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
                    $messageBody .= '</div>';
                    $messageBody .= '</div>';
                }
            } else {
                $messageBody = $message;
            }
            ?>
            <?php if ($Logged_sender_id != $sender_id) { ?>
            <!-- Message. Default to the left -->
            <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?= $userName; ?></span>
                    <span class="direct-chat-timestamp pull-right"><?= $messagedatetime; ?></span>
                </div>
                <!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="<?= $userPic; ?>" alt="<?= $userName; ?>">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    <?= $messageBody; ?>
                </div>
                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
        <?php } else { ?>
            <!-- Message to the right -->
            <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"><?= $userName; ?></span>
                    <span class="direct-chat-timestamp pull-left"><?= $messagedatetime; ?></span>
                </div>
                <!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="<?= $userPic; ?>" alt="<?= $userName; ?>">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    <?= $messageBody; ?>
                    <!--<div class="spiner">
                       <i class="fa fa-circle-o-notch fa-spin"></i>
                  </div>-->
                </div>
                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
        <?php } ?>
        <?php
        endforeach;
    }

    /*public function make_replay()
    {
        $id = $this->input->post('id');
        $countfiles = count($_FILES['files']['name']);
        $img_file = $this->upload_image_files_ajax_reply($countfiles, $id);
        $data['replay'] = $this->Email->make_replay();
        $this->get_email_replay($data['replay']->email_rkm_fk);
        $this->get_email_morfqat($data['replay']->email_rkm_fk);
    }*/
    public function make_replay()
    {
        $id = $this->input->post('id');
        $countfiles = count($_FILES['files']['name']);
        $img_file = $this->upload_image_files_ajax_reply($countfiles, $id);
        $data['replay'] = $this->Email->make_replay();

    }

    /*    //yara */
    public function print_email()
    {
        $id = $this->input->post('row_id');
        $data['message'] = $this->Email->get_email_by_id($id);
        $data['files'] = $this->Email->get_files_by_id($data['message']->email_rkm);
        $this->load->view('admin/all_secretary_view/email/print_email', $data);
    }

    public function upload_image_files_ajax_reply($countfiles, $email_rkm)
    {
        if (!is_dir('uploads/emails/' . $email_rkm)) {
            mkdir('uploads/emails/' . $email_rkm, 0777, TRUE);
        }
        for ($i = 0; $i < $countfiles; $i++) {
            if (!empty($_FILES['files']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];
                $config['upload_path'] = 'uploads/emails/' . $email_rkm;
                $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
                $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
                $config['overwrite'] = true;
                $config['encrypt_name'] = true;
                $config['file_name'] = $_FILES['files']['name'][$i];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data['filenames'][] = $filename;
                    $this->Email->insert_attached_reply($filename, $email_rkm);
                }
            }
        }
    }

    public function get_email_replay($emil_rkm)
    {
        $data['replays'] = $this->Email->get_email_replay($emil_rkm);
        $this->load->view('admin/all_secretary_view/email/load_replay_email', $data);
    }

    public function get_email_morfqat($emil_rkm)
    {
        $data['files'] = $this->Email->get_files_by_id($emil_rkm);
        $this->load->view('admin/all_secretary_view/email/load_morfq_email', $data);
    }

    public function send_text_message()
    {
        $post = $this->input->post();
        $messageTxt = 'NULL';
        $attachment_name = '';
        $file_ext = '';
        $mime_type = '';
        if (isset($post['type']) == 'Attachment') {
            $AttachmentData = $this->ChatAttachmentUpload();
            $attachment_name = $AttachmentData['file_name'];
            $file_ext = $AttachmentData['file_ext'];
            $mime_type = $AttachmentData['file_type'];
        } else {
            $messageTxt = $post['messageTxt'];
        }
        if ($_SESSION['role_id_fk'] == 3) {
            $sender_id = $_SESSION['emp_code'];
        } else {
            $sender_id = $_SESSION['user_id'];
        }
        $data = [
            'email_rkm' => $post['email_rkm'],
            'sender_id' => $sender_id,
            'receiver_id' => $post['receiver_id'],
            'message' => $messageTxt,
            'attachment_name' => $attachment_name,
            'file_ext' => $file_ext,
            'mime_type' => $mime_type,
            'message_date_time' => date('Y-m-d H:i:s'),
            'ip_address' => $this->input->ip_address(),
        ];
        $query = $this->ReplayModel->SendTxtMessage($data);
        $response = '';
        if ($query == true) {
            $response = ['status' => 1, 'message' => ''];
        } else {
            $response = ['status' => 0, 'message' => 'sorry we re having some technical problems. please try again !'];
        }
        echo json_encode($response);
    }

    public function ChatAttachmentUpload()
    {
        $file_data = '';
        if (isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])) {
            $config['upload_path'] = './uploads/attachment';
            $config['allowed_types'] = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
            //$config['max_size']             = 500;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('attachmentfile')) {
                echo json_encode(['status' => 0,
                    'message' => '<span style="color:#900;">' . $this->upload->display_errors() . '<span>']);
                die;
            } else {
                $file_data = $this->upload->data();
                //$filePath = $file_data['file_name'];
                return $file_data;
            }
        }
    }

    public function get_tot_chat()
    {
        $email_rkm = $this->input->get('email_rkm');
        $tot = $this->ReplayModel->total_rows($email_rkm);
        $result['tot_replay'] = $tot;
        $msg = $this->ReplayModel->get_new_chat($email_rkm);
        $result['msg_replay'] = $msg;
        echo json_encode($result);
    }

    public function get_tot_chat_notifi()
    {
        $tot = $this->ReplayModel->total_rows_notifi();
        $result['tot_replay'] = $tot;
        $msg = $this->ReplayModel->get_new_chat_notifi();
        $result['msg_replay'] = $msg;
        echo json_encode($result);
    }

    public function update_seen_chat()
    {
        $id = $this->input->get('id');
        $email_rkm = $this->input->post('email_rkm');
        $this->ReplayModel->update_seen_chat($id, $email_rkm);
    }

    public function get_emps($email_rkm)
    {
        $data['all'] = $this->Email->get_emps($email_rkm);
        $data['type'] = 1;
        $this->load->view('admin/all_secretary_view/email/load_add_employee', $data);
    }

    public function add_emps_email()
    {
        $this->Email->add_emps_email();
    }

    public function delete_message()
    {
        $id = $this->input->post('id');
        $this->Email->make_deleted($id);
        //  $this->Email->delete($id);
    }

    public function archive_message()
    {//select_all_my_email
        $id = $this->input->post('id');
        $this->Email->archive_message($id);
    }
}