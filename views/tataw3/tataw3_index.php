<?php

defined('BASEPATH') or exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->model('tataw3/Pages_m');
//        $this->main_groups = $this->Pages_m->main_fetch_group();
$this->my_side_bar = $CI->Pages_m->get_my_page_permession();
$path = str_replace(base_url(), "", current_url());
$frist_group_id = $CI->Pages_m->get_groupId_by_path($path);

if (!empty($frist_group_id)) {

    $this->page_group_num = $frist_group_id;
} else {
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);
        $previos_group_id = $CI->Pages_m->get_groupId_by_path($previos_path);
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
$this->groups_top_menu = $CI->Pages_m->get_group($this->page_group_num);
/*echo ' path '.$path;
echo ' previos_path '.$previos_path;
echo " \n  frist_group_id ".$frist_group_id;
echo "\n  page_group_num ".$this->page_group_num;
echo '<pre>';
    print_r($this->groups_top_menu);
    die;
echo '</pre>';*/

$this->load->view('tataw3/requires/header');

//$this->load->view('osr/requires/sidebar');

$this->load->view('tataw3/requires/tob_menu');

$this->load->view($subview);

$this->load->view('tataw3/requires/footer');

?>