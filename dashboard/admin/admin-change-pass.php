<?php
include("../../action/connect.php");
$pass=$_POST['pass'];
$id=$_POST['id'];
$new = sha1($pass);
$query ="UPDATE users SET password='$new' WHERE id=$id ";
$res=mysql_query($query);
if($res)
{
echo "Password Changed!!";
}
else
{
echo mysql_error();
}
?>