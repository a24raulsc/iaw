<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (is_numeric( $_GET["n1"] ) == true && is_numeric($_GET["n2"]) == true )  {
            if ($_GET["operacion"] == "suma") {
                $resultado = ($_GET["n1"]) + ($_GET["n2"]);
                echo"{$resultado}";
            }
            elseif ($_GET["operacion"] == "resta") {
                $resultado = ($_GET["n1"]) - ($_GET["n2"]);
                echo"{$resultado}";
            }
            elseif ($_GET["operacion"] == "mult") {
                $resultado = ($_GET["n1"]) * ($_GET["n2"]);
                echo"{$resultado}";
            }
        }
        else {
            echo"debes proporcionar números";
        }
    ?>
</body>
</html>