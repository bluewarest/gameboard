<?php session_start();error_reporting(0);
if($_FILES['profile-pic']['name'] && isset($_SESSION['USER_LOGGED_IN']['Username'])):
$newFileName = $_SESSION['USER_LOGGED_IN']['Username'].".jpg";
$pictureDir = "../dashboard/profiles/";
$min = 15744;//15 K in bytes
$max = 1048576;//1 meg in bytes
$lowerUploadedFile = strtolower($_FILES['profile-pic']['name']);//make sure uploaded file is lower case
$fileNameArray = explode(".",$lowerUploadedFile);
$ext = end($fileNameArray);
	if($ext == "jpg"):
		//if($_FILES['profile-pic']['size'] < $min):
		//header("Location:../dashboard/profile?err=img_too_small");
		//else:
			//if($_FILES['profile-pic']['size'] > $max):
			//header("location:../dashboard/profile?err=img_too_large");
			//else:
			//all is good with pic here so first check to see if there's already a file for user and delete it
			$allImgsInDir = scandir($pictureDir);
				foreach($allImgsInDir as $value):
					if($value == $newFileName):
						unlink($pictureDir.$newFileName);
					endif;
				endforeach;
				//next move file to profiles folder, update avatar column in database if needed, update SESSION
				if(move_uploaded_file($_FILES['profile-pic']['tmp_name'],$pictureDir.$newFileName)):
				include("connect.php");
				$sql = mysql_query("SELECT avatar FROM users WHERE id = '".$_SESSION['USER_LOGGED_IN']['Id']."'");
				$row = mysql_fetch_array($sql);
					if($row['avatar'] == "N"):
					$update = mysql_query("UPDATE users SET avatar = 'Y' WHERE id = '".$_SESSION['USER_LOGGED_IN']['Id']."'");
					$_SESSION['USER_LOGGED_IN']['Avatar'] = "Y";
					endif;
					if($_SESSION['USER_LOGGED_IN']['Avatar'] == "N"):
					$_SESSION['USER_LOGGED_IN']['Avatar'] = "Y";
					endif;
					sleep(2);
				header("location:../dashboard/profile");
				else:
				header("location:../dashboard/profile?err=unknown");
				endif;				
			//endif;
		//endif;	
	else:
	header("location:../dashboard/profile?err=bad_file_type");
	endif;
else:
header("location:../dashboard/profile");
endif;