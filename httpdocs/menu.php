
<div style='width: 100%; z-index:1'>
<div style='padding: 8px; margin: 10px;  color: white; background-color: #167AC6; font-weight: bold;'>
<a href='/' style='color: white;' > @ Qu&eacute; publicaciones ver</A>
</div>

<div style='padding: 5px; margin: 10px; border-top: 1px solid #E8E8E8; font-size:10px; color: #167AC6; font-weight: bold;'>
	LO MEJOR DE NOWNEARYOU
	</div>
<div class='menu'><a href='/<? echo $_SESSION['paise']; ?>/galeria/empresas/home'> @ Servicios</A></div>

<div class='menu'><a href='/<? echo $_SESSION['paise']; ?>/galeria/hosteleria/home'> @ Alojamiento y Gastronom&iacute;a</A></div>
<div class='menu'><a href='/<? echo $_SESSION['paise']; ?>/galeria/tiendas/home'> @ Comercios</A></div>



		<div style='border-top: 1px solid #E8E8E8;border-bottom: 1px solid #E8E8E8;padding: 8px; margin: 10px; cursor:pointer; cursor: hand; '
			onclick="window.location.href='/<? echo $_SESSION['paise']; ?>/galerias/';">
		<a href='/<? echo $_SESSION['paise']; ?>/galerias/'> Exlorar galer&iacute;as</A>
		</div>


<? if ($_SESSION['idusuario']) { 

	echo "<div><div style='padding: 8px; margin: 10px;  color: white; background-color: #167AC6; font-weight: bold;'>
			<a href='/' style='color: white;' > Mis perfiles</A>
				</div>";
	echo $_SESSION['mimenu'];
	
	echo "<div class='menu' style='border-top: 1px solid #E8E8E8;'><a>+ Nueva p&aacute;gina.</A></div>";
	echo "</div>";
	
	
} else { ?>
	<div style='padding: 8px; margin: 10px; cursor:pointer; cursor: hand; '
		onclick="window.location.href='http://nownearyou.com/login';">
	Registrate gratis y publica en tu propio canal. 
	<p>
	<a href='http://yolovalgo.com/login' class='button large blue' style='width: 80%'>Crear cuenta</A>
	</div>
<? } ?>



				<div style=' margin-left:12px;margin-top:5px; width:100%; z-index: 100'>
					
					
					
				</div>
						
	</div>		

<?	
//$path = getcwd();

?>
