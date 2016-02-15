<?php 
error_reporting(1);
   include("../action/connect.php");
$step=$_POST['step'];
$id=$_POST['ide'];
//echo $step;
//echo $id;
$q="UPDATE projects SET install=$step WHERE id=$id";
$res=mysql_query($q);
//echo  mysql_error();
//echo  mysql_num_rows($res);
?>
