<?php
	  
	  use Car\Models\Db;
	  
	  session_start();
	  $dbAction = new Db();
	  if (isset($_GET['token'])) {
			 $token = $_GET['token'];
			 // Check if the token is valid and not expired
			 $checkUserData = $dbAction->select("*", "users")->where(
				  "reset_token", "=", $token
			 )->andWhere("reset_token_expiry", "=", "NOW()")->getRow();
			 if ($checkUserData) {
					if (isset($_POST['resetPassword'])) {
						  $newPassword = password_hash(
								$_POST['newPassword'], PASSWORD_BCRYPT
						  );
						  // Update the password and clear the reset token
						  $updatePassword = $dbAction->update(
								"users",
								["password"           => $newPassword,
								 "reset_token"        => null,
								 "reset_token_expiry" => null]
						  )->where("id", "=", $checkUserData['id'])->execution();
						  echo 'Password reset successfully!';
					}
			 } else {
					echo 'Invalid or expired token.';
			 }
	  }