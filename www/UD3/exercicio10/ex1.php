<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex1.css">
</head>
<body>
    <div class="site">
        <div class="topbar">
            <img src="imagenes/EncabezamentoCine.png" alt="Encabezado">
        </div>
        <div class="green-strip"></div>

        <div class="main">
            <div class="left">
                <img class="poster" src="imagenes/claqueta_1.jpg" alt="claqueta">
            </div>

            <aside class="right">
                <form action="ex1.php" method="GET" class="sidebar">
                    <label>Buscar exemplar</label>
                    <input type="text" name="buscar" id="buscar">
                    <button type="submit" name="botonbuscar">Buscar</button>
                    <div class="actions">
                        <button type="submit" name="completo">Ver listado completo das películas</button>
                        <button type="submit" name="ordenado">Ordenado pola duración películas</button>
                        <button type="submit" name="ordenadoDIR">Ordenado polo director</button>
                        <button type="submit" name="ordenadoTIT">Ordenado polo título</button>
                    </div>
                    <hr>
                    <label>Con duración maior que:</label>
                    <input type="number" name="duracion" id="duracion">
                    <button type="submit" name="botonduracion">Buscar</button>
                </form>
            </aside>
        </div>

        <div class="table-area">
    <?php
        function duracion($a,$b) {
            if($a[1] < $b[1]){
                return -1;
            } 
            elseif($a[1] > $b[1]){
                return 1;
            }
            else{
                return 0;
            }
        }
        function director($a,$b) {
            if($a[0] < $b[0]){
                return -1;
            } 
            elseif($a[0] > $b[0]){
                return 1;
            }
            else{
                return 0;
            }
        }

        $total = 0;
        require "pelis.php";      
        if (!isset ($_GET["buscar"])){
            echo"<table>";
            echo"<tr><th>Título</th><th>Director</th><th>Duración</th></tr>";
            foreach ($pelis as $key => $value) {
                echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
            }
        }
        if (isset($_GET['ordenado'])){
            echo"<table>";
            echo"<tr><th>Título</th><th>Director</th><th>Duración</th></tr>";
            uasort($pelis, 'duracion');
            foreach ($pelis as $key => $value) {
                echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
            }
        }
        if (isset($_GET['ordenadoDIR'])){
            echo"<table>";
            echo"<tr><th>Título</th><th>Director</th><th>Duración</th></tr>";
            uasort($pelis, 'director');
            foreach ($pelis as $key => $value) {
                echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
            }
        }
        if (isset($_GET['ordenadoTIT'])){
            echo"<table>";
            echo"<tr><th>Título</th><th>Director</th><th>Duración</th></tr>";
            ksort($pelis);
            foreach ($pelis as $key => $value) {
                echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
            }
        }
        if (isset($_GET['botonduracion'])){
            echo"<table>";
            echo"<tr><th>Título</th><th>Director</th><th>Duración</th></tr>";
            foreach ($pelis as $key => $value) {
                if ($value[1]>$_GET['duracion']){
                    echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
                    $total = $total + 1;
                }
            }
        }
        if (isset($_GET['botonbuscar'])){
            echo"<table>";
            echo"<tr><th>Título</th><th>Director</th><th>Duración</th></tr>";
            foreach ($pelis as $key => $value) {
                if (str_contains(strtolower($key), strtolower($_GET["buscar"]))) {
                    echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
                    $total = $total + 1;
                }
            }
        }
        echo"</table>";
        echo"<div class=\"centrar\">O número de exemplares atopados é: $total</div>";
    ?>
</body>
</html>