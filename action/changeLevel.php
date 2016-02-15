<?php
$userid = strip_tags(trim($_POST['id']));
$access = strip_tags(trim($_POST['level']));
include("connect.php");
$userid = mysql_real_escape_string($userid);
$access = mysql_real_escape_string($access);
$sql = mysql_query("UPDATE users SET level = '".$access."' WHERE id = '".$userid."'");
if($sql):
echo 'changed';
else:
echo 'no change';
endif;
