<?php
include("connect.php");
$id = strip_tags(trim($_POST['id']));
/*$phone = strip_tags(stripslashes(trim($_POST['phone'])));
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
$country = mysql_real_escape_string($country);*/
$ceo = strip_tags(stripslashes(trim($_POST['ceo'])));
$ceo = mysql_real_escape_string($ceo);
$companyname = strip_tags(stripslashes(trim($_POST['companyname'])));
$companyname = mysql_real_escape_string($companyname);
$sql = mysql_query("UPDATE company SET ceo_name = '".$ceo."', name = '".$companyname."' WHERE id = '".$id."'");
sleep(1);

if($sql):
	header("location:../dashboard/company/company-profile?cp=".$id."");
	else:
	header("location:../dashboard/here");
	endif;