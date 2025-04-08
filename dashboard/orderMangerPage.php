<?php
	  //	  // This MUST be the very first thing in your file - before ANY output
	  session_start();
	  // if not, user redirects to login page
	  if (!isset($_SESSION['adminId'])) {
			 header('location:../authLogin.php');
			 exit();
	  }
	  require '../Logic/adminLogic/orderManagementLogic.php';
	  
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
	  <meta charset="UTF-8"/>
	  <title>Orders</title>
	  <link rel="stylesheet"
		   href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"/>
	  <link rel="stylesheet"
		   href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"/>
	  <!--	  <link rel="stylesheet" href="../css/darkDashboard.css"/>-->
	  <!-- Mobile Specific Metas -->
	  <meta name="viewport"
		   content="width=device-width, initial-scale=1, maximum-scale=1"/>
	  <!-- Google Font -->
	  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		   rel="stylesheet"/>
	  <!-- CSS -->
	  <link rel="stylesheet" type="text/css"
		   href="../vendors/styles/core.css"/>
	  <link rel="stylesheet" type="text/css"
		   href="../vendors/styles/icon-font.min.css"/>
	  <link rel="stylesheet" type="text/css"
		   href="../css/dataTables.bootstrap4.min.css"/>
	  <link rel="stylesheet" type="text/css"
		   href="../css/responsive.bootstrap4.min.css"/>
	  <link rel="stylesheet" type="text/css"
		   href="../css/style-Dashboard.css"/>
</head>

<body>
<!-- partial:index.partial.html -->
<button class="mobile-toggle">
	  <i class="bx bx-menu"></i>
</button>

<nav class="sidebar close">
	  <header>
		    <div class="image-text">
                <span class="image">
                    <img src="/images/1726242011151.jpg" alt="image gallery"/>
                </span>
				 <div class="text logo-text">
					   <span class="name"><?php echo $_SESSION['adminName'] ?></span>
					   <span class="profession">Development</span>
				 </div>
		    </div>
		    <i class="bx bx-chevron-right toggle"></i>
	  </header>

	  <div class="menu-bar">
		    <div class="menu">
				 <li class="search-box">
					   <i class="bx bx-search icon"></i>
					   <input type="text" placeholder="Search..."/>
				 </li>
				 <ul class="menu-links">
					   <li class="nav-link">
							<a href="index.php">
								  <i class='bx bx-home-alt icon'></i>
								  <span class="text nav-text">Dashboard</span>
							</a>
					   </li>

					   <li class="nav-link Active">
							<a href="orderMangerPage.php">
								  <i class='bx bx-user icon'></i>
								  <!-- أيقونة المستخدمين -->
								  <span class="text nav-text">Orders</span>
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
							<a href="usersMangerPage.php">
								  <i class='bx bx-calendar-check icon'></i>
								  <!-- أيقونة الحجوزات -->
								  <span class="text nav-text">Users</span>
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
							<i class="bx bx-log-out icon"></i>
							<span class="text nav-text">Logout</span>
					   </a>
				 </li>
				 <li class="mode">
					   <div class="sun-moon">
							<i class="bx bx-moon icon moon"></i>
							<i class="bx bx-sun icon sun"></i>
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
							<div class="row">
								  <div class="col-lg-5 col-12">
									    <div class="title">
											 <h4>Customer
												   Appointments</h4>
									    </div>
									    <nav aria-label="breadcrumb">
											 <ol class="breadcrumb">
												   <li class="breadcrumb-item">
														<a
															  href="index.php">Dashboard</a>
												   </li>
												   <li class="breadcrumb-item active"
													  aria-current="page">
														Customer
														Appointments
												   </li>
											 </ol>
									    </nav>
								  </div>
								  <!-- Stats & Features Section -->
								  <div class="col-lg-7 col-12 mt-lg-0 mt-4">
									    <div
											 class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4 justify-content-lg-end justify-content-center text-center">
											 <div class="col d-flex justify-content-center mb-lg-0 mb-3">
												   <div class="stats-card d-flex align-items-center justify-content-center flex-column">
														<i class='bx bx-time'></i>
														<div>
															  <h5 class="m-0">
																											 <?php countFinishedOrdersForAdmin(
																											 ); ?>
																    ></h5>
															  <small>Finished</small>
														</div>
												   </div>
											 </div>

											 <!-- Total Appointments -->
											 <div class="col d-flex justify-content-center mb-lg-0 mb-3">
												   <div class="stats-card d-flex align-items-center justify-content-center flex-column">
														<i class='bx bx-calendar-check'></i>
														<div>
															  <h5 class="m-0">
																											 <?php countOrdersForAdmin(
																																													 ) ?></h5>
															  <small>Total
																    Appointments</small>
														</div>
												   </div>
											 </div>
											 <!-- Completed Services -->
											 <div class="col d-flex justify-content-center mb-lg-0 mb-3">
												   <div class="stats-card d-flex align-items-center justify-content-center flex-column">
														<i class='bx bx-check-circle'></i>
														<div>
															  <h5 class="m-0">
																											 <?php countCompletedOrdersForAdmin(
																											 ); ?></h5>
															  <small>Completed</small>
														</div>
												   </div>
											 </div>
											 <!-- Pending Appointments -->
											 <div class="col d-flex justify-content-center mb-lg-0 mb-3 mt-3">
												   <div class="stats-card d-flex align-items-center justify-content-center flex-column">
														<i class='bx bx-time'></i>
														<div>
															  <h5 class="m-0">
																											 <?php countPendingOrdersForAdmin(
																											 ); ?>
																    ></h5>
															  <small>Pending</small>
														</div>
												   </div>
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
					   <!-- Export Datatable start -->
					   <div class="card-box mb-30 pb-5">
							<div class="pd-20">
								  <h4 class="text-purple h4"> Order Data
									    Table
									    with Export Buttons</h4>
							</div>
							<div class="pb-20">
								  <table class="table hover multiple-select-row data-table-export nowrap">
									    <thead>
									    <tr>
											 <th>Id</th>
											 <th class="table-plus">
												   Client Name
											 </th>
											 <th>Email</th>
											 <th>
												   Phone
											 </th>
											 <th>
												   Service Name
											 </th>
											 <th>
												   Order Code
											 </th>
											 <th>
												   Car Make
											 </th>
											 <th>
												   Car Model
											 </th>
											 <th>
												   Order Notes
											 </th>
											 <th>
												   Time Booking
											 </th>
											 <th>
												   Order Status
											 </th>
											 <th>
												   Order Date
											 </th>
											 <th class="datatable-nosort">
												   Action
											 </th>
									    </tr>
									    </thead>
									    <tbody>
																 <?php
																		showOrdersForAdmin();
																 ?>
									    </tbody>
								  </table>
							</div>
					   </div>
				 </div>
		    </div>
	  </div>
</section>
<!-- partial -->
<script src="../js/script.js"></script>
<!-- js -->
<script src="../vendors/scripts/core.js"></script>
<script src="../vendors/scripts/script.min.js"></script>
<script src="../vendors/scripts/process.js"></script>
<script src="../vendors/scripts/layout-settings.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap4.min.js"></script>
<script src="../js/dataTables.responsive.min.js"></script>
<script src="../js/responsive.bootstrap4.min.js"></script>

<!-- Datatable Setting js -->
<script src="../vendors/scripts/datatable-setting.js"></script>
<!-- Google Tag Manager (noscript) -->
<noscript>
	  <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
			height="0" width="0"
			style="display: none; visibility: hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
</body>

</html>