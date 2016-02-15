<?php error_reporting(0);
$userId = strip_tags(trim($_POST['usrId']));
$newPassword = strip_tags(trim($_POST['password']));
$newPassword = sha1($newPassword);
include("connect.php");
$sql = mysql_query("UPDATE users SET password = '".$newPassword."' WHERE id = '".$userId."'");
	if($sql):
   header("location:../dashboard/users/user.php?id=$userId&tsk=pAchg");
	else:
 header("location:../dashboard/users/user.php?id=$userId&tsk=pA0chg");
	endif;
?>