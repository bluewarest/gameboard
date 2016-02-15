<?php
include("../../action/connect.php");
if(isset($_POST['data']))
{
$dataa=$_POST['data'];
$type=$_POST['type'];
$pid=$_POST['pid'];
$u=$_POST['user_id'];
$q="select * from admin_data where id2=$dataa and typee=$type and user_id=$u and project_id=$pid";
$res=mysql_query($q); $ans="";
$data=mysql_fetch_array($res);
    
$q2="select * from additional_email where id2=$dataa and type=$type";
$res2=mysql_query($q2);
$data2=mysql_fetch_array($res2);    
    
$ans=$data['assigned_to'].'*'.$data['who_completed'].'*'.$data['emails'].'*'.$data['defaultt'].'*'.$data['due_date'].'*'.$data2['email'].'*'.$data['extra'];
echo $ans;
}

if(isset($_POST['getusers']))
{
    $ans="";
$q="select * from users";
$res=mysql_query($q);
while($d=mysql_fetch_array($res))
{
$ans=$ans.$d['id'].",".$d['firstname']." ".$d['lastname'].'*';
}
echo $ans;    
}

?>