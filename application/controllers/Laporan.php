<?php

class Laporan extends CI_Controller
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
        if ($this->login_model->isNotLogin()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data["lists"] = $this->analisa_model->list_peternakan();
        $this->load->view("laporan/list", $data);
    }

    public function penghitungan($kode_peternakan)
    {
        if (!$kode_peternakan)
            redirect(base_url("laporan"));
        $data["list_relasi_group"] = $this->analisa_model->relasi_group()->result();
        $data["total_relasi_group"] = $this->analisa_model->relasi_group()->num_rows();
        $this->load->view("laporan/penghitungan", $data);
    }

    public function penghitungan_pdf($kode_peternakan)
    {
        if (!$kode_peternakan)
            redirect(base_url("home/pendaftaran"));
        $this->load->library('pdf');
        $date = date("Y-m-d_H_i_s");
        $data["list_relasi_group"] = $this->analisa_model->relasi_group()->result();
        $data["total_relasi_group"] = $this->analisa_model->relasi_group()->num_rows();
        // print_r($this->transaksi_pembelian_model->laporan());
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->loadHtml(ob_get_clean());
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Hasil-Analisa-$kode_peternakan-$date.pdf";
        $this->pdf->load_view('laporan/penghitungan_pdf', $data);
    }
}
