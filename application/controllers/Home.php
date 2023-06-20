<?php


class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('analisa_model');
        $this->load->model('rules_model');
        $this->load->model('penyakit_model');
        $this->load->model('gejala_model');
        $this->load->helper('fuzzy');
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view("home/home");
    }

    public function penyakit()
    {
        $data["lists"] = $this->penyakit_model->list();
        $this->load->view("home/penyakit", $data);
    }

    public function gejala()
    {
        $data["lists"] = $this->gejala_model->list();
        $this->load->view("home/gejala", $data);
    }

    public function pendaftaran()
    {
        $data["kode_peternakan"] = sprintf("%01s", $this->dashboard_model->TotalPeternakan() + 1);
        $this->load->view("home/daftar", $data);
    }

    public function analisa_gejala()
    {
        if ($this->session->userdata('KODE_PETERNAKAN') == null)
            redirect(base_url("home/pendaftaran"));
        $data["lists"] = $this->gejala_model->list();
        $this->load->view("home/analisa_gejala", $data);
    }

    public function analisa_gejala_lanjutan()
    {
        if ($this->session->userdata('KODE_PETERNAKAN') == null)
            redirect(base_url("home/pendaftaran"));
        $data["lists"] = $this->analisa_model->list_analisa_gejala_lanjutan();
        $this->load->view("home/analisa_gejala_lanjutan", $data);
    }

    public function analisa_hasil($kode_peternakan)
    {
        if (!$kode_peternakan)
            redirect(base_url("home/pendaftaran"));
        // $data["list_relasi_group"] = $this->analisa_model->relasi_group()->result();
        // $data["total_relasi_group"] = $this->analisa_model->relasi_group()->num_rows();
        $this->load->view("home/analisa_hasil");
        	$this->session->unset_userdata('KODE_PETERNAKAN');
    }

    public function analisa_hasil_pdf($kode_peternakan)
    {
        if (!$kode_peternakan)
            redirect(base_url("home/pendaftaran"));
        $this->load->library('pdf');
        $date = date("Y-m-d_H_i_s");
        // $data["list_relasi_group"] = $this->analisa_model->relasi_group()->result();
        // $data["total_relasi_group"] = $this->analisa_model->relasi_group()->num_rows();
        // print_r($this->transaksi_pembelian_model->laporan());
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->loadHtml(ob_get_clean());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Hasil-Analisa-$kode_peternakan-$date.pdf";
        $this->pdf->load_view('home/analisa_hasil_pdf');
    }
}
