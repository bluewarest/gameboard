<?php session_start();error_reporting(0);
$newPassword = strip_tags(trim($_POST['password']));
$newPassword = sha1($newPassword);
include("connect.php");
$sql = mysql_query("UPDATE users SET password = '".$newPassword."' WHERE id = '".$_SESSION['USER_LOGGED_IN']['Id']."'");
	if($sql):
	$_SESSION['USER_LOGGED_IN']['Password'] = $newPassword;
	header("location:../dashboard/profile?tsk=pAchg");
	else:
	header("location:../dashboard/profile?tsk=pA0chg");
	endif;
?>