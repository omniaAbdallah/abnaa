<?php


class Message_gam3ia_model extends CI_Model
{
    public function get_by($table, $where_arr = false, $select = false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            if (!empty($select) && $select != 1) {
                return $query->row()->$select;
            } else {
                if ($select == 1) {
                    return $query->row();
                } else {
                    return $query->result();
                }
            }
        } else {
            return false;
        }
    }

  /*  function get_message_by($where_arr = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $q = $this->db->order_by('id', 'desc')->limit(15)->get('md_gam3ia_contact')->result();

        if (!empty($q)) {
            foreach ($q as $key => $row) {
                if ($row->member_type_to == 1) {
                    $from_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->name;
                        if (!empty($from_date->mem_img)) {
                            $q[$key]->from_img = 'uploads/md/gam3ia_omomia_members/' . $from_date->mem_img;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } elseif ($row->member_type_to == 2) {
                    $from_date = $this->get_by('employees', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->employee;
                        if (!empty($from_date->personal_photo)) {
                            $q[$key]->from_img = 'uploads/human_resources/emp_photo/thumbs/' . $from_date->personal_photo;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';

                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                }
                $to_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_to_id_fk), 1);
                if (!empty($to_date)) {
                    $q[$key]->to_name = $to_date->name;
                    if (!empty($to_date->mem_img)) {
                        $q[$key]->to_img = 'uploads/md/gam3ia_omomia_members/' . $to_date->mem_img;
                    } else {
                        $q[$key]->to_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } else {
                    $q[$key]->from_name = 'غير محدد';
                    $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                }
            }
        }
        return $q;
    }
*/
  /*  function get_message_2_by($where_arr = false, $page)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }

        switch ($page) {
            case 4:
                $this->db->group_start()->where('send_to_id_fk', $_SESSION['id'])->where('stared_to', 1)->group_end();
                $this->db->or_group_start()->where('send_from_id_fk', $_SESSION['id'])->where('started_from', 1)->group_end();
                break;
            case 3:
                $this->db->group_start()->where('send_to_id_fk', $_SESSION['id'])->group_start()->where('deleted_to', 1)->or_where('archived_to', 1)->group_end()->group_end();
                $this->db->or_group_start()->where('send_from_id_fk', $_SESSION['id'])->group_start()->where('deleted_from', 1)->or_where('archived_from', 1)->group_end()->group_end();
                break;
        }
        $q = $this->db->order_by('id', 'desc')->limit(15)->get('md_gam3ia_contact')->result();


        if (!empty($q)) {
            foreach ($q as $key => $row) {
                if ($row->member_type_to == 1) {
                    $from_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->name;
                        if (!empty($from_date->mem_img)) {
                            $q[$key]->from_img = 'uploads/md/gam3ia_omomia_members/' . $from_date->mem_img;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } elseif ($row->member_type_to == 2) {
                    $from_date = $this->get_by('employees', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->employee;
                        if (!empty($from_date->personal_photo)) {
                            $q[$key]->from_img = 'uploads/human_resources/emp_photo/thumbs/' . $from_date->personal_photo;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';

                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                }
                $to_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_to_id_fk), 1);
                if (!empty($to_date)) {
                    $q[$key]->to_name = $to_date->name;
                    if (!empty($to_date->mem_img)) {
                        $q[$key]->to_img = 'uploads/md/gam3ia_omomia_members/' . $to_date->mem_img;
                    } else {
                        $q[$key]->to_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } else {
                    $q[$key]->from_name = 'غير محدد';
                    $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                }
            }
        }
        return $q;
    }
*/
 /*   function add_message($file)
    {
        $data = $_POST['data'];
        if (!empty($file)) {
            $data['file_attach_name'] = $file;
        }
        $data['send_from_id_fk'] = $_SESSION['id'];
        $data['publisher'] = $_SESSION['id'];
        $data['publisher_name'] = $_SESSION['name'];
        $data['date_ar'] = date('Y-m-d');
        $data['date'] = strtotime(date('Y-m-d h:i'));
        $data['time'] = date('h:i A');
        $this->db->insert('md_gam3ia_contact', $data);

    }*/


 /*function get_message_by($where_arr = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $q = $this->db->where('replay_id_fk',0)->order_by('id', 'desc')->limit(15)->get('md_gam3ia_contact')->result();

        if (!empty($q)) {
            foreach ($q as $key => $row) {
                if ($row->member_type_to == 1) {
                    $from_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->name;
                        if (!empty($from_date->mem_img)) {
                            $q[$key]->from_img = 'uploads/md/gam3ia_omomia_members/' . $from_date->mem_img;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } elseif ($row->member_type_to == 2) {
                    $from_date = $this->get_by('employees', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->employee;
                        if (!empty($from_date->personal_photo)) {
                            $q[$key]->from_img = 'uploads/human_resources/emp_photo/thumbs/' . $from_date->personal_photo;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                }
                $to_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_to_id_fk), 1);
                if (!empty($to_date)) {
                    $q[$key]->to_name = $to_date->name;
                    if (!empty($to_date->mem_img)) {
                        $q[$key]->to_img = 'uploads/md/gam3ia_omomia_members/' . $to_date->mem_img;
                    } else {
                        $q[$key]->to_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } else {
                    $q[$key]->from_name = 'غير محدد';
                    $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                }
            }
        }
        return $q;
    }
*/

 function get_message_by($where_arr = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $q = $this->db->order_by('id', 'desc')->limit(15)->get('md_gam3ia_contact')->result();
        /* echo "last sql :";
         print_r($this->db->last_query());*/
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                if ($row->member_type_to == 1) {
                    $from_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->name;
                        if (!empty($from_date->mem_img)) {
                            $q[$key]->from_img = 'uploads/md/gam3ia_omomia_members/' . $from_date->mem_img;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } elseif ($row->member_type_to == 2) {
                    $from_date = $this->get_by('employees', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->employee;
                        if (!empty($from_date->personal_photo)) {
                            $q[$key]->from_img = 'uploads/human_resources/emp_photo/thumbs/' . $from_date->personal_photo;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                }
                $to_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_to_id_fk), 1);
                if (!empty($to_date)) {
                    $q[$key]->to_name = $to_date->name;
                    if (!empty($to_date->mem_img)) {
                        $q[$key]->to_img = 'uploads/md/gam3ia_omomia_members/' . $to_date->mem_img;
                    } else {
                        $q[$key]->to_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } else {
                    $q[$key]->from_name = 'غير محدد';
                    $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                }
            }
        }
        return $q;
    }

  /*  function get_message_2_by($where_arr = false, $page)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $this->db->where('replay_id_fk',0);
        switch ($page) {
            case 4:
                $this->db->group_start()->where('send_to_id_fk', $_SESSION['id'])->where('stared_to', 1)->group_end();
                $this->db->or_group_start()->where('send_from_id_fk', $_SESSION['id'])->where('started_from', 1)->group_end();
                break;
            case 3:
                $this->db->group_start()->where('send_to_id_fk', $_SESSION['id'])->group_start()->where('deleted_to', 1)->or_where('archived_to', 1)->group_end()->group_end();
                $this->db->or_group_start()->where('send_from_id_fk', $_SESSION['id'])->group_start()->where('deleted_from', 1)->or_where('archived_from', 1)->group_end()->group_end();
                break;
        }
        $q = $this->db->order_by('id', 'desc')->limit(15)->get('md_gam3ia_contact')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                if ($row->member_type_to == 1) {
                    $from_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->name;
                        if (!empty($from_date->mem_img)) {
                            $q[$key]->from_img = 'uploads/md/gam3ia_omomia_members/' . $from_date->mem_img;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } elseif ($row->member_type_to == 2) {
                    $from_date = $this->get_by('employees', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->employee;
                        if (!empty($from_date->personal_photo)) {
                            $q[$key]->from_img = 'uploads/human_resources/emp_photo/thumbs/' . $from_date->personal_photo;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                }
                $to_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_to_id_fk), 1);
                if (!empty($to_date)) {
                    $q[$key]->to_name = $to_date->name;
                    if (!empty($to_date->mem_img)) {
                        $q[$key]->to_img = 'uploads/md/gam3ia_omomia_members/' . $to_date->mem_img;
                    } else {
                        $q[$key]->to_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } else {
                    $q[$key]->from_name = 'غير محدد';
                    $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                }
            }
        }
        return $q;
    }
*/


    function get_message_2_by($where_arr = false, $page)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
       /* $this->db->where('replay_id_fk',0);*/
        switch ($page) {
            case 4:
                $this->db->group_start()->where('send_to_id_fk', $_SESSION['id'])->where('stared_to', 1)->group_end();
                $this->db->or_group_start()->where('send_from_id_fk', $_SESSION['id'])->where('started_from', 1)->group_end();
                break;
            case 3:
                $this->db->group_start()->where('send_to_id_fk', $_SESSION['id'])->group_start()->where('deleted_to', 1)->or_where('archived_to', 1)->group_end()->group_end();
                $this->db->or_group_start()->where('send_from_id_fk', $_SESSION['id'])->group_start()->where('deleted_from', 1)->or_where('archived_from', 1)->group_end()->group_end();
                break;
        }
        $q = $this->db->order_by('id', 'desc')->limit(15)->get('md_gam3ia_contact')->result();
        /*echo "last sql :";
        print_r($this->db->last_query());*/
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                if ($row->member_type_to == 1) {
                    $from_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->name;
                        if (!empty($from_date->mem_img)) {
                            $q[$key]->from_img = 'uploads/md/gam3ia_omomia_members/' . $from_date->mem_img;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } elseif ($row->member_type_to == 2) {
                    $from_date = $this->get_by('employees', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->employee;
                        if (!empty($from_date->personal_photo)) {
                            $q[$key]->from_img = 'uploads/human_resources/emp_photo/thumbs/' . $from_date->personal_photo;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                }
                $to_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_to_id_fk), 1);
                if (!empty($to_date)) {
                    $q[$key]->to_name = $to_date->name;
                    if (!empty($to_date->mem_img)) {
                        $q[$key]->to_img = 'uploads/md/gam3ia_omomia_members/' . $to_date->mem_img;
                    } else {
                        $q[$key]->to_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } else {
                    $q[$key]->from_name = 'غير محدد';
                    $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                }
            }
        }
        return $q;
    }
    function add_message($file,$id=false)
    {
        $data = $_POST['data'];
        if (!empty($file)) {
            $data['file_attach_name'] = $file;
        }
        $data['send_from_id_fk'] = $_SESSION['id'];
        $data['publisher'] = $_SESSION['id'];
        $data['publisher_name'] = $_SESSION['name'];
        $data['date_ar'] = date('Y-m-d');
        $data['date'] = strtotime(date('Y-m-d h:i'));
        $data['time'] = date('h:i A');
        if (!empty($id)){
            $data['replay_id_fk']=$id;
        }
        /*  echo 'from_model <pre>';
  
          print_r($data);*/

        $this->db->insert('md_gam3ia_contact', $data);
    }


    /*28-6-om*/


    public function count_by($table, $where_arr = false, $select = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        return $this->db->select('COUNT(id) as count')->get($table)->row_array()['count'];

    }

    function update_seen()
    {
        $data['seen'] = 1;
        $this->db->where('send_to_id_fk', $_SESSION['id'])->update('md_gam3ia_contact', $data);
    }

    function get_message_detailes_replay_by($where_arr = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $q = $this->db->get('md_gam3ia_contact')->result();

        if (!empty($q)) {
            foreach ($q as $key => $row) {
                if ($row->member_type_to == 1) {
                    $from_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->name;
                        if (!empty($from_date->mem_img)) {
                            $q[$key]->from_img = 'uploads/md/gam3ia_omomia_members/' . $from_date->mem_img;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } elseif ($row->member_type_to == 2) {
                    $from_date = $this->get_by('employees', array('id' => $row->send_from_id_fk), 1);
                    if (!empty($from_date)) {
                        $q[$key]->from_name = $from_date->employee;
                        if (!empty($from_date->personal_photo)) {
                            $q[$key]->from_img = 'uploads/human_resources/emp_photo/thumbs/' . $from_date->personal_photo;
                        } else {
                            $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                        }
                    } else {
                        $q[$key]->from_name = 'غير محدد';
                        $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                }
                $to_date = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->send_to_id_fk), 1);
                if (!empty($to_date)) {
                    $q[$key]->to_name = $to_date->name;
                    if (!empty($to_date->mem_img)) {
                        $q[$key]->to_img = 'uploads/md/gam3ia_omomia_members/' . $to_date->mem_img;
                    } else {
                        $q[$key]->to_img = 'asisst/admin_asset/img/avatar5.png';
                    }
                } else {
                    $q[$key]->from_name = 'غير محدد';
                    $q[$key]->from_img = 'asisst/admin_asset/img/avatar5.png';
                }
            }
        }
        return $q;
    }

    public function update_message($data, $where_arr = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $this->db->update('md_gam3ia_contact', $data);
    }

    public function make_star($id, $type)
    {
        switch ($type) {
            case 1:/*ward*/
                $star_value = $this->get_by('md_gam3ia_contact', array('id' => $id), 'stared_to');
                $data['stared_to'] = 1 - $star_value;
                $this->db->where('id', $id)->update('md_gam3ia_contact', $data);

                break;
            case 2:/*morsal*/
                $star_value = $this->get_by('md_gam3ia_contact', array('id' => $id), 'started_from');
                $data['started_from'] = 1 - $star_value;
                $this->db->where('id', $id)->update('md_gam3ia_contact', $data);
                break;
        }
    }

    public function make_action($emailes_ids, $action, $type)
    {

        switch ($type) {
            case 1:
                $filed = 'id';
                switch ($action) {
                    case 1:
                        $data['readed'] = 1;
                        break;
                    case 2:
                        $data['archived_to'] = 1;
                        break;
                    case 3:
                        $data['deleted_to'] = 1;
                        break;
                    case 4:
                        $data['stared_to'] = 1;
                        break;

                }
                break;
            case 2:
                $filed = 'id';

                switch ($action) {
                    case 2:
                        $data['archived_from'] = 1;
                        break;
                    case 3:
                        $data['deleted_from'] = 1;
                        break;
                    case 4:
                        $data['started_from'] = 1;
                        break;

                }
                break;
        }
        if (!empty($emailes_ids)) {
            for ($i = 0; $i < count($emailes_ids); $i++) {
                $this->db->where($filed, $emailes_ids[$i])->update('md_gam3ia_contact', $data);
            }
        }
    }

    public function archive_message($id, $type)
    {
        switch ($type) {
            case 1:/*ward*/
                $data['archived_to'] = 1;
                $data['deleted_to'] = 1;
                break;
            case 2:/*morsal*/
                $data['deleted_from'] = 1;
                $data['archived_from'] = 1;
                break;
        }
        $this->update_message($data, array('id' => $id));
    }

    function add_emps_message (){
        $id = $this->input->post('message_id');
        $message_data=$this->get_by('md_gam3ia_contact',array('id'=>$id),1);
        $data['member_type_to'] = $this->input->post('type_member');
        $data['send_to_id_fk ']= $this->input->post('member_id');

        $data['contact_type_fk'] = $message_data->contact_type_fk;
        $data['contact_type_n'] = $message_data->contact_type_n;
        $data['content'] = $message_data->content;
        $data['title'] = $message_data->title;
        $data['important_degree'] = $message_data->important_degree;

        $data['send_from_id_fk'] = $_SESSION['id'];
        $data['publisher'] = $_SESSION['id'];
        $data['publisher_name'] = $_SESSION['name'];
        $data['date_ar'] = date('Y-m-d');
        $data['date'] = strtotime(date('Y-m-d h:i'));
        $data['time'] = date('h:i A');
        /*  echo 'from_model <pre>';
          print_r($data);*/
        $this->db->insert('md_gam3ia_contact', $data);
    }
    
    
        function count_2_by( $page)
    {

        /*        $this->db->where('replay_id_fk',0);*/
        switch ($page) {
            case 4:
                $this->db->group_start()->where('send_to_id_fk', $_SESSION['id'])->where('stared_to', 1)->group_end();
                $this->db->or_group_start()->where('send_from_id_fk', $_SESSION['id'])->where('started_from', 1)->group_end();
                break;
            case 3:
                $this->db->group_start()->where('send_to_id_fk', $_SESSION['id'])->group_start()->where('deleted_to', 1)->or_where('archived_to', 1)->group_end()->group_end();
                $this->db->or_group_start()->where('send_from_id_fk', $_SESSION['id'])->group_start()->where('deleted_from', 1)->or_where('archived_from', 1)->group_end()->group_end();
                break;
        }
        return $this->db->select('COUNT(id) as count')->get('md_gam3ia_contact')->row_array()['count'];

    }

}