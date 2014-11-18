<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>Evento</title>
	<link rel="stylesheet" href="stylesheets/iphone.css" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />

	<!-- for profile image -->
	<style type="text/css" media="screen">
		li.picture { background: #fff url(images/minid-profile.png) no-repeat !important; width: 62 px; height:62 px; text-align: center }
        a {text-transform: uppercase; }

	</style>
	<!-- end line customization -->

<?php
        include("conexion_bd.php");
      $id=$_GET['id'];
      $sql="SELECT
tb_categorias.nom_categoria,
tb_direcciones.nom_direccion,
tb_direcciones.responsable_direc,
tb_direcciones.cod_color,
tb_direcciones.orden,
tb_eventos.id_categoria,
tb_eventos.id,
tb_eventos.fecha_inicio,
tb_eventos.fecha_finaliza,
tb_eventos.hora,
tb_eventos.asunto,
tb_eventos.lugar,
tb_eventos.descripcion,
tb_eventos.responsable,
tb_eventos.quienasiste,
tb_eventos.notas,
tb_eventos.tipo,
tb_eventos.visible,
tb_eventos.idusuario,
tb_eventos.id_direc
FROM
tb_eventos
LEFT JOIN tb_direcciones ON tb_eventos.id_direc = tb_direcciones.id_direccion
LEFT JOIN tb_categorias ON tb_eventos.id_categoria = tb_categorias.id_categorias
WHERE
tb_eventos.visible = '1'
and tb_eventos.id=$id";

$recurso=mysql_query($sql,$cn);
$a=mysql_fetch_array($recurso);

function mostrar_fecha_completa($fecha)
{
                setlocale(LC_TIME, 'Spanish');
                echo $fech=strftime('%A ,  %d de %B del %Y',strtotime($fecha));
};?>
</head>

<body>

	<div id="header">
		<h1>Información del Evento</h1>
		<a href="index.html" id="backButton">Regresar</a>
	</div>

<table border="0" width="1024px" align="center" >
<tr>
    <td rowspan="2" align="center" width="70px"><img src="images/minid-profile.png" width="57" height="62" alt="" /></td>
    <td id="tit" width="900px">
	        <h4><center><?php echo $a['asunto'];?></center></h4>
    </td>
    <td rowspan="2" align="center" width="70px"><img src="images/minid-profile.png" width="57" height="62" alt="" /></td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>
</table>

<br />

<ul class="field">
	<li><h3>Lugar</h3> <a><?php echo $a['lugar'];?></a></li>
    <br />
    <li><h3>Fecha y Hora</h3>
        <a><?php echo mostrar_fecha_completa( $a['fecha_inicio'])." , ".$a['hora'];?> Horas <br />
        <?php
        if ($a['fecha_inicio']!=$a['fecha_finaliza']){
        echo mostrar_fecha_completa( $a['fecha_finaliza'])." , ".$a['hora'];?> Horas<?}?></a>
    </li>
    <br />
	<li ><h3>Descripción</h3> <a><?php echo utf8_encode($a['descripcion']);?></a></li>
    <br />
	<li><h3>Responsable</h3> <a><?php echo $a['responsable'];?></a></li>
    <br />
	<li><h3>Asiste</h3> <a><?php echo $a['quienasiste'];?></a></li>
    <br />
	<li><h3>Dirigido A</h3> <a><?php echo $a['tipo'];?></a></li>
    <br />
	<li ><h3>Notas</h3> <big><?php echo $a['notas'];?></big></li>
    <br />
    <li ><h3>Categoria</h3><a><?php echo $a['nom_categoria'];?></a></li>
    <br />
</ul>

<p><strong>Instituto Quintanarroense de la Mujer</strong>
<br />
Dirección de Sistemas Informaticos<br />IQM (<a href="http://www.iqm.gob.mx">iqm.gob.mx</a>)
</p>

</body>
</html>