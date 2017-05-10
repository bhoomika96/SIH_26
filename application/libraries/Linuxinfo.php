<?php


class Linuxinfo
{
    public $ldir = "/proc";

    public function getCpuInfo()
    {
        return $this->parsefile($this->ldir."/cpuinfo");
    }

    public function getMemStat()
    {
        $memory = $this->parsefile($this->ldir."/meminfo");

        return array("MemTotal" => intval($memory["MemTotal"])*1024, "MemFree" => intval($memory["MemFree"])*1024, "Buffers" => intval($memory["Buffers"])*1024, "Cached" => intval($memory["Cached"])*1024);
    }

    public function getUptime()
    {
        //GET SERVER LOADS
        $loadresult = @exec('uptime');
        preg_match("/averages?: ([0-9\.]+),[\s]+([0-9\.]+),[\s]+([0-9\.]+)/",$loadresult,$avgs);

        //GET SERVER UPTIME
        $uptime = explode(' up ', $loadresult);
        $uptime = explode(',', $uptime[1]);
        $uptime = $uptime[0].', '.$uptime[1];

        return array("load" => $avgs[1].", ".$avgs[2].", ".$avgs[3], "uptime" => $uptime);
    }

    public function getServiceStatus($checkservices)
    {
        // $checkservices = array("servicename" => "port", "servicename2" => "port")
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
        $processes = shell_exec("ps ax -o stat,args |wc -l");
        if (strtolower(substr(PHP_OS, 0, 3)) !== 'win') return $processes;
        else return 0;
    }

    public function parsefile($file)
    {
        //$content = file_get_contents($file);
        $content = shell_exec("cat ".$file);
        $info=array();
        foreach ( explode("\n",$content) as $line) {
            $pos = strpos($line,":");
            $key = trim( substr($line,0,$pos) );
            $val = trim( substr($line,$pos+1) );
            if ( $key=="") continue;
            $info[$key] = $val;
        }

        return $info;
    }
}

//$stats = new linuxstat;
//$output["cpu"] = $stats->getCpuInfo();
//$output["memory"] = $stats->getMemStat();
//$output["uptime"] = $stats->getUptime();
//$output["services"] = $stats->getServiceStatus();
//$output["speed"] = $stats->getPortLink();
//$output["processes"] = count($stats->getProcesses());
