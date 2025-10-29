<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
    <?php
        $servidor="db";
        $usuario="root";
        $passwd="root";
        $base="proba";
        //CONECTAMOS
        $conexion = new mysqli($servidor, $usuario, $passwd, $base); //CONECTAMOS COA NOTACIÓN POO
        if($conexion->connect_error){
        die("Non é posible conectar coa BD: ". $conexion->connect_error);
        }
        $conexion->set_charset("utf8");
        //PREPARAMOS A SENTENCIA:
        $sentenciaPrep=$conexion->prepare("INSERT INTO cliente (codCliente,nome,apelidos)
        VALUES(?, ?, ?)");
        // DAMOS VALORES AOS PAŔÁMETROS E EXECUTAMOS:
        $codCliente=100;
        $nome="Xan";
        $apelidos="Fieito";
        
        $sentenciaPrep->bind_param('iss',$codCliente, $nome, $apelidos); //INDICAMOS O TIPO DAS VARIABLES
        if(!$sentenciaPrep->execute() ){ //EXECUTAMOS A CONSULTA
            die("Houbo un erro na execución da consulta");
        }
        $codCliente=101;
        $nome="Eva";
        $apelidos="Loureiro";
        $sentenciaPrep->bind_param('iss',$codCliente, $nome, $apelidos);
        if(!$sentenciaPrep->execute() ){
            die("Houbo un erro na execución da consulta");
        }
        $conexion->close(); //PECHAMOS AS CONEXIÓNS

    ?>
</body>
</html>