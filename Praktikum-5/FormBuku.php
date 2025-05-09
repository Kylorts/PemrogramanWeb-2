<?php
require 'Model.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $buku = getBukuById($id);

    if (!$buku) {
        echo "Data buku tidak ditemukan.";
        exit;
    }

    $heading = "Edit Buku";
    $action = "edit";
} else {
    $heading = "Tambah Buku";
    $action = "add";
    $buku = null;
    $autoid = getNextAutoIncrementIdBuku();
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

        input {
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
        <input type="text" name="id_buku" value="<?= isset($buku['id_buku']) ? $buku['id_buku'] : $autoid ?>" readonly>

        <label>Judul</label>
        <input type="text" name="judul" value="<?= isset($buku['judul_buku']) ? htmlspecialchars($buku['judul_buku']) : '' ?>" required>

        <label>Penulis</label>
        <input type="text" name="penulis" value="<?= isset($buku['penulis']) ? htmlspecialchars($buku['penulis']) : '' ?>" required>

        <label>Penerbit</label>
        <input type="text" name="penerbit" value="<?= isset($buku['penerbit']) ? htmlspecialchars($buku['penerbit']) : '' ?>" required>

        <label>Tahun Terbit</label>
        <input type="text" name="thnTerbit" value="<?= isset($buku['tahun_terbit']) ? htmlspecialchars($buku['tahun_terbit']) : '' ?>" required>

        <button type="submit" name="submit" class="btn">Submit</button>
        <a href="Buku.php"><button type="button" class="btn">Kembali</button></a>
    </form>
</div>

<?php
    if (isset($_POST['submit'])) {
        $data = [
            'id_buku' => $_POST['id_buku'],
            'judul' => $_POST['judul'],
            'penulis' => $_POST['penulis'],
            'penerbit' => $_POST['penerbit'],
            'thnTerbit' => (int) $_POST['thnTerbit']
        ];

        if ($action == 'add') {
            addBuku($data);
        } else {
            updateBuku($data);
        }
        header('Location: Buku.php');
        exit;
    }
?>
</body>
</html>