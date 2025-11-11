<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
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
            echo "Todo ben na conexión";
            echo "<br><br><br>";
        } catch (Exception $e) {
            echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
        }

        try {
            $codCliente = $_GET['cod'];
            $nome = $_GET['nome'];
            $apelido = $_GET['apelidos'];
            $sql2 = "INSERT INTO cliente (codCliente, nome, apelidos) VALUES (:codCliente, :nome, :apelidos)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindParam(':codCliente', $codCliente);
            $stmt2->bindParam(':nome', $nome);
            $stmt2->bindParam(':apelidos', $apelido);
            $stmt2->execute();
            echo "<h2>Cliente engadido correctamente</h2>";
        } catch (Exception $e) {
            echo "Erro ao inserir cliente: ". $e->getMessage();
        }
    ?>
</body>
</html>