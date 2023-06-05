<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Peternakan</title>
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
                                    <h6 class="card-title">Form Pendaftaran Peternakan</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($this->session->flashdata('pesan') != null) { ?>
                                    <p class="text-center">
                                        <?= $this->session->flashdata('pesan'); ?>
                                    </p>
                                <?php } ?>
                                <form action="<?= base_url("analisa/create_peternakan"); ?>" method="POST" enctype="multipart/form-data" data-parsley-validate>

                                    <div class="row">
                                        <input type="hidden" name="kode_peternakan" value="PTRN-<?= $kode_peternakan ?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_peternak">Nama Peternak</label>
                                                <input type="text" class="form-control" id="nama_peternak" name="nama_peternak" placeholder="Nama Peternak" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_peternakan">Nama Peternakan</label>
                                                <input type="text" class="form-control" id="nama_peternakan" name="nama_peternakan" placeholder="Nama Peternakan" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email_peternak">e-Mail</label>
                                                <input type="email" class="form-control" id="email_peternak" name="email_peternak" placeholder="farm@house.com" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat_peternakan">Alamat Peternakan</label>
                                                <textarea class="form-control" name="alamat_peternakan" id="alamat_peternakan" cols="5" rows="3" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1"><i class="bi bi-save"></i> Daftar</button>
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