<?php
	  require __DIR__ . '/vendor/autoload.php';
	  session_start();
	  //			  if not, user redirects to login page
	  if (!isset($_SESSION['userId'])) {
			 header('location:authLogin.php');
	  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Car House | Home</title>
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
	  <link rel="stylesheet" id="joinchat-css"
		   href="https://itqan-quran.com/wp-content/plugins/creame-whatsapp-me/public/css/joinchat.min.css?ver=5.0.6"
		   media="all"/>
	  <script
		    src="https://itqan-quran.com/wp-includes/js/jquery/jquery.min.js?ver=3.6.4"
		    id="jquery-core-js"></script>

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
				 <button class="nav-link active-link" id="nav-booking-tab"
					    data-bs-toggle="tab"
					    data-bs-target="#nav-booking" type="button"
					    role="tab" aria-controls="nav-booking"
					    aria-selected="true">
					   <a href="index.php">
							<i class="fas fa-calendar-plus"></i> Home
					   </a>
				 </button>

				 <!-- Check Booking Button -->
				 <button class="nav-link" id="nav-inquiry-tab"
					    data-bs-toggle="tab" data-bs-target="#nav-inquiry"
					    type="button" role="tab"
					    aria-controls="nav-inquiry" aria-selected="false">
					   <a href="orders.php">
							<i class="fas fa-search"></i> Check Orders
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
		    <h1 class="wow fadeInDown" data-wow-delay="0.1s"> <span
					   class="highlight me-3 wow fadeInDown"
					   data-wow-delay="0.5s">Car</span><span
					   class="highlight wow fadeInDown"
					   data-wow-delay="1s">House </span>مرحبا بكم في </h1>
		    <p class="lead wow fadeInUp" data-wow-delay="1.3s">
				 من الغسيل إلى الإصلاحات الميكانيكية والكهربائية –
				 كل ما تحتاجه سيارتك في مكان واحد.
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
				 <div data-mdb-input-init class="form-outline">
					   <input disabled class="form-control d-none"
							type="text" id="f2-username2">
					   <select class="form-control form-select"
							 name="popularProblems"
							 id="popularProblems"
					   >
							<option selected value="Not Popular problem">
								  Select if Popular problem
							</option>
							<option value="Dead Battery">Dead Battery
							</option>
							<option value="Check Engine Light">Check
								  Engine Light
							</option>
							<option value="Transmission Slipping">
								  Transmission Slipping
							</option>
							<option value="Brake Grind">Brake Grind
							</option>
					   </select>
				 </div>
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

<div class="joinchat joinchat--right"
	data-settings="{&quot;telephone&quot;:&quot;201007832666&quot;,&quot;mobile_only&quot;:false,&quot;button_delay&quot;:3,&quot;whatsapp_web&quot;:false,&quot;qr&quot;:false,&quot;message_views&quot;:2,&quot;message_delay&quot;:10,&quot;message_badge&quot;:false,&quot;message_hash&quot;:&quot;c6310b3&quot;}">
	  <div class="joinchat__button">
		    <div class="joinchat__button__open"></div>
		    <div class="joinchat__button__sendtext">تواصل معنا الآن</div>
		    <svg class="joinchat__button__send" width="60" height="60"
			    viewbox="0 0 400 400" stroke-linecap="round"
			    stroke-width="33">
				 <path class="joinchat_svg__plain"
					  d="M168.83 200.504H79.218L33.04 44.284a1 1 0 0 1 1.386-1.188L365.083 199.04a1 1 0 0 1 .003 1.808L34.432 357.903a1 1 0 0 1-1.388-1.187l29.42-99.427"/>
				 <path class="joinchat_svg__chat"
					  d="M318.087 318.087c-52.982 52.982-132.708 62.922-195.725 29.82l-80.449 10.18 10.358-80.112C18.956 214.905 28.836 134.99 81.913 81.913c65.218-65.217 170.956-65.217 236.174 0 42.661 42.661 57.416 102.661 44.265 157.316"/>
		    </svg>
	  </div>
	  <div class="joinchat__box">
		    <div class="joinchat__header">
				 <svg class="joinchat__wa" width="120" height="28"
					 viewBox="0 0 120 28"><title>WhatsApp</title>
					   <path d="M117.2 17c0 .4-.2.7-.4 1-.1.3-.4.5-.7.7l-1 .2c-.5 0-.9 0-1.2-.2l-.7-.7a3 3 0 0 1-.4-1 5.4 5.4 0 0 1 0-2.3c0-.4.2-.7.4-1l.7-.7a2 2 0 0 1 1.1-.3 2 2 0 0 1 1.8 1l.4 1a5.3 5.3 0 0 1 0 2.3zm2.5-3c-.1-.7-.4-1.3-.8-1.7a4 4 0 0 0-1.3-1.2c-.6-.3-1.3-.4-2-.4-.6 0-1.2.1-1.7.4a3 3 0 0 0-1.2 1.1V11H110v13h2.7v-4.5c.4.4.8.8 1.3 1 .5.3 1 .4 1.6.4a4 4 0 0 0 3.2-1.5c.4-.5.7-1 .8-1.6.2-.6.3-1.2.3-1.9s0-1.3-.3-2zm-13.1 3c0 .4-.2.7-.4 1l-.7.7-1.1.2c-.4 0-.8 0-1-.2-.4-.2-.6-.4-.8-.7a3 3 0 0 1-.4-1 5.4 5.4 0 0 1 0-2.3c0-.4.2-.7.4-1 .1-.3.4-.5.7-.7a2 2 0 0 1 1-.3 2 2 0 0 1 1.9 1l.4 1a5.4 5.4 0 0 1 0 2.3zm1.7-4.7a4 4 0 0 0-3.3-1.6c-.6 0-1.2.1-1.7.4a3 3 0 0 0-1.2 1.1V11h-2.6v13h2.7v-4.5c.3.4.7.8 1.2 1 .6.3 1.1.4 1.7.4a4 4 0 0 0 3.2-1.5c.4-.5.6-1 .8-1.6.2-.6.3-1.2.3-1.9s-.1-1.3-.3-2c-.2-.6-.4-1.2-.8-1.6zm-17.5 3.2l1.7-5 1.7 5h-3.4zm.2-8.2l-5 13.4h3l1-3h5l1 3h3L94 7.3h-3zm-5.3 9.1l-.6-.8-1-.5a11.6 11.6 0 0 0-2.3-.5l-1-.3a2 2 0 0 1-.6-.3.7.7 0 0 1-.3-.6c0-.2 0-.4.2-.5l.3-.3h.5l.5-.1c.5 0 .9 0 1.2.3.4.1.6.5.6 1h2.5c0-.6-.2-1.1-.4-1.5a3 3 0 0 0-1-1 4 4 0 0 0-1.3-.5 7.7 7.7 0 0 0-3 0c-.6.1-1 .3-1.4.5l-1 1a3 3 0 0 0-.4 1.5 2 2 0 0 0 1 1.8l1 .5 1.1.3 2.2.6c.6.2.8.5.8 1l-.1.5-.4.4a2 2 0 0 1-.6.2 2.8 2.8 0 0 1-1.4 0 2 2 0 0 1-.6-.3l-.5-.5-.2-.8H77c0 .7.2 1.2.5 1.6.2.5.6.8 1 1 .4.3.9.5 1.4.6a8 8 0 0 0 3.3 0c.5 0 1-.2 1.4-.5a3 3 0 0 0 1-1c.3-.5.4-1 .4-1.6 0-.5 0-.9-.3-1.2zM74.7 8h-2.6v3h-1.7v1.7h1.7v5.8c0 .5 0 .9.2 1.2l.7.7 1 .3a7.8 7.8 0 0 0 2 0h.7v-2.1a3.4 3.4 0 0 1-.8 0l-1-.1-.2-1v-4.8h2V11h-2V8zm-7.6 9v.5l-.3.8-.7.6c-.2.2-.7.2-1.2.2h-.6l-.5-.2a1 1 0 0 1-.4-.4l-.1-.6.1-.6.4-.4.5-.3a4.8 4.8 0 0 1 1.2-.2 8.3 8.3 0 0 0 1.2-.2l.4-.3v1zm2.6 1.5v-5c0-.6 0-1.1-.3-1.5l-1-.8-1.4-.4a10.9 10.9 0 0 0-3.1 0l-1.5.6c-.4.2-.7.6-1 1a3 3 0 0 0-.5 1.5h2.7c0-.5.2-.9.5-1a2 2 0 0 1 1.3-.4h.6l.6.2.3.4.2.7c0 .3 0 .5-.3.6-.1.2-.4.3-.7.4l-1 .1a21.9 21.9 0 0 0-2.4.4l-1 .5c-.3.2-.6.5-.8.9-.2.3-.3.8-.3 1.3s.1 1 .3 1.3c.1.4.4.7.7 1l1 .4c.4.2.9.2 1.3.2a6 6 0 0 0 1.8-.2c.6-.2 1-.5 1.5-1a4 4 0 0 0 .2 1H70l-.3-1v-1.2zm-11-6.7c-.2-.4-.6-.6-1-.8-.5-.2-1-.3-1.8-.3-.5 0-1 .1-1.5.4a3 3 0 0 0-1.3 1.2v-5h-2.7v13.4H53v-5.1c0-1 .2-1.7.5-2.2.3-.4.9-.6 1.6-.6.6 0 1 .2 1.3.6.3.4.4 1 .4 1.8v5.5h2.7v-6c0-.6 0-1.2-.2-1.6 0-.5-.3-1-.5-1.3zm-14 4.7l-2.3-9.2h-2.8l-2.3 9-2.2-9h-3l3.6 13.4h3l2.2-9.2 2.3 9.2h3l3.6-13.4h-3l-2.1 9.2zm-24.5.2L18 15.6c-.3-.1-.6-.2-.8.2A20 20 0 0 1 16 17c-.2.2-.4.3-.7.1-.4-.2-1.5-.5-2.8-1.7-1-1-1.7-2-2-2.4-.1-.4 0-.5.2-.7l.5-.6.4-.6v-.6L10.4 8c-.3-.6-.6-.5-.8-.6H9c-.2 0-.6.1-.9.5C7.8 8.2 7 9 7 10.7c0 1.7 1.3 3.4 1.4 3.6.2.3 2.5 3.7 6 5.2l1.9.8c.8.2 1.6.2 2.2.1.6-.1 2-.8 2.3-1.6.3-.9.3-1.5.2-1.7l-.7-.4zM14 25.3c-2 0-4-.5-5.8-1.6l-.4-.2-4.4 1.1 1.2-4.2-.3-.5A11.5 11.5 0 0 1 22.1 5.7 11.5 11.5 0 0 1 14 25.3zM14 0A13.8 13.8 0 0 0 2 20.7L0 28l7.3-2A13.8 13.8 0 1 0 14 0z"/>
				 </svg>
				 <div class="joinchat__close" title="إغلاق"></div>
		    </div>
		    <div class="joinchat__box__scroll">
				 <div class="joinchat__box__content">
					   <div class="joinchat__message">نرحب باستفساراتكم
					   </div>
				 </div>
		    </div>
	  </div>
	  <svg style="width:0;height:0;position:absolute">
		    <defs>
				 <clipPath id="joinchat__message__peak">
					   <path d="M17 25V0C17 12.877 6.082 14.9 1.031 15.91c-1.559.31-1.179 2.272.004 2.272C9.609 18.182 17 18.088 17 25z"/>
				 </clipPath>
		    </defs>
	  </svg>
</div>


<script
	  src="https://itqan-quran.com/wp-content/plugins/creame-whatsapp-me/public/js/joinchat.min.js?ver=5.0.6"
	  id="joinchat-js"></script>

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
            $('#login_make').append('<option value="not selected">Select your car</option>');
            $.each(data.Makes, function (index, make) {
                $('#login_make').append('<option value="' + make.make_id + '">' + make.make_display + '</option>');
            });
        });
        // عند تغيير الشركة المصنعة
        $('#login_make').change(function () {
            var makeId = $(this).val();
            $('#login_model').empty().append('<option value="not selected">Select model of car</option>').prop('disabled', true);
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
    });
</script>
</body>

</html>