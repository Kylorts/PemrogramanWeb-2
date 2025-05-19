<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<h2 class="text-center mb-4">Daftar Buku</h2>

<div class="d-flex justify-content-end mb-3">
    <a href="<?= site_url('buku/create') ?>" class="btn btn-primary">Tambah Data</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-primary text-center">
        <tr>
            <th style="width: 5%;">No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th style="width: 10%;">Tahun</th>
            <th style="width: 18%;">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($buku as $i => $b): ?>
        <tr>
            <td class="text-center"><?= $i + 1 ?></td>
            <td class="text-break" style="max-width: 150px"><?= esc($b['judul']) ?></td>
            <td class="text-break" style="max-width: 150px"><?= esc($b['penulis']) ?></td>
            <td class="text-break" style="max-width: 150px"><?= esc($b['penerbit']) ?></td>
            <td class="text-center text-break" style="max-width: 150px"><?= esc($b['tahun_terbit']) ?></td>
            <td class="text-center">
                <div class="d-flex d-inline-flex">
                <a href="<?= site_url('buku/edit/' . $b['id']) ?>" class="btn btn-sm btn-success me-1">Edit</a>
                    <form action="<?= site_url('/buku/delete/' . $b['id'])?>" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data?');">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>