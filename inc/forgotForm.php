<div id="forget-form-pop"   class="modal fade" role="dialog">
          <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
      </div>
	
<form class="form-forgot" method="post" action="action/forgot.php" enctype="multipart/form-data">
    
    <h2>Forgot Password?</h2>
    <p>Enter Your Email Address:</p>
    <input class="form-control" type="email"name="forget-email" placeholder="Enter you email address" required/>
           
           <?php


if(isset($_GET['found']) && $_GET['found'] == "none"):
echo 'Not Found';
endif;
?>
    <button class="btn btn-lg btn-primary btn-block"  style="max-width:150px;margin:10px auto;"  type="submit">Submit</button>
</form>
              </div></div>
</div>