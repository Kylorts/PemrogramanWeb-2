<!DOCTYPE html>
<body>
    <form action="" method="POST">
        <input type="text" name="input">
        <input type="submit" value="submit" name="submit">
    </form>
</body>

<?php
    if(isset($_POST["submit"])){
        $output = "";
        $input = $_POST["input"];
        $length = strlen($input);

        for ($i = 0; $i < $length; $i++){
            $char = $input[$i];

            if(ctype_space($char)){
                continue;
            }

            $result = strtoupper($char) . str_repeat(strtolower($char), $length - 1);
            $output = $output . $result;
        }

        echo"<h2>Input:</h2>";
        echo "$input";
        echo "<h2>Output:</h2>";
        echo "$output";
    }
?>