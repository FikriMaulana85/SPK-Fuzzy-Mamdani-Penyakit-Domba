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
        <?php $this->load->view("layout/sidebar"); ?>
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
                                            <td>
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>FUZZYFIKASI</h6>
                                            </td>
                                        </tr>
                                        <?php
                                        $fuzzyfikasi = $this->db->select("*")->from("tmp_gejala")->where("kode_peternakan", $this->uri->segment(3))->get()->result();

                                        foreach ($fuzzyfikasi as $fuzzyfikasi) :
                                            if ($fuzzyfikasi->bobot_gejala <= 30) {
                                                //Ringan
                                                $jenis_anggota = "Rendah";
                                                $keanggotaan = round((30 - $fuzzyfikasi->bobot_gejala) / (30 - 15), 1);
                                            } elseif ($fuzzyfikasi->bobot_gejala > 30 && $fuzzyfikasi->bobot_gejala <= 60) {
                                                //Sedang
                                                $jenis_anggota = "Sedang";
                                                $keanggotaan = round((60 - $fuzzyfikasi->bobot_gejala) / (60 - 45), 1);
                                            } elseif ($fuzzyfikasi->bobot_gejala > 60 && $fuzzyfikasi->bobot_gejala <= 100) {
                                                //Tinggi
                                                $jenis_anggota = "Tinggi";
                                                $keanggotaan = round(($fuzzyfikasi->bobot_gejala - 60) / (60 - 45), 1);
                                            }
                                        ?>
                                            <tr>
                                                <td>Input Range Gejala (<?= $fuzzyfikasi->kode_gejala ?>) :
                                                    <?= $fuzzyfikasi->bobot_gejala ?> | x (<?= $jenis_anggota ?>):
                                                    <?= $keanggotaan ?>
                                                </td>
                                            </tr>
                                            <!-- 
                                        <tr>
                                            <td>
                                            </td>
                                        </tr> -->
                                        <?php endforeach; ?>

                                        <!-- <tr class="text-success" style="padding-bottom:-10px !important;">
                                            <td>Rendah : 10-30</td>
                                        </tr>
                                        <tr class="text-warning" style="padding-bottom:-10px !important;">
                                            <td>Sedang : 30-60</td>
                                        </tr>
                                        <tr class="text-danger" style="padding-bottom:-10px !important;">
                                            <td>Tinggi : 60-90 </td>
                                        </tr> -->
                                        <tr>
                                            <td>
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>RULE</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                IF G02 AND G03 AND G06 AND G11 AND G12 AND G13 AND G14 AND G25 AND G26
                                                THEN P01</td>
                                        </tr>
                                        <tr>
                                            <td>IFG01 AND G02 AND G04 AND G05 AND G32 AND G33 AND G34 THEN P02</td>
                                        </tr>
                                        <tr>
                                            <td>IF G02 AND G06 AND G12 AND G13 AND G35 THEN P03</td>
                                        </tr>
                                        <tr>
                                            <td>IF G01 AND G19 AND G20 AND G21 AND G22 AND G23 G39 THEN P04</td>
                                        </tr>
                                        <tr>
                                            <td>IF G01 AND G02 AND G03 AND G05 AND G07 AND G08 AND G09 AND G10 AND G11
                                                AND G14 AND G15 AND G24 AND G38 THEN P05</td>
                                        </tr>
                                        <tr>
                                            <td>IF G06 AND G07 AND G27 AND G28 AND G40 AND THEN P06</td>
                                        </tr>
                                        <tr>
                                            <td>IF G08 AND G16 AND G17 AND G18 AND G37 THEN P07</td>
                                        </tr>
                                        <tr>
                                            <td>IF G08 AND G15 AND G29 AND G30 THEN P08</td>
                                        </tr>
                                        <tr>
                                            <td>IF G01 AND G02 AND G03 AND G08 AND G12 AND G31 THEN P09</td>
                                        </tr>
                                        <tr>
                                            <td>IF G01 AND G02 AND G03 AND 05 AND G07 AND G08 AND G09 AND G10 AND G36
                                                THEN P10</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <hr>
                                            </td>
                                        </tr>
                                        <?php
                                        $i = 0;
                                        $sql_relasi = $this->db->query("SELECT * FROM tbl_relasi GROUP BY kode_penyakit")->result();
                                        foreach ($list_relasi_group as $list_relasi_group) {
                                            $query_gejala = $this->db->select("*")->from("tbl_relasi")->where("kode_penyakit", $list_relasi_group->kode_penyakit)->order_by("kode_gejala ASC")->get()->result();
                                            $sql_sum_kode_penyakit = $this->db->select("*")->select_sum('bobot', 'total_bobot')->from("tbl_relasi")->where("kode_penyakit", $list_relasi_group->kode_penyakit)->get()->row();
                                            $SUMbobot = $sql_sum_kode_penyakit->total_bobot;
                                            $bobotRelasi = $list_relasi_group->bobot;
                                            $var1 = 0;
                                            $var2 = 0;
                                            // print_r($sql_sum_kode_penyakit);
                                            // echo "<br> --------------" . $list_relasi_group->kode_penyakit . "--------------<br>";
                                            foreach ($query_gejala as $query_gejala) {
                                                $query_tmp_gejala = $this->db->select("*")->from("tmp_gejala")->where("kode_gejala", $query_gejala->kode_gejala)->where("kode_peternakan", $this->uri->segment(3))->get()->num_rows();
                                                // print_r($query_gejala->kode_gejala);
                                                if ($query_tmp_gejala != 0) {
                                                    //Jika ada data dikali 1
                                                    // echo "- Ada";
                                                    $bobotNilai = $bobotRelasi * 1;
                                                    $HasilKaliSatu;
                                                    $var1 += $bobotNilai / $SUMbobot;
                                                    $nilaip = substr($var1, 0, 5);
                                                } else {
                                                    // echo "- Tidak Ada";
                                                    $bobotNilai = $bobotRelasi * 0;
                                                    $var2 += $bobotNilai + $bobotNilai;
                                                }
                                                // echo "<br>";
                                            }

                                            $insert_tmp_penyakit = [
                                                'id_tmp_penyakit' => null,
                                                'kode_peternakan' => $this->uri->segment(3),
                                                'kode_penyakit' => $list_relasi_group->kode_penyakit,
                                                'bobot_penyakit' => $var1
                                            ];
                                            $check_tmp_penyakit = $this->db->select("*")->from("tmp_penyakit")->where("kode_peternakan", $this->uri->segment(3))->get()->num_rows();
                                            if ($check_tmp_penyakit < 10) {
                                                $this->db->insert("tmp_penyakit", $insert_tmp_penyakit);
                                            }

                                            $nilaiMix = $this->db->select("kode_penyakit, MAX(bobot_penyakit)")->from("tmp_penyakit")->where("kode_peternakan", $this->uri->segment(3))->group_by("bobot_penyakit")->order_by("bobot_penyakit DESC")->get()->result();
                                            // print_r($nilaiMix);
                                        }
                                        ?>

                                        <?php
                                        $SUMbobot_penyakit = $this->db->select("*")->select_sum('bobot_penyakit', 'total_bobot_penyakit')->from("tmp_penyakit")->where("kode_peternakan", $this->uri->segment(3))->get()->row();
                                        $SUMbobot_penyakit = $SUMbobot_penyakit->total_bobot_penyakit;
                                        $tmp_penyakit = $this->db->select("*")->from("tmp_penyakit")->where("bobot_penyakit !=", 0)->where("kode_peternakan", $this->uri->segment(3))->order_by("bobot_penyakit DESC")->limit(1)->get()->result();
                                        foreach ($tmp_penyakit as $tmp_penyakit) {
                                            $bobot_tmp_penyakit = $tmp_penyakit->bobot_penyakit;
                                            $persen = substr($bobot_tmp_penyakit / $SUMbobot_penyakit *
                                                100, 0, 5);
                                            // SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kd_pen2'
                                            $sql_penyakit_solusi = $this->db->select("*")->from("tbl_penyakit")->where("kode_penyakit", $tmp_penyakit->kode_penyakit)->get()->row();
                                        }
                                        ?>
                                        <tr>
                                            <td>DEFUZZYFIKASI (METODE CENTROID) :
                                                (<?= $bobot_tmp_penyakit ?>) / (<?= $SUMbobot_penyakit ?>) * 100 </td>
                                        </tr>
                                        <tr>
                                            <td>NILAI AKHIR FUZZY : <?= $persen ?> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <hr>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                                $sql_peternak = $this->db->select("*")->from("tbl_peternakan")->where("kode_peternakan", $this->uri->segment(3))->get()->row();
                                $gejala = $this->db->select("*")->from("tmp_gejala")->join('tbl_gejala', 'tbl_gejala.kode_gejala = tmp_gejala.kode_gejala')->where("kode_peternakan", $this->uri->segment(3))->get()->result();
                                $data_simpan_hasil = [
                                    'id_hasil' => null,
                                    'kode_peternakan' => $sql_peternak->kode_peternakan,
                                    'kode_penyakit' => $sql_penyakit_solusi->kode_penyakit,
                                    'nilai_fuzzy' => $persen,
                                    'tanggal_hasil' => date("Y-m-d")
                                ];
                                $check_hasil = $this->db->select("*")->from("tbl_hasil")->where("kode_peternakan", $this->uri->segment(3))->get()->num_rows();
                                if ($check_hasil == 0) {
                                    $this->db->insert("tbl_hasil", $data_simpan_hasil);
                                }
                                ?>
                                <h6>IDENTITAS PETERNAKAN</h6>
                                <div class="row">
                                    <div class="col-4">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Nama Peternak
                                                    </td>
                                                    <td>
                                                        <?= $sql_peternak->nama_peternak ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Nama Peternakan
                                                    </td>
                                                    <td>
                                                        <?= $sql_peternak->nama_peternakan ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Alamat
                                                    </td>
                                                    <td>
                                                        <?= $sql_peternak->alamat_peternakan ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Email
                                                    </td>
                                                    <td>
                                                        <?= $sql_peternak->email_peternak ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <h6>GEJALA</h6>
                                <div class="row">
                                    <div class="col-8">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>Kode Gejala</td>
                                                    <td>Gejala</td>
                                                    <td>Range Gejala</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($gejala as $gejala) : ?>
                                                    <tr>
                                                        <td><?= $gejala->kode_gejala ?></td>
                                                        <td><?= $gejala->desc_gejala ?></td>
                                                        <td><?= $gejala->bobot_gejala ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <h6>HASIL DIAGNOSA</h6>
                                <table class="table table-responsive table-bordered">
                                    <thead>
                                        <tr>
                                            <td>
                                                Nilai Fuzzy
                                            </td>
                                            <td>
                                                Nama Penyakit
                                            </td>
                                            <td>
                                                Solusi Pengobatan
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?= $persen ?>
                                            </td>
                                            <td>
                                                <?= $sql_penyakit_solusi->nama_penyakit ?>
                                            </td>
                                            <td>
                                                <?= $sql_penyakit_solusi->solusi_penyakit ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-center">
                                <a href="<?= base_url("home/analisa_hasil_pdf/" . $this->uri->segment(3)) ?>" class="btn btn-success btn-sm">Download</a>
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