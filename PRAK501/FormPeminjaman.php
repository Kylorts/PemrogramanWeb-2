<?php require 'Model.php';
$allMembers = getAllMember();
$allBuku = getAllBuku();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $peminjaman = getPeminjamanById($id);

    if (!$peminjaman) {
        echo "Data peminjaman tidak ditemukan.";
        exit;
    }

    $heading = "Edit Peminjaman";
    $action = "edit";
} else {
    $heading = "Tambah Peminjaman";
    $action = "add";
    $peminjaman = null;
    $autoid = getNextAutoIncrementIdPeminjaman();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $heading ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f9f9f9;
        }

        .form-container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            margin-top: 15px;
            margin-right: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            background-color: #007bff;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2><?= $heading ?></h2>
    <form action="" method="POST">
        <label>ID</label>
        <input type="text" name="id_peminjaman" value="<?= isset($peminjaman['id_peminjaman']) ? $peminjaman['id_peminjaman'] : $autoid ?>" readonly>

        <label>Nama Member</label>
        <select name="id_member" required>
            <option value="">-- Pilih Member --</option>
            <?php foreach ($allMembers as $m): ?>
                <option value="<?= $m['id_member'] ?>" <?= isset($peminjaman['id_member']) && $peminjaman['id_member'] == $m['id_member'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($m['nama_member']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Judul Buku</label>
        <select name="id_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php foreach ($allBuku as $b): ?>
                <option value="<?= $b['id_buku'] ?>" <?= isset($peminjaman['id_buku']) && $peminjaman['id_buku'] == $b['id_buku'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($b['judul_buku']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Tanggal Pinjam</label>
        <input type="date" name="tglPinjam" value="<?= isset($peminjaman['tgl_pinjam']) ? htmlspecialchars($peminjaman['tgl_pinjam']) : '' ?>" required>

        <label>Tanggal Kembali</label>
        <input type="date" name="tglKembali" value="<?= isset($peminjaman['tgl_kembali']) ? htmlspecialchars($peminjaman['tgl_kembali']) : '' ?>" required>

        <button type="submit" name="submit" class="btn">Submit</button>
        <a href="Peminjaman.php"><button type="button" class="btn">Kembali</button></a>
    </form>
</div>

<?php
    if (isset($_POST['submit'])) {
        $data = [
            'id_peminjaman' => $_POST['id_peminjaman'],
            'id_member' => $_POST['id_member'],
            'id_buku' => $_POST['id_buku'],
            'tglPinjam' => $_POST['tglPinjam'],
            'tglKembali' => $_POST['tglKembali']
        ];

        if ($action == 'add') {
            addPeminjaman($data);
        } else {
            updatePeminjaman($data);
        }
        header('Location: Peminjaman.php');
        exit;
    }
?>
</body>
</html>