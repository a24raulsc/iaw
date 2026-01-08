<?php
if (isset($_GET['cookie'])) {
    $modo = $_GET['modo'];
    setcookie("modo", $modo, time() + 300);
    header("Location: login.php");
}

if (isset($_COOKIE['modo'])) {
    if ($_COOKIE['modo'] == 'claro') {
        echo "<style>body { background-color: white; color: black; }</style>";
    } elseif ($_COOKIE['modo'] == 'oscuro') {
        echo "<style>body { background-color: black; color: white; }</style>";
    }
}
?>
<!DOCTYPE html>
<html>
<style>
    a{
        color: red;
        text-decoration: none;    
    }
</style>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
    <h1>Iniciar sesión</h1>
    <form action="validalogin.php" method="get">
        <label>Usuario</label>
        <input type="text" name="usuario">
        <br><br>
        <label>Contraseña</label>
        <input type="password" name="passwd">
        <br><br>
        <input type="submit" value="Enviar">
        <br><br><br>
    </form>
    <form action="login.php" method="get">
        <label>Modo</label>
        <select name="modo">
            <option value="claro">Claro</option>
            <option value="oscuro">Oscuro</option>
        </select>
        <br><br>
        <input type="submit" name="cookie" value="aplicar">
    </form>
    <br><br><br><br>
    <a href="rexistro.html">Rexistrarse</a>
    <br><br>
    <a href="pechar.php">Pechar sesión</a>
</body>
</html>
<?php
    $servidor = "db";
    $usuario = "tarefa";
    $passwd = "Tarefa5.7";
    $base = "tarefa5.7";
    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Erro ao conectar co servidor MySQL: " . $e->getMessage();
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 0) {
            echo "<h1>Rexistro realizado correctamente</h1>";
        } else {
            echo "<h1>Erro no rexistro do usuario, pode que xa exista este usuario</h1>";
        }
    }
    if (isset($_GET['errorlo'])) {
        if ($_GET['errorlo'] == 2) {
            echo "<h1>Contrasinal ou usuario incorrecto</h1>";
        } else {
            echo "<h1>Erro no rexistro do usuario</h1>";
        }
    }
?>