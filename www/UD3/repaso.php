<!DOCTYPE html>
<html>
<head><title>Rock</title>
<link type="text/css" rel="stylesheet" href="repaso.css"> 
</head>
<body>

<div id="contenedor">

<header>
<h2>Éxitos dos 60's e 70's</h2>
</header>
<aside id="esquerda"></aside>
<aside id="dereita"></aside>



<aside id="formulario">
	<form action="repaso.php" method="GET">
		<label>Buscar cacnción:</label>
		<br><br>
		<textarea cols="20" rows="1" name="buscarT"></textarea>
		<br>
		<button type="submit" name="buscar">Buscar</button>
		<br><br>
		<button type="submit" name="completo">Ver listado completo dos éxitos</button>
		<br><br>
		<label>Ordenado:</label>
		<br><br>
		<button type="submit" name="banda">Polo nome da banda</button>
		<br>
		<button type="submit" name="titulo">Polo título</button>
		<br>
		<button type="submit" name="ano">Decrecente polo ano</button>
		<br>
		<button type="submit" name="lon">Pola lonxitude do título</button>
		<br><br>
		<label>Cambios:</label>
		<br>
		<button type="submit" name="espazos">Elimino espazos nos títulos</button>
		<br>
		<button type="submit" name="cambio">Cambio 'oo' por 'aa'</button>
		<br>
		<button type="submit" name="maiusculas">Maiúsculas a 3º letra de cada título</button>
	</form>
	

</aside>
<article id="foto"></article>
<article id="taboa">
	<?php
		function banda($a,$b){
			if($a[0] < $b[0]){
                return -1;
            } 
            elseif($a[0] > $b[0]){
                return 1;
            }
            else{
                return 0;
            }
		}

		function ano($a,$b){
			if($a[1] < $b[1]){
                return 1;
            } 
            elseif($a[1] > $b[1]){
                return -1;
            }
            else{
                return 0;
            }
		}

		function lonxitude($a,$b){
			if(strlen($a) < strlen($b)){
                return -1;
            } 
            elseif(strlen($a) > strlen($b)){
                return 1;
            }
            else{
                return 0;
            }
		}

		echo "<table>";
		require "datosMusica.php";

		if(!empty($_GET['buscarT'])) {
			$buscar = $_GET['buscarT'];
			echo "<tr><td>Titulo</td><td>Músico</td><td>Ano</td><td>Duración</td></tr>";
			foreach ($cancions as $key => $value) {
				if (str_contains(strtolower($key), strtolower($buscar)) or str_contains(strtolower($value[0]), strtolower($buscar)) or str_contains(strtolower($value[1]), strtolower($buscar)) or str_contains(strtolower($value[2]), strtolower($buscar)))
					echo"<tr><td>" . $key. "</td><td>". $value[0] . "</td><td>" . $value[1]. "</td><td>" . $value[2] . "</td></tr>";
			}
		}

		if(isset($_GET['completo'])) {
			echo "<tr><td>Titulo</td><td>Músico</td><td>Ano</td><td>Duración</td></tr>";
			foreach ($cancions as $key => $value) {
				echo"<tr><td>" . $key. "</td><td>". $value[0] . "</td><td>" . $value[1]. "</td><td>" . $value[2] . "</td></tr>";
			}
		}

		if(isset($_GET['banda'])) {
			echo "<tr><td>Titulo</td><td>Músico</td><td>Ano</td><td>Duración</td></tr>";
			uasort($cancions, 'banda');
			foreach ($cancions as $key => $value) {
				echo"<tr><td>" . $key. "</td><td>". $value[0] . "</td><td>" . $value[1]. "</td><td>" . $value[2] . "</td></tr>";
			}
		}

		if(isset($_GET['titulo'])) {
			echo "<tr><td>Titulo</td><td>Músico</td><td>Ano</td><td>Duración</td></tr>";
			ksort($cancions);
			foreach ($cancions as $key => $value) {
				echo"<tr><td>" . $key. "</td><td>". $value[0] . "</td><td>" . $value[1]. "</td><td>" . $value[2] . "</td></tr>";
			}
		}

		if(isset($_GET['ano'])) {
			echo "<tr><td>Titulo</td><td>Músico</td><td>Ano</td><td>Duración</td></tr>";
			uasort($cancions, 'ano');
			foreach ($cancions as $key => $value) {
				echo"<tr><td>" . $key. "</td><td>". $value[0] . "</td><td>" . $value[1]. "</td><td>" . $value[2] . "</td></tr>";
			}
		}

		if(isset($_GET['lon'])) {
			echo "<tr><td>Titulo</td><td>Músico</td><td>Ano</td><td>Duración</td></tr>";
			uksort($cancions, 'lonxitude');
			foreach ($cancions as $key => $value) {
				echo"<tr><td>" . $key. "</td><td>". $value[0] . "</td><td>" . $value[1]. "</td><td>" . $value[2] . "</td></tr>";
			}
		}
		
		if(isset($_GET['espazos'])) {
			echo "<tr><td>Titulo</td><td>Músico</td><td>Ano</td><td>Duración</td></tr>";
			foreach ($cancions as $key => $value) {
				echo"<tr><td>" . str_replace(' ', '',$key) . "</td><td>". $value[0] . "</td><td>" . $value[1]. "</td><td>" . $value[2] . "</td></tr>";
			}
		}

		if(isset($_GET['cambio'])) {
			echo "<tr><td>Titulo</td><td>Músico</td><td>Ano</td><td>Duración</td></tr>";
			foreach ($cancions as $key => $value) {
				echo str_replace('oo', 'aa', "<tr><td>" . $key . "</td><td>". $value[0] . "</td><td>" . $value[1]. "</td><td>" . $value[2] . "</td></tr>");
			}
		}

		if(isset($_GET['maiusculas'])) {
			echo "<tr><td>Titulo</td><td>Músico</td><td>Ano</td><td>Duración</td></tr>";
			foreach ($cancions as $key => $value) {
				$lonxitude = strlen($key);
				$posicion = 2;
	
				if ($lonxitude > $posicion) {
					$letra_a_cambiar = substr($key, $posicion, 1);
					$letra_maiuscula = strtoupper($letra_a_cambiar);
					$inicio = substr($key, 0, $posicion);
					$final = substr($key, $posicion + 1, $lonxitude);
					$titulo_modificado = $inicio . $letra_maiuscula . $final;
				} else {
					$titulo_modificado = $key;
				}
				echo"<tr><td>" . $titulo_modificado . "</td><td>". $value[0] . "</td><td>" . $value[1]. "</td><td>" . $value[2] . "</td></tr>";
			}
		}

		echo "</table>"
	?>  
</article>
</div>
</body>
</html>