<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<?php
    $validation = \Config\Services::validation();
    if (session()->has('validation')) {
        $validation = session('validation');
    }
?>

<h2 class=" text-center mb-4">Edit Buku</h2>

<form action="<?= site_url('buku/update/' . $buku['id']) ?>" method="POST">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" value="<?= old('judul', $buku['judul']) ?>">
        <div class="invalid-feedback"><?= $validation->getError('judul') ?></div>
    </div>
    <div class="mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ?>" value="<?= old('penulis', $buku['penulis']) ?>">
        <div class="invalid-feedback"><?= $validation->getError('penulis') ?></div>
    </div>
    <div class="mb-3">
        <label class="form-label">Penerbit</label>
        <input type="text" name="penerbit" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '' ?>" value="<?= old('penerbit', $buku['penerbit']) ?>">
        <div class="invalid-feedback"><?= $validation->getError('penerbit') ?></div>
    </div>
    <div class="mb-3">
        <label class="form-label">Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control <?= ($validation->hasError('tahun_terbit')) ? 'is-invalid' : '' ?>" value="<?= old('tahun_terbit', $buku['tahun_terbit']) ?>">
        <div class="invalid-feedback"><?= $validation->getError('tahun_terbit') ?></div>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= site_url('/buku')?>" class="btn btn-primary ms-2">Kembali</a>
</form>

<?= $this->endSection() ?>