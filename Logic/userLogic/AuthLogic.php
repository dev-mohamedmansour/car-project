<?php
	  require __DIR__ . '/../../vendor/autoload.php';
	  use CarHouse\Models\Db;
	  use PHPMailer\PHPMailer\Exception;
	  use PHPMailer\PHPMailer\PHPMailer;
	  
	  $dbAction = new Db();
	  $mail = new PHPMailer(true);
	  session_start();
	  
	  /**
		* Validates an email address by checking its format and domain existence.
		*
		* @param string $email The email address to be validated.
		*
		* @return string Returns "Valid email address." if the email is valid,
		* "Invalid email format." if the format is incorrect, or "Domain does not exist." if the domain is not valid.
		*/
	  function validateEmailAdvanced(string $email): string
	  {
			 // Trim whitespace from the email
			 $email = trim($email);
			 
			 // Regular expression for validating email format
			 $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
			 
			 // Check email against the regex
			 if (!preg_match($regex, $email)) {
					return "Invalid email format.";
			 }
			 
			 // Extract domain from the email
			 $domain = substr(strrchr($email, "@"), 1);
			 
			 // Check if the domain has a valid MX record
			 if (!checkdnsrr($domain, "MX") && !checkdnsrr($domain, "A")) {
					return "Domain does not exist.";
			 }
			 
			 // All checks passed
			 return "Valid email address.";
	  }
	  
	  // Sign Up logic
	  if (isset($_POST['sign-up'])) {
			 $errorMessage = "";
			 // Check if all fields are filled
			 if (empty($_POST['username']) || empty($_POST['register-email'])
				  || empty($_POST['phone'])
				  || empty($_POST['register-password'])
			 ) {
					$_SESSION['error'] = "Please fill all the fields.";
					header('location:Auth.php');
					exit();
			 }
			 // Validate email format and domain
			 if (validateEmailAdvanced($_POST['register-email'])
				  !== "Valid email address."
			 ) {
					$_SESSION['error'] = "Invalid email format.";
					header('location:Auth.php');
					
			 }
			 $filterEmail = strip_tags($_POST['register-email']);
			 $email = mysqli_real_escape_string(
				  $dbAction->connection, $filterEmail
			 );
			 // Proceed with sign-up if email does not exist
			 $filterName = strip_tags($_POST['username']);
			 $name = mysqli_real_escape_string($dbAction->connection, $filterName);
			 $filterPhone = strip_tags($_POST['phone']);
			 $phone = mysqli_real_escape_string(
				  $dbAction->connection, $filterPhone
			 );
			 $filterPassword = strip_tags($_POST['register-password']);
			 $password = password_hash(
				  $filterPassword, PASSWORD_DEFAULT
			 ); // Secure password hashing
			 // Generate a verification token
			 try {
					$verificationToken = bin2hex(
						 random_bytes(32)
					); // Generate a random token
			 } catch (\Random\RandomException $e) {
					error_log(
						 "Failed to generate verification token: " . $e->getMessage()
					);
					die("An error occurred while processing your request. Please try again later.");
			 }
			 // Check if email already exists in the database
			 $checkEmailOrPhone = $dbAction->select("*", "users")
				  ->where("email", "=", $email)->orWhere("phone", "=", $phone)
				  ->getRow();
			 if ($checkEmailOrPhone) {
					$_SESSION['error'] = "Email or Phone already exists.";
					header('location:Auth.php');
			 } else {
					$data = [
						 "name"               => $name,
						 "email"              => $email,
						 "phone"              => $phone,
						 "password"           => $password,
						 "verification_token" => $verificationToken,
					];
					$userInsert = $dbAction->insert("users", $data)->execution();
					if ($userInsert) {
						  $_SESSION['error'] = "";
						  $getUser = $dbAction->select("*", "users")
								->where("email", "=", $data['email'])
								->getRow();
						  $_SESSION['success']
								= "Sign-up successful. You can now log in.";
						  $_SESSION['userName'] = $getUser['name'];
						  $_SESSION['userEmail'] = $getUser['email'];
						  $_SESSION['userId'] = $getUser['id'];
//						  $_SESSION['token'] = $getUser['verification_token'];
						  header('location:index.php');
						  
						  // Send verification email
						  try {
								 // Server settings
								 serverSettings($mail, $email);
								 $mail->Subject = 'Email Verification';
								 $mail->Body
									  = "Please click the link to verify your email: <a href='https://car-house.test/verify.php?token=$verificationToken'>Verify Email</a>";
								 $mail->send();
								 $_SESSION['success'] = 'Verification email sent!';
						  } catch (Exception $e) {
								 $_SESSION['error']
									  = "Email could not be sent. Error: {$mail->ErrorInfo}";
						  }
					} else {
						  $_SESSION['error'] = "Sign-up failed. Please try again.";
						  header('location:../../Auth.php');
					}
			 }
	  }
	  
	  // Sign In logic
	  if (isset($_POST['sign-in'])) {
			 if (empty($_POST['login-email']) || empty($_POST['login-password'])) {
					$_SESSION['error'] = "Please fill all the fields.";
					header('location:../../Auth.php');
			 }
			 $filterEmail = strip_tags($_POST['login-email']);
			 $email = mysqli_real_escape_string(
				  $dbAction->connection, $filterEmail
			 );
			 $filterPassword = strip_tags($_POST['login-password']);
			 $password = $filterPassword;
			 $selectUser = $dbAction->select("*", "users")
				  ->where("email", "=", $email)
				  ->getRow();
			 if ($selectUser
				  && password_verify(
						$password, $selectUser['password']
				  )
			 ) {
					if ($selectUser['role'] == 'user') {
						  $_SESSION['userName'] = $selectUser['name'];
						  $_SESSION['userEmail'] = $selectUser['email'];
						  $_SESSION['userId'] = $selectUser['id'];
						  header('location:../../index.php');
					} elseif ($selectUser['role'] == 'admin') {
						  $_SESSION['adminName'] = $selectUser['name'];
						  $_SESSION['adminEmail'] = $selectUser['email'];
						  $_SESSION['adminId'] = $selectUser['id'];
						  header('location:../../index.php');
					} else {
						  $_SESSION['error'] = "Email or password is not exist!";
						  header('location:../../Auth.php');
					}
			 }
	  }