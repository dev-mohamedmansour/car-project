<?php
	  
	  require __DIR__ . '/../../vendor/autoload.php';
	  
	  use CarHouse\Models\Db;
	  
	  session_start();
	  $dbAction = new Db();
	  if (isset($_GET['token'])) {
			 $token = $_GET['token'];
			 // Check if the token is valid and not expired
			 $checkUserData = $dbAction->select("*", "users")->where(
				  "reset_token", "=", $token
			 )->andWhere("reset_token_expiry", ">", date('Y-m-d H:i:s'))->getRow();
			 if ($checkUserData) {
					$checkUserData = $_SESSION['checkUserData'];
					header('Location:../../newPassword.php');
					exit();
			 } else {
					$_SESSION['error'] = 'Invalid or expired token.';
					header("Location: ../../Auth.php");
			 }
	  }