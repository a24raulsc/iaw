<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <form>
        <select name="select">
            <option value="8">Temperatura</option>
            <option value="9">Humidade</option>
            <option value="10">Presion</option>
        </select>
        <input type="number" name="numero" value="1" min="1" max="3">
        <button type="submit" name="aceptar">Aceptar</button>
    </form>
    <?php
        if(isset($_GET['aceptar'])){
            $select = $_GET['select'];
            $numero = $_GET['numero'];
            $url = "https://sensoralia.iessanclemente.net/api/v1/sensores/$select/mediciones?limit=$numero";
            $lista_medicions= file_get_contents($url);
            $medicions = json_decode($lista_medicions);
            echo "<br><br><br><table>
            <tr><th>Valor</th><th>Data e Hora</th></tr>";
            foreach ($medicions->datos as $medicion){
            echo "<tr><td>".$medicion->valor."</td><td>".$medicion->fechahora."</td></tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>
