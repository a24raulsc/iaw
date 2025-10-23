<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <title>Ordenamento de arrays en PHP</title>
    <link rel="stylesheet" href="ex2.css">
</head>
<body>
    <h1>Ordenamento de arrays en PHP</h1>
    <table>
    <tr><th>Nome Función</th><th>Explicación do que fai</th><th>Exemplo</th><th>Mostra por pantalla</th></tr>
    <?php
        $notas = array("Felipe"=>3, "Artur"=>10, "Belén"=>14, "Ana"=>123, "Moncho"=>245);

        function mostrar_array($arr) {
            echo "<pre>";
            print_r($arr);
            echo "</pre>";
        }

        $copia = $notas;
        asort($copia);
        echo "<tr>
                <td>asort()</td>
                <td>Ordena un array de menor a maior mantendo a asociación do elemento co seu índice.</td>
                <td>asort(\$copia)</td>
                <td>"; mostrar_array($copia); echo "</td>
            </tr>";

        $copia = $notas;
        arsort($copia);
        echo "<tr>
                <td>arsort()</td>
                <td>Ordena un array de maior a menor mantendo a asociación do elemento co seu índice.</td>
                <td>arsort(\$copia)</td>
                <td>"; mostrar_array($copia); echo "</td>
            </tr>";

        $copia = $notas;
        sort($copia);
        echo "<tr>
                <td>sort()</td>
                <td>Ordena un array de menor a maior e reindexa as claves numéricamente.</td>
                <td>sort(\$copia)</td>
                <td>"; mostrar_array($copia); echo "</td>
            </tr>";

        $copia = $notas;
        rsort($copia);
        echo "<tr>
                <td>rsort()</td>
                <td>Ordena un array de maior a menor e reindexa as claves numéricamente.</td>
                <td>rsort(\$copia)</td>
                <td>"; mostrar_array($copia); echo "</td>
            </tr>";

        $copia = $notas;
        ksort($copia);
        echo "<tr>
                <td>ksort()</td>
                <td>Ordena un array segundo as súas claves (índices) de menor a maior.</td>
                <td>ksort(\$copia)</td>
                <td>"; mostrar_array($copia); echo "</td>
            </tr>";

        $copia = $notas;
        krsort($copia);
        echo "<tr>
                <td>krsort()</td>
                <td>Ordena un array segundo as súas claves de maior a menor.</td>
                <td>krsort(\$copia)</td>
                <td>"; mostrar_array($copia); echo "</td>
            </tr>";

        $copia = $notas;
        shuffle($copia);
        echo "<tr>
                <td>shuffle()</td>
                <td>Desordena os elementos dun array aleatoriamente e reindexa as claves.</td>
                <td>shuffle(\$copia)</td>
                <td>"; mostrar_array($copia); echo "</td>
            </tr>";

        $copia = $notas;
        $copia = array_reverse($copia, true);
        echo "<tr>
                <td>array_reverse()</td>
                <td>Invierte a orde dos elementos do array, mantendo as claves se se indica TRUE.</td>
                <td>array_reverse(\$copia, true)</td>
                <td>"; mostrar_array($copia); echo "</td>
            </tr>";

    ?>
</table>

</body>
</html>
