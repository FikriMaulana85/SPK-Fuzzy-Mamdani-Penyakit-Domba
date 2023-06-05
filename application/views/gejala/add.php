<div class="modal fade text-left" id="tambah_gejala" tabindex="-1" role="dialog" aria-labelledby="tambah_gejala"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Gejala</h4>
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
                                    <form action="<?= base_url("gejala/create"); ?>" method="POST"
                                        enctype="multipart/form-data" data-parsley-validate>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kode_gejala">Kode Gejala</label>
                                                    <input type="text" class="form-control" id="kode_gejala"
                                                        name="kode_gejala" placeholder="Kode Gejala"
                                                        value="G<?= $kode_gejala ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="desc_gejala">Gejala</label>
                                                    <input type="text" class="form-control" id="desc_gejala"
                                                        name="desc_gejala" placeholder="Gejala" required>
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