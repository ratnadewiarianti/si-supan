<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="/user">Master User</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit User</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/user/update/<?= $user['id']; ?>" method="post">
                            <div class="card-header">
                                <h4>Edit Data User</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $user['nama']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" value="<?= $user['password']; ?>" required>
                                </div>

                                    <div class="form-group">
                                            <label>Level</label>
                                            <select name="role_id" class="form-control">
                                                <option value="">-- Pilih Level --</option>
                                                <?php foreach ($roles as $role) : ?>
                                                    <option value="<?= $role['id']; ?>" <?= ($role['id'] == $user['role_id']) ? 'selected' : ''; ?>><?= $role['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                    </div>
                                    
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?= $user['email']; ?>" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/user" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
