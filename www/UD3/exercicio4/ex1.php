<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex1.css">
</head>
<body>
    <h1>Viaxe</h1>
    <table>
        <tr><th>Orixe</th><th>Destino</th><th>Distancia (en metros)</th></tr>
    <?php
        $viaxes = [];
        $viaxes[0] = array("Madrid", "Segovia", 90201);
        $viaxes[1] = array("Madrid", "A Coruña", 596887);
        $viaxes[2] = array("Barcelona", "Cádiz", 1152669);
        $viaxes[3] = array("Bilbao", "Valencia", 622233);
        $viaxes[4] = array("Sevilla", "Santander", 832067);
        $viaxes[5] = array("Oviedo", "Badajoz", 682429);

        $maxDist = 0;
        foreach ($viaxes as $k => $v) {     
            echo "<tr><td>$v[0]</td><td>$v[1]</td><td>$v[2]</td></tr>";
            if ($v[2] > $maxDist) {
                $maxDist = $v[2];
                $maxViaxe = $v;
            }
        }   
        echo "</table>";
        echo "<h2>O traxecto máis longo é o de $maxViaxe[0] a $maxViaxe[1] cunha distancia de $maxViaxe[2] metros</h2>";
    ?>
</body>
</html>