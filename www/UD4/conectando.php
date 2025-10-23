<?php
$conexion = mysqli_connect("db", "usuario", "abc123.", "proba");
if ($conexion) {
    echo "Conexión correcta";
    mysqli_set_charset($conexion, "utf8");
    $resultado = mysqli_query($conexion, "SELECT codCliente, nome, apelidos FROM cliente");
    if ($resultado != false) {
        while($fila = mysqli_fetch_array($resultado)) {
            echo "<p>" . $fila["codCliente"] . " " . $fila["nome"] . " " . $fila["apelidos"] . "</p>";
        }
    }

} else {
    echo "Conexión incorrecta";
}

mysqli_close($conexion);