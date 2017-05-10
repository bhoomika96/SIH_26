<?php
$Connection = mysql_connect("localhost","root","") or die("Error in DB Connection: ".  mysql_error());
$DBConn = mysql_select_db("monitor_new",$Connection) or die("Error in DB Selection: ".  mysql_error());

 
?>