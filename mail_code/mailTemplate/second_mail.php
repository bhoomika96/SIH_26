<?php
define("Path","http://gcm.m-adcall.com/retail_madcall/mailTemplate/");
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Define Charset -->

    <!-- Mirrored from thevectorlab.net/flatlab/email_template.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Nov 2016 09:37:34 GMT -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Responsive Meta Tag -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <title>Email Template</title>

    <!-- Responsive and Valid Styles -->
    <style>
        .w3_whatsapp_btn {
            background-image: url('icon.png');
            border: 1px solid rgba(0, 0, 0, 0.1);
            display: inline-block !important;
            position: relative;
            font-family: Arial,sans-serif;
            letter-spacing: .4px;
            cursor: pointer;
            font-weight: 400;
            text-transform: none;
            color: #fff;
            border-radius: 2px;
            background-color: #5cbe4a;
            background-repeat: no-repeat;
            line-height: 1.2;
            text-decoration: none;
            text-align: left;
        }

        .w3_whatsapp_btn_small {
            font-size: 12px;
            background-size: 16px;
            background-position: 5px 2px;
            padding: 3px 6px 3px 25px;
        }

        .w3_whatsapp_btn_medium {
            font-size: 16px;
            background-size: 20px;
            background-position: 4px 2px;
            padding: 4px 6px 4px 30px;
        }

        .w3_whatsapp_btn_large {
            font-size: 16px;
            background-size: 20px;
            background-position: 5px 5px;
            padding: 8px 6px 8px 8px;
            color: #fff;
        }
        a.whatsapp { color: #fff;}
    </style>
    <style type="text/css">

        body{
            width: 100%;
            background-color: #F1F2F7;
            margin:0;
            padding:0;
            -webkit-font-smoothing: antialiased;
            font-family: arial;
        }

        html{
            width: 100%;
        }

        table{
            font-size: 14px;
            border: 0;
        }

        /* ----------- responsive ----------- */
        @media only screen and (max-width: 640px){

            /*------ top header ------ */
            .header-bg{width: 440px !important; height: 10px !important;}
            .main-header{line-height: 28px !important;}
            .main-subheader{line-height: 28px !important;}

            .container{width: 440px !important;}
            .container-middle{width: 420px !important;}
            .mainContent{width: 400px !important;}

            .main-image{width: 400px !important; height: auto !important;}
            .banner{width: 400px !important; height: auto !important;}
            /*------ sections ---------*/
            .section-item{width: 400px !important;}
            .section-img{width: 400px !important; height: auto !important;}
            /*------- prefooter ------*/
            .prefooter-header{padding: 0 10px !important; line-height: 24px !important;}
            .prefooter-subheader{padding: 0 10px !important; line-height: 24px !important;}
            /*------- footer ------*/
            .top-bottom-bg{width: 420px !important; height: auto !important;}

        }

        @media only screen and (max-width: 479px){

            /*------ top header ------ */
            .header-bg{width: 280px !important; height: 10px !important;}
            .top-header-left{width: 260px !important; text-align: center !important;}
            .top-header-right{width: 260px !important;}
            .main-header{line-height: 28px !important; text-align: center !important;}
            .main-subheader{line-height: 28px !important; text-align: center !important;}

            /*------- header ----------*/
            .logo{width: 260px !important;}
            .nav{width: 260px !important;}

            .container{width: 280px !important;}
            .container-middle{width: 260px !important;}
            .mainContent{width: 240px !important;}

            .main-image{width: 240px !important; height: auto !important;}
            .banner{width: 240px !important; height: auto !important;}
            /*------ sections ---------*/
            .section-item{width: 240px !important;}
            .section-img{width: 240px !important; height: auto !important;}
            /*------- prefooter ------*/
            .prefooter-header{padding: 0 10px !important;line-height: 28px !important;}
            .prefooter-subheader{padding: 0 10px !important; line-height: 28px !important;}
            /*------- footer ------*/
            .top-bottom-bg{width: 260px !important; height: auto !important;}

        }


    </style>

    <style type="text/css" charset="utf-8">

        /** reset styling **/

        .firebugResetStyles {

            z-index: 2147483646 !important;

            top: 0 !important;

            left: 0 !important;

            display: block !important;

            border: 0 none !important;

            margin: 0 !important;

            padding: 0 !important;

            outline: 0 !important;

            min-width: 0 !important;

            max-width: none !important;

            min-height: 0 !important;

            max-height: none !important;

            position: fixed !important;

            transform: rotate(0deg) !important;

            transform-origin: 50% 50% !important;

            border-radius: 0 !important;

            box-shadow: none !important;

            background: transparent none !important;

            pointer-events: none !important;

            white-space: normal !important;

        }



        .firebugBlockBackgroundColor {

            background-color: transparent !important;

        }



        .firebugResetStyles:before, .firebugResetStyles:after {

            content: "" !important;

        }

        /**actual styling to be modified by firebug theme**/

        .firebugCanvas {

            display: none !important;

        }



        /* ------------------------- */

        .firebugLayoutBox {

            width: auto !important;

            position: static !important;

        }



        .firebugLayoutBoxOffset {

            opacity: 0.8 !important;

            position: fixed !important;

        }



        .firebugLayoutLine {

            opacity: 0.4 !important;

            background-color: #000000 !important;

        }



        .firebugLayoutLineLeft, .firebugLayoutLineRight {

            width: 1px !important;

            height: 100% !important;

        }



        .firebugLayoutLineTop, .firebugLayoutLineBottom {

            width: 100% !important;

            height: 1px !important;

        }



        .firebugLayoutLineTop {

            margin-top: -1px !important;

            border-top: 1px solid #999999 !important;

        }



        .firebugLayoutLineRight {

            border-right: 1px solid #999999 !important;

        }



        .firebugLayoutLineBottom {

            border-bottom: 1px solid #999999 !important;

        }



        .firebugLayoutLineLeft {

            margin-left: -1px !important;

            border-left: 1px solid #999999 !important;

        }



        /* ----------------- */

        .firebugLayoutBoxParent {

            border-top: 0 none !important;

            border-right: 1px dashed #E00 !important;

            border-bottom: 1px dashed #E00 !important;

            border-left: 0 none !important;

            position: fixed !important;

            width: auto !important;

        }



        .firebugRuler{

            position: absolute !important;

        }



        .firebugRulerH {

            top: -15px !important;

            left: 0 !important;

            width: 100% !important;

            height: 14px !important;

            border-top: 1px solid #BBBBBB !important;

            border-right: 1px dashed #BBBBBB !important;

            border-bottom: 1px solid #000000 !important;

        }



        .firebugRulerV {

            top: 0 !important;

            left: -15px !important;

            width: 14px !important;

            height: 100% !important;

            border-left: 1px solid #BBBBBB !important;

            border-right: 1px solid #000000 !important;

            border-bottom: 1px dashed #BBBBBB !important;

        }



        .overflowRulerX > .firebugRulerV {

            left: 0 !important;

        }



        .overflowRulerY > .firebugRulerH {

            top: 0 !important;

        }



        /* --------------------------------- */

        .fbProxyElement {

            position: fixed !important;

            pointer-events: auto !important;

        }

    </style>

</head>

<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody><tr><td height="30"></td></tr>
            <tr bgcolor="#FF2241">
                <td align="center" bgcolor="##FF2241" valign="top" width="100%">

                    <!--  top header -->
                    <table class="container" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                        <tbody>
                            <tr bgcolor="#FF2241"><td height="15"></td></tr>

                            <tr bgcolor="#FF2241">
                                <td align="center">
                                    <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560">
                                        <tbody><tr>
                                                <td>
                                                    <table class="top-header-left" align="left" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                                <td align="center">
                                                                    <table class="date" border="0" cellpadding="0" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td>
                                                                                    <img  style="display: block;" src="<?php echo Path; ?>img/email-img/icon-cal.png" alt="icon 1" width="13">
                                                                                </td>
                                                                                <td>&nbsp;&nbsp;</td>
                                                                                <td style="color: #fefefe; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                                        <singleline>
                                                                            <?php echo date("l d F");?>
                                                                        </singleline>
                                                                </td>
                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>

                                    <table class="top-header-right" align="left" border="0" cellpadding="0" cellspacing="0">
                                        <tbody><tr><td height="20" width="30"></td></tr>
                                        </tbody></table>

                                    <table class="top-header-right" align="right" border="0" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                                <td align="center">
                                                    <table class="tel" align="center" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                                <td>
                                                                    <img  style="display: block;" src="<?php echo Path; ?>img/email-img/icon-tel.png" alt="icon 2" width="17">
                                                                </td>
                                                                <td>&nbsp;&nbsp;</td>
                                                                <td style="color: #fefefe; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                        <singleline>
                                                            Retail.M-AdCall.com
                                                        </singleline>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                        </tbody></table>
                </td>
            </tr>
        </tbody></table>
</td>
</tr>

<tr bgcolor="#FF2241"><td height="10"></td></tr>

</tbody>
</table>

<!--  end top header  -->


<!-- main content -->
<table class="container" align="center"  border="0" cellpadding="0" cellspacing="0" width="600" bgcolor="#FFFFFF">


    <!--Header-->
    <tbody><tr ><td height="40"></td></tr>

        <tr>
            <td>
                <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560">
                    <tbody><tr>
                            <td>
                                <table class="logo" align="center" border="0" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                            <td align="center">
                                                <a href="#" style="display: block;"><img  style="display: block;" src="<?php echo Path; ?>img/email-img/madcall-logo.png" alt="logo" width="155"></a>


                                            </td>
                                        </tr>
                                    </tbody></table>

                            </td>
                        </tr>
                    </tbody></table>
            </td>
        </tr>

        <tr ><td height="40"></td></tr>
        <!-- end header -->


        <!-- main section -->
        <tr>
            <td>
                <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560">


                    <tr ><td height="7"></td></tr>

                    <tr ><td align="center"><img style="display: block;" class="main-image" src="<?php echo Path; ?>img/email-img/Main1.jpeg" alt="large image" height="auto" width="538"></td></tr>

                    <tr ><td height="20"></td></tr>

                    <tr >
                        <td>
                            <table class="mainContent" align="center" border="0" cellpadding="0" cellspacing="0" width="528">
                                <tbody><tr>
                                        <td  class="main-header" style="color: #484848; font-size: 16px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">

                                            Follow Some Step & Get Easy Money

                                        </td>
                                    </tr>
                                    <tr><td height="20"></td></tr>
                                    <tr>
                                        <td  class="main-subheader" style="color: #a4a4a4; font-size: 15px; font-weight: normal; line-height:22px; font-family: Helvetica, Arial, sans-serif;">


                                            <ul>
                                                <li>First Step :: Please Click To Activate Account Button.</li>
                                                <li>Second Step :: Again Check Your Email And Get Unique Link. </li>
                                                <li>Final Step :: Share Your link in Your Shop And Any where.</li>
                                            </ul>


                                        </td>
                                    </tr>

                                </tbody></table>
                        </td>
                    </tr>

                    <tr ><td height="25"></td></tr>


                </table>
            </td>
        </tr>
        <!-- end main section -->


        <tr><td height="35"></td></tr>


        <!--section 1 -->
        <tr>
            <td>
                <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560" bgcolor="#FF2241">
                    <tr >
                        <td>
                            <table class="mainContent" align="center" border="0" cellpadding="0" cellspacing="0" width="528">
                                <tbody><tr><td height="20"></td></tr>
                                    <tr>
                                        <td>
                                            <table class="section-item" align="left" border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr><td height="6"></td></tr>
                                                    <tr>
                                                        <td><a href="#" style="width: 128px; display: block;"><img style="display: block;" src="<?php echo Path; ?>img/email-img/thumb.png" alt="image1" class="section-img" height="auto" width="128"></a></td>
                                                    </tr>
                                                    <tr><td height="10"></td></tr>
                                                </tbody></table>

                                            <table align="left" border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr><td height="30" width="30"></td></tr>
                                                </tbody></table>

                                            <table class="section-item" align="left" border="0" cellpadding="0" cellspacing="0" width="360">
                                                <tbody><tr>
                                                        <td style="color: 	#FFFFFF; font-size: 16px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">



                                                        </td>
                                                    </tr>
                                                    <tr><td height="15"></td></tr>
                                                    <tr>
                                                        <td  style="color: 	#FFFFFF; line-height: 25px; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">

                                                           Your Retails.M-addcall Link
<?php echo $RedirectURL; ?>"
                                                        </td>
                                                    </tr>
                                                    <tr><td height="15"></td></tr>
                                                    <tr>
                                                        <td>
                                                            <a data-text="Use This Link And Get Profit" data-link="<?php echo $RedirectURL; ?>" class="whatsapp w3_whatsapp_btn w3_whatsapp_btn_large">Share Via WhatsApp</a>
                                                            <script>


                                                                $(document).ready(function () {

                                                                    var isMobile = {
                                                                        Android: function () {
                                                                            return navigator.userAgent.match(/Android/i);
                                                                        },
                                                                        BlackBerry: function () {
                                                                            return navigator.userAgent.match(/BlackBerry/i);
                                                                        },
                                                                        iOS: function () {
                                                                            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                                                                        },
                                                                        Opera: function () {
                                                                            return navigator.userAgent.match(/Opera Mini/i);
                                                                        },
                                                                        Windows: function () {
                                                                            return navigator.userAgent.match(/IEMobile/i);
                                                                        },
                                                                        any: function () {
                                                                            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                                                                        }
                                                                    };
                                                                    $(document).on("click", '.whatsapp', function () {
                                                                        if (isMobile.any()) {

                                                                            var text = $(this).attr("data-text");
                                                                            var url = $(this).attr("data-link");
                                                                            var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
                                                                            var whatsapp_url = "whatsapp://send?text=" + message;
                                                                            window.location.href = whatsapp_url;
                                                                        } else {
                                                                            alert("Please share this article in mobile device");
                                                                        }

                                                                    });
                                                                });


                                                            </script>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>

                                    <tr><td height="20"></td></tr>

                                </tbody></table>
                        </td>
                    </tr>



                </table>
            </td>
        </tr>




        <tr><td height="35"></td></tr>

        <!--section 4 -->
        <tr>
            <td>
                <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560" bgcolor="F1F2F7">
                    <tr >
                        <td>
                            <table class="mainContent" align="center" border="0" cellpadding="0" cellspacing="0" width="528">
                                <tbody><tr><td height="20"></td></tr>
                                    <tr>
                                        <td>

                                            <table class="section-item" align="left" border="0" cellpadding="0" cellspacing="0" width="360">
                                                <tbody><tr>
                                                        <td  style="color: #484848; font-size: 16px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">

                                                            Here goes the Heading

                                                        </td>
                                                    </tr>
                                                    <tr><td height="15"></td></tr>
                                                    <tr>
                                                        <td  style="color: #a4a4a4; line-height: 25px; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">

                                                            Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. Fusce ac diam vel orci suscipit accumsan vitae dapibus
                                                            felis ...

                                                        </td>
                                                    </tr>
                                                    <tr><td height="15"></td></tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" style="background-color: #7087A3; font-size: 12px; padding: 10px 15px; color: #fff; text-decoration: none"> Read More</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <table align="left" border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr><td height="30" width="30"></td></tr>
                                                </tbody>
                                            </table>


                                            <table class="section-item" align="left" border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr><td height="6"></td></tr>
                                                    <tr>
                                                        <td><a href="#" style="width: 128px; display: block;"><img  style="display: block;" src="<?php echo Path; ?>img/email-img/image1.png" alt="image4" class="section-img" height="auto" width="128"></a></td>
                                                    </tr>
                                                    <tr><td height="10"></td></tr>
                                                </tbody>
                                            </table>


                                        </td>
                                    </tr>

                                    <tr><td height="20"></td></tr>

                                </tbody></table>
                        </td>
                    </tr>


                </table>
            </td>
        </tr>
        <!-- end section 4 -->

        <tr><td height="35"></td></tr>


        <!-- prefooter -->

        <tr>
            <td>
                <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560">
                    <tbody><tr>
                            <td>


                                <table class="nav" align="center" border="0" cellpadding="0" cellspacing="0">
                                    <tbody><tr><td height="10"></td></tr>
                                        <tr>
                                            <td  style="font-size: 13px; font-family: Helvetica, Arial, sans-serif;" align="center">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                            <td>
                                                                <a style="display: block; width: 16px;" href="#"><img  style="display: block;" src="<?php echo Path; ?>img/email-img/social-google.png" alt="google plus" width="16"></a>
                                                            </td>
                                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                                            <td>
                                                                <a style="display: block; width: 16px;" href="#"><img  style="display: block;" src="<?php echo Path; ?>img/email-img/social-youtube.png" alt="youtube" width="16"></a>
                                                            </td>
                                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                                            <td>
                                                                <a style="display: block; width: 16px;" href="#"><img style="display: block;" src="<?php echo Path; ?>img/email-img/social-facebook.png" alt="facebook" width="16"></a>
                                                            </td>
                                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                                            <td>
                                                                <a style="display: block; width: 16px;" href="#"><img  style="display: block;" src="<?php echo Path; ?>img/email-img/social-twitter.png" alt="twitter" width="16"></a>
                                                            </td>
                                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                                            <td>
                                                                <a style="display: block; width: 16px;" href="#"><img  style="display: block;" src="<?php echo Path; ?>img/email-img/social-linkedin.png" alt="linkedin" width="16"></a>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody></table>
            </td>
        </tr>
        <!-- end prefooter  -->

        <tr><td height="20"></td></tr>
        <tr>
            <td style="color: #939393; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;" class="prefooter-header" align="center">

                You are currently signed up to Company’s newsletters as: <span style="color: #7087A3">retail.madcall@gmail.com</span> to unsubscribe <a style="text-decoration: none; color: #7087A3;" href="#">click here</a>

            </td>
        </tr>

        <tr><td height="30"></td></tr>

        <tr>
            <td  style="color: #939393; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;" class="prefooter-subheader" align="center">

                <span style="color: #7087A3">Adress :</span> 88,Jaora Compound Indore &nbsp;&nbsp;&nbsp;   <span style="color: #7087A3">Phone :</span> 07412-244333    &nbsp;&nbsp;&nbsp;<span style="color: #7087A3">Email :</span> retail.madcall@gmail.com


            </td>
        </tr>

        <tr><td height="30"></td></tr>
    </tbody></table>
<!--end main Content -->


<!-- footer -->
<table class="container" border="0" cellpadding="0" cellspacing="0" width="600">
    <tbody>
        <tr bgcolor="#FF2241"><td height="15"></td></tr>
        <tr bgcolor="#FF2241">
            <td  style="color: #fff; font-size: 10px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;" align="center">

                Retail.M-AdCall.Com &copy; 2016-17 . All Rights Reserved

            </td>
        </tr>

        <tr>
            <td bgcolor="#FF2241" height="14"></td>
        </tr>
    </tbody></table>
<!-- end footer-->
</td>
</tr>

<tr><td height="30"></td></tr>

</tbody>
</table>


</body>

<!-- Mirrored from thevectorlab.net/flatlab/email_template.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Nov 2016 09:37:43 GMT -->
</html>