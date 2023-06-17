<?php
#error_reporting(0); 
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Analisa</title>
    <?php $this->load->view("layout/css"); ?>
</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        <?php $this->load->view("layout/sidebar_home"); ?>
        <!-- Close Sidebar -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="container col-12 col-md-6 offset-md-3">
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title">Hasil Analisa</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- <code class="highlighter-rouge">*Note : Pilih Gejala yang diderita domba.</code> -->
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b>Data yang diinputkan</b></td>
                                        </tr>
                                        <?php
                                        $fuzzyfikasi = $this->db->select("*")->from("tmp_gejala")->join('tbl_gejala', 'tbl_gejala.kode_gejala = tmp_gejala.kode_gejala')->where("kode_peternakan", $this->uri->segment(3))->order_by("tmp_gejala.kode_gejala ASC")->limit("5")->get()->result();
                                        foreach ($fuzzyfikasi as $fuzzyfikasi) :

                                        ?>
                                        <tr>
                                            <td>(<?= $fuzzyfikasi->kode_gejala ?>) - <?= $fuzzyfikasi->desc_gejala ?> :
                                                <?= $fuzzyfikasi->bobot_gejala ?>
                                            </td>
                                        </tr>
                                        <?php
                                            $data_update_anggota = [
                                                'ringan' => AnggotaRingan($fuzzyfikasi->bobot_gejala),
                                                'agak_parah' => AnggotaParah($fuzzyfikasi->bobot_gejala),
                                                'parah' => AnggotaSangatParah($fuzzyfikasi->bobot_gejala),
                                                // 'level_1' => NamaAnggotaRingan($fuzzyfikasi->bobot_gejala),
                                                // 'level_2' => NamaAnggotaParah($fuzzyfikasi->bobot_gejala),
                                                // 'level_3' => NamaAnggotaSangatParah($fuzzyfikasi->bobot_gejala),
                                            ];
                                            $this->db->where("kode_gejala", $fuzzyfikasi->kode_gejala);
                                            $this->db->where("kode_peternakan", $this->uri->segment(3));
                                            $this->db->update("tmp_gejala", $data_update_anggota);
                                        endforeach; ?>
                                        <?php
                                        $get_kode_gejala = $this->db->select("*")->from("tmp_gejala")->where("kode_peternakan", $this->uri->segment(3))->get()->result();
                                        $rules = $this->db->select("*")->from("tbl_rules")
                                            ->where("kode_gejala1", $get_kode_gejala[4]->kode_gejala)
                                            ->where("kode_gejala2", $get_kode_gejala[3]->kode_gejala)
                                            ->where("kode_gejala3", $get_kode_gejala[2]->kode_gejala)
                                            ->where("level_gejala4", $get_kode_gejala[1]->bobot_gejala)
                                            ->where("level_gejala5", $get_kode_gejala[0]->bobot_gejala)
                                            ->get()->result();
                                        // echo $get_kode_gejala[0]->kode_gejala;
                                        $no = 1;
                                        foreach ($rules as $rule) :
                                        ?>
                                        <tr>
                                            <?php
                                                if (count($get_kode_gejala) > 2) {

                                                    $nilai_min = min(
                                                        $this->analisa_model->GetNilaiTmp(
                                                            $rule->kode_gejala1,
                                                            $rule->level_gejala1,
                                                            $this->uri->segment(3)
                                                        ),
                                                        $this->analisa_model->GetNilaiTmp(
                                                            $rule->kode_gejala2,
                                                            $rule->level_gejala2,
                                                            $this->uri->segment(3)
                                                        ),
                                                        $this->analisa_model->GetNilaiTmp(
                                                            $rule->kode_gejala3,
                                                            $rule->level_gejala3,
                                                            $this->uri->segment(3)
                                                        ),
                                                        1,
                                                        1
                                                    );
                                                ?>

                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                            $data = [
                                                'id_tmp_rules' => null,
                                                'kode_peternakan' => $this->uri->segment(3),
                                                'kode_rules' => $rule->kode_rules,
                                                'bobot_rules' => number_format($nilai_min, 2),
                                            ];
                                            // echo $this->rules_model->TmpRulesByID($this->uri->segment(3))->num_rows();
                                            if ($this->rules_model->TmpRulesByID($this->uri->segment(3))->num_rows() <= count($rules)) {
                                                $this->db->insert("tmp_rules", $data);
                                            }
                                        endforeach; ?>

                                        <?php
                                        $agmin = $this->analisa_model->Agregasi($this->uri->segment(3))->min;
                                        $agmax = $this->analisa_model->Agregasi($this->uri->segment(3))->max;
                                        $a1 = area($agmin);
                                        $a2 = area($agmax);
                                        $l1 = luas1($agmin, $a2);
                                        $l2 = luas2($agmin, $agmax, $a1, $a2);
                                        $l3 = luas3($a2, $agmax);
                                        $m1 = momentum1($agmin, $a1);
                                        $m2 = momentum2($a1, $a2);
                                        $m3 = momentum3($a2);
                                        $centroid = centroid($m1, $m2, $m3, $l1, $l2, $l3);
                                        $kesimpulan =  $this->db->select("*")->from("tbl_hasil")->join('tbl_penyakit', 'tbl_penyakit.nama_penyakit = tbl_hasil.nama_penyakit')->join('tbl_peternakan', 'tbl_peternakan.kode_peternakan = tbl_hasil.kode_peternakan')->where("tbl_hasil.kode_peternakan", $this->uri->segment(3))->get()->row();
                                        ?>
                                        <tr>
                                            <td>=============================================================</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>DATA PETERNAKAN</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Nama Peternak : <?= $kesimpulan->nama_peternak ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Nama Peternakan : <?= $kesimpulan->nama_peternakan ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Email : <?= $kesimpulan->email_peternak ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Alamat Peternakan : <?= $kesimpulan->alamat_peternakan ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>=============================================================</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>KESIMPULAN</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                Kesimpulan :
                                                Terdiagnosa Penyakit <?= $kesimpulan->nama_penyakit ?> sebesar
                                                <?= $centroid ?>%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Definisi Penyakit : <?= $kesimpulan->definisi_penyakit ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Solusi : <?= $kesimpulan->solusi_penyakit ?>
                                            </td>
                                        </tr>

                                        <?php

                                        $data_simpan_hasil = [
                                            'id_hasil' => null,
                                            'kode_peternakan' => $this->uri->segment(3),
                                            'nama_penyakit' => $rule->nama_penyakit,
                                            'nilai_fuzzy' => $centroid,
                                            'tanggal_hasil' => date("Y-m-d")
                                        ];
                                        $check_hasil = $this->db->select("*")->from("tbl_hasil")->where("kode_peternakan", $this->uri->segment(3))->get()->num_rows();
                                        if ($check_hasil == 0) {
                                            $this->db->insert("tbl_hasil", $data_simpan_hasil);
                                        }
                                        ?>

                            </div>
                            </table>
                            <div class="col-sm-12 d-flex justify-content-center">
                                <a href="<?= base_url("home/analisa_hasil_pdf/" . $this->uri->segment(3)) ?>"
                                    class="btn btn-success btn-sm">Download</a>
                            </div>
                        </div>
                </section>
            </div>

            <!-- Footer -->
            <?php $this->load->view("layout/footer"); ?>
            <!-- Close Footer -->
        </div>
    </div>

    <!-- Main JS -->
    <?php $this->load->view("layout/js"); ?>
    <!-- Close Main JS -->

</body>

</html>