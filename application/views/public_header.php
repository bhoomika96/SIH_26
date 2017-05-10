<?php
$hidelogin = (isset($hidelogin) && !empty($hidelogin)) ? $hidelogin : false;
?>
<!DOCTYPE html>
 <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item("app_name");?> <?php echo $this->config->item("app_sub");?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item("base_url");?>severus-icon.png">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo $this->config->item("base_url");?>css/normalize.css">
        <link rel="stylesheet" href="<?php echo $this->config->item("base_url");?>css/fonts.css">
        <link href='http://fonts.googleapis.com/css?family=Kaushan+Script|Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo $this->config->item("base_url");?>css/main.css">
        <script src="<?php echo $this->config->item("base_url");?>js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
       
		<header id="banner" class="fullwidth">
        	<section id="topbar" class="fullwidth">
            	<section id="toplinks" class="body">
                	<a id="logo" href="/"><?php echo $this->config->item("app_sub");?> <span>v<?php echo $this->config->item("version");?></span></a>
                    <div class="themelogo"><?php echo $this->config->item("app_name");?></div>
                    <section id="topbuttons">
                        <?php if($hidelogin !== true) { ?><a class="button greybutton" href="<?php echo $this->config->item("base_url");?>index.php/home/login/"><i class="icon-file"></i>Login</a><?php } ?>
                    </section>
                </section>
                
            </section>
        </header>