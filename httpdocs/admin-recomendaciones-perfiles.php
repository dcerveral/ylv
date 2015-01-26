<div class='pestana'>
<a href='/panel/recomendaciones/perfiles'> Recomendar Galer&iacute;as</A>
</div>

<div class='pestanaoff'>
<a href='/panel/recomendaciones/recibidas'>Recomendaciones Recibidas</A>
</div>

<div class='pestanaoff'>
<a href='/panel/recomendaciones/realizadas'>Galer&iacute;as Recomendadas</A>
</div>

<div class='pestanaoff'>
<a href='/panel/recomendaciones/realizadas-pub'>Recomendaciones Realizadas</A>
</div>

<div class='blanc' style='clear:both; border-top: 0px;'>
<div style='padding: 10px;'>
	Te recomendamos las siguientes galer&iacute;as para que t&uacute; las recomiendes. 
	<p>
	Si no te gusta alguna, pulsa en omitir o en Descubrir Galer&iacute;as.
	
	 <a  class='button large green' style='float:right;' onclick="llamarasincrono('/ajax-recomendar-otro.php?div=1','1');
					llamarasincrono('/ajax-recomendar-otro.php?div=2','2');
					llamarasincrono('/ajax-recomendar-otro.php?div=3','3');
					llamarasincrono('/ajax-recomendar-otro.php?div=4','4');
					llamarasincrono('/ajax-recomendar-otro.php?div=5','5');
					llamarasincrono('/ajax-recomendar-otro.php?div=6','6');
					llamarasincrono('/ajax-recomendar-otro.php?div=7','7');
					llamarasincrono('/ajax-recomendar-otro.php?div=8','8');
					llamarasincrono('/ajax-recomendar-otro.php?div=9','9');">Ver Otras  galer&iacute;as</A>
</div>
</div>

<div    style='width: 100%; margin-top: 10px;'>



<? 


					
					
		//Recomendaciones realizadas
		/* 
		$consulta= "select COUNT(id)
						FROM seguidores
						WHERE usuario='".$_SESSION['idusuario']."' ";

		$sql=mysql_query($consulta,$conex);
		$recomendados=mysql_fetch_array($sql);
		*/
		
			
				




if (!$_SESSION['limit']) {$_SESSION['limit']=0;}



					
$consulta= "select *  from usuarios
				
			order by credito DESC,  ref DESC, visitas DESC  limit ".$_SESSION['limit'].",9;";
	
		
					
$sql=mysql_query($consulta,$conex);

		$div=0;
	while($perfil=mysql_fetch_array($sql)){

		$div++;
		
		echo "<div class='blanc' id='".$div."' style='float: right; width: 32%; height:345px; margin: 5px;-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
				border-radius: 10px;'>";
		
		
		
			
		echo "
					<div style=\"width: 100%; height:150px;  overflow:hidden; 
										 
										
										\">
								<img src='".$_SESSION['cdn']."perfil/".$perfil[0].".jpg' style='height:100%; width:100%;
								-webkit-border-top-left-radius: 10px;
								-webkit-border-top-right-radius: 10px;
								-moz-border-radius-topleft: 10px;
								-moz-border-radius-topright: 10px;
								border-top-left-radius: 10px;
								border-top-right-radius: 10px;' onerror=\"this.src='/fondo.jpg';\">	
					</div>
					
					
					<div onclick=\"recomendar(".$perfil[0].",".$div.");\" style='float: right; margin-top: 15px; margin-right: 15px;' >
					<a class='button large blue' id='clase$div'
						> <i class='icon-thumbs-up-alt'></i> <span id='boton$div'>Recomendar</span></A></div>
						
						
						<div style='width: 99%; height:18px; overflow:hidden;  margin-left: 15px; margin-top: 0px; position:relative; top:-10px;'>
						<A  href='//yolovalgo.com/".$perfil['subdominio']."'  style='overflow:hidden; width:180px; font-weight: bold; color: #265B89; '>"
						.corta ($perfil['empresa_nombre'],25)."&nbsp;</A></div>
								
						<div style='font-size: 14px; height:90px; color: #424251; text-align: justify; padding: 15px;margin-top: 0px; overflow: hidden'>".corta ($perfil['empresa_texto'],250)." </div>
						
						
						
						<div style='float: left; margin-left: 15px;' title='".$perfil['ref']." Recomendaciones' >
						<i class='fa fa-thumbs-o-up'></i> ".$perfil['ref']." Recomendaciones
						</div>
						
						<div style='float: right; margin-right: 15px;'  >
						<a onclick=\"llamarasincrono('/ajax-recomendar-otro.php?div=' + ".$div."  , ".$div.");\" style='color: #FF9999;; font-size: 10px;'>  Omitir <i class='icon-thumbs-down-alt'></i> </A></div>
			</div>
							";
		
	}

$_SESSION['limit']=$_SESSION['limit']+9;

	//llamarasincrono('/ajax-recomendar-otro.php?div=' + div  , div);
?>





</div>



<script>

function nada(){}
function recomendar(perfil,div){
	llamarasincrono('/seguir.php?id=<? echo $_SESSION['idusuario']; ?>&perfil=' + perfil  , 'oculto');
	document.getElementById('boton' + div).innerHTML='Recomendada';
	document.getElementById('clase' + div).className='button large green';
	
	
	
}
</script>



