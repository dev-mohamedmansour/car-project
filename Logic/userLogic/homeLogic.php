<?php
	  require __DIR__ . '/../../vendor/autoload.php';
	  
	  use CarHouse\Models\Db;
	  use PHPMailer\PHPMailer\PHPMailer;
	  use Random\RandomException;
	  
	  session_start();
	  
	  function getDetailsOfUser(): array
	  {
			 $dbAction = new Db();
			 
			 // Check if email exists in session first
			 if (!isset($_SESSION['userEmail'])) {
					$_SESSION['error'] = 'No user session found. Please login.';
					header('Location: ../../authLogin.php');
					exit();
			 }
			 
			 $email = $_SESSION['userEmail'];
			 
			 // First try to get verified user
			 $userInformation = $dbAction->select("*", "users")
				  ->where("email", "=", $email)
				  ->andWhere("verify_email", "=", '1')
				  ->getRow();
			 
			 if ($userInformation) {
					return $userInformation;
			 }
			 
			 // If not verified, try to get unverified user
			 $unverifiedUser = $dbAction->select("*", "users")
				  ->where("email", "=", $email)
				  ->getRow();
			 
			 if ($unverifiedUser) {
					makeEmailVerify($unverifiedUser);
					$_SESSION['error']
						 = 'Please verify your email address. Check your inbox.';
			 }
			 
			 // If no user found at all
			 $_SESSION['error'] = 'User not found. Please register first.';
			 header('Location: ../../index.php');
			 exit();
	  }
	  
	  function makeEmailVerify(array $unverifiedUser): void
	  {
			 // Validate input
			 if (empty($unverifiedUser['email'])) {
					$_SESSION['error']
						 = 'Invalid user data provided for verification.';
					header('Location: ../../index.php');
					exit();
			 }
			 
			 $dbAction = new Db();
			 $mail = new PHPMailer(true);
			 
			 // Generate verification token
			 try {
					$verificationToken = bin2hex(random_bytes(32));
			 } catch (RandomException $e) {
					error_log(
						 "Verification token generation failed: " . $e->getMessage()
					);
					$_SESSION['error']
						 = "System error occurred. Please try again later.";
					header('Location: ../../index.php');
					exit();
			 }
			 // Update verification token in database
			 try {
					$updateResult = $dbAction->update(
						 "users",
						 [
							  "verification_token"      => $verificationToken,
							  "email_confirmation_time" => date('Y-m-d H:i:s')
							  // Add token timestamp
						 ]
					)->where("email", "=", $unverifiedUser['email'])->execution();
					
					if (!$updateResult) {
						  throw new Exception("Database update failed");
					}
			 } catch (Exception $e) {
					error_log("Database update error: " . $e->getMessage());
					$_SESSION['error'] = "Failed to process verification request.";
					header('Location: ../../index.php');
					exit();
			 }
			 // Send verification email
			 try {
					// Configure mail server
//					serverSettings($mail, $unverifiedUser['email']);
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
					$mail->addAddress($unverifiedUser['email']); // User's email
					// Content
					$mail->isHTML(true);
					
					// Content
					$mail->Subject = 'Verify Your Email Address';
					$verificationUrl = "https://car-house.test/verify.php?token="
						 . urlencode($verificationToken);
					$mail->Body = sprintf(
						 "Please verify your email by clicking this link: <a href='%s'>Verify Email</a><br><br>
            This link will expire in 24 hours.",
						 $verificationUrl
					);
					$mail->AltBody
						 = "Please verify your email by visiting this URL: "
						 . $verificationUrl;
					
					$mail->send();
					
					$_SESSION['success']
						 = 'Verification email sent! Please check your inbox.';
					header('Location: ../../index.php');
			 } catch (Exception $e) {
					error_log("Email sending failed: " . $mail->ErrorInfo);
					$_SESSION['error']
						 = "Could not send verification email. Please try again later.";
					header('Location: ../../index.php');
			 }
	  }
	  
	  if (isset($_POST['submitOrder'])
			&& $_POST['submitOrder'] === 'submitOrderData'
	  ) {
			 
			 // Get authenticated user details
			 $userDetails = getDetailsOfUser();
			 
			 if (!$userDetails) {
					header('Location:index.php');
					exit();
			 }
			 
			 echo '<pre>';
			 var_dump([
				  'user'      => $userDetails,
				  'post_data' => $_POST
			 ]);
			 echo '</pre>';
			 exit();
			 
			 // Process the order here
			 // $orderId = processOrder($userDetails, $_POST);
			 // redirectToOrderConfirmation($orderId);
			 
			 
	  }

