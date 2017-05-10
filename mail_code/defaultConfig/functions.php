<?php

date_default_timezone_set("Asia/Calcutta");
$Current_YMD = date("Y-m-d H:i:s");

function SendMail($To, $Subject, $Body) {
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->SetLanguage( 'en', 'phpmailer/language/' );

    $mail->Host = 'smtp.gmail.com';
    //$mail->Host = 'smtp.m-adcall.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';

    $mail->SMTPAuth = true;
    $mail->Username = "retailer.madcall@gmail.com";
    $mail->Password = "gourav@123";
    //$mail->Username = "sih262017@gmail.com";
    //$mail->Password = "#sih262017";

    $mail->setFrom('retailer.madcall@gmail.com', 'House_No_26');

    $mail->addAddress($To);
    $mail->Subject = $Subject;
    $mail->msgHTML($Body);
    $mail->AltBody = 'This email contains HTML contents.';

    if (!$mail->send()) {
        return "Error: " . $mail->ErrorInfo;
    } else {
        return "";
    }
}

function ValidateParameter($Value) {
    if ($Value == "" || strtolower($Value) == "null")
        return FALSE;
    else
        return TRUE;
}

function FetchUserDetails($sID) {
    $SQ = mysql_query("SELECT sUniqueId,`name`,email,shop_url,password FROM shop_master_details WHERE sid = $sID AND verification = 0");
    if (mysql_num_rows($SQ) <= 0) {
        responseJson(201, "User not exists!!", "");
    }
    $Row = mysql_fetch_assoc($SQ);
    return $Row;
}

function GeneratePassword() {
    $length = 6;
    $Set1 = 'ABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
    $Set2 = 'abcdefghijlkmnopqrstuvwxyz0123456789';
    $Password = '';

    $alt = time() % 2;

    for ($i = 0; $i < $length; $i++) {
        if ($alt == 1) {
            $Password .= $Set2[(rand() % strlen($Set2))];
            $alt = 0;
        } else {
            $Password .= $Set1[(rand() % strlen($Set1))];
            $alt = 1;
        }
    }

    return $Password;
}

function ValidateEmailSMTP($Email) {
//    $Email = urlencode($Email);
    $url = "http://localhost/testmail/checkemail.php?email=$Email";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Execute post
    $result = curl_exec($ch);
    return $result;
}

function responseJson($RespCode, $RespMessage, $Data) {
    $ResponseData = array("respCode" => $RespCode, "respMessage" => "$RespMessage", "data" => $Data);
    $Response = json_encode($ResponseData);
    echo $Response;
    die();
}
