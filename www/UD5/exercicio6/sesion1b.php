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
echo "sesion id: " . session_id();
?>
<h2>Estou na páxina 1b!! </h2>
<a href="sesion1a.php">Ir a sesion1a</a>
<br>
<a href="pechar.php">Pechar sesión</a>
</body>
</html>