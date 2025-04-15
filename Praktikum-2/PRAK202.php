<!DOCTYPE html>
<head>
    <style>
        .error{color: red;}
    </style>
</head>

<?php
    $namaError= $nimError = $genderError = "";
    $nama = $nim = $gender ="";
    
    if(isset($_POST["submit"])){
        if(empty($_POST["nama"])){
            $namaError = "nama tidak boleh kosong";
        }
        else {
            $nama = $_POST["nama"];
        }

        if(empty($_POST["nim"])){
            $nimError = "nim tidak boleh kosong";
        }
        else {
            $nim = $_POST["nim"];
        }

        if(empty($_POST["gender"])){
            $genderError = "jenis kelamin tidak boleh kosong";
        }
        else {
            $gender = $_POST["gender"];
        }
    }
?>

<body>
    <form action="" method="POST">
        Nama: <input type="text" name="nama">
        <span class="error">*<?php echo $namaError;?></span><br>

        Nim: <input type="text" name="nim">
        <span class="error">*<?php echo $nimError;?></span><br>

        Jenis Kelamin : <span class="error">*<?php echo $genderError;?></span><br>
        <input type="radio" name="gender" value="Laki-laki">Laki-laki<br>
        <input type="radio" name="gender" value="Perempuan">Perempuan<br>
        <input type="submit" value="Submit" name="submit"><br>
    </form>
    <h1> Output: </h1>
</body>

<?php
    if(empty($namaError) && empty($nimError) && empty($genderError)){
        echo"$nama <br>";
        echo"$nim <br>";
        echo"$gender <br>";
    }
?>