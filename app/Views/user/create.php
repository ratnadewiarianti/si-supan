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
                        <li class="breadcrumb-item"><a href="/user">User</a></li>
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
                        <h4 class="card-title">Tambah User</h4>
                        <form class="forms-sample" action="/user/store" method="post">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputName1" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Username</label>
                                <input type="text" class="form-control" name="username" id="exampleInputName1" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email </label>
                                <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Role</label>
                                <select class="form-control <?= (session('errors.role_id')) ? 'is-invalid' : ''; ?>" id="role_id" name="role_id" aria-label="Default select example">
                                    <option>--- Pilih Roles ---</option>
                                    <?php foreach ($role as $r) : ?>
                                        <option value="<?= $r['id']; ?>" <?= (old('role_id') == $r['id']) ? 'selected' : ''; ?>>
                                            <?= $r['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (session('errors') && array_key_exists('role_id', session('errors'))) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors')['role_id']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <!-- <button class="btn btn-light">Batal</button> -->
                            <a href="<?= base_url('/user'); ?>" class="btn btn-danger">Batal</a>
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