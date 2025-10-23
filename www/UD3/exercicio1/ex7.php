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
    <?php
        echo "<tr>". "<td> Nome </td>". "<td> $_GET[nome] </td>" . "</tr>";
        echo "<tr>". "<td> E-mail </td>". "<td> $_GET[email] </td>" . "</tr>";
        echo "<tr>". "<td> Experiencia </td>". "<td> ";
        if (isset($_GET['músico'])) {
            echo "Músico ";
        }
        if (isset($_GET['cómico'])) {
            echo "Cómico ";
        }
        if (isset($_GET['Actor'])) {
            echo "Actor ";
        }
        echo "</td>" . "</tr>";
        echo "<tr>". "<td> Idade </td>". "<td> ";
        if (isset($_GET['joven'])) {
            echo "Entre 20 e 40 anos";
        }
        if (isset($_GET['adulto'])) {
            echo "Máis de 40 anos";
        }
        echo "</td>" . "</tr>";
        echo "<tr>". "<td> Como atopaches a páxina? </td>". "<td> $_GET[páxina] </td>" . "</tr>";
        echo "<tr>". "<td> Comentarios </td>". "<td> $_GET[comentarios] </td>" . "</tr>";
    ?>
    </table>
</body>
</html>