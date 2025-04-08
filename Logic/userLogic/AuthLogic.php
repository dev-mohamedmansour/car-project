<?php
	  require __DIR__ . '/../../vendor/autoload.php';
	  
	  use CarHouse\Models\Db;
	  use PHPMailer\PHPMailer\Exception;
	  use PHPMailer\PHPMailer\PHPMailer;
	  use Random\RandomException;
	  
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
	  if (isset($_POST['sign-upForm'])
			&& $_POST['sign-upForm'] === 'sign-upData'
	  ) {
			 // Check if all fields are filled
			 if (empty($_POST['fullName']) || empty($_POST['registerEmail'])
				  || empty($_POST['phone'])
				  || empty($_POST['registerPassword'])
			 ) {
					$_SESSION['error'] = "Please fill all the fields.";
					header('Location:../../authRegister.php');
					exit();
			 }
			 // Validate email format and domain
			 if (validateEmailAdvanced($_POST['registerEmail'])
				  !== "Valid email address."
			 ) {
					$_SESSION['error'] = "Invalid email format.";
					header('Location:../../authRegister.php');
					exit();
			 }
			 
			 $filterEmail = strip_tags($_POST['registerEmail']);
			 $email = mysqli_real_escape_string(
				  $dbAction->connection, $filterEmail
			 );
			 
			 // Proceed with sign-up if email does not exist
			 $filterName = strip_tags($_POST['fullName']);
			 $name = mysqli_real_escape_string($dbAction->connection, $filterName);
			 
			 $filterPhone = strip_tags($_POST['phone']);
			 $phone = mysqli_real_escape_string(
				  $dbAction->connection, $filterPhone
			 );
			 
			 $filterPassword = strip_tags($_POST['registerPassword']);
			 $password = password_hash(
				  $filterPassword, PASSWORD_DEFAULT
			 ); // Secure password hashing
			 
			 // Generate a verification token
			 try {
					$verificationToken = bin2hex(
						 random_bytes(32)
					); // Generate a random token
			 } catch (RandomException $e) {
					error_log(
						 "Failed to generate verification token: " . $e->getMessage()
					);
					$_SESSION['error']
						 = "An error occurred while processing your request. Please try again later.";
					header('Location:../../authRegister.php');
					exit();
			 }
			 
			 // Check if email already exists in the database
			 $checkEmailOrPhone = $dbAction->select("*", "users")
				  ->where("email", "=", $email)->orWhere("phone", "=", $phone)
				  ->getRow();
			 
			 if ($checkEmailOrPhone) {
					$_SESSION['error'] = "Email or Phone already exists.";
					header('Location:../../authRegister.php');
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
								= "Sign-up successful.";
						  $_SESSION['userName'] = $getUser['name'];
						  $_SESSION['userEmail'] = $getUser['email'];
						  $_SESSION['userPhone'] = $getUser['phone'];
						  $_SESSION['userId'] = $getUser['id'];
						  header('Location:../../index.php');
						  // Send verification email
						  try {
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
								 $mail->addAddress($email); // User's email
								 // Content
								 $mail->isHTML(true);
								 $mail->Subject = 'Email Verification';
								 $mail->Body
									  = "Please click the link to verify your email: <a href='https://carhouse.ct.ws/verify.php?token=$verificationToken'>Verify Email</a>";
								 $mail->send();
								 $_SESSION['success'] = 'Verification email sent!';
						  } catch (Exception $e) {
								 $_SESSION['error']
									  = "Email could not be sent. Error: $mail->ErrorInfo";
								 header('Location:../../authRegister.php');
						  }
					} else {
						  $_SESSION['error'] = "Sign-up failed. Please try again.";
						  header('Location:../../authRegister.php');
					}
			 }
	  }
	  
	  // Sign In logic
	  if (isset($_POST['sign-inForm'])
			&& $_POST['sign-inForm'] === 'sign-inData'
	  ) {
			 if (empty($_POST['signInEmail']) || empty($_POST['signInPassword'])) {
					$_SESSION['error'] = "Please fill all the fields.";
					header('Location:../../authLogin.php');
					exit();
			 }
			 $filterEmail = strip_tags($_POST['signInEmail']);
			 $email = mysqli_real_escape_string(
				  $dbAction->connection, $filterEmail
			 );
			 $filterPassword = strip_tags($_POST['signInPassword']);
			 $password = $filterPassword;
			 $selectUser = $dbAction->select("*", "users")
				  ->where("email", "=", $email)
				  ->getRow();
			 if ($selectUser
				  && password_verify(
						$password, $selectUser['password']
				  )
			 ) {
					if ($selectUser['role'] == 'user'
						 && $selectUser['is_admin'] == 0
					) {
						  $_SESSION['userName'] = $selectUser['name'];
						  $_SESSION['userEmail'] = $selectUser['email'];
						  $_SESSION['userPhone'] = $selectUser['phone'];
						  $_SESSION['userId'] = $selectUser['id'];
						  header('Location:../../index.php');
					} elseif ($selectUser['is_admin'] == 1) {
						  $_SESSION['adminName'] = $selectUser['name'];
						  $_SESSION['adminRole'] = $selectUser['role'];
						  $_SESSION['adminEmail'] = $selectUser['email'];
						  $_SESSION['adminId'] = $selectUser['id'];
						  header('Location:../../dashboard/index.php');
					} else {
						  $_SESSION['error'] = "Email or password is not exist!";
						  header('Location:../../authLogin.php');
					}
			 }
	  }