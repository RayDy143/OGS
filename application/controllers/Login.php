
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserAccountModel');
		$this->load->model('UserLogModel');
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
	//Login: Check if credentials are valid
	public function Authenticate()
	{
		$where = array('Username' => $this->input->post('Username'),'Password'=>$this->input->post('Password'),'IsDeleted'=>0 );
		$data['user']=$this->UserAccountModel->Authenticate($where);
		$data['success']=false;
		if($data['user']){
			$data['success']=true;
			//Setting the session for the user
			$this->session->set_userdata($data['user'][0]);
			//Inserting data to Userlogs
			$fields = array('Action' => 'Login','UserAccountID'=>$_SESSION['UserAccountID'] );
			$this->UserLogModel->Add($fields);
		}
		echo json_encode($data);
	}
	//Change password for First Login
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
	//Logout User
	public function Logout()
	{
		//Inserting data to userlogs
		$fields = array('Action' => 'Logout','UserAccountID'=>$_SESSION['UserAccountID'] );
		$this->UserLogModel->Add($fields);
		//Removing the session for user
		$this->session->sess_destroy();
		//Changing the url to Login
		header('location:'.base_url('index.php/Login'));
	}
}
