<div class="modal fade text-left" id="tambah_rules" tabindex="-1" role="dialog" aria-labelledby="tambah_rules" aria-hidden="true">
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
                                    <form action="<?= base_url("rules/create"); ?>" method="POST" enctype="multipart/form-data" data-parsley-validate>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="kode_rules">Kode Rules</label>
                                                    <input type="text" class="form-control" id="kode_rules" name="kode_rules" placeholder="Kode Rules" value="R<?= $kode_rules ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kode_gejala1">Kode Gejala 1</label>
                                                    <input class="form-control" name="kode_gejala1" value="G01" readonly required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="level_gejala1">Tingkat Gejala 1</label>
                                                    <select class="form-control" name="level_gejala1" required>
                                                        <option value="" selected disabled>Pilih Tingkat</option>
                                                        <option value="Ringan">Ringan</option>
                                                        <option value="Agak Parah">Agak Parah</option>
                                                        <option value="Parah">Parah</option>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kode_gejala2">Kode Gejala 2</label>
                                                    <input class="form-control" name="kode_gejala2" value="G02" readonly required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="level_gejala2">Tingkat Gejala 2</label>
                                                    <select class="form-control" name="level_gejala2" required>
                                                        <option value="" selected disabled>Pilih Tingkat</option>
                                                        <option value="Ringan">Ringan</option>
                                                        <option value="Agak Parah">Agak Parah</option>
                                                        <option value="Parah">Parah</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kode_gejala3">Kode Gejala 3</label>
                                                    <input class="form-control" name="kode_gejala3" value="G03" readonly required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="level_gejala3">Tingkat Gejala 3</label>
                                                    <select class="form-control" name="level_gejala3" required>
                                                        <option value="" selected disabled>Pilih Tingkat</option>
                                                        <option value="Ringan">Ringan</option>
                                                        <option value="Agak Parah">Agak Parah</option>
                                                        <option value="Parah">Parah</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kode_gejala4">Kode Gejala 4</label>
                                                    <input class="form-control" name="kode_gejala4" value="G04" readonly required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="level_gejala4">Pilih</label>
                                                    <select class="form-control" name="level_gejala4" required>
                                                        <option value="" selected disabled>Pilih</option>
                                                        <option value="Area Mulut">Area Mulut</option>
                                                        <option value="Area Tubuh Selain Mulut">Area Tubuh Selain Mulut
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kode_gejala5">Kode Gejala 5</label>
                                                    <input class="form-control" name="kode_gejala5" value="G05" readonly required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="level_gejala5">Pilih</label>
                                                    <select class="form-control" name="level_gejala5" required>
                                                        <option value="" selected disabled>Pilih</option>
                                                        <option value="Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk">
                                                            Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk
                                                        </option>
                                                        <option value="Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi">
                                                            Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi
                                                        <option value="Adanya Larva Lalat Di Lesi Yang Terbuka">Adanya
                                                            Larva Lalat Di Lesi Yang Terbuka
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="penyakit">Penyakit</label>
                                                    <select class="form-control" name="penyakit" required>
                                                        <option value="" selected disabled>Pilih Penyakit</option>
                                                        <?php foreach ($penyakit as $penyakit) : ?>
                                                            <option value="<?= $penyakit->nama_penyakit ?>">
                                                                <?= $penyakit->nama_penyakit ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
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