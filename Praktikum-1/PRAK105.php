<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK105</title>
    <style>
        table {
            width: auto;
            border: 1.5px solid black;
        }
        th {
            font-size: 22px;
            height: 70px;
            border: 1.5px solid black;
        }
        tr.header {
            background-color: red;
        }
        td {
            border: 1.5px solid black;
        }
    </style>
</head>
<body>
    <?php $samsung = array(
        "samsung1" => "Samsung Galaxy S22", 
        "samsung2" => "Samsung Galaxy S22+", 
        "samsung3" => "Samsung Galaxy A03", 
        "samsung4" => "Samsung Galaxy Xcover 5"
        ); ?>
    <table>
        <tr class = "header">
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <tr> <td> <?php echo $samsung["samsung1"]; ?></td></tr>
        <tr><td> <?php echo $samsung["samsung2"]; ?></td></tr>
        <tr><td> <?php echo $samsung["samsung3"]; ?></td></tr>
        <tr><td> <?php echo $samsung["samsung4"]; ?></td></tr>
        </table>
</body>
</html>