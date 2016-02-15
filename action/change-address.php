<?php session_start();error_reporting(0);
if($_POST):
include("connect.php");
$company = strip_tags(stripslashes(trim($_POST['company'])));
$company = mysql_real_escape_string($company);					
$address = strip_tags(stripslashes(trim($_POST['address'])));
$address = mysql_real_escape_string($address);
$city = strip_tags(stripslashes(trim($_POST['city'])));
$city = mysql_real_escape_string($city);
$state = strip_tags(stripslashes(trim($_POST['state'])));
$state = mysql_real_escape_string($state);
$zipcode = strip_tags(stripslashes(trim($_POST['zipcode'])));
$zipcode = mysql_real_escape_string($zipcode);
$country = strip_tags(stripslashes(trim($_POST['country'])));
$country = mysql_real_escape_string($country);
$sql = mysql_query("UPDATE users SET company = '".$company."', address = '".$address."', city = '".$city."', state = '".$state."', zipcode = '".$zipcode."', country = '".$country."' WHERE id = '".$_SESSION['USER_LOGGED_IN']['Id']."'");
	if($sql):
	$_SESSION['USER_LOGGED_IN']['Company'] = $company;		
	$_SESSION['USER_LOGGED_IN']['Address'] = $address;
	$_SESSION['USER_LOGGED_IN']['City'] = $city;
	$_SESSION['USER_LOGGED_IN']['State'] = $state;
	$_SESSION['USER_LOGGED_IN']['Zipcode'] = $zipcode;
	$_SESSION['USER_LOGGED_IN']['Country'] = $country;
	header("location:../dashboard/profile?tsk=aDchg");
	else:
	header("location:../dashboard/profile?tsk=aD0chg");
	endif;
else:
header("location:../dashboard/profile");
endif;