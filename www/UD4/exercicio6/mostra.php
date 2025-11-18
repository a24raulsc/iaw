<!DOCTYPE html>
<html>
<head>
<style>
	
	#contenedor
	{
		width:70%;
		margin:20px auto;
		background-color:white;
			
		display: grid; 
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		grid-gap: 5px; 
		
	
	}

	.produto
	{
		/* width:200px; */
		height:210px;
		background-color:white;
		border:1px black solid;
		text-align: center;
		padding-top:20px;
		font-family:Arial;
			
	}
	img
	{
	width:130px;
	height:130px;
		
	}
</style>


<meta charset="utf-8" />
<title></title>
</head>
<body>
<article id="contenedor">
<?php

	$servidor="db";
	$usuario="proba";
	$passwd="abc123..";
	$base="senderismo";
	try {
		$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
	}

	if (isset($_GET["todo"])) {
		$pdoStatement = $pdo->prepare("SELECT *  FROM material");
	}

    if (isset($_GET["marca"])) {
		$pdoStatement = $pdo->prepare("SELECT *  FROM material ORDER BY Marca");
	}

	if (isset($_GET["prezo"])) {
		$pdoStatement = $pdo->prepare("SELECT * FROM material ORDER BY prezo");
	}

	if (!empty($_GET['buscarMarca'])) {
		$buscarMarca = "%" . $_GET["buscarMarca"] . "%";
		$pdoStatement = $pdo->prepare("SELECT * FROM material WHERE Marca like :marca");
		$pdoStatement->bindParam(':marca', $buscarMarca);
	}

	if (!empty($_GET['buscarcualquiera'])) {
		$buscarMarca = "%" . $_GET["buscarcualquiera"] . "%";
		$pdoStatement = $pdo->prepare("SELECT * FROM material WHERE Marca like :marca or Tipo like :tipo or Nome like :nome or Prezo like :prezo");
		$pdoStatement->bindParam(':marca', $buscarMarca);
		$pdoStatement->bindParam(':tipo', $buscarMarca);
		$pdoStatement->bindParam(':nome', $buscarMarca);
		$pdoStatement->bindParam(':prezo', $buscarMarca);
	}

	if(isset($_GET['tipo'])) {
		$tipo = $_GET['tipo'];
		$pdoStatement = $pdo->prepare("SELECT * FROM material WHERE Tipo = '$tipo'");
	}
	
	$pdoStatement->execute();

	while($fila = $pdoStatement->fetch(PDO::FETCH_ASSOC)){
		$srcImaxe = $fila['Imaxe'];
		echo "<div class='produto'>" . $fila['Nome'] . "<br>" . $fila['Marca'] . "<br>" . $fila['Tipo'] . "<br>" . $fila['Prezo'] . " € <br>" . "<img src='imaxes/$srcImaxe'></div>";
	}

		




	/* DENTRO DUN BUCLE E DESPOIS DE LER AS VARIABLES DA BASE DE DATOS:
	
	echo "<div class='produto'><img src='imaxes/$srcImaxe'>....
	</div>";
	
	*/




?>

<article>
</body>
</html>






















