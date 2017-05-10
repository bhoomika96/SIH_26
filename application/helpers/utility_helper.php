 <?php
function format_bytes($bytes, $is_drive_size=true, $beforeunit='<span>', $afterunit='</span>')
{
    $labels = array('B','KB','MB','GB','TB');
    for($x = 0; $bytes >= 1000 && $x < (count($labels) - 1); $bytes /= 1000, $x++); // use 1000 rather than 1024 to simulate HD size not real size
    if($labels[$x] == "TB") return(round($bytes, ($is_drive_size)?1:2).$beforeunit.$labels[$x].$afterunit);
    else return(round($bytes, ($is_drive_size)?0:2).$beforeunit.$labels[$x].$afterunit);
}

function formatram($bytes)    {
    $labels = array('B','KB','MB','GB','TB');
    for($x = 0; $bytes >= 1024 && $x < (count($labels) - 1); $bytes /= 1024, $x++); 
    return round($bytes, 1).$labels[$x];
}


function split_text($text, $len=18) {
	if(strlen($text) > $len) {
		return substr($text, 0, $len)."<br />".substr($text, $len);
	} else return $text;
}

function setup_pause($msec) { 
   $usec = $msec * 1000;
   socket_select($read = NULL, $write = NULL, $sock = array(socket_create (AF_INET, SOCK_RAW, 0)), 0, $usec);
}

function write_download($data) {

	$template_path 	= 'application/config/download_script.php';
	$output_path 	= 'application/config/download.php';

	
	$database_file = file_get_contents($template_path);

	$new  = str_replace("%HOSTNAME%",$data['hostname'],$database_file);
	$new  = str_replace("%USERNAME%",$data['username'],$new);
	$new  = str_replace("%PASSWORD%",$data['password'],$new);
	$new  = str_replace("%DATABASE%",$data['database'],$new);

	$handle = fopen($output_path,'w+');

	@chmod($output_path,0777);

	if(is_writable($output_path)) {

		// Write the file
		if(fwrite($handle,$new)) {
			return true;
		} else {
			return false;
		}

	} else {
		return false;
	}
}


function ip_online($ip){
	$start = microtime(true);
	$ping = @fsockopen($domain, 80, $errno, $errstr, 10);
	$stop  = microtime(true);
	$status = 0;

	if (!$ping){
		$status = false;  // Site is down
	}
	else{
		fclose($ping);
		$status = ($stop - $start) * 1000;
		$status = floor($status);
	}
	return $status;
}

function time_ago($date,$timestamp=false,$diff=true, $granularity=2) {
	$date = $timestamp===true ? $date : strtotime($date);
	$difference = ($diff === true) ? (time() - $date) : $date;
	$retval = '';
	$periods = array('decade' => 315360000,
		'year' => 31536000,
		'month' => 2628000,
		'week' => 604800, 
		'day' => 86400,
		'hour' => 3600,
		'minute' => 60,
		'second' => 1);
								 
	foreach ($periods as $key => $value) {
		if ($difference >= $value) {
			$time = floor($difference/$value);
			$difference %= $value;
			$retval .= ($retval ? ' ' : '').'<span>'.$time.'</span>'.' ';
			$retval .= (($time > 1) ? $key.'s' : $key);
			$granularity--;
		}
		if ($granularity == '0') { break; }
	}
	return $retval;      
}

function time_to_ago($date,$timestamp=false,$diff=true, $granularity=2) {
	$date = $timestamp===true ? $date : strtotime($date);
	$difference = ($diff === true) ? (time() - $date) : $date;
	$retval = '';
	$periods = array('decade' => 315360000,
		'year' => 31536000,
		'month' => 2628000,
		'week' => 604800, 
		'day' => 86400,
		'hour' => 3600,
		'minute' => 60,
		'second' => 1);
								 
	foreach ($periods as $key => $value) {
		if ($difference >= $value) {
			$time = round($difference/$value);
			$difference %= $value;
			$retval .= ($retval ? ' ' : '').'<span>'.$time.'</span>'.' ';
			$retval .= (($time > 1) ? $key.'s' : $key);
			$granularity--;
		}
		if ($granularity == '0') { break; }
	}
	return $retval;      
}

function deleteDir($path)
{
    return is_file($path) ?
            @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
}
?>