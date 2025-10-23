<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex3.css">
</head>
<body>
    <table>
        <tr><th>Nome</th><th>Soldo</th></tr>
    <?php
        $soldos = array("Raul" => 1200, "Ana" => 1100, "Luis" => 1050, "Marta" => 1150, "Sonia" => 1300);
        foreach ($soldos as $nome => $soldo) {  
            echo "<tr><td>$nome</td><td>$soldo</td></tr>";
        }
        echo "<tr class='media'><td>Máximo</td><td>" . max($soldos) . "</td></tr>";
        echo "<tr class='media'><td>Mínimo</td><td>" . min($soldos) . "</td></tr>";
    ?>
    </table>
</body>
</html>