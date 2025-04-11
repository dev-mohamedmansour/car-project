<!DOCTYPE html>
<html lang="en">

<head>
	  <meta charset="UTF-8">
	  <title>Dashboard | Reservation</title>
	  <link rel="icon" href="../images/icons/index-icon.png">
	  <link rel='stylesheet'
		   href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
	  <link rel='stylesheet'
		   href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap'>
	  <link rel="stylesheet" href="../css/darkDashboard.css">
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
					   <span class="profession"><?php ?></span>
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
								  <!-- أيقونة المستخدمين -->
								  <span class="text nav-text">Users</span>
							</a>
					   </li>
					   <li class="nav-link Active">
							<a href="orderMangerPage.php">
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

<section class="home">
	  <div class="main-container p-4">
		    <div class="pd-ltr-20 xs-pd-20-10">
				 <div class="min-height-200px">
					   <!-- Page Header -->
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
								  <div class="col-lg-7 col-12 mt-lg-0 mt-3">
									    <div
											 class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-3 justify-content-lg-end justify-content-center text-center">
											 <!-- Total Appointments -->
											 <div class="col d-flex justify-content-center mb-lg-0 mb-3">
												   <div class="stats-card d-flex align-items-center justify-content-center flex-column">
														<i class='bx bx-calendar-check'></i>
														<div>
															  <h5 class="m-0">
																    320</h5>
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
																    280</h5>
															  <small>Completed</small>
														</div>
												   </div>
											 </div>
											 <!-- Pending Appointments -->
											 <div class="col d-flex justify-content-center mb-lg-0 mb-3">
												   <div class="stats-card d-flex align-items-center justify-content-center flex-column">
														<i class='bx bx-time'></i>
														<div>
															  <h5 class="m-0">
																    40</h5>
															  <small>Pending</small>
														</div>
												   </div>
											 </div>
									    </div>
								  </div>
							</div>
					   </div>

					   <!-- Customer Appointments Table -->
					   <div class="card-box mb-30 pb-5">
							<div class="pd-20">
								  <h4 class="text-purple h4">Customer
									    Appointments Overview</h4>
							</div>
							<div class="pb-20">
								  <table class="table hover multiple-select-row data-table-export nowrap">
									    <thead>
									    <tr>
											 <th class="table-plus">
												   Name
											 </th>
											 <th> Phone</th>
											 <th> Car Model</th>
											 <th> Appointment Date
											 </th>
											 <th> Service Notes</th>
											 <th class="datatable-nosort">
												   Actions
											 </th>
									    </tr>
									    </thead>
									    <tbody>
									    <tr>
											 <td class="table-plus">
												   Mohamed Ali
											 </td>
											 <td>01012345678</td>
											 <td>Toyota - Corolla
											 </td>
											 <td>March 25, 2024 -
												   10:30 AM
											 </td>
											 <td>Oil change
												   required
											 </td>
											 <td>
												   <div class="dropdown">
														<a class="btn btn-link font-24 p-0 line-height-1 no-arrow"
														   href="#"
														   role="button"
														   data-toggle="dropdown">
															  <i class="dw dw-more"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
															  <a class="dropdown-item"
																href="#"><i
																		 class="dw dw-eye"></i>
																    View</a>
															  <a class="dropdown-item"
																href="#"><i
																		 class="dw dw-edit2"></i>
																    Edit</a>
															  <a class="dropdown-item"
																href="#"><i
																		 class="dw dw-delete-3"></i>
																    Delete</a>
														</div>
												   </div>
											 </td>
									    </tr>
									    <tr>
											 <td class="table-plus">
												   Ahmed Hassan
											 </td>
											 <td>01234567890</td>
											 <td>Hyundai - Elantra
											 </td>
											 <td>March 26, 2024 -
												   2:00 PM
											 </td>
											 <td>Brake check and tire
												   replacement
											 </td>
											 <td>
												   <div class="dropdown">
														<a class="btn btn-link font-24 p-0 line-height-1 no-arrow"
														   href="#"
														   role="button"
														   data-toggle="dropdown">
															  <i class="dw dw-more"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
															  <a class="dropdown-item"
																href="#"><i
																		 class="dw dw-eye"></i>
																    View</a>
															  <a class="dropdown-item"
																href="#"><i
																		 class="dw dw-edit2"></i>
																    Edit</a>
															  <a class="dropdown-item"
																href="#"><i
																		 class="dw dw-delete-3"></i>
																    Delete</a>
														</div>
												   </div>
											 </td>
									    </tr>
									    <tr>
											 <td class="table-plus">
												   Sara Mahmoud
											 </td>
											 <td>01122334455</td>
											 <td>Kia - Sportage</td>
											 <td>March 27, 2024 -
												   11:00 AM
											 </td>
											 <td>Air filter
												   replacement
											 </td>
											 <td>
												   <div class="dropdown">
														<a class="btn btn-link font-24 p-0 line-height-1 no-arrow"
														   href="#"
														   role="button"
														   data-toggle="dropdown">
															  <i class="dw dw-more"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
															  <a class="dropdown-item"
																href="#"><i
																		 class="dw dw-eye"></i>
																    View</a>
															  <a class="dropdown-item"
																href="#"><i
																		 class="dw dw-edit2"></i>
																    Edit</a>
															  <a class="dropdown-item"
																href="#"><i
																		 class="dw dw-delete-3"></i>
																    Delete</a>
														</div>
												   </div>
											 </td>
									    </tr>
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