<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numeros = [$_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"], $_GET["n5"]];
        echo $numeros[0] . ", " . $numeros[1] . ", " .  $numeros[2] . ", " . $numeros[3] . ", " . $numeros[4];
        $suma = 0;
        $multi = $numeros[0];

        for ($i = 0; $i < 5; $i++) {
            $suma = $suma + $numeros[$i];
        }
        for ($i = 1; $i < 5; $i++) {
            $multi = $multi * $numeros[$i];
        }
        echo "<br> La suma es: " . $suma;
        echo "<br> El producto es: " . $multi;
        echo "<br> El número mayor es: " . max($numeros);
        echo "<br> El número menor es: " . min($numeros);
    ?>
</body>
</html>