<?php 
/* 
 *  WEB 182 Project: Acme Careers 
 *  index.php
 *  Controller file for top level
 *	Student: Joseph Phelps
 */
 
//Start session
//$lifetime = 60 * 60 * 24;  // 24 hours
$lifetime = 0;
session_set_cookie_params($lifetime, '/');
session_start();

require('./model/database.php');
require('./model/admin_db.php');
require_once('menu.php');
	
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
	$action = 'show_menu';
}

$message = "";

// Perform the specified action
switch($action) {
		
	case 'login':
		 if(!empty($_POST['email']) && !empty($_POST['password'])) {
				$email = $_POST['email'];
				$password = $_POST['password'];
				
				$user = is_valid_admin_login($email, $password);
				
				// Set cookie values for valid user session
	
				if ($user) {

					$_SESSION['is_valid_user'] = true;
					$user_info = get_user_id($email);
				
					$user_id = $user_info['userID'];
					$user_type = $user_info['typeID'];
				
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_type'] = $user_type;
	
					choose_menu();
	
				} else {
					$message = 'Invalid ID or password.';
					include('view/login.php');
				}
		} else {
					$message = 'You must log in to view this page.';
					include('view/login.php');
				}
        break;
  
    case 'logout':
	
        $_SESSION = array();   // Clear all session data from memory
         session_destroy();     // Clean up the session ID
        $message = 'You have been logged out.';
        include('./view/login.php');
        break;

	case 'show_menu' :
		choose_menu();
		break;
		
	case 'add_account':
		include('edit_account.php');	
		break;

	case 'edit_account':
		$user_id = $_GET['user_id'];
		$user = get_user_data($user_id);
		if ($user) {
			// $user_id = $user['userID'];
			$email = $user['email'];
			$fname = $user['fname'];
			$mname = $user['mname'];
			$lname = $user['lname'];
			$street = $user['street'];
			$city = $user['city'];
			$user_state = $user['state'];
			$zip = $user['zip'];
			$country = $user['country'];
			$phone = $user['phone'];
			$type = $user['typeID'];	
		} 
		include ('edit_account.php');
		break;

	case 'update_account':
		
			// Get user data
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$street = $_POST['street'];
			$city = $_POST['city'];
			$user_state = $_POST['state'];
			$zip = $_POST['zip'];
			$country = $_POST['country'];
			$phone = $_POST['phone'];
			$type = $_POST['typeID'];	
			
			if($_POST['email'] && $_POST['password']) {
				$email = $_POST['email'];
				$password = $_POST['password'];
			}
			else {
				$message = "You must supply an email and a password!";
				include('edit_account.php');
			}	
			
			if (isset($_POST['userID'])) {
				$user_id = $_POST['userID'];
			    
				$update = update_user($user_id, $email, $password, $fname, $mname, $lname, $street, $city, $user_state, $zip, $country, $phone, $type);	
				if($update) { 
					$message = $email . ' account was updated.';
				}  else {
					$message = "There was a problem with updating this account.";
				}
			}
			else { 		
				$added = add_user($email, $password, $fname, $mname, $lname, $street, $city, $user_state, $zip, $country, $phone, $type);	
				if($added) {
					$message = 'Account successfully created for '. $email;
				}
				else {
					$message = "There was a problem with creating this account.";
				}
			}
			
			include('edit_account.php');
		
		break;
	
}
	

?>

