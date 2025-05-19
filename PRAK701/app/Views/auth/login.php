<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="text-center">
    <h1>Selamat Datang di Website koleksi Buku</h1>
    <p class="lead">Silahakan login terlebih dahulu</p>
</div>
<div class="d-flex justify-content-center align-items-center" style="height: 400px;">
    <div class="card shadow w-50 p-4">
        <div class="text-center mb-4">
            <h3>Login</h3>
        </div>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?=site_url('/login')?>" method="POST">
            <div class="mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>