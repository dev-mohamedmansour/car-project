<?php
	  
	  use CarHouse\Models\Db;
	  use PHPMailer\PHPMailer\PHPMailer;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
// Start session if isn't already started
	  if (session_status() === PHP_SESSION_NONE) {
			 session_start();
	  }
	  $dbAction = new DB;
//	  function printUserName($userName)
//	  {
//			 $nameParts = explode(" ", $userName);
//
//			 // Check if there are at least 2 parts
//			 if (count($nameParts) >= 2) {
//					$firstName = $nameParts[0];
//					$secondName = $nameParts[1];
//					echo $firstName . " " . $secondName;
//			 } else {
//					echo $userName; // Fallback if there's only one name
//			 }
//	  }
	  
	  function countOrdersForAdmin(): void
	  {
			 $dbAction = new DB;
			 $selectRole = $dbAction->select("role", "users")->where(
				  "id", "=", $_SESSION['adminId']
			 )->getRow();
			 if ($selectRole['role'] == 'admin') {
					$countOrders = $dbAction->select("COUNT(id)", "orders")->getRow(
					);
			 } else {
					$countOrders = $dbAction->select("COUNT(id)", "orders")->where(
						 "serviceName", "=", $selectRole['role']
					)->getRow();
			 }
			 echo $countOrders['COUNT(id)'];
	  }
	  
	  function countCompletedOrdersForAdmin(): void
	  {
			 $dbAction = new DB;
			 $selectRole = $dbAction->select("role", "users")->where(
				  "id", "=", $_SESSION['adminId']
			 )->getRow();
			 if ($selectRole['role'] == 'admin') {
					$countOrders = $dbAction->select("COUNT(id)", "orders")->where(
						 "orderStuts", "=", "completed"
					)->getRow();
			 } else {
					$countOrders = $dbAction->select("COUNT(id)", "orders")->where(
						 "serviceName", "=", $selectRole['role']
					)->andWhere(
						 "orderStuts", "=", "completed"
					)->getRow();
			 }
			 echo $countOrders['COUNT(id)'];
			 
	  }
	  
	  function countPendingOrdersForAdmin(): void
	  {
			 $dbAction = new DB;
			 
			 $selectRole = $dbAction->select("role", "users")->where(
				  "id", "=", $_SESSION['adminId']
			 )->getRow();
			 if ($selectRole['role'] == 'admin') {
					$countOrders = $dbAction->select("COUNT(id)", "orders")->where(
						 "orderStuts", "=", "pending"
					)->getRow();
			 } else {
					$countOrders = $dbAction->select("COUNT(id)", "orders")->where(
						 "serviceName", "=", $selectRole['role']
					)->andWhere(
						 "orderStuts", "=", "pending"
					)->getRow();
			 }
			 echo $countOrders['COUNT(id)'];
			 
	  }
	  
	  function countFinishedOrdersForAdmin(): void
	  {
			 $dbAction = new DB;
			 $selectRole = $dbAction->select("role", "users")->where(
				  "id", "=", $_SESSION['adminId']
			 )->getRow();
			 if ($selectRole['role'] == 'admin') {
					$countOrders = $dbAction->select("COUNT(id)", "orders")->where(
						 "orderStuts", "=", "submit"
					)->getRow();
			 } else {
					$countOrders = $dbAction->select("COUNT(id)", "orders")->where(
						 "serviceName", "=", $selectRole['role']
					)->andWhere(
						 "orderStuts", "=", "submit"
					)->getRow();
			 }
			 echo $countOrders['COUNT(id)'];
			 
	  }
	  
	  function countNewOrdersThisMonth()
	  {
			 $dbAction = new DB();
			 
			 // More precise way to get the current month range
			 $currentMonthStart = new DateTime('first day of this month');
			 $currentMonthEnd = new DateTime('last day of this month');
			 
			 $selectRole = $dbAction->select("role", "users")->where(
				  "id", "=", $_SESSION['adminId']
			 )->getRow();
			 if ($selectRole['role'] == 'admin') {
					$newUsers = $dbAction->select('COUNT(id) as newOrders', 'orders')
						 ->where(
							  'orderDateActive', '>=',
							  $currentMonthStart->format('Y-m-d 00:00:00')
						 )
						 ->andWhere(
							  'orderDateActive', '<=',
							  $currentMonthEnd->format('Y-m-d 23:59:59')
						 )
						 ->getRow();
			 } else {
					$newUsers = $dbAction->select('COUNT(id) as newOrders', 'orders')
						 ->where(
							  "serviceName", "=", $selectRole['role']
						 )
						 ->andWhere(
							  'orderDateActive', '>=',
							  $currentMonthStart->format('Y-m-d 00:00:00')
						 )
						 ->andWhere(
							  'orderDateActive', '<=',
							  $currentMonthEnd->format('Y-m-d 23:59:59')
						 )
						 ->getRow();
			 }
			 echo $newUsers['COUNT(id)'];
	  }
	  
	  function showOrdersForAdmin(): void
	  {
			 $dbAction = new DB;
			 $selectRole = $dbAction->select("role", "users")->where(
				  "id", "=", $_SESSION['adminId']
			 )->getRow();
			 if ($selectRole['role'] == 'admin') {
					$orders = $dbAction->select('*', 'orders')->getAll();
			 } else {
					$orders = $dbAction->select('*', 'orders')->where(
						 "serviceName", "=", $selectRole['role']
					)->getAll();
			 }
			 
			 if ($orders == "No results found") {
					echo '<tr>';
					echo '<h5 style="color: #dc3545"><strong>No orders found,</strong>
				   Please try again later Or book a New ServiceNow!!</h5>
				   <a class="btn" style="color: #6610f2" href="index.php">HOME</a><br>';
					echo '</tr>';
			 } elseif (count($orders) > 0) {
					foreach ($orders as $information) {
						  echo '<tr>';
						  $displayKeys = ['id', 'orderName', 'userID',
												'orderPhone', 'serviceName',
												'orderCode', 'carMake',
												'carModel', 'orderNotes',
												'orderTime',
												'orderStuts', 'orderDateActive'];
						  // First get the user email if userID exists
						  if (isset($information['userID'])) {
								 $userId = $information['userID'];
								 $information['userEmail'] = $dbAction->select(
									  "email", "users"
								 )->where("id", "=", $userId)->getRow()['email'];
						  }
						  
						  foreach ($displayKeys as $key) {
								 if (isset($information[$key])) {
										if ($key == 'userID') {
											  echo '<td class="table-plus">'
													. htmlspecialchars(
														 $information['userEmail']
													) . '</td>';
										} elseif ($key == 'orderCode') {
											  echo '<td class="table - plus"> <strong>'
													. htmlspecialchars(
														 $information[$key]
													)
													. '</strong></td>';
										} elseif ($key == 'orderStuts') {
											  echo '<td class="table-plus"> <form method="post">
													<input type="hidden" name="orderId" value="'
													. htmlspecialchars(
														 $information['id']
													) . '">
													<input type="hidden" name="orderEmail" value="'
													. htmlspecialchars(
														 $information['userEmail']
													) . '">
													<select name="orderStatus" onchange="this.form.submit()" class="form-control">
                           			 	<option value="completed" '
													. ($information[$key]
													== 'completed'
														 ? 'selected' : '') . ' style="color:#0873cf ">Completed</option>
                           			 	<option value="pending" '
													. ($information[$key]
													== 'pending' ? 'selected'
														 : '') . '>Pending</option>
                            				<option value="cancelled" '
													. ($information[$key]
													== 'cancelled'
														 ? 'selected' : '') . ' style="color: red">Cancelled</option>
												  <option value="submit" '
													. ($information[$key]
													== 'submit'
														 ? 'selected' : '') . ' style="color: #0dd639">Submit</option>
                        </select>
                    </form>
													 </form></td>';
										} else {
											  echo '<td class="table - plus">'
													. htmlspecialchars(
														 $information[$key]
													)
													. '</td>';
										}
								 }
						  }
						  
						  echo '<td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
											  >
                            <a class="dropdown-item" href = "orderMangerPage?delete='
								. (int)$information['id'] . '"><i class="dw dw-delete-3"
											  ></i > Delete</a >
                        </div >
                    </div >
                  </td > ';
						  echo '</tr > ';
					}
			 }
	  }
	  
	  if (isset($_GET['delete'])) {
			 $orderId = (int)$_GET['delete'];
			 $deleteOrder = $dbAction->delete('orders')
				  ->where('id', ' = ', $orderId)
				  ->execution();
			 
			 if ($deleteOrder == "something error") {
					$_SESSION['error'] = "Something Went Wrong";
			 } else {
					$_SESSION['success']
						 = "Order Deleted Successfully";
			 }
	  }
	  
	  if ($_SERVER['REQUEST_METHOD'] === 'POST'
			&& isset($_POST['orderStatus'])
	  ) {
			 $orderId = (int)$_POST['orderId'];
			 $orderEmail = $_POST['orderEmail'];
			 $newStatus = $_POST['orderStatus'];
			 if ($newStatus == 'completed') {
					// Update the status in database
					$updateOrder = $dbAction->update(
						 'orders', ['orderStuts' => $newStatus]
					)->where('id', '=', $orderId)->execution();
					if ($updateOrder == "something error") {
						  $_SESSION['error']
								= "Something Went Wrong, Try again";
					} else {
						  // Send reset email
						  $mail = new PHPMailer(true);
						  try {
								 // Server settings
								 $mail->isSMTP();
								 $mail->Host
									  = 'smtp.gmail.com'; // Your SMTP server
								 $mail->SMTPAuth = true;
								 $mail->Username
									  = 'carhouse001.bn@gmail.com'; // SMTP username
								 $mail->Password
									  = 'gwdo dyis wmov sqau'; // SMTP password
								 $mail->SMTPSecure
									  = PHPMailer::ENCRYPTION_STARTTLS;
								 $mail->Port = 587;
								 // Recipients
								 $mail->setFrom(
									  'carhouse001.bn@gmail.com', 'Car House'
								 );
								 $mail->addAddress(
									  $orderEmail
								 ); // User's email
								 // Content
								 $mail->isHTML(true);
								 $mail->Subject = 'Order Successful Confirmation';
								 $mail->Body
									  = "The Order has been Successful Confirmation, Don't delay, we are waiting for you. Thank you for your trust in us. ";
								 $mail->send();
								 $_SESSION['success']
									  = 'Order Successful Change Status And We Send Email for client';
						  } catch (Exception $e) {
								 $_SESSION['error']
									  = "Email could not be sent. Error: {$mail->ErrorInfo}";
						  }
					}
			 } elseif ($newStatus == 'cancelled') {
					// Update the status in database
					$updateOrder = $dbAction->update(
						 'orders', ['orderStuts' => $newStatus, 'orderCode' => '']
					)->where('id', '=', $orderId)->execution();
					if ($updateOrder == "something error") {
						  $_SESSION['error']
								= "Something Went Wrong, Try again";
					} else {
						  // Send reset email
						  $mail = new PHPMailer(true);
						  try {
								 // Server settings
								 $mail->isSMTP();
								 $mail->Host
									  = 'smtp.gmail.com'; // Your SMTP server
								 $mail->SMTPAuth = true;
								 $mail->Username
									  = 'carhouse001.bn@gmail.com'; // SMTP username
								 $mail->Password
									  = 'gwdo dyis wmov sqau'; // SMTP password
								 $mail->SMTPSecure
									  = PHPMailer::ENCRYPTION_STARTTLS;
								 $mail->Port = 587;
								 // Recipients
								 $mail->setFrom(
									  'carhouse001.bn@gmail.com', 'Car House'
								 );
								 $mail->addAddress(
									  $orderEmail
								 ); // User's email
								 // Content
								 $mail->isHTML(true);
								 $mail->Subject = 'Order Successful Confirmation';
								 $mail->Body
									  = "Sorry, Your Order has been Cancelled try again later. Thank you for your trust in us. ";
								 $mail->send();
								 $_SESSION['success']
									  = 'Order Successful Change Status And We Send Email for client';
								 exit();
						  } catch (Exception $e) {
								 $_SESSION['error']
									  = "Email could not be sent. Error: {$mail->ErrorInfo}";
						  }
					}
					
			 } elseif ($newStatus == 'submit') {
					$updateOrder = $dbAction->update(
						 "orders", ['orderStuts' => $newStatus, 'orderCode' => '']
					)->where("id", "=", $orderId)->execution();
					if ($updateOrder == "something error") {
						  $_SESSION['error']
								= "Something Went Wrong, Try again";
					} else {
						  $_SESSION['success']
								= 'Order Successful Change Status.';
					}
			 }
			 // Redirect to prevent form resubmission
			 header('Location: ' . $_SERVER['PHP_SELF']);
	  }