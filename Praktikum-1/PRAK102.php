<?php
    $jari_jari = 4.2;
    $tinggi = 5.4;
    $panjang = 8.9;
    $lebar = 14.7;
    $sisi = 7.9;

    $volume_bola = number_format((4/3) * 3.14 * pow($jari_jari, 3), 3, ',', '');
    echo  "$volume_bola m3";
?>