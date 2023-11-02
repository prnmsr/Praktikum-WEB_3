<?php
$this->load->View('admin/template/header');
$this->load->View('admin/template/navbar');
$this->load->View('admin/template/sidebar');
$this->load->View($content);
$this->load->View('admin/template/footer');
