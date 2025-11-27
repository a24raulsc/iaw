<?php
    session_start();

    if(isset($_GET['error'])){
        echo "<script>alert('Usuario ou contrasinal incorrecto');</script>";
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form method="GET" action="datos.php">
        <label>Usuario: </label>
        <input type="text" name="usuario">
        <br>
        <label>Contrasinal: </label>
        <input type="password" name="contrasinal">
        <button type="submit" name="enviar">Enviar</button>
        <br><br>
    </form>
</body>
</html>