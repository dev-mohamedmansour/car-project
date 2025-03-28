<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Calendar</title>
	<link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
	<link rel='stylesheet'
		href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap'>
	  <link rel="stylesheet" href="../css/darkDashboard.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet" />
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css" />
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css" />
	<link rel="stylesheet" type="text/css" href="../vendors/fullcalendar/fullcalendar.css" />
	<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/responsive.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style-Dashboard.css" />

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
					<img src="https://i.postimg.cc/jqgkqhSb/cast-11.jpg" alt="image gallery">
				</span>

				<div class="text logo-text">
					<span class="name">Ismail Mohamed</span>
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
					<li class="nav-link">
						<a href="index.php">
							<i class='bx bx-home-alt icon'></i>
							<span class="text nav-text">Dashboard</span>
						</a>
					</li>

					<li class="nav-link">
						<a href="usersPage.php">
							<i class='bx bx-user icon'></i> <!-- أيقونة المستخدمين -->
							<span class="text nav-text">Users</span>
						</a>
					</li>

					<li class="nav-link">
                        <a href="appointmentsPage.php">
                            <i class='bx bx-calendar-check icon'></i> <!-- أيقونة الحجوزات -->
                            <span class="text nav-text">Appointments</span>
                        </a>
					</li>

					<li class="nav-link Active">
						<a href="Calendar.html">
							<i class='bx bx-calendar icon'></i> <!-- أيقونة التقويم -->
							<span class="text nav-text">Calendar</span>
						</a>
					</li>

				</ul>
			</div>

			<div class="bottom-content">
				<li class="">
					<a href="#">
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
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Calendar</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Calendar
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="d-flex justify-content-end">
									<div class="stats-card mr-3">
										<i class='bx bx-calendar-event'></i>
										<div>
											<h5 class="m-0">12</h5>
											<small>Events This Month</small>
										</div>
									</div>
									<div class="stats-card">
										<i class='bx bx-time-five'></i>
										<div>
											<h5 class="m-0">3</h5>
											<small>Upcoming This Week</small>
										</div>
									</div>
								</div>
							</div>
						</div>					
					</div>
					<div class="pd-20 card-box mb-30">
						<div class="calendar-wrap">
							<div id="calendar"></div>
						</div>
						<!-- calendar modal -->
						<div id="modal-view-event" class="modal modal-top fade calendar-modal">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-body">
										<h4 class="h4">
											<span class="event-icon weight-400 mr-3"></span><span
												class="event-title"></span>
										</h4>
										<div class="event-body"></div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">
											Close
										</button>
									</div>
								</div>
							</div>
						</div>
						<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<form id="add-event">
										<div class="modal-body">
											<h4 class="text-blue h4 mb-10">Add Event Detail</h4>
											<div class="form-group">
												<label>Event name</label>
												<input type="text" class="form-control" name="ename" />
											</div>
											<div class="form-group">
												<label>Event Date</label>
												<input type="text" class="datetimepicker form-control" name="edate" />
											</div>
											<div class="form-group">
												<label>Event Description</label>
												<textarea class="form-control" name="edesc"></textarea>
											</div>
											<div class="form-group">
												<label>Event Color</label>
												<select class="form-control" name="ecolor">
													<option value="fc-bg-default">fc-bg-default</option>
													<option value="fc-bg-blue">fc-bg-blue</option>
													<option value="fc-bg-lightgreen">
														fc-bg-lightgreen
													</option>
													<option value="fc-bg-pinkred">fc-bg-pinkred</option>
													<option value="fc-bg-deepskyblue">
														fc-bg-deepskyblue
													</option>
												</select>
											</div>
											<div class="form-group">
												<label>Event Icon</label>
												<select class="form-control" name="eicon">
													<option value="circle">circle</option>
													<option value="cog">cog</option>
													<option value="group">group</option>
													<option value="suitcase">suitcase</option>
													<option value="calendar">calendar</option>
												</select>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary">
												Save
											</button>
											<button type="button" class="btn btn-primary" data-dismiss="modal">
												Close
											</button>
										</div>
									</form>
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
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../vendors/fullcalendar/fullcalendar.min.js"></script>
	<script src="../vendors/scripts/calendar-setting.js"></script>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
			style="display: none; visibility: hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
</body>

</html>