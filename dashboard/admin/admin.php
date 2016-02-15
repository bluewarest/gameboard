<style>
#search-f
{
color: white;
    margin: 0 auto;
    height: 40px;
    background-color: #3689B9;
    padding: 10px;
    text-align: center;
    border: 1px solid #6B6161
}
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	
	border:1px solid #000000;

	border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100px;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.CSSTableGenerator tr:hover td{
	background-color:#ffffff;


}
.CSSTableGenerator td{
	vertical-align:middle;
	
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#c9c2bb", endColorstr="#ffffff");	background: -o-linear-gradient(top,#c9c2bb,ffffff);

	background-color:#FDFDFD;

	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:5px;
	font-size:13px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #8e867f 5%, #8e867f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8e867f), color-stop(1, #8e867f) );
	background:-moz-linear-gradient( center top, #8e867f 5%, #8e867f 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8e867f", endColorstr="#8e867f");	background: -o-linear-gradient(top,#8e867f,8e867f);

	background-color:#8e867f;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:15px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{ 
	background:-o-linear-gradient(bottom, #8e867f 5%, #8e867f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8e867f), color-stop(1, #8e867f) );
	background:-moz-linear-gradient( center top, #8e867f 5%, #8e867f 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8e867f", endColorstr="#8e867f");	background: -o-linear-gradient(top,#8e867f,8e867f);

	background-color:#8e867f;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>
<?php
include("../includes/head.php");
   include("../../action/connect.php");

?>
<?php
session_start();
if($_SESSION['USER_LOGGED_IN']['Level']!=0)
{ 
    header("Location: http://gameboard.neverbluecrm.com/dashboard/");
    echo "<script type='text/javascript'>window.location.href = 'http://gameboard.neverbluecrm.com/dashboard/';</script>";
}
?>
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
</head>
    <style>
        .multiselect label {
            display:block;
        }
    </style>
<body style="background-color: rgb(189, 189, 189);">

  <?php include("../includes/topbar.php");?>
    <div id="content">
<!--
<div class="new">
    <button type="button" data-toggle="modal" data-target="#newProject"><h4 style="color:white">NEW PROJECT</h4></button>
</div> -->
<div class="row" style="margin:0;">
    <h3  class="page-title">All Users</h3>
    <div class="CSSTableGenerator" >
                <table >
                    <tr>
                        <td>
                            First Name
                        </td>
                        <td >
                            Last Name
                        </td>
                        <td>
                            Email
                        </td>
                        <td>
                            Change Password
                        </td>
                        <td>
                            Save
                        </td>
                        <td>
                           Delete User
                        </td>
                    </tr>
<?php
$q="select * from users";
$res=mysql_query($q); $p=1;
while($data=mysql_fetch_array($res))
{
?>
                    <tr>
                        <td >
                           <?php echo $data['firstname']; ?>
                        </td>
                        <td>
                            <?php echo $data['lastname']; ?>
                        </td>
                        <td>
                           <?php echo $data['email']; ?>
                        </td>
                        <td >
                           <input type="password" name="cpassword" id="cpassword<?php echo $p; ?>" required />
                        </td>
                        <td>
                            <input type="button" value="Save" onClick="changep('cpassword<?php echo $p; ?>','<?php echo $data['id']; ?>')" class="btn btn-primary" />
                        </td>
                        <td>
                             <input <?php if($data['level']==0)  { ?> disabled <?php } ?> type="button" value="Delete User" onClick="delu('<?php echo $data['id']; ?>')" class="btn btn-primary" />
                        </td>
                    </tr>
                 
<?php
 $p++;
}
?>
                </table>
            </div>

</div>
    
 <?php
include("../../action/connect.php");
if(isset($_POST['email']))
{
$email=$_POST['email'];

    $q="update admin_things set assistance='$email' where id=1";
    $res=mysql_query($q);
    echo mysql_error();

}

if(isset($_POST['email_template']))
{
$email_template=$_POST['email_template'];

    $q="update admin_things set email_template='$email_template' where id=1";
    $res=mysql_query($q);
    echo mysql_error();

}

?>
    
<div class="col-md-3"> <form action="" method="POST">
<h4 style="color: white;background: #3A8BBA;padding: 4px;text-align: center;">Assistance Email</h4>   
    <?php 
    $q="select * from admin_things where id=1";
    $res=mysql_query($q);
    $data=mysql_fetch_array($res);
    
    ?>
<p>Email: <input type="email" name="email" id="email" value="<?php echo $data['assistance']; ?>" />    <input type="submit" class="btn btn-primary" value="Save" /></p></form>
</div>  
        
        
        
<div class="col-md-5"> 
<h4 style="color: white;background: #3A8BBA;padding: 4px;text-align: center;">Email Template</h4>   
    <?php 
    $q="select * from admin_things where id=1";
    $res=mysql_query($q);
    $data=mysql_fetch_array($res);
    
    ?>
<form action="" method="POST">    
<p>Define Email Template below.Use [name] where you want to display Name who checked/unchecked checklist.Use [detail] where you want to display Detailed information..</p><br>
<textarea name="email_template" 
placeholder="[name] Checked checklist in Gameboard.
             
Below is the info. 
             
[detail]"><?php echo $data['email_template']; ?></textarea><br>
    <input type="submit" class="btn btn-primary" value="Save" />
</form>
</div> 
        
    
    
    </div></body>
   <div id="newProject" class="modal fade" role="dialog">                             
    <div class="col-sm-12">
    <form class="form-add" method="post" action="../../action/save-proj.php" enctype="multipart/form-data">                          
        <div class="modal-dialog">                           
            <!-- Modal content-->                           
            <div class="modal-content">                              
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>                                   
                    <label for="comment">Project Name:</label><input type="text" name="name"/>

        <label>Initial Date:</label><input type="text" name="d1" id="datepicker1" value="<?php echo date("m/d/Y"); ?>" />
        <label>Quote Date:</label><input type="text" name="d2" id="datepicker2" />
        <label>Sales Rep:</label><input type="text" name="sales" />
        <label>Project Type:</label><input type="text" name="type" />
        <label>Project Bid:</label><input type="text" name="bid" />
        <hr>
        <!--<label>Step:</label><input type="text" name="xtep" />-->
        <label>Assigned to:</label><select  name="assigned-to" style="width: 26%;">
                                    <option>Gregg</option>
                                    <option>Tasha</option>
                                    <option>Josh</option>
                                    <option>Jimmy</option>
                                    </select>
        <label>Due Date:</label><input type="text" name="due-date" id="datepicker4" />


        </div><div class="modal-body"><div class="row"><div class="col-sm-9"><div class="form-group"><label for="comment">Description:</label><textarea class="form-control" rows="5" id="desc" name="description"></textarea></div>                                
                </div>
        </div>                                                                
                </div>                              
                <div class="modal-footer">   
                    <input type="hidden" name="page" value="est" />
                    <button type="submit" class="btn btn-success" name="add-project" value="submit">Add</button>                                 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                              
                </div>                            
            </div>                          
        </div>                        
        </div>                            
        </form>                                
    </div> 
<script>
function delu(id)
{

var r = confirm("Are you sure want to delete this user?");
if (r == true) 
{
 $.ajax({
            type: 'post',
            url: 'admin-delete-user.php',
            data: { id:id, },
            success: function (data) {
              alert(data);
                location.reload();
            }
          });
} 
else 
{
    
} 
}
    /***************************/
function changep(ide,id)
{
pass=document.getElementById(ide).value;    
if(pass.length<6)
{
alert('Password length must be greater then 5!');
}
else
{
         $.ajax({
        type: 'post',
            url: 'admin-change-pass.php',
            data: { id:id,
                    pass:pass
                  },
            success: function (data) {
              alert(data);
            }
          });
}
    
}
</script>
 
<?php
include("../includes/footer.php"); ?>
