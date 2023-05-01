<?php
$url = 'https://ATB.com/login';
$options = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING       => "",
    CURLOPT_USERAGENT      => $user_agent,
    CURLOPT_AUTOREFERER    => true,
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT        => 120,
    CURLOPT_MAXREDIRS      => 10,
    CURLOPT_SSL_VERIFYPEER => false
);

$ch = curl_init($url);
curl_setopt_array($ch, $options);
$content = curl_exec($ch);
$err = curl_errno($ch);
$errmsg = curl_error($ch);
$header = curl_getinfo($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
$header['errno']   = $err;
$header['errmsg']  = $errmsg;
$header['content'] = $content;

$headers = explode("\n", $header['content']);

foreach ($headers as $header) {
    if (stripos($header, "Location: ") !== false) {
        $location = str_ireplace("Location: ", "", $header);
        break;
    }
}
?>