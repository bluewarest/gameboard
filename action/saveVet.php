<?php
ini_set('display_errors',1);  error_reporting(E_ALL);

include("connect.php");
$id = strip_tags(trim($_POST['id']));$lid = strip_tags(trim($_POST['lead_id']));
var_dump($_POST);
if($_POST['vet']=="old"):
foreach($_POST as $key => $value):
			
		$value = strip_tags(trim($value));
		$value = mysql_real_escape_string($value);
		$sql = mysql_query("UPDATE vet SET ".$key." = '".$value."' WHERE id = '".$id."'");	
		
	
endforeach;

else:
if(!isset($_POST['exp'])){
$_POST['exp']='';
}
if(!isset($_POST['products'])){
$_POST['products']='';
}
if(!isset($_POST['use_prod'])){
$_POST['use_prod']='';
}
if(!isset($_POST['installations'])){
$_POST['installations']='';
}
$ins = mysql_query("INSERT INTO vet (lead_id,work,current_project,exp,current_work,projects,products,prod_perc,res_perc,custom_work,use_prod,brand,long_work,geo,median,installations,resources) VALUES ('".$_POST['lead_id']."','".$_POST['work']."','".$_POST['current_project']."','".$_POST['exp']."','".$_POST['current_work']."','".$_POST['projects']."','".$_POST['products']."'
,'".$_POST['prod_perc']."','".$_POST['res_perc']."','".$_POST['custom_work']."','".$_POST['use_prod']."','".$_POST['brand']."','".$_POST['long_work']."','".$_POST['geo']."','".$_POST['median']."','".$_POST['installations']."','".$_POST['resources']."')");
if (!$ins) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}
endif;

sleep(1);
header("location:../dashboard/leads/vet?ld=".$lid."");