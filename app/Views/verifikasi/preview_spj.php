<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pratinjau File SPJ</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>File SPJ</h4>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <a href="<?= route_to('verifikasi/'); ?>" class="btn btn-primary">Kembali</a>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <object data="<?= base_url('uploads/spj/' . $verifikasi['file_spj']); ?>" type="application/pdf" width="100%" height="600px">
                                <p>File tidak dapat ditampilkan. Anda dapat mengunduh file menggunakan link berikut: <a href="<?= base_url('uploads/spj/' . $verifikasi['file_spj']); ?>" target="_blank">Unduh File</a></p>
                            </object>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
