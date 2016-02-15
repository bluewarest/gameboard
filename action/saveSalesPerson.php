<?php
include("connect.php");
$id = strip_tags(trim($_POST['id']));
$phone = strip_tags(stripslashes(trim($_POST['phone'])));
$phone = mysql_real_escape_string($phone);				
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
$assigned_to = strip_tags(stripslashes(trim($_POST['assigned_to'])));
$assigned_to = mysql_real_escape_string($assigned_to);
$sql = mysql_query("UPDATE users SET phone = '".$phone."', address = '".$address."', city = '".$city."', state = '".$state."', zipcode = '".$zipcode."', country = '".$country."' , assigned_to = '".$assigned_to."' WHERE id = '".$id."'");
sleep(1);

if($sql):
	header("location:../dashboard/sales-managers/s-person-profile?sp=".$id."");
	else:
	header("location:../dashboard/here");
	endif;