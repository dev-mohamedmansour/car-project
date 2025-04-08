<?php
	  
	  use CarHouse\Models\Db;
	  use PHPMailer\PHPMailer\PHPMailer;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
// Start session if isn't already started
	  if (session_status() === PHP_SESSION_NONE) {
			 session_start();
	  }
	  $dbAction = new Db();
	  
	  if (isset($_POST['addAdmin'])) {
			 
			 if (($_POST['adminRole'] != "Mechanical Repairs")
				  && ($_POST['adminRole'] != "Car Wash")
				  && ($_POST['adminRole'] != "Electrical Repairs")
				  && ($_POST['adminRole'] != "Tires Betters")
			 ) {
					$_SESSION['error'] = "Please Do not change the Role name .";
					header('Location: ../../dashboard/index.php');
					exit();
			 }
			 
			 $filterEmail = strip_tags($_POST['adminEmail']);
			 $email = mysqli_real_escape_string(
				  $dbAction->connection, $filterEmail
			 );
			 
			 // Proceed with sign-up if email does not exist
			 $filterName = strip_tags($_POST['adminName']);
			 $name = mysqli_real_escape_string($dbAction->connection, $filterName);
			 
			 $filterPhone = strip_tags($_POST['adminPhone']);
			 $phone = mysqli_real_escape_string(
				  $dbAction->connection, $filterPhone
			 );
			 
			 $filterPassword = strip_tags($_POST['adminPassword']);
			 $password = password_hash(
				  $filterPassword, PASSWORD_DEFAULT
			 ); // Secure password hashing
			 
			 $filterRole = strip_tags($_POST['adminRole']);
			 $role = mysqli_real_escape_string(
				  $dbAction->connection, $filterRole
			 );
			 
			 
			 // Check if email already exists in the database
			 $checkEmailOrPhone = $dbAction->select("*", "users")
				  ->where("email", "=", $email)->orWhere("phone", "=", $phone)
				  ->getRow();
			 
			 if ($checkEmailOrPhone) {
					$_SESSION['error'] = "Email or Phone already exists.";
			 }
			 
			 $addAdmin = $dbAction->insert("users", [
				  "email"                   => $email,
				  "password"                => $password,
				  "role"                    => $role,
				  "phone"                   => $phone,
				  "name"                    => $name,
				  "verify_email"            => 1,
				  "email_confirmation_time" => "now()",
				  "is_admin"                => 1
			 
			 ])->execution();
			 if ($addAdmin) {
					//Send email
					$mail = new PHPMailer(true);
					try {
						  // Server settings
						  $mail->isSMTP();
						  $mail->Host = 'smtp.gmail.com'; // Your SMTP server
						  $mail->SMTPAuth = true;
						  $mail->Username
								= 'carhouse001.bn@gmail.com'; // SMTP username
						  $mail->Password
								= 'gwdo dyis wmov sqau'; // SMTP password
						  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
						  $mail->Port = 587;
						  // Recipients
						  $mail->setFrom(
								'carhouse001.bn@gmail.com', 'Car House'
						  );
						  $mail->addAddress(
								$email
						  ); // User's email
						  // Content
						  $mail->isHTML(true);
						  $mail->Subject = 'Welcome to Car House';
						  $mail->Body
								= "Welcome to Car House! Your Email : " . $email
								. "<br>" .
								"And Your Password : <strong>" . $filterPassword
								. "</strong><br>";
						  $mail->send();
						  $_SESSION['success']
								= 'Add Admin in this role ' . $role
								. ' successful And We Send Email for You!';
						  exit();
					} catch (Exception $e) {
						  $_SESSION['error']
								= "Email could not be sent. Error: {$mail->ErrorInfo}";
					}
			 } else {
					
					$_SESSION['error']
						 = "Failed to Add Admin. Please try again later.";
			 }
	  }
	  