<?php
    if (isset($_GET['enviar'])) {
        $nombre = $_GET['nombre'];
        $valor = $_GET['valor'];
        setcookie($nombre, $valor, time() + 5); 
        header("Location: cookie.php");
    }

    foreach ($_COOKIE as $key => $value) {
        echo "<p>Cookie: $key</p>";
        echo "<p>Valor: $value </p>";
        echo str_repeat("-", 30);   
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
    <br><br><br>
    <form action="cookie.php" method="get">
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <br><br>
        <label>Valor:</label>
        <input type="text" name="valor">
        <br><br>
        <input type="submit" name="enviar">
    </form>
</body>
</html>
