<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
<br/>
    <form action="sesion1b.php" method="GET">
        <label>Usuario: </label>
        <input type="text" name="usuario">
        <br>
        <label>Contrasinal: </label>
        <input type="password" name="contrasinal">
        <button type="submit" name="enviar">Enviar</button>
        <br><br>
    </form>
<!-- DEFINIMOS UNHA VARIABLE -->
<?php
$_SESSION['usuario']="Xan";

foreach ($_SESSION['datos'] as $k => $v) {
        echo $k . " " . $v . "<br>" . " ";

}
?>
<h2>Estou na páxina 1a!! </h2>
<a href="sesion1b.php">Ir a sesion1b </a>
</body>
</html>