<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyakit</title>
    <!-- Main CSS -->
    <?php $this->load->view("layout/css"); ?>
    <!-- Close Main CSS -->
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
                                    <h6 class="card-title">List Data Penyakit</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive" id="tabelpenyakit">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Penyakit</th>
                                            <th>Nama Penyakit</th>
                                            <th>Definisi</th>
                                            <th>Solusi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($lists as $list) : ?>
                                            <tr>
                                                <td>
                                                    <?= $no++; ?>
                                                </td>
                                                <td>
                                                    <?= $list->kode_penyakit ?>
                                                </td>
                                                <td>
                                                    <?= $list->nama_penyakit ?>
                                                </td>
                                                <td>
                                                    <?= $list->definisi_penyakit ?>
                                                </td>
                                                <td>
                                                    <?= $list->solusi_penyakit ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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

    <script>
        // Tampilkan Tabel
        $(document).ready(function() {
            show_table();
        });

        function show_table() {
            $('#tabelpenyakit').DataTable({
                "bDestroy": true,
                "processing": true,
                "responsive": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "className": "dt-left",
                    "targets": "_all",
                    "orderable": false,
                }, ],
                "aLengthMenu": [
                    [5, 25, 50, 100, -1],
                    [5, 25, 50, 100, "All"]
                ],
                "iDisplayLength": 5,
            });
        }
    </script>
</body>

</html>