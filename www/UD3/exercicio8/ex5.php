<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex3.css">
</head>
<body>
    <h1>Clasificación de puntos</h1>
    <form action="" method="get">
        <button type="submit" name="menorMaiorpuntos">Ordenar de menor a mayor puntos</button>
        <br><br>
        <button type="submit" name="maiorMenorpuntos">Ordenar de mayor a menor puntos</button>
        <br><br>
        <button type="submit" name="alfabetico">Ordenar alfabéticamente</button>
        <br><br>
        <button type="submit" name="tamaño">Ordenar por tamaño de nombre</button>
        <br><br>
    </form>

    <?php
        $puntos = array("Ana"=>123, "Belén"=>14,"Felipe"=>3,"Moncho"=>245,"Artur"=>10);
        foreach($puntos as $key => $value) {
            echo $key . " - " . $value . "<br>";
        }
        function tamaño($a,$b)
        {
        if(mb_strlen($a)<mb_strlen($b))
            return -1;
        elseif (mb_strlen($a)>mb_strlen($b))
            return 1;
        else
            return 0;
        }

        if(isset($_GET["menorMaiorpuntos"])){
            asort($puntos);
            echo "<h2>Ordenar de menor a mayor puntos</h2>";
            foreach($puntos as $key => $value) {
            echo $key . " - " . $value . "<br>";
            } 
        } 
        elseif(isset($_GET["maiorMenorpuntos"])){
            arsort($puntos);
            echo "<h2>Ordenar de mayor a menor puntos</h2>";
            foreach($puntos as $key => $value) {
            echo $key . " - " . $value . "<br>";
            } 
        }
        elseif(isset($_GET["alfabetico"])){
            ksort($puntos);
            echo "<h2>Ordenar alfabéticamente</h2>";
            foreach($puntos as $key => $value) {
            echo $key . " - " . $value . "<br>";
            }
        } 
        elseif(isset($_GET["tamaño"])){
            echo "<h2>Ordenar por tamaño de nombre</h2>";
            uksort($puntos, "tamaño");
            foreach($puntos as $key => $value) {
                echo $key . " - " . $value . "<br>";
            }
        }
       
        
    ?>
</body>
</html>