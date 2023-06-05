<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Analisa Gejala</title>
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
                                    <h6 class="card-title">Pilih Gejala</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <code class="highlighter-rouge">*Note : Masukan nilai 1-100 untuk Range Gejala dengan intensitas nilai 10-30 Rendah,
                                    30-60 Sedang ,60-90 Tinggi</code>
                                <form class="form-group" method="POST" action="<?= base_url("analisa/update_gejala") ?>">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Checkist</th>
                                                <th>Gejala</th>
                                                <th>Range Gejala</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($lists as $list) : ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $list->desc_gejala ?>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="kode_gejala[]" value="<?= $list->kode_gejala ?>" readonly>
                                                        <input class="form-control" type="text" name="range_gejala[]" placeholder="Input Nilai 1-100">
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary mr-2">Simpan Range Gejala</button>
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

</body>
<script>
    // Tampilkan Tabel
    $(document).ready(function() {
        show_table();
    });

    function show_table() {
        $('#tabelgejala').DataTable({
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
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "iDisplayLength": 50,
        });
    }
</script>

</html>