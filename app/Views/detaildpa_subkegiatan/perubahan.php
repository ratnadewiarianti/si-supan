<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Detail Subkegiatan DPA</h4> <!-- Mengubah judul -->
                        <!-- <form class="forms-sample" action="/detaildpa/update <?= $detaildpa_subkegiatan['id']; ?>" method="post"> Mengubah action -->
                        <form class="forms-sample" action="/detaildpa_subkegiatan/update_perubahan/<?= $detaildpa_subkegiatan['id']; ?>" method="post">
                           
                            <input type="hidden" name="id_detail_dpa" value="<?= $detaildpa_subkegiatan['id_detail_dpa']; ?>" class="form-control" required>

                            <div class="form-group">
                                <label>Koefisien Perubahan</label>
                                <input type="text" name="koefisien_perubahan" class="form-control" value="<?= $detaildpa_subkegiatan['koefisien_perubahan']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Satuan Perubahan</label>
                                <input type="text" name="satuan_perubahan" class="form-control" value="<?= $detaildpa_subkegiatan['satuan_perubahan']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Harga Perubahan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" id="harga_perubahan" name="harga_perubahan" class="form-control" value="<?= $detaildpa_subkegiatan['harga_perubahan']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>PPN Perubahan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" id="ppn_perubahan" name="ppn_perubahan" class="form-control" value="<?= $detaildpa_subkegiatan['ppn_perubahan']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Perubahan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" id="jumlah_perubahan" name="jumlah_perubahan" class="form-control" value="<?= $detaildpa_subkegiatan['jumlah_perubahan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Perubahan</label>
                                <input type="text" name="keterangan_perubahan" class="form-control" value="<?= $detaildpa_subkegiatan['keterangan_perubahan']; ?>" required>
                            </div>

                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <a href="/detaildpa_subkegiatan/showdetail/<?= $detaildpa_subkegiatan['id_detail_dpa']; ?>" class="btn btn-danger">Batal</a>
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

<script>
    // Mendapatkan elemen-elemen input
    var hargaInput = document.getElementById("harga_perubahan");
    var ppnInput = document.getElementById("ppn_perubahan");
    var jumlahInput = document.getElementById("jumlah_perubahan");

    // Menambahkan event listener untuk menghitung jumlah
    hargaInput.addEventListener("input", updateJumlah);
    ppnInput.addEventListener("input", updateJumlah);

    // Fungsi untuk menghitung jumlah
    function updateJumlah() {
        var harga = parseFloat(hargaInput.value) || 0; // Mengonversi harga menjadi angka, jika kosong maka 0
        var ppn = parseFloat(ppnInput.value) || 0; // Mengonversi ppn menjadi angka, jika kosong maka 0
        var jumlah = harga - ppn; // Menghitung jumlah
        jumlahInput.value = jumlah; // Menetapkan jumlah ke input jumlah, dengan membulatkan ke 2 angka desimal
    }
</script>


<?= $this->endSection() ?>

<?= $this->section('styles') ?>

<!-- link ref -->
<?= $this->endSection() ?>


<?= $this->section('javascript') ?>
<!--  script src -->
<?= $this->endSection() ?>
