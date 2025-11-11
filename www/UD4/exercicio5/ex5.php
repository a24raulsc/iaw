<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form action="ex5.php" method="get">
        <textarea name="nome" rows="1" cols="20" placeholder="Nome"></textarea>
        <br><br>
        <button type="submit" name="BuscarN">Buscar por nome</button>
        <br><br><br>
        <textarea name="apelidos" rows="1" cols="20" placeholder="Apelidos"></textarea>
        <br><br>
        <button type="submit" name="BuscarA">Buscar por apelidos</button>
    </form>
    <?php
        $servidor="db";
        $usuario="root";
        $passwd="root";
        $base="proba";
        try {
            //CONECTAMOS
            $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
            //Para xerar excepcións cando se informe dun erro
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
        }
        
        if(!empty($_GET['nome']))
        try {
            $nome = $_GET['nome'];
            $pdoStatement = $pdo->prepare("SELECT * from cliente where nome = :nome");
            $pdoStatement->bindParam(':nome', $nome);
            $pdoStatement->execute();

            while ($fila = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
                echo "<h2>Cliente atopado con ese nome:</h2>";
                echo "Código Cliente: " . $fila['codCliente'] . "<br>";
                echo "Nome: " . $fila['nome'] . "<br>";
                echo "Apelidos: " . $fila['apelidos'] . "<br><br>";
            }
        } catch (Exception $e) {
            echo "Erro ao buscar cliente: ". $e->getMessage();
        }
        
        if(!empty($_GET['apelidos']))
        try {
            $apelidos = $_GET['apelidos'];
            $pdoStatement = $pdo->prepare("SELECT * from cliente where apelidos = :apelidos");
            $pdoStatement->bindParam(':apelidos', $apelidos);
            $pdoStatement->execute();
            
            while ($fila = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
                echo "<h2>Cliente atopado con ese apelido:</h2>";
                echo "Código Cliente: " . $fila['codCliente'] . "<br>";
                echo "Nome: " . $fila['nome'] . "<br>";
                echo "Apelidos: " . $fila['apelidos'] . "<br><br>";
            }
        } catch (Exception $e) {
            echo "Erro ao buscar cliente: ". $e->getMessage();
        }
    ?>
</body>
</html>