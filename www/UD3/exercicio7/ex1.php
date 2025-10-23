<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $puntos = array("Ana"=>123, "Belén"=>14,"Felipe"=>3, "Moncho"=>245, "Artur"=>10);
        sort($puntos);
        foreach ($puntos as $key => $value) {
            echo "$key - $value <br>";
        }
    ?>
</body>
</html>     