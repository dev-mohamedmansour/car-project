<!DOCTYPE html>
<html lang="en">

<head>
	  <meta charset="UTF-8"/>
	  <title>Users</title>
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
					   <span class="name">Ismail Mohamed</span>
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
							<a href="Users.html">
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
					   <a href="#">
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

<section class="home">
	  <div class="main-container p-4">
		    <div class="pd-ltr-20 xs-pd-20-10">
				 <div class="min-height-200px">
					   <div class="page-header ">
							<div class="row">
								  <div class="col-md-5 col-sm-12">
									    <div class="title">
											 <h4>Customer
												   datatable</h4>
									    </div>
									    <nav aria-label="breadcrumb"
										    role="navigation">
											 <ol class="breadcrumb">
												   <li class="breadcrumb-item">
														<a href="index.php">Home</a>
												   </li>
												   <li class="breadcrumb-item active"
													  aria-current="page">
														Customer
														datatable
												   </li>
											 </ol>
									    </nav>
								  </div>

								  <div class="col-lg-7 col-12 mt-lg-0 mt-3">
									    <div
											 class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-3 justify-content-lg-end justify-content-center text-center">
											 <!-- Total Appointments -->
											 <div class="col d-flex justify-content-center mb-lg-0 mb-3">
												   <div class="stats-card d-flex align-items-center justify-content-center flex-column">
														<i class='bx bx-group'></i>
														<div>
															  <h5 class="m-0">
																    1,250</h5>
															  <small>Total
																    Customers</small>
														</div>
												   </div>
											 </div>
											 <!-- Completed Services -->
											 <div class="col d-flex justify-content-center mb-lg-0 mb-3">
												   <div class="stats-card d-flex align-items-center justify-content-center flex-column">
														<i class='bx bx-user-plus'></i>
														<div>
															  <h5 class="m-0">
																    78</h5>
															  <small>New
																    This
																    Month</small>
														</div>
												   </div>
											 </div>

									    </div>
								  </div>
							</div>
					   </div>
					   <!-- Export Datatable start -->
					   <div class="card-box mb-30 pb-5">
							<div class="pd-20">
								  <h4 class="text-purple h4">Data Table
									    with Export Buttons</h4>
							</div>
							<div class="pb-20">
								  <table class="table hover multiple-select-row data-table-export nowrap">
									    <thead>
									    <tr>
											 <th class="table-plus">
												   Name
											 </th>
											 <th>Age</th>
											 <th>Office</th>
											 <th>Address</th>
											 <th>Start Date</th>
											 <th class="datatable-nosort">
												   Action
											 </th>
									    </tr>
									    </thead>
									    <tbody>
									    <tr>
											 <td class="table-plus">a
												   F. Mead
											 </td>
											 <td>25</td>
											 <td>Sagittarius</td>
											 <td>2829 Trainer Avenue
												   Peoria, IL 61602
											 </td>
											 <td>29-03-2018</td>
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
											 <td class="table-plus">a
												   F. Mead
											 </td>
											 <td>25</td>
											 <td>Sagittarius</td>
											 <td>2829 Trainer Avenue
												   Peoria, IL 61602
											 </td>
											 <td>29-03-2018</td>
											 <td>
												   <div class="dropdown">
														<a class="btn btn-link font-24 p-0 line-height-1 no-arrow "
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
												   Andrea J. Cagle
											 </td>
											 <td>30</td>
											 <td>Gemini</td>
											 <td>1280 Prospect Valley
												   Road Long Beach,
												   CA 90802
											 </td>
											 <td>29-03-2018</td>
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
												   Andrea J. Cagle
											 </td>
											 <td>20</td>
											 <td>Gemini</td>
											 <td>2829 Trainer Avenue
												   Peoria, IL 61602
											 </td>
											 <td>29-03-2018</td>
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
												   Andrea J. Cagle
											 </td>
											 <td>30</td>
											 <td>Sagittarius</td>
											 <td>1280 Prospect Valley
												   Road Long Beach,
												   CA 90802
											 </td>
											 <td>29-03-2018</td>
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
												   Andrea J. Cagle
											 </td>
											 <td>25</td>
											 <td>Gemini</td>
											 <td>2829 Trainer Avenue
												   Peoria, IL 61602
											 </td>
											 <td>29-03-2018</td>
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
												   Andrea J. Cagle
											 </td>
											 <td>20</td>
											 <td>Sagittarius</td>
											 <td>1280 Prospect Valley
												   Road Long Beach,
												   CA 90802
											 </td>
											 <td>29-03-2018</td>
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
												   Andrea J. Cagle
											 </td>
											 <td>18</td>
											 <td>Gemini</td>
											 <td>1280 Prospect Valley
												   Road Long Beach,
												   CA 90802
											 </td>
											 <td>29-03-2018</td>
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
												   Andrea J. Cagle
											 </td>
											 <td>30</td>
											 <td>Sagittarius</td>
											 <td>1280 Prospect Valley
												   Road Long Beach,
												   CA 90802
											 </td>
											 <td>29-03-2018</td>
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
												   Andrea J. Cagle
											 </td>
											 <td>30</td>
											 <td>Sagittarius</td>
											 <td>1280 Prospect Valley
												   Road Long Beach,
												   CA 90802
											 </td>
											 <td>29-03-2018</td>
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
												   Andrea J. Cagle
											 </td>
											 <td>30</td>
											 <td>Gemini</td>
											 <td>1280 Prospect Valley
												   Road Long Beach,
												   CA 90802
											 </td>
											 <td>29-03-2018</td>
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
												   Andrea J. Cagle
											 </td>
											 <td>30</td>
											 <td>Gemini</td>
											 <td>1280 Prospect Valley
												   Road Long Beach,
												   CA 90802
											 </td>
											 <td>29-03-2018</td>
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
												   Andrea J. Cagle
											 </td>
											 <td>30</td>
											 <td>Gemini</td>
											 <td>1280 Prospect Valley
												   Road Long Beach,
												   CA 90802
											 </td>
											 <td>29-03-2018</td>
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
												   zzz J. Cagle
											 </td>
											 <td>30</td>
											 <td>Gemini</td>
											 <td>1280 Prospect Valley
												   Road Long Beach,
												   CA 90802
											 </td>
											 <td>29-03-2018</td>
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
					   <!-- Export Datatable End -->
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
<!-- buttons for Export datatable -->
<script src="../js/dataTables.buttons.min.js"></script>
<script src="../js/buttons.bootstrap4.min.js"></script>
<script src="../js/buttons.print.min.js"></script>
<script src="../js/buttons.html5.min.js"></script>
<script src="../js/buttons.flash.min.js"></script>
<script src="../js/pdfmake.min.js"></script>
<script src="../js/vfs_fonts.js"></script>
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