<?php
	  require __DIR__ . '/../../vendor/autoload.php';
	  
	  use CarHouse\Models\Db;
	  use PHPMailer\PHPMailer\PHPMailer;
	  use Random\RandomException;
	  
	  session_start();
	  $dbAction = new Db();
	  
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
					$mail->Body = "Please verify your email by clicking this link: <a href='{$verificationUrl}'>Verify Email</a><br><br>
            This link will expire in 24 hours.";
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
					header('Location:../../index.php');
					exit();
			 }
			 // Validate input
			 $requiredFields = ['orderName', 'serviceName', 'orderPhone',
									  'orderTime'];
			 foreach ($requiredFields as $field) {
					if (empty($_POST[$field])) {
						  $_SESSION['error'] = "Please fill out all required fields.";
						  header('Location: ../../index.php');
						  exit();
					}
			 }
			 
			 $orderDateTime = $_POST['orderTime'];
			 if (!$orderDateTime) {
					$_SESSION['error'] = "Please select a date and time";
					header('Location:../../index.php');
					exit();
			 }
			 try {
					$now = new DateTime();
					$cutoffDate = new DateTime(
						 '+13 days 23:59:59'
					); // Today + 13 days = 2 weeks
					$selectedDate = new DateTime($orderDateTime);
					
					// Round down to minutes (remove seconds)
					$selectedDate->setTime(
						 $selectedDate->format('H'), $selectedDate->format('i'), 0
					);
					
					if ($selectedDate < $now) {
						  $_SESSION['error']
								= "The selected date/time cannot be in the past. Current time is "
								. $now->format('Y-m-d H:i');
						  header('Location:../../index.php');
						  exit();
					}
					
					if ($selectedDate > $cutoffDate) {
						  $_SESSION['error'] = "We only accept orders up to "
								. $cutoffDate->format('Y-m-d')
								. " (2 weeks in advance)";
						  header('Location:../../index.php');
						  exit();
					}
					// Date is valid (within 2 weeks)
			 } catch (Exception $e) {
					error_log(
						 "Invalid date format: " . $orderDateTime . " - "
						 . $e->getMessage()
					);
					$_SESSION['error']
						 = "Invalid date/time format. Please use the date picker.";
					header('Location:../../index.php');
					exit();
			 }
			 
			 if (($_POST['serviceName'] != "Mechanical Repairs")
				  && ($_POST['serviceName'] != "Car Wash")
				  && ($_POST['serviceName'] != "Electrical Repairs")
				  && ($_POST['serviceName'] != "Tires Betters")
			 ) {
					$_SESSION['error'] = "Please Do not change the service name .";
					header('Location: ../../index.php');
					exit();
			 }
			 
			 $filterNameOrder = strip_tags($_POST['orderName']);
			 $nameOrder = mysqli_real_escape_string(
				  $dbAction->connection, $filterNameOrder
			 );
			 
			 $filterServiceName = strip_tags($_POST['serviceName']);
			 $serviceName = mysqli_real_escape_string(
				  $dbAction->connection, $filterServiceName
			 );
			 
			 $filterOrderPhone = strip_tags($_POST['orderPhone']);
			 $orderPhone = mysqli_real_escape_string(
				  $dbAction->connection, $filterOrderPhone
			 );
			 
			 $filterPassword = strip_tags($_POST['registerPassword']);
			 $password = password_hash(
				  $filterPassword, PASSWORD_DEFAULT
			 );
			 
			 // Check if customer has made an order before today
			 $today = date('Y-m-d');
			 $previousOrder = $dbAction->select("*", "orders")
				  ->where("customerEmail", "=", $userDetails['email'])
				  ->andWhere("orderDate", ">=", $today)
				  ->getRow();

//			 $createOrder = $dbAction->insert(
//				  "orders",
//				  ["orderName" =>]
//			 )
			 
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

