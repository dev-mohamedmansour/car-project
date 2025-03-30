<?php
	  
	  use CarHouse\Models\Db;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
// Start session if not already started
	  if (session_status() === PHP_SESSION_NONE) {
			 session_start();
	  }
	  $dbAction = new DB;
	  
	  function showClients(): void
	  {
			 $dbAction = new DB;
			 $users = $dbAction->select('*', 'users')->getAll();
			 
			 if (count($users) > 0) {
					foreach ($users as $information) {
						  echo '<tr>';
						  $displayKeys = ['id', 'name', 'email', 'phone', 'role',
												'verify_email', 'email_confirmation_time'];
						  
						  foreach ($displayKeys as $key) {
								 if (isset($information[$key])) {
										if ($key == "name") {
											  echo '<td class="table-plus">'
													. htmlspecialchars($information[$key])
													. '</td>';
										} else {
											  echo '<td>' . htmlspecialchars(
														 $information[$key]
													) . '</td>';
										}
								 }
						  }
						  
						  echo '<td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" href="usersPage.php?delete='
								. (int)$information['id'] . '"><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                  </td>';
						  echo '</tr>';
					}
			 }
	  }
	  
	  if (isset($_GET['delete'])) {
			 $userId = (int)$_GET['delete'];
			 $admin = $dbAction->select("role", "users")->where("id", "=", $userId)
				  ->andWhere("role", "=", "admin")
				  ->getRow();
//			 var_dump($admin);
//			 die();
			 if ($admin) {
					$_SESSION['error']
						 = "Admin can not deleted, Please contact your administrator.";
					header('Location:index.php');
					exit();
			 }
			 $checkUser = $dbAction->select('id', 'users')->where(
				  'id', "=", $userId
			 )->getRow();
			 if ($checkUser) {
					$deleteUser = $dbAction->delete('users')
						 ->where('id', '=', $userId)
						 ->andWhere("role", "=", "user")
						 ->execution();
					
					if ($deleteUser == "something error") {
						  $_SESSION['error'] = "Something Went Wrong";
					} else {
						  $_SESSION['success'] = "Client Deleted Successfully";
					}
					exit();
			 } else {
					$_SESSION['error']
						 = "User Not Found, Please do not input any number.";
					exit();
			 }
	  }