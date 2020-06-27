<?php

$this->load->view('layout/_layout_header');
$this->load->view('layout/_layout_sidebar');
$this->load->view('layout/_layout_top_body');
$this->load->view($subview);
$this->load->view('layout/_layout_footer');
