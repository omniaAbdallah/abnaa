<?php

/**
 * Created by PhpStorm.
 * User: m
 * Date: 9/13/2018
 * Time: 11:41 AM
 */
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*$this->files_basic_in =
        $this->count_basic_in =
        $this->groups_title_top_menu =
        $this->groups_top_menu =
        $this->my_side_bar =
        $this->page_group_num =
        $this->rapid_query = '';*/
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        /*

                $this->load->model('system_management/Groups');
                $path = str_replace(base_url(), "", current_url());
                $frist_group_id = $this->Groups->get_groupId_by_path($path);*/


        /*        $this->rapid_query = $this->Groups->rapid_query();*/

        /*        if (!empty($frist_group_id)) {
                    $this->page_group_num = $frist_group_id;
                } else {
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);
                        $previos_group_id = $this->Groups->get_groupId_by_path($previos_path);
                        if (!empty($previos_group_id)) {
                            $this->page_group_num = $previos_group_id;
                            $_SESSION["group_number"] = $previos_group_id;
                        } else {
                            $this->page_group_num = (isset($_SESSION["group_number"])) ? $_SESSION["group_number"] : "0";
                        }
                    } else {
                        $this->page_group_num = (isset($_SESSION["group_number"])) ? $_SESSION["group_number"] : "0";
                    }
                }

                $this->load->model('system_management/Model_user_permission');
                $this->my_side_bar = $this->Model_user_permission->get_my_page_permession($_SESSION["user_id"]);
                $this->groups_top_menu = $this->Groups->get_group($this->page_group_num);*/
        /*        $this->groups_title_top_menu = $this->Groups->get_group_title($this->page_group_num);*/
        /*$this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();*/

        /*    echo '<pre>';
            print_r($this->my_side_bar);
            echo '</pre>';
            echo '<br>';
            echo '<pre>';
            print_r($this->groups_top_menu);
            echo '</pre>';
            die;*/
    }
}
