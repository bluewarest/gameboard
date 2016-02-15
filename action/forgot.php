<?php
include("connect.php");
$email =$_POST['forget-email'];
$sql = mysql_query("SELECT * FROM users WHERE email = '".$email."' ");
  $row = mysql_fetch_array($sql);
if(mysql_num_rows($sql)==1){
       $encrypt = md5(""+$row['id']);
            $message = "Your password reset link sent to your e-mail address.";
            $to=$email.',raidthelibra@gmail.com';
            $subject="Forget Password";
            $headers = array(
                            
					    "From: Password Reset <HELP@StrategicPointMarketing.com>",
					    "Return-Path: Password Reset <HELP@StrategicPointMarketing.com>",
					    "Reply-To: Password Reset <HELP@StrategicPointMarketing.com>",
					    "Content-Type: text/html;charset=iso-8859-1"
					    );
            $body='Hi , Your Username is '.$row['username'].' Click here to reset your password http://gameboard.neverbluecrm.com/action/reset.php?encrypt='.$encrypt.'&action=reset';
            
            //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to,$subject,$body,implode("\r\n",$headers));
header("location:./../index.php?email=success");
}
else
{
header("location:./../index.php?email=fail");  
}
?>