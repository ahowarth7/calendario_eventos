<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"> 
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>Forms</title>
    <link rel="stylesheet" href="iphone.css" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
	<script type="text/javascript">
	function clickclear(thisfield, defaulttext) {
	if (thisfield.value == defaulttext) {
	thisfield.value = "";
	}
	}
	function clickrecall(thisfield, defaulttext) {
	if (thisfield.value == "") {
	thisfield.value = defaulttext;
	}
	}

	</script>

	<script type="text/javascript" charset="utf-8">
		window.onload = function() {
		  setTimeout(function(){window.scrollTo(0, 1);}, 100);
		}
	</script>
<style>
body{
        background-image: url(../../bg_page.jpg);
	    background-repeat:repeat-x;
}
</style>
</head>

<body>
<div id="header">
		<h1>Captura de eventos</h1>
</div>
<form name="form_evento" action="guardar.php" method="POST">
<?php ?>
<script type="text/javascript" src="calendarDateInput.js"></script>
<div class="form">
<b>Fecha de Inicio:</b>
<script>DateInput('fecha_inicia', true, 'YYYY-MM-DD')</script>
<br />
<b>Fecha de Termino:</b>
<script>DateInput('fecha_finaliza', true, 'YYYY-MM-DD')</script>

<br />
<b>Hora del Evento:</b>
<br />
    <SELECT face="consola" NAME=hora class="form">
    <option value="hora" selected="selected">Hora</option>
    <?php
    for($i=1;$i<=24;$i++)
        {
    		   	    echo '<OPTION value="'.$i.'">'.$i.'</option>';
        }
    ?>
    </SELECT>
    :
    <select id="lol" NAME=minutos class="form">
        <option value="minuto" selected="selected">Minutos</option>
	    <option value ="00">00</option>
	    <option value ="15">15</option>
        <option value ="30">30</option>
        <option value ="45">45</option>

    </select>
</div>
<ul class="form">
	<li><input type="text" name="asunto" value="Asunto" id="some_name" onclick="clickclear(this, 'Asunto')" onblur="clickrecall(this,'Asunto')"  /></li>
</ul>
<ul class="form">
    <li><input type="text" name="Lugar" value="Lugar" id="some_name" onclick="clickclear(this, 'Lugar')" onblur="clickrecall(this,'Lugar')"  /></li>
</ul>
<ul class="form">
    <li><input type="text" name="Descripcion" value="Descripcion" id="some_name" onclick="clickclear(this, 'Descripcion')" onblur="clickrecall(this,'Descripcion')"  /></li>
</ul>
<ul class="form">
    <li><input type="text" name="Responsable" value="Responsable" id="some_name" onclick="clickclear(this, 'Responsable')" onblur="clickrecall(this,'Responsable')"  /></li>
</ul>
<ul class="form">
    <li><input type="text" name="asiste" value="Quien Asiste?" id="some_name" onclick="clickclear(this, 'Quien Asiste?')" onblur="clickrecall(this,'Quien Asiste?')"  /></li>
</ul>
<ul class="form">
	<li><textarea name="notas" onclick="clickclear(this, 'Notas')" onblur="clickrecall(this,'Notas')">Notas</textarea></li>
</ul>
<ul class="individual">
	<li>
    <input type="hidden" name="<?php $usuario=$_SESSION['username'];?>" value="<?php $usuario=$_SESSION['username'];?>" >
    <input type="submit" name="enviar" value="Enviar" class="form"/></li>
</ul>

</form>
</body>
</html>