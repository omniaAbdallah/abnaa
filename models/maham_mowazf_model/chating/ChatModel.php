 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class ChatModel extends CI_Model {
   	public function __construct()
        {
                parent::__construct();
                 // Your own constructor code
         } 
 	private $Table = 'chat';
	
 
	public function SendTxtMessage($data){
  		$res = $this->db->insert($this->Table, $data ); 
 		if($res == 1)
 			return true;
 		else
 			return false;
	}
	public function GetReciverChatHistory($receiver_id){
		
		$sender_id = $_SESSION['user_id'];
		
		//SELECT * FROM `chat` WHERE `sender_id`= 197 AND `receiver_id` = 184 OR `sender_id`= 184 AND `receiver_id` = 197
		$condition= "`sender_id`= '$sender_id' AND `receiver_id` = '$receiver_id' OR `sender_id`= '$receiver_id' AND `receiver_id` = '$sender_id'";
		
		$this->db->select('*');
		$this->db->from($this->Table);
		$this->db->where($condition);
   		$query = $this->db->get();
 		if ($query) {
			 return $query->result_array();
		 } else {
			 return false;
		 }
	}
 	public function GetReciverMessageList($receiver_id){
  		
		$this->db->select('*');
		$this->db->from($this->Table);
		$this->db->where('receiver_id',$receiver_id);
   		$query = $this->db->get();
 		if ($query) {
			 return $query->result_array();
		 } else {
			 return false;
		 }
		 
	}
	
	
	public function TrashById($receiver_id)
	{  
 		$res = $this->db->delete($this->Table, ['receiver_id' => $receiver_id] ); 
		if($res == 1)
			return true;
		else
			return false;
	 }	

	//  yaraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
	    public function total_rows($q = NULL)
        {
            $this->db->like('id', $q);
			
				$this->db->where('receiver_id', $_SESSION['user_id']);
			
            $this->db->where('seen', 0);
            $this->db->from('chat');
            return $this->db->count_all_results();
		}
		public function get_new_chat($q = NULL)
        {
			
			$this->db->where('receiver_id', $_SESSION['user_id']);
				
            $this->db->where('seen', 0);
            $this->db->from('chat');
            return $this->db->get()->result();
        }

        public function update_seen_chat($id)
        {
            $data['seen'] = 1;
			
			$this->db->where('sender_id',$id)->where('receiver_id',$_SESSION['user_id'])->update('chat', $data);
				
			

        }
	 





 }