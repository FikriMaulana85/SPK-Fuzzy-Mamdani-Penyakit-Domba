<?php


class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view("dashboard/index");
    }
}
