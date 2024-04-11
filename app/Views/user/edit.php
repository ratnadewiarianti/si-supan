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
                        <li class="breadcrumb-item"><a href="user">User</a></li>
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
                        <h4 class="card-title">Edit User</h4>
                        <!-- <form class="forms-sample" action="/user/update" method="post"> -->
                        <form action="/user/update/<?= $user['id']; ?>" method="post">

                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputName1" value="<?= $user['nama']; ?>" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Username</label>
                                <input type="text" class="form-control" name="username" id="exampleInputName1" value="<?= $user['username']; ?>" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email </label>
                                <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email" value="<?= $user['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword4" placeholder="Password" value="<?= $user['password']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Role</label>
                                <select name="role_id" class="form-control">
                                    <option value="">-- Pilih Level --</option>
                                    <?php foreach ($roles as $role) : ?>
                                        <option value="<?= $role['id']; ?>" <?= ($role['id'] == $user['role_id']) ? 'selected' : ''; ?>><?= $role['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
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