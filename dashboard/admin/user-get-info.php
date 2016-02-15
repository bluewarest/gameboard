<?php
include("../../action/connect.php");
$ans="";
$q="select * from checklists";
$res=mysql_query($q); 
while($data=mysql_fetch_array($res))
{
$ans[]=$data;
}

print_r($ans);

?>