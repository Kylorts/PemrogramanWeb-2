<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?> 
<div class="d-flex justify-content-center">
    <h1>Profil</h1>
</div>
<div class="row mt-3">
  <div class="col-md-4">
    <img src="<?= base_url('image/' . $mahasiswa['gambar']) ?>" class="img-fluid rounded" width="400" height="300">
  </div>
  <div class="col-md-8">
    <ul class="list-group">
      <li class="list-group-item"><strong>Nama:</strong> <?= $mahasiswa['nama'] ?></li>
      <li class="list-group-item"><strong>NIM:</strong> <?= $mahasiswa['nim'] ?></li>
      <li class="list-group-item"><strong>Prodi:</strong> <?= $mahasiswa['prodi'] ?></li>
      <li class="list-group-item"><strong>Hobi:</strong> <?= $mahasiswa['hobi'] ?></li>
      <li class="list-group-item"><strong>Skill:</strong> <?= $mahasiswa['skill']?></li>
    </ul>
  </div>
</div>
<div class="d-flex justify-content-end mt-4">
    <a href="<?= base_url('/') ?>" class="btn btn-primary">Kembali ke Beranda</a>
</div>
<?= $this->endSection() ?>