<?php


class Rules extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('rules_model');
        $this->load->model('penyakit_model');
        $this->load->model('gejala_model');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data["lists"] = $this->rules_model->list();
        $data["kode_rules"] = sprintf("%02s", $this->rules_model->TotalRules() + 1);
        $data["gejala"]  = $this->gejala_model->list();
        $data["gejala2"]  = $this->gejala_model->list();
        $data["penyakit"]  = $this->penyakit_model->list();
        $this->load->view("rules/list", $data);
    }

    public function edit($id_rules)
    {
        if (!$id_rules)
            redirect(base_url("rules"));

        $data["show"] = $this->rules_model->show($id_rules);
        $data["usr"] = $this->login_model->getUserbySeS();
        $this->load->view("rules/edit", $data);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'kode_rules',
            'Kode Rules',
            'required|is_unique[tbl_rules.kode_rules]',
            array(
                'is_unique' => '%s sudah ada, masukan kode lain !'
            )
        );
        if ($this->form_validation->run() == true) {
            $this->rules_model->create();
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . strip_tags(form_error('kode_rules')) . '</div>');
            redirect(site_url("rules"));
        }
    }

    public function update()
    {
        $this->rules_model->update();
    }

    public function delete()
    {
        $this->rules_model->delete();
    }
}
