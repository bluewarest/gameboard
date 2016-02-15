<?php session_start();error_reporting(0);
if($_POST):
$username = addslashes(strtolower(stripslashes(strip_tags(trim($_POST['username'])))));
$email = addslashes(strtolower(stripslashes(strip_tags(trim($_POST['email'])))));
$firstname = ucfirst(addslashes(strtolower(stripslashes(strip_tags(trim($_POST['firstname']))))));
$lastname = ucfirst(addslashes(strtolower(stripslashes(strip_tags(trim($_POST['lastname']))))));
$phone = strip_tags(trim($_POST['phone']));
$company = ucfirst(addslashes(strtolower(stripslashes(strip_tags(trim($_POST['company']))))));
$position = strip_tags(trim($_POST['position']));
$address = ucfirst(addslashes(strtolower(stripslashes(strip_tags(trim($_POST['address']))))));
$city = ucfirst(addslashes(strtolower(stripslashes(strip_tags(trim($_POST['city']))))));
$state = strip_tags(trim($_POST['state']));
$zipcode = strip_tags(trim($_POST['zipcode']));
$country = addslashes(strtoupper(stripslashes(strip_tags(trim($_POST['country'])))));
$password = substr(md5(microtime()),rand(0,26),8);
$key = trim($_POST['k']);
	if($position == "Sales Manager"):
	$level = 2;
	elseif($position == "Sales People"):
	$level = 3;
elseif($position == "CEO"):
	$level = 1;
	endif;
include("connect.php");
$insert = mysql_query("INSERT INTO users (email, username, password, firstname, lastname, phone, company, position, address, city, state, zipcode, country, level) VALUES ('".$email."','".$username."','".sha1($password)."','".$firstname."','".$lastname."','".$phone."', '".$company."','".$position."', '".$address."', '".$city."', '".$state."', '".$zipcode."', '".$country."','".$level."')");
	if($insert):
$user_id =mysql_insert_id();
mysql_query("UPDATE company set ceo_name='".$user_id."' where id='".$company."'");
	mysql_query("DELETE FROM registration WHERE registration_key = '".$key."'");
    $subject1 = "User Registration Approved";
     $headers1 = array(
                            
					    "From: HELP <HELP@StrategicPointMarketing.com>",
					    "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
					    "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
					    "Content-Type: text/html;charset=iso-8859-1"
					    );
    $message1 = "<strong>Welcome to Never Blue CRM.</strong><br />";
	$message1 .= "To login, please go to: http://gameboard.neverbluecrm.com/ and type your username and password as indicated below:<br />";
	$message1 .= "Username: ".$email."<br />";
	$message1 .= "Password: ".$password."<br />";
    $to_field=$email.","."raidthelibra@gmail.com,usmanpervez1992@gmail.com,jimmy@express-business-solutions.com,josh@thestrategicpoint.com,monicakilian1@me.com,jbornamann@gmail.com";
    mail($to_field, $subject1, $message1, implode("\r\n",$headers1));
    $_SESSION['APPROVAL_DONE'] = true;
	header("location:../appDone.php");
	endif;
else:
header("location:../");
endif;