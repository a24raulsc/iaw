<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ( $_GET["numero"] == "1") {
            echo"Hoy es lunes";
        } 
        elseif ( $_GET["numero"] == "2") {
            echo "Hoy es martes";
        }
        elseif ( $_GET["numero"] == "3") {
            echo "Hoy es miércoles";
        }
        elseif ( $_GET["numero"] == "4") {
            echo "Hoy es jueves";
            }
        elseif ( $_GET["numero"] == "5") {
            echo "Hoy es viernes";
            }
        elseif ( $_GET["numero"] == "6") {
            echo "Hoy es sábado";
            }
        elseif ( $_GET["numero"] == "7") {
            echo "Hoy es domingo";
            }
        else { 
            echo"introduzca un número válido";
        }
    ?>
</body>
</html>