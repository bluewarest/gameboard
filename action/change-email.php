<?php session_start();error_reporting(0);
if($_POST):

include("connect.php");

$validEmailString = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/"; 
		$email = strtolower(stripslashes(strip_tags(trim($_POST['email']))));
		if(preg_match($validEmailString,$email)):
			//valid email string so now check if it's really a true domain
			list($address,$domain) = explode("@",$email);
			if(checkdnsrr($domain, "MX")):
			//check to see if email is already registered
			$email = mysql_real_escape_string($email);
			$sql1 = mysql_query("SELECT email FROM users WHERE email = '".$email."' and id!='".$_SESSION['USER_LOGGED_IN']['Id']."'");
                if(mysql_num_rows($sql1) > 0) {
                    header("location:../dashboard/profile?tsk=eM0chg0");
                    }
                else {
                        $sql = mysql_query("UPDATE users SET email = '".$email."' WHERE id = '".$_SESSION['USER_LOGGED_IN']['Id']."'");
	                   if($sql):
	                   $_SESSION['USER_LOGGED_IN']['Email'] = $email;
	                   header("location:../dashboard/profile?tsk=eMchg");
	                   else:
	                   header("location:../dashboard/profile?tsk=eM0chg");
	                   endif;
                    }
        else:
	       header("location:../dashboard/profile?tsk=eM0chg1");
        endif;
    else:
    header("location:../dashboard/profile?tsk=eM0chg2");
    endif;
else:
header("location:../dashboard/profile");
endif;	