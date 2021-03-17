<?php 
class Urgent_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    
    
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('md_urgent_msg');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete_urgent_msg($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('md_urgent_msg');
    }


    public function add ($post){
        $params = [
            'msg_name'       =>$post['msg_name']

        ];
        $this->db->insert('md_urgent_msg',$params);
    }

    public function edit ($post){
        $params = [
            'msg_name'       =>$post['msg_name'],
            'updated'    =>date('Y-m-d H:i:s')

        ];
        $this->db->where('id',$post['id']);
        $this->db->update('md_urgent_msg',$params);
    }
    
    
    
    
    }

?>