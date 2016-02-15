<?php

session_start();error_reporting(1);
if($_POST['update-project']  
   && strlen($_POST['name'])>0 
  && strlen($_POST['bid'])>0):

$name = stripslashes(strip_tags(trim($_POST['name'])));
$id = stripslashes(strip_tags(trim($_POST['project-id'])));
$description = stripslashes(strip_tags(trim($_POST['description'])));
$sales=$_POST['sales'];
$bid=$_POST['bid'];
//$step=$_POST['xtep'];
$reason=$_POST['reason'];
$type1=$_POST['t1'];
$type2=$_POST['t2'];


include("connect.php");
$firstname = mysql_real_escape_string($firstname);
$description = mysql_real_escape_string($description);
$status=$_POST['staa'];
$sql="";
if(strlen($status)>2)
{
$sql = mysql_query("UPDATE  projects SET type1='$type1',type2='$type2',product_bid='$bid',status='$status',reason='$reason',name='$name',description='$description' where id=$id");
}
else
{
$sql = mysql_query("UPDATE  projects SET 
type1='$type1',type2='$type2',product_bid='$bid',name='$name',description='$description' where id=$id");
}
if($sql):
	header("location:../dashboard?update-proj=success");
	else:
	header("location:../dashboard?update-proj=fail");
	endif;
	
else:

header("location:../dashboard?error=incomplete");
/*echo 'not picking post';var_dump($_POST);*/
endif;
?>