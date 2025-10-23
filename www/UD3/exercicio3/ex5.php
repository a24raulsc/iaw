<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex5.css">
</head>
<body>
    <h1>Porcentaxe de escolarizacion</h1>
    <table>
        <tr><th>Comunidade</th><th>Escolarización por 1000 habitantes</th><th>Porcentaje escolarizacion</th></tr>
    <?php
        $array = array("Andalucía" => 593.6 ,"Aragón"=> 600.3,"Asturias"=> 582.9,"Baleares"=> 489.7,"Canarias"=> 573.2,
        "Cantabria"=> 551.5,"Castilla y León"=> 645.3,"Castilla-La Mancha"=> 555.8,
        "Cataluña"=> 568.3,"Comunidad Valenciana"=> 561.1,"Extremadura"=> 584.3,"Galicia"=> 600.1);

        $i = 0;
        foreach ($array as $comunidade => $escolarizacion) {
            $i++;
            if ($i % 2 == 0) {
                echo "<tr class='negro'><td>$comunidade</td><td>$escolarizacion</td><td>" . round(($escolarizacion / 1000) * 100, 3) . "%</td></tr>";
            } 
            else {
                echo "<tr class='blanco'><td>$comunidade</td><td>$escolarizacion</td><td>" . round(($escolarizacion / 1000) * 100, 3) . "%</td></tr>";
            }
        }

        echo"</table>";
        echo"<p><br> A porcentaxe media de escolarización é de " . round((array_sum($array) / count($array)),5) . "</p>";
    ?>
</body>
</html>