<!DOCTYPE html>
<body>
    <form action="" method="POST">
        Batas Bawah : <input type="text" name="batasBawah"><br>
        Batas Atas : <input type="text" name="batasAtas"><br>
        <input type="submit" value="Cetak" name="cetak">
    </form>
</body>

<?php
    if(isset($_POST["cetak"])){
        $batasBawah = $_POST["batasBawah"];
        $batasAtas = $_POST["batasAtas"];

        $i = 0;
        do {
            if(($batasBawah + 7) % 5 === 0){
                echo"<img src='star-images.png' width='20' height='20'>";
            }
            else {
                echo"$batasBawah ";
            }
            $batasBawah++;
        } while ($batasBawah <= $batasAtas);
    }
?>