<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='produtos.css'>
</head>
<body>
    <?php
        $conexion = mysqli_connect("db", "root", "root", "tendaInformatica");
        $conexion->set_charset("utf8");

        if(isset($_GET['familia'])) {
                if($_GET['familia'] != "todos") {
                    $familiaSeleccionada = $_GET['familia'];
                    $consulta="SELECT * FROM productos WHERE familia = '$familiaSeleccionada'";
                    $resultado=$conexion->query($consulta);
                    echo "<h1>$familiaSeleccionada</h1>";
                    echo "<table>";
                    echo "<tr><th>Nombre</th><th>Descripción</th></tr>";
                } elseif($_GET['familia'] == "todos") {
                    $consulta="SELECT * FROM productos";
                    $resultado=$conexion->query($consulta);
                    echo "<h1>Todos los productos:</h1>";
                    echo "<table>";
                    echo "<tr><th>Nombre</th><th>Descripción</th></tr>";
                }
                echo "<form action='detalle.php' method='GET'>";
                while($fila=$resultado->fetch_array()){
                    $descripcion = substr($fila['descripcion'], 0, 100);
                    echo "<tr><td>".$fila['nombre']."</td><td>".$descripcion."...</td><td><button type='submit' name='detalle' value='".$fila['id']."'>Detalle</button></td></tr>";
                }
                echo "</form>";
                echo "</table>";
        }
        
        $conexion->close();
    ?>
    <br><br><br><br><br><br>
    <form action="inicio.php" method="GET">
        <button type="submit" name="volver" id="volver">Volver</button>
    </form>
</body>
</html>