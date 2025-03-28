<?php
	  require __DIR__ . '/../../vendor/autoload.php';
	  use PHPMailer\PHPMailer\PHPMailer;
	  
	  /**
		* @param PHPMailer $mail
		* @param mixed     $email
		*
		* @return void
		* @throws Exception
		*/
	  function serverSettings(PHPMailer $mail, mixed $email): void
	  {
			 $mail->isSMTP();
			 $mail->Host = 'smtp.gmail.com'; // Your SMTP server
			 $mail->SMTPAuth = true;
			 $mail->Username
				  = 'carhouse001.bn@gmail.com'; // SMTP username
			 $mail->Password = 'gwdo dyis wmov sqau'; // SMTP password
			 $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			 $mail->Port = 587;
			 // Recipients
			 $mail->setFrom('carhouse001.bn@gmail.com', 'Car House');
			 $mail->addAddress($email); // User's email
			 // Content
			 $mail->isHTML(true);
	  }
