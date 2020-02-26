<?php

if ( isset( $_POST['enqsubmit'] )){
	$email = $_REQUEST['email_AE'];
	$name = $_REQUEST['name_AE'];
	$mobile = $_REQUEST['mobile_AE'];
	$program = $_REQUEST['drp_AE'];
	$body = "Thank you for visiting us. We are glad to have you.<br>This email is generated to confirm your details<br><br>Name : ".$name."<br>Email Id : ".$email."<br>Mobile Number : ".$mobile."<br>Program : ".$program."<br><br>We will contact you shortly regarding your requirements and our programs.<br>Thank You.";
	$subject = "Welcome to Radiant Kidz";

	$headers = array(
		"Authorization: Bearer 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",
		'Content-Type: application/json'
		);
	$data = array(
		"personalizations" => 
		array(
			array(
				"to" => array(
					array(
							"email" => $email,
							"name" => $name
						)
					)
				)
			),
		"from"=> array(
			"email"=> "info@radiantkidz.in"
			),
		"subject"=>$subject,
		"content"=> array(
			array(
				"type"=>"text/html",
				"value"=>$body
				)
			)
		);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"https://api.sendgrid.com/v3/mail/send");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	curl_close($ch);
header('Location: http://localhost/kgweb-master/index.html');

}
?>