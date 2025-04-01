<!DOCTYPE html>
<html lang="en">
<head>
	  <?php
			 require __DIR__ . '/../vendor/autoload.php';
			 session_start();
			 // if not user redirect to login page
			 if (!isset($_SESSION['adminId'])) {
					header('Location:../authLogin.php');
			 }
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
	  <meta charset="UTF-8">
	  <title>Dashboard | Home</title>
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
					<img src="../images/1726242011151.jpg"
						alt="image gallery">
				</span>

				 <div class="text logo-text">
					   <span class="name"><?php echo $_SESSION['adminName'] ?></span>
					   <span class="profession">Development</span>
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
					   <li class="nav-link Active">
							<a href="index.php">
								  <i class='bx bx-home-alt icon'></i>
								  <span class="text nav-text">Dashboard</span>
							</a>
					   </li>

					   <li class="nav-link">
							<a href="usersPage.php">
								  <i class='bx bx-user icon'></i>
								  <!-- أيقونة المستخدمين -->
								  <span class="text nav-text">Users</span>
							</a>
					   </li>

					   <li class="nav-link">
							<a href="appointmentPage.php">
								  <i class='bx bx-calendar-check icon'></i>
								  <!-- أيقونة الحجوزات -->
								  <span class="text nav-text">Appointments</span>
							</a>
					   </li>

					   <li class="nav-link">
							<a href="calendarPage.php">
								  <i class='bx bx-calendar icon'></i>
								  <!-- أيقونة التقويم -->
								  <span class="text nav-text">Calendar</span>
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
				 <div class="min-height-200px">
					   <div class="page-header">
							<div class="row justify-content-center">
								  <div class="col-md-6 col-sm-12">
									    <div class="title-home text-center py-1">
											 <div class="inner">
												   <h4 class="p-0 m-0">
														Welcome to
														your
														dashboard
														– Your
														gateway to
														productivity
														and
														success
														!! </h4>
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
					   <div class="pd-20 card-box mb-30">
							<div class="row clearfix">
								  <div class="col-sm-12 col-md-12 col-lg-4 mb-30">
									    <div class="card card-box customer-card">
											 <img class="card-img-top"
												 src="../images/users-img.jpg"
												 alt="Card image cap"/>
											 <div class="card-body text-center">
												   <h5 class="card-title weight-500">
														Customer
														Datatable</h5>
												   <p class="card-text">
														View and
														manage
														customer
														data
														efficiently,
														keeping
														everything
														organized
														and
														accessible.
												   </p>
												   <a href="usersPage.php"
													 class="btn btn-primary btn-block">
														View
														Customers
														<i class='bx bx-right-arrow-alt'></i>
												   </a>
											 </div>
									    </div>
								  </div>
								  <div class="col-sm-12 col-md-12 col-lg-4 mb-30">
									    <div class="card card-box customer-card">
											 <img class="card-img-top"
												 src="../images/Schedule & Events.jpg"
												 alt="Card image cap"/>
											 <div class="card-body text-center">
												   <h5 class="card-title weight-500">
														Schedule &
														Events</h5>
												   <p class="card-text">
														Stay
														organized
														and keep
														track of
														your
														meetings,
														appointments,
														and
														deadlines
														with ease.
												   </p>
												   <a href="usersPage.php"
													 class="btn btn-primary btn-block">
														View
														Calendar
														<i class='bx bx-right-arrow-alt'></i>
												   </a>
											 </div>
									    </div>
								  </div>

								  <div class="col-sm-12 col-md-12 col-lg-4 mb-30">
									    <div class="card card-box customer-card">
											 <img class="card-img-top"
												 src="../images/Schedule & Events.jpg"
												 alt="Card image cap"/>
											 <div class="card-body text-center">
												   <h5 class="card-title weight-500">
														Schedule &
														Events</h5>
												   <p class="card-text">
														Stay
														organized
														and keep
														track of
														your
														meetings,
														appointments,
														and
														deadlines
														with ease.
												   </p>
												   <a href="usersPage.php"
													 class="btn btn-primary btn-block">
														View
														Calendar
														<i class='bx bx-right-arrow-alt'></i>
												   </a>
											 </div>
									    </div>
								  </div>

							</div>
					   </div>
				 </div>
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