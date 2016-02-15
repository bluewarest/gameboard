<?php
include("../../action/connect.php");

$user_id=$_POST['user_id'];
$pid=$_POST['pid'];
$what=$_POST['what'];
$value=$_POST['value'];

$q="select * from inhouse_or_factory where project_id=$pid";
$res=mysql_query($q);
$num=mysql_num_rows($res);
if($num>0)
{
$q3="update inhouse_or_factory set ".$what."=$value where project_id=$pid";
}
else
{
$q3="insert into inhouse_or_factory (".$what.",user_id,project_id) VALUES (".$value.",$user_id,$pid)";
}

$res=mysql_query($q3);
if($res)
echo "info saved";
else
echo mysql_error();

?>