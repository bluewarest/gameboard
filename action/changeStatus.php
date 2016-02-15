<?php //echo 'steve';
include("connect.php");
		$sql = mysql_query("SELECT * FROM leads WHERE leadowner = '".$_SESSION['USER_LOGGED_IN']['Id']."' AND deleted = 'N'");

//return $sql;
print_r($sql);
//header("location:../dashboard/leads/view");