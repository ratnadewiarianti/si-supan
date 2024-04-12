<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <!-- breadcrumb -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-12 col-xl-8 ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Master</a></li>
                        <li class="breadcrumb-item"><a href="/datarekening">Data Rekening</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end breadcrumb -->
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Data Rekening</h4>
                        <form class="forms-sample" action="/datarekening/store" method="post">
                            <div class="form-group">
                                <label>Akun</label>
                                <input type="number" name="akun" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Kelompok</label>
                                <input type="number" name="kelompok" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="number" name="jenis" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Objek</label>
                                <input type="number" name="objek" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Rincian Objek</label>
                                <input type="number" name="rincian_object" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Sub Rincian Objek</label>
                                <input type="number" name="sub_rincian_objek" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Uraian Akun</label>
                                <input type="text" name="uraian_akun" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <!-- <button class="btn btn-light">Batal</button> -->
                            <a href="<?= base_url('/datarekening'); ?>" class="btn btn-danger">Batal</a>
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