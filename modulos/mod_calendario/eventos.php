<?php
include("../mod_conexion/conexion_bd.php");

$sql="SELECT
tb_eventos.id as id,
tb_eventos.fecha_inicio as fecha_inicio,
tb_eventos.fecha_finaliza as fecha_finaliza,
tb_eventos.hora as hora,
tb_eventos.asunto as asunto,
tb_eventos.lugar,
tb_eventos.descripcion,
tb_eventos.responsable,
tb_eventos.quienasiste,
tb_eventos.notas,
tb_eventos.tipo,
tb_eventos.visible,
tb_eventos.idusuario,
tb_eventos.id_direc,
tb_direcciones.id_direccion,
tb_direcciones.nom_direccion,
tb_direcciones.responsable_direc,
tb_direcciones.cod_color as cod_color,
tb_direcciones.orden
FROM
tb_eventos
LEFT JOIN tb_direcciones ON tb_direcciones.id_direccion = tb_eventos.id_direc
WHERE
tb_eventos.visible = '1' order by hora
";

$recurso=mysql_query($sql,$cn);
$num_reg=mysql_num_rows($recurso);

echo "[";
$x=0;
while ($arreglo=mysql_fetch_array($recurso) ){
  $id= $arreglo['id'];
  $tiempo="08:15:30-05:00"
?>

 {"id": <?php echo  $id;?>,
 "title":"<?php echo utf8_encode($arreglo['hora']." - ".$arreglo['asunto']);?>",
 "start":"<?php echo $arreglo['fecha_inicio']." ".$tiempo;?>",
 "end": "<?php echo $arreglo['fecha_finaliza'];?>",
 "url": "modulos/mod_calendario/evento_vista.php?id=<?php echo $id;?>",
 "backgroundColor": "#<?php echo $arreglo['cod_color'];?>"}

<?php
    $x=$x+1;
  if ($num_reg > '1' and $x < $num_reg  ) {
    echo "," ;
  }
 }
    echo "]";
?>