<?php session_start();error_reporting(0);
$ogName = $_FILES['csvupload']['name'];
$csvDir = "../dashboard/csv/";
$max = (1048576 * 10);//10 meg in bytes
$ogName = strtolower($ogName);//make sure uploaded file is lower case
$fileNameArray = explode(".",$ogName);
$ext = end($fileNameArray);
if($ext == "csv"){
	$newFileName = str_replace(" ","",$fileNameArray[0]).time().'.csv';
	
	$move = move_uploaded_file($_FILES['csvupload']['tmp_name'],$csvDir.$newFileName);
	include("connect.php");
	
	$csvfile = $csvDir.$newFileName;
	$handle = fopen($csvfile, "r");
	
	$fh = fopen($csvDir.$newFileName,"r");
	$ftxt = fread($fh,25000);
	$contents = nl2br($ftxt);
	
	$lines = preg_split( '/\r\n|\r|\n/', $contents );
	
	$totalrows = count($lines);
	$tick = 1;
	for($i=1;$i<=$totalrows;$i++):
	$rowArray = explode(",",$lines[$i]);
	$data = explode(",",$lines[$i]);
	$columns = "";
		foreach($data as $key => $value):
		$columns .= "'".addslashes($value)."',";
		endforeach;
		$newcolumns = rtrim($columns,",'");
		
		//firstname	lastname	company	website	email	phone	cell	address	city	state	zipcode	country	origin	status
		
		
		$sql = "INSERT INTO leads(leadowner,firstname,lastname,company,website,email,phone,cell,address,city,state,zipcode,country,tags,origin,status) VALUES ('".$_SESSION['USER_LOGGED_IN']['Id']."',";
		$sql .= trim($newcolumns);
		$sql .= "');";
		$sql = strip_tags($sql);
		$qry = mysql_query($sql);
		if($qry):$tick++;endif;
	endfor;
	if($tick>0){unlink($csvfile);
	header("location:../dashboard/leads/upload?up=success");
	}else{
	header("location:../dashboard/leads/upload?up=error");
	}
}else{
header("location:../dashboard/leads/upload?up=error");
}