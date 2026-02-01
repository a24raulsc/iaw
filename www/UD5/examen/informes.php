<?php
session_start();

if (isset($_COOKIE['modo'])) {
    if ($_COOKIE['modo'] == 'claro') {
        echo "<style>body { background-color: white; color: black; }</style>";
    } elseif ($_COOKIE['modo'] == 'oscuro') {
        echo "<style>body { background-color: black; color: white; }</style>";
    }
}

if (isset($_GET['info'])){
    $_SESSION['info'] = $_GET['info'];
}

if (isset($_GET['mod'])){
    echo"<h1>Modificación executada correctamente</h1>";
}

if (isset($_GET['comentario'])){
    $pdo = new pdo("mysql:host=db;dbname=examen;charset=utf8mb4", "root", "root");
    $pdoStatement = $pdo->prepare("SELECT MAX(id)+1 AS id FROM informes");
    $pdoStatement->execute();
    $fila = $pdoStatement->fetch();
    $id = $fila['id'];

    $pdoStatement = $pdo->prepare("INSERT INTO informes(id, instrumento, especialista, valoracion, informe) VALUES (:id, :info, :especialista, :valoracion, :informe)");
    $pdoStatement->bindParam(":id",$id);
    $pdoStatement->bindParam(":info",$_SESSION['info']);
    $pdoStatement->bindParam(":especialista",$_SESSION['usuario']);
    $pdoStatement->bindParam(":valoracion",$_GET['valoracion']);
    $pdoStatement->bindParam(":informe",$_GET['informe']);
    $pdoStatement->execute();
    
    header('Location: instrumentos.php?coment=1');
}

$pdo = new pdo("mysql:host=db;dbname=examen;charset=utf8mb4", "root", "root");
$pdoStatement = $pdo->prepare("SELECT * FROM informes WHERE instrumento LIKE :info");
$pdoStatement->bindParam("info",$_SESSION['info']);
$pdoStatement->execute();

echo "<style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
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
echo "<table>
        <tr><th>Instrumento</th><th>Valoracion</th><th>Informe</th><th>Modificar</th></tr>";
while ($fila = $pdoStatement->fetch()){
    if ($_SESSION['usuario'] == $fila['especialista']){
        echo "<tr><td>".$fila['instrumento']."</td><td>".$fila['valoracion']."</td><td>". $fila['informe']."</td><td><form method='get' action=modificarInforme.php><button name=modificar value=".$fila['id'].">Modificar</button></form></td></tr>";
    }
    else{
        echo "<tr><td>".$fila['instrumento']."</td><td>".$fila['valoracion']."</td><td>". $fila['informe']."</td></tr>";
    }
}
?>

<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <h1>Comentar</h1>
    <form action="informes.php" method="get">
        <textarea row="10" column="10" placeholder="Comentario de exemplo" name="informe"></textarea>
        <br><br>
        <label>Nota</label>
        <input type="number" max="10" min="1" name="valoracion">
        <br><br>
        <input type="submit" name="comentario">
    </form>
    <br><br><br>
    <a href="pechar.php">Pechar sesión</a>
    <br>
    <a href="instrumentos.php">Voltar a páxina principal</a>
    <br>
</body>
</html>