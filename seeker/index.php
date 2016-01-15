<?php

require('./../model/database.php');
require('./../model/category_db.php');
require('./../model/job_db.php');
require('./../model/resume_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'job_search';
}


$file_dir = 'files';
$file_dir_path = getcwd() . DIRECTORY_SEPARATOR . $file_dir;

$categories = get_categories();
$message = "";


// JOB SEARCH
if($action == 'job_search') {
	
	
	if(isset($_GET['job_category'])) {
	   $category_id = $_GET['job_category'];
	   
	}
	else $category_id = "0";
	
	try {
	 $categories = get_categories();
	
	} catch (Exception $e) {
		echo 'Exception: ' . $e->getMessage();
	}
	
	// TO DO
	// GET CATEGORY NAMES & JOBS BY CATEGORY
	
	$category_name = get_category_name($category_id);
	$jobs = get_jobs_by_category($category_id);
	
	
	include './job_search.php';
}

// VIEW JOB LISTING
else if ($action == 'view_job') {
	
	 	try {
	 $categories = get_categories();
	} catch (Exception $e) {
		echo 'Exception: ' . $e->getMessage();
	}

	// Get job by ID
    $job_id = $_GET['job_id'];
    $job = get_job_by_id($job_id);
	
	
    // TO DO
    // Get JOB DATA FIELDS	
	$job_title = $job['jobTitle'];
	$job_type = $job['jobType'];
	$job_city = $job['city'];
	$job_state = $job['state'];
	$job_summary = $job['summary'];
	$job_description = $job['description'];

	include('view_job.php');
}



//CREATE A NEW RESUME
else if ($action == 'add_resume') {
	$user_id = $_GET['user_id'];

	include 'edit_resume.php';
} 

//EDIT RESUME
else if ($action == 'edit_resume') {
  
   // TO DO
  // GET ALL FIELD VALUES FOR RESUME BASED ON RESUME ID
	
	$resume_id = $_POST['resID'];
	$user_id = $_GET['user_id'];
	$resume_objectives = $_POST['objectives'];
	$resume_keywords = $_POST['keywords'];
	$resume_text = $_POST['resText'];
	$resume_title = $_POST['resTitle'];
	

  include 'edit_resume.php';
}

//DELETE RESUME
else if($action == 'delete_resume'){

	// TO DO
	$resume_id = $_POST['resume_id'];
	$user_id = $_GET['user_id'];
	delete_resume($resume_id);
	 
	$resumes = get_resume_by_user($user_id);

	include 'list_resumes.php';
}

//LIST RESUMES
else if ($action == 'list_resumes') {
    $user_id = $_GET['user_id'];  
    $resumes = get_resume_by_user($user_id);

    include('list_resumes.php');
}

// VIEW RESUME
else if ($action == 'view_resume') {
	
	
	$resume_id = $_GET['resume_id'];

	$resume = get_resume_by_id($resume_id);

	// Get resume data
	// TO DO
	$user_fname = $resume['fname'];
	$user_mname = $resume['mname'];
	$user_lname = $resume['lname'];
	$user_street = $resume['street'];
	$user_city = $resume['city'];
	$user_state = $resume['state'];
	$user_zip = $resume['zip'];
	$user_country = $resume['country'];
	$user_phone = $resume['phone'];
	$user_email = $resume['email'];
	$resume_objectives = $resume['objectives'];
	$resume_keywords = $resume['keywords'];
	$resume_text = $resume['resText'];
	$resume_title = $resume['resTitle'];
	$resUpload = $resume['resUpload'];
	$user_id = $resume['userID'];	
	//
	include('view_resume.php');	
}


// UPDATE RESUME
else if ($action == 'update_resume') { 
	
	// Get resume data
	// TO DO

	$user_id = $_GET['user_id'];
	$resume_title = $_POST['resTitle'];
	$resume_keywords = $_POST['keywords'];
	$resume_objectives = $_POST['objectives'];
	$resume_text = $_POST['resText'];
	

	$resUpload = $_FILES['resUpload']['name'];
	$source = $_FILES['resUpload']['tmp_name'];
	$target = $file_dir_path . DIRECTORY_SEPARATOR . "userID_" . $user_id . "_" . $resUpload;
	
	move_uploaded_file($source, $target);

	
	 if (isset($_POST['resID'])) {
		$resume_id = $_POST['resID'];
		$query = update_resume($resume_title, $resume_keywords, $resume_objectives, $resume_text, $resUpload, $resume_id);
		$resume = get_resume_by_id($resume_id);
		$user_fname = $resume['fname'];
		$user_mname = $resume['mname'];
		$user_lname = $resume['lname'];
		$user_street = $resume['street'];
		$user_city = $resume['city'];
		$user_state = $resume['state'];
		$user_zip = $resume['zip'];
		$user_country = $resume['country'];
		$user_phone = $resume['phone'];
		$user_email = $resume['email'];
		
		$message = "Resume has been updated.";
	} 
	
	else {
		
		add_resume($user_id, $resume_title, $resume_keywords, $resume_objectives, $resume_text, $resUpload);
		$resume_id = $db->lastInsertId();
		$resume = get_resume_by_id($resume_id);
		$user_fname = $resume['fname'];
		$user_mname = $resume['mname'];
		$user_lname = $resume['lname'];
		$user_street = $resume['street'];
		$user_city = $resume['city'];
		$user_state = $resume['state'];
		$user_zip = $resume['zip'];
		$user_country = $resume['country'];
		$user_phone = $resume['phone'];
		$user_email = $resume['email'];

		$message = "The resume has been added.";
	
	}
include('./view_resume.php');	
}

else if ($action == 'submit_resume') {
	
	//GET JOB ID & RESUME ID FROM SELECT FORM	
	if ($_GET['job_id'] && $_GET['resume_id']) {
		$job_id = $_GET['job_id'];
		$resume_id = $_GET['resume_id'];
				
		$job = get_job_by_id($job_id);

    	// GET JOB DATA
   		 $job_title = $job['jobTitle'];
    	$job_type = $job['jobType'];
   		$job_city = $job['city'];
		$job_state = $job['state'];
		$job_summary = $job['summary'];
		$job_description = $job['description'];
		
		$query = add_application($job_id, $resume_id);
		$submitted = '1';	
		$message = "Your resume has been submitted for this job.";
		
	} else {
		$message = "No Job ID or Resume provided.";
	}
	
	include('./view_job.php');
}

else if($action =='apply'){
	$job_id = $_GET['job_id'];
	$job_title = $_GET['job_title'];
	$user_id = $_GET['user_id'];
	
	$resumes = get_resume_by_user($user_id);
	$job = get_job_by_id($job_id);
	
	include('./select_resume.php');
	
}

//LIST APPLICATIONS
 else if ($action == 'list_applications') {
    $user_id = $_GET['user_id'];

    $applications = get_applications_by_user($user_id);
	
    include('./list_applications.php');
} 
?>

