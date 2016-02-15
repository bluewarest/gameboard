<?php
include("connect.php");
session_start();error_reporting(1);
if($_POST['add-project'] 
   && strlen($_POST['name'])>0 
  && strlen($_POST['d2'])>0
  && strlen($_POST['sales'])>0
  && strlen($_POST['bid'])>0):

$firstname = stripslashes(strip_tags(trim($_POST['name'])));
$description = stripslashes(strip_tags(trim($_POST['description'])));
$firstname = mysql_real_escape_string($firstname);
$description = mysql_real_escape_string($description);
$id=$_SESSION['USER_LOGGED_IN']['Id'];

$dd1=$_POST['d1']; $dd1=explode("/",$dd1); $d1=$dd1[0]."/".$dd1[2]."/".$dd1[1];
$dd2=$_POST['d2']; $dd2=explode("/",$dd2); $d2=$dd2[0]."/".$dd2[2]."/".$dd2[1];
$sales=$_POST['sales'];
$bid=$_POST['bid'];
$page=$_POST['page'];
$type1=$_POST['t1'];
$type2=$_POST['t2'];
$sss=0;

if($page=="est")
{
        $res=mysql_query("SELECT * FROM est_heading Limit 1");
        $arr=mysql_fetch_array($res);
        $sss=$arr['id'];
}



$sql = mysql_query("INSERT INTO projects (name,description,user_id,initial_date,last_date,sales_rep,product_bid,status,est_step,type1,type2) VALUES ('$firstname','$description','$id','$d1','$d2','$sales','$bid','open',$sss,'$type1','$type2')");
//echo "INSERT INTO 'projects' (name,desc,user_id) VALUES ('$firstname','$description','".$_SESSION['USER_LOGGED_IN']['Id']."')";

if($sql):

echo $message;

	//header("location:../dashboard?save-project=success");
	else:
$err=mysql_error();
	header("location:../dashboard?save-project=fail$err");
	endif;
	
else:
header("location:../dashboard?error=incomplete");
/*echo 'not picking post';var_dump($_POST);*/
endif;
?>