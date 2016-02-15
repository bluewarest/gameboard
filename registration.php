<?php include("inc/head.php");
if(isset($_SESSION['REGISTER'])):
?>
<div id="topBar"><img src="img/spm-logo.png" alt="" /></div>

<div style="width:60%;margin:50px auto 0 30%;">
<h4>Thank you for registering</h4>
<p>
Welcome to Never Blue CRM. We will send you your login information within 2 to 3 business days.
</p>
<p>
If you need to expedite the process please contact HELP@StrategicPointMarketing.com or call 214-458-9400
</p>
</div>

<div class="spacer-div"></div>
</div><?php // end id="site" ?>
<div id="footer"><img src="img/footer-logo.jpg" alt="" /><br />&copy; <?php echo date('Y'); ?></div>
</body>
<script src="js/public.js"></script>
</html>
<?php
unset($_SESSION['REGISTER']);
else:
header("location:./");
endif;
?>
