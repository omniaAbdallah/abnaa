<?php
function mb_str_pad($input, $pad_length, $pad_string = ' ', $pad_type = STR_PAD_RIGHT, $encoding = 'UTF-8')
{
    $input_length = mb_strlen($input, $encoding);
    $pad_string_length = mb_strlen($pad_string, $encoding);

    if ($pad_length <= 0 || ($pad_length - $input_length) <= 0) {
        return $input;
    }

    $num_pad_chars = $pad_length - $input_length;

    switch ($pad_type) {
        case STR_PAD_RIGHT:
            $left_pad = 0;
            $right_pad = $num_pad_chars;
            break;

        case STR_PAD_LEFT:
            $left_pad = $num_pad_chars;
            $right_pad = 0;
            break;

        case STR_PAD_BOTH:
            $left_pad = floor($num_pad_chars / 2);
            $right_pad = $num_pad_chars - $left_pad;
            break;
    }

    $result = '';
    for ($i = 0; $i < $left_pad; ++$i) {
        $result .= mb_substr($pad_string, $i % $pad_string_length, 1, $encoding);
    }
    $result .= $input;
    for ($i = 0; $i < $right_pad; ++$i) {
        $result .= mb_substr($pad_string, $i % $pad_string_length, 1, $encoding);
    }

    return $result;
}

function set_data()
{

    $CI =& get_instance();

    $CI->load->model('system_management/Groups');
    $path = str_replace(base_url(), "", current_url());
    $frist_group_id = $CI->Groups->get_groupId_by_path($path);
    $this->rapid_query = $CI->Groups->rapid_query();
    if (!empty($frist_group_id)) {
        $this->page_group_num = $frist_group_id;
    } else {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);
            $previos_group_id = $CI->Groups->get_groupId_by_path($previos_path);
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
    $CI->load->model('system_management/Model_user_permission');
    $this->my_side_bar = $CI->Model_user_permission->get_my_page_permession($_SESSION["user_id"]);
    $CI->load->model('system_management/Model_user_permission');
    $this->groups_top_menu = $CI->Groups->get_group($this->page_group_num);
    $this->groups_title_top_menu = $CI->Groups->get_group_title($this->page_group_num);
    $CI->load->model('familys_models/for_dash/Counting');
    $this->count_basic_in = $CI->Counting->get_basic_in_num();
    $this->files_basic_in = $CI->Counting->get_files_basic_in();

}


?>