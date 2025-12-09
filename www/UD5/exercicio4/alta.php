<?php
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

    try {
        $usu = $_GET['usuario'];
        $passHasheado = password_hash($_GET['passwd'], PASSWORD_DEFAULT);
        $rol = $_GET['rol'];

        $pdoStatement = $pdo->prepare("INSERT INTO usuariosTempo (nome, passwd, rol, ultimaconexion) VALUES (:usuario , :contrasinal, :rol, '1970-01-01 00:00:00')");
        $pdoStatement->bindParam(":usuario",$usu);
        $pdoStatement->bindParam(":contrasinal", $passHasheado);
        $pdoStatement->bindParam(":rol", $rol);

        $pdoStatement->execute();
        header('Location: login.php?error=0');
    } 
    catch (Exception $e) {
        header('Location: login.php?error=1');
    }
?>
