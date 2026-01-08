<?php
session_start();

if (isset($_GET['idProduto'])){
    setcookie("idProduto", $_GET['idProduto'], time() + 9999);
}

if (isset($_GET['comentario'])) {
    $comentario = $_GET['comentario'];
    $usuario = $_SESSION['usuario'];
    $id = $_COOKIE['idProduto'];
    
    $pdo = new PDO("mysql:host=db;dbname=tarefa5.7;charset=utf8mb4", "tarefa", "Tarefa5.7");
    $pdoStatement = $pdo->prepare("SELECT MAX(idcomentario) AS max_id FROM comentarios");
    $pdoStatement->execute();
    $fila = $pdoStatement->fetch();
    $max_id = $fila['max_id'];
    $nuevo_id = $max_id + 1;
    
    $pdoStatement = $pdo->prepare("INSERT INTO comentarios (idcomentario, usuario, idProduto, comentario, datacreacion, datamoderacion, moderado) VALUES (:nuevo_id, :usuario, :id, :comentario, NOW(), NULL, 'non')");
    $pdoStatement->bindParam(':nuevo_id', $nuevo_id);
    $pdoStatement->bindParam(':usuario', $usuario);
    $pdoStatement->bindParam(':id', $id);
    $pdoStatement->bindParam(':comentario', $comentario);
    $pdoStatement->execute();

    header("Location: mostra.php?comentado=true");
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
    <form action="comenta.php" method="get">
        <textarea name="comentario" rows="4" cols="50" placeholder="Escribe tu comentario aquí..."></textarea><br>
        <input type="submit" value="comentar">
    </form>
</body>
</html>
