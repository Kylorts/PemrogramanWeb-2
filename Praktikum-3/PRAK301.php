<!DOCTYPE html>
<body>
    <form action="" method="POST">
        Jumlah Peserta : <input type="text" name="jumlah"><br>
        <input type="submit" value="Cetak" name="cetak">
    </form>
</body>

<?php
    $jumlah = 1;
    if(isset($_POST["cetak"])){
        $jumlahPeserta = $_POST["jumlah"];
        while($jumlah <= $jumlahPeserta){
            if($jumlah % 2 == 0){
                echo "<h1 style='color: green;'>Peserta ke-$jumlah</h1>";
            }
            else {
                echo "<h1 style='color: red;'>Peserta ke-$jumlah</h1>";
            }
            $jumlah++;
        }
    }
?>