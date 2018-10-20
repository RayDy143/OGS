
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserAccountModel');
	}
	public function index()
	{
		if(isset($_SESSION['UserAccountID'])){
			if($_SESSION['IsFirstLogin']==0){
				header('location:'.base_url('index.php/UserAccount'));
			}else{
				$this->load->view('login_view');
			}
		}else{
			$this->load->view('login_view');
		}
	}
	public function Authenticate()
	{
		$where = array('Username' => $this->input->post('Username'),'Password'=>$this->input->post('Password'),'IsDeleted'=>0 );
		$data['user']=$this->UserAccountModel->Authenticate($where);
		$data['success']=false;
		if($data['user']){
			$data['success']=true;
			$this->session->set_userdata($data['user'][0]);
		}
		echo json_encode($data);
	}
	public function ChangePass()
	{
		$where = array('UserAccountID' => $this->input->post('ID') );
		$fields = array('Password' => $this->input->post('NewPass'),'IsFirstLogin'=>0 );
		$query=$this->UserAccountModel->Update($where,$fields);
		$data['success']=false;
		if($query){
			$data['success']=true;
		}
		echo json_encode($data);
	}
	public function Logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url('index.php/Login'));
	}
}
