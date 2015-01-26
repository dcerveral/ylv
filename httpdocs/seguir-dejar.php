<?
session_start();
include('conex.php');



	$consultar="DELETE FROM `nearyou`.`seguidores` WHERE id='".$_GET['id']."' AND usuario='".$_SESSION['idusuario']."';";
	
	
	$sql=mysql_query($consultar,$conex);
	
	
	
	$mensaje="Tu recomendación ha sido anulada. ";
	
	?>
		<script>
			Sexy.alert("<? echo $mensaje; ?>");
		</script>


	
	
	
	
	





