<!DOCTYPE html>
<body>
    <form action="" method="POST">
        Tinggi : <input type="text" name="tinggi"><br>
        Alamat Gambar : <input type="text" name="gambar"><br>
        <input type="submit" value="Cetak" name="cetak">
    </form>
</body>

<?php
    if(isset($_POST["cetak"])){
        $tinggi = intval($_POST["tinggi"]);
        $gambar =$_POST["gambar"];

        echo"<br>";
        $i = 0;
        $spasi = 0;
        while ($i < $tinggi) {
            $j = 0;
            while ($j < $spasi) {
                echo "<span style='display:inline-block; width:30px;'></span>";
                $j++;
            }

            while ($j < $tinggi) {
                echo "<img src='$gambar' width='30' height='30'>";
                $j++;
            }
            echo "<br>";
            $i++;
            $spasi++;
        }
    }
?>