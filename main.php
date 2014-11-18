<?php
include("modulos/mod_conexion/conexion_bd.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Calendario de Eventos 3.0 - CONALEP</title>
<link rel='stylesheet' type='text/css' href='modulos/mod_login/stylesheet.css' />
<link rel="stylesheet" type="text/css" href="css/main.css" />
         <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
<!-- ##############################     Crea Calendario    #################################################-->
    <link rel='stylesheet' type='text/css' href='modulos/mod_calendario/fullcalendar/fullcalendar.css' />
    <link rel='stylesheet' type='text/css' href='modulos/mod_calendario/fullcalendar/fullcalendar.print.css' media='print' />
    <script type='text/javascript' src='modulos/mod_calendario/jquery/jquery-1.5.2.min.js'></script>
    <script type='text/javascript' src='modulos/mod_calendario/jquery/jquery-ui-1.8.11.custom.min.js'></script>
    <script type='text/javascript' src='modulos/mod_calendario/fullcalendar/fullcalendar.min.js'></script>
    <script type='text/javascript'>

	    $(document).ready(function() {
		$('#calendar').fullCalendar({
//--------------------------------------------------------------- Secciones que tendra en el encabezado #
editable: true,
		    header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
            slotMinutes: 30,
          minTime : 8,
          maxTime : 21,
//--------------------------------------------------------------- Si sera editable en calendario #
    	editable: false,
//--------------------------------------------------------------- carga datos de la base de datos #
		   //	events: "json-events.php",
                events:"modulos/mod_calendario/eventos.php",

			eventDrop: function(event, delta) {
				alert(event.title + ' was moved ' + delta + ' days\n' +
					'(should probably update your database)');
			},
			loading: function(bool) {
				if (bool) $('#loading').show();
				else $('#loading').hide();
			}
		});
	});
</script>


<!-- ##############################     Hoja de Estilos    #################################################-->
<style>
/* ----------------------- Calendario de eventos -----------------------------------*/

    #loading {
		position: absolute;
		top: 5px;
		right: 5px;
		}
	#calendar {
		width: 760px;
		margin: 0 auto;
        background-color: #ffffff;
		}
    #tit{
        text-align: center;
		font-size: 14px;;
        background: #9d1f23;
        color: #eeeded;
        text-shadow: 1px 1px 0 #000;
        padding: 5px 10px 5px 10px;
    }
    #login{
        text-align: left;
		font-size: 16px;
    }
    #direcciones{
        text-align: center;
		font-size: 10px;
        color: #000;
        text-shadow: 1px 1px 0 #eee;

    }


</style>
<script type="text/javascript">
$(document).ready(function(){
$(".acceso").click(function() {

$("#wrapper").load('modulos/mod_login/index.php');
});
});

</script>
</head>

<body>
<!-- Begin Header -->
  <div id="header">
         <span class="logo"><a href="http://" target="_blank"><img src="img/icon.conalep.png" alt="CONALEP" /></a></span>
		 <span>Calendario de Eventos</span>

        <ul id="plain-links">
        	<li ><a href="#" class="acceso">Acesso</a></li>
        	<li><a href="http://choicethemes.com/contact-us/">Contactanos</a></li>
        	<li><a href="http://choicethemes.com/support/">Soporte</a></li>
        	<li><a href="http://choicethemes.com/about-us/">Acerca de</a></li>
            <li class="omega"><a href="main.php">Inicio</a></li>
        </ul>

  </div>

<!-- End Header -->
   <!-- Begin Wrapper -->
   <div id="wrapper">

		 <!-- Begin Left Column -->
		 <div id="leftcolumn">
         <div id="a"></div>
         <div id="tit"><span>PLANTELES&nbsp;CONALEP</span> </div>
         <br />

         <?php
         $sql="SELECT * FROM tb_direcciones";
         $recurso=mysql_query($sql,$cn);
         $num_reg=mysql_num_rows($recurso);
         while ($arreglo=mysql_fetch_array($recurso) ){
         ?>
            <table widht="100%" id="direcciones" >
                <tr>
                    <td width="10px" style="background-color: #<?php echo $arreglo['cod_color'];?>"></td>
                    <td align="left">&nbsp;<?php echo $arreglo['nom_direccion'];?></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </table>
           <?php } ?>
		 </div>
		 <!-- End Left Column -->

		 <!-- Begin Right Column -->

		 <div id="rightcolumn">

	          <div id='calendar'></div>

		 </div>
		 <!-- End Right Column -->

   </div>
   <!-- End Wrapper -->
 <!-- Begin Footer -->
		 <div id="footer">

			   Copyright © 2011 - CONALEP&nbsp;Q.ROO. Todos los derechos reservados.
               <br />
               Colegio de Educación Profesional Técnica del Estado de Quintana Roo
               <br />
               Administración 2011 - 2016
               <br />
               www.conalepquintanaroo.edu.mx

	     </div>
	 <!-- End Footer -->
</body>
</html>
