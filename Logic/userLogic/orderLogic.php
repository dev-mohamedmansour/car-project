<?php
	  
	  use CarHouse\Models\Db;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
// Start session if isn't already started
	  if (session_status() === PHP_SESSION_NONE) {
			 session_start();
	  }
	  $dbAction = new DB;
	  function printUserName($userName)
	  {
			 $nameParts = explode(" ", $userName);
			 
			 // Check if there are at least 2 parts
			 if (count($nameParts) >= 2) {
					$firstName = $nameParts[0];
					$secondName = $nameParts[1];
					echo $firstName . " " . $secondName;
			 } else {
					echo $userName; // Fallback if there's only one name
			 }
	  }
	  
	  function countOrders($userId): void
	  {
			 $dbAction = new DB;
			 $clients = $dbAction->select("COUNT(id)", "orders")->where(
				  "userId", "=", $userId
			 )->getRow();
			 echo $clients['COUNT(id)'];
			 
	  }
	  
	  function showOrders($userId): void
	  {
			 $dbAction = new DB;
			 $orders = $dbAction->select('*', 'orders')->where(
				  "userId", "=", $userId
			 )->getAll();
			 if ($orders == "No results found") {
					echo '<tr>';
					echo '<h5 style="color: #dc3545"><strong>No orders found,</strong>
				   Please try again later Or book a New ServiceNow!!</h5>
				   <a class="btn" style="color: #6610f2" href="index.php">HOME</a><br>';
					echo '</tr>';
			 } elseif (count($orders) > 0) {
					foreach ($orders as $information) {
						  echo '<tr>';
						  $displayKeys = ['id', 'orderName', 'serviceName',
												'orderCode',
												'carMake', 'carModel',
												'orderPhone', 'orderTime', 'orderStuts',
												'orderDateActive'];
						  foreach ($displayKeys as $key) {
								 if (isset($information[$key])) {
										if ($key == "id") {
											  continue;
										} else {
											  echo '<td class="table-plus">'
													. htmlspecialchars($information[$key])
													. '</td>';
										}
								 }
						  }
						  
						  echo '<td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="orders.php?delete='
								. (int)$information['id'] . '"><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                  </td>';
						  echo '</tr>';
					}
			 }
	  }
	  
	  if (isset($_GET['delete'])) {
			 $orderId = (int)$_GET['delete'];
			 $deleteOrder = $dbAction->delete('orders')
				  ->where('id', '=', $orderId)
						 ->execution();
			 
			 if ($deleteOrder == "something error") {
						  $_SESSION['error'] = "Something Went Wrong";
					} else {
					$_SESSION['success'] = "Order Deleted Successfully";
					}
			 
	  }