<?

$subdominio=$_GET['subdominio'];

$consulta="select * from usuarios where subdominio='$subdominio';";




if ($_GET['subdominiousuario']){$consulta="select * from usuarios where id='".$_GET['subdominiousuario']."';";}



$sql=mysql_query($consulta,$conex);
$campo=mysql_fetch_array($sql);


//id de la pagina
$_SESSION['idpagina']=$campo[0];

mysql_query("UPDATE usuarios SET visitas=visitas+1 WHERE id='".$campo[0]."';",$conex);


//SI NO HAY PERFIL MOSTRAMOS EL PRINCIPAL
if (!$campo[0]){$consulta="select * from usuarios where id='1';";
				$sql=mysql_query($consulta,$conex);
				$campo=mysql_fetch_array($sql);}

				
				
$web=$campo['empresa_web'];
if ($campo['empresa_url']){$url="/go/".$campo['0']."/".zanox($campo['empresa_url']);}
						else{$url="/go/".$campo['0']."/".zanox($campo['empresa_web']);}
	

?>


	<div id='contiene-izquierda' 
		style=' width:82%; float: left; '>
		
		<a name='menu'></a>
		
	<?
		
		
					
		
echo "<div class='blanc' style='width:100%; border: 0px; max-height:250px;min-height:100px; overflow: hidden;'>

<div class='blanc' style='position: absolute;  margin-left: 30px;  width: 100px; height: 75px; vertical-align:middle; overflow:hidden; border: 1px solid #eeeeee; -webkit-box-shadow: 10px 10px 50px 0px rgba(0,0,0,0.9);
-moz-box-shadow: 10px 10px 50px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 50px 0px rgba(0,0,0,0.75);'>
				<img src='https://yolovalgo.es/perfil/".$campo[0].".png?".$campo['actualizado']."' style='width:100px; height: 75px; ' id='cabeceraperfil'></div>
				
				
				<img src='https://yolovalgo.es/perfil/".$campo[0].".jpg?".$campo['actualizado']."' style='width:100%; min-height:100px; border: 0px;' id='cabecerabanner'>
				
				</div>";	

			
						
echo "<div class='blanc' style='border: 0px;  height:30px; padding: 10px;font-weight: bold;padding-left:120px; font-size:18px;'>";



echo "		<div class='tit' style='float: left; margin-left:-80px;'>".$campo['empresa_nombre'];
		
		//URL
		if ($campo['contrato']>$_SESSION['hoy'] || $campo['credito']>0 || $campo['empresa_url'])
			{echo "<div style=''><a href='$url' style='font-size: 10px; color: #006633;'>".$campo['empresa_web']."</A></div>";}
		
		echo "</div>";
		
		
			
			//VISITAS Y SEGUIDORES 
		echo "<div style='float: right; font-size:10px;'>";
			$consultan="select count(*) from seguidores where perfil=".$campo['id']." and noticia=0;";
			$sql=mysql_query($consultan,$conex);
			$seguir=mysql_fetch_array($sql);
			
			
			
			
			echo "<div class='perfilmenu";if ($_GET['pestana']=="visitas") {echo "ok";};echo "'><a href='/".$campo['subdominio']."/visitas'><div style='font-size: 16px;'>".number_format($campo['visitas'])."</div>Visitas </A></div>";
			
			echo "<div class='perfilmenu";if ($_GET['pestana']=="seguidores") {echo "ok";};echo "' style='width:140px; '>";
			echo "<a href='/".$campo['subdominio']."/recomendaciones' onclick=\"llamarasincrono('/seguir.php?id=".$_SESSION['idusuario']."&perfil=".$campo[0]."'  , 'oculto');\" >
					<div style='font-size: 16px;'>".number_format($seguir[0])."</div>Recomendaciones</A>
					</div>";
			
	//BOTON SEGUIR 
		echo "<div style='float: left'>";
		if ($_SESSION['idusuario']){
				echo "<a  class='button small black' onclick=\"llamarasincrono('/seguir.php?id=".$_SESSION['idusuario']."&perfil=".$campo[0]."'  , 'oculto');\" style='margin-left: 10px;' >Recomendar</A>";
			}else{
				echo "	<a  class='button small black' style='margin-left: 10px;' 
				onclick=\"modal('/box-login.php',400,200);Sexy.error('<h1>Usuario no registrado</h1><p>Para poder recomendar a esta p&aacute;gina,<br> debes de <a href=/login>iniciar sesi&oacute;n</A> o <a href=/registrate>crear una cuenta</A>.');\">Recomendar</A>";}
		echo "</div>";
	
		
			echo "</div>"; 
		
		
		
	echo "</div>";
