<!DOCTYPE html>
<html>
<head>
<style>
	#contedor
	{
		width:70%;
		margin:20px auto;
		background-color:white;
			
		display: grid; 
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		grid-gap: 5px; 
	}

	.tema
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
	<form method="get" action="folla4.2.php">
		<button type="input" name="todos">Ver todos</button>
		<button type="input" name="ordenarT">Ordenar por título</button>
		<button type="input" name="ordenarA">Ordenar por autor</button>
		<br><br>
		<select name="autor">
			<option value="The Beatles">The Beatles</option>
			<option value="The Rolling Stones">The Rolling Stones</option>
			<option value="Outros">Outros</option>
		</select>
		<button type="input" name="filtrar">Buscar</button>
	</form>
<article id="contedor">
<?php
	$conexion = mysqli_connect("db", "root", "root", "musica");
    $consulta = '';

	if (isset($_GET['todos'])) {
	    $consulta = "SELECT * FROM tema";
	}
	elseif (isset($_GET['ordenarT'])) {
		$consulta = "SELECT * FROM tema ORDER BY Titulo";
	}
	elseif (isset($_GET['ordenarA'])) {
		$consulta = "SELECT * FROM tema ORDER BY Autor";
	}
	elseif (isset($_GET['filtrar']) && $_GET['autor'] == 'The Beatles') {
		$consulta = "SELECT * FROM tema WHERE Autor='The Beatles'";
	}
	elseif (isset($_GET['filtrar']) && $_GET['autor'] == 'The Rolling Stones') {
		$consulta = "SELECT * FROM tema WHERE Autor='The Rolling Stones'";
	}
	elseif (isset($_GET['filtrar']) && $_GET['autor'] == 'Outros') {
		$consulta = "SELECT * FROM tema WHERE Autor!='The Beatles' AND Autor!='The Rolling Stones'";
	}

	if ($consulta != '') {
        mysqli_set_charset($conexion, "utf8");
        $resultado = mysqli_query($conexion, $consulta);
            if ($resultado != false) {
                while(list($Titulo,$Autor,$Ano,$Duracion,$srcImaxe) = mysqli_fetch_array ( $resultado ) ){
                    echo "<div class='tema'><img src='imaxes/$srcImaxe.jpg'><br>$Titulo<br>$Autor<br>$Ano<br>$Duracion</div>";
                }
            }
        }

	/* DENTRO DUN BUCLE E DESPOIS DE LER AS VARIABLES DA BASE DE DATOS:
	
	echo "<div class='tema'><img src='imaxes/$srcImaxe'><br>...<br/>
	</div>";
	
	*/
?>
</article>
<form method="get" action="folla4.2.php">
	<br><br>
	<textarea name="texten" rows="4" cols="50" placeholder="'Titulo', 'autor', 'ano', 'duracion', 'imaxe'"></textarea>
	<br>
	<button type="input" name="engadir">Engadir rexistro</button>
	<br><br><br>
	<textarea name="textel" rows="4" cols="50" placeholder="Titulo"></textarea>
	<br>
	<button type="input" name="borrar">Eliminar rexistro</button>
	<br><br>
	<textarea name="fila" rows="4" cols="20" placeholder="Fila"></textarea> <textarea name="valor" rows="4" cols="20" placeholder="Nuevo valor"></textarea> <textarea name="textotit" rows="4" cols="20" placeholder="Titulo de lo que quieres modificar"></textarea>
	<br><br>
	<button type="input" name="modificar">Modificar rexistro</button>
</form>
<?php
	$conexion = mysqli_connect("db", "root", "root", "musica");
	$consulta2 = '';	
		
	if (isset($_GET['engadir'])) {
		$texto = $_GET['texten'];
		$consulta2 = "INSERT INTO tema (Titulo, Autor, Ano, Duracion, Imaxe) VALUES ($texto)";
	}
	if (isset($_GET['borrar'])) {
		$texto = $_GET['textel'];
		$consulta2 = "DELETE FROM `tema` WHERE `Titulo` = '$texto'";
	}
	if (isset($_GET['modificar'])) {
		$fila= $_GET['fila'];
		$textotit = $_GET['textotit'];
		$value = $_GET['valor'];
		$consulta2 = "UPDATE `tema` SET $fila='$value' WHERE `Titulo`='$textotit'";
	}

	if ($consulta2 != '') {
        mysqli_set_charset($conexion, "utf8");
        $resultado = mysqli_query($conexion, $consulta2);
            if ($resultado != false) {
                echo"<h1>Modificación correcta<h1>";
            }
    }

?>
</body>
</html>






















