<?php session_start();error_reporting(0);
if(isset($_POST)):
	//create SESSION GLOBALS just in case of errors, to pre-populate the form fields on redirect
	foreach($_POST as $key => $value):
	$_SESSION['REGISTER_POST'][$key] = $value;
	endforeach;
	if($_POST['password'] != $_POST['password_confirm']):
	//passwords don't match
	$_SESSION['REGISTER_ERROR']['PasswordsNoMatch'] = time();
	header("location:../");
	elseif(strlen(trim($_POST['password'])) < 8):
	$_SESSION['REGISTER_ERROR']['PassToShort'] = time();
	header("location:../");	
	else:
		$password = str_replace(" ","",trim($_POST['password']));
		$validEmailString = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/"; 
		$email = strtolower(strip_tags(stripslashes(trim($_POST['email']))));
		if(preg_match($validEmailString,$email)):
			//valid email string so now check if it's really a true domain
			list($address,$domain) = explode("@",$email);
			if(checkdnsrr($domain, "MX")):
			//email domain does exist so continue
				//check to see if email is already registered
				include("connect.php");
				$email = mysql_real_escape_string($email);
				$sql1 = mysql_query("SELECT email FROM users WHERE email = '".$email."'");
				if(mysql_num_rows($sql1) > 0):
				//email is already in
				$_SESSION['REGISTER_ERROR']['EmailAlreadyIn'] = $email;
				header("location:../");
				else:
				//now check if username is already in
				$username = strtolower(strip_tags(stripslashes(str_replace(" ","",trim($_POST['username'])))));
				$username = mysql_real_escape_string($username);
					$sql2 = mysql_query("SELECT FROM users WHERE username = '".$username."'");
					if(mysql_num_rows($sql2) > 0):
					//username is already in
					$_SESSION['REGISTER_ERROR']['UsernameAlreadyIn'] = $username;
					header("location:../");					
					else:
					//all is good to this point so scrub the remaining elements and prepare for database
					$password = mysql_real_escape_string($password);
					$firstname = strip_tags(stripslashes(trim($_POST['firstname'])));
					$firstname = mysql_real_escape_string($firstname);
					$lastname = strip_tags(stripslashes(trim($_POST['lastname'])));
					$lastname = mysql_real_escape_string($lastname);
					$phone = strip_tags(stripslashes(str_replace(" ","",trim($_POST['phone']))));
					$phone = mysql_real_escape_string($phone);
					
					//should revisit this since they want this done way to fast
					//just going to insert the following
					$company = strip_tags(stripslashes(trim($_POST['company'])));
					$company = mysql_real_escape_string($company);					
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
					
					$activation_key = time();				
					//end
					
					$insert = mysql_query("INSERT INTO users (email, username, password, firstname, lastname, phone, company, address, city, state, zipcode, country, activate_key) VALUES ('".$email."','".$username."','".sha1($password)."','".$firstname."','".$lastname."','".$phone."', '".$company."', '".$address."', '".$city."', '".$state."', '".$zipcode."', '".$country."', '".$activation_key."')");
						if($insert):
						//unset REGISTER_ERROR then go back to database to get new ID and create login SESSION and then redirect to Dashboard
						unset($_SESSION['REGISTER_ERROR']);
						unset($_SESSION['REGISTER_POST']);

							//include("badEmailChk.cphp");
							//if(in_array($email,$badEmail) == true):
							//
							//else:
							$_SESSION['REG_SUCCESS'] = true;
							$urlAdmin = "http://crm.spm-sites.com/authorize?ath=".$activation_key."&level=Admin";
							$urlManager = "http://crm.spm-sites.com/authorize?ath=".$activation_key."&level=Manager";
							$urlSales = "http://crm.spm-sites.com/authorize?ath=".$activation_key."&level=Sales";
							$urlWebmaster = "http://crm.spm-sites.com/authorize?ath=".$activation_key."&level=Webmaster";
							
							
							$messageTXT = "New user registration done. Name: ".$firstname.' '.$lastname."<br />Email address [".$email."]<br /><br />";
							
							$messageTXT .= "TO GRANT ADMIN LEVEL CLICK OR TAP THIS LINK<br />";
							$messageTXT .= $urlAdmin;
							$messageTXT .= "<br /><br />";
							
							$messageTXT .= "TO GRANT ADMIN LEVEL CLICK OR TAP THIS LINK<br />";
							$messageTXT .= $urlManager;
							$messageTXT .= "<br /><br />";
							
							$messageTXT .= "TO GRANT ADMIN LEVEL CLICK OR TAP THIS LINK<br />";
							$messageTXT .= $urlSales;
							$messageTXT .= "<br /><br />";
							
							$messageTXT .= "TO GRANT ADMIN LEVEL CLICK OR TAP THIS LINK<br />";
							$messageTXT .= $urlWebmaster;
							$messageTXT .= "<br />";
							
							$to = "Steve@SteveBlack.Co, josh@thestrategicpoint.com, monica@strategicpointmarketing.com";
						    $subject = "Message from CRM site";
						    $headers = array(
						    "From: ".$firstname." <".$email.">",
						    "Return-Path: ".$firstname." <".$email.">",
						    "Reply-To: ".$firstname." <".$email.">",
						    "Content-Type: text/html"
						    );						
						    mail($to, $subject, $messageTXT, implode("\r\n",$headers));
						    //endif;
					    
						header("location:../");
						
						else:
						//unknown error
						echo 'An error occurred. Please notify Steve Black.';
						exit();
						endif;
					endif;
				endif;
			else:
			$_SESSION['REGISTER_ERROR']['NoEmailDomain'] = time();
			header("location:../");
			endif;
		else:
		//NOT valid
		$_SESSION['REGISTER_ERROR']['EmailNotValid'] = time();
		header("location:../");		
		endif;
	endif;
else:
header("location:../");		
endif;