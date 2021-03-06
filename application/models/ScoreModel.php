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
  public function Delete($where)
  {
      $fields = array('IsDeleted' => 1 );
      $this->db->where($where);
      $this->db->update('score',$fields);
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
  public function getTypeTotal($classid,$gradingperiod,$type)
  {
      $query=$this->db->query("SELECT SUM(PerfectScore) as total from score where ClassID='$classid' and GradingPeriod='$gradingperiod' and Type='$type' and score.IsDeleted=0");
      if($query->num_rows()>0){
          return $query->row();
      }else{
          return false;
      }
  }
}
