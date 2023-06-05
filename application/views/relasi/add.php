<div class="modal fade text-left" id="tambah_relasi" tabindex="-1" role="dialog" aria-labelledby="tambah_relasi"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Relasi</h4>
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
                                    <form action="<?= base_url("relasi/create"); ?>" method="POST"
                                        enctype="multipart/form-data" data-parsley-validate>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="kode_penyakit">Penyakit</label>
                                                    <select class="choices form-control" name="kode_penyakit" required>
                                                        <option value="" selected disabled>Pilih Jenis Penyakit</option>
                                                        <?php foreach ($penyakit as $penyakit) : ?>
                                                        <option
                                                            value="<?= $penyakit->kode_penyakit ?> | <?= $penyakit->nama_penyakit ?>">
                                                            (<?= $penyakit->kode_penyakit ?>)
                                                            <?= $penyakit->nama_penyakit ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="kode_gejala">Gejala</label>
                                                    <select class="choices form-control" name="kode_gejala" required>
                                                        <option value="" selected disabled>Pilih Jenis Gejala</option>
                                                        <?php foreach ($gejala as $gejala) : ?>
                                                        <option
                                                            value="<?= $gejala->kode_gejala ?> | <?= $gejala->desc_gejala ?>">
                                                            (<?= $gejala->kode_gejala ?>)
                                                            <?= $gejala->desc_gejala ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="bobot">Bobot</label>
                                                    <input type="number" class="form-control" id="bobot" name="bobot"
                                                        placeholder="Bobot" required>
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