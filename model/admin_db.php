<?php

function get_user_data($user_id) {
	try {
		global $db;
		$query = "SELECT * FROM jobs_user
			WHERE userID = '$user_id'";
	    $user = $db->query($query);
		$user = $user->fetch(); 
    	return $user;
	} catch (PDOException $e) {
			display_db_error($e->getMessage());
	}
}

function get_user_id($email) {
    global $db;
	try {
    	$query = "SELECT userID, typeID FROM jobs_user
              WHERE email = '$email'";
    	$statement = $db->query($query);
		$user = $statement->fetch();
		return $user;
	} catch (PDOException $e) {
			display_db_error($e->getMessage());
	}
}

function add_user($email, $password, $fname, $mname, $lname, $street, $city, $state, $zip, $country, $phone, $type)  {
    global $db;
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	try {
		$password = sha1($email . $password);
		$query = "INSERT INTO jobs_user (email, password, fname, mname, lname, street, city, state, zip, country, phone, typeID) VALUES ('$email', '$password', '$fname', '$mname', '$lname', '$street', '$city', '$state', '$zip', '$country', '$phone', '$type')";
		$results = $db->exec($query);
		return $results;
	} catch (PDOException $e) {
		$error = $e->getMessage();
		echo "<p>Database error: $error</p>";
	}
}

function update_user($user_id, $email, $password, $fname, $mname, $lname, $street, $city, $state, $zip, $country, $phone, $type)  {
    global $db;
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	try {
		$password = sha1($email . $password);
		$query = "UPDATE jobs_user SET email = '$email', password = '$password', fname = '$fname', mname = '$mname', lname = '$lname', street = '$street', city = '$city', state = '$state', zip = '$zip', country = '$country', phone = '$phone', typeID = '$type' WHERE userID = '$user_id'";
		$results = $db->exec($query);
		return $results;
	} catch (PDOException $e) {
		$error = $e->getMessage();
		echo "<p>Database error: $error</p>";
	}
}

function is_valid_admin_login($email, $password) {
    global $db;
	try {
    	$password = sha1($email . $password);
    	$query = "SELECT userID FROM jobs_user
              WHERE email = '$email' AND password = '$password'";
    	$statement = $db->query($query);
		$valid = $statement->rowcount();
		return $statement;
	} catch (PDOException $e) {
			display_db_error($e->getMessage());
	}
}



?>