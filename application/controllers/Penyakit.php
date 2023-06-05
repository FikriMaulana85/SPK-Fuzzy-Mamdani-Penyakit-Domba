<?php


class Penyakit extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('penyakit_model');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data["lists"] = $this->penyakit_model->list();
        $data["kode_penyakit"] = sprintf("%02s", $this->penyakit_model->TotalPenyakit() + 1);
        $this->load->view("penyakit/list", $data);
    }

    public function edit($id_penyakit)
    {
        if (!$id_penyakit)
            redirect(base_url("penyakit"));

        $data["show"] = $this->penyakit_model->show($id_penyakit);
        $data["usr"] = $this->login_model->getUserbySeS();
        $this->load->view("penyakit/edit", $data);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'kode_penyakit',
            'Kode Penyakit',
            'required|is_unique[tbl_penyakit.kode_penyakit]',
            array(
                'is_unique' => '%s sudah ada, masukan kode lain !'
            )
        );
        if ($this->form_validation->run() == true) {
            $this->penyakit_model->create();
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . strip_tags(form_error('kode_penyakit')) . '</div>');
            redirect(site_url("penyakit"));
        }
    }

    public function update()
    {
        $this->penyakit_model->update();
    }

    public function delete()
    {
        $this->penyakit_model->delete();
    }
}
