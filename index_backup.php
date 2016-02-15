<?php include("inc/head.php");

        ?>
<div id="topBar"><!--a href="./"><img src="img/spm-logo.png" alt="" /></a>-->
    <div class="row">
 		<div class="col-md-3"></div>
 		<div class="col-md-3 pull-left" style="font-family: myFirstFont; letter-spacing: 30px; font-size: 50px;">never</div>
 		<div class="col-md-6"></div>
 	</div>
 	 <div class="row blue">
 		<div class="col-md-3"></div>
 		<div class="col-md-3 pull-left" style="font-family: myFirstFont; letter-spacing: 25px; font-size: 70px; font-weigth: bold;">BLUE</div>
 		<div class="col-md-6"></div>
 	</div>
 	 <div class="row">
 		<div class="col-md-3"></div>
 		<div class="col-md-3" style="font-family: myFirstFont; letter-spacing: 5px; font-size: 20px; font-weigth: bold; margin-left: 180px;">CRM</div>
 		<div class="col-md-6"></div>
 	</div>
    
    
    </div>
<?php

if(isset($_SESSION['REGISTER_ERROR']))
   {
   	echo '<div id="registered"><h3>'.$_SESSION['REGISTER_ERROR'].'</div>';
   }
if(isset($_GET['c'])):
include("action/connect.php");
$key = mysql_real_escape_string($_GET['c']);
$chk = mysql_query("SELECT * FROM registration WHERE registration_key = '".$key."'");


	if(mysql_num_rows($chk) == 0):
	echo '<div style="text-align:center;"><h1>This request has already been processed</h1>';
	else:
	include("inc/approve.php");
	endif;
else:
include("inc/loginForm.php");

if(isset($_GET))
{
   echo '<div id="registered">';
    if($_GET['email']=="success"){
    echo '<h3>Mail sent for password resetting.</h3>';  }
        else if($_GET['email']=="fail")
        { echo '<h3>User does not exist.</h3>';
        }
      else if($_GET['pass']=="success")
      {
      echo '<h3>Password successfully changes, you can continue login now.</h3>';
      }
  
    echo '</div>';
}
	if(isset($_SESSION['REG_SUCCESS'])):
	echo '<div id="registered"><h3>Registration successful.</h3><h4>Please login now and upload your leads list</h4></div>';

	unset($_SESSION['REG_SUCCESS']);
	session_destroy($_SESSION['REG_SUCCESS']);
	
	endif;

include("inc/registerForm.php");

endif;


include("inc/forgotForm.php");

?>

</div><?php // end id="site" ?>
<!--div id="footer"><a href="./"><img src="img/footer-logo.jpg" alt="" /></a><br />&copy; <?php echo date('Y'); ?></div-->
</body>
<script src="js/public.js"></script>
</html>