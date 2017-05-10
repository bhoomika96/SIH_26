<div class="setup body">
    <h1>Install <span>SIH26</span></h1>
    <?php if(is_writable($db_config_path)){?>

		  <?php if(isset($message)) {echo '<p class="error">' . $message . '</p>';}?>

		  <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

          <div class="well">
        <fieldset>
        <div class="navbar">
            <div class="navbar-inner">
                <h2>Database settings</h2>
            </div>
        </div>
          <div class="control-group">
            <input type="text" id="hostname" value="<?php echo (!$this->input->post('hostname')) ? 'localhost' : $this->input->post('hostname');?>" class="input_text login_input" placeholder="hostname" name="hostname" />
          </div>
          <div class="control-group">
            <input type="text" id="username" class="input_text login_input" value="<?php echo $this->input->post('username');?>" placeholder="username" name="username" />
          </div>
          <div class="control-group">
            <input type="password" id="password" class="input_text login_input" value="<?php echo $this->input->post('password');?>" placeholder="password" name="password" />
          </div>
          <div class="control-group">
            <input type="text" id="database" class="input_text login_input" value="<?php echo $this->input->post('database');?>" placeholder="database" name="database" />
          </div>
        </fieldset>
        </div>
        
        <div class="well">
        <fieldset>
          <div class="navbar">
              <div class="navbar-inner">
                  <h2>Admin settings</h2>
              </div>
          </div>
          <div class="control-group">
            <input type="text" id="user_name" value="<?php echo $this->input->post('user_name');?>" class="input_text login_input" placeholder="your name" name="user_name" />
          </div>
          <div class="control-group">
            <input type="text" id="user_login" value="<?php echo $this->input->post('user_login');?>" class="input_text login_input" placeholder="username" name="user_login" />
          </div>
          <div class="control-group">
            <input type="password" id="user_password" value="<?php echo $this->input->post('user_password');?>" class="input_text login_input" placeholder="password" name="user_password" />
          </div>
          <div class="control-group">
            <input type="text" id="user_email" value="<?php echo $this->input->post('user_email');?>" class="input_text login_input" placeholder="email" name="user_email" />
          </div>
        </fieldset>
        
        
        </div>
        <div style="margin-top: 30px;">
        <hr />
                  <input type="submit" value="Install" class="button largebutton" id="submit" />
        <hr />
	</div>
		  </form>

	  <?php } else { ?>
      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code><br /><br />For windows servers make sure it's writable by IUSR</p>
	  <?php } ?>
</div>