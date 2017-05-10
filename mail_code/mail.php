<?php

require_once './defaultConfig/dbConfig.php';
require_once './defaultConfig/functions.php';
require_once './defaultConfig/lib/PHPMailer/PHPMailerAutoload.php';

 

ob_start();
 
include './mailTemplate/email_template.php';
$email=$_GET['email'];
$Mail_Body = ob_get_clean();
$Mail_Subject = "SIH51| Software List With Latest Version";
$SendMail = SendMail($email, $Mail_Subject, $Mail_Body);
 