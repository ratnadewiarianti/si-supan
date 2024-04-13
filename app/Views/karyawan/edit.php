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
                        <li class="breadcrumb-item"><a href="/karyawan">Karyawan</a></li>
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
                        <h4 class="card-title">Edit Karyawan</h4>
                        <!-- <form class="forms-sample" action="/karyawan/update" method="post"> -->
                        <form action="/karyawan/update/<?= $karyawan['id']; ?>" method="post">
                        <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" value="<?= $karyawan['jabatan']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="text" name="nip" class="form-control" value="<?= $karyawan['nip']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $karyawan['nama']; ?>" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="kategori_pegawai">Kategori Pegawai</label>
                                    <select name="kategori_pegawai" class="form-control" required>
                                        <option value="PNS" <?= ($karyawan == 'PNS') ? 'selected' : ''; ?>>PNS</option>
                                        <option value="PTT" <?= ($karyawan == 'PTT') ? 'selected' : ''; ?>>PTT</option>
                                        <option value="Tenaga Ahli" <?= ($karyawan == 'Tenaga Ahli') ? 'selected' : ''; ?>>Tenaga Ahli</option>
                                    </select>
                                </div> -->

                                <div class="form-group">
                                    <label for="kategori_pegawai">Kategori Pegawai</label>
                                    <select name="kategori_pegawai" class="form-control" required>
                                        <option value="PNS" <?= ($karyawan['kategori_pegawai'] == 'PNS') ? 'selected' : ''; ?>>PNS</option>
                                        <option value="PTT" <?= ($karyawan['kategori_pegawai'] == 'PTT') ? 'selected' : ''; ?>>PTT</option>
                                        <option value="Tenaga Ahli" <?= ($karyawan['kategori_pegawai'] == 'Tenaga Ahli') ? 'selected' : ''; ?>>Tenaga Ahli</option>
                                    </select>
                                </div>

                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <!-- <button class="btn btn-light">Batal</button> -->
                            <a href="<?= base_url('/karyawan'); ?>" class="btn btn-danger">Batal</a>

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