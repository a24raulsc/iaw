<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='ex1.css'>
    <script src='main.js'></script>
</head>
<body>
    <form method="get" action="conexion3.php">
        <label>Buscar exemplar</label>
        <input type="text" name="buscar" id="buscar">
        <button type="submit" name="botonbuscar">Buscar</button>
        <br><br>
        <button type="submit" name="ordenado">Ordenado pola duración películas</button>
        <button type="submit" name="ordenadoDIR">Ordenado polo director</button>
        <button type="submit" name="ordenadoTIT">Ordenado polo título</button>
        <br><br>
    </form>
    <?php
        $conexion = mysqli_connect("db", "root", "root", "folla1");
        $consulta = '';

        if (isset($_GET['ordenado'])) {
            $consulta = "SELECT Titulo, Director, Duracion FROM peliculas ORDER BY Duracion";
        }
        
        elseif (isset($_GET['ordenadoDIR'])) {
            $consulta = "SELECT Titulo, Director, Duracion FROM peliculas ORDER BY Director";
        }
        
        elseif (isset($_GET['ordenadoTIT'])) {
            $consulta = "SELECT Titulo, Director, Duracion FROM peliculas ORDER BY Titulo";
        }
        elseif (isset($_GET['botonbuscar'])) {
            $buscar = $_GET['buscar'];
            $consulta = "SELECT Titulo, Director, Duracion FROM peliculas WHERE Titulo LIKE '%$buscar%' or Director LIKE '%$buscar%'";
        }
        

        if ($consulta != '') {
            echo "<table>";
            mysqli_set_charset($conexion, "utf8");
            $resultado = mysqli_query($conexion, $consulta);
                if ($resultado != false) {
                    echo "<tr><th>Título</th><th>Director</th><th>Duración</th></tr>";
                    while(list($Titulo,$Director,$Duracion) = mysqli_fetch_array ( $resultado ) ){
                        echo "<tr><td>" . $Titulo . "</td><td>" . $Director . "</td><td>" . $Duracion . "</td></tr>";
                    }
                    echo "</table>";
                }
        }
    ?>
</body>
</html>
