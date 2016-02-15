<?php
include("../../action/connect.php");
$value=$_POST['valu'];
$user=$_POST['user_id'];
$pid=$_POST['pid'];
$dat=$_POST['dat'];
if($value=="approved")
{
$q="INSERT INTO quote_manager(status,user_id, project_id,qdate) VALUES ('$value',$user,$pid,'$dat')";
$res=mysql_query($q);
if($res)
echo "Info saved";   
else
echo mysql_error();
}


if($value=="kickback")
{
$q="INSERT INTO quote_manager(status,user_id, project_id,qdate) VALUES ('$value',$user,$pid,'$dat')";
$res=mysql_query($q);
if($res)
echo "Info saved";   
else
echo mysql_error();
}
?>