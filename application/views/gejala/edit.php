<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Gejala</title>
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
                                    <h6 class="card-title"><i class="bi bi-arrow-left-square-fill text-primary" onclick="history.back()"></i> Ubah Data Gejala</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($this->session->flashdata('pesan') != null) { ?>
                                    <p class="text-center">
                                        <?= $this->session->flashdata('pesan'); ?>
                                    </p>
                                <?php } ?>
                                <form action="<?= base_url("gejala/update"); ?>" method="POST" enctype="multipart/form-data" data-parsley-validate>
                                    <div class="row">
                                        <input type="hidden" name="id_gejala" value="<?= $show->id_gejala ?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kode_gejala">Kode Gejala</label>
                                                <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" placeholder="Kode Gejala" value="<?= $show->kode_gejala ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="desc_gejala">Gejala</label>
                                                <input type="text" class="form-control" id="desc_gejala" name="desc_gejala" placeholder="Gejala" value="<?= $show->desc_gejala ?>" required>
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