<?php
/*
if(1):
$connect = mysql_connect("localhost","panoras2_rayed","Rayed123");
mysql_select_db("panoras2_gameboard",$connect);
//if($connect):echo 'connected';else:echo 'not connected';endif;
elseif($_SERVER['SERVER_NAME'] == "localhost"):
$connect = mysql_connect("localhost","panoras2_rayed","Rayed123");
mysql_select_db("panoras2_gameboard",$connect);//if($connect):echo 'connected';else:echo 'not connected';endif;
endif;*/
?>
<?php

if(1):
$connect = mysql_connect("localhost","root","");
mysql_select_db("gameboard",$connect);
/*if($connect):echo 'connected1';else:echo 'not connected';endif;*/
/*elseif($_SERVER['SERVER_NAME'] == "localhost"):
$connect = mysql_connect("localhost","panoras2_rayed","Rayed123");
mysql_select_db("panoras2_crmdev",$connect);//if($connect):echo 'connected';else:echo 'not connected';endif;*/
endif;
?>