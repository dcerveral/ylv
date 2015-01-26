<? session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE);

ini_set("display_errors", 1);


INCLUDE ('funciones.php');

$consulta="select * from usuarios where id='".$_SESSION ['idusuario']."' limit 1";
$sql2=mysql_query($consulta,$conex);
$campo=mysql_fetch_array($sql2);	


$_SESSION['cliente']="Visitante";
if ($campo['empresa_activo']==1) {$_SESSION['cliente']="Free";}
if ($campo['empresa_activo']==1 and $campo['contrato']> date("Y-m-d") ) {$_SESSION['cliente']="Premium";}
if ($campo['empresa_activo']==2) {$urgente="Su perfil esta pendiente de verificaci&oacute;n";}

if ($_GET['error']) {$error=$_GET['error'];}

$class=" class='wp-first-item current' ";
?>


<!DOCTYPE html>

<html lang="es" xmlns="http://www.w3.org/1999/html" style="">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta content="index, follow" name="robots">
<meta name="robots" content="all">



<link rel="stylesheet" type="text/css" media="all" href="/css.css2" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.js">
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js">
</script>


<script type="text/javascript" src="https://yolovalgo.com/css/jQuery/sexyalertbox.v1.2.jquery.js">
</script>


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


<link href='https://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>

<style>


