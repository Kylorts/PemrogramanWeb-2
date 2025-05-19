<!DOCTYPE html>
<body>
    <form action="" method="POST">
        Nilai : <input type="text" name="nilai"><br>
        Dari : <br>
        <input type="radio" name="skalaAwal" value="°C">Celcius<br>
        <input type="radio" name="skalaAwal" value="°F">Fahrenheit<br>
        <input type="radio" name="skalaAwal" value="°R">Rheamur<br>
        <input type="radio" name="skalaAwal" value="°K">Kelvin<br>

        Ke : <br>
        <input type="radio" name="skalaTujuan" value="°C">Celcius<br>
        <input type="radio" name="skalaTujuan" value="°F">Fahrenheit<br>
        <input type="radio" name="skalaTujuan" value="°R">Rheamur<br>
        <input type="radio" name="skalaTujuan" value="°K">Kelvin<br>

        <input type="submit" value="Konversi" name="konversi">
    </form>
</body>

<?php
    function keCelcius($nilai, $dari){
        switch ($dari) {
            case "°C": return $nilai;
            case "°F": return 5/9 * ($nilai - 32);
            case "°R": return 5/4 * $nilai;
            case "°K": return $nilai - 273.15;
        }
    }

    function dariCelcius($nilai, $ke){
        switch ($ke) {
            case "°C": return $nilai;
            case "°F": return (9/5 * $nilai) + 32;
            case "°R": return 4/5 * $nilai;
            case "°K": return $nilai + 273.15;
        }
    }


    if(isset($_POST["konversi"])){
        if(empty($_POST["nilai"])){
            exit();
        }

        $nilai = floatval($_POST["nilai"]);
        $dari = $_POST["skalaAwal"];
        $ke = $_POST["skalaTujuan"];

        $Celcius = keCelcius($nilai, $dari);
        $hasilKonversi = dariCelcius($Celcius, $ke);
        $hasilKonversi = number_format($hasilKonversi, 1, '.', '');

        echo "<h1>Hasil Konversi: $hasilKonversi $ke</h1>";
    }
?>