<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_GET['idade'] < 18)
            echo "Hola " . $_GET['nome'] . " " . $_GET['apelidos'] . " es menor de idade";
        elseif ($_GET['idade'] > 65)
            echo "Hola " . $_GET['nome'] . " " . $_GET['apelidos'] . " estás en idade de xubilación";
        else 
            echo "Hola " . $_GET['nome'] . " " . $_GET['apelidos'] . " estás en idade de traballar";

    ?>
</body>
</html>