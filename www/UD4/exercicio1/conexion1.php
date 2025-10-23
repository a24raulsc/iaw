<?php
$conexion = mysqli_connect("db", "root", "root", "folla1");
if ($conexion) {
    echo "<h2>Tabla xogador completa</h2>";
    mysqli_set_charset($conexion, "utf8");
    $resultado = mysqli_query($conexion, "SELECT Id, DNI, nome, apelidos, idade FROM xogador");
    if ($resultado != false) {
        while(list($Id,$DNI,$nome,$apelidos,$idade) = mysqli_fetch_array ( $resultado ) ){
            echo "<p>" . $Id . " " . $DNI . " " . $nome . " " . $apelidos . " " . $idade . "</p>";
        }
    }
}

if ($conexion) {
    echo "<br><br><h2>Xogadores con apelidos maiores que “García”</h2>";
    mysqli_set_charset($conexion, "utf8");
    $resultado = mysqli_query($conexion, "SELECT nome, apelidos FROM xogador where apelidos > 'García'");
    if ($resultado != false) {
        while(list($nome, $apelidos) = mysqli_fetch_array ( $resultado ) ){
            echo "<p>" . $nome . " " . $apelidos . "</p>";
        }
    }
}

if ($conexion) {
    echo "<br><br><h2>Xogadores con idade menores que 30</h2>";
    mysqli_set_charset($conexion, "utf8");
    $resultado = mysqli_query($conexion, "SELECT nome, idade FROM xogador where idade < 30");
    if ($resultado != false) {
        while(list($nome, $idade) = mysqli_fetch_array ( $resultado ) ){
            echo "<p>" . $nome . " " . $idade . "</p>";
        }
    }
}

if ($conexion) {
    echo "<br><br><h2>Número de xogadores maiores de 22 anos</h2>";
    mysqli_set_charset($conexion, "utf8");
    $resultado = mysqli_query($conexion, "SELECT count(Id) FROM xogador where idade > 22");
    if ($resultado != false) {
        while(list($count) = mysqli_fetch_array ( $resultado ) ){
            echo "<p>" . $count . "</p>";
        }
    }
}

else {
    echo "Conexión incorrecta";
}