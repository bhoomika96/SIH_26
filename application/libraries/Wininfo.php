<?php


class Wininfo
{
    public function getCpuInfo()
    {
        exec("wmic cpu get name", $output);

        return array("model name" => $output[1]);
    }

     function getMemStat() {
        exec("wmic product get name", $output);
		    exec("wmic product get version", $output_ver);
			exec("wmic product get InstallDate", $output_dt);
			

        return array_merge($output,$output_ver,$output_dt);
		
    }

    public function getUptime()
    {
        exec("wmic cpu get loadpercentage", $load);
        exec("net statistics Workstation", $uptime);
        if(isset($uptime) && !empty($uptime)) {
            $uptime = $uptime[3];
            $uptime = str_replace("Statistics since", "", $uptime);
            $uptime = trim($uptime);
            $parts = explode("/", $uptime);
            $extra = explode(" ", $parts[2]);
            $newuptime = strtotime($extra[0]."-".$parts[1]."-".$parts[0]." ".$extra[1]);
            $uptime = time_ago($newuptime, true, true);
        } else $uptime = "";
        $loadamount = (isset($load[1]) && !empty($load[1])) ?  $load[1]."%" : "";
        return array("load" => $loadamount, "uptime" => $uptime);

    }

    public function getServiceStatus($checkservices)
    {
        $services = array();
        $errno = false; $errstr = false; $timeout = 1;
		if(isset($checkservices) && !empty($checkservices)) {
			foreach ($checkservices as $name => $ort) {
				$fp = fsockopen("localhost", $port, $errno, $errstr, $timeout);
				if (!$fp) {
					$services[$name] = "Offline";
				} else {
					$services[$name] = "Online";
				}
				fclose($fp);
			}
		}

        return $services;
    }

    public function countProcesses()
    {
        exec("wmic process get name", $output);

        return (count($output)-5);
    }

}

//$stats = new linuxstat; chal nahi raha
//$output["cpu"] = $stats->getCpuInfo();
//$output["memory"] = $stats->getMemStat();
//$output["uptime"] = $stats->getUptime();
//$output["services"] = $stats->getServiceStatus();
//$output["speed"] = $stats->getPortLink();
//$output["processes"] = count($stats->getProcesses());
