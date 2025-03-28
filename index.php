<!DOCTYPE html>
<html lang="en">
<head>
	  <?php
			 require __DIR__ . '/vendor/autoload.php';
			 session_start();
			 // if not user redirect to login page
			 if (!isset($_SESSION['userId'])) {
					header('location:authLogin.php');
			 }
	  ?>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Car House | Home</title>
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
				 <button class="nav-link active-link" id="nav-booking-tab"
					    data-bs-toggle="tab"
					    data-bs-target="#nav-booking" type="button"
					    role="tab" aria-controls="nav-booking"
					    aria-selected="true">
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
<section class="hero">
	  <div class="background-opacity"></div>
	  <div class="background"></div>
	  <div class="container text-center hero-content">
		    <h1 class="wow fadeInDown" data-wow-delay="0.1s">Welcome to <span
					   class="highlight me-3 wow fadeInDown"
					   data-wow-delay="0.5s">Car</span><span
					   class="highlight wow fadeInDown"
					   data-wow-delay="1s">House</span></h1>
		    <p class="lead wow fadeInUp" data-wow-delay="1.3s">
				 From washing to mechanical and electrical repairs –
				 Everything your car needs in one place.
		    </p>
		    <div class="row mt-4 justify-content-center">
				 <div class="col-md-3 col-6 wow fadeInUp"
					 data-wow-delay="1.6s">
					   <a class="service-box" href="#"
						 data-service="Car Wash">🧼 Car <br> Wash</a>
				 </div>
				 <div class="col-md-3 col-6 wow fadeInUp"
					 data-wow-delay="1.9s">
					   <a class="service-box" href="#"
						 data-service="Mechanical Repairs">🔧 Mechanical
							<br> Repairs</a>
				 </div>
				 <div class="col-md-3 col-6 mt-3 mt-md-0 wow fadeInUp"
					 data-wow-delay="2.2s">
					   <a class="service-box" href="#"
						 data-service="Electrical Repairs">⚡ Electrical
							<br> Repairs</a>
				 </div>
				 <div class="col-md-3 col-6 mt-3 mt-md-0 wow fadeInUp"
					 data-wow-delay="2.4s">
					   <a class="service-box" href="#"
						 data-service="Tires Better">🛠️ Tires <br> Betters</a>
				 </div>
		    </div>
	  </div>
</section>


<section id="form" class="container Form">
	  <h4 class="text-center mb-4 fw-bold">Book Your Service Appointment with
		    Ease!</h4>
	  <form id="serviceForm" method="post"
		   action="Logic/userLogic/homeLogic.php" novalidate>
		    <div id="error"></div>
		    <div data-mdb-input-init class="form-outline mb-4">
				 <input type="text" id="name" class="form-control"
					   name="orderName"
					   value="<?php echo $_SESSION['userName'] ?>"
					   required/>
				 <label class="form-label" for="name">Full Name</label>
		    </div>
		    <div class="row mb-4">
				 <!-- Corrected Car Make Select -->
				 <div class="col">
					   <div data-mdb-input-init class="form-outline">
							<input disabled class="form-control d-none"
								  type="text" id="f2-username2">
							<select class="form-control form-select"
								   name="carMake"
								   id="login_make">
							</select>
					   </div>
				 </div>

				 <!-- Corrected Car Model Select -->
				 <div class="col">
					   <div data-mdb-input-init class="form-outline">
							<input disabled class="form-control d-none"
								  type="text" id="f2-username2">
							<select
								  class="form-control form-select field-validate"
								  name="carModel"
								  id="login_model"
								  disabled>
							</select>
					   </div>
				 </div>
				 <!--				 <div class="col">-->
				 <!--					   <div data-mdb-input-init class="form-outline">-->
				 <!--							<input disabled class="form-control d-none"-->
				 <!--								  type="text" id="f2-username2">-->
				 <!--							<select class="form-control form-select"-->
				 <!--								   name="carMake" id="login_make"-->
				 <!--								   form="add_car_mobile">-->
				 <!--							</select>-->
				 <!--					   </div>-->
				 <!--				 </div>-->
				 <!--				 <div class="col">-->
				 <!--					   <div data-mdb-input-init class="form-outline">-->
				 <!--							<input disabled class="form-control d-none"-->
				 <!--								  type="text" id="f2-username2">-->
				 <!--							<select-->
				 <!--								  class="form-control form-select field-validate"-->
				 <!--								  name="carModel" id="login_model"-->
				 <!--								  form="add_car_mobile" disabled>-->
				 <!--							</select>-->
				 <!--					   </div>-->
				 <!--				 </div>-->
		    </div>
		    <div data-mdb-input-init class="form-outline mb-4">
				 <input class="form-control service" type="text"
					   id="serviceName" name="serviceName" required
					   readonly>
		    </div>
		    <div data-mdb-input-init class="form-outline mb-4">
				 <input class="form-control" type="tel" id="phone"
					   name="orderPhone" required maxlength="11"
					   value="<?php echo $_SESSION['userPhone'] ?>"
					   minlength="11"/>
				 <label class="form-label" for="phone">Phone Number</label>
		    </div>
		    <div data-mdb-input-init class="form-outline mb-4">
				 <input type="datetime-local" id="f2-datetime"
					   min="<?= date('Y-m-d\TH:i') ?>"
					   max="<?= date(
										  'Y-m-d\TH:i', strtotime('+13 days 23:59')
									 ) ?>"
					   class="form-control" name="orderTime" required/>
		    </div>
		    <div data-mdb-input-init class="form-outline mb-4">
                <textarea class="form-control"
					 name="orderNotes" maxlength="500"
					 placeholder="Additional Notes (optional)"
					 id="f2-notes"
					 rows="3"></textarea>
				 <label class="form-label" for="f2-notes">Additional
					   Notes</label>
		    </div>
		    <button class="submit btn btn-block mb-4" name="submitOrder"
				  value="submitOrderData" type="submit">Submit Order
		    </button>
	  </form>
