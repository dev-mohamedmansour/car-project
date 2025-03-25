<?php
	  require __DIR__ . '/../../vendor/autoload.php';
	  session_start();
//	  require 'vendor/autoload.php'; // Include PHPMailer
	  use CarHouse\Models\Db;
	  use PHPMailer\PHPMailer\Exception;
	  use PHPMailer\PHPMailer\PHPMailer;
	  
	  $dbAction = new Db();
	  
	  if (isset($_POST['requestPasswordReset'])) {
			 $email = $_POST['requestPasswordEmail'];
			 
			 // Check if the email exists
			 $getUser = $dbAction->select("*", "users")->where(
				  "email", "=", $email
			 )->getRow();
			 if ($getUser) {
					try {
						  $resetToken = bin2hex(
								random_bytes(32)
						  ); // Generate a random token
					} catch (\Random\RandomException $e) {
						  error_log(
								"Failed to generate verification token: "
								. $e->getMessage()
						  );
						  die("An error occurred while processing your request. Please try again later.");
					}
					$expiry = date(
						 'Y-m-d H:i:s', strtotime('+1 hour')
					); // Token expires in 1 hour
					// Store the reset token in the database
					$updateUserToken = $dbAction->update(
						 "users",
						 ["reset_token"        => $resetToken,
						  "reset_token_expiry" => $expiry]
					)->where("id", "=", $getUser['id'])->execution();
					// Send reset email
					$mail = new PHPMailer(true);
					try {
						  // Server settings
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
						  $mail->Subject = 'Password Reset';
						  $mail->Body
								= "Click the link to reset your password: <a href='https://car-house.test/resetpassword.php?token=$resetToken'>Reset Password</a>";
						  $mail->send();
						  echo 'Password reset email sent!';
					} catch (Exception $e) {
						  echo "Email could not be sent. Error: {$mail->ErrorInfo}";
					}
			 } else {
					echo 'Email not found.';
			 }
	  }else{
			 echo 'Invalid request.';
			 header('location:Auth.php');
	  }