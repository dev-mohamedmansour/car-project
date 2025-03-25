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
			 echo "<pre>";
			 var_dump($_SESSION['checkUserData']);
			 echo "</pre>";
			 die();
			 $updatePassword = $dbAction->update(
				  "users",
				  ["password"           => $newPassword,
					"reset_token"        => null,
					"reset_token_expiry" => null]
			 )->where("id", "=", $checkUserData['id'])->execution();
//						  $_SESSION['success'] =
			 echo 'Password reset successfully!';
//						  header("Location: ../../Auth.php");
	  } else {
//			 $_SESSION['error']=
			 echo "Invalid or expired response";
//			 unset($_SESSION['checkUserData']);
//			 header("Location: ../../Auth.php");
	  }