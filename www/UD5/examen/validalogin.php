<?php
session_start();

$usuario = $_GET['usuario'];
$contrasinal = $_GET['contrasinal'];

    $pdo = new pdo("mysql:host=db;dbname=examen;charset=utf8mb4", "root", "root");
    $pdoStatement = $pdo->prepare("SELECT nome, contrasinal FROM especialista WHERE nome LIKE :nome");
    $pdoStatement->bindParam(":nome",$usuario);
    $pdoStatement->execute();
    $fila = $pdoStatement->fetch();

    if ($usuario == $fila['nome'] && password_verify($contrasinal, $fila['contrasinal'])){
        header('Location: instrumentos.php');
        $_SESSION['usuario']=$usuario;
    }
    else{
        header('Location: login.php?erro=2');
    }