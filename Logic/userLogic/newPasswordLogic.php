<?php
	  require __DIR__ . '/../../vendor/autoload.php';
	  
	  use CarHouse\Models\Db;
	  
	  session_start();
	  $dbAction = new Db();
	  if (isset($_POST['resetPassword'])
			&& $_POST['resetPassword'] === 'reset-password'
	  ) {
			 $filterPassword = strip_tags($_POST['newPassword']);
			 $newPassword = password_hash(
				  $filterPassword, PASSWORD_BCRYPT
			 );
			 // Update the password and clear the reset token
			 $updatePassword = $dbAction->update(
				  "users",
				  ["password"           => $newPassword,
					"reset_token"        => '',
					"reset_token_expiry" => "2025-01-01 01:01:01"]
			 )->where("id", "=", $_SESSION['checkUserData']['id'])->execution();
			 $_SESSION['success'] = 'Password reset successfully!';
	  } else {
			 $_SESSION['error'] = "Invalid or expired response";
			 unset($_SESSION['checkUserData']);
	  }
	  header("Location: ../../authLogin.php");