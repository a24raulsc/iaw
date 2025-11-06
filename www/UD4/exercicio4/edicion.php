<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <h1>Edición de productos</h1>
    <!-- Formulario con 6 campos necesarios para los procesos (añadir/modificar/borrar) -->
    <form action="edicion.php" method="get">
        <textarea id="id" name="id" rows="1" placeholder="ID del producto"></textarea><br><br>

        <textarea id="nombre" name="nombre" rows="1" placeholder="Nombre"></textarea><br><br>

        <textarea id="nombre_corto" name="nombre_corto" rows="1" placeholder="Nombre corto"></textarea><br><br>

        <textarea id="descripcion" name="descripcion" rows="4" placeholder="Descripción"></textarea><br><br>

        <textarea id="pvp" name="pvp" rows="1" placeholder="PVP (ej. 19.99)"></textarea><br><br>

        <textarea id="familia" name="familia" rows="1" placeholder="Familia"></textarea><br><br>

        <p>
            <button type="submit" name="accion" value="añadir">Añadir producto</button>
            <button type="submit" name="accion" value="modificar">Modificar producto</button>
            <br><br>
        </p>
        <textarea  rows="1" placeholder="Nombre"></textarea><br><br>
        <button type="submit" name="accion" value="borrar">Borrar producto</button>
    </form>

    <?php
        // Conexión a la base de datos
        $conexion = mysqli_connect("db", "root", "root", "tendaInformatica");
        $conexion->set_charset("utf8");
        
        $accion = '';

        if(isset($_GET['accion'])) {
            $accion = $_GET['accion'];
        } 

        if ($accion === 'añadir') {
            $consulta = "INSERT INTO productos (nombre, nombre_corto, descripcion, pvp, familia) VALUES '$nombre', '$nombre_corto', '$descripcion', '$pvp', '$familia')";
            $conexion->query($consulta);
        } elseif ($accion === 'modificar') {
            $consulta = "UPDATE productos SET nombre='$nombre', nombre_corto='$nombre_corto', descripcion='$descripcion', pvp='$pvp', familia='$familia' WHERE id='$id'";
            $conexion->query($consulta);
        } elseif ($accion === 'borrar') {
            $consulta = "DELETE FROM productos WHERE nombre='$nombre'";
            $conexion->query($consulta);
        }

        if ($accion == '') {
            mysqli_set_charset($conexion, "utf8");
            $resultado = mysqli_query($conexion, $consulta);
            if ($resultado != false) {
                    echo"<h1>Modificación correcta<h1>";
                }
        }
    

        // Cierre de la conexión
        $conexion->close();
    ?>

</body>
</html>