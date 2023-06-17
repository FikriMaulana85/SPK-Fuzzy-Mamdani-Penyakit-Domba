<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Main CSS -->
    <?php $this->load->view("layout/css"); ?>
    <!-- Close Main CSS -->

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/shared/iconly.css">
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
                <h3>Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <h3 class="text-center">Sistem Pakar Diagnosa Penyakit Pada Domba</h3>
                            <p class="text-center">
                                Sistem pakar diagnosa penyakit kulit pada domba digunakan untuk mendiagnosa
                                gejala-gejala
                                penyakit
                                yang terdapat pada domba, dengan menggunakan metode Metode Fuzzy Mamdani yang merupakan
                                salah satu bagian dari Fuzzy
                                Inference System yang berguna untuk penarikan kesimpulan atau suatu keputusan terbaik
                                dalam
                                permasalahan yang tidak pasti.
                            </p>
                        </div>
                    </div>

                    <!-- Main JS -->
                    <?php $this->load->view("layout/js"); ?>
                    <!-- Close Main JS -->
</body>

</html>