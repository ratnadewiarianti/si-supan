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
                        <li class="breadcrumb-item"><a href="/penatausahaan">penatausahaan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end breadcrumb -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card mb-5">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-4">
                            <div>
                                <p class="card-title">Detail Data penatausahaan</p>
                            </div>
                            <div>
                                <a class="btn btn-success btn-sm" href="/detailpenatausahaan/create/<?= service('uri')->getSegment(3); ?>">Tambah Data</a>
                                <a class="btn btn-dark btn-sm" href="/penatausahaan">Kembali</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <!-- <div class="table-responsive">
                                    <table class="display expandable-table" style="width:100%" id=" table-2"> -->
                                        <thead>
                                            <th>No</th>
                                            <th>Nomor DPA</th>
                                            <th>Nomor Rekening</th>
                                            <th>Uraian Akun</th>
                                            <th>Nomor BK Umum</th>
                                            <th>Nomor BK Pembantu</th>
                                            <th>Asli I,II,III</th>
                                            <th>Sudah Terima Dari</th>
                                            <th>Uang Sebanyak</th>
                                            <th>Untuk Pembayaran</th>
                                            <th>Pajak Daerah</th>
                                            <th>PPH 21</th>
                                            <th>Terbilang</th>
                                            <th>Action</th>

                                            <!-- 'id_dpa','id_subkegiatan','id_rekening','jumlah','jumlah_perubahan' -->
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($detailpenatausahaan)) : ?>
                                                <?php $no = 1; ?>
                                                <?php foreach ($detailpenatausahaan as $row) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['nomor_dpa']; ?></td>
                                                        <td><?= $row['kode_rekening']; ?>
                                                        </td>
                                                        <td><?= $row['uraian_akun']; ?>
                                                        </td>
                                                        <td><?= $row['no_bk_umum']; ?>
                                                        </td>
                                                        <td><?= $row['no_bk_pembantu']; ?>
                                                        </td>
                                                        <td><?= $row['asli_123']; ?>
                                                        </td>
                                                        <td><?= $row['sudah_terima_dari']; ?>
                                                        </td>
                                                        <td><?= 'Rp ' . number_format($row['uang_sebanyak'], 0, ',', '.'); ?></td>
                                                        <td><?= $row['untuk_pembayaran']; ?>
                                                        </td>
                                                        <td><?= $row['pajak_daerah']; ?>
                                                        </td>
                                                        <td><?= $row['pph21']; ?>
                                                        </td>
                                                        <td><?= $row['terbilang']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="/keterangan/show/<?= $row['id']; ?>" class="btn btn-sm btn-success">Keterangan</a>
                                                            <a href="/detailpenatausahaan/edit/<?= $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                            <a href="/detailpenatausahaan/delete/<?= $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="6" class="text-center">Tidak ada data detail penatausahaan.</td>
                                                </tr>
                                            <?php endif; ?>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-4">
                            <div>
                                <p class="card-title">Anggota</p>
                            </div>
                            <div>
                                <a class="btn btn-success btn-sm" href="/detailpenatausahaan/create2/<?= service('uri')->getSegment(3); ?>">Tambah Data</a>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <!-- <div class="table-responsive">
                                    <table class="display expandable-table" style="width:100%" id=" table-2"> -->
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jabatan</th>
                                            <th>Action</th>

                                            <!-- 'id_dpa','id_subkegiatan','id_rekening','jumlah','jumlah_perubahan' -->
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($detail2)) : ?>
                                                <?php $no = 1; ?>
                                                <?php foreach ($detail2 as $row) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['nama']; ?></td>
                                                        <td><?= $row['nip']; ?></td>
                                                        <td><?= $row['jabatan']; ?></td>
                                                        <td>
                                                            <a href="/detailpenatausahaan/edit2/<?= $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                            <a href="/detailpenatausahaan/delete2/<?= $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="6" class="text-center">Tidak ada data detail penatausahaan.</td>
                                                </tr>
                                            <?php endif; ?>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
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
<script>
    $(document).ready(function() {
        $('#table-1').DataTable();
    });
</script>

<?= $this->endSection() ?>