<?php
include("../../action/connect.php");
session_start();
$action=$_POST['action'];
$dataa=$_POST['data'];
$type=$_POST['type'];
$user_id=$_SESSION['USER_LOGGED_IN']['Id'];
$pid=$_POST['pid'];
$user_query=mysql_query("select * from users where id=$user_id");
$userr=mysql_fetch_array($user_query);
$user=$userr['firstname']." ".$userr['lastname'];



            if($action=='add')
            {   $created_date = date("Y-m-d H:i:s"); $name=$_SESSION['USER_LOGGED_IN']['Firstname']." ".$_SESSION['USER_LOGGED_IN']['Lastname'];
                $query="INSERT INTO boxes_info(type,user,project,id2,timee,user_name) VALUES ($type,$user_id,$pid,$dataa,'$created_date','$name')";
                $res=mysql_query($query);
                if($res)
                {
                echo "info saved";
                //********************** Send Email ***********************************//
                        $user_query=mysql_query("select * from users where id=$user_id");
                        $userr=mysql_fetch_array($user_query);
                        $user=$userr['firstname']." ".$userr['lastname'];
                    
                        if($type==1)
                        {
                        $msg_query=mysql_query("select * from est_checklists where id=$dataa");
                        $msgg=mysql_fetch_array($msg_query);
                        $msg="Estamating Checklist > ".$msgg['name']; 
                                                //------------------------------------------------------------------------------------//
                                                        $r1=mysql_query("select * from est_heading"); $count=0;  $need=mysql_num_rows($r1); $xx=0;
                                                        while($f1=mysql_fetch_array($r1))
                                                        { $xx++;      $n1=$f1['name'];
                                                                $r2=mysql_query("select * from est_checklists where wheree='$n1'"); $num=mysql_num_rows($r2);
                                                                while($f2=mysql_fetch_array($r2))
                                                                { $id2=$f2['id'];
                                                                    $q="select * from boxes_info where type=1 and project=$pid and id2=$id2"; 
                                                                    $r3=mysql_query($q); 
                                                                     if(mysql_num_rows($r3)==1)
                                                                     {
                                                                     $count++;
                                                                     }
                                                                
                                                                }
                                                                if($num==$count && $xx<$need)
                                                                {  
                                                                $ii=$f1['id'];
                                                                $n=mysql_query("SELECT * FROM est_heading WHERE id>$ii limit 1");
                                                                $nn=mysql_fetch_array($n);               
                                                                $next = $nn['id'];
                                                                $r4=mysql_query("update projects set est_step=$next where id=$pid");
                                                                }
                                                                if($num==$count && $xx==$need)
                                                                {     //insert into drafting
                                                                 $admin_verify=0;
                                                                        //check if qupte_manager status is approved then move to next step
                                                            $qm="select * from quote_manager where project_id=$pid order by id desc Limit 1";
                                                                        $rqm=mysql_query($qm); $rrr=mysql_fetch_array($rqm);
                                                                    //check if admin also approved this?
                                                                    $qm2="select * from quote_manager where project_id=$pid and typ='admin' order by id desc Limit 1";
                                                                        $rqm2=mysql_query($qm2); $rrr2=mysql_fetch_array($rqm2); 
                                                                        if($rrr2['status']=="approved")
                                                                        { $admin_verify=1; } else { $admin_verify=0; };
                                                                        if($rrr["status"]=="approved" && $admin_verify==1)
                                                                        {
                                                                        //######################Send mail for phase change ##############################//
                                                                            $subject = "Project Moved to Next Stage!";
                                                                            $headers = array(
                                                                            "From: Gameboard <HELP@StrategicPointMarketing.com>",
                                                                            "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
                                                                            "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
                                                                            "Content-Type: text/html;charset=iso-8859-1"
                                                                            );
                                                                            $message = "<strong>Project Moved to Receive Deposit Stage from Estimating.</strong><br />";
                                                                            mail('bluewarestemp@gmail.com', $subject, $message, implode("\r\n",$headers));
                                                                        //############################################################################//
                                                                        $q6="select * from rd_heading limit 1";
                                                                        $r6=mysql_query($q6);
                                                                        $a6=mysql_fetch_array($r6);
                                                                        $i6=$a6['id'];
                                                                        $r5=mysql_query("update projects set rd_step=$i6 where id=$pid"); 
                                                                        $r6=mysql_query("update projects set est_step=0 where id=$pid");
                                                                        }
                                                                  
                                                                }
                                                                $count=0; 
                                                        
                                                        
                                                        }//while $f1
                                                //-----------------------------------------------------------------------------//
                        }
                        if($type==2)
                        {
                        $msg_query=mysql_query("select * from rd_checklists where id=$dataa");
                        $msgg=mysql_fetch_array($msg_query);
                        $msg="Receive Deposit Checklist > ".$msgg['name'];
                                                        //------------------------------------------------------------------------------------//
                                                        $r1=mysql_query("select * from rd_heading"); $count=0;  $need=mysql_num_rows($r1); $xx=0;
                                                        while($f1=mysql_fetch_array($r1))
                                                        { $xx++;      $n1=$f1['name'];
                                                                $r2=mysql_query("select * from rd_checklists where wheree='$n1'"); $num=mysql_num_rows($r2);
                                                                while($f2=mysql_fetch_array($r2))
                                                                { $id2=$f2['id'];
                                                                    $q="select * from boxes_info where type=2 and project=$pid and id2=$id2"; 
                                                                    $r3=mysql_query($q); 
                                                                     if(mysql_num_rows($r3)==1)
                                                                     {
                                                                     $count++;
                                                                     }
                                                                
                                                                }
                                                                if($num==$count && $xx<$need)
                                                                {  
                                                                $ii=$f1['id'];
                                                                $n=mysql_query("SELECT * FROM rd_heading WHERE id>$ii limit 1");
                                                                $nn=mysql_fetch_array($n);               
                                                                $next = $nn['id'];
                                                                $r4=mysql_query("update projects set rd_step=$next where id=$pid");
                                                                }
                                                                if($num==$count && $xx==$need)
                                                                {     //insert into production
                                                                $q6="select * from dra_heading limit 1";
                                                                $r6=mysql_query($q6);
                                                                $a6=mysql_fetch_array($r6);
                                                                $i6=$a6['id'];
                                                                $r5=mysql_query("update projects set dra_step=$i6 where id=$pid"); 
                                                                $r6=mysql_query("update projects set rd_step=0 where id=$pid");
                                                                    //######################Send mail for phase change ##############################//
                                                                            $subject = "Project Moved to Next Stage!";
                                                                            $headers = array(
                                                                            "From: Gameboard <HELP@StrategicPointMarketing.com>",
                                                                            "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
                                                                            "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
                                                                            "Content-Type: text/html;charset=iso-8859-1"
                                                                            );
                                                                            $message = "<strong>Project Moved to Drafting from Receive Deposit Stage.</strong><br />";
                                                                            mail('bluewarestemp@gmail.com', $subject, $message, implode("\r\n",$headers));
                                                                        //############################################################################//
                                                                    
                                                                }
                                                                $count=0; 
                                                        
                                                        
                                                        }//while $f1
                                                //-----------------------------------------------------------------------------//
                        }
                        if($type==3)
                        {
                        $msg_query=mysql_query("select * from dra_checklists where id=$dataa");
                        $msgg=mysql_fetch_array($msg_query);
                        $msg="Drafting Checklist > ".$msgg['name'];
                                                                //------------------------------------------------------------------------------------//
                                                        $r1=mysql_query("select * from dra_heading"); $count=0;  $need=mysql_num_rows($r1); $xx=0;
                                                        while($f1=mysql_fetch_array($r1))
                                                        { $xx++;      $n1=$f1['name'];
                                                                $r2=mysql_query("select * from dra_checklists where wheree='$n1'"); $num=mysql_num_rows($r2);
                                                                while($f2=mysql_fetch_array($r2))
                                                                { $id2=$f2['id'];
                                                                    $q="select * from boxes_info where type=3 and project=$pid and id2=$id2"; 
                                                                    $r3=mysql_query($q); 
                                                                     if(mysql_num_rows($r3)==1)
                                                                     {
                                                                     $count++;
                                                                     }
                                                                
                                                                }
                                                                if($num==$count && $xx<$need)
                                                                {  
                                                                $ii=$f1['id'];
                                                                $n=mysql_query("SELECT * FROM dra_heading WHERE id>$ii limit 1");
                                                                $nn=mysql_fetch_array($n);               
                                                                $next = $nn['id'];
                                                                $r4=mysql_query("update projects set dra_step=$next where id=$pid");
                                                                }
                                                                if($num==$count && $xx==$need)
                                                                {     //insert into production
                                                                $q6="select * from pro_heading limit 1";
                                                                $r6=mysql_query($q6);
                                                                $a6=mysql_fetch_array($r6);
                                                                $i6=$a6['id'];
                                                                $r5=mysql_query("update projects set pro_step=$i6 where id=$pid"); 
                                                                $r6=mysql_query("update projects set dra_step=0 where id=$pid");
                                                                    //######################Send mail for phase change ##############################//
                                                                            $subject = "Project Moved to Next Stage!";
                                                                            $headers = array(
                                                                            "From: Gameboard <HELP@StrategicPointMarketing.com>",
                                                                            "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
                                                                            "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
                                                                            "Content-Type: text/html;charset=iso-8859-1"
                                                                            );
                                                                            $message = "<strong>Project Moved to Production from Drafting Stage.</strong><br />";
                                                                            mail('bluewarestemp@gmail.com', $subject, $message, implode("\r\n",$headers));
                                                                        //############################################################################//
                                                                }
                                                                $count=0; 
                                                        
                                                        
                                                        }//while $f1
                                                //-----------------------------------------------------------------------------//
                        }
                        if($type==4)
                        {
                        $msg_query=mysql_query("select * from pro_checklists where id=$dataa");
                        $msgg=mysql_fetch_array($msg_query);
                        $msg="Production Checklist > ".$msgg['name']; 
                                                                 //------------------------------------------------------------------------------------//
                                                        $r1=mysql_query("select * from pro_heading"); $count=0;  $need=mysql_num_rows($r1); $xx=0;
                                                        while($f1=mysql_fetch_array($r1))
                                                        { $xx++;      $n1=$f1['name'];
                                                                $r2=mysql_query("select * from pro_checklists where wheree='$n1'"); $num=mysql_num_rows($r2);
                                                                while($f2=mysql_fetch_array($r2))
                                                                { $id2=$f2['id'];
                                                                    $q="select * from boxes_info where type=4 and project=$pid and id2=$id2"; 
                                                                    $r3=mysql_query($q); 
                                                                     if(mysql_num_rows($r3)==1)
                                                                     {
                                                                     $count++;
                                                                     }
                                                                
                                                                }
                                                                if($num==$count && $xx<$need)
                                                                {  
                                                                $ii=$f1['id'];
                                                                $n=mysql_query("SELECT * FROM pro_heading WHERE id>$ii limit 1");
                                                                $nn=mysql_fetch_array($n);               
                                                                $next = $nn['id'];
                                                                $r4=mysql_query("update projects set pro_step=$next where id=$pid");
                                                                }
                                                                if($num==$count && $xx==$need)
                                                                {     
                                                                $q6="select * from ins_heading limit 1";
                                                                $r6=mysql_query($q6);
                                                                $a6=mysql_fetch_array($r6);
                                                                $i6=$a6['id'];
                                                                $r5=mysql_query("update projects set ins_step=$i6 where id=$pid"); 
                                                                $r6=mysql_query("update projects set pro_step=0 where id=$pid");
                                                                    //######################Send mail for phase change ##############################//
                                                                            $subject = "Project Moved to Next Stage!";
                                                                            $headers = array(
                                                                            "From: Gameboard <HELP@StrategicPointMarketing.com>",
                                                                            "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
                                                                            "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
                                                                            "Content-Type: text/html;charset=iso-8859-1"
                                                                            );
                                                                            $message = "<strong>Project Moved to Installation from Production Stage.</strong><br />";
                                                                            mail('bluewarestemp@gmail.com', $subject, $message, implode("\r\n",$headers));
                                                                        //############################################################################//
                                                                }
                                                                $count=0; 
                                                        
                                                        
                                                        }//while $f1
                                                //-----------------------------------------------------------------------------//
                                                                
                        }
                    if($type==5)
                        {
                        $msg_query=mysql_query("select * from ins_checklists where id=$dataa");
                        $msgg=mysql_fetch_array($msg_query);
                        $msg="INstallation Checklist > ".$msgg['name'];
                                                                 //------------------------------------------------------------------------------------//
                                                        $r1=mysql_query("select * from ins_heading"); $count=0;  $need=mysql_num_rows($r1); $xx=0;
                                                        while($f1=mysql_fetch_array($r1))
                                                        { $xx++;      $n1=$f1['name'];
                                                                $r2=mysql_query("select * from ins_checklists where wheree='$n1'"); $num=mysql_num_rows($r2);
                                                                while($f2=mysql_fetch_array($r2))
                                                                { $id2=$f2['id'];
                                                                    $q="select * from boxes_info where type=5 and project=$pid and id2=$id2"; 
                                                                    $r3=mysql_query($q); 
                                                                     if(mysql_num_rows($r3)==1)
                                                                     {
                                                                     $count++;
                                                                     }
                                                                
                                                                }
                                                                if($num==$count && $xx<$need)
                                                                {  
                                                                $ii=$f1['id'];
                                                                $n=mysql_query("SELECT * FROM ins_heading WHERE id>$ii limit 1");
                                                                $nn=mysql_fetch_array($n);               
                                                                $next = $nn['id'];
                                                                $r4=mysql_query("update projects set ins_step=$next where id=$pid");
                                                                }
                                                                if($num==$count && $xx==$need)
                                                                {     
                                                                $r4=mysql_query("update projects set ins_step=-1 where id=$pid");
                                                                    //######################Send mail for phase change ##############################//
                                                                            $subject = "Project Completed all stages!";
                                                                            $headers = array(
                                                                            "From: Gameboard <HELP@StrategicPointMarketing.com>",
                                                                            "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
                                                                            "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
                                                                            "Content-Type: text/html;charset=iso-8859-1"
                                                                            );
                                                                            $message = "<strong>Project Completed all stages in Gameboard.</strong><br />";
                                                                            mail('bluewarestemp@gmail.com', $subject, $message, implode("\r\n",$headers));
                                                                        //############################################################################// 
                                                                }
                                                                $count=0; 
                                                        
                                                        
                                                        }//while $f1
                                                //-----------------------------------------------------------------------------//
                                                                
                        }
                    
                       //********************if checked then send email******************//
                    if(1==1)
                    {
                        
                        
                        $subject = "New Checklist Entered in Gameboard";
                        $headers = array(
                            
					    "From: Gameboard <HELP@StrategicPointMarketing.com>",
					    "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
					    "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
					    "Content-Type: text/html;charset=iso-8859-1"
					    );
                        $message = "<strong>New Checklist Entered in Gameboard.</strong><br />";
                        $message .= $user." Checkd a check list.Below is detailed information.<br />";
                        $message .=$msg;
                        
                        $mail_query=mysql_query("select * from admin_things where id=1");
                        $too=mysql_fetch_array($mail_query);
                        $to=$too['assistance'];
                        
                        $qq="select * from additional_email where id2=$dataa and type=$type";
                        $res=mysql_query($qq);
                        $sql=mysql_fetch_array($res);
                        $to2=$sql['email'];
                        
                        mail($to, $subject,  $message, implode("\r\n",$headers));
                        mail($to2, $subject,  $message, implode("\r\n",$headers));
                    }
                //******************************************************************//    
                    
                }
                else
                {
                echo mysql_error();
                }    
            }
            if($action=='remove')
            {
                $query="DELETE FROM boxes_info WHERE id2=$dataa and type=$type and project=$pid";
                $res=mysql_query($query);
                if($res)
                {
                echo "info saved";
                    //********************** Send Email ***********************************
                        $user_query=mysql_query("select * from users where id=$user_id");
                        $userr=mysql_fetch_array($user_query);
                        $user=$userr['firstname']." ".$userr['lastname'];
                    
                        if($type==1)
                        {
                        $msg_query=mysql_query("select * from est_checklists where id=$dataa");
                        $msgg=mysql_fetch_array($msg_query);
                        $msg="Estamating Checklist > ".$msgg['name']; 
                        }
                        if($type==2)
                        {
                        $msg_query=mysql_query("select * from dra_checklists where id=$dataa");
                        $msgg=mysql_fetch_array($msg_query);
                        $msg="Drafting Checklist > ".$msgg['name'];
                        }
                        if($type==3)
                        {
                        $msg_query=mysql_query("select * from pro_checklists where id=$dataa");
                        $msgg=mysql_fetch_array($msg_query);
                        $msg="Production Checklist > ".$msgg['name']; 
                        }
                        if($type==4)
                        {
                        $msg_query=mysql_query("select * from ins_checklists where id=$dataa");
                        $msgg=mysql_fetch_array($msg_query);
                        $msg="Installation Checklist > ".$msgg['name']; 
                        }
                    
                    
                        //********************if checked then send email******************
                    if(1==1)
                    {
                        $subject = "New Checklist Cancelled in Gameboard";
                        $headers = array(
                            
					    "From: Gameboard <HELP@StrategicPointMarketing.com>",
					    "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
					    "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
					    "Content-Type: text/html;charset=iso-8859-1"
					    );
                        $message = "<strong>New Checklist Cancelled in Gameboard.</strong><br />";
                        $message .= $user." Cancelled a check list.Below is detailed information.<br />";
                        $message .=$msg;
                        
                        $mail_query=mysql_query("select * from admin_things where id=1");
                        $too=mysql_fetch_array($mail_query);
                        $to=$too['assistance'];
                        
                        $qq="select * from additional_email where id2=$dataa and type=$type";
                        $res=mysql_query($qq);
                        $sql=mysql_fetch_array($res);
                        $to2=$sql['email'];
                        
                        mail($to, $subject, $message, implode("\r\n",$headers));
                        mail($to2, $subject, $message, implode("\r\n",$headers));
                    }
                    
                //******************************************************************
                }
                else
                {
                echo mysql_error();
                }   
            } 



?>