?>

		<div class='blanc' style='border: 0px;height: 32px;'>
		<div style='float: left; width:30px;  '>&nbsp;</div>
			<div class='perfilmenu<? if ($_GET['pestana']=="home" ) {echo "ok";} ?>'>
				<a href='/<? echo $campo['subdominio']; ?>'> Inicio </a>
			</div>
			<div class='perfilmenu<? if ($_GET['pestana']=="productos" || $_GET['pestana']=="producto") {echo "ok";} ?>'>
				<a href='/<? echo $campo['subdominio']; ?>/servicios'> 
						<? if ($campo['g1']=="Galería 1") {echo "Servicios";}else{echo $campo['g1']; } ?> 
						 </a>
			</div>
			<div class='perfilmenu<? if ($_GET['pestana']=="publicaciones" || $_GET['pestana']=="publicacion") {echo "ok";} ?>'>
				<a href='/<? echo $campo['subdominio']; ?>/publicaciones'> Publicaciones </a>
			</div>
			<!-- div class='perfilmenu<? if ($_GET['pestana']=="fotos") {echo "ok";} ?>'>
				<a href='/<? echo $campo['subdominio']; ?>/fotos'>Fotos</a>
			</div  -->
			<div class='perfilmenu<? if ($_GET['pestana']=="contacto") {echo "ok";} ?>'>
				<a href='/<? echo $campo['subdominio']; ?>/contacto'> Contacto </a>
			</div>
			
			
			
		
			
			
			</div>
			
			
			
			<?	
		
		 
	
	
			
			
		
		
		if ($_GET['pestana']=="home") {
			
			
				if ($campo['contrato'] > $_SESSION['hoy'] || $campo['credito']>0 || $campo['url'] ){

				include ('box-informacion.php'); 
				}
					
			
			
			
			include ('news-ultimas-noticias.php'); 	
			 

				$url_actual="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$mi_titulo=$campo['empresa_nombre'];
				INCLUDE('social.php');		
			} 
			
			
		if ($_GET['pestana']=="contacto") {
			INCLUDE ('box-contacto.php'); 
			include ('form-perfil.php'); 
		
			}
				
		if ($_GET['pestana']=="productos") {
			
			include ('box-productos.php'); 
			 	 }	
				 
		if ($_GET['pestana']=="producto") {
			
			include ('box-producto.php'); 
			 	 }	
				 
				 
		if ($_GET['pestana']=="publicacion") {
			INCLUDE ('box-noticia.php'); 
			 
			 	 }	
		if ($_GET['pestana']=="publicaciones") {
			INCLUDE ('box-noticias.php'); 
			 
			 	 }		 
				 
		if ($_GET['pestana']=="fotos") {
			INCLUDE ('box-fotos.php'); 
			 
			 	 }	

				 
		if ($_GET['pestana']=="seguidores") {
			INCLUDE ('box-seguidores.php'); 
			INCLUDE ('box-visitas.php');
		
			}		

		if ($_GET['pestana']=="visitas") {
			INCLUDE ('box-visitas.php'); 
			INCLUDE ('box-seguidores.php');
		
			}			
				 
				 
	//OPCIONES DE EDICION
	

if ($_SESSION['usuario']==$campo[1]){
	if ($_GET['pestana']=="perfil") {
			
			include ('box-editar-perfil.php'); 	
				
			} 

	if ($_GET['pestana']=="datos") {
			
			include ('box-editar-datos.php'); 	
				
			} 

	if ($_GET['pestana']=="claves") {
			
			include ('box-editar-claves.php'); 	
				
			} 

		if ($_GET['pestana']=="servicios") {
			
			include ('box-publicar-producto.php'); 
			include ('box-productos.php'); 
			 	 }	
				 
		if ($_GET['pestana']=="publicar") {
			
			include ('box-publicar-noticia.php'); 
			include ('box-noticias.php'); 
			 	 }	

}








				 
			include ('footer.php');
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			?>
		
		

		
	</div>
	
<? 
if ($campo['contrato']> date("Y-m-d")){

	//LATERAL izquierdo  PREMIUM

	$consulta="select imagen,link from lateral where posicion>1 and imagen!='' and link!='' and usuario=".$campo['id']." order by posicion ASC limit 4;";
	$sql2=mysql_query($consulta,$conex);
	
	
	while($lateral=mysql_fetch_array($sql2)){ 
	
	
			echo "<div id='contiene'>
			<div id='contiene-derecha' style='float: right; width:17%;'>
			<div class='blanc' style='padding:5px; '>";
		
				echo "<a href='/go/".$campo[0]."/".$lateral[1]."'><img src='".$lateral[0]."' style='width:100%;'></A>";
			echo "</div></div> </div>";

	}	
	
}

	//LATERAL DERECHO NO PREMIUM
  else { ?>	
	<div id='contiene'>

	<div id='contiene-derecha' style='float: right; width:17%;'>
	
		
					
					
		
		
		
		
		
		
		
		
		
		
	<div class='blanc' style='padding:5px; '>
		
			<? include ('publicidad-recomendados.php');	 ?>
		
		</div>
		<div class='blanc' style='padding:5px; margin-top:5px;'>
		
			<? include ('publicidad-populares.php');	 ?>
		
		</div>
	
	<div class='blanc' style='padding:5px; margin-top:5px;'>
		
			<? include ('publicidad-nuevos.php');	 ?>
		
		</div>
	
	
	<div class='blanc' style='padding:5px; overflow: hidden; text-align:center; margin-top: 5px;'>	<p>
	<span class='anuncio'> &nbsp; Publicidad &nbsp;  </span><p>

					<div class="zx_7551BEC4D93A6506482D zx_mediaslot">
						<script type="text/javascript">
							window._zx = window._zx || [];
							window._zx.push({"id":"7551BEC4D93A6506482D"});

							(function(d) {
								var s = d.createElement("script"); s.async = true; 
								s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//static.zanox.com/scripts/zanox.js";
								var a = d.getElementsByTagName("script")[0]; a.parentNode.insertBefore(s, a);
							}(document));
						</script>
					</div>
			

			</div>			
				
				
				</div>
			</div>










			</div>
<? } ?>			