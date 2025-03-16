<?php
	header('Content-Type: application/json');
	$message = '<html><body>';
	$message .= '<table rules="all" style="border-color: #666; border: 1px solid #CCC;" cellpadding="10">';
	$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
	$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
	$message .= "<tr><td><strong>Subject:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";
	$message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['job']) . "</td></tr>";
	$message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['skills']) . "</td></tr>";
	$message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['comment']) . "</td></tr>";

	$message .= "</table>";
	$message .= "</body></html>";
	
	$to = 'reddeppa123@gmail.com';
			
	$subject = strip_tags($_POST['subject'])." - Asif visa Enquiry";
	
	$headers = "From: " . strip_tags($_POST['email']) . "\r\n";
	$headers = "BCC: reddeppa123@gmail.com \r\n";
	$headers .= "Reply-To: no-reply@asif.com \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	if (mail($to, $subject, $message, $headers)) {
	 	$response["status"]="success";
		$response["message"]="Your mail successfully sent.";
	} else {
		$response["status"]="failed";
		$response["message"]="There was a problem sending the email.";
	}
	
	$json_response=json_encode($response);
	echo $json_response;
	
?>