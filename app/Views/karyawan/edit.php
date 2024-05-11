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
                        <form action="/karyawan/update/<?= $karyawan['id']; ?>" enctype="multipart/form-data" method="post">
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

                            <div class="form-group">
                                <label for="kategori_pegawai">Kategori Pegawai</label>
                                <select name="kategori_pegawai" class="form-control" required>
                                    <option value="PNS" <?= ($karyawan['kategori_pegawai'] == 'PNS') ? 'selected' : ''; ?>>PNS</option>
                                    <option value="PTT" <?= ($karyawan['kategori_pegawai'] == 'PTT') ? 'selected' : ''; ?>>PTT</option>
                                    <option value="Tenaga Ahli" <?= ($karyawan['kategori_pegawai'] == 'Tenaga Ahli') ? 'selected' : ''; ?>>
                                        Tenaga Ahli</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>No Rek</label>
                                <input type="text" name="norek" class="form-control" value="<?= $karyawan['norek']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Status Tanda Tangan</label><br>
                                <input type="radio" name="status_ttd" value="Ya" <?= isset($karyawan['status_ttd']) && $karyawan['status_ttd'] == 'Ya' ? 'checked' : ''; ?> required onclick="toggleUploadForm(this)">
                                Ya<br>
                                <input type="radio" name="status_ttd" value="Tidak" <?= isset($karyawan['status_ttd']) && $karyawan['status_ttd'] == 'Tidak' ? 'checked' : ''; ?> required onclick="toggleUploadForm(this)">
                                Tidak
                            </div>

                            <div class="form-group" id="uploadForm" <?= isset($karyawan['status_ttd']) && $karyawan['status_ttd'] == 'Ya' ? '' : 'style="display:none;"'; ?>>
                                <label>Upload Tanda Tangan</label> <br>
                                <?php if (isset($karyawan['status_ttd']) && $karyawan['status_ttd'] == 'Ya' && !empty($karyawan['file'])) : ?>
                                    <img id="previewImage" src="<?= base_url('uploads/ttd/' . $karyawan['file']); ?>" alt="Gambar" width="100" height="100">
                                    <br>
                                <?php endif; ?>
                                <label><small>Input dalam Format JPG</small></label> <br>
                                <input type="file" id="fileInput" name="file" class="form-control-file" accept=".jpg, .jpeg, .png"> 
                            </div>

                            <!-- Menyimpan nama file foto struktur saat ini -->
                            <!-- <input type="hidden" name="foto_ttd_lama" value="<?= $karyawan['file']; ?>"> -->

                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" value="<?= $karyawan['keterangan']; ?>" required>
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
    <script>
        function toggleUploadForm(element) {
            var uploadForm = document.getElementById('uploadForm');
            if (element.value === 'Ya') {
                uploadForm.style.display = 'block';
            } else {
                uploadForm.style.display = 'none';
            }
        }

        // Panggil fungsi toggleUploadForm() ketika halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            var status_ttd = document.querySelector('input[name="status_ttd"]:checked');
            toggleUploadForm(status_ttd);
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('previewImage').setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // Membaca data URL gambar
            }
        }

        // Panggil fungsi previewImage() ketika pengguna memilih gambar baru
        document.getElementById('fileInput').addEventListener('change', function() {
            previewImage(this);
        });
    </script>
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