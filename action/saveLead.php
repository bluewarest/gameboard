<?php
include("connect.php");
$id = strip_tags(trim($_POST['id']));
$newEntries = array("competitor","name");
$compTable = array("competitor","url");
foreach($_POST as $key => $value):
	if(in_array($key,$newEntries)):
		if($key == "competitor" && !empty($value)):
		$value = strip_tags(trim($value));
		$value = mysql_real_escape_string($value);
		$url = str_replace("http://","",str_replace("https://","",strip_tags(trim($_POST['url']))));
		$url = mysql_real_escape_string($url);
		$ins = mysql_query("INSERT INTO competitors (lead_id,competitor,url) VALUES ('".$id."','".$value."','".$url."')");
		elseif($key == "name" && !empty($value)):
		$value = strip_tags(trim($value));
		$value = mysql_real_escape_string($value);
		$relationship = strip_tags(trim($_POST['relationship']));
		$info = strip_tags(trim($_POST['info']));
		$dob_month = strip_tags(trim($_POST['dob_month']));
		$dob_day = strip_tags(trim($_POST['dob_day']));
		$dob_year = strip_tags(trim($_POST['dob_year']));
		$relationship = mysql_real_escape_string($relationship);
		$info = mysql_real_escape_string($info);
		$dob_month = mysql_real_escape_string($dob_month);
		$dob_day = mysql_real_escape_string($dob_day);
		$dob_year = mysql_real_escape_string($dob_year);
		$ins = mysql_query("INSERT INTO family (lead_id,name,relationship,info,dob_month,dob_day,dob_year) VALUES ('".$id."','".$value."','".$relationship."','".$info."','".$dob_month."','".$dob_day."','".$dob_year."')");
		endif;
	else:
		if(preg_match('/[0-9]+/', $key)):		
		$combo = explode("-",$key);
		$value = strip_tags(trim($value));
		$value = mysql_real_escape_string($value);
			if(in_array($combo[0],$compTable)):
			$sql = mysql_query("UPDATE competitors SET ".$combo[0]." = '".$value."' WHERE id = '".$combo[1]."'");
			else:
			$sql = mysql_query("UPDATE family SET ".$combo[0]." = '".$value."' WHERE id = '".$combo[1]."'");
			endif;
		else:
		$value = strip_tags(trim($value));
		$value = mysql_real_escape_string($value);
		$sql = mysql_query("UPDATE leads SET ".$key." = '".$value."' WHERE id = '".$id."'");	
		endif;	
	endif;
endforeach;
sleep(1);
header("location:../dashboard/leads/lead?ld=".$id."");