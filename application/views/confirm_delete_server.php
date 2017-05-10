<div id="view_server" class="servers body public_page">
	<div class="well" style="max-width: inherit;">
		<h1>Delete this Machine?</h1>
		<p>Please confirm you want to delete this Machine, if you do, all data for this Machine will be deleted</p>
		<div class="hr skinny"></div>
		<a class="button redbutton2 largebutton" href="<?php echo $this->config->item("base_url");?>index.php/servers/delete_server/<?php echo $server_id;?>/">Yes, delete this Machine</a> 
		<a class="button greybutton largebutton" href="<?php echo $this->config->item("base_url");?>index.php/servers/view_server/<?php echo $server_id;?>/">Cancel</a>
</div>
