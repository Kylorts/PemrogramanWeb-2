<!DOCTYPE html>
<body>
    <form action="" method="POST">
        Nilai : <input type="text" name="nilai"><br>
        <input type="submit" value="Konversi" name="konversi">
    </form>
</body>

<?php
    function kategoriBilangan($angka) {
        if($angka === 0){
            return "nol";
        }
        else if($angka >= 1 && $angka < 10) {
            return "satuan";
        }
        else if($angka >= 11 && $angka < 20) {
            return "belasan";
        }
        else if ($angka >= 10 && $angka < 100) {
            return "puluhan";
        }
        else if ($angka >= 100 && $angka <1000) {
            return "ratusan";
        }

        return "anda menginput melebihi limit bilangan";
    }

    if(isset($_POST["konversi"])){
        if(!isset($_POST["nilai"]) || $_POST["nilai"] === ""){
            exit();
        }
        
        $angka = intval($_POST["nilai"]);
        
        $hasilKonversi = kategoriBilangan($angka);
        echo"<h1>Hasil: $hasilKonversi</h1>";
    }
?>