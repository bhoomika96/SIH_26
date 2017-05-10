<div class="setup body">
    <h1>Add server</h1>

          <?php if(isset($message)) {echo  $message;}?>

          <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

          <div class="well">
        <fieldset>
        <div class="navbar">
            <div class="navbar-inner">
                <h2>Connector script</h2>
            </div>
        </div>
          <div class="control-group">
            You need to download connector script and upload in client machines.
          </div>
          <div class="control-group">
            Note: This script may show 404 error on hitting in browser...  this is normal and expected.
          </div>
          <div class="control-group">
            <a class="button largebutton redbutton2" target="_blank" href="<?php echo $this->config->item("base_url");?>index.php/home/download_script/">Download connector script</a>
          </div>
        </fieldset>
        </div>
        
        <div class="well">
        <fieldset>
          <div class="navbar">
              <div class="navbar-inner">
                  <h2>Settings</h2>
              </div>
          </div>
          <div class="control-group">
            When you have uploaded the connector script to your server set the web address to the script (i.e. http://server1.com/connector_script.php)
          </div>
          <div class="control-group">
            <input type="text" id="server_script_address" value="<?php echo $this->input->post('server_script_address');?>" class="input_text login_input" placeholder="path to script" name="server_script_address" />
          </div>
          <div class="control-group">
            <input type="submit" value="Register server now" class="button redbutton2 largebutton" id="submit" />
          </div>
        </fieldset>
        
        
        </div>
          </form>

</div>