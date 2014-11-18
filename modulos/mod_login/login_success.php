<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start();
include('../conexion_bd.php');
$id= $_SESSION['id_usuario'] ;
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlxlayout.css">
    <link rel="stylesheet" type="text/css" href="../codebase/skins/dhtmlxlayout_dhx_skyblue.css">
    <script src="../codebase/dhtmlxcommon.js"></script>
    <script src="../codebase/dhtmlxlayout.js"></script>
    <script src="../codebase/dhtmlxcontainer.js"></script>
<style>
html, body {
    	width: 100%;
    	height: 100%;
    	margin: 0px;
    	padding: 0px;
    	overflow: hidden;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;

}
#a{
        background-image: url(../bg_page.jpg);
	    background-repeat:repeat-x;
}
#b{
        background-image: url(../bg_page.jpg);
	    background-repeat:repeat-x;
}
#c{
        background-image: url(../bg_page.jpg);
	    background-repeat:repeat-x;
}
#titulo{
       background-image: url(../glossyback.gif);
	    background-repeat:repeat-x;
        height: 45px;
}

/* ----------------------- tabla de eventos -----------------------------------*/
#tabla{
        text-align: center;
        font-size: 10px;
}
#titulos{
        text-align: center;
        font-size: 13px;
        border-spacing: 2 px;
        background-color:#007b66;
        color:#ffffff;
        background-image: url(../llsh.gif)
}
table {
		border-collapse:collapse;
		border-left:1px solid #686868;
		border-right:1px solid #686868;
		font:0.8em/145% 'Trebuchet MS',helvetica,arial,verdana;
		color: #333;
}
td{
        width: 20%;
}

/* ----------------------- Celdas tabla -----------------------------------*/
.celda1{
      	font: 11px/14px Verdana, Geneva, Arial, Helvetica, sans-serif;
        border-top: 1px dotted #416D89;
        border-right: 1px dotted #416D89;
        border-left:1px dotted #416D89;
        border-bottom:none;
        padding-top:10px;
        padding-right:3px;
        padding-left:20px;
        padding-bottom:12px;
        background-color:#5C909A ;
        padding:5px;
}
.celda2{
    	font: 11px/14px Verdana, Geneva, Arial, Helvetica, sans-serif;
        border-top: 1px dotted #ffffff;
        border-right: 1px dotted #416D89;
        border-left:1px dotted #416D89;
        border-bottom:none;
        padding-top:10px;
        padding-right:3px;
        padding-left:20px;
        padding-bottom:12px;
        background-color:#EEEEEE;
        padding:5px;
}



/* ----------------------- Menu -----------------------------------*/

#menu9 {
width: 100%;
margin: 0px;

}

#menu9 ul {
list-style: none;
margin: 0;
padding: 0;
}
#menu9 li a {
height: 32px;
voice-family: "\"}\"";
voice-family: inherit;
height: 24px;
text-decoration: none;
}

/* Ne pas oublier d'indiquer l'adresse des images */
#menu9 li a:link, #menu9 li a:visited {
color: #E4D6CD;
display: block;
background: url(menu9.gif);
padding: 8px 0 0 10px;
}

#menu9 li a:hover {
color: #FFF;
background: url(menu9.gif) 0 -32px;
padding: 8px 0 0 10px;
}
</style>

</head>

<body>
<!-- /* ----------------------- right Column -----------------------------------*/    -->
<div id="a" style="width: 100%; height: 100%; overflow: hidden; display: none;">
       <div id="menu9">
<ul>
<li><a href="form/form.php" title="Link 1">Nuevo Evento</a></li>
<li><a href="logout.php" title="Link 5">Salir</a></li>
</ul>
</div>
</div>

<!-- //////////////   right colum   ///////////////-->
<div id="b" style="width: 100%; height: 100%; overflow: auto; display: none;">

        <div id="titulo"><h1>Eventos de</h1></div>
        <br />
          <?php

           $sql="SELECT * FROM tb_eventos where idusuario= $id order by fecha_inicio, hora";
           $recurso=mysql_query($sql,$cn);
           $num_reg=mysql_num_rows($recurso);?>

            <table widht="100%" id="tabla"  cellspacing="5px">
                <tr id="titulos">
                    <td>Fecha de Inicio</td>
                    <td>Fecha de Termino</td>
                    <td>Hora</td>
                    <td>Asunto</td>
                    <td>Lugar</td>
                </tr>
           <?php
           $i=0;
           while ($arreglo=mysql_fetch_array($recurso) ){
                if($i==0){
                        $clase= "celda2";
                        $i=1;
                }else{
                        $clase= "celda1";
                        $i=0;
                }


           ?>
                <tr>
                    <td align="left" class="<?php echo $clase;?>"><?php echo $arreglo['fecha_inicio'];?></td>
                    <td align="left" class="<?php echo $clase;?>"><?php echo $arreglo['fecha_finaliza'];?></td>
                    <td align="left" class="<?php echo $clase;?>"><?php echo $arreglo['hora'];?></td>
                    <td align="left" class="<?php echo $clase;?>"><?php echo $arreglo['asunto'];?></td>
                    <td align="left" class="<?php echo $clase;?>"><?php echo $arreglo['lugar'];?></td>
                </tr>

           <?php } ?>
           </table>
</div>
<div id="c" style="width: 100%; height: 100%; overflow: auto; display: none;">
</div>
   <script>
	var dhxLayout1 = new dhtmlXLayoutObject(document.body, "3j");
    dhxLayout1.cells("a").hideHeader();
    dhxLayout1.cells("b").hideHeader();
    dhxLayout1.cells("c").hideHeader();
    dhxLayout1.cells("a").setWidth(195);
    dhxLayout1.cells("a").attachObject("a");
    dhxLayout1.cells("b").attachObject("b");
    dhxLayout1.cells("c").attachObject("c");
</script>
<script>

var dhxWins,
w1,

function cargar() {
    dhxWins = new dhtmlXWindows();
    dhxWins.enableAutoViewport(false);
    dhxWins.attachViewportTo("winVP");
    dhxWins.setImagePath("codebase/imgs/");
    w1 = dhxWins.createWindow("w1", 20, 30, 320, 240);
    w1.setText("dhtmlxWindow #1");
    w1.button("close").disable();

}
</script>
</body>
</html>