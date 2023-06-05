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
                    <div class="row">
                        <h3 class="text-center">Sistem Pakar Diagnosa Penyakit Pada Domba</h3>
                        <p class="text-center">
                            Sistem pakar diagnosa penyakit pada domba digunakan untuk mendiagnosa gejala-gejala penyakit
                            yang terdapat pada domba, dengan menggunakan metode Metode Fuzzy Mamdani yang merupakan
                            salah satu bagian dari Fuzzy
                            Inference System yang berguna untuk penarikan kesimpulan atau suatu keputusan terbaik dalam
                            permasalahan yang tidak pasti.
                        </p>
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