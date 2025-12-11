<?php
    if (isset($_GET['enviar'])){
        $modo = $_GET['modo'];
        setcookie("modo", $modo, time() + 500); 
        header("Location: paxina.php");
    }

    if (isset($_COOKIE['modo'])) {
        if ($_COOKIE['modo'] == 'claro') {
            echo "<style>body { background-color: white; color: black; }</style>";
        } elseif ($_COOKIE['modo'] == 'oscuro') {
            echo "<style>body { background-color: black; color: white; }</style>";
        }
    }

    echo "<h1>Bienvenido a la página con modo</h1>
        <p>Selecciona un modo para cambiar la apariencia de la página.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>";
?>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        a {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <a href="modo.php">Cambiar Modo</a>
</body>
</html> 