<?php
    /**
     *
     */
    class Teacher extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('ClassModel');
            $this->load->model('ScoreModel');
            $this->load->model('StudentScoreModel');
        }
        public function Classes()
        {
            if(isset($_SESSION['UserAccountID'])){
                if($_SESSION['RoleID']==2){
                    $data['title']="Teacher Class";
                    $this->load->view('layout/theader',$data);
                    $this->load->view('Teacher/class_view');
                }else{
                    header('location:'.base_url('index.php/UserAccount'));
                }
            }else{
                header('location:'.base_url('index.php/Login'));
            }
        }
        public function ClassRecord($id)
        {
            if(isset($_SESSION['UserAccountID'])){
                if($_SESSION['RoleID']==2){
                    $data['title']="Teacher Class";
                    $data['class']=$this->ClassModel->getSpecificClass($id);
                    $this->load->view('layout/theader',$data);
                    $this->load->view('Teacher/class_record_view');
                }else{
                    header('location:'.base_url('index.php/UserAccount'));
                }
            }else{
                header('location:'.base_url('index.php/Login'));
            }
        }
        public function getClass()
        {
            $data['class']=$this->ClassModel->getClassByTeacher();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function addScore()
        {
            $fields = array(
                'Description' => $this->input->post('Description')
                ,'PerfectScore' => $this->input->post('PerfectScore')
                ,'GradingPeriod' => $this->input->post('GradingPeriod')
               ,'Type' => $this->input->post('Type')
               ,'ClassID' => $this->input->post('ID')
            );
            $query=$this->ScoreModel->Add($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getScore()
        {
            $where = array('Type' => $this->input->post('Type'),'ClassID'=>$this->input->post('ID'),'GradingPeriod'=>$this->input->post('GradingPeriod') );
            $data['score']=$this->ScoreModel->Get($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getStudentScore()
        {
            $where = array('StudentID' => $this->input->post('StudID'),'ScoreID'=> $this->input->post('ScoreID') );
            $data['studscore']=$this->StudentScoreModel->getStudentScore($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function addStudentScore()
        {
            $fields = array('Score' => $this->input->post('Score'),'StudentID'=>$this->input->post('StudID'),'ScoreID'=>$this->input->post('ScoreID') );
            $query=$this->StudentScoreModel->Add($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function updateStudentScore()
        {
            $where = array('StudentScoreID' => $this->input->post('STSID') );
            $fields = array('Score' => $this->input->post('Score'));
            $query=$this->StudentScoreModel->Update($where,$fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
