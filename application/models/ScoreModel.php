<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScoreModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function Add($fields)
  {
      $this->db->insert('score',$fields);
      if($this->db->affected_rows()>0){
          return true;
      }else{
          return false;
      }
  }
  public function Get($where)
  {
      $this->db->where($where);
      $query=$this->db->get('score');
      if($query->num_rows()>0){
          return $query->result_array();
      }else{
          return false;
      }
  }
}
