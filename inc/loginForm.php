<?php 
include "../unc.php";
?>
<div class="row set">
    
    <div class="col-md-12">
        <form class="form-signin" method="post" action="<?php echo $unc;?>action/authenticate.php" enctype="multipart/form-data">

<?php
if(isset($_SESSION['IDLE'])):
echo '<div id="inactive-notice">';
echo '<h5>You have been logged out due to inactivity.</h5>';
echo '</div>';
unset($_SESSION['IDLE']);
else:
echo '<h2 class="form-signin-heading">Please sign in</h2>';
endif;

if(isset($_SESSION['REGISTER_ERROR'])):
?>
<input type="text" name="uname" id="uname" class="form-control" placeholder="Username   OR   Email address" required="true" />
<?php
else:
?>
<input type="text" name="uname" id="uname" class="form-control" placeholder="Username   OR   Email address" required="true" autofocus />
<?php
endif;

if(isset($_GET['login']) && $_GET['login'] == "failed"):
echo '<input type="text" class="form-control" value="LOGIN FAILED" disabled style="background:#900;border-radius:0px;color:#FFF;text-align:center;" />';
endif;
?>
<input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required="true" />
<?php
if(isset($_GET['active']) && $_GET['active'] == "no"):
echo '<div class="deactivatedNotice">That account has been deactivated.<br />Call 800-900-1000 for assistance.</div>';
else:
echo '<button class="btn btn-lg btn-block black" type="submit">Sign in</button>';
endif;
?>
</form>

<?php
if(!isset($_SESSION['REGISTER_ERROR'])):
?>
<div class="makethemcenter">
    <button type="button" class="btn btn-info btn-sm link" data-toggle="modal" data-target="#register-form-pop">Register</button>
	<button type="button" class="btn btn-info btn-sm link" data-toggle="modal" data-target="#forget-form-pop">Forget Password ?</button>
</div>
<?php
endif;
?>
    </div>

</div>

<div class="dark">
</div>


