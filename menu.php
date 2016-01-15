<?php 
/* 
 *  WEB 182 Project: Acme Careers 
 *  view/menu.php
 *  Menu controller file
 */
 
function choose_menu() {
		// If cookie variable for user type is set take 'em to their menu...
		if (isset($_SESSION['user_type']) && isset($_SESSION['user_id'])) {		
			$type = $_SESSION['user_type'];
			$user_id = $_SESSION['user_id'];
			 if ($type == 1) 
			    //header("Location: view/admin_menu.php");
				include('view/admin_menu.php');
			else if($type == 2)
				include('view/employer_menu.php');
			else if ($type == 3)
				include('view/seeker_menu.php');		
			else 
				echo "No user type found.";
	} else  header("Location: ./index.php?action=login");
}
  

 ?>