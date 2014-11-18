<?php
ob_start();
session_start();
include('../mod_conexion/conexion_bd.php');
$tbl_name="tb_cuentas"; // Table name



// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
// encrypt password
$mypassword=md5($mypassword);

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql,$cn);
$a=mysql_fetch_array($result);
$_SESSION['username']= $myusername;
$_SESSION['id_usuario']= $a['idcuenta'];
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword");

header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>