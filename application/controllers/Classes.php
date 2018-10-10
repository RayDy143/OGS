<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/class_view');
    }

}
