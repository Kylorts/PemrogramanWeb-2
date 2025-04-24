<!DOCTYPE html>
<body>
    <?php
    $jumlahBintang = 0;

    if (isset($_POST["submit"])) {
        $jumlahBintang = intval($_POST["bintang"]);
    } 
    elseif (isset($_POST["tambah"])) {
        $jumlahBintang = intval($_POST["jumlah"]) + 1;
    } 
    elseif (isset($_POST["kurang"])) {
        $jumlahBintang = max(0, intval($_POST["jumlah"]) - 1);
    }

    if (isset($_POST["submit"]) || isset($_POST["tambah"]) || isset($_POST["kurang"])) {
        echo"Jumlah bintang $jumlahBintang<br>";
        for ($i = 0; $i < $jumlahBintang; $i++) {
            echo "<img src='star-images.png' width='50' height='50'>";
        }

        echo "
        <form method='POST'>
            <input type='hidden' name='jumlah' value='$jumlahBintang'><br>
            <input type='submit' name='tambah' value='tambah'>
            <input type='submit' name='kurang' value='kurang'>
        </form>
        ";
    } else {
    ?>
        <form method="POST">
            Jumlah bintang : <input type="text" name="bintang"><br>
            <input type="submit" name="submit" value="submit">
        </form>
    <?php
    }
    ?>
</body>