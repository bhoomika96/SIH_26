<!DOCTYPE html>
 <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item("app_name");?> <?php echo $this->config->item("app_sub");?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item("base_url");?>severus-icon.png">

        <link rel="stylesheet" href="<?php echo $this->config->item("base_url");?>css/normalize.css">
        <link rel="stylesheet" href="<?php echo $this->config->item("base_url");?>css/fonts.css">
        <link href='//fonts.googleapis.com/css?family=Kaushan+Script|Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo $this->config->item("base_url");?>css/main.css">
		

    <link href="<?php echo $this->config->item("base_url");?>css/simple-sidebar.css" rel="stylesheet">
        <script src="<?php echo $this->config->item("base_url");?>js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        
		<header id="banner" class="fullwidth">
        	<section id="topbar" class="fullwidth">
            	<section id="toplinks" class="body">
                	<a id="logo"=href="<?php echo $this->config->item("base_url");?>"><?php echo $this->config->item("app_sub");?></a>
                    <div class="themelogo"><?php echo $this->config->item("app_name");?></div>
                    <section id="topbuttons">
                        <a class="button greybutton" href="<?php echo $this->config->item("base_url");?>index.php/home/logout/"><i class="icon-file"></i>Logout</a>
                    </section>
                </section>
                
            </section><a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><h2 style="color:black";>&#9776;</h2></a>
			<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                 <li class="active"><a href="<?php echo $this->config->item("base_url");?>"><i class="icon-dashboard"></i>Dashboard</p></a></li>  
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/servers/"><i class="icon-cabinet"></i>Machines</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/users/"><i class="icon-users"></i>Users</p></a></li>
                            
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/cron/"><i class="icon-calendar"></i>Schedule</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/support/"><i class="icon-support"></i>Report</p></a></li>

                
            </ul>
        </div>
    
            <!--<nav id="main-nav" class="body"><ul>
                <li class="active"><a href="<?php echo $this->config->item("base_url");?>"><i class="icon-dashboard"></i><p>Dashboard</p></a></li>  
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/servers/"><i class="icon-cabinet"></i><p>Machines</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/users/"><i class="icon-users"></i><p>Users</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/settings/"><i class="icon-settings"></i><p>Settings</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/services/"><i class="icon-cogs"></i><p>Services</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/cron/"><i class="icon-calendar"></i><p>Schedule</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/support/"><i class="icon-support"></i><p>Report</p></a></li>
            </ul></nav>
            <nav id="sticky-main-nav"><ul class="body">
                <li class="active"><a href="<?php echo $this->config->item("base_url");?>"><i class="icon-dashboard"></i><p>Dashboard</p></a></li>  
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/servers/"><i class="icon-cabinet"></i><p>Machines</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/users/"><i class="icon-users"></i><p>Users</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/settings/"><i class="icon-settings"></i><p>Settings</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/services/"><i class="icon-cogs"></i><p>Services</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/cron/"><i class="icon-calendar"></i><p>Schedule</p></a></li>
                <li><a href="<?php echo $this->config->item("base_url");?>index.php/support/"><i class="icon-support"></i><p>Report</p></a></li>
            </ul></nav>-->
            <div class="hr"></div>
        </header>
		<script src="<?php echo $this->config->item("base_url");?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->config->item("base_url");?>js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>


        <?php 
        if(file_exists("install/install.sql")) echo '<p class="error">The install directory still exists, please delete it or you could lose data</p>'; ?>