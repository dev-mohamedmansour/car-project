<?php
	  require __DIR__ . '/vendor/autoload.php';
	  
	  use CarHouse\Models\Db;
	  
	  session_start();
	  $dbAction = new Db();
	  if (isset($_GET['token'])) {
			 $token = $_GET['token'];
			 // Check if the token exists in the database
			 $getUser = $dbAction->select("*", "users")->where(
				  "verification_token", "=", $token
			 )->getRow();
			 if ($getUser) {
					// Mark the user as verified
					$updateUserData = $dbAction->update(
						 "users",
						 ["verification_token" => "NULL()", "verify_email" => 1]
					)->where("id", "=", $getUser['id'])->execution();
					
					$_SESSION['success'] = 'Email verified successfully!';
					header('location:index.php');
					
			 } else {
					$_SESSION['error'] = 'Invalid token.';
					header('location:index.php');
			 }
	  } else {
			 $_SESSION['error'] = 'No token provided.';
			 header('location:index.php');
	  }
