<?php
$this->load->View('template/header');
$this->load->View('template/navbar');
$this->load->View('template/sidebar');
$this->load->View($content);
$this->load->View('template/footer');
