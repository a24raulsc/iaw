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
    <form method="get" action="conexion2.php">
        <button type="submit" name="Orixe">Ordenar por orixe</button>
        <button type="submit" name="Destino">Ordenar por destino</button>
        <button type="submit" name="Distancia">Ordenar por distancia (menor a maior)</button>
        <button type="submit" name="OrixeDesc">Ordenar por orixe (descendente)</button>
        <button type="submit" name="DestinoDesc">Ordenar por destino (descendente)</button>
        <button type="submit" name="DistanciaDesc">Ordenar por distancia (maior a menor)</button>
        <br><br>
    </form>
    <?php
        $conexion = mysqli_connect("db", "root", "root", "folla1");
        if (isset($_GET['Orixe'])) {
            $consulta = "SELECT Orixe, Destino, Distancia FROM traxecto ORDER BY Orixe";
        }
        
        elseif (isset($_GET['Destino'])) {
            $consulta = "SELECT Orixe, Destino, Distancia FROM traxecto ORDER BY Destino";
        }
        
        elseif (isset($_GET['Distancia'])) {
            $consulta = "SELECT Orixe, Destino, Distancia FROM traxecto ORDER BY Distancia";
        }
        
        elseif (isset($_GET['OrixeDesc'])) {
           $consulta = "SELECT Orixe, Destino, Distancia FROM traxecto ORDER BY Orixe DESC";
        }
        
        elseif (isset($_GET['DestinoDesc'])) {
            $consulta = "SELECT Orixe, Destino, Distancia FROM traxecto ORDER BY Destino DESC";
        }

        elseif (isset($_GET['DistanciaDesc'])) {
            $consulta = "SELECT Orixe, Destino, Distancia FROM traxecto ORDER BY Distancia DESC";
        }

        if ($conexion) {
            echo "<table>";
            mysqli_set_charset($conexion, "utf8");
            $resultado = mysqli_query($conexion, $consulta);
                if ($resultado != false) {
                    while(list($Orixe,$Destino,$Distancia) = mysqli_fetch_array ( $resultado ) ){
                        echo "<tr><td>" . $Orixe . "</td><td>" . $Destino . "</td><td>" . $Distancia . "</td></tr>";
                    }
                    echo "</table>";
                }
        }
    ?>
</body>
</html>
