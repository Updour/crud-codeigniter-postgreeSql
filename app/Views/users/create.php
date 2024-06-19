<!-- app/Views/users/create.php -->

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Tambah Pengguna Baru</h1>

    <form action="<?= site_url('users/store') ?>" method="post">
        <div class="mb-3">
            <label for="user_id" class="form-label" >User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" required>
        </div>
        <div class="mb-3">
            <label for="kode_user" class="form-label">Kode User</label>
            <input type="text" class="form-control" id="kode_user" name="kode_user" required>
        </div>
        <div class="mb-3">
            <label for="hak" class="form-label">Hak</label>
            <input type="text" class="form-control" id="hak" name="hak" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>
