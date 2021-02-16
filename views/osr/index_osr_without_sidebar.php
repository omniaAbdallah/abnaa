<?php
$this->load->model('osr/Pages_m');
$this->my_side_bar = $this->Pages_m->get_my_page_permession();

$this->load->view('osr/requires/header');
$this->load->view($subview);
$this->load->view('osr/requires/footer');

?>