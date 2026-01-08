<?php
    $pdo = new PDO("mysql:host=db;dbname=tarefa5.7;charset=utf8mb4", "tarefa", "Tarefa5.7");

    if (isset($_GET['Aceptar'])) {
        $idcomentario = $_GET['Aceptar'];
        $pdoStatement = $pdo->prepare("UPDATE comentarios SET moderado = 'si', datamoderacion = NOW() WHERE idcomentario = :idcomentario");
        $pdoStatement->bindParam(':idcomentario', $idcomentario);
        $pdoStatement->execute();

        echo "<script>alert('Comentario moderado correctamente');</script>";
    }

    if (isset($_GET['Eliminar'])) {
        $idcomentario = $_GET['Eliminar'];
        $pdoStatement = $pdo->prepare("DELETE FROM comentarios WHERE idcomentario = :idcomentario");
        $pdoStatement->bindParam(':idcomentario', $idcomentario);
        $pdoStatement->execute();

        echo "<script>alert('Comentario eliminado correctamente');</script>";
    }

    echo "<style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
        }
      </style>";

    $pdoStatement = $pdo->prepare("SELECT * FROM comentarios WHERE moderado like 'non'");
    $pdoStatement->execute();

    echo "<table>";
    echo "<tr><th>Usuario</th><th>idProducto</th><th>Comentario</th><th>Data Creación</th><th>Marcar como moderado</th><th>Eliminar comentario</th></tr>";
    while ($fila = $pdoStatement->fetch()) {
        echo "<tr><td>".$fila['usuario']."</td><td>".$fila['idProduto']."</td><td>".htmlspecialchars($fila['comentario'])."</td><td>".$fila['datacreacion']."</td><td><form method='get' action='xestiona.php'><button name='Aceptar' value='".$fila['idcomentario']."'>Moderar</button></td><td><button name='Eliminar' value='".$fila['idcomentario']."'>Eliminar comentario</button></form></td></tr>";
    }
    echo "</table>";

    echo "<br><a href='mostra.php'>Volver á páxina principal</a>";
?>
