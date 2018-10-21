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
        //Getting class information
        public function getClass()
        {
            $data['class']=$this->ClassModel->getClassByTeacher();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        //Adding score
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
        //Getting the score
        public function getScore()
        {
            $where = array('Type' => $this->input->post('Type'),'ClassID'=>$this->input->post('ID'),'GradingPeriod'=>$this->input->post('GradingPeriod'),'IsDeleted'=>0 );
            $data['score']=$this->ScoreModel->Get($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        //Getting student score
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
        //Inserting Student Score
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
        //Update student score
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
        //Get score type total
        public function getTypeTotal()
        {
            $data['type']=$this->ScoreModel->getTypeTotal($this->input->post("ClassID"),$this->input->post("GradingPeriod"),$this->input->post("Type"));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        //Soft deletion score
        public function deleteScore()
        {
            $where = array('ScoreID' => $this->input->post('ID') );
            $query=$this->ScoreModel->Delete($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        //Getting student total score
        public function getStudentTotalScore()
        {
            $data['studentscore']=$this->StudentScoreModel->getStudentTotalScore($this->input->post("ClassID"),$this->input->post("GradingPeriod"),$this->input->post("Type"),$this->input->post("StudentID"));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
