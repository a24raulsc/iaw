<?php
session_start();

    $servidor="db";
    $usuario="root";
    $passwd="root";
    $base="proba";
    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
    }

    if ($_SESSION['rol'] = 'usuario') {
        $pdoStatement = $pdo->prepare("SELECT ultimaconexion FROM usuariosTempo WHERE nome like :usuario");
        $pdoStatement->bindParam(":usuario", $_SESSION['usuario']);
        $pdoStatement->execute();
        $fila = $pdoStatement->fetch();
        $ultimaConexion = $fila['ultimaconexion'];
        echo "<h1>Benvido usuario " . $_SESSION['usuario'] . " a súa última conexión foi: " . $ultimaConexion . "</h1>";
    }

    if ($_SESSION['rol'] = 'admin') {
        $pdoStatement = $pdo->prepare("SELECT nome, ultimaconexion FROM usuariosTempo");
        $pdoStatement->execute();
        echo "<h1>Benvido administrador " . $_SESSION['usuario'] . "</h1>";
        echo "<h2>Listado de usuarios e a súa última conexión:</h2>";
        echo "<ul>";
        while ($fila = $pdoStatement->fetch()) {
            echo "<li>Usuario: " . $fila['nome'] . " - Última conexión: " . $fila['ultimaconexion'] . "</li>";
        }
        echo "</ul>";
    }