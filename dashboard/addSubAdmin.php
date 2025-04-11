<?php
	  //	  // This MUST be the very first thing in your file - before ANY output
	  session_start();
	  // if not, user redirects to login page
	  if (!isset($_SESSION['adminId'])) {
				header('location:../authLogin.php');
			 exit();
	  } elseif ($_SESSION['adminRole'] != "admin") {
			 $_SESSION['error'] = "You are not authorized to access this page!";
				header("Location:index.php");
			 exit();
	  }
	  require '../Logic/adminLogic/addAdminLogic.php';
	  
	  // Process any messages before HTML starts
	  $successMessage = '';
	  $errorMessage = '';
	  
	  if (!empty($_SESSION['success'])) {
			 $successMessage = htmlspecialchars($_SESSION['success']);
			 unset($_SESSION['success']);
	  }
	  
	  if (!empty($_SESSION['error'])) {
			 $errorMessage = htmlspecialchars($_SESSION['error']);
			 unset($_SESSION['error']);
	  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8">
	  <title>Dashboard | Add Admin</title>
	  <link rel="icon" href="../images/icons/index-icon.png">
	  <link rel='stylesheet'
		   href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
	  <link rel='stylesheet'
		   href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap'>
	  <!-- Mobile Specific Metas -->
	  <meta name="viewport"
		   content="width=device-width, initial-scale=1, maximum-scale=1"/>
	  <!-- Google Font -->
	  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		   rel="stylesheet"/>
	  <link href="https://fonts.googleapis.com/css2?family=Monomakh&display=swap"
		   rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
		   rel="stylesheet">
	  <!-- CSS -->
	  <link rel="stylesheet" type="text/css"
		   href="../vendors/styles/core.css"/>
	  <link rel="stylesheet" type="text/css"
		   href="../vendors/styles/icon-font.min.css"/>
	  <link rel="stylesheet" type="text/css"
		   href="../css/dataTables.bootstrap4.min.css"/>
	  <link rel="stylesheet" type="text/css"
		   href="../css/style-Dashboard.css"/>
</head>

<body>
<!-- partial:index.partial.html -->
<button class="mobile-toggle">
	  <i class='bx bx-menu'></i>
</button>

<nav class="sidebar close">
	  <header>
		    <div class="image-text">
				<span class="image">
					<img src="../images/icons/index-icon.png"
						alt="image gallery">
				</span>

				 <div class="text logo-text">
					   <span class="name"><?php echo $_SESSION['adminName'] ?></span>
					   <span class="profession"><?php echo $_SESSION['adminRole'] ?></span>
				 </div>
		    </div>

		    <i class='bx bx-chevron-right toggle'></i>
	  </header>

	  <div class="menu-bar">
		    <div class="menu">

				 <li class="search-box">
					   <i class='bx bx-search icon'></i>
					   <input type="text" placeholder="Search...">
				 </li>

				 <ul class="menu-links">
					   <li class="nav-link">
							<a href="index.php">
								  <i class='bx bx-home-alt icon'></i>
								  <span class="text nav-text">Dashboard</span>
							</a>
					   </li>

					   <li class="nav-link">
							<a href="usersMangerPage.php">
								  <i class='bx bx-user icon'></i>
								  <span class="text nav-text">Users</span>
							</a>
					   </li>

					   <li class="nav-link">
							<a href="orderMangerPage.php">
								  <i class='bx bx-calendar-check icon'></i>
								  <span class="text nav-text">Orders</span>
							</a>
					   </li>

					   <li class="nav-link">
							<a href="calendarPage.php">
								  <i class='bx bx-calendar icon'></i>
								  <span class="text nav-text">Calendar</span>
							</a>
					   </li>
					   <li class="nav-link Active">
							<a href="addSubAdmin.php">
								  <i class='bx bx-user-plus icon'></i>
								  <span class="text nav-text">Add Sub Admin</span>
							</a>
					   </li>


				 </ul>
		    </div>

		    <div class="bottom-content">
				 <li class="">
					   <a href="../logout.php">
							<i class='bx bx-log-out icon'></i>
							<span class="text nav-text">Logout</span>
					   </a>
				 </li>

				 <li class="mode">
					   <div class="sun-moon">
							<i class='bx bx-moon icon moon'></i>
							<i class='bx bx-sun icon sun'></i>
					   </div>
					   <span class="mode-text text">Dark mode</span>

					   <div class="toggle-switch">
							<span class="switch"></span>
					   </div>
				 </li>

		    </div>
	  </div>

</nav>
<div class="sidebar-overlay"></div>
<style>
    .message-container {
        margin: 15px 0;
    }

    .success-message {
        background: #4CAF50;
        color: white;
        padding: 10px 15px;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .error-message {
        background: #F44336;
        color: white;
        padding: 10px 15px;
        border-radius: 4px;
        margin-bottom: 15px;
    }
</style>

<section class="home">
	  <div class="main-container p-4">
		    <div class="pd-ltr-20 xs-pd-20-10">
				 <div class="page-header">
					   <div class="row justify-content-center">
							<div class="col-md-6 col-sm-12">
								  <div class="text-center py-1">
									    <div class="inner">
											 <h4 class="p-0 m-0">
												   Add Sub
												   Admin </h4>
									    </div>
								  </div>
							</div>
					   </div>
				 </div>
				 <!-- Message Display Section -->
				 <div class="message-container">
								  <?php if (!empty($successMessage)): ?>
						   <div class="success-message"><?= $successMessage ?></div>
								  <?php endif; ?>
								  
								  <?php if (!empty($errorMessage)): ?>
						   <div class="error-message"><?= $errorMessage ?></div>
								  <?php endif; ?>
				 </div>
				 <form method="post" action="" novalidate>
					   <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								  <input class="form-control" required
									    type="text"
									    name="adminName"
									    placeholder="Anas ElGaml">
							</div>
					   </div>
					   <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								  <input class="form-control"
									    type="email"
									    name="adminEmail"
									    placeholder="Anas ElGaml@gmail.com"
									    required>
							</div>
					   </div>
					   <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">phone</label>
							<div class="col-sm-12 col-md-10">
								  <input class="form-control"
									    name="adminPhone"
									    placeholder="01000000000"
									    maxlength="11"
									    type="text" required>
							</div>
					   </div>
					   <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								  <input class="form-control"
									    name="adminPassword"
									    value="<?php echo str_pad(
																	  mt_rand(0, 99999999), 8,
																	  '0', STR_PAD_LEFT
																 ); ?>"
									    type="text">
							</div>
					   </div>
					   <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select
								  Role</label>
							<div class="col-sm-12 col-md-10">
								  <select name="adminRole"
										class="custom-select col-12"
										required>
									    <option selected="">Choose...
									    </option>
									    <option value="Tires Betters">
											 Tires Betters
									    </option>
									    <option
											 value="Electrical Repairs">
											 Electrical Repairs
									    </option>
									    <option value="Car Wash">Car
											 Wash
									    </option>
									    <option
											 value="Mechanical Repairs">
											 Mechanical Repairs
									    </option>
								  </select>
							</div>
					   </div>
					   <div class="form-group">

							<div class="col-sm-12 col-md-10 text-center">
								  <button class="btn-outline-success"
										type="submit" name="addAdmin"
										value="addAdmin">ADD ADMIN
								  </button>
							</div>
					   </div>
				 </form>
		    </div>
	  </div>
</section>

<!-- partial -->
<script src="../js/script.js"></script>
<!-- js -->
<!-- js -->
<script src="../vendors/scripts/core.js"></script>
<script src="../vendors/scripts/script.min.js"></script>
<!-- Google Tag Manager (noscript) -->
<noscript>
	  <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
			height="0" width="0"
			style="display: none; visibility: hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
</body>

</html>
