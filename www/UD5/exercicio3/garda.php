<?php
    $servidor="db";
    $usuario="root";
    $passwd="root";
    $base="rexistros";
    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
    }

    $usu = $_GET['usuario'];
    $passHasheado = password_hash($_GET['passwd'], PASSWORD_DEFAULT);

    $pdoStatement = $pdo->prepare("INSERT INTO usuarios (usuario, contrasinal) VALUES (:usuario , :contrasinal)");
    $pdoStatement->bindParam(":usuario",$usu);
    $pdoStatement->bindParam(":contrasinal", $passHasheado);

    $pdoStatement->execute();
?>