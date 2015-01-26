<?

session_start();

include('conex.php');



if ($_GET['tipo']=="mes"){
	$consulta="select *
				from	noticias
				where  	usuario='".$_SESSION['idusuario']."' 
						and activo=1
						and fecha>'".date('Y-m-')."01'
						and destacado=0
				order by fecha DESC
				limit 1000";
				
				
			
}
if ($_GET['tipo']=="promohoy"){
	$consulta="select *
				from	noticias
				where  	usuario='".$_SESSION['idusuario']."' 
						and activo=1
						and fecha='".date('Y-m-d')."'
						and destacado=1
				order by fecha DESC
				limit 100";
				
				
			
}
if ($_GET['tipo']=="promomes"){
	$consulta="select *
				from	noticias
				where  	usuario='".$_SESSION['idusuario']."' 
						and activo=1
						and fecha>'".date('Y-m-')."01'
						and destacado=1
				order by fecha DESC
				limit 100";
				
				
			
}

if ($_GET['tipo']=="anno"){
	$consulta="select *
				from	noticias
				where  	usuario='".$_SESSION['idusuario']."' 
						and activo=1
						and fecha>='".$_GET['anno']."-01-01'
						and fecha<='".$_GET['anno']."-12-31'
						
				order by fecha DESC
				limit 1000";
				
			
			
}

if ($_GET['tipo']=="clic"){
	$consulta="select *
				from	noticias
				where  	usuario='".$_SESSION['idusuario']."' 
						and destacado=1
						and clic>0
				order by fecha DESC
				limit 1000";
				
				
			
}

			$sql=mysql_query($consulta,$conex);
		
		echo "<div>
			<table class='tabla' style='width: 100%; border:0px;'>
			<tr style='display: none;' ><td></td><td></td></tr>";
		
		$a=0;
		while($dato=mysql_fetch_array($sql)){
			$a++;
			if ($dato["foto"]) {$foto=$dato["foto"];
	
									//VIDEO youtuve
							if (strpos($foto, "youtube")){
								$youtube=str_replace("https://www.youtube.com/watch?v=", "", $foto);
								$foto="https://img.youtube.com/vi/".$youtube."/0.jpg";
							
							}
							
							//VIDEO vimeo
							if (strpos($foto, "vimeo")){
								
								$foto =  str_replace("https://", "http://", $foto);
								$imgid = str_replace("http://vimeo.com/", "", $foto);
									
								//$imgid=112491820;
								$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
								$foto=$hash[0]['thumbnail_medium'];  
								
							}
							
								//VIDEO DAILYMOTION
							if (strpos($foto, "dailymotion")){
								$foto=str_replace("dailymotion.com/video/", "dailymotion.com/thumbnail/video/", $foto);
								
							
							}
				}else{$foto="//yolovalgo.es/perfil/.png";}
			echo "<tr id='tr".$dato['id']."'><td style='padding: 1px;width: 62px;'><img src='".$foto."' onerror=\"src='//yolovalgo.es/perfil/.png'\" style='width:60px; height:60px;'></td>
			
					<td ><div style='color: #4F4253;'>".$dato["titulo"]."</div>
					
					<div style='margin-top:5px; color:#969696;'>Publicada el ".date("d-m-Y",strtotime($dato['fecha']))."</div>	<DIV STYLE='clear: both;'>";
							
					if ($_GET['tipo']=="clic"){echo "<div style='margin-top:5px; color: #FF7373;'>".$dato['clic']. " clics a mi web.</div>";}

					
				echo "<div style=' float: right; margin:5px; opacity:0.9;'>
				
				
					<a title='Eliminar' onclick=\"eliminar('".$dato['id']."');\"  style='color: #9F0B0B;'  > <i class='fa fa-trash'></i> </A> 
			
			";
			//EDITAR
			
			if ($dato['visitas']>100 || $dato['ref']>0) {
			
			echo "<a  title='Editar' onclick=\"Sexy.error('<b>Publicaci&oacute;n Cerrada</b><p>Esta publicaci&oacute;n ha recibido recomendaciones y/o visitas y ya no puede editarse.');\"  style='color: #9E9E9E;' >
			<i class='fa fa-pencil-square-o'></i>  </A> ";
			}
			else
			{
			echo "<a   title='Editar' href='/panel/galeria/publicaciones/";
				if ($dato['destacado']==0) {echo "editar";}else{echo "promocionar";}
			echo "/".$dato[0]."'  > <i class='fa fa-pencil-square-o'></i>  </A> ";
			}
			
			
			
			
			
			echo "<a  title='Ver Publicaci&oacute;n'  href='/ver/publicacion/num/".$dato[0]."'  > <i class='fa fa-external-link-square'></i>  </A> 
			</div>
			
			
			</div>
					</td>
			
			
			</tr>";
			}
			
				if ($a==0) {echo "No hay publicaciones en este periodo";}
		
		
		
			?>
			</table>
			</div>
			
			
			
<script>
function eliminar(id){Sexy.confirm('&iquest;Desea eliminar permanentemente esta publicaci&oacute;n?',{onComplete:function(returnvalue){if(returnvalue){Sexy.alert('<h1>Publicaci&oacute;n  Eliminado</h1><p>La publicaci&oacute;n  ha sido eliminada.');
llamarasincrono('/ajax-publicaciones-eliminar.php?id='+ id,'oculto');
document.getElementById('tr'+ id).style.display='none';
}
else{Sexy.error('<h1>NO eliminado</h1><p>La noticia no ha sido eliminada.');}}});}



</script>
