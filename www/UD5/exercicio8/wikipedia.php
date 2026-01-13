<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h3>Busca de termos</h3>
        <form method='get'>
            <label for="termo">Termo de busca:</label>
            <input type='text' name='termo' />
            <input type='submit' value='Busca'>
        <br><br>
        <label>Idioma</label>
        <select name="idioma">
            <option value="es">Español</option>
            <option value="en">English</option>
            <option value="gl">Galego</option>
        </select>
        </form>
    </div>
    <?php
    if (isset($_GET['idioma'])) {
        $_SESSION['idioma'] = $_GET['idioma'];
    }

    /* A WIKIPEDIA OBRIGA A DEFINIR UN USER-AGENT_ */
    ini_set('user_agent', 'ScriptPHP (proba@iessanclemente.com)');
    if (!empty($_GET['termo'])) {
        $url = "http://" . $_SESSION['idioma'] . ".wikipedia.org/w/api.php";
        $url .= '?action=query';
        $url .= '&list=search';
        $url .= '&format=xml';
        $url .= '&redirects';
        $url .= '&srsearch=' . urlencode($_GET['termo']);
        $lista_paxinas = file_get_contents($url);
        // file_put_contents('paxina.xml', $lista_paxinas);
        echo '
<hr>
<div>
<h3>Listado de páxinas co termo ' . $_GET['termo'] . '</h3>
<ul>';
        $xml = new SimpleXMLElement($lista_paxinas);
        foreach ($xml->query->search->children() as $pax) {
            $params = 'termo=' . $_GET['termo'];
            $params .= '&pax=' . urlencode($pax['title']);
            echo "<li><a href='?$params'>" . $pax['title'] . "</a></li>";
        }
        ?>
        </ul>
        </div>
        <?php
        if (!empty($_GET['pax'])) {/* A WIKIPEDIA OBRIGA A DEFINIR UN USER-AGENT_ */
            ini_set('user_agent', 'ScriptPHP (proba@iessanclemente.com)');
            $url = "http://" . $_SESSION['idioma'] . ".wikipedia.org/w/api.php";
            $url .= '?action=parse';
            $url .= '&prop=text';
            $url .= '&format=xml';
            $url .= '&redirects';
            $url .= '&page=' . urlencode($_GET['pax']);
            $paxina = file_get_contents($url);
            echo '<hr> <div>
<h3>Contido da páxina' . $_GET['pax'] . '</h3>';
            echo htmlspecialchars_decode($paxina);
        }
        echo '</div>';
    } 
?>