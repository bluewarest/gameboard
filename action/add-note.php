<?php session_start(); error_reporting(0);
$leadId = strip_tags(trim($_POST['leadId']));
$subject = strip_tags(trim($_POST['subject']));
$note = addslashes(strip_tags(trim($_POST['note'])));
include("connect.php");
if(!empty($_FILES['attach-file']['name'])):
$fileTypes = array("doc","docx","xls","xlsx","pdf","jpg","png","gif","ppt","dwg","sw","zip","rar","mp4","mpeg4","mpg4");
$lowerUploadedFile = strtolower($_FILES['attach-file']['name']);//make sure uploaded file is lower case
$attachmentDir = "../dashboard/attachments/";
$fileNameArray = explode(".",$lowerUploadedFile);
$ext = end($fileNameArray);
$unique = substr(md5(microtime()),rand(0,26),8);
	if(in_array($ext,$fileTypes)):
	$newFileName = $unique."-".$leadId."-".$_SESSION['USER_LOGGED_IN']['Id'].".".$ext;
	$note = mysql_real_escape_string($note);
	$subject = mysql_real_escape_string($subject);
		if(move_uploaded_file($_FILES['attach-file']['tmp_name'],$attachmentDir.$newFileName)):
   
		$sql = mysql_query("INSERT INTO notes (lead_id, user_id, subject, note, attachments) VALUES ('".$leadId."','".$_SESSION['USER_LOGGED_IN']['Id']."','".$subject."', '".$note."','".$newFileName."')");
			if($sql):
			$_SESSION['ALLGOOD'] = time();
			sleep(2);
			header("location:../dashboard/leads/notes?ld=".$leadId."");
			else:
			//error recording record
			header("location:../dashboard/leads/notes?ld=".$leadId."");
			endif;
		else:
		//error moving file
		header("location:../dashboard/leads/notes?ld=".$leadId."");
		endif;
	else:
	$_SESSION['BADFILE'] = time();
echo 'bad file type';
	header("location:../dashboard/leads/notes?ld=".$leadId."");
	
	endif;
else:
// no attachment
$subject = mysql_real_escape_string($subject);
$note = mysql_real_escape_string($note);
$sql = mysql_query("INSERT INTO notes (lead_id, user_id, subject, note) VALUES ('".$leadId."','".$_SESSION['USER_LOGGED_IN']['Id']."','".$subject."','".$note."')");
	if($sql):
	$_SESSION['ALLGOOD'] = time();
	sleep(2);
	header("location:../dashboard/leads/notes?ld=".$leadId."");
	else:
	//error recording record
	endif;
endif;