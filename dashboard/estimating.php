<?php
$admin=1;
error_reporting(1);
include("includes/head.php");
   include("../action/connect.php");
?>
    <?php include("includes/topbar.php");?>

        <body>

            <div id="content">
<?php
include("includes/navbar.php");



//***********************************************************************//
$user=$_SESSION['USER_LOGGED_IN']['Email'];
$id=$_SESSION['USER_LOGGED_IN']['Id'];
$pid=$_GET['id'];

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@//
if(isset($_POST['qdate']))
{
$value=$_POST['status'];
$user=$_SESSION['USER_LOGGED_IN']['Id'];
$username=$_SESSION['USER_LOGGED_IN']['Firstname']." ".$_SESSION['USER_LOGGED_IN']['Lastname'];

$g="select * from projects where id=$pid";
$resg=mysql_query($g);
$my=mysql_fetch_array($resg);
$pname=$my['name'];
    
$pid=$_GET['id'];
$dat=$_POST['qdate'];
$file=$_FILES["file"]["name"];
$target_dir = "uploads/";
$length = 6;
$target_file="";
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
if(strlen($file)>1){
    $target_file = $target_dir .$randomString. basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
} else
{ $target_file=""; }
$q="INSERT INTO quote_manager(status,user_id, project_id,qdate,file,typ) VALUES ('$value',$user,$pid,'$dat','$target_file','k')";
$res=mysql_query($q);
if($res)
{
    echo "Info saved";
    if($value=="approved")
    {
    $subject = "Quote manager approved in Gameboard";
                        $headers = array(

					    "From: Gameboard <HELP@StrategicPointMarketing.com>",
					    "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
					    "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
					    "Content-Type: text/html;charset=iso-8859-1"
					    );
                        $message = "<strong>hello!</strong><br />";
                        $message =$message."A Takeoff has been Approved by <b>".$username."</b> on date <b>".date('d-m-Y')."</b> for Project <b>".$pname."</b>";

                        mail("bluewarestemp@gmail.com,jimmy@express-business-solutions.com,josh@panoramahamerica.com", $subject, $message, implode("\r\n",$headers));
    }
    if($value=="kickback")
    {
    $subject = "Quote manager kicked in Gameboard";
                        $headers = array(

					    "From: Gameboard <HELP@StrategicPointMarketing.com>",
					    "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
					    "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
					    "Content-Type: text/html;charset=iso-8859-1"
					    );
                        $message = "<strong>Hello!</strong><br/>";
         $message =$message."A Takeoff has been kicked back by ".$username." on date <b>".date('d-m-Y')."</b> for Project <b>".$pname."</b>";
                        //$message=$message."A kickback has been sent to ";

                        mail("bluewarestemp@gmail.com,jimmy@express-business-solutions.com,josh@panoramahamerica.com", $subject, $message, implode("\r\n",$headers));
    }
}
else
{
    echo mysql_error();
}
}


if(isset($_POST['aaprove']))
{
$value=$_POST['status'];
$user=$_SESSION['USER_LOGGED_IN']['Id'];
$pid=$_GET['id'];

$q="INSERT INTO quote_manager(status,user_id, project_id,typ) VALUES ('$value',$user,$pid,'admin')";
$res=mysql_query($q);
if($res)
{
    echo "Info saved";
    /*if($value="approved")
    {
    $subject = "Quote manager approved in Gameboard";
                        $headers = array(

					    "From: Gameboard <HELP@StrategicPointMarketing.com>",
					    "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
					    "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
					    "Content-Type: text/html;charset=iso-8859-1"
					    );
                        $message = "<strong>Quote Approved in Gameboard.</strong><br />";

                        mail("jimmy@express-business-solutions.com,josh@panoramahamerica.com", $subject, $message, implode("\r\n",$headers));
    }
    if($value="kickback")
    {
    $subject = "Quote manager kicked in Gameboard";
                        $headers = array(

					    "From: Gameboard <HELP@StrategicPointMarketing.com>",
					    "Return-Path: HELP <HELP@StrategicPointMarketing.com>",
					    "Reply-To: HELP <HELP@StrategicPointMarketing.com>",
					    "Content-Type: text/html;charset=iso-8859-1"
					    );
                        $message = "<strong>Quote kicked in Gameboard.</strong><br/>";
                        //$message=$message."A kickback has been sent to ";

                        mail("jimmy@express-business-solutions.com,josh@panoramahamerica.com", $subject, $message, implode("\r\n",$headers));
    }*/
}
else
{
    echo mysql_error();
}
}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@//


