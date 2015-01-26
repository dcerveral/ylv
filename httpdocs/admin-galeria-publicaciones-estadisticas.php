<div class='pestanaoff'>
<a href='/panel/galeria/publicaciones/editar/'>Edita y Publica</A>
</div>

<div class='pestanaoff'>
<a href='/panel/galeria/publicaciones/promocionar/'>Promocionar Publicaciones</A>
</div>




<div class='pestanaoff'>
<a href='/panel/galeria/publicaciones'>Listado de publicaciones</A>
</div>

<div class='pestana'>
<a href='/panel/galeria/publicaciones/estadisticas/'>Estad&iacute;sticas de publicaciones</A>
</div>

<div style='clear:both;'></div>




<div class="divContenedor">
		<div style='width:45%; float: left;'>
			<input id="check1" type="checkbox" checked />
			<label for="check1"> <i class="fa fa-bar-chart"></i> Estad&iacute;sticas de su perfil </label>
			<div class="texto">

			<table class='tabla' style='width: 100%; padding: 10px;'>
			<tr style='display: none;' ><td></td><td></td></tr>
			<tr onclick="document.getElementById('resultado').innerHTML='Muestra la fecha que usted creo su perfil.';">

			<td>Perfil activo desde</tD><td style='text-align:right'><? 
			
						$date = date_create($campo['creada']);
						echo date_format($date, 'd-m-Y'); ?>
			</td><td>  <a><i class="fa fa-info-circle"></i></A> </td></tr>
			
			
			
			
			<tr  onclick="document.getElementById('resultado').innerHTML='Indica el número de veces que ha sido visitado su  perfil.';">
			<td>Visitas a mi galer&iacute;a</tD><td style='text-align:right'>
				<? 	echo $campo['visitas'];  ?></td><td>  <a><i class="fa fa-info-circle"></i></A>  </td></tr>
			
			<tr  onclick="document.getElementById('resultado').innerHTML='Indica el número de veces que se ha sido visitado su web (o la url que usted indico) desde yolovalgo.com.';">
			<td>Clics a mi web</tD><td style='text-align:right'>
				<? 	echo $campo['clicks'];  ?></td><td> <a><i class="fa fa-info-circle"></i></A> </td></tr>
				
				
			<tr onclick="llamarasincrono ('/ajax-recomendar-recibidas.php', 'resultado');">
			
			<td>Recomendaciones en mi galer&iacute;a</tD><td style='text-align:right'>
				<? 	
				
				$consulta="SELECT count(id) FROM `seguidores` WHERE `perfil`=".$campo[0]." and `noticia`=0";
				$sql=mysql_query($consulta,$conex);
				$recomendar=mysql_fetch_array($sql);
				echo $recomendar[0];
				?></td><td> <a><i class='fa fa-external-link'></i></a></td></tr>	
			
			
			
			
			
			
			
			
			
			
			<? 	
				
				$consulta2="SELECT id,titulo FROM `noticias` WHERE `usuario`=".$campo[0]." and `activo`=1 and date>'".date('Y-m')."-01' order by ref DESC, id DESC limit 1";
				$sql=mysql_query($consulta2,$conex);
				$recomendar=mysql_fetch_array($sql);
				
				?>
			<tr onclick="llamarasincrono ('/ajax-publicaciones-ver.php?id=<? echo $recomendar[0]; ?>' , 'resultado');"
			
			><td>
				Publicaci&oacute;n mensual m&aacute;s recomendada
				</td><td style='text-align:right'>
				<? 	
				echo corta($recomendar[1],20);
				echo "</td><td> <a><i class='fa fa-external-link'></a></i>";
				?>
				</td></tr>


			<tr  onclick="llamarasincrono ('/ajax-noticias.php?tipo=mes' , 'resultado');"><td>
				Publicaciones  este mes
				</td><td style='text-align:right'>
				<? 	
				
				$consulta="SELECT count(id) FROM `noticias` WHERE `usuario`=".$campo[0]." and activo='1' and destacado=0 and fecha>'".date('Y')."-".date('m')."-01'; ";
				$sql=mysql_query($consulta,$conex);
				$recomendar=mysql_fetch_array($sql);
				echo $recomendar[0];
				?></td>
				<td>  <a><i class='fa fa-external-link'></i></a> </td></tr>










			<!-- -->
			
				
				
			</table>
			
			</div>
	
				
	
	
	<div style='width:100%; margin-top:10px;'>
			<input id="check2" type="checkbox" checked />
			<label for="check2"> <i class="fa fa-area-chart"></i> Estad&iacute;sticas de promociones publicadas. </label>
			<div class="texto">

			<table class='tabla' style='width: 100%; padding: 10px;'>
			<tr style='display: none;'><td></td><td></td></tr>
			
				<tr  onclick="llamarasincrono ('/ajax-noticias.php?tipo=promohoy' , 'resultado');"><td>
				Promociones realizadas hoy 
				</td><td style='text-align:right'>
				<? 	
				
				$consulta="SELECT count(id) FROM `noticias` WHERE `usuario`=".$campo[0]." and destacado='1' and fecha='".date('Y-m-d')."'; ";
				$sql=mysql_query($consulta,$conex);
				$recomendar=mysql_fetch_array($sql);
				echo $recomendar[0];
				?>
				</td><td style='width:20px;'>  <a><i class='fa fa-external-link'></i></a> </td></tr>
				
				
			
				<tr  onclick="llamarasincrono ('/ajax-noticias.php?tipo=promomes' , 'resultado');"><td>
				Promociones realizadas este mes 
				</td><td style='text-align:right'>
				<? 	
				 
				$consulta="SELECT count(id) FROM `noticias` WHERE `usuario`=".$campo[0]." and destacado='1' and fecha>'".date('Y-m')."-1'; ";
				$sql=mysql_query($consulta,$conex);
				$recomendar=mysql_fetch_array($sql);
				echo $recomendar[0];
				?>
				</td><td>  <a><i class='fa fa-external-link'></i></a> </td></tr>
				
				<tr   onclick="llamarasincrono ('/ajax-noticias.php?tipo=clic' , 'resultado');"><td>
				Clics a mi web por promoci&oacute;n. 
				</td><td style='text-align:right'>
				<? 	
				 
				$consulta="SELECT count(id) FROM `noticias` WHERE `usuario`=".$campo[0]." and destacado='1' and clic>'0'; ";
				$sql=mysql_query($consulta,$conex);
				$recomendar=mysql_fetch_array($sql);
				echo $recomendar[0];
				?>
				</td><td>  <a><i class='fa fa-external-link'></i></a> </td></tr>
				
				
				
			</table>
			
			</div>	</div>






		<div style='width:100%; margin-top:10px;'>
			<input id="check4" type="checkbox" checked />
			<label for="check4"> <i class="fa fa-pie-chart"></i> Publicaciones Totales </label>
			<div class="texto">

			<table class='tabla' style='width: 100%; padding: 10px;'>
			<tr style='display: none;'><td></td><td></td></tr>
			
				<?
				
				for ($year=date('Y')-2;$year<=date('Y');$year++){
				
					$consulta="SELECT count(id) FROM `noticias` WHERE `usuario`=".$campo[0]." and fecha>='$year-01-01' and fecha<='$year-12-31' ; ";
					$sql=mysql_query($consulta,$conex);
					$recomendar=mysql_fetch_array($sql);
				echo "<tr onclick=\"llamarasincrono ('/ajax-noticias.php?tipo=anno&anno=".$year."' , 'resultado');\"><td>Publicaciones en ".
					$year.
					"</td><td style='text-align:right'>";
					
				 
				;
				echo $recomendar[0];
				
				echo "</td><td style='width: 20px;'>  <a><i class='fa fa-external-link'></i></a> </td></tr>";
				
				
				}
				
				
				
				?>
				
				
			</table>
			
			</div>	</div>
















			</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

		<div  style='width:54%; float: right;'>
			<input id="check3" type="checkbox" checked />
			<label for="check3"> <i class="fa fa-line-chart"></i> Resultados</label>
			<div class="texto" id='resultado' style=' padding: 10px; max-height:585px; overflow:auto; '>

			
				Pulse sobre estad&iacute;stica sobre la que quieres ampliar informaci&oacute;n.
				
						</div>	</div>
		
		
</div>
