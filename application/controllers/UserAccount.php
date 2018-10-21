<?php
    /**
     *
     */
    class UserAccount extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('UserAccountModel');
        }
        public function index()
        {
            if(isset($_SESSION['UserAccountID'])){
                if($_SESSION['RoleID']==1){
                    $data['usernav']="active";
                    $data['userlogsnav']="";
                    $data['classnav']="";
                    $data['title']="User Accounts";
                    $this->load->view('layout/header',$data);
                    $this->load->view('admin/useraccount_view');
                }else{
                    header('location:'.base_url('index.php/Teacher/Classes'));
                }
            }else{
                header('location:'.base_url('index.php/Login'));
            }

        }
        //Adding account
        public function Add()
        {
            $fields = array(
                'Firstname' => $this->input->post('Firstname'),
                'Middlename' => $this->input->post('Middlename'),
                'Lastname' => $this->input->post('Lastname'),
                'Email' => $this->input->post('Email'),
                'Username' => $this->input->post('Username'),
                'Password' => $this->input->post('Username'),
                'RoleID' => $this->input->post('Role'),
             );
             $query=$this->UserAccountModel->Add($fields);
             $data['success']=false;
             if($query){
                 $data['success']=true;
             }
             echo json_encode($data);
        }
        //Getting user
        public function getUser()
        {
            $data['user']=$this->UserAccountModel->Get();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        //Updating user
        public function updateUser()
        {
            $where = array('UserAccountiD' => $this->input->post('ID') );
            $fields = array(
                'Firstname' => $this->input->post('Firstname'),
                'Middlename' => $this->input->post('Middlename'),
                'Lastname' => $this->input->post('Lastname'),
                'Email' => $this->input->post('Email'),
                'Username' => $this->input->post('Username'),
                'RoleID' => $this->input->post('Role'),
             );
             $query=$this->UserAccountModel->Update($where,$fields);
             $data['success']=false;
             if($query){
                 $data['success']=true;
             }
             echo json_encode($data);
        }
        //getting teacher for dropdown
        public function getTeacher()
        {
            $data['teacher']=$this->UserAccountModel->getTeacher();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        //Soft deleting user
        public function deleteUser()
        {
            $where = array('UserAccountID' => $this->input->post('ID') );
            $query=$this->UserAccountModel->Delete($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
