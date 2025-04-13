<?php
	  
	  use CarHouse\Models\Db;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
// Start session if isn't already started
	  if (session_status() === PHP_SESSION_NONE) {
			 session_start();
	  }
	  $dbAction = new DB;
	  
	  if (isset($_POST['submitSupport'])) {
			 // Check if all fields are filled
			 if (empty($_POST['name']) || empty($_POST['email'])
				  || empty($_POST['subject'])
				  || empty($_POST['message'])
			 ) {
					$_SESSION['error'] = "Please fill all the fields.";
					header('Location:../../contact-us.php');
					exit();
			 }
			 $filterEmail = strip_tags($_POST['email']);
			 $email = mysqli_real_escape_string(
				  $dbAction->connection, $filterEmail
			 );
			 
			 // Proceed with sign-up if email does not exist
			 $filterName = strip_tags($_POST['name']);
			 $name = mysqli_real_escape_string($dbAction->connection, $filterName);
			 
			 $filterSubject = strip_tags($_POST['subject']);
			 $subject = mysqli_real_escape_string(
				  $dbAction->connection, $filterSubject
			 );
			 $filterMessage = strip_tags($_POST['message']);
			 $message = mysqli_real_escape_string(
				  $dbAction->connection, $filterMessage
			 );
			 
			 $data = [
				  "name"     => $name,
				  "email"    => $email,
				  "subject"  => $subject,
				  "messages" => $message
			 ];
			 
			 
			 $messagesInsert = $dbAction->insert("messages", $data)->execution();
			 if ($messagesInsert == "something error") {
					$_SESSION['error'] = "Send failed. Please try again.";
			 } else {
					$_SESSION['success']
						 = "Messages Sent successful.";
			 }
			 header('Location:../../contact-us.php');
	  }