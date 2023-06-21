<?php


class Analisa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('analisa_model');
        $this->load->model('penyakit_model');
        $this->load->model('gejala_model');
        $this->load->helper('fuzzy');
        $this->load->model('login_model');
    }


    public function create_peternakan()
    {
        $this->analisa_model->create_peternakan();
    }



    public function create_gejala()
    {
        if ($this->session->userdata('KODE_PETERNAKAN') == null)
            redirect(base_url("home/pendaftaran"));
        $this->analisa_model->create_gejala();
    }

    public function update_gejala()
    {
        if ($this->session->userdata('KODE_PETERNAKAN') == null)
            redirect(base_url("home/pendaftaran"));
        $this->analisa_model->update_gejala();
    }

    public function delete($kode_peternakan)
    {
        if ($kode_peternakan == null)
            redirect(base_url("laporan"));
        $this->analisa_model->delete($kode_peternakan);
    }

    public function reset()
    {
        $this->analisa_model->reset();
    }
}
