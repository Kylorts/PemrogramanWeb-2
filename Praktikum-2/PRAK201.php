<!DOCTYPE html>
<body>
    <form action="" method="POST">
        Nama: 1 <input type="text" name="nama1"><br>
        Nama: 2 <input type="text" name="nama2"><br>
        Nama: 3 <input type="text" name="nama3"><br>
        <input type="submit" value="Urutkan" name="submit">
    </form>
</body>

<?php
    $daftarNama = array();

    if(isset($_POST["submit"])){
        array_push(
            $daftarNama, 
            $_POST['nama1'], 
            $_POST['nama2'], 
            $_POST['nama3']
        );
    }

    sort($daftarNama);
    foreach ($daftarNama as $nama){
        echo "$nama <br>";
    }
?>