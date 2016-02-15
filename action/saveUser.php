<?php
include("connect.php");
$id = strip_tags(trim($_POST['id']));
foreach($_POST as $key => $value):
$value = strip_tags(trim($value));
$value = mysql_real_escape_string($value);
$sql = mysql_query("UPDATE users SET ".$key." = '".$value."' WHERE id = '".$id."'");
endforeach;
sleep(1);
header("location:../dashboard/users/user?id=".$id."");