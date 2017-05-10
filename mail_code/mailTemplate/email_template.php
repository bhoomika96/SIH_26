 <?php  
	$data_sel=mysql_query("select res_memory from server_responses where res_server_id= 2 order by res_id desc limit 1");
	$row=mysql_fetch_assoc($data_sel);
	
	$dataarr=explode("Version",$row['res_memory']);
	
	 $dataarr[0];
	
	$dataarr[0]=rtrim($dataarr[0],"||");
	$namesarr= explode("|",ltrim($dataarr[0],'Name|'));
	
	//$namesarr=array_filter($namesarr);
	//echo $dataarr[1];;
	$versionarr=explode("|InstallDate",$dataarr[1]);
	
	$versionarr_data=explode("|",trim($versionarr[0],"|"));
	
	
	$dtarr_data=explode("|",trim($versionarr[1],"|"));
	//print_r($dtarr_data);
	
	
	
	//print_r($namesarr);

	
	?><body>
	<i class="fa fa-download" aria-hidden="true"></i>
	
	  <!-- <a href="/monitor/application/views/show.php"> -->
	 
    <img src="smiley.gif" alt="HTML tutorial" style="width:22px;height:15px;border:0;align:right;">
      </a>
	  <h1>List Of Softwares With Latest Version:</h1><br>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
		
           <th>Name</th>
		   <th>Version</th>
		   <th>Install Date</th>
        
        </thead>
        
        <tbody>
             <?php 
			 
			 
			 for ($i = 0; $i < count($namesarr); $i++) {
    
	echo "<tr><th>".$namesarr[$i]."</th><th>".$versionarr_data[$i]."</th><th>".$dtarr_data[$i]."</th></tr>";
}
			 /*foreach (array_filter(array_combine($namesarr, $versionarr_data,$dtarr_data)) as $code => $name) {
    
	echo "<tr><th>".$code."</th><th>".$name."</th></tr>";
}
/*foreach($namesarr as $names){
		echo "<tr><th>".$names."</th></tr>";
		echo "<tr><th>".$names."</th></tr>";
		
		
	}   */  ?>   
	</tbody>
	
	</table>
	