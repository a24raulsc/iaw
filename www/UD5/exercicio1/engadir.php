<?php
    session_start();
?>  
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
    <form method="GET" action="engadir.php">
        <input type="text" name="numero" placeholder="Número">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="num_empregado_asignado" placeholder="Número de empregado asignado">
        <input type="text" name="limite_de_credito" placeholder="Límite de crédito">
        <button type="submit" name="novorexistro">Engadir rexistro</button>
    </form>
    <?php
        $_SESSION['usuario'] = 'Ana';

        if(isset($_GET['novorexistro'])){
            $numero = $_GET['numero'];
            $nome = $_GET['nome'];
            $num_empregado_asignado = $_GET['num_empregado_asignado'];
            $limite_de_credito = $_GET['limite_de_credito'];

            $pdo = new PDO("mysql:host=db;dbname=Empresa;charset=utf8mb4", $_SESSION['usuario'], "abc123..");
            $pdoStatement = $pdo->prepare("INSERT INTO cliente (numero, nome, num_empregado_asignado, limite_de_credito) VALUES (:numero, :nome, :num_empregado_asignado, :limite_de_credito)");
            $pdoStatement->bindParam(':numero', $numero);
            $pdoStatement->bindParam(':nome', $nome);
            $pdoStatement->bindParam(':num_empregado_asignado', $num_empregado_asignado);
            $pdoStatement->bindParam(':limite_de_credito', $limite_de_credito);
            $pdoStatement->execute();
        }

        echo "<br><br><a href='datos.php?usuario=Ana&contrasinal=abc123..&enviar='>Volver á lista de clientes</a>";

    ?>
</body>
</html>