<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>

<body>
    <div class=" card-body">
        <h3 style="text-align: center;">HASIL ANALISA</h3>
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
                <tr>
                    <td><b>Keanggotaan</b></td>
                </tr>
                <?php
                $fuzzyfikasi = $this->db->select("*")->from("tmp_gejala")->where("kode_peternakan", $this->uri->segment(3))->order_by("kode_gejala ASC")->limit("3")->get()->result();
                foreach ($fuzzyfikasi as $fuzzyfikasi) :

                ?>
                <tr>
                    <td>Input Range Gejala (<?= $fuzzyfikasi->kode_gejala ?>) :
                        <?= $fuzzyfikasi->bobot_gejala ?>
                    </td>
                </tr>
                <tr>
                    <td><?= NamaAnggotaRingan($fuzzyfikasi->bobot_gejala) ?> :
                        <?= AnggotaRingan($fuzzyfikasi->bobot_gejala) ?></td>
                </tr>
                <tr>
                    <td><?= NamaAnggotaParah($fuzzyfikasi->bobot_gejala) ?> :
                        <?= AnggotaParah($fuzzyfikasi->bobot_gejala) ?></td>
                </tr>
                <tr>
                    <td><?= NamaAnggotaSangatParah($fuzzyfikasi->bobot_gejala) ?> :
                        <?= AnggotaSangatParah($fuzzyfikasi->bobot_gejala) ?>
                    </td>
                </tr>
                <tr>
                    <td>=============================================================</td>
                </tr>
                <?php
                    $data_update_anggota = [
                        'ringan' => AnggotaRingan($fuzzyfikasi->bobot_gejala),
                        'agak_parah' => AnggotaParah($fuzzyfikasi->bobot_gejala),
                        'parah' => AnggotaSangatParah($fuzzyfikasi->bobot_gejala),
                        'level_1' => NamaAnggotaRingan($fuzzyfikasi->bobot_gejala),
                        'level_2' => NamaAnggotaParah($fuzzyfikasi->bobot_gejala),
                        'level_3' => NamaAnggotaSangatParah($fuzzyfikasi->bobot_gejala),
                    ];
                    $this->db->where("kode_gejala", $fuzzyfikasi->kode_gejala);
                    $this->db->where("kode_peternakan", $this->uri->segment(3));
                    $this->db->update("tmp_gejala", $data_update_anggota);
                endforeach; ?>

                <?php
                $fuzzyfikasi1 = $this->db->select("*")->from("tmp_gejala")->where("kode_peternakan", $this->uri->segment(3))->order_by("kode_gejala ASC")->get()->result();
                ?>
                <tr>
                    <td>Input Range Gejala (<?= $fuzzyfikasi1[3]->kode_gejala ?>) :
                        <?= $fuzzyfikasi1[3]->bobot_gejala ?> = 1
                    </td>
                </tr>
                <tr>
                    <td>=============================================================</td>
                </tr>
                <tr>
                    <td>Input Range Gejala (<?= $fuzzyfikasi1[4]->kode_gejala ?>) :
                        <?= $fuzzyfikasi1[4]->bobot_gejala ?> = 1
                    </td>
                </tr>
                <tr>
                    <td>=============================================================</td>
                </tr>

                <tr>
                    <td>
                        <h6>RULE</h6>
                    </td>
                </tr>
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
                    <td><?= $rule->kode_rules . " " . $rule->kode_gejala1 . " " . strtoupper($rule->level_gejala1) . " AND " . $rule->kode_gejala2 . " " . strtoupper($rule->level_gejala2) . " AND " . $rule->kode_gejala3 . " " . strtoupper($rule->level_gejala3) . " AND " . $rule->kode_gejala4 . " " . strtoupper($rule->level_gejala4) . " AND " . $rule->kode_gejala5 . " " . strtoupper($rule->level_gejala5) .  " THEN " . strtoupper($rule->nama_penyakit)
                                ?>
                        :
                        <?= min($this->analisa_model->GetNilaiTmp($rule->kode_gejala1, $rule->level_gejala1, $this->uri->segment(3)), $this->analisa_model->GetNilaiTmp($rule->kode_gejala2, $rule->level_gejala2, $this->uri->segment(3)), $this->analisa_model->GetNilaiTmp($rule->kode_gejala3, $rule->level_gejala3, $this->uri->segment(3)), 1, 1) ?>
                    </td>
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
                <tr>
                    <td>=============================================================</td>
                </tr>


                <tr>
                    <td>
                        <h6>AGREGASI</h6>
                    </td>
                </tr>
                <tr>
                    <td>
                        AGREGASI = MAX(<?php
                                        foreach ($this->rules_model->TmpRulesByID($this->uri->segment(3))->result() as $nilai) {
                                            echo $nilai->bobot_rules;
                                            if ($no < count($rules) + 1) {
                                                echo ",";
                                            }
                                            $no++;
                                        }
                                        ?>) =
                        <?= number_format($this->analisa_model->Agregasi($this->uri->segment(3))->max, 2) ?>
                    </td>
                </tr>
                <?php
                $agmin = number_format($this->analisa_model->Agregasi($this->uri->segment(3))->min, 2);
                $agmax = number_format($this->analisa_model->Agregasi($this->uri->segment(3))->max, 2);
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
                        <h6>AREA</h6>
                    </td>
                </tr>
                <tr>
                    <td>
                        AREA<sub>1</sub> = <?= $a1 ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        AREA<sub>2</sub> = <?= $a2 ?>
                    </td>
                </tr>
                <tr>
                    <td>=============================================================</td>
                </tr>
                <tr>
                    <td>
                        <h6>LUAS</h6>
                    </td>
                </tr>
                <tr>
                    <td>
                        LUAS<sub>1</sub> = <?= $l1 ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        LUAS<sub>2</sub> = <?= $l2 ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        LUAS<sub>3</sub> = <?= $l3 ?>
                    </td>
                </tr>
                <tr>
                    <td>=============================================================</td>
                </tr>
                <tr>
                    <td>
                        <h6>MOMENTUM</h6>
                    </td>
                </tr>
                <tr>
                    <td>
                        MOMENTUM<sub>1</sub> = <?= $m1 ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        MOMENTUM<sub>2</sub> = <?= $m2 ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        MOMENTUM<sub>3</sub> = <?= $m3 ?>
                    </td>
                </tr>
                <tr>
                    <td>=============================================================</td>
                </tr>
                <tr>
                    <td>
                        <h6>CENTROID</h6>
                    </td>
                </tr>
                <tr>
                    <td>
                        CENTROID = <?= $centroid ?>
                    </td>
                </tr>
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
        </table>
    </div>
</body>

</html>