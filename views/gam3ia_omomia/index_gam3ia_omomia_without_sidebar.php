<?php
$this->load->model('gam3ia_omomia/Pages_m');
$this->my_side_bar = $this->Pages_m->get_my_page_permession();

$this->load->view('gam3ia_omomia/requires/header');
$this->load->view($subview);
$this->load->view('gam3ia_omomia/requires/footer');

?>