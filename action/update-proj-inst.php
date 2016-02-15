<?php

session_start();error_reporting(1);
if($_POST['update-project']  
   && strlen($_POST['name'])>0 
  && strlen($_POST['d2'])>0
  && strlen($_POST['sales'])>0
  && strlen($_POST['type'])>0
  && strlen($_POST['bid'])>0):

$name = stripslashes(strip_tags(trim($_POST['name'])));
$id = stripslashes(strip_tags(trim($_POST['project-id'])));
$description = stripslashes(strip_tags(trim($_POST['description'])));
$d1=$_POST['d1'];
$d2=$_POST['d2'];
$sales=$_POST['sales'];
$type=$_POST['type'];
$bid=$_POST['bid'];
$step=$_POST['xtep'];
$ass=$_POST['assigned-to'];
$due=$_POST['due-date'];


include("connect.php");
$firstname = mysql_real_escape_string($firstname);
$description = mysql_real_escape_string($description);
$status=$_POST['staa'];
$sql="";
if(strlen($status)>2)
{
$sql = mysql_query("UPDATE  projects SET initial_date='$d1',last_date='$d2',sales_rep='$sales',product_type='$type',product_bid='$bid',status='$status',name='$name',description='$description',assigned_to='$ass',due_date='$due' where id=$id");
}
else
{
$sql = mysql_query("UPDATE  projects SET initial_date='$d1',last_date='$d2',sales_rep='$sales',product_type='$type',product_bid='$bid',name='$name',description='$description',assigned_to='$ass',due_date='$due' where id=$id");
}
if($sql):
	header("location:../dashboard/install.php?update-proj=success");
	else:
	header("location:../dashboard/install.php?update-proj=fail");
	endif;
	
else:

header("location:../dashboard/install.php?error=incomplete");
/*echo 'not picking post';var_dump($_POST);*/
endif;
?>