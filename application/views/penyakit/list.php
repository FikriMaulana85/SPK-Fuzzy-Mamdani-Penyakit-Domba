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
                                    <h6 class="card-title">List Data Penyakit</h6>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-md btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#tambah_penyakit">
                                        <span class="icon">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Penyakit</span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($this->session->flashdata('pesan') != null) { ?>
                                    <p class="text-center">
                                        <?= $this->session->flashdata('pesan'); ?>
                                    </p>
                                <?php } ?>
                                <table class="table table-responsive" id="tabelpenyakit">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Penyakit</th>
                                            <th>Nama Penyakit</th>
                                            <th>Definisi</th>
                                            <th>Solusi</th>
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
                                                <td><a href="<?= base_url("penyakit/edit/$list->id_penyakit") ?>"> <i class="bi bi-pencil-fill text-primary"></i></a> &nbsp; <i class="bi bi-trash-fill text-danger hapuspenyakit" id_penyakit="<?= $list->id_penyakit ?>"></i></td>
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

    <?php $this->load->view("penyakit/add"); ?>

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

        $(document).delegate('.hapuspenyakit', 'click', function() {
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
                        const id = $(this).attr('id_penyakit');
                        $.ajax({
                            method: 'post',
                            url: "<?= base_url() ?>penyakit/delete",
                            data: {
                                id_penyakit: id,
                            },
                            success: function(result) {
                                json = JSON.parse(result);
                                Swal.fire({
                                    icon: json.status,
                                    text: json.message,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    window.location = "<?= base_url() ?>penyakit";
                                }, 1600);
                            }
                        });
                    }

                });
        });
    </script>
</body>

</html>