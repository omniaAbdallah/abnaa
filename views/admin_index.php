<?php 

defined('BASEPATH') OR exit('No direct script access allowed');   

 $this->load->view('admin/requires/header');   

  	//$this->load->view('admin/requires/sidebar');   

        $this->load->view('admin/requires/tob_menu');  

          $this->load->view($subview);  

            $this->load->view('admin/requires/footer');

            ?>