<?php
session_start();

$usuario = $_GET['usuario'];
$passwd = $_GET['passwd'];

$pdo = new PDO("mysql:host=db;dbname=tarefa5.7;charset=utf8mb4", "tarefa", "Tarefa5.7");
$pdoStatement = $pdo->prepare("SELECT contrasinal FROM usuarios WHERE nome like :usuario");
$pdoStatement->execute(array(':usuario' => $usuario));

if ($pdoStatement->rowCount() == 0) {
    header('Location: login.php?errorlo=2');
}

$fila = $pdoStatement->fetch();
$passwdBD = $fila['contrasinal'];
if(!password_verify($passwd, $passwdBD)) {
    header('Location: login.php?errorlo=2');
} else {
    $_SESSION['usuario'] = $usuario;
    header('Location: mostra.php');
}