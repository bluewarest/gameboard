<?php error_reporting(0);
$levelsArray = array("Admin","Manager","Sales","Webmaster");
$level = stripslashes(strip_tags(trim($_GET['level'])));
$activation_key = stripslashes(strip_tags(trim($_GET['ath'])));
if(in_array($levelsArray,$level) && is_numeric($activation_key)):
include("action/connect.php");
	switch($level):
		case "Admin":
		$level = 1;
		break;
		case "Manager":
		$level = 2;
		break;
		case "Sales":
		$level = 3;
		break;
		case "Webmaster":
		$level = 4;
		break;			
	endswitch;
$update = mysql_query("UPDATE users SET level = '".$level."' WHERE activate_key = '".$activation_key."'");
	if($update):
	echo 'User Access Updated';
	else:
	echo 'User Access NOT Updated because you chose Sales, which is the default, or someone else already authorized this user.';
	endif;
else:	
header("location:/");
endif;