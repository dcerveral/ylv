<div class='pestana'>
<a href='/panel/galeria/publicaciones/editar/'>Edita y Publica</A>
</div>

<div class='pestanaoff'>
<a href='/panel/galeria/publicaciones/promocionar/'>Promocionar Publicaciones</A>
</div>




<div class='pestanaoff'>
<a href='/panel/galeria/publicaciones'>Listado de publicaciones</A>
</div>

<div class='pestanaoff'>
<a href='/panel/galeria/publicaciones/estadisticas/'>Estad&iacute;sticas de publicaciones</A>
</div>

<div style='clear:both;'></div>

<div class='blanc2' style='margin-top: 0px;margin-bottom: 5px;overflow: hidden; border-top: 0px;'>
<div style='padding: 10px;'>

<?

$consulta="Select * from noticias where usuario='".$_SESSION['idusuario']."' and id='".$_GET['var']."'; ";
$sql=mysql_query($consulta,$conex);
$not=mysql_fetch_array($sql);	
$_SESSION['idproducto']=$not[0];



echo "<div ><form method='POST' action='/panel/galeria/publicaciones/ver/'>";




	$tipo="Texto e Imagen";		
					
	if ($not["foto"]) {$foto=$not["foto"];
	
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
		
		
		
		
		
		
		
		
		
		
	
				if (!$not['cuerpo']){$tipo="Solo Imagen";}} 
				
	else {$foto="https:///yolovalgo.es/perfil/".$not["usuario"].".png";$tipo="Solo Texto";}	
	if (!$not["link"]){$not['link']="https://yolovalgo.com/".$_SESSION['subdominio']."/articulo/".$not['producto']."/".$not[0];}			
				
				
	
	$categoria=$not['lugar'];
		if (!$categoria) {$categoria=$campo['familia']."/".$campo['categoria'];}
		
			echo "<!--form method='POST' action='/panel/galeria/servicios/publicaciones'-->

				<input type='hidden' name='idnoticia' value='".$not[0]."'>
				<input type='hidden' name='destacado' value='0'>
				<input type='hidden' name='editar' value='noticia'>
				<input type='hidden' name='categoria' value='".$categoria."'>
				";	
				
	
?>
<div class="divContenedor">
		<div style='width:45%; float: left;'>
			<input id="check1" type="checkbox" checked />
			<label for="check1"> <i class="fa fa-video-camera"></i> Imagen o Video</label>
			<div class="texto">

				<?
				echo " 
					<div id='imagen' style='float: left; width:100%; '>	
						
						<div id='cargados' style='background-color: white; width:98%; padding: 5px; text-align: center; float:left' >
							<img id='banner' src='".$foto."' style='max-width:100%; max-height: 300px; '> 
								
							<div>
								<input id='archivosbanner' type='file' name='archivos[]' multiple='multiple' onchange='modbanner();'  style='display: none; ' />
								<input type='url' id='campoimg' style='width:400px;display: none;' name='fotonoticia' value='".$not['foto']."' class='azul' >
							</div>
						</div>
						
						
						
						
					</div>	</div>";
					
					
					
					echo "<div style='position:relative; top: -10px;'><p>
							<center>
							 <a onclick=\"document.getElementById('archivosbanner').click()\" > <i class='fa fa-file-image-o'> </i> Editar Imagen</A>
							 &nbsp;  &nbsp;  &nbsp;  &nbsp; 
							<a onclick=\"video('$ficha');\"> <i class='fa fa-file-video-o'> </i> Editar Video</A>
							</center>
						</div>	</div>";
	?>
			
	

		
		<div  style='width:54%; float: right;'>
			<input id="check2" type="checkbox" checked />
			<label for="check2"> <i class="fa fa-file-text"></i> Texto
			<!--button type='submit'  style='color: white; background-color: transparent; float: right; width:150px;' value='Guardar'>
	<i class='fa fa-cloud-upload'></i> Publicar 
	</button--></label>
			<div class="texto" style='padding: 20px;'>
				<?
					echo "<div style='width:95%;  '>
					
					Titulo de la publicaci&oacute;n<br>
					<input type='text' name='titulo'    value='".$not['titulo']."' 
								placeholder='Titulo Publicaci&oacute;n'  style='width:400px;' required>
					
					<p>
					Texto de la publicaci&oacute;n<br>
					<textarea name='cuerpo' id='campodes'   placeholder='Inserte el texto de la publicaci&oacute;n'  style='width:400px;height:200px;'>".$not['cuerpo']."</textarea >
					
					</a></div>
					
					
	<button class='button large blue' style='float: right; width:120px;; ;cursor:hand; cursor:pointer; '> <i class='fa fa fa-cloud-upload'></i> Publicar</button>
	
					</form>
					";
				?>
			</div>
		</div>	
		
		
</div>
	
				
				


<script>
function modbanner(){ 

document.getElementById('banner').src='/loading.gif';
$("#subido").remove();
var archivos = document.getElementById("archivosbanner");//Damos el valor del input tipo file
var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo

/* Creamos el objeto que hara la petición AJAX al servidor, debemos de validar 
si existe el objeto “ XMLHttpRequest” ya que en internet explorer viejito no esta,
y si no esta usamos “ActiveXObject” */ 

 if(window.XMLHttpRequest) { 
 var Req = new XMLHttpRequest(); 
 }else if(window.ActiveXObject) { 
 var Req = new ActiveXObject("Microsoft.XMLHTTP"); 
 }

//El objeto FormData nos permite crear un formulario pasandole clave/valor para poder enviarlo, 
//este tipo de objeto ya tiene la propiedad multipart/form-data para poder subir archivos
var data = new FormData();

//Como no sabemos cuantos archivos subira el usuario, iteramos la variable y al
//objeto de FormData con el metodo "append" le pasamos calve/valor, usamos el indice "i" para
//que no se repita, si no lo usamos solo tendra el valor de la ultima iteración
for(i=0; i<archivo.length; i++){
   data.append('archivo'+i,archivo[i]);
}

//Pasándole la url a la que haremos la petición
Req.open("POST", "/ajax-subir-fotoproducto.php", true);

/* Le damos un evento al request, esto quiere decir que cuando termine de hacer la petición,
se ejecutara este fragmento de código */ 

Req.onload = function(Event) {
//Validamos que el status http sea ok 
if (Req.status == 200) { 


	document.getElementById('banner').style.display='none';

	
  //Recibimos la respuesta de php
  var msg = Req.responseText;
  $("#cargados").append(msg);
} else { 
  console.log(Req.status); //Vemos que paso. 
} 
};

 //Enviamos la petición 
 Req.send(data); 

}


function video(ficha)  
					{ 
  Sexy.prompt('<h1>Insertar video externo</h1><p>Inserta la Url de tu video de Youtube o Vimeo.<p style=font-size:10px> <a href=https://support.google.com/youtube/search?q=obtener+la+url+video target=help style=font-size:10px>&iquest;Necesita ayuda?</A></p> ','https://youtube.com' ,{ onComplete: 
    function(returnvalue) {
      if(returnvalue)
      {
	  
	 
		document.getElementById('banner'+ficha).src='/loading.gif';
        
		document.getElementById('campoimg' + ficha ).value=returnvalue;
		document.getElementById('banner'+ficha).src='/video.png';
		
		llamarasincrono ('/ajax-video.php?video=' + returnvalue + '&ficha=' + ficha , 'oculto');
		 
	 }
      else
      {
        Sexy.error('<h1>Video no introducido</h1><p>El video no ha sido insertado.</p>');
      }
    } 
  });
}
 
 </script>
