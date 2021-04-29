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
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }/*


        $this->load->model('system_management/Groups');
        $path = str_replace(base_url(), "", current_url());
        $frist_group_id = $this->Groups->get_groupId_by_path($path);


        $this->rapid_query=$this->Groups->rapid_query();

        if(!empty($frist_group_id)){
            $this->page_group_num = $frist_group_id;
        } else {
                if(isset($_SERVER['HTTP_REFERER'])){
                    $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);
                    $previos_group_id  = $this->Groups->get_groupId_by_path($previos_path);
                    if(!empty($previos_group_id) ){
                        $this->page_group_num = $previos_group_id;

                        $_SESSION["group_number"]= $previos_group_id;
                    }else{
                        $this->page_group_num =(isset($_SESSION["group_number"]))? $_SESSION["group_number"]:"0";
                    }
            }else{
                    $this->page_group_num =(isset($_SESSION["group_number"]))? $_SESSION["group_number"]:"0";
            }


        }
        $this->load->model('system_management/Model_user_permission');
        // $this->my_side_bar=$this->Model_user_permission->get_my_page_permession($_SESSION["user_id"]);
        //
        //     $this->main_groups=$this->Groups->main_fetch_group();
            $this->groups_top_menu=$this->Groups->get_group($this->page_group_num);
        //     $this->groups_title_top_menu=$this->Groups->get_group_title($this->page_group_num);

        $this->load->driver('cache', array('adapter' =>'apc' ,'backup'=>'file'));
                if (!$this->cache->get('my_side_bar'.$_SESSION["user_id"])) {
                  $my_side_bar=$this->Model_user_permission->get_my_page_permession($_SESSION["user_id"]);
                  $this->cache->save('my_side_bar'.$_SESSION["user_id"],$my_side_bar,1800);
                  // echo "make cache";
                }

                $this->my_side_bar=null;
                $this->my_side_bar=$this->cache->get('my_side_bar'.$_SESSION["user_id"]);

                if (!$this->cache->get('main_groups'.$_SESSION["user_id"])) {
                  $main_groups=$this->Groups->main_fetch_group();
                  $this->cache->save('main_groups'.$_SESSION["user_id"],$main_groups,1800);
                  // echo "make cache";
                }

                $this->main_groups=null;
                $this->main_groups=$this->cache->get('main_groups'.$_SESSION["user_id"]);

                /*if (!$this->cache->get('groups_top_menu')) {
                  $groups_top_menu=$this->Groups->get_group($this->page_group_num);
                  $this->cache->save('groups_top_menu',$groups_top_menu,1800);
                  // echo "make cache";

                }

                $this->groups_top_menu=null;
                $this->groups_top_menu=$this->cache->get('groups_top_menu');

                if (!$this->cache->get('groups_title_top_menu'.$_SESSION["user_id"])) {
                  $groups_title_top_menu=$this->Groups->get_group_title($this->page_group_num);
                  $this->cache->save('groups_title_top_menu'.$_SESSION["user_id"],$groups_title_top_menu,1800);
                  // echo "make cache";

                }

                $this->groups_title_top_menu=null;
                $this->groups_title_top_menu=$this->cache->get('groups_title_top_menu'.$_SESSION["user_id"]);


        $this->load->model('familys_models/for_dash/Counting');
         
        // $this->count_basic_in  = $this->Counting->get_basic_in_num();
       // $this->files_basic_in  = $this->Counting->get_files_basic_in();  
          $this->files_basic_in  = null;
        
                if (!$this->cache->get('count_basic_in'.$_SESSION["user_id"])) {
                //  $count_basic_in=$this->Counting->get_basic_in_num();
                $count_basic_in =0;
                  $this->cache->save('count_basic_in'.$_SESSION["user_id"],$count_basic_in,1800);
                  // echo "make cache";

                }

                $this->count_basic_in=null;
             //   $this->count_basic_in=$this->cache->get('count_basic_in'.$_SESSION["user_id"]);
                $this->count_basic_in=null;
                if (!$this->cache->get('files_basic_in'.$_SESSION["user_id"])) {
                  $files_basic_in=$this->Counting->get_basic_in_num();
                  $this->cache->save('files_basic_in'.$_SESSION["user_id"],$files_basic_in,1800);
                  // echo "make cache";

                }

                $this->files_basic_in=null;
            //    $this->files_basic_in=$this->cache->get('files_basic_in'.$_SESSION["user_id"]);
                 $this->files_basic_in=null;
                 */

    }
}
