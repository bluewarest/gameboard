<?php include("inc/head.php");
if(isset($_SESSION['APPROVAL_DONE'])):
?>
<div id="topBar"><a href="./"><img src="img/spm-logo.png" alt="" /></a></div>
<div style="width:400px;margin:50px auto;text-align:center;">
<h1>APPROVAL DONE</h1>
</div>
<div class="spacer-div"></div>
</div><?php // end id="site" ?>
<div id="footer"><a href="./"><img src="img/footer-logo.jpg" alt="" /></a><br />&copy; <?php echo date('Y'); ?></div>
</body>
<script src="js/public.js"></script>
</html>
<?php
unset($_SESSION['APPROVAL_DONE']);
else:
header("location:./");
endif;
?>