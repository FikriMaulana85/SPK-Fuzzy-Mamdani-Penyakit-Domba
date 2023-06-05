<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('analisa_model');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data["lists"] = $this->analisa_model->list_peternakan();
        $this->load->view("laporan/list", $data);
    }
}
