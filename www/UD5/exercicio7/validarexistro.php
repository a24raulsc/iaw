<?php
session_start();

try {
    $usuario = htmlspecialchars($_GET['nome']);
    $nomecompleto = htmlspecialchars($_GET['nomecompleto']);
    $rol = "usuario";
    $mail = htmlspecialchars($_GET['mail']);
    $passHasheado = password_hash(htmlspecialchars($_GET['passwd']), PASSWORD_DEFAULT);

    $pdo = new PDO("mysql:host=db;dbname=tarefa5.7;charset=utf8mb4", "tarefa", "Tarefa5.7");
    $pdoStatement = $pdo->prepare("INSERT INTO usuarios (nome, nomeCompleto, contrasinal, email, rol) VALUES (:usuario, :nomecompleto, :passwd, :mail, :rol)");
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