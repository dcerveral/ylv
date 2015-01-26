<? 

session_start();


include('conex.php');


					
$consulta2= "select *  from usuarios
				
			order by credito DESC, visitas DESC  limit ".$_SESSION['limit'].",1;";
	
			
					
$sql2=mysql_query($consulta2,$conex);

	
$perfil=mysql_fetch_array($sql2);

	
		echo "
					<div style=\"width: 100%; height:150px;  overflow:hidden; background-color: #59B2CE;-webkit-border-top-left-radius: 10px;
-webkit-border-top-right-radius: 10px;
-moz-border-radius-topleft: 10px;
-moz-border-radius-topright: 10px;
border-top-left-radius: 10px;
border-top-right-radius: 10px;
										 
										
										\">
								<img src='".$_SESSION['cdn']."perfil/".$perfil[0].".jpg' style='height:100%; width:100%;'  onerror=\"this.src='/fondo.jpg';\" >	
					</div>
					
					
					<div style='float: right; margin-top: 15px; margin-right: 15px;' >
					<a class='button large blue'  id='clase".$_GET['div']."'
						onclick=\"recomendar(".$perfil[0].",".$_GET['div'].");\"> <i class='icon-thumbs-up-alt'></i> <span id='boton".$_GET['div']."'>Recomendar</span></A></div>
						
						
						<div style='width: 99%; height:18px; overflow:hidden;  margin-left: 15px; margin-top: 0px; position:relative; top:-10px;'>
						<A  href='//yolovalgo.com/".$perfil['subdominio']."'  style='overflow:hidden; width:180px; font-weight: bold; color: #265B89; '>"
						.corta ($perfil['empresa_nombre'],25)."&nbsp;</A></div>
								
						<div style='font-size: 14px; height:90px; color: #424251; text-align: justify; padding: 15px;margin-top: 0px; overflow: hidden'>".corta ($perfil['empresa_texto'],250)." </div>
						
						
							<div style='float: left; margin-left: 15px;' title='".$perfil['ref']." Recomendaciones' >
						 ".$perfil['ref']." <i class='icon-thumbs-up-alt'></i>  
						</div>
						
						
						<div style='float: right; margin-right: 15px;' >
						<a onclick=\"llamarasincrono('/ajax-recomendar-otro.php?div=' + ".$_GET['div']."  , ".$_GET['div'].");\" style='color: #FF9999;; font-size: 10px;'> <i class='icon-thumbs-down-alt'></i> Omitir</A></div>
			</div>
							";
							
							
							
			
		
	$_SESSION['limit']++;

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