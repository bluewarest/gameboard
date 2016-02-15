<?php session_start(); error_reporting(0);
if($_POST):
$firstname = stripslashes(strip_tags(trim($_POST['firstname1'])));
$lastname = stripslashes(strip_tags(trim($_POST['lastname1'])));
$company = stripslashes(strip_tags(trim($_POST['company'])));
$title = stripslashes(strip_tags(trim($_POST['title'])));
$email = stripslashes(strip_tags(trim($_POST['email'])));
$phone = stripslashes(strip_tags(trim($_POST['phone'])));
$ext = stripslashes(strip_tags(trim($_POST['ext'])));
$cell = stripslashes(strip_tags(trim($_POST['cell'])));
$address = stripslashes(strip_tags(trim($_POST['address'])));
$address1 = stripslashes(strip_tags(trim($_POST['address1'])));
$city = stripslashes(strip_tags(trim($_POST['city'])));
$state = stripslashes(strip_tags(trim($_POST['state'])));
$zipcode = stripslashes(strip_tags(trim($_POST['zipcode'])));
$tags = stripslashes(strip_tags(trim($_POST['tags'])));
$origin = stripslashes(strip_tags(trim($_POST['origin'])));
$country = stripslashes(strip_tags(trim($_POST['country'])));
//$notes = stripslashes(strip_tags(trim($_POST['notes'])));
//$origin = stripslashes(strip_tags(trim($_POST['origin'])));
$status = stripslashes(strip_tags(trim($_POST['status'])));
include("connect.php");
$firstname = mysql_real_escape_string($firstname);
$lastname = mysql_real_escape_string($lastname);
$company = mysql_real_escape_string($company);
$title = mysql_real_escape_string($title);
$email = mysql_real_escape_string($email);
$phone = mysql_real_escape_string($phone);
$ext = mysql_real_escape_string($ext);
$cell = mysql_real_escape_string($cell);
$address = mysql_real_escape_string($address);
$address1 = mysql_real_escape_string($address1);
$city = mysql_real_escape_string($city);
$state = mysql_real_escape_string($state);
$zipcode = mysql_real_escape_string($zipcode);
$tags = mysql_real_escape_string($tags);
$origin = mysql_real_escape_string($origin);
$country = mysql_real_escape_string($country);
//$notes = mysql_real_escape_string($notes);
//$origin = mysql_real_escape_string($origin);
$status = mysql_real_escape_string($status); 
if($_SESSION['USER_LOGGED_IN']['Level']=='3')
{
$sql = mysql_query("INSERT INTO leads (leadowner,assigned_to, firstname, lastname, company, title, email, phone, ext, cell, address, address1, city, state, zipcode, country, status, tags, origin, added) VALUES ('".$_SESSION['USER_LOGGED_IN']['Id']."','".$_SESSION['USER_LOGGED_IN']['Id']."', '".$firstname."','".$lastname."','".$company."','".$title."','".$email."','".$phone."','".$ext."','".$cell."','".$address."','".$address1."','".$city."','".$state."','".$zipcode."','".$country."','".$status."','".$tags."','".$origin."', CURRENT_TIMESTAMP)");
}
else {
$sql = mysql_query("INSERT INTO leads (leadowner, firstname, lastname, company, title, email, phone, ext, cell, address, address1, city, state, zipcode, country, status, tags, origin, added) VALUES ('".$_SESSION['USER_LOGGED_IN']['Id']."', '".$firstname."','".$lastname."','".$company."','".$title."','".$email."','".$phone."','".$ext."','".$cell."','".$address."','".$address1."','".$city."','".$state."','".$zipcode."','".$country."','".$status."','".$tags."','".$origin."', CURRENT_TIMESTAMP)");
}
//var_dump($sql);
	if($sql):
	header("location:../dashboard/leads/add?tsk=lDadded");
	else:
	header("location:../dashboard/leads/add?tsk=lDfail");
	endif;
	
else:
header("location:../dashboard");
endif;