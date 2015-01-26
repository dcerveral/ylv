<div class='pestanaoff''>
<a href='/panel/recomendaciones/perfiles'> Recomendar Galer&iacute;as</A>
</div>

<div class='pestanaoff'>
<a href='/panel/recomendaciones/recibidas'>Recomendaciones Recibidas</A>
</div>

<div class='pestanaoff'>
<a href='/panel/recomendaciones/realizadas'>Galer&iacute;as Recomendadas</A>
</div>

<div class='pestanao'>
<a href='/panel/recomendaciones/realizadas-pub'>Recomendaciones Realizadas</A>
</div>



<?
session_start();


	echo "<div class='blanc' style='padding: 10px; overflow: hidden; margin-top: 0px; clear:both; border-top: 0px;'>
	
		<div class='tit' style='margin-bottom: 10px;'>Recomendaciones Recibidas</div>
		
		<p>
		
		La siguiente lista muestra las recomendaciones que usted ha recibido de esta publicaci&oacute;n.<p>
		";

	$consulta= "select usuarios.id, usuarios.empresa_nombre, usuarios.subdominio, usuarios.empresa_texto, seguidores.id,seguidores.noticia from seguidores,usuarios 
		where usuarios.id=seguidores.usuario  and (seguidores.perfil='".$_SESSION['idusuario']."') and seguidores.noticia='".$_GET['get']."'  order by seguidores.id DESC
			 ";

	
	
		$sql=mysql_query($consulta,$conex);
		$a=0;
		while($recomendar=mysql_fetch_array($sql)){
			$a++;
			
		$img=$_SESSION['cdn']."perfil/".$recomendar[0].".png";
				$url="/".$recomendar[2];
		
			
			
			
			$texto=$recomendar[3];
			$titulo=$recomendar[1];
			
		
		echo "<div class='blanc' id='borrar".$a."' style='float: left; width: 30%; margin: 5px;'>";
		echo "
					<div style=\"width: 100%; height:150px;  overflow:hidden; 
										background-color: #FDFDFD;
										
										\">
								<img src='".$img."' style='height:100%; width:100%'>	
					</div><div style='float: right; margin: 5px;' >
					
					
					
					
					
					
					
					</A></div>
						<div style='width: 99%; margin: 5px; margin-top: 10px;'>
						<A  href='".$url."'  style='overflow:hidden; width:180px; font-weight: bold; '>"
						.corta ($recomendar['empresa_nombre'],25)."&nbsp;</A></div>
								
						<div style='font-size: 14px; height:110px; color: #424251; text-align: justify; padding: 5px;margin: 5px; overflow: hidden'>".corta ($recomendar['empresa_texto'],250)." </div>
						
						<div style='float: right; margin: 5px;' >
						</div>
			
				</div>";
		
		
		}

	echo "</div>";
?>