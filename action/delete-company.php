<?php session_start();error_reporting(0);
$cid = strip_tags(trim($_GET['cp']));
if(is_numeric($cid) && ($cid > 0) ):
include("connect.php");
$sql = mysql_query("Delete from company WHERE id = '".$cid."'");
	if($sql):
	header("location:../dashboard/company/view?tsk=pAchg");
	else:
	header("location:../dashboard/company/view?tsk=pA0chg");
	endif;
endif;
?>