<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex5.css">
</head>
<body>
    <table>
        <tr class="tr1"><td>Número</td><td>Multiplicando</td><td>Resultado</td></tr>
    <?php

       for ($i= 1, $j=7; $i<=9; $i++, $j=7*$i) {
        echo "<tr>". "<td> 7 </td>". "<td> $i </td>" . "<td> $j </td>" . "</tr>";
       }

    ?>
    </table>
</body>
</html>