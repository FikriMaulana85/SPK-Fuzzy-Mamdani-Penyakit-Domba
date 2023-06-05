<div class="modal fade text-left" id="tambah_penyakit" tabindex="-1" role="dialog" aria-labelledby="tambah_penyakit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Penyakit</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card rounded-0">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="<?= base_url("penyakit/create"); ?>" method="POST" enctype="multipart/form-data" data-parsley-validate>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kode_penyakit">Kode Penyakit</label>
                                                    <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" placeholder="Kode Penyakit" value="P<?= $kode_penyakit ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nama_penyakit">Nama Penyakit</label>
                                                    <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Nama Penyakit" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="definisi_penyakit">Definisi Penyakit</label>
                                                    <textarea class="form-control" cols="5" rows="3" name="definisi_penyakit" placeholder="Definisi Penyakit" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="solusi_penyakit">Solusi Penyakit</label>
                                                    <textarea class="form-control" cols="5" rows="3" name="solusi_penyakit" placeholder="Solusi Penyakit" required></textarea>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>