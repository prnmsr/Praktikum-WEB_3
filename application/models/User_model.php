<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class User extends CI_Controller 
{ 
    protected $_table ='tb_user';
    protected $primary ='id';   

    public function getAll()
    { 
        return $this->db->where('is_active',1)->get($this->_table)->result(); 
    } 

}