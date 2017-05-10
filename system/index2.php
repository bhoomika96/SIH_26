<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>unRAID</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<header id="banner" class="fullwidth">
        	<section id="topbar" class="fullwidth">
            	<section id="toplinks" class="body">
                	<a id="logo" href="/">unRAID <span>v5.0.5</span></a>
                    <section id="topbuttons">
                        <a class="button greenbutton" style="margin-right:10px;" href="/"><i class="icon-file"></i>Logs</a>
                        <a class="button greenbutton" href="/"><i class="icon-file"></i>Info</a>
                    </section>
                </section>
                
            </section>
            <nav id="main-nav" class="body"><ul>
                <li class="active"><a href="#"><i class="icon-home"></i><p>Main</p></a></li>
                <li><a href="#"><i class="icon-tree"></i><p>Shares</p></a></li>
         
                <li><a href="#"><i class="icon-users"></i><p>Users</p></a></li>
                <li><a href="#"><i class="icon-settings"></i><p>Settings</p></a></li>
                <li><a href="#"><i class="icon-cogs"></i><p>Utilities</p></a></li>
                <li><a href="#"><i class="icon-info"></i><p>About</p></a></li>
            </ul></nav>
        </header>
        
        <section id="page" class="body">
            <div class="hr"></div>
            <div class="inset-box big-inset">
            	<div id="over-capacity"><i class="icon-pie"></i> Capacity</div>
            	<div id="over-free">5.20<span>TB<br />free</span></div>
            </div>
            <aside id="systemspec">
            	<ul>
                	<li><span class="greentext">SERVER</span> Tower - 50 days, 13:03</li>
                	<li><span class="greentext">LOAD</span> 2.01, 1.97, 1.87</li>
                	<li><span class="greentext">MODEL</span> Intel(R) Xeon(R) CPU E3-1230 V2 @ 3.30GHz</li>
                	<li><span class="greentext">PROCESSES</span> 35</li>
                	<li><span class="greentext">MEMORY</span> 12GB (11GB Available / 11GB cached)</li>
            	</ul>
            </aside>
            <div class="main-buttons">
            <a class="button redbutton" style="margin-right:10px;" href="/"><i class="icon-lightning"></i><span class="inner-button">Shutdown Array</span></a>
            <a class="button greenbutton" style="margin-right:10px;" href="/"><i class="icon-spinner3"></i><span class="inner-button">Check Parity</span></a>
            <a class="button greenbutton" style="margin-right:10px;" href="/"><i class="icon-spinner3"></i><span class="inner-button">Spin Up</span></a>

            </div>
            <div class="hr"></div>

        </section>
        
        <section id="disks" class="body">

            <h2>Control Disks</h2>

            <div class="inset-box disk-info">
                <div>WDC_WD20EADS-00R6B0_WD-WCAVY6563431 (sdb)</div>
                <img class="disk" src="/img/disk.png" alt="Parity" />
                <div class="temp"><?php echo rand(23,35);?><span>&deg;C</span></div>
                <div class="mini-disk-info">
                    Size: <span>2TB</span><br />
                    Errors: <span>0</span>
                </div>
                <img class="ribbon" src="/img/green-ribbon.png" alt="Parity" />
                <div class="disk-ref">Parity</div>
                <div class="space-info">
                    300GB Free / 1.7GB Used
                    <div class="space"><div class="used" style="width: 70%"></div></div>
                </div>
            </div>
            <div class="inset-box disk-info">
                <div>WDC_WD20EADS-00R6B0_WD-WCAVY6563431 (sdb)</div>
                <img class="disk" src="/img/disk.png" alt="Cache" />
                <div class="temp"><?php echo rand(23,35);?><span>&deg;C</span></div>
                <div class="mini-disk-info">
                    Size: <span>500GB</span><br />
                    Errors: <span>0</span>
                </div>
                <img class="ribbon" src="/img/green-ribbon.png" alt="Disk <?php echo $a;?>" />
                <div class="disk-ref">Cache</div>
                <div class="space-info">
                    400GB Free / 100GB Used
                    <div class="space"><div class="used" style="width: 20%"></div></div>
                </div>
            </div>
            <div class="inset-box disk-info">
                <div>WDC_WD20EADS-00R6B0_WD-WCAVY6563431 (sdb)</div>
                <img class="disk" src="/img/flash.png" alt="Flash" />
                <div class="temp">*</div>
                <div class="mini-disk-info">
                    Size: <span>2GB</span><br />
                    Errors: <span>0</span>
                </div>
                <img class="ribbon" src="/img/green-ribbon.png" alt="Flash" />
                <div class="disk-ref">Flash</div>
                <div class="space-info">
                    1.5GB Free / 0.5GB Used
                    <div class="space"><div class="used" style="width: 25%"></div></div>
                </div>
            </div>
            <h2>Data Disks</h2>

        	<?php 
			for($a=1;$a<=24;$a++) { 
				$free = rand(10,90);
				$used = 100-$free;

                $ribbon = ($a === 3) ? "red" : "green";
                $diskstatus = ($a === 3) ? " failed" : " normal";
                $errors = ($a === 3) ? "5" : "0";
			?>
            <div class="table-box<?php echo $diskstatus;?>">
            	<div class="col col1"><img class="disk" src="/img/disk.png" alt="Disk <?php echo $a;?>" /><div class="disk-ref">Disk <?php echo $a;?></div><br /><div class="disk-name">WDC_WD20EADS-00R6B0_WD-WCAVY6563431 (sdb)</div></div>
            	<div class="col col2"><div class="temp"><?php echo rand(23,35);?><span>&deg;C</span></div></div>
            	<div class="col col3"><div class="temp">2<span>TB</span></div></div>
                <div class="col overcol1">
                    <div class="col col4"><div class="colspace"><?php echo (2/100)*$used;?><span>USED</span></div></div>
                    <div class="col col5"><div class="colspace"><?php echo (2/100)*$free;?><span>FREE</span></div></div>
                    <div class="space-info">
                        <div class="space"><div class="used" style="width: <?php echo $used;?>%"></div></div>
                    </div>
                </div>
            	<div class="col col6"><div class="temp"><?php echo $errors;?><span>Errors</span></div></div>
            	<div style="clear:both;"></div>
            </div>
            <!--<div class="inset-box disk-info<?php echo $diskstatus;?>">
            	<div>WDC_WD20EADS-00R6B0_WD-WCAVY6563431 (sdb)</div>
                <img class="disk" src="/img/disk.png" alt="Disk <?php echo $a;?>" />
                <div class="temp"><?php echo rand(23,35);?><span>&deg;C</span></div>
                <div class="mini-disk-info">
                    Size: <span>2TB</span><br />
                    Errors: <span><?php echo $errors;?></span>
                </div>
                <img class="ribbon" src="/img/<?php echo $ribbon;?>-ribbon.png" alt="Disk <?php echo $a;?>" />
                <div class="disk-ref">Disk <?php echo $a;?></div>
            	<div class="space-info">
                    300GB Free / 1.7GB Used
                    <div class="space"><div class="used" style="width: <?php echo $used;?>%"></div></div>
                </div>
            </div>-->
            <?php } ?>
            
            <div class="hr"></div>
        </section>
        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/vendor/Chart.min.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-46639161-3');ga('send','pageview');
        </script>
    </body>
</html>
