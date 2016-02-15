<?php session_start();error_reporting(0);
if($_POST):
$phone = stripslashes(strip_tags(trim($_POST['phone'])));
$fax = stripslashes(strip_tags(trim($_POST['fax'])));
$firstname = stripslashes(strip_tags(trim($_POST['firstname1'])));
$lastname = stripslashes(strip_tags(trim($_POST['lastname1'])));
include("connect.php");
$phone = mysql_real_escape_string($phone);
$fax = mysql_real_escape_string($fax);
$firstname = mysql_real_escape_string($firstname);
$lastname = mysql_real_escape_string($lastname);

$sql = mysql_query("UPDATE users SET phone = '".$phone."', fax = '".$fax."', firstname = '".$firstname."', lastname = '".$lastname."' WHERE id = '".$_SESSION['USER_LOGGED_IN']['Id']."'");
	if($sql):
	$_SESSION['USER_LOGGED_IN']['Phone'] = $phone;
	$_SESSION['USER_LOGGED_IN']['Fax'] = $fax;
	$_SESSION['USER_LOGGED_IN']['Firstname'] = $firstname;
    $_SESSION['USER_LOGGED_IN']['Lastname'] = $lastname;
	header("location:../dashboard/profile?tsk=pHchg");
	else:
	header("location:../dashboard/profile?tsk=pH0chg");
	endif;
else:
header("location:../dashboard/profile");
endif;	