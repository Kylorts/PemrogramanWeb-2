<!DOCTYPE html>
<html>
<head>
    <title>Matriks Nilai</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 10px;
        }
        td {
            width: 20px;
            height: 30px;
            text-align: center;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        Panjang : <input type="text" name="panjang"><br>
        Lebar : <input type="text" name="lebar"><br>
        Nilai : <input type="text" name="nilai"><br>
        <input type="submit" value="Cetak" name="cetak">
    </form>

    <?php
    if (isset($_POST["cetak"])) {
        $panjang = intval($_POST["panjang"]);
        $lebar = intval($_POST["lebar"]);
        $nilai = $_POST["nilai"];
        $data = preg_split('/\s+/', $nilai);

        

        $totalSel = $panjang * $lebar;
        if(sizeof($data) > $totalSel){
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
            exit();
        }

        while (count($data) < $totalSel) {
            $data[] = "";
        }
        $matriks = array_chunk($data, $lebar);

        echo "<table>";
        for ($i = 0; $i < $panjang; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $lebar; $j++) {
                $isi = isset($matriks[$i][$j]) && $matriks[$i][$j] !== "" ? $matriks[$i][$j] : "&nbsp;";
                echo "<td>$isi</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>