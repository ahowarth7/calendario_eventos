<script language="javascript">
function cerrar()
{
window.opener.document.location.reload();
window.close();
	
}
</script>

<?php
 session_start();

include("conexion_bd.php");


$usuario=$_SESSION['username'];


	
   $fecha_inicia   = $_GET['fecha_inicia'];
   $fecha_finaliza   = $_GET['fecha_finaliza'];
   $hora  = $_GET['hora'].':'.$_GET['minutos'];
   $asunto = $_GET['asunto'];
   $lugar = $_GET['Lugar'];
   $asiste   = $_GET['asiste'];
   $descripcion  = $_GET['Descripcion'];
   $responsable = $_GET['Responsable'];
   $notas = $_GET['notas'];
   $tipo="publico";
   $visible="1";
   $id_usuario="100";
   $id_direc="1";



   $qryNvo_Usuario= "insert into tb_eventos (fecha_inicio,fecha_finaliza,hora,asunto,lugar,descripcion,responsable,quienasiste,notas,tipo,visible,idusuario,id_direc) VALUES ('$fecha_inicia','$fecha_finaliza','$hora','$asunto','$lugar','$asiste','$descripcion','$responsable','$notas','$tipo','$visible','$id_usuario','$id_direc')";
	mysql_query($qryNvo_Usuario, $cn);

	echo "Evento Almacenado Felicidades!!!";

    
//aqui hace la insercion de datos-->

?>
<input name="button" type="button" onclick="javascript:cerrar();" value="Cerrar esta ventana" />


