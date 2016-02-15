<?php   session_start();error_reporting(0);
include("../inc/head.php"); 
include("connect.php")
  
?>
<div id="topBar"><a href="./"><img src="../img/spm-logo.png" alt="" /></a></div>
<?php


if(isset($_GET['action']))
{          
    if($_GET['action']=="reset")
    {
        
       
        $sql = mysql_query("SELECT * FROM users WHERE md5(id) = '".$_GET['encrypt']."'");
   
        if(mysql_num_rows($sql)==1)
        {
                ?>
            <div class="update-pass">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h1> Enter New Password: </h1>
          <p>     <input type="text" name="pass1" id="pass1"  class="form-control" required/></p> 
               <p>   <input type="text" name="pass2" id="pass2"  class="form-control" required/></p> 
                    <input type="hidden" value="<?php echo $_GET['encrypt']; ?>" name="key"/>
                   <p>
                    <button class="btn btn-lg btn-primary btn-block" id="update" onclick="mypasswordmatch()">Update</button>
                    </p>
                
                </form>
</div>

<?php
        }
        else
        {
            echo ' <div class="update-pass">';
          include("inc/forgotForm.php");
           echo '<h3>Key did not match</h3><h5>Back to Home</h5><p><a href="http://crm.spm-sites.com/">Home</a></p></div>';
        }
    }
}
elseif(isset($_POST))
{$newPassword = strip_tags(trim($_POST['pass1']));
 $newPassword = sha1($newPassword);
 

    $sql = mysql_query("update users set password = '".$newPassword."' where md5(id)='".$_POST['key']."'");
 if($sql){
 echo '<div class="text-center" style="width:100%;text-align:center;"><h3>Password has been reset.</h3><p><a href="../"><h5>Back to Home</h5></a></p></div>';
 
 }
 else
 {
 echo ' <div class="update-pass">';
          include("inc/forgotForm.php");
           echo '<h3>Password could not be reset.</h3><h5>Back to Home</h5><p><a href="http://crm.spm-sites.com/">Home</a></p></div>';
 }
}
?>
<div id="footer"><a href="./"><img src="../img/footer-logo.jpg" alt="" /></a><br />&copy; <?php echo date('Y'); ?></div>
</body>
<script src="../js/public.js"></script>
</html>

<script>
function mypasswordmatch()
{
    var pass1 = $("#pass1").val();
    var pass2 = $("#pass2").val();
    if (pass1 != pass2)
    {
        alert("Passwords do not match");
        event.preventDefault();
        return false;
    }
    else
    {
        $( "#update" ).submit();
    }
}
</script>