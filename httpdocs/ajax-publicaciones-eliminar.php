<?			
session_start();
include('conex.php');




//ELIMINAMOS
$consulta="delete from noticias where usuario='".$_SESSION['idusuario']."' and id='".$_GET['id']."';";



mysql_query($consulta,$conex);


?>

