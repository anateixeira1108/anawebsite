<?php
	header("Content-Type: application/json; "); 

	$email = $_POST['email'];
	$message = $_POST['message'];
	$name = $_POST['name'];

	$response = new stdClass();

	if(empty($email) || empty($name) || empty($message)){
		$response->status = "validation-error";
		$response->code = 400;
		echo json_encode($response);
		return;
	}

	function clean_string($string) {
	
	  $bad = array("content-type","bcc:","to:","cc:","href");
	
	  return str_replace($bad,"",$string);
	
	}
	
	$email_message = clean_string($message);

	$title = "[WEBSITE] Message of: ".clean_string($email);

	$head = 'From: info@anateixeira1108.com'."\r\n". 
			'Reply-To: '.$email." \r\n".
			'X-Mailer: PHP/'.phpversion();

	if(mail('info@anateixeira1108.com',$title, $email_message, $head)){
		$response->status = "success";
		$response->code = 200;
	}else{
		$response->status = "mail-error";
		$response->code = 400;
	}

	switch($response->code){
		case 200:{
			header("Location: http://www.anateixeira1108.com/");
			break;
		}
		case 400:{
			header('HTTP/1.0 400 Bad Request');
			break;
		}
		default:{
			header("Location: http://www.anateixeira1108.com/");
			break;
		}
	}	

	return;
?>
