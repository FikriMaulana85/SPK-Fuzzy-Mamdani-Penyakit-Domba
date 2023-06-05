<?php

class Gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gejala_model');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data["lists"] = $this->gejala_model->list();
        $data["kode_gejala"] = sprintf("%02s", $this->gejala_model->TotalGejala() + 1);
        $this->load->view("gejala/list", $data);
    }

    public function edit($id_gejala)
    {
        if (!$id_gejala)
            redirect(base_url("gejala"));

        $data["show"] = $this->gejala_model->show($id_gejala);
        $data["usr"] = $this->login_model->getUserbySeS();
        $this->load->view("gejala/edit", $data);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'kode_gejala',
            'Kode Gejala',
            'required|is_unique[tbl_gejala.kode_gejala]',
            array(
                'is_unique' => '%s sudah ada, masukan kode lain !'
            )
        );
        if ($this->form_validation->run() == true) {
            $this->gejala_model->create();
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . strip_tags(form_error('kode_gejala')) . '</div>');
            redirect(site_url("gejala"));
        }
    }

    public function update()
    {
        $this->gejala_model->update();
    }

    public function delete()
    {
        $this->gejala_model->delete();
    }
}