<div class='pestanaoff''>
<a href='/panel/recomendaciones/perfiles'> Recomendar Galer&iacute;as</A>
</div>

<div class='pestanaoff'>
<a href='/panel/recomendaciones/recibidas'>Recomendaciones Recibidas</A>
</div>

<div class='pestana'>
<a href='/panel/recomendaciones/realizadas'>Galer&iacute;as Recomendadas</A>
</div>

<div class='pestanaoff'>
<a href='/panel/recomendaciones/realizadas-pub'>Recomendaciones Realizadas</A>
</div>

<?
session_start();


	echo "<div class='blanc' style='clear: both; padding: 10px; overflow: hidden; margin-top: 0px; border-top:0px; '>
	
		<div class='tit' style='margin-bottom: 10px;'>Galer&iacute;as que ha recomendado </div>
		
		<p>
		
		Este listado muestra las galer&iacute;as que usted ha recomendado. Usted puede en cualquier momento dejar de recomendar cualquiera de ellas.<p>
		</div><div>";

	$consulta= "select usuarios.id, usuarios.empresa_nombre, usuarios.subdominio, usuarios.empresa_texto, seguidores.id,seguidores.noticia ,usuarios.ref
	from seguidores,usuarios 
		where usuarios.id=seguidores.perfil  and seguidores.usuario='".$_SESSION['idusuario']."' and seguidores.noticia='0'
			
		  ";

	

	
		$sql=mysql_query($consulta,$conex);
		$a=0;
		while($recomendar=mysql_fetch_array($sql)){
			$a++;
			
	if ($recomendar[5]=="0")
			{	$img=$_SESSION['cdn']."perfil/".$recomendar[0].".png";
				$url="//yolovalgo.com/".$recomendar[2];}
		else
			{$img=$recomendar[2];
			 $url="/publicacion/".$recomendar[0];}
			
			
			
			$texto=$recomendar[3];
			$titulo=$recomendar[1];
			
		
		echo "<div class='blanc' id='borrar".$a."' style='float: left; width: 32%; margin: 5px;
				-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
				border-radius: 10px;'>";
		echo "
					<div style=\"width: 100%; height:150px;  overflow:hidden; 
										background-color: #FDFDFD;-webkit-border-top-left-radius: 10px;
								-webkit-border-top-right-radius: 10px;
								-moz-border-radius-topleft: 10px;
								-moz-border-radius-topright: 10px;
								border-top-left-radius: 10px;
								border-top-right-radius: 10px;;
										
										\">
								<img src='".$img."' style='height:100%; width:100%;-webkit-border-top-left-radius: 10px;
								-webkit-border-top-right-radius: 10px;
								-moz-border-radius-topleft: 10px;
								-moz-border-radius-topright: 10px;
								border-top-left-radius: 10px;
								border-top-right-radius: 10px;'>	
					</div><div style='float: right; margin: 5px;' title='Pulse para dejar de recomendar esta galer&iacute;a'>
					
					<a class='button large green' style='float: right; margin-top: 5px; margin-right: 5px;'
						onclick=\"llamarasincrono('/seguir-dejar.php?idusuario=".$_SESSION['idusuario']."&id=".$recomendar[4]."'  , 'oculto');document.getElementById('borrar".$a."').style.display='none';\">
						 <i class='fa fa-thumbs-o-up'></i> Recomendada</A></div>
						
						
						<div style='width: 43%; height:15px; overflow:hidden;  margin-left: 15px; margin-top: 15px; float:left'>
						<A  href='".$url."'  style='overflow:hidden; width:180px; font-weight: bold; '>"
						.corta ($recomendar['empresa_nombre'],25)."&nbsp;</A></div>
						
						
						
								
						<div style='font-size: 14px; height:90px; color: #424251; text-align: justify; padding: 15px;margin: 0px; overflow: hidden; float:left;'>".corta ($recomendar['empresa_texto'],250)." </div>
						
						<div style='float: left; margin: 5px;' >
						 <i class='fa fa-thumbs-o-up'></i> ".$recomendar['ref']."
						</div>
			
				</div>";
		
		
		}

	echo "</div>";
?>


