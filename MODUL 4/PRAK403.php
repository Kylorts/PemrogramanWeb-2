<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1.3px solid black;
            text-align:center;
            padding: 8px;
        }
        th {
            background-color: #d3d3d3;
        }
    </style>
</head>
<body>
<?php
$data = [
    [
        'nama' => 'Ridho',
        'mata_kuliah' => [
            ['nama' => 'Pemrograman I', 'sks' => 2],
            ['nama' => 'Praktikum Pemrograman I', 'sks' => 1],
            ['nama' => 'Pengantar Lingkungan Lahan Basah', 'sks' => 2],
            ['nama' => 'Arsitektur Komputer', 'sks' => 3],
        ]
    ],
    [
        'nama' => 'Ratna',
        'mata_kuliah' => [
            ['nama' => 'Basis Data I', 'sks' => 2],
            ['nama' => 'Praktikum Basis Data I', 'sks' => 1],
            ['nama' => 'Kalkulus', 'sks' => 3],
        ]
    ],
    [
        'nama' => 'Tono',
        'mata_kuliah' => [
            ['nama' => 'Rekayasa Perangkat Lunak', 'sks' => 3],
            ['nama' => 'Analisis dan Perancangan Sistem', 'sks' => 3],
            ['nama' => 'Komputasi Awan', 'sks' => 3],
            ['nama' => 'Kecerdasan Bisnis', 'sks' => 3],
        ]
    ],
];


echo "<table>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
      </tr>";

$no = 1;
foreach ($data as $mhs) {
    $total_sks = 0;
    foreach ($mhs['mata_kuliah'] as $mk) {
        $total_sks += $mk['sks'];
    }

    if($total_sks < 7){
        $keterangan = "Revisi KRS";
    } else {
        $keterangan = "Tidak Revisi";
    }

    $rowspan = count($mhs['mata_kuliah']);
    $first_row = true;

    foreach ($mhs['mata_kuliah'] as $mk) {
        echo "<tr>";
        if ($first_row) {
            echo "<td rowspan='$rowspan'>{$no}</td>";
            echo "<td rowspan='$rowspan'>{$mhs['nama']}</td>";
        }
        echo "<td style='text-align:left'>{$mk['nama']}</td>";
        echo "<td>{$mk['sks']}</td>";
        if ($first_row) {
            echo "<td rowspan='$rowspan'>{$total_sks}</td>";
            if($keterangan === "Revisi KRS"){
                echo "<td rowspan='$rowspan' style='background-color:red'>{$keterangan}</td>";
            } else {
                echo "<td rowspan='$rowspan' style='background-color:green'>{$keterangan}</td>";
            }
            $first_row = false;
        }
        echo "</tr>";
    }

    $no++;
}
echo "</table>";
?>
</body>
</html>