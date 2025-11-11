<?php

$servidor="db";
$usuario="root";
$passwd="root";
$base="proba";
try {
//CONECTAMOS
$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
//Para xerar excepcións cando se informe dun erro
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Todo ben na conexión";
} catch (Exception $e) {
echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

// 1) Marcadores anónimos (?)
$pdoStatement = $pdo->prepare("INSERT INTO cliente (codCliente, nome, apelidos) VALUES (?, ?, ?)");

$id=101;
$nome="Xiao";
$apelido="Ferreiro";
$pdoStatement->bindParam(1, $id);
$pdoStatement->bindParam(2, $nome);
$pdoStatement->bindParam(3, $apelido);
$pdoStatement->execute();


// 2) Marcadores nomeados con variables
$codCliente = 69;
$nome = 'Lucía';
$apelido = 'Fernández';
$sql2 = "INSERT INTO cliente (codCliente, nome, apelidos) VALUES (:codCliente, :nome, :apelidos)";
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindParam(':codCliente', $codCliente);
$stmt2->bindParam(':nome', $nome);
$stmt2->bindParam(':apelidos', $apelido);
$stmt2->execute();



?>

