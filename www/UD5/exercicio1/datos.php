<?php
    session_start();

if(isset($_GET['enviar'])){

    if(($_GET['usuario']) == 'Ana' or ($_GET['contrasinal']) == 'abc123..') {
        $_SESSION['usuario'] = 'Ana';
        $pdo = new PDO("mysql:host=db;dbname=Empresa;charset=utf8mb4", "Ana", "abc123..");
        $pdoStatement = $pdo->prepare("SELECT * FROM cliente");
        $pdoStatement->execute();
        echo "<form method='GET' action='engadir.php'>
                <button name='engadir'>Engadir rexistro</button>
              </form>";
    }
    else if($_GET['usuario'] == 'Xan' or ($_GET['contrasinal']) == 'Xan'){
        $_SESSION['usuario'] = 'Xan';
        $pdo = new PDO("mysql:host=db;dbname=Empresa;charset=utf8mb4", "Xan", "abc123..");
        $pdoStatement = $pdo->prepare("SELECT * FROM cliente");
        $pdoStatement->execute();
    }
    else {
        header("Location:login.php?error=1");
    }

    echo "<h1>Benvido ".$_SESSION['usuario']."</h1><br>";
    while($fila=$pdoStatement->fetch()){
        echo $fila['numero']." - ".$fila['nome']." - ". $fila['num_empregado_asignado'] . " - " . $fila['limite_de_credito']."<br>";
    }
}


echo "<br><br>
    <form method='GET' action='datos.php'>
        <button name='ordenarNome'>Ordenar por nome</button>
        <button name='ordenarEmp'>Ordenar por empregado asignado</button>
    </form>";

if(isset($_GET['ordenarNome'])){
    $pdo = new PDO("mysql:host=db;dbname=Empresa;charset=utf8mb4", $_SESSION['usuario'], "abc123..");
    $pdoStatement = $pdo->prepare("SELECT * FROM cliente ORDER BY nome");
    $pdoStatement->execute();
    while($fila=$pdoStatement->fetch()){
        echo $fila['numero']." - ".$fila['nome']." - ". $fila['num_empregado_asignado'] . " - " . $fila['limite_de_credito']."<br>";
    }
}

if(isset($_GET['ordenarEmp'])){
    $pdo = new PDO("mysql:host=db;dbname=Empresa;charset=utf8mb4", $_SESSION['usuario'], "abc123..");
    $pdoStatement = $pdo->prepare("SELECT * FROM cliente ORDER BY num_empregado_asignado");
    $pdoStatement->execute();
    while($fila=$pdoStatement->fetch()){
        echo $fila['numero']." - ".$fila['nome']." - ". $fila['num_empregado_asignado'] . " - " . $fila['limite_de_credito']."<br>";
    }
}