</section>

<script src="js/mdb.umd.min.js" type="text/javascript"></script>
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="js/wow.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>

<!--<script>-->
<!--    new WOW().init();-->
<!--</script>-->
<script>
    $(document).ready(function () {
        // تحميل قائمة الشركات المصنعة
        $.getJSON('https://www.carqueryapi.com/api/0.3/?callback=?&cmd=getMakes', function (data) {
            $('#login_make').append('<option value="">Select your car</option>');
            $.each(data.Makes, function (index, make) {
                $('#login_make').append('<option value="' + make.make_id + '">' + make.make_display + '</option>');
            });
        });
        // عند تغيير الشركة المصنعة
        $('#login_make').change(function () {
            var makeId = $(this).val();
            $('#login_model').empty().append('<option value="">Select model of car</option>').prop('disabled', true);
            if (makeId) {
                $.getJSON('https://www.carqueryapi.com/api/0.3/?callback=?&cmd=getModels&make=' + makeId, function (data) {
                    if (data.Models.length > 0) {
                        $.each(data.Models, function (index, model) {
                            $('#login_model').append('<option value="' + model.model_name + '">' + model.model_name + '</option>');
                        });
                        $('#login_model').prop('disabled', false);
                    }
                });
            }
        });
        // عند تغيير الموديل
        // $('#login_model').change(function () {
        // 	 var makeId = $('#login_make').val();
        // 	 var modelName = $(this).val();
        // 	 $('#login_engine').empty().append('<option value="">جاري تحميل المحركات...</option>').prop('disabled', true);
        // 	 if (modelName) {
        // 		   $.getJSON('https://www.carqueryapi.com/api/0.3/?callback=?&cmd=getTrims&make=' + makeId + '&model=' + modelName, function (data) {
        // 				var engines = new Set(); // نستخدم Set لمنع التكرارات
        // 				if (data.Trims.length > 0) {
        // 					  $.each(data.Trims, function (index, trim) {
        // 						    if (trim.engine_fuel && trim.engine_cyl && trim.engine_size_l) {
        // 								 let engineData = `${trim.engine_size_l}L ${trim.engine_fuel} ${trim.engine_cyl}-Cyl`;
        // 								 engines.add(engineData);
        // 						    }
        // 					  });
        // 				} else {
        // 					  $('#login_engine').empty().append('<option value="">لا توجد بيانات محرك متاحة</option>');
        // 				}
        // 		   });
        // 	 }
        // });
    });
</script>
</body>

</html>