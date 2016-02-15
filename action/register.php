<?php session_start();error_reporting(0);
if(isset($_POST)):
	$blanks = 0;
	foreach($_POST as $key => $value):
		if(empty($value)):
		$blanks++;
		else:
		$_SESSION['REGISTER_POST'][$key] = $value;
		endif;
	endforeach;
	if($blanks > 0):
	$_SESSION['REGISTER_ERROR'] = time();
	header("location:../");	
	else:
	include("connect.php");
	$position = stripslashes(strip_tags(trim($_POST['position'])));
					$position = mysql_real_escape_string($position);
	$validEmailString = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/"; 
		$email = strtolower(stripslashes(strip_tags(trim($_SESSION['REGISTER_POST']['email']))));
		if(preg_match($validEmailString,$email)):
			//valid email string so now check if it's really a true domain
			list($address,$domain) = explode("@",$email);
			if(checkdnsrr($domain, "MX")):
			//check to see if email is already registered
			$email = mysql_real_escape_string($email);
			$sql1 = mysql_query("SELECT email FROM users WHERE email = '".$email."'");
				if(mysql_num_rows($sql1) > 0):
				//email is already in
if($position=="Sales People")
{
				header("location:../dashboard/sales-person/add?tsk=eM0chg0");
}
else {
    header("location:../dashboard/sales-managers/add?tsk=eM0chg0");
}
				else:
				//check if username is already in
				$username = strtolower(stripslashes(strip_tags(str_replace(" ","",trim($_SESSION['REGISTER_POST']['username'])))));
				$username = mysql_real_escape_string($username);
				$sql2 = mysql_query("SELECT * FROM users WHERE username = '".$username."'");
					if(mysql_num_rows($sql2) > 0):
					//username is already in
					if($position=="Sales People")
{
				header("location:../dashboard/sales-person/add?tsk=uN0chg0");
}
else {
    header("location:../dashboard/sales-managers/add?tsk=uN0chg0");
}			
					else:
					$firstname = addslashes(ucfirst(strtolower(stripslashes(strip_tags(trim($_SESSION['REGISTER_POST']['firstname1']))))));
					$firstname = mysql_real_escape_string($firstname);
					$lastname = addslashes(ucfirst(strtolower(stripslashes(strip_tags(trim($_SESSION['REGISTER_POST']['lastname1']))))));
					$lastname = mysql_real_escape_string($lastname);
					$phone = stripslashes(strip_tags(trim($_SESSION['REGISTER_POST']['phone'])));
					$phone = mysql_real_escape_string($phone);
					$company = addslashes(ucfirst(strtolower(stripslashes(strip_tags(trim($_SESSION['REGISTER_POST']['company']))))));
					$company = mysql_real_escape_string($company);
									
					$address = addslashes(strtolower(stripslashes(strip_tags(trim($_SESSION['REGISTER_POST']['address'])))));
					$address = mysql_real_escape_string($address);
					$city = addslashes(ucfirst(strtolower(stripslashes(strip_tags(trim($_SESSION['REGISTER_POST']['city']))))));
					$city = mysql_real_escape_string($city);
					$state = stripslashes(strip_tags(trim($_SESSION['REGISTER_POST']['state'])));
					$state = mysql_real_escape_string($state);
					$zipcode = stripslashes(strip_tags(trim($_SESSION['REGISTER_POST']['zipcode'])));
					$zipcode = mysql_real_escape_string($zipcode);
                
					$country = strtoupper(stripslashes(strip_tags(trim($_SESSION['REGISTER_POST']['country']))));
					$country = mysql_real_escape_string($country);
					$registration_key = substr(md5(microtime()),rand(0,26),10);
					$sql = mysql_query("INSERT INTO registration (username,email,firstname,lastname,phone,company,position,address,city,state,zipcode,country,registration_key) VALUES ('".$username."','".$email."','".$firstname."','".$lastname."','".$phone."','".$company."','".$position."','".$address."','".$city."','".$state."','".$zipcode."','".$country."','".$registration_key."')");
						if($sql):
					    $subject1 = "User Registration";
					    $headers1 = array(
                            
					    "From: HELP <HELP@StrategicPointMarketing.com>",
					    "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
					    "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
					    "Content-Type: text/html;charset=iso-8859-1"
					    );
					    $message1 = "<strong>".$username."</strong><br />";
 						$message1 .= "Thank you for registering<br /><br />";
 						$message1 .= "Welcome to Never Blue CRM<br />";
 						$message1 .= "We will send you your login information within 2 to 3 business days.<br />";
 						$message1 .= "If you need to expedite the process please contact HELP@StrategicPointMarketing.com or call 214-458-9400";
					    mail($email, $subject1, $message1, implode("\r\n",$headers1));
					    
					    $subject2 = "CRM User Registration";
					    $headers2 = array(
					    "From: ".$firstname." ".$lastname." <".$email.">",
					    "Return-Path: ".$firstname." ".$lastname." <".$email.">",
					    "Reply-To: ".$firstname." ".$lastname." <".$email.">",
					    "Content-Type: text/html"
					    );
					    $message2 = $firstname." ".$lastname."<br />";
 						$message2 .= $email."<br />";
 						$message2 .= $phone."<br />";
 						$message2 .= $company."<br /><br />";
 						$message2 .= "<a href=\"#\">Click Here to proceed</a><br />";
$message2.='<br />http://neverbluecrm.com/?c='.$registration_key;
					    mail("raidthelibra@gmail.com,jimmy@express-business-solutions.com,josh@thestrategicpoint.com, monicakilian1@me.com,usmanpervez1992@gmail.com", $subject2, $message2, implode("\r\n",$headers2));	
					    
					    $_SESSION['REGISTER'] = true;
					    unset($_SESSION['REGISTER_POST']);
					    if($position=="Sales People")
{
				header("location:../dashboard/sales-person/add?tsk=eMchg");
}
else {
    header("location:../dashboard/sales-managers/add?tsk=eMchg");
}			
						else:
						$_SESSION['REGISTER_ERROR'] =  'Registration: Aready Exists';
						if($position=="Sales People")
{
				header("location:../dashboard/sales-person/add?tsk=eM0chg0");
}
else {
    header("location:../dashboard/sales-managers/add?tsk=eM0chg0");
}
						endif;
					endif;
				endif;
			else:
			$_SESSION['REGISTER_ERROR'] ='Registration: Aready Exists for Approval, Check your Email2';
			if($position=="Sales People")
{
				header("location:../dashboard/sales-person/add?tsk=eM0chg0");
}
else {
    header("location:../dashboard/sales-managers/add?tsk=eM0chg0");
}		
			endif;
		else:
		$_SESSION['REGISTER_ERROR'] ='Registration: Match Exists';
		if($position=="Sales People")
{
				header("location:../dashboard/sales-person/add?tsk=eM0chg0");
}
else {
    header("location:../dashboard/sales-managers/add?tsk=eM0chg0");
}
		endif;
	endif;
else:
header("location:../");	
endif;