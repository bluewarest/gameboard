<?php session_start(); error_reporting(0);

$noteId = trim($_POST['noteId']);
$leadId = trim($_POST['leadId']);
$subject = addslashes(strip_tags(trim($_POST['subject'])));
$note = addslashes(strip_tags(trim($_POST['note'])));

include("connect.php");
if(!empty($_FILES['attach-file']['name'])):
$fileTypes = array("doc","docx","xls","xlsx","pdf","jpg","dwg","png");
$lowerUploadedFile = strtolower($_FILES['attach-file']['name']);//make sure uploaded file is lower case
$attachmentDir = "../dashboard/attachments/";
$fileNameArray = explode(".",$lowerUploadedFile);
$ext = end($fileNameArray);
$unique = substr(md5(microtime()),rand(0,26),8);
	if(in_array($ext,$fileTypes)):
	//$newFileName = $unique."-".$leadId."-".$_SESSION['USER_LOGGED_IN']['Id'].".".$ext;
$newFileName = $lowerUploadedFile;
$newFileName = str_replace(' ', '_', $newFileName);
	$note = mysql_real_escape_string($note);
	$subject = mysql_real_escape_string($subject);
		if(move_uploaded_file($_FILES['attach-file']['tmp_name'],$attachmentDir.$newFileName)):
		$qry = mysql_query("SELECT attachments FROM notes WHERE note_id = '".$noteId."'");
		$record = mysql_fetch_array($qry);

			if(empty($record['attachments'])):
			$sql = mysql_query("UPDATE notes SET attachments = '".$newFileName."', subject = '".$subject."', note = '".$note."', modified = CURRENT_TIMESTAMP WHERE note_id = '".$noteId."'");
			else:
			$sql = mysql_query("UPDATE notes SET attachments = '".$record['attachments'].",".$newFileName."', subject = '".$subject."', note = '".$note."', modified = CURRENT_TIMESTAMP WHERE note_id = '".$noteId."'");
			endif;

			if($sql):
			sleep(2);
			header("location:../dashboard/leads/note?nt=".$noteId."");
			else:
			//error recording record
			header("location:../dashboard/leads/note?nt=".$noteId."");
			endif;
		else:
		//error moving file
		header("location:../dashboard/leads/note?nt=".$noteId."");
		endif;
	else:
	$_SESSION['BADFILE'] = time();
	header("location:../dashboard/leads/note?ns=0&nt=".$noteId."");
	echo 'bad file type';
	endif;
else:
// no attachment
$subject = mysql_real_escape_string($subject);
$note = mysql_real_escape_string($note);
$sql = mysql_query("UPDATE notes SET subject = '".$subject."', note = '".$note."', modified = CURRENT_TIMESTAMP WHERE note_id = '".$noteId."'");
sleep(2);
header("location:../dashboard/leads/note?ns=1&nt=".$noteId."");
endif;
