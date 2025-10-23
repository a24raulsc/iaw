<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex1p.css">
</head>
<body>
    <h1> Táboa periódica dos elementos</h1>
    <br><br>
    <?php
        $elementos =array("Alcalinos"=> array("Li"=>3, "Na"=>11,"K"=>19, "Rb"=>37, "Cs"=>55,"Fr"=>87),
                    "Alcalino-terreos"=> array("Be"=>4, "Mg"=>12, "Ca"=>20, "Sr"=>38, "Ba"=>56, "Ra"=>88),
                    "Térreos"=> array("B"=>5, "Al"=>13, "Ga"=>31, "In"=>49, "Tl"=>81));
        
        echo "<h2>O grupo $_GET[páxina] está formado polos seguintes elementos: <h2><br>";
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Nº atómio</th>";

        if ($_GET['páxina'] == "Alcalinos"){
            foreach ($elementos[$_GET["páxina"]] as $nome => $num)
                echo "<tr><td>$nome</td><td>$num</td></tr>";
        }

        elseif ($_GET['páxina'] == "Alcalino-terreos"){
            foreach ($elementos[$_GET["páxina"]] as $nome => $num)
                echo "<tr><td>$nome</td><td>$num</td></tr>";
        }

        elseif ($_GET['páxina'] == "Térreos"){
            foreach ($elementos[$_GET["páxina"]] as $nome => $num)
                echo "<tr><td>$nome</td><td>$num</td></tr>";
        }

        echo "</table><br>";
        echo "Número total de elementos: ".count($elementos[$_GET["páxina"]])."<br>";
    ?>
</body>
</html>