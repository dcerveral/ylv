<div class='pestanaoff'>
<a href='/panel/mensajes/yolovalgo'>Mensajes @Yolovalgo</A>
</div>



<div class='pestana'>
<a href='/panel/mensajes/recibidos'>Bandeja de Entrada</A>
</div>
<div class='pestanaoff'>
<a href='/panel/mensajes/enviados'>Mensajes Enviados</A>
</div>



<div style='clear:both;'></div>
<div  class="divContenedor" style='padding: 20px;margin: 0px; border-top: 0px;'>

	
	
	
	<div style='width:45%; float: left;'>
			<input id="check1" type="checkbox" checked />
			<label for="check1">  <i class="fa fa-inbox"></i> <i class="fa fa-reply"></i> Mensajes Recibidos</label>
			<div class="texto">

				<div style='height: 300px; overflow:auto;'>		
						<table class='tabla' > 
							<tr style='display:none;'><td>Fecha</td><td>From</td><td>Asunto</td><td> </td></tr>
						<?

							$consulta="Select mail.id,mail.fecha,mail.from,mail.asunto,mail.news,usuarios.subdominio 
										from mail,usuarios 
										where  (usuarios.usuario=mail.from) and mail.from NOT LIKE 'info@yolovalgo.com'   and   `to`='".$campo['usuario']."' order by news ASC, id DESC LIMIT 100;"; 
							
							
							
							$sql=mysql_query($consulta,$conex);
								
							$a=0;
							while($msg=mysql_fetch_array($sql)){

							
								if ($a==0) {echo "<script>llamarasincrono ('/ajax-leer-msg.php?id=".$msg[0]."', 'leer');</script>";}
							
								$a++;
								echo "<tr title='".$msg['asunto']."' onclick=\"llamarasincrono ('/ajax-leer-msg.php?id=".$msg[0]."', 'leer');document.getElementById('sobre$a').className='fa fa-envelope-o';\"><td style='width:60px;'>".date("d-m-y",strtotime($msg['fecha']))."</td>
									<td>@".$msg['subdominio']."</td>
									<td >".corta($msg['asunto'],25)."</td>
								<td><a  onclick=\"llamarasincrono ('/ajax-leer-msg.php?id=".$msg[0]."', 'leer');document.getElementById('sobre$a').className='fa fa-envelope-o';\" title='Pulse para leer el mensaje.'>
									<i id='sobre$a' class='fa fa-envelope";if ($msg['news']!=0) {echo "-o";};echo "'></i></A> 
									";

						}
						
						//
						
						?>

						</table>
						
						<? if ($a==0) {echo "<div style='padding: 20px;'>No tienes mensajes recibidos.</div>";} ?>
				</div>
			</div>
	</div>	
	
	<div style='width:54%; float: right;'>
			<input id="check2" type="checkbox" checked />
			<label for="check2">  <i class="fa fa-file-text-o"></i>  Mensaje</label>
			<div class="texto" id='leer' style='padding:20px;'>

				Pulse sobre un mensaje para leerlo desde esta ventana.
				</div>
	</div>
	
	
		

</div>


