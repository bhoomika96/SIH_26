<div id="view_server" class="servers body public_page">
    <?php echo $service_details;?>
    <div id="service" class="box services">
    	<form method="post" class="row-fluid" action="<?php echo $_SERVER["PHP_SELF"];?>">
        	<input type="hidden" name="action" value="add_service" />
			<div class="reload-box"><div class="label">Add new service</div>
            	<div class="inner-box">
                	<div class="row"><div class="row-details textleft" style="width:50%;margin: 1em 0;"><input type="text" class="text textleft" name="service_name" placeholder="service name" value="" /></div><div class="row-details"><input type="text" class="text" name="service_default_port" placeholder="port" value="" /></div><div class="row-details textright"><input type="submit" class="button redbutton2" value="Save" /></div></div>
                </div>
            </div>
        </form>
    </div>   
</div> 