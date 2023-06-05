<?php


class Relasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('relasi_model');
        $this->load->model('gejala_model');
        $this->load->model('penyakit_model');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) {
            redirect(base_url());
        }
    }

    public function index($id = null)
    {
        if ($this->input->get("kode_penyakit", true) == null) {
            $kode_penyakit = null;
        } else {
            $kode_penyakit = $this->input->get("kode_penyakit", true);
        }
        $data["gejala"] = $this->gejala_model->list();
        $data["penyakit"] = $this->penyakit_model->list();
        $data["lists"] = $this->relasi_model->list($kode_penyakit);
        $this->load->view("relasi/list", $data);
    }

    public function edit($id_relasi)
    {
        if (!$id_relasi)
            redirect(base_url("relasi"));
        $data["gejala"] = $this->gejala_model->list();
        $data["penyakit"] = $this->penyakit_model->list();
        $data["show"] = $this->relasi_model->show($id_relasi);
        // $data["usr"] = $this->login_model->getUserbySeS();
        $this->load->view("relasi/edit", $data);
    }

    public function create()
    {
        $this->relasi_model->create();
    }

    public function update()
    {
        $this->relasi_model->update();
    }

    public function delete()
    {
        $this->relasi_model->delete();
    }
}
