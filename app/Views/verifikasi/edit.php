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
                        <li class="breadcrumb-item"><a href="/bidang_urusan"> Bidang Urusan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end breadcrumb -->
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Bidang Urusan</h4>
                        <form action="/bidang_urusan/update/<?= $bidang_urusan['id']; ?>" method="post">
                            <div class="form-group">
                                <label>Kode Urusan</label>
                                <select class="form-control" name="id_urusan" required>
                                    <option selected disabled>-</option>
                                    <?php foreach ($urusan as $key) : ?>
                                        <option value="<?= $key['id']; ?>" <?php if ($key['id'] == $bidang_urusan['id_urusan']) echo 'selected="selected"'; ?>><?= $key['kode_urusan']; ?> - <?= $key['nama_urusan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kode Bidang Urusan</label>
                                <input type="text" name="kode_bidang_urusan" class="form-control" value="<?= $bidang_urusan['kode_bidang_urusan']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Bidang Urusan</label>
                                <input type="text" name="nama_bidang_urusan" class="form-control" value="<?= $bidang_urusan['nama_bidang_urusan']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <!-- <button class="btn btn-light">Batal</button> -->
                            <a href="<?= base_url('/bidang_urusan'); ?>" class="btn btn-danger">Batal</a>
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