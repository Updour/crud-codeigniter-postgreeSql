<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('success') ?>
        </div>
    <?php endif ?>

    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session('error') ?>
        </div>
    <?php endif ?>

    <h1>Daftar Pengguna</h1>

    <a href="<?= site_url('users/create') ?>" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
    <form method="get" action="<?= base_url('users') ?>" class="d-flex">
    <div class="form-group mb-2 mr-2">
        <label for="keyword" class="sr-only">Cari berdasarkan username:</label>
        <input type="text" id="keyword" name="keyword" class="form-control col-md-4" value="<?= esc($keyword) ?>" 
        placeholder="Cari berdasarkan username">
    </div>
    <div class="col-md-4 mt-4 ml-2">
                <button type="submit" class="btn btn-primary btn-block">Cari</button>
            </div>
</form>


    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Registered</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= number_format($user['user_id']) ?></td>
                    <td><?= $user['full_name'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($user['date_created'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <nav aria-label="Page navigation example">
        <?= $pager->only(['perPage'])->links('default', 'bootstrap_full') ?>
    </nav>
    <p>Jumlah total pengguna: <?= number_format($totalRows) ?></p>
    <?php if (isset($executionTime)): ?>
        <p>Waktu eksekusi fetching: <?= $executionTime ?> detik</p>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
