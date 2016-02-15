<?php
$id=$_POST['id'];
include("../../action/connect.php");
$q="delete from users where id=$id";
$res=mysql_query($q); 
if($res)
echo "User Deleted sucessfully!";    
else
echo "Error Deleting user:".mysql_error();
?>