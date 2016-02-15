<?php session_start(); error_reporting(0);
if($_POST):
$firstname = stripslashes(strip_tags(trim($_POST['firstname1'])));
$lastname = stripslashes(strip_tags(trim($_POST['lastname1'])));
$company = stripslashes(strip_tags(trim($_POST['company'])));
$title = stripslashes(strip_tags(trim($_POST['title'])));
$email = stripslashes(strip_tags(trim($_POST['email'])));
$phone = stripslashes(strip_tags(trim($_POST['phone'])));
$cell = stripslashes(strip_tags(trim($_POST['cell'])));
$tags = stripslashes(strip_tags(trim($_POST['tags'])));
$origin = stripslashes(strip_tags(trim($_POST['origin'])));
$status = stripslashes(strip_tags(trim($_POST['status'])));

include("connect.php");
$firstname = mysql_real_escape_string($firstname);
$lastname = mysql_real_escape_string($lastname);
$company = mysql_real_escape_string($company);
$title = mysql_real_escape_string($title);
$email = mysql_real_escape_string($email);
$phone = mysql_real_escape_string($phone);
$cell = mysql_real_escape_string($cell);
$tags = mysql_real_escape_string($tags);
$origin = mysql_real_escape_string($origin);
$status = mysql_real_escape_string($status);
if($_SESSION['USER_LOGGED_IN']['Level']=='3')
{
    $sql = mysql_query("INSERT INTO leads (leadowner, firstname, lastname, company, email, phone, status, cell, tags, origin, assigned_to, added) VALUES ('".$_SESSION['USER_LOGGED_IN']['Id']."', '".$firstname."','".$lastname."','".$company."','".$email."','".$phone."','".$status."','".$cell."','".$tags."','".$origin."','".$_SESSION['USER_LOGGED_IN']['Id']."', CURRENT_TIMESTAMP)");
}
else {
$sql = mysql_query("INSERT INTO leads (leadowner, firstname, lastname, company, email, phone, status, cell, tags, origin, added) VALUES ('".$_SESSION['USER_LOGGED_IN']['Id']."', '".$firstname."','".$lastname."','".$company."','".$email."','".$phone."','".$status."','".$cell."','".$tags."','".$origin."', CURRENT_TIMESTAMP)");
}
	if($sql):
	header("location:../dashboard/leads/quick?tsk=lDadded");
	else:
	header("location:../dashboard/leads/quick?tsk=lDfail");
	endif;
	
else:
header("location:../dashboard");
endif;