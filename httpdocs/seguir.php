<?
session_start();


include('conex.php');



$consulta="SELECT * FROM seguidores  WHERE usuario=".$_GET['id']." AND perfil=".$_GET['perfil']." and noticia=0";


$sql=mysql_query($consulta,$conex);
$seguir=mysql_fetch_array($sql);


if (!$seguir[0]){
	$consultar="INSERT INTO `nearyou`.`seguidores` (`id`, `usuario`, `perfil`, `creada`) VALUES (NULL, ".$_GET['id'].", ".$_GET['perfil'].", CURRENT_TIMESTAMP);";
	$sql=mysql_query($consultar,$conex);
	
	
	
	
	$datos="select * from usuarios where id='".$_GET['perfil']."';";
	$sql=mysql_query($datos,$conex);
	$empresa=mysql_fetch_array($sql);
	$nombre=$empresa['empresa_nombre'];
	$para=$empresa['usuario'];
	$mensaje="Has recomendado a ".$nombre;
	
	?>
		<script>
			alert2("<? echo $mensaje; ?>");
		</script>
	<?
//include ('mail-seguir.php');
	
	
	
	
	
		
}
else
{
	$mensaje="Tu recomendaci&oacute;n ya hab&iacute;a sido realizada.".$_GET['perfil'];
	?>
		<script>
			alert2("<? echo $mensaje; ?>");
		</script>
	<?
}

?>




