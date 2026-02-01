<?php
session_start();

$pdo = new pdo("mysql:host=db;dbname=examen;charset=utf8mb4", "root", "root");
$pdoStatement = $pdo->prepare("SELECT contrasinal FROM contrasinal");
$pdoStatement->execute();
$fila = $pdoStatement->fetch();

if ($_GET['clave'] == $fila['contrasinal'] ){
    try {
        $usuario = htmlspecialchars($_GET['nome']);
        $email = htmlspecialchars($_GET['mail']);
        $contrasinal = password_hash(htmlspecialchars($_GET['contrasinal']), PASSWORD_DEFAULT);
        $pdo = new pdo("mysql:host=db;dbname=examen;charset=utf8mb4", "root", "root");
        $pdoStatement = $pdo->prepare("INSERT INTO especialista(nome, email, contrasinal) VALUES(:nome, :email, :contrasinal)");
        $pdoStatement->bindParam(":nome", $usuario);
        $pdoStatement->bindParam(":email", $email);
        $pdoStatement->bindParam(":contrasinal", $contrasinal);
        $pdoStatement->execute();

        header('Location: login.php?erro=0');
    }
    catch(Exception $e){
        header('Location: login.php?erro=1');
    }
}

else{
    header('Location: login.php?erro=2');
}

?>