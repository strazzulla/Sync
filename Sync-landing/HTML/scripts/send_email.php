<?php
	
	$name = trim($_POST['name']);
	$email = $_POST['email'];
	$topic = $_POST['topic'];
	$message = $_POST['message'];
	
	$site_owners_email = 'syncingwithyourpartner@gmail.com'; // Replace this with your own email address
	$site_owners_name = 'Sync'; // replace with your name
	
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name";	
	}
	
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address";	
	}
	
	if (strlen($message) < 3) {
		$error['message'] = "Please leave a message.";
	}
	
	if (!$error) {
		
		require_once('class.phpmailer.php');
		$mail = new PHPMailer();
		
		$mail->From = $email;
		$mail->FromName = $name;
		$mail->Subject = "[$topic] Website Contact Form";
		$mail->AddAddress($site_owners_email, $site_owners_name);
		$mail->Body = $message;

		// EDIT THIS!!
		
		$mail->Mailer = "smtp";
		$mail->Host = "smtp.gmail.com"; //mail.google.com
		$mail->Port = 465; // gmail SMTP port // used to be25 
		
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "syncingwithyourpartner@gmail.com"; // SMTP username
		$mail->Password = "syncitup"; // SMTP password

		$mail->Send();
		
		echo "Thanks, " . $name . "! We've received your email. <script type='text/javascript'>$(document).ready(function() { $('input#send').hide(); });";
		
	} # end if no error
	else {

		$response = "<span class='red'>Please fill in all fields</span>";
		
		echo $response;
	} # end if there was an error sending

?>