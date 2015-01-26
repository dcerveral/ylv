<div id='ajaxpubli'>
<?
	
session_start();
include('conex.php');



$consulta="Select * from noticias where usuario='".$_SESSION['idusuario']."' and id='".$_GET['id']."'; ";
$sql=mysql_query($consulta,$conex);
$not=mysql_fetch_array($sql);	

if (!$not[0]) {echo "Publicaci&oacute;n No Disponible"; die();}
$foto=$not["foto"];$IMG="Imagen";
						
						
						if (!$foto){$foto="https://yolovalgo.es/perfil/0.png";$IMG="Solo ";}
						
						$FOTOVIDEO="<img src='$foto' style='width:100%'>";
						
						
						//VIDEO yiutuve
						if (strpos($foto, "youtube")){
											
							$foto=str_replace('watch?v=','embed/',$foto);
		
							$FOTOVIDEO="<iframe style='width:100%; height:auto' src='$foto?autoplay=1&rel=0&controls=0&showinfo=0&modestbranding=1&theme=light' frameborder='0' allowfullscreen></iframe>";
		
		
						}
						
						//VIDEO vimeo
						if (strpos($foto, "vimeo")){
						
						$foto=str_replace('http://','https://',$foto);
						$foto=str_replace('vimeo.com','player.vimeo.com/video',$foto);
						
				
						$FOTOVIDEO="<iframe src='$foto?autoplay=1&badge=0&color=FF00&byline=0' style='width:100%; height:auto;' frameborder='0' webkitallowfullscreen mozallowfullscreen 
								allowfullscreen></iframe>";
					
						
					}
						
						//VIDEO DAILYMOTION
							if (strpos($foto, "dailymotion")){
								
								$FOTOVIDEO="<iframe frameborder=0 style='width:100%;height:auto' src='$foto?autoplay=1&logo=0&info=0&hideInfos=0&start=0&syndication=225857&foreground=&highlight=&background='></iframe>";
								
								echo $foto;
							}
							
			echo "<div style='float:left; width:45%'>$FOTOVIDEO</div>";	

			echo "<div style='float:right; width:53%'>";
			
			
				echo "<div class='tit'>".$not['titulo']."</div>";
			
				echo "<div style='margin-top: 5px;'>".corta($not['cuerpo'],250)."</div>";
			
			echo "</DIV>";
			
			
			echo "<DIV STYLE='clear: both;'><div style=' float: left; margin:5px;'>
					<a onclick=\"eliminar('".$not['id']."');\"  style='color: #9F0B0B;'  > <i class='fa fa-trash'></i> Eliminar </A> ";
			
			
			//EDITAR
			
			if ($not['visitas']>100 || $not['ref']>0) {
			
			echo "<a  onclick=\"Sexy.error('<b>Publicaci&oacute;n Cerrada</b><p>Esta publicaci&oacute;n ha recibido recomendaciones y/o visitas y ya no puede editarse.');\"  style='color: #9E9E9E;' > <i class='fa fa-pencil-square-o'></i> Editar </A> ";
			}
			else
			{
			echo "<a   href='/panel/galeria/publicaciones/";
				if ($not['destacado']==0) {echo "editar";}else{echo "promocionar";}
			echo "/".$not[0]."'  > <i class='fa fa-pencil-square-o'></i> Editar </A> ";
			}
			
			
			if ($not['ref']>0) {
				echo "<a   href='/panel/recomendaciones/recibidas_pub/".$not[0]."'  ><i class='fa fa-thumbs-o-up'></i> ".$not['ref']." Recomendaciones (ver) </A>";
			}
			else
			{
			echo "<a   href='#' onclick=\"Sexy.error('<b>Sin recomendaciones</b><p>Esta publicaci&oacute;n no ha recibido recomendaciones.');\" style='color: #9E9E9E;' ><i class='fa fa-thumbs-o-up'></i> 0 Recomendaciones </A>";
			
			}
			
			
			echo "<a   href='/ver/publicacion/num/".$not[0]."'  > <i class='fa fa-bookmark'></i> Visualizar </A> 
			</div></div>";
			
			
			
			 
echo "</div>";

			
function corta($texto,$tamano) {

   // Inicializamos las variables
$texto=str_replace(',',', ',$texto);
$contador = 0;

 
// Cortamos la cadena por los espacios
$arrayTexto = split(' ',$texto);
$texto = '';
 
// Reconstruimos la cadena
while($tamano >= strlen($texto) + strlen($arrayTexto[$contador])){
    $texto .= ' '.$arrayTexto[$contador];
    $contador++;
}
	if ($tamano > strlen($texto)) {$texto .= "<span style='font-size: 8px;'>...</span>";}
	
	
	
    return $texto;

}
?>
</div>

<script>
function eliminar(id){Sexy.confirm('&iquest;Desea eliminar permanentemente esta publicaci&oacute;n?',{onComplete:function(returnvalue){if(returnvalue){Sexy.alert('<h1>Publicaci&oacute;n  Eliminado</h1><p>La publicaci&oacute;n  ha sido eliminada.');
llamarasincrono('/ajax-publicaciones-eliminar.php?id='+ id,'oculto');
document.getElementById('ajaxpubli').innerHTML = 'Publicaci&oacute;n No Disponible';
}
else{Sexy.error('<h1>NO eliminado</h1><p>La noticia no ha sido eliminada.');}}});}




function promocionar(id){Sexy.confirm('&iquest;Desea promocionar esta publicaci&oacute;n?',{onComplete:function(returnvalue){if(returnvalue){
	
	llamarasincrono('/ajax-publicaciones-promocionar.php?id='+ id,'oculto');
	document.getElementById('boton'+ id).className='button large orange';
	document.getElementById('texto'+ id).innerHTML='Promocionada';
	
}
else{Sexy.error('<h1>NO Promocionada</h1><p>La publicación no ha sido promocionada.');}}});}



function nopromocionar(id){Sexy.confirm('&iquest;Desea dejar de promocionar esta publicaci&oacute;n?',{onComplete:function(returnvalue){if(returnvalue){
	llamarasincrono('/ajax-publicaciones-promocionar-no.php?id='+ id,'oculto');
	document.getElementById('boton'+ id).className='button large yellow';
	document.getElementById('texto'+ id).innerHTML='NO Promocionada';
	
}
else{Sexy.error('<h1>Promocionada</h1><p>La publicaci&oacute;n sigue promocionada.');}}});}


</script>