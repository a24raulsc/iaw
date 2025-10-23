<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex4.css">
</head>
<body>
    <table>
        <tr class="tr1"><td>Orden</td><td>Número</td></tr>
    <?php
  
       for ($i= 1, $j=1; $i<=50; $i=$i+2, $j++) {
        echo "<tr>". "<td> $j </td>". "<td> $i </td>" . "</tr>";
       }

    ?>
    </table>
</body>
</html>