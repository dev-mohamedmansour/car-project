<?php
	  
	  use CarHouse\Models\Db;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
// Start session if isn't already started
	  if (session_status() === PHP_SESSION_NONE) {
			 session_start();
	  }
	  $dbAction = new DB;
	  function countMessages(): void
	  {
			 $dbAction = new DB;
			 $countMessages = $dbAction->select("COUNT(id)", "messages")->getRow();
			 
			 echo $countMessages['COUNT(id)'];
	  }
	  
	  function showMessages(): void
	  {
			 $dbAction = new DB;
			 $messages = $dbAction->select('*', 'messages')->getAll();
			 if ($messages == "No results found") {
					echo "<tr>";
					echo '<h5 style="color: #dc3545"><strong>No messages found,</strong>
				   Please try again later</h5>
				   <a class="btn" style="color: #6610f2" href="index.php">HOME</a><br>';
					echo "</tr>";
			 } elseif (count($messages) > 0) {
					foreach ($messages as $information) {
						  echo '<tr>';
						  $displayKeys = ['id', 'name', 'email',
												'subject', 'messages'];
						  foreach ($displayKeys as $key) {
								 if (isset($information[$key])) {
										echo '<td class="table - plus">'
											 . htmlspecialchars(
												  $information[$key]
											 )
											 . '</td>';
										
								 }
						  }
						  
						  echo '<td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href = "?delete='
								. (int)$information['id'] . '"><i class="dw dw-delete-3"></i > Delete</a >
                        </div >
                    </div >
                  </td > ';
						  echo '</tr > ';
					}
			 }
	  }
	  
	  if (isset($_GET['delete'])) {
			 $messageId = (int)$_GET['delete'];
			 $deleteOrder = $dbAction->delete('messages')
				  ->where('id', ' = ', $messageId)
				  ->execution();
			 
			 if ($deleteOrder == "something error") {
					$_SESSION['error'] = "Something Went Wrong";
			 } else {
					$_SESSION['success']
						 = "Message Deleted Successfully";
			 }
			 
	  }
	  