<div class="setup body">

		  <?php if(isset($message)) {echo '<p class="error">' . $message . '</p>';}?>

		  <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
        <div class="well">
        <fieldset class="labelled">
          <div class="navbar">
              <div class="navbar-inner">
                  <h2><?php echo $edittype;?> user</h2>
              </div>
          </div>
          <div class="control-group">
            <label for="user_name">Name</label>
            <input type="text" id="user_name" value="<?php echo $this->input->post('user_name');?>" class="input_text login_input" name="user_name" />
          </div>
          
          <div class="control-group">
            <label for="user_login">Username</label>
            <input type="text" id="user_login" value="<?php echo $this->input->post('user_login');?>" class="input_text login_input" name="user_login" />
          </div>
          <div class="control-group">
            <label for="user_password">Password <span class="small">(leave blank to keep current)</span></label>
            <input type="password" id="user_password" value="" class="input_text login_input" name="user_password" />
          </div>
          <div class="control-group">
            <label for="user_email">Email</label>
            <input type="text" id="user_email" value="<?php echo $this->input->post('user_email');?>" class="input_text login_input" name="user_email" />
          </div>
          <?php
            if(user("user_master") === "1" && (isset($user_id) && $user_id !== "1") || !isset($user_id)) {
          ?>
          <div class="control-group">
            <label for="user_active">Active</label>
            <!--<input type="text" id="user_active" value="<?php echo $this->input->post('user_active');?>" class="input_text login_input" name="user_active" />-->
            <select id="user_active" class="input_text login_input" name="user_active">
            	<option value="0"<?php echo ($this->input->post('user_active') === "0") ? ' selected="selected"' : '';?>>Disabled</option>
            	<option value="1"<?php echo ($this->input->post('user_active') === "1") ? ' selected="selected"' : '';?>>Enabled</option>
            </select>
          </div>

          <?php
            }
          ?>
          <div class="control-group">
            <input type="submit" value="Save" class="button largebutton" id="submit" />
          </div>
          
          
        </fieldset>
       
        
        </div>
        
           <?php
            if(user("user_master") === "1" && (isset($user_id) && $user_id !== "1")) {
          ?>
          <div class="control-group">
            <a class="button redbutton2" href="<?php echo $this->config->item("base_url");?>index.php/users/delete_user/<?php echo $user_id;?>/">Delete user</a>
          </div>

          <?php
            }
          ?>
        
        <div style="margin-top: 30px;">
	</div>
		  </form>

</div> 