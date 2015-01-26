<?

session_start();

include('conex.php');


if ($_GET['from']){$men['from']=$_GET['from'];}

else {
		$consulta="Select * from mail where  `id`='".$_GET['id']."' order by id DESC LIMIT 100;"; 
			$sql=mysql_query($consulta,$conex);
				
			$men=mysql_fetch_array($sql);
			$men['asunto']="RE:".$men['asunto'];
			$men['msg']="\n\n--------------------\n\n".$men['msg'];
	}
	
	echo "<form action='/panel/mensajes/centro/enviados' method='post'>
			<input type='hidden' name='respondermsg' value='s'>
			
			  <input type='hidden'   name='de'	  value='". $_SESSION['usuario']."'>
			   <input type='hidden'   name='para'	  value='". $men['from']."'>
			   
			<div style='margin-top: 10px;'><b>De</b>: @". $_SESSION['subdominio']." </div>
			<div style='margin-top: 10px;'><b>Para</b>: @". $_GET['para']." </div>
		  <div style='margin-top: 10px;'><b>Asunto</b>: <input type='text' name='asunto' value='". $men['asunto']."' required> </div>

		  <div style='margin-top: 10px;'><b>Mensaje</b>: 
		  
		  <textarea name='msg' style='height: 200px; width:98%' required>". $men['msg']."</textarea></div>
		 <p>
			<button type='submit' value='Enviar' class='button medium green' style='width: 100px; float: right'> <i class='fa fa-paper-plane-o'></i> Enviar </button>
		 </form>
		
		  "; 
		  
		  
	
	
	
	//mysql_query("UPDATE mail SET   `news`='1'  where  `id`='".$_GET['id']."'; ", $conex);
?>