<?php include("inc/head.php");
if(isset($_SESSION['REGISTER'])):
?>
<div id="topBar"><img src="img/spm-logo.png" alt="" /></div>

<div style="width:60%;margin:50px auto 0 30%;">
<h4>Company Registered Successfully</h4>
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
