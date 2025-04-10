<?php
	  //  finish page
	  session_start();
	  session_unset();
	  session_destroy();
	  header('location:authLogin.php');
