<?php
require 'Model.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $member = getMemberById($id);

    if (!$member) {
        echo "Data member tidak ditemukan.";
        exit;
    }

    $heading = "Edit Member";
    $action = "edit";
} else {
    $heading = "Tambah Member";
    $action = "add";
    $member = null;
    $autoid = getNextAutoIncrementId();
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
        <input type="text" name="id_member" value="<?= isset($member['id_member']) ? $member['id_member'] : $autoid ?>" readonly>

        <label>Nama</label>
        <input type="text" name="nama" value="<?= isset($member['nama_member']) ? htmlspecialchars($member['nama_member']) : '' ?>" required>

        <label>Nomor</label>
        <input type="text" name="nomor" value="<?= isset($member['nomor_member']) ? htmlspecialchars($member['nomor_member']) : '' ?>" required>

        <label>Alamat</label>
        <input type="text" name="alamat" value="<?= isset($member['alamat']) ? htmlspecialchars($member['alamat']) : '' ?>" required>

        <label>Tanggal Terakhir Bayar</label>
        <input type="date" name="tglAkhir" value="<?= isset($member['tgl_terakhir_bayar']) ? htmlspecialchars($member['tgl_terakhir_bayar']) : '' ?>" required>

        <button type="submit" name="submit" class="btn">Submit</button>
        <a href="Member.php"><button type="button" class="btn">Kembali</button></a>
    </form>
</div>

<?php
    if (isset($_POST['submit'])) {
        $data = [
            'id_member' => $_POST['id_member'],
            'nama' => $_POST['nama'],
            'nomor' => $_POST['nomor'],
            'alamat' => $_POST['alamat'],
            'tglDaftar' => date('Y-m-d H:i:s'), 
            'tglAkhir' => $_POST['tglAkhir']
        ];

        if ($action == 'add') {
            addMember($data);
        } else {
            updateMember($data);
        }
        header('Location: Member.php');
        exit;
    }
?>
</body>
</html>