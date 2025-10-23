<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex1p.css">
</head>
<body>
    <?php
        function suma2($n1, $n2){
            $resultado = $n1 + $n2;
            return $resultado;
        }
        function suma3($n1, $n2, $n3){
            $resultado = $n1 + $n2 + $n3;
            return $resultado;
        }
        function suma4($n1, $n2, $n3, $n4){
            $resultado = $n1 + $n2 + $n3 + $n4;
            return $resultado;
        }
        function multiplica2($n1, $n2){
            $resultado = $n1 * $n2;
            return $resultado;
        }
        function multiplica3($n1, $n2, $n3){
            $resultado = $n1 * $n2 * $n3;
            return $resultado;
        }
        function multiplica4($n1, $n2, $n3, $n4){
            $resultado = $n1 * $n2 * $n3 *$n4;
            return $resultado;
        }
        function maior($n1, $n2, $n3, $n4){
            $array = array($n1, $n2, $n3, $n4);
            $maior = max($array);
            return $maior;
        }
        function menor($n1, $n2, $n3, $n4){
            $array = array($n1, $n2, $n3, $n4);
            $menor = min($array);
            return $menor;
        }
        function media($n1,$n2,$n3,$n4){
            $media = $n1 + $n2 + $n3 + $n4 / 4;
            return $media;
        }
        function factorial($n3){
            $factorial = 1;
            for ($i=1; $i <= $n3; $i++) { 
                $factorial = $factorial * $i;
            }
            return $factorial;
        }
        function mediana($n1,$n2,$n3,$n4){
            $array = array($n1, $n2, $n3, $n4);
            sort($array);
            $mediana = ($array[1] + $array[2]) / 2;
            return $mediana;
        }
        function segundoMaior($n1,$n2,$n3,$n4){
            $array = array($n1, $n2, $n3, $n4);
            rsort($array);
            $segundoMaior = $array[1];
            return $segundoMaior;
        }
        function ordenaMaiorMenor($n1,$n2,$n3,$n4){
            $array = array($n1, $n2, $n3, $n4);
            rsort($array);
            return $array;
        }
        function ordenaMenorMaior($n1,$n2,$n3,$n4){
            $array = array($n1, $n2, $n3, $n4);
            sort($array);
            return $array;
        }

        if (isset($_GET["suma2"])) {
            $a = suma2($_GET["n1"], $_GET["n2"]);
            echo $a;
        }

        elseif (isset($_GET["suma3"])) {
            $a = suma3($_GET["n1"], $_GET["n2"], $_GET["n3"]);
            echo $a;
        }

        elseif (isset($_GET["suma4"])) {
            $a = suma4($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
            echo $a;
        }
        elseif (isset($_GET["multiplica2"])) {
            $a = multiplica2($_GET["n1"], $_GET["n2"]);
            echo $a;
        }
        elseif (isset($_GET["multiplica3"])) {
            $a = multiplica3($_GET["n1"], $_GET["n2"], $_GET["n3"]);
            echo $a;
        }
        elseif (isset($_GET["multiplica4"])) {
            $a = multiplica4($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
            echo $a;
        }
        elseif (isset($_GET["maior"])) {
            $a = maior($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
            echo $a;
        }
        elseif (isset($_GET["menor"])) {
            $a = menor($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
            echo $a;
        }
        elseif (isset($_GET["media"])) {
            $a = media($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
            echo $a;
        }
        elseif (isset($_GET["factorialN3"])) {
            $a = factorial($_GET["n3"]);
            echo $a;
        }
        elseif (isset($_GET["mediana"])) {
            $a = mediana($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
            echo $a;
        }
        elseif (isset($_GET["segundoMaior"])) {
            $a = segundoMaior($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
            echo $a;
        }
        elseif (isset($_GET["ordearMaiorMenor"])) {
            $a = ordenaMaiorMenor($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
            foreach ($a as $v) {
                echo $v . ", ";
            }
        }
        elseif (isset($_GET["ordearMenorMaior"])) {
            $a = ordenaMenorMaior($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
            foreach ($a as $v) {
                echo $v . ", ";
            }
        }

    ?>
</body>
</html>