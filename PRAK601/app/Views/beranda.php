<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">

    <div class="text-center mb-4">
        <h1>Selamat Datang</h1>
        <p class="lead">Website ini dibuat oleh</p>
    </div>

    <div class="card shadow-lg p-4">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img src="<?= base_url('image/' . $mahasiswa['gambar']) ?>" width="300" height="400" class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title"><?= $mahasiswa['nama'] ?></h3>
                    <p class="card-text"><strong>NIM:</strong> <?= $mahasiswa['nim'] ?></p>
                    <a href="<?= base_url('home/profil') ?>" class="btn btn-primary mt-3">Lihat Profil</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>