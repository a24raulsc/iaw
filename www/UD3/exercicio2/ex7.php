<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="ex7.css">
</head>
<body>
    <table>
        <tr class="tr1"><td>Día</td><td>Saúdo</td></tr>
    <?php
        for ($i= 1; $i<=100; $i++) {
            if ($i % 2 == 0) {
                echo "<tr class='tr2'>". "<td> $i </td>". "<td> Boas tardes </td>" . "</tr>";
            } 
            else {
                echo "<tr class='tr3'>". "<td> $i </td>". "<td> Bós días </td>" . "</tr>";
            }
        }
    ?>
    </table>
</body>
</html>