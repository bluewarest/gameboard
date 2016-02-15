<?php
include("../inc/head.php");
include("../action/connect.php");
include "../unc.php";
?>
<?php
session_start();
$id=$_SESSION['USER_LOGGED_IN']['Id'];
?>



<?php
if(isset($_POST['fname']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
 $web=$_POST['web'];
 $address=$_POST['address'];
 $phone=$_POST['phone'];
 $city=$_POST['city'];
 $country=$_POST['country'];
 $zip=$_POST['zip'];
  $fax=$_POST['fax'];

//************//
$target_dir = "profile_images/";
$target_file = $target_dir .rand(). basename($_FILES["file"]["name"]);
$add="";   
 $check = getimagesize($_FILES["file"]["tmp_name"]);   
if($check !== false) {    
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
{
$add="avatar='$target_file',";    
} 
else 
{
echo "Sorry, there was an error uploading your file.Avoid big size image , use Jpg,Jpeg,bmw etc formats.";
} }
else
{
$add="";
}
  
//***************//    
 
 $q="UPDATE users SET ".$add."firstname='$fname',lastname='$lname',website='$web',address='$address',city='$city',zipcode='$zip',country='$country',phone='$phone',fax='$fax' WHERE id=$id";
 $re=mysql_query($q);
 echo mysql_error();
}
?>

<?php
$q="select * from users where id=$id";
$mysql=mysql_query($q);
$res=mysql_fetch_array($mysql); echo mysql_error();
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

  <?php include("http://gameboard.neverbluecrm.com/dashboard/includes/topbar.php");?>
    <div id="content">
<!--
<div class="new">
    <button type="button" data-toggle="modal" data-target="#newProject"><h4 style="color:white">NEW PROJECT</h4></button>
</div> -->
<div class="row" style="margin:0;">
    <h3  class="page-title">My Profile</h3>
    
    <div class="col-md-4"> 
    </div> 
    
    <div class="col-md-4">
        <div class="col-md-8">
            <h3  class="page-title">Personal Information</h3>
             <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />     
            <label for="comment">First Name:</label><br>
            <input type="text"  value="<?php echo $res['firstname']; ?>" name="fname" ><br>
            <label for="comment">Last Name:</label><br>
            <input type="text" value="<?php echo $res['lastname']; ?>" name="lname"><br>
            <label for="comment">Website:</label><br>
            <input type="text" value="<?php echo $res['website']; ?>" name="web"><br>
            <label for="comment">Address:</label><br>
            <input type="text" value="<?php echo $res['address']; ?>" name="address"><br>
            <label for="comment">Phone:</label><br>
            <input type="text" value="<?php echo $res['phone']; ?>" name="phone"><br>
            <label for="comment">City:</label><br>
            <input type="text" value="<?php echo $res['city']; ?>" name="city"><br>
            <label for="comment">Country:</label><br>
            <input type="text" value="<?php echo $res['country']; ?>" name="country"><br>
            <label for="comment">Zip:</label><br>
            <input type="text" value="<?php echo $res['zipcode']; ?>" name="zip"><br>
            <label for="comment">Fax:</label><br>
            <input type="text" value="<?php echo $res['fax']; ?>" name="fax"><br><br>
            <button type="submit" style="float:right;" class="btn btn-success" name="update" value="submit">Save Information</button>
            
            <hr>
             
            <h3  class="page-title">Account</h3>
             <label for="comment">Change Password:</label><br>
            <input type="password"  name="password" id="password" ><br>
            <label for="comment">Confirm Password:</label><br>
            <input type="password" name="password2" id="password2" ><br>  
            <button onClick="changep(<?php echo $id; ?>)" style="float:right;" class="btn btn-success" name="update" value="submit">Change Password</button>   
            
        </div>
        
        <div class="col-md-4">
            <?php
            $iurl=$res['avatar'];
            ?>
            <img src="<?php echo $iurl; ?>" alt="img" style="height: 130px;width: 130px;border-radius: 100px;" /><br><br>
            <input name="file" type="file" />
        </div>
  </form>        
    </div> 
    
    <div class="col-md-3"> 
    </div> 

</div>
    
 <?php

if(isset($_POST['email']))
{
$email=$_POST['email'];

    $q="update admin_things set assistance='$email' where id=1";
    $res=mysql_query($q);
    echo mysql_error();

}
?>
    
  
    
    
    </div></body>

<script>
   /***************************/
function changep(id)
{
pass=document.getElementById("password").value; 
pass2=document.getElementById("password2").value;
if(pass.length<6)
{
alert('Password length must be greater then 5!');
}
else
if(pass!=pass2) 
{
alert('Password Does not match!');
}
else    
{
         $.ajax({
        type: 'post',
            url: 'admin/admin-change-pass.php',
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
