<?php

include("../../action/connect.php");
$des="";
$id=$_POST['id'];
$what=$_POST['what'];
$type=$_POST['type'];
if($what=="heading")///////
{ echo "if";
$q1="select * from $type where id=$id";
$sql1=mysql_query($q1);
$res1=mysql_fetch_array($sql1); $rid=$res1['name'];
$q2="delete from $type where id=$id";
$res2=mysql_query($q2);
if($type=="est_heading"){$des="est_checklists";}   
 if($type=="rd_heading"){$des="rd_checklists";} if($type=="dra_heading"){$des="dra_checklists";} 
 if($type=="ins_heading"){$des="ins_checklists";} if($type=="pro_heading"){$des="pro_checklists";} 

$q3="delete from $des where wheree='$rid'";
$res3=mysql_query($q3);  
echo mysql_error();
echo "Deleted sucessfully!";    
}//end delete heading//////






if($what=="checklist")//////
{
$q2="delete from $type where id=$id"; echo $q2;
$res2=mysql_query($q2);
echo "Deleted sucessfully!";
}//end delete checklist/////



?>