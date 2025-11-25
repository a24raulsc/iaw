<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form method="GET" action="login.php">
        <label>Usuario: </label>
        <input type="text" name="usuario">
        <br>
        <label>Contrasinal: </label>
        <input type="password" name="contrasinal">
        <button type="submit" name="enviar">Enviar</button>
        <br><br>
    </form>
    <?php
        if (isset($_GET['enviar'])) {
            $servidor="db";
            $usuario= $_GET['usuario'];
            $passwd= $_GET['contrasinal'];
            $base="Empresa";
            try {
                $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conexión correcta";
            } catch (Exception $e) {
                echo "Erro ao conectar co servidor MySQL, usuario ou contrasinal incorrectos";
            }
        }
    ?>
</body>
</html>