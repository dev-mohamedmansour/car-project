<?php
	  require __DIR__ . '/../../vendor/autoload.php';
	  use CarHouse\Models\Db;
	  
//	  session_start();
	  
	  function getDetailsOfUser()
	  {
			 $dbAction = new Db();
			 $userInformation = $dbAction->select("*", "users")->where(
				  "id", "=", $_SESSION['userId']
			 )->andWhere("email", "=", $_SESSION['userEmail'])->getRow();
			 if ($userInformation) {
					echo "<pre>";
					print_r($userInformation);
					echo "</pre>";
					die();
			 }
//			 return $userInformation;
	  }
	  function checkUserEmailVerify($userInformation)
	  {
			if ($userInformation['verify_email'] === 1) {
				  echo "Your email has been verified. You can now login.";
			}
	  }

