<?php session_start();error_reporting(0);
if(isset($_POST)):
$uname = strip_tags(stripslashes(strtolower(trim($_POST['uname']))));
$pass = strip_tags(trim($_POST['pass']));
include("connect.php");
$uname = mysql_real_escape_string($uname);
$pass = mysql_real_escape_string($pass);
$sql = mysql_query("SELECT * FROM users WHERE ((username = '".$uname."' && password = '".sha1($pass)."') || (email = '".$uname."' && password = '".sha1($pass)."'))");

	if(mysql_num_rows($sql) == 1):
	$row = mysql_fetch_array($sql);
		if($row['active'] == "Y"):
		$_SESSION['USER_LOGGED_IN']['Id'] = $row['id'];
		$_SESSION['USER_LOGGED_IN']['Email'] = $row['email'];
		$_SESSION['USER_LOGGED_IN']['Username'] = $row['username'];
		$_SESSION['USER_LOGGED_IN']['Password'] = sha1($pass);
		$_SESSION['USER_LOGGED_IN']['Firstname'] = $row['firstname'];
		$_SESSION['USER_LOGGED_IN']['Lastname'] = $row['lastname'];
		$_SESSION['USE3R_LOGGED_IN']['Phone'] = $row['phone'];
		$_SESSION['USER_LOGGED_IN']['Company'] = $row['company'];		
		$_SESSION['USER_LOGGED_IN']['Address'] = $row['address'];
		$_SESSION['USER_LOGGED_IN']['City'] = $row['city'];
		$_SESSION['USER_LOGGED_IN']['State'] = $row['state'];
		$_SESSION['USER_LOGGED_IN']['Zipcode'] = $row['zipcode'];
		$_SESSION['USER_LOGGED_IN']['Country'] = $row['country'];
		$_SESSION['USER_LOGGED_IN']['Avatar'] = $row['avatar'];
		$_SESSION['USER_LOGGED_IN']['Level'] = $row['level'];
		$_SESSION['USER_LOGGED_IN']['Idle'] = time();
        $company_name=mysql_query("SELECT * FROM company WHERE id='".$_SESSION['USER_LOGGED_IN']['Company']."'");
       // echo "Company name is";
       // var_dump($company_name);
        $row1 = mysql_fetch_array($company_name);
        $_SESSION['USER_LOGGED_IN']['Companyname'] = $row1['name'];

		$to = "Steve@SteveBlack.Co";
	    $subject = "LOGGED IN";
	    $who = $_SESSION['USER_LOGGED_IN']['Firstname']." ".$_SESSION['USER_LOGGED_IN']['Lastname'];
	    $headers = array(
	    "From: CRM <crm@strategicpointmarketing.com>",
	    "Return-Path: CRM <crm@strategicpointmarketing.com>",
	    "Reply-To: CRM <crm@strategicpointmarketing.com>",
	    "Content-Type: text/html"
	    );						
	    $mess = $who." has logged into site";
	    mail($to, $subject, $mess, implode("\r\n",$headers));
        include "../unc.php";
		header("location:".$unc."dashboard");		
		else:
		header("location:../?active=no");
		endif;
	else:

	header("location:../?login=failed");	
	endif;
else:
header("location:../");	
endif;