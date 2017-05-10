
	  <section id="page" class="body section_center">
            <div class="inset-box big-inset">
            	<div id="over-capacity"><i class="icon-pie"></i> Total</div>
            	<div id="over-free"><?php echo $all_count;?><span>COMPUTERS<br />online</span></div>
                <div class="cap-button"><a class="button redbutton2" href="<?php echo $this->config->item("base_url");?>index.php/servers/add_server/">Add new machine</a></div>
            </div>
            <aside id="systemspec" class="big-inset">
            	<ul>
                	<li><h2>NETWORK ADMIN</h2></li>
                	<li><span class="redtext2">MACHINE</span> <?php echo php_uname("n");?> - <?php echo $uptime;?></li>
                	<li><span class="redtext2">LOAD</span> <?php echo $load;?></li>
                	<li><span class="redtext2">MODEL</span> <?php echo $cpuinfo;?></li>
                	<li><span class="redtext2">PROCESSES</span> <?php echo $processcount; ?></li>
                    <li><span class="redtext2">MEMORY</span> <?php echo $memory;?></li>
                    <li><span class="redtext2">IP ADDRESS</span> <?php echo (isset($_SERVER['SERVER_ADDR']) && !empty($_SERVER['SERVER_ADDR'])) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'];?></li>
            	</ul>
            </aside>
            
            <div class="main-buttons inset-box big-inset">
                <div class="inset-box box-info"><span class="box-title">Last Network Check</span><p><?php echo $last_check;?> ago<br />Next check in <?php echo $next_check;?></div>
                <a class="button darkgreybutton" style="margin-right:10px;" href="<?php echo $this->config->item("base_url");?>index.php/cron/force_update/"><i class="icon-lightning"></i><span class="inner-button">Force Check Now</span></a>
                <a class="button greybutton" style="margin-right:10px;" href="<?php echo $this->config->item("base_url");?>index.php/home/download_script/"><i class="icon-download"></i><span class="inner-button">Download Connector</span></a>
            </div>
            
            <div class="hr"></div>

        </section>
        
        <section id="alllist" class="body public_page">
            <?php echo $server_list;?>
            <div style="margin-top:40px;"></div>
        </section>
            
        <div class="hr"></div>
		<?php echo $first_install;?>
		
        
