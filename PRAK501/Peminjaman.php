<!DOCTYPE html>
<html>
<head>
    <title>Daftar Peminjaman</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
        }
        h1 {
            margin-top: 20px;
        }
        .button-container {
            width: 90%;
            margin: 0 auto 20px auto;
            display: flex;
            justify-content: space-between;
        }
        .btn {
            padding: 8px 16px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }
        .btn-blue {
            background-color: #007BFF;
        }
        .btn-green {
            background-color: #28a745;
        }
        .btn-red {
            background-color: #dc3545;
        }
        .styled-table {
            margin: auto;
            border-collapse: collapse;
            font-size: 0.9em;
            width: 90%;
            box-shadow: 0 0 20px rgba(79, 32, 32, 0.15);
        }
        .styled-table thead tr {
            background-color: #7494ec;
            color: #ffffff;
            text-align: center;
        }
        .styled-table th, .styled-table td {
            padding: 12px 15px;
            text-align: center;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
            max-width: 200px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #7494ec;
        }
    </style>
</head>
<body>
    <?php require_once 'Model.php';
        if(isset($_GET["hapus"])){
            $id = (int) $_GET['hapus'];
            deletePeminjaman($id);
            header("Location: Peminjaman.php");
            exit;
        }
    ?>
    <h1>Daftar Peminjaman</h1>
    <div class="button-container">
        <a href="index.php" class="btn btn-blue">Kembali</a>
        <a href="FormPeminjaman.php" class="btn btn-blue">Tambah Data Baru</a>
    </div>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Member</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php require_once 'Model.php';
                $peminjaman = getAllPeminjaman();
                if (count($peminjaman) > 0){
                    foreach ($peminjaman as $pinjam) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($pinjam['id_peminjaman']) . "</td>";
                        echo "<td>" . htmlspecialchars($pinjam['nama_member']) . "</td>";
                        echo "<td>" . htmlspecialchars($pinjam['judul_buku']) . "</td>";
                        echo "<td>" . htmlspecialchars($pinjam['tgl_pinjam']) . "</td>";
                        echo "<td>" . htmlspecialchars($pinjam['tgl_kembali']) . "</td>";
                        echo "<td>
                                <a href='FormPeminjaman.php?id=" . $pinjam['id_peminjaman'] . "' class='btn btn-green'>Edit</a>
                                <a href='Peminjaman.php?hapus=" . $pinjam['id_peminjaman'] . "' class='btn btn-red')'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } 
            ?>
        </tbody>
    </table>
</body>
</html>