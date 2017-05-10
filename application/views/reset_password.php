<div class="login body">
    <!-- Login block -->
    <?php echo $this->session->flashdata('message'); ?>
    <?php if(isset($message) && !empty($message)) { echo $message;}?>
    <div class="well">
        <div class="navbar">
            <div class="navbar-inner">
                <h2>Reset Password?</h2>
            </div>
        </div>

	<?php 
	if($success){
		echo '<p>You have successfully reset your password.</p>';
	} else {

	?>
        <form method="post" class="row-fluid" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div class="control-group">
                <div class="controls"><input class="login_input" type="password" name="user_password" placeholder="password" /></div>
            </div>
            <div class="control-group">
                <div class="controls"><input class="login_input" type="password" name="password_conf" placeholder="confirm password" /></div>
            </div>
            

            <div class="login-btn"><input type="submit" value="Save New Password" class="button darkgreybutton largebutton" /></div>
        </form>
	<?php

    }
    ?>

    </div> 
    <!-- /login block -->
</div>




