<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Perubahan</h4>
                        <form class="forms-sample" action="/detaildpa_subkegiatan/update_perubahan/<?= $detaildpa_subkegiatan['id']; ?>" method="post">
                        <!-- Tambahkan input hidden untuk menyimpan ID detail -->
                        <input type="hidden" name="id_detail_dpa" value="<?= $detaildpa_subkegiatan['id_detail_dpa']; ?>" class="form-control" required>
                       <!-- 'koefisien_perubahan','satuan_perubahan','harga_perubahan','ppn_perubahan','jumlah_perubahan','keterangan_perubahan -->
                        <div class="form-group">
                                <label>Koefisien Perubahan</label>
                                <input type="text" name="koefisien_perubahan" class="form-control"  required>
                            </div>
                            
                            <div class="form-group">
                                <label>Satuan Perubahan</label>
                                <input type="text" name="satuan_perubahan" class="form-control"  required>
                            </div>

                            <div class="form-group">
                                <label>Harga Perubahan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" name="harga_perubahan" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>PPN Perubahan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" name="ppn_perubahan" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Perubahan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" name="jumlah_perubahan" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Perubahan</label>
                                <input type="text" name="keterangan_perubahan" class="form-control"  required>
                            </div>
                            
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <!-- <button class="btn btn-light">Batal</button> -->
                            <a href="/detaildpa_subkegiatan/showdetail/<?= $detaildpa_subkegiatan['id_dpa_detail']; ?>" class="btn btn-danger">Batal</a>
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
