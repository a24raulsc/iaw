<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='inicio.css'>
</head>
<body>
    <h1>hola</h1>
    <form action="produtos.php" method="GET">
        <select name="familia" id="familia">
            <?php
                $conexion = mysqli_connect("db", "root", "root", "tendaInformatica");
                $conexion->set_charset("utf8");
                
                $consulta ="SELECT * FROM familias";
                $resultado=$conexion->query($consulta);

                while($fila=$resultado->fetch_assoc()){
                    echo "<option value='".$fila['cod']."'>".$fila['nombre']."</option>";
                }

                $conexion->close();
            ?>
        <option value="todos">Todos</option>
        </select>
        <input type="submit" value="Consultar">
    </form>
    <br><br>
    <form action="inicio.php" method="GET">
        <label>Busca productos: </label>
        <input type="text" name="textoProducto" placeholder="Introduce producto...">
        <input type="submit" value="Buscar" name="buscarProducto">
    </form>
        <?php
        $conexion = mysqli_connect("db", "root", "root", "tendaInformatica");
        $conexion->set_charset("utf8");

        if(!empty($_GET['buscarProducto'])) {
            $busqueda = "$_GET[textoProducto]";
            $consulta="SELECT * FROM productos WHERE nombre = '$busqueda' or nombre_corto = '$busqueda' or descripcion = '$busqueda' or pvp = '$busqueda' or familia = '$busqueda'";
            $resultado=$conexion->query($consulta);
            echo "<h2>Productos encontrados:</h2>";
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Familia</th></tr>";
        }
        while($fila=$resultado->fetch_array()){
            echo "<tr><td>".$fila['nombre']."</td><td>".$fila['descripcion']."</td><td>".$fila['pvp']." €</td><td>Familia: ".$fila['familia']."</td></tr>";
        }
        
        echo "</table>";
        $conexion->close();
        ?>
        <br><br><br><br>
    <form action="edicion.php" method="GET">
        <button type="submit" name="edicion">Editar</button>
    </form>
</body>
</html>