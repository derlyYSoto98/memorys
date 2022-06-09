<?php
include 'template/conexion.php';
session_start();
if(isset($_SESSION['usuario'])){
    $nombre=$_SESSION['usuario'];
}else{
    $nombre="";
}
if($nombre==""){
    echo "<script>window.location='index.php'</script>";
}else{
    echo $nombre;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>UNIVERSAL MUSIC!</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<header>
		<img src="titulo.png" width="400px">
	</header>
	<section>
		<div>
			<a href="registro.php"> REGISTRAR ARTISTA</a> <br> <br>
			<a href="consultar.php"> CONSULTAR ARTISTAS REGISTRADOS</a> <br> <br>
			<a href="reporteG.php"> REPORTE GENERAL DE ARTISTAS</a> <br> <br>
			<p>REPORTE INDIVIDUAL </p> 
              <form action="reporte.php" method="POST" >
				  <input type="text" name="txtrepo" id="txtrepo" placeholder="Nombre del artista"> </input>
			      <button type="submit">Generar..</button>
				
			  </form>
			</a> <br> <br>
			<a href="cerrar.php">Cerrar sesion</a> <br> <br>

		</div>
	</section>
</body>
</html>