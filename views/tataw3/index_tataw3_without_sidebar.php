<?php
$this->load->model('tataw3/Pages_m');
$this->my_side_bar = $this->Pages_m->get_my_page_permession();

$this->load->view('tataw3/requires/header');
$this->load->view($subview);
$this->load->view('tataw3/requires/footer');

?>