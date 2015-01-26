<?

session_start();

include('conex.php');


$consulta="select seguidores.creada,usuarios.subdominio,usuarios.id from seguidores, usuarios 
			where  		seguidores.usuario=usuarios.id 
					and seguidores.perfil='".$_SESSION['idusuario']."' 
					and seguidores.noticia=0
			order by seguidores.creada DESC
			limit 1000";

			$sql=mysql_query($consulta,$conex);
		
		echo "<div>
			<table class='tabla' style='width: 100%; border:0px;'>
			<tr style='display: none;' ><td></td><td></td></tr>";
		
		$a=0;
		while($dato=mysql_fetch_array($sql)){
			$a++;
			echo "<tr><td style='padding: 0px; '><img src='//yolovalgo.es/perfil/".$dato[2].".png' style='width:60px; height:60px;'></td>
			
				<td>".date("d-m-Y H:i",strtotime($dato[0]))."</td>
				<td>@".$dato[1]."</td>
				
				
				<td style='text-align:center'> <a href='//yolovalgo.com/".$dato[1]."'><i class='fa fa-external-link-square'></a></i></td>
			
			</tr>";




			}
			if ($a==0) {echo "Su galer&iacute;a no tiene recomendaciones.";}
			echo "</table>";

?>
