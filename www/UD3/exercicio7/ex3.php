<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex3.css">
</head>
    <img src="https://www.bibliotecaspublicas.es/cantabria/wp-content/uploads/sites/11/2020/06/logo_bibliotecas_cantabria.png" style="display: float; margin-left: auto; margin-right: auto; width: 200px; align-items: center;">
    <h1>BIBLIOTECA</h1>
    <br><h2><u>Operacións cos exemplares</u></h2>
<body>
    <form action="ex3.php" method="GET">
    <label>Buscar exemplar</label>
    <input type="text" name="buscar" id="buscar">
    <input type="submit" value="buscar">
    <br><br>
    <button type="submit" name="todo" value="todo">Ver todos os libros da biblioteca</button>
    <br><br>
    <button type="submit" name="ordenar" value="ordenar">Ver listado ordenado polo título</button>
    <br><br><br>
    </form>
    <?php
        $total = 0;
        $biblioteca = array("El médico" => array("Noah Gordon", "Time Warner"),
                            "La catedral del mar" => array("Ildefonso Falcones", "Grijalbo"),
                            "Los pilares de la tierra" => array("Ken Follett", "Plaza & Janés") );

        $biblioteca_completa = array("El médico" => array("Noah Gordon", "Time Warner"),
                            "La catedral del mar" => array("Ildefonso Falcones", "Grijalbo"),
                            "Los pilares de la tierra" => array("Ken Follett", "Plaza & Janés"), 
                            "El quijote" => array("Miguel de cervantes", "Editorial"), "Cien años de soledad" => array("Gabriel García Márquez", "Salamandra"),
                            "La sombra del viento" => array("Carlos Ruiz Zafón", "Xerais"), "Donde los árboles cantan" => array("Laura Gallego", "Editorial") );

        if (!isset($_GET["buscar"])) {
            echo"<table>";
            echo"<tr><th>Título</th><th>Autor</th><th>Editorial</th></tr>";
            foreach ($biblioteca as $key => $value) {
                echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
            }
        }
        if (isset($_GET["todo"])) {
            echo"<table>";
            echo"<tr><th>Título</th><th>Autor</th><th>Editorial</th></tr>";
            foreach ($biblioteca_completa as $key => $value) {
                echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
            }
        }
        if (isset($_GET["ordenar"])) {
            ksort($biblioteca_completa);
            echo"<table>";
            echo"<tr><th>Título</th><th>Autor</th><th>Editorial</th></tr>";
            foreach ($biblioteca_completa as $key => $value) {
                echo "<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
            }
        }
        echo"</table>";
        echo"<br><br>";
        
        if (isset($_GET["buscar"]) && $_GET["buscar"] != "") {
            echo"<table>";
            echo "Os exemplares que conteñen " . $_GET["buscar"] . " no campo 'título', 'autor' ou 'editorial' son:";
            echo"<tr><th>Título</th><th>Autor</th><th>Editorial</th></tr>";
            foreach ($biblioteca_completa as $key => $value) {
                if (str_contains(strtolower($key), strtolower($_GET["buscar"]))) {
                    echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
                    $total = $total + 1;
                }
                elseif (str_contains(strtolower($value[0]), strtolower($_GET["buscar"]))) {
                    echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
                    $total = $total + 1;
                }
                elseif (str_contains(strtolower($value[1]), strtolower($_GET["buscar"]))) {
                    echo"<tr><td>$key</td><td>". $value[0]. "</td><td>" . $value[1]."</td></tr>";
                    $total = $total + 1;
                }
            }
            echo "</table>";
            echo "Total de exemplares atopados: $total";
        }
    ?>
</body>
</html>