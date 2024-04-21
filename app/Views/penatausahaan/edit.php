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
                        <li class="breadcrumb-item"><a href="/penatausahaan">Penatausahaan</a></li>
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
                        <h4 class="card-title">Edit Data Penatausahaan</h4>
                        <form action="/penatausahaan/update/<?= $penatausahaan['id']; ?>" method="post">
                            <div class="form-group">
                                <label>Link Google Drive</label>
                                <input type="text" name="link_google" class="form-control" value="<?= $penatausahaan['link_google']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Pengguna Anggaran</label>
                                <select class="form-control" name="karyawan_1" required>
                                    <option selected disabled>-</option>
                                    <?php foreach ($karyawan as $key_1) : ?>
                                        <option value="<?= $key_1['id']; ?>" <?php if ($key_1['id'] == $penatausahaan['karyawan_1']) echo 'selected="selected"'; ?>><?= $key_1['nama']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bendahara Mengeluarkan</label>
                                <select class="form-control" name="karyawan_2" required>
                                    <option selected disabled>-</option>
                                    <?php foreach ($karyawan as $key_2) : ?>
                                        <option value="<?= $key_2['id']; ?>" <?php if ($key_2['id'] == $penatausahaan['karyawan_2']) echo 'selected="selected"'; ?>><?= $key_2['nama']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>TTD Penerima</label>
                                <select class="form-control" name="karyawan_3" required>
                                    <option selected disabled>-</option>
                                    <?php foreach ($karyawan as $key_3) : ?>
                                        <option value="<?= $key_3['id']; ?>" <?php if ($key_3['id'] == $penatausahaan['karyawan_2']) echo 'selected="selected"'; ?>><?= $key_3['nama']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="<?= $penatausahaan['tanggal']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <!-- <button class="btn btn-light">Batal</button> -->
                            <a href="<?= base_url('/penatausahaan'); ?>" class="btn btn-danger">Batal</a>
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