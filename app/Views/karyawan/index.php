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
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end breadcrumb -->
        <div class="row">
            <!-- <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row"> -->
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-10">
                                                <p class="card-title">Data Master Karyawan</p>
                                            </div>
                                            <div class="col-2 text-end">
                                                <a  class="btn btn-success btn-sm" href="karyawan/create">Tambah Data</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                            <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                    <th class="">No</th>
                                        <th>Jabatan</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>No Rek</th>
                                        <th>File</th>
                                        <th>Kategori Pegawai</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($karyawan)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($karyawan as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['jabatan']; ?></td>
                                            <td><?= $row['nip']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['kategori_pegawai']; ?></td>
                                            <td><?= $row['status_ttd']; ?></td>
                                            <td><?= $row['norek']; ?></td>
                                            <td><?= $row['keterangan']; ?></td>
                                            <td>
                                                <a href="/karyawan/edit/<?= $row['id']; ?>" class="btn btn-primary">Edit</a>
                                                <a href="/karyawan/delete/<?= $row['id']; ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data Karyawan.</td>
                                            </tr>
                                        <?php endif; ?>
                                    
                                </tbody>
                            </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div>
                        </div>
                    </div>
                </div> -->
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

<?= $this->endSection() ?>