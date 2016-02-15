<?php session_start(); 
if($_POST):
$current = strip_tags(trim($_POST['current-password']));
$current = sha1($current);
	if($current == $_SESSION['USER_LOGGED_IN']['Password']){
	echo 'y';
	}else{
	echo 'n';
	};
else:
header("location:../");
endif;