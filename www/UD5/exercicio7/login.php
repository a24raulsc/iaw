<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form action="comprobar.php" method="get">
        <label>Usuario</label>
        <input type="text" name="usuario">
        <br><br>
        <label>Contraseña</label>
        <input type="password" name="passwd">
        <br><br>
        <input type="submit" value="Enviar">
        <br><br><br>
    </form>
</body>
</html>
<?php
    $servidor="db";
    $usuario="tarefa";
    $passwd="Tarefa5.7";
    $base="tarefa5.7";
    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 0) {
            echo "<h1>Rexistro realizado correctamente</h1>";
        } else {
            echo "<h1>Erro no rexistro do usuario</h1>";
        }
    }
?>