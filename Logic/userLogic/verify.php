<?php
	  
	  use Car\Models\Db;
	  
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
					$UpdateUserData = $dbAction->update(
						 "users", ["verification_token" => null, "verify_email" => 1]
					)->where("id", "=", $getUser['id'])->execution();
					echo 'Email verified successfully!';
			 } else {
					echo 'Invalid token.';
			 }
	  } else {
			 echo 'No token provided.';
			 header('location:index.php');
	  }
