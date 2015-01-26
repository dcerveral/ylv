<? session_start(); 

include('conex.php');
INCLUDE ('funciones.php');

?>


<!DOCTYPE html>

<html lang="es" xmlns="http://www.w3.org/1999/html" style="">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta content="index, follow" name="robots">
<meta name="robots" content="all">

<link rel="stylesheet" type="text/css" media="all" href="/css.css" />

<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script-->




<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/dark-hive/jquery-ui.css">


	<link rel="stylesheet" href="/pops.css">
	<script>!window.jQuery && document.write(unescape('%3Cscript src="jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
	<script type="text/javascript" src="/pop.js"></script>

	
<script type="text/javascript" src="http://yolovalgo.com/css/jQuery/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="https://yolovalgo.com/css/jQuery/sexyalertbox.v1.2.jquery.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="https://yolovalgo.com/css/jQuery/sexyalertbox.css" />


<script>
window.addEvent('domready', function() {
    Sexy = new SexyAlertBox();
});
</script>

<script> 
					//LEER JAVASCRIPT
					
					var tagScript = '(?:<script.*?>)((\n|\r|.)*?)(?:<\/script>)';
/**
* Eval script fragment
* @return String
*/
String.prototype.evalScript = function()
{
        return (this.match(new RegExp(tagScript, 'img')) || []).evalScript();
};
/**
* strip script fragment
* @return String
*/
String.prototype.stripScript = function()
{
        return this.replace(new RegExp(tagScript, 'img'), '');
};
/**
* extract script fragment
* @return String
*/
String.prototype.extractScript = function()
{
        var matchAll = new RegExp(tagScript, 'img');
        return (this.match(matchAll) || []);
};
/**
* Eval scripts
* @return String
*/
Array.prototype.evalScript = function(extracted)
{
                var s=this.map(function(sr){
                var sc=(sr.match(new RegExp(tagScript, 'im')) || ['', ''])[1];
                if(window.execScript){
                window.execScript(sc);
                }
                else
                {
                 window.setTimeout(sc,0);
                }
                });
                return true;
};
/**
* Map array elements
* @param {Function} fun
* @return Function
*/
Array.prototype.map = function(fun)
{
        if(typeof fun!=="function"){return false;}
        var i = 0, l = this.length;
        for(i=0;i<l;i++)
        {
                fun(this[i]);
        }
        return true;
};


			// Esta funcion cargara las paginas
			function llamarasincrono (url, id_contenedor)
			{
			
				
				var pagina_requerida = false;
				if (window.XMLHttpRequest)
				{
					// Si es Mozilla, Safari etc
					pagina_requerida = new XMLHttpRequest ();
					
				} else if (window.ActiveXObject)
				{
					// pero si es IE
					try 
					{
						pagina_requerida = new ActiveXObject ("Msxml2.XMLHTTP");
					}
					catch (e)
					{
						// en caso que sea una version antigua
						try
						{
							pagina_requerida = new ActiveXObject ("Microsoft.XMLHTTP");
						}
						catch (e)
						{
						}
					}
				} 
				else
				
				return false;
				pagina_requerida.onreadystatechange = function ()
				{
					// funcion de respuesta
					cargarpagina (pagina_requerida, id_contenedor);
				}
				pagina_requerida.open ('GET', url, true); // asignamos los metodos open y send
				pagina_requerida.send (null);
				
			}
			// todo es correcto y ha llegado el momento de poner la informacion requerida
			// en su sitio en la pagina xhtml
			function cargarpagina (pagina_requerida, id_contenedor)
			{
				if (pagina_requerida.readyState == 4 && (pagina_requerida.status == 200 || window.location.href.indexOf ("http") == - 1))
				
										var scs=pagina_requerida.responseText.extractScript();
				
					document.getElementById (id_contenedor).innerHTML = pagina_requerida.responseText.stripScript();
										scs.evalScript(); 
				
				
				
			}
				
				
				
				
				</script>
				

				
<script>

function modal(php,w,h){

document.getElementById('modal').style.display='inline';
llamarasincrono( php  , 'Mcontenido');


if (w) {	
			w2= (w/2)*(-1);
			w2= w2 + 'px';
			w=w + 'px'; 
			
			document.getElementById('modalcontenido').style.width= w;
			document.getElementById('modalcontenido').style.marginLeft= w2;
			
			}

if (h) {	
			h2= (h/2)*(-1);
			h2= h2 + 'px';
			h=h + 'px'; 
			
			document.getElementById('modalcontenido').style.height= h;
			document.getElementById('modalcontenido').style.marginTop= h2;
			
			}

}



</script>




				
</head>
<body onload="<?if ($error) {?>Sexy.<?PHP if ($tipoerror) {echo $tipoerror;} else {echo "alert";}; ?>('<?php echo $error; ?>');<?PHP } ?>">




		<div id='modal' style='display: none;'>
			<div  class='modal' style=' position: fixed; z-index: 999; top:0px; left:0px; width:100%; height:100%; background-color: #000000; opacity: 0.2;'>
			</div>
			<div  id='modalcontenido' style=' display:block;  z-index: 1000;
					width:600px; 
					height:400px; 
					position:absolute; 
					top:50%; 
					left:50%; 
					margin-top:-200px; 
					margin-left:-300px;
					background-color: white;-webkit-border-radius: 10px;
					-moz-border-radius: 10px;
					border-radius: 10px;padding: 20px;-webkit-box-shadow: 10px 10px 69px 30px rgba(0,0,0,0.75);
				-moz-box-shadow: 10px 10px 69px 30px rgba(0,0,0,0.75);
				box-shadow: 10px 10px 69px 30px rgba(0,0,0,0.75);'>
			
				<div style='position: absolute; top: 2px; right: 0px;'><a onclick="document.getElementById('modal').style.display='none';"><img src='http://yolovalgo.es/img/x.png'></A></div>
			
				<div id='Mcontenido'></div>
			
			
				</div>
		</div>

		

	<div class='cabecera' <? if ($_SESSION['soloweb']) {echo "style='visibility:hidden; height: 10px;'";} ?>>
		<div style='float: left; margin:10px;'>
			<a href='http://yolovalgo.com/'>
			<span style='position:relative;  left: 20px; font-size: 16px; top:3px; font-family: Helvetica; font-weight: bold;' class='notraslate'>Yolovalgo<span style='color: #0084B4'>.com</span>
			<span style='font-size: 14px; font-face: Arial;'>
			
			<div style=' font-size: 9px;'>Red Social Noticias</div>
			</a>
		</div>
		<div style='float: left: '>
		<form action='/buscar.php'>
		
		
		<? $t="empresas"; 
		
		
		
		switch ($_GET["pestana"]){
		
			case "publicaciones" : $t="noticias"; break;
			case "publicacion" : $t="noticias"; break;
			case "productos" : $t="shopping"; break;
			case "producto" : $t="shopping"; break;
		
		}
	 
		?>
		
		
		
		<input type='hidden' name='t' value='<? echo $t; ?>'>
		<input type='hidden' name='pais' value='<? echo $_SESSION['paise']; ?>'>
		<input type='search' name='q' class='input' value='<? echo $_GET['q']; ?>' style='width:30%' x-webkit-speech>
		<input type='submit' class='bbuscar' value='Buscar'>
		</form>
		</div>
		
		<div style='position: absolute; top: 20px; right:30px; z-index:1'>
			<? IF (!$_SESSION['idusuario']) { ?>
			
			<a href="http://nownearyou.com/login" class='button large blue' style='background-color: #0040FF;' onclick="llamarasincrono('/iniciarsesion.php', 'usuario');document.getElementById('usuario').style.display='block';" 
				>
								Iniciar Sesi&oacute;n</A>
			<a href="http://nownearyou.com/sign"
				class='button large yellow'		 style='background-color: #000000;' >					 
			Crear Cuenta</A>
			
			<? } else { ?>
			<a href="/panel/perfil/editar" 
				class='small button green'			 >					 
			Publicar</A>
			
			<a href="/logout" 
				class='small button pink'			 >					 
			Cerrar Sesi&oacute;n </A>
			<? } ?>
			
			
		</div>
		
	</div>
	
	
	<div class='cuerpo'>
	
	
	<div class='partederecha' <? if ($_SESSION['soloweb']) {echo "style='margin-top: 10px;'";} ?>>
		<? 
	
		if (!$_GET['centro']) {$_GET['centro']="perfil";}
		
			echo "<div>";
			include ($_GET['centro'].'.php'); ?>
			</div>
		
				
		</div>
		
		
		<? if ( $campo['contrato'] > date('Y-m-d')) {


				//LATERAL derecho  PREMIUM

					$consulta="select imagen,link from lateral where posicion<2 and imagen!='' and link!='' and usuario=".$campo['id']." order by posicion ASC limit 4;";
					$sql2=mysql_query($consulta,$conex);
					
					
					while($lateral=mysql_fetch_array($sql2)){ 
					
					
							echo "<div id='contiene'>
							<div id='contiene-derecha' style='float: left; width:180px; margin-top: 70px; margin-left: 20px;'>
							<div class='blanc' style='padding:5px; '>";
						
								echo "<a href='/go/".$campo[0]."/".$lateral[1]."'>
								<img src='".$lateral[0]."' style='width:100%;'></A>";
							echo "</div></div> </div>";

					}	



		}else{ ?>
			<div class='menuizq'>
				<? include ('menu.php'); ?>
			</div>
		<? } ?>
	
	
	
		
	</div>
	
	
		
	
	
	
	
	
	
</div>

<div id='oculto'></div>



	



</body>
</html>
	