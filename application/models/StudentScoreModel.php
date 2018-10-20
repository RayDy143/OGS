<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentScoreModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function getStudentScore($where)
  {
      $this->db->where($where);
      $query=$this->db->get('studentscore');
      if($query->num_rows()>0){
          return $query->row();
      }else{
          return false;
      }
  }
  public function Add($fields)
  {
      $this->db->insert('studentscore',$fields);
      if($this->db->affected_rows()>0){
          return true;
      }else{
          return false;
      }
  }
  public function Update($where,$fields)
  {
      $this->db->where($where);
      $this->db->update('studentscore',$fields);
      if($this->db->affected_rows()>0){
          return true;
      }else{
          return false;
      }
  }
}