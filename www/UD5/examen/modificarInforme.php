<?php
session_start();

if (isset($_COOKIE['modo'])) {
    if ($_COOKIE['modo'] == 'claro') {
        echo "<style>body { background-color: white; color: black; }</style>";
    } elseif ($_COOKIE['modo'] == 'oscuro') {
        echo "<style>body { background-color: black; color: white; }</style>";
    }
}

if (isset($_GET['modificar'])) {
    $_SESSION['id'] = $_GET['modificar'];
}

if (isset($_GET['hecho'])){
    $pdo = new pdo("mysql:host=db;dbname=examen;charset=utf8mb4", "root", "root");
    $pdoStatement = $pdo->prepare("UPDATE informes SET valoracion=:valoracion, informe=:informe WHERE id LIKE :id");
    $pdoStatement->bindParam(":id",$_SESSION['id']);
    $pdoStatement->bindParam(":valoracion",$_GET['valoracion']);
    $pdoStatement->bindParam("informe",$_GET['informe']);
    $pdoStatement->execute();

    header('Location: informes.php?mod=1');
}
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <h1>Comentar</h1>
    <form action="modificarInforme.php" method="get">
        <textarea row="10" column="10" placeholder="Comentario de exemplo" name="informe"></textarea>
        <br><br>
        <label>Nota</label>
        <input type="number" max="10" min="1" name="valoracion">
        <br><br>
        <input type="submit" name="hecho">
    </form>
    <br><br><br>
</body>
</html>
