<?php
	  
	  use Car\Models\DB;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  $dbAction = new Db();
	  
	  /**
		* Validates an email address by checking its format and domain existence.
		*
		* @param string $email The email address to be validated.
		*
		* @return string Returns "Valid email address." if the email is valid,
		*                "Invalid email format." if the format is incorrect,
		*                or "Domain does not exist." if the domain is not valid.
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
			 
			 // Check if email already exists in the database
			 $emailCheck = $dbAction->select("email", "users")
				  ->where("email", "=", $email)
				  ->getRow();
			 
			 if ($emailCheck) {
					$_SESSION['error'] = "Email already exists.";
					header('location:Auth.php');
			 } else {
					
					$data = [
						 "name"     => $name,
						 "email"    => $email,
						 "phone"    => $phone,
						 "password" => $password,
					];
					
					$userInsert = $dbAction->insert("users", $data)->execution();
					if ($userInsert) {
						  $_SESSION['error'] = ""; // Clear any previous error
						  header('location:index.php');
					} else {
						  $_SESSION['error'] = "Sign-up failed. Please try again.";
						  header('location:Auth.php');
					}
			 }
	  }
	  
	  // Sign In logic
	  if (isset($_POST['sign-in'])) {
			 if (empty($_POST['login-email']) || empty($_POST['login-password'])) {
					$_SESSION['error'] = "Please fill all the fields.";
					header('location:Auth.php');
					exit();
			 }
			 
			 $filterEmail = strip_tags($_POST['login-email']);
			 $email = mysqli_real_escape_string(
				  $dbAction->connection, $filterEmail
			 );
			 
			 $filterPassword = strip_tags($_POST['login-password']);
			 $password = $filterPassword; // Store plain password for verification
			 
			 $selectUser = $dbAction->select("*", "users")
				  ->where("email", "=", $email)
				  ->getRow();
			 
			 if ($selectUser
				  && password_verify(
						$password, $selectUser['password']
				  )
			 ) {
//					if ($selectUser['role'] == 'admin') {
//						  $_SESSION['adminName'] = $selectUser['name'];
//						  $_SESSION['adminEmail'] = $selectUser['email'];
//						  $_SESSION['adminId'] = $selectUser['id'];
//						  header('location:admin');
//					  ($selectUser['role'] == 'user') {
					$_SESSION['userName'] = $selectUser['name'];
					$_SESSION['userEmail'] = $selectUser['email'];
					$_SESSION['userId'] = $selectUser['id'];
//						  $_SESSION['userCityId'] = $selectUser['city_id'];
					header('location:index.php');
					
			 } else {
					$_SESSION['error'] = "Email or password is not exist!";
					header('location:Auth.php');
			 }
	  }