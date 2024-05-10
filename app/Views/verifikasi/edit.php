<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Verifikasi</h4> <!-- Mengubah judul -->
                        <form class="forms-sample" action="/verifikasi/update/<?= $verifikasi['id']; ?>" enctype="multipart/form-data" method="post">
                            <!-- <input type="hidden" name="_method" value="PUT"> Menyertakan _method untuk PUT -->
                            <div class="form-group">
                                <label>Subkegiatan</label>
                                <select class="form-control" name="id_detail_penatausahaan" required>
                                    <?php foreach ($detailpenatausahaan as $key) : ?>
                                        <option value="<?= $key['id']; ?>" <?php if ($key['id'] == $verifikasi) echo 'selected'; ?>>
                                            <?= $key['kode_urusan']; ?>.<?= $key['kode_bidang_urusan']; ?>.<?= $key['kode_program']; ?>.<?= $key['kode_kegiatan']; ?>.<?= $key['kode_subkegiatan']; ?> - <?= $key['nomenklatur_urusan_provinsi']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nomor BKU</label>
                                <input type="text" name="nomor_bku" class="form-control" value="<?= $verifikasi['nomor_bku']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="<?= $verifikasi['tanggal']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Uraian</label>
                                <input type="text" name="uraian" class="form-control" value="<?= $verifikasi['uraian']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nilai SPJ</label>
                                <input type="text" name="nilai_spj" class="form-control" value="<?= $verifikasi['nilai_spj']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>PPN</label>
                                <input type="number" name="ppn" class="form-control" value="<?= $verifikasi['ppn']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>PPH PSL 23</label>
                                <input type="number" name="pph_psl_23" class="form-control" value="<?= $verifikasi['pph_psl_23']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>PPH PSL 22</label>
                                <input type="number" name="pph_psl_22" class="form-control" value="<?= $verifikasi['pph_psl_22']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>PPH PSL 21</label>
                                <input type="number" name="pph_psl_21" class="form-control" value="<?= $verifikasi['pph_psl_21']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Pajak Daerah</label>
                                <input type="number" name="pajak_daerah" class="form-control" value="<?= $verifikasi['pajak_daerah']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Diterima</label>
                                <input type="text" name="diterima" class="form-control" value="<?= $verifikasi['diterima']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>File SPJ</label> <br>
                                <label><small>Upload dalam Format PDF</small></label> <br>
                                <?php if (!empty($verifikasi['file_spj'])) : ?>
                                    <label><?= $verifikasi['file_spj']; ?></label><br>
                                <?php endif; ?>
                                <input type="file" name="file_spj" id="file_spj" class="form-control-file" accept=".pdf">
                            </div>

                            <div class="form-group">
                                <label>File Kwitansi</label> <br>
                                <label><small>Upload dalam Format PDF</small></label> <br>
                                <?php if (!empty($verifikasi['file_kwitansi'])) : ?>
                                    <label><?= $verifikasi['file_kwitansi']; ?></label><br>
                                <?php endif; ?>
                                <input type="file" name="file_kwitansi" id="file_kwitansi" class="form-control-file" accept=".pdf">
                            </div>


                            <!-- <input type="hidden" name="file_kwitansi_lama" value="<?= $verifikasi['file_kwitansi']; ?>"> -->




                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <a href="<?= base_url('/verifikasi'); ?>" class="btn btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?= $this->include('layout/footer') ?>
    <!-- partial -->
</div>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>

<!-- link ref -->
<?= $this->endSection() ?>


<?= $this->section('javascript') ?>
<!--  script src -->
<?= $this->endSection() ?>