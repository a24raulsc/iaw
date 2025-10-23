<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex1.css">
</head>
<body>
    <img src="cabeceiraFolla3.9.jpg" alt="Cabeceira Folla 3.9">
    <form action="ex1.php" method="GET">
        <label>Introduce frase</label>
        <br>
        <input type="text" name="frase">
        <br><br>
        <button type="submit" name="mais">Pasa a maiúscula a primeira letra</button>
        <br>
        <button type="submit" name="menos">Pasa a minúscula a primeira letra</button>
        <br>
        <button type="submit" name="espazos">Elimina os espazos</button>
        <br>
        <button type="submit" name="e">Eliminas as letras 'e'</button>
        <br>
        <button type="submit" name="puntos">Cambia os puntos por comas</button>
        <br><br>
        <label>Introduce Palabra</label>
        <br>
        <input type="text" name="palabra">
        <br>
        <button type="submit" name="buscar">A palabra está na frase?</button>
        <br>
        <button type="submit" name="eliminar">Elimina a palabra</button>
        <br>
        <button type="submit" name="cambio">Cambia 'tardes' por 'noites'</button>
        <br><br>
        <label>Resultado:</label>
    </form>
    <?php
        if (isset($_GET["frase"])){
            if (isset($_GET["mais"])){
                $frase = $_GET["frase"];
                echo ucfirst($frase);
            }
            if (isset($_GET["menos"])){
                $frase = $_GET["frase"];
                echo lcfirst($frase);
            }
            if (isset($_GET["espazos"])){
                $frase = $_GET["frase"];
                echo str_replace(' ', '', $frase);
            }
            if (isset($_GET["e"])){
                $frase = $_GET["frase"];
                echo str_replace('e', '', $frase);
            }
            if (isset($_GET["puntos"])){
                $frase = $_GET["frase"];
                echo str_replace('.', ',', $frase);
            }
        }
        
        if (isset($_GET["palabra"])){
            if (isset($_GET["buscar"])){
                $frase = $_GET["frase"];
                $palabra = $_GET["palabra"];
                if (str_contains($frase, $palabra)){
                    echo "A palabra '$palabra' está na frase.";
                } 
                else {
                    echo "A palabra '$palabra' non está na frase.";
                }
            }
            if (isset($_GET["eliminar"])){
                $frase = $_GET["frase"];
                $palabra = $_GET["palabra"];
                echo str_replace($palabra, '', $frase);
            }
            if (isset($_GET["cambio"])){
                $frase = $_GET["frase"];
                echo str_replace('tardes', 'noites', $frase);
            }
        }
    ?>
</body>
</html>