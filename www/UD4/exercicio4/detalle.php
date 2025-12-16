<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='detalle.css'>
</head>
<body>
    <?php
        $conexion = mysqli_connect("db", "root", "root", "tendaInformatica");
        $conexion->set_charset("utf8");

        if(isset($_GET['detalle'])) {
            $idProducto = $_GET['detalle'];
            $consulta="SELECT * FROM productos WHERE id = '$idProducto'";
            $resultado=$conexion->query($consulta);
            echo "<h1>Detalle del producto</h1>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Nombre_corto</th><th>Descripción</th><th>PVP</th><th>Familia</th></tr>";

            while($fila=$resultado->fetch_array()){
                echo "<tr><td>".$fila['id']."</td><td>".$fila['nombre']."</td><td>".$fila['nombre_corto']."</td><td>".$fila['descripcion']."</td><td>".$fila['pvp']."€</td><td>".$fila['familia']."</td></tr>";
            }
        }
        echo "</table>";
        $conexion->close();
    ?>
    <form action="inicio.php" method="GET">
        <button type="submit" name="volver" id="volver">Volver</button>
    </form>
</body>
</html> 