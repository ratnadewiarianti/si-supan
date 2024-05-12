<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Detail Penatausahaan</h4>
                        <form class="forms-sample" action="/detailpenatausahaan/update/<?= $detailpenatausahaan['id']; ?>" method="post">

                            <input type="hidden" name="id_penatausahaan" value="<?= $detailpenatausahaan['id_penatausahaan']; ?>" class="form-control" required>

                            <!-- 'id_dpa','id_subkegiatan','id_rekening','jumlah','jumlah_perubahan' -->

                            <div class="form-group">
                                <label>Nomor DPA</label>
                                <select class="form-control js-example-basic-single w-100" name="id_detail_dpa" required>
                                    <option selected disabled>-</option>
                                    <?php foreach ($detaildpa as $key) : ?>
                                        <option value="<?= $key['id']; ?> " <?= ($key['id'] == $detailpenatausahaan['id_detail_dpa']) ? 'selected' : ''; ?>><?= $key['nomor_dpa']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Rekening</label>
                                <select class="form-control js-example-basic-single w-100" name="id_rekening" required>
                                    <option selected disabled>-</option>
                                    <?php foreach ($rekening as $key) : ?>
                                        <option value="<?= $key['id']; ?>" <?= ($key['id'] == $detailpenatausahaan['id_rekening']) ? 'selected' : ''; ?>><?= $key['kode_rekening']; ?> - <?= $key['uraian_akun']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor BK Umum</label>
                                <input type="text" name="no_bk_umum" required class="form-control" value="<?= $detailpenatausahaan['no_bk_umum']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nomor BK Pembantu</label>
                                <input type="text" name="no_bk_pembantu" required class="form-control" value="<?= $detailpenatausahaan['no_bk_pembantu']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Asli</label>
                                <input type="text" name="asli_123" required class="form-control" value="<?= $detailpenatausahaan['asli_123']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Sudah Terima Dari</label>
                                <input type="text" name="sudah_terima_dari" required class="form-control " value="<?= $detailpenatausahaan['sudah_terima_dari']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Uang Sebanyak</label>
                                <input type="text" name="uang_sebanyak" class="form-control" required value="<?= $detailpenatausahaan['uang_sebanyak']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Untuk Pembayaran</label>
                                <textarea name="untuk_pembayaran" required class="form-control" style="min-height:100px"><?= $detailpenatausahaan['untuk_pembayaran']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Pajak Daerah</label>
                                <input type="text" name="pajak_daerah" required class="form-control" value="<?= $detailpenatausahaan['pajak_daerah']; ?>">
                            </div>
                            <div class="form-group">
                                <label>PPH</label>
                                <input type="text" name="pph21" required class="form-control" value="<?= $detailpenatausahaan['pph21']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Terbilang</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" name="terbilang" required class="form-control" value="<?= $detailpenatausahaan['terbilang']; ?>">
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <!-- <button class="btn btn-light">Batal</button> -->
                            <a href="/detailpenatausahaan/show/<?= $detailpenatausahaan['id_penatausahaan']; ?>" class="btn btn-danger">Batal</a>
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