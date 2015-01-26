<div class='pestanaoff'>
<a href='/panel/galeria/publicaciones/editar/'>Edita y Publica</A>
</div>

<div class='pestanaoff'>
<a href='/panel/galeria/publicaciones/promocionar/'>Promocionar Publicaciones</A>
</div>




<div class='pestana'>
<a href='/panel/galeria/publicaciones'>Listado de publicaciones</A>
</div>

<div class='pestanaoff'>
<a href='/panel/galeria/publicaciones/estadisticas/'>Estad&iacute;sticas de publicaciones</A>
</div>

<div style='clear:both;'></div>

<div class='blanc2' style='margin-top: 0px;margin-bottom: 5px;overflow: hidden; border-top: 0px;'>
<div style='padding: 20px;'>







<div class="divContenedor">
		<div style='float: left;  width:32%; padding:0px;'>
			<input id="check1" type="checkbox" checked />
			<label for="check1"> <i class="fa fa-list"></i> Listado Publicaciones</label>
			<div class="texto">
				
				<div style='width:100%; height:350px;overflow: auto; padding: 0px;'>
					<div style=' padding: 10px;'>
					<?
					$_SESSION['categoria']=$_GET['var'];
					$consulta="SELECT * FROM `noticias` WHERE `usuario` = ".$_SESSION['idusuario']."  AND `destacado` < 2 AND `activo` = 1 and (titulo like '%".$_GET['var']."%' OR cuerpo like '%".$_GET['var']."%')  ORDER BY fecha DESC LIMIT 100";
					$sql=mysql_query($consulta,$conex);

					$a=0;
					while ($not=mysql_fetch_array($sql)){

						if ($a==0) {echo "<script>llamarasincrono ('/ajax-publicaciones-ver.php?id=".$not[0]."' , 'publicacion');</script>";}
							$a++;
						$foto=$not["foto"];$IMG="Imagen";
						
						
						if (!$foto){$foto="https://yolovalgo.es/perfil/0.png";$IMG="Solo ";}
						
						
						
						
						//VIDEO yiutuve
						if (strpos($foto, "youtube")){
							$youtube=str_replace("https://www.youtube.com/watch?v=", "", $foto);
							$foto="https://img.youtube.com/vi/".$youtube."/0.jpg";
							$IMG="Video y";
						
						}
						
						//VIDEO vimeo
						if (strpos($foto, "vimeo")){
							
							$foto =  str_replace("https://", "http://", $foto);
							$imgid = str_replace("http://vimeo.com/", "", $foto);
								
							//$imgid=112491820;
							$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
							$foto=$hash[0]['thumbnail_medium'];  
							$IMG="Video y";
							
						}
						
						//VIDEO DAILYMOTION
							if (strpos($foto, "dailymotion")){
								$foto=str_replace("dailymotion.com/video/", "dailymotion.com/thumbnail/video/", $foto);
								$IMG="Video y";
							}
											
											
						$tipo=$IMG." texto.";		
		
						if ($not['destacado']==1) {$tipo.=" Promocionada.";} 
						
						
						
						//RECOMENDACIONES RECIBIDAS
						$consultan="select count(*) from seguidores where noticia=".$not[0].";";
								$sqls=mysql_query($consultan,$conex);
								$seguir=mysql_fetch_array($sqls);
						
						
						
							echo "<div style='clear:both; width:100%;  id='borra".$not[0]."' margin-top:5px; ' onclick=\"llamarasincrono ('/ajax-publicaciones-ver.php?id=".$not[0]."&rec=".$seguir[0]."' , 'publicacion');
		;\">";	
							echo "<div style='float:left; width:30%;height:60px; background-color: #F1F1F1; border:1px solid #E8E8E8	; text-align:center; vertical-align: center;'><img src='$foto' style='max-width:100%;max-height:100%; '></div>";
						
						
						
						
								
						
						
							echo "<div  style='float:left; margin-left:5px; color: #0074A2; width:65%;'> 
										<div  style='color: #0074A2; margin-top: 1px;'>".$not['titulo']." </div>
										
										
										<a style='float:right; margin-top: 5px; font-size:12px;' title='Ver Publicaci&oacute;n'><i class='fa fa-folder-open-o' ></i></a>
										
										
										<div style='color: #9E9E9E; margin-top: 5px; font-size:10px;'>$tipo </div>
										
								";
							
							
							
								
								echo "<div style='font-size: 10px; margin-top: 5px; '>".number_format($seguir[0]);
									if($seguir[0]==1){echo " Recomendaci&oacute;n ";}else{echo " Recomendaciones ";}
								echo " | ".$not['visitas']." Visitas 
									
								</div>
							</div>";
							
							
							
							
							echo "</div><div style='clear:both; border-top: 1px dotted #eeeeee;'></div>";
				
					}
					?>
					</div>
				</div>
			</div>
			
			
			
			
			<div style='float: left;  width:100%; margin-top: 5px; padding:0px;'>
			<input id="check3" type="checkbox"  />
			<label for="check3"> <i class="fa fa-search"></i> Buscar Publicaciones</label>
			<div class="texto">
				
				<div style='width:100%; height: auto;  padding: 0px;'>
					<div style=' padding: 10px;'>
		
		
		
							<form action='/admin.php'>

							<input type='hidden' name='pestana' value='galeria'>

							<input type='hidden' name='submenu' value='publicaciones'>

							<input type='hidden' name='get' value='ver'>

							<input type='search' name='var' style='width:180px' placeholder='Buscar Publicaci&oacute;n' required>
							<button type='submit' class='button large blue' value='Buscar' style='width:110px'><i class='fa fa-search'></i> Buscar </button></form>
							

		
		
		
		
		
		
		
		
						</div>
				</div>
			</div>
		</div>
			
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		<div style='float: right;  width:66%; padding:0px;'>
			<input  id="check2" type="checkbox" checked />
			<label for="check2"> <i class="fa fa-newspaper-o"></i> Publicaci&oacute;n</label>
			<div class="texto">
				
				<div style='width:100%; height: auto ;  padding: 0px;'>
					<div style=' padding: 10px;' id='publicacion'>
					Seleccione una Noticia para visualizarla aqu&iacute;. Tambi&eacute;n puede 
					<a href='/panel/galeria/publicaciones/editar/'>crear una nueva publicaci&oacute;n</A>.
				</div>
			</div>
		</div>
		
		
		
		
		
</div>








</div>
</div>