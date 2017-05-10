         <section id="page" class="body setup">
            <?php if(strtolower(substr(PHP_OS, 0, 3)) === 'win') { ?>
            <p class="error">Automatically scheduling tasks currently only works on linux, to manually schedule a task on windows create a new scheduled task and get it to run "<?php echo $cronpath;?>"<br />
            <br />Afterwards set the interval time below to match the scheduled task as this is used to determine when the next server check will run</p>
            <?php } elseif ($cron_attempts > 0) { ?>
            <p class="error">Unable to automatically schedule a task, you need to create a cron job that runs "<?php echo $cronpath;?><br />
            <br />The schedule time below needs to match the cron job interval time as this is used to determine when the next server check will run</p>
            <?php } ?>
            <?php if(isset($message)) {echo  $message;}?>
            <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="well">
                    <fieldset>
                        <div class="navbar">
                            <div class="navbar-inner">
                                <h2>Schedule Computer checks</h2>
                            </div>
                        </div>
                        <div class="control-group">
                            <p>Scheduling allows server checks to be run automatically without any intervention, you can still manually force a check whenever you want, in some cases we may not be able to create the job automatically.</p>
                        </div>
                        <div class="control-group">
                            <?php
                            $time = array(
                                "never" => "Disable automatic checks", 
                                "1" => "Every minute", 
                                "2" => "Every 2 minutes", 
                                "3" => "Every 3 minutes", 
                                "4" => "Every 4 minutes",
                                "5" => "Every 5 minutes",
                                "10" => "Every 10 minutes",
                                "15" => "Every 15 minutes",
                                "20" => "Every 20 minutes",
                                "25" => "Every 25 minutes",
                                "30" => "Every 30 minutes",
                                "45" => "Every 45 minutes",
                                "60" => "Every 60 minutes");
                            echo '<select class="login_input" name="heartbeat">';
                            foreach($time as $n => $t) {
                                $current = ($n === $current_heartbeat) ? ' selected="selected"' : '';
                                echo '<option value="'.$n.'"'.$current.'>'.$t.'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>
                    </fieldset>
                    <input type="submit" value="Set Schedule" class="button largebutton" id="submit" />
                </div>
        
                <div style="margin-top: 30px;"></div>
            </form>
        </section>
