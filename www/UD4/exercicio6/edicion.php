<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form action="edicion.php" method="GET">
        <br><br>
        <textarea cols="30" rows="1" placeholder="Nome do producto a modificar" name="mod"></textarea>
        <textarea cols="20" rows="1" placeholder="nome" name="nome"></textarea>
        <textarea cols="20" rows="1" placeholder="marca" name="marca"></textarea>
        <textarea cols="20" rows="1" placeholder="tipo" name="tipo"></textarea>
        <textarea cols="20" rows="1" placeholder="prezo" name="prezo"></textarea>
        <textarea cols="20" rows="1" placeholder="imaxe" name="imaxe"></textarea>
        <br><br>
        <button type="submit" name="editar">Editar Produto</button>
        <br><br>
        <textarea cols="20" rows="1" placeholder="nome" name="nome2"></textarea>
        <textarea cols="20" rows="1" placeholder="marca" name="marca2"></textarea>
        <textarea cols="20" rows="1" placeholder="tipo" name="tipo2"></textarea>
        <textarea cols="20" rows="1" placeholder="prezo" name="prezo2"></textarea>
        <textarea cols="20" rows="1" placeholder="imaxe" name="imaxe2"></textarea>
        <br><br>
        <button type="submit" name="engadir">Engadir Produto</button>
        <br><br>
        <textarea cols="20" rows="1" placeholder="Nombre producto" name="eliminar"></textarea>
        <br><br>
        <button type="submit" name="elimar">Eliminar Produto</button>
    </form>
    <?php

        $servidor="db";
        $usuario="proba";
        $passwd="abc123..";
        $base="senderismo";
        try {
            $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
        }

        if(isset($_GET['editar'])) {
            $pdoStatement = $pdo->prepare("UPDATE material SET Nome = :nome , Marca = :marca , Tipo = :tipo , Prezo = :prezo, Imaxe = :imaxe WHERE Nome = :mod ");
            $pdoStatement->bindParam(':nome', $_GET['nome']);
            $pdoStatement->bindParam(':marca', $_GET['marca']);
            $pdoStatement->bindParam(':tipo', $_GET['tipo']);
            $pdoStatement->bindParam(':prezo', $_GET['prezo']);
            $pdoStatement->bindParam(':imaxe', $_GET['imaxe']);
            $pdoStatement->bindParam(':mod', $_GET['mod']);

            $pdoStatement->execute();
            echo "<h2>Modificación correcta<h2>";
        }

        if(isset($_GET['engadir'])) {
            $pdoStatement = $pdo->prepare("INSERT INTO material (Nome, Marca, Tipo, Prezo, Imaxe) VALUES (:nome, :marca, :tipo, :prezo, :imaxe)");
            $pdoStatement->bindParam(':nome', $_GET['nome2']);
            $pdoStatement->bindParam(':marca', $_GET['marca2']);
            $pdoStatement->bindParam(':tipo', $_GET['tipo2']);
            $pdoStatement->bindParam(':prezo', $_GET['prezo2']);
            $pdoStatement->bindParam(':imaxe', $_GET['imaxe2']);

            $pdoStatement->execute();
            echo "<h2>Modificación correcta<h2>";
        }

        if(isset($_GET['eliminar'])) {
            $pdoStatement = $pdo->prepare("DELETE FROM material WHERE ");
        }

    ?>
    <br><br><br><br><br><br><br>
    <form action="intro.php" method="GET">
        <button type="submit" name="volver">Volver</button>
    </form>
</body>
</html>