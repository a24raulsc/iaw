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
        echo "<tr>". "<td> Nome </td>". "<td> $_POST[nome] </td>" . "</tr>";
        echo "<tr>". "<td> E-mail </td>". "<td> $_POST[email] </td>" . "</tr>";
        echo "<tr>". "<td> Experiencia </td>". "<td> ";
        if (isset($_POST['músico'])) {
            echo "Músico ";
        }
        if (isset($_POST['cómico'])) {
            echo "Cómico ";
        }
        if (isset($_POST['Actor'])) {
            echo "Actor ";
        }
        echo "</td>" . "</tr>";
        echo "<tr>". "<td> Idade </td>". "<td> ";
        if (isset($_POST['joven'])) {
            echo "Entre 20 e 40 anos";
        }
        if (isset($_POST['adulto'])) {
            echo "Máis de 40 anos";
        }
        echo "</td>" . "</tr>";
        echo "<tr>". "<td> Como atopaches a páxina? </td>". "<td> $_POST[páxina] </td>" . "</tr>";
        echo "<tr>". "<td> Comentarios </td>". "<td> $_POST[comentarios] </td>" . "</tr>";
    ?>
    </table>
</body>
</html>