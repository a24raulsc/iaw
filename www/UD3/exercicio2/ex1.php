<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(strcmp($_GET["usuario"],'pepe') == 0 && strcmp($_GET['contraseña'],'abc') == 0) 
            echo'Acceso permitido';

        elseif(strcmp($_GET["usuario"], 'jaime') == 0 && strcmp($_GET['contraseña'],'cba') == 0) 
            echo'Acceso permitido';

        elseif(strcmp($_GET['usuario'], 'efren') == 0 && strcmp($_GET['contraseña'],'123') == 0) 
            echo 'Acceso permitido';

        elseif(strcmp($_GET['usuario'], 'evaristo') == 0 && strcmp($_GET['contraseña'],'321') == 0) 
            echo 'Acceso permitido';

        else
            echo'Acceso denegado';
    ?>
</body>
</html>