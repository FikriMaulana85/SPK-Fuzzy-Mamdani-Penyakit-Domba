<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login/index');
	}

	public function cek_login()
	{
		$this->login_model->login();
	}

	public function logout()
	{
		$this->session->unset_userdata('SES-FUZZY');
		redirect(site_url('login'));
	}
}
