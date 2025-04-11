<?php
	  session_start();
	  // if not, user redirects to login page
	  if (!isset($_SESSION['userId'])) {
			 header('location:authLogin.php');
			 exit();
	  }
	  require 'Logic/userLogic/orderLogic.php';
	  
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
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Car House | Orders</title>
	  <link rel="icon" href="images/icons/index-icon.png">
	  <link rel="preconnect" href="https://fonts.googleapis.com">
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	  <link href="https://fonts.googleapis.com/css2?family=Monomakh&display=swap"
		   rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
		   rel="stylesheet">
	  <link
		    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
		    rel="stylesheet">
	  <link rel="stylesheet"
		   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	  <link rel="stylesheet"
		   href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	  <!-- MDB -->
	  <link rel="stylesheet" href="css/all.min.css">
	  <link rel="stylesheet" href="css/mdb.min.css">
	  <link rel="stylesheet" href="css/animate.min.css">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/style.css">
	  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	  <link rel="stylesheet" href="css/style-Dashboard.css">
	  <link rel="stylesheet" type="text/css"
		   href="vendors/styles/core.css"/>
	  <link rel="stylesheet" type="text/css"
		   href="vendors/styles/icon-font.min.css"/>
	  <link rel="stylesheet" type="text/css"
		   href="css/responsive.bootstrap4.min.css"/>

	  <!-- Bootstrap 5 JavaScript -->

</head>

<body>
<nav class="navbar navbar-expand-lg custom-nav">
	  <!-- Navbar Toggler Button for Small Screens -->
	  <button class="navbar-toggler ms-4" type="button"
			data-bs-toggle="collapse" data-bs-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false"
			aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
	  </button>

	  <!-- Navbar Links -->
	  <div class="collapse navbar-collapse" id="navbarNav">
		    <div class="nav nav-tabs px-3 d-flex flex-lg-row flex-column align-items-start w-100"
			    id="nav-tab"
			    role="tablist">
				 <!-- New Appointment Button -->
				 <button class="nav-link" id="nav-booking-tab"
					    data-bs-toggle="tab"
					    data-bs-target="#nav-booking" type="button"
					    role="tab" aria-controls="nav-booking"
					    aria-selected="true">
					   <a href="index.php">
							<i class="fas fa-calendar-plus"></i> Home
					   </a>
				 </button>

				 <!-- Check Booking Button -->
				 <button class="nav-link active-link" id="nav-inquiry-tab"
					    data-bs-toggle="tab" data-bs-target="#nav-inquiry"
					    type="button" role="tab"
					    aria-controls="nav-inquiry" aria-selected="false">
					   <a href="orders.php">
							<i class="fas fa-search"></i> Check Orders
					   </a>
				 </button>

				 <!-- Monthly Maintenance Button -->
				 <button class="nav-link" id="nav-maintenance-tab"
					    data-bs-toggle="tab"
					    data-bs-target="#nav-maintenance"
					    type="button" role="tab"
					    aria-controls="nav-maintenance"
					    aria-selected="false">
					   <a href="#">
							<i class="fas fa-tools"></i> Monthly
							Maintenance
					   </a>
				 </button>

				 <!-- Contact Us Button -->
				 <button class="nav-link" id="nav-contact-tab"
					    data-bs-toggle="tab" data-bs-target="#nav-contact"
					    type="button" role="tab"
					    aria-controls="nav-contact" aria-selected="false">
					   <a href="contact-us.php">
							<i class="fas fa-envelope"></i> Contact Us
					   </a>
				 </button>
				 <!-- Log out Button (Moved to bottom in small screens) -->
				 <button class="nav-link login-btn mt-lg-0 ms-auto"
					    id="nav-logout-tab" data-bs-toggle="tab"
					    data-bs-target="#nav-logout" type="button"
					    role="tab" aria-controls="nav-logout"
					    aria-selected="false">
					   <a href="logout.php">
							<i class="fas fa-user-lock"></i> Log out
					   </a>
				 </button>
		    </div>
	  </div>
</nav>
<style>
    .error-message {
        color: red;
        text-align: center;
        margin-bottom: 20px;
        padding: 10px;
        background-color: #ffe6e6;
        border: 1px solid #ff9999;
        border-radius: 5px;
    }

    .success-message {
        color: #ffffff;
        text-align: center;
        margin-bottom: 20px;
        padding: 10px;
        background-color: #20ad04;
        border: 1px solid #3014db;
        border-radius: 5px
    }
</style>
<?php
	  if (!empty($_SESSION['success'])
	  ) {
				echo '<div id="error-message" class="success-message" style="display: block; z-index: 1000;">'
				  . htmlspecialchars($_SESSION['success'])
				  . '</div>';
			 unset($_SESSION['success']); // Clear the error message after displaying
	  } elseif (!empty($_SESSION['error'])) {
				echo '<div id="error-message" class="error-message" style="display: block; z-index: 1000;">'
				  . htmlspecialchars(
						$_SESSION['error']
				  )
				  . '</div>';
			 unset($_SESSION['error']); // Clear the error message after displaying
	  }
?>
<section class="hero" style="flex-wrap: wrap; overflow: scroll">
	  <div class="background-opacity"></div>
	  <div class="background"></div>
	  <div class="container text-center hero-content">
		    <h1 class="wow fadeInDown" data-wow-delay="0.1s">Welcome <span
					   class="highlight me-3 wow fadeInDown"
					   data-wow-delay="0.5s"><?php printUserName(
									 $_SESSION["userName"]
								); ?></span></h1>
	  </div>
	  <section class="container"
			 style="z-index: 1000;text-align: -webkit-center;">
		    <!-- Export Datatable start -->
		    <!--		    <section class="home">-->
		    <div class="card-box mb-30 pb-5">
				 <div class="pd-20">
					   <h4 class="text-purple h4">Orders Table
							with Export Buttons</h4>
				 </div>
				 <div class="pb-20">
					   <table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
							<tr>
								  <th>Name</th>
								  <th class="table-plus">
									    Service Type
								  </th>
								  <th>Order Code</th>
								  <th>
									    Car Make
								  </th>
								  <th>
									    Car Model
								  </th>
								  <th>Order Phone
								  </th>
								  <th>Time Booking
								  </th>
								  <th>Order Status
								  </th>
								  <th>Order Date
								  </th>
								  <th class="datatable-nosort">
									    Action
								  </th>
							</tr>
							</thead>
							<tbody>
											  <?php
													 showOrders($_SESSION['userId']);
											  ?>
							<!-- Export Datatable End -->
							</tbody>
					   </table>
				 </div>
		    </div>
	  </section>
</section>
<script src="js/mdb.umd.min.js" type="text/javascript"></script>
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="js/wow.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="js/dataTables.buttons.min.js"></script>
<script src="js/buttons.bootstrap4.min.js"></script>
<script src="js/buttons.print.min.js"></script>
<script src="js/buttons.html5.min.js"></script>
<script src="js/buttons.flash.min.js"></script>
<script src="js/pdfmake.min.js"></script>
<script src="js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="vendors/scripts/datatable-setting.js"></script>
</body>
</html>