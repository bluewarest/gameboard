<?php
include "../unc.php";
include "../../unc.php";
session_start();
if(isset($_SESSION['USER_LOGGED_IN'])):
	if( ($_SESSION['USER_LOGGED_IN']['Idle'] + (60*60)) < time()):
	unset($_SESSION['USER_LOGGED_IN']);
	session_destroy($_SESSION['USER_LOGGED_IN']);
	$_SESSION['IDLE'] = time();
	header("location:../../");
	else:
	$_SESSION['USER_LOGGED_IN']['Idle'] = time();
	endif;
else:
header("location:".$unc."");
endif;

setlocale(LC_MONETARY, 'en_US');
/*
$segments = explode("/",$_SERVER['REQUEST_URI']);
$which = $segments[3];
$what = $segments[4];
*/
?>
<!DOCTYPE html>
<html lang="en">
<head><title>GameBoard</title>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="WeDevz" />
<meta name="author" content="Rayed Naveed Bajwa WeDevz" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen, print, projection" href="<?php echo $unc; ?>stylesheets/minify.php" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



</head>
<body>
<noscript><style>#site{display:none;}#jsNotice{padding:20px;color:#FFF;background:#0083A9;text-align:center;font-size:22px;}</style>
<div id="jsNotice"><img src="<?php echo $unc; ?>img/spm-logo.png" alt="" /><br /><br />JavaScript is required for this website<br />Please enable it then refresh this page</div></noscript>
<div id="site">
