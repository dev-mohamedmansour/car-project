<?php
	  require __DIR__ . '/vendor/autoload.php';
	  session_start();
	  // if not, user redirects to login page
	  if (!isset($_SESSION['userId'])) {
			 header('location:authLogin.php');
	  }
?>
<!--  finish  -->
<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Car House | Contact Us</title>
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

	  <!-- MDB -->
	  <link rel="stylesheet" href="css/all.min.css">
	  <link rel="stylesheet" href="css/mdb.min.css">
	  <link rel="stylesheet" href="css/animate.min.css">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/style.css">

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
					    data-bs-toggle="tab" data-bs-target="#nav-booking"
					    type="button" role="tab"
					    aria-controls="nav-booking" aria-selected="true">
					   <a href="index.php">
							<i class="fas fa-calendar-plus"></i> New
							Appointment
					   </a>
				 </button>

				 <!-- Check Booking Button -->
				 <button class="nav-link" id="nav-inquiry-tab"
					    data-bs-toggle="tab" data-bs-target="#nav-inquiry"
					    type="button" role="tab"
					    aria-controls="nav-inquiry" aria-selected="false">
					   <a href="orders.php">
							<i class="fas fa-search"></i> Check Booking
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
				 <button class="nav-link active-link" id="nav-contact-tab"
					    data-bs-toggle="tab"
					    data-bs-target="#nav-contact" type="button"
					    role="tab" aria-controls="nav-contact"
					    aria-selected="false">
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
			 echo '<div id="error-message" class="success-message" style="display: block">'
				  . htmlspecialchars($_SESSION['success'])
				  . '</div>';
			 unset($_SESSION['success']); // Clear the error message after displaying
	  } elseif (!empty($_SESSION['error'])) {
			 echo '<div id="error-message" class="error-message" style="display: block;">'
				  . htmlspecialchars(
						$_SESSION['error']
				  )
				  . '</div>';
			 unset($_SESSION['error']); // Clear the error message after displaying
	  }
?>
<!-- Contact Start -->
<section class="container-xxl pb-5" id="contact">
	  <div class="container py-5">
		    <!-- Header -->
		    <div class="text-center mb-4 wow fadeInDown"
			    data-wow-delay="0.1s">
				 <h3 class="fw-bold text-dark">Car Trouble🚗? We’re Here 24/7
					   to Assist You!</h3>
				 <h5 class="fw-bold text-muted">Contact Us Anytime – Help is
					   Just a Call Away!</h5>
		    </div>
		    <div class="row g-5">
				 <!-- Contact Information -->
				 <div class="col-lg-5 col-md-6 wow fadeInUp"
					 data-wow-delay="0.4s">
					   <p class="mb-2">Our Location :</p>
					   <h5 class="fw-bold">Egypt, Beni Suef, Car House
							Center</h5>
					   <hr class="w-100">

					   <p class="mb-2">Call Us :</p>
					   <h5 class="fw-bold">+010 0783 2666</h5>
					   <hr class="w-100">

					   <p class="mb-2">WhatsApp Support :</p>
					   <h5 class="fw-bold">
							<a href="https://wa.me/201007832666"
							   class="btn btn-success btn-sm mt-2 p-3"><i
									    class="fab fa-whatsapp me-2"></i>
								  Chat on WhatsApp</a>
					   </h5>
					   <hr class="w-100">

					   <p class="mb-2">Email Us :</p>
					   <h5 class="fw-bold">carhouse001.bn@gmail.com</h5>
					   <hr class="w-100">

					   <p class="mb-2">Follow Us :</p>
					   <div class="d-flex pt-2">
							<a class="btn btn-square submit me-2"
							   href="https://web.facebook.com/people/Car-House/61569352688003/"
							   target="_blank">
								  <i class="fab fa-facebook-f"></i>
							</a>
							<a class="btn btn-square submit me-2"
							   href="https://www.instagram.com/car.house10?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
								  <i class="fab fa-instagram"></i>
							</a>
					   </div>
				 </div>

				 <!-- Contact Form -->
				 <div class="col-lg-7 col-md-6 wow fadeInUp"
					 data-wow-delay="0.6s">
					   <p class="mb-4">
							Need roadside assistance or have an inquiry?
							Fill out the form below, and our team will
							get back
							to you promptly.
					   </p>
					   <form action="Logic/userLogic/requestMessage.php"
						    method="POST" novalidate>
							<div class="row g-3">
								  <div class="col-md-6">
									    <div class="form-floating">
											 <input type="text"
												   class="form-control"
												   id="name"
												   name="name"
												   placeholder="Your Name">
											 <label for="name">Your
												   Name</label>
									    </div>
								  </div>
								  <div class="col-md-6">
									    <div class="form-floating">
											 <input type="email"
												   class="form-control"
												   id="email"
												   name="email"
												   placeholder="Your Email">
											 <label for="email">Your
												   Email</label>
									    </div>
								  </div>
								  <div class="col-12">
									    <div class="form-floating">
											 <input type="text"
												   class="form-control"
												   id="subject"
												   name="subject"
												   placeholder="Subject">
											 <label for="subject">Subject</label>
									    </div>
								  </div>
								  <div class="col-12">
									    <div class="form-floating">
                                    <textarea class="form-control" id="message"
									 name="message"
									 placeholder="Leave a message here"
									 style="height: 100px"></textarea>
											 <label for="message">Message</label>
									    </div>
								  </div>
								  <div class="col-12">
									    <button
											 class="btn submit py-3 px-5"
											 type="submit"
											 name="submitSupport">
											 Send
											 Message
									    </button>
								  </div>
							</div>
					   </form>
				 </div>
		    </div>
	  </div>
</section>
<!-- Contact End -->
<script src="js/mdb.umd.min.js" type="text/javascript"></script>
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="js/wow.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
</body>

</html>