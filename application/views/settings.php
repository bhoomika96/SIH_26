        <section id="page" class="body setup">
            <?php if(isset($message)) {echo  $message;}?>
            
                <div class="well">

                    <fieldset>
                        <div class="control-group">
                            <h3>Public page</h3>
                            <p>If you enable the public page then an overview of the servers will be visible without logging in, otherwise the login page will be displayed</p>
                        </div>
                        <div class="control-group">
                            <h3>High load value (linux)</h3>
                            <p>Set the server load value that will trigger a server to show up in the warning list. </p>
                        </div>
                        <div class="control-group">
                            <h3>High load value (windows)</h3>
                            <p>Windows servers don't have a load value like linux servers so set the CPU percent value</p>
                        </div>
                        <div class="control-group">
                            <h3>Email Notification</h3>
                            <p>Leave blank to disable or enter you email address to receive emails when a Machine goes offline</p>
                        </div>
                    </fieldset>
                </div>
                 <div class="well">
                 <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <fieldset>
                        <div class="navbar">
                            <div class="navbar-inner">
                                <h2>Settings</h2>
                            </div>
                        </div>
                        <div class="control-group" style="margin-bottom: 60px;">
                            <?php
                            $public = array(
                                "0" => "Disable public page", 
                                "1" => "Enable public page");
                            echo '<select class="login_input" name="setting_display_public">';
                            foreach($public as $n => $t) {
                                $current = ($n === (int)$setting_display_public) ? ' selected="selected"' : '';
                                echo '<option value="'.$n.'"'.$current.'>'.$t.'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>
                         <div class="control-group" style="margin-bottom: 60px;">
                            <input class="login_input" type="text" name="setting_high_load" value="<?php echo $this->input->post("setting_high_load");?>" placeholder="high load value i.e. 10" />
                        </div>
                         <div class="control-group" style="margin-bottom: 60px;">
                            <input class="login_input" type="text" name="setting_high_load_win" value="<?php echo $this->input->post("setting_high_load_win");?>" placeholder="high load value i.e. 10%" />
                        </div>
                         <div class="control-group">
                            <input class="login_input" type="text" name="setting_email_notification" value="<?php echo $this->input->post("setting_email_notification");?>" placeholder="email address" />
                        </div>
                    </fieldset>
                    <input type="submit" value="Save settings" class="button largebutton" id="submit" />
                </form>
                </div>
        
                <div style="margin-top: 30px;"></div>
            
        </section>
 