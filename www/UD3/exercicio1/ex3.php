<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex3.css">
</head>
<body>
    <?php

       for ($i= 1, $j=1; $i<=50; $i=$i+2, $j++) {
        echo "<h2>O $j º impar é $i<h2>";
       }

    ?>
</body>
</html>