<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PRAK104 </title>
    <style>
        table {
            width: auto;
            border: 1.5px solid black; 
        }

        th, td {
            border: 1.5px solid black;
        }
    </style>
</head>
<body>
    <?php $samsung = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5"); ?>
    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <?php foreach($samsung as $item) : ?>
        <tr>
            <td> <?php echo "$item"; ?> </td>
        </tr>
        <?php endforeach ?>
        </table>
</body>
</html>