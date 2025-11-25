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
<?php
/* PODEMOS ACCEDER Á VARIABLE */
echo "O usuario é ",$_SESSION['usuario'];
$usuario = $_GET['usuario'];
$contrasinal = $_GET['contrasinal'];
$datos = array("nome"=>$usuario, "contrasinal"=>$contrasinal);
$_SESSION['datos'] = $datos;
?>
<h2>Estou na páxina 1b!! </h2>
<a href="sesion1a.php">Ir a sesion1a</a>
<br>
</body>
</html>