<div class="login body">
    <!-- Login block -->
    <?php echo $this->session->flashdata('message'); ?>
    <?php if(isset($error) && !empty($error)) {echo $error;}?>
    <div class="well">
        <div class="navbar">
            <div class="navbar-inner"> 
                <h2>Login to <span>SIH_Team51</span></h2>
            </div>
        </div>
       <form method="post" class="row-fluid" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div class="control-group">
                <div class="controls"><input class="login_input" type="text" name="user_login" placeholder="username" /></div>
            </div>
            
            <div class="control-group">
                <div class="controls"><input class="login_input" type="password" name="user_password" placeholder="password" /></div>
            </div>

            <div class="login-btn"><input type="submit" value="Login" class="button darkgreybutton largebutton" /><a class="forgot" href="<?php echo $this->config->item("base_url");?>index.php/home/forgot/">Forgot password</a></div>
        </form>
    </div>
</div>