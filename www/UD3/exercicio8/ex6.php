<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex6.css">
</head>
<body>
    <form action="ex6.php" method="get">
        <button type="submit" name="orixeAS">Ordenar por orixe</button>
        <br><br>
        <button type="submit" name="distancia">Ordenar por distancia</button>
        <br><br>
        <button type="submit" name="distanciaDESC">Ordenar por distancia (descendente)</button>
        <br><br>
        <button type="submit" name="orixeDESC">Ordenar por orixe (descendente)</button>
        <br><br>
        <button type="submit" name="destinoAS">Ordenar por destino</button>
        <br><br>
        <button type="submit" name="destinoDESC">Ordenar por destino (descendente)</button>
        <br><br>
    </form>
    <?php
        $datos = array(["Madrid", "Segovia", 90201],
                       ["Madrid", "A Coruña", 596887],
                       ["Barcelona", "Cádiz", 1152669],
                       ["Bilbao", "Valencia", 622233],
                       ["Sevilla", "Santander", 832067],
                       ["Oviedo", "Badajoz", 682429]);
        function comparaOrixeAS($a,$b){
            if(strcmp($a[0], $b[0]) < 0){
                return -1;
            }
            elseif(strcmp($a[0], $b[0])){ 
                return 1;
            }
            else {
                return 0;
            }
        }

        function comparaDistancia($a,$b) {
            if($a[2] < $b[2]){
                return -1;
            } 
            elseif($a[2]>$b[2]){
                return 1;
            }
            else{
                return 0;
            }
        }
        function comparaOrixeDESC($a,$b){
            if(strcmp($a[0], $b[0]) < 0){
                return 1;
            }
            elseif(strcmp($a[0], $b[0])){ 
                return -1;
            }
            else {
                return 0;
            }
        }
        function comparaDistanciaDesc ($a,$b) {
            if($a[2] < $b[2]){
                return 1;
            } 
            elseif($a[2]>$b[2]){
                return -1;
            }
            else{
                return 0;
            }
        }
        function destinoAS ($a,$b){
            if(strcmp($a[1], $b[1]) < 0){
                return -1;
            }
            elseif(strcmp($a[1], $b[1])){ 
                return 1;
            }
            else {
                return 0;
            }
        }
        function destinoDESC ($a,$b){
            if(strcmp($a[1], $b[1]) < 0){
                return 1;
            }
            elseif(strcmp($a[1], $b[1])){ 
                return 1;
            }
            else {
                return 0;
            }
        }

        if (isset($_GET["orixeAS"])) {
            usort($datos, 'comparaOrixeAS');
            echo"<table><tr><th>Orixe</th><th>Destino</th><th>Distancia (en metros)</th></tr>";
            for($i = 0; $i < 6; $i++){
                echo'<tr><td>'.$datos[$i][0].'</td><td>'.$datos[$i][1].'</td><td>'.$datos[$i][2].'</td></tr>';
            }
        }
        if (isset($_GET['orixeDESC'])) {
            usort($datos, 'comparaOrixeDESC');
            echo"<table><tr><th>Orixe</th><th>Destino</th><th>Distancia (en metros)</th></tr>";
            for($i = 0; $i < 6; $i++){
                echo'<tr><td>'.$datos[$i][0].'</td><td>'.$datos[$i][1].'</td><td>'.$datos[$i][2].'</td></tr>';
            }
        }
        if (isset($_GET["distancia"])) {
            usort($datos, 'comparaDistancia');
            echo"<table><tr><th>Orixe</th><th>Destino</th><th>Distancia (en metros)</th></tr>";
            for($i = 0; $i < 6; $i++){
                echo'<tr><td>'.$datos[$i][0].'</td><td>'.$datos[$i][1].'</td><td>'.$datos[$i][2].'</td></tr>';
            }
        }
        if (isset($_GET["distanciaDESC"])) {
            usort($datos, 'comparaDistanciaDesc');
            echo"<table><tr><th>Orixe</th><th>Destino</th><th>Distancia (en metros)</th></tr>";
            for($i = 0; $i < 6; $i++){
                echo'<tr><td>'.$datos[$i][0].'</td><td>'.$datos[$i][1].'</td><td>'.$datos[$i][2].'</td></tr>';
            }
        }
        if (isset($_GET["destinoAS"])) {
            usort($datos, 'destinoAS');
            echo"<table><tr><th>Orixe</th><th>Destino</th><th>Distancia (en metros)</th></tr>";
            for($i = 0; $i < 6; $i++){
                echo'<tr><td>'.$datos[$i][0].'</td><td>'.$datos[$i][1].'</td><td>'.$datos[$i][2].'</td></tr>';
            }
        }
        if (isset($_GET["destinoDESC"])) {
            usort($datos, 'destinoDESC');
            echo"<table><tr><th>Orixe</th><th>Destino</th><th>Distancia (en metros)</th></tr>";
            for($i = 0; $i < 6; $i++){
                echo'<tr><td>'.$datos[$i][0].'</td><td>'.$datos[$i][1].'</td><td>'.$datos[$i][2].'</td></tr>';
            }
        }
    ?>
</body>
</html>