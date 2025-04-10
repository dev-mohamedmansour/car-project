<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8"/>
	  <meta name="viewport"
		   content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	  <meta http-equiv="x-ua-compatible" content="ie=edge"/>
	  <title>Car House | New Password</title>
	  <link rel="icon" href="images/icons/index-icon.png">
	  <link rel="preconnect"
		   href="https://fonts.googleapis.com">
	  <link rel="preconnect" href="https://fonts.gstatic.com"
		   crossorigin>
	  <link href="https://fonts.googleapis.com/css2?family=Monomakh&display=swap"
		   rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
		   rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
		   rel="stylesheet">
	  <link rel="stylesheet"
		   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	  <link rel="stylesheet"
		   href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/all.min.css">
	  <link rel="stylesheet" href="css/mdb.min.css">
	  <link rel="stylesheet"
		   href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<style>
    .background2 {
        position: absolute;
        top: 0;
        left: 0;
        width: 115%;
        height: 115%;
        background: url('images/background.png') center/cover no-repeat;
        animation: moveBackground 30s linear infinite alternate;
        filter: brightness(0.5);
        z-index: -3;
    }

    .background-opacity2 {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.2);
        z-index: -1;
    }

    .error-message {
        color: red;
        text-align: center;
        margin-bottom: 20px;
        padding: 10px;
        background-color: #ffe6e6;
        border: 1px solid #ff9999;
        border-radius: 5px;
    }
</style>

<section class="ftco-section">
	  <div class="background-opacity2"></div>
	  <div class="background2"></div>
	  <div class="container">
		    <div class="row justify-content-center">
				 <div class="col-md-12 col-lg-6">
								  <?php
										 if (isset($_SESSION['error'])) {
												echo '<div id="error-message" class="error-message">'
													 . htmlspecialchars(
														  $_SESSION['error']
													 )
													 . '</div>';
												unset($_SESSION['error']);
										 }
								  ?>
					   <div id="wrap" class="wrap">
							<div class="login-wrap p-4 p-md-5">
								  <div id="login-form">
									    <h3 class="mb-4 text-center">
											 Reset
											 Password</h3>
									    <form method="post"
											action="Logic/userLogic/newPasswordLogic.php">
											 <div data-mdb-input-init
												 class="form-outline mb-4">
												   <input type="password"
														id="Password"
														name="newPassword"
														class="form-control"
														required/>
												   <label class="form-label"
														for="Password">New
														Password</label>
											 </div>
											 <div class="form-group">
												   <button
														type="submit"
														name="resetPassword"
														value="reset-password"
														class="submit form-control btn px-3">
														Reset
														Password
												   </button>
											 </div>
											 <div class="form-container">
												   <p class="text-center">
														Remember
														Password?
														<a
															  href="authLogin.php"
															  class="sign-link">Sign
															  In</a>
												   </p>
											 </div>
									    </form>
								  </div>
							</div>
					   </div>
				 </div>
		    </div>
	  </div>
</section>
<!-- Custom scripts -->
<script src="js/mdb.umd.min.js"
	   type="text/javascript"></script>
<script src="js/script.js"
	   type="text/javascript"></script>
<script src="js/bootstrap.bundle.min.js"
	   type="text/javascript"></script>
</body>
</html>