<?php
session_start();

if (isset($_COOKIE['modo'])) {
    if ($_COOKIE['modo'] == 'claro') {
        echo "<style>body { background-color: white; color: black; }table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }</style>";
    } elseif ($_COOKIE['modo'] == 'oscuro') {
        echo "<style>body { background-color: black; color: white; }table, th, td {
            border: 1px solid white;
            border-collapse: collapse;
        }</style>";
    }
}

if (!isset($_COOKIE['modo'])) {
     echo "<style>body { background-color: white; color: black; }table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }</style>";
}

echo "<style>
        th, td {
            padding: 10px;
            height: 70%
            width: 70%
        }
        td img {
        max-height: 200px; /* asegura que la imagen no rompa la altura */
        width: auto;
        display: block;
        }
      </style>";

$pdo = new pdo("mysql:host=db;dbname=examen;charset=utf8mb4", "root", "root");
$pdoStatement = $pdo->prepare("SELECT * FROM instrumento");
$pdoStatement->execute();
echo "<table>";
echo "<tr><th>Nome</th><th>Apelido</th><th>Marca</th><th>Imaxe</th><th>Reseñar</th></tr>";
while ($fila = $pdoStatement->fetch()) {
    echo "<tr><td>".$fila['nome']."</td><td>".$fila['apelido']."</td><td>".$fila['marca']."</td><td><img src=imaxes/".$fila['imaxe']."></td><td><form method='get' action='informes.php'><button name='info' value=".$fila['nome'].">Valorar</button></td></tr>";
}
echo "</table>";

echo "<br><br><br><h1>VALORACIÓNS</h1>";
$pdoStatement = $pdo->prepare("SELECT instrumento, valoracion, informe FROM informes ORDER BY instrumento");
$pdoStatement->execute();
echo"<table>
    <tr><th>Instrumento</th><th>Valoracion</th><th>Informe</th></tr>";
while ($fila = $pdoStatement->fetch()) {
    echo "<tr><td>".$fila['instrumento']."</td><td>".$fila['valoracion']."</td><td>". $fila['informe']."</td></tr>";
}
echo "</table>
<a href='pechar.php'>Pechar sesión</a>";