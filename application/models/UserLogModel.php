<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function Add($fields)
  {
    $this->db->insert('userlogs',$fields);
    if($this->db->affected_rows()>0){
        return true;
    }else{
        return false;
    }
  }
  public function Get()
  {
    $query=$this->db->query("SELECT * FROM userlogs inner join useraccount on userlogs.UserAccountID=useraccount.UserAccountID");
    if($query->num_rows()>0){
        return $query->result_array();
    }else{
        return false;
    }
  }
}
