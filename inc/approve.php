<div style="width:600px;margin:50px auto;">

	<?php while($data = mysql_fetch_array($chk)): ?>
	<form class="form-horizontal" action="action/approve.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="k" value="<?php echo $data['registration_key'] ?>" />
	<fieldset>
	
	<div class="control-group">
	  <label class="control-label" for="username">Username</label>
	  <div class="controls">
	    <input type="text" id="username" name="username" placeholder="<?php echo $data['username'] ?>" value="<?php echo $data['username'] ?>" maxlength="20" class="form-control input-lg" required="true" />
	  </div>
	</div>

	<div class="control-group">
	  <label class="control-label" for="email">Email</label>
	  <div class="controls">
	    <input type="email" id="email" name="email" placeholder="<?php echo $data['email'] ?>" value="<?php echo $data['email'] ?>" maxlength="50" class="form-control input-lg" required="true" />
	  </div>
	</div>

	
	<div class="control-group">
	  <label class="control-label" for="firstname">First Name</label>
	  <div class="controls">
	    <input type="text" id="firstname" name="firstname" placeholder="<?php echo $data['firstname'] ?>" value="<?php echo $data['firstname'] ?>" maxlength="25" class="form-control input-lg" required="true" />
	  </div>
	</div>
	
	<div class="control-group">
	  <label class="control-label" for="lastname">Last Name</label>
	  <div class="controls">
	    <input type="text" id="lastname" name="lastname" placeholder="<?php echo $data['lastname'] ?>" value="<?php echo $data['lastname'] ?>" maxlength="25" class="form-control input-lg" required="true" />
	  </div>
	</div>

	<div class="control-group">
	  <label class="control-label" for="phone">Phone</label>
	  <div class="controls">
	    <input type="text" id="phone" name="phone" placeholder="<?php echo $data['phone'] ?>" value="<?php echo $data['phone'] ?>" maxlength="12" class="form-control input-lg" required="true" />
	  </div>
	</div>
	
	<div class="control-group">
	  <label class="control-label" for="company">Company</label>
	  <div class="controls">
	    <input type="text" id="company" name="company" placeholder="<?php echo $data['company'] ?>" value="<?php echo $data['company'] ?>" maxlength="60" class="form-control input-lg" required="true" />
	  </div>
	</div>	

	<?php $positionArray = array("CEO","Sales Manager","Sales People"); ?>
	<div class="control-group">
	  <label class="control-label" for="position">Position</label>
	  <div class="controls">
	    <select id="position" name="position" class="form-control input-lg" required="true" />
		<?php
		foreach($positionArray as $value):
			if($value == $data['position']):
			echo '<option value="'.$value.'" selected>'.$value.'</option>';
			else:
			echo '<option value="'.$value.'">'.$value.'</option>';
			endif;
		endforeach;
		?>
	    </select>
	  </div>
	</div>	
		
	<div class="control-group">
	  <label class="control-label" for="address">Street Address</label>
	  <div class="controls">
	    <input type="text" id="address" name="address" placeholder="<?php echo $data['address'] ?>" value="<?php echo $data['address'] ?>" maxlength="60" class="form-control input-lg" required="true" />
	  </div>
	</div>
	
	<div class="control-group">
	  <label class="control-label" for="city">City</label>
	  <div class="controls">
	    <input type="text" id="city" name="city" placeholder="<?php echo $data['city'] ?>" value="<?php echo $data['city'] ?>" maxlength="30" class="form-control input-lg" required="true" />
	  </div>
	</div>	

	<div class="control-group">
	<?php
$states = array("AL","AK","AZ","AR","CA","CO","CT","DE","FL","GA","HI","ID","IL","IN","IA","KS","KY","LA","ME","MD","MA","MI","MN","MS","MO","MT","NE","NV","NH","NJ","NM","NY","NC","ND","OH","OK","OR","PA","RI","SC","SD","TN","TX","UT","VT","VA","WA","WV","WI","WY");
	?>
	  <label class="control-label" for="state">State</label>
	  <div class="controls">
        <input type="text" id="state" name="state" placeholder="<?php echo $data['state'] ?>" value="<?php echo $data['state'] ?>" maxlength="30" class="form-control input-lg" required="true" />
	  </div>
	</div>	

	<div class="control-group">
	  <label class="control-label" for="zipcode">Zipcode</label>
	  <div class="controls">
	    <input type="text" id="zipcode" name="zipcode" placeholder="<?php echo $data['zipcode'] ?>" value="<?php echo $data['zipcode'] ?>" maxlength="5" class="form-control input-lg" required="true" />
	  </div>
	</div>
	
	<div class="control-group">
	  <label class="control-label" for="country">Country</label>
	  <div class="controls">
	    <input type="text" id="country" name="country" placeholder="<?php echo $data['country'] ?>" value="<?php echo $data['country'] ?>" maxlength="50" class="form-control input-lg" required="true" />
	  </div>
	</div>	

	<br /><br />

	<div class="control-group">
	  <div class="controls">
	    <input type="submit" id="register-button" value="APPROVE USER" class="btn btn-lg btn-primary btn-block" />
	  </div>
	</div>
	
	</fieldset>
	</form>
	<?php endwhile; ?>
	
</div>