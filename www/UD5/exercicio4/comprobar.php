<?php
session_start();

$usuario = $_GET['usuario'];
$passwd = $_GET['passwd'];
$rol = $_GET['rol'];

$pdo = new PDO("mysql:host=db;dbname=proba;charset=utf8mb4", "root", "root");
$pdoStatement = $pdo->prepare("SELECT passwd FROM usuariosTempo WHERE nome like :usuario");
$pdoStatement->execute(array(':usuario' => $usuario));

if ($pdoStatement->rowCount() == 0) {
    header('Location: login.php?error=2');
}

$fila = $pdoStatement->fetch();
$passwdBD = $fila['passwd'];
if(!password_verify($passwd, $passwdBD)) {
    header('Location: login.php?error=2');
} else {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol'] = $rol;
    header('Location: mostra.php');
}