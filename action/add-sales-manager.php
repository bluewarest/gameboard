<?php
if($_POST):
$firstname = stripslashes(strip_tags(trim($_POST['firstname'])));
$lastname = stripslashes(strip_tags(trim($_POST['lastname'])));
$email = stripslashes(strip_tags(trim($_POST['email'])));
$phone = stripslashes(strip_tags(trim($_POST['phone'])));
include("connect.php");
$firstname = mysql_real_escape_string($firstname);
$lastname = mysql_real_escape_string($lastname);
$email = mysql_real_escape_string($email);
$phone = mysql_real_escape_string($phone);
$sql = mysql_query("INSERT INTO sales_managers (first_name, last_name, email, phone) VALUES ('$firstname','$lastname','$email','$phone')");
echo $sql;

	if($sql):
	header("location:../dashboard/sales-managers/add?tsk=lDadded");
	else:
	header("location:../dashboard/sales-managers/add?tsk=lDfail");
	endif;
	
else:
header("location:../dashboard");
endif;
?>