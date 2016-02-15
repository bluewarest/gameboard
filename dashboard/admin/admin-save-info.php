<?php
include("../../action/connect.php");
session_start();
$query="";
$at=$_POST['assignedto']; if($at=="Select"){$at=00;};
$wc=$_POST['whocomplete'];
$e=$_POST['emails'];
$ae=$_POST['a-email'];
$q=$_POST['query'];
$dd=$_POST['dd'];
$type=$_POST['type'];
//$default=$_POST['default']; $v=0;
$user_id=$_POST['user_id'];
$pid=$_POST['pid'];
$extra=$_POST['extra'];
//if($default==true){ $v=1;} $v=1;
//*******************************************//
$qn="select * from admin_data where user_id=$user_id and project_id=$pid and id2=$q and typee=$type"; 
$num=mysql_query($qn); $nums=mysql_num_rows($num);
if($nums==0)
{ $query="insert into admin_data (emails,assigned_to,who_completed,id2,project_id,user_id,due_date,typee,extra) values ('$e','$at','$wc',$q,$pid,$user_id,'$dd',$type,'$extra')";   }
else 
{$query="update admin_data set extra='$extra', emails='$e' , assigned_to='$at', who_completed='$wc',project_id=$pid ,due_date='$dd',user_id=$user_id where id2=$q and typee=$type and user_id=$user_id and project_id=$pid"; }


//************************* send email to assigned person ***********************************//
$eq="select * from users where id=$at";
$ex=mysql_query($eq);
$rex=mysql_fetch_array($ex);
$email=$rex['email'];
$name=$rex['firstname']." ".$rex['lastname'];
$whoassigned=$_SESSION['USER_LOGGED_IN']['Firstname']." ".$_SESSION['USER_LOGGED_IN']['Lastname'];
 $actionitem=""; $tyy="";
if($type==1)
{
$r0=mysql_query("select * from est_checklists where id=$q");
$ob0=mysql_fetch_array($r0);
$actionitem=$ob0['name'];
$tyy="Estimating.";
}
if($type==2)
{
$r0=mysql_query("select * from rd_checklists where id=$q");
$ob0=mysql_fetch_array($r0);
$actionitem=$ob0['name'];
$tyy="Receive Deposit.";
}
if($type==3)
{
$r0=mysql_query("select * from dra_checklists where id=$q");
$ob0=mysql_fetch_array($r0);
$actionitem=$ob0['name'];
$tyy="Drafting.";
}
if($type==4)
{
$r0=mysql_query("select * from pro_checklists where id=$q");
$ob0=mysql_fetch_array($r0);
$actionitem=$ob0['name'];
$tyy="Production.";
}
if($type==5)
{
$r0=mysql_query("select * from ins_checklists where id=$q");
$ob0=mysql_fetch_array($r0);
$actionitem=$ob0['name'];
$tyy="Installation.";
}

$qk=mysql_query("select * from projects where id=$pid");
$qq=mysql_fetch_array($qk);
$project=$qq['name'];

$message = '<html><body>';
$message=$message."<b>Hello ".$name."</b><br>";
$message=$message."Action Item : ".$actionitem."<br>";
$message=$message."<b>".$whoassigned."</b>  has assigned a task <b>".$actionitem."</b> from Project <b>".$project."</b>, in phase <b>".$tyy."</b> And due date is ".$dd."<br>";
$message=$message."To view on Gameboard click <a href='http://gameboard.neverbluecrm.com/' target='_blank'>here</a>";
$message=$message.'</body></html>';

$subject = 'New Action Item Assigned';
$headers = "CC: jimmy@express-business-solutions.com   \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if(!mail($email,$subject,$message,$headers))
{
echo 'System was not able to handle the email for lead updates';  
}
//********************************************************************************************//

$k0="select * from additional_email where type=$type and id2=$q"; 
$kr=mysql_query($k0); $kn=mysql_num_rows($kr);
if($kn<1)
{
$k="INSERT INTO additional_email(email, type, id2) VALUES ('$ae',$type,$q)";
}
else
{
$k="UPDATE additional_email SET email='$ae' where type=$type and id2=$q";
}

 $r=mysql_query($k);
$res=mysql_query($query);
if($res && $r)
{
echo "Info saved!";
}
else
{
echo mysql_error();
}

?>