* {border:0px; text-decoration:none; font-family: Arial; font-size:12px;

-o-transition: all 0.3s ease-in-out;
-moz-transition: all 0.3s ease-in-out;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;

}
body {margin: 0px; background-color: #F1F1F1; min-width:1024px;}



input {border: 1px outset #E8E8E8; padding:10px; width: 95%;}input:disabled
input:disabled{background-color   : #C0A8FF;}
INPUT[type=submit] {border: 1px outset #E8E8E8;    background-color: #729FCF; color: #ffffff;}
select {border: 1px outset #E8E8E8; padding:10px; width: 100%;}
textarea {border: 1px outset #E8E8E8; padding:10px; width: 100%;}

.contenedor {width:100%; padding: 0px; }  
.cabecera {position:fixed; z-index: 2; width:100%; height:30px; background-color: #ffffff;border-bottom: 1px solid #E8E8E8;}
.cuerpo {background-color: #F1F1F1; width:100%; padding: 0px; }

.menuizq {position: fixed; z-index: 1; 
				margin-top: 60px;
				background-color: #000000; 
				border-left: 2px solid #E8E8E8;
				width: 15%; padding: 0px;
				min-width: 160px;
				
				overflow: hidden;}

.partederecha {position:relative; width: 80%; margin-top:70px;   margin-right:1%; float: right; padding: 0px; }

.blanc{background-color: #FFFFFF; border: 1px solid #E8E8E8; }
.blanc a {color: #265B89 cursor: hand; cursor: pointer;}
.blanc:hover{  border: 1px solid #D4D4D4; }

	
	
.input {border: solid #eeeeee 1px; padding: 5px 5px 6px 5px; margin-left: 80px;
	margin-top: 15px; width:400px;background-color: #F1F1F1;
	}

.h1{font-family: Arial; font-size:14px; color: #000066;}	
	
.bbuscar{ width:100px; 
	border:1px solid #25729a; -webkit-border-radius: 3px; -moz-border-radius: 3px;
	border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; 
	padding: 5px 10px 5px 10px; 
	
	text-decoration:none; display:inline-block;
	text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
	 background-color: #3093c7; background-image: -webkit-gradient(linear, left top, left bottom, from(#3093c7), to(#1c5a85));
	 background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
	 background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
	 background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
	 background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
	 background-image: linear-gradient(to bottom, #3093c7, #1c5a85);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#3093c7, endColorstr=#1c5a85);
}


.perfilmenu{float: left; color:  #000000;  text-align: center; font-size: 14px;padding: 5px; cursor:hand; cursor: pointer; border-bottom: 5px solid #ffffff;}
.perfilmenu:hover {color:  #0084B4; border-bottom: 5px solid #0084B4;}
.perfilmenuok {color:  #0084B4; border-bottom: 5px solid #0084B4;float: left;   text-align: center; font-size: 14px; text-weight: bold; padding: 5px; cursor:hand; cursor: pointer;}



.submenu{float: left; color:  #FAFBFB;width:90px; text-align: center; font-size: 14px;padding: 5px; cursor:hand; cursor: pointer; border-bottom: 5px solid #0084B4;}
.submenu a{color:  #FAFBFB; font-weight: bold;}
.submenu:hover {color:  #0084B4; border-bottom: 5px solid #31CDEF;}
.submenuok {color:  #FAFBFB; border-bottom: 5px solid #31CDEF;float: left; width:90px; text-align: center; font-size: 14px; text-weight: bold; padding: 5px; cursor:hand; cursor: pointer;}
.submenuok a{color:  #FAFBFB; font-weight: bold;}

.tit{font-size:16px; font-weight:bold; padding:1px;}

#columna {
    -moz-column-count: 3;
    -moz-column-gap: 10px;
    -moz-column-fill: auto;
    -webkit-column-count: 3;
    -webkit-column-gap: 10px;
    -webkit-column-fill: auto;
    column-count: 3;
    column-gap: 15px;
    column-fill: auto;
}
 
.caja {
    -moz-column-break-inside: avoid;
    -webkit-column-break-inside: avoid;
    column-break-inside: avoid;
    display: inline-block;
    margin: 0 2px 15px;
    padding: 10px;
    border: 2px solid #FAFAFA;
    box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
    background: #FEFEFE;
    background-image: linear-gradient(45deg, #FFF, #F9F9F9);
	width: 90%
}

.recomendado{padding: 5px; width:100%; border-top: 1px solid #EBEBEB; background-color: #FAFBFB; color:#A599B8;}

.table {display: table; }
.tr { display: table-row; 	}
.td { display: table-cell;	}


.anuncio{background-color: #FFDB29; color: white; font-size:12px;left-padding: 5px;right-padding: 5px;   text-align:center }
.anuncio a{background-color: #FFDB29; color: white; font-size:12px;}


.menu {padding-left: 8px;padding-right: 8px;padding-top: 5px;padding-bottom: 5px; margin-left: 10px; margin-right: 10px; cursor: hand; cursor: pointer;}
.menu:hover {background-color: #167AC6; color: white; }
.menu:hover a { color: white; font-weight: bold; }







.button, .button:visited { /* botones genéricos */
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
text-align:center;
background: #222 
display: inline-block;
padding: 5px ;
font-family: Arial;
font-size:12px;
color: #FFF;
text-decoration: none;



border: 0px solid rgba(0,0,0,0.1);
position: relative;
cursor:pointer
}
.button:hover { /* el efecto hover */
background-color: #111
color: #FFF;
}
.button:active{  /* el efecto click */
top: 1px;
}


.small.button, .small.button:visited {
font-size: 9px ;
}

.button, .button:visited,.medium.button, .medium.button:visited {
font-size: 13px;
font-weight: bold;
line-height: 1;
color: white;
   
}


.large.button, .large.button:visited {
font-size:14px;
padding: 8px 14px 9px;
}

.super.button, .super.button:visited {
font-size: 34px;
padding: 8px 14px 9px;
}

.pink.button { background-color: #E22092; }
.pink.button:hover{ background-color: #C81E82; }

.green.button, .green.button:visited { background-color: #459B45; }
.green.button:hover{ background-color: #59B459; }

.red.button, .red.button:visited { background-color: #C3302C; }
.red.button:hover{ background-color: #D64E4A; }

.orange.button, .orange.button:visited { background-color: #EB9418; }
.orange.button:hover{ background-color: #EFAA47; }

.blue.button, .blue.button:visited { background-color: #265B89; }
.blue.button:hover{ background-color: #3176B1; }

.yellow.button, .yellow.button:visited { background-color: #D9D900; }
.yellow.button:hover{ background-color: #FFFF00; }



*{font-size: 14px;}


.hr{width: 100%; width:100%; border-bottom: 1px solid #0C7DBD; font-weight: bold;margin-bottom:5px; margin-top:10px; color:#0C7DBD; }
.azul{float: left; color:white; background-color: #0C7DBD;width:430px;}



.menuadmin {width:180px;;; background-color: #222222;  padding:10px;border-top: 0px solid #646473;}
.menuadmin:hover { background-color: #111111;
 background-image: url("https://yolovalgo.com/icono-flecha-menu-der.png");
  background-repeat: no-repeat;
  background-position: center left;

  }
.menuadmin a { color: #E6F2FF; font-family: 'Arial',serif; font-size: 15px;;  }
.menuadmin a:hover { color: #F0F3FF;  }  

.menuadminOK {width:184px; background-color: #0074A2;;  padding:8px; color: #FFFFFF;

 background-image: url("https://yolovalgo.com/flechaazul.png");
  background-repeat: no-repeat;
  background-position: center right;
  
  }
 .menuadminOK:hover{ 
   background-image: url("https://yolovalgo.com/icono-flecha-menu-der-azul.png");
  background-repeat: no-repeat;
  background-position: center left;}
  
  
.menuadminOK a { color: #FFFFFF; font-family: 'Arial',serif; font-size: 15px;}

.submenuadmin {width:186px;;  background-color: #333333; text-align: left; padding: 7px;}
.submenuadmin:hover {background-color: #111111;  
 background-image: url("https://yolovalgo.com/icono-flecha-submenu-der.png");
  background-repeat: no-repeat;
  background-position: center left;
}
.submenuadmin a {margin-left: 10px; color: #BBBBBB;   font-family: 'Arial', serif;  font-size: 14px; }
.submenuadmin a:hover {color: #F8FEFE;  }

.submenuadminOK {width:186px;background-color: #000000; text-align: left; padding: 7px;

 background-image: url("https://yolovalgo.com/icono-flecha-submenu.png");
  background-repeat: no-repeat;
  background-position: center right;

  }
.submenuadminOK:hover {background-color: #111111;
 background-image: url("https://yolovalgo.com/icono-flecha-submenu-der.png");
  background-repeat: no-repeat;
  background-position: center left; }
.submenuadminOK a { margin-left: 10px; ; color: #FFFFFF; font-family: 'Arial', serif;  font-size: 14px; }





.menusup{float: right;   padding:12px; background-color:#000000; color: #AED7FF;
background-image: url("https://yolovalgo.com/1pixel.png");
  background-repeat: no-repeat;
  background-position: left bottom;
  }

.menusup:hover{float: right;   padding:12px; background-color:#000000; color: #ffffff;

background-image: url("https://yolovalgo.com/icono-flecha-bajo.png");
  background-repeat: no-repeat;
  background-position: center bottom;
  }

.menusupOK{float: right;   padding:12px; background-color:#000000; color: #ffffff;

background-image: url("https://yolovalgo.com/icono-flecha-bajo.png");
  background-repeat: no-repeat;
  background-position: center bottom;
  }



.icono{width:25px; max-height:25px; opacity: 0.5; margin-right: 5px; }
.iconoOK{width:25px; max-height:25px; opacity: 0.9; margin-right: 5px;}

.tabla {
	margin:0px;padding:0px;
	width:100%;
	
	border:0px solid #B9B9C8;
	padding:0px;
	
}.tabla table{
  
        border-spacing: 0px;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
	
}.tabla tr:last-child td:last-child {
	
}
.tabla table tr:first-child td:first-child {
	
}
.tabla table tr:first-child td:last-child {
	
}.tabla tr:last-child td:first-child{
	
}.tabla tr:hover td{
	
}
.tabla tr:nth-child(odd){ background-color:#F9F9F9; }
.tabla tr:nth-child(even)    { background-color:#ffffff; }.tabla td{
	vertical-align:middle;
	
	
	border:0px solid #F8F8F8;
	border-width:0px 0px 0px 0px;
	text-align:left;
	padding:10px;
	font-size:12px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.tabla tr:last-child td{
	border-width:0px 0px 0px 0px;
}.tabla tr td:last-child{
	border-width:0px 0px 0px 0px;
}.tabla tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.tabla tr:first-child td{
	
	background-color:#0C7DBD;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 0px 0px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.tabla tr:first-child:hover td{
	
	background-color:#005fbf;
}
.tabla tr:first-child td:first-child{
	border-width:0px 0px 0px 0px;
}
.tabla tr:first-child td:last-child{
	border-width:0px 0px 0px 0px;
}



.tabla tr:nth-child(odd):hover{background-color: #EAF4FF;cursor: hand; cursor:pointer; }
.tabla tr:nth-child(even):hover{background-color: #FFFFE1;cursor: hand; cursor:pointer;}

input[type="text"]:disabled {
    background: #ffffff;
}

.pestana{padding: 10px; background-color: #FFFFFF; float: left; margin-top:5px; margin-left:5px;
		-webkit-border-top-left-radius: 5px;
		-webkit-border-top-right-radius: 5px;
		-moz-border-radius-topleft: 5px;
		-moz-border-radius-topright: 5px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		border-top: 1px solid #E9E9E9;
		border-left: 1px solid #E9E9E9;
		border-right: 1px solid #E9E9E9;
}

.pestanaoff{padding: 10px; background-color: #868695; float: left; margin-top:5px; margin-left:5px;
-webkit-border-top-left-radius: 5px;
-webkit-border-top-right-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-topright: 5px;
border-top-left-radius: 5px;
border-top-right-radius: 5px;color:white }
.pestanaoff a {color: white}


	.divContenedor{
		width: auto;
		margin: 10px auto 0px auto;
		text-align: left;
}

.divContenedor label{
		 
	padding: 5px 20px;
	display: block;
	height: 30px;
	cursor: pointer;
	color:#F8F8F8;
	line-height: 33px;
	font-size: 14px;
	font-weight: bold;
	background: #99B2FF;
	-webkit-transition: 0.3s ease-in-out;
	-moz-transition: 0.3s ease-in-out;
	-o-transition: 0.3s ease-in-out;
	-ms-transition: 0.3s ease-in-out;
	transition: 0.3s ease-in-out;
	border: 1px solid #E5E5E5;
}

.divContenedor label:hover{
	background: #7373FF; 
	color:#FCFCFC;
	padding-left: 19px;
	
}

.divContenedor input:checked + label,
.divContenedor input:checked + label:hover{
	background: #0074A2;
	color: #F5F5F5;

}

.divContenedor input[type="checkbox"]{
	display: none;
}

.divContenedor .texto{
	border: 1px solid #E8E8E8;
	margin-top: -1px;
	overflow: hidden;
	height: 0px;
	background-color: #fff;
	-webkit-transition: 0.3s ease-in-out;
	-moz-transition: 0.3s ease-in-out;
	-o-transition: 0.3s ease-in-out;
	-ms-transition: 0.3s ease-in-out;
	transition: 0.3s ease-in-out;

	color: #777;
	cursor:pointer;cursor:hand;
	font-size: 14px;
}

.divContenedor .texto p{
	color: #777;
	line-height: 23px;
	font-size: 14px;
	padding: 5px;
}

.divContenedor input:checked ~ .texto{
	height: auto;
}













</style>	
	<link rel="stylesheet" href="https://yolovalgo.com/css/font-awesome.min.css">
</head> 
<body onload="<?if ($error) {?>Sexy.<?PHP if ($tipoerror) {echo $tipoerror;} else {echo "alert";}; ?>('<?php echo $error; ?>');<?PHP } ?>" >




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
			
				<div style='position: absolute; top: 2px; right: 0px;'>
<a onclick="document.getElementById('modal').style.display='none';">
				<img src='https://yolovalgo.com/img/x.png'>
</A>
</div>
			
				<div id='Mcontenido'></div>
			
			
				</div>
		</div>


		
<div id='contenedor' >		
	<div id='cabecera'  >
		
	
		<a  style='float:left' href='https://yolovalgo.com/logout' >
					<i class="fa fa-yen "></i>olovalgo
					
		</A>

		<a class="menusup" href='https://yolovalgo.com/logout' style='color: orange;'>
					<i class="fa fa-sign-out "> </i>	
					Cerrar Sesi&oacute;n
		</A>
		
		<a class='menusup<? if ($_GET ['pestana']=="tarifas") {echo "OK";} ?>' href='https://yolovalgo.com/panel/tarifas/premium' >
				<i class="fa fa-users "></i>	
				Tarifas Publicidad</A>
		
		<a class='menusup<? if ($_GET ['submenu']=="tipo") {echo "OK";} ?>' href='https://yolovalgo.com/panel/cuenta/tipo'>
				<i class="fa fa-star-o "></i>	
				Crear Galer&iacute;a</A>
		
		<a class='menusup<? if ($_GET ['submenu']=="yolovalgo") {echo "OK";} ?>' href='https://yolovalgo.com/panel/recomendaciones/yolovalgo' >
				<i class="fa fa-users "></i>	
				Invitar Amigos</A>
		
		<a class='menusup<? if ($_GET ['submenu']=="perfiles") {echo "OK";} ?>' href='https://yolovalgo.com/panel/recomendaciones/perfiles' >
				<i class="fa fa-thumbs-o-up "></i>	
				Recomendar Galer&iacute;as</A>
		
		<a class='menusup<? if ($_GET ['submenu']=="publicaciones") {echo "OK";} ?>' href='/panel/galeria/publicaciones/editar/'>
				<i class="fa fa-edit "></i>	
				
				Editar y Publicar</A>
		
		<a class='menusup'  href='https://yolovalgo.com/<? echo $campo['subdominio']; ?>' >
					<i class="fa fa-cloud "></i>	
					Mi Perfil</A>
		
			<a class='menusup<? if ($_GET ['pestana']=="inicio") {echo "OK";} ?>'  href='https://yolovalgo.com/panel/inicio/dash' >
					<i class="fa fa-home "></i>	
					Portada</A>
		
		
		
		
		
		
			
					
					
					
					
					
					
					
					
				
				
				
				
				
				
				
				
				
				
				
				
		
		</div>
		
	
		
		
		
	</div>
	
	
	
	
	
	<div style='height: 40px; background-color: #000000;'>Yolovalgo.com</div>
	
	<div id='cuerpo' style='height: 600px;;  '>
	
		<div id='menu' style='float: left; ;background-color: #222222;  bottom:0px; top: 0px;   overflow:hidden;'>
		
		
	
<div class='menuadmin<? if ($_GET ['pestana']=="inicio") {echo "OK";} ?>'>
			<a href='/panel/inicio/dash'>
			
			<i class="fa fa-dashboard"></i> 
			 Escritorio</A></div>
			
			<? if ($_GET ['pestana']=="inicio") { ?>
			
					
					<div class='submenuadminOK'> 
							<a href='/panel/inicio/dash'> Inicio</A>
					</div>
					
					<div class='submenuadmin'> 
							<a href='/logout'> Cerrar Sesi&oacute;n</A>
					</div>
			<? } ?>	

	
<div class='menuadmin<? if ($_GET ['pestana']=="cuenta") {echo "OK";} ?>'>
			<a href='/panel/cuenta/tipo'>
			<i class="fa fa-user"></i> Mi Cuenta</A></div>
			
			<? if ($_GET ['pestana']=="cuenta") {?>
			
					
					<div class='submenuadmin<? if ($_GET['submenu']=="contacto") {echo "OK";} ?>'> 
							<a href='/panel/cuenta/contacto'> Datos de Contacto</A>
					</div>
			
						<? if ($_SESSION['cliente']=="Premium") { ?>
								<div class='submenuadmin<? if ($_GET['submenu']=="empresa") {echo "OK";} ?>'> 
									<a href='/panel/cuenta/empresa'> Datos de Empresa</A>
							</div>
						<? } ?>	
							
				<? if ($_SESSION['cliente']!="Visitante") { ?>						
						<div class='submenuadmin<? if ($_GET['submenu']=="perfil") {echo "OK";} ?>'> 
									<a href='/panel/cuenta/perfil'> Datos de Perfil</A>
							</div>
				<? } ?>		
							
					<div class='submenuadmin<? if ($_GET['submenu']=="tipo") {echo "OK";} ?>'> 
							<a href='/panel/cuenta/tipo'> Tipo Perfil</A>
					</div>
					
					
					
					
					<div class='submenuadmin<? if ($_GET['submenu']=="clave") {echo "OK";} ?>'>
							<a href='/panel/cuenta/clave'> Cambiar Clave </A>
					</div>
					
					<div class='submenuadmin<? if ($_GET['submenu']=="baja") {echo "OK";} ?>'> 
							<a href='/panel/cuenta/baja' > Dar de baja</A>
					</div>
					
					
			
			<? } ?>
			
			
	
			
	
			
			
	<div class='menuadmin<? if ($_GET ['pestana']=="mensajes") {echo "OK";} ?>'>
			<a href='/panel/mensajes/centro/yolovalgo'>
			<i class="fa fa-envelope-o "></i>	
			Mensajes</A></div>
			<? if ($_GET ['pestana']=="mensajes") { ?>
			
				
				<div class='submenuadmin<? if ($_GET['get']=="yolovalgo") {echo "OK";} ?>'>
							<a href='/panel/mensajes/centro/yolovalgo'>  Yolovalgo</A>
				</div>
				
				<div class='submenuadmin<? if ($_GET['get']=="recibidos") {echo "OK";} ?>'>
							<a href='/panel/mensajes/centro/recibidos'>  Recibidos</A>
				</div>
			
			<div class='submenuadmin<? if ($_GET['get']=="enviados") {echo "OK";} ?>'>
							<a href='/panel/mensajes/centro/enviados'>  Enviados</A>
				</div>
				
				<div class='submenuadmin<? if ($_GET['get']=="contactos") {echo "OK";} ?>'>
							<a href='/panel/mensajes/centro/contactos'>  Enviar Nuevo</A>
				</div>
					
			<? } ?>		
			
			
			
			
			
				<div class='menuadmin<? if ($_GET ['pestana']=="tarifas") {echo "OK";} ?>'>
				<a href='/panel/tarifas/premium'>
				<i class="fa fa-desktop "></i>	
				Tarifas Publicidad</A></div>
			
			
			
				
			
			
			
			
			
		<? if ($_SESSION['cliente']=="Free") { ?>			
			
				<div class='menuadmin<? if ($_GET ['pestana']=="galeria") {echo "OK";} ?>'>
				<a href='/panel/galeria/publicaciones'> 
				
				<i class="fa fa-cogs"></i>	Opciones de Galer&iacute;a</A></div>
			<? if ($_GET ['pestana']=="galeria") { ?>
				
			
					<div class='submenuadmin<? if ($_GET['submenu']=="publicaciones" || $_GET['submenu']=="publicacionnueva") {echo "OK";} ?>'>
							<a href='/panel/galeria/publicaciones'> Publicar Contenido</A>
					</div>
			
					<div class='submenuadmin<? if ($_GET['submenu']=="perfil" || $_GET['submenu']=="perfil") {echo "OK";} ?>'>
							<a href='https://yolovalgo.com/<? echo $campo['subdominio']; ?>'>Ver Perfil</A>
					</div>
					
					
			<? } } ?>
			
			
			
			
		<? if ($_SESSION['cliente']=="Premium") { ?>		
		<div class='menuadmin<? if ($_GET ['pestana']=="galeria") {echo "OK";} ?>'>
		<a href='/panel/galeria/publicaciones'>
		<i class="fa fa-cogs"></i>	
		
		
		Opciones de Galer&iacute;a</A></div>
			<? if ($_GET ['pestana']=="galeria") { ?>
				<div class='submenuadmin<? if ( $_GET['submenu']=="servicios") {echo "OK";} ?>'>
							<a href='/panel/galeria/servicios'>Insertar Servicios</A>
					</div>
			
					<div class='submenuadmin<? if ($_GET['submenu']=="publicaciones" || $_GET['submenu']=="publicacionnueva") {echo "OK";} ?>'>
							<a href='/panel/galeria/publicaciones'> Publicar Contenido</A>
					</div>
			
					<!-- div class='submenuadmin<? if ($_GET['submenu']=="fotos" || $_GET['submenu']=="fotos") {echo "OK";} ?>'>
							<a href='/panel/galeria/fotos'> Insertar Fotos</A>
					</div-->
					
					
					<div class='submenuadmin<? if ($_GET['submenu']=="lateral" || $_GET['submenu']=="lateral") {echo "OK";} ?>'>
							<a href='/panel/galeria/lateral'> Personalizar Lateral</A>
					</div>
					
					<div class='submenuadmin<? if ($_GET['submenu']=="perfil" || $_GET['submenu']=="perfil") {echo "OK";} ?>'>
							<a href='https://yolovalgo.com/<? echo $campo['subdominio']; ?>'>Ver Perfil</A>
					</div>
					
					
			<? }} ?>
			
			
			
			<div class='menuadmin<? if ($_GET ['pestana']=="recomendaciones") {echo "OK";} ?>'>
			<a href='/panel/recomendaciones/realizadas'>
			<i class="fa fa-thumbs-o-up "></i>	
			Recomendaciones</A></div>
			<? if ($_GET ['pestana']=="recomendaciones") { ?>
				<div class='submenuadmin<? if ( $_GET['submenu']=="realizadas") {echo "OK";} ?>'>
							<a href='/panel/recomendaciones/realizadas'>Realizadas</A>
					</div>
					<div class='submenuadmin<? if ( $_GET['submenu']=="recibidas") {echo "OK";} ?>'>
							<a href='/panel/recomendaciones/recibidas'>Recibidas</A>
					</div>
						
						<div class='submenuadmin<? if ($_GET['submenu']=="perfiles") {echo "OK";} ?>'>
			<a href='/panel/recomendaciones/perfiles'>Recomendar Galer&iacute;as</A></div>	
			
		

		<div class='submenuadmin<? if ($_GET['submenu']=="yolovalgo") {echo "OK";} ?>'>
			<a href='/panel/recomendaciones/yolovalgo'>Recomendar Yolovalgo</A></div>	

		
					
					<? } ?>
			
			
				
			<div class='menuadmin<? if ($_GET ['pestana']=="ayuda") {echo "OK";} ?>'>
			<a href='/panel/ayuda/centro'>
			<i class="fa fa-magic "></i>	
			Centro Ayuda</A></div>



			
			
	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
<div style='border-top: 1px solid #F1F1F1; width:100%'></div>
	 <div id='PUBLICIDAD' style='margin:18px;'>
	 
			 <a href="http://ad.impresionesweb.com/click.php?iw_code=41829&noscript=1"><img src="http://ad.impresionesweb.com/index.php?iw_code=41829&noscript=1"></a>
			
		</span>

	 </div>


			
</div>

		
	<div id='contenido'  style='float: left; width: 80%; margin-left:10px;  background-color: #F1F1F1;height:100%'>
		
	<div style='clear: both; width: 99%; '>
		
	<? 
	
			
				
		echo "</div>"; //Este es el fin de div de los botones centrales		
				
				
			if 	($campo['activo']==0){
					$_GET['pestana']="confirmar";
					$_GET['submenu']="mail";}
				
			if ($_SESSION['idusuario']){
				
				include ('admin-'.$_GET['pestana'].'-'.$_GET['submenu'].'.php');
				//echo 'admin-'.$_GET['pestana'].'-'.$_GET['submenu'].'.php';

				}
			else{	echo "<div class='blanc' style='padding: 20px; margin-top:10px; overflow: hidden;>'";
					include ('box-login.php');
					echo "</div>";
				}
				
				
				?>
				
				
		
				<div style='clear:both; width:100%;text-align: center; color: #868695;margin:10px;'>
				
				
				
				
				
				
<div  >
<!-- google traslate -->
			
					
					
					
					<div style=' text-align:center;'>
						

					<style type="text/css">
					<!--
					a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url('http://joomla-gtranslate.googlecode.com/svn/trunk/mod_gtranslate/tmpl/lang/16.png');}
					a.gflag img {border:0;}
					a.gflag:hover {background-image:url('http://joomla-gtranslate.googlecode.com/svn/trunk/mod_gtranslate/tmpl/lang/16a.png');}
					#goog-gt-tt {display:none !important;}
					.goog-te-banner-frame {display:none !important;}
					.goog-te-menu-value:hover {text-decoration:none !important;}
					body {top:0 !important;}
					#google_translate_element2 {display:none!important;}
					-->
					</style>
					<div style='position: relative'>
					<a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" >
						<img src="http://joomla-gtranslate.googlecode.com/svn/trunk/mod_gtranslate/tmpl/lang/blank.png" height="16" width="16" alt="English" valign='middle'/></a>
					<a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;">
					<img src="http://joomla-gtranslate.googlecode.com/svn/trunk/mod_gtranslate/tmpl/lang/blank.png" height="16" width="16" alt="French" /></a>
					<a href="#" onclick=";doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;">
					<img src="http://joomla-gtranslate.googlecode.com/svn/trunk/mod_gtranslate/tmpl/lang/blank.png" height="16" width="16" alt="German" /></a>
					<a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;">
					<img src="http://joomla-gtranslate.googlecode.com/svn/trunk/mod_gtranslate/tmpl/lang/blank.png" height="16" width="16" alt="Italian" /></a>
					<a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;">
					<img src="http://joomla-gtranslate.googlecode.com/svn/trunk/mod_gtranslate/tmpl/lang/blank.png" height="16" width="16" alt="Portuguese" /></a>
					<a href="#" onclick=";doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;">
					<img src="http://joomla-gtranslate.googlecode.com/svn/trunk/mod_gtranslate/tmpl/lang/blank.png" height="16" width="16" alt="Russian" /></a>
					<a href="#" onclick=";doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="http://joomla-gtranslate.googlecode.com/svn/trunk/mod_gtranslate/tmpl/lang/blank.png" height="10" width="16" alt="Spanish" /></a> 

					

					 </div>
					<div id="google_translate_element2"> </div>

					<script type="text/javascript">
					function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'es',autoDisplay: false,multilanguagePage: false}, 'google_translate_element2');}
					</script>
					<script type="text/javascript" >
					(function(){var d=window,e=document,f="text/javascript",g="text/css",h="stylesheet",k="script",l="link",m="head",n="complete",p="UTF-8",q=".";function r(b){var a=e.getElementsByTagName(m)[0];a||(a=e.body.parentNode.appendChild(e.createElement(m)));a.appendChild(b)}function _loadJs(b){var a=e.createElement(k);a.type=f;a.charset=p;a.src=b;r(a)}function _loadCss(b){var a=e.createElement(l);a.type=g;a.rel=h;a.charset=p;a.href=b;r(a)}function _isNS(b){b=b.split(q);for(var a=d,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;return!0}function _setupNS(b){b=b.split(q);for(var a=d,c=0;c<b.length;++c)a=a[b[c]]||(a[b[c]]={});return a}
					d.addEventListener&&"undefined"==typeof e.readyState&&d.addEventListener("DOMContentLoaded",function(){e.readyState=n},!1);
					if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cl='es';c._cuc='googleTranslateElementInit2';c._cac='';c._cam='';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._phf=h+'/translate_static/js/element/hrs.swf';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main_es.js');})();})();</script>

					<script type="text/javascript">
					/* <![CDATA[ */
					eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}));
					/* ]]> */
					</script>

					<script type="text/javascript">eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('7.F=7.F||{};7.F.B=Y(f){5(f.p<2){1e}6 g=\'z://B.U.S/18/t?Z=3&1c=1b&1a=19&v=1.0&17=12\';6 h=\'\';6 j=9;5(7.u&&!(7.8)){m{j=l u()}k(e){j=9}}A 5(7.8){m{j=l 8("Q.r")}k(e){m{j=l 8("R.r")}k(e){j=9}}}5(j){j.K(\'L\',g,M);j.N(\'s-O\',\'G/x-E-D-C\');j.1g=Y(){5(j.1h==4){5(j.1k==1n){6 a=10(j.11);6 b=\'z://P.13.14/P-15/16\';6 c=\'\';6 d=9;5(7.u&&!(7.8)){m{d=l u()}k(e){d=9}}A 5(7.8){m{d=l 8("Q.r")}k(e){m{d=l 8("R.r")}k(e){d=9}}}5(d){d.K(\'L\',b,M);d.N(\'s-O\',\'G/x-E-D-C\');I(6 i=0;i<a.p;i++){c+=\'&T[]=\'+f[i].T;5(f[i].o==\'1d\'){c+=\'&H[]=\'+w(a[i][0]);c+=\'&1f[]=\'+w(a[i][1])}A{c+=\'&H[]=\'+w(a[i])}}c+=\'&V=\'+f[0].o;c+=\'&W=\'+f[0].y;d.X(c)}}}}}I(6 i=0;i<f.p;i++){h+=\'&q=\'+w(f[i].H);5(f[0].y!=f[i].y||f[0].o!=f[i].o){1i}}h+=\'&W=\'+f[0].y+\'&V=\'+f[0].o+\'&1j=1\';h=\'s-p: \'+h.p+"\\n\\n"+h;h=\'1l-1m-J: \'+1o.1p+"\\n"+h;h=\'s-1q: G/x-E-D-C\'+"\\n"+h;h=\'J: z://B.U.S/1r/1s/1t/1u.1v\'+"\\n"+h;5(i>0){j.X(h)}};',62,94,'|||||if|var|window|ActiveXObject|false|||||||||||catch|new|try||lang_from|length||XMLHTTP|Content||XMLHttpRequest||encodeURIComponent||lang_to|http|else|translate|urlencoded|form|www|__GT|application|text|for|Referer|open|POST|true|setRequestHeader|Type|tdn|Msxml2|Microsoft|com|md5|googleapis|sl|tl|send|function|anno|eval|responseText|v8|gtranslate|net|bin|save|logld|translate_a|html|format|te|client|auto|return|dl|onreadystatechange|readyState|break|tc|status|Google|Translate|200|location|href|type|translate_static|js|element|hrs|swf'.split('|'),0,{}));
					(function(){try{__GT.translate([{"md5":"3a2c4ff30efef9b53961ec6f77f49d64","lang_from":"en","lang_to":"et","text":"Tree Stump Pond"},{"md5":"13d0949a83c3a41bd7a96b7aa781f361","lang_from":"en","lang_to":"et","text":"Permalink to Snowkite Chasta and Jerome flying"},{"md5":"af3a8d1c001fba3313a30a34e3712ce0","lang_from":"en","lang_to":"et","text":"Comment on Snowkite Chasta and Jerome flying"},{"md5":"d0345a1b7987c942d5b436497937db6a","lang_from":"en","lang_to":"et","text":"SKMXNUMX_Day_XNUMX"},{"md5":"55339b904dcfacf9e2d913d1c9e45cd0","lang_from":"en","lang_to":"et","text":"Snowkite Chasta and Jerome flying | SPORT EXTREME VIDEO"}])}catch(e){}})();
					</script>

					</div>
			
			
			
			
			
			
			
			
			
			
			
			<!-- end -->
</div>
		
				
				
				
				
				
				
				
				
				
				
				&copy; Yolovalgo.com - Tel: 902 886 805
				</div>
		</div>
		
	</div>
	
		
	<div id='oculto'>
</div>
<div id='ventana'>
</div>
</div>












</body>
</html>
	