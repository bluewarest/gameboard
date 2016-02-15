<?php 
error_reporting(1);
   include("../action/connect.php");
$id=$_POST['i'];
//echo $step;
//echo $id;
$q="Delete from projects WHERE id=$id"; $q2="delete from admin_data where project_id=$id"; $q3="delete from boxes_info where project=$id";
$res=mysql_query($q); $res2=mysql_query($q2); $res3=mysql_query($q3);
if($res)
echo 1;
else
echo 0;
//echo  mysql_error();
//echo  mysql_num_rows($res);
?>
