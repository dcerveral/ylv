<?

session_start();

include('conex.php');

	$consulta="Select * from mail where  `id`='".$_GET['id']."'  LIMIT 1;"; 
	$sql=mysql_query($consulta,$conex);
	$men=mysql_fetch_array($sql);
	
	
	$consulta="Select subdominio from usuarios where  `usuario`='".$men['to']."'  LIMIT 1;"; 
	$sql=mysql_query($consulta,$conex);
	$to=mysql_fetch_array($sql);
	
	
	
	
	$consulta="Select subdominio from usuarios where  `usuario`='".$men['from']."'  LIMIT 1;"; 
	$sql=mysql_query($consulta,$conex);
	$from=mysql_fetch_array($sql);
	
	
	
	
	
	
	
	
	
	//$texto=str_replace(Chr(13), "<br />", $men['msg']); 
	$texto=$men['msg']; 
	echo "<div><i class='fa fa-user'></i>  &nbsp; &nbsp; @". $from[0]." </div>
	
			<div style='margin-top:5px;'> <i class='fa fa-paper-plane-o'></i> &nbsp; &nbsp; @". $to[0]."</div>
			<div  style='margin-top:5px;'> <i class='fa fa-calendar'></i>  &nbsp; &nbsp; ". $men['fecha']."</div>
			<div  style='margin-top:5px;'> <i class='fa fa-file-text-o'></i>  &nbsp; &nbsp; <span style='color: black;'>". $men['asunto']."</span></div>
			
			<div  style='margin-top:5px;'> <i class='fa fa-comment-o'></i>   &nbsp; &nbsp;  Mensaje:</div>";
	echo "<div  style='margin-top:5px; color:black; float:right; width:90%'>".$texto."</div>"; 
	
	
	//echo "<a class='button medium red' >Eliminar</a>";
	
	if ($_SESSION['usuario']==$men['to']) {
		echo "<div style='margin-top:20px;'><p>&nbsp;<p><a class='button medium blue' style='color: white;float:right' onclick=\"llamarasincrono ('/ajax-responder-msg.php?id=".$_GET['id']."&para=".$from[0]."', 'leer');\"> <i class='fa fa-reply-all'></i> Responder</a></div> 
			 ";
		}
	
	mysql_query("UPDATE mail SET   `news`='1'  where  `id`='".$_GET['id']."'; ", $conex);
?>