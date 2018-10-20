<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageClass extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ClassModel');
    $this->load->model('StudentModel');
  }
  function index()
  {
      $this->load->view('layout/header');
      $this->load->view('admin/manage_class_view');
  }
  public function Manage($id)
  {
      $data['usernav']="";
      $data['classnav']="active";
      $data['title']="Manage Class";
      $data['class']=$this->ClassModel->getSpecificClass($id);
      $this->load->view('layout/header',$data);
      $this->load->view('admin/manage_class_view');
  }
  public function Add()
  {
      $fields = array(
          'Name' => $this->input->post('Name'),
          'Gender' => $this->input->post('Gender'),
          'ClassID' => $this->input->post('ID')
       );
       $query=$this->StudentModel->Add($fields);
       $data['success']=false;
       if($query){
           $data['success']=true;
       }
       echo json_encode($data);
  }
  public function getStudent()
  {
      $data['stud']=$this->StudentModel->getStudent($this->input->post('ID'));
      $data['success']=false;
      if($data){
          $data['success']=true;
      }
      echo json_encode($data);
  }
  public function deleteStudent()
  {
      $where = array('StudentID' => $this->input->post('ID') );
      $query=$this->StudentModel->Delete($where);
      $data['success']=false;
      if($query){
          $data['success']=true;
      }
      echo json_encode($data);
  }
  public function updateStudent()
  {
      $where = array('StudentID' => $this->input->post('ID') );
      $fields = array(
          'Name' => $this->input->post('Name'),
          'Gender' => $this->input->post('Gender')
       );
       $query=$this->StudentModel->Update($where,$fields);
       $data['success']=false;
       if($query){
           $data['success']=true;
       }
       echo json_encode($data);
  }
}
