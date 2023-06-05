<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Relasi</title>
    <?php $this->load->view("layout/css"); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                    <h6 class="card-title"><i class="bi bi-arrow-left-square-fill text-primary" onclick="history.back()"></i> Ubah Data Relasi</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($this->session->flashdata('pesan') != null) { ?>
                                    <p class="text-center">
                                        <?= $this->session->flashdata('pesan'); ?>
                                    </p>
                                <?php } ?>
                                <form action="<?= base_url("relasi/update"); ?>" method="POST" enctype="multipart/form-data" data-parsley-validate>

                                    <div class="row">
                                        <input type="hidden" name="id_relasi" value="<?= $show->id_relasi ?>" readonly="true">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kode_penyakit">Penyakit</label>
                                                <select class="choices form-control" name="kode_penyakit" required>
                                                    <option value="<?= $show->kode_penyakit ?> | <?= $show->nama_penyakit ?>" selected> (<?= $show->kode_penyakit ?>)
                                                        <?= $show->nama_penyakit ?></option>
                                                    <?php foreach ($penyakit as $penyakit) : ?>
                                                        <option value="<?= $penyakit->kode_penyakit ?> | <?= $penyakit->nama_penyakit ?>">
                                                            (<?= $penyakit->kode_penyakit ?>)
                                                            <?= $penyakit->nama_penyakit ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kode_gejala">Gejala</label>
                                                <select class="choices form-control" name="kode_gejala" required>
                                                    <option value="<?= $show->kode_gejala ?> | <?= $show->desc_gejala ?>" selected> (<?= $show->kode_gejala ?>)
                                                        <?= $show->desc_gejala ?></option>
                                                    <?php foreach ($gejala as $gejala) : ?>
                                                        <option value="<?= $gejala->kode_gejala ?> | <?= $gejala->desc_gejala ?>">
                                                            (<?= $gejala->kode_gejala ?>)
                                                            <?= $gejala->desc_gejala ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bobot">Bobot</label>
                                                <input type="number" class="form-control" id="bobot" name="bobot" placeholder="Bobot" value="<?= $show->bobot ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1"><i class="bi bi-save"></i> Ubah</button>
                                        </div>

                                    </div>
                                </form>
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

    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/extensions/parsleyjs/parsley.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/parsley.js"></script>
</body>

</html>