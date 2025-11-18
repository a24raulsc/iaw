<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form action="mostra.php" method="GET">
        <button name="todo">Listar todo</button>
        <br><br>
        <button name="marca">Listar ordenado por marca</button>
        <br><br>
        <button name="prezo">Listar ordenado por precio</button>
        <br><br>
        <textarea cols="20" rows="1" placeholder="Nombre de la marca" name="buscarMarca"></textarea>
        <br>
        <input type="submit" name="enviar">
        <br><br><br>
        <textarea cols="20" rows="1" name="buscarcualquiera" placeholder="busca cualquiera"></textarea>
        <br>
        <input type="submit" name="enviar2">
        <br><br><br>
        </form>
        <form action="mostra.php" method="GET">
            <select name="tipo" id="tipo">
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
                        

                        $pdoStatement = $pdo->prepare("SELECT distinct Tipo FROM material");
                        $pdoStatement->execute();


                        while($fila = $pdoStatement->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='".$fila['Tipo']."'>".$fila['Tipo']."</option>";
                        }
                    ?>
            </select>
            <br><br>
            <input type="submit" name="enviar3">
        </form>
        <form action="edicion.php" method="GET">
            <br><br>
            <button type="submit" name="edicion">Páxina de modificación</button>
        </form>

</body>
</html>