<?php
session_start();
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
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Nigger</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form action="validalogin.php" method="get">
        <label>Usuario</label>
        <input type="text" name="usuario">
        <br><br>
        <label>Contrasinal</label>
        <input type="password" name="contrasinal">
        <br><br>
        <input type="submit" value="Enviar">
        <br><br>
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
        <br><br><br>
    <a href="rexistro.html">Rexistrarse</a>
    <br><br>
    <a href="pechar.php">Pechar sesión</a>
</body>
</html>
<?php
    if (isset($_GET['erro'])){
        if ($_GET['erro'] == 0){
            echo"<h1>Rexistro realizado correctamente</h1>";
        }
        if ($_GET['erro'] == 1){
            echo"<h1>Algo saíu mal no rexistro</h1>";
        }
        if ($_GET['erro'] == 2){
            echo"<h1>A palabra clave é incorrecta, non se realizou o rexistro";
        }
    }
    if (isset($_GET['sesion'])){
        if ($_GET['sesion'] == 0){
            echo"<h1>A sesión pechouse correctamente</h1>";
        }
    }