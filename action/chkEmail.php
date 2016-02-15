<?php
$validEmailString = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/";
$chkEmail = stripslashes(strip_tags(trim($_POST['email'])));
if(preg_match($validEmailString,$chkEmail)):
list($address,$domain) = explode("@",$chkEmail);
	if(checkdnsrr($domain, "MX")):
	include("../action/connect.php");
	$chkEmail = mysql_real_escape_string($chkEmail);
	$sql = mysql_query("SELECT email FROM users WHERE email = '".$chkEmail."'");
		if(mysql_num_rows($sql) == 1):
		//email already in
		echo 'y';
		endif;
	else:
	echo 'invalidEmail';
	endif;
else:
echo 'bad';
endif;