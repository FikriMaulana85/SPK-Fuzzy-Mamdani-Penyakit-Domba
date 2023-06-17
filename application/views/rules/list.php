<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rules</title>
    <!-- Main CSS -->
    <?php $this->load->view("layout/css"); ?>
    <!-- Close Main CSS -->
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
                                    <h6 class="card-title">List Data Rules</h6>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-md btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#tambah_rules">
                                        <span class="icon">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Rules</span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($this->session->flashdata('pesan') != null) { ?>
                                    <p class="text-center">
                                        <?= $this->session->flashdata('pesan'); ?>
                                    </p>
                                <?php } ?>
                                <table class="table table-responsive" id="tabelrules">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Rules</th>
                                            <th>Rule</th>
                                            <th>Aksi</th>
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
                                                    <?= $list->kode_rules ?>
                                                </td>
                                                <td>
                                                    IF <?= $list->kode_gejala1 ?> <?= $list->level_gejala1 ?> AND
                                                    <?= $list->kode_gejala2 ?> <?= $list->level_gejala2 ?> AND
                                                    <?= $list->kode_gejala3 ?> <?= $list->level_gejala3 ?> AND
                                                    <?= $list->kode_gejala4 ?> <?= $list->level_gejala4 ?> AND
                                                    <?= $list->kode_gejala5 ?> <?= $list->level_gejala5 ?> THEN
                                                    <?= $list->nama_penyakit ?>
                                                </td>
                                                <td> <i class="bi bi-trash-fill text-danger hapusrules" id_rules="<?= $list->id_rules ?>"></i></td>
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

    <?php $this->load->view("rules/add"); ?>

    <!-- Main JS -->
    <?php $this->load->view("layout/js"); ?>
    <!-- Close Main JS -->

    <script>
        // Tampilkan Tabel
        $(document).ready(function() {
            show_table();
        });

        function show_table() {
            $('#tabelrules').DataTable({
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
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
                "iDisplayLength": 25,
            });
        }

        $(document).delegate('.hapusrules', 'click', function() {
            Swal.fire({
                    title: "Yakin ingin menghapus?",
                    text: "Data yang telah dihapus tidak dapat dikembalikan !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                })
                .then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        const id = $(this).attr('id_rules');
                        $.ajax({
                            method: 'post',
                            url: "<?= base_url() ?>rules/delete",
                            data: {
                                id_rules: id,
                            },
                            success: function(result) {
                                json = JSON.parse(result);
                                Swal.fire({
                                    icon: json.status,
                                    text: json.message,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    window.location = "<?= base_url() ?>rules";
                                }, 1600);
                            }
                        });
                    }

                });
        });
    </script>
</body>

</html>