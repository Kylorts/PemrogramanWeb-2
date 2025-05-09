<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
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
            deleteBuku($id);
            header("Location: Buku.php");
            exit;
        }
    ?>
    <h1>Daftar Buku</h1>
    <div class="button-container">
        <a href="index.php" class="btn btn-blue">Kembali</a>
        <a href="FormBuku.php" class="btn btn-blue">Tambah Data Baru</a>
    </div>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php require_once 'Model.php';
                $buku = getAllBuku();
                if (count($buku) > 0){
                    foreach ($buku as $buku) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($buku['id_buku']) . "</td>";
                        echo "<td>" . htmlspecialchars($buku['judul_buku']) . "</td>";
                        echo "<td>" . htmlspecialchars($buku['penulis']) . "</td>";
                        echo "<td>" . htmlspecialchars($buku['penerbit']) . "</td>";
                        echo "<td>" . htmlspecialchars($buku['tahun_terbit']) . "</td>";
                        echo "<td>
                                <a href='FormBuku.php?id=" . $buku['id_buku'] . "' class='btn btn-green'>Edit</a>
                                <a href='Buku.php?hapus=" . $buku['id_buku'] . "' class='btn btn-red')'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } 
            ?>
        </tbody>
    </table>
</body>
</html>