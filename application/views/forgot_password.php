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
          echo '<p>Thank you. We have sent you an email with further instructions on how to reset your password.</p>';
        } else {
        ?>
               <form method="post" class="row-fluid" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div class="control-group">
                <div class="controls"><input class="login_input" type="text" name="user_email" placeholder="email address" /></div>
            </div>
            

            <div class="login-btn"><input type="submit" value="Reset" class="button darkgreybutton largebutton" /></div>
        </form>

          <?php
          }
          ?>


    </div>
</div>



