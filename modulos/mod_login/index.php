<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Login y Logout de usuarios con PHP y Ajax</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<script type="text/javascript" src="jquery.js"></script>

<script>
$('form1').click(function(){
    $('form1#login_userbttn').submit();
});
</script>
<style>
body{
        background-image: url(../bg_page.jpg);
	    background-repeat:repeat-x;
}

</style>

</head>
<body>
<div id="allContent"><table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%"><tr><td align="center" valign="middle" height="100%" width="100%">

    <div id="alertBoxes"></div>
    <span class="loginBlock"><span class="inner">
    <form method="post" name="form1" action="modulos/mod_login/checklogin.php">
		<table cellpadding="0" cellspacing="0" border="0" valign="middle" >
			<tr>
				<td>Usuario:</td>
				<td><input type="text" name="myusername" id="login_username" /></td>
			</tr>
			<tr>
				<td>Contrase&ntilde;a:</td>
				<td><input type="password" name="mypassword" id="login_userpass" /></td>
			</tr>
			<tr>
				<td colspan="2" align="right">

                <button id="login_userbttn">Login</button></td>
			</tr>
		</table>
	</form>


		</span></span>
</td></tr></table></div></body>
</html>