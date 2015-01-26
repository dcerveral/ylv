<div class='pestanaoff''>
<a href='/panel/recomendaciones/perfiles'> Recomendar Galer&iacute;as</A>
</div>

<div class='pestana'>
<a href='/panel/recomendaciones/recibidas'>Recomendaciones Recibidas</A>
</div>

<div class='pestanaoff'>
<a href='/panel/recomendaciones/realizadas'>Galer&iacute;as Recomendadas</A>
</div>

<div class='pestanaoff'>
<a href='/panel/recomendaciones/realizadas-pub'>Recomendaciones Realizadas</A>
</div>

<?
session_start();


	echo "<div class='blanc' style='padding: 10px; overflow: hidden; margin-top: 0px; clear:both; border-top: 0px;'>
	
		<div class='tit' style='margin-bottom: 10px;'>Recomendaciones Recibidas</div>
		
		<p>
		
		La siguiente lista muestra las galer&iacute;as que le han recomendado.<p>
		";
echo "</div>";
	$consulta= "select usuarios.id, usuarios.empresa_nombre, usuarios.subdominio, usuarios.empresa_texto, seguidores.id,seguidores.noticia, usuarios.ref from seguidores,usuarios 
		where usuarios.id=seguidores.usuario  and (seguidores.perfil='".$_SESSION['idusuario']."')and seguidores.noticia='0' GROUP BY seguidores.usuario order by seguidores.id DESC
			 ";

	
	
		$sql=mysql_query($consulta,$conex);
		$a=0;
		while($recomendar=mysql_fetch_array($sql)){
			$a++;
			
		$img=$_SESSION['cdn']."perfil/".$recomendar[0].".png";
				$url="/".$recomendar[2];
		
			
			
			
			$texto=$recomendar[3];
			$titulo=$recomendar[1];
			
		
		echo "<div class='blanc' id='borrar".$a."' style='float: left; width: 30%; margin: 5px;-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
				border-radius: 10px;'>";
		echo "
					<div style=\"width: 100%; height:150px;  overflow:hidden; 
										background-color: #FDFDFD;-webkit-border-top-left-radius: 10px;
								-webkit-border-top-right-radius: 10px;
								-moz-border-radius-topleft: 10px;
								-moz-border-radius-topright: 10px;
								border-top-left-radius: 10px;
								border-top-right-radius: 10px;' onerror=\"this.src='/fondo.jpg';\"
										
										\">
								<img src='".$img."' style='height:100%; width:100%;-webkit-border-top-left-radius: 10px;
								-webkit-border-top-right-radius: 10px;
								-moz-border-radius-topleft: 10px;
								-moz-border-radius-topright: 10px;
								border-top-left-radius: 10px;
								border-top-right-radius: 10px;' onerror=\"this.src='/fondo.jpg';\"'>	
					</div>
					
					
					
						<div style='width: 99%;  margin-top: 15px;  margin-left: 15px; '>
						<A  href='".$url."'  style='overflow:hidden; width:180px; font-weight: bold; '>"
						.corta ($recomendar['empresa_nombre'],25)."&nbsp;</A></div>
								
						<div style='font-size: 14px; height:100px; color: #424251; text-align: justify; padding: 15px;margin: 5px; overflow: hidden'>".corta ($recomendar['empresa_texto'],250)." </div>
						
						
						
						<div style='float: left; margin-left: 15px; margin-bottom:5px;' title='".$recomendar['ref']." Recomendaciones' >
						<i class='fa fa-thumbs-o-up'></i> ".$recomendar['ref']."
						</div>
						
			
				</div>";
		
		
		}

	
?>


