<?php
    if (isset($_GET['idioma']) && $_GET['idioma'] == 'español') {
        setcookie("idioma", "español", time() + 500);
        header("Location: idiomas.php");
    } elseif (isset($_GET['idioma']) && $_GET['idioma'] == 'ingles') {
        setcookie("idioma", "ingles", time() + 500);
        header("Location: idiomas.php");
    } elseif (isset($_GET['idioma']) && $_GET['idioma'] == 'ruso') {
        setcookie("idioma", "ruso", time() + 500);
        header("Location: idiomas.php");
    }

    if (isset($_COOKIE['idioma'])) {
        if ($_COOKIE['idioma'] == 'español') {
            echo "<p>La tecnología avanza rápidamente y nos permite comunicarnos y trabajar de formas cada vez más eficientes.</p>";
        } elseif ($_COOKIE['idioma'] == 'ingles') {
            echo "<p>Technology is advancing rapidly and allows us to communicate and work in increasingly efficient ways.</p>";
        } elseif ($_COOKIE['idioma'] == 'ruso') {
            echo "<p>Технологии быстро развиваются и позволяют нам общаться и работать все более эффективными способами.</p>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <br><br><br>
    <form action="idiomas.php" method="get">
        <label>Idioma:</label>
        <select name="idioma">
            <option value="español">Español</option>
            <option value="ingles">Inglés</option>
            <option value="ruso">Ruso</option>
        </select>
        <br><br>
        <input type="submit" name="enviar">
    </form>
</body>
</html>