?>

   <h3 class="page-title">
    Estimating Checklist
    </h3>

<!--*******************************************************************************************************************************-->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Abeezee:400|Open+Sans:400,600,700|Source+Sans+Pro:400,600">

	<link rel="stylesheet" type="text/css" href="Accordion/demo.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="Accordion/accordion.js"></script>
     <link rel="stylesheet" href="dp/default.css" type="text/css">
    <div class="row above-sec" style="padding:50px 0; border-bottom:1px solid grey;">
        <div class="col-md-6">
		<div class="accordion">

<?php
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@//
if(isset($_POST['where']))
{
$ck=$_POST['checklist'];
$where=$_POST['where'];
$q="insert into est_checklists (name,wheree) values ('$ck','$where')";
$res=mysql_query($q);
if($res)
    echo "Added sucessfully";
else
    echo mysql_error();
}


if(isset($_POST['heading']))
{
$h=$_POST['heading'];
$q="insert into est_heading (name) values ('$h')";
$res=mysql_query($q);
if($res)
    echo "Added sucessfully";
else
    echo mysql_error();
}

if($_SESSION['USER_LOGGED_IN']['Level']==0)
{ $admin=0;
?>
            <div class="col-md-6">
            <h3>Add Main Heading</h3>
            <form action="" method="POST">
            <input type="text" name="heading" placeholder="Enter Heading Name" required /><input type="submit" value="Add" />
            </form>
            </div>

            <div class="col-md-6">
            <h3>Add Check List</h3>
                <form action="" method="POST">
                    <input name="checklist" type="text" placeholder="Enter Checklist Name" required />
                    <select name="where">
                        <?php
                        $res=mysql_query("select * from est_heading");
                        while($data=mysql_fetch_array($res))
                        {
                        ?>
                        <option><?php echo $data['name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="submit" value="Add" /></form>
            </div> <br><br><br><br><br><br>
<?php
}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@//
?>


         <!--########################################################################################################-->
            <?php $cc=0; $admin_acc=0;  
            $res=mysql_query("select * from est_heading");
            while($data=mysql_fetch_array($res))
            { $n=$data['name']; $co=0; $color="";
             //************color work***************//
             $c="select * from est_checklists where wheree='$n'";
             $cr=mysql_query($c); $f=mysql_num_rows($cr);
             while($cd=mysql_fetch_array($cr))
                 {  $ideee=$cd['id'];
                    $kc="select * from boxes_info where type=1 and project=$pid and id2=$ideee";
                  $res44=mysql_query($kc); $res444=mysql_num_rows($res44);
                  if($res444>0){ $co++; }
                   }
             if($co<$f){ $color="#F1C93A"; }
             if($co==0){ $color="#3689B9"; }
             if($co==$f){ $color="#7FE81F"; }
             //*************************************// ?>
            
            <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ showing admin accordian @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
            <?php if($_SESSION['USER_LOGGED_IN']['Level']==0 && $admin_acc==0) { $admin_acc++; $status="";
            $qkk="select * from quote_manager where project_id=$pid and typ='admin' order by id desc Limit 1"; 
            $rkk=mysql_query($qkk);
            $fkk=mysql_fetch_array($rkk); $status=$fkk['status'];
            ?>
            <div class="accordion-section">
				<a style="background:#9A9A9A;" class="accordion-section-title" href="#accordion-admin-<?php echo $data['id']; ?>">Admin Approval Area
                </a>
				<div id="accordion-admin-<?php echo $data['id']; ?>" class="accordion-section-content">
                    <div class="col-md-12">
                        <form action='' method='post' enctype='multipart/form-data'>
                        &nbsp;&nbsp;&nbsp;Status:
                        <input type='radio'  name='status' <?php if($status=="approved") { ?> checked <?php } ?> value='approved'  id='approve'>Approved
                        <input type='radio'  name='status' <?php if($status=="kickback") { ?> checked <?php } ?> value='kickback'  id='kick'>Disapproved
                        <input type="hidden" name="aaprove" />
                        <input type='submit' class='btn' value='Save'/><br><br>
                        </form>
                    </div>
                </div>
            </div>
            
            
            <?php } ?>
            
            
            
            
            <?php if($_SESSION['USER_LOGGED_IN']['Level']!=0 && $admin_acc==0) {  $admin_acc++; $status="";
            $qkk="select * from quote_manager where project_id=$pid and typ='admin' order by id desc Limit 1"; 
            $rkk=mysql_query($qkk);
            $fkk=mysql_fetch_array($rkk); $status=$fkk['status'];
            ?>
            <?php if($status=="approved") 
            { ?> <h3 style="
    background: #9A9A9A;
    color: white;
    padding: 10px;
    text-align: center;
">Status : Approved</h3>   <?php } ?>
            <?php if($status=="kickback") 
            { ?> <h3 style="
    background: #9A9A9A;
    color: white;
    padding: 10px;
    text-align: center;
">Status : Disapproved</h3> <?php } ?>
            
            <?php if(mysql_num_rows($rkk)==0)
            { ?> <h3 style="
    background: #9A9A9A;
    color: white;
    padding: 10px;
    text-align: center;
">Status : Pending</h3> <?php } ?>
            
                                                                                
           
            
            
            <?php } ?>
             <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ end showing admin accordian @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

            <div class="accordion-section">
				<a style="background:<?php echo $color; ?>;" class="accordion-section-title" href="#accordion-<?php echo $data['id']; ?>">
                    <?php 
                    if($admin==0)
                    {
                    ?>
                    <span onclick="dell(<?php echo $data['id']; ?>,'est_heading','heading')" style="">&nbsp;X&nbsp;</span>
                    <?php } ?>
                    <?php echo $data['name']; ?>
                  <!--=============================================================================-->
                   <?php  $kick=1;
                $n=$data['name'];  $td=date('Y-m-d'); $da=strtotime("+4 day", strtotime($td)); $td=date("Y-m-d", $da); $num_ck=0;  $i=$pid; $r_ids=""; $cp=0; $newdate="";
                $one="select * from est_checklists where wheree='$n'";
                $one_q=mysql_query($one); $one_r=mysql_num_rows($one_q);
                    while($one_f=mysql_fetch_array($one_q)) ///fetching all data sets of specific heading
                    { 
                    $one_id=$one_f['id'];
                     $two="select * from admin_data where typee=1 and project_id=$i and id2=$one_id and due_date<'$td' and due_date!=''"; 
                     $two_q=mysql_query($two); $two_r=mysql_num_rows($two_q); $two_f=mysql_fetch_array($two_q);
                        if($two_r>0)
                        {
                            $three="select * from boxes_info where type=1 and user=$id and project=$i and id2=$one_id";
                            $three_q=mysql_query($three);
                            $three_r=mysql_num_rows($three_q);
                            if($three_r==0)
                            {
                            $num_ck++; $r_ids=$r_ids.",".$one_id; 
                            if($cp==0){
                                $cp++; $newdate=$two_f['due_date']; if($newdate!=""){ $newdate=date("Y/m/d", strtotime($newdate)); } else { $newdate=""; }
                                        }
                            }
                        } //if
                    }//while
             
             
             

                    ?>

                <!--=============================================================================-->

                    <?php if($color=="#F1C93A")
                    {
                      if($num_ck!=0){ echo "<span style='background:red;border-radius:2px;'>&nbsp;".$num_ck."&nbsp;</span>"; }
                     if($newdate!=""){ echo "<span style='float:right;'>Task due:".$newdate."</span>"; }
                    } ?>

                    <?php if($color=="#3689B9")
                    {
                      if($num_ck!=0){ echo "<span style='background:red;border-radius:2px;'>&nbsp;".$num_ck."&nbsp;</span>"; }
                      if($newdate!=""){ echo "<span style='float:right;'>Task due:".$newdate."</span>"; }
                    } ?>

                </a>
				<div id="accordion-<?php echo $data['id']; ?>" class="accordion-section-content">
                        <div class="col-md-12">
                        <?php 
                        $q2="select * from est_checklists where wheree='$n'";
                        $res2=mysql_query($q2); $newfun=0;
                        while($data2=mysql_fetch_array($res2))
                         {  $idee=$data2['id'];
                            $k="select * from boxes_info where type=1 and project=$pid and id2=$idee"; $res3=mysql_query($k); $nums=mysql_num_rows($res3); $arr=mysql_fetch_array($res3); 

                        //********************//
                         $k2="select * from additional_email where type=1 and id2=$idee";
                          $res33=mysql_query($k2);
                          $ae=mysql_fetch_array($res33); 
                          $aem=$ae['email']; if($aem=="") { $aem="Nill"; }
                          
                          
                          if(mysql_num_rows($res33)==0)
                          {$ae="Nill";} 
                          
                          
                        //********************//
                        if($data['name']=="Quote/Revision Request" && $kick==1)
                        {$kick++; $qot1="";$qot2="";

                         $q="select * from quote_manager where project_id=$pid order by id desc Limit 1";
                         $r=mysql_query($q);
                         $f=mysql_fetch_array($r); $dat=$f['qdate']; $da='value='.$dat;
                         if($f['status']=='approved'){ $qot1="checked"; $qot2="unchecked";}if($f['status']=='kickback'){ $qot1="unchecked";$qot2="checked";}
                        echo "<form action='' method='post' enctype='multipart/form-data'>";
                         echo "Quote Date<input type='date' required ".$da." id='qdate' name='qdate' >";
                         echo "&nbsp;&nbsp;&nbsp;Status:";
                         echo "<input type='radio' ".$qot1." name='status' value='approved' onclick='app()'  id='approve'>Approved";
                        echo "<input type='radio' ".$qot2." name='status' value='kickback' onclick='kic()'  id='kick'>Kickback";
                          echo "<input type='file' id='file' name='file' style='display:none;'/>";
                         echo "<input type='submit' class='btn' value='Save'/><br><br>";
                         echo "</form>";
                        }
                            ?>

                    <?php
                    //************************************************//
                          if($newfun==1 && $data['name']=="Quote/Revision Request")
                          {     $pid=$_GET['id'];
                              $getpro=mysql_query("select * from projects where id=$pid");
                           $getprores=mysql_fetch_array($getpro);
                           $getinhouse=mysql_query("select * from inhouse_or_factory where project_id=$pid");
                           $getinhouseres=mysql_fetch_array($getinhouse);
                          ?>
                          <div style="padding: 10px;margin:15px 15px 15px 25%;">
                     <span><p><b>Product 1:</b><?php echo $getprores['type1']; ?>
                         <input <?php if($getinhouseres['value1']==1){ ?> checked <?php } ?> onclick="inhouse('value1',1)" type="radio" name="r1">In house or
                         <input <?php if($getinhouseres['value1']==2){ ?> checked <?php } ?> onclick="inhouse('value1',2)" type="radio" name="r1">Factory
                         <input <?php if($getinhouseres['value1']==0){ ?> checked <?php } ?> onclick="inhouse('value1',0)" type="radio" name="r1">None</p></span>
                              
                    <span><p><b>Product 2:</b><?php echo $getprores['type2']; ?>
                        <input <?php if($getinhouseres['value2']==1){ ?> checked <?php } ?> onclick="inhouse('value2',1)" type="radio" name="r2">In house or
                        <input <?php if($getinhouseres['value2']==2){ ?> checked <?php } ?> onclick="inhouse('value2',2)" type="radio" name="r2">Factory
                        <input <?php if($getinhouseres['value2']==0){ ?> checked <?php } ?> onclick="inhouse('value2',0)" type="radio" name="r2">None</p>
                        </div>  
                          <?php
                          }
                          $newfun++;
                    //************************************************//
                    ?>
  <?php 
//**************************************************//
    $r=$data2['id']; 
   $f="select * from admin_data where typee=1 and project_id=$i and id2=$r"; 
    $ff=mysql_query($f); $fff=mysql_fetch_array($ff);
   $ass=$fff['assigned_to'];  if($ass=="") { $ass="None"; } else 
 { $w=mysql_query("select * from users where id='$ass'");  $ress=mysql_fetch_array($w); $ass=$ress['firstname']." ".$ress['lastname'];  }
  $add=$fff['due_date']; if($add=="") { $add="Not Set"; }
//***************************************************//                              
?>                              
                              
                    <input <?php if($nums>0) { ?> checked <?php } ?> type="checkbox" id="<?php echo $data2['id']; ?>" onclick="usave('<?php echo $data2['id']; ?>')" />
                <label><label style="display:inline" onclick='show("<?php echo $data2['id']; ?>")'><?php echo $data2['name']; if (strpos($r_ids,$data2['id']) !== false) { echo "<b> *</b>"; } ?>&nbsp;&nbsp;<br>(Default Email: <?php echo $aem; ?> )<br>(Assigned to: <?php echo $ass; ?> )<br>(Due Date: <?php echo $add; ?> )</label>
                    <?php if($nums>0) { ?> <p style="font-weight: 100;">(Completed by <?php echo $arr['user_name']; ?> on <?php echo $arr['timee']; ?>) </p><?php } ?>
                    <?php if($admin==0)
                    {
                    ?>
                    &nbsp;&nbsp;<span onclick="dell(<?php echo $data2['id']; ?>,'est_checklists','checklist')" style="background: red;color:white;">&nbsp;X&nbsp;</span>
                    <?php } ?>
                    </label>
                        <?php
                        }
                        ?>
                    </div>
				</div><!--end .accordion-section-content-->
			</div><!--end .accordion-section-->
            <?php
            }
            ?>
        <!--########################################################################################################-->

		</div><!--end .accordion-->
        </div>

<?php include "filess.php"; ?>

</div>
</div>
</body>

<link rel="stylesheet" href="popup/style.css" />
<script type="text/javascript" src="popup/tinybox.js"></script>
<script type="text/javascript" src="dp/zebra_datepicker.js"></script>

<script>
function dell(a,b,c)
{
            var r = confirm("Are you sure want to delete this?");
            if (r == true)
            {
            $.ajax({
            type: 'post',
            url: 'admin/del-ck.php',
            data: { type:b , id:a, what:c},
            success: function (data) {
              alert(data);
                location.reload();
            }
            });
            } else
            {

            }

}
//********************************************//
 var id=<?php echo $id; ?>; var pid=<?php echo $pid; ?>;
function show(data)
{  var a,b,c=""; var ne="<p style='display:none;'><input type='checkbox' name='default' id='default'/>Send default Email?</p>"; var at=""; var content2="";


    $.ajax({
            type: 'post',
            url: 'admin/admin-get-info.php',
            data: { data : data, type:'1',pid:pid ,user_id:id },
            success: function (data1) {
              if(data1.length>2)
              {
              data1=data1.split("*");
            a=data1[0];
             b=data1[1];
             c=data1[2];
             d=data1[3]; if(d==1){ne="<p style='display:none;'><input checked type='checkbox' name='default' id='default'/>Send default Email?</p>";}
             e=data1[4];
            f=data1[5];
            g=data1[6];
                             //********************//
                                $.ajax({
                                            type: 'post',
                                            url: 'admin/admin-get-info.php',
                                            data: { getusers:'getusers'},
                                            success: function (data2)
                                            {
                                                at="<select name='assignedto' id='assignedto'><option>Select</option>";
                                              data2=data2.split("*");
                                                for(aa=0 ; aa<(data2.length)-1 ; aa++)
                                                {
                                                t=data2[aa];
                                                t=t.split(",");
                                                 if(a==t[0]) { at=at+"<option selected value="+t[0]+">"+t[1]+"<option>"; }
                                                    else { at=at+"<option value="+t[0]+">"+t[1]+"<option>"; }
                                                }
                                                at=at+"</select>";
                                             content2 = "<form name='myform' id='myform'><label style='width: 100%;'>Assigned to:<span onClick='tin_hide()' style='float: right;background: red;color: white;width: 20px;text-align: center;'>X</span>"+at+"<label class=''>Due Date:<input type='date' name='dd' class='dd' id='dd' value='"+e+"'></label></label>  <label>Who complete:<input type='text' name='whocomplete' id='whocomplete' value='"+b+"'/></label> <label>Type Emails seperated with comma ','<textarea name='emails' style='height: 102px;' id='emails' placeholder='example1@yahoo.com,example2@hotmail.com'>"+c+"</textarea></label><label>Extra Note<textarea name='extra' id='extra' style='height: 102px;' placeholder='Write extra notes..'>"+g+"</textarea></label><label>Email<input name='a-email' id='a-email' placeholder='example1@yahoo.com' value='"+f+"'></label>"+ne+"<input type='button' style='float:right;' onClick='savee()' value='save'/><br><p id='msg' style='color:red;display:none;'><b>Please wait..</b></p><input type='hidden' name='query' id='query' value='"+data+"'/><input type='hidden' name='type' id='type' value='1'/><input type='hidden' name='user_id' id='user_id' value="+id+"><input type='hidden' name='pid' id='pid' value="+pid+"></form>";
                                            TINY.box.show(content2,0,0,0,1);
                                            }
                                      });




              }
                else
                {
                     //********************//
                                $.ajax({
                                            type: 'post',
                                            url: 'admin/admin-get-info.php',
                                            data: { getusers:'getusers'},
                                            success: function (data2)
                                            {

                                                at="<select name='assignedto' id='assignedto'><option>Select</option>";
                                              data2=data2.split("*");
                                                for(a=0 ; a<data2.length ; a++)
                                                {
                                                t=data2[a];
                                                t=t.split(",");
                                                 at=at+"<option value="+t[0]+">"+t[1]+"<option>";
                                                }
                                                at=at+"</select>";
                                             content2 = "<form name='myform' id='myform'><label style='width: 100%;'>Assigned to:<span onClick='tin_hide()' style='float: right;background: red;color: white;width: 20px;text-align: center;'>X</span>"+at+"<label class=''>Due Date:<input type='date' class='dd' name='dd' id='dd'></label><label>Who complete:<input type='text' name='whocomplete' id='whocomplete'/></label> <label>Type Emails seperated with comma ','<textarea name='emails' id='emails' style='height: 102px;' placeholder='example1@yahoo.com,example2@hotmail.com'></textarea></label><label>Extra Note<textarea name='extra' id='extra' style='height: 102px;' placeholder='Write extra notes..'></textarea></label><label>Email<input name='a-email' id='a-email' placeholder='example1@yahoo.com' value='"+f+"'></label><p style='display:none;'><input type='checkbox' name='default' id='default'/>Send default Email?</p><input type='button' style='float:right;' onClick='savee()' value='save'/><input type='hidden' name='query' id='query' value='"+data+"'/><input type='hidden' name='type' id='type' value='1'/><input type='hidden' name='user_id' id='user_id' value="+id+"><input type='hidden' name='pid' id='pid' value="+pid+"></form>";
                                           TINY.box.show(content2,0,0,0,1);
                                            }
                                      });


                }//else
            }
          });


 //******************//


}  //show data

    function tin_hide()
    {
    $('#tinymask').hide(500);
    $('#tinybox').hide(500);
    }


    function savee()
    {
        $('#msg').show(1000);
    $.ajax({
            type: 'post',
            url: 'admin/admin-save-info.php',
            data: $('#myform').serialize(),
            success: function (data) {
              alert(data);
                $('#msg').hide(1000);
            }
          });
    }
</script>


<script>
function usave(data)
{
   if(document.getElementById(data).checked==true)
   { show(data);
            //document.getElementById(data).disabled=true;
            $.ajax({
            type: 'post',
            url: 'admin/user-save-info.php',
            data: { action:'add' , data:data, type:'1',user_id:<?php echo $id; ?>,pid:<?php echo $pid; ?> },
            success: function (data) {
              if(data=="info saved"){ }else{ alert(data);}
            }
            });
   }
   else
    {
            $.ajax({
            type: 'post',
            url: 'admin/user-save-info.php',
            data: { action:'remove' , data:data, type:'1' ,user_id:<?php echo $id; ?>,pid:<?php echo $pid; ?>},
            success: function (data) {
              if(data=="info saved"){ }else{ alert(data);}
            }
            });
    }

}
    //****************************************//
    $(document).ready(function(){
$('#tinybox #dd').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'm/d/Y'              // but starting from today, rather than tomorrow
});
 //******************************//

        $('a.read_more').click(function(event){ /* find all a.read_more elements and bind the following code to them */
        event.preventDefault(); /* prevent the a from changing the url */
        $(this).parents('.item').find('.more_text').show(); /* show the .more_text span */
        $(this).parents('.item').find('.read_more').hide();
        $(this).parents('.item').find('.read_less').show();
        });

        $('a.read_less').click(function(event){ /* find all a.read_more elements and bind the following code to them */
        event.preventDefault(); /* prevent the a from changing the url */
        $(this).parents('.item').find('.more_text').hide(); /* show the .more_text span */
        $(this).parents('.item').find('.read_less').hide();
        $(this).parents('.item').find('.read_more').show();
        });
 });//ready fun

    /*function savee()
    {
    var valu;
    if(document.getElementById('approve').checked)
    {valu="approved";}else{valu="kickback";}
    if(!document.getElementById('approve').checked && !document.getElementById('kick').checked)
    {valu="";}
    dat=document.getElementById("qdate").value;
    $.ajax({
            type: 'post',
            url: 'admin/status.php',
            data: { valu:valu ,dat:dat ,user_id:<?php echo $id; ?>,pid:<?php echo $pid; ?>},
            success: function (dataa) {
              if(dataa=="info saved"){ alert(dataa) }else{ alert(dataa);}
            }
            });
    }*/
   
</script>

<script>
function inhouse(data1,data2,data3)
{

      
            $.ajax({
            type: 'post',
            url: 'admin/user-save-info2.php',
            data: { what:data1 , value:data2,user_id:<?php echo $id; ?>,pid:<?php echo $pid; ?> },
            success: function (data) {
              if(data=="info saved"){ }else{ alert(data);}
            }
            });

}

 function app()
    {
    document.getElementById('file').style.display="none";
    }
    function kic()
    {
    document.getElementById('file').style.display="block";
    }
    
   
</script>

<?php include("includes/footer.php"); ?>
