<!DOCTYPE html>
<html lang="en">

<head>
	  <?php
		  // incloud header
		  session_start();
			 $userId = $_SESSION['userId'];
			 // if not user redirect to login page
			 if (!isset($userId)) {
					header('location:Auth.php');
			 }
				if (!empty($_SESSION['success'])
				) {
					  echo '<div id="error-message" class="error-message">'
							. htmlspecialchars($_SESSION['success'])
							. '</div>';
					  unset($_SESSION['success']); // Clear the error message after displaying
				}
			 
	  ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monomakh&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MDB -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap 5 JavaScript -->

</head>

<body>
    <nav class="navbar navbar-expand-lg custom-nav">
        <!-- Navbar Toggler Button for Small Screens -->
        <button class="navbar-toggler ms-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="nav nav-tabs px-3 d-flex flex-lg-row flex-column align-items-start w-100" id="nav-tab"
                role="tablist">
                <!-- New Appointment Button -->
                <button class="nav-link active-link" id="nav-booking-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-booking" type="button" role="tab" aria-controls="nav-booking"
                    aria-selected="true">
                    <a href="index.php">
                        <i class="fas fa-calendar-plus"></i> New Appointment
                    </a>
                </button>

                <!-- Check Booking Button -->
                <button class="nav-link" id="nav-inquiry-tab" data-bs-toggle="tab" data-bs-target="#nav-inquiry"
                    type="button" role="tab" aria-controls="nav-inquiry" aria-selected="false">
                    <a href="#">
                        <i class="fas fa-search"></i> Check Booking
                    </a>
                </button>

                <!-- Monthly Maintenance Button -->
                <button class="nav-link" id="nav-maintenance-tab" data-bs-toggle="tab" data-bs-target="#nav-maintenance"
                    type="button" role="tab" aria-controls="nav-maintenance" aria-selected="false">
                    <a href="#">
                        <i class="fas fa-tools"></i> Monthly Maintenance
                    </a>
                </button>

                <!-- Contact Us Button -->
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                    <a href="contact-us.php">
                        <i class="fas fa-envelope"></i> Contact Us
                    </a>
                </button>
                <!-- Login Button (Moved to bottom in small screens) -->
                <button class="nav-link login-btn mt-lg-0 ms-auto" id="nav-login-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login"
                    aria-selected="false">
                    <a href="Auth.php">
                        <i class="fas fa-user-lock"></i> Login
                    </a>
                </button>
            </div>
        </div>
    </nav>






    <section class="hero">
        <div class="background-opacity"></div>
        <div class="background"></div>
        <div class="container text-center hero-content">
            <h1 class="wow fadeInDown" data-wow-delay="0.1s">Welcome to <span class="highlight me-3 wow fadeInDown" data-wow-delay="0.5s">Car</span><span class="highlight wow fadeInDown" data-wow-delay="1s">House</span></h1>
            <p class="lead wow fadeInUp" data-wow-delay="1.3s">
                From washing to mechanical and electrical repairs – Everything your car needs in one place.
            </p>
            <div class="row mt-4 justify-content-center">
                <div class="col-md-3 col-6 wow fadeInUp" data-wow-delay="1.6s">
                    <a class="service-box" href="#">🧼 Car <br> Wash</a>
                </div>
                <div class="col-md-3 col-6 wow fadeInUp" data-wow-delay="1.9s">
                    <a class="service-box" href="#">🔧 Mechanical <br> Repairs</a>
                </div>
                <div class="col-md-3 col-6 mt-3 mt-md-0 wow fadeInUp" data-wow-delay="2.2s">
                    <a class="service-box" href="#">⚡ Electrical <br> Repairs</a>
                </div>
                <div class="col-md-3 col-6 mt-3 mt-md-0 wow fadeInUp" data-wow-delay="2.4s">
                    <a class="service-box" href="#">🛠️ Tires <br> Betters</a>
                </div>
            </div>
        </div>
    </section>


    <section id="form" class="container Form">
        <h4 class="text-center mb-4 fw-bold">Book Your Service Appointment with Ease!</h4>
        <form onsubmit="return formValidate3();" novalidate>
            <div id="error"></div>
            <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input class="form-control" type="text" id="firstName">
                        <label class="form-label" for="firstName">First name</label>
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input class="form-control" type="text" id="lastName">
                        <label class="form-label" for="lastName">Last name</label>
                    </div>
                </div>
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <input class="form-control" type="tel" id="phone" required>
                <label class="form-label" for="phone">Phone Number</label>
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <input disabled class="form-control service" type="text" id="f2-username2">
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="email" class="form-control" />
                <label class="form-label" for="email">Email address</label>
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="datetime-local" id="f2-datetime" class="form-control" required>
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <textarea class="form-control" placeholder="Additional notes (optional)" id="f2-notes"
                    rows="3"></textarea>
            </div>
            <button class="submit btn btn-block mb-4" type="submit">Submit</button>
        </form>
    </section>

    <script src="js/mdb.umd.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="js/wow.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>