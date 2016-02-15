<?php
$chkUsername = stripslashes(strip_tags(trim($_POST['username'])));
include("../action/connect.php");
$chkUsername = mysql_real_escape_string($chkUsername);
$sql = mysql_query("SELECT username FROM users WHERE username = '".$chkUsername."'");
if(mysql_num_rows($sql) == 1):
echo 'y';
endif;