<?php
session_start();

echo "<h1>Hola de nuevo " . $_SESSION['usuario'] . "</h1><br>";
echo "<a href='pechar.php'>Pechar sesión</a><br><br>";

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

$pdo = new PDO("mysql:host=db;dbname=tarefa5.7;charset=utf8mb4", "tarefa", "Tarefa5.7");
$pdoStatement = $pdo->prepare("SELECT rol FROM usuarios WHERE nome like :usuario");
$pdoStatement->bindParam(':usuario', $_SESSION['usuario']);
$pdoStatement->execute();
$fila = $pdoStatement->fetch();
$rol = $fila['rol'];

if ($rol == 'moderador' or $rol == 'administrador') {
    echo "<a href='xestiona.php'>Xestionar comentarios</a><br><br>";
}

$pdoStatement = $pdo->prepare("SELECT * FROM produto");
$pdoStatement->execute();
echo "<table>";
echo "<tr><th>IDproduto</th><th>Nome</th><th>Descrición</th><th>Familia</th><th>imaxe</th><th>Comentar</th></tr>";
while ($fila = $pdoStatement->fetch()) {
    echo "<tr><td>".$fila['idProduto']."</td><td>".$fila['nome']."</td><td>".$fila['descripcion']."</td><td>".$fila['familia']."</td><td><img src=imaxes/".$fila['imaxe']."></td><td><form method='get' action='comenta.php'><button name='idProduto' value='".$fila['idProduto']."'>Comentar</button></form></td></tr>";
}
echo "</table>";

if (isset($_GET['comentado']) && $_GET['comentado'] == 'true') {
    echo "<script>alert('Comentario realizado correctamente. Grazas pola súa contribución.');</script>";
}