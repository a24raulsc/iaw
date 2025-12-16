<?php
session_start();

try {
    $usuario = $_GET['nome'];
    $nomecompleto = $_GET['nomecompleto'];
    $rol = "usuario";
    $mail = $_GET['mail'];
    $passHasheado = password_hash($_GET['passwd'], PASSWORD_DEFAULT);

    $pdo = new PDO("mysql:host=db;dbname=tarefa5.7;charset=utf8mb4", "tarefa", "Tarefa5.7");
    $pdoStatement = $pdo->prepare("INSERT INTO usuarios (nome, nomeCompleto, contrasinal, email, ultimaconexion, rol) VALUES (:usuario, :nomecompleto, :passwd, :mail, NOW(), :rol)");
    $pdoStatement->bindParam(':usuario', $usuario);
    $pdoStatement->bindParam(':nomecompleto', $nomecompleto);
    $pdoStatement->bindParam(':passwd', $passHasheado);
    $pdoStatement->bindParam(':mail', $mail);
    $pdoStatement->bindParam(':rol', $rol);
    $pdoStatement->execute();

    header('Location: login.php?error=0');
} catch (Exception $e) {
    header('Location: login.php?error=1');
}
?>