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
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

    }
}
