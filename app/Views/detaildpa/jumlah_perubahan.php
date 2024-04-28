<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Jumlah Perubahan</h4>
                        <form class="forms-sample" action="/detaildpa/update_jumlah_perubahan/<?= $detaildpa['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Jumlah Perubahan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" name="jumlah_perubahan" class="form-control" required>
                                    <!-- Tambahkan input hidden untuk menyimpan ID detail -->
                                    <input type="hidden" name="id" value="<?= $detaildpa['id'] ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <!-- <button class="btn btn-light">Batal</button> -->
                            <a href="/detaildpa/show/<?= $detaildpa['id_dpa']; ?>" class="btn btn-danger">Batal</a>
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
