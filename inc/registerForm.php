<div class="spacer-div-line"></div>
<?php
if(isset($_SESSION['REGISTER_ERROR'])):
?>
<style>
#register-form{display:inline;}
</style>
<?php
unset($_SESSION['REGISTER_ERROR']);
endif;
?>
<div id="register-form-pop"  class="modal fade" role="dialog">
      <div class="modal-dialog">
           <div class="modal-content">
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
      </div>
	<form class="form-horizontal" action="action/registerCEO.php" method="post" enctype="multipart/form-data">
	<fieldset>
	<div id="legend">
	  <legend style="float:left;">Register</legend>
	  <span style="float:right;">All fields are required</span>
	  <div style="clear:both;"></div>
	</div>
	<div id="username-error" class="error-alert">That Username is already taken</div>
	<div id="uname-length-error" class="error-alert">Username must be at least 5 characters</div>	
	<div class="control-group">
	  <label class="control-label" for="username">Username</label>
	  <div class="controls">
	    <input type="text" id="username" name="username" placeholder="<?php echo $_SESSION['REGISTER_POST']['username'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['username'] ?>" maxlength="20" class="form-control input-lg" required="true" />
	    <p class="help-block">Lower case letters and numbers only, no spaces, between 5-20 characters.</p>
	  </div>
	</div>

	<div id="email-error" class="error-alert">That Email is already registered</div>
	<div id="bad-email-error" class="error-alert">Email is invalid format</div>	
	<div id="no-email-error" class="error-alert">Email is not real</div>		
	<div class="control-group">
	  <label class="control-label" for="email">Email</label>
	  <div class="controls">
	    <input type="email" id="email" name="email" placeholder="<?php echo $_SESSION['REGISTER_POST']['email'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['email'] ?>" maxlength="50" class="form-control input-lg" required="true" />
	  </div>
	</div>
	
	<div class="control-group">
	  <label class="control-label" for="firstname">First Name</label>
	  <div class="controls">
	    <input type="text" id="firstname" name="firstname" placeholder="<?php echo $_SESSION['REGISTER_POST']['firstname'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['firstname'] ?>" maxlength="25" class="form-control input-lg" required="true" />
	  </div>
	</div>
	
	<div class="control-group">
	  <label class="control-label" for="lastname">Last Name</label>
	  <div class="controls">
	    <input type="text" id="lastname" name="lastname" placeholder="<?php echo $_SESSION['REGISTER_POST']['lastname'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['lastname'] ?>" maxlength="25" class="form-control input-lg" required="true" />
	  </div>
	</div>

	<div class="control-group">
	  <label class="control-label" for="phone">Phone</label>
	  <div class="controls">
	    <input type="text" id="phone" name="phone" placeholder="<?php echo $_SESSION['REGISTER_POST']['phone'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['phone'] ?>" maxlength="12" class="form-control input-lg" required="true" />
	    <!--<p class="help-block">example: XXX-XXX-XXXX</p>-->
	  </div>
	</div>
	
	<div class="control-group">
	  <label class="control-label" for="company">Company</label>
	  <div class="controls">
	    <input type="text" id="company" name="company" placeholder="<?php echo $_SESSION['REGISTER_POST']['company'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['company'] ?>" maxlength="60" class="form-control input-lg" required="true" />
	  </div>
	</div>	
     <!--   	<div class="control-group">
	  <label class="control-label" for="company">Company</label>
	  <div class="controls">
           <select id="company" name="company" class="form-control input-lg" required="true" >
	<?php 
    while ($sql_row = mysql_fetch_assoc($sql)) {
                                   
                                        echo '<option value='.$sql_row["name"].'>'.$sql_row["name"].'</option>';
}
                                    
?>
	    </select>
        </div>
        </div>-->

	<div class="control-group">
	  <label class="control-label hidden" for="position">Position</label>
	  <div class="controls">
	    <select id="position" name="position" class="form-control input-lg hidden" required="true" />
	    	
			<option value="CEO">CEO</option>
		
	    </select>
	  </div>
	</div>	
		
	<div class="control-group">
	  <label class="control-label" for="address">Street Address</label>
	  <div class="controls">
	    <input type="text" id="address" name="address" placeholder="<?php echo $_SESSION['REGISTER_POST']['address'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['address'] ?>" maxlength="60" class="form-control input-lg" required="true" />
	  </div>
	</div>
	
	<div class="control-group">
	  <label class="control-label" for="city">City</label>
	  <div class="controls">
	    <input type="text" id="city" name="city" placeholder="<?php echo $_SESSION['REGISTER_POST']['city'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['city'] ?>" maxlength="30" class="form-control input-lg" required="true" />
	  </div>
	</div>	

	<div class="control-group">
	<?php
$states = array("AL","AK","AZ","AR","CA","CO","CT","DE","FL","GA","HI","ID","IL","IN","IA","KS","KY","LA","ME","MD","MA","MI","MN","MS","MO","MT","NE","NV","NH","NJ","NM","NY","NC","ND","OH","OK","OR","PA","RI","SC","SD","TN","TX","UT","VT","VA","WA","WV","WI","WY");
	?>
	  <label class="control-label" for="state">State / ETC</label>
	<div class="controls">
	      <!--<select id="state" name="state" class="form-control input-lg" required="true" />
	    	<option value=""></option>
	    	<?php
	    	foreach($states as $value):
	    		if($value == $_SESSION['REGISTER_POST']['state']):
	    		echo '<option value="'.$value.'" selected >'.$value.'</option>';
	    		else:
	    		echo '<option value="'.$value.'">'.$value.'</option>';
	    		endif;
	    	endforeach;
	    	?>
	    </select>-->
         <input type="text" id="state" name="state" placeholder="<?php echo $_SESSION['REGISTER_POST']['state'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['state'] ?>" maxlength="30" class="form-control input-lg" required="true" />
	  </div>
	</div>	

	<div class="control-group">
	  <label class="control-label" for="zipcode">Postal Code</label>
	  <div class="controls">
	    <input type="text" id="zipcode" name="zipcode" placeholder="<?php echo $_SESSION['REGISTER_POST']['zipcode'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['zipcode'] ?>" maxlength="5" class="form-control input-lg" required="true" />
	  </div>
	</div>
	
	<div class="control-group">
	  <label class="control-label" for="country">Country</label>
	  <div class="controls">
	    <input type="text" id="country" name="country" placeholder="<?php echo $_SESSION['REGISTER_POST']['country'] ?>" value="<?php echo $_SESSION['REGISTER_POST']['country'] ?>" maxlength="50" class="form-control input-lg" required="true" />
	  </div>
	</div>	

	<br /><br />

	<div class="control-group">
	  <div class="controls">
	    <input type="submit" id="register-button" value="Register" class="btn btn-lg btn-primary btn-block" />
	  </div>
	</div>
	
	<div style="text-align:right;font-size:10px;color:#D8D8D8;margin-top:20px;">All fields are required</div>
	
	</fieldset>
	</form>
</div></div>
</div>