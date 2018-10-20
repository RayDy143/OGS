<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ClassModel');
    }

    function index()
    {
        $data['usernav']="";
        $data['classnav']="active";
        $data['title']="Classes";
        $this->load->view('layout/header',$data);
        $this->load->view('admin/class_view');
    }
    public function Add()
    {
        $fields = array(
            'Section' => $this->input->post('Section'),
            'Subject' => $this->input->post('Subject'),
            'YearLevel' => $this->input->post('YearLevel'),
            'UserID' => $this->input->post('Teacher'),
            'WW' => $this->input->post('WrittenWork'),
            'PT' => $this->input->post('PerformanceTask'),
            'QA' => $this->input->post('QuarterlyAssesment')
         );
         $query=$this->ClassModel->Add($fields);
         $data['success']=false;
         if($query){
             $data['success']=true;
         }
         echo json_encode($data);
    }
    public function getClass()
    {
        $data['class']=$this->ClassModel->getClass();
        $data['success']=false;
        if($data){
            $data['success']=true;
        }
        echo json_encode($data);
    }
}
