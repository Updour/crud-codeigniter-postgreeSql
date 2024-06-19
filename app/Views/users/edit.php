<!-- app/Views/users/edit.php -->

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Edit Pengguna</h1>

    <form action="<?= site_url('users/update') ?>" method="post">
        <input type="hidden" name="member_id" value="<?= $user['member_id'] ?>">
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $user['user_id'] ?>" required disabled>
        </div>
        <div class="mb-3">
            <label for="kode_user" class="form-label">Kode User</label>
            <input type="text" class="form-control" id="kode_user" name="kode_user" value="<?= $user['kode_user'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="hak" class="form-label">Hak</label>
            <input type="text" class="form-control" id="hak" name="hak" value="<?= $user['hak'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
<?= $this->endSection() ?>
