<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            
            border-collapse: collapse;
            margin-top: 10px;
            width: 50%;
        }
        td {
            border: 1px solid black;
        }
        th {
            background-color: #d3d3d3;
            border: 1px solid black
        }
    </style>
</head>
<body>
   <?php
        $mahasiswa = [
            "Andi" => [
                "NIM" => "2101001",
                "UTS" => "87",
                "UAS" => "65"
            ],
            "Budi" => [
                "NIM" => "2101002",
                "UTS" => "76",
                "UAS" => "79"
            ],
            "Tono" => [
                "NIM" => "2101003",
                "UTS" => "50",
                "UAS" => "41"
            ],
            "Jessica" => [
                "NIM" => "2101004",
                "UTS" => "60",
                "UAS" => "75"
            ],
        ];
        
        foreach ($mahasiswa as $nama => $data){
            $nilaiAkhir = ($data['UTS'] * 0.4) + ($data['UAS'] * 0.6);
            if (fmod($nilaiAkhir, 1) == 0){
                $nilaiAkhir = number_format($nilaiAkhir, 0);
            } else {
                $nilaiAkhir = number_format($nilaiAkhir, 1);
            }
            $mahasiswa[$nama]['Nilai Akhir'] = $nilaiAkhir;

            if ($nilaiAkhir >= 80 && $nilaiAkhir <= 100) {
                $huruf = "A";
            } elseif ($nilaiAkhir >= 70) {
                $huruf = "B";
            } elseif ($nilaiAkhir >= 60) {
                $huruf = "C";
            } elseif ($nilaiAkhir >= 50) {
                $huruf = "D";
            } elseif ($nilaiAkhir >= 0 && $nilaiAkhir < 50) {
                $huruf = "E";
            } else {
                $huruf = "-";
            }

            $mahasiswa[$nama]['Huruf'] = $huruf;
        }

        echo "<table>";
        echo "<tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Huruf</th>
              </tr>";

        foreach ($mahasiswa as $nama => $data) {
            echo"<tr>";
            echo "<td>$nama</td>";
            echo "<td>{$data['NIM']}</td>";
            echo "<td>{$data['UTS']}</td>";
            echo "<td>{$data['UAS']}</td>";
            echo "<td>{$data['Nilai Akhir']}</td>";
            echo "<td>{$data['Huruf']}</td>";
            echo "</tr>";
        }
   ?>
</body>
</html>