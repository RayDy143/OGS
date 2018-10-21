<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogs extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('UserLogModel');
  }

  function index()
  {
      if(isset($_SESSION['UserAccountID'])){
          if($_SESSION['RoleID']==1){
              $data['usernav']="";
              $data['userlogsnav']="active";
              $data['classnav']="";
              $data['title']="User Accounts";
              $data['userlogs']=$this->UserLogModel->Get();
              $this->load->view('layout/header',$data);
              $this->load->view('admin/userlog_page');
          }else{
              header('location:'.base_url('index.php/Teacher/Classes'));
          }
      }else{
          header('location:'.base_url('index.php/Login'));
      }
  }

}
