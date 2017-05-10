<html>
<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
	<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script>
	<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
	<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
	<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
	
	
	
	
	
	








   

	
    <script src="//cdn.datatables.net/buttons/1.2.3/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.3/js/buttons.print.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">
	
	
	
	
	
   

	
    <script src="//cdn.datatables.net/buttons/1.2.3/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.3/js/buttons.print.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">
    
<style>
img{
	align:right;
	margin-left:87%;
}

</style>


<script>

 
$(document).ready(function() {
    $('#example').DataTable( {
		dom: 'Bfrtip',
        
		 buttons: [
            {
                extend: 'excelHtml5',
                title: 'Software Details export --<?php echo $_POST['sdate'];?>'
            },
            {
                extend: 'pdfHtml5',
                title: 'Software Details export --<?php echo $_POST['sdate'];?>'
            },
            {
                extend: 'csvHtml5',
                title: 'Software Details export --<?php echo $_POST['sdate'];?>'
            }
        ]
    } );
	
	
} );

</script>

</head>
	<?php //echo $server_details;
	 $id=$this->uri->segments[3];; 
	$data_sel=mysql_query("select res_memory from server_responses where res_server_id= $id order by res_id desc limit 1");
	$row=mysql_fetch_assoc($data_sel);
	
	$dataarr=explode("Version",$row[res_memory]);
	
	 $dataarr[0];
	echo "<pre>";
	$dataarr[0]=rtrim($dataarr[0],"||");
	$namesarr= explode("|",ltrim($dataarr[0],'Name|'));
	
	//$namesarr=array_filter($namesarr);
	//echo $dataarr[1];;
	$versionarr=explode("|InstallDate",$dataarr[1]);
	
	$versionarr_data=explode("|",trim($versionarr[0],"|"));
	
	
	$dtarr_data=explode("|",trim($versionarr[1],"|"));
	//print_r($dtarr_data);
	$link ="http://localhost/monitor/index.php/servers/showpdf/"
	
	
	//print_r($namesarr);

	
	?><body>
	
	
	  <!-- <a href="/monitor/application/views/show.php"> -->
	 
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
